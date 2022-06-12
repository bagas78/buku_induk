<?php
class Dashboard extends CI_Controller{

	function __construct(){ 
		parent::__construct();
	} 
	function index(){
		if ( $this->session->userdata('login') == 1) {
			// $data['user_num'] = $this->db->query("SELECT * FROM t_user WHERE user_hapus = 0")->num_rows();
			// $data['penduduk_num'] = $this->db->query("SELECT * FROM t_penduduk WHERE penduduk_hapus = 0")->num_rows();
			// $data['kriteria_num'] = $this->db->query("SELECT * FROM t_kriteria WHERE kriteria_hapus = 0")->num_rows();
			// $data['sub_num'] = $this->db->query("SELECT * FROM t_sub WHERE sub_hapus = 0")->num_rows();
			
			// $data['peringkat'] = $this->db->query("SELECT b.penduduk_nama AS nama, a.rangking_nilai as nilai FROM t_rangking AS a JOIN t_penduduk AS b ON a.rangking_penduduk = b.penduduk_id ORDER BY a.rangking_nilai DESC")->result_array();
			
			$data['dashboard'] = 'class="active"';
		    $data['title'] = 'Dashboard';
		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('dashboard/dashboard');
 
		}
		else{
			redirect(base_url('login'));
		}
	} 
}