<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'absen';
    protected $primaryKey       = 'id_absen';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal', 'id_siswa', 'keterangan', 'kegiatan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function datasiswa() // Menampilkan Semua Data SISWA
    {
        $db = db_connect();
        $query = $db->query('SELECT * FROM siswa INNER JOIN kelas ON siswa.kelas = kelas.id_kelas INNER JOIN prodi ON siswa.prodi = prodi.id_prodi inner join absen on siswa.id_siswa=absen.id_siswa');

        $hasil = $query->getResult();
        // $hasil = $query->getResult();
        return $hasil;
    }

    public function absen()
    {
        # code...
    }

    public function hitung_by_tanggal()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $tanggal = date('Y-m-d');
        $builder->join('prodi', 'prodi.id_prodi=siswa.prodi', 'right');
        $builder->join('kelas', 'kelas.id_kelas=siswa.kelas', 'right');
        $builder->join('absen', 'absen.id_siswa = siswa.id_siswa', 'right');
        $builder->select('id_siswa')->from('absen')->distinct('id_siswa');
        // $builder->where('tanggal', $tanggal)->distinct('');
        $query = $builder;
        // $builder->like('title', 'match');
        // $builder->from('my_table');
        echo $builder->countAllResults();

        return $query;
    }
    public function save_absen($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->insertBatch($data);
    }

    public function data_by_kegiatan()
    {
        # code...
        // $kegiatan = "APEL PAGI";

        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $tanggal = date('Y-m-d');
        $builder->join('prodi', 'prodi.id_prodi=siswa.prodi', 'right');
        $builder->join('kelas', 'kelas.id_kelas=siswa.kelas', 'right');
        $builder->join('absen', 'absen.id_siswa = siswa.id_siswa', 'right');
        $builder->where('tanggal', $tanggal);
        // $query=$builder->orderBy('tanggal')
        return $builder;
    }

    public function data_by_date($date)
    {
        # Menampilkan data sesuai tanggal
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->where('DATE(tanggal)', $date);
        return $builder->get('absen')->getResult();
    }

    public function lap_by_date($date)
    {
        # Menampilkan data sesuai tanggal
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->where('DATE(tanggal)', $date);
        return $builder->get('absen')->getResult();
        // $this->db->where('DATE(tgl)', $date); // Tambahkan where tanggal nya
    }

    public function lap_by_bulan($bulan, $tahun)
    {
        # code...
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->where('MONTH(TANGGAL)', $bulan);
        $builder->where('YEAR(TANGGAL)', $tahun);
        return $builder->get('absen')->getResult();
    }

    public function lap_by_tahun($tahun)
    {
        # laporan sesuai Tahun
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->where('YEAR(TANGGAL)', $tahun);
        return $builder->get('absen')->getResult();
    }

    public function lap_semua()
    {
        # Lihat Semua Laporan ABSEN
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        return $builder->get('absen')->getResult();
    }

    public function option_tahun()
    {
        # code...
        $db      = \Config\Database::connect();
        $builder = $db->table('absen');
        $builder->select('YEAR(tanggal) AS tahun');
        $builder->from('absen');
        $builder->orderBy('YEAR(tanggal)');
        $builder->groupBy('YEAR(tanggal)');
        return $builder->get()->getResult(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
}