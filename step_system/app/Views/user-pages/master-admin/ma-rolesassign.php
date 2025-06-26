<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?= base_url('assets/src/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/light/plugins.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/dark/plugins.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?= base_url('assets/src/plugins/src/apex/apexcharts.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/src/assets/css/light/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/table/datatable/datatables.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/custom_dt_custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/custom_dt_custom.css') ?>">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

    <style>
        #content {
            margin-top: 70px !important;
        }
    </style>
</head>
<body class="layout-boxed enable-secondaryNav"> 
<!--  BEGIN NAVBAR  -->
<div class="header-container container-xxl">
    <header class="header navbar navbar-expand-sm expand-header">

        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

        <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo">
                    <a href="index.html">
                        <img src="<?= base_url('assets/images/logo.png') ?>" class="navbar-logo" alt="logo">
                    </a>
                </li>

            </ul>
        

        <ul class="navbar-item flex-row ms-lg-auto ms-0 action-area">

            <li class="nav-item theme-toggle-item">
                <a href="javascript:void(0);" class="nav-link theme-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-moon dark-mode"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                    <img src="<?= base_url('assets/images/icon-light-mode.svg') ?>" class="navbar-logo" alt="logo">
                    </a>
            </li>

            <li class="nav-item dropdown notification-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?= base_url('assets/images/icon-notif.svg') ?>" class="navbar-logo" alt="logo">
                </a>

                <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                    <div class="drodpown-title message">
                        <h6 class="d-flex justify-content-between"><span class="align-self-center">Messages</span> <span class="badge badge-primary">9 Unread</span></h6>
                    </div>
                    <div class="notification-scroll">
                        <div class="dropdown-item">
                            <div class="media server-log">
                                <img src="<?= base_url('assets/src/assets/img/profile-16.jpeg') ?>" class="img-fluid me-2" alt="avatar">
                                <div class="media-body">
                                    <div class="data-info">
                                        <h6 class="">Kara Young</h6>
                                        <p class="">1 hr ago</p>
                                    </div>

                                    <div class="icon-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-item">
                            <div class="media ">
                                <img src="<?= base_url('assets/src/assets/img/profile-15.jpeg') ?>" alt="avatar">
                                <div class="media-body">
                                    <div class="data-info">
                                        <h6 class="">Daisy Anderson</h6>
                                        <p class="">8 hrs ago</p>
                                    </div>

                                    <div class="icon-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-item">
                            <div class="media file-upload">
                                <img src="../src/assets/img/profile-21.jpeg" class="img-fluid me-2" alt="avatar">
                                <div class="media-body">
                                    <div class="data-info">
                                        <h6 class="">Oscar Garner</h6>
                                        <p class="">14 hrs ago</p>
                                    </div>

                                    <div class="icon-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="drodpown-title notification mt-2">
                            <h6 class="d-flex justify-content-between"><span class="align-self-center">Notifications</span> <span class="badge badge-secondary">16 New</span></h6>
                        </div>

                        <div class="dropdown-item">
                            <div class="media server-log">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg>
                                <div class="media-body">
                                    <div class="data-info">
                                        <h6 class="">Server Rebooted</h6>
                                        <p class="">45 min ago</p>
                                    </div>

                                    <div class="icon-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-item">
                            <div class="media file-upload">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <div class="media-body">
                                    <div class="data-info">
                                        <h6 class="">Kelly Portfolio.pdf</h6>
                                        <p class="">670 kb</p>
                                    </div>

                                    <div class="icon-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-item">
                            <div class="media ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                <div class="media-body">
                                    <div class="data-info">
                                        <h6 class="">Licence Expiring Soon</h6>
                                        <p class="">8 hrs ago</p>
                                    </div>

                                    <div class="icon-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </li>

            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar-container">
                        <div class="avatar avatar-sm avatar-indicators avatar-online">
                            <img src="<?= base_url('assets/images/icon-prof-pic.svg') ?>" class="navbar-logo" alt="logo">
                        </div>
                    </div>
                </a>

                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <div class="emoji me-2">
                                &#x1F44B;
                            </div>
                            <div class="media-body">
                                <h5>Shaun Park</h5>
                                <p>Project Leader</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <a href="user-profile.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Profile</span>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="app-mailbox.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span>Inbox</span>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="auth-boxed-lockscreen.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Lock Screen</span>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="auth-boxed-signin.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Log Out</span>
                        </a>
                    </div>
                </div>

            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        
        <!--  BEGIN SIDEBAR  -->
            <div class="sidebar-wrapper sidebar-theme">

                <nav id="sidebar">

                    <div class="navbar-nav theme-brand flex-row  text-center">
                        <div class="nav-logo">
                            <div class="nav-item theme-logo">
                                <a href="./index.html">
                                    <img src="../src/assets/img/logo.svg" class="navbar-logo" alt="logo">
                                </a>
                            </div>
                            <div class="nav-item theme-text">
                                <a href="./index.html" class="nav-link"> EQUATION </a>
                            </div>
                        </div>
                        <div class="nav-item sidebar-toggle">
                            <div class="btn-toggle sidebarCollapse">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                            </div>
                        </div>
                    </div>
                    <div class="shadow-bottom"></div>
                    <ul class="list-unstyled menu-categories" id="accordionExample">
                        <li class="menu active">
                            <a href="dashboard" aria-expanded="true" class="dropdown-toggle">
                                <div class="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span style="color: white">Users</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                            
                        </li>

                        <li class="menu menu-heading">
                            <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>APPLICATIONS</span></div>
                        </li>

                        <li class="menu">
                            <a href="rolesdep" aria-expanded="true" class="dropdown-toggle">
                                <div class="">
                                    <img src="<?= base_url('assets/images/icon-procurement.svg') ?>" class="navbar-logo" alt="logo">
                                    <span>Roles & Offices</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                        </li>

                        <li class="menu menu-heading">
                            <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>USER INTERFACE</span></div>
                        </li>

                        <li class="menu">
                            <a href="usertype" aria-expanded="true" class="dropdown-toggle">
                                <div class="">
                                <img src="<?= base_url('assets/images/icon-tasks.svg') ?>" class="navbar-logo" alt="logo">
                                <span>User Type</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                        </li>

                        <li class="menu">
                            <a href="rolesassign" aria-expanded="true" class="dropdown-toggle">
                                <div class="">
                                    <img src="<?= base_url('assets/images/icon-mr.svg') ?>" class="navbar-logo" alt="logo">
                                    <span>Roles Assignment</span>
                                </div>
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                            </a>
                        </li>

                        <li class="menu menu-heading">
                            <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>TABLES AND FORMS</span></div>
                        </li>


                    </ul>

                </nav>
            </div>
            <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="middle-content container-xxl p-0">
                    <div class="row layout-top-spacing">

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                            <div class="widget widget-t-sales-widget widget-m-income">
                                <div class="media">
                                    <img src="<?= base_url('assets/images/icon-staff.svg') ?>" class="navbar-logo" alt="logo">
                                    <div class="media-body">
                                        <p class="widget-text">Staff</p>
                                        <p class="widget-numeric-value"><?= esc($staffCount ?? 0) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                            <div class="widget widget-t-sales-widget widget-m-customers">
                                <div class="media">
                                    <img src="<?= base_url('assets/images/icon-faculty.svg') ?>" class="navbar-logo" alt="logo">
                                    <div class="media-body">
                                        <p class="widget-text">Faculty</p>
                                        <p class="widget-numeric-value"><?= esc($facultyMembersCount ?? 0) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                            <div class="widget widget-t-sales-widget widget-m-sales">
                                <div class="media">
                                    <img src="<?= base_url('assets/images/icon-offices.svg') ?>" class="navbar-logo" alt="logo">
                                    <div class="media-body">
                                        <p class="widget-text">Roles</p>
                                        <p class="widget-numeric-value"><?= esc($allRoleCount ?? 0) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                            <div class="widget widget-t-sales-widget widget-m-orders">
                                <div class="media">
                                    <img src="<?= base_url('assets/images/icon-departments.svg') ?>" class="navbar-logo" alt="logo">
                                    <div class="media-body">
                                        <p class="widget-text">Offices</p>
                                        <p class="widget-numeric-value"><?= esc($allDepCount ?? 0) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        

                       
                </div>
                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <table id="style-1" class="table style-1 dt-table-hover">
                                        <thead>
                                        <tr>
                                            <th>TUPT-ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Role</th>
                                            <th>Department | Office</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($users) && is_array($users)): ?>
                                            <?php foreach ($users as $user): ?>
                                                <tr>
                                                    <td data-label="TUPT-ID"><?= esc($user['user_tupid'] ?? 'N/A') ?></td>
                                                    <td data-label="First Name"><?= esc($user['user_firstname'] ?? 'N/A') ?></td>
                                                    <td data-label="Last Name"><?= esc($user['user_lastname'] ?? 'N/A') ?></td>
                                                    <td data-label="Role" class="editable-role" data-role-id="<?= esc($user['role_id'] ?? '') ?>"><?= esc($user['role_name'] ?? 'None') ?></td>
                                                    <td data-label="Department | Office" class="editable-department" data-department-id="<?= esc($user['department_id'] ?? '') ?>"><?= esc($user['dep_name'] ?? 'Not Assigned') ?></td>
                                                    <td class="action-cell">
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit" 
                                                               data-user-id="<?= esc($user['user_id']) ?>" 
                                                               data-old-role-id="<?= esc($user['role_id'] ?? '') ?>" 
                                                               data-old-department-id="<?= esc($user['department_id'] ?? '') ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            </a>
                                                        </div>
                                                        <div class="edit-btns" style="display: none;">
                                                            <a href="javascript:void(0);" class="action-btn btn-save bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Save">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" class="action-btn btn-cancel bs-tooltip" data-toggle="tooltip" data-placement="top" title="Cancel">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center">No user data available.</td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
        <!--  END CONTENT AREA  -->


        <!-- END MAIN CONTAINER -->
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('assets/src/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/layouts/horizontal-light-menu/app.js') ?>"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="<?= base_url('assets/src/plugins/src/apex/apexcharts.min.js') ?>"></script>
    <script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js') ?>"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?= base_url('assets/src/plugins/src/global/vendors.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/mousetrap/mousetrap.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/plugins/src/waves/waves.min.js') ?>"></script>
