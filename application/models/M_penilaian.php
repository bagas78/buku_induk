<?php

class M_penilaian extends CI_Model { 
	
	//nama tabel
	var $table = 't_penilaian'; 

	//kolom yang di tampilkan
	var $column_order = array(null,'user_name','tahun_text'); 

	//kolom yang di tampilkan setelah seacrh
	var $column_search = array('user_name','tahun_text'); 

	//urutan 
	var $order = array('penilaian_id' => 'desc'); 

	private function _get_datatables_query()
	{
		
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_GET['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_GET['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_GET['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_GET['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables($where)
	{
		$this->_get_datatables_query();
		if($_GET['length'] != -1)
		$this->db->where($where);
		$this->db->join('t_user', 't_user.user_id = t_penilaian.penilaian_user');
		$this->db->join('t_tahun', 't_tahun.tahun_id = t_penilaian.penilaian_tahun');
		$this->db->limit($_GET['length'], $_GET['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($where)
	{
		$this->_get_datatables_query();
		$this->db->join('t_user', 't_user.user_id = t_penilaian.penilaian_user');
		$this->db->join('t_tahun', 't_tahun.tahun_id = t_penilaian.penilaian_tahun');
		$this->db->where($where);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all($where)
	{
		$this->db->from($this->table);
		$this->db->join('t_user', 't_user.user_id = t_penilaian.penilaian_user');
		$this->db->join('t_tahun', 't_tahun.tahun_id = t_penilaian.penilaian_tahun');
		$this->db->where($where);
		return $this->db->count_all_results();
	}

}
