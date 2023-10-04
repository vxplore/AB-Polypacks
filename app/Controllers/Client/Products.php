<?php 

namespace App\Controllers\Client;

use App\Controllers\Client\Common;

class Products extends Common {

    public function index($slug = NULL) {
        if (!empty($slug)) {
            $page_details = new \stdClass;

            $condition = ["slug" => $slug];
            $product_category_details = $this->admin_model->get_product_category_details_on_condition($condition);
            
            if (!empty($product_category_details->name)) {
                $page_details->meta_title = $product_category_details->name." Products | AB Polypacks";
                $header_rendering_data["page_details"] = $page_details;
            }
            
            if (!empty($product_category_details->category_id)) {
                $page_view_path = "client/product_list_view";
                $page_rendering_data["category_details"] = $product_category_details;
                $product_condition = [
                    "product_category_id" => $product_category_details->category_id,
                    "status" => "ACTIVE"
                ];
                $page_rendering_data["list_of_products"] = $this->admin_model->get_list_of_products_on_condition($product_condition);
                $page_rendering_data["list_of_clients"] = $this->admin_model->get_list_of_clients();
            }
        } else {
            $page_details = new \stdClass;
            $page_details->meta_title = "Products | AB Polypacks";
            $header_rendering_data["page_details"] = $page_details;

            $page_view_path = "client/product_categories_view";
            $page_rendering_data["list_of_product_categories"] = $this->client_model->get_list_of_product_categories();
        }

        if (!empty($page_view_path) && !empty($page_rendering_data)) {
            $navbar_rendering_data["list_of_product_categories"] = $this->client_model->get_list_of_product_categories();

            echo view('client/templates/header', $header_rendering_data);
            echo view('client/templates/navbar', $navbar_rendering_data);
            echo view($page_view_path, $page_rendering_data);
            echo view('client/templates/footer');
            echo view('client/templates/footer_links');
        }
        else {
            echo view('errors/html/error_404');
        }
    }

}