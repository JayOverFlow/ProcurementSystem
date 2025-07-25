<?= $this->extend('layouts/head-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Head Dashboard</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?= base_url('assets/src/plugins/src/apex/apexcharts.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/src/assets/css/light/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES / FOR DATA TABLES-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/table/datatable/datatables.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/custom_dt_custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/custom_dt_custom.css') ?>">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

<?= $this->endSection() ?>
  

        <!--  BEGIN CONTENT AREA  -->
<?= $this->section('content') ?>
<div class="row just-content-evenly h-100 align-items-stretch">
                    <!-- Stepper Column -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                        <div class="widget widget-activity-five">
                            <div class="widget-heading">
                                <h5 style="color: #8C0404">Procurement Status</h5>

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
                        <div class="row mt-4">
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
                        </div>
                        <!-- Style 3 Table Section End -->
                    </div>
    <div class="col-xxl-3 col-lg-3 col-md-12 col-sm-12 col-12 d-flex flex-column">
        <div class="widget widget-activity-five h-100 d-flex flex-column">
            <div class="widget-heading ms-3 pb-0">
                <h4 class="text-center fw-bold" style="color: #DC3545">Procurement Status</h4>
            </div>
            <div class="widget-content">
                <div class="w-shadow-top"></div>
                <div class="mt-container mx-auto h-100">
                    <div class="timeline-line" id="stepper-timeline">
                        <!-- Stepper items will be dynamically loaded here -->
                    </div>
                </div>
                <div class="w-shadow-bottom"></div>
            </div>
        </div>
    </div>

                    <!-- Right Side Container: Cards (Row 1) + Data Table (Row 2) -->
    <div class="col-xxl-9 col-lg-9 col-md-12 col-sm-12 col-12 d-flex flex-column h-100">
        <!-- Row 1: Three Cards -->
        <div class="row flex-grow-1">
            <!-- Faculty Members Card -->
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
                    <div class="card-top-content">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
                        </div>
                    </div>
                    <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                        <div class="card-body text-end">
                            <h5 class="card-title mb-2" style="color: #DC3545"><strong>Faculty Members</strong></h5>
                            <h5 class="card-text" style="color: #515365"><?= esc($dashboard_data['faculty_count']) ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Staff Card -->
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
                    <div class="card-top-content">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/images/icon-staff.svg'); ?>" class="rounded-circle" alt="faculty icon">
                        </div>
                    </div>
                    <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                        <div class="card-body text-end">
                            <h5 class="card-title mb-2" style="color: #DC3545"><strong>Staff</strong></h5>
                            <h5 class="card-text" style="color: #515365"><?= esc($dashboard_data['staff_count']) ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Department Budget Card -->
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
                    <div class="card-top-content">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/images/icon-budget.svg'); ?>" class="rounded-circle" alt="faculty icon">
                        </div>
                    </div>
                    <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                        <div class="card-body text-end">
                            <h5 class="card-title mb-2" style="color: #DC3545"><strong>Department Budget</strong></h5>
                            <h5 class="card-text" style="color: #515365">₱<?= esc($dashboard_data['department_budget']['bud_total'] ?? '0.00') ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row 2: Data Table -->
        <div class="row flex-grow-1 mt-4">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="statbox widget box box-shadow h-100">
                    <div class="widget-content widget-content-area h-100">
                        <table id="style-3" class="table style-3 dt-table-hover">
                            <thead>
                                <tr>
                                    <th class="checkbox-column text-center">TUP-T ID</th>
                                    <th class="text-center">First Name</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center dt-no-sorting">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($dashboard_data['subordinates'])): ?>
                                    <tr>
                                    <td colspan="5" class="text-center">Nothing to see here.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($dashboard_data['subordinates'] as $subordinate): ?>
                                        <tr>
                                            <td class="checkbox-column text-center"><?= esc($subordinate['user_tupid'] ?? 'Unknown') ?></td>
                                            <td class="text-center"><?= esc($subordinate['user_firstname']) ?></td>
                                            <td class="text-center"><?= esc($subordinate['user_lastname']) ?></td>
                                            <td class="text-center">
                                                    <span class="badge outline-badge-dark mb-1 me-1">Not Assigned</span>
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-danger mb-1 me-1">Assign</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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

    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('js') ?>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="<?= base_url('assets/src/plugins/src/apex/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js') ?>"></script>
<!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>

<script>

    c3 = $('#style-3').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10
    });

    multiCheck(c3);

    // Function to fetch and render stepper status
    function fetchAndRenderStepper(departmentId) {
        fetch(`<?= base_url('stepper/stepper-status/') ?>${departmentId}`)
            .then(response => response.json())
            .then(data => {
                const timeline = document.getElementById('stepper-timeline');
                timeline.innerHTML = ''; // Clear existing content

                data.forEach(phase => {
                    const itemTimeline = document.createElement('div');
                    itemTimeline.classList.add('item-timeline', 'timeline-new');

                    itemTimeline.innerHTML = `
                        <div class="t-dot">
                            <div class="${phase.icon_class}" style="background-color: ${phase.icon_class === 't-secondary' ? '#6c757d' : (phase.icon_class === 't-warning' ? '#ffc107' : '')}; box-shadow: 0 10px 20px -8px ${phase.icon_class === 't-secondary' ? '#6c757d' : (phase.icon_class === 't-warning' ? '#ffc107' : '')};">${phase.icon}</div>
                        </div>
                        <div class="t-content">
                            <div class="t-uppercontent">
                                <h5>${phase.display_name} <a href="#" class="${phase.text_color} description-link" data-bs-toggle="modal" data-bs-target="#stepperDetailModal" data-phase="${phase.phase}" data-status="${phase.status}" data-remark="${phase.remark}" data-updated-at="${phase.updated_at}">Description</a></h5>
                            </div>
                            <p>${(phase.status === 'completed' || phase.status === 'rejected') && phase.updated_at ? new Date(phase.updated_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) : ''}</p>
                        </div>
                    `;
                    timeline.appendChild(itemTimeline);
                });

                // Attach event listeners to description links after rendering
                document.querySelectorAll('.description-link').forEach(link => {
                    link.addEventListener('click', function() {
                        const phase = this.getAttribute('data-phase');
                        const status = this.getAttribute('data-status');
                        const remark = this.getAttribute('data-remark');
                        const updatedAt = this.getAttribute('data-updated-at');

                        document.getElementById('modalStepperPhase').textContent = phase;
                        document.getElementById('modalStepperStatus').textContent = `Status: ${status}`;
                        document.getElementById('modalStepperRemark').textContent = `Remark: ${remark}`;
                        document.getElementById('modalStepperUpdatedAt').textContent = `Last Updated: ${updatedAt ? new Date(updatedAt).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' }) : 'N/A'}`;
                    });
                });
            })
            .catch(error => console.error('Error fetching stepper status:', error));
    }

    // Call the function with a placeholder department ID (e.g., 1 for testing)
    // You need to replace '1' with the actual department ID of the logged-in user.
    // This ID should be passed from the backend PHP to the JavaScript.
    // For example: fetchAndRenderStepper(<?= $user_department_id ?>);
    // For now, using a static ID for demonstration purposes.

    // Assuming you have the user's department ID available in a PHP variable, e.g., $user_department_id
    // Replace `null` with the actual PHP variable that holds the department ID.
    const userDepartmentId = <?php echo esc($user_department_id ?? 'null'); ?>;

    if (userDepartmentId !== null) {
        fetchAndRenderStepper(userDepartmentId);
    } else {
        console.error('User department ID is not available.');
    }

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

<!-- Stepper Detail Modal -->
<div class="modal fade" id="stepperDetailModal" tabindex="-1" role="dialog" aria-labelledby="stepperDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalStepperPhase"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modalStepperStatus"></p>
                <p id="modalStepperRemark"></p>
                <p id="modalStepperUpdatedAt"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>
