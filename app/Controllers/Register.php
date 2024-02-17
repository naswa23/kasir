<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RegisterModel;

class Register extends BaseController
{
    protected $user;

    function __construct()
    {
        $this->user = new RegisterModel();
    }

    public function index()
    {
        return view('v_register');
    }

    public function ambilSemua()
    {
        $data = $this->user->findAll();

        return json_encode($data); //data dirubah menjadi json
    }

    public function simpan()
    {
        $this->user->insert([
            'username' => $this->request->getVar('username'),
            'password' =>password_hash($this->request->getVar('password'),PASSWORD_BCRYPT),
            'nama_user' => $this->request->getVar('namaUser'),
            'role' => $this->request->getVar('role')
        ]);

        return 'sukses';
    }

    public function edit()
    {
        $id_user = $this->request->getVar('id_user');
        $data = $this->user->find($id_user);

        return json_encode($data);
    }

    public function update()
    {
        $id_user = $this->request->getVar('id_user');

        $this->user->update($id_user, [
            'username' => $this->request->getVar('username'),
          //  'password' => $this->request->getVar('password'),
            'nama_user' => $this->request->getVar('namaUser'),
            'role' => $this->request->getVar('role'),
        ]);
    }

    public function delete()
    {
        $id_user = $this->request->getVar('id_user');
        $this->user->delete($id_user);
    }
}
