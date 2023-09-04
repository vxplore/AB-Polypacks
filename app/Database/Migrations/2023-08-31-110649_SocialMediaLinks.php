<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SocialMediaLinks extends Migration
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
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'link' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('social_media_links');
    }

    public function down()
    {
        $this->forge->dropTable('social_media_links');
    }
}
