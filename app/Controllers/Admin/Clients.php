<?php 

namespace App\Controllers\Admin;

use App\Controllers\Admin\Common;

class Clients extends Common {

    public function index() {
        if ($this->check_admin_logged_in()) {
            $sidebar_data["pages"] = $this->admin_model->get_list_of_editable_pages();
            $data["list_of_clients"] = $this->admin_model->get_list_of_clients();

            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar', $sidebar_data);
            echo view('admin/client_list_view', $data);
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url("admin"));
        }
    }

    public function add_new_client() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'new_client_adding_rules')) {
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
                    $client_image = $_FILES["image"];
                    $uploaded_image_path = $this->upload_image($client_image, "uploads/client_images/");
                    if (!empty($uploaded_image_path)) {
                        $total_clients_count = $this->admin_model->get_total_clients_count();
                        $client_id = $this->GUID("CLIENT");
                        $data = [
                            "client_id" => $client_id,
                            "name" => $post_data["name"],
                            "image" => $uploaded_image_path,
                            "appearing_order" => intval($total_clients_count + 1)
                        ];

                        $client_added = $this->admin_model->add_client_details($data);
                        if ($client_added) {
                            $this->output = [
                                "status" => true,
                                "message" => "New Client Added Successfully.",
                                "data" => new \stdClass,
                                "errors" => $this->validation->getErrors()
                            ];
                        }
                        else {
                            $this->output = [
                                "status" => false,
                                "message" => "Database Error Occurred! Failed to Add New Client.",
                                "data" => new \stdClass,
                                "errors" => $this->validation->getErrors()
                            ];
                        }
                    }
                    else {
                        $this->output = [
                            "status" => false,
                            "message" => "Failed to Upload Client Image! Please try again later.",
                            "data" => new \stdClass,
                            "errors" => $this->validation->getErrors()
                        ];
                    }
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Please Upload an Image to Add New Client.",
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

    public function edit_client_details() {
        $output = [];
        $post_data = $this->request->getPost();

        if (!$this->validation->run($post_data, 'client_editing_rules')) {
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
                    $previous_client_details = $this->admin_model->get_client_details_on_condition(["client_id" => $post_data["client_id"]]);
                    if (!empty($previous_client_details->image)) {
                        $previous_client_image = $previous_client_details->image;
                    }

                    $new_client_image = $_FILES["image"];
                    $uploaded_image_path = $this->upload_image($new_client_image, "uploads/client_images/");
                }

                $condition = ["client_id" => $post_data["client_id"]];
                $data = [
                    "name" => $post_data["name"]
                ];
                if (!empty($uploaded_image_path)) {
                    $data["image"] = $uploaded_image_path;
                }
                
                $client_updated = $this->admin_model->update_client_details($data, $condition);
                if ($client_updated) {
                    if (!empty($previous_client_image)) {
                        $this->delete_image($previous_client_image);
                    }

                    $this->output = [
                        "status" => true,
                        "message" => "Client Details Saved Successfully.",
                        "data" => new \stdClass,
                        "errors" => $this->validation->getErrors()
                    ];
                }
                else {
                    $this->output = [
                        "status" => false,
                        "message" => "Database Error Occurred! Failed to save client details.",
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

    public function change_client_appearing_order() {
        $output = [];
        $json_data = $this->request->getJSON();
        foreach ($json_data as $i => $appearing_order_details) {
            $data = ["appearing_order" => $appearing_order_details->appearing_order];
            $condition = ["client_id" => $appearing_order_details->client_id];
            $client_updated = $this->admin_model->update_client_details($data, $condition);
        }

        $this->output = [
            "status" => true,
            "message" => "Client Appearing Order Changed.",
            "data" => new \stdClass,
            "errors" => $this->validation->getErrors()
        ];

        return $this->response->setJSON($this->output);
    }

    public function delete_client($client_id) {
        $output = [];
        $condition = ["client_id" => $client_id];
        $client_details = $this->admin_model->get_client_details_on_condition($condition);
        $client_deleted = $this->admin_model->delete_client($condition);

        if ($client_deleted) {
            if (!empty($client_details->image)) {
                $image_path = FCPATH.$client_details->image;
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }
            
            $this->output = [
                "status" => true, 
                "message" => "Client Deleted.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            $this->output = [
                "status" => false,
                "message" => "Database Error Occured! Failed to delete client.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }

        return $this->response->setJSON($this->output);
    }

}