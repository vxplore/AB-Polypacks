<?php 

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class Privacy_policy extends BaseController {

    public function index() {
        echo view('client/templates/header');
        echo view('client/templates/navbar');
        echo view('client/privacy_policy_view');
        echo view('client/templates/footer');
        echo view('client/templates/footer_links');
    }

}