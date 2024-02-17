<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Registerr extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'=>[
                'type'=>'INT',
                'constraint'=>'11',
                'auto_increment'=>true,
                'unsigned'=>true,
            ],
            'username'=>[
                'type'=>'VARCHAR',
                'constraint'=>'25',
            ],
            'password'=>[
                'type'=>'VARCHAR',
                'constraint'=>'255',
            ],
            'nama_user'=>[
                'type'=>'VARCHAR',
                'constraint'=>'50',
            ],
            'role'=>[ 
                'type'=>'ENUM("admin","kasir")', 
                'default'=>'kasir', 
            ],
            'created_at'=>[
                'type'=>'DATETIME',
                'NULL'=>true,
            ],
            'updated_at'=>[
                'type'=>'DATETIME',
                'NULL'=>true,
            ],
            'deleted_at'=>[
                'type'=>'DATETIME',
                'NULL'=>true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_user');
        $this->forge->createTable('tb_user');
    }

    public function down()
    {
        $this->forge->dropTable('tb_user');
    }
}
