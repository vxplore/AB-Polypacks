<?php 

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class Contact_us extends BaseController {

    public function index() {
        echo view('client/templates/header');
        echo view('client/templates/navbar');
        echo view('client/contact_us_view');
        echo view('client/templates/footer');
        echo view('client/templates/footer_links');
    }

}