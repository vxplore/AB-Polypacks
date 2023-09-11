<?php 

namespace App\Controllers\Admin;

use App\Controllers\Admin\Common;

class SEO extends Common {

    public function index() {
        if ($this->check_admin_logged_in()) {
            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar');
            echo view('admin/SEO_list_view');
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url("admin"));
        }
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