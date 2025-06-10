<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/register', 'AuthController::index');
// $routes->post('/register/store', 'AuthController::store');

// $routes->get('register', 'AuthController::register');  // Show the form
// $routes->post('register', 'AuthController::register'); // Handle form submission

// $routes->match(['get', 'post'], 'login', 'AuthController::login');

$routes->group('', function($routes) {
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::register');
});

$routes->group('', function($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::login');
});
