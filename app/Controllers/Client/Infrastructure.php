<?php 

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class Infrastructure extends BaseController {

    public function index() {
        echo view('client/templates/header');
        echo view('client/templates/navbar');
        echo view('client/infrastructure_view');
        echo view('client/templates/footer');
        echo view('client/templates/footer_links');
    }

}