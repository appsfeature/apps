<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Bizwiz extends CI_Controller{

    public $module_title = 'Item';
    public $module_url = 'admin/bizwiz';
    public $module_url_list = 'admin/bizwiz';
    public $module_url_create = 'admin/bizwiz/create';
    public $module_url_edit = 'admin/bizwiz/edit';
    public $module_url_delete = 'admin/bizwiz/delete';

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

    //http://localhost/apps/admin/bizwiz
    //This will show content list page
    public function index(){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';;
        $queryString = $this->input->get();
        $querySearch = '';
        if($queryString != null){
            $querySearch = $queryString['title'];
        }
        $whereClause = getContentWhereClause($pkg_id, null, null, null, null);

        $contents = $this->database_model->get_content($whereClause, $queryString);
        $data['contents'] = $contents;
        $data['querySearch'] = $querySearch;
        $data['mainModule'] = 'item';
        $data['subModule'] = 'viewItem';
        $this->load->view($this->module_url.'/list', $data);
    }

    //This will show create page
    public function create(){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';
        $whereClause = getCategoryWhereClause($pkg_id, null, null);
        $categories = $this->database_model->get_category($whereClause);

        $catSpinnerSelected = getPref('catSpinnerSelected');
        $data['categories'] = $categories;
        $data['catSpinnerSelected'] = $catSpinnerSelected;
        $data['mainModule'] = 'item';
        $data['subModule'] = 'createItem';
        $this->load->view($this->module_url.'/create', $data);
    }

    //This will show edit page
    public function edit($contentId = null){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';

        $whereClause = getContentWhereClause($pkg_id, null, null, $contentId, null);
        $content = $this->database_model->get_content($whereClause);

        $whereClause = getCategoryWhereClause($pkg_id, null, null);
        $categories = $this->database_model->get_category($whereClause);

        if($content != null && count($content) == 1){
            $data['content'] = $content[0];
            $data['categories'] = $categories;
            $data['mainModule'] = 'item';
            $data['subModule'] = '';
            $this->load->view($this->module_url.'/edit', $data);
        }else {
            $this->session->set_flashdata('error', 'Item not found');
            redirect(base_url().$this->module_url);
        }
    }

    //This will show delete page
    public function delete($contentId){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';;
        $whereClause = getContentWhereClause($pkg_id, null, null, $contentId, null);

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
                $this->session->set_flashdata('success', 'Item has been deleted');
            }else{
                $this->session->set_flashdata('error', 'Failed to delete Item');
            }
        }else {
            $this->session->set_flashdata('error', 'Item not found');
        }
        redirect(base_url().$this->module_url);
    }
}

?>
