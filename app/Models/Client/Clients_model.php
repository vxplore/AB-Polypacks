<?php 

namespace App\Models\Client;

use CodeIgniter\Model;

class Clients_model extends Model {

    function __construct() {
        $this->db = db_connect();
    }

    public function get_list_of_banners() {
        $banners_table = $this->db->table("banners");
        return $banners_table->where(["status" => "ACTIVE"])->orderBy("appearing_order", "ASC")->get()->getResult();
    }

    public function get_list_of_testimonials() {
        $testimonials_table = $this->db->table("testimonials");
        return $testimonials_table->where(["status" => "ACTIVE"])->orderBy("appearing_order", "ASC")->get()->getResult();
    }

    public function get_list_of_product_categories() {
        $product_categories_table = $this->db->table("product_categories");
        return $product_categories_table->where(["status" => "ACTIVE"])->orderBy("appearing_order", "ASC")->get()->getResult();
    }

}