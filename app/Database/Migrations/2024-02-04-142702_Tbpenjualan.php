<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tbpenjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penjualan' => [
                'type'  => 'INT',
                'constraint' =>11,
                'auto_increment' => true, 
                'unsigned' => true,
            ],
            'tgl_penjualan' => [
                'type'  => 'DATE',
                'null'=>true,
            ],
            'total_harga' => [
                'type'  => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'id_pelanggan' => [
                'type'  => 'INT',
                'constraint' => 11,
            ],
            'created_at' => [   
                'type' => 'DATETIME',
                'null'=>true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null'=>true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null'=>true,
            ],
        ]);
    $this->forge->addKey('id_penjualan', TRUE); 
    $this->forge->addForeignKey('id_pelanggan', 'tb_pelanggan', 'id_pelanggan', 'CASCADE', 'CASCADE');
    $this->forge->createTable('tb_penjualan', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_penjualan', TRUE);
    }
}
