<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'first_name'          => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'last_name' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'email' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'password' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'username' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'token_id' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],

            'nama_user' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'unit_kerja' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'nip' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'role' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'created_by' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_user', true);
        $this->forge->createTable('oauth_user');
    }

    public function down()
    {
        $this->forge->dropTable('oauth_user');
    }
}
