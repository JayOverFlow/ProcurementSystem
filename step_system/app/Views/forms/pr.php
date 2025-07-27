<form id="pr-form" action="<?= base_url('/pr/save') ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="pr_id" value="<?= esc($pr['pr_id'] ?? '') ?>">
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <?php
                $isReadOnly = isset($pr['pr_status']) && $pr['pr_status'] !== 'Draft';
                $errors = $errors ?? (session('errors') ?? []);
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

                <div class="row">
                    <div class="col-xl-9">

                        <div class="invoice-content">

                            <div class="invoice-detail-body">

                                <div class="invoice-detail-title d-flex flex-column text-start mb-0">
                                    <div>
                                        <h2 class="fw-bold" style="color: #8D0404">Purchase Request</h2>
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
                                                    <label for="pr-department" class="col-sm-3 col-form-label col-form-label-sm">Department</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm <?= isset($errors['pr_department']) ? 'is-invalid' : '' ?>" id="pr-department" name="pr_department" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option value="">Select</option>
                                                            <?php if(!empty($departments)): ?>
                                                                <?php foreach($departments as $department): ?>
                                                                    <?php $selected = (old('pr_department', $pr['pr_department'] ?? '') == $department['dep_id']) ? 'selected' : ''; ?>
                                                                    <option value="<?= esc($department['dep_id']) ?>" <?= $selected ?>><?= esc($department['dep_name']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <option value="">No Departments</option>
                                                            <?php endif;?>
                                                        </select>
                                                        <?php if (isset($errors['pr_department'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= $errors['pr_department'] ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="form-group row mt-4">
                                                    <label for="pr-section" class="col-sm-3 col-form-label col-form-label-sm">Section</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm <?= isset($errors['pr_section']) ? 'is-invalid' : '' ?>" id="pr-section" name="pr_section" value="<?= old('pr_section', $pr['pr_section'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <?php if (isset($errors['pr_section'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= $errors['pr_section'] ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>                                                     
                                                
                                            </div>
                                            
                                        </div>


                                        <div class="col-xl-5 invoice-address-client">

                                            <div class="invoice-address-client-fields">

                                                <div class="form-group row">
                                                    <label for="pr-no-date" class="col-sm-3 col-form-label col-form-label-sm">P.R. No. Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control form-control-sm <?= isset($errors['pr_no_date']) ? 'is-invalid' : '' ?>" id="pr-no-date" name="pr_no_date" value="<?= old('pr_no_date', $pr['pr_no_date'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <?php if (isset($errors['pr_no_date'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= $errors['pr_no_date'] ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="pr-sai-no-date" class="col-sm-3 col-form-label col-form-label-sm">SAI. No. Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control form-control-sm <?= isset($errors['pr_sai_no_date']) ? 'is-invalid' : '' ?>" id="pr-sai-no-date" name="pr_sai_no_date" value="<?= old('pr_sai_no_date', $pr['pr_sai_no_date'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <?php if (isset($errors['pr_sai_no_date'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= $errors['pr_sai_no_date'] ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    
                                </div>

                                <hr class="my-5">

                                <div class="invoice-detail-items pt-0">

                                    <div class="table-responsive">
                                        <table class="table item-table <?= isset($errors['items']) ? 'border border-danger' : '' ?>">
                                            <thead>
                                                <tr>
                                                    <th class="col-1 text-center">Qty.</th>
                                                    <th class="col-1 text-center">Unit</th>
                                                    <th class="col-3 text-center">Description</th>
                                                    <th class="col-1 text-center">Unit Cost</th>
                                                    <th class="col-1 text-center">Total Cost</th>
                                                    <th class="col-1 text-center">Action</th>
                                                </tr>
                                                <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty(old('items')) || !empty($pr_items)): ?>
                                                    <?php $items = old('items', $pr_items); ?>
                                                    <?php foreach ($items as $index => $item): ?>
                                                        <tr>
                                                            <td class="px-1">
                                                                <input type="number" class="form-control form-control-sm <?= isset($errors["items.$index.pr_items_quantity"]) ? 'is-invalid' : '' ?>" name="items[<?= $index ?>][pr_items_quantity]" value="<?= old("items.$index.pr_items_quantity", $item['pr_items_quantity'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items.$index.pr_items_quantity"])): ?>
                                                                    <div class="invalid-feedback">
                                                                        <?= $errors["items.$index.pr_items_quantity"] ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?= isset($errors["items.$index.pr_items_unit"]) ? 'is-invalid' : '' ?>" name="items[<?= $index ?>][pr_items_unit]" value="<?= old("items.$index.pr_items_unit", $item['pr_items_unit'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items.$index.pr_items_unit"])): ?>
                                                                    <div class="invalid-feedback">
                                                                        <?= $errors["items.$index.pr_items_unit"] ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?= isset($errors["items.$index.pr_items_descrip"]) ? 'is-invalid' : '' ?>" name="items[<?= $index ?>][pr_items_descrip]" value="<?= old("items.$index.pr_items_descrip", $item['pr_items_descrip'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items.$index.pr_items_descrip"])): ?>
                                                                    <div class="invalid-feedback">
                                                                        <?= $errors["items.$index.pr_items_descrip"] ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="number" step="0.01" class="form-control form-control-sm unit-cost <?= isset($errors["items.$index.pr_items_cost"]) ? 'is-invalid' : '' ?>" name="items[<?= $index ?>][pr_items_cost]" value="<?= old("items.$index.pr_items_cost", $item['pr_items_cost'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <?php if (isset($errors["items.$index.pr_items_cost"])): ?>
                                                                    <div class="invalid-feedback">
                                                                        <?= $errors["items.$index.pr_items_cost"] ?>
                                                                    </div>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm total-cost" name="items[<?= $index ?>][pr_items_total_cost]" value="<?= old("items.$index.pr_items_total_cost", $item['pr_items_total_cost'] ?? '') ?>" readonly>
                                                            </td>
                                                            <td class="delete-item-row text-center">
                                                                <ul class="table-controls">
                                                                    <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete" <?= $isReadOnly ? 'style="pointer-events: none; color: grey;"' : '' ?>><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td class="px-1">
                                                            <input type="number" class="form-control form-control-sm <?= isset($errors['items.0.pr_items_quantity']) ? 'is-invalid' : '' ?>" name="items[0][pr_items_quantity]" value="<?= old('items.0.pr_items_quantity', '') ?>">
                                                            <?php if (isset($errors['items.0.pr_items_quantity'])): ?>
                                                                <div class="invalid-feedback">
                                                                    <?= $errors['items.0.pr_items_quantity'] ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="px-1">
                                                            <input type="text" class="form-control form-control-sm <?= isset($errors['items.0.pr_items_unit']) ? 'is-invalid' : '' ?>" name="items[0][pr_items_unit]" value="<?= old('items.0.pr_items_unit', '') ?>">
                                                            <?php if (isset($errors['items.0.pr_items_unit'])): ?>
                                                                <div class="invalid-feedback">
                                                                    <?= $errors['items.0.pr_items_unit'] ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="px-1">
                                                            <input type="text" class="form-control form-control-sm <?= isset($errors['items.0.pr_items_descrip']) ? 'is-invalid' : '' ?>" name="items[0][pr_items_descrip]" value="<?= old('items.0.pr_items_descrip', '') ?>">
                                                            <?php if (isset($errors['items.0.pr_items_descrip'])): ?>
                                                                <div class="invalid-feedback">
                                                                    <?= $errors['items.0.pr_items_descrip'] ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="px-1">
                                                            <input type="number" step="0.01" class="form-control form-control-sm unit-cost <?= isset($errors['items.0.pr_items_cost']) ? 'is-invalid' : '' ?>" name="items[0][pr_items_cost]" value="<?= old('items.0.pr_items_cost', '') ?>">
                                                            <?php if (isset($errors['items.0.pr_items_cost'])): ?>
                                                                <div class="invalid-feedback">
                                                                    <?= $errors['items.0.pr_items_cost'] ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="px-1">
                                                            <input type="text" class="form-control form-control-sm total-cost" name="items[0][pr_items_total_cost]" value="<?= old('items.0.pr_items_total_cost', '') ?>" readonly>
                                                        </td>
                                                        <td class="delete-item-row text-center">
                                                            <ul class="table-controls">
                                                                <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if (isset($errors['items'])): ?>
                                                    <tr><td colspan="6"><div class="invalid-feedback d-block text-center"> <?= $errors['items'] ?> </div></td></tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-flex justify-content-between">

                                        <button type="button" class="btn btn-md additem" style="background-color: #8D0404; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Add Item</button>

                                        <p class="mt-2"><span class="fw-bold">Total Amount: </span>₱<span id="total-amount-pr">0</span></p>
                                    </div>
                                    
                                </div>

                                <hr class="my-5">

                                <div class="invoice-detail-note border-top-0">

                                    <div class="row justify-content-between">
                                    
                                        <div class="col-xl-5 invoice-address-client">

                                            <h4>Requested By:</h4>

                                            <div class="invoice-address-client-fields ms-5">

                                                <div class="form-group">
                                                    <label for="pr-requested-by-name" class="col-sm-3 col-form-label col-form-label-sm">Printed Name</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm <?= isset($errors['pr_requested_by_name']) ? 'is-invalid' : '' ?>" id="pr-requested-by-name" name="pr_requested_by_name" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option value="">Select</option>
                                                            <?php if(!empty($users)): ?>
                                                                <?php foreach($users as $user): ?>
                                                                    <?php $selected = (old('pr_requested_by_name', $pr['pr_requested_by_name'] ?? '') == $user['user_id']) ? 'selected' : ''; ?>
                                                                    <option value="<?= esc($user['user_id']) ?>" <?= $selected ?>><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <option value="">No Users</option>
                                                            <?php endif;?>
                                                        </select>
                                                        <?php if (isset($errors['pr_requested_by_name'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= $errors['pr_requested_by_name'] ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="pr-requested-by-designation" class="col-sm-3 col-form-label col-form-label-sm">Designation</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm <?= isset($errors['pr_requested_by_designation']) ? 'is-invalid' : '' ?>" id="pr-requested-by-designation" name="pr_requested_by_designation" value="<?= old('pr_requested_by_designation', $pr['pr_requested_by_designation'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <?php if (isset($errors['pr_requested_by_designation'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= $errors['pr_requested_by_designation'] ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="col-xl-5 invoice-address-client">

                                            <h4>Approved By:</h4>

                                            <div class="invoice-address-client-fields ms-5">

                                                <div class="form-group">
                                                    <label for="pr-approved-by-name" class="col-sm-3 col-form-label col-form-label-sm">Printed Name</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm <?= isset($errors['pr_approved_by_name']) ? 'is-invalid' : '' ?>" id="pr-approved-by-name" name="pr_approved_by_name" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option value="">Select</option>
                                                            <?php if(!empty($users)): ?>
                                                                <?php foreach($users as $user): ?>
                                                                    <?php $selected = (old('pr_approved_by_name', $pr['pr_approved_by_name'] ?? '') == $user['user_id']) ? 'selected' : ''; ?>
                                                                    <option value="<?= esc($user['user_id']) ?>" <?= $selected ?>><?= esc($user['user_fullname']) ?></option>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <option value="">No Users</option>
                                                            <?php endif;?>
                                                        </select>
                                                        <?php if (isset($errors['pr_approved_by_name'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= $errors['pr_approved_by_name'] ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="pr-approved-by-designation" class="col-sm-3 col-form-label col-form-label-sm">Designation</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm <?= isset($errors['pr_approved_by_designation']) ? 'is-invalid' : '' ?>" id="pr-approved-by-designation" name="pr_approved_by_designation" value="<?= old('pr_approved_by_designation', $pr['pr_approved_by_designation'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <?php if (isset($errors['pr_approved_by_designation'])): ?>
                                                            <div class="invalid-feedback">
                                                                <?= $errors['pr_approved_by_designation'] ?>
                                                            </div>
                                                        <?php endif; ?>
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
                                        <button type="submit" formaction="<?= base_url('pr/save') ?>" class="btn btn-submit w-100 warning save-pr" style="background-color: #C62742; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Save</button>
                                    </div>
                                    <div class="col-xl-12 col-md-4">
                                        <button type="submit" formaction="<?= base_url('pr/submit') ?>" class="btn btn-submit w-100 warning submit-pr" style="background-color: #C62742; color: #FFFFFF" <?= (!isset($pr['pr_id']) || empty($pr['pr_id']) || $isReadOnly) ? 'disabled' : '' ?>>Submit</button>
                                    </div>
                                    <div class="col-xl-12 col-md-4">
                                        <button class="btn btn-submit w-100" style="background-color: #C62742; color: #FFFFFF">Export</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                
                
            </div>

        </div>
    </div>
</form>