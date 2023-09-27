<?php 

namespace App\Controllers\Admin;

use App\Controllers\Admin\Common;

class Pages extends Common {

    public function get_page_contents_edit_view($page_id) {
        if ($this->check_admin_logged_in()) {
            $sidebar_data["pages"] = $this->admin_model->get_list_of_editable_pages();
            $this->get_editable_page_view($page_id);
        }
        else {
            return redirect()->to(base_url("admin"));
        }
    }

    public function get_editable_page_view($page_id) {
        $condition = ["page_contents_editable" => "TRUE", "page_id" => $page_id];
        $page_details = $this->admin_model->get_page_details_on_condition($condition);
        $page_rendering_data["page_id"] = $page_id;
        $page_rendering_data["page_contents_editable"] = true;
        $script_rendering_data = [];

        if (!empty($page_details->view_file_path)) {
            echo view("client/templates/header");
            echo view("admin/templates/CMS_navbar_controls", ["page_details" => $page_details]);
            echo view($page_details->view_file_path, $page_rendering_data);
            echo view("admin/templates/CMS_data_saving_script", $script_rendering_data);
            echo view("client/templates/footer_links");
        }
        else {
            echo view("errors/html/error_404");
        }
    }

    public function save_CMS_contents($page_id) {
        $this->output = [];
        $this->error_occurred = false;
        $this->addable_text_data = [];
        $this->uploadable_file_data = [];

        $post_data = $this->request->getPost();
        $allowed_file_inputs = $this->get_required_file_content_names($page_id);
        $required_text_inputs = $this->get_required_text_content_names($page_id);

        foreach ($allowed_file_inputs as $i => $file_input_name) {
            if (!empty($_FILES[$file_input_name])) {
                $this->uploadable_file_data[$file_input_name] = $_FILES[$file_input_name];
            }
        }
        foreach ($required_text_inputs as $i => $text_input_name) {
            if (!empty($post_data[$text_input_name])) {
                $this->addable_text_data[$text_input_name] = $post_data[$text_input_name];
            }
            else {
                $this->error_occurred = true;
                $this->output = [
                    "status" => false,
                    "message" => "Please enter ".$text_input_name." to save CMS content!"
                ];
                break;
            }
        }

        if ($this->error_occurred == false) {
            $previous_page_details = $this->admin_model->get_page_content_details_on_condition(["page_id" => $page_id]);
            $this->output = [
                "status" => true,
                "message" => "CMS Contents Saving Data get successfully.",
                "data" => [
                    "text_data" => $this->addable_text_data,
                    "file_data" => $this->uploadable_file_data,
                    "previous_page_details" => $previous_page_details
                ]
            ];
        }

        return $this->response->setJSON($this->output);
    }

    private function get_required_text_content_names($page_id) {
        if ($page_id == HOME_PAGE_ID) {
            $text_content_names = [
                "certificates_section_heading",
                "about_us_section_heading",
                "about_us_section_description",
                "products_section_heading",
                "products_sub_section1_heading",
                "products_sub_section1_description",
                "products_sub_section2_heading",
                "products_sub_section2_description",
                "products_sub_section3_heading",
                "products_sub_section3_description",
                "products_sub_section4_heading",
                "products_sub_section4_description",
                "products_sub_section5_heading",
                "products_sub_section5_description"
            ];
        }

        return (!empty($text_content_names)) ? $text_content_names : [];
    }

    private function get_required_file_content_names($page_id) {
        if ($page_id == HOME_PAGE_ID) {
            $file_content_names = [
                "certificates_section_image",
                "about_us_section_image",
                "products_sub_section1_image",
                "products_sub_section2_image",
                "products_sub_section3_image",
                "products_sub_section4_image",
                "products_sub_section5_image"
            ];
        }

        return (!empty($file_content_names)) ? $file_content_names : [];
    }

    public function save_SEO_content() {
        $output = [];
        $post_data = $this->request->getPost();
        if (!$this->validation->run($post_data, 'pages_editing_rules')) {
            $this->output = [
                "status" => false,
                "message" => "Something went wrong! Please try again later.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            if ($this->check_admin_logged_in()) {
                $condition = ["page_id !=" => $post_data["page_id"], "slug" => $post_data["slug"]];
                $duplicate_slug_data = $this->admin_model->get_page_details_on_condition($condition);
                if (!empty($duplicate_slug_data)) {
                    $this->output = [
                        "status" => false,
                        "message" => "Please enter an unique slug to save SEO data.",
                        "data" => new \stdClass,
                        "errors" => $this->validation->getErrors()
                    ];
                }
                else {
                    $update_condition = ["page_id" => $post_data["page_id"]];
                    $update_data = [
                        "name" => $post_data["name"],
                        "slug" => $post_data["slug"],
                        "meta_title" => $post_data["meta_title"],
                        "meta_description" => $post_data["meta_description"],
                        "meta_keywords" => $post_data["meta_keywords"],
                        "modified_at" => date("Y-m-d H:i:s")
                    ];

                    $page_details_updated = $this->admin_model->update_page_details($update_data, $update_condition);
                    if ($page_details_updated) {
                        $this->output = [
                            "status" => true,
                            "message" => "SEO Data Saved Successfully.",
                            "data" => [
                                "redirect_to" => base_url("admin/SEO")
                            ],
                            "errors" => $this->validation->getErrors()
                        ];
                    }
                    else {
                        $this->output = [
                            "status" => false,
                            "message" => "Database Error Occurred! Failed to save SEO data.",
                            "data" => new \stdClass,
                            "errors" => $this->validation->getErrors()
                        ];
                    }
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