<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ProdiModel;

class ProdiController extends BaseController
{
    protected $Prodi;

    function __construct()
    {
        $this->Prodi = new ProdiModel();
    }
    public function index()
    {
        // Menampilkan Data Kelas
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            'prodi' => $this->Prodi->findAll()
        ];
        return view('admin/prodi', $data);
    }
    public function add()
    {
        // menampilkan form tambah siswa
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
        ];
        return view('admin/tambahprodi', $data);
    }

    public function save()
    {

        // Simpan Data Kelas    
        // Validasi Isian
        if (!$this->validate([
            'prodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],



        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->Prodi->insert([
            'prodi' => $this->request->getVar('prodi'),
            'keterangan' => $this->request->getVar('keterangan'),

        ]);


        return redirect()->to('/prodi');
    }

    public function edit($id)
    {
        $dataprodi = $this->Prodi->find($id);
        if (empty($dataprodi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Taruna Tidak ditemukan !');
        }
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            // 'link' => base_url('/admin'),
            'prodi' => $this->Prodi->find($id),
        ];
        // dd($data);
        return view('admin/editprodi', $data);
    }

    public function update($id)
    {
        // Update data siswa
        // Update data siswa
        if (!$this->validate([
            'prodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'keterangan' => [
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
        $this->Prodi->update($id, [
            'prodi' => $this->request->getVar('prodi'),
            'keterangan' => $this->request->getVar('keterangan'),
        ]);
        return redirect()->to('/prodi');
    }

    public function delete($id)
    {
        // Hapus Data Siswa
        $dataprodi = $this->Prodi->find($id);
        if (empty($dataprodi)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Prodi Tidak ditemukan !');
        }
        $this->Prodi->delete($id);
        session()->setFlashdata('message', 'Delete Data Prodi Berhasil');
        return redirect()->to('/prodi');
    }
}