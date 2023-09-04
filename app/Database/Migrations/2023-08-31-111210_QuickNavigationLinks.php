<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class QuickNavigationLinks extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'link' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('quick_navigation_links');
    }

    public function down()
    {
        $this->forge->dropTable('quick_navigation_links');
    }
}
