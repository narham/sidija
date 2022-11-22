<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'siswa';
    protected $primaryKey       = 'id_siswa';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nit', 'nama', 'kelas', 'prodi', 'foto'];

    // Dates
    protected $useTimestamps = true;
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

    public function datasiswa()
    {
        // Menampilkan data SIswa
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->join('kelas', 'siswa.kelas=kelas.id_kelas');
        $builder->join('prodi', 'siswa.prodi=prodi.id_prodi');
        $query = $builder->get()->getResultArray();
        return $query;
    }
    public function datasiswa_kelas()
    {
        // Menampilkan data SIswa
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->join('kelas', 'siswa.kelas=kelas.id_kelas');
        // $builder->join('prodi', 'siswa.prodi=prodi.id_prodi');
        $query = $builder->get()->getResultArray();
        return $query;
    }

    public function datasiswa_by_kelas()
    {

        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->join('kelas', 'siswa.kelas=kelas.id_kelas');
        $builder->join('prodi', 'siswa.prodi=prodi.id_prodi');
        $query = $builder;
        return $query;
    }

    public function store($data)
    {
        # code...
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $data = [];

        $builder->replace($data);
    }
}