<?php
class Dokumen extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['dokumen'] = 'class="active"';
		    $data['title'] = 'Upload Dokumen';

		    $id = $this->session->userdata('id');
		    $level = $this->session->userdata('level');
		    
		    if($level == 3){
		        //siswa
		        $data['data'] = $this->db->query("SELECT * FROM t_dokumen as a JOIN t_user as b ON a.dokumen_user = b.user_id WHERE a.dokumen_hapus = 0 AND a.dokumen_user = '$id'")->result_array();
		    }else{
		        //petugas
		        $data['data'] = $this->db->query("SELECT * FROM t_dokumen as a JOIN t_user as b ON a.dokumen_user = b.user_id WHERE a.dokumen_hapus = 0")->result_array();
		    }

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('dokumen/index',$data);
		    $this->load->view('v_template_admin/admin_footer',$data);

		}
		else{
			redirect(base_url('login'));
		} 
	} 
	function add(){ 

		$id = $this->session->userdata('id');

		if (@$_FILES['file']['name']) {
				
			//type file
			$typefile = explode('/', $_FILES['file']['type']);

			//replace Karakter name foto
			$filename = $_FILES['file']['name'];

			//replace name foto
			$type = explode(".", $filename);
	    	$no = count($type) - 1;
	    	$new_name = md5($id).'.'.$type[$no];
	    	///////////////////	

	    	//jenis file boleh di upload
	    	$format = ['jpg','png','jpeg','pdf','doc','docx','txt','pdf','xls','xlsx'];

	    	if (in_array($type[$no], $format)) {
	    		$path = 'assets/gambar/dokumen';
	        	move_uploaded_file($_FILES['file']['tmp_name'], $path.'/'.$new_name);

	        	$status = 1;
	        	$this->session->set_flashdata('success', 'File berhasil di simpan');
	    	}else{
	    		$status = 0;
	    		$this->session->set_flashdata('gagal', 'Format file tidak di dukung');
	    	}

	    	if ($status == 1) {
	    		$set = array(
	    						'dokumen_user' => $id,
	    						'dokumen_name' => $_POST['dokumen_name'],
	    						'dokumen_file' => $new_name,
	    						'dokumen_deskripsi' => $_POST['dokumen_deskripsi'],
	    						'dokumen_type' => $_FILES['file']['type'],
	    					);
	    		$this->db->set($set);
	    		$this->db->insert('t_dokumen');
	    	}

	    	redirect(base_url('dokumen'));
		}
	}
	function update($id){
		$user = $this->session->userdata('id');

		if (@$_FILES['file']['name']) {
				
			//type file
			$typefile = explode('/', $_FILES['file']['type']);

			//replace Karakter name foto
			$filename = $_FILES['file']['name'];

			//replace name foto
			$type = explode(".", $filename);
	    	$no = count($type) - 1;
	    	$new_name = md5($user).'.'.$type[$no];
	    	///////////////////	

	    	//jenis file boleh di upload
	    	$format = ['jpg','png','jpeg','pdf','doc','docx','txt','pdf','xls','xlsx'];

	    	if (in_array($type[$no], $format)) {
	    		$path = 'assets/gambar/dokumen';
	        	move_uploaded_file($_FILES['file']['tmp_name'], $path.'/'.$new_name);

	        	$status = 1;
	        	$this->session->set_flashdata('success', 'File berhasil di simpan');
	    	}else{
	    		$status = 0;
	    		$this->session->set_flashdata('gagal', 'Format file tidak di dukung');
	    	}

	    	if ($status == 1) {
	    		$set = array(
	    						'dokumen_name' => $_POST['dokumen_name'],
	    						'dokumen_file' => $new_name,
	    						'dokumen_deskripsi' => $_POST['dokumen_deskripsi'],
	    						'dokumen_type' => $_FILES['file']['type'],
	    					);
	    		$this->db->where('dokumen_id',$id);
	    		$this->db->set($set);
	    		$this->db->update('t_dokumen');
	    	}
		}else{
			$set = array(
    						'dokumen_name' => $_POST['dokumen_name'],
    						'dokumen_deskripsi' => $_POST['dokumen_deskripsi'],
    					);
    		$this->db->where('dokumen_id',$id);
    		$this->db->set($set);
    		$this->db->update('t_dokumen');
		}

		redirect(base_url('dokumen'));
	}
	function delete($id){
        //hapus user
        $this->db->set('dokumen_hapus',1);
        $this->db->where('dokumen_id',$id);
        $this->db->update('t_dokumen');

		$this->session->set_flashdata('success','Dokumen berhasil di hapus');

		redirect(base_url('dokumen'));
	}
}