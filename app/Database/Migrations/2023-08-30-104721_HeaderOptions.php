<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class HeaderOptions extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'uid' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'parent_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'link' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('header_options');
    }

    public function down()
    {
        $this->forge->dropTable('header_options');
    }
}
