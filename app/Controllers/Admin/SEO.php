<?php 

namespace App\Controllers\Admin;

use App\Controllers\Admin\Common;

class SEO extends Common {

    public function index() {
        if ($this->check_admin_logged_in()) {
            $data["list_of_pages"] = $this->admin_model->get_list_of_pages();

            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar');
            echo view('admin/SEO_list_view', $data);
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url("admin"));
        }
    }

    public function get_SEO_content_edit_view($page_id) {
        if ($this->check_admin_logged_in()) {
            $condition = ["page_id" => $page_id];
            $data["page_details"] = $this->admin_model->get_page_details_on_condition($condition);

            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar');
            echo view('admin/SEO_content_view', $data);
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url("admin"));
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

    public function get_SEO_content_add_view() {
        if ($this->check_admin_logged_in()) {
            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar');
            echo view('admin/SEO_content_view');
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url("admin"));
        }
    }

}