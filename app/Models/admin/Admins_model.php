<?php 

namespace App\Models\Admin;

use CodeIgniter\Model;

class Admins_model extends Model {

    function __construct() {
        $this->db = db_connect();
    }

    public function get_admin_details($condition = []) {
        $admin_table = $this->db->table("admins");
        if (!empty($condition)) {
            $admin_table->where($condition);
        }
        return $admin_table->get()->getRow();
    }

}