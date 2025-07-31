<?= $this->extend('user-pages/supply/layout/sup-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | PR Bidding Status</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <link href="<?= base_url('assets/src/assets/css/light/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />
    <!-- For Sweet Alerts -->
    <link rel="stylesheet" href="<?= base_url('assets/src/plugins/src/sweetalerts2/step-sweetalert.css') ?>">
    <link href="<?= base_url('assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="doc-container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="invoice-content">
                            <div class="invoice-box">
                                <div class="invoice-header">
                                    <div class="row align-items-center">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <div class="inv-detail-section">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="invoice-body">
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

                                    <?php if ($isReadOnlyForm): ?>
                                        <div class="alert alert-light-info bg-primary" role="alert">
                                            This document's bidding process is completed and cannot be modified.
                                        </div>
                                    <?php endif; ?>

                                    <form action="<?= site_url('supply/pr/save-bidding-status') ?>" method="POST">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="pr_id" value="<?= esc($pr['pr_id']) ?>">

                                        <div class="invoice-detail-body">
                                            <div class="invoice-item-widget">
                                                <h2 class="fw-bold ps-4 ms-2" style="color: #8D0404">Purchase Request</h2>
                                                <div class="row">
                                                    <div class="col-md-6 ps-5">
                                                        <p class="inv-created-date"><strong>PR ID:</strong> <?= esc($pr['pr_id']) ?></p>
                                                        <p class="inv-created-date"><strong>Department:</strong> <?= esc($department_name) ?></p>
                                                    </div>
                                                    <div class="col-md-6 ps-5">
                                                        
                                                    <p class="inv-created-date"><strong>Requested By:</strong> <?= esc($requested_by_name) ?></p>
                                                        <p class="inv-created-date"><strong>Section:</strong> <?= esc($pr['pr_section']) ?></p>
                                                    </div>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered item-table">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center">Item ID</th>
                                                                <th>Quantity</th>
                                                                <th>Unit</th>
                                                                <th>Description</th>
                                                                <th class="text-right">Unit Cost</th>
                                                                <th class="text-right">Total Cost</th>
                                                                <th class="text-center">Bidding Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (!empty($pr_items)): ?>
                                                                <?php foreach ($pr_items as $item): ?>
                                                                    <tr>
                                                                        <td class="text-center"><span><?= esc($item['pr_items_id']) ?></span></td>
                                                                        <td><span><?= esc($item['pr_items_quantity']) ?></span></td>
                                                                        <td><span><?= esc($item['pr_items_unit']) ?></span></td>
                                                                        <td><span><?= esc($item['pr_items_descrip']) ?></span></td>
                                                                        <td class="text-right"><span><?= esc(number_format($item['pr_items_cost'], 2)) ?></span></td>
                                                                        <td class="text-right"><span><?= esc(number_format($item['pr_items_total_cost'], 2)) ?></span></td>
                                                                        <td>
                                                                            <select class="form-control form-control-sm bidding-status-select" name="items[<?= esc($item['pr_items_id']) ?>][bidding_status]" <?= $isReadOnlyForm ? 'disabled' : '' ?>>
                                                                                <option value="pending" <?= ($item['bidding_status'] ?? 'pending') == 'pending' ? 'selected' : '' ?>>Pending</option>
                                                                                <option value="successful" <?= ($item['bidding_status'] ?? '') == 'successful' ? 'selected' : '' ?>>Successful</option>
                                                                                <option value="unsuccessful" <?= ($item['bidding_status'] ?? '') == 'unsuccessful' ? 'selected' : '' ?>>Unsuccessful</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                <tr>
                                                                    <td colspan="7" class="text-center">No items found for this Purchase Request.</td>
                                                                </tr>
                                                            <?php endif; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="invoice-h-actions-btn-group d-flex justify-content-end mt-3">
                                            <button type="submit" class="btn btn-danger mr-2" id="saveBiddingBtn" <?= $isReadOnlyForm ? 'disabled' : '' ?>>Save Bidding Status</button>
                                            <button type="button" class="btn btn-danger ms-2" id="submitBiddingBtn" <?= ($isReadOnlyForm || !$all_items_successful) ? 'disabled' : '' ?> data-pr-id="<?= esc($pr['pr_id']) ?>" data-submit-url="<?= site_url('supply/pr/submit-bidding-to-procurement-head') ?>" data-redirect-url="<?= site_url('supply/pr-for-bidding') ?>">Submit to Procurement Head</button>
                                        </div>
                                    </form>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/apps/sup-bidding.js') ?>"></script>
<?= $this->endSection() ?>