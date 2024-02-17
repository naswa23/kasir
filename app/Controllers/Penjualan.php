<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PenjualanModel;
use App\Models\PelangganModel;

class Penjualan extends BaseController
{
    protected $penjualan;
    protected $pelanggan;

    public function __construct()
    {
        $this->penjualan = new PenjualanModel();
        $this->pelanggan = new PelangganModel();
    }


    public function index()
    {
        $data['pelanggan'] = $this->pelanggan->findAll();
        return view('v_penjualan', $data);
    }
    public function simpan() 
    { 
        // Simpan data penjualan ke dalam database 
        $this->penjualan->insert([ 
            'tgl_penjualan' => $this->request->getVar('tgl'), 
            'total_harga' => $this->request->getVar('total'), 
            'id_pelanggan' => $this->request->getVar('idPelanggan') 
        ]); 
 
        // Kirim respons sukses 
        return 'sukses'; 
    }
    public function ambilSemua()
    {
        $data = $this->penjualan->findAll();

        return json_encode($data); //data dirubah menjadi json
    }
}
