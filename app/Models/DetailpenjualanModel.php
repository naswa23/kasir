<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailpenjualanModel extends Model
{  protected $table            = 'tb_detailpenjualan';
    protected $primaryKey       = 'id_detail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ["id_detail", "id_penjualan", "id_produk", "jumlah_produk", "sub_total"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
