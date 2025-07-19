<?= $this->extend('layouts/pro-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Procurement Dashboard</title>
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

        <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="<?= base_url('assets/src/plugins/src/notification/snackbar/snackbar.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/src/assets/css/light/components/modal.css') ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/editors/quill/quill.snow.css') ?>">
    <link href="<?= base_url('assets/src/assets/css/light/apps/mailbox.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/src/assets/css/dark/components/modal.css') ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/editors/quill/quill.snow.css') ?>">
    <link href="<?= base_url('assets/src/assets/css/dark/apps/mailbox.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
    
    <!--  END CUSTOM STYLE FILE  -->

<?= $this->endSection() ?>
  

        <!--  BEGIN CONTENT AREA  -->
<?= $this->section('content') ?>
<div class="row just-content-evenly h-100 align-items-stretch">
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
                    <!-- Mail Section -->
                    <div class="col-xl-9 col-lg-6 col-md-6 col-sm-6">
                    <?= $this->include('tasks') ?>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/apex/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js') ?>"></script>

<script src="<?= base_url('assets/src/plugins/src/editors/quill/quill.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/notification/snackbar/snackbar.min.js') ?>"></script>
<script src="<?= base_url('assets/src/assets/js/apps/mailbox.js') ?>"></script>
<script src="<?= base_url('assets/js/tasks_page/tasks.js') ?>"></script>

<!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<?= $this->endSection() ?>