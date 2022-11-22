<?php

namespace App\Models;

use CodeIgniter\Model;

class PiketModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'piket';
    protected $primaryKey       = 'id_piket';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal', 'id_siswa', 'jabatan'];

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

    public function datasiswa_piket()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        // $tanggal = date('Y-m-d');
        $builder->join('piket', 'piket.id_siswa=siswa.id_siswa', 'right');
        return $builder;
    }
    public function piket_by_date($tanggal)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        // $tanggal = date('Y-m-d');
        $builder->join('piket', 'piket.id_siswa=siswa.id_siswa', 'left');
        // $builder->where('tanggal', $tanggal);
        return $builder;
    }


    public function save_piket($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('piket');
        $builder->insertBatch($data);
    }

    public function siswanotpiket()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        $builder->join('piket', 'piket.id_siswa=siswa.id_siswa', 'right');
        $builder = "";
        return $builder;
    }
}