<?= $this->extend('layouts/plan-base-layout') ?>

<?= $this->section('title') ?>
<title>TUP STEP | Faculty Purchase Request</title>
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
                                    <h2 class="fw-bold" style="color: #C62742">Purchase Request</h2>
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
                                                <label for="department" class="col-sm-3 col-form-label col-form-label-sm">Department</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="department" name="department">
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="section" class="col-sm-3 col-form-label col-form-label-sm">Section</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="section" name="section">
                                                </div>
                                            </div>                                                     
                                            
                                        </div>
                                        
                                    </div>


                                    <div class="col-xl-5 invoice-address-client">

                                        <div class="invoice-address-client-fields">

                                            <div class="form-group row">
                                                <label for="po-num-date" class="col-sm-3 col-form-label col-form-label-sm">P.O No. Date</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="num-date" name="num_date">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="sat-no-date" class="col-sm-3 col-form-label col-form-label-sm">SAT. No. Date</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="sat-no-date" name="sat_no_date">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>

                            <hr class="my-5">

                            <div class="invoice-detail-items pt-0">

                                <div class="table-responsive">
                                    <table class="table item-table">
                                        <thead>
                                            <tr>
                                                <th class="col-1 text-center">Stock</th>
                                                <th class="col-1 text-center">Unit</th>
                                                <th class="col-3 text-center">Description</th>
                                                <th class="col-1 text-center">Qty.</th>
                                                <th class="col-2 text-center">Unit Cost</th>
                                                <th class="col-2 text-center">Amount</th>
                                                <th class="col-1 text-center">Action</th>
                                            </tr>
                                            <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="stock" name="stock">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="unit" name="unit">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="desc" name="desc">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="qty" name="qty">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="unit-cost" name="unit_cost">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="amount" name="amount">
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

                            <hr class="my-5">

                            <div class="invoice-detail-note border-top-0">

                                <div class="row justify-content-between">
                                
                                    <div class="col-xl-5 invoice-address-client">

                                        <h4>Requested by:</h4>

                                        <div class="invoice-address-client-fields ms-5">

                                            <div class="form-group">
                                                <label for="printed-name1" class="col-sm-3 col-form-label col-form-label-sm">Printed Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="printed-name1" name="printed_name1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="designation1" class="col-sm-3 col-form-label col-form-label-sm">Designation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="designation1" name="designation1">
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-xl-5 invoice-address-client">

                                        <h4>Approved by:</h4>

                                        <div class="invoice-address-client-fields ms-5">

                                            <div class="form-group">
                                                <label for="printed-name2" class="col-sm-3 col-form-label col-form-label-sm">Printed Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="printed-name2" name="printed_name2">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="designation2" class="col-sm-3 col-form-label col-form-label-sm">Designation</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="designation2" name="designation2">
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
<script src="<?= base_url('assets/src/assets/js/apps/fac-pr.js') ?>"></script>
<?= $this->endSection() ?>