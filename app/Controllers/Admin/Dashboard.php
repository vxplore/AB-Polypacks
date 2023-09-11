<?php 

namespace App\Controllers\Admin;

use App\Controllers\Admin\Common;

class Dashboard extends Common {

    public function index() {
        if ($this->check_admin_logged_in()) {
            echo view('admin/templates/header');
            echo view('admin/templates/navbar');
            echo view('admin/templates/sidebar');
            echo view('admin/dashboard_view');
            echo view('admin/templates/footer');
            echo view('admin/templates/footer_links');
        }
        else {
            return redirect()->to(base_url('admin'));
        }
    }
    
}