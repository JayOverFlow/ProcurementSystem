<?php
    $isReadOnly = isset($ics['invent_custo_status']) && $ics['invent_custo_status'] !== 'Draft';
?>
<?php if (session()->getFlashdata('success')):
    $successMessage = session()->getFlashdata('success');
    $errorMessage = session()->getFlashdata('error');
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php if (!empty($successMessage)): ?>
            Swal.fire({
                title: 'Success!',
                text: '<?= esc($successMessage) ?>',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
            });
            <?php endif; ?>

            <?php if (!empty($errorMessage)): ?>
            Swal.fire({
                title: 'Error!',
                text: '<?= is_array($errorMessage) ? implode('<br>', array_map('esc', $errorMessage)) : esc($errorMessage) ?>',
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
            });
            <?php endif; ?>
        });
    </script>
<?php endif; ?>

<?php if ($isReadOnly): ?>
    <div class="alert alert-light-info bg-primary" role="alert">
        This document is already submitted and cannot be edited.
    </div>
<?php endif; ?>
<form id="ics-form" action="<?= base_url('/ics/save') ?>" method="post">
    <!-- Hidden field for ICS ID when editing existing ICS -->
    <input type="hidden" name="invent_custo_id" value="<?= isset($ics) ? esc($ics['invent_custo_id']) : '' ?>">
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="doc-container">

                <div class="row">
                    <div class="col-xl-9">

                        <div class="invoice-content">

                            <div class="invoice-detail-body">

                                <div class="invoice-detail-title d-flex flex-column text-start mb-0">
                                    <div>
                                        <h2 class="fw-bold" style="color: #C62742">Inventory Custodian Slip</h2>
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
                                                    <label for="ics-fund-cluster" class="col-sm-1 col-form-label col-form-label-sm">Fund Cluster</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="ics-fund-cluster" name="ics_fund_cluster" value="<?= old('ics_fund_cluster', $ics['ics_fund_cluster'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    </div>
                                                    <label for="ics-po-no" class="col-sm-1 col-form-label col-form-label-sm">P.O. NO.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="ics-po-no" name="ics_po_no" value="<?= old('ics_po_no', $ics['ics_po_no'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 invoice-address-company">

                                            <div class="invoice-address-company-fields">

                                                <div class="form-group row">
                                                    <label for="ics-par-no" class="col-sm-1 col-form-label col-form-label-sm">PAR No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="ics-par-no" name="ics_par_no" value="<?= old('ics_par_no', $ics['ics_par_no'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    </div>
                                                    <label for="ics-code-no" class="col-sm-1 col-form-label col-form-label-sm">Code No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="ics-code-no" name="ics_code_no" value="<?= old('ics_code_no', $ics['ics_code_no'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="invoice-detail-items pt-3">

                                        <div class="table-responsive">
                                            <table class="table item-table">
                                                <thead>
                                                <tr>
                                                    <th class="col-1 text-center">Qyt.</th>
                                                    <th class="col-1 text-center">Unit</th>
                                                    <th class="col-1 text-center">Unit Cost</th>
                                                    <th class="col-1 text-center">Total Cost</th>
                                                    <th class="col-4 text-center">Description</th>
                                                    <th class="col-1 text-center">Inventory Item No.</th>
                                                    <th class="col-1 text-center">Estimated Useful Life</th>
                                                    <th class="col-1 text-center">Action</th>
                                                </tr>
                                                <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][ics_qty]" value="<?= old('items.0.ics_qty', $ics_items[0]['ics_qty'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][ics_unit]" value="<?= old('items.0.ics_unit', $ics_items[0]['ics_unit'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm unit-cost" name="items[0][ics_unit_cost]" value="<?= old('items.0.ics_unit_cost', $ics_items[0]['ics_unit_cost'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm total-cost" name="items[0][ics_total_cost]" value="<?= old('items.0.ics_total_cost', $ics_items[0]['ics_total_cost'] ?? '') ?>" readonly <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][ics_descrip]" value="<?= old('items.0.ics_descrip', $ics_items[0]['ics_descrip'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][ics_invent_item_no]" value="<?= old('items.0.ics_invent_item_no', $ics_items[0]['ics_invent_item_no'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][ics_est_use_life]" value="<?= old('items.0.ics_est_use_life', $ics_items[0]['ics_est_use_life'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    <td class="delete-item-row">
                                                        <ul class="table-controls">
                                                            <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" <?= $isReadOnly ? 'style="pointer-events: none; color: grey;"' : '' ?>><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-md additem" style="background-color: #C62742; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Add Item</button>
                                                <p class="mt-2"><span class="fw-bold">Total Amount: </span><span class="ms-2">₱</span><span class="ms-2" id="total-amount-ics">0.00</span></p>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row justify-content-between">

                                        <div class="col-xl-5 invoice-address-company">

                                            <div class="invoice-address-company-fields">


                                                <div class="ms-3">
                                                    <h4 class="mt-3">Received From:</h4>
                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="ics-received-from-user-fk" class="col-sm-3 col-form-label col-form-label-sm">Personnel</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" id="ics-received-from-user-fk" name="ics_received_from_user_fk" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <option value="0">Select</option>
                                                                <?php if(!empty($users)): ?>
                                                                    <?php foreach($users as $user): ?>
                                                                        <option value="<?= esc($user['user_id']) ?>" data-fullname="<?= esc($user['user_fullname']) ?>" <?= isset($ics['ics_received_from_user_fk']) && $ics['ics_received_from_user_fk'] == $user['user_id'] ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif;?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="ics-received-from-date" class="col-sm-3 col-form-label col-form-label-sm">Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control form-control-sm" id="ics-received-from-date" name="ics_received_from_date" value="<?= old('ics_received_from_date', $ics['ics_received_from_date'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 invoice-address-client">

                                            <div class="invoice-address-client-fields">

                                                <div class="ms-3">
                                                    <h4 class="mt-3">Received By:</h4>
                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="ics-received-by-user-fk" class="col-sm-3 col-form-label col-form-label-sm">Personnel</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" id="ics-received-by-user-fk" name="ics_received_by_user_fk" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <option value="0">Select</option>
                                                                <?php if(!empty($users)): ?>
                                                                    <?php foreach($users as $user): ?>
                                                                        <option value="<?= esc($user['user_id']) ?>" data-fullname="<?= esc($user['user_fullname']) ?>" <?= isset($ics['ics_received_by_user_fk']) && $ics['ics_received_by_user_fk'] == $user['user_id'] ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif;?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="ics-received-by-date-fk" class="col-sm-3 col-form-label col-form-label-sm">Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control form-control-sm" id="ics-received-by-date-fk" name="ics_received_by_date_fk" value="<?= old('ics_received_by_date_fk', $ics['ics_received_by_date_fk'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        </div>
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
                                    <button type="submit" formaction="<?= base_url('ics/save') ?>" class="btn btn-submit w-100 warning save-ics" style="background-color: #C62742; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Save</button>
                                </div>
                                <div class="col-xl-12 col-md-4">
                                    <button type="submit" formaction="<?= base_url('ics/submit') ?>" class="btn btn-submit w-100 warning submit-ics" style="background-color: #C62742; color: #FFFFFF" <?= (!isset($ics['invent_custo_id']) || empty($ics['invent_custo_id']) || $isReadOnly) ? 'disabled' : '' ?>>Submit</button>
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
</form>

<script>
    var existingItems = <?= json_encode($ics_items ?? []) ?>;
</script>