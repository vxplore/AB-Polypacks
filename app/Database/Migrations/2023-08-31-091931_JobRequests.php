<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JobRequests extends Migration
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
            'gender' => [
                'type' => 'ENUM("MALE", "FEMALE", "OTHER")',
                'default' => 'MALE'
            ],
            'location' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'area_of_interest' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'resume' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'requested_date' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('job_requests');
    }

    public function down()
    {
        $this->forge->dropTable('job_requests');
    }
}
