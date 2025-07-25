<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        
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
                                                    <select class="form-control form-control-sm <?= (session('errors.ppmp_office_fk')) ? 'is-invalid' : '' ?>" id="ppmp-office-fk" name="ppmp_office_fk">
                                                        <option value="0">Select</option>
                                                        <?php if(empty($departments)): ?>
                                                            <option value="null">No Offices</option>
                                                        <?php else: ?>
                                                            <?php foreach($departments as $department): /* Pre-populate selected department if editing */?>
                                                                <option value="<?= esc($department['dep_id']) ?>" <?= old('ppmp_office_fk', $ppmp['ppmp_office_fk'] ?? '') == $department['dep_id'] ? 'selected' : '' ?>><?= esc($department['dep_name']) ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif;?>
                                                    </select>
                                                    <?php if(session('errors.ppmp_office_fk')): ?>
                                                        <div class="invalid-feedback">
                                                            <?= session('errors.ppmp_office_fk') ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="ms-3">
                                                <h4 class="mt-3">Prepared By:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position1" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm <?= (session('errors.ppmp_prepared_by_position')) ? 'is-invalid' : '' ?>" id="ppmp-prepared-by-position" name="ppmp_prepared_by_position" value="<?= old('ppmp_prepared_by_position', esc($ppmp['ppmp_prepared_by_position'] ?? '')) ?>">
                                                        <?php if(session('errors.ppmp_prepared_by_position')): ?>
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.ppmp_prepared_by_position') ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel1" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm <?= (session('errors.ppmp_prepared_by_name')) ? 'is-invalid' : '' ?>" id="ppmp-prepared-by-name" name="ppmp_prepared_by_name">
                                                            <option value="0">Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                        <?php else: ?>
                                                                <?php foreach($users as $user): /* Pre-populate selected user */?>
                                                                    <option value="<?= esc($user['user_id']) ?>" <?= old('ppmp_prepared_by_name', $ppmp['ppmp_prepared_by_name'] ?? '') == $user['user_id'] ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                        </select>
                                                        <?php if(session('errors.ppmp_prepared_by_name')): ?>
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.ppmp_prepared_by_name') ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <h4 class="mt-3">Recommended:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position2" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm <?= (session('errors.ppmp_recommended_by_position')) ? 'is-invalid' : '' ?>" id="ppmp-recommended-by-position" name="ppmp_recommended_by_position" value="<?= old('ppmp_recommended_by_position', esc($ppmp['ppmp_recommended_by_position'] ?? '')) ?>">
                                                        <?php if(session('errors.ppmp_recommended_by_position')): ?>
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.ppmp_recommended_by_position') ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel2" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm <?= (session('errors.ppmp_recommended_by_name')) ? 'is-invalid' : '' ?>" id="ppmp-recommended-by-name" name="ppmp_recommended_by_name">
                                                            <option value="0">Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                            <?php else: ?>
                                                                <?php foreach($users as $user): /* Pre-populate selected user */?>
                                                                    <option value="<?= esc($user['user_id']) ?>" <?= old('ppmp_recommended_by_name', $ppmp['ppmp_recommended_by_name'] ?? '') == $user['user_id'] ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                        </select>
                                                        <?php if(session('errors.ppmp_recommended_by_name')): ?>
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.ppmp_recommended_by_name') ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div> 
                                                
                                                <h4 class="mt-3">Evaluated & Approved By:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position3" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm <?= (session('errors.ppmp_evaluated_by_position')) ? 'is-invalid' : '' ?>" id="ppmp-evaluated-by-position" name="ppmp_evaluated_by_position" value="<?= old('ppmp_evaluated_by_position', esc($ppmp['ppmp_evaluated_by_position'] ?? '')) ?>">
                                                        <?php if(session('errors.ppmp_evaluated_by_position')): ?>
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.ppmp_evaluated_by_position') ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel3" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm <?= (session('errors.ppmp_evaluated_by_name')) ? 'is-invalid' : '' ?>" id="ppmp-evaluated-by-name" name="ppmp_evaluated_by_name">
                                                            <option value="0">Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                            <?php else: ?>
                                                                <?php foreach($users as $user): /* Pre-populate selected user */?>
                                                                    <option value="<?= esc($user['user_id']) ?>" <?= old('ppmp_evaluated_by_name', $ppmp['ppmp_evaluated_by_name'] ?? '') == $user['user_id'] ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                        </select>
                                                        <?php if(session('errors.ppmp_evaluated_by_name')): ?>
                                                            <div class="invalid-feedback">
                                                                <?= session('errors.ppmp_evaluated_by_name') ?>
                                                            </div>
                                                        <?php endif; ?>
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
                                                    <input type="text" class="form-control form-control-sm <?= (session('errors.ppmp_period_covered')) ? 'is-invalid' : '' ?>" id="ppmp-period-covered" name="ppmp_period_covered" placeholder="YYYY" value="<?= old('ppmp_period_covered', esc($ppmp['ppmp_period_covered'] ?? '')) ?>">
                                                    <?php if(session('errors.ppmp_period_covered')): ?>
                                                        <div class="invalid-feedback">
                                                            <?= session('errors.ppmp_period_covered') ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="date-approved" class="col-sm-3 col-form-label col-form-label-sm">Date Approved</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="ppmp-date-approved" name="ppmp_date_approved" placeholder="MM/DD/YYYY" value="<?= old('ppmp_date_approved', esc($ppmp['ppmp_date_approved'] ?? '')) ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="ttl-budget-allocated" class="col-sm-3 col-form-label col-form-label-sm">Total Budget Allocated</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control form-control-sm <?= (session('errors.ppmp_total_budget_allocated')) ? 'is-invalid' : '' ?>" id="ppmp-total-budget-allocated" name="ppmp_total_budget_allocated" value="<?= old('ppmp_total_budget_allocated', esc($ppmp['ppmp_total_budget_allocated'] ?? '')) ?>">
                                                    <?php if(session('errors.ppmp_total_budget_allocated')): ?>
                                                        <div class="invalid-feedback">
                                                            <?= session('errors.ppmp_total_budget_allocated') ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="ttl-proposed-budget" class="col-sm-3 col-form-label col-form-label-sm">Total Proposed Budget</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control form-control-sm <?= (session('errors.ppmp_total_proposed_budget')) ? 'is-invalid' : '' ?>" id="ppmp-total-proposed-budget" name="ppmp_total_proposed_budget" value="<?= old('ppmp_total_proposed_budget', esc($ppmp['ppmp_total_proposed_budget'] ?? '')) ?>">
                                                    <?php if(session('errors.ppmp_total_proposed_budget')): ?>
                                                        <div class="invalid-feedback">
                                                            <?= session('errors.ppmp_total_proposed_budget') ?>
                                                        </div>
                                                    <?php endif; ?>
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
                                    <?php if(session('errors.items')): ?>
                                        <div class="alert alert-danger"><?= session('errors.items') ?></div>
                                    <?php endif; ?>
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
                                            <?php $mooeIndex = 0; ?>
                                            <?php if (!empty(old('items'))): ?>
                                                <?php foreach (old('items') as $index => $item): ?>
                                                    <tr>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items.'.$index.'.code')) ? 'is-invalid' : '' ?>" name="items[<?= $index ?>][code]" value="<?= esc($item['code']) ?>">
                                                            <?php if(session('errors.items.'.$index.'.code')): ?><div class="invalid-feedback"><?= session('errors.items.'.$index.'.code') ?></div><?php endif; ?>
                                                        </td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items.'.$index.'.gen_desc')) ? 'is-invalid' : '' ?>" name="items[<?= $index ?>][gen_desc]" value="<?= esc($item['gen_desc']) ?>">
                                                            <?php if(session('errors.items.'.$index.'.gen_desc')): ?><div class="invalid-feedback"><?= session('errors.items.'.$index.'.gen_desc') ?></div><?php endif; ?>
                                                        </td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items.'.$index.'.qty_size')) ? 'is-invalid' : '' ?>" name="items[<?= $index ?>][qty_size]" value="<?= esc($item['qty_size']) ?>">
                                                            <?php if(session('errors.items.'.$index.'.qty_size')): ?><div class="invalid-feedback"><?= session('errors.items.'.$index.'.qty_size') ?></div><?php endif; ?>
                                                        </td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items.'.$index.'.est_budget')) ? 'is-invalid' : '' ?>" name="items[<?= $index ?>][est_budget]" value="<?= esc($item['est_budget']) ?>">
                                                            <?php if(session('errors.items.'.$index.'.est_budget')): ?><div class="invalid-feedback"><?= session('errors.items.'.$index.'.est_budget') ?></div><?php endif; ?>
                                                        </td>
                                                        <td class="d-flex justify-content-between px-0 ps-1 py-2">
                                                            <?php $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec']; ?>
                                                            <?php foreach($months as $month): ?>
                                                            <div class="form-check form-check-danger form-check-inline">
                                                                <input class="form-check-input" type="checkbox" value="1" name="items[<?= $index ?>][month][<?= $month ?>]" <?= isset($item['month'][$month]) ? 'checked' : '' ?>>
                                                            </div>
                                                            <?php endforeach; ?>
                                                        </td>
                                                        <td class="delete-item-row text-center">
                                                            <ul class="table-controls">
                                                                <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php $mooeIndex = $index + 1; ?>
                                                <?php endforeach; ?>
                                            <?php elseif (!empty($ppmp_items)): ?>
                                                <?php foreach ($ppmp_items as $item): ?>
                                                    <?php if (($item['ppmp_item_estimated_budget'] ?? 0) < 50000): ?>
                                                        <tr>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items.'.$mooeIndex.'.code')) ? 'is-invalid' : '' ?>" id="code_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][code]" value="<?= esc(old('items.'.$mooeIndex.'.code', $item['ppmp_item_code'] ?? '')) ?>">
                                                                <?php if(session('errors.items.'.$mooeIndex.'.code')): ?>
                                                                    <div class="invalid-feedback"><?= session('errors.items.'.$mooeIndex.'.code') ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items.'.$mooeIndex.'.gen_desc')) ? 'is-invalid' : '' ?>" id="gen-desc_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][gen_desc]" value="<?= esc(old('items.'.$mooeIndex.'.gen_desc', $item['ppmp_item_name'] ?? '')) ?>">
                                                                <?php if(session('errors.items.'.$mooeIndex.'.gen_desc')): ?>
                                                                    <div class="invalid-feedback"><?= session('errors.items.'.$mooeIndex.'.gen_desc') ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items.'.$mooeIndex.'.qty_size')) ? 'is-invalid' : '' ?>" id="qty-size_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][qty_size]" value="<?= esc(old('items.'.$mooeIndex.'.qty_size', $item['ppmp_item_quantity'] ?? '')) ?>">
                                                                <?php if(session('errors.items.'.$mooeIndex.'.qty_size')): ?>
                                                                    <div class="invalid-feedback"><?= session('errors.items.'.$mooeIndex.'.qty_size') ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items.'.$mooeIndex.'.est_budget')) ? 'is-invalid' : '' ?>" id="est-budget_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][est_budget]" value="<?= esc(old('items.'.$mooeIndex.'.est_budget', $item['ppmp_item_estimated_budget'] ?? '')) ?>">
                                                                <?php if(session('errors.items.'.$mooeIndex.'.est_budget')): ?>
                                                                    <div class="invalid-feedback"><?= session('errors.items.'.$mooeIndex.'.est_budget') ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="d-flex justify-content-between px-0 ps-1 py-2">
                                                                <?php $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec']; ?>
                                                                <?php
                                                                    $itemMonths = [];
                                                                    foreach($months as $month) {
                                                                        $itemMonths[$month] = old('items.'.$mooeIndex.'.month.'.$month, $item['ppmp_sched_'.$month] ?? 0);
                                                                    }
                                                                ?>
                                                                <?php foreach($months as $month): ?>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="<?= $month ?>_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][<?= $month ?>]" <?= ($itemMonths[$month] ?? 0) ? 'checked' : '' ?>>
                                                                </div>
                                                                <?php endforeach; ?>
                                                            </td>
                                                            <td class="delete-item-row text-center">
                                                                <ul class="table-controls">
                                                                    <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <?php $mooeIndex++; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else: ?>
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
                                            <?php endif; ?>
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
                                    <?php if(session('errors.items_co')): ?>
                                        <div class="alert alert-danger"><?= session('errors.items_co') ?></div>
                                    <?php endif; ?>
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
                                            <?php $coIndex = 0; ?>
                                            <?php if (!empty(old('items_co'))): ?>
                                                <?php foreach (old('items_co') as $index => $item): ?>
                                                    <tr>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items_co.'.$index.'.code')) ? 'is-invalid' : '' ?>" name="items_co[<?= $index ?>][code]" value="<?= esc($item['code']) ?>">
                                                            <?php if(session('errors.items_co.'.$index.'.code')): ?><div class="invalid-feedback"><?= session('errors.items_co.'.$index.'.code') ?></div><?php endif; ?>
                                                        </td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items_co.'.$index.'.gen_desc')) ? 'is-invalid' : '' ?>" name="items_co[<?= $index ?>][gen_desc]" value="<?= esc($item['gen_desc']) ?>">
                                                            <?php if(session('errors.items_co.'.$index.'.gen_desc')): ?><div class="invalid-feedback"><?= session('errors.items_co.'.$index.'.gen_desc') ?></div><?php endif; ?>
                                                        </td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items_co.'.$index.'.qty_size')) ? 'is-invalid' : '' ?>" name="items_co[<?= $index ?>][qty_size]" value="<?= esc($item['qty_size']) ?>">
                                                            <?php if(session('errors.items_co.'.$index.'.qty_size')): ?><div class="invalid-feedback"><?= session('errors.items_co.'.$index.'.qty_size') ?></div><?php endif; ?>
                                                        </td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items_co.'.$index.'.est_budget')) ? 'is-invalid' : '' ?>" name="items_co[<?= $index ?>][est_budget]" value="<?= esc($item['est_budget']) ?>">
                                                            <?php if(session('errors.items_co.'.$index.'.est_budget')): ?><div class="invalid-feedback"><?= session('errors.items_co.'.$index.'.est_budget') ?></div><?php endif; ?>
                                                        </td>
                                                        <td class="d-flex justify-content-between px-0 ps-1 py-3">
                                                            <?php $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec']; ?>
                                                            <?php foreach($months as $month): ?>
                                                            <div class="form-check form-check-danger form-check-inline">
                                                                <input class="form-check-input" type="checkbox" value="1" name="items_co[<?= $index ?>][month][<?= $month ?>]" <?= isset($item['month'][$month]) ? 'checked' : '' ?>>
                                                            </div>
                                                            <?php endforeach; ?>
                                                        </td>
                                                        <td class="delete-item-row-co text-center">
                                                            <ul class="table-controls">
                                                                <li class="p-2"><a href="javascript:void(0);" class="delete-item-co" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php $coIndex = $index + 1; ?>
                                                <?php endforeach; ?>
                                            <?php elseif (!empty($ppmp_items)): ?>
                                                <?php foreach ($ppmp_items as $item): ?>
                                                    <?php if (($item['ppmp_item_estimated_budget'] ?? 0) >= 50000): ?>
                                                        <tr>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items_co.'.$coIndex.'.code')) ? 'is-invalid' : '' ?>" id="code_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][code]" value="<?= esc(old('items_co.'.$coIndex.'.code', $item['ppmp_item_code'] ?? '')) ?>">
                                                                <?php if(session('errors.items_co.'.$coIndex.'.code')): ?>
                                                                    <div class="invalid-feedback"><?= session('errors.items_co.'.$coIndex.'.code') ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items_co.'.$coIndex.'.gen_desc')) ? 'is-invalid' : '' ?>" id="gen-desc_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][gen_desc]" value="<?= esc(old('items_co.'.$coIndex.'.gen_desc', $item['ppmp_item_name'] ?? '')) ?>">
                                                                <?php if(session('errors.items_co.'.$coIndex.'.gen_desc')): ?>
                                                                    <div class="invalid-feedback"><?= session('errors.items_co.'.$coIndex.'.gen_desc') ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items_co.'.$coIndex.'.qty_size')) ? 'is-invalid' : '' ?>" id="qty-size_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][qty_size]" value="<?= esc(old('items_co.'.$coIndex.'.qty_size', $item['ppmp_item_quantity'] ?? '')) ?>">
                                                                <?php if(session('errors.items_co.'.$coIndex.'.qty_size')): ?>
                                                                    <div class="invalid-feedback"><?= session('errors.items_co.'.$coIndex.'.qty_size') ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm <?= (session('errors.items_co.'.$coIndex.'.est_budget')) ? 'is-invalid' : '' ?>" id="est-budget_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][est_budget]" value="<?= esc(old('items_co.'.$coIndex.'.est_budget', $item['ppmp_item_estimated_budget'] ?? '')) ?>">
                                                                <?php if(session('errors.items_co.'.$coIndex.'.est_budget')): ?>
                                                                    <div class="invalid-feedback"><?= session('errors.items_co.'.$coIndex.'.est_budget') ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="d-flex justify-content-between px-0 ps-1 py-3">
                                                                <?php $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec']; ?>
                                                                <?php
                                                                    $itemMonths = [];
                                                                    foreach($months as $month) {
                                                                        $itemMonths[$month] = old('items_co.'.$coIndex.'.month.'.$month, $item['ppmp_sched_'.$month] ?? 0);
                                                                    }
                                                                ?>
                                                                <?php foreach($months as $month): ?>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="<?= $month ?>_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][<?= $month ?>]" <?= ($itemMonths[$month] ?? 0) ? 'checked' : '' ?>>
                                                                </div>
                                                                <?php endforeach; ?>
                                                            </td>
                                                            <td class="delete-item-row-co text-center">
                                                                <ul class="table-controls">
                                                                    <li class="p-2"><a href="javascript:void(0);" class="delete-item-co" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <?php $coIndex++; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else: ?>
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
                                            <?php endif; ?>
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

                            <div class="row widget-content">
                                <div class="col-xl-12 col-md-4">
                                    <button type="submit" class="btn btn-submit w-100 warning save" style="background-color: #C62742; color: #FFFFFF">Save</button>
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