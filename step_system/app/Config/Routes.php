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
$routes->group('', function($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::login');
});

$routes->get('logout', 'AuthController::logout');

// Faculty
$routes->group('faculty', function($routes) {
    $routes->get('dashboard', 'Faculty\FacultyDashboardController::index');
    $routes->get('ppmp', 'Faculty\FacultyPPMPController::index');
    $routes->get('pr', 'Faculty\FacultyPRController::index');
    $routes->get('tasks', 'Faculty\FacultyTasksController::index');
    $routes->get('mr', 'Faculty\FacultyMRController::index');
    $routes->post('ppmp/export-excel', 'ExportController::exportPpmp');
    $routes->post('pr/export-excel', 'ExportController::exportPurchaseRequest');
});

// Director
$routes->group('director', function($routes) {
    $routes->get('dashboard', 'Director\DirectorDashboardController::index');
    $routes->get('tasks', 'Director\DirectorTasksController::index');
    $routes->get('mr', 'Director\DirectorMRController::index');
    $routes->get('ppmp', 'Director\DirectorPPMPController::index');
    $routes->get('pr', 'Director\DirectorPRController::index');
});
// Planning
    $routes->group('planning', function($routes) {
    $routes->get('dashboard', 'Planning\PlanningDashboardController::index');
    $routes->get('tasks', 'Planning\PlanningTasksController::index');
    $routes->get('mr', 'PlanningController::mr');
    $routes->get('ppmp', 'PlanningController::ppmp');
    $routes->get('pr', 'PlanningController::pr');
    $routes->get('app', 'PlanningController::app');
    $routes->get('inventory', 'PlanningController::inventory');

});

// Department Head
$routes->group('head', function($routes) {
    $routes->get('dashboard', 'DepartmentHead\DHDashboard::index');
    $routes->get('mr', 'DepartmentHead\DHDashboard::mr');
    $routes->get('ppmp', 'DepartmentHead\DHDashboard::ppmp');
    $routes->get('pr', 'DepartmentHead\DHDashboard::pr');
    $routes->post('pr/export-excel', 'ExportController::exportPurchaseRequest');
    $routes->post('ppmp/export-excel', 'ExportController::exportPpmp');
    $routes->post('pr/debug-test', 'DebugController::testRoute'); // Temporary debug route
    $routes->get('tasks', 'DepartmentHead\DHDashboard::tasks');
});
// Master Admin
$routes->group('admin', function($routes){
    $routes->get('dashboard', 'MasterAdmin\MADashboardController::dashboardIndex'); // Table 1

    $routes->get('rolesdep', 'MasterAdmin\MADashboardController::rolesDepIndex'); // Table 2
    $routes->post('rolesdep/update', 'MasterAdmin\MADashboardController::updateRoleDepartment'); // Table 2
    $routes->post('rolesdep/create', 'MasterAdmin\MADashboardController::createRoleDepartment'); // Table 2
    $routes->post('rolesdep/delete', 'MasterAdmin\MADashboardController::deleteRoleDepartment'); // Table 2

    $routes->get('usertype', 'MasterAdmin\MADashboardController::userTypeIndex'); // Table 3
    $routes->post('usertype/update', 'MasterAdmin\MADashboardController::update'); // Table 3

    $routes->get('rolesassign', 'MasterAdmin\MADashboardController::roleAssignIndex'); // Table 4
    $routes->get('rolesassign/getRolesByDepartment/(:num)', 'MasterAdmin\MADashboardController::getRolesByDepartment/$1'); // Table 4
    $routes->post('rolesassign/updateUserAssignment', 'MasterAdmin\MADashboardController::updateUserAssignment'); // Table 4
    $routes->get('rolesassign/searchUsers', 'MasterAdmin\MADashboardController::searchUsers'); // Table 4
    $routes->post('rolesassign/createUserAssignment', 'MasterAdmin\MADashboardController::createUserAssignment'); // Table 4
});

// Procurement Officer
$routes->group('procurement', function($routes) {
    $routes->get('dashboard', 'ProcurementOffice\ProcurementController::dashboard');
    $routes->get('mr', 'ProcurementOffice\ProcurementController::mr');
    $routes->get('ppmp', 'ProcurementOffice\ProcurementController::ppmp');
    $routes->get('pr', 'ProcurementOffice\ProcurementController::pr');
    $routes->get('tasks', 'ProcurementOffice\ProcurementController::tasks');
    $routes->get('po', 'ProcurementOffice\ProcurementController::po');
    $routes->get('inventory', 'ProcurementOffice\ProcurementController::inventory');
});

// Supply
$routes->group('supply', function($routes) {
    $routes->get('dashboard', 'Supply\SupplyController::dashboard');
    $routes->get('tasks', 'Supply\SupplyController::tasks');
    $routes->get('mr', 'Supply\SupplyController::mr');
    $routes->get('ppmp', 'Supply\SupplyController::ppmp');
    $routes->get('par', 'Supply\SupplyController::par');
    $routes->get('ics', 'Supply\SupplyController::ics');
    $routes->get('su', 'Supply\SupplyController::su');
});

// @Emman Proposed routing convention from sir PJ's discussion
// $routes->group('dh', function($routes) {
//     $routes->get('dashboard', 'DepartmentHead\DHDashboard::index');
//     $routes->get('mr', 'DepartmentHead\DHMr::index');

//     // The browser's URL/URI difference:
//     // localhost:8080/dh-dashboard, it will be localhost:8080/dh/dashboard
//     // localhost:8080/dh-mr, it will be localhost:8080/dh/mr

// });

// Unassigned
$routes->group('unassigned', function($routes) {
    $routes->get('mr', 'Unassigned\UnassignedController::mr');
    $routes->get('ppmp', 'Unassigned\UnassignedController::ppmp');
    $routes->get('pr', 'Unassigned\UnassignedController::pr');
});

// PPMP Routes
$routes->post('/ppmp/create', 'PpmpController::create');

// Planning Officer Routes
$routes->get('/planning/tasks', 'Planning\TasksController::index');
$routes->get('/planning/tasks/details/(:num)', 'Planning\TasksController::getDetails/$1');
$routes->post('/planning/tasks/update-status', 'Planning\TasksController::updatePpmpStatus');

// PPMP Preview Route
$routes->get('/ppmp/preview/(:num)', 'PpmpController::preview/$1');