<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Account extends CI_Controller{

    public $module_title = 'Accounts';
    public $module_url = 'admin/account';
    public $module_url_list = 'admin/account';
    public $module_url_edit = 'admin/account/edit';
    public $module_url_delete = 'admin/account/delete';

    public function __construct(){
        parent::__construct();
        $admin = $this->session->userdata('admin');
        if(empty($admin)){
          $this->session->set_flashdata('msg','Your session has been expired!');
            redirect(base_url().'admin/login/index');
        }
        $this->load->model(array(version_prefix."database_model"));
        $this->load->library(array("form_validation"));
        $this->load->helper("common_helper");
    }

    //Reset and open list
    public function list(){
        $this->index();
    }

    //http://localhost/apps/admin/itemtype
    public function index(){
        $accounts = $this->database_model->get_accounts();
        $apps = $this->database_model->get_apps();

        $data['accounts'] = $accounts;
        $data['apps'] = $apps;
        $this->load->view($this->module_url.'/list', $data);
    }

    //This will show edit page
    public function edit($id = null){
        $whereClause['id'] = $id;
        $accounts = $this->database_model->get_account($whereClause);
        $apps = $this->database_model->get_apps();

        if($accounts != null && count($accounts) == 1){
            $data['account'] = $accounts[0];
            $data['apps'] = $apps;
            $this->load->view($this->module_url.'/edit', $data);
        }else {
            $this->session->set_flashdata('error', 'Account not found');
            redirect(base_url().$this->module_url);
        }
    }

    //This will show delete page
    public function delete($id){
        $whereClause['id'] = $id;
        $itemArray = $this->database_model->get_account($whereClause);
        if($itemArray != null && count($itemArray) == 1){
            if($this->database_model->delete_account($whereClause)){
                $this->session->set_flashdata('success', 'Account has been deleted');
            }else{
                $this->session->set_flashdata('error', 'Failed to delete Account');
            }
        }else {
            $this->session->set_flashdata('error', 'Account not found');
        }
        redirect(base_url().$this->module_url);
    }
}

?>
