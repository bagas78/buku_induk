<?php
class Tahun extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) { 
			$data['tahun'] = 'class="active"';
		    $data['title'] = 'Tahun Pelajaran';

		    $data['data'] = $this->db->query("SELECT * FROM t_tahun WHERE tahun_hapus = 0 ORDER BY tahun_text ASC")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('tahun/index',$data);
		    $this->load->view('v_template_admin/admin_footer',$data);

		}
		else{
			redirect(base_url('login'));
		} 
	} 
	function add(){ 

		$set = array(
						'tahun_text' => $_POST['tahun_text'], 
					);

		if ($this->query_builder->add('t_tahun',$set)) {

			$this->session->set_flashdata('success','Data berhasil di tambah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di tambah');
		}

		redirect(base_url('tahun'));
	}
	function update($id){

		$set = array(
						'tahun_text' => $_POST['tahun_text'], 
					);

		if ($this->query_builder->update('t_tahun',$set,'tahun_id ='.$id)) {

			$this->session->set_flashdata('success','Data berhasil di rubah');
		} else {
			$this->session->set_flashdata('gagal','Data gagal di rubah');
		}

		redirect(base_url('tahun'));

	}
	function delete($id){
        //hapus user
        $this->db->set('tahun_hapus',1);
        $this->db->where('tahun_id',$id);
        $this->db->update('t_tahun');

		$this->session->set_flashdata('success','Data berhasil di hapus');

		redirect(base_url('tahun'));
	}
}