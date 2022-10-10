<?php
class Penilaian extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {

			$level = $this->session->userdata('level');

			$data['penilaian'] = 'class="active"';
		    $data['title'] = 'Penilaian Semester';

		    if ($level == 2) {
		    	// petugas
		    	$data['data'] = $this->db->query("SELECT * FROM t_user as a LEFT JOIN t_kelengkapan as b ON a.user_id = b.kelengkapan_user WHERE a.user_hapus = 0 AND a.user_level = 3")->result_array();

		    } else {
		    	// siswa

		    	$siswa = $this->session->userdata('id');

		    	$data['data'] = $this->db->query("SELECT * FROM t_user as a LEFT JOIN t_kelengkapan as b ON a.user_id = b.kelengkapan_user WHERE a.user_hapus = 0 AND a.user_level = 3 AND a.user_id = '$siswa'")->result_array();

		    }

		    $data['semester_data'] = $this->db->query("SELECT penilaian_semester AS semester FROM t_penilaian WHERE penilaian_hapus = 0")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('penilaian/index',$data);
		    $this->load->view('v_template_admin/admin_footer',$data);
 
		}
		else{
			redirect(base_url('login'));
		} 
	} 
	function nilai($user){ 

		$semester = @$_POST['semester'];

		$data['data'] = $this->db->query("SELECT * FROM t_penilaian WHERE penilaian_user = '$user' AND penilaian_semester = '$semester' AND penilaian_hapus = 0")->row_array();

		if (@$data['data']) {
			// edit
			$data['status'] = 1;
		} else {
			// new
			$data['status'] = 1;
		}

		$data['kategori_data'] =  $this->db->query("SELECT * FROM t_kategori WHERE kategori_hapus = 0")->result_array();

		$data['pelajaran_data'] =  $this->db->query("SELECT * FROM t_pelajaran WHERE pelajaran_hapus = 0")->result_array();
		
		$data['penilaian'] = 'class="active"';
		$data['title'] = 'Penilaian Semester';

		$db_user = $this->db->query("SELECT * FROM t_user WHERE user_id = '$user'")->row_array();

		$data['nama'] = @$db_user['user_name'];

		$data['semester'] = $semester;
		$data['user'] = $user;

		$this->load->view('v_template_admin/admin_header',$data);
		$this->load->view('penilaian/nilai',$data);
		$this->load->view('v_template_admin/admin_footer',$data);

		// echo '<pre>';
		// print_r(json_decode($data['data']['penilaian_data']));
		
	}
	function save(){

		//variable
		$type = $_POST['type'];
		$status = $_POST['status'];
		$user = $_POST['user'];
		$semester = $_POST['semester'];

		if ($type == 'text') {

			// text
			$set = array(
							'penilaian_user' => $user, 
							'penilaian_semester' => $semester, 
							'penilaian_data' => json_encode($_POST),
							'penilaian_type' => $type, 
						);

			if ($status == 1) {

				// edit
				$this->db->where('penilaian_user',$user);
				$this->db->where('penilaian_semester',$semester);
				$this->db->set($set);
				if ($this->db->update('t_penilaian')) {
					// sukses
					$this->session->set_flashdata('success', 'Data berhasil di simpan');
				} else {
					// gagal
					$this->session->set_flashdata('gagal', 'Data gagal di simpan');
				}
				

			} else {

				// new
				$this->db->set($set);
				if ($this->db->insert('t_penilaian')) {
					// sukses
					$this->session->set_flashdata('success', 'Data berhasil di simpan');
				} else {
					// gagal
					$this->session->set_flashdata('gagal', 'Data gagal di simpan');
				}
			}

		} else {

			// file
			
			if($_FILES['file']['size'] <= 0){
				$this->session->set_flashdata('gagal','Foto tidak boleh lebih dari 2 MB');
				redirect(base_url('penilaian'));
			}
			else{

				$name_file = $_FILES['file']['name'];
	    		
	    		//type
	    		$type = explode(".", $name_file);
		    	$no = count($type) - 1;

		    	//name foto uniq
		    	$new_name = md5(date('Y-m-d H:i:s:u')).'.'.$type[$no];

				//config uplod foto
				  $config = array(
				  'upload_path' 	=> './assets/gambar/penilaian',
				  'allowed_types' 	=> "gif|jpg|png|jpeg",
				  'overwrite' 		=> TRUE,
				  'file_name'		=> $new_name,
				  // 'max_size' 		=> "2048000",
				  // 'max_height' 		=> "10000",
				  // 'max_width' 		=> "20000"
				  );

				//upload foto
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('file')) {

					$set = array(
										'penilaian_user' => $_POST['user'], 
										'penilaian_semester' => $_POST['semester'], 
										'penilaian_file' => $new_name, 
										'penilaian_type' => $_POST['type'], 
									);

					if ($status == 1) {

						// edit
						$this->db->where('penilaian_user',$user);
						$this->db->where('penilaian_semester',$semester);
						$this->db->set($set);
						$this->db->update('t_penilaian');

					} else {

						// new
						$this->db->set($set);
						$this->db->insert('t_penilaian');
					}

			    	$this->session->set_flashdata('success','Data berhasil di simpan');
				} else {
					$this->session->set_flashdata('gagal','Data gagal di simpan');
				}
			}
		}

		redirect(base_url('penilaian'));
	}
	function delete(){
		$file = $_POST['name'];

		if (unlink('./assets/gambar/penilaian/'.$file)) {
			// sukses
			$response = 1;
		} else {
			// gagal
			$response = 1;
		}

		echo json_encode($response);
		
	}
	function print($id){

		$cek = $this->db->query("SELECT * FROM t_kelengkapan WHERE kelengkapan_user = '$id'")->num_rows();

		$set = array(
						'kelengkapan_data' => json_encode($_POST),
						'kelengkapan_user' => $id, 
					);

		if (@$cek) {

			// edit
			$this->db->where('kelengkapan_user',$id);
			$this->db->set($set);
			if ($this->db->update('t_kelengkapan')) {
				$status = 1;
			} else {
				$status = 0;

				$this->session->set_flashdata('gagal', 'Kesalahan, Data gagal di cetak !!');
			}
			
		
		} else {
		
			// new
			$this->db->set($set);
			if ($this->db->insert('t_kelengkapan')) {
				$status = 1;
			} else {
				$status = 0;

				$this->session->set_flashdata('gagal', 'Kesalahan, Data gagal di cetak !!');
			}
			
		
		}
		

		//sementara
		redirect(base_url('penilaian'));

	}
	function view($user = '',$semester = 1){

		if (@$_POST['semester']) {
			$sem = $_POST['semester'];
		} else {
			$sem = $semester;
		}
		

		$data['data'] = $this->db->query("SELECT * FROM t_penilaian WHERE penilaian_user = '$user' AND penilaian_semester = '$sem'")->row_array();

		$data['kategori_data'] =  $this->db->query("SELECT * FROM t_kategori WHERE kategori_hapus = 0 ORDER BY kategori_alpha ASC")->result_array();

		$data['pelajaran_data'] =  $this->db->query("SELECT * FROM t_pelajaran WHERE pelajaran_hapus = 0")->result_array();

		$data['user_data'] = $this->db->query("SELECT * FROM t_user WHERE user_id = '$user'")->row_array();

		$data['semester'] = $sem;
		$data['user'] = $user;

		$data['penilaian'] = 'class="active"';
	    $data['title'] = 'Penilaian Semester';

	    $this->load->view('v_template_admin/admin_header',$data);
	    $this->load->view('penilaian/view',$data);
	    $this->load->view('v_template_admin/admin_footer',$data);
	}
}