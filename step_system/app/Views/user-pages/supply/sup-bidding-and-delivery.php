<?= $this->extend('user-pages/supply/layout/sup-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Supply Bidding & Delivery</title>
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
    <div class="row layout-spacing mt-4">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <table id="style-3" class="table style-3 dt-table-hover">
                        <thead>
                        <tr>
                            <th class="checkbox-column text-center"> PO-Id </th>
                            <th>Requested by</th>
                            <th>Bidding Status</th>
                            <th>Delivery Status</th>
                            <th>Date Received</th>
                            <th class="text-center dt-no-sorting">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="checkbox-column text-center"> 011111 </td>
                            <td>Paityn Vetrovs</td>
                            <td>
                                <div class="btn-group  mb-2 me-4 " role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle " style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1 "></i>For Bidding</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1 "></i>Bid</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-bell-fill-2 mr-1"></i>Rejected</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group  mb-2 me-4" role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle" style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1"></i>For Delivery</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1"></i>Delivered</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">N/A</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="checkbox-column text-center"> 011112 </td>
                            <td>Ruben Herwitz</td>
                            <td>
                                <div class="btn-group  mb-2 me-4 " role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle " style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1 "></i>For Bidding</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1 "></i>Bid</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-bell-fill-2 mr-1"></i>Rejected</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group  mb-2 me-4" role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle" style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1"></i>For Delivery</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1"></i>Delivered</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">August 23, 2023</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="checkbox-column text-center"> 011113 </td>
                            <td>Phillip Baptista</td>
                            <td>
                                <div class="btn-group  mb-2 me-4 " role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle " style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1 "></i>For Bidding</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1 "></i>Bid</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-bell-fill-2 mr-1"></i>Rejected</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group  mb-2 me-4" role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle" style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1"></i>For Delivery</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1"></i>Delivered</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">August 23, 2023</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="checkbox-column text-center"> 011114 </td>
                            <td>Omar Carder</td>
                            <td>
                                <div class="btn-group  mb-2 me-4 " role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle " style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1 "></i>For Bidding</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1 "></i>Bid</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-bell-fill-2 mr-1"></i>Rejected</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group  mb-2 me-4" role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle" style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1"></i>For Delivery</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1"></i>Delivered</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">N/A</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="checkbox-column text-center"> 011115 </td>
                            <td>Roger Rhiel Madsen</td>
                            <td>
                                <div class="btn-group  mb-2 me-4 " role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle " style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1 "></i>For Bidding</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1 "></i>Bid</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-bell-fill-2 mr-1"></i>Rejected</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group  mb-2 me-4" role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle" style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1"></i>For Delivery</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1"></i>Delivered</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">N/A</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="checkbox-column text-center"> 011116 </td>
                            <td>Cristofer Geidt</td>
                            <td>
                                <div class="btn-group px-10  mb-2 me-4 " role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle " style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1 "></i>For Bidding</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1 "></i>Bid</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-bell-fill-2 mr-1"></i>Rejected</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group  mb-2 me-4" role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle" style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1"></i>For Delivery</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1"></i>Delivered</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">N/A</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="checkbox-column text-center"> 011117 </td>
                            <td>Madelyn Culhane</td>
                            <td>
                                <div class="btn-group  mb-2 me-4 " role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle " style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1 "></i>For Bidding</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1 "></i>Bid</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-bell-fill-2 mr-1"></i>Rejected</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group  mb-2 me-4" role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle" style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1"></i>For Delivery</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1"></i>Delivered</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">N/A</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="checkbox-column text-center"> 011118 </td>
                            <td>Kaylynn Dorwart</td>
                            <td>
                                <div class="btn-group  mb-2 me-4 " role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle " style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1 "></i>For Bidding</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1 "></i>Bid</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-bell-fill-2 mr-1"></i>Rejected</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group  mb-2 me-4" role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle" style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1"></i>For Delivery</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1"></i>Delivered</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">N/A</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td class="checkbox-column text-center"> 011117 </td>
                            <td>Angel Phillips</td>
                            <td>
                                <div class="btn-group  mb-2 me-4 " role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle " style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1 "></i>For Bidding</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1 "></i>Bid</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-bell-fill-2 mr-1"></i>Rejected</a>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group  mb-2 me-4" role="group">
                                    <button id="outlineDropdown7" type="button" class="btn btn-outline-dark dropdown-toggle" style="padding-left:100px ; padding-right: 100px " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Status <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                    <div class="dropdown-menu" aria-labelledby="outlineDropdown7">
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-home-fill-1 mr-1"></i>For Delivery</a>
                                        <a href="javascript:void(0);" class="dropdown-item" style="padding-left:20px ; padding-right: 160px "><i class="flaticon-gear-fill mr-1"></i>Delivered</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">N/A</td>
                            <td class="text-center">
                                <ul class="table-controls">
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                    <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js'); ?>"></script>
    <script src="<?= base_url('assets/src/assets/js/custom.js'); ?>"></script>
    <script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
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