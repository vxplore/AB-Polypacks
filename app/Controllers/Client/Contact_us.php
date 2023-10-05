<?php 

namespace App\Controllers\Client;

use App\Controllers\Client\Common;

class Contact_us extends Common {

    public function index() {
        $page_details = $this->admin_model->get_page_details_on_condition(["page_id" => CONTACT_US_PAGE_ID]);
        $header_rendering_data["page_details"] = $page_details;
        $navbar_rendering_data["list_of_product_categories"] = $this->client_model->get_list_of_product_categories();
        
        $office_contact_info = $this->client_model->get_office_contact_informations();
        $navbar_rendering_data["office_contact_info"] = $office_contact_info;
        $footer_rendering_data["office_contact_info"] = $office_contact_info;

        $page_contents_details = $this->admin_model->get_page_content_details_on_condition(["page_id" => CONTACT_US_PAGE_ID]);
        $page_rendering_data["page_contents"] = $page_contents_details;
        $page_rendering_data["contact_informations"] = $this->admin_model->get_contact_informations();

        echo view('client/templates/header', $header_rendering_data);
        echo view('client/templates/navbar', $navbar_rendering_data);
        echo view('client/contact_us_view', $page_rendering_data);
        echo view('client/templates/footer', $footer_rendering_data);
        echo view('client/templates/footer_links');
    }

}