<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RegisterModel;

class Login extends BaseController
{
    public function index()
    {
        return view("v_login");
    }
    public function process()
    {
        $users = new RegisterModel();
        $username = $this->request->getVar("username");
        $password = $this->request->getVar("password");
        $dataUser = $users->where("username", $username)->first();

        if ($dataUser)
        {
            if(password_verify($password, $dataUser->password)){
                session()->set([
                    "username"=> $dataUser->username,
                    'logged_in' => true
                ]);
                return redirect()->to(base_url('/produk'));
            }else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else
        {
            session()->setFlashdata('error','Username dan Password Salah');
            return redirect()->back();
        }
    }
}
