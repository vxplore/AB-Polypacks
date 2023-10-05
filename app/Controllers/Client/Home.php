<?php 

namespace App\Controllers\Client;

use App\Controllers\Client\Common;

class Home extends Common {

    public function index($page_slug = "home") {
        $page_details = $this->admin_model->get_page_details_on_condition(["slug" => $page_slug]);
        if (!empty($page_details->page_id && $page_details->view_file_path)) {
            $header_rendering_data["page_details"] = $page_details;

            $navbar_rendering_data["list_of_product_categories"] = $this->client_model->get_list_of_product_categories();
            $office_contact_info = $this->client_model->get_office_contact_informations();
            $navbar_rendering_data["office_contact_info"] = $office_contact_info;
            $footer_rendering_data["office_contact_info"] = $office_contact_info;

            $page_rendering_data = $this->get_page_rendering_data($page_details->page_id);

            echo view('client/templates/header', $header_rendering_data);
            echo view('client/templates/navbar', $navbar_rendering_data);
            echo view($page_details->view_file_path, $page_rendering_data);
            echo view('client/templates/footer', $footer_rendering_data);
            echo view('client/templates/footer_links');
        }
        else {
            echo view("errors/html/error_404");
        }
    }

    private function get_page_rendering_data($page_id) {
        $page_rendering_data = [];

        if (!empty($page_id) && $page_id == HOME_PAGE_ID) {
            $page_rendering_data["list_of_banners"] = $this->client_model->get_list_of_banners();
            $page_rendering_data["list_of_clients"] = $this->admin_model->get_list_of_clients();
            $page_rendering_data["list_of_testimonials"] = $this->client_model->get_list_of_testimonials();
            $page_rendering_data["contact_informations"] = $this->admin_model->get_contact_informations();
        }

        $page_contents_details = $this->admin_model->get_page_content_details_on_condition(["page_id" => $page_id]);
        if (!empty($page_contents_details->page_cms_contents)) {
            $page_contents_details->page_cms_contents = json_decode($page_contents_details->page_cms_contents);
        }
        $page_rendering_data["page_contents"] = $page_contents_details;

        return $page_rendering_data;
    }

}