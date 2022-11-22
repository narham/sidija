<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AktifasiModel;
use App\Models\Status;



class UserController extends BaseController
{

    protected $UserModel;
    protected $aktivasi;
    protected $status;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->aktivasi = new AktifasiModel();
        $this->status = new Status();
    }

    public function index()
    {


        $data = [
            'link' => base_url('/admin'),
            'user' => $this->UserModel->findAll(),
            'status' => $this->status->findAll(),
            'aktivasi' => $this->aktivasi->findAll(),
        ];
        return view('admin/users', $data);
    }

    public function add()
    {
        // menampilkan form tambah siswa
        $data = [
            'user' => $this->UserModel->findAll(),
            'status' => $this->status->findAll(),
            'aktivasi' => $this->aktivasi->findAll(),
            'link' => base_url('/admin'),
        ];
        return view('admin/tambahusers', $data);
    }

    public function save()
    {
        // Simpan Data Siswa    
        // Validasi Isian
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'is_active' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->UserModel->insert([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'is_active' => $this->request->getVar('is_active'),
            'status' => $this->request->getVar('status'),
        ]);
        return redirect()->to('/user');
    }

    public function edit($id)
    {
        // menampilkan form edit siswa
        $datauser = $this->UserModel->find($id);
        if (empty($datauser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Taruna Tidak ditemukan !');
        }
        $data = [
            'judul' => 'Edit User',
            'bread' => 'Edit User',
            'header' => 'Edit User',
            'link' => base_url('/admin'),
            'user' => $this->UserModel->find($id),
            'status' => $this->status->findAll(),
            'aktivasi' => $this->aktivasi->findAll(),
        ];
        // dd($data);
        return view('admin/edituser', $data);
    }

    public function update($id)
    {
        // Update data siswa
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                ]
            ],

            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'is_active' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],


        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        // $prodi = $this->Prodi->get('prodi');
        $this->UserModel->update($id, [
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'is_active' => $this->request->getVar('is_active'),
            'status' => $this->request->getVar('status'),
        ]);
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        // Hapus Data User
        $datauser = $this->UserModel->find($id);
        if (empty($datauser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Taruna Tidak ditemukan !');
        }
        $this->UserModel->delete($id);
        session()->setFlashdata('message', 'Delete Data Taruna Berhasil');
        return redirect()->to('/user');
    }
}