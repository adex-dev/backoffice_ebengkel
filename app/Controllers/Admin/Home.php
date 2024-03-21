<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Auth;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        if (session()->get('app')) {
            return  redirect()->to("/admin/dashboard");
        }
        return view('auth/index');
    }

    public function dashboard()
    {
        $data = [
            'title' => 'dashboard'
        ];
        return view('pages/content', $data);
    }

    public function product()
    {
        $data = [
            'title' => 'Product'
        ];
        return view('pages/content', $data);
    }
    public function addproduct()
    {
        $data = [
            'title' => 'Add product'
        ];
        return view('pages/content', $data);
    }
    public function addcategory()
    {
        $data = [
            'title' => 'Add Category'
        ];
        return view('pages/content', $data);
    }
    public function category()
    {
        $data = [
            'title' => 'Categories'
        ];
        return view('pages/content', $data);
    }
    public function editcategory()
    {
        $data = [
            'title' => 'Edit Categories'
        ];
        return view('pages/content', $data);
    }
    public function editproduct()
    {
        $data = [
            'title' => 'Edit Product'
        ];
        return view('pages/content', $data);
    }
    public function updatestock()
    {
        $data = [
            'title' => 'Update Stock Product'
        ];
        return view('pages/content', $data);
    }





    public function loginproses()
    {
        if ($this->request->isAJAX()) :
            $nik = $this->request->getPost('nik', FILTER_SANITIZE_STRING);
            $password = $this->request->getVar("password");
            $modelauth = model(Auth::class);
            $where = [
                'employee_id' => $nik,
                'passwords' => md5($password)
            ];
            $cek = $modelauth->ceklogin($where);
            if (isset($cek) && $cek['employee_id']) {
                if ($cek['status'] == 'ACTIVE') {
                    session()->set($cek);
                    session()->set('app', 'backofficeebengkel');
                    $this->loadservice();
                    $msg = [
                        'status' => 200,
                        'message' => ucwords('login successful'),
                        'linked' => 'admin/dashboard'
                    ];
                } else {
                    $output = 'Users is not active !';
                    $msg = [
                        'status' => 404,
                        'message' => ucwords($output)
                    ];
                }
            } else {
                $output = 'Wrong Password or Username..!';
                $msg = [
                    'status' => 404,
                    'message' => ucwords($output)
                ];
            }
            return $this->respond($msg);
        endif;
    }

    private function loadservice()
    {
        $this->loadcategory();
        $this->loadproduct();
    }

    private function loadproduct()
    {
        if (!$data = sesion_get('productitem')) {
            loadproduct();
        }
    }
    private function loadcategory()
    {
        if (!$data = sesion_get('categoriitem')) {
            loadcategory();
        }
    }
}
