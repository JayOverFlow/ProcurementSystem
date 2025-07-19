<?= $this->extend('layouts/unassigned-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Unassigned MR</title>
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
                    <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
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
                    <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
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
                    <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
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
                    <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
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
                    <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
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
</div>
<?= $this->include('partials/general/mr'); ?>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js'); ?>"></script>
<script src="<?= base_url('assets/src/assets/js/custom.js'); ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
<script src="<?= base_url('assets/js/mr_page/mr.js') ?>"></script>
<?= $this->endSection() ?>