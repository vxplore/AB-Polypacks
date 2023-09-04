<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PageSections extends Migration
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
            'page_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'section_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'heading' => [
                'type' => 'TEXT'
            ],
            'sub_heading' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'description' => [
                'type' => 'TEXT'
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
        $this->forge->createTable('page_sections');
    }

    public function down()
    {
        $this->forge->dropTable('page_sections');
    }
}
