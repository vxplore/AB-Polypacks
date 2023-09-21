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

    public function edit_category_details() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'product_category_editing_rules')) {
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
                    $previous_category_details = $this->admin_model->get_product_category_details_on_condition(["category_id" => $post_data["category_id"]]);
                    if (!empty($previous_category_details->image)) {
                        $previous_category_image = $previous_category_details->image;
                    }

                    $new_product_category_image = $_FILES["image"];
                    $uploaded_image_path = $this->upload_image($new_product_category_image, "uploads/product_category_images/");
                }

                $condition = ["category_id" => $post_data["category_id"]];
                $data = [
                    "name" => $post_data["name"]
                ];
                if (!empty($uploaded_image_path)) {
                    $data["image"] = $uploaded_image_path;
                }
                
                $product_category_updated = $this->admin_model->update_product_category_details($data, $condition);
                if ($product_category_updated) {
                    if (!empty($previous_category_image)) {
                        $this->delete_image($previous_category_image);
                    }

                    $this->output = [
                        "status" => true,
                        "message" => "Product Category Details Saved Successfully.",
                        "data" => new \stdClass,
                        "errors" => $this->validation->getErrors()
                    ];
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Database Error Occurred! Failed to save product category details.",
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

    public function change_category_appearing_order() {
        $output = [];
        $json_data = $this->request->getJSON();
        foreach ($json_data as $i => $appearing_order_details) {
            $data = ["appearing_order" => $appearing_order_details->appearing_order];
            $condition = ["category_id" => $appearing_order_details->category_id];
            $product_category_updated = $this->admin_model->update_product_category_details($data, $condition);
        }

        $this->output = [
            "status" => true,
            "message" => "Product Category Appearing Order Changed.",
            "data" => new \stdClass,
            "errors" => $this->validation->getErrors()
        ];

        return $this->response->setJSON($this->output);
    }

    public function change_category_status() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'product_category_status_changing_rules')) {
            $this->output = [
                "status" => false,
                "message" => "Something went wrong! Please try again later.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            if ($this->check_admin_logged_in()) {
                $condition = ["category_id" => $post_data["category_id"]];
                $data = ["status" => $post_data["status"]];
                $product_category_updated = $this->admin_model->update_product_category_details($data, $condition);
                if ($product_category_updated) {
                    $this->output = [
                        "status" => true,
                        "message" => "Product Category Status Changed to ".ucwords(strtolower($post_data["status"])),
                        "data" => new \stdClass,
                        "errors" => $this->validation->getErrors()
                    ];
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Database Error Occurred! Failed to change product category status.",
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

    public function delete_category($category_id) {
        $output = [];
        $condition = ["category_id" => $category_id];
        $product_category_details = $this->admin_model->get_product_category_details_on_condition($condition);
        $product_category_deleted = $this->admin_model->delete_product_category($condition);

        if ($product_category_deleted) {
            if (!empty($product_category_details->image)) {
                $image_path = FCPATH.$product_category_details->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            
            $this->output = [
                "status" => true, 
                "message" => "Product Category Deleted.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            $this->output = [
                "status" => false,
                "message" => "Database Error Occured! Failed to delete product category.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }

        return $this->response->setJSON($this->output);
    }

    public function get_product_list_view() {
        if ($this->check_admin_logged_in()) {
            $sidebar_data["pages"] = $this->admin_model->get_list_of_editable_pages();
            $data["categories_and_products_list"] = $this->get_product_categories_and_products_list();

            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar', $sidebar_data);
            echo view('admin/products_list_view', $data);
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url("admin"));
        }
    }

    private function get_product_categories_and_products_list() {
        $categories_and_products_list = [];
        $list_of_product_categories = $this->admin_model->get_list_of_product_categories();
        foreach ($list_of_product_categories as $i => $category_details) {
            $products_and_category_details = [];
            $products_and_category_details["category_id"] = $category_details->category_id;
            $products_and_category_details["name"] = $category_details->name;
            $products_and_category_details["image"] = $category_details->image;

            $condition = ["product_category_id" => $category_details->category_id];
            $list_of_products = $this->admin_model->get_list_of_products_on_condition($condition);
            $products_and_category_details["products_list"] = $list_of_products;

            $categories_and_products_list[] = $products_and_category_details;
        }

        return $categories_and_products_list;
    }

    public function add_new_product() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'new_product_adding_rules')) {
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
                    $condition = ["product_category_id" => $post_data["product_category_id"]];
                    $product_image = $_FILES["image"];
                    $uploaded_image_path = $this->upload_image($product_image, "uploads/product_images/");
                    if (!empty($uploaded_image_path)) {
                        $total_products_count = $this->admin_model->get_total_products_count($condition);
                        $product_id = $this->GUID("PRODUCT");
                        $data = [
                            "product_id" => $product_id,
                            "product_category_id" => $post_data["product_category_id"],
                            "name" => $post_data["name"],
                            "image" => $uploaded_image_path,
                            "appearing_order" => intval($total_products_count + 1),
                            "status" => "ACTIVE"
                        ];

                        $product_added = $this->admin_model->add_product_details($data);
                        if ($product_added) {
                            $condition = ["product_category_id" => $post_data["product_category_id"]];
                            $products_list = $this->admin_model->get_list_of_products_on_condition($condition);
                            $data["products_list"] = $products_list;

                            $this->output = [
                                "status" => true,
                                "message" => "New Product Added Successfully.",
                                "data" => $data,
                                "errors" => $this->validation->getErrors()
                            ];
                        }
                        else {
                            $this->output = [
                                "status" => false,
                                "message" => "Database Error Occurred! Failed to Add New Product.",
                                "data" => new \stdClass,
                                "errors" => $this->validation->getErrors()
                            ];
                        }
                    }
                    else {
                        $this->output = [
                            "status" => false,
                            "message" => "Failed to Upload Product Image! Please try again later.",
                            "data" => new \stdClass,
                            "errors" => $this->validation->getErrors()
                        ];
                    }
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Please Upload an Image to Add New Product.",
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

    public function edit_product_details() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'product_editing_rules')) {
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
                    $previous_product_details = $this->admin_model->get_product_details_on_condition(["product_id" => $post_data["product_id"]]);
                    if (!empty($previous_product_details->image)) {
                        $previous_product_image = $previous_product_details->image;
                    }

                    $new_product_image = $_FILES["image"];
                    $uploaded_image_path = $this->upload_image($new_product_image, "uploads/product_images/");
                }

                $condition = ["product_id" => $post_data["product_id"]];
                $data = [
                    "product_category_id" => $post_data["product_category_id"],
                    "name" => $post_data["name"]
                ];
                if (!empty($uploaded_image_path)) {
                    $data["image"] = $uploaded_image_path;
                }
                
                $product_updated = $this->admin_model->update_product_details($data, $condition);
                if ($product_updated) {
                    if (!empty($previous_product_image)) {
                        $this->delete_image($previous_product_image);
                    }

                    $condition = ["product_category_id" => $post_data["product_category_id"]];
                    $products_list = $this->admin_model->get_list_of_products_on_condition($condition);
                    $data["products_list"] = $products_list;

                    $this->output = [
                        "status" => true,
                        "message" => "Product Details Saved Successfully.",
                        "data" => $data,
                        "errors" => $this->validation->getErrors()
                    ];
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Database Error Occurred! Failed to save product details.",
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

    public function change_product_appearing_order() {
        $output = [];
        $json_data = $this->request->getJSON();
        foreach ($json_data as $i => $appearing_order_details) {
            $data = ["appearing_order" => $appearing_order_details->appearing_order];
            $condition = [
                "product_id" => $appearing_order_details->product_id,
                "product_category_id" => $appearing_order_details->product_category_id
            ];
            $products_updated = $this->admin_model->update_product_details($data, $condition);
        }

        $this->output = [
            "status" => true,
            "message" => "Product Appearing Order Changed.",
            "data" => new \stdClass,
            "errors" => $this->validation->getErrors()
        ];

        return $this->response->setJSON($this->output);
    }

    public function change_product_status() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'product_status_changing_rules')) {
            $this->output = [
                "status" => false,
                "message" => "Something went wrong! Please try again later.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            if ($this->check_admin_logged_in()) {
                $condition = ["product_id" => $post_data["product_id"]];
                $data = ["status" => $post_data["status"]];
                $product_updated = $this->admin_model->update_product_details($data, $condition);
                if ($product_updated) {
                    $this->output = [
                        "status" => true,
                        "message" => "Product Status Changed to ".ucwords(strtolower($post_data["status"])),
                        "data" => new \stdClass,
                        "errors" => $this->validation->getErrors()
                    ];
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Database Error Occurred! Failed to change product status.",
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

    public function delete_product($product_id) {
        $output = [];
        $condition = ["product_id" => $product_id];
        $product_details = $this->admin_model->get_product_details_on_condition($condition);
        $product_deleted = $this->admin_model->delete_product($condition);

        if ($product_deleted) {
            if (!empty($product_details->image)) {
                $image_path = FCPATH.$product_details->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            
            $this->output = [
                "status" => true, 
                "message" => "Product Deleted.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            $this->output = [
                "status" => false,
                "message" => "Database Error Occured! Failed to delete product.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }

        return $this->response->setJSON($this->output);
    }

}