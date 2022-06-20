<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableReimburse extends Migration
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
            'deskripsi' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'nominal'       => [
                'type'       => 'INT',
                'constraint' => '11',
                'null'       => true,
            ],
            'photo' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'status' => [
                'type'          => 'ENUM',
                'constraint'    => "'Requesting','Approved','Rejected'",
                'default'       => 'Requesting',
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
        $this->forge->addForeignKey('id_pemesanan', 'pemesanan', 'id');
        $this->forge->createTable('reimburse');
    }

    public function down()
    {
        $this->forge->dropTable('reimburse');
    }
}
