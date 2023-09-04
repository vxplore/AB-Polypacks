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
            $this->output = [
                "status" => true,
                "message" => "Post Data get successfully.",
                "data" => [
                    "post_data" => $post_data,
                    "admin_details" => $admin_details
                ],
                "errors" => $this->validation->getErrors()
            ];
        }

        return $this->response->setJSON($this->output);
    }

    public function get_signup_view() {
        echo view('admin/templates/header');
        echo view('admin/signup_view');
        echo view('admin/templates/footer_links');
    }

}