<?php
class Sekolah extends CI_Controller{

	function __construct(){
		parent::__construct();
	}
	function save(){ 		
		//update informasi
		$set = array(
							'sekolah_nama' => @$_POST['sekolah_nama'],
							'sekolah_nss' => @$_POST['sekolah_nss'],
							'sekolah_alamat' => @$_POST['sekolah_alamat'],
							'sekolah_desa' => @$_POST['sekolah_desa'],
							'sekolah_kecamatan' => @$_POST['sekolah_kecamatan'],
							'sekolah_kabupaten' => @$_POST['sekolah_kabupaten'],
							'sekolah_provinsi' => @$_POST['sekolah_provinsi'],
							'sekolah_nama_kepala' => @$_POST['sekolah_nama_kepala'],
							'sekolah_nip_kepala' => @$_POST['sekolah_nip_kepala'],
							'sekolah_tahun_pelajaran' => @$_POST['sekolah_tahun_pelajaran'],
						);
		$this->db->set($set);

		$cek = $this->db->query("SELECT * FROM t_sekolah")->num_rows();

		if (@$cek > 0) {
			// edit
			$x = $this->db->update('t_sekolah');

		} else {
			// insert
			$x = $this->db->insert('t_sekolah');
		}	

		//upload logo
		$logo = @$_FILES['logo'];

		if (@$logo) {

			//type file
	        $typefile = explode('/', $logo['type']);

	        //replace Karakter name foto
	        $filename = $logo['name'];

	        //replace name
	        $type = explode(".", $filename);
	        $no = count($type) - 1;
	        $new_name = md5(time()).'.'.$type[$no];
			
			//config upload
		  	$config = array(
		  	'upload_path' 		=> './assets/gambar/logo',
		  	'allowed_types' 	=> "gif|jpg|png|jpeg",
		  	'overwrite' 		=> TRUE,
		  	'file_name'			=> $new_name,
		  	// 'max_size' 		=> "2048000",
		  	// 'max_height' 		=> "10000",
		  	// 'max_width' 		=> "20000"
		  	);

			//upload logo
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('logo')) {
				
				$this->db->set('sekolah_logo',$new_name);
				$this->db->update('t_sekolah');
			}	
		}

		//alert
		if ($x) {

			$this->session->set_flashdata('success','Data berhasil di simpan');
		} else {
			
			$this->session->set_flashdata('gagal','Data gagal di simpan');
		}

		redirect(base_url('dashboard'));
	}
}