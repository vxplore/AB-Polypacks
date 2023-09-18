<?php 

namespace App\Controllers\Admin;

use App\Controllers\Admin\Common;

class Product extends Common {

    public function get_product_categories_view() {
        if ($this->check_admin_logged_in()) {
            $sidebar_data["pages"] = $this->admin_model->get_list_of_editable_pages();
            $data["list_of_product_categories"] = $this->admin_model->get_list_of_product_categories();

            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar', $sidebar_data);
            echo view('admin/product_categories_list_view', $data);
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url("admin"));
        }
    }

    public function add_new_category() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'new_product_category_adding_rules')) {
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
                    $product_category_image = $_FILES["image"];
                    $uploaded_image_path = $this->upload_image($product_category_image, "uploads/product_category_images/");
                    if (!empty($uploaded_image_path)) {
                        $total_product_categories_count = $this->admin_model->get_total_product_categories_count();
                        $category_id = $this->GUID("CATEGORY");
                        $data = [
                            "category_id" => $category_id,
                            "name" => $post_data["name"],
                            "image" => $uploaded_image_path,
                            "appearing_order" => intval($total_product_categories_count + 1),
                            "status" => "ACTIVE"
                        ];

                        $product_category_added = $this->admin_model->add_product_category_details($data);
                        if ($product_category_added) {
                            $this->output = [
                                "status" => true,
                                "message" => "New Product Category Added Successfully.",
                                "data" => new \stdClass,
                                "errors" => $this->validation->getErrors()
                            ];
                        }
                        else {
                            $this->output = [
                                "status" => false,
                                "message" => "Database Error Occurred! Failed to Add New Product Category.",
                                "data" => new \stdClass,
                                "errors" => $this->validation->getErrors()
                            ];
                        }
                    }
                    else {
                        $this->output = [
                            "status" => false,
                            "message" => "Failed to Upload Product Category Image! Please try again later.",
                            "data" => new \stdClass,
                            "errors" => $this->validation->getErrors()
                        ];
                    }
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Please Upload an Image to Add New Product Category.",
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