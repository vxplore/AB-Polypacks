<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Testimonials extends Migration
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
            'client_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'testimonial' => [
                'type' => 'TEXT'
            ],
            'rating' => [
                'type' => 'FLOAT'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('testimonials');
    }

    public function down()
    {
        $this->forge->dropTable('testimonials');
    }
}
