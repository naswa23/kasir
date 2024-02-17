<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbProduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type'  => 'INT',
                'constraint' => '11',
                'auto_increment' => true, 
                'unsigned' => true,
            ],
            'nama_produk' => [
                'type'  => 'VARCHAR',
                'constraint' => '255',
            ],
            'harga' => [
                'type'  => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'stok' => [
                'type'  => 'INT',
                'constraint' => '11',
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
    $this->forge->addKey('id_produk', TRUE); 
    $this->forge->createTable('tb_produk', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tb_produk');
    }
}
