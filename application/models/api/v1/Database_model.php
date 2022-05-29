<?php
class Database_model extends CI_Model {
    //var $table_category = 'table_category';
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_apps() {
        $this->db->order_by('app_id', 'DESC');
        $query = $this->db->get('table_app');
        return $query->result_array();
    }

    public function get_app($whereClause = array(), $searchQuery = []) {
        if ($searchQuery != null && count($searchQuery) > 0) {
            $this->db->like($searchQuery);
        }
        $this->db->order_by('app_id', 'DESC');
        $query = $this->db->get_where("table_app", $whereClause);
        return $query->result_array();
    }

    public function get_accounts() {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('table_account');
        return $query->result_array();
    }

    public function get_account($whereClause = array(), $searchQuery = []) {
        if ($searchQuery != null && count($searchQuery) > 0) {
            $this->db->like($searchQuery);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where("table_account", $whereClause);
        return $query->result_array();
    }

    public function get_pkg_id($pkgName) {
        if(isset($pkgName)){
            $whereClause['pkg_name'] = $pkgName;
            $query = $this->db->get_where('table_app', $whereClause);
            return $query->result_array();
        }else {
            return array();
        }
    }

    public function get_flavours($whereClause = array()) {
        $this->db->order_by('ranking', 'ASC');
        $this->db->where('visibility =', '1');
        $query = $this->db->get_where('table_flavour', $whereClause);
        return $query->result_array();
    }

    public function insert_category($isUpdate = false, $whereClause = array(), $data = array()) {
        // dd($whereClause);
        // $query = $this->db->get_where('table_category', $whereClause);
        // if ($query->num_rows() <= 0) {
            $this->db->insert("table_category", $data);
            $lastId = $this->db->insert_id();
            return $lastId;
        // } else {
        //     if ($isUpdate) {
        //         $this->db->update("table_category", $data, $whereClause);
        //         if($this->db->affected_rows() > 0){
        //            return $whereClause['cat_id'];
        //         } else {
        //            return 0;
        //         }
        //     } else {
        //         return 0;
        //     }
        // }
    }

    public function update_category($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_category', $whereClause);
        if ($query->num_rows() > 0) {
            $this->db->update("table_category", $data, $whereClause);
            if($this->db->affected_rows() > 0){
               return $whereClause['cat_id'];
            } else {
               return 0;
            }
        } else {
            return 0;
        }
    }

    public function insert_category_master($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_category_master', $whereClause);
        if ($query->num_rows() <= 0) {
            return $this->db->insert("table_category_master", $data);
        } else {
            return false;
        }
    }

    public function update_category_master($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_category_master', $whereClause);
        if ($query->num_rows() > 0) {
            return $this->db->update("table_category_master", $data, $whereClause);
        } else {
            return false;
        }
    }

    public function delete_category($whereClause = array()) {
        $this->delete_category_master($whereClause);
        if(isset($whereClause['pkg_id']) && isset($whereClause['cat_id'])){
            return $this->db->delete("table_category", $whereClause);
        }else {
            return false;
        }
    }

    public function delete_category_master($whereClause = array()) {
        if(isset($whereClause['pkg_id']) && (isset($whereClause['id']) || isset($whereClause['cat_id']))){
            return $this->db->delete("table_category_master", $whereClause);
        }else {
            return false;
        }
    }

    // public function get_category_selected($whereClause = array(), $searchQuery = []) {
    //     $selection = array('cat_id', 'sub_cat_id', 'title', 'item_type', 'image', 'ranking', 'other_property', 'created_at');
    //     return $this->get_category($whereClause, $searchQuery, $selection);
    // }

    public function get_category($whereClause = array(), $searchQuery = [], $selection = array()) {
        if ($searchQuery != null && count($searchQuery) > 0) {
            $this->db->like($searchQuery);
        }
        if ($selection != null && count($selection) > 0) {
            $this->db->select($selection);
        }
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get_where("table_category", $whereClause);
        return $query->result_array();
    }

    public function get_cat_master($whereClause = array(), $searchQuery = []) {
        if ($searchQuery != null && count($searchQuery) > 0) {
            $this->db->like($searchQuery);
        }
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get_where("table_category_master", $whereClause);
        return $query->result_array();
    }

    public function get_category_master($whereClause = array(), $searchQuery = [], $isSortById = false) {
        if(isset($whereClause['pkg_id']) && isset($whereClause['cat_id'])){
            $query = "SELECT table_category_master.sub_cat_id, table_category.* FROM table_category_master JOIN table_category ON table_category_master.cat_id=table_category.cat_id WHERE table_category_master.pkg_id='" .$whereClause['pkg_id']. "' AND table_category_master.cat_id='" .$whereClause['cat_id']. "'";
        }else if(isset($whereClause['pkg_id']) && isset($whereClause['sub_cat_id'])){
            $query = "SELECT table_category_master.sub_cat_id, table_category.* FROM table_category_master JOIN table_category ON table_category_master.cat_id=table_category.cat_id WHERE table_category_master.pkg_id='" .$whereClause['pkg_id']. "' AND table_category_master.sub_cat_id='" .$whereClause['sub_cat_id']. "'";
        }else if(isset($whereClause['pkg_id'])){
            $query = "SELECT table_category_master.sub_cat_id, table_category.* FROM table_category_master JOIN table_category ON table_category_master.cat_id=table_category.cat_id WHERE table_category_master.pkg_id='" .$whereClause['pkg_id']. "'";
        }else{
            $query = "SELECT table_category_master.sub_cat_id, table_category.* FROM table_category_master JOIN table_category ON table_category_master.cat_id=table_category.cat_id ";
        }

        if ($searchQuery != null && count($searchQuery) > 0) {
            if(!empty($searchQuery['title'])){
                $query .= " AND table_category.title LIKE '%".$searchQuery['title']."%'";
            }
            if(isset($searchQuery['item_type'])){
                if($searchQuery['item_type'] != ''){
                    $query .= " AND table_category.item_type = '".$searchQuery['item_type']."' ";
                }
            }
            if(!empty($searchQuery['sub_cat_id'])){
                $query .= " AND table_category_master.sub_cat_id = '".$searchQuery['sub_cat_id']."' ";
            }
        }

        if($isSortById){
            $query .= " ORDER BY table_category.cat_id DESC";
        }else {
            $query .= " ORDER BY table_category.ranking ASC, table_category.created_at DESC";
        }

        $q = $this->db->query($query)->result_array();
        return $q;
    }

    public function insert_content($isUpdate = false, $whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_content', $whereClause);
        if ($query->num_rows() <= 0) {
            $this->db->insert("table_content", $data);
            $lastId = $this->db->insert_id();
            return $lastId;
        } else {
            if ($isUpdate) {
                $this->db->update("table_content", $data, $whereClause);
                if($this->db->affected_rows() > 0){
                   return $whereClause['id'];
                } else {
                   return 0;
                }
            } else {
                return 0;
            }
        }
    }

    public function update_content($whereClause = array(), $data = array()) {
        // print_r('<pre>');
        // print_r($whereClause);
        // print_r($data);
        $query = $this->db->get_where('table_content', $whereClause);
        if ($query->num_rows() > 0) {
            $this->db->update("table_content", $data, $whereClause);
            if($this->db->affected_rows() > 0){
               return $whereClause['id'];
            } else {
               return 0;
            }
        } else {
            return 0;
        }
    }

    public function insert_content_master($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_content_master', $whereClause);
        if ($query->num_rows() <= 0) {
            return $this->db->insert("table_content_master", $data);
        } else {
            return false;
        }
    }

    public function update_content_master($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_content_master', $whereClause);
        if ($query->num_rows() > 0) {
            return $this->db->update("table_content_master", $data, $whereClause);
        } else {
            return false;
        }
    }

    public function delete_content($whereClause = array()) {
        print_r($whereClause);
        $this->delete_content_master($whereClause);
        if(isset($whereClause['pkg_id']) && isset($whereClause['id'])){
            return $this->db->delete("table_content", $whereClause);
        }else {
            return false;
        }
    }

    public function delete_content_master($whereClause = array()) {
        $whereClause2['pkg_id'] = $whereClause['pkg_id'];
        $whereClause2['content_id'] = $whereClause['id'];
        if(isset($whereClause['pkg_id']) && isset($whereClause['content_id'])){
            return $this->db->delete("table_content_master", $whereClause2);
        }else {
            return false;
        }
    }

    // public function get_content_selected($whereClause = array(), $searchQuery = []) {
    //     $selection = array('id', 'cat_id', 'sub_cat_id', 'title', 'description', 'item_type', 'image', 'link', 'ranking', 'other_property', 'created_at');
    //     return $this->get_content($whereClause, $searchQuery, $selection);
    // }

    public function get_content($whereClause = array(), $searchQuery = [], $selection = array()) {
        if ($searchQuery != null && count($searchQuery) > 0) {
            $this->db->like($searchQuery);
        }
        if ($selection != null && count($selection) > 0) {
            $this->db->select($selection);
        }
        $this->db->where('title !=', '');
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get_where("table_content", $whereClause);
        return $query->result_array();
    }

    public function get_content_master($whereClause = array(), $searchQuery = [], $isSortById = false) {
        if(isset($whereClause['pkg_id']) && isset($whereClause['sub_cat_id'])){
            $query = "SELECT table_content_master.sub_cat_id, table_content.* FROM table_content_master JOIN table_content ON table_content_master.content_id=table_content.id WHERE table_content.pkg_id='" .$whereClause['pkg_id']. "' AND table_content_master.sub_cat_id='" .$whereClause['sub_cat_id']. "'";
        }else if(isset($whereClause['pkg_id']) && isset($whereClause['id'])){
            $query = "SELECT table_content_master.sub_cat_id, table_content.* FROM table_content_master JOIN table_content ON table_content_master.content_id=table_content.id WHERE table_content.pkg_id='" .$whereClause['pkg_id']. "' AND table_content_master.content_id='" .$whereClause['id']. "'";
        }else if(isset($whereClause['pkg_id'])){
            $query = "SELECT table_content_master.sub_cat_id, table_content.* FROM table_content_master JOIN table_content ON table_content_master.content_id=table_content.id WHERE table_content.pkg_id='" .$whereClause['pkg_id']. "'";
        }else{
            $query = "SELECT table_content_master.sub_cat_id, table_content.* FROM table_content_master JOIN table_content ON table_content_master.content_id=table_content.id";
        }

        if ($searchQuery != null && count($searchQuery) > 0) {
            if(!empty($searchQuery['title'])){
                $query .= " AND table_content.title LIKE '%".$searchQuery['title']."%'";
            }
            if(isset($searchQuery['item_type'])){
                if($searchQuery['item_type'] != ''){
                    $query .= " AND table_content.item_type = '".$searchQuery['item_type']."' ";
                }
            }
            if(!empty($searchQuery['sub_cat_id'])){
                $query .= " AND table_content_master.sub_cat_id = '".$searchQuery['sub_cat_id']."' ";
            }
        }
        if($isSortById){
            $query .= " ORDER BY table_content.id DESC";
        }else {
            $query .= " ORDER BY table_content.ranking ASC, table_content.created_at DESC";
        }

        $q = $this->db->query($query)->result_array();
        // if ($this->db->affected_rows()) {
        //
        // } else {
        //     return false;
        // }
        return $q;
    }


    public function getContentByParentId($pkgId, $subCatId) {
        $query = "SELECT table_content.*, table_content_master.sub_cat_id FROM `table_content_master` JOIN table_content ON table_content_master.content_id=table_content.id WHERE table_content_master.pkg_id='" . $pkgId . "' ";
        $q = $this->db->query($query)->result_array();
        if ($this->db->affected_rows()) {
            return $q;
        } else {
            return false;
        }
    }

    public function insert_json($isUpdate = false, $whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_json', $whereClause);
        if ($query->num_rows() <= 0) {
            return $this->db->insert("table_json", $data);
        } else {
            if ($isUpdate) {
                return $this->db->update("table_json", $data, $whereClause);
            } else {
                return false;
            }
        }
    }

    public function update_json($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_json', $whereClause);
        if ($query->num_rows() > 0) {
            return $this->db->update("table_json", $data, $whereClause);
        } else {
            return false;
        }
    }

    public function delete_json($whereClause = array()) {
        return $this->db->delete("table_json", $whereClause);
    }

    public function get_json($whereClause = array(), $searchQuery = []) {
        if ($searchQuery != null && count($searchQuery) > 0) {
            $this->db->like($searchQuery);
        }
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where("table_json", $whereClause);
        return $query->result_array();
    }

    public function get_content_data($whereClause = array(), $searchQuery = []) {
        if ($searchQuery != null && count($searchQuery) > 0) {
            $this->db->like($searchQuery);
        }
        $this->db->select('pkg_id, id, cat_id, json_data, updated_at');
        $this->db->where('title =', '');
        $this->db->where('json_data !=', '');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get_where("table_content", $whereClause);
        return $query->result_array();
    }

    public function insert_item_type($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_item_type', $whereClause);
        if ($query->num_rows() <= 0) {
            return $this->db->insert("table_item_type", $data);
        } else {
            return false;
        }
    }

    public function update_item_type($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_item_type', $whereClause);
        if ($query->num_rows() > 0) {
            return $this->db->update("table_item_type", $data, $whereClause);
        } else {
            return false;
        }
    }

    public function delete_item_type($whereClause = array()) {
        $pkgId = $whereClause['pkg_id'];
        if ($pkgId != null && $pkgId == 'common') {
            $user_pkg_id = isset($_SESSION['admin']['pkg_id']) ? $_SESSION['admin']['pkg_id'] : '';
            if ($user_pkg_id != 'com.appsfeature') {
                return false;
            }
        }
        return $this->db->delete("table_item_type", $whereClause);
    }

    public function get_item_types($whereClause = array()) {
        $this->db->order_by('item_type', 'DESC');
        $query = $this->db->get_where("table_item_type", $whereClause);
        return $query->result_array();
    }

    public function get_item_type($whereClause = array(), $searchQuery = []) {
        if ($searchQuery != null && count($searchQuery) > 0) {
            $this->db->like($searchQuery);
        }
        $names = array('common', $whereClause['pkg_id']);
        $this->db->where_in('pkg_id', $names);
        $this->db->order_by('item_type', 'ASC');
        $query = $this->db->get("table_item_type");
        return $query->result_array();
    }

    public function get_item_type_flavour($whereClause = array()) {
        $pkgIds = array('common', $whereClause['pkg_id']);
        $this->db->where_in('pkg_id', $pkgIds);
        $this->db->where('flavour', $whereClause['flavour']);
        $this->db->order_by('item_type', 'ASC');
        $query = $this->db->get("table_item_type");
        return $query->result_array();
    }

    public function get_item_type_where($whereClause = array(), $searchQuery = []) {
        if ($searchQuery != null && count($searchQuery) > 0) {
            $this->db->like($searchQuery);
        }
        $this->db->order_by('item_type', 'ASC');
        $query = $this->db->get_where("table_item_type", $whereClause);
        return $query->result_array();
    }

    public function selectAllFromWhere($tableName = null, $condition = null, $getColumn = null) {
        $query = $this->db->get_where($tableName, $condition)->result_array();
        if ($getColumn == null) {
            return $this->db->affected_rows() ? $query : FALSE;
        } else {
            return $this->db->affected_rows() ? $query[0][$getColumn] : FALSE;
        }
    }

    public function getCategoryByParentId($pkgId, $subCatId) {
        $query = "SELECT table_category.cat_id, table_category.title FROM `table_category_master` JOIN table_category ON table_category_master.cat_id=table_category.cat_id WHERE table_category_master.pkg_id='" . $pkgId . "' AND table_category_master.sub_cat_id=" . $subCatId;
        $q = $this->db->query($query)->result_array();
        if ($this->db->affected_rows()) {
            return $q;
        } else {
            return false;
        }
    }

    public function insert_account($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_account', $whereClause);
        if ($query->num_rows() <= 0) {
            return $this->db->insert("table_account", $data);
        } else {
            return false;
        }
    }

    public function update_account($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_account', $whereClause);
        if ($query->num_rows() > 0) {
            return $this->db->update("table_account", $data, $whereClause);
        } else {
            return false;
        }
    }

    public function delete_account($whereClause = array()) {
        return $this->db->delete("table_account", $whereClause);
    }

    public function insert_app($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_app', $whereClause);
        if ($query->num_rows() <= 0) {
            return $this->db->insert("table_app", $data);
        } else {
            return false;
        }
    }

    public function update_app($whereClause = array(), $data = array()) {
        $query = $this->db->get_where('table_app', $whereClause);
        if ($query->num_rows() > 0) {
            return $this->db->update("table_app", $data, $whereClause);
        } else {
            return false;
        }
    }

    public function delete_app($whereClause = array()) {
        return $this->db->delete("table_app", $whereClause);
    }
}
?>
