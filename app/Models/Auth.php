<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'employee_id';
    protected $allowedFields    = ['employee_id', 'employee_name', 'level', 'status', 'passwords'];

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect('default');
    }
    public function ceklogin($where)
    {
        return $this->db->table($this->table)
            ->where($where)
            ->get()->getRowArray();;
    }
}
