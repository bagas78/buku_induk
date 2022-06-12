<?php
class Petugas extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['petugas'] = 'class="active"';
		    $data['title'] = 'Petugas';
		    $data['data'] = $this->db->query("SELECT * FROM t_user WHERE user_hapus = 0 AND user_level = '2'")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('petugas/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		} 
	}  
	function add(){ 
		$x = $_POST['user_email'];
        $cek = $this->db->query("SELECT * FROM t_user WHERE user_email = '$x'")->num_rows();

		if ($cek > 0) {
			$this->session->set_flashdata('gagal','Email sudah di gunakan !!');
			redirect(base_url('siswa'));
		}else{
			$cek = $this->db->query("SELECT * FROM t_user order by user_id desc limit 1")->row_array();
			$id = $cek['user_id']+1;
			$set = array(
							'user_id' => $id,
							'user_name' => $_POST['user_name'], 
							'user_email' => $x, 
							'user_password' => md5($_POST['user_password']),
							'user_tanggal'	=> date('Y-m-d'),
							'user_level' => 2,
						);
			$this->query_builder->add('t_user',$set);

			$set1 = array('detail_id_user' => $id);
			$this->query_builder->add('t_detail_user',$set1);

			$this->session->set_flashdata('success','Data berhasil di tambah');
			redirect(base_url('petugas'));
		}
	}
	function delete($id){
        //hapus user
        $this->db->set('user_hapus',1);
        $this->db->where('user_id',$id);
        $this->db->update('t_user');

		$this->session->set_flashdata('success','Data berhasil di hapus');

		redirect(base_url('petugas'));
	}
	function update($id){
		$x = $_POST['user_email'];
		$set = array(
						'user_name' => $_POST['user_name'], 
						'user_email' => $x, 
						'user_password' => md5($_POST['user_password']),
						'user_tanggal'	=> date('Y-m-d'),
					);
		$this->query_builder->update('t_user',$set,'user_id ='.$id);
		$this->session->set_flashdata('success','Data berhasil di rubah');
		redirect(base_url('petugas'));
	}
}