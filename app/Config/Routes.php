<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('login', 'Login::index');
$routes->post('login', 'Login::authenticate');
$routes->get('logout', 'Login::logout');

$routes->get('/', 'Customers::index');

$routes->get('customers', 'Customers::index', ['filter' => 'auth']);
$routes->get('customers/new', 'Customers::add', ['filter' => 'auth']);
$routes->post('customers/create', 'Customers::save', ['filter' => 'auth']);
$routes->get('customers/edit/(:num)', 'Customers::edit/$1', ['filter' => 'auth']);
$routes->post('customers/update/(:num)', 'Customers::saveChanges/$1', ['filter' => 'auth']);

$routes->get('users', 'Users::index', ['filter' => 'auth']);
$routes->get('users/new', 'Users::add', ['filter' => 'auth']);
$routes->post('users/create', 'Users::save', ['filter' => 'auth']);
$routes->get('users/edit/(:num)', 'Users::edit/$1', ['filter' => 'auth']);
$routes->post('users/update/(:num)', 'Users::saveChanges/$1', ['filter' => 'auth']);