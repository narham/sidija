<?php

namespace App\Models;

use CodeIgniter\Model;

class JagaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'jaga';
    protected $primaryKey       = 'id_jaga';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_siswa', 'tanggal', 'keterangan', 'jabatan'];

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


    public function datasiswa_jaga()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('siswa');
        // $tanggal = date('Y-m-d');
        $builder->join('kelas', 'kelas.id_kelas=siswa.kelas',);
        $builder->join('jaga', 'jaga.id_siswa=siswa.id_siswa',);
        // $builder->where('tanggal', $tanggal);
        return $builder;
    }

    public function save_jaga($data)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('jaga');
        $builder->insertBatch($data);
    }
}