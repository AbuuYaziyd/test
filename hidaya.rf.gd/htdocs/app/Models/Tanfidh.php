<?php

namespace App\Models;

use CodeIgniter\Model;

class Tanfidh extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tanfidh';
    protected $primaryKey       = 'tanfdhId';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'userId',
        'tanfdhName',
        'tanfdhStatus',
        'name',
        'nationality',
        'university',
        'iqama',
        'phone',
        'bank',
        'bankInit',
        'iban',
        'userId',
        'tanfdhDate',
        'tasrih',
        'mushrif',
    ];

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
}
