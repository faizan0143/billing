<?php

use CodeIgniter\Router\RouteCollection;
use Config\Filters;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

///////////     Admin Panel Routes   /////////////////

$routes->get('admin/logout', 'Admin\LoginController::logout');

$routes->group('', ['filter' => 'Already_LoggedIn'], function ($routes) {
    $routes->get('admin/login', 'Admin\LoginController::index');
    $routes->post('admin/login/auth', 'Admin\LoginController::auth');
});

$routes->group('', ['filter' => 'Auth_Check'], function ($routes) {

    $routes->get('admin/dashboard', 'Admin\DashboardController::index');
    $routes->get('admin/account', 'Admin\AccountController::index');
    $routes->post('admin/name-update', 'Admin\AccountController::nameupdate');
    $routes->post('admin/update-password', 'Admin\AccountController::updatepassword');

    #Category
    $routes->get('admin/category/create', 'Admin\CategoryController::create');
    $routes->post('admin/category/store', 'Admin\CategoryController::store');
    $routes->get('admin/category/view', 'Admin\CategoryController::index');
    $routes->get('admin/category/edit/(:any)', 'Admin\CategoryController::edit/$1');
    $routes->post('admin/category/update/(:any)', 'Admin\CategoryController::update/$1');
    
    #Product Name
    $routes->get('admin/products/name/create', 'Admin\ProductController::create');
    $routes->post('admin/products/name/store', 'Admin\ProductController::store');
    $routes->get('admin/products/name/view', 'Admin\ProductController::index');
    $routes->get('admin/products/name/edit/(:any)', 'Admin\ProductController::edit/$1');
    $routes->post('admin/products/name/update/(:any)', 'Admin\ProductController::update/$1');
    $routes->get('admin/products/name/delete/(:any)', 'Admin\ProductController::delete/$1');


    #Product Entry
    $routes->get('admin/products/create', 'Admin\ProductEntryController::create');
    $routes->post('admin/products/store', 'Admin\ProductEntryController::store');
    $routes->get('admin/products/view', 'Admin\ProductEntryController::index');
     $routes->get('admin/products/edit/(:any)', 'Admin\ProductEntryController::edit/$1');
    $routes->post('admin/products/update/(:any)', 'Admin\ProductEntryController::update/$1');
    $routes->get('admin/products/delete/(:any)', 'Admin\ProductEntryController::delete/$1');
    
    
    #Billings
    $routes->get('admin/bill/create', 'Admin\BillingController::create');
    $routes->post('admin/bill/store', 'Admin\BillingController::store');
    $routes->get('admin/bill/view', 'Admin\BillingController::index');
     $routes->get('admin/bill/edit/(:any)', 'Admin\BillingController::edit/$1');
    $routes->post('admin/bill/update/(:any)', 'Admin\BillingController::update/$1');
    
    #Bill PDF
    $routes->get('admin/bill/generatepdf/(:any)', 'Admin\BillingController::generatePdf/$1');
    
    #Report
    $routes->get('admin/report', 'Admin\ReportController::index');
    $routes->post('admin/view_report', 'Admin\ReportController::viewReport');
    $routes->post('admin/download_report', 'Admin\ReportController::downloadReport');
});

///////////    End Admin Panel Routes   /////////////////



