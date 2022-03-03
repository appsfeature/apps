<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Apps extends CI_Controller{

    public $module_title = 'Apps';
    public $module_url = 'admin/apps';
    public $module_url_list = 'admin/apps';
    public $module_url_edit = 'admin/apps/edit';
    public $module_url_delete = 'admin/apps/delete';

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
        $apps = $this->database_model->get_apps();

        $data['apps'] = $apps;
        $this->load->view($this->module_url.'/list', $data);
    }

    //This will show edit page
    public function edit($id = null){
        $whereClause['app_id'] = $id;
        $apps = $this->database_model->get_app($whereClause);

        if($apps != null && count($apps) == 1){
            $data['app'] = $apps[0];
            $this->load->view($this->module_url.'/edit', $data);
        }else {
            $this->session->set_flashdata('error', 'App not found');
            redirect(base_url().$this->module_url);
        }
    }

    //This will show delete page
    public function delete($id){
        $whereClause['app_id'] = $id;
        $itemArray = $this->database_model->get_app($whereClause);
        if($itemArray != null && count($itemArray) == 1){
            if($this->database_model->delete_app($whereClause)){
                $this->session->set_flashdata('success', 'App has been deleted');
            }else{
                $this->session->set_flashdata('error', 'Failed to delete App');
            }
        }else {
            $this->session->set_flashdata('error', 'App not found');
        }
        redirect(base_url().$this->module_url);
    }
}

?>
