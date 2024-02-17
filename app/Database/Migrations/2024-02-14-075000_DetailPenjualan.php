<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPenjualan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_detail' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
                'unsigned' => true,
            ],
            'id_penjualan' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_produk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'jumlah_produk' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'sub_total' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);
        $this->forge->addForeignKey('id_penjualan', 'tb_penjualan', 'id_penjualan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_produk', 'tb_produk', 'id_produk', 'CASCADE', 'CASCADE');
        $this->forge->addPrimaryKey('id_detail');
        $this->forge->createTable('tb_detailPenjualan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_detailPenjualan');
    }
}
