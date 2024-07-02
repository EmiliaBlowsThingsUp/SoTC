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


$routes->post('dashboard/update-gold-count/(:num)', 'Dashboard::updateGoldCount/$1');

$routes->group('dashboard', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Dashboard::index');

    // Route for updating multiple emissaries
    $routes->post('update-emissaries', 'Dashboard::updateEmissaries');
});