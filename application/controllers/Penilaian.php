<?php
class Penilaian extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_penilaian');
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {

			$level = $this->session->userdata('level');

			$data['penilaian'] = 'class="active"';
		    $data['title'] = 'Penilaian Semester';
		   
		    $data['tahun_data'] = $this->db->query("SELECT * FROM t_tahun WHERE tahun_hapus = 0")->result_array();
		    $data['user_data'] = $this->db->query("SELECT * FROM t_user WHERE user_hapus = 0 AND user_level = 3")->result_array();

		    if (@$_POST['nama']) {$data['post_nama'] = @$_POST['nama'];}
		    if (@$_POST['tahun']) {$data['post_tahun'] = @$_POST['tahun'];}

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('penilaian/index',$data);
		    $this->load->view('v_template_admin/admin_footer',$data);
 
		}
		else{
			redirect(base_url('login'));
		} 
	} 
	function get_data($nama = '', $tahun = ''){

		switch (true) {
			case $nama != '' && $tahun != '':
				$where = array('user_id' => $nama,'tahun_id' => $tahun,'penilaian_hapus' => 0);
				break;
			
			default:
				$where = array('penilaian_hapus' => 0);
				break;
		}

	    $data = $this->m_penilaian->get_datatables($where);
		$total = $this->m_penilaian->count_all($where);
		$filter = $this->m_penilaian->count_filtered($where);

		$output = array(
			"draw" => $_GET['draw'],
			"recordsTotal" => $total,
			"recordsFiltered" => $filter,
			"data" => $data,
		);
		//output dalam format JSON
		echo json_encode($output);
	}
	function nilai($id){ 

		$data['data'] = $this->db->query("SELECT * FROM t_penilaian WHERE penilaian_id = '$id'")->row_array();

		if (@$data['data']) {
			// edit
			$data['status'] = 1;
		} else {
			// new
			$data['status'] = 0;
		}

		$data['kategori_data'] =  $this->db->query("SELECT * FROM t_kategori WHERE kategori_hapus = 0")->result_array();

		$data['pelajaran_data'] =  $this->db->query("SELECT * FROM t_pelajaran WHERE pelajaran_hapus = 0")->result_array();
		
		$data['penilaian'] = 'class="active"';
		$data['title'] = 'Penilaian Semester';

		$user = $data['data']['penilaian_user'];
		$db_user = $this->db->query("SELECT * FROM t_user WHERE user_id = '$user'")->row_array();

		$data['nama'] = @$db_user['user_name'];
		$data['semester'] = $data['data']['penilaian_semester'];
		$data['user'] = $user;

		$tahun = $data['data']['penilaian_tahun'];
		$th =  $this->db->query("SELECT * FROM t_tahun WHERE tahun_id = '$tahun'")->row_array();
		$data['tahun_data'] = $th['tahun_text'];
		$data['tahun_id'] = $th['tahun_id'];

		$this->load->view('v_template_admin/admin_header',$data);
		$this->load->view('penilaian/nilai',$data);
		$this->load->view('v_template_admin/admin_footer',$data);
		
	}
	function save(){

		//variable
		$type = $_POST['type'];
		$status = $_POST['status'];
		$user = $_POST['user'];
		$semester = $_POST['semester'];
		$tahun = $_POST['tahun'];

		if ($type == 'text') {

			// text
			$set = array(
							'penilaian_user' => $user, 
							'penilaian_tahun' => $tahun, 
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
										'penilaian_user' => $user,
										'penilaian_tahun' => $tahun, 
										'penilaian_semester' => $semester, 
										'penilaian_file' => $new_name, 
										'penilaian_type' => $type, 
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
	function view_table($id){
		header('Cache-Control: no cache');

		$data['penilaian'] = 'class="active"';
		$data['title'] = 'Penilaian Semester';

		$tahun = $_POST['tahun'];

		$data['data'] = $this->db->query("SELECT * FROM t_penilaian as a JOIN t_tahun as b ON a.penilaian_tahun = b.tahun_id WHERE a.penilaian_user = '$id' AND a.penilaian_tahun = '$tahun'")->result_array();
		$data['id_user'] = $id;
		$data['id_tahun'] = $tahun;

		$this->load->view('v_template_admin/admin_header',$data);
		$this->load->view('penilaian/view_table',$data);
		$this->load->view('v_template_admin/admin_footer',$data);

	}
	function view($id){
		 
		$data['data'] = $this->db->query("SELECT * FROM t_penilaian WHERE penilaian_id = '$id'")->row_array();

		$data['kategori_data'] =  $this->db->query("SELECT * FROM t_kategori WHERE kategori_hapus = 0 ORDER BY kategori_alpha ASC")->result_array();

		$data['pelajaran_data'] =  $this->db->query("SELECT * FROM t_pelajaran WHERE pelajaran_hapus = 0")->result_array();

		$user = $data['data']['penilaian_user'];
		$data['user_data'] = $this->db->query("SELECT * FROM t_user WHERE user_id = '$user'")->row_array();

		$tahun = $data['data']['penilaian_tahun'];
		$data['tahun_data'] = $this->db->query("SELECT * FROM t_tahun WHERE tahun_id = '$tahun'")->row_array();

		$data['semester'] = $data['data']['penilaian_semester'];

		$data['penilaian'] = 'class="active"';
	    $data['title'] = 'Penilaian Semester';

	    $this->load->view('v_template_admin/admin_header',$data);
	    $this->load->view('penilaian/view',$data);
	    $this->load->view('v_template_admin/admin_footer',$data);
	}
	function import(){

		$tahun = @$_POST['penilaian_tahun'];

		$path = 'assets/';
        require_once APPPATH . "/third_party/PHPExcel.php";
        $config['upload_path'] = $path;
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['remove_spaces'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('uploadFile')) {
            $error = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
        }

        if(empty($error)){
          if (!empty($data['upload_data']['file_name'])) {
            $import_xls_file = $data['upload_data']['file_name'];
        } else {
            $import_xls_file = 0;
        }

        $inputFileName = $path . $import_xls_file;
         
        try {

            $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFileName);
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            $flag = true;
            $i=0;

            $nis_success = array();
            $nis_gagal = array();
            foreach ($allDataInSheet as $value) {
              if($flag){
                $flag =false;
                continue;
              }

              if ($i > 0) {
              		
              	@$nis = $value['A'];	
              	$id = $this->db->query("SELECT user_id as id  FROM t_user WHERE user_nis = '$nis'")->row_array();
              	@$user = @$id['id'];

              	if (@$nis != '') {
              		//nis tidak kosong

              		if (@$user) {

	              		//create json data
	              		$json[$i]['semester'] = $value['C'];
						$json[$i]['user'] = @$user;
						$json[$i]['status'] = '1';
						$json[$i]['type'] = 'text';

	              		$json[$i]['1_np_angka'] = $value['D'];
	              		$json[$i]['1_np_predikat'] = $value['E'];
						$json[$i]['1_nk_angka'] = $value['F'];
						$json[$i]['1_nk_predikat'] = $value['G'];
						$json[$i]['1_nss_mapel'] = $value['H'];

						$json[$i]['2_np_angka'] = $value['I'];
	              		$json[$i]['2_np_predikat'] = $value['J'];
						$json[$i]['2_nk_angka'] = $value['K'];
						$json[$i]['2_nk_predikat'] = $value['L'];
						$json[$i]['2_nss_mapel'] = $value['M'];

						$json[$i]['3_np_angka'] = $value['N'];
	              		$json[$i]['3_np_predikat'] = $value['O'];
						$json[$i]['3_nk_angka'] = $value['P'];
						$json[$i]['3_nk_predikat'] = $value['Q'];
						$json[$i]['3_nss_mapel'] = $value['R'];

						$json[$i]['4_np_angka'] = $value['S'];
	              		$json[$i]['4_np_predikat'] = $value['T'];
						$json[$i]['4_nk_angka'] = $value['U'];
						$json[$i]['4_nk_predikat'] = $value['V'];
						$json[$i]['4_nss_mapel'] = $value['W'];

						$json[$i]['5_np_angka'] = $value['X'];
	              		$json[$i]['5_np_predikat'] = $value['Y'];
						$json[$i]['5_nk_angka'] = $value['Z'];
						$json[$i]['5_nk_predikat'] = $value['AA'];
						$json[$i]['5_nss_mapel'] = $value['AB'];

						$json[$i]['6_np_angka'] = $value['AC'];
	              		$json[$i]['6_np_predikat'] = $value['AD'];
						$json[$i]['6_nk_angka'] = $value['AE'];
						$json[$i]['6_nk_predikat'] = $value['AF'];
						$json[$i]['6_nss_mapel'] = $value['AG'];

						$json[$i]['7_np_angka'] = $value['AH'];
	              		$json[$i]['7_np_predikat'] = $value['AI'];
						$json[$i]['7_nk_angka'] = $value['AJ'];
						$json[$i]['7_nk_predikat'] = $value['AK'];
						$json[$i]['7_nss_mapel'] = $value['AL'];

						$json[$i]['8_np_angka'] = $value['AM'];
	              		$json[$i]['8_np_predikat'] = $value['AN'];
						$json[$i]['8_nk_angka'] = $value['AO'];
						$json[$i]['8_nk_predikat'] = $value['AP'];
						$json[$i]['8_nss_mapel'] = $value['AQ'];

						$json[$i]['9_np_angka'] = $value['AR'];
	              		$json[$i]['9_np_predikat'] = $value['AS'];
						$json[$i]['9_nk_angka'] = $value['AT'];
						$json[$i]['9_nk_predikat'] = $value['AU'];
						$json[$i]['9_nss_mapel'] = $value['AV'];
						//end

	              		//data
	              		$insertdata[$i]['penilaian_user'] = @$user;
	              		$insertdata[$i]['penilaian_tahun'] = $tahun;
	              		$insertdata[$i]['penilaian_semester'] = $value['C'];
	              		$insertdata[$i]['penilaian_data'] = json_encode($json[$i]);
	              		$insertdata[$i]['penilaian_type'] = 'text';
	              		$insertdata[$i]['penilaian_file'] = '';	

	              		$nis_success[] = $nis;	
	              	
	              	}else{

	              		$nis_gagal[] = $nis;
	              		
	              	}
              	}

              }

              $i++;
            
            } 

            //alert
            $success = implode(',',$nis_success);
            $gagal = implode(',',$nis_gagal);

            if (@$success) {

            	//save ke database
	            foreach ($insertdata as $val) {
	            	
	            	$user_id = $val['penilaian_user'];
	            	$user_semester = $val['penilaian_semester'];

	            	//cek exist data
	            	$cek = $this->db->query("SELECT * FROM t_penilaian WHERE penilaian_user = '$user_id' AND penilaian_semester = '$user_semester' AND penilaian_tahun = '$tahun'")->num_rows();

	            	if (@!$cek) {
	            		
	            		//save database not exist
	            		$this->db->insert('t_penilaian',$val);
	            	}
	            }
            	
            	$this->session->set_flashdata('success','NISN "'.@$success.'" berhasil di simpan');
            }

            if (@$gagal) {
            	
            	$this->session->set_flashdata('gagal', 'NISN "'.@$gagal.'" tidak di temukan');
            }

            //hapus file xls di assets
            unlink($path . $import_xls_file);

			redirect(base_url('penilaian'));   

      } catch (Exception $e) {
           die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' .$e->getMessage());
        }
      }else{
          echo $error['error'];
        }
	}
}