<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'tujuan'          => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'asal' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'nama' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'unit_kerja' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],


            'waktu' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'id_user' => [
                'type'          => 'INT',
                'constraint'    => 11,
                'null'          => true,
            ],


            'tanggal' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],


            'status' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'keterangan' => [
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

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_user', 'oauth_user', 'id_user');
        $this->forge->addForeignKey('id_mobil', 'mobil', 'id_mobil');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        $this->forge->dropTable('orders');
    }
}
