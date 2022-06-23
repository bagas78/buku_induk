<?php
class Penilaian extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['penilaian'] = 'class="active"';
		    $data['title'] = 'Penilaian Semester';

		    $data['data'] = $this->db->query("SELECT * FROM t_user as a LEFT JOIN t_kelengkapan as b ON a.user_id = b.kelengkapan_user WHERE a.user_hapus = 0 AND a.user_level = 3")->result_array();

		    $data['semester_data'] = $this->db->query("SELECT penilaian_semester AS semester FROM t_penilaian WHERE penilaian_hapus = 0")->result_array();

		    // $x = json_decode($data['data'][0]['kelengkapan_data']);

		    // echo '<pre>';
		    // print_r($x->a1);

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('penilaian/index');
		    $this->load->view('v_template_admin/admin_footer');

		}
		else{
			redirect(base_url('login'));
		} 
	} 
	function nilai($user){ 

		$semester = $_POST['semester'];

		$data['data'] = $this->db->query("SELECT * FROM t_penilaian WHERE penilaian_user = '$user' AND penilaian_semester = '$semester' AND penilaian_hapus = 0")->row_array();

		if (@$data['data']) {
			// edit
			$data['status'] = 1;
		} else {
			// new
			$data['status'] = 1;
		}
		
		$data['penilaian'] = 'class="active"';
		$data['title'] = 'Penilaian Semester';

		$data['semester'] = $semester;
		$data['user'] = $user;

		$this->load->view('v_template_admin/admin_header',$data);
		$this->load->view('penilaian/nilai');
		$this->load->view('v_template_admin/admin_footer');
		
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
							'penilaian_np_nilai' => $_POST['np_nilai'], 
							'penilaian_np_predikat' => $_POST['np_predikat'], 
							'penilaian_nk_nilai' => $_POST['nk_nilai'], 
							'penilaian_nk_predikat' => $_POST['nk_predikat'], 
							'penilaian_nss_mapel' => $_POST['nsss_mapel'], 
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
}