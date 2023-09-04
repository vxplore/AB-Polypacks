<?php 

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class Terms_and_conditions extends BaseController {

    public function index() {
        echo view('client/templates/header');
        echo view('client/templates/navbar');
        echo view('client/terms_and_conditions_view');
        echo view('client/templates/footer');
        echo view('client/templates/footer_links');
    }

}