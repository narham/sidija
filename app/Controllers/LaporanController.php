<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\KelasModel;
use App\Models\ProdiModel;
use App\Models\SiswaModel;
use App\Models\LogModel;
use App\Models\JagaModel;
use App\Models\PiketModel;

class LaporanController extends BaseController
{
    public $db;
    protected $prodi;
    protected $Siswa;
    protected $kelas;
    protected $log;
    protected $Piket;
    protected $Jaga;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->Siswa = new SiswaModel();
        $this->prodi = new ProdiModel();
        $this->kelas = new KelasModel();
        $this->log = new LogModel();
        $this->Piket = new PiketModel();
        $this->Jaga = new JagaModel();
    }
    public function index()
    {
        //
        $tanggal = date("Y-m-d");

        $data =  $this->Jaga->datasiswa_jaga()->where('tanggal', $tanggal)->get()->getresultarray();
        // dd($data);
        return view('laporan/piket', [
            "jaga" => $data
        ]);
    }

    public function listIklan()
    {
        $data = $this->db->table("tbl_iklan")->get()->getResult();
        return view('list-iklan', [
            "iklans" => $data
        ]);
    }

    function generatePDF()
    {
        $dompdf = new \Dompdf\Dompdf();
        $tanggal = date("Y-m-d");
        // $data = $this->db->table("jaga")->where('tanggal', $tanggal)->get()->getResult();
        $data = $this->Jaga->datasiswa_jaga()->where('tanggal', $tanggal)->get()->getresultarray(); //data dari tabel iklan

        $dompdf->loadHtml(view('laporan/piket', ["jaga" => $data]));
        $dompdf->setPaper('A4', 'portrait'); //ukuran kertas dan orientasi
        $dompdf->render();
        $dompdf->stream("laporan-piket"); //nama file pdf

        return redirect()->to(base_url('list-iklan')); //arahkan ke list-iklan setelah laporan di unduh
    }
}