<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ContactInformations extends Migration
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
            'type' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'company_name' => [
                'type' => 'TEXT'
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],
            'landline' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'location_coordinates' => [
                'type' => 'JSON',
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('contact_informations');
    }

    public function down()
    {
        $this->forge->dropTable('contact_informations');
    }
}
