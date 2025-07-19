
<?php
$current_path = uri_string();
$procurement_pages = ['supply/ppmp', 'supply/ics', 'supply/par', 'supply/su'];
$is_procurement_page = in_array($current_path, $procurement_pages);
?>
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
                <a href="<?= base_url('supply/dashboard') ?>"
                   class="dropdown-toggle <?= ($current_path === 'supply/dashboard' || $current_path === 'supply') ? 'active text-white fw-bold shadow-text' : '' ?>">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span class="shadow-text">Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#procurement"
                   data-bs-toggle="collapse"
                   aria-expanded="<?= $is_procurement_page ? 'true' : 'false' ?>"
                   class="dropdown-toggle <?= $is_procurement_page ? 'active text-white fw-bold shadow-text ' : '' ?>">
                    <div>
                        <img src="<?= base_url('assets/images/icon-procurement.svg'); ?>" width="24" height="24" alt="Box">
                        <span class="ms-2 shadow-text">Procurement</span>
                    </div>
                </a>

                <ul class="collapse submenu list-unstyled <?= $is_procurement_page ? 'show' : '' ?>" id="procurement" data-bs-parent="#accordionExample" style="min-width: 20rem;">
                    <li>
                        <a href="<?= base_url('/ppmp/create') ?>"
                           class="<?= $current_path === '/ppmp/create' ? 'active text-primary fw-bold' : '' ?>">
                            Project Procurement Management Plan
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('supply/pr') ?>"
                           class="<?= $current_path === 'supply/pr' ? 'active text-primary fw-bold' : '' ?>">
                           Purchase Request
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('supply/ics') ?>"
                           class="<?= $current_path === 'supply/pr' ? 'active text-primary fw-bold' : '' ?>">
                           Inventory Custodian Slip
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('supply/par') ?>"
                           class="<?= $current_path === 'supply/app' ? 'active text-primary fw-bold' : '' ?>">
                           Property Acknowledgment Receipt
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('supply/su') ?>"
                           class="<?= $current_path === 'supply/su' ? 'active text-primary fw-bold' : '' ?>">
                           Status Update
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('supply/inventory') ?>">Inventory</a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="<?= base_url('/tasks') ?>"
                   class="dropdown-toggle <?= $current_path === '/tasks' ? 'active text-white fw-bold shadow-text' : '' ?>">
                    <div>
                        <img src="<?= base_url('assets/images/icon-tasks.svg') ?>" width="24" height="24" alt="checklist">
                        <span class="ms-2 shadow-text">Tasks</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="<?= base_url('supply/mr') ?>"
                   class="dropdown-toggle <?= $current_path === 'supply/mr' ? 'active text-white fw-bold shadow-text' : '' ?>">
                    <div>
                        <img src="<?= base_url('assets/images/icon-mr.svg') ?>" width="24" height="24" alt="Box">
                        <span class="ms-2 shadow-text">MR</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</div>