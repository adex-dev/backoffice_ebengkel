<?php

namespace App\Models;

use CodeIgniter\Model;

class Categorymodel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'prm_kategori';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['id', 'name_kategori', 'status', 'addons'];

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect('default');
    }
    public function listcategory()
    {
        return $this->db->table($this->table)
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();
    }
    public function ceknamekategory($where)
    {
        return $this->db->table($this->table)
            ->where($where)
            ->get()->getRowArray();
    }
    public function insertcategory($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    public function deletekategory($data)
    {
        return $this->db->table($this->table)->delete($data);
    }
    public function updatecategory($data, $where)
    {
        return $this->db->table($this->table)->update($data,$where);
        
    }
}
