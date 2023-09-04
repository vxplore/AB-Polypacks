<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SystemPreferences extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'uid' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'key' => [
                'type' => 'TEXT'
            ],
            'value' => [
                'type' => 'TEXT'
            ]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('system_preferences');
    }

    public function down()
    {
        $this->forge->dropTable("system_preferences");
    }
}
