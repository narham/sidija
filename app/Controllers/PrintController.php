<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// reference the Dompdf namespace
use Dompdf\Dompdf;

use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\ProdiModel;

class PrintController extends BaseController
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
        //
    }

    public function print_siswa()
    {
        # code...
        $data['siswa'] = $this->Siswa->datasiswa();
        $html = view('admin/siswa', $data);

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}