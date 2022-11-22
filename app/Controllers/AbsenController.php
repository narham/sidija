<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;
use App\Models\SiswaModel;
use App\Models\JagaModel;
use PhpParser\Node\Expr\New_;

class AbsenController extends BaseController
{

  protected $Absen;
  protected $Siswa;
  protected $Jaga;


  function __construct()
  {

    $this->Absen = new AbsensiModel();
    $this->Siswa = new SiswaModel();
    $this->Jaga = new JagaModel();
  }
  public function index() // Menampilkan Dashboard ABSEN
  {
    $pagi = "APEL PAGI";
    $malam = "APEL MALAM";
    $hadir = "HADIR";
    $sakit = "SAKIT";
    // $absen = $this->Absen;
    $tanggal = date('Y-m-d');
    $data = [
      'judul' => '',
      'bread' => '',
      'header' => '',
      'link' => base_url('/admin'),
      'apelpagi' => $this->Absen->data_by_kegiatan()->where('kegiatan', $pagi)->get()->getResultArray(),
      'apelmalam' => $this->Absen->data_by_kegiatan()->where('kegiatan', $malam)->get()->getResultArray(),
      'j_pagi' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $pagi)->like('tanggal', $tanggal)->countAllResults(),
      'j_malam' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $malam)->like('tanggal', $tanggal)->countAllResults(),
      'h_malam' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $malam)->like('keterangan', $hadir)->countAllResults(),
      'h_pagi' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $pagi)->like('keterangan', $hadir)->countAllResults(),
      's_pagi' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $pagi)->like('keterangan', $sakit)->countAllResults(),
      's_malam' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $malam)->like('keterangan', $sakit)->countAllResults(),
      // 'apelmalam' => $this->Absen->where('kegiatan', $malam)->orderBy('tanggal', 'DESC')->findAll(),
      // 'apelpagi' => $this->Absen->data_by_kegiatan($pagi),
      // 'apelmalam' => $this->Absen->where('kegiatan', $malam)->findAll(),
    ];
    // dd($data);
    return view('petugas/absen', $data);
  }

  public function save_apel_pagi() //Menyimpan ABSEN PAGI
  {

    $id = $this->request->getvar('id'); // Ambil data nis dan masukkan ke variabel id
    $data = array();

    // $index = 0; // Set index array awal dengan 0
    foreach ($id as $dataid) { // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_siswa' => $dataid,
        'tanggal' => $this->request->getVar('tanggal'),  // Ambil dan set data nama sesuai index array dari $index
        'kegiatan' => $this->request->getVar('kegiatan'),  // Ambil dan set data nama sesuai index array dari $index
        'keterangan' => $this->request->getVar('keterangan'),  // Ambil dan set data nama sesuai index array dari $index

      ));

      // $index++;
    }
    // var_dump($data);
    $this->Absen->save_absen($data);
    return redirect()->to('/absen');
  }

  public function save_apel_malam() //menympan ABSEN MALAM
  {
    # code...
    $id = $this->request->getvar('id'); // Ambil data nis dan masukkan ke variabel id
    $data = array();

    // $index = 0; // Set index array awal dengan 0
    foreach ($id as $dataid) { // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_siswa' => $dataid,
        'tanggal' => $this->request->getVar('tanggal'),  // Ambil dan set data nama sesuai index array dari $index
        'kegiatan' => $this->request->getVar('kegiatan'),  // Ambil dan set data nama sesuai index array dari $index
        'keterangan' => $this->request->getVar('keterangan'),  // Ambil dan set data nama sesuai index array dari $index

      ));

      // $index++;
    }
    // var_dump($data);
    $this->Absen->save_absen($data);
    return redirect()->to('/absen');
  }

  public function absen_apel_pagi() //Menampilkan ABSEN PAGI
  {
    # menampilkan Absen Apel Pagi

    $pagi = "APEL PAGI";
    $tanggal = date('Y-m-d');
    $data = [
      'judul' => '',
      'bread' => '',
      'header' => '',
      'check' => $this->Jaga->where('tanggal', $tanggal)->get()->getresultarray(),
      'link' => base_url('/admin'),
      'siswa' => $this->Siswa->datasiswa(),
      'apelpagi' => $this->Absen->data_by_kegiatan()->where('kegiatan', $pagi)->orderBy('tanggal', 'DESC')->get()->getResultArray(),
    ];
    // dd($data);
    return view('petugas/apelpagi', $data);
  }
  public function absen_apel_malam() //Menampilkan Absen APELl MALAM
  {

    $malam = "APEL MALAM";
    $data = [
      'judul' => '',
      'bread' => '',
      'header' => '',
      'link' => base_url('/admin'),
      'siswa' => $this->Siswa->datasiswa(),
      // 'siswa' => $this->Absen->datasiswa_absen(),
      'apelmalam' => $this->Absen->data_by_kegiatan()->where('kegiatan', $malam)->orderBy('tanggal', 'DESC')->get()->getResultArray(),
    ];

    return view('petugas/apelmalam', $data);
  }

  public function apel() //Menampilkan Dashboard APEL
  {
    # menampilkan APEL
    $pagi = "APEL PAGI";
    $malam = "APEL MALAM";
    $data = [
      'judul' => '',
      'bread' => '',
      'header' => '',
      'link' => base_url('/admin'),
      'apelpagi' => $this->Absen->data_by_kegiatan()->where('kegiatan', $pagi)->orderBy('tanggal', 'DESC')->get()->getResultArray(),
      'apelmalam' => $this->Absen->data_by_kegiatan()->where('kegiatan', $malam)->orderBy('tanggal', 'DESC')->get()->getResultArray(),
    ];
    // dd($data);
    return view('petugas/absen', $data);
  }

  public function cetak()
  {
    if (isset($_GET['filter']) && !empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
      $filter = $_GET['filter']; // Ambil data filder yang dipilih user
      if ($filter == '1') { // Jika filter nya 1 (per tanggal)
        $tgl = $_GET['tanggal'];

        $ket = 'Data Transaksi Tanggal ' . date('d-m-y', strtotime($tgl));
        $transaksi = $this->TransaksiModel->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di TransaksiModel
      } else if ($filter == '2') { // Jika filter nya 2 (per bulan)
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $nama_bulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

        $ket = 'Data Transaksi Bulan ' . $nama_bulan[$bulan] . ' ' . $tahun;
        $transaksi = $this->TransaksiModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di TransaksiModel
      } else { // Jika filter nya 3 (per tahun)
        $tahun = $_GET['tahun'];

        $ket = 'Data Transaksi Tahun ' . $tahun;
        $transaksi = $this->TransaksiModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di TransaksiModel
      }
    } else { // Jika user tidak mengklik tombol tampilkan
      $ket = 'Semua Data Transaksi';
      $transaksi = $this->TransaksiModel->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
    }

    $data['ket'] = $ket;
    $data['transaksi'] = $transaksi;

    ob_start();
    $this->load->view('print', $data);
    $html = ob_get_contents();
    ob_end_clean();

    require './assets/html2pdf/autoload.php'; // Load plugin html2pdfnya
    // $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
    // $html2pdf = new vendor\Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
    $html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first page');
    $html2pdf->output();
  }

  public function makan()
  {
    $pagi = "MAKAN PAGI";
    $siang = "MAKAN SIANG";
    $malam = "MAKAN MALAM";
    $hadir = "HADIR";
    $sakit = "SAKIT";
    // $absen = $this->Absen;
    $tanggal = date('Y-m-d');
    $data = [
      'judul' => '',
      'bread' => '',
      'header' => '',
      'link' => base_url('/admin'),
      'makanpagi' => $this->Absen->data_by_kegiatan()->where('kegiatan', $pagi)->get()->getResultArray(),
      'makansiang' => $this->Absen->data_by_kegiatan()->where('kegiatan', $siang)->get()->getResultArray(),
      'makanmalam' => $this->Absen->data_by_kegiatan()->where('kegiatan', $malam)->get()->getResultArray(),
      'j_pagi' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $pagi)->like('tanggal', $tanggal)->countAllResults(),
      'j_siang' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $siang)->like('tanggal', $tanggal)->countAllResults(),
      'j_malam' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $malam)->like('tanggal', $tanggal)->countAllResults(),
      'h_malam' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $malam)->like('keterangan', $hadir)->countAllResults(),
      'h_siang' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $siang)->like('keterangan', $hadir)->countAllResults(),
      'h_pagi' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $pagi)->like('keterangan', $hadir)->countAllResults(),
      's_pagi' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $pagi)->like('keterangan', $sakit)->countAllResults(),
      's_siang' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $siang)->like('keterangan', $sakit)->countAllResults(),
      's_malam' => $this->Absen->hitung_by_tanggal()->where('kegiatan', $malam)->like('keterangan', $sakit)->countAllResults(),
      // 'apelmalam' => $this->Absen->where('kegiatan', $malam)->orderBy('tanggal', 'DESC')->findAll(),
      // 'apelpagi' => $this->Absen->data_by_kegiatan($pagi),
      // 'apelmalam' => $this->Absen->where('kegiatan', $malam)->findAll(),
    ];
    return view('petugas/makan', $data);
  }

  public function makan_pagi()
  {
    # menampilkan Absen Apel Pagi
    $pagi = "MAKAN PAGI";
    $data = [
      'judul' => '',
      'bread' => '',
      'header' => '',
      'link' => base_url('/admin'),
      'siswa' => $this->Siswa->datasiswa(),
      'apelpagi' => $this->Absen->data_by_kegiatan()->where('kegiatan', $pagi)->orderBy('tanggal', 'DESC')->get()->getResultArray(),
    ];
    // dd($data);
    return view('petugas/makanpagi', $data);
  }
  public function makan_siang()
  {
    # menampilkan Absen Apel Pagi
    $siang = "MAKAN SIANG";
    $data = [
      'judul' => '',
      'bread' => '',
      'header' => '',
      'link' => base_url('/admin'),
      'siswa' => $this->Siswa->datasiswa(),
      'apelpagi' => $this->Absen->data_by_kegiatan()->where('kegiatan', $siang)->orderBy('tanggal', 'DESC')->get()->getResultArray(),
    ];
    // dd($data);
    return view('petugas/makansiang', $data);
  }
  public function makan_malam()
  {
    # menampilkan Absen Apel Pagi
    $malam = "MAKAN MALAM";
    $data = [
      'judul' => '',
      'bread' => '',
      'header' => '',
      'link' => base_url('/admin'),
      'siswa' => $this->Siswa->datasiswa(),
      'apelpagi' => $this->Absen->data_by_kegiatan()->where('kegiatan', $malam)->orderBy('tanggal', 'DESC')->get()->getResultArray(),
    ];
    // dd($data);
    return view('petugas/makanmalam', $data);
  }
  public function save_makan_pagi() //Menyimpan ABSEN PAGI
  {

    $id = $this->request->getvar('id'); // Ambil data nis dan masukkan ke variabel id
    $data = array();

    // $index = 0; // Set index array awal dengan 0
    foreach ($id as $dataid) { // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_siswa' => $dataid,
        'tanggal' => $this->request->getVar('tanggal'),  // Ambil dan set data nama sesuai index array dari $index
        'kegiatan' => $this->request->getVar('kegiatan'),  // Ambil dan set data nama sesuai index array dari $index
        'keterangan' => $this->request->getVar('keterangan'),  // Ambil dan set data nama sesuai index array dari $index

      ));

      // $index++;
    }
    // dd($data);
    $this->Absen->save_absen($data);
    return redirect()->to('/absen/makan');
  }
  public function save_makan_siang() //Menyimpan ABSEN PAGI
  {

    $id = $this->request->getvar('id'); // Ambil data nis dan masukkan ke variabel id
    $data = array();

    // $index = 0; // Set index array awal dengan 0
    foreach ($id as $dataid) { // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_siswa' => $dataid,
        'tanggal' => $this->request->getVar('tanggal'),  // Ambil dan set data nama sesuai index array dari $index
        'kegiatan' => $this->request->getVar('kegiatan'),  // Ambil dan set data nama sesuai index array dari $index
        'keterangan' => $this->request->getVar('keterangan'),  // Ambil dan set data nama sesuai index array dari $index

      ));

      // $index++;
    }
    // dd($data);
    $this->Absen->save_absen($data);
    return redirect()->to('/absen/makan');
  }

  public function save_makan_malam() //Menyimpan ABSEN PAGI
  {

    $id = $this->request->getvar('id'); // Ambil data nis dan masukkan ke variabel id
    $data = array();

    // $index = 0; // Set index array awal dengan 0
    foreach ($id as $dataid) { // Kita buat perulangan berdasarkan nis sampai data terakhir
      array_push($data, array(
        'id_siswa' => $dataid,
        'tanggal' => $this->request->getVar('tanggal'),  // Ambil dan set data nama sesuai index array dari $index
        'kegiatan' => $this->request->getVar('kegiatan'),  // Ambil dan set data nama sesuai index array dari $index
        'keterangan' => $this->request->getVar('keterangan'),  // Ambil dan set data nama sesuai index array dari $index

      ));

      // $index++;
    }
    // var_dump($data);
    $this->Absen->save_absen($data);
    return redirect()->to('/absen/makan');
  }
}