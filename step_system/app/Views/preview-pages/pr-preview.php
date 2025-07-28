<?= $this->extend('user-pages/planning/layout/plan-base-layout') ?>


<?= $this->section('css') ?>
    <link href="<?= base_url('assets/src/assets/css/light/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/src/assets/css/dark/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <div class="doc-container">

            <div class="row">
                <div class="col-xl-9" style="width: 100%">

                    <div class="invoice-detail-body">

                        <div class="invoice-content">

                            <div class="invoice-detail-title d-flex flex-column text-start mb-0">
                                <div>
                                    <h2 class="fw-bold" style="color: #C62742">Purchase Request</h2>
                                </div>
                                <div class="d-flex justify-content-start gap-3">
                                    <p class="col-auto text-start mb-0">FM-PR-007</p>
                                    <p class="col-auto text-start mb-0">REV 0</p>
                                    <p class="col-auto text-start mb-0">09NOV2016</p>
                                </div>
                            </div>

                            <hr class="my-3">
                            <div class="invoice-detail-title d-flex flex-column text-start mb-0">

                                <div class="content-section">

                                    <div class="inv--head-section inv--detail-section">

                                        <div class="row">

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-street-addr " style="color: #1a1e21;">Department</p>
                                                <p class="inv-email-address" style="color: #1a1e21">Section</p>
                                            </div>

                                            <div class="col-sm-6 col-12 mr-auto">
                                                <p class="inv-street-addr mt-3" >Basic Arts and Sciences Department</p>
                                                <p class="inv-email-address">Chemistry</p>
                                            </div>

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-street-addr" style="color: #1a1e21">P.R. No. Date</p>
                                                <p class="inv-email-address" style="color: #1a1e21">SAI No. Date</p>
                                            </div>

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-street-addr"">00000000</p>
                                                <p class="inv-email-address">00/00/0000</p>
                                            </div>
                                        </div>

                                    </div>

                                    <hr class="my-3">

                                    <div class="inv--product-table-section">
                                        <div class="table-responsive">
                                            <table class="table-striped table">
                                                <thead class="">
                                                <tr>
                                                    <th style="background: #FFFFFF" scope="col text-center">Qty.</th>
                                                    <th style="background: #FFFFFF" scope="col text-center">Unit</th>
                                                    <th style="background: #FFFFFF" scope="col text-center">Description</th>
                                                    <th style="background: #FFFFFF" class="text-center" scope="col">Unit Cost</th>
                                                    <th style="background: #FFFFFF" class="text-center" scope="col">Total Cost</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">IoT</td>
                                                    <td>LED Projector , HDMI, 3600 lumens</td>
                                                    <td class="text-center">35,000.00</td>
                                                    <td class="text-center">35,000.00</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="inv--head-section inv--detail-section">

                                        <div class="row">

                                            <div class="col-sm-10 col-12 mr-auto">
                                                <p class="inv-street-address text-end" >Total Amount</p>
                                            </div>

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-email-address text-end">₱ 35,000.00</p>
                                            </div>
                                        </div>

                                    </div>

                                    <hr class="mt-2">

                                    <div class="inv--head-section inv--detail-section">

                                        <div class="row">

                                            <div class="col-sm-6 col-12 mr-auto">
                                                <p class="inv-street-addr text-start" style="color: #1a1e21;">Requested By</p>
                                                <p class="inv-email-address text-center" style="color: #1a1e21">Engr. Rexmelle F. Decapia, Jr. PhD</p>
                                                <p class="inv-email-address text-center" style="color: #1a1e21">BASD - Department Head</p>
                                            </div>

                                            <div class="col-sm-6 col-12 mr-auto">
                                                <p class="inv-email-address text-start" style="color: #1a1e21;">Approved By</p>
                                                <p class="inv-email-address text-center" style="color: #1a1e21;">Engr. Rexmelle F. Decapia, Jr. PhD</p>
                                                <p class="inv-email-address text-center" style="color: #1a1e21;">Campus Director</p>
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
    </div>
    <?= $this->endSection() ?>

    <?= $this->section('js') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/src/assets/js/apps/invoice-add.js') ?>"></script>

    <!-- For Table -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/src/assets/js/apps/fac-ppmp.js') ?>"></script>
<?= $this->endSection() ?>