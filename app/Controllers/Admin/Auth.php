<?php 

namespace App\Controllers\Admin;

use App\Controllers\Admin\Common;

class Auth extends Common {

    public function index() {
        if ($this->check_admin_logged_in()) {
            return redirect()->to(base_url('admin/dashboard'));
        }
        else {
            $this->get_login_view();
        }
    }

    public function get_login_view() {
        echo view('admin/templates/header');
        echo view('admin/login_view');
        echo view('admin/templates/footer_links');
    }

    public function verify_user() {
        $output = [];
        $post_data = $this->request->getPost();
        if (!$this->validation->run($post_data, 'login')) {
            $this->output = [
                "status" => false,
                "message" => "Something went wrong! Please try again later.",
                "data" => new \stdClass,
                "errors" => $this->validation->getErrors()
            ];
        }
        else {
            $admin_details = $this->admin_model->get_admin_details(['email' => $post_data['email']]);
            if (!empty($admin_details->password)) {
                $encryped_password = md5($post_data['password']);
                $saved_password = $admin_details->password;
                if ($encryped_password == $saved_password) {
                    $status = true;
                    $message = "Admin verification successfull.";
                    $data["redirect_to"] = base_url("admin/dashboard");
                }
                else {
                    $status = false;
                    $message = "Your given password is wrong!";
                    $data = new \stdClass;
                }
                $this->output = [
                    "status" => $status,
                    "message" => $message,
                    "data" => $data,
                    "errors" => $this->validation->getErrors()
                ];
            }
            else {
                $this->output = [
                    "status" => false,
                    "message" => "No admin account found with this Email!",
                    "data" => new \stdClass,
                    "errors" => $this->validation->getErrors()
                ];   
            }
        }

        return $this->response->setJSON($this->output);
    }

}