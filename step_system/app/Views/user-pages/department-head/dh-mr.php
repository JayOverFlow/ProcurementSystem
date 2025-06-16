<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?= base_url('assets/equation/src/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/equation/layouts/horizontal-light-menu/css/light/plugins.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/equation/layouts/horizontal-light-menu/css/dark/plugins.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?= base_url('assets/equation/src/plugins/src/apex/apexcharts.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/equation/src/assets/css/light/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/equation/src/assets/css/dark/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/equation/src/plugins/src/table/datatable/datatables.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/equation/src/plugins/css/light/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/equation/src/plugins/css/light/table/datatable/custom_dt_custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/equation/src/plugins/css/dark/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/equation/src/plugins/css/dark/table/datatable/custom_dt_custom.css') ?>">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

</head>
<body class="layout-boxed enable-secondaryNav">
<!-- BEGIN LOADER -->
<!--<div id="load_screen"> <div class="loader"> <div class="loader-content">-->
<!--            <div class="spinner-grow align-self-center"></div>-->
<!--        </div></div></div>-->
<!--  END LOADER -->

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
                                <img src="<?= base_url('assets/equation/src/assets/img/profile-16.jpeg') ?>" class="img-fluid me-2" alt="avatar">
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
                                <img src="<?= base_url('assets/equation/src/assets/img/profile-15.jpeg') ?>" alt="avatar">
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

    <div class="overlay"></div>
    <div class="search-overlay"></div>

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
                    <a href="dh-dashboard" aria-expanded="true" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span style="color: white">Dashboard</span>
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
                    <a href="#apps" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <img src="<?= base_url('assets/images/icon-procurement.svg') ?>" class="navbar-logo" alt="logo">
                            <span>Procurement</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                    <ul class="dropdown-menu submenu list-unstyled" id="apps" data-bs-parent="#accordionExample">
                        <li>
                            <a href="./app-calendar.html"> Calendar </a>
                        </li>
                        <li>
                            <a href="./app-chat.html"> Chat </a>
                        </li>
                        <li>
                            <a href="./app-mailbox.html"> Mailbox </a>
                        </li>
                        <li>
                            <a href="./app-todoList.html"> Todo List </a>
                        </li>
                        <li>
                            <a href="./app-notes.html"> Notes </a>
                        </li>
                        <li>
                            <a href="./app-scrumboard.html"> Scrumboard </a>
                        </li>
                        <li>
                            <a href="./app-contacts.html"> Contacts </a>
                        </li>
                        <li class="sub-submenu dropend">
                            <a href="#invoice" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed">Invoice <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="dropdown-menu list-unstyled sub-submenu" id="invoice">
                                <li>
                                    <a href="./app-invoice-list.html"> List </a>
                                </li>
                                <li>
                                    <a href="./app-invoice-preview.html"> Preview </a>
                                </li>
                                <li>
                                    <a href="./app-invoice-add.html"> Add </a>
                                </li>
                                <li>
                                    <a href="./app-invoice-edit.html"> Edit </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-submenu dropend">
                            <a href="#ecommerce" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed">Ecommerce <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="dropdown-menu list-unstyled sub-submenu" id="ecommerce" data-bs-parent="#apps">
                                <li>
                                    <a href="./app-ecommerce-product-shop.html"> Shop </a>
                                </li>
                                <li>
                                    <a href="./app-ecommerce-product.html"> Product </a>
                                </li>
                                <li>
                                    <a href="./app-ecommerce-product-list.html"> List </a>
                                </li>
                                <li>
                                    <a href="./app-ecommerce-product-add.html"> Create </a>
                                </li>
                                <li>
                                    <a href="./app-ecommerce-product-edit.html"> Edit </a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-submenu dropend">
                            <a href="#blog" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle collapsed">Blog <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                            <ul class="dropdown-menu list-unstyled sub-submenu" id="blog" data-bs-parent="#apps">
                                <li>
                                    <a href="./app-blog-grid.html"> Grid </a>
                                </li>
                                <li>
                                    <a href="./app-blog-list.html"> List </a>
                                </li>
                                <li>
                                    <a href="./app-blog-post.html"> Post </a>
                                </li>
                                <li>
                                    <a href="./app-blog-create.html"> Create </a>
                                </li>
                                <li>
                                    <a href="./app-blog-edit.html"> Edit </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu menu-heading">
                    <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>USER INTERFACE</span></div>
                </li>

                <li class="menu">
                    <a href="#components" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                        <img src="<?= base_url('assets/images/icon-tasks.svg') ?>" class="navbar-logo" alt="logo">
                        <span>Task</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="dh-mr" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                        <img src="<?= base_url('assets/images/icon-mr.svg') ?>" class="navbar-logo" alt="logo">
                        <span>MR</span>
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

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="middle-content container-xxl p-0">
                <!-- Main Row -->
                <div class="row layout-top-spacing">
                    <!-- Stepper Column -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                        <div class="widget widget-activity-five">
                            <div class="widget-heading">
                                <h5 class="">Procurement Status</h5>

                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">View All</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Mark as Read</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content">
                                <div class="w-shadow-top"></div>

                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Procurement Project Management Plan (PPMP) <span>Description</span></a></h5>
                                                </div>
                                                <p>07 May, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Annual Procurement Plan (APP) <br><span>Description</span></h5>
                                                </div>
                                                <p>06 May, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Purchase Request (PR) <br> <span>Description</span></h5>
                                                </div>
                                                <p>01 May, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Purchase Order (PR)<br> <span>Description</span></a></h5>
                                                </div>
                                                <p>30 Apr, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Bidding <br> <span>Description</span></h5>
                                                    <span class=""></span>
                                                </div>
                                                <p>25 Apr, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Delivery <br> <span>Description</span></h5>
                                                    <span class=""></span>
                                                </div>
                                                <p>10 Apr, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Inventory Custodian Slip (ICS) <br> <span>Description</span></h5>
                                                    <span class=""></span>
                                                </div>
                                                <p>10 Apr, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Property Acknowledgement Request (PAR) <br> <span>Description</span></h5>
                                                    <span class=""></span>
                                                </div>
                                                <p>10 Apr, 2024</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-shadow-bottom"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Cards Column -->
                    <div class="col-xl-9 col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <!-- Card 1 -->
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                <div class="widget widget-t-sales-widget widget-m-orders">
                                    <div class="media">
                                            <img src="<?= base_url('assets/images/icon-faculty.svg') ?>" class="navbar-logo" alt="logo">
                                        <div class="media-body">
                                            <p class="widget-text">Faculty</p>
                                            <p class="widget-numeric-value">1,560</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                <div class="widget widget-t-sales-widget widget-m-customers">
                                    <div class="media">
                                    <img src="<?= base_url('assets/images/icon-staff.svg') ?>" class="navbar-logo" alt="logo">
                                        <div class="media-body">
                                            <p class="widget-text">Staff</p>
                                            <p class="widget-numeric-value">1,900</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                <div class="widget widget-t-sales-widget widget-m-income">
                                    <div class="media">
                                    <img src="<?= base_url('assets/images/icon-budget.svg') ?>" class="navbar-logo" alt="logo">
                                        <div class="media-body">
                                            <p class="widget-text">Budget</p>
                                            <p class="widget-numeric-value">1,390</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Style 3 Table Section Start -->
                        <!-- <div class="row mt-4">
                            <div class="col-lg-12">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-content widget-content-area">
                                        <table id="style-3" class="table style-3 dt-table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="checkbox-column text-center"> TUPT-ID </th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Email</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="checkbox-column text-center"> 20-2321 </td>
                                                    <td>Patrick Justin</td>
                                                    <td>Ariado</td>
                                                    <td>patrickjustin.ariado@tup.edu.ph</td>
                                                    <td class="text-center"><span class="shadow-none badge badge-danger">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="checkbox-column text-center"> 20-2321 </td>
                                                    <td>Patrick Justin</td>
                                                    <td>Ariado</td>
                                                    <td>patrickjustin.ariado@tup.edu.ph</td>
                                                    <td class="text-center"><span class="shadow-none badge badge-danger">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="checkbox-column text-center"> 20-2321 </td>
                                                    <td>Patrick Justin</td>
                                                    <td>Ariado</td>
                                                    <td>patrickjustin.ariado@tup.edu.ph</td>
                                                    <td class="text-center"><span class="shadow-none badge badge-danger">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="checkbox-column text-center"> 20-2321 </td>
                                                    <td>Patrick Justin</td>
                                                    <td>Ariado</td>
                                                    <td>patrickjustin.ariado@tup.edu.ph</td>
                                                    <td class="text-center"><span class="shadow-none badge badge-danger">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="checkbox-column text-center"> 20-2321 </td>
                                                    <td>Patrick Justin</td>
                                                    <td>Ariado</td>
                                                    <td>patrickjustin.ariado@tup.edu.ph</td>
                                                    <td class="text-center"><span class="shadow-none badge badge-danger">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="checkbox-column text-center"> 20-2321 </td>
                                                    <td>Patrick Justin</td>
                                                    <td>Ariado</td>
                                                    <td>patrickjustin.ariado@tup.edu.ph</td>
                                                    <td class="text-center"><span class="shadow-none badge badge-danger">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="checkbox-column text-center"> 20-2321 </td>
                                                    <td>Patrick Justin</td>
                                                    <td>Ariado</td>
                                                    <td>patrickjustin.ariado@tup.edu.ph</td>
                                                    <td class="text-center"><span class="shadow-none badge badge-danger">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="checkbox-column text-center"> 20-2321 </td>
                                                    <td>Patrick Justin</td>
                                                    <td>Ariado</td>
                                                    <td>patrickjustin.ariado@tup.edu.ph</td>
                                                    <td class="text-center"><span class="shadow-none badge badge-danger">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="checkbox-column text-center"> 20-2321 </td>
                                                    <td>Patrick Justin</td>
                                                    <td>Ariado</td>
                                                    <td>patrickjustin.ariado@tup.edu.ph</td>
                                                    <td class="text-center"><span class="shadow-none badge badge-danger">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="checkbox-column text-center"> 20-2321 </td>
                                                    <td>Patrick Justin</td>
                                                    <td>Ariado</td>
                                                    <td>patrickjustin.ariado@tup.edu.ph</td>
                                                    <td class="text-center"><span class="shadow-none badge badge-danger">Approved</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="checkbox-column text-center"> 20-2321 </td>
                                                    <td>Patrick Justin</td>
                                                    <td>Ariado</td>
                                                    <td>patrickjustin.ariado@tup.edu.ph</td>
                                                    <td class="text-center"><span class="shadow-none badge badge-danger">Approved</span></td>
                                                </tr>
                                                

                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- Style 3 Table Section End -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?= base_url('assets/equation/src/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/equation/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
<script src="<?= base_url('assets/equation/layouts/horizontal-light-menu/app.js') ?>"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="<?= base_url('assets/equation/src/plugins/src/apex/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/equation/src/assets/js/dashboard/dash_1.js') ?>"></script>
<!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS FOR TABLE-->
<script src="<?= base_url('assets/equation/src/plugins/src/global/vendors.min.js') ?>"></script>
<script src="<?= base_url('assets/equation/src/plugins/src/mousetrap/mousetrap.min.js') ?>"></script>
<script src="<?= base_url('assets/equation/src/plugins/src/waves/waves.min.js') ?>"></script>
<script src="<?= base_url('assets/equation/layouts/horizontal-light-menu/app.js') ?>"></script>
<script src="<?= base_url('assets/equation/src/assets/js/custom.js') ?>"></script>
<!-- END GLOBAL MANDATORY SCRIPTS FOR TABLE -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url('assets/equation/src/plugins/src/table/datatable/datatables.js') ?>"></script>
<script>
    $(document).ready(function() {
        c3 = $('#style-3').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                "<'table-responsive'tr>" +
                "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'>",
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Section :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10,
            "ordering": true,
            "responsive": true,
            "processing": true,
            "language": {
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                "emptyTable": "No data available in table"
            }
        });

        // custom styling for DataTables elements
        $('.dt--top-section').addClass('mb-3');
        $('.dt--top-section .l').addClass('dt-length');
        $('.dt--top-section .f').addClass('dt-search');
        $('.dt--top-section .dt-length select').addClass('form-control');
        $('.dt--top-section .dt-search input').addClass('form-control');

        // custom styling for length menu
        $('.dt-length').css({
            'display': 'flex',
            'align-items': 'center',
            'gap': '10px'
        });
        $('.dt-length label').css({
            'margin-bottom': '0',
            'white-space': 'nowrap'
        });
    });
</script>
<!-- END PAGE LEVEL SCRIPTS -->

</body>

</html>