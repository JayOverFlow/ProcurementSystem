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

// For registration stepper for AJAX
$routes->group('auth', function($routes) {
    $routes->post('sendOtp', 'AuthController::sendOtp');
    $routes->post('verifyOtp', 'AuthController::verifyOtp');
    $routes->post('resendOtp', 'AuthController::resendOtp');
    $routes->post('checkTupId', 'AuthController::checkTupId');
    $routes->post('checkEmail', 'AuthController::checkEmail');
});

// Login
// Used helper('url') for route_to method
$routes->group('', function($routes) {
    $routes->get('login', 'AuthController::login', ['as' => 'login']);
    $routes->post('login', 'AuthController::login', ['as' => 'login']);
});



// Department Head
$routes->group('', function($routes) {
    $routes->get('dh-dashboard', 'DepartmentHead\DHDashboard::index');
    $routes->get('dh-mr', 'DepartmentHead\DHMr::index');

});

// @Emman Proposed routing convention from sir PJ's discussion
// $routes->group('dh', function($routes) {
//     $routes->get('dashboard', 'DepartmentHead\DHDashboard::index');
//     $routes->get('mr', 'DepartmentHead\DHMr::index');

//     // The browser's URL/URI difference:
//     // localhost:8080/dh-dashboard, it will be localhost:8080/dh/dashboard
//     // localhost:8080/dh-mr, it will be localhost:8080/dh/mr

// });
