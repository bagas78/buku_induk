<?php
class Sekolah extends CI_Controller{

	function __construct(){
		parent::__construct();
	}
	function save(){ 
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

		if ($x) {

			$this->session->set_flashdata('success','Data berhasil di simpan');
		} else {
			
			$this->session->set_flashdata('gagal','Data gagal di simpan');
		}

		redirect(base_url('dashboard'));
	}
}