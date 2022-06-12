<?php 
class SYS_Authentication {
	public function __construct() {
		parent::__construct();
		redirect(base_url('login'));
	}
}