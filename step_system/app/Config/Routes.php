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

// Faculty or Section Head
$routes->group('faculty', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('procurement', 'Faculty\FacultyProcurementController::index');
    // $routes->get('ppmp', 'Faculty\FacultyPPMPController::index');
    $routes->get('pr', 'Faculty\FacultyPRController::index');
    // $routes->get('tasks', 'Faculty\FacultyTasksController::index');
    // $routes->get('mr', 'Faculty\FacultyMRController::index');
    // $routes->post('ppmp/export-excel', 'ExportController::exportPpmp');
    // $routes->post('pr/export-excel', 'ExportController::exportPurchaseRequest');
});

// Assistant Director
$routes->group('assistant-director', function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('procurement', 'AssistantDirector\AssistantDirectorProcurementController::index');
    // $routes->get('tasks', 'AssistantDirector\AssistantDirectorTasksController::index');
    // $routes->get('mr', 'AssistantDirector\AssistantDirectorMRController::index');
    // $routes->get('ppmp', 'AssistantDirector\AssistantDirectorPPMPController::index');
    $routes->get('pr', 'AssistantDirector\AssistantDirectorPRController::index');
});
// Director
$routes->group('director', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('procurement', 'Director\DirectorProcurementController::index');
    // $routes->get('tasks', 'Director\DirectorTasksController::index');
    // $routes->get('mr', 'Director\DirectorMRController::index');
    // $routes->get('ppmp', 'Director\DirectorPPMPController::index');
    $routes->get('pr', 'Director\DirectorPRController::index');
});
// Planning
    $routes->group('planning', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
        $routes->get('procurement', 'Planning\PlanningProcurementController::index');
    // $routes->get('mr', 'PlanningController::mr');
    // $routes->get('ppmp', 'PlanningController::ppmp');
    $routes->get('pr', 'PlanningController::pr');
    // $routes->get('app', 'PlanningController::app');
    $routes->get('inventory', 'PlanningController::inventory');
    $routes->get('file1', 'PlanningController::file1');
    $routes->get('file2', 'PlanningController::file2');
    $routes->get('file1', 'PlanningController::file1');
    $routes->get('file2', 'PlanningController::file2');

});

// Department Head
$routes->group('head', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('procurement', 'DepartmentHead\DHProcurementController::index');
    $routes->get('mr', 'DepartmentHead\DHDashboard::mr');
    // $routes->get('ppmp', 'DepartmentHead\DHDashboard::ppmp');
    $routes->get('pr', 'DepartmentHead\DHDashboard::pr');
    $routes->post('pr/export-excel', 'ExportController::exportPurchaseRequest');
    $routes->post('ppmp/export-excel', 'ExportController::exportPpmp');
    $routes->post('pr/debug-test', 'DebugController::testRoute'); // Temporary debug route
    $routes->get('tasks', 'DepartmentHead\DHDashboard::tasks');
});
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

// Procurement Officer
$routes->group('procurement', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('procurement', 'ProcurementOffice\ProcurementController::index');
    // $routes->get('mr', 'ProcurementOffice\ProcurementController::mr');
    // $routes->get('ppmp', 'ProcurementOffice\ProcurementController::ppmp');
    $routes->get('pr', 'ProcurementOffice\ProcurementController::pr');
    // $routes->get('tasks', 'ProcurementOffice\ProcurementController::tasks');
    $routes->get('po', 'ProcurementOffice\ProcurementController::po');
    $routes->get('inventory', 'ProcurementOffice\ProcurementController::inventory');
});

// Supply
$routes->group('supply', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('procurement', 'Supply\SupplyController::procurement');
    $routes->get('tasks', 'Supply\SupplyController::tasks');
    $routes->get('mr', 'Supply\SupplyController::mr');
    // $routes->get('ppmp', 'Supply\SupplyController::ppmp');
    $routes->get('par', 'Supply\SupplyController::par');
    $routes->get('ics', 'Supply\SupplyController::ics');
    $routes->get('su', 'Supply\SupplyController::su');
    $routes->get('inventory', 'Supply\SupplyController::inventory');
    $routes->get('my-files', 'Supply\SupplyController::myFiles');
});

// Unassigned
$routes->group('unassigned', ['filter' => 'auth:user'], function($routes) {
    $routes->get('dashboard', 'DashboardController::index');
    $routes->get('procurement', 'Unassigned\UnassignedProcurementController::index');
    $routes->get('ppmp', 'Unassigned\UnassignedPPMPController::index');
    $routes->get('pr', 'Unassigned\UnassignedPRController::index');
    $routes->get('tasks', 'Unassigned\UnassignedTasksController::index');
    $routes->get('mr', 'Unassigned\UnassignedMRController::index');
    $routes->post('ppmp/export-excel', 'ExportController::exportPpmp');
    $routes->post('pr/export-excel', 'ExportController::exportPurchaseRequest');
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
});

// PO
$routes->group('po', ['filter' => 'auth:auth'], function($routes) {
    $routes->get('create', 'PoController::index');
    $routes->get('create/(:num)', 'PoController::index/$1'); // For loading the form with the data
    $routes->post('save', 'PoController::save');
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

// Sample Route for PPMP Preview
$routes->get('ppmp/preview/', 'PpmpSampleController::index');