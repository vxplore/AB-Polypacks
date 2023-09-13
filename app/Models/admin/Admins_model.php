<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class Admins_model extends Model {

    function __construct() {
        $this->db = db_connect();
    }

    public function get_admin_details($condition = []) {
        $admin_table = $this->db->table("admins");
        if (!empty($condition)) {
            $admin_table->where($condition);
        }
        return $admin_table->get()->getRow();
    }

    public function get_list_of_editable_pages() {
        $pages_table = $this->db->table("pages");
        $pages_table->select("page_id, name")->where(["page_contents_editable" => "TRUE"]);
        return $pages_table->get()->getResult();
    }

    public function get_list_of_pages() {
        $pages_table = $this->db->table("pages");
        return $pages_table->get()->getResult();
    }

    public function get_page_details_on_condition($condition) {
        $pages_table = $this->db->table("pages");
        return $pages_table->where($condition)->get()->getRow();
    }

    public function update_page_details($data, $condition) {
        $pages_table = $this->db->table("pages");
        return $pages_table->set($data)->where($condition)->update();
    }

}