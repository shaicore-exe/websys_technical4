<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Customers::index');

$routes->get('customers', 'Customers::index');
$routes->get('customers/new', 'Customers::add');
$routes->post('customers/create', 'Customers::save');
$routes->get('customers/edit/(:num)', 'Customers::edit/$1');
$routes->post('customers/update/(:num)', 'Customers::saveChanges/$1');

$routes->get('users', 'Users::index');
$routes->get('users/new', 'Users::add');
$routes->post('users/create', 'Users::save');
$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->post('users/update/(:num)', 'Users::saveChanges/$1');
