<style>
    .sidebar-wrapper .submenu {
        /* Set a max-width to prevent the dropdown from becoming too wide,
           while min-width ensures it's at least as wide as the parent. */
        min-width: 100%;
        max-width: 280px; /* Adjust this value as needed */
    }
    .sidebar-wrapper .submenu a {
        /* Allow text to wrap, overriding any theme styles that prevent it. */
        white-space: normal !important;
        word-wrap: break-word;
    }
</style>
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
                <a href="<?= base_url('supply/dashboard') ?>" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#apps" data-bs-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <img src="<?= base_url('assets/images/icon-procurement.svg'); ?>" width="24" height="24" alt="Box">
                        <span class="ms-2">Procurement</span>
                    </div>
                </a>
                <ul class="dropdown-menu submenu list-unstyled" id="dashboard" data-bs-parent="#accordionExample" style="min-width: 20rem;">
                    <li class="">
                        <a href="<?= base_url('supply/ppmp') ?>">Project Procurement Management Plan</a>
                    </li>
                    <li>
                        <a href="<?= base_url('supply/ics') ?>">Inventory Custodian Slip</a>
                    </li>
                    <li>
                        <a href="<?= base_url('supply/par') ?>">Property Acknowledgment Receipt</a>
                    </li>
                    <li>
                        <a href="<?= base_url('supply/su') ?>">Status Update</a>
                    </li>
                    <li>
                        <a href="<?= base_url('supply/inventory') ?>">Inventory</a>
                    </li>
                </ul>
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>USER INTERFACE</span></div>
            </li>

            <li class="menu">
                <a href="<?= base_url('supply/tasks') ?>" class="dropdown-toggle">
                    <div class="">
                        <img src="<?= base_url('assets/images/icon-tasks.svg') ?>" width="24" height="24" alt="checklist">
                        <span class="ms-2">Tasks</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="<?= base_url('supply/mr') ?>" class="dropdown-toggle">
                    <div class="">
                        <img src="<?= base_url('assets/images/icon-mr.svg') ?>" width="24" height="24" alt="Box">
                        <span class="ms-2">MR</span>
                    </div>
                </a>
            </li>

        </ul>

    </nav>
</div>