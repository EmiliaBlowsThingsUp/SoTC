<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setDefaultController('Home');
$routes->get('/', 'Home::index');

$routes->get('login', 'LoginController::index', ['filter' => 'guest']);
$routes->post('login', 'LoginController::login', ['filter' => 'guest']);

$routes->get('logout', 'LoginController::logout');

$routes->get('register', 'RegisterController::index', ['filter' => 'guest']);
$routes->post('register', 'RegisterController::register', ['filter' => 'guest']);

$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->post('dashboard/update-gold-count/(:num)', 'Dashboard::updateGoldCount/$1', ['filter' => 'auth']);
$routes->post('dashboard/update-gold-hoarders/(:num)', 'Dashboard::updateGoldHoarders/$1', ['filter' => 'auth']);
$routes->post('dashboard/update-order-of-souls/(:num)', 'Dashboard::updateOrderofSouls/$1', ['filter' => 'auth']);
