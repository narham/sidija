<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\KelasModel;

use App\Models\ProdiModel;
use App\Models\SiswaModel;


class KelasController extends BaseController
{
    protected $Kelas;
    protected $Prodi;
    protected $Siswa;

    function __construct()
    {
        $this->Kelas = new KelasModel();
        $this->Prodi = new ProdiModel();
        $this->Siswa = new SiswaModel();
    }
    public function index()
    {
        // Menampilkan Data Kelas
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            'kelas' => $this->Kelas->findAll()
        ];
        return view('admin/kelas', $data);
    }
    public function add()
    {

        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            'prodi' => $this->Prodi->findAll()
        ];
        // menampilkan form tambah siswa
        return view('admin/tambahkelas', $data);
    }

    public function save()
    {

        // Simpan Data Kelas    
        // Validasi Isian
        if (!$this->validate([
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            // 'keterangan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Harus diisi',
            //     ]
            // ],



        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $prodi = $this->request->getvar('prodi');
        $data = [
            'kelas' => $this->request->getVar('kelas') . " - " . $prodi,
        ];
        $this->Kelas->insert($data);
        return redirect()->to('/kelas');
    }

    public function edit($id)
    {
        $datakelas = $this->Kelas->find($id);
        if (empty($datakelas)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Taruna Tidak ditemukan !');
        }
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            'kelas' => $this->Kelas->find($id),
            'prodi' => $this->Prodi->findAll()
        ];
        // dd($data);
        return view('admin/editkelas', $data);
    }

    public function update($id)
    {
        // Update data siswa
        if (!$this->validate([
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
            // 'keterangan' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} Harus diisi',
            //     ]
            // ],



        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $prodi = $this->request->getvar('prodi');
        $this->Kelas->update($id, [
            'kelas' => $this->request->getVar('kelas') . " - " . $prodi,
        ]);
        return redirect()->to('/kelas');
    }

    public function delete($id)
    {
        // Hapus Data Siswa
        $datakelas = $this->Kelas->find($id);
        if (empty($datakelas)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Taruna Tidak ditemukan !');
        }
        $this->Kelas->delete($id);
        session()->setFlashdata('message', 'Delete Data Taruna Berhasil');
        return redirect()->to('/kelas');
    }

    public function kelas_by_id($id_kelas)
    {
        // Menampilkan Profile Kelas BY ID KELAS

        // $datasiswa = $this->Siswa->datasiswa_by_kelas->find($id_kelas);
        // $Prodi = $this->Siswa['prodi'];
        $datakelas = $this->Kelas->find($id_kelas);
        if (empty($datakelas)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Taruna Tidak ditemukan !');
        }
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            'kelas' => $this->Kelas->find($id_kelas),
            'siswa' => $this->Siswa->where('kelas', $id_kelas)->findAll(),
            'j_siswa' => $this->Siswa->where('kelas', $id_kelas)->countAllResults()
        ];
        // dd($data);
        return view('admin/profilekelas', $data);
    }
}