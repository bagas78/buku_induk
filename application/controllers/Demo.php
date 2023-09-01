<?php
class Demo extends CI_Controller{

	function __construct(){ 
		parent::__construct();
	} 
	function url($url){
		
		$this->session->set_flashdata('gagal', 'INI HANYA DEMO');
		redirect(base_url($url));
	} 
}