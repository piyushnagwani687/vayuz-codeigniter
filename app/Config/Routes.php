<?php

use App\Controllers\AuthController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', function () {
    return redirect()->to(base_url('/api/auth/login'));
});

$routes->group('api', function ($routes) {
    $routes->get('auth/login', 'AuthController::loginView');
    $routes->post('auth/login', 'AuthController::login');
    $routes->get('auth/register', 'AuthController::registerView');
    $routes->post('auth/register', 'AuthController::register');
    $routes->post('auth/logout', 'AuthController::logout');
    
    $routes->group('admin', ['filter' => 'auth'], function ($routes) {
        $routes->get('dashboard', 'AdminController::dashboard');
        $routes->group('', ['filter' => 'admin'], function($routes) {
            $routes->get('users', 'AdminController::listUsers');
            $routes->get('users/create', 'AdminController::create');
            $routes->post('users/store', 'AdminController::storeUser');
            $routes->get('users/edit/(:num)', 'AdminController::edit/$1');
            $routes->put('users/update/(:num)', 'AdminController::updateUser/$1');
            $routes->get('users/(:num)', 'AdminController::getUserDetails/$1');
        });
    });

    $routes->group('customer', ['filter' => 'auth'], function ($routes) {
        $routes->get('dashboard', 'CustomerController::dashboard');
    });
});
