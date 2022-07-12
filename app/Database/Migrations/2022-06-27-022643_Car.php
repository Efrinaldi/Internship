<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Car extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mobil'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'plat_nomor'          => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'status_mobil' => [
                'type'          => 'VARCHAR',
                'constraint'    => '255',
                'null'          => true,
            ],
            'keterangan_mobil' => [
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

        $this->forge->addKey('id_mobil', true);
        $this->forge->createTable('mobil');
    }

    public function down()
    {
        $this->forge->dropTable('mobil');
    }
}
