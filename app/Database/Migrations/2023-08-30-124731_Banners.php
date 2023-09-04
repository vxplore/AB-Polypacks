<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Banners extends Migration
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
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'image' => [
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
        $this->forge->createTable('banners');
    }

    public function down()
    {
        $this->forge->dropTable('banners');
    }
}
