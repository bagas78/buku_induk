<?php 
class SYS_Controller extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->login) {
			redirect(base_url('login'));
		}
		// $this_page = $this->router->fetch_class();
		// $controller = $this->db->where('id', $this->session->level)->get('sys_group')->row()->controller;
		// $controller = json_decode($controller);
		// $role = array();
		// foreach ($controller as $val) $role[] = $val->controller;
		// if (!in_array($this_page, $role)) redirect(base_url());
	}

}