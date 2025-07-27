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
                                        <h2 class="fw-bold" style="color: #8D0404">ANNUAL PROCUREMENT PLAN</h2>
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
                                    <div class="table-responsive">
                                        <table class="table item-table">
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
                                                <?php if (!empty($app_items)): ?>
                                                    <?php foreach ($app_items as $index => $item): ?>
                                                        <tr>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][app_item_code]" value="<?= esc($item['app_item_code']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>></td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][procurement_project]" value="<?= esc($item['app_item_name']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>></td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][pmo_end_user]" value="<?= esc($item['app_item_pmo']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>></td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][mode_of_procurement]" value="<?= esc($item['app_item_mode']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>></td>
                                                            <td class="px-1">
                                                                <div class="d-flex justify-content-between">
                                                                    <input type="text" class="form-control form-control-sm me-1 text-center" name="items[<?= $index ?>][ads_post]" value="<?= esc($item['app_item_adspost']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                    <input type="text" class="form-control form-control-sm me-1 text-center" name="items[<?= $index ?>][sub_open]" value="<?= esc($item['app_item_subopen']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                    <input type="text" class="form-control form-control-sm me-1 text-center" name="items[<?= $index ?>][notice_award]" value="<?= esc($item['app_item_notice']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                    <input type="text" class="form-control form-control-sm me-1" name="items[<?= $index ?>][contract_signing]" value="<?= esc($item['app_item_contract']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                </div>
                                                            </td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][source_of_funds]" value="<?= esc($item['app_item_source_fund']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>></td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][total]" value="<?= esc($item['app_item_estimated_total']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>></td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][mooe]" value="<?= esc($item['app_item_estimated_mooe']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>></td>
                                                            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][co]" value="<?= esc($item['app_item_estimated_co']) ?>" <?= $isReadOnly ? 'disabled' : '' ?>></td>
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
                                        <button type="button" class="btn btn-md additem" style="background-color: #8D0404; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Add item</button>
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
                                                    <select class="form-control form-control-sm" id="app-dep-id-fk" name="app_dep_id_fk" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <option>Select</option>
                                                        <?php if(!empty($departments)): ?>
                                                            <?php foreach($departments as $department): ?>
                                                                <option value="<?= esc($department['dep_id']) ?>" <?= isset($app['app_dep_id_fk']) && $app['app_dep_id_fk'] == $department['dep_id'] ? 'selected' : '' ?>><?= esc($department['dep_name']) ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <h4>Prepared By:</h4>
                                            <div class="invoice-address-client-fields custom-signature-fields">
                                                <div class="form-group">
                                                    <label for="app-prepared-by-name">Printed Name</label>
                                                    <div>
                                                        <select class="form-control form-control-sm" id="app-prepared-by-name" name="app_prepared_by_name" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option>Select</option>
                                                            <?php if(!empty($users)):
                                                                foreach($users as $user):
                                                                    $selected = (isset($app['app_prepared_by_name']) && $app['app_prepared_by_name'] == $user['user_id']) ? 'selected' : '';
                                                                    echo "<option value='" . esc($user['user_id']) . "' $selected>" . esc($user['user_fullname']) . "</option>";
                                                                endforeach;
                                                            endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="prepared-by-designation">Designation</label>
                                                    <div>
                                                        <input type="text" class="form-control form-control-sm" id="prepared-by-designation" name="prepared_by_designation" value="<?= esc($app['app_prepared_by_designation'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
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
                                                        <select class="form-control form-control-sm" id="app-approved-by-name" name="app_approved_by_name" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option>Select</option>
                                                            <?php if(!empty($users)):
                                                                foreach($users as $user):
                                                                    $selected = (isset($app['app_approved_by_name']) && $app['app_approved_by_name'] == $user['user_id']) ? 'selected' : '';
                                                                    echo "<option value='" . esc($user['user_id']) . "' $selected>" . esc($user['user_fullname']) . "</option>";
                                                                endforeach;
                                                            endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="approved-by-designation">Designation</label>
                                                    <div>
                                                        <input type="text" class="form-control form-control-sm" id="approved-by-designation" name="approved_by_designation" value="<?= esc($app['app_approved_by_designation'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
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
                                                        <select class="form-control form-control-sm" id="app-recommending-by-name" name="app_recommending_by_name" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                            <option>Select</option>
                                                            <?php if(!empty($users)):
                                                                foreach($users as $user):
                                                                    $selected = (isset($app['app_recommending_by_name']) && $app['app_recommending_by_name'] == $user['user_id']) ? 'selected' : '';
                                                                    echo "<option value='" . esc($user['user_id']) . "' $selected>" . esc($user['user_fullname']) . "</option>";
                                                                endforeach;
                                                            endif;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recommending_approval_designation">Designation</label>
                                                    <div>
                                                        <input type="text" class="form-control form-control-sm" id="recommending_approval_designation" name="recommending_approval_designation" value="<?= esc($app['app_recommending_by_designation'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
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
                                        <button type="submit" formaction="<?= base_url('app/save') ?>" class="btn btn-submit w-100 warning save-app" style="background-color: #C62742; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Save</button>
                                    </div>
                                    <div class="col-xl-12 col-md-4">
                                        <button type="submit" formaction="<?= base_url('app/submit') ?>" class="btn btn-submit w-100 warning submit-app" style="background-color: #C62742; color: #FFFFFF" <?= (!isset($app['app_id']) || empty($app['app_id']) || $isReadOnly) ? 'disabled' : '' ?>>Submit</button>
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