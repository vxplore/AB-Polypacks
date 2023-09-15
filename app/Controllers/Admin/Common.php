<?php 

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Common extends BaseController {

    protected $session;
    protected $request;
    protected $validation;
    
    protected $admin_model;

    public function initController($request, $response, $logger) {
        parent::initController($request, $response, $logger);
        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();
        $this->validation = \Config\Services::validation();

        $this->admin_model = new \App\Models\Admin\Admins_model;
    }

    public function check_admin_logged_in() {
        return (!empty($this->session->has('admin_id'))) ? true : false;
    }

    public function GUID($prefix = "") {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }
    
        $unique_code = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

        if (!empty($prefix)) {
            return $prefix."_".$unique_code."_".time();
        }
        else {
            return $unique_code;
        }
    }

    public function upload_image($image, $image_upload_directory)
    {
        $uploaded_image_path = NULL;
        if (!empty($image) && !empty($image_upload_directory))
        {
            $file_name = $this->GUID();
            $file_extension = ".".pathinfo($image["name"], PATHINFO_EXTENSION);
            
            $file_save_path = $image_upload_directory.$file_name.$file_extension;
            $file_upload_path = FCPATH.$file_save_path;

            if (move_uploaded_file($image["tmp_name"], $file_upload_path))
            {
                $uploaded_image_path = $file_save_path;
            }
        }
        return $uploaded_image_path;
    }

    public function delete_image($image_path)
    {
        if (!empty($image_path))
        {
            unlink(FCPATH.$image_path);
        }
    }

}