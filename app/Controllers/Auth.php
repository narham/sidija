<?php

namespace App\Controllers;

use App\Controllers\BaseController;

// use App\Models\UsersModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        //
        return view('Auth/login');
    }

    public function login()
    {
        // Verifikasi akun          
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $this->UserModel->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'nama' => $dataUser['nama'],
                    'username' => $dataUser['username'],
                    'is_active' => $dataUser['is_active'],
                    'status' => $dataUser['status'],
                    'foto' => $dataUser['foto'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/admin'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Salah');
            return redirect()->back();
        }
    }

    public function logout()
    {
        // logout
        session()->destroy();
        return redirect()->to('/');
    }
}