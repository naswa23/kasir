<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailpenjualanModel;
use CodeIgniter\HTTP\ResponseInterface;

class DetailPenjualan extends BaseController
{
    protected $detail;

    public function __construct()
    {
        $this->detail = new DetailpenjualanModel();
    }

    public function index()
    {
        // Mendapatkan data transaksi dari permintaan POST
        $transactions = $this->request->getPost('transactions');

        // Validasi data transaksi
        if (!empty($transactions)) {
            // Simpan setiap transaksi ke database
            foreach ($transactions as $transaction) {
                $data = [
                    'id_penjualan' => $transaction['id_penjualan'],
                    'id_produk' => $transaction['id_produk'],
                    'jumlah_produk' => $transaction['jumlah'],
                    'sub_total' => $transaction['subtotal']
                    // Tambahkan kolom lain sesuai kebutuhan
                ];
                // Simpan data ke database
                $this->detail->insert($data);
            }

            // Kirim pesan sukses
            return $this->response->setJSON(['message' => 'Transaksi berhasil disimpan.']);
        } else {
            // Kirim pesan error jika data transaksi kosong
            return $this->response->setJSON(['error' => 'Data transaksi kosong.']);
        }
    }
}
