<?php 

namespace App\Controllers\Admin;

use App\Controllers\Admin\Common;

class Testimonials extends Common {

    public function index() {
        if ($this->check_admin_logged_in()) {
            $sidebar_data["pages"] = $this->admin_model->get_list_of_editable_pages();
            $data["list_of_testimonials"] = $this->admin_model->get_list_of_testimonials();

            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar', $sidebar_data);
            echo view('admin/testimonials_list_view', $data);
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url("admin"));
        }
    }

    public function add_new_testimonial() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'new_testimonial_adding_rules')) {
            $this->output = [
                "status" => false,
                "message" => "Something went wrong! Please try again later.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            if ($this->check_admin_logged_in()) {
                if (!empty($_FILES["customer_image"]["name"])) {
                    $customer_image = $_FILES["customer_image"];
                    $uploaded_image_path = $this->upload_image($customer_image, "uploads/customer_images/");
                    if (!empty($uploaded_image_path)) {
                        $total_testimonials_count = $this->admin_model->get_total_testimonials_count();
                        $testimonial_id = $this->GUID("TESTIMONIAL");
                        $data = [
                            "testimonial_id" => $testimonial_id,
                            "customer_name" => $post_data["customer_name"],
                            "customer_image" => $uploaded_image_path,
                            "rating" => $post_data["rating"],
                            "testimonial" => $post_data["testimonial"],
                            "appearing_order" => intval($total_testimonials_count + 1),
                            "status" => "ACTIVE"
                        ];

                        $testimonial_added = $this->admin_model->add_testimonial_details($data);
                        if ($testimonial_added) {
                            $this->output = [
                                "status" => true,
                                "message" => "New Testimonial Added Successfully.",
                                "data" => new \stdClass,
                                "errors" => $this->validation->getErrors()
                            ];
                        }
                        else {
                            $this->output = [
                                "status" => false,
                                "message" => "Database Error Occurred! Failed to Add New Testimonial.",
                                "data" => new \stdClass,
                                "errors" => $this->validation->getErrors()
                            ];
                        }
                    }
                    else {
                        $this->output = [
                            "status" => false,
                            "message" => "Failed to Upload Customer Image! Please try again later.",
                            "data" => new \stdClass,
                            "errors" => $this->validation->getErrors()
                        ];
                    }
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Please Upload an Customer Image to Add New Testimonial.",
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

    public function edit_testimonial_details() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'testimonial_editing_rules')) {
            $this->output = [
                "status" => false,
                "message" => "Something went wrong! Please try again later.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            if ($this->check_admin_logged_in()) {
                if (!empty($_FILES["customer_image"]["name"])) {
                    $previous_testimonial_details = $this->admin_model->get_testimonial_details_on_condition(["testimonial_id" => $post_data["testimonial_id"]]);
                    if (!empty($previous_testimonial_details->customer_image)) {
                        $previous_customer_image = $previous_testimonial_details->customer_image;
                    }

                    $new_customer_image = $_FILES["customer_image"];
                    $uploaded_image_path = $this->upload_image($new_customer_image, "uploads/customer_images/");
                }

                $condition = ["testimonial_id" => $post_data["testimonial_id"]];
                $data = [
                    "customer_name" => $post_data["customer_name"],
                    "rating" => $post_data["rating"],
                    "testimonial" => $post_data["testimonial"]
                ];
                if (!empty($uploaded_image_path)) {
                    $data["customer_image"] = $uploaded_image_path;
                }
                
                $testimonial_updated = $this->admin_model->update_testimonial_details($data, $condition);
                if ($testimonial_updated) {
                    if (!empty($previous_customer_image)) {
                        $this->delete_image($previous_customer_image);
                    }

                    $this->output = [
                        "status" => true,
                        "message" => "Testimonial Details Saved Successfully.",
                        "data" => new \stdClass,
                        "errors" => $this->validation->getErrors()
                    ];
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Database Error Occurred! Failed to save testimonial details.",
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

    public function change_testimonial_appearing_order() {
        $output = [];
        $json_data = $this->request->getJSON();
        foreach ($json_data as $i => $appearing_order_details) {
            $data = ["appearing_order" => $appearing_order_details->appearing_order];
            $condition = [
                "testimonial_id" => $appearing_order_details->testimonial_id
            ];
            $testimonial_updated = $this->admin_model->update_testimonial_details($data, $condition);
        }

        $this->output = [
            "status" => true,
            "message" => "Testimonial Appearing Order Changed.",
            "data" => new \stdClass,
            "errors" => $this->validation->getErrors()
        ];

        return $this->response->setJSON($this->output);
    }

    public function change_testimonial_status() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'testimonial_status_changing_rules')) {
            $this->output = [
                "status" => false,
                "message" => "Something went wrong! Please try again later.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            if ($this->check_admin_logged_in()) {
                $condition = ["testimonial_id" => $post_data["testimonial_id"]];
                $data = ["status" => $post_data["status"]];
                $testimonial_category_updated = $this->admin_model->update_testimonial_details($data, $condition);
                if ($testimonial_category_updated) {
                    $this->output = [
                        "status" => true,
                        "message" => "Testimonial Status Changed to ".ucwords(strtolower($post_data["status"])),
                        "data" => new \stdClass,
                        "errors" => $this->validation->getErrors()
                    ];
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Database Error Occurred! Failed to change testimonial status.",
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

    public function delete_testimonial($testimonial_id) {
        $output = [];
        $condition = ["testimonial_id" => $testimonial_id];
        $testimonial_details = $this->admin_model->get_testimonial_details_on_condition($condition);
        $testimonial_deleted = $this->admin_model->delete_testimonial($condition);

        if ($testimonial_deleted) {
            if (!empty($testimonial_details->image)) {
                $image_path = FCPATH.$testimonial_details->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            
            $this->output = [
                "status" => true, 
                "message" => "Testimonial Deleted.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            $this->output = [
                "status" => false,
                "message" => "Database Error Occured! Failed to delete testimonial.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }

        return $this->response->setJSON($this->output);
    }

}