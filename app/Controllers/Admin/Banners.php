<?php 

namespace App\Controllers\Admin;

use App\Controllers\Admin\Common;

class Banners extends Common {

    public function index() {
        if ($this->check_admin_logged_in()) {
            $sidebar_data["pages"] = $this->admin_model->get_list_of_editable_pages();
            $data["list_of_banners"] = $this->admin_model->get_list_of_banners();

            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar', $sidebar_data);
            echo view('admin/banner_list_view', $data);
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url("admin"));
        }
    }

    public function get_banner_add_view() {
        if ($this->check_admin_logged_in()) {
            $sidebar_data["pages"] = $this->admin_model->get_list_of_editable_pages();

            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar', $sidebar_data);
            echo view('admin/banner_content_view');
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function add_new_banner() {
        $output = [];
        $post_data = $this->request->getPost();

        if ($this->check_admin_logged_in()) {
            if (!empty($_FILES["image"]["name"])) {
                $banner_image = $_FILES["image"];
                $uploaded_image_path = $this->upload_image($banner_image, "uploads/banner_images/");
                if (!empty($uploaded_image_path)) {
                    $total_banners_count = $this->admin_model->get_total_banners_count();
                    $banner_id = $this->GUID("BANNER");
                    $data = [
                        "banner_id" => $banner_id,
                        "title" => (!empty($post_data["title"])) ? $post_data["title"] : NULL,
                        "description" => (!empty($post_data["description"])) ? $post_data["description"] : NULL,
                        "image" => $uploaded_image_path,
                        "link" => (!empty($post_data["link"])) ? $post_data["link"] : NULL,
                        "appearing_order" => intval($total_banners_count + 1)
                    ];

                    $banner_added = $this->admin_model->add_banner_details($data);
                    if ($banner_added) {
                        $this->output = [
                            "status" => true,
                            "message" => "New Banner Added Successfully.",
                            "data" => ["redirect_to" => base_url('admin/banners')],
                            "errors" => $this->validation->getErrors()
                        ];
                    }
                    else {
                        $this->output = [
                            "status" => false,
                            "message" => "Database Error Occurred! Failed to Add New Banner.",
                            "data" => new \stdClass,
                            "errors" => $this->validation->getErrors()
                        ];
                    }
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Failed to Upload Banner Image! Please try again later.",
                        "data" => new \stdClass,
                        "errors" => $this->validation->getErrors()
                    ];
                }
            }
            else {
                $this->output = [
                    "status" => false,
                    "message" => "Please Upload an Image to Add New Banner.",
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

        return $this->response->setJSON($this->output);
    }

    public function get_banner_edit_view($banner_id) {
        if ($this->check_admin_logged_in()) {
            $sidebar_data["pages"] = $this->admin_model->get_list_of_editable_pages();
            $banner_details = $this->admin_model->get_banner_details_on_condition(["banner_id" => $banner_id]);

            if (!empty($banner_details->banner_id)) {
                echo view('admin/templates/header');
                echo view('admin/templates/navbar');
                echo view('admin/templates/sidebar', $sidebar_data);
                echo view('admin/banner_content_view', ["banner_details" => $banner_details]);
                echo view('admin/templates/footer');
                echo view('admin/templates/footer_links');
            }
            else {
                return redirect()->to(base_url('admin/banners'));
            }
        }
        else {
            return redirect()->to(base_url('admin'));
        }
    }

    public function save_banner_details() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'banner_editing_rules')) {
            $this->output = [
                "status" => false,
                "message" => "Something went wrong! Please try again later.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            if ($this->check_admin_logged_in()) {
                if (!empty($_FILES["image"]["name"])) {
                    $previous_banner_details = $this->admin_model->get_banner_details_on_condition(["banner_id" => $post_data["banner_id"]]);
                    if (!empty($previous_banner_details->image)) {
                        $previous_banner_image = $previous_banner_details->image;
                    }

                    $new_banner_image = $_FILES["image"];
                    $uploaded_image_path = $this->upload_image($new_banner_image, "uploads/banner_images/");
                }

                $condition = ["banner_id" => $post_data["banner_id"]];
                $data = [
                    "title" => (!empty($post_data["title"])) ? $post_data["title"] : NULL,
                    "description" => (!empty($post_data["description"])) ? $post_data["description"] : NULL,
                    "link" => (!empty($post_data["link"])) ? $post_data["link"] : NULL
                ];
                if (!empty($uploaded_image_path)) {
                    $data["image"] = $uploaded_image_path;
                }
                
                $banner_updated = $this->admin_model->update_banner_details($data, $condition);
                if ($banner_updated) {
                    if (!empty($previous_banner_image)) {
                        $this->delete_image($previous_banner_image);
                    }

                    $this->output = [
                        "status" => true,
                        "message" => "Banner Details Saved Successfully.",
                        "data" => ["redirect_to" => base_url("admin/banners")],
                        "errors" => $this->validation->getErrors()
                    ];
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Database Error Occurred! Failed to save banner details.",
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

    public function change_banner_status() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'banner_status_changing_rules')) {
            $this->output = [
                "status" => false,
                "message" => "Something went wrong! Please try again later.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            if ($this->check_admin_logged_in()) {
                $condition = ["banner_id" => $post_data["banner_id"]];
                $data = ["status" => $post_data["status"]];
                $banner_updated = $this->admin_model->update_banner_details($data, $condition);
                if ($banner_updated) {
                    $this->output = [
                        "status" => true,
                        "message" => "Banner Status Changed to ".ucwords(strtolower($post_data["status"])),
                        "data" => new \stdClass,
                        "errors" => $this->validation->getErrors()
                    ];
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Database Error Occurred! Failed to change banner status.",
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

    public function change_banner_appearing_order() {
        $output = [];
        $json_data = $this->request->getJSON();
        foreach ($json_data as $i => $appearing_order_details) {
            $data = ["appearing_order" => $appearing_order_details->appearing_order];
            $condition = ["banner_id" => $appearing_order_details->banner_id];
            $banner_updated = $this->admin_model->update_banner_details($data, $condition);
        }

        $this->output = [
            "status" => true,
            "message" => "Banner Appearing Order Changed.",
            "data" => new \stdClass,
            "errors" => $this->validation->getErrors()
        ];

        return $this->response->setJSON($this->output);
    }

    public function delete_banner($banner_id) {
        $output = [];
        $condition = ["banner_id" => $banner_id];
        $banner_details = $this->admin_model->get_banner_details_on_condition($condition);
        $banner_deleted = $this->admin_model->delete_banner($condition);

        if ($banner_deleted) {
            if (!empty($banner_details->image)) {
                $image_path = FCPATH.$banner_details->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            
            $this->output = [
                "status" => true, 
                "message" => "Banner Deleted.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            $this->output = [
                "status" => false,
                "message" => "Database Error Occured! Failed to delete banner.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }

        return $this->response->setJSON($this->output);
    }

}