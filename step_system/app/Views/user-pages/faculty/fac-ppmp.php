<?= $this->extend('layouts/fac-base-layout') ?>

<?= $this->section('title') ?>
<title>TUP STEP | Faculty Project Procurement Management Plan</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('assets/src/assets/css/light/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />

<link href="<?= base_url('assets/src/assets/css/dark/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/table/datatable/datatables.css') ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/dt-global_style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') ?>">
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
                                    <p class="col-auto text-start mb-0">FM-SUP-001</p>
                                    <p class="col-auto text-start mb-0">REV 0</p>
                                    <p class="col-auto text-start mb-0">09NOV2016</p>
                                </div>
                            </div>
                            <hr>
                            <div class="invoice-detail-header p-0">
                                
                                <div class="row">
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group row ms-2">
                                            <label for="office" class="col-sm-3 col-form-label col-form-label-sm">Office</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-lg" id="office" placeholder="">
                                            </div>
                                        </div>
                                        <div class="ms-5">
                                            <p class="fw-bold mt-4">Prepared By:</p>
                                            <div class="ms-5">
                                                <div class="form-group row">
                                                    <label for="position-1" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-lg" id="position-1" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-3">
                                                    <label for="personel-1" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-lg" id="personel-1" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="fw-bold mt-4">Recommended:</p>
                                            <div class="ms-5">
                                                <div class="form-group row">
                                                    <label for="position-2" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-lg" id="position-2" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-3">
                                                    <label for="personel-2" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-lg" id="personel-2" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="fw-bold mt-4">Evaluated and Approved By:</p>
                                            <div class="ms-5">
                                                <div class="form-group row">
                                                    <label for="position-3" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-lg" id="position-3" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-3">
                                                    <label for="personel-3" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-lg" id="personel-3" placeholder="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="ms-5">
                                            <div class="form-group row">
                                                <label for="period-covered" class="col-sm-3 col-form-label col-form-label-sm">Period Covered</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-lg" id="period-covered" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-approved" class="col-sm-3 col-form-label col-form-label-sm">Date Approved</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-lg" id="date-approved" placeholder="">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3 mt-3">
                                                <label for="total-budget-allocated" class="col-sm-3 col-form-label col-form-label-sm">Total Budget Allocated</label>
                                                <span class="input-group-text">₱</span>
                                                <input type="text" class="form-control form-control-sm" placeholder="" id="total-budget-allocated" >
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="total-proposed-budget" class="col-sm-3 col-form-label col-form-label-sm">Total Proposed Budget</label>
                                                <span class="input-group-text">₱</span>
                                                <input type="text" class="form-control form-control-sm" placeholder="" id="total-proposed-budget" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="text-center">
                                    <p><span class="fw-bold">Note: </span>Technical Specification for each item/ project being proposed shall be submitted as part of the PPMP, General description may be used  when filing out this form, however, when preparing your APP, please state full specification of the item.</p>
                                </div>
                                <hr class="mb-4">
                                    <div class="row">
                    
                                        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                                            <table id="zero-config" class="table dt-table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Code</th>
                                                            <th>General Description</th>
                                                            <th>Quantity / Size</th>
                                                            <th>Estimated Budget</th>
                                                            <th>
                                                                <div class="text-center">Schedule / Milestone of Activities</div>
                                                                <div class="d-flex justify-content-between align-items-center gap-2">
                                                                    <small class="text-muted">Jan</small>
                                                                    <small class="text-muted">Feb</small>
                                                                    <small class="text-muted">Mar</small>
                                                                    <small class="text-muted">Apr</small>
                                                                    <small class="text-muted">May</small>
                                                                    <small class="text-muted">Jun</small>
                                                                    <small class="text-muted">Jul</small>
                                                                    <small class="text-muted">Aug</small>
                                                                    <small class="text-muted">Sept</small>
                                                                    <small class="text-muted">Oct</small>
                                                                    <small class="text-muted">Nov</small>
                                                                    <small class="text-muted">Dec</small>
                                                                </div>
                                                            </th>
                                                            <th class="no-content">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="ppmp-table-body">
                                                        <!-- table rows -->
                                                    </tbody>
                                                </table>
                                                <div class="d-flex justify-content-center mx-3">
                                                    <button type="button" class="btn btn-md" id="add-item-row" style="background-color: #C62742; color: #FFFFFF">Add Item</button>
                                                    <p><span class="fw-bold">Total Amount: </span>₱<span>1,000</span></p>
                                                </div>
                                                
                                        </div>
                    
                                    </div>

                            </div>
                        </div>
                        
                    </div>
                    
                </div>

                <div class="col-xl-3">

                    <div class="invoice-actions-btn">

                        <div class="invoice-action-btn">

                            <div class="row">
                                <div class="col-xl-12 col-md-4">
                                    <a href="javascript:void(0);" class="btn btn-send" style="background-color: #C62742; color: #FFFFFF">Send</a>
                                </div>
                                <div class="col-xl-12 col-md-4">
                                    <a href="javascript:void(0);" class="btn btn-download" style="background-color: #515365; color: #FFFFFF">Save</a>
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
<script src="<?= base_url('assets/src/assets/js/apps/invoice-add.js') ?>"></script>

<!-- For Table -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/src/assets/js/custom.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>

<!-- For Table -->
<script>
$(document).ready(function() {
    let rowCount = 0; // To keep track of rows for unique names if needed

    // Function to add a new row
    function addNewRow() {
        const newRow = `
            <tr data-row-id="${rowCount}">
                <td><input type="text" class="form-control form-control-sm" name="items[${rowCount}][code]" placeholder=""></td>
                <td><input type="text" class="form-control form-control-sm" name="items[${rowCount}][description]" placeholder=""></td>
                <td><input type="number" class="form-control form-control-sm" name="items[${rowCount}][quantity]" placeholder="" min="1"></td>
                <td><input type="number" class="form-control form-control-sm" name="items[${rowCount}][estimated_budget]" placeholder="" min="0" step="0.01"></td>
                <td class="d-flex justify-content-between align-items-center gap-2">
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                    <div class="form-check form-check-danger form-check-inline">
                        <input class="form-check-input" type="checkbox" value="" id="form-check-danger">
                    </div>
                </td>
                <td>
                    <span type="button" class="remove-item-row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </span>
                </td>
            </tr>
        `;
        $('#ppmp-table-body').append(newRow);
        rowCount++;
    }

    // Event listener for adding a new row
    $('#add-item-row').on('click', function() {
        addNewRow();
    });

    // Event listener for removing a row (using event delegation)
    $('#ppmp-table-body').on('click', '.remove-item-row', function() {
        $(this).closest('tr').remove();
    });

    // Optional: Add an initial row when the page loads
    addNewRow();
});
</script>
<?= $this->endSection() ?>