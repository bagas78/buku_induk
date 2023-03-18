<?php
class Lintas extends CI_Controller{

	function __construct(){
		parent::__construct();
	}  
	function index(){
		if ( $this->session->userdata('login') == 1) {
			$data['lintas'] = 'class="active"';
		    $data['title'] = 'Lintas Minat / Pendalaman'; 

		    $level = $this->session->userdata('level');
		    $id = $this->session->userdata('id');

		    if ($level == 2) {
		    	// petugas
		    	$data['data'] = $this->db->query("SELECT * FROM t_lintas as a JOIN t_user as b ON a.lintas_user = b.user_id WHERE a.lintas_hapus = 0 AND  b.user_hapus = 0")->result_array();
		    } else {
		    	// siswa
		    	$data['data'] = $this->db->query("SELECT * FROM t_lintas as a JOIN t_user as b ON a.lintas_user = b.user_id WHERE a.lintas_hapus = 0 AND a.lintas_user = '$id' AND  b.user_hapus = 0")->result_array();
		    }

		    $this->load->view('v_template_admin/admin_header',$data);
		    $this->load->view('lintas/index',$data);
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
	    	$format = ['jpg','png','jpeg'];

	    	if (in_array($type[$no], $format)) {
	    		$path = 'assets/gambar/lintas';
	        	move_uploaded_file($_FILES['file']['tmp_name'], $path.'/'.$new_name);

	        	$status = 1;
	        	$this->session->set_flashdata('success', 'File berhasil di simpan');
	    	}else{
	    		$status = 0;
	    		$this->session->set_flashdata('gagal', 'Format file tidak di dukung');
	    	}

	    	if ($status == 1) {
	    		$set = array(
	    						'lintas_user' => $id,
	    						'lintas_semester' => $_POST['lintas_semester'],
	    						'lintas_file' => $new_name,
	    						'lintas_deskripsi' => $_POST['lintas_deskripsi'],
	    						'lintas_type' => $_FILES['file']['type'],
	    					);
	    		$this->db->set($set);
	    		$this->db->insert('t_lintas');
	    	}

	    	redirect(base_url('lintas'));
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
	    	$format = ['jpg','png','jpeg'];

	    	if (in_array($type[$no], $format)) {
	    		$path = 'assets/gambar/lintas';
	        	move_uploaded_file($_FILES['file']['tmp_name'], $path.'/'.$new_name);

	        	$status = 1;
	        	$this->session->set_flashdata('success', 'File berhasil di simpan');
	    	}else{
	    		$status = 0;
	    		$this->session->set_flashdata('gagal', 'Format file tidak di dukung');
	    	}

	    	if ($status == 1) {
	    		$set = array(
	    						'lintas_semester' => $_POST['lintas_semester'],
	    						'lintas_file' => $new_name,
	    						'lintas_deskripsi' => $_POST['lintas_deskripsi'],
	    						'lintas_type' => $_FILES['file']['type'],
	    					);
	    		$this->db->where('lintas_id',$id);
	    		$this->db->set($set);
	    		$this->db->update('t_lintas');
	    	}
		}else{
			$set = array(
    						'lintas_semester' => $_POST['lintas_semester'],
    						'lintas_deskripsi' => $_POST['lintas_deskripsi'],
    					);
    		$this->db->where('lintas_id',$id);
    		$this->db->set($set);
    		$this->db->update('t_lintas');
		}

		redirect(base_url('lintas'));
	}
	function delete($id){
        //hapus user
        $this->db->set('lintas_hapus',1);
        $this->db->where('lintas_id',$id);
        $this->db->update('t_lintas');

		$this->session->set_flashdata('success','Dokumen berhasil di hapus');

		redirect(base_url('lintas'));
	}
}