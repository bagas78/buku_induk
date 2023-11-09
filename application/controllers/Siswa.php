<?php
class Siswa extends CI_Controller{
 
	function __construct(){
		parent::__construct();
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['siswa'] = 'class="active"';
		    $data['title'] = 'Siswa';
		    $data['data'] = $this->db->query("SELECT * FROM t_user as a JOIN t_pribadi as b ON a.user_id = b.pribadi_siswa WHERE a.user_hapus = 0 AND a.user_level = '3'")->result_array();

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('siswa/index',$data);
		    $this->load->view('v_template_admin/admin_footer',$data);

		}
		else{
			redirect(base_url('login'));
		}  
	} 
	function add(){ 
		$email = $_POST['user_email'];
		$name = $_POST['user_name'];
		$nis = $_POST['user_nis'];
		$nisn =  $_POST['user_nisn'];

		//cek
        $cek = $this->db->query("SELECT * FROM t_user WHERE user_email = '$email' AND user_nis = '$nis' AND user_nisn = '$nisn'")->num_rows();

		if ($cek > 0) {
			$this->session->set_flashdata('gagal','Email / NIS / NISN sudah di ada !!');
			redirect(base_url('siswa'));
		}else{

			//id
			$user_id = $this->db->query("SELECT * FROM t_user order by user_id desc limit 1")->row_array();
			$id = $user_id['user_id']+1;

			$set = array(
							'user_id' => $id,
							'user_name' => $name, 
							'user_nis' => $nis,
							'user_nisn' => $nisn, 
							'user_email' => $email, 
							'user_password' => md5($_POST['user_password']),
							'user_tanggal'	=> date('Y-m-d'),
							'user_level' => 3,
						);
			$db = $this->query_builder->add('t_user',$set);

			if ($db == 1) {

				//detail user
				$set1 = array('detail_id_user' => $id);
				$this->query_builder->add('t_detail_user',$set1);

				//data pribadi
				$set2 = array('pribadi_siswa' => $id, 'pribadi_data' => '{"a1":"'.$name.'"}');
				$this->query_builder->add('t_pribadi',$set2);

				$this->session->set_flashdata('success','Data berhasil di tambah');
			}else{

				$this->session->set_flashdata('gagal','Data gagal di tambah');
			}

			redirect(base_url('siswa'));
		}
	}
	function delete($id){
        //hapus user
        $this->db->set('user_hapus',1);
        $this->db->where('user_id',$id);
        $this->db->update('t_user');

		$this->session->set_flashdata('success','Data berhasil di hapus');

		redirect(base_url('siswa'));
	}
	function update($id){
		$x = $_POST['user_email'];
		$set = array(
						'user_name' => $_POST['user_name'], 
						'user_nis' => $_POST['user_nis'],
						'user_nisn' => $_POST['user_nisn'], 
						'user_email' => $x, 
						'user_password' => md5($_POST['user_password']),
						'user_tanggal'	=> date('Y-m-d'),
					);
		$db = $this->query_builder->update('t_user',$set,'user_id ='.$id);

		if ($db == 1) {
			$this->session->set_flashdata('success','Data berhasil di rubah');
		}else{
			$this->session->set_flashdata('gagal','Data gagal di rubah');
		}

		redirect(base_url('siswa'));
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
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            $flag = true;

            $nis_success = array();
            $nis_gagal = array();
            foreach ($allDataInSheet as $value) {
              if($flag){
                $flag =false;
                continue;
              }
              	
	          	@$name = $value['A']; 
	          	@$nis = $value['B'];
				@$nisn = $value['C'];
				@$email = $value['D'];
				@$password = md5($nis);		

				if ($nis != '') {

					//cek
					$cek = $this->db->query("SELECT * FROM t_user WHERE user_nis = '$nis' AND user_nisn = '$nisn' AND  user_email = '$email' AND user_hapus = 0")->num_rows();

	              	if (@$cek == 0) {

	              		//id
						$user_id = $this->db->query("SELECT * FROM t_user order by user_id desc limit 1")->row_array();
						$id = $user_id['user_id']+1;
	         			
	          			//save ke database
	              		$set = array(
	              						'user_id' => $id,
	              						'user_name' => $name,
	              						'user_nis' => $nis,
	              						'user_nisn' => $nisn,
	              						'user_email' => $email,
	              						'user_password' => $password,
	              						'user_level' => 3,
	              					);

		            	$this->db->set($set);
		            	$db = $this->db->insert('t_user');

		            	if ($db == 1) {

							//detail user
							$set1 = array('detail_id_user' => $id);
							$this->query_builder->add('t_detail_user',$set1);

							//data pribadi
							$set2 = array('pribadi_siswa' => $id, 'pribadi_data' => '{"a1":"'.$name.'"}');
							$this->query_builder->add('t_pribadi',$set2);
						}

	              		//nis tidak ada
	              		$nis_success[] = $nis;

	          		}else{

	              		//nis ada
	              		$nis_gagal[] = $nis;
	              	}
	          		
	          	}

	          } 

            //alert
            $success = implode(',',$nis_success);
            $gagal = implode(',',$nis_gagal);

            if (@$success) {
            	
            	$this->session->set_flashdata('success','NISN "'.@$success.'" berhasil di simpan');
            }

            if (@$gagal) {
            	
            	$this->session->set_flashdata('gagal', 'NISN "'.@$gagal.'" sudah ada');
            }

            //hapus file xls di assets
            unlink($path . $import_xls_file);

			redirect(base_url('siswa'));   

      } catch (Exception $e) {
           die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                    . '": ' .$e->getMessage());
        }
      }else{
          echo $error['error'];
        }
	}
}