<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbPelanggan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            "id_pelanggan"=>[
                "type"=>"INT",
                "constraint"=>11,
            ],
            "nama_pelanggan"=>[
                "type"=>"VARCHAR",
                "constraint"=>"255",
            ],
            "alamat"=>[
                "type"=>"TEXT",
            ],
            "telp"=>[
                "type"=>"VARCHAR",
                "constraint"=>"15",
            ],
            "created_at"=>[
                "type"=>"DATETIME",
                "null"=>true,
            ],
            "updated_at"=>[
                "type"=>"DATETIME",
                "null"=>true,
            ],
            "deleted_at"=>[
                "type"=>"DATETIME",
                "null"=>true,
            ]
        ]);
        $this->forge->addKey("id_pelanggan", true);
        $this->forge->createTable("tb_pelanggan");
    }

    public function down()
    {
        $this->forge->createTable("tb_pelanggan");
    }
}
