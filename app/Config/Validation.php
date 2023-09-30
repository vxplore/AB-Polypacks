<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------


    // ==================================
    // Admin Panel Validation Rules Start
    // ==================================
    public array $login = [
        'email' => 'required|max_length[255]|valid_email',
        'password' => 'required|max_length[255]'
    ];

    public array $pages_editing_rules = [
        'page_id' => 'required',
        'name' => 'required|max_length[255]',
        'slug' => 'required',
        'meta_title' => 'required',
        'meta_keywords' => 'required',
        'meta_description' => 'required'
    ];

    public array $banner_editing_rules = [
        'banner_id' => 'required'
    ];

    public array $banner_status_changing_rules = [
        'banner_id' => 'required',
        'status' => 'required'
    ];

    public array $new_client_adding_rules = [
        'name' => 'required'
    ];

    public array $client_editing_rules = [
        'client_id' => 'required',
        'name' => 'required'
    ];

    public array $new_product_category_adding_rules = [
        'name' => 'required'
    ];

    public array $product_category_editing_rules = [
        'category_id' => 'required',
        'name' => 'required'
    ];

    public array $product_category_status_changing_rules = [
        'category_id' => 'required',
        'status' => 'required'
    ];

    public array $new_product_adding_rules = [
        'product_category_id' => 'required',
        'name' => 'required|max_length[255]'
    ];

    public array $product_editing_rules = [
        'product_id' => 'required',
        'product_category_id' => 'required',
        'name' => 'required|max_length[255]'
    ];

    public array $product_status_changing_rules = [
        'product_id' => 'required',
        'status' => 'required'
    ];

    public array $new_testimonial_adding_rules = [
        'customer_name' => 'required|max_length[255]',
        'rating' => 'required',
        'testimonial' => 'required'
    ];

    public array $testimonial_editing_rules = [
        'customer_name' => 'required|max_length[255]',
        'rating' => 'required',
        'testimonial' => 'required'
    ];

    public array $testimonial_status_changing_rules = [
        'testimonial_id' => 'required',
        'status' => 'required'
    ];

    public array $contact_informations_saving_rules = [
        'uid' => 'required',
        'company_name' => 'required',
        'address' => 'required',
        'map_embeded_link' => 'required'
    ];
    // ================================
    // Admin Panel Validation Rules End
    // ================================
}
