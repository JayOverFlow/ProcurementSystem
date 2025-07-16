<?= $this->extend('layouts/fac-base-layout') ?>

<?= $this->section('title') ?>
<title>TUP STEP | Faculty Project Procurement Management Plan</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('assets/src/assets/css/light/apps/fac-ppmp.css') ?>" rel="stylesheet" type="text/css" />

<link href="<?= base_url('assets/src/assets/css/dark/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        
        <div class="doc-container">
            <form action="<?= base_url('ppmp/create') ?>" method="POST">
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
                                                    <select class="form-control form-control-sm" id="ppmp-office-fk" name="ppmp_office_fk">
                                                        <option>Select</option>
                                                        <?php if(empty($departments)): ?>
                                                            <option value="null">No Offices</option>
                                                        <?php else: ?>
                                                            <?php foreach($departments as $department): ?>
                                                                <option value="<?= esc($department['dep_id']) ?>"><?= esc($department['dep_name']) ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="ms-3">
                                                <h4 class="mt-3">Prepared By:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position1" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="ppmp-prepared-by-position" name="ppmp_prepared_by_position">
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel1" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="ppmp-prepared-by-name" name="ppmp_prepared_by_name">
                                                            <option>Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                            <?php else: ?>
                                                                <?php foreach($users as $user): ?>
                                                                    <option value="<?= esc($user['user_id']) ?>"><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <h4 class="mt-3">Recommended:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position2" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="ppmp-recommended-by-position" name="ppmp_recommended_by_position">
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel2" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="ppmp-recommended-by-name" name="ppmp_recommended_by_name">
                                                            <option>Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                            <?php else: ?>
                                                                <?php foreach($users as $user): ?>
                                                                    <option value="<?= esc($user['user_id']) ?>"><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div> 
                                                
                                                <h4 class="mt-3">Evaluated & Approved By:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position3" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="ppmp-evaluated-by-position" name="ppmp_evaluated_by_position">
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel3" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="ppmp-evaluated-by-name" name="ppmp_evaluated_by_name">
                                                            <option>Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                            <?php else: ?>
                                                                <?php foreach($users as $user): ?>
                                                                    <option value="<?= esc($user['user_id']) ?>"><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                        </select>
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
                                                    <input type="text" class="form-control form-control-sm" id="ppmp-period-covered" name="ppmp_period_covered" placeholder="YYYY">
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="date-approved" class="col-sm-3 col-form-label col-form-label-sm">Date Approved</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="ppmp-date-approved" name="ppmp_date_approved" placeholder="MM/DD/YYYY">
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="ttl-budget-allocated" class="col-sm-3 col-form-label col-form-label-sm">Total Budget Allocated</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control form-control-sm" id="ppmp-total-budget-allocated" name="ppmp_total_budget_allocated">
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="ttl-proposed-budget" class="col-sm-3 col-form-label col-form-label-sm">Total Proposed Budget</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control form-control-sm" id="ppmp-total-proposed-budget" name="ppmp_total_proposed_budget">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>

                            <hr class="my-3">
                                <p class="px-5" style= "text-align: center;"> MOOE/ANY SUPPLIES, MATERIALS AND EQUIPMENT (BELOW PHP 50,000.00/ITEM) </p>
                            <hr class="my-3">

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
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="code" name="items[0][code]">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="gen-desc" name="items[0][gen_desc]">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="qty-size" name="items[0][qty_size]">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget" name="items[0][est_budget]">
                                                <td class="d-flex justify-content-between px-0 ps-1 py-2">
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="jan" name="items[0][month][jan]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="feb" name="items[0][month][feb]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="mar" name="items[0][month][mar]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="par" name="items[0][month][apr]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="may" name="items[0][month][may]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="jun" name="items[0][month][jun]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="jul" name="items[0][month][jul]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="aug" name="items[0][month][aug]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="sep" name="items[0][month][sep]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="oct" name="items[0][month][oct]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="nov" name="items[0][month][nov]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="dec" name="items[0][month][dec]">
                                                    </div>
                                                </td>
                                                <td class="delete-item-row text-center">
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
                                    <p class="mt-2"><span class="fw-bold">Total Amount: </span>₱<span id="total-amount-mooe">1,000</span></p>
                                </div>
                            </div>

                            <hr class="my-3">
                                <p class="px-5" style= "text-align: center;"> CO/ANY CAPITAL OUTLAY (PHP 50,000.00/ITEM AND ABOVE) </p>
                            <hr class="my-3">

                            <div class="invoice-detail-items pt-0">
                                <div class="table-responsive">
                                    <table class="table item-table-co">
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
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="code_co" name="items_co[0][code]">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="gen-desc_co" name="items_co[0][gen_desc]">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="qty-size_co" name="items_co[0][qty_size]">
                                                <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget_co" name="items_co[0][est_budget]">
                                                <td class="d-flex justify-content-between px-0 ps-1 py-3">
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="jan_co" name="items_co[0][month][jan]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="feb_co" name="items_co[0][month][feb]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="mar_co" name="items_co[0][month][mar]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="par_co" name="items_co[0][month][apr]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="may_co" name="items_co[0][month][may]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="jun_co" name="items_co[0][month][jun]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="jul_co" name="items_co[0][month][jul]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="aug_co" name="items_co[0][month][aug]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="sep_co" name="items_co[0][month][sep]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="oct_co" name="items_co[0][month][oct]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="nov_co" name="items_co[0][month][nov]">
                                                    </div>
                                                    <div class="form-check form-check-danger form-check-inline">
                                                        <input class="form-check-input" type="checkbox" value="1" id="dec_co" name="items_co[0][month][dec]">
                                                    </div>
                                                </td>
                                                <td class="delete-item-row-co text-center">
                                                    <ul class="table-controls">
                                                        <li class="p-2"><a href="javascript:void(0);" class="delete-item-co" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-md additem-co" style="background-color: #C62742; color: #FFFFFF">Add Item</button>
                                    <p class="mt-2"><span class="fw-bold">Total Amount: </span>₱<span id="total-amount-co">1,000</span></p>
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
                                    <button type="submit" class="btn btn-submit w-100" style="background-color: #C62742; color: #FFFFFF">Save & Submit</button>
                                </div>
                                <div class="col-xl-12 col-md-4">
                                    <button class="btn btn-submit w-100" style="background-color: #C62742; color: #FFFFFF">Export</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            </form>
            
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calculateTotal = (tableName, totalElementId) => {
            let total = 0;
            document.querySelectorAll(`.${tableName} tbody tr`).forEach(row => {
                const estBudgetInput = row.querySelector('input[name*="[est_budget]"]');
                if (estBudgetInput) {
                    total += parseFloat(estBudgetInput.value) || 0;
                }
            });
            document.getElementById(totalElementId).textContent = total.toFixed(2);
        };

        // Initial calculation
        calculateTotal('item-table', 'total-amount-mooe');
        calculateTotal('item-table-co', 'total-amount-co');

        // Recalculate on input change for MOOE table
        document.querySelector('.item-table').addEventListener('input', (event) => {
            if (event.target.name.includes('[est_budget]')) {
                calculateTotal('item-table', 'total-amount-mooe');
            }
        });

        // Recalculate on input change for CO table
        document.querySelector('.item-table-co').addEventListener('input', (event) => {
            if (event.target.name.includes('[est_budget]')) {
                calculateTotal('item-table-co', 'total-amount-co');
            }
        });
    });
</script>
<?= $this->endSection() ?>