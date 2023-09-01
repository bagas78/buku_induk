<?php
class Dashboard extends CI_Controller{

	function __construct(){ 
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {

			//count
			$data['siswa_num'] = $this->db->query("SELECT * FROM t_user WHERE user_hapus = 0 AND user_level = 3")->num_rows();
			$data['kategori_num'] = $this->db->query("SELECT * FROM t_kategori WHERE kategori_hapus = 0")->num_rows();
			$data['pelajaran_num'] = $this->db->query("SELECT * FROM t_pelajaran WHERE pelajaran_hapus = 0")->num_rows();

			$data['data'] = $this->db->query("SELECT * FROM t_sekolah")->row_array();
			
			$data['dashboard'] = 'class="active"';
		    $data['title'] = 'Dashboard';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('dashboard/dashboard',$data);
		    $this->load->view('v_template_admin/admin_footer');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
}