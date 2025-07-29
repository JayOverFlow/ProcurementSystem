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

$routes->group('', ['filter' => 'auth:guest'], function($routes) {
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
$routes->group('', ['filter' => 'auth:guest'], function($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::login');
});

// Admin Login
$routes->group('admin', ['filter' => 'auth:guest'], function($routes) {
    $routes->get('login', 'AuthController::adminLogin');
    $routes->post('login', 'AuthController::adminLogin');
    $routes->get('register', 'AuthController::adminRegister');
    $routes->post('register', 'AuthController::adminRegister');
});

$routes->get('admin/logout', 'AuthController::adminLogout');

$routes->get('logout', 'AuthController::logout');

// Master Admin
$routes->group('admin', ['filter' => 'auth:admin'], function($routes){
    $routes->get('dashboard', 'MasterAdmin\MADashboardController::dashboardIndex'); // Table 1

    $routes->get('rolesdep', 'MasterAdmin\MADashboardController::rolesDepIndex'); // Table 2
    $routes->post('rolesdep/update', 'MasterAdmin\MADashboardController::updateRoleDepartment'); // Table 2
    $routes->post('rolesdep/create', 'MasterAdmin\MADashboardController::createRoleDepartment'); // Table 2
    $routes->post('rolesdep/delete', 'MasterAdmin\MADashboardController::deleteRoleDepartment'); // Table 2
    $routes->post('department/create', 'MasterAdmin\MADashboardController::createDepartment'); // Table 2 - Create New Department

    $routes->get('usertype', 'MasterAdmin\MADashboardController::userTypeIndex'); // Table 3
    $routes->post('usertype/update', 'MasterAdmin\MADashboardController::update'); // Table 3

    $routes->get('rolesassign', 'MasterAdmin\MADashboardController::roleAssignIndex'); // Table 4
    $routes->get('rolesassign/getRolesByDepartment/(:num)', 'MasterAdmin\MADashboardController::getRolesByDepartment/$1'); // Table 4
    $routes->post('rolesassign/updateUserAssignment', 'MasterAdmin\MADashboardController::updateUserAssignment'); // Table 4
    $routes->get('rolesassign/searchUsers', 'MasterAdmin\MADashboardController::searchUsers'); // Table 4
    $routes->post('rolesassign/createUserAssignment', 'MasterAdmin\MADashboardController::createUserAssignment'); // Table 4
});

// Faculty or Section Head
$routes->group('', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
});

// Director
$routes->group('', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
});

// Assistant Director
$routes->group('', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
});

// Planning
$routes->group('', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
    // $routes->get('inventory', 'PlanningController::inventory');
});

// Head
$routes->group('', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');

});

// Procurement Officer
$routes->group('', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
});

// Supply
$routes->group('', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
});

// Unassigned
$routes->group('', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
});

// PPMP
$routes->group('ppmp', ['filter' => 'auth:auth'], function($routes) {
    $routes->get('create', 'PpmpController::index');
    $routes->get('create/(:num)', 'PpmpController::index/$1'); // For loading the form with the data
    $routes->post('save', 'PpmpController::save');
    $routes->post('submit', 'PpmpController::submit');
    $routes->get('preview/(:num)', 'PpmpController::preview/$1');
});

// Tasks
$routes->group('tasks', ['filter' => 'auth:auth'], function($routes) {
    $routes->get('', 'TasksController::index');
    $routes->get('details/(:num)', 'TasksController::getDetails/$1');
    $routes->post('update-ppmp-status', 'TasksController::updatePpmpStatus');
    $routes->post('update-app-status', 'TasksController::updateAppStatus');
    $routes->post('update-pr-status', 'TasksController::updatePrStatus');
    $routes->post('update-po-status', 'TasksController::updatePoStatus');
    $routes->post('update-par-status', 'TasksController::updateParStatus'); // Added route for PAR status update
    $routes->post('update-ics-status', 'TasksController::updateIcsStatus'); // Added route for ICS status update
    $routes->post('assign/ppmp', 'TasksController::assignPpmp'); // Assign PPMP Task
});

// Material Requisition (MR)
$routes->group('mr', ['filter' => 'auth:auth'], function($routes) {
    $routes->get('', 'MrController::index');

});

// APP
$routes->group('app', ['filter' => 'auth:auth'], function($routes) {
    $routes->get('create', 'AppController::index');
    $routes->get('create/(:num)', 'AppController::index/$1'); // For loading the form with the data
    $routes->post('save', 'AppController::save');
    $routes->post('submit', 'AppController::submit');
    $routes->get('preview/(:num)', 'AppController::preview/$1');
    $routes->get('view/(:num)', 'AppController::view/$1');
});

// PR
$routes->group('pr', ['filter' => 'auth:auth'], function($routes) {
    $routes->get('create', 'PrController::index');
    $routes->get('create/(:num)', 'PrController::index/$1'); // For loading the form with the data
    $routes->post('save', 'PrController::save');
    $routes->post('submit', 'PrController::submit');
    $routes->get('preview/(:num)', 'PrController::preview/$1');
});

// PO
$routes->group('po', ['filter' => 'auth:auth'], function($routes) {
    $routes->get('create', 'PoController::index');
    $routes->get('create/(:num)', 'PoController::index/$1'); // For loading the form with the data
    $routes->post('save', 'PoController::save');
    $routes->post('submit', 'PoController::submit');
    $routes->get('preview/(:num)', 'PoController::preview/$1');
});

// PAR
$routes->group('par', ['filter' => 'auth:auth'], function($routes) {
    $routes->get('create', 'ParController::index');
    $routes->get('par/create/(:num)', 'ParController::index/$1');
    $routes->get('ics/create/(:num)', 'IcsController::index/$1'); // For loading the form with the data
    $routes->post('save', 'ParController::save');
    $routes->post('submit', 'ParController::submit');
});

// ICS
$routes->group('ics', ['filter' => 'auth:auth'], function($routes) {
    $routes->get('create', 'IcsController::index');
    $routes->get('create/(:num)', 'IcsController::index/$1'); // For loading the form with the data
    $routes->post('save', 'IcsController::save');
    $routes->post('submit', 'IcsController::submit');
});

// Preview
$routes->group('', function($routes) {
    $routes->get('ppmp/preview/(:num)', 'PpmpController::preview/$1');
    $routes->get('app/preview/(:num)', 'AppController::preview/$1');
});

// Dashboard
$routes->group('dashboard', ['filter' => 'auth:auth'], function($routes) {
    $routes->get('', 'DashboardController::index');
});

// Procurement
$routes->group('procurement', function($routes) {
    $routes->get('', 'ProcurementController::index');
});

// Stepper
$routes->group('stepper', function($routes) {
    $routes->get('stepper-status/(:num)', 'StepperController::getStepperStatus/$1');
});

// Procurement Feature Routes
$routes->post('procurement/delete', 'ProcurementPageController::deleteForms'); // Route to handle soft deletion of forms

//preview pages (DELETE THIS)
$routes->group('preview', function ($routes) {
$routes->get('po', 'PreviewController::postPreviewPO');
$routes->get('pr', 'PreviewController::postPreviewPR');
});

// ICS
$routes->get('ics/create', 'Supply\\IcsController::index', ['filter' => 'userAuth']);
$routes->get('ics/create/(:num)', 'Supply\\IcsController::index/$1', ['filter' => 'userAuth']);
$routes->post('ics/save', 'Supply\\IcsController::save', ['filter' => 'userAuth']);
$routes->post('ics/submit', 'Supply\\IcsController::submit', ['filter' => 'userAuth']);

