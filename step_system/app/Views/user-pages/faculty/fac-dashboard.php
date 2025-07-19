<?= $this->extend('layouts/fac-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Faculty Dashboard</title>
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
        <div class="row layout-spacing mt-4">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <table id="style-3" class="table style-3 dt-table-hover">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column text-center"> MR-Id </th>
                                        <th>Item Name</th>
                                        <th>Location</th>
                                        <th>Date Received</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($mr_items)): ?>
                                        <?php foreach ($mr_items as $item): ?>
                                            <tr>
                                                <td class="checkbox-column text-center"> <?= esc($item['mr_id']) ?> </td>
                                                <td><?= esc($item['item_name']) ?></td>
                                                <td><?= esc($item['mr_location']) ?></td>
                                                <td><?= esc($item['mr_date_received']) ?></td>
                                                <td class="text-center"><?= esc($item['mr_item_quantity']) ?>x</td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                    </ul>
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
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js'); ?>"></script>

<!-- For Data Table -->
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js'); ?>"></script>
<script src="<?= base_url('assets/src/assets/js/custom.js'); ?>"></script>
<script src="<?= base_url('assets/js/mr_page/mr.js') ?>"></script>

            

<?= $this->endSection() ?>