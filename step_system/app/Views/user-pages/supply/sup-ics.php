<?= $this->extend('layouts/sup-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Supply Inventory Custodian Slip </title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <link href="<?= base_url('assets/src/assets/css/light/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/src/assets/css/dark/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="doc-container">

                <div class="row">
                    <div class="col-xl-9">

                        <div class="invoice-content">

                            <div class="invoice-detail-body">

                                <div class="invoice-detail-title d-flex flex-column text-start mb-0">
                                    <div>
                                        <h2 class="fw-bold" style="color: #C62742">Inventory Custodian Slip</h2>
                                    </div>
                                    <div class="d-flex justify-content-start gap-3">
                                        <p class="col-auto text-start mb-0">FM-PR-007</p>
                                        <p class="col-auto text-start mb-0">REV 0</p>
                                        <p class="col-auto text-start mb-0">09NOV2016</p>
                                    </div>
                                </div>

                                <hr class="my-5">

                                <div class="invoice-detail-header">

                                    <div class="row justify-content-between">
                                        <div class="col-xl-5 invoice-address-company">

                                            <div class="invoice-address-company-fields">

                                                <div class="form-group row">
                                                    <label for="office" class="col-sm-1 col-form-label col-form-label-sm">Fund Cluster</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="office" name="office">
                                                    </div>
                                                    <label for="office" class="col-sm-1 col-form-label col-form-label-sm">P.O. NO.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="office" name="office">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 invoice-address-company">

                                            <div class="invoice-address-company-fields">

                                                <div class="form-group row">
                                                    <label for="office" class="col-sm-1 col-form-label col-form-label-sm">PAR No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="office" name="office">
                                                    </div>
                                                    <label for="office" class="col-sm-1 col-form-label col-form-label-sm">Code No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="office" name="office">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="invoice-detail-items pt-3">

                                            <div class="table-responsive">
                                                <table class="table item-table">
                                                    <thead>
                                                    <tr>
                                                        <th class="col-1 text-center">Qyt.</th>
                                                        <th class="col-1 text-center">Unit</th>
                                                        <th class="col-1 text-center">Unit Cost</th>
                                                        <th class="col-1 text-center">Total Cost</th>
                                                        <th class="col-4 text-center">Description</th>
                                                        <th class="col-1 text-center">Inventory Item No.</th>
                                                        <th class="col-1 text-center">Estimated Useful Life</th>
                                                        <th class="col-1 text-center">Action</th>
                                                    </tr>
                                                    <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" id="code" name="code">
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" id="gen-desc" name="gen_desc">
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget" name="est_budget">
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget" name="est_budget">
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget" name="est_budget">
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget" name="est_budget">
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget" name="est_budget">
                                                        <td class="delete-item-row">
                                                            <ul class="table-controls">
                                                                <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-md additem" style="background-color: #C62742; color: #FFFFFF">Add Item</button>
                                                <p class="mt-2"><span class="fw-bold">Total Amount: </span>₱<span>1,000</span></p>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row justify-content-between">

                                        <div class="col-xl-5 invoice-address-company">

                                            <div class="invoice-address-company-fields">


                                                <div class="ms-3">
                                                    <h4 class="mt-3">Received From:</h4>
                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="position1" class="col-sm-3 col-form-label col-form-label-sm">Personnel</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" id="position1" name="position1">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="personel1" class="col-sm-3 col-form-label col-form-label-sm">Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" id="personel1" name="personel1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 invoice-address-client">

                                            <div class="invoice-address-client-fields">

                                                <div class="ms-3">
                                                    <h4 class="mt-3">Received By:</h4>
                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="position1" class="col-sm-3 col-form-label col-form-label-sm">Personnel</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" id="position1" name="position1">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="personel1" class="col-sm-3 col-form-label col-form-label-sm">Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" id="personel1" name="personel1">
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



                    <div class="col-xl-3">

                        <div class="invoice-actions-btn mt-0">
                            <div class="invoice-action-btn">

                                <div class="row">
                                    <div class="col-xl-12 col-md-4">
                                        <a href="javascript:void(0);" class="btn btn-send" style="background-color: #C62742; color: #FFFFFF">Send</a>
                                    </div>
                                    <div class="col-xl-12 col-md-4">
                                        <a href="javascript:void(0);" class="btn btn-dark btn-download">Save</a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/src/assets/js/apps/invoice-add.js') ?>"></script>

    <!-- For Table -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/src/assets/js/apps/fac-ppmp.js') ?>"></script>
<?= $this->endSection() ?>