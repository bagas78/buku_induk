<?php
class Login extends CI_Controller{

  function __construct(){
    parent::__construct();
  }
  function index(){
    $this->load->view('login');
  } 
  function auth(){
    $email = $this->input->post('user_email');
    $pass = md5($this->input->post('user_password'));

    $cek = $this->query_builder->login('t_user',$email,$pass);
   
        if (count($cek[0]['user_email']) > 0) { 
          
              //ciptakan sesi
              $this->session->set_userdata('name',$cek[0]['user_name']);
              $this->session->set_userdata('pass',$cek[0]['user_password']);
              $this->session->set_userdata('foto',$cek[0]['user_foto']);
              $this->session->set_userdata('level',$cek[0]['user_level']);

              $this->session->set_userdata('id',$cek[0]['user_id']);
              $this->session->set_userdata('login','1');
              
              redirect(base_url('dashboard'));
      }
      else{
         $this->session->set_flashdata('gagal','Email / Password salah');
         redirect(base_url('login'));
      }
  }
  function logout(){
    session_destroy();
    redirect(base_url('login')); 
  }
}