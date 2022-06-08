<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Category extends CI_Controller{

    public $flavour = 0;
    public $module_title = 'Categories';
    public $module_url = 'admin/category';
    public $module_url_list = 'admin/category';
    public $module_url_create = 'admin/category/create';
    public $module_url_edit = 'admin/category/edit';
    public $module_url_delete = 'admin/category/delete';

    public $module_url_mapping = 'admin/category/mapping';
    public $module_url_listmaster = 'admin/category/listmaster';
    public $module_url_editmaster = 'admin/category/editmaster';
    public $module_url_deletemaster = 'admin/category/deletemaster';

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

    //http://localhost/apps/admin/category
    //This will show category list page
    public function index(){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';;
        $queryString = $this->input->get();
        $subCatIdSelected = getPref('subCatIdSelected');
        $itemTypeSelected = getPref('itemTypeSelected');
        $querySearch = '';
        if(!empty($queryString)){
            if(array_key_exists("item_type", $queryString)){
                $itemTypeSelected = $queryString['item_type'];
                savePref('itemTypeSelected', $itemTypeSelected);
            }
            if(array_key_exists("title", $queryString)){
                $querySearch = $queryString['title'];
            }
            if(array_key_exists("sub_cat_id", $queryString)){
                $subCatIdSelected = $queryString['sub_cat_id'];
                savePref('subCatIdSelected', $subCatIdSelected);
            }
        }
        $whereClause = getCategoryWhereClause($pkg_id, null, null);

        $subCategories = $this->database_model->get_category($whereClause);

        $category = $this->database_model->get_category_master($whereClause, $queryString, true);

        $whereClause['flavour'] = $this->flavour;
        $itemTypes = $this->database_model->get_item_type_flavour($whereClause);
        $itemTypeMap = null;
        foreach ($itemTypes as $value) {
            $itemTypeMap[$value['item_type']] = $value['title'];
        }
        $categoryMap = null;
        foreach ($subCategories as $value1) {
            $categoryMap[$value1['cat_id']] = $value1['title'];
        }

        $data['categories'] = $category;
        $data['subCategories'] = $subCategories;
        $data['categoryMap'] = $categoryMap;
        $data['subCatIdSelected'] = $subCatIdSelected;
        $data['itemTypeSelected'] = $itemTypeSelected;
        $data['querySearch'] = $querySearch;
        $data['itemTypes'] = $itemTypes;
        $data['itemTypeMap'] = $itemTypeMap;
        $data['mainModule'] = 'category';
        $data['subModule'] = 'viewCategory';
        $this->load->view($this->module_url.'/list', $data);
    }

    //Reset and open list
    public function list(){
        savePref('subCatIdSelected', '');
        savePref('itemTypeSelected', '');
        $this->index();
    }

    //This will show create page
    public function create($subCatId = null){
        if(isset($subCatId)){
            savePref('subCatIdSelected', $subCatId);
        }
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';;
        $whereClause = getCategoryWhereClause($pkg_id, null, null);
        $categories = $this->database_model->get_category($whereClause);
        $whereClause['flavour'] = $this->flavour;
        $itemTypes = $this->database_model->get_item_type_flavour($whereClause);
        $subCatIdSelected = getPref('subCatIdSelected');
        $itemTypeSelected = getPref('itemTypeSelected');
        $data['categories'] = $categories;
        $data['itemTypes'] = $itemTypes;
        $data['subCatIdSelected'] = $subCatIdSelected;
        $data['itemTypeSelected'] = $itemTypeSelected;
        $data['mainModule'] = 'category';
        $data['subModule'] = 'createCategory';
        $this->load->view($this->module_url.'/create', $data);
    }

    //This will show edit page
    public function edit($catId = null){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';;
        $whereClause = getCategoryWhereClause($pkg_id, $catId, null);
        $category = $this->database_model->get_category($whereClause);

        $whereClause = getCategoryWhereClause($pkg_id, null, null);
        $allCategories = $this->database_model->get_category($whereClause);

        $whereClause['flavour'] = $this->flavour;
        $itemTypes = $this->database_model->get_item_type_flavour($whereClause);
        if($category != null && count($category) == 1){
            $data['category'] = $category[0];
            $data['categories'] = $allCategories;
            $data['itemTypes'] = $itemTypes;
            $data['mainModule'] = 'category';
            $data['subModule'] = '';
            $this->load->view($this->module_url.'/edit', $data);
        }else {
            $this->session->set_flashdata('error', 'Category not found');
            redirect(base_url().$this->module_url);
        }
    }

    //This will show create page
    public function mapping(){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';;
        $whereClause = getCategoryWhereClause($pkg_id, null, null);
        $categories = $this->database_model->get_category($whereClause);
        $whereClause['flavour'] = $this->flavour;
        $itemTypes = $this->database_model->get_item_type_flavour($whereClause);
        $subCatIdSelected = '';//getPref('subCatIdSelected');
        $itemTypeSelected = getPref('itemTypeSelected');
        $data['categories'] = $categories;
        $data['itemTypes'] = $itemTypes;
        $data['subCatIdSelected'] = $subCatIdSelected;
        $data['itemTypeSelected'] = $itemTypeSelected;
        $data['mainModule'] = 'category';
        $data['subModule'] = 'mappingCategory';
        $this->load->view($this->module_url.'/master/mapping', $data);
    }

    //This will show create page
    public function listmaster(){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';
        $queryString = $this->input->get();
        $catIdSelected = '';
        $subCatIdSelected = '';
        if(!empty($queryString)){
            if(array_key_exists("cat_id", $queryString)){
                $catIdSelected = $queryString['cat_id'];
            }
            if(array_key_exists("sub_cat_id", $queryString)){
                $subCatIdSelected = $queryString['sub_cat_id'];
            }
        }

        $whereClause = getCategoryWhereClause($pkg_id, null, null);

        $categories = $this->database_model->get_category($whereClause);
        $categoryMap = null;
        foreach ($categories as $value1) {
            $categoryMap[$value1['cat_id']] = $value1['title'];
        }

        $categoriesMaster = $this->database_model->get_cat_master($whereClause, $queryString);

        $data['categories'] = $categories;
        $data['categoriesMaster'] = $categoriesMaster;
        $data['categoryMap'] = $categoryMap;
        $data['catIdSelected'] = $catIdSelected;
        $data['subCatIdSelected'] = $subCatIdSelected;
        $data['mainModule'] = 'category';
        $data['subModule'] = 'listmaster';
        $this->load->view($this->module_url.'/master/list', $data);
    }

    //This will show edit page
    public function editmaster($id = null){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';

        $whereClause1 = getCategoryWhereClause($pkg_id, null, null);
        $categories = $this->database_model->get_category($whereClause1);
        $categoryMap = null;
        foreach ($categories as $value1) {
            $categoryMap[$value1['cat_id']] = $value1['title'];
        }

        $whereClause['id'] = $id;
        $categoriesMaster = $this->database_model->get_cat_master($whereClause);

        if($categoriesMaster != null && count($categoriesMaster) == 1){
            $data['categoriesMaster'] = $categoriesMaster[0];
            $data['categories'] = $categories;
            $data['categoryMap'] = $categoryMap;
            $data['mainModule'] = 'category';
            $data['subModule'] = '';
            $this->load->view($this->module_url.'/master/edit', $data);
        }else {
            $this->session->set_flashdata('error', 'Category not found');
            redirect(base_url().$this->module_url.'/master/list');
        }
    }

    //This will show delete page
    public function deletemaster($id){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';;

        $whereClause['pkg_id'] = $pkg_id;
        $whereClause['id'] = $id;
        $categoriesMaster = $this->database_model->get_cat_master($whereClause);

        if($categoriesMaster != null && count($categoriesMaster) == 1){
            if($this->database_model->delete_category_master($whereClause)){
                $this->session->set_flashdata('success', 'Category Master has been deleted');
            }else{
                $this->session->set_flashdata('error', 'Failed to delete Category Master');
            }
        }else {
            $this->session->set_flashdata('error', 'Category Master not found');
        }
        redirect(base_url().$this->module_url_listmaster);
    }

    //This will show delete page
    public function delete($catId){
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';;
        $whereClause = getCategoryWhereClause($pkg_id, $catId, null);

        $categoryArray = $this->database_model->get_category($whereClause);
        if($categoryArray != null && count($categoryArray) == 1){
            $whereClause2 = getContentWhereClause($pkg_id, null, $catId, null, null);
            $contentArray = $this->database_model->get_content_master($whereClause2);
            if($contentArray == null || count($contentArray) <= 0){
                $category = $categoryArray[0];
                if(!empty($category['image'])){
                    if(file_exists('./'.path_image.$category['image'])){
                        unlink('./'.path_image.$category['image']);
                    }
                    if(file_exists('./'.path_image_thumb.$category['image'])){
                        unlink('./'.path_image_thumb.$category['image']);
                    }
                }
                if($this->database_model->delete_category($whereClause)){
                    $this->session->set_flashdata('success', 'Category has been deleted');
                }else{
                    $this->session->set_flashdata('error', 'Failed to delete category');
                }
            }else {
                $this->session->set_flashdata('error', 'Failed due to Contents against category exists.');
            }
        }else {
            $this->session->set_flashdata('error', 'Category not found');
        }
        redirect(base_url().$this->module_url);
    }


    public function attachFragmentCreate() {
        $pkg_id = isset($_SESSION['admin']['pkg_id'])?$_SESSION['admin']['pkg_id']:'';;
        $whereClause = getCategoryWhereClause($pkg_id, null, null);
        // $categories = $this->database_model->get_category($whereClause);
        $whereClause['flavour'] = $this->flavour;
        $itemTypes = $this->database_model->get_item_type_flavour($whereClause);
        // $subCatIdSelected = getPref('subCatIdSelected');
        $itemTypeSelected = getPref('itemTypeSelected');
        // $data['categories'] = $categories;
        $data['itemTypes'] = $itemTypes;
        // $data['subCatIdSelected'] = $subCatIdSelected;
        $data['itemTypeSelected'] = $itemTypeSelected;
        $data['mainModule'] = 'category';
        $data['subModule'] = 'createCategory';
        return $this->load->view($this->module_url.'/fragment/fragmentcreate', $data);
    }
}

?>
