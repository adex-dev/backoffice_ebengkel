<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin\Home::index');
$routes->get('/login', 'Admin\Home::index');
// auth
$routes->post('/loginproses', 'Admin\Home::loginproses');

$routes->group('admin', static function ($routes) {
    $routes->get('logout', function () {
        session()->destroy();
        return  redirect()->to('login');
    });
    $routes->get('dashboard', 'Admin\Home::dashboard');
    $routes->get('product', 'Admin\Home::product');
    $routes->get('addproduct', 'Admin\Home::addproduct');
    $routes->get('category', 'Admin\Home::category');
    $routes->get('addcategory', 'Admin\Home::addcategory');
    $routes->get('editcategory', 'Admin\Home::editcategory');
    $routes->get('editproduct', 'Admin\Home::editproduct');
    $routes->get('updatestock', 'Admin\Home::updatestock');
});

$routes->group('proses', static function ($routes) {
    $routes->post('addproduct', 'Accomplish\Product::addproduct');
    $routes->post('loadproductdata', 'Accomplish\Product::loadproductdata');
    $routes->post('addcategories', 'Accomplish\Product::addcategories');
    $routes->post('editcategories', 'Accomplish\Product::editcategories');
    $routes->post('editproduct', 'Accomplish\Product::editproduct');
    $routes->post('deletecategories', 'Accomplish\Product::deletecategories');
    $routes->post('updatestock', 'Accomplish\Product::updatestock');
});


$routes->set404Override('App\Errors::show404');

    // Will display a custom view
    $routes->set404Override(function()
    {
        echo view('errors/error_404');
    });