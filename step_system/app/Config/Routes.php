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

$routes->group('', function($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::login');
});

// Department Head
$routes->group('', function($routes) {
    $routes->get('dh-dashboard', 'DepartmentHead\DHDashboard::index');
    $routes->get('dh-mr', 'DepartmentHead\DHMr::index');

});
