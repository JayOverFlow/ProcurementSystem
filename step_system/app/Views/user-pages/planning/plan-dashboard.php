<?= $this->extend('layouts/plan-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Planning Dashboard</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <link href="<?= base_url('assets/src/plugins/src/apex/apexcharts.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/src/assets/css/light/dashboard/dash_1.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/dashboard/dash_1.css'); ?>" rel="stylesheet" type="text/css" />

<!-- For Data Tables -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/table/datatable/datatables.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/dt-global_style.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/custom_dt_custom.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/dt-global_style.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/custom_dt_custom.css'); ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row just-content-evenly h-100 align-items-stretch">
    <!-- Stepper -->
    <div class="col-xxl-3 col-lg-3 col-md-12 col-sm-12 col-12 d-flex flex-column">
        <div class="widget widget-activity-five h-100 d-flex flex-column">

            <div class="widget-heading ms-3 pb-0">
                <h4 class="text-center fw-bold" style="color: #DC3545">Procurement Status</h4>
                                </div>

                                <div class="widget-content">
                                    <div class="w-shadow-top"></div>

                <div class="mt-container mx-auto h-100">
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
                            <h5 class="card-text" style="color: #515365">12</h5>
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
                            <h5 class="card-text" style="color: #515365">12</h5>
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
                            <h5 class="card-title mb-2" style="color: #DC3545"><strong>Office Budget</strong></h5>
                            <h5 class="card-text" style="color: #515365">12</h5>
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
                                    <th class="text-center">TUP-Id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">TUP-001</td>
                                    <td>Donna</td>
                                    <td>Rogers</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm" style="background-color: #DC3545; border-color: #DC3545; color: white;">Approved</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">TUP-002</td>
                                    <td>Andy</td>
                                    <td>King</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm" style="background-color: #DC3545; border-color: #DC3545; color: white;">Approved</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">TUP-003</td>
                                    <td>Alma</td>
                                    <td>Clarke</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm" style="background-color: #DC3545; border-color: #DC3545; color: white;">Approved</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">TUP-004</td>
                                    <td>Vincent</td>
                                    <td>Carpenter</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm" style="background-color: #DC3545; border-color: #DC3545; color: white;">Approved</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">TUP-005</td>
                                    <td>Kristen</td>
                                    <td>Beck</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm" style="background-color: #DC3545; border-color: #DC3545; color: white;">Approved</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">TUP-006</td>
                                    <td>Oscar</td>
                                    <td>Garner</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm" style="background-color: #DC3545; border-color: #DC3545; color: white;">Approved</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center">TUP-007</td>
                                    <td>Nia</td>
                                    <td>Hillyer</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm" style="background-color: #DC3545; border-color: #DC3545; color: white;">Approved</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js'); ?>"></script>

<!-- For Data Table -->
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js'); ?>"></script>
<script src="<?= base_url('assets/src/assets/js/custom.js'); ?>"></script>
<script>
    // var e;
    c1 = $('#style-1').DataTable({
        headerCallback:function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML=`
            <div class="form-check form-check-primary d-block">
                <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
            </div>`
        },
        columnDefs:[ {
            targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                return `
                <div class="form-check form-check-primary d-block">
                    <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                </div>`
            }
        }],
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
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
        "pageLength": 10
    });

    multiCheck(c1);

    c2 = $('#style-2').DataTable({
        headerCallback:function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML=`
            <div class="form-check form-check-primary d-block new-control">
                <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
            </div>`
        },
        columnDefs:[ {
            targets:0, width:"30px", className:"", orderable:!1, render:function(e, a, t, n) {
                return `
                <div class="form-check form-check-primary d-block new-control">
                    <input class="form-check-input child-chk" type="checkbox" id="form-check-default">
                </div>`
            }
        }],
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
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
        "pageLength": 10 
    });

    multiCheck(c2);

    c3 = $('#style-3').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'<'category-filter-container'>><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
        },
        "stripeClasses": [],
        "pageLength": 10
    });

    $('#style-3_wrapper .category-filter-container').html(`
        <select class="form-select" id="category-select">
            <option value="" selected disabled>Category</option>
            <option value="all">All</option>
            <option value="faculty">Faculty</option>
            <option value="staff">Staff</option>
        </select>
    `);

    // Set dropdown height to match search bar
    var searchInput = $('#style-3_filter input[type="search"]');
    var categorySelect = $('#category-select');
    if (searchInput.length && categorySelect.length) {
        categorySelect.css({
            'padding-top': searchInput.css('padding-top'),
            'padding-bottom': searchInput.css('padding-bottom'),
            'width': 'auto',
            'min-width': '150px',
            'font-size': searchInput.css('font-size')
        });
    }

    multiCheck(c3);
</script>

<?= $this->endSection() ?>