<?php
class Pelajaran extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['pelajaran_active'] = 'active';
			$data['pelajaran'] = 'active';
		    $data['title'] = 'Pelajaran';

		    $data['data'] = $this->db->query("SELECT * FROM t_pelajaran as a JOIN t_kategori as b ON a.pelajaran_kategori = b.kategori_id WHERE a.pelajaran_hapus = 0")->result_array();

		    $data['kategori_data'] = $this->db->query("SELECT * FROM t_kategori WHERE kategori_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('pelajaran/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{ 
			redirect(base_url('login'));
		} 
	} 
	function add(){ 
		$set = array(
							'pelajaran_nama' => @$_POST['pelajaran_nama'],
							'pelajaran_kategori' => @$_POST['pelajaran_kategori'],
							'pelajaran_kategori_sub' => @$_POST['pelajaran_kategori_sub'],
							'pelajaran_kkm' => @$_POST['pelajaran_kkm'],
						);

		$this->db->set($set);
		if ($this->db->insert('t_pelajaran')) {

			$this->session->set_flashdata('success','Data berhasil di simpan');
		} else {
			
			$this->session->set_flashdata('gagal','Data gagal di simpan');
		}

		redirect(base_url('pelajaran'));
	}
	function delete($id){
        
        $this->db->set('pelajaran_hapus',1);
        $this->db->where('pelajaran_id',$id);

        if ($this->db->update('t_pelajaran')) {

        	$this->session->set_flashdata('success','Data berhasil di hapus');
        } else {

        	$this->session->set_flashdata('gagal','Data gagal di hapus');
        }

		redirect(base_url('pelajaran'));
	}
	function update($id){
		$set = array(
							'pelajaran_nama' => @$_POST['pelajaran_nama'],
							'pelajaran_kategori' => @$_POST['pelajaran_kategori'],
							'pelajaran_kategori_sub' => @$_POST['pelajaran_kategori_sub'],
							'pelajaran_kkm' => @$_POST['pelajaran_kkm'],
						);

		$this->db->where('pelajaran_id',$id);
		$this->db->set($set);
		if ($this->db->update('t_pelajaran')) {

			$this->session->set_flashdata('success','Data berhasil di rubah');
		} else {
			
			$this->session->set_flashdata('gagal','Data gagal di rubah');
		}

		redirect(base_url('pelajaran'));
	}
	function get(){
		$id = $_POST['id'];
		$db = $this->db->query("SELECT * FROM t_kategori WHERE kategori_id = '$id'")->row_array();

		echo json_encode($db);
	}
}