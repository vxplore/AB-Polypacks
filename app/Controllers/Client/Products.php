<?php 

namespace App\Controllers\Client;

use App\Controllers\BaseController;

class Products extends BaseController {

    public function index() {
        echo view('client/templates/header');
        echo view('client/templates/navbar');
        echo view('client/product_categories_view');
        echo view('client/templates/footer');
        echo view('client/templates/footer_links');
    }

}