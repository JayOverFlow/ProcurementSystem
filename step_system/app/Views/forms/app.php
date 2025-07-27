<?php $errors = session()->get('errors'); ?>
<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <?php
            $isReadOnly = isset($app['app_status']) && $app['app_status'] !== 'Draft';
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
            <form id="app-form" action="<?= base_url('app/save') ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="app_id" value="<?= esc($app['app_id'] ?? '') ?>">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="invoice-content">
                            <div class="invoice-detail-body">
                                <div class="invoice-detail-title d-flex flex-column text-start mb-0">
                                    <div>
                                        <h2 class="fw-bold" style="color: #C62742">ANNUAL PROCUREMENT PLAN</h2>
                                    </div>
                                    <div class="d-flex justify-content-start gap-3">
                                        <p class="col-auto text-start mb-0">FM-SUP-001</p>
                                        <p class="col-auto text-start mb-0">REV 0</p>
                                        <p class="col-auto text-start mb-0">09NOV2016</p>
                                    </div>
                                </div>

                                <hr class="my-5 mb-0">

                                <div class="invoice-detail-items pt-0">
                                    <p class="col-auto text-start mt-3 mb-3">Annual Procurement Plan for FY 2025</p>
                                    <?php if (isset($errors['items']) && is_string($errors['items'])): ?>
                                        <div class="alert alert-danger text-center"><?= esc($errors['items']) ?></div>
                                    <?php endif; ?>
                                    <div class="table-responsive">
                                        <table class="table item-table <?php if (isset($errors['items']) && is_string($errors['items'])): ?>border border-danger<?php endif; ?>">
                                            <thead>
                                                <tr>
                                                    <th class="col-1 text-center">Code</th>
                                                    <th class="col-2 text-center">Procurement Program/ Project</th>
                                                    <th class="col-1 text-center">PMO/<br>End User</th>
                                                    <th class="col-1 text-center">Mode of<br>Procurement</th>
                                                    <th class="col-4 text-center schedules-header">Schedules for Each Procurement Activity<br>
                                                        <small>
                                                            <span style="display: inline-block; width: 23%;">Ads/Post of IB/REI</span>
                                                            <span style="display: inline-block; width: 23%;">Sub/Open of Bids</span>
                                                            <span style="display: inline-block; width: 23%;">Notice of Award</span>
                                                            <span style="display: inline-block; width: 23%;">Contract Signing</span>
                                                        </small>
                                                    </th>
                                                    <th class="col-1 text-center">Source of<br>Funds</th>
                                                    <th class="col-1 text-center">Total</th>
                                                    <th class="col-1 text-center">MOOE</th>
                                                    <th class="col-1 text-center">CO</th>
                                                    <th class="col-auto text-center"></th>
                                                </tr>
                                                <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty(old('items')) || !empty($app_items)): ?>
                                                    <?php $items = old('items') ?? $app_items; ?>
                                                    <?php foreach ($items as $index => $item): ?>
                                                        <tr>

                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?php if(isset($errors['items.' . $index . '.app_item_code'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][app_item_code]" value="<?= esc($item['app_item_code'] ?? ($item['app_item_code'] ?? '')) ?>">
                                                                <?php if(isset($errors['items.' . $index . '.app_item_code'])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors['items.' . $index . '.app_item_code']) ?></div>
                                                                <?php endif ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?php if(isset($errors['items.' . $index . '.procurement_project'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][procurement_project]" value="<?= esc($item['app_item_name'] ?? ($item['procurement_project'] ?? '')) ?>">
                                                                <?php if(isset($errors['items.' . $index . '.procurement_project'])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors['items.' . $index . '.procurement_project']) ?></div>
                                                                <?php endif ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?php if(isset($errors['items.' . $index . '.pmo_end_user'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][pmo_end_user]" value="<?= esc($item['app_item_pmo'] ?? ($item['pmo_end_user'] ?? '')) ?>">
                                                                <?php if(isset($errors['items.' . $index . '.pmo_end_user'])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors['items.' . $index . '.pmo_end_user']) ?></div>
                                                                <?php endif ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?php if(isset($errors['items.' . $index . '.mode_of_procurement'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][mode_of_procurement]" value="<?= esc($item['app_item_mode'] ?? ($item['mode_of_procurement'] ?? '')) ?>">
                                                                <?php if(isset($errors['items.' . $index . '.mode_of_procurement'])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors['items.' . $index . '.mode_of_procurement']) ?></div>
                                                                <?php endif ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <div class="d-flex justify-content-between">
                                                                    <input type="text" class="form-control form-control-sm me-1 text-center <?php if(isset($errors['items.' . $index . '.ads_post'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][ads_post]" value="<?= esc($item['app_item_adspost'] ?? ($item['ads_post'] ?? '')) ?>">
                                                                    <input type="text" class="form-control form-control-sm me-1 text-center <?php if(isset($errors['items.' . $index . '.sub_open'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][sub_open]" value="<?= esc($item['app_item_subopen'] ?? ($item['sub_open'] ?? '')) ?>">
                                                                    <input type="text" class="form-control form-control-sm me-1 text-center <?php if(isset($errors['items.' . $index . '.notice_award'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][notice_award]" value="<?= esc($item['app_item_notice'] ?? ($item['notice_award'] ?? '')) ?>">
                                                                    <input type="text" class="form-control form-control-sm me-1 <?php if(isset($errors['items.' . $index . '.contract_signing'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][contract_signing]" value="<?= esc($item['app_item_contract'] ?? ($item['contract_signing'] ?? '')) ?>">
                                                                </div>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?php if(isset($errors['items.' . $index . '.source_of_funds'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][source_of_funds]" value="<?= esc($item['app_item_source_fund'] ?? ($item['source_of_funds'] ?? '')) ?>">
                                                                <?php if(isset($errors['items.' . $index . '.source_of_funds'])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors['items.' . $index . '.source_of_funds']) ?></div>
                                                                <?php endif ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?php if(isset($errors['items.' . $index . '.total'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][total]" value="<?= esc($item['app_item_estimated_total'] ?? ($item['total'] ?? '')) ?>">
                                                                <?php if(isset($errors['items.' . $index . '.total'])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors['items.' . $index . '.total']) ?></div>
                                                                <?php endif ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?php if(isset($errors['items.' . $index . '.mooe'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][mooe]" value="<?= esc($item['app_item_estimated_mooe'] ?? ($item['mooe'] ?? '')) ?>">
                                                                <?php if(isset($errors['items.' . $index . '.mooe'])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors['items.' . $index . '.mooe']) ?></div>
                                                                <?php endif ?>
                                                            </td>
                                                            <td class="px-1">
                                                                <input type="text" class="form-control form-control-sm <?php if(isset($errors['items.' . $index . '.co'])): ?> is-invalid <?php endif ?>" name="items[<?= $index ?>][co]" value="<?= esc($item['app_item_estimated_co'] ?? ($item['co'] ?? '')) ?>">
                                                                <?php if(isset($errors['items.' . $index . '.co'])): ?>
                                                                    <div class="invalid-feedback"><?= esc($errors['items.' . $index . '.co']) ?></div>
                                                                <?php endif ?>
                                                            </td>


                                                            <td class="delete-item-row px-1 pt-2">
                                                                <ul class="table-controls">
                                                                    <li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete" <?= $isReadOnly ? 'style="pointer-events: none; color: grey;"' : '' ?>><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][app_item_code]"></td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][procurement_project]"></td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][pmo_end_user]"></td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][mode_of_procurement]"></td>
                                                        <td class="px-1">
                                                            <div class="d-flex justify-content-between">
                                                                <input type="text" class="form-control form-control-sm me-1 text-center" placeholder="" name="items[0][ads_post]">
                                                                <input type="text" class="form-control form-control-sm me-1 text-center" placeholder="" name="items[0][sub_open]">
                                                                <input type="text" class="form-control form-control-sm me-1 text-center" placeholder="" name="items[0][notice_award]">
                                                                <input type="text" class="form-control form-control-sm me-1" placeholder="" name="items[0][contract_signing]">
                                                            </div>
                                                        </td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][source_of_funds]"></td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][total]"></td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][mooe]"></td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][co]"></td>
                                                        <td class="delete-item-row px-1 pt-2">
                                                            <ul class="table-controls">
                                                                <li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-md additem" style="background-color: #C62742; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Add item</button>
                                        <p class="mt-2 text-end"><span class="fw-bold">TOTAL AMOUNT</span> <span class="ms-2">₱</span><span class="ms-2" id="total-amount-app">0.00</span></p>
                                    </div>
                                </div>

                                <hr class="my-5">

                                <div class="invoice-detail-note border-top-0">
                                    <div class="row prepared-by-section">
                                        <div class="col-xl-5 invoice-address-client">
                                            <div class="form-group row mb-3">
                                                <label for="app-dep-id-fk" class="col-sm-1 col-form-label col-form-label-sm me-4">Department</label>
                                                <div class="col-sm-9 ms-5">
                                                    <select class="form-control form-control-sm <?php if(isset($errors['app_dep_id_fk'])): ?> is-invalid <?php endif ?>" id="app-dep-id-fk" name="app_dep_id_fk">

                                                        <option>Select</option>
                                                        <?php if(!empty($departments)): ?>
                                                            <?php foreach($departments as $department): ?>
                                                                <option value="<?= esc($department['dep_id']) ?>" <?= (old('app_dep_id_fk') ?? ($app['app_dep_id_fk'] ?? '')) == $department['dep_id'] ? 'selected' : '' ?>><?= esc($department['dep_name']) ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif;?>
                                                    </select>
                                                    <?php if(isset($errors['app_dep_id_fk'])): ?>
                                                        <div class="invalid-feedback"><?= esc($errors['app_dep_id_fk']) ?></div>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                            <h4>Prepared By:</h4>
                                            <div class="invoice-address-client-fields custom-signature-fields">
                                                <div class="form-group">
                                                    <label for="app-prepared-by-name">Printed Name</label>
                                                    <div>
                                                        <select class="form-control form-control-sm <?php if(isset($errors['app_prepared_by_name'])): ?> is-invalid <?php endif ?>" id="app-prepared-by-name" name="app_prepared_by_name">

                                                            <option>Select</option>
                                                            <?php if(!empty($users)):
                                                                foreach($users as $user):
                                                                    $selected = (old('app_prepared_by_name') ?? ($app['app_prepared_by_name'] ?? '')) == $user['user_id'] ? 'selected' : '';
                                                                    echo "<option value='" . esc($user['user_id']) . "' $selected>" . esc($user['user_fullname']) . "</option>";
                                                                endforeach;
                                                            endif;?>
                                                        </select>
                                                        <?php if(isset($errors['app_prepared_by_name'])): ?>
                                                            <div class="invalid-feedback"><?= esc($errors['app_prepared_by_name']) ?></div>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="prepared-by-designation">Designation</label>
                                                    <div>
                                                        <input type="text" class="form-control form-control-sm <?php if(isset($errors['prepared_by_designation'])): ?> is-invalid <?php endif ?>" id="prepared-by-designation" name="prepared_by_designation" value="<?= old('prepared_by_designation') ?? esc($app['app_prepared_by_designation'] ?? '') ?>">
                                                        <?php if(isset($errors['prepared_by_designation'])): ?>
                                                            <div class="invalid-feedback"><?= esc($errors['prepared_by_designation']) ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-between signature-row-halves mt-4">
                                        <div class="col-xl-5 invoice-address-client">
                                            <h4>Approved By:</h4>
                                            <div class="invoice-address-client-fields custom-signature-fields">
                                                <div class="form-group">
                                                    <label for="app-approved-by-name">Printed Name</label>
                                                    <div>
                                                        <select class="form-control form-control-sm <?php if(isset($errors['app_approved_by_name'])): ?> is-invalid <?php endif ?>" id="app-approved-by-name" name="app_approved_by_name">

                                                            <option>Select</option>
                                                            <?php if(!empty($users)):
                                                                foreach($users as $user):
                                                                    $selected = (old('app_approved_by_name') ?? ($app['app_approved_by_name'] ?? '')) == $user['user_id'] ? 'selected' : '';
                                                                    echo "<option value='" . esc($user['user_id']) . "' $selected>" . esc($user['user_fullname']) . "</option>";
                                                                endforeach;
                                                            endif;?>
                                                        </select>
                                                        <?php if(isset($errors['app_approved_by_name'])): ?>
                                                            <div class="invalid-feedback"><?= esc($errors['app_approved_by_name']) ?></div>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="approved-by-designation">Designation</label>
                                                    <div>
                                                        <input type="text" class="form-control form-control-sm <?php if(isset($errors['approved_by_designation'])): ?> is-invalid <?php endif ?>" id="approved-by-designation" name="approved_by_designation" value="<?= old('approved_by_designation') ?? esc($app['app_approved_by_designation'] ?? '') ?>">
                                                        <?php if(isset($errors['approved_by_designation'])): ?>
                                                            <div class="invalid-feedback"><?= esc($errors['approved_by_designation']) ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-5 invoice-address-client">
                                            <h4>Recommending Approval:</h4>
                                            <div class="invoice-address-client-fields custom-signature-fields">
                                                <div class="form-group">
                                                    <label for="app-recommending-by-name">Printed Name</label>
                                                    <div>
                                                        <select class="form-control form-control-sm <?php if(isset($errors['app_recommending_by_name'])): ?> is-invalid <?php endif ?>" id="app-recommending-by-name" name="app_recommending_by_name">

                                                            <option>Select</option>
                                                            <?php if(!empty($users)):
                                                                foreach($users as $user):
                                                                    $selected = (old('app_recommending_by_name') ?? ($app['app_recommending_by_name'] ?? '')) == $user['user_id'] ? 'selected' : '';
                                                                    echo "<option value='" . esc($user['user_id']) . "' $selected>" . esc($user['user_fullname']) . "</option>";
                                                                endforeach;
                                                            endif;?>
                                                        </select>
                                                        <?php if(isset($errors['app_recommending_by_name'])): ?>
                                                            <div class="invalid-feedback"><?= esc($errors['app_recommending_by_name']) ?></div>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recommending_approval_designation">Designation</label>
                                                    <div>
                                                        <input type="text" class="form-control form-control-sm <?php if(isset($errors['recommending_approval_designation'])): ?> is-invalid <?php endif ?>" id="recommending_approval_designation" name="recommending_approval_designation" value="<?= old('recommending_approval_designation') ?? esc($app['app_recommending_by_designation'] ?? '') ?>">
                                                        <?php if(isset($errors['recommending_approval_designation'])): ?>
                                                            <div class="invalid-feedback"><?= esc($errors['recommending_approval_designation']) ?></div>
                                                        <?php endif ?>

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
                                <div class="row widget-content">
                                    <div class="col-xl-12 col-md-4">
                                        <?php if (isset($app['app_status']) && in_array($app['app_status'], ['Pending', 'Approved', 'Disapproved'])): ?>
                                            <button type="button" class="btn btn-submit w-100 warning save" style="background-color: #C62742; color: #FFFFFF" disabled>Save</button>
                                        <?php else: ?>
                                            <button type="submit" class="btn btn-submit w-100 warning save" style="background-color: #C62742; color: #FFFFFF">Save</button>
                                        <?php endif; ?>

                                    </div>
                                    <div class="col-xl-12 col-md-4">
                                        <a href="<?= base_url('app/preview/' . ($app['app_id'] ?? '')) ?>" class="btn btn-submit w-100" style="background-color: #C62742; color: #FFFFFF">Preview</a>
                                    </div>
                                    <div class="col-xl-12 col-md-4 mt-2">
                                        <?php if (isset($app['app_status']) && $app['app_status'] == 'Draft'): ?>
                                            <button type="button" id="submit-app-btn" class="btn btn-submit w-100" style="background-color: #C62742; color: #FFFFFF" data-app-id="<?= esc($app['app_id']) ?>">Submit</button>
                                        <?php else: ?>
                                            <button type="button" class="btn btn-submit w-100" style="background-color: #C62742; color: #FFFFFF" disabled>Submit</button>
                                        <?php endif; ?>
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
<script>
document.getElementById('submit-app-btn').addEventListener('click', function() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to submit this Annual Procurement Plan. This action cannot be undone.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, submit it!'
    }).then((result) => {
        if (result.isConfirmed) {
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '<?= base_url('app/submit') ?>';
            
            let appIdInput = document.createElement('input');
            appIdInput.type = 'hidden';
            appIdInput.name = 'app_id';
            appIdInput.value = this.getAttribute('data-app-id');
            form.appendChild(appIdInput);
            
            document.body.appendChild(form);
            form.submit();
        }
    });
});
</script>