<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('', function($routes) {
    $routes->get('testing', 'TestingController::testing');
    $routes->post('testing', 'TestingController::testing');
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

$routes->group('faculty', function($routes) {
    $routes->get('dashboard', 'FacultyController::dashboard');
    $routes->get('tasks', 'FacultyController::tasks');
    $routes->get('mr', 'FacultyController::mr');
    $routes->get('ppmp', 'FacultyController::ppmp');
    $routes->get('pr', 'FacultyController::pr');
});

// Department Head
$routes->group('dh', function($routes) {
    $routes->get('dashboard', 'DepartmentHead\DHDashboard::index');
    $routes->get('mr', 'DepartmentHead\DHMr::index');

});
// Master Admin
$routes->group('ma', function($routes){
    $routes->get('dashboard', 'MasterAdmin\MADashboardController::index'); // Table 1
    $routes->get('rolesdep', 'MasterAdmin\MARolesDepController::index'); // Table 2
    $routes->post('rolesdep/update', 'MasterAdmin\MARolesDepController::updateRoleDepartment'); // Table 2
    $routes->post('rolesdep/create', 'MasterAdmin\MARolesDepController::createRoleDepartment'); // Table 2
    $routes->get('usertype', 'MasterAdmin\MAUserTypeController::index'); // Table 3
    $routes->post('usertype/update', 'MasterAdmin\MAUserTypeController::update'); // Table 3
    $routes->get('rolesassign', 'MasterAdmin\MARolesAssignmentController::index'); // Table 4
    $routes->get('rolesassign/getRolesByDepartment/(:num)', 'MasterAdmin\MARolesAssignmentController::getRolesByDepartment/$1');
    $routes->post('rolesassign/updateUserAssignment', 'MasterAdmin\MARolesAssignmentController::updateUserAssignment');
    $routes->get('rolesassign/searchUsers', 'MasterAdmin\MARolesAssignmentController::searchUsers');
    $routes->post('rolesassign/createUserAssignment', 'MasterAdmin\MARolesAssignmentController::createUserAssignment');
});

$routes->group('supply', function($routes) {
    $routes->get('dashboard', 'SupplyController::dashboard');
    $routes->get('tasks', 'SupplyController::tasks');
    $routes->get('mr', 'SupplyController::mr');
    $routes->get('ppmp', 'SupplyController::ppmp');
    $routes->get('par', 'SupplyController::par');
    $routes->get('ics', 'SupplyController::ics');
    $routes->get('su', 'SupplyController::su');
});

// @Emman Proposed routing convention from sir PJ's discussion
// $routes->group('dh', function($routes) {
//     $routes->get('dashboard', 'DepartmentHead\DHDashboard::index');
//     $routes->get('mr', 'DepartmentHead\DHMr::index');

//     // The browser's URL/URI difference:
//     // localhost:8080/dh-dashboard, it will be localhost:8080/dh/dashboard
//     // localhost:8080/dh-mr, it will be localhost:8080/dh/mr

// });
