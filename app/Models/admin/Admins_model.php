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

    public function get_page_content_details_on_condition($condition) {
        $page_CMS_contents_table = $this->db->table("page_CMS_contents");
        return $page_CMS_contents_table->where($condition)->get()->getRow();
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

    public function get_product_category_details_on_condition($condition) {
        $product_categories_table = $this->db->table("product_categories");
        return $product_categories_table->where($condition)->get()->getRow();
    }

    public function update_product_category_details($data, $condition) {
        $product_categories_table = $this->db->table("product_categories");
        return $product_categories_table->set($data)->where($condition)->update();
    }

    public function delete_product_category($condition) {
        $product_categories_table = $this->db->table("product_categories");
        return $product_categories_table->where($condition)->delete();
    }

    public function add_product_details($data) {
        $products_table = $this->db->table("products");
        return $products_table->insert($data);
    }

    public function get_total_products_count($condition) {
        $products_table = $this->db->table("products");
        return $products_table->where($condition)->get()->getNumRows();
    }

    public function get_list_of_products_on_condition($condition) {
        $products_table = $this->db->table("products"); 
        return $products_table->where($condition)->orderBy("appearing_order", "ASC")->get()->getResult();
    }

    public function get_product_details_on_condition($condition) {
        $products_table = $this->db->table("products");
        return $products_table->where($condition)->get()->getRow();
    }

    public function update_product_details($data, $condition) {
        $products_table = $this->db->table("products");
        return $products_table->set($data)->where($condition)->update();
    }

    public function delete_product($condition) {
        $products_table = $this->db->table("products");
        return $products_table->where($condition)->delete();
    }

    public function get_list_of_testimonials() {
        $testimonials_table = $this->db->table("testimonials");
        return $testimonials_table->orderBy("appearing_order", "ASC")->get()->getResult();
    }

    public function get_total_testimonials_count() {
        $testimonials_table = $this->db->table("testimonials");
        return $testimonials_table->get()->getNumRows();
    }

    public function add_testimonial_details($data) {
        $testimonials_table = $this->db->table("testimonials");
        return $testimonials_table->insert($data);
    }

    public function get_testimonial_details_on_condition($condition) {
        $testimonials_table = $this->db->table("testimonials");
        return $testimonials_table->where($condition)->get()->getRow();
    }

    public function update_testimonial_details($data, $condition) {
        $testimonials_table = $this->db->table("testimonials");
        return $testimonials_table->set($data)->where($condition)->update();
    }

    public function delete_testimonial($condition) {
        $testimonials_table = $this->db->table("testimonials");
        return $testimonials_table->where($condition)->delete();
    }

    public function get_contact_informations() {
        $contact_informations = new \stdClass;
        $system_preferences = $this->db->table("system_preferences");
        
        $system_preferences_details = $system_preferences->where("key", "OFFICE_CONTACT_INFORMATION_ID")->get()->getRow();
        $office_contact_information_id = (!empty($system_preferences_details->value)) ? $system_preferences_details->value : NULL;

        $system_preferences_details = $system_preferences->where("key", "FACTORY_CONTACT_INFORMATION_ID")->get()->getRow();
        $factory_contact_information_id = (!empty($system_preferences_details->value)) ? $system_preferences_details->value : NULL;

        if (!empty($office_contact_information_id) && !empty($factory_contact_information_id)) {
            $contact_informations_table = $this->db->table("contact_informations");
            $contact_informations->office = $contact_informations_table->where("uid", $office_contact_information_id)->get()->getRow();
            $contact_informations->factory = $contact_informations_table->where("uid", $factory_contact_information_id)->get()->getRow();
        }

        return $contact_informations;
    }

    public function update_contact_informations($data, $condition) {
        $contact_informations_table = $this->db->table("contact_informations");
        return $contact_informations_table->set($data)->where($condition)->update();
    }

}