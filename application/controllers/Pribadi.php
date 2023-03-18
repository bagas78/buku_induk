<?php
class Pribadi extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_penilaian');
	}      
	function index(){
		if ( $this->session->userdata('login') == 1) {

			$id = $this->session->userdata('id');
			$level = $this->session->userdata('level');
 
			$data['pribadi'] = 'class="active"';
		    $data['title'] = 'Data Pribadi';
		    

		    if ($level == 2) {
		    	// petugas
		    	
		    	$data['data'] = $this->db->query("SELECT * FROM t_user WHERE user_level = 3")->result_array();

		    	$this->load->view('v_template_admin/admin_header',$data);
			    $this->load->view('pribadi/table',$data);
			    $this->load->view('v_template_admin/admin_footer',$data);

		    } else { 
		    	// siswa

		    	$db = $this->db->query("SELECT * FROM t_pribadi WHERE pribadi_hapus = 0 AND pribadi_siswa = '$id'")->row_array();

		    	$data['data'] = json_decode(@$db['pribadi_data'], TRUE);

		    	$this->load->view('v_template_admin/admin_header',$data);
			    $this->load->view('pribadi/index',$data);
			    $this->load->view('v_template_admin/admin_footer',$data);
		    }

		}
		else{
			redirect(base_url('login'));
		} 
	} 
	function view($id){

		$data['pribadi'] = 'class="active"';
		$data['title'] = 'Data Pribadi';

		$data['user'] = $id;

		$db = $this->db->query("SELECT * FROM t_pribadi WHERE pribadi_hapus = 0 AND pribadi_siswa = '$id'")->row_array();

    	$data['data'] = json_decode(@$db['pribadi_data'], TRUE);

    	$this->load->view('v_template_admin/admin_header',$data);
	    $this->load->view('pribadi/index',$data);
	    $this->load->view('v_template_admin/admin_footer',$data);
	}
	function save(){
		$id = $_POST['id'];

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
	function print($id){

		$db = $this->db->query("SELECT * FROM t_pribadi as a JOIN t_user as b ON a.pribadi_siswa = b.user_id WHERE a.pribadi_hapus = 0 AND a.pribadi_siswa = '$id'")->row_array();

		$data['x'] = $db;

    	$data['data'] = json_decode(@$db['pribadi_data'], TRUE);

    	$this->load->view('pribadi/print',$data);

    	// echo '<pre>';
    	// print_r($data);
	    
	}
	function import(){

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
            $data = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

            $json = array(

            			//A. KETERANGAN TENTANG PESERTA DIDIK
            			'a1' => $data[2]['B'],
            			'a2' => $data[3]['B'], 
            			'a3' => $data[4]['B'], 
            			'a4' => $data[5]['B'], 
            			'a5' => $data[6]['B'], 
            			'a6' => $data[7]['B'], 
            			'a7' => $data[8]['B'], 
            			'a8' => $data[9]['B'], 
            			'a9' => $data[10]['B'], 
            			'a10' => $data[11]['B'], 
            			'a11' => $data[12]['B'], 
            			'a12' => $data[13]['B'], 

            			//B. KETERANGAN TEMPAT TINGGAL
            			'b1' => $data[2]['E'],
            			'b2' => $data[3]['E'],
            			'b3' => $data[4]['E'],
            			'b4' => $data[5]['E'],

            			//C. KETERANGAN KESEHATAN
            			'c1' => $data[16]['B'],
            			'c2' => $data[17]['B'],
            			'c3' => $data[18]['B'],
            			'c4' => $data[19]['B'],
            			'c5' => $data[20]['B'],

            			//D. KETERANGAN PENDIDIKAN
            			'd1' => $data[17]['E'],
            			'd2' => $data[18]['E'],
            			'd3' => $data[19]['E'],
            			'd4' => $data[20]['E'],
            			'd5' => $data[22]['E'],
            			'd6' => $data[23]['E'],
            			'd7' => $data[25]['E'],
            			'd8' => $data[26]['E'],
            			'd9' => $data[27]['E'],
            			'd10' => $data[28]['E'],
            			'd11' => $data[29]['E'],

            			//E. KETERANGAN TENTANG AYAH KANDUNG
            			'e1' => $data[32]['B'],
            			'e2' => $data[33]['B'],
            			'e3' => $data[34]['B'],
            			'e4' => $data[35]['B'],
            			'e5' => $data[36]['B'],
            			'e6' => $data[37]['B'],
            			'e7' => $data[38]['B'],
            			'e8' => $data[39]['B'],
            			'e9' => $data[40]['B'],

            			//F. KETERANGAN TENTANG IBU KANDUNG
            			'f1' => $data[32]['E'],
            			'f2' => $data[33]['E'],
            			'f3' => $data[34]['E'],
            			'f4' => $data[35]['E'],
            			'f5' => $data[36]['E'],
            			'f6' => $data[37]['E'],
            			'f7' => $data[38]['E'],
            			'f8' => $data[39]['E'],
            			'f9' => $data[40]['E'],

            			//G. KETERANGAN TENTANG WALI
            			'g1' => $data[43]['B'],
            			'g2' => $data[44]['B'],
            			'g3' => $data[45]['B'],
            			'g4' => $data[46]['B'],
            			'g5' => $data[47]['B'],
            			'g6' => $data[48]['B'],
            			'g7' => $data[49]['B'],
            			'g8' => $data[50]['B'],

            			//H. KEGEMARAN PESERTA DIDIK
            			'h1' => $data[43]['E'],
            			'h2' => $data[44]['E'],
            			'h3' => $data[45]['E'],
            			'h4' => $data[46]['E'],

            			//I. KETERANGAN PERKEMBANGAN PESERTA DIDIK
            			'i1' => $data[54]['B'],
            			'i2' => $data[55]['B'],
            			'i3' => $data[56]['B'],
            			'i4' => $data[57]['B'],
            			'i5' => $data[58]['B'],
            			'i6' => $data[59]['B'],
            			'i7' => $data[60]['B'],
            			'i8' => $data[61]['B'],
            			'i9' => $data[62]['B'],
            			'i10' => $data[64]['B'],
            			'i11' => $data[65]['B'],
            			'i12' => $data[67]['B'],
            			'i13' => $data[68]['B'],
            			'i14' => $data[69]['B'],

            			//J. KETERANGAN SETELAH SELESAI PENDIDIKAN
            			'j1' => $data[53]['E'],
            			'j2' => $data[55]['E'],
            			'j3' => $data[56]['E'],
            			'j4' => $data[57]['E'],

            			//kosong
            			'k1' => '',
            			'k2' => '',
            		);

            $id = $_POST['id'];

            $set = array(
            				'pribadi_siswa' => $id,
            				'pribadi_data' => json_encode($json),
            			);

			$cek = $this->db->query("SELECT * FROM t_pribadi WHERE pribadi_siswa = '$id'")->num_rows();

			$this->db->set($set);

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

            //hapus file
            unlink($path . $import_xls_file);

			redirect(base_url('pribadi/view/'.$id));   

      } catch (Exception $e) {
           die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' .$e->getMessage());
        }
      }else{
          echo $error['error'];
        }
	}
	function status($id){

		$set = array(
						'user_id' => $id,
						'user_status' => $_POST['user_status'],
						'user_alasan' => $_POST['user_alasan'],
					);

		$this->db->set($set);
		$this->db->where('user_id',$id);
		if ($this->db->update('t_user')) {
			$this->session->set_flashdata('success', 'Data berhasil di simpan');
		} else {
			$this->session->set_flashdata('gagal', 'Data gagal di simpan');
		}

		redirect(base_url('pribadi'));  
	}
	function penilaian($user){

		$data['pribadi'] = 'class="active"';
		$data['title'] = 'Data Pribadi';

		$data['tahun_data'] = $this->db->query("SELECT * FROM t_tahun WHERE tahun_hapus = 0")->result_array();

		$data['user_data'] = $this->db->query("SELECT * FROM t_user WHERE user_hapus = 0 AND user_level = 3")->result_array();

		$data['post_tahun'] = @$_POST['tahun'];
		$data['user_id'] = $user;

    	$this->load->view('v_template_admin/admin_header',$data);
	    $this->load->view('pribadi/penilaian',$data);
	    $this->load->view('v_template_admin/admin_footer',$data);
	}
	function penilaian_data($nama = '', $tahun = ''){

		switch (true) {
			case $nama != '' && $tahun != '':
				$where = array('user_id' => $nama,'tahun_id' => $tahun,'penilaian_hapus' => 0);
				break;
			
			default:
				$where = array('user_id' => $nama, 'penilaian_hapus' => 0);
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
}