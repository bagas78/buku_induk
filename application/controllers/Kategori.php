<?php
class Kategori extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['pelajaran_active'] = 'active';
			$data['kategori'] = 'active';
		    $data['title'] = 'Kategori';

		    $db = $this->db->query("SELECT * FROM t_kategori WHERE kategori_hapus = 0")->result_array();

		    //hapus alpha di gunakan
		    $arr = array();
		    foreach ($db as $key) {
		    	$arr[] .= $key['kategori_alpha'];
		    }

		   	$merge = array_merge(range('A', 'Z'));
		   	$diff = array_diff($merge, $arr);
		   	//

		   	$data['alpha'] = $diff;
		   	$data['data'] = $db;

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('kategori/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		} 
	} 
	function add(){ 
		
		$set = array(
						'kategori_nama' => $_POST['kategori_nama'], 
						'kategori_alpha' => $_POST['kategori_alpha'], 
						'kategori_sub' => json_encode(@$_POST['sub']),
					);

		if ($this->query_builder->add('t_kategori',$set)) {

			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}

		redirect(base_url('kategori'));
	}
	function get(){

		$id = $_POST['id'];
		$db = $this->db->query("SELECT * FROM t_kategori WHERE kategori_id = '$id'")->row_array();
		echo json_encode($db);
	}
	function update($id){
		$set = array(
						'kategori_nama' => $_POST['kategori_nama'], 
						'kategori_alpha' => $_POST['kategori_alpha'],
						'kategori_sub' => json_encode(@$_POST['sub']),
					);

		if ($this->query_builder->update('t_kategori',$set,'kategori_id ='.$id)) {

			$this->session->set_flashdata('success','Data berhasil di rubah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di rubah');
		}

		redirect(base_url('kategori'));

	}
	function delete($id){
        //hapus user
        $this->db->set('kategori_hapus',1);
        $this->db->where('kategori_id',$id);
        $this->db->update('t_kategori');

		$this->session->set_flashdata('success','Data berhasil di hapus');

		redirect(base_url('kategori'));
	}
}