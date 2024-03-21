<?php

use App\Models\Categorymodel;
use App\Models\Productmodel;

if (!function_exists('loadcategory')) {
    function loadcategory()
    {
        $modalauth = model(Categorymodel::class);
        $cek = $modalauth->listcategory();
        if (is_array($cek)) {
            $data = $cek;
        }
        // Save into the cache for 10 year
        sesion_reg('categoriitem', $data);
    }
}
if (!function_exists('loadproduct')) {
    function loadproduct()
    {
        $modalauth = model(Productmodel::class);
        $cek = $modalauth->listproduct();
        if (is_array($cek)) {
            $data = $cek;
        }
        // Save into the cache for 10 year
        sesion_reg('productitem', $data);
    }
}
