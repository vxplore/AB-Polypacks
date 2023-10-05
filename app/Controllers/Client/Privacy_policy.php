<?php 

namespace App\Controllers\Client;

use App\Controllers\Client\Common;

class Privacy_policy extends Common {

    public function index() {
        $page_details = $this->admin_model->get_page_details_on_condition(["page_id" => PRIVACY_POLICY_PAGE_ID]);
        $header_rendering_data["page_details"] = $page_details;
        $navbar_rendering_data["list_of_product_categories"] = $this->client_model->get_list_of_product_categories();
        
        $office_contact_info = $this->client_model->get_office_contact_informations();
        $navbar_rendering_data["office_contact_info"] = $office_contact_info;
        $footer_rendering_data["office_contact_info"] = $office_contact_info;

        $page_contents_details = $this->admin_model->get_page_content_details_on_condition(["page_id" => PRIVACY_POLICY_PAGE_ID]);
        $page_rendering_data["page_contents"] = $page_contents_details;

        echo view('client/templates/header');
        echo view('client/templates/navbar', $navbar_rendering_data);
        echo view('client/privacy_policy_view', $page_rendering_data);
        echo view('client/templates/footer', $footer_rendering_data);
        echo view('client/templates/footer_links');
    }

}