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

<?= $this->endSection() ?>