<script src="<?= base_url('assets/layouts/horizontal-light-menu/app.js') ?>"></script>


<script src="<?= base_url('assets/src/assets/js/custom.js') ?>"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
<script>
    // var e;
    c1 = $('#style-1').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'<'myFilterDropdown'>><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'<'myAddButton'>f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
        },
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10,
        initComplete: function () {
            var api = this.api();
            var departments = <?= json_encode($departments) ?>;

            var filterHtml = `
                <label class="d-flex align-items-center">Filter:
                    <select id="departmentFilter" class="form-control form-control-sm ms-2">
                        <option value="">All Departments</option>
                        `;

            if (departments.Academic && departments.Academic.length > 0) {
                filterHtml += `<optgroup label="Academic">`;
                departments.Academic.forEach(function(department) {
                    filterHtml += `<option value="${department.dep_name}">${department.dep_name}</option>`;
                });
                filterHtml += `</optgroup>`;
            }

            if (departments.Administrative && departments.Administrative.length > 0) {
                filterHtml += `<optgroup label="Administrative">`;
                departments.Administrative.forEach(function(department) {
                    filterHtml += `<option value="${department.dep_name}">${department.dep_name}</option>`;
                });
                filterHtml += `</optgroup>`;
            }

            filterHtml += `
                    </select>
                </label>
            `;

            $('.myFilterDropdown').html(filterHtml);

            $('#departmentFilter').on('change', function () {
                var val = $(this).val();
                console.log('Filter value:', val);
                // Perform a literal, smart, and case-insensitive search on the 'Department | Office' column (index 5).
                api.column(5).search(val, false, true, true).draw();
                console.log('Column 5 data:', api.column(5).data().toArray());
            });

            // Add button for new assignment
            var addButtonHtml = `
                <button class="btn btn-outline-secondary btn-sm ms-3" id="addAssignmentButton" style="box-shadow: none !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </button>
            `;
            $('.myAddButton').html(addButtonHtml);

            $('#addAssignmentButton').on('click', function() {
                console.log(`[${performance.now().toFixed(2)}] Add Assignment Button Clicked!`);

                var newRowHtml = `
                    <tr class="new-row temp-new-assignment-row">
                        <td data-label="TUPT-ID"><span class="new-tupid-display">N/A</span></td>
                        <td data-label="First Name">
                            <input type="text" class="form-control form-control-sm user-firstname-input" placeholder="First Name">
                            <input type="hidden" class="new-user-id" value="">
                            <div class="user-suggestions-container" style="position: absolute; background-color: white; border: 1px solid #ccc; max-height: 200px; overflow-y: auto; z-index: 1000; width: auto; min-width: 150px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: none;"></div>
                        </td>
                        <td data-label="Last Name"><input type="text" class="form-control form-control-sm user-lastname-input" placeholder="Last Name"></td>
                        <td data-label="Role"><select class="form-control role-select"><option value="">Select Role</option></select></td>
                        <td data-label="Department | Office">` + getDepartmentSelectHtml(null) + `</td>
                        <td class="action-cell">
                            <div class="action-btns new-row-action-btns">
                                <a href="javascript:void(0);" class="action-btn btn-save-new bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Save New">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                </a>
                                <a href="javascript:void(0);" class="action-btn btn-cancel-new bs-tooltip" data-toggle="tooltip" data-placement="top" title="Cancel">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                </a>
                            </div>
                        </td>
                    </tr>`;

                $('#style-1 tbody').prepend(newRowHtml);
                
                // Get a reference to the newly prepended row for event listeners
                var $newRow = $('#style-1 tbody').find('.temp-new-assignment-row:first');
                console.log(`[${performance.now().toFixed(2)}] New row prepended. $newRow length: ${$newRow.length}`);

                // Scroll to the new row if it's not visible
                $('html, body').animate({
                    scrollTop: $newRow.offset().top
                }, 500);

                // Attach event listeners for the new row's elements
                // User search functionality
                $newRow.find('.user-firstname-input, .user-lastname-input').on('keyup', function() {
                    var $thisInput = $(this);
                    var query = $thisInput.val();
                    var $suggestionsContainer = $thisInput.closest('td').find('.user-suggestions-container');
                    
                    if (query.length > 2) { // Start searching after 2 characters
                        $.ajax({
                            url: '<?= base_url('ma/rolesassign/searchUsers') ?>',
                            method: 'GET',
                            data: { query: query },
                            dataType: 'json',
                            success: function(users) {
                                $suggestionsContainer.empty();
                                if (users.length > 0) {
                                    users.forEach(function(user) {
                                        var fullname = user.user_firstname + ' ' + user.user_lastname;
                                        $suggestionsContainer.append(`<div class="suggestion-item" data-user-id="${user.user_id}" data-firstname="${user.user_firstname}" data-lastname="${user.user_lastname}" data-tupid="${user.user_tupid || 'N/A'}">${fullname}</div>`);
                                    });
                                    $suggestionsContainer.show();
                                } else {
                                    $suggestionsContainer.hide();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Error searching users:", xhr, status, error);
                                $suggestionsContainer.hide();
                            }
                        });
                    } else {
                        $suggestionsContainer.hide();
                    }
                });

                // Handle suggestion item click
                $newRow.on('click', '.suggestion-item', function() {
                    console.log(`[${performance.now().toFixed(2)}] Suggestion Item Clicked!`);
                    var $item = $(this);
                    var userId = $item.data('user-id');
                    var firstname = $item.data('firstname');
                    var lastname = $item.data('lastname');
                    var tuptid = $item.data('tupid');

                    $newRow.find('.new-user-id').val(userId);
                    $newRow.find('.user-firstname-input').val(firstname).prop('readonly', true);
                    $newRow.find('.user-lastname-input').val(lastname).prop('readonly', true);
                    $newRow.find('.new-tupid-display').text(tuptid);
                    $item.parent().hide(); // Hide suggestions container

                    // Now that user is selected, enable and load roles for the department
                    var $departmentSelect = $newRow.find('.department-select');
                    var selectedDepartmentId = $departmentSelect.val();
                    if (selectedDepartmentId) {
                        // Pass null for selectedRoleId for new assignments
                        loadRolesForDepartment(selectedDepartmentId, $newRow.find('.role-select'), null, userId, 'from_new_assign_after_user_select');
                    } else {
                        // If no department is pre-selected, clear roles just in case
                        $newRow.find('.role-select').empty().append('<option value="">None</option>');
                    }
                });

                // Hide suggestions when input loses focus, with a slight delay
                $newRow.find('.user-firstname-input, .user-lastname-input').on('focusout', function() {
                    var $suggestionsContainer = $(this).closest('td').find('.user-suggestions-container');
                    setTimeout(function() {
                        $suggestionsContainer.hide();
                    }, 200); // Small delay to allow click on suggestion item
                });

                // Department change listener for new row
                $newRow.find('.department-select').on('change', function() {
                    console.log(`[${performance.now().toFixed(2)}] New Assignment - Department Change Event Triggered!`);
                    var newDepartmentId = $(this).val();
                    var userId = $newRow.find('.new-user-id').val();
                    var roleSelectElement = $newRow.find('.role-select'); // Correctly target the role select element within the new row

                    if (userId && newDepartmentId) {
                        loadRolesForDepartment(newDepartmentId, roleSelectElement, null, userId, 'from_new_assign_change');
                    } else {
                        roleSelectElement.empty().append('<option value="">None</option>');
                    }
                });
            });
        }
    });

    // Helper function to generate department select HTML (moved/ensured presence)
    function getDepartmentSelectHtml(selectedDepId) {
        var departmentSelectHtml = `<select class="form-control form-control-sm department-select">`;
        departmentSelectHtml += `<option value="">Select Department</option>`;

        // Sort departments alphabetically within their groups for better UX
        var academicDeps = allDepartments.filter(dep => dep.dep_type === 'Academic').sort((a, b) => a.dep_name.localeCompare(b.dep_name));
        var administrativeDeps = allDepartments.filter(dep => dep.dep_type === 'Administrative').sort((a, b) => a.dep_name.localeCompare(b.dep_name));

        if (academicDeps.length > 0) {
            departmentSelectHtml += `<optgroup label="Academic">`;
            academicDeps.forEach(function(department) {
                var selected = (department.dep_id == selectedDepId) ? 'selected' : '';
                departmentSelectHtml += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelectHtml += `</optgroup>`;
        }

        if (administrativeDeps.length > 0) {
            departmentSelectHtml += `<optgroup label="Administrative">`;
            administrativeDeps.forEach(function(department) {
                var selected = (department.dep_id == selectedDepId) ? 'selected' : '';
                departmentSelectHtml += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelectHtml += `</optgroup>`;
        }
        departmentSelectHtml += `</select>`;
        return departmentSelectHtml;
    }


    multiCheck(c1);

    // Get all departments and roles data
    var allDepartments = <?= json_encode($allDepartments) ?>;
    // allOccupiedRoles is not used here directly as loadRolesForDepartment fetches specific occupied roles per department

    $('#style-1 tbody').on('click', '.btn-edit', function() {
        console.log(`[${performance.now().toFixed(2)}] Edit Button Clicked!`);

        var row = $(this).closest('tr');
        var userId = $(this).data('user-id');
        var oldRoleId = $(this).data('old-role-id'); // This is the actual role ID from the button's data attribute
        var oldDepartmentId = $(this).data('old-department-id');

        console.log(`[${performance.now().toFixed(2)}] Edit Data - userId: ${userId}, oldRoleId: ${oldRoleId}, oldDepartmentId: ${oldDepartmentId}`);

        // Store original values
        row.data('original-role-text', row.find('.editable-role').text());
        row.data('original-role-id', oldRoleId); // Store oldRoleId from button
        row.data('original-department-text', row.find('.editable-department').text());
        row.data('original-department-id', oldDepartmentId);

        // Hide action buttons, show edit buttons
        row.find('.action-btns').hide();
        row.find('.edit-btns').show();

        // Make Department | Office editable (dropdown)
        var departmentCell = row.find('.editable-department');
        var currentDepartmentId = departmentCell.data('department-id');
        var departmentSelect = `<select class="form-control department-select" data-current-id="${currentDepartmentId}">`;
        departmentSelect += `<option value="">Select Department</option>`;
        // Sort departments alphabetically within their groups for better UX
        var academicDeps = allDepartments.filter(dep => dep.dep_type === 'Academic').sort((a, b) => a.dep_name.localeCompare(b.dep_name));
        var administrativeDeps = allDepartments.filter(dep => dep.dep_type === 'Administrative').sort((a, b) => a.dep_name.localeCompare(b.dep_name));

        if (academicDeps.length > 0) {
            departmentSelect += `<optgroup label="Academic">`;
            academicDeps.forEach(function(department) {
                var selected = (department.dep_id == currentDepartmentId) ? 'selected' : '';
                departmentSelect += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelect += `</optgroup>`;
        }

        if (administrativeDeps.length > 0) {
            departmentSelect += `<optgroup label="Administrative">`;
            administrativeDeps.forEach(function(department) {
                var selected = (department.dep_id == currentDepartmentId) ? 'selected' : '';
                departmentSelect += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelect += `</optgroup>`;
        }
        departmentSelect += `</select>`;
        departmentCell.html(departmentSelect);
        console.log(`[${performance.now().toFixed(2)}] Department Select element replaced in DOM.`);

        // Make Role editable (dropdown)
        var roleCell = row.find('.editable-role');
        // We use oldRoleId here as the selected role for initial population
        var newRoleSelectElement = $('<select class="form-control role-select"><option value="">Select Role</option></select>');
        newRoleSelectElement.attr('data-current-id', oldRoleId); // Set data-current-id on the new select for potential debugging
        roleCell.html(newRoleSelectElement);
        console.log(`[${performance.now().toFixed(2)}] Role Select element replaced in DOM.`);

        // Event listener for department change
        departmentCell.find('.department-select').off('change').on('change', function() {
            console.log(`[${performance.now().toFixed(2)}] Edit - Department Change Event Triggered!`);
            var newDepartmentId = $(this).val();
            // Pass oldRoleId as selectedRoleId to loadRolesForDepartment for initial selection and subsequent changes
            loadRolesForDepartment(newDepartmentId, newRoleSelectElement, oldRoleId, userId, 'from_edit_change');
        });

        // Manually trigger change to load roles for the initially selected department on edit
        departmentCell.find('.department-select').trigger('change');
        console.log(`[${performance.now().toFixed(2)}] Manual 'change' trigger fired for Department Select.`);
    });

    function loadRolesForDepartment(departmentId, roleSelectElement, selectedRoleId, currentEditingUserId, context = 'unknown') {
        console.log(`[${performance.now().toFixed(2)}] --- Entering loadRolesForDepartment (${context}) ---`);
        console.log(`[${performance.now().toFixed(2)}] Args: departmentId= ${departmentId}, selectedRoleId= ${selectedRoleId}, currentEditingUserId= ${currentEditingUserId}`);
        
        if (roleSelectElement.length === 0) {
            console.warn(`[${performance.now().toFixed(2)}] loadRolesForDepartment: roleSelectElement not found or is empty (length 0). Aborting population.`);
            return; // Abort if element not found
        }

        console.log(`[${performance.now().toFixed(2)}] Role select element before empty(): ${roleSelectElement.html()}`);
        roleSelectElement.empty().append('<option value="">None</option>'); // Add None option
        console.log(`[${performance.now().toFixed(2)}] Role select element after empty() and adding None: ${roleSelectElement.html()}`);

        if (departmentId) {
            $.ajax({
                url: '<?= base_url('ma/rolesassign/getRolesByDepartment') ?>/' + departmentId,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(`[${performance.now().toFixed(2)}] AJAX Success (${context}): Roles received for department ${departmentId}:`, response.roles);
                    var roles = response.roles;
                    var occupiedRolesInDepartment = response.occupiedRoles;
                    console.log(`[${performance.now().toFixed(2)}] Processing roles. Total roles from AJAX: ${roles.length}`);
                    console.log(`[${performance.now().toFixed(2)}] Roles received from backend (raw):`, roles); // Debugging for duplicated roles
                    console.log(`[${performance.now().toFixed(2)}] Role select element before appending roles: ${roleSelectElement.html()}`);
                    roles.forEach(function(role) {
                        // Handle selectedRoleId being 0 or null/empty string as not selected, unless role.role_id is also 0/null.
                        // Explicitly convert selectedRoleId to number for comparison if role.role_id is number, or string if role.role_id is string.
                        const isSelected = (selectedRoleId !== null && selectedRoleId !== '' && role.role_id == selectedRoleId);
                        console.log(`[${performance.now().toFixed(2)}] Adding role: ${role.role_name} ID: ${role.role_id}, Selected check: ${isSelected}, Disabled check: ${(occupiedRolesInDepartment[role.role_id] && occupiedRolesInDepartment[role.role_id] != currentEditingUserId)}`);
                        var selected = isSelected ? 'selected' : '';
                        var disabled = '';
                        // Disable role if it's occupied by another user and not the current user being edited
                        if (occupiedRolesInDepartment[role.role_id] && occupiedRolesInDepartment[role.role_id] != currentEditingUserId) {
                            disabled = 'disabled';
                        }
                        roleSelectElement.append(`<option value="${role.role_id}" ${selected} ${disabled}>${role.role_name}</option>`);
                    });
                    console.log(`[${performance.now().toFixed(2)}] After roles.forEach loop: roleSelect content: ${roleSelectElement.html()}`);
                },
                error: function(xhr, status, error) {
                    console.error(`[${performance.now().toFixed(2)}] Error fetching roles (${context}):`, xhr, status, error);
                    alert('Failed to load roles. Please try again.');
                }
            });
        }
    }

    $('#style-1 tbody').on('click', '.btn-save', function() {
        var row = $(this).closest('tr');
        var userId = row.find('.btn-edit').data('user-id');
        var oldRoleId = row.data('original-role-id');
        var oldDepartmentId = row.data('original-department-id');

        var newDepartmentId = row.find('.department-select').val();
        var newRoleId = row.find('.role-select').val();

        // If newRoleId is empty (None), set it to null for backend
        if (newRoleId === "") {
            newRoleId = null;
        }
        // If newDepartmentId is empty (e.g., if somehow a department isn't selected, though it should be required)
        if (newDepartmentId === "") {
            newDepartmentId = null;
        }

        // If both are null, it means the user is being fully unassigned
        // The backend logic is set up to handle deletion if both old values exist and new values are null
        // If only department is chosen but role is none, it will still update that way.

        // Special case: if both newRoleId and newDepartmentId are null, and there was an old assignment,
        // we want to ensure the deletion happens without an insert.
        if (newRoleId === null && newDepartmentId === null && (oldRoleId !== null || oldDepartmentId !== null)) {
            if (!confirm("Are you sure you want to unassign this user from their role and department?")) {
                return;
            }
        } else if (newRoleId === null && newDepartmentId !== null) {
            // User is being assigned to a department but no role
            if (!confirm("Are you sure you want to assign this user to a department without a specific role?")) {
                return;
            }
        } else if (newDepartmentId === null && newRoleId !== null) {
            alert("Cannot assign a role without a department. Please select a department.");
            return;
        } else if (!newRoleId && !newDepartmentId) {
            // This case should ideally not happen if the UI requires a selection for department when editing
            // But as a fallback, prevent saving if both are empty/null after user interaction for new assignment.
            alert('Please select a Department and a Role (or None for Role).');
            return;
        }

        var postData = {
            userId: userId,
            oldRoleId: oldRoleId,
            oldDepartmentId: oldDepartmentId,
            newRoleId: newRoleId,
            newDepartmentId: newDepartmentId
        };
        console.log(`[${performance.now().toFixed(2)}] Sending data for updateUserAssignment:`, postData);

        $.ajax({
            url: '<?= base_url('ma/rolesassign/updateUserAssignment') ?>',
            method: 'POST',
            data: JSON.stringify(postData),
            contentType: 'application/json',
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    // To ensure updated displayed text and IDs are correct, reload the page
                    // A full reload simplifies state management given the complexity of updates.
                    window.location.reload();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(`[${performance.now().toFixed(2)}] Error updating user assignment:`, xhr, status, error);
                alert('Failed to update user assignment. Please try again.');
            }
        });
    });

    $('#style-1 tbody').on('click', '.btn-cancel', function() {
        var row = $(this).closest('tr');

        // Revert to original displayed values
        row.find('.editable-role').text(row.data('original-role-text'));
        row.find('.editable-role').data('role-id', row.data('original-role-id'));
        row.find('.editable-department').text(row.data('original-department-text'));
        row.find('.editable-department').data('department-id', row.data('original-department-id'));

        // Revert to display mode
        row.find('.action-btns').show();
        row.find('.edit-btns').hide();
    });

    $('#style-1 tbody').on('click', '.btn-save-new', function() {
        var row = $(this).closest('tr');
        var userId = row.find('.new-user-id').val();
        var newDepartmentId = row.find('.department-select').val();
        var newRoleId = row.find('.role-select').val();

        // Basic validation for new assignment
        if (!userId) {
            alert('Please select a user.');
            return;
        }
        if (!newDepartmentId) {
            alert('Please select a Department.');
            return;
        }

        // If newRoleId is empty (None), set it to null for backend
        if (newRoleId === "") {
            newRoleId = null;
        }

        var postData = {
            userId: userId,
            newRoleId: newRoleId,
            newDepartmentId: newDepartmentId
        };
        console.log(`[${performance.now().toFixed(2)}] Sending data for createUserAssignment:`, postData);

        $.ajax({
            url: '<?= base_url('ma/rolesassign/createUserAssignment') ?>',
            method: 'POST',
            data: JSON.stringify(postData),
            contentType: 'application/json',
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    // Remove the temporary row before reloading to ensure DataTables refreshes correctly
                    row.remove();
                    window.location.reload(); // Reload to reflect the new assignment in the table
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(`[${performance.now().toFixed(2)}] Error creating user assignment:`, xhr, status, error);
                alert('Failed to create user assignment. Please try again.');
            }
        });
    });

    $('#style-1 tbody').on('click', '.btn-cancel-new', function() {
        var row = $(this).closest('tr');
        row.remove(); // Simply remove the temporary new row
    });

    // Removed the generic handler which was causing duplicates for new rows as well
    // $('#style-1 tbody').on('change', '.department-select', function() { /* ... */ });

</script>
<!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>