<?php
class Profile extends CI_Controller{

	function __construct(){
		parent::__construct(); 
	}
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$id = $this->session->userdata('id');
			$data['data'] = $this->db->query("SELECT * FROM t_user AS a LEFT JOIN t_detail_user AS b ON a.user_id = b.detail_id_user WHERE a.user_id = '$id'")->result_array();

			$data['profile'] = 'class="active"';
			$data['title'] = 'Profile'; 
			$this->load->view('v_template_admin/admin_header',$data);
			$this->load->view('profile/index',$data);
			$this->load->view('v_template_admin/admin_footer',$data);
		}else{
			redirect(base_url('login')); 
		}
	}
	function update($id){
		$data = $this->input->post();

		if (@$_FILES['foto']['name']) {
			
			if($_FILES['foto']['size'] <= 0){
				$this->session->set_flashdata('gagal','Foto tidak boleh lebih dari 2 MB');
				redirect(base_url('profile'));
			}
			else{

				//config uplod foto
				  $config = array(
				  'upload_path' 	=> './assets/gambar/user',
				  'allowed_types' 	=> "gif|jpg|png|jpeg",
				  'overwrite' 		=> TRUE,
				  // 'max_size' 		=> "2048000",
				  // 'max_height' 		=> "10000",
				  // 'max_width' 		=> "20000"
				  );

				//upload foto
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					//replace Karakter name foto
					$name_foto = $_FILES['foto']['name'];
					$char = array('!', '&', '?', '/', '/\/', ':', ';', '#', '<', '>', '=', '^', '@', '~', '`', '{', '}', ' ');
			        $foto = str_replace($char, '_', $name_foto);
			        $char1 = array('[',']');
			        $foto1 = str_replace($char1, '', $foto);

					//t_user
					$set2 = array(
									'user_name' => $data['username'], 
									'user_email' => $data['email'],
									'user_foto' => $foto1
								);
					$this->db->set($set2);
					$this->db->where('user_id',$id);
					$this->db->update('t_user');

					$cek_detail = $this->db->query("SELECT * FROM t_detail_user WHERE detail_id_user = '$id'")->num_rows();

					//t_detail_user
					$set1 = array(
									'detail_jabatan' => $data['position'], 
									'detail_pendidikan' => $data['education'],
									'detail_alamat' => $data['address'],
									'detail_biodata' => $data['biodata']
								);

					if ($cek_detail == 0) {
						
						$this->db->set($set1);
						$this->db->insert('t_detail_user');

					}else{

						$this->db->set($set1);
						$this->db->where('detail_id',$id);
						$this->db->update('t_detail_user');
					}


			    	$this->session->set_flashdata('success','Data berhasil di perbaharui');
				} else {
					$this->session->set_flashdata('gagal','Data gagal di perbaharui');
				}

				
				redirect(base_url('profile'));
			}

		}else{
			//t_user
			$set2 = array(
							'user_name' => $data['username'], 
							'user_email' => $data['email'],
						);
			$this->db->set($set2);
			$this->db->where('user_id',$id);
			$this->db->update('t_user');

			$cek_detail = $this->db->query("SELECT * FROM t_detail_user WHERE detail_id_user = '$id'")->num_rows();

			//t_detail_user
			$set1 = array(
							'detail_jabatan' => $data['position'], 
							'detail_pendidikan' => $data['education'],
							'detail_alamat' => $data['address'],
							'detail_biodata' => $data['biodata'],
							'detail_id_user' => $id,
						);

			if ($cek_detail == 0) {
				
				$this->db->set($set1);
				$this->db->insert('t_detail_user');

			}else{

				$this->db->set($set1);
				$this->db->where('detail_id',$id);
				$this->db->update('t_detail_user');
			}


			$this->session->set_flashdata('success','Data berhasil di perbaharui');
			redirect(base_url('profile'));
		}
		
	}
	function update_password($id){
		$data = $this->input->post();
		
		$this->db->set('user_password' , md5($data['newpass']));
		$this->db->where('user_id',$id);
		$this->db->update('t_user');

		redirect(base_url('profile'));
	}
} 