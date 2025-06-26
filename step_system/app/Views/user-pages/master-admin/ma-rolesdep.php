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
                            <a href="rolesdep" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
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
                            <a href="usertype" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
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
                            <a href="rolesassign"  aria-expanded="false" class="dropdown-toggle">
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
                                            <th class="text-start">Role</th>
                                            <th>Office | Department</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($rolesDepartments) && is_array($rolesDepartments)): ?>
                                            <?php foreach ($rolesDepartments as $row): ?>
                                                <tr data-role-id="<?= esc($row['role_id']) ?>" data-dep-id="<?= esc($row['dep_id']) ?>">
                                                    <td class="text-start role-name-cell" data-original-value="<?= esc($row['role_name']) ?>"><?= esc($row['role_name']) ?></td>
                                                    <td class="department-name-cell" data-original-value="<?= esc($row['dep_name']) ?>" data-original-dep-id="<?= esc($row['dep_id']) ?>"><?= esc($row['dep_name']) ?></td>
                                                    <td class="text-center action-cell">
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3" class="text-center">No roles or departments data available.</td>
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
    var departmentsData = <?= json_encode($departments) ?>;

    c1 = $('#style-1').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'<'myFilterDropdown'>><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'<'myAddButton'>f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10,
        initComplete: function () {
            var api = this.api();
            var departments = departmentsData;

            var filterHtml = `
                <label class="d-flex align-items-center">Filter:
                    <select id="departmentFilter" class="form-control form-control-sm ms-2">
                        <option value="">All Offices</option>
                        `;

            if (departments.Academic && departments.Academic.length > 0) {
                // Sort Academic departments alphabetically
                departments.Academic.sort((a, b) => a.dep_name.localeCompare(b.dep_name));
                filterHtml += `<optgroup label="Academic">`;
                departments.Academic.forEach(function(department) {
                    filterHtml += `<option value="${department.dep_name}">${department.dep_name}</option>`;
                });
                filterHtml += `</optgroup>`;
            }

            if (departments.Administrative && departments.Administrative.length > 0) {
                // Sort Administrative departments alphabetically
                departments.Administrative.sort((a, b) => a.dep_name.localeCompare(b.dep_name));
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
                api.column(1).search(val ? '^' + $.fn.dataTable.util.escapeRegex(val) + '$' : '', true, false).draw();
            });

            // Add button for new row
            var addButtonHtml = `
                <button class="btn btn-outline-secondary btn-sm ms-3" id="addRoleButton" style="box-shadow: none !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </button>
            `;
            $('.myAddButton').html(addButtonHtml);

            $('#addRoleButton').on('click', function() {
                var newRowNode = c1.row.add([
                    `<input type="text" class="form-control form-control-sm new-role-name-input" placeholder="New Role Name">`,
                    getDepartmentSelectHtml(null), // Null for no pre-selected department
                    `<div class="action-btns">
                        <a href="javascript:void(0);" class="action-btn btn-save-new bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Save New">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                        </a>
                        <a href="javascript:void(0);" class="action-btn btn-cancel-new bs-tooltip" data-toggle="tooltip" data-placement="top" title="Cancel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        </a>
                    </div>`
                ]).draw().node();
                $(newRowNode).addClass('new-row'); // Add a class to identify new rows

                // Scroll to the new row if it's not visible
                $('html, body').animate({
                    scrollTop: $(newRowNode).offset().top
                }, 500);
            });
        }
    });

    // Helper function to generate department select HTML
    function getDepartmentSelectHtml(selectedDepId) {
        var departmentSelectHtml = `<select class="form-control form-control-sm department-select">`;
        departmentSelectHtml += `<option value="">Select Department</option>`;

        if (departmentsData.Academic && departmentsData.Academic.length > 0) {
            // Sort Academic departments alphabetically
            departmentsData.Academic.sort((a, b) => a.dep_name.localeCompare(b.dep_name));
            departmentSelectHtml += `<optgroup label="Academic">`;
            departmentsData.Academic.forEach(function(department) {
                var selected = (department.dep_id == selectedDepId) ? 'selected' : '';
                departmentSelectHtml += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelectHtml += `</optgroup>`;
        }

        if (departmentsData.Administrative && departmentsData.Administrative.length > 0) {
            // Sort Administrative departments alphabetically
            departmentsData.Administrative.sort((a, b) => a.dep_name.localeCompare(b.dep_name));
            departmentSelectHtml += `<optgroup label="Administrative">`;
            departmentsData.Administrative.forEach(function(department) {
                var selected = (department.dep_id == selectedDepId) ? 'selected' : '';
                departmentSelectHtml += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelectHtml += `</optgroup>`;
        }
        departmentSelectHtml += `</select>`;
        return departmentSelectHtml;
    }

    // Handle Edit button click
    $('#style-1').on('click', '.btn-edit', function () {
        var $row = $(this).closest('tr');
        var roleId = $row.data('role-id');
        var originalRoleName = $row.find('.role-name-cell').data('original-value');
        var originalDepName = $row.find('.department-name-cell').data('original-value');
        var originalDepId = $row.find('.department-name-cell').data('original-dep-id');

        // Make Role Name editable
        $row.find('.role-name-cell').html(`<input type="text" class="form-control form-control-sm" value="${originalRoleName}">`);

        // Make Department editable as a dropdown
        $row.find('.department-name-cell').html(getDepartmentSelectHtml(originalDepId));

        // Change buttons to Save and Cancel
        $row.find('.action-cell').html(`
            <div class="action-btns">
                <a href="javascript:void(0);" class="action-btn btn-save bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Save">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                </a>
                <a href="javascript:void(0);" class="action-btn btn-cancel bs-tooltip" data-toggle="tooltip" data-placement="top" title="Cancel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                </a>
            </div>
        `);
    });

    // Handle Cancel button click (modified to handle new rows)
    $('#style-1').on('click', '.btn-cancel, .btn-cancel-new', function () {
        var $row = $(this).closest('tr');
        if ($row.hasClass('new-row')) {
            c1.row($row).remove().draw(false); // Remove new row if not saved
        } else {
            var originalRoleName = $row.find('.role-name-cell').data('original-value');
            var originalDepName = $row.find('.department-name-cell').data('original-value');

            $row.find('.role-name-cell').text(originalRoleName);
            $row.find('.department-name-cell').text(originalDepName);
            $row.find('.action-cell').html(`
                <div class="action-btns">
                    <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                    </a>
                    <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </a>
                </div>
            `);
        }
    });

    // Handle Save button click (modified to handle new rows)
    $('#style-1').on('click', '.btn-save, .btn-save-new', function () {
        var $row = $(this).closest('tr');
        var isNewRow = $row.hasClass('new-row');
        var roleId = isNewRow ? null : $row.data('role-id');
        var newRoleName = isNewRow ? $row.find('.new-role-name-input').val() : $row.find('.role-name-cell input').val();
        var newDepId = isNewRow ? $row.find('.department-select').val() : $row.find('.department-name-cell select').val();
        var newDepName = isNewRow ? $row.find('.department-select option:selected').text() : $row.find('.department-name-cell select option:selected').text(); // Get text for display

        // Basic validation
        if (!newRoleName.trim() || !newDepId) {
            alert('Role Name and Department cannot be empty.');
            return;
        }

        var url = isNewRow ? '<?= base_url('ma/rolesdep/create') ?>' : '<?= base_url('ma/rolesdep/update') ?>';
        var dataToSend = {
            role_name: newRoleName,
            dep_id: newDepId,
            '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
        };

        if (!isNewRow) {
            dataToSend.role_id = roleId;
        }

        // AJAX request to save data
        $.ajax({
            url: url,
            type: 'POST',
            data: dataToSend,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    alert(isNewRow ? 'Role added successfully!' : 'Role updated successfully!');
                    if (isNewRow) {
                        // For new row, assign the new role_id and convert to static display
                        $row.data('role-id', response.role_id); // Assuming response returns the new role_id
                        $row.removeClass('new-row');
                    }
                    // Update the row with new values
                    $row.find('.role-name-cell').text(newRoleName).data('original-value', newRoleName);
                    $row.find('.department-name-cell').text(newDepName).data('original-value', newDepName).data('original-dep-id', newDepId);

                    // Update DataTables internal data and redraw
                    var rowData = c1.row($row).data();
                    rowData[0] = newRoleName; // Assuming Role Name is the first column (index 0)
                    rowData[1] = newDepName; // Assuming Department Name is the second column (index 1)
                    c1.row($row).data(rowData).draw(false); // redraw(false) to keep current paging/sorting

                    // Revert buttons to Edit and Delete
                    $row.find('.action-cell').html(`
                        <div class="action-btns">
                            <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            </a>
                            <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </a>
                        </div>
                    `);
                } else {
                    alert('Error: ' + response.message);
                    // For new rows, if save fails, keep it editable or provide option to retry
                    if (isNewRow) {
                        // Optionally, revert the buttons to save/cancel new if error persists.
                        // Or simply leave it as is for user to correct.
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('An error occurred. Please check console for details.');
            }
        });
    });

    multiCheck(c1);

</script>
<!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>