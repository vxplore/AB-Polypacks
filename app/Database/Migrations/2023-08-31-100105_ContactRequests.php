<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ContactRequests extends Migration
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20
            ],
            'subject' => [
                'type' => 'TEXT'
            ],
            'message' => [
                'type' => 'TEXT'
            ],
            'requested_date' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('contact_requests');
    }

    public function down()
    {
        $this->forge->dropTable('contact_requests');
    }
}
