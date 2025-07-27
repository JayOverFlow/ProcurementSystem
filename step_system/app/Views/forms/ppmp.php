<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <?php
            $isReadOnly = isset($ppmp['ppmp_status']) && $ppmp['ppmp_status'] !== 'Draft';
            $errors = session()->getFlashdata('errors') ?? [];
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
                        text: '<?= is_array(session()->getFlashdata('error')) ? implode('<br>', session()->getFlashdata('error')) : session()->getFlashdata('error') ?>',
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
                                                    <select class="form-control form-control-sm <?= isset($errors['ppmp_office_fk']) ? 'is-invalid' : '' ?>" id="ppmp-office-fk" name="ppmp_office_fk" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <option value="0">Select</option>
                                                        <?php if(empty($departments)): ?>
                                                            <option value="null">No Offices</option>
                                                        <?php else: ?>
                                                            <?php foreach($departments as $department): /* Pre-populate selected department if editing */?>
                                                                <option value="<?= esc($department['dep_id']) ?>" <?= (old('ppmp_office_fk', $ppmp['ppmp_office_fk'] ?? '') == $department['dep_id']) ? 'selected' : '' ?>><?= esc($department['dep_name']) ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif;?>
                                                    </select>
                                                    <?php if (isset($errors['ppmp_office_fk'])): ?>
                                                        <div class="invalid-feedback">
                                                            <?= esc($errors['ppmp_office_fk']) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="ms-3">
                                                <h4 class="mt-3">Prepared By:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position1" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm <?= isset($errors['ppmp_prepared_by_position']) ? 'is-invalid' : '' ?>" id="ppmp-prepared-by-position" name="ppmp_prepared_by_position" value="<?= esc(old('ppmp_prepared_by_position', $ppmp['ppmp_prepared_by_position'] ?? '')) /* Pre-populate position */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <?php if (isset($errors['ppmp_prepared_by_position'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= esc($errors['ppmp_prepared_by_position']) ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel1" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm <?= isset($errors['ppmp_prepared_by_name']) ? 'is-invalid' : '' ?>" id="ppmp-prepared-by-name" name="ppmp_prepared_by_name" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option value="0">Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                        <?php else: ?>
                                                                <?php foreach($users as $user): /* Pre-populate selected user */?>
                                                                    <option value="<?= esc($user['user_id']) ?>" <?= (old('ppmp_prepared_by_name', $ppmp['ppmp_prepared_by_name'] ?? '') == $user['user_id']) ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                        </select>
                                                        <?php if (isset($errors['ppmp_prepared_by_name'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= esc($errors['ppmp_prepared_by_name']) ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <h4 class="mt-3">Recommended:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position2" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm <?= isset($errors['ppmp_recommended_by_position']) ? 'is-invalid' : '' ?>" id="ppmp-recommended-by-position" name="ppmp_recommended_by_position" value="<?= esc(old('ppmp_recommended_by_position', $ppmp['ppmp_recommended_by_position'] ?? '')) /* Pre-populate position */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <?php if (isset($errors['ppmp_recommended_by_position'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= esc($errors['ppmp_recommended_by_position']) ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel2" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm <?= isset($errors['ppmp_recommended_by_name']) ? 'is-invalid' : '' ?>" id="ppmp-recommended-by-name" name="ppmp_recommended_by_name" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option value="0">Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                            <?php else: ?>
                                                                <?php foreach($users as $user): /* Pre-populate selected user */?>
                                                                    <option value="<?= esc($user['user_id']) ?>" <?= (old('ppmp_recommended_by_name', $ppmp['ppmp_recommended_by_name'] ?? '') == $user['user_id']) ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                        </select>
                                                        <?php if (isset($errors['ppmp_recommended_by_name'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= esc($errors['ppmp_recommended_by_name']) ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div> 
                                                
                                                <h4 class="mt-3">Evaluated & Approved By:</h4>
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="position3" class="col-sm-3 col-form-label col-form-label-sm">Position</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm <?= isset($errors['ppmp_evaluated_by_position']) ? 'is-invalid' : '' ?>" id="ppmp-evaluated-by-position" name="ppmp_evaluated_by_position" value="<?= esc(old('ppmp_evaluated_by_position', $ppmp['ppmp_evaluated_by_position'] ?? '')) /* Pre-populate position */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <?php if (isset($errors['ppmp_evaluated_by_position'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= esc($errors['ppmp_evaluated_by_position']) ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>    
                                                
                                                <div class="form-group row mt-4 ms-1">
                                                    <label for="personel3" class="col-sm-3 col-form-label col-form-label-sm">Personel</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm <?= isset($errors['ppmp_evaluated_by_name']) ? 'is-invalid' : '' ?>" id="ppmp-evaluated-by-name" name="ppmp_evaluated_by_name" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option value="0">Select</option>
                                                            <?php if(empty($users)): ?>
                                                                <option value="null">No Users</option>
                                                            <?php else: ?>
                                                                <?php foreach($users as $user): /* Pre-populate selected user */?>
                                                                    <option value="<?= esc($user['user_id']) ?>" <?= (old('ppmp_evaluated_by_name', $ppmp['ppmp_evaluated_by_name'] ?? '') == $user['user_id']) ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                        </select>
                                                        <?php if (isset($errors['ppmp_evaluated_by_name'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= esc($errors['ppmp_evaluated_by_name']) ?>
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
                                                    <input type="text" class="form-control form-control-sm <?= isset($errors['ppmp_period_covered']) ? 'is-invalid' : '' ?>" id="ppmp-period-covered" name="ppmp_period_covered" placeholder="YYYY" value="<?= esc(old('ppmp_period_covered', $ppmp['ppmp_period_covered'] ?? '')) /* Pre-populate period covered */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    <?php if (isset($errors['ppmp_period_covered'])): ?>
                                                        <div class="invalid-feedback">
                                                            <?= esc($errors['ppmp_period_covered']) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="date-approved" class="col-sm-3 col-form-label col-form-label-sm">Date Approved</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="ppmp-date-approved" name="ppmp_date_approved" placeholder="MM/DD/YYYY" value="<?= esc(old('ppmp_date_approved', $ppmp['ppmp_date_approved'] ?? '')) /* Pre-populate date approved */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="ttl-budget-allocated" class="col-sm-3 col-form-label col-form-label-sm">Total Budget Allocated</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm money <?= isset($errors['ppmp_total_budget_allocated']) ? 'is-invalid' : '' ?>" id="ppmp-total-budget-allocated" name="ppmp_total_budget_allocated" value="<?= esc(old('ppmp_total_budget_allocated', $ppmp['ppmp_total_budget_allocated'] ?? '')) /* Pre-populate total budget allocated */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    <?php if (isset($errors['ppmp_total_budget_allocated'])): ?>
                                                        <div class="invalid-feedback">
                                                            <?= esc($errors['ppmp_total_budget_allocated']) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <div class="form-group row mt-4">
                                                <label for="ttl-proposed-budget" class="col-sm-3 col-form-label col-form-label-sm">Total Proposed Budget</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm money <?= isset($errors['ppmp_total_proposed_budget']) ? 'is-invalid' : '' ?>" id="ppmp-total-proposed-budget" name="ppmp_total_proposed_budget" value="<?= esc(old('ppmp_total_proposed_budget', $ppmp['ppmp_total_proposed_budget'] ?? '')) /* Pre-populate total proposed budget */?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    <?php if (isset($errors['ppmp_total_proposed_budget'])): ?>
                                                        <div class="invalid-feedback">
                                                            <?= esc($errors['ppmp_total_proposed_budget']) ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>
                                
                            </div>

                            <?php if (isset($errors['items'])): ?>
                            <div class="alert alert-danger my-3">
                                <?= esc($errors['items']) ?>
                            </div>
                            <?php endif; ?>

                            <hr class="my-3">
                                <p class="px-5" style= "text-align: center;"> MOOE/ANY SUPPLIES, MATERIALS AND EQUIPMENT (BELOW PHP 50,000.00/ITEM) </p>
                            <hr class="my-3">

                            <div class="invoice-detail-items pt-0">
                                <div class="table-responsive">
                                    <table class="table item-table <?php if (isset($errors['items'])) echo 'border border-danger'; ?>">
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
                                            <?php 
                                                $mooeItems = old('items', $ppmp_items);
                                                $mooeIndex = 0; 
                                            ?>
                                            <?php if (!empty($mooeItems)): ?>
                                                <?php foreach ($mooeItems as $item): ?>
                                                    <?php if ((isset($item['ppmp_item_estimated_budget']) && $item['ppmp_item_estimated_budget'] < 50000) || !isset($item['ppmp_item_estimated_budget'])): ?>
                                                        <tr>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?= isset($errors["items.{$mooeIndex}.code"]) ? 'is-invalid' : '' ?>" id="code_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][code]" value="<?= esc($item['ppmp_item_code'] ?? ($item['code'] ?? '')) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items.{$mooeIndex}.code"])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors["items.{$mooeIndex}.code"]) ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?= isset($errors["items.{$mooeIndex}.gen_desc"]) ? 'is-invalid' : '' ?>" id="gen-desc_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][gen_desc]" value="<?= esc($item['ppmp_item_name'] ?? ($item['gen_desc'] ?? '')) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items.{$mooeIndex}.gen_desc"])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors["items.{$mooeIndex}.gen_desc"]) ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm money <?= isset($errors["items.{$mooeIndex}.qty_size"]) ? 'is-invalid' : '' ?>" id="qty-size_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][qty_size]" value="<?= esc($item['ppmp_item_quantity'] ?? ($item['qty_size'] ?? '')) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items.{$mooeIndex}.qty_size"])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors["items.{$mooeIndex}.qty_size"]) ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm money <?= isset($errors["items.{$mooeIndex}.est_budget"]) ? 'is-invalid' : '' ?>" id="est-budget_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][est_budget]" value="<?= esc($item['ppmp_item_estimated_budget'] ?? ($item['est_budget'] ?? '')) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items.{$mooeIndex}.est_budget"])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors["items.{$mooeIndex}.est_budget"]) ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="d-flex justify-content-between px-0 ps-1 py-2">
                                                                <?php $months = $item['month'] ?? []; ?>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jan_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][jan]" <?= (isset($item['ppmp_sched_jan']) && $item['ppmp_sched_jan']) || (isset($months['jan'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="feb_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][feb]" <?= (isset($item['ppmp_sched_feb']) && $item['ppmp_sched_feb']) || (isset($months['feb'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="mar_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][mar]" <?= (isset($item['ppmp_sched_mar']) && $item['ppmp_sched_mar']) || (isset($months['mar'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="apr_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][apr]" <?= (isset($item['ppmp_sched_apr']) && $item['ppmp_sched_apr']) || (isset($months['apr'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="may_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][may]" <?= (isset($item['ppmp_sched_may']) && $item['ppmp_sched_may']) || (isset($months['may'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jun_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][jun]" <?= (isset($item['ppmp_sched_jun']) && $item['ppmp_sched_jun']) || (isset($months['jun'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jul_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][jul]" <?= (isset($item['ppmp_sched_jul']) && $item['ppmp_sched_jul']) || (isset($months['jul'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="aug_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][aug]" <?= (isset($item['ppmp_sched_aug']) && $item['ppmp_sched_aug']) || (isset($months['aug'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="sep_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][sep]" <?= (isset($item['ppmp_sched_sep']) && $item['ppmp_sched_sep']) || (isset($months['sep'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="oct_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][oct]" <?= (isset($item['ppmp_sched_oct']) && $item['ppmp_sched_oct']) || (isset($months['oct'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="nov_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][nov]" <?= (isset($item['ppmp_sched_nov']) && $item['ppmp_sched_nov']) || (isset($months['nov'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="dec_<?= $mooeIndex ?>" name="items[<?= $mooeIndex ?>][month][dec]" <?= (isset($item['ppmp_sched_dec']) && $item['ppmp_sched_dec']) || (isset($months['dec'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
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
                                            <?php else: ?>
                                                <tr>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][code]"></td>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][gen_desc]"></td>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm money" name="items[0][qty_size]"></td>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm money" name="items[0][est_budget]"></td>
                                                    <td class="d-flex justify-content-between px-0 ps-1 py-2">
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][jan]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][feb]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][mar]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][apr]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][may]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][jun]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][jul]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][aug]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][sep]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][oct]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][nov]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items[0][month][dec]">
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
                                    <table class="table item-table-co <?php if (isset($errors['items'])) echo 'border border-danger'; ?>">
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
                                            <?php 
                                                $coItems = old('items_co', $ppmp_items);
                                                $coIndex = 0; 
                                            ?>
                                            <?php if (!empty($coItems)): ?>
                                                <?php foreach ($coItems as $item): ?>
                                                    <?php if ((isset($item['ppmp_item_estimated_budget']) && $item['ppmp_item_estimated_budget'] >= 50000) || !isset($item['ppmp_item_estimated_budget'])): ?>
                                                        <tr>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?= isset($errors["items_co.{$coIndex}.code"]) ? 'is-invalid' : '' ?>" id="code_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][code]" value="<?= esc($item['ppmp_item_code'] ?? ($item['code'] ?? '')) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items_co.{$coIndex}.code"])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors["items_co.{$coIndex}.code"]) ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?= isset($errors["items_co.{$coIndex}.gen_desc"]) ? 'is-invalid' : '' ?>" id="gen-desc_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][gen_desc]" value="<?= esc($item['ppmp_item_name'] ?? ($item['gen_desc'] ?? '')) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items_co.{$coIndex}.gen_desc"])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors["items_co.{$coIndex}.gen_desc"]) ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm money <?= isset($errors["items_co.{$coIndex}.qty_size"]) ? 'is-invalid' : '' ?>" id="qty-size_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][qty_size]" value="<?= esc($item['ppmp_item_quantity'] ?? ($item['qty_size'] ?? '')) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items_co.{$coIndex}.qty_size"])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors["items_co.{$coIndex}.qty_size"]) ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm money <?= isset($errors["items_co.{$coIndex}.est_budget"]) ? 'is-invalid' : '' ?>" id="est-budget_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][est_budget]" value="<?= esc($item['ppmp_item_estimated_budget'] ?? ($item['est_budget'] ?? '')) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items_co.{$coIndex}.est_budget"])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors["items_co.{$coIndex}.est_budget"]) ?></div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="d-flex justify-content-between px-0 ps-1 py-3">
                                                                <?php $months = $item['month'] ?? []; ?>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jan_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][jan]" <?= (isset($item['ppmp_sched_jan']) && $item['ppmp_sched_jan']) || (isset($months['jan'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="feb_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][feb]" <?= (isset($item['ppmp_sched_feb']) && $item['ppmp_sched_feb']) || (isset($months['feb'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="mar_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][mar]" <?= (isset($item['ppmp_sched_mar']) && $item['ppmp_sched_mar']) || (isset($months['mar'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="apr_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][apr]" <?= (isset($item['ppmp_sched_apr']) && $item['ppmp_sched_apr']) || (isset($months['apr'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="may_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][may]" <?= (isset($item['ppmp_sched_may']) && $item['ppmp_sched_may']) || (isset($months['may'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jun_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][jun]" <?= (isset($item['ppmp_sched_jun']) && $item['ppmp_sched_jun']) || (isset($months['jun'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="jul_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][jul]" <?= (isset($item['ppmp_sched_jul']) && $item['ppmp_sched_jul']) || (isset($months['jul'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="aug_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][aug]" <?= (isset($item['ppmp_sched_aug']) && $item['ppmp_sched_aug']) || (isset($months['aug'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="sep_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][sep]" <?= (isset($item['ppmp_sched_sep']) && $item['ppmp_sched_sep']) || (isset($months['sep'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="oct_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][oct]" <?= (isset($item['ppmp_sched_oct']) && $item['ppmp_sched_oct']) || (isset($months['oct'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="nov_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][nov]" <?= (isset($item['ppmp_sched_nov']) && $item['ppmp_sched_nov']) || (isset($months['nov'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                                <div class="form-check form-check-danger form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" value="1" id="dec_co_<?= $coIndex ?>" name="items_co[<?= $coIndex ?>][month][dec]" <?= (isset($item['ppmp_sched_dec']) && $item['ppmp_sched_dec']) || (isset($months['dec'])) ? 'checked' : '' ?> <?= $isReadOnly ? 'disabled' : '' ?>>
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
                                            <?php else: ?>
                                                <tr>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items_co[0][code]"></td>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items_co[0][gen_desc]"></td>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm money" name="items_co[0][qty_size]"></td>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm money" name="items_co[0][est_budget]"></td>
                                                    <td class="d-flex justify-content-between px-0 ps-1 py-3">
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][jan]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][feb]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][mar]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][apr]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][may]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][jun]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][jul]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][aug]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][sep]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][oct]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][nov]">
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <input class="form-check-input" type="checkbox" value="1" name="items_co[0][month][dec]">
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