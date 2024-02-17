<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use CodeIgniter\HTTP\ResponseInterface;

class Pelanggan extends BaseController
{
    protected $pelanggan;

    function __construct()
    {
        $this->pelanggan = new PelangganModel();
    }
    public function all()
    {
        return view('v_pelanggan');
    }
    public function showw()
    {
        $data = $this->pelanggan->findAll(); //mengambil semua data dari tabel

        return json_encode($data); //merubah $data menjadi json
    }

    public function save()
    {
        $this->pelanggan->insert([
            'nama_pelanggan'=> $this->request->getVar('namapelanggan'), //getVar('namaProduk') diambil bukan nama tabel tp yg warna biru
            'alamat'=> $this->request->getVar('alamat'), 
            'telp'=> $this->request->getVar('telp')
        ]);

        return 'sukses';
    }
    public function edit2() 
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');
        $data = $this->pelanggan->find($id_pelanggan);

        return json_encode($data);
    }

    public function update2()
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');

        $this->pelanggan->update($id_pelanggan,[
            'nama_pelanggan'=> $this->request->getVar('namapelanggan'), //getVar('namaProduk') diambil bukan nama tabel tp yg warna biru
            'alamat'=> $this->request->getVar('alamat'), 
            'telp'=> $this->request->getVar('telp')
        ]);
    }

    public function delete2()
    {
        $id_pelanggan = $this->request->getVar('id_pelanggan');
        $this->pelanggan->delete($id_pelanggan);

    }
}
