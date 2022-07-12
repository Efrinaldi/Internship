<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Driver extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengemudi'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'nama_pengemudi'          => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'status_pengemudi' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'id_mobil' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'null'          => true,
            ],
            'id_user' => [
                'type'          => 'INT',
                'constraint'    => 11,
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

        $this->forge->addKey('id_pengemudi', true);
        $this->forge->addForeignKey('id_user', 'oauth_user', 'id');
        $this->forge->addForeignKey('id_mobil', 'mobil', 'id_mobil');
        $this->forge->createTable('pengemudi');
    }


    public function down()
    {
        $this->forge->dropTable('pengemudi');
    }
}
