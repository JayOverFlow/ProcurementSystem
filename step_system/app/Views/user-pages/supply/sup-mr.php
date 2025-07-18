<?= $this->extend('layouts/sup-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Supply Officer MR</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <link href="<?= base_url('assets/src/plugins/src/apex/apexcharts.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/src/assets/css/light/dashboard/dash_1.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/dashboard/dash_1.css'); ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/table/datatable/datatables.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/custom_dt_custom.css') ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/custom_dt_custom.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
        <div class="col">
            <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
                <div class="card-top-content">
                    <div class="avatar avatar-lg">
                        <img src="<?= base_url('assets/images/all.svg'); ?>" class="rounded-circle" alt="faculty icon">

                    </div>
                </div>
                <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                    <div class="card-body text-end">
                        <h5 class="card-title mb-2" style="color: #DC3545"><strong>All</strong></h5>
                        <h5 class="card-text" style="color: #515365">12</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
                <div class="card-top-content">
                    <div class="avatar avatar-lg">
                        <img src="<?= base_url('assets/images/equipment.svg'); ?>" class="rounded-circle" alt="faculty icon">

                    </div>
                </div>
                <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                    <div class="card-body text-end">
                        <h5 class="card-title mb-2" style="color: #DC3545"><strong>Equipments</strong></h5>
                        <h5 class="card-text" style="color: #515365">12</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
                <div class="card-top-content">
                    <div class="avatar avatar-lg">
                        <img src="<?= base_url('assets/images/appliances.svg'); ?>" class="rounded-circle" alt="faculty icon">

                    </div>
                </div>
                <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                    <div class="card-body text-end">
                        <h5 class="card-title mb-2" style="color: #DC3545"><strong>Appliances</strong></h5>
                        <h5 class="card-text" style="color: #515365">12</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
                <div class="card-top-content">
                    <div class="avatar avatar-lg">
                        <img src="<?= base_url('assets/images/furnishings.svg'); ?>" class="rounded-circle" alt="faculty icon">

                    </div>
                </div>
                <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                    <div class="card-body text-end">
                        <h5 class="card-title mb-2" style="color: #DC3545"><strong>Furnishings</strong></h5>
                        <h5 class="card-text" style="color: #515365">12</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
                <div class="card-top-content">
                    <div class="avatar avatar-lg">
                        <img src="<?= base_url('assets/images/materials.svg'); ?>" class="rounded-circle" alt="faculty icon">

                    </div>
                </div>
                <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                    <div class="card-body text-end">
                        <h5 class="card-title mb-2" style="color: #DC3545"><strong>Materials</strong></h5>
                        <h5 class="card-text" style="color: #515365">12</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <?= $this->include('partials/general/mr'); ?>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js'); ?>"></script>
    <script src="<?= base_url('assets/src/assets/js/custom.js'); ?>"></script>
    <script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
    <!-- <script>

        c3 = $('#style-3').DataTable({
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
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10
        });

        multiCheck(c3);
    </script>
<?= $this->endSection() ?>