<div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="<?= base_url('./index.html'); ?>">
                                <img src="<?= base_url('assets/images/logo.png'); ?>" class="navbar-logo" alt="logo">
                            </a>
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

                    <li class="menu">
                        <a href="" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <img src="<?= base_url('assets/images/icon-procurement.svg'); ?>" width="24" height="24" alt="Box">
                                <span class="ms-2">Procurement</span>
                            </div>
                        </a>
                        <ul class="dropdown-menu submenu list-untyled" id="dashboard" data-bs-parent="#accordionExample" style="min-width: 20rem;">
                            <li class="">
                                <a href="<?= base_url('unassigned/ppmp') ?>">Project Procurement Management Plan</a>
                            </li>
                            <li>
                                <a href="<?= base_url('unassigned/pr') ?>">Purchase Request</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu">
                        <a href="<?= base_url('unassigned/mr') ?>" class="dropdown-toggle">
                            <div class="">
                                <img src="<?= base_url('assets/images/icon-mr.svg') ?>" width="24" height="24" alt="Box">
                                <span class="ms-2">MR</span>
                            </div>
                        </a>
                    </li>

                </ul>
                
            </nav>
        </div>