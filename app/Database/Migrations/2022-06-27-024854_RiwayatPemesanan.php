<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RiwayatPemesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],

            'id_pemesanan'          => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],

            'id_user'          => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'id_pengemudi'          => [
                'type'           => 'INT',
                'constraint'     => 11,
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

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_user', 'user', 'id_user');
        $this->forge->addForeignKey('id_pemesanan', 'orders', 'id');
        $this->forge->addForeignKey('id_pengemudi', 'pengemudi', 'id_pengemudi');
        $this->forge->createTable('pemesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan');
    }
}
