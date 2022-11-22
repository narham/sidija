<?php

namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'logbook';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tanggal', 'kegiatan', 'catatan'];

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

    public function data_logs()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('logbook');
        $tanggal = date('Y-m-d');
    }

    public function log_hari_ini()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('logbook');
        $tanggal = date('Y-m-d');
        $builder->where('tanggal', $tanggal);



        // $builder->select('logbook')->distinct('id_siswa');
        $query = $builder;
        return $query;
    }
}