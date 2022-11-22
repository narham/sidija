<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\ProdiModel;
use App\Models\SiswaModel;
use App\Models\LogModel;
use App\Models\JagaModel;
use App\Models\PiketModel;

class AdminController extends BaseController
{
    protected $prodi;
    protected $Siswa;
    protected $kelas;
    protected $log;
    protected $Piket;
    protected $Jaga;

    function __construct()
    {
        $this->Siswa = new SiswaModel();
        $this->prodi = new ProdiModel();
        $this->kelas = new KelasModel();
        $this->log = new LogModel();
        $this->Piket = new PiketModel();
        $this->Jaga = new JagaModel();
    }

    public function index()
    {
        // Menampilkan Admin Dashboard
        $tanggal = date("Y-m-d");
        $pagi = "APEL PAGI";
        $malam = "APEL MALAM";
        $makan_pagi = "MAKAN PAGI";
        $makan_siang = "MAKAN SIANG";
        $makan_malam = "MAKAN MALAM";
        $data = [
            'judul' => '',
            'bread' => '',
            'header' => '',
            'link' => base_url('/admin'),
            'log_apel_pagi' => $this->log->log_hari_ini()->like('kegiatan', $pagi)->get()->getLastRow(),
            'log_apel_malam' => $this->log->log_hari_ini()->like('kegiatan', $malam)->get()->getLastRow(),
            'log_makan_pagi' => $this->log->log_hari_ini()->like('kegiatan', $makan_pagi)->get()->getLastRow(),
            'log_makan_siang' => $this->log->log_hari_ini()->like('kegiatan', $makan_siang)->get()->getLastRow(),
            'log_makan_malam' => $this->log->log_hari_ini()->like('kegiatan', $makan_malam)->get()->getLastRow(),
            'j_siswa' => $this->Siswa->countAllResults(),
            'j_prodi' => $this->prodi->countAllResults(),
            'j_kelas' => $this->kelas->countAllResults(),
            'kelas' => $this->kelas->findAll(),
            'piket' => $this->Piket->datasiswa_piket()->where('tanggal', $tanggal)->get()->getresultarray(),
            'jaga' => $this->Jaga->datasiswa_jaga()->where('tanggal', $tanggal)->get()->getresultarray(),

        ];
        // dd($data);
        return view('admin/dashboard', $data);
    }
}