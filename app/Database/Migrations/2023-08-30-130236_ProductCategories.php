<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductCategories extends Migration
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
            'description' => [
                'type' => 'TEXT'
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('product_categories');
    }

    public function down()
    {
        $this->forge->dropTable('product_categories');
    }
}
