<?= $this->extend('layouts/pro-base-layout') ?>

<?= $this->section('title') ?>
<title>TUP STEP | Faculty Project Procurement Management Plan</title>
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
                                    <h2 class="fw-bold" style="color: #C62742">Project Procurement Management Plan</h2>
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
                                                <label for="office" class="col-sm-1 col-form-label col-form-label-sm">Office</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="office" name="office">
                                                </div>
                                            </div>

                                            <div class="ms-3">
                                                <h4 class="mt-3">Prepared By:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position1" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="position1" name="position1">
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel1" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="personel1" name="personel1">
                                                    </div>
                                                </div>

                                                <h4 class="mt-3">Recommended:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position2" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="position2" name="position2">
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel2" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="personel2" name="personel2">
                                                    </div>
                                                </div> 
                                                
                                                <h4 class="mt-3">Evaluated & Approved By:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position3" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="position3" name="position3">
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel3" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="personel3" name="personel3">
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                        </div>
                                        
                                    </div>


                                    <div class="col-xl-6 invoice-address-client">

                                        <div class="invoice-address-client-fields">

                                            <div class="form-group row">
                                                <label for="period-covered" class="col-sm-3 col-form-label col-form-label-sm">Period Covered</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="period-covered" name="period_covered">
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="date-approved" class="col-sm-3 col-form-label col-form-label-sm">Date Approved</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="date-approved" name="date_approved">
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="ttl-budget-allocated" class="col-sm-3 col-form-label col-form-label-sm">Total Budget Allocated</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="ttl-budget-allocated" name="ttl_budget_allocated">
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="ttl-proposed-budget" class="col-sm-3 col-form-label col-form-label-sm">Total Proposed Budget</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="ttl-proposed-budget" name="ttl_proposed_budget">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>

                            <hr class="my-5">
                            <p class="px-5"><span class="fw-bold">Note: </span>Technical Specification for each item/ project being proposed shall be submitted as part of the PPMP, General description may be used  when filing out this form, however, when preparing your APP, please state full specification of the item.</p>
                            <hr class="my-5">

                            <div class="invoice-detail-items pt-0">

                                <div class="table-responsive">
                                    <table class="table item-table">
                                        <thead>
                                            <tr>
                                                <th class="col-1 text-center">Code</th>
                                                <th class="col-4 text-center">General Description</th>
                                                <th class="col-1 text-center">Quantity / Size</th>
                                                <th class="col-1 text-center">Estimated Budget</th>
                                                <th class="col-4 text-center px-0">
                                                    Schdule / Milestone of Activities
                                                    <div class="d-flex justify-content-between text-muted">
                                                    <small>Jan</small>
                                                    <small>Feb</small>
                                                    <small>Mar</small>
                                                    <small>Apr</small>
                                                    <small>May</small>
                                                    <small>Jun</small>
                                                    <small>Jul</small>
                                                    <small>Aug</small>
                                                    <small>Sep</small>
                                                    <small>Oct</small>
                                                    <small>Nov</small>
                                                    <small>Dec</small>
                                                    </div>
                                                </th>
                                                <th class="col-1 text-center">Action</th>
                                            </tr>
                                            <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="code" name="code">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="gen-desc" name="gen_desc">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget" name="est_budget">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="schd-milestone-acts" name="schd_milestone_acts">
                                                <td class="d-flex justify-content-between px-0 ps-1 py-3">
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="jan" name="month">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="feb" name="month">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="mar" name="month">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="par" name="month">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="may" name="month">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="jun" name="month">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="jul" name="month">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="aug" name="month">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="sep" name="month">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="oct" name="month">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="nov" name="month">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="" id="dec" name="month">
                                                    </div>
                                                </td>
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