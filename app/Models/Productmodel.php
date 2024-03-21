<?php

namespace App\Models;

use CodeIgniter\Model;

class Productmodel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'prm_product';
    protected $primaryKey       = 'id_product';
    protected $allowedFields    = ['id_product', 'product_name', 'id_category', 'item_price', 'margin_sell1', 'margin_sell2', 'disc', 'status', 'addons'];

    public function __construct()
    {
        $this->db = \Config\Database::connect('default');
    }

    public function cekproduct($where)
    {
        return $this->db->table($this->table)->where($where)->orderBy('id_product', 'DESC')->get();
    }
    public function updateproduct($data,$where)
    {
        return $this->db->table($this->table)->update($data,$where);
    }
    public function listproduct()
    {
        return $this->db->table($this->table)
            ->select("kt.name_kategori,$this->table.*")
            ->join('prm_kategori as kt', "kt.id = $this->table.id_category")
            ->get()
            ->getResultArray();
    }
    public function lastproduct($where)
    {
        return $this->db->table($this->table)->like($where)->orderBy('id_product', 'DESC')->limit(1)->get()
            ->getRowArray();
    }
    public function insertproduct($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
}
