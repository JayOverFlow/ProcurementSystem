<?php
    $isReadOnly = isset($par['prop_ack_status']) && $par['prop_ack_status'] !== 'Draft';
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
<form id="par-form" action="<?= base_url('/par/save') ?>" method="post">
    <!-- Hidden field for PO ID when editing existing PO -->
    <input type="hidden" name="par_id" value="<?= isset($par) ? $par['prop_ack_id'] : '' ?>">
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="doc-container">

                <div class="row">
                    <div class="col-xl-9">

                        <div class="invoice-content">

                            <div class="invoice-detail-body">

                                <div class="invoice-detail-title d-flex flex-column text-start mb-0">
                                    <div>
                                        <h2 class="fw-bold" style="color: #C62742">Property Acknowledgement Receipt</h2>
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
                                                    <label for="par-fund-cluster" class="col-sm-1 col-form-label col-form-label-sm">Fund Cluster</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="par-fund-cluster" name="par_fund_cluster" value="<?= old('par_fund_cluster', $par['par_fund_cluster'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    </div>
                                                    <label for="par-po-no" class="col-sm-1 col-form-label col-form-label-sm">P.O. NO.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="par-po-no" name="par_po_no" value="<?= old('par_po_no', $par['par_po_no'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 invoice-address-company">

                                            <div class="invoice-address-company-fields">

                                                <div class="form-group row">
                                                    <label for="par-no" class="col-sm-1 col-form-label col-form-label-sm">PAR No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="par-no" name="par_no" value="<?= old('par_no', $par['par_no'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    </div>
                                                    <label for="par-code-no" class="col-sm-1 col-form-label col-form-label-sm">Code No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="par-code-no" name="par_code_no" value="<?= old('par_code_no', $par['par_code_no'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="invoice-detail-items pt-3">

                                            <div class="table-responsive">
                                                <table class="table item-table">
                                                    <thead>
                                                    <tr>
                                                        <th class="col-1 text-center">Qty.</th>
                                                        <th class="col-1 text-center">Unit</th>
                                                        <th class="col-6 text-center">Description</th>
                                                        <th class="col-3 text-center">Property No.</th>
                                                        <th class="col-3 text-center">Date Acquired</th>
                                                        <th class="col-3 text-center">Amount</th>
                                                        <th class="col-auto text-center">Action</th>
                                                    </tr>
                                                    <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $items = old('items', $par_items); // Corrected this line
                                                    foreach ($items as $index => $item) :
                                                    ?>
                                                    <tr>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][par_qty]" value="<?= esc($item['par_qty'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][par_unit]" value="<?= esc($item['par_unit'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][par_descrip]" value="<?= esc($item['par_descrip'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][par_prop_no]" value="<?= esc($item['par_prop_no'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][par_date_acquired]" value="<?= esc($item['par_date_acquired'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][par_amount]" value="<?= esc($item['par_amount'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        <td class="delete-item-row">
                                                            <ul class="table-controls">
                                                                <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" <?= $isReadOnly ? 'style="pointer-events: none; color: grey;"' : '' ?>><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-flex justify-content-between">
                                                <button type="button" class="btn btn-md additem" style="background-color: #C62742; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Add Item</button>
                                                <p class="mt-2"><span class="fw-bold">Total Amount: </span><span class="ms-2">₱</span><span class="ms-2" id="total-amount-par">0.00</span></p>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row justify-content-between">

                                        <div class="col-xl-5 invoice-address-company">

                                            <div class="invoice-address-company-fields">


                                                <div class="ms-3">
                                                    <h4 class="mt-3">Received By:</h4>
                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="par-received-from-user-fk" class="col-sm-3 col-form-label col-form-label-sm">Personnel</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" id="par-received-from-user-fk" name="par_received_from_user_fk" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <option value="0">Select</option>
                                                                <?php if(!empty($users)): ?>
                                                                    <?php foreach($users as $user): ?>
                                                                        <option value="<?= esc($user['user_id']) ?>" data-fullname="<?= esc($user['user_fullname']) ?>" <?= isset($par['par_received_from_user_fk']) && $par['par_received_from_user_fk'] == $user['user_id'] ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif;?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="par-received-from-date" class="col-sm-3 col-form-label col-form-label-sm">Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control form-control-sm" id="par-received-from-date" name="par_received_from_date" value="<?= old('par_received_from_date', $par['par_received_from_date'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 invoice-address-client">

                                            <div class="invoice-address-client-fields">

                                                <div class="ms-3">
                                                    <h4 class="mt-3">Issued By:</h4>
                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="par-issued-by-user-fk" class="col-sm-3 col-form-label col-form-label-sm">Personnel</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-control form-control-sm" id="par-issued-by-user-fk" name="par_issued_by_user_fk" <?= $isReadOnly ? 'disabled' : '' ?>>
                                                                <option value="0">Select</option>
                                                                <?php if(!empty($users)): ?>
                                                                    <?php foreach($users as $user): ?>
                                                                        <option value="<?= esc($user['user_id']) ?>" <?= isset($par['par_issued_by_user_fk']) && $par['par_issued_by_user_fk'] == $user['user_id'] ? 'selected' : '' ?>><?= esc($user['user_fullname']) ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif;?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mt-4 ms-1">
                                                        <label for="par-issued-by-date" class="col-sm-3 col-form-label col-form-label-sm">Date</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control form-control-sm" id="par-issued-by-date" name="par_issued_by_date" value="<?= old('par_issued_by_date', $par['par_issued_by_date'] ?? '') ?>" <?= $isReadOnly ? 'disabled' : '' ?>>
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
                                    <button type="submit" formaction="<?= base_url('par/save') ?>" class="btn btn-submit w-100 warning save-par" style="background-color: #C62742; color: #FFFFFF" <?= $isReadOnly ? 'disabled' : '' ?>>Save</button>
                                </div>
                                <div class="col-xl-12 col-md-4">
                                    <button type="submit" formaction="<?= base_url('par/submit') ?>" class="btn btn-submit w-100 warning submit-par" style="background-color: #C62742; color: #FFFFFF" <?= (!isset($par['prop_ack_id']) || empty($par['prop_ack_id']) || $isReadOnly) ? 'disabled' : '' ?>>Submit</button>
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

<script>
    // Pass the items data to JavaScript
    var existingItems = <?= json_encode($par_items ?? []) ?>;
</script>