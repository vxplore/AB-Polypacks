<?php 

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class About extends BaseController {

    public function index() {
        echo view('client/templates/header');
        echo view('client/templates/navbar');
        echo view('client/about_view');
        echo view('client/templates/footer');
        echo view('client/templates/footer_links');
    }

}