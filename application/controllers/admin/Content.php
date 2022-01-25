<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Content extends CI_Controller{

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

    //http://localhost/droidappsmaster/admin/content
    //This will show content list page
    public function index(){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';;
        $queryString = $this->input->get();
        $querySearch = '';
        if($queryString != null){
            $querySearch = $queryString['title'];
        }
        $whereClause = getContentWhereClause($pkg_id, null, null, null);

        $contents = $this->database_model->get_content($whereClause, $queryString);
        $data['contents'] = $contents;
        $data['querySearch'] = $querySearch;
        $this->load->view('admin/content/list', $data);
    }

    //This will show create page
    public function create(){
        $this->load->view('admin/content/create');
    }

    //This will show edit page
    public function edit($contentId){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';

        $whereClause = getContentWhereClause($pkg_id, null, null, $contentId);
        $content = $this->database_model->get_content($whereClause);
        // print_r($content);die;
        if($content != null && count($content) == 1){
            $data['content'] = $content[0];
            $this->load->view('admin/content/edit', $data);
        }else {
            $this->session->set_flashdata('error', 'Content not found');
            redirect(base_url().'admin/content');
        }
    }

    //This will show delete page
    public function delete($contentId){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';;
        $whereClause = getContentWhereClause($pkg_id, null, null, $contentId);

        $contentArray = $this->database_model->get_content($whereClause);
        if($contentArray != null && count($contentArray) == 1){
            $content = $contentArray[0];
            if(!empty($content['image'])){
                if(file_exists('./'.path_image.$content['image'])){
                    unlink('./'.path_image.$content['image']);
                }
                if(file_exists('./'.path_image_thumb.$content['image'])){
                    unlink('./'.path_image_thumb.$content['image']);
                }
            }
            if($this->database_model->delete_content($whereClause)){
                $this->session->set_flashdata('success', 'Content has been deleted');
            }else{
                $this->session->set_flashdata('error', 'Failed to delete Content');
            }
        }else {
            $this->session->set_flashdata('error', 'Content not found');
        }
        redirect(base_url().'admin/content');
    }
}

?>