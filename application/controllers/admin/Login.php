<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct(){

    parent::__construct();
    //load database
    $this->load->database();
    $this->load->model(array("Admin_model"));
    $this->load->library(array("form_validation"));
  }

  //http://localhost/droidappsmaster/admin/login
    public function index()
    {
      $this->load->view('admin/login');
    }

    public function authenticate()
    {
      $this->form_validation->set_rules("username", "Username", "trim|required");
      $this->form_validation->set_rules("password", "Password", "trim|required");

      if($this->form_validation->run() === FALSE){
         $this->index();
      }else{
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $account = $this->Admin_model->getByUsername($username);
        if(!empty($account)){
            // if(password_verify($password, $account['password']) == true){
            if($password == $account['password']){
              $adminArray['admin_id'] = $account['id'];
              $adminArray['username'] = $account['user_id'];
              $this->session->set_userdata('admin', $adminArray);
              redirect(base_url().'admin/home/index');
            }else{
              $this->session->set_flashdata('msg','Either username or password is incorrect');
              redirect(base_url().'admin/login/index');
            }
        }else {
          $this->session->set_flashdata('msg','Either username or password is incorrect');
          redirect(base_url().'admin/login/index');
        }
      }
    }

    public function logout()
    {
      $this->session->unset_userdata('admin');
      redirect(base_url().'admin/login/index');
    }
}

?>
