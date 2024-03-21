<?php

namespace App\Controllers\Accomplish;

use App\Controllers\BaseController;
use App\Models\Categorymodel;
use App\Models\Productmodel;
use CodeIgniter\API\ResponseTrait;

class Product extends BaseController
{
    use ResponseTrait;
    public function index(): string
    {
        return view('welcome_message');
    }

    public function addproduct()
    {
        if ($this->request->isAJAX()) :
            $name = strtoupper(only_decimal_string($this->request->getVar('namaproduct')));
            $categori = $this->request->getVar('categori');
            $ean = only_decimal($this->request->getVar('ean'));
            $hargabeli = only_decimal($this->request->getVar('hargabeli'));
            $marginmember = only_decimal($this->request->getVar('marginmember'));
            $marginnonmember = only_decimal($this->request->getVar('marginnonmember'));
            $stock = only_decimal($this->request->getVar('stock'));
            $purcasenonmember = only_decimal($this->request->getVar('purcasenonmember'));
            $purcasemember = only_decimal($this->request->getVar('purcasemember'));
            $diskon = only_string($this->request->getVar('diskon'));
            $tahun = date('Y');
            $char = 'PL' . $tahun;
            $nomor = "0000001";
            $totalchart = strlen($char);
            $iddidapat = $char . $nomor;
            if ($name == '' || $categori == '' || $hargabeli == '' || $marginmember == '' || $marginnonmember == '' || $purcasenonmember == '' || $diskon == '' || $purcasemember == '' || $stock == '' || $ean == '') {
                $output = 'the form cannot be empty';
                $msg = [
                    'status' => 404,
                    'messages' => ucwords($output)
                ];
                return $this->respond($msg);
                exit();
            }
            if (strlen($ean) < 13) {
                $output = 'product barcode code is less than 13 digits';
                $msg = [
                    'status' => 404,
                    'messages' => ucwords($output)
                ];
                return $this->respond($msg);
                exit();
            }

            $purcasenonmember = ($hargabeli * $marginnonmember / 100) + $hargabeli;
            $purcasemember = ($hargabeli * $marginmember / 100) + $hargabeli;

            $model = model(Productmodel::class);
            $where = ['product_name' => $name, 'id_category' => $categori, 'ean' => $ean];
            $cek = $model->cekproduct($where)->getRowArray();
            if (isset($cek)) {
                $output = 'name is already in use..!';
                $msg = [
                    'status' => 404,
                    'message' => ucwords($output)
                ];
            } else {

                $lastproduct = $model->lastproduct(['addons' => $tahun]);
                if (isset($lastproduct)) {
                    $numeric = substr($lastproduct['id_product'], $totalchart);
                    $rs = intval($numeric) + 1;
                    $iddidapat = sprintf("%s%d07d", $char, $rs);
                    if ($numeric > 9999999) {
                        $iddidapat = $char . $rs;
                    }
                }
                $datainsert = [
                    'id_product' => $iddidapat,
                    'product_name' => $name,
                    'id_category' => $categori,
                    'item_price' => $hargabeli,
                    'margin_sell1' => $marginmember,
                    'margin_sell2' => $marginnonmember,
                    'purchase_sell1' => $purcasemember,
                    'purchase_sell2' => $purcasenonmember,
                    'stock' => $stock,
                    'disc' => $diskon,
                    'ean' => $ean,
                    'status' => 'active',
                    'addons' => waktu()
                ];
                $sukses = $model->insertproduct($datainsert);
                if ($sukses) {
                    $msg = ['status' => 200, 'message' => 'Success Insert new data'];
                    loadproduct();
                }
            }
            return $this->respond($msg);

        endif;
    }
    public function addcategories()
    {
        if ($this->request->isAJAX()) :
            $name = only_decimal_string($this->request->getVar('categoriname'));
            if ($name == '') {
                $output = 'the form cannot be empty';
                $msg = [
                    'status' => 404,
                    'messages' => ucwords($output)
                ];
                return $this->respond($msg);
                exit();
            }
            $model = model(Categorymodel::class);
            $where = ['name_kategori' => $name];
            $cek = $model->ceknamekategory($where);
            if (isset($cek)) {
                $output = 'name is already in use..!';
                $msg = [
                    'status' => 404,
                    'message' => ucwords($output)
                ];
            } else {
                $datainsert = [
                    'name_kategori' => strtoupper($name),
                    'status' => 'active',
                    'addons' => waktu()
                ];
                $sukses = $model->insertcategory($datainsert);
                if ($sukses) {
                    $msg = ['status' => 200, 'message' => 'Success Insert new data'];
                    loadcategory();
                    loadproduct();
                }
            }
            return $this->respond($msg);

        endif;
    }
    public function updatestock()
    {
        if ($this->request->isAJAX()) :
            $uid = only_decimal_string($this->request->getVar('productid'));
            $stock = only_decimal($this->request->getVar('stock'));

            if ($stock == '' ||  $uid == '') {
                $output = 'the form cannot be empty';
                $msg = [
                    'status' => 404,
                    'messages' => ucwords($output)
                ];
                return $this->respond($msg);
                exit();
            }
            $model = model(Productmodel::class);
            $where = ['id_product' => $uid];
            $cek = $model->cekproduct($where)->getRowArray();
            if (isset($cek)) {
                if ($cek['stock'] == $stock) {
                    $msg = ['status' => 200, 'message' => 'No Change'];
                } else {
                    $datainsert = [
                        'stock' => $stock,
                    ];
                    $sukses = $model->updateproduct($datainsert, $where);
                    if ($sukses) {
                        $msg = ['status' => 200, 'message' => 'successfully updated the product'];
                        loadproduct();
                    }
                }
            } else {
                $output = 'Id is not found ..!';
                $msg = [
                    'status' => 404,
                    'message' => ucwords($output)
                ];
            }
            return $this->respond($msg);

        endif;
    }
    public function editproduct()
    {
        if ($this->request->isAJAX()) :
            $uid = only_decimal_string($this->request->getVar('uid'));
            $name = strtoupper(only_decimal_string($this->request->getVar('namaproduct')));
            $categori = $this->request->getVar('categori');
            $hargabeli = only_decimal($this->request->getVar('hargabeli'));
            $marginmember = only_decimal($this->request->getVar('marginmember'));
            $marginnonmember = only_decimal($this->request->getVar('marginnonmember'));
            $purcasenonmember = only_decimal($this->request->getVar('purcasenonmember'));
            $stock = only_decimal($this->request->getVar('stock'));
            $purcasemember = only_decimal($this->request->getVar('purcasemember'));
            $diskon = only_string($this->request->getVar('diskon'));

            if ($name == '' || $categori == '' || $hargabeli == '' || $marginmember == '' || $marginnonmember == '' || $purcasenonmember == '' || $diskon == '' || $purcasemember == '' || $stock == '') {
                $output = 'the form cannot be empty';
                $msg = [
                    'status' => 404,
                    'messages' => ucwords($output)
                ];
                return $this->respond($msg);
                exit();
            }

            $purcasenonmember = ($hargabeli * $marginnonmember / 100) + $hargabeli;
            $purcasemember = ($hargabeli * $marginmember / 100) + $hargabeli;

            $model = model(Productmodel::class);
            $where = ['id_product' => $uid];
            $cek = $model->cekproduct($where)->getRowArray();
            if (isset($cek)) {
                if ($cek['product_name'] == $name && $cek['id_category'] == $categori && $cek['item_price'] == $hargabeli && $cek['margin_sell1'] == $marginmember && $cek['margin_sell2'] == $marginnonmember && $cek['stock'] == $stock && $cek['disc'] == $diskon) {
                    $msg = ['status' => 200, 'message' => 'No Change', 'linked' => 'product'];
                } else {
                    $cek = $model->cekproduct(['product_name' => $name, 'id_category' => $categori, 'id_product !=' => $uid])->getRowArray();
                    if (isset($cek)) {
                        $output = 'name is already in use..!';
                        $msg = [
                            'status' => 404,
                            'message' => ucwords($output)
                        ];
                    } else {
                        $datainsert = [
                            'product_name' => $name,
                            'id_category' => $categori,
                            'item_price' => $hargabeli,
                            'margin_sell1' => $marginmember,
                            'margin_sell2' => $marginnonmember,
                            'purchase_sell1' => $purcasemember,
                            'purchase_sell2' => $purcasenonmember,
                            'stock' => $stock,
                            'disc' => $diskon,
                            'addons' => waktu()
                        ];
                        $sukses = $model->updateproduct($datainsert, $where);
                        if ($sukses) {
                            $msg = ['status' => 200, 'message' => 'successfully updated the product', 'linked' => 'product'];
                            loadproduct();
                        }
                    }
                }
            } else {
                $output = 'Id is not found ..!';
                $msg = [
                    'status' => 404,
                    'message' => ucwords($output)
                ];
            }
            return $this->respond($msg);

        endif;
    }
    public function editcategories()
    {
        if ($this->request->isAJAX()) :
            $uid = $this->request->getVar('uid');
            $name = strtoupper(only_decimal_string($this->request->getVar('categoriname')));
            if ($name == '') {
                $output = 'the form cannot be empty';
                $msg = [
                    'status' => 404,
                    'messages' => ucwords($output)
                ];
                return $this->respond($msg);
                exit();
            }
            $model = model(Categorymodel::class);
            $where = ['id' => $uid];
            $cek = $model->ceknamekategory($where);
            if (isset($cek)) {
                if ($name == $cek['name_kategori']) {
                    $msg = ['status' => 200, 'message' => 'No data changes', 'linked' => 'category'];
                } else {
                    $where2 = ['name_kategori' => $name, 'id !=' => $uid];
                    $cek2 = $model->ceknamekategory($where2);
                    if (isset($cek2)) {
                        $output = 'name is already in use..!';
                        $msg = [
                            'status' => 404,
                            'message' => ucwords($output)
                        ];
                    } else {
                        $datainsert = [
                            'name_kategori' => $name,
                            'addons' => waktu()
                        ];
                        $sukses = $model->updatecategory($datainsert, $where);
                        if ($sukses) {
                            $msg = ['status' => 200, 'message' => 'Success update new data', 'linked' => 'category'];
                            loadcategory();
                        }
                    }
                }
            } else {
                $output = 'id not found..!';
                $msg = [
                    'status' => 404,
                    'message' => ucwords($output)
                ];
            }
            return $this->respond($msg);

        endif;
    }
    public function deletecategories()
    {
        if ($this->request->isAJAX()) :
            $id = $this->request->getVar('id');
            $product = model(Productmodel::class);
            $cekproduct = $product->cekproduct(['id_category' => $id])->getRowArray();
            if (isset($cekproduct)) :
                $output = 'cannot be deleted, the category is in use by another product';
                $msg = [
                    'status' => 404,
                    'message' => ucwords($output)
                ];
            else :
                $modelkategori = model(Categorymodel::class);
                $cekkategori = $modelkategori->ceknamekategory(['id' => $id]);
                if (isset($cekkategori)) {
                    $sukses = $modelkategori->deletekategory(['id' => $id]);
                    if ($sukses) {
                        $output = 'Category successfully deleted.';
                        $msg = [
                            'status' => 200,
                            'message' => ucwords($output)
                        ];
                        loadcategory();
                    } else {
                        $output = 'error during the data deletion process';
                        $msg = [
                            'status' => 404,
                            'message' => ucwords($output)
                        ];
                    }
                } else {

                    $output = 'Category id not found';
                    $msg = [
                        'status' => 404,
                        'message' => ucwords($output)
                    ];
                }

            endif;

            return $this->respond($msg);

        endif;
    }
    public function loadproductdata()
    {
        if ($this->request->isAJAX()) :
            $uid = $this->request->getVar('id');
            $data = array();
            foreach (sesion_get('productitem') as  $value) {
                if ($value['id_product'] == $uid) {
                    $data[] = array(
                        'id_product' => $uid,
                        'product_name' => $value['product_name'],
                        'id_category' => $value['id_category'],
                        'item_price' => rupiah($value['item_price']),
                        'margin_sell1' => $value['margin_sell1'],
                        'margin_sell2' => $value['margin_sell2'],
                        'purchase_sell1' => $value['purchase_sell1'],
                        'purchase_sell2' => $value['purchase_sell2'],
                        'stock' => rupiah($value['stock']),
                        'disc' => $value['disc'],
                        'status' => $value['status'],
                    );
                    break;
                }
            }
            return $this->respond(["data" => $data, 'status' => 200]);
        endif;
    }
}
