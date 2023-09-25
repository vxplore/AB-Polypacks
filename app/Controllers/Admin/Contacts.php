<?php 

namespace App\Controllers\Admin;

use App\Controllers\Admin\Common;

class Contacts extends Common {

    public function index() {
        if ($this->check_admin_logged_in()) {
            $sidebar_data["pages"] = $this->admin_model->get_list_of_editable_pages();
            $data["contact_informations"] = $this->admin_model->get_contact_informations();

            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar', $sidebar_data);
            echo view('admin/contact_details_view', $data);
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url("admin"));
        }
    }

    public function save_contact_informations() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'contact_informations_saving_rules')) {
            $this->output = [
                "status" => false,
                "message" => "Something went wrong! Please try again later.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            if ($this->check_admin_logged_in()) {
                $condition = ["uid" => $post_data["uid"]];
                $data = [
                    "company_name" => $post_data["company_name"],
                    "email" => $post_data["email"],
                    "phone" => $post_data["phone"],
                    "landline" => $post_data["landline"],
                    "address" => $post_data["address"],
                    "map_embeded_link" => $post_data["map_embeded_link"]
                ];
                $contact_info_updated = $this->admin_model->update_contact_informations($data, $condition);
                
                if ($contact_info_updated) {
                    $this->output = [
                        "status" => true,
                        "message" => "Contact Details Saved Successfully.",
                        "data" => new \stdClass,
                        "errors" => $this->validation->getErrors()
                    ];
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Database Error Occurred! Failed to save contact details.",
                        "data" => new \stdClass,
                        "errors" => $this->validation->getErrors()
                    ];
                }
            }
            else {
                $this->output = [
                    "status" => false,
                    "message" => "Session Expired! Please login and try again.",
                    "data" => new \stdClass,
                    "errors" => $this->validation->getErrors()
                ];
            }
        }

        return $this->response->setJSON($this->output);
    }

}