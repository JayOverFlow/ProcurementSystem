<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <?php
            $isReadOnly = isset($ppmp['ppmp_status']) && $ppmp['ppmp_status'] !== 'Draft';
        ?>
        <?php if (session()->getFlashdata('success')): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Success!',
                        text: '<?= session()->getFlashdata('success') ?>',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    });
                });
            </script>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Error!',
                        text: '<?= session()->getFlashdata('error') ?>',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok'
                    });
                });
            </script>
        <?php endif; ?>

        <?php if ($isReadOnly): ?>
            <div class="alert alert-light-info bg-primary" role="alert">
                This document is already submitted and cannot be edited.
            </div>
        <?php endif; ?>

        <div class="doc-container">
            <form id="ppmp-form" action="<?= base_url('ppmp/save') ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="ppmp_id" value="<?= esc($ppmp['ppmp_id'] ?? '') ?>">
            <div class="row">
                <div class="col-xl-9">

                    <div class="invoice-content">

                        <div class="invoice-detail-body">

                            <div class="invoice-detail-title d-flex flex-column text-start mb-0">
                                <div>
                                    <h2 class="fw-bold" style="color: #8D0404">Project Procurement Management Plan</h2>
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
                                                    <select class="form-control form-control-sm" id="ppmp-office-fk" name="ppmp_office_fk" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <option>Select</option>
                                                        <?php if(empty($departments)): ?>
                                                            <option value="null">No Offices</option>
                                                        <?php else: ?>
                                                            <?php foreach($departments as $department): /* Pre-populate selected department if editing */?>
                                                                <option value="<?= esc($department['dep_id']) ?>" <?= (isset($ppmp['ppmp_office_fk']) && $ppmp['ppmp_office_fk'] == $department['dep_id']) ? 'selected' : '' ?>><?= esc($department['dep_name']) ?></option>
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
                                                        <input type="text" class="form-control form-control-sm" id="ppmp-prepared-by-position" name="ppmp_prepared_by_position" value="<?= esc($ppmp['ppmp_prepared_by_position'] ?? '') /* Pre-populate position */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel1" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="ppmp-prepared-by-name" name="ppmp_prepared_by_name" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option>Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                        <?php else: ?>
                                                                <?php foreach($users as $user): /* Pre-populate selected user */?>
                                                                    <option value="<?= esc($user['user_id']) ?>" <?= (isset($ppmp['ppmp_prepared_by_name']) && $ppmp['ppmp_prepared_by_name'] == $user['user_id']) ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <h4 class="mt-3">Recommended:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position2" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="ppmp-recommended-by-position" name="ppmp_recommended_by_position" value="<?= esc($ppmp['ppmp_recommended_by_position'] ?? '') /* Pre-populate position */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel2" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="ppmp-recommended-by-name" name="ppmp_recommended_by_name" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option>Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                            <?php else: ?>
                                                                <?php foreach($users as $user): /* Pre-populate selected user */?>
                                                                    <option value="<?= esc($user['user_id']) ?>" <?= (isset($ppmp['ppmp_recommended_by_name']) && $ppmp['ppmp_recommended_by_name'] == $user['user_id']) ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                        </select>
                                                    </div>
                                                </div> 
                                                
                                                <h4 class="mt-3">Evaluated & Approved By:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position3" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="ppmp-evaluated-by-position" name="ppmp_evaluated_by_position" value="<?= esc($ppmp['ppmp_evaluated_by_position'] ?? '') /* Pre-populate position */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel3" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="ppmp-evaluated-by-name" name="ppmp_evaluated_by_name" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option>Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                            <?php else: ?>
                                                                <?php foreach($users as $user): /* Pre-populate selected user */?>
                                                                    <option value="<?= esc($user['user_id']) ?>" <?= (isset($ppmp['ppmp_evaluated_by_name']) && $ppmp['ppmp_evaluated_by_name'] == $user['user_id']) ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
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
                                                    <input type="text" class="form-control form-control-sm" id="ppmp-period-covered" name="ppmp_period_covered" placeholder="YYYY" value="<?= esc($ppmp['ppmp_period_covered'] ?? '') /* Pre-populate period covered */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="date-approved" class="col-sm-3 col-form-label col-form-label-sm">Date Approved</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="ppmp-date-approved" name="ppmp_date_approved" placeholder="MM/DD/YYYY" value="<?= esc($ppmp['ppmp_date_approved'] ?? '') /* Pre-populate date approved */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="ttl-budget-allocated" class="col-sm-3 col-form-label col-form-label-sm">Total Budget Allocated</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control form-control-sm" id="ppmp-total-budget-allocated" name="ppmp_total_budget_allocated" value="<?= esc($ppmp['ppmp_total_budget_allocated'] ?? '') /* Pre-populate total budget allocated */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="ttl-proposed-budget" class="col-sm-3 col-form-label col-form-label-sm">Total Proposed Budget</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control form-control-sm" id="ppmp-total-proposed-budget" name="ppmp_total_proposed_budget" value="<?= esc($ppmp['ppmp_total_proposed_budget'] ?? '') /* Pre-populate total proposed budget */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
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
                                            <?php $mooeIndex = 0; /* Initialize index for MOOE items */?>
                                            <?php if (!empty($ppmp_items)): /* Loop through existing items if available */?>
                                                <?php foreach ($ppmp_items as $item): ?>
                                                    <?php if (($item['ppmp_item_estimated_budget'] ?? 0) < 50000): /* Display only MOOE items */?>
                                                        <tr>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" id="code_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][code]" value="<?= esc($item['ppmp_item_code'] ?? '') /* Pre-populate code */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" id="gen-desc_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][gen_desc]" value="<?= esc($item['ppmp_item_name'] ?? '') /* Pre-populate general description */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" id="qty-size_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][qty_size]" value="<?= esc($item['ppmp_item_quantity'] ?? '') /* Pre-populate quantity/size */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][est_budget]" value="<?= esc($item['ppmp_item_estimated_budget'] ?? '') /* Pre-populate estimated budget */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <td class="d-flex justify-content-between px-0 ps-1 py-2">
                                                                <?php /* Pre-populate monthly checkboxes */?>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jan_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][jan]" <?= ($item['ppmp_sched_jan'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="feb_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][feb]" <?= ($item['ppmp_sched_feb'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="mar_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][mar]" <?= ($item['ppmp_sched_mar'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="apr_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][apr]" <?= ($item['ppmp_sched_apr'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="may_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][may]" <?= ($item['ppmp_sched_may'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jun_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][jun]" <?= ($item['ppmp_sched_jun'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jul_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][jul]" <?= ($item['ppmp_sched_jul'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="aug_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][aug]" <?= ($item['ppmp_sched_aug'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="sep_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][sep]" <?= ($item['ppmp_sched_sep'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="oct_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][oct]" <?= ($item['ppmp_sched_oct'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="nov_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][nov]" <?= ($item['ppmp_sched_nov'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="dec_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][dec]" <?= ($item['ppmp_sched_dec'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                            </td>
                                                            <td class="delete-item-row text-center">
                                                                <ul class="table-controls">
                                                                    <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete" <?= $isReadOnly ? 'style="pointer-events: none; color: grey;"' : '' ?>><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <?php $mooeIndex++; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else: /* Display an empty row if no items are pre-populated */?>
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
                                                            <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete" <?= $isReadOnly ? 'style="pointer-events: none; color: grey;"' : '' ?>><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-md additem" style="background-color: #8D0404; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Add Item</button>
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
                                            <?php $coIndex = 0; /* Initialize index for CO items */?>
                                            <?php if (!empty($ppmp_items)): /* Loop through existing CO items if available */?>
                                                <?php foreach ($ppmp_items as $item): ?>
                                                    <?php if (($item['ppmp_item_estimated_budget'] ?? 0) >= 50000): /* Display only CO items */?>
                                                        <tr>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" id="code_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][code]" value="<?= esc($item['ppmp_item_code'] ?? '') /* Pre-populate code */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" id="gen-desc_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][gen_desc]" value="<?= esc($item['ppmp_item_name'] ?? '') /* Pre-populate general description */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" id="qty-size_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][qty_size]" value="<?= esc($item['ppmp_item_quantity'] ?? '') /* Pre-populate quantity/size */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][est_budget]" value="<?= esc($item['ppmp_item_estimated_budget'] ?? '') /* Pre-populate estimated budget */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <td class="d-flex justify-content-between px-0 ps-1 py-3">
                                                                <?php /* Pre-populate monthly checkboxes */?>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jan_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][jan]" <?= ($item['ppmp_sched_jan'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="feb_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][feb]" <?= ($item['ppmp_sched_feb'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="mar_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][mar]" <?= ($item['ppmp_sched_mar'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="apr_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][apr]" <?= ($item['ppmp_sched_apr'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="may_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][may]" <?= ($item['ppmp_sched_may'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jun_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][jun]" <?= ($item['ppmp_sched_jun'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jul_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][jul]" <?= ($item['ppmp_sched_jul'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="aug_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][aug]" <?= ($item['ppmp_sched_aug'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="sep_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][sep]" <?= ($item['ppmp_sched_sep'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="oct_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][oct]" <?= ($item['ppmp_sched_oct'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="nov_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][nov]" <?= ($item['ppmp_sched_nov'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="dec_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][dec]" <?= ($item['ppmp_sched_dec'] ?? 0) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                            </td>
                                                            <td class="delete-item-row-co text-center">
                                                                <ul class="table-controls">
                                                                    <li class="p-2"><a href="javascript:void(0);" class="delete-item-co" data-toggle="tooltip" data-placement="top" title="Delete" <?= $isReadOnly ? 'style="pointer-events: none; color: grey;"' : '' ?>><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                                </ul>
                                                            </td>
                                                         </tr>
                                                         <?php $coIndex++; ?>
                                                     <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else: /* Display an empty row if no items are pre-populated */?>
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
                                                            <li class="p-2"><a href="javascript:void(0);" class="delete-item-co" data-toggle="tooltip" data-placement="top" title="Delete" <?= $isReadOnly ? 'style="pointer-events: none; color: grey;"' : '' ?>><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="button" class="btn btn-md additem-co" style="background-color: #8D0404; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Add Item</button>
                                    <p class="mt-2"><span class="fw-bold">Total Amount: </span>₱<span id="total-amount-co">1,000</span></p>
                                </div>
                            </div>
                                        
                        </div>      
                    </div>
                    
                </div>

                

                <div class="col-xl-3">

                    <div class="invoice-actions-btn mt-0">

                        <div class="invoice-action-btn">

                            <div class="row widget-content">
                                <div class="col-xl-12 col-md-4">
                                    <button type="submit" formaction="<?= base_url('ppmp/save') ?>" class="btn btn-submit w-100 save-ppmp" style="background-color: #C62742; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Save</button>
                                </div>
                                <div class="col-xl-12 col-md-4">
                                    <button type="submit" formaction="<?= base_url('ppmp/submit') ?>" class="btn btn-submit w-100 warning submit-ppmp" style="background-color: #C62742; color: #FFFFFF" <?= (!isset($ppmp['ppmp_id']) || empty($ppmp['ppmp_id']) || $isReadOnly) ? 'disabled' : '' ?>>Submit</button>
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