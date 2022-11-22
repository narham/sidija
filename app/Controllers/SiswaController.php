<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\ProdiModel;

class SiswaController extends BaseController
{
    protected $Siswa;
    protected $Kelas;
    protected $Prodi;

    function __construct()
    {
        $this->Siswa = new SiswaModel();
        $this->Kelas = new KelasModel();
        $this->Prodi = new ProdiModel();
    }
    public function index()
    {
        // Menampilkan Database Siswa      
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            'siswa' => $this->Siswa->datasiswa(),
        ];
        $data['siswa'] = $this->Siswa->datasiswa();
        return view('admin/siswa', $data);
    }

    public function add()
    {
        // menampilkan form tambah siswa
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            'kelas' => $this->Kelas->findAll(),
            'prodi' => $this->Prodi->findAll()
        ];
        return view('admin/tambahsiswa', $data);
    }

    public function save()
    {

        // Simpan Data Siswa    
        // Validasi Isian
        // $kodenit = "C";

        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'nit' => [
                'rules' => 'required|min_length[11]|max_length[11]|is_unique[siswa.nit]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} anda kurang',
                    'max_length' => '{field} anda melebihi',
                    'is_unique' => 'nit sudah terdaftar'
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'prodi' => [
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
        $data = [
            // 'nit' => $kodenit . $this->request->getVar('nit'),
            'nit' => $this->request->getVar('nit'),
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'prodi' => $this->request->getVar('prodi'),
        ];
        // dd($data);
        $this->Siswa->insert($data);
        return redirect()->to('/siswa');
    }

    public function edit($id_taruna)
    {
        $datasiswa = $this->Siswa->find($id_taruna);
        if (empty($datasiswa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Taruna Tidak ditemukan !');
        }
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            'siswa' => $this->Siswa->find($id_taruna),
            'kelas' => $this->Kelas->findAll(),
            'prodi' => $this->Prodi->findAll()
        ];
        // dd($data);
        return view('admin/editsiswa', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'nit' => [
                'rules' => 'required|min_length[11]|max_length[11]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} anda kurang',
                    'max_length' => '{field} anda melebihi',
                    'is_unique' => 'nit sudah terdaftar'
                ]
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            'prodi' => [
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
        $this->Siswa->update($id, [
            'nit' => $this->request->getVar('nit'),
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'prodi' => $this->request->getVar('prodi'),
        ]);
        return redirect()->to('/siswa');
    }

    public function delete($id)
    {

        $DataSiswa = $this->Siswa->find($id);
        if (empty($DataSiswa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Taruna Tidak ditemukan !');
        }
        $this->Siswa->delete($id);
        session()->setFlashdata('message', 'Delete Data Taruna Berhasil');
        return redirect()->to('/siswa');
    }
}