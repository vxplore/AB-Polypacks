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

    public function add_banner_details($data) {
        $banners_table = $this->db->table("banners");
        return $banners_table->insert($data);
    }

    public function get_total_banners_count() {
        $banners_table = $this->db->table("banners");
        return $banners_table->get()->getNumRows();
    }

    public function get_list_of_banners() {
        $banners_table = $this->db->table("banners");
        return $banners_table->orderBy("appearing_order", "ASC")->get()->getResult();
    }

    public function get_banner_details_on_condition($condition) {
        $banners_table = $this->db->table("banners");
        return $banners_table->where($condition)->get()->getRow();
    }

    public function update_banner_details($data, $condition) {
        $banners_table = $this->db->table("banners");
        return $banners_table->set($data)->where($condition)->update();
    }

    public function delete_banner($condition) {
        $banners_table = $this->db->table("banners");
        return $banners_table->where($condition)->delete();
    }

    public function add_client_details($data) {
        $clients_table = $this->db->table("clients");
        return $clients_table->insert($data);
    }

    public function get_total_clients_count() {
        $clients_table = $this->db->table("clients");
        return $clients_table->get()->getNumRows();
    }

    public function get_list_of_clients() {
        $clients_table = $this->db->table("clients");
        return $clients_table->orderBy("appearing_order", "ASC")->get()->getResult();
    }

    public function get_client_details_on_condition($condition) {
        $clients_table = $this->db->table("clients");
        return $clients_table->where($condition)->get()->getRow();
    }

    public function update_client_details($data, $condition) {
        $clients_table = $this->db->table("clients");
        return $clients_table->set($data)->where($condition)->update();
    }

    public function delete_client($condition) {
        $clients_table = $this->db->table("clients");
        return $clients_table->where($condition)->delete();
    }

    public function add_product_category_details($data) {
        $product_categories_table = $this->db->table("product_categories");
        return $product_categories_table->insert($data);
    }

    public function get_total_product_categories_count() {
        $product_categories_table = $this->db->table("product_categories");
        return $product_categories_table->get()->getNumRows();
    }

    public function get_list_of_product_categories() {
        $product_categories_table = $this->db->table("product_categories");
        return $product_categories_table->orderBy("appearing_order", "ASC")->get()->getResult();
    }

}