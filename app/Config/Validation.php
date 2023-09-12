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
    // ================================
    // Admin Panel Validation Rules End
    // ================================
}
