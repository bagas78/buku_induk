<?php
class Pribadi extends CI_Controller{

	function __construct(){
		parent::__construct();
	}   
	function index(){
		if ( $this->session->userdata('login') == 1) {

			$id = $this->session->userdata('id');

			$data['pribadi'] = 'class="active"';
		    $data['title'] = 'Pribadi';
		    $db = $this->db->query("SELECT * FROM t_pribadi WHERE pribadi_hapus = 0 AND pribadi_siswa = '$id'")->row_array();

		    $data['data'] = json_decode(@$db['pribadi_data'], TRUE);

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('pribadi/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		} 
	} 
	function save(){
		$id = $this->session->userdata('id');

		$set = array(
						'pribadi_siswa' => $id,
						'pribadi_data' => json_encode($_POST), 
					);
		$this->db->set($set);

		$cek = $this->db->query("SELECT * FROM t_pribadi WHERE pribadi_siswa = '$id'")->num_rows();

		//simpan data
		if ($cek > 0) {
			//update
			$this->db->where('pribadi_siswa',$id);
			if ($this->db->update('t_pribadi')) {
				$this->session->set_flashdata('success', 'Data berhasil di simpan');
			} else {
				$this->session->set_flashdata('gagal', 'Data gagal di simpan');
			}

		} else {
			// insert
			if ($this->db->insert('t_pribadi')) {
				$this->session->set_flashdata('success', 'Data berhasil di simpan');
			} else {
				$this->session->set_flashdata('gagal', 'Data gagal di simpan');
			}
		}

		$arr = [];
		for ($i=1; $i < 3; $i++) { 
			
			//simpan foto
			if (@$_FILES['file'.$i]['name']) {
				
				//type file
				$typefile = explode('/', $_FILES['file'.$i]['type']);

				//replace Karakter name foto
				$filename = $_FILES['file'.$i]['name'];

				//replace name foto
				$type = explode(".", $filename);
		    	$no = count($type) - 1;
		    	$new_name = md5($id).'_'.$i.'.'.$type[$no];
		    	///////////////////	

		    	//jenis file boleh di upload
		    	$format = ['jpg','png','jpeg'];

		    	if (in_array($type[$no], $format)) {
		    		$path = 'assets/gambar/pribadi';
		        	move_uploaded_file($_FILES['file'.$i]['tmp_name'], $path.'/'.$new_name);

		        	$arr += array('k'.$i => $new_name);
		    	}
			}

		}

		$merge = array_merge($_POST, $arr);

		if ($merge) {
			$set = array(
							'pribadi_data' => json_encode($merge), 
						);
			$this->db->set($set);
			
			//update
			$this->db->where('pribadi_siswa',$id);
			if ($this->db->update('t_pribadi')) {
				$this->session->set_flashdata('success', 'Data berhasil di simpan');
			} else {
				$this->session->set_flashdata('gagal', 'Data gagal di simpan');
			}
		}

		redirect(base_url('pribadi'));
		
	}

	function delete_foto($file){

		$path = 'assets/gambar/pribadi/'.$file;

		if (unlink($path)) {
			$this->session->set_flashdata('success', 'Foto berhasil di hapus');
		} else {
			$this->session->set_flashdata('gagal', 'Foto gagal di hapus');
		}
		
		redirect(base_url('pribadi'));
	}
}