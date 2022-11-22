<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\SiswaModel;
use App\Models\PiketModel;
use App\Models\JagaModel;


class PiketController extends BaseController
{
    protected $Siswa;
    protected $Piket;
    protected $Jaga;

    public function __construct()
    {
        $this->Siswa = new SiswaModel();
        $this->Piket = new PiketModel();
        $this->Jaga = new JagaModel();
    }
    public function index()
    {
        //
        $idsiswa    = array();
        $idsiswa['id_siswa'] = $this->Siswa->findAll();
        $tanggal = date('Y-m-d');
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            'siswa' => $this->Siswa->datasiswa(),
            'piket' => $this->Piket->datasiswa_piket()->where('tanggal', $tanggal)->get()->getresultarray(),
            'tanggal' => $tanggal,
        ];

        // dd($data);
        return view('admin/piket', $data);
    }

    public function jaga()
    {
        //
        $tanggal = date('Y-m-d');
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            // 'siswa' => $this->Siswa->datasiswa(),
            'piket' => $this->Piket->datasiswa_piket()->where('tanggal', $tanggal)->get()->getresultarray(),
        ];
        // dd($data);

        return view('petugas/petugasjaga', $data);
    }

    public function save_piket()
    {
        $id = $this->request->getvar('id'); // Ambil data nis dan masukkan ke variabel id
        $data = array();

        // $index = 0; // Set index array awal dengan 0
        foreach ($id as $dataid) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, array(
                'id_siswa' => $dataid,
                'tanggal' => $this->request->getVar('tanggal'),  // Ambil dan set data nama sesuai index array dari $index   
            ));

            // $index++;
        }
        // dd($data);
        $this->Piket->save_piket($data);

        return redirect()->to('/piket');
    }

    public function save_jaga()
    {
        $id = $this->request->getvar('id'); // Ambil data nis dan masukkan ke variabel id
        $data = array();

        // $index = 0; // Set index array awal dengan 0
        foreach ($id as $dataid) { // Kita buat perulangan berdasarkan nis sampai data terakhir
            array_push($data, array(
                'id_siswa' => $dataid,
                'keterangan' => $this->request->getVar('keterangan'),  // Ambil dan set data nama sesuai index array dari $index   
                'tanggal' => $this->request->getVar('tanggal'),  // Ambil dan set data nama sesuai index array dari $index   
            ));

            // $index++;
        }
        // dd($data);
        $this->Jaga->save_jaga($data);

        return redirect()->to('/piket/jaga');
    }
}