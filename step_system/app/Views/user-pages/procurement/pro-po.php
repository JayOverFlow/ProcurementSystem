<?= $this->extend('layouts/pro-base-layout') ?>

<?= $this->section('title') ?>
<title>TUP STEP | Procurement Office Purchase Order</title>
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
                                    <h2 class="fw-bold" style="color: #C62742">Purchase Order</h2>
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
                                            <div class="form-group row mt-4">
                                                <label for="supplier" class="col-sm-3 col-form-label col-form-label-sm">Supplier</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="supplier" name="supplier">
                                                </div>
                                            </div>
                                            <div class="form-group row mt-4">
                                                <label for="address" class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="address" name="address">
                                                </div>
                                            </div>  

                                            <div class="form-group row mt-4">
                                                <label for="tel-no" class="col-sm-3 col-form-label col-form-label-sm">Tel No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="tel-no" name="tel-no">
                                                </div>
                                            </div>  

                                            <div class="form-group row mt-4">
                                                <label for="tin" class="col-sm-3 col-form-label col-form-label-sm">TIN</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="tin" name="tin">
                                                </div>
                                            </div>  
                                            
                                        </div>
                                    </div>


                                    <div class="col-xl-5 invoice-address-client">
                                        <div class="invoice-address-company-fields">
                                            <div class="form-group row mt-4">
                                                <label for="po-no" class="col-sm-3 col-form-label col-form-label-sm">P.O. No.</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="po-no" name="po-no">
                                                </div>
                                            </div>
                                            <div class="form-group row mt-4">
                                                <label for="date" class="col-sm-3 col-form-label col-form-label-sm">Date</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="date" name="date">
                                                </div>
                                            </div>  
                                            <div class="form-group row mt-4">
                                                <label for="mode-of-procurement" class="col-sm-3 col-form-label col-form-label-sm">Mode of Procurement</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="mode-of-procurement" name="mode-of-procurement">
                                                </div>
                                            </div>  
                                            <div class="form-group row mt-4">
                                                <label for="tup-taguig-tin" class="col-sm-3 col-form-label col-form-label-sm">TUP-Taguig TIN</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="tup-taguig-tin" name="tup-taguig-tin">
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="my-3">

                            <div class="invoice-detail-header">
                                <p>Gentlemen: Please furnish this Office the following articles subject to the term and condition contained herein.</p>   
                            </div>

                            <hr class="my-15">

                            <div class="invoice-detail-header">
                                <div class="row justify-content-between">
                                    <div class="col-xl-5 invoice-address-company">
                                        <div class="invoice-address-company-fields">
                                            <div class="form-group row mt-4">
                                                <label for="place-of-delivery" class="col-sm-3 col-form-label col-form-label-sm">Place of Delivery</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="place-of-delivery" name="place-of-delivery">
                                                </div>
                                            </div>
                                            <div class="form-group row mt-4">
                                                <label for="date-of-delivery" class="col-sm-3 col-form-label col-form-label-sm">Date of Delivery</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="date-of-delivery" name="date-of-delivery">
                                                </div>
                                            </div>  
                                        </div>
                                    </div>


                                    <div class="col-xl-5 invoice-address-client">
                                        <div class="invoice-address-company-fields">
                                            <div class="form-group row mt-4">
                                                <label for="delivery-term" class="col-sm-3 col-form-label col-form-label-sm">Delivery Term</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="delivery-term" name="delivery-term">
                                                </div>
                                            </div>  
                                            <div class="form-group row mt-4">
                                                <label for="payment-term" class="col-sm-3 col-form-label col-form-label-sm">Payment Term</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="payment-term" name="payment-term">
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

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

                            <hr class="my-2">
                                <div class="invoice-detail-header">
                                    <div class="row">
                                        <div class="col-xl-8 invoice-address-company">
                                            <div class="invoice-address-company-fields">
                                                <div class="form-group row mt-4">
                                                    <label for="place-of-delivery" class="col-sm-3 col-form-label col-form-label-sm">Description</label>
                                                    <div class="col-9">
                                                        <input type="text" class="form-control form-control-sm" id="place-of-delivery" name="place-of-delivery">
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-4">
                                                    <label for="date-of-delivery" class="col-sm-3 col-form-label col-form-label-sm">Amount in Words</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="date-of-delivery" name="date-of-delivery">
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>


                                        <div class="col-xl-4 invoice-address-client">
                                            <div class="invoice-address-company-fields">
                                                <div class="form-group row mt-4">
                                                    <label for="delivery-term" class="col-sm-3 col-form-label col-form-label-sm">Total Amount</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="delivery-term" name="delivery-term">
                                                    </div>
                                                </div>  
                                                 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <hr class="my-2">

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