<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('', function($routes) {
    $routes->get('testing', 'AuthController::testing');
    $routes->post('testing', 'AuthController::testing');
});

$routes->group('', function($routes) {
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::register');
});

$routes->group('', function($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::login');
});


// Department Head
$routes->group('', function($routes) {
    $routes->get('dh-dashboard', 'DepartmentHead\DHDashboard::index');
    $routes->get('dh-mr', 'DepartmentHead\DHMr::index');

});
