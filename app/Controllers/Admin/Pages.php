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

        if (!empty($page_details->view_file_path)) {
            $header_rendering_data["page_details"] = $page_details;
            $page_rendering_data = $this->get_page_rendering_data($page_id);
            $script_rendering_data = [];

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
        $page_rendering_data["page_id"] = $page_id;
        $page_rendering_data["page_contents_editable"] = true;
        $page_rendering_data["page_contents"] = $page_contents_details;

        return $page_rendering_data;
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
                $uploadable_file_details["name"] = $file_input_name;
                $uploadable_file_details["image"] = $_FILES[$file_input_name];
                $this->uploadable_file_data[] = $uploadable_file_details;
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
            $page_content_added = $page_content_saved = 0;
            $previous_page_details = $this->admin_model->get_page_content_details_on_condition(["page_id" => $page_id]);
            $previous_CMS_contents = (!empty($previous_page_details->page_cms_contents)) ? json_decode($previous_page_details->page_cms_contents, TRUE) : NULL;

            if (!empty($previous_CMS_contents)) {
                $deletable_CMS_images_paths = [];

                if (!empty($this->uploadable_file_data)) {
                    foreach ($this->uploadable_file_data as $i => $file_details) {
                        if (!empty($previous_CMS_contents[$file_details["name"]])) {
                            $deletable_CMS_images_paths[$file_details["name"]] = $previous_CMS_contents[$file_details["name"]];
                        }
                    }

                    $uploaded_CMS_images_paths = $this->upload_CMS_images($this->uploadable_file_data);
                    $new_CMS_contents = array_merge($this->addable_text_data, $uploaded_CMS_images_paths);
                }
                else {
                    $new_CMS_contents = $this->addable_text_data;
                }

                foreach ($new_CMS_contents as $content_name => $content_value) {
                    if (array_key_exists($content_name, $previous_CMS_contents)) {
                        $previous_CMS_contents[$content_name] = $content_value;
                    }
                    else {
                        $previous_CMS_contents[$content_name] = $content_value;
                    }
                }

                $condition = ["page_id" => $page_id];
                $data = ["page_cms_contents" => json_encode($previous_CMS_contents)];
                $page_content_saved = $this->admin_model->update_page_content_details($data, $condition);
                if ($page_content_saved) {
                    if (!empty($deletable_CMS_images_paths)) {
                        $this->delete_CMS_images($deletable_CMS_images_paths);
                    }
                }
                else {
                    if (!empty($uploaded_CMS_images_paths)) {
                        $this->delete_CMS_images($uploaded_CMS_images_paths);
                    }
                }
            }
            else {
                $new_CMS_contents = $this->addable_text_data;
                $uploaded_CMS_images_paths = $this->upload_CMS_images($this->uploadable_file_data);
                $page_CMS_contents = array_merge($new_CMS_contents, $uploaded_CMS_images_paths);

                $data = [
                    "page_id" => $page_id,
                    "page_cms_contents" => json_encode($page_CMS_contents)
                ];
                $page_content_added = $this->admin_model->add_new_page_content($data);
            }

            if ($page_content_added || $page_content_saved) {
                $this->output = [
                    "status" => true,
                    "message" => "CMS Content Saved Successfully."
                ];
            }
            else {
                $this->output = [
                    "status" => false,
                    "message" => "Failed to save CMS Content! Please try again later."
                ];
            }
        }

        return $this->response->setJSON($this->output);
    }

    private function get_required_text_content_names($page_id) {
        if ($page_id == HOME_PAGE_ID) {
            $text_content_names = [
                "certificates_section_heading",
                "about_us_section_heading",
                "about_us_section_description",
                "our_sustainability_section_heading",
                "our_sustainability_section_description",
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
        else if ($page_id == INFRASTRUCTURE_PAGE_ID) {
            $text_content_names = [
                "main_section_heading",
                "main_section_description",
                "sub_section1_heading",
                "sub_section1_description",
                "sub_section2_heading",
                "sub_section2_description",
                "sub_section3_heading",
                "sub_section3_description",
                "sub_section4_heading",
                "sub_section4_description",
                "sub_section5_heading",
                "sub_section5_description",
                "sub_section6_heading",
                "sub_section6_description",
                "sub_section7_heading",
                "sub_section7_description"  
            ];
        }

        return (!empty($text_content_names)) ? $text_content_names : [];
    }

    private function get_required_file_content_names($page_id) {
        if ($page_id == HOME_PAGE_ID) {
            $file_content_names = [
                "certificates_section_image",
                "about_us_section_image",
                "our_sustainability_section_image",
                "products_sub_section1_image",
                "products_sub_section2_image",
                "products_sub_section3_image",
                "products_sub_section4_image",
                "products_sub_section5_image"
            ];
        }
        else if ($page_id == INFRASTRUCTURE_PAGE_ID) {
            $file_content_names = [
                "sub_section1_image",
                "sub_section2_image",
                "sub_section3_image",
                "sub_section4_image",
                "sub_section5_image",
                "sub_section6_image",
                "sub_section7_image"
            ];
        }
        else if ($page_id == CAREER_PAGE_ID) {
            $file_content_names = [
                "career_development_image"
            ];
        }

        return (!empty($file_content_names)) ? $file_content_names : [];
    }

    private function upload_CMS_images($uploadable_CMS_images) {
        $upload_directory_path = "uploads/CMS_content_images/";
        $uploaded_CMS_images_paths = [];

        foreach ($uploadable_CMS_images as $i => $details) {
            if (!empty($details["image"]["name"])) {
                $uploaded_image_path = $this->upload_image($details["image"], $upload_directory_path);
                if (!empty($uploaded_image_path)) {
                    $uploaded_CMS_images_paths[$details["name"]] = $uploaded_image_path;
                }
            }
        }

        return $uploaded_CMS_images_paths;
    }

    private function delete_CMS_images($deletable_files) {
        foreach ($deletable_files as $file_name => $file_path) {
            $this->delete_image($file_path);
        }
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