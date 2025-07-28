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
                                    <h2 class="fw-bold" style="color: #C62742">Purchase Order</h2>
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
                                                <p class="inv-street-addr mt-3" style="color: #1a1e21; font-size: large">Office</p>
                                                <p class="inv-email-address" style="color: #1a1e21">Address</p>
                                                <p class="inv-email-address" style="color: #1a1e21">Tel No.</p>
                                                <p class="inv-email-address" style="color: #1a1e21">TIN</p>
                                            </div>

                                            <div class="col-sm-6 col-12 mr-auto">
                                                <p class="inv-street-addr mt-3" style="font-size: large">BASIC ARTS AND SCIENCES DEPARTMENT</p>
                                                <p class="inv-email-address">05</p>
                                                <p class="inv-email-address">2024-05-67</p>
                                                <p class="inv-email-address">2024-05-67</p>
                                            </div>

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-street-addr mt-3" style="color: #1a1e21; font-size: large">P.O. No.</p>
                                                <p class="inv-email-address" style="color: #1a1e21">Date</p>
                                                <p class="inv-email-address" style="color: #1a1e21">Mode of Procurement</p>
                                                <p class="inv-email-address" style="color: #1a1e21">TUP-Taguig TIN</p>
                                            </div>

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-street-addr mt-3"  style="font-size: large">2024-05-67</p>
                                                <p class="inv-email-address">05/29/2024</p>
                                                <p class="inv-email-address  text-opacity-50 fst-italic">Direct Contracting</p>
                                                <p class="inv-email-address  text-opacity-50">000-824-548-001</p>
                                            </div>
                                        </div>

                                    </div>

                                    <hr class="my-3">
                                    <div class="inv--detail-section inv--customer-detail-section">

                                        <div class="row">
                                            <p class="text-lg-start">Gentlemen</p>
                                            <p class="inv-to text-center" style="margin-left: 10px; padding:0px 20px 0px 20px" >Note:Please furnish this Office the following articles subject to the term and conditions contained herein. </p>
                                        </div>

                                    </div>

                                    <hr class="my-2">

                                        <div class="inv--head-section inv--detail-section">

                                            <div class="row">

                                                <div class="col-sm-2 col-12 mr-auto">
                                                    <p class="inv-street-addr" style="color: #1a1e21; ">Place of Delivery</p>
                                                    <p class="inv-email-address" style="color: #1a1e21">Date of Delivery</p>

                                                </div>

                                                <div class="col-sm-6 col-12 mr-auto">
                                                    <p class="inv-email-address fw-bold">TUP-Taguig Supply Office</p>
                                                    <p class="inv-email-address"></p>
                                                </div>

                                                <div class="col-sm-2 col-12 mr-auto">
                                                    <p class="inv-street-addr" style="color: #1a1e21; ">Delivery Term</p>
                                                    <p class="inv-email-address" style="color: #1a1e21">Payment Term</p>
                                                </div>

                                                <div class="col-sm-2 col-12 mr-auto">
                                                    <p class="inv-email-address  text-opacity-50 fst-italic">90 calendar days</p>
                                                    <p class="inv-email-address  text-opacity-50">15 calendar days</p>
                                                </div>
                                            </div>

                                        </div>

                                    <hr class="my-1 mt-1">

                                    <div class="inv--product-table-section">
                                        <div class="table-responsive">
                                            <table class="table-striped table">
                                                <thead class="">
                                                <tr>
                                                    <th style="background: #FFFFFF" scope="col text-center">Stock</th>
                                                    <th style="background: #FFFFFF" scope="col text-center">Unit</th>
                                                    <th style="background: #FFFFFF" scope="col text-center">Description</th>
                                                    <th style="background: #FFFFFF" class="text-center" scope="col">Quantity</th>
                                                    <th style="background: #FFFFFF" class="text-center" scope="col">Unit Cost</th>
                                                    <th style="background: #FFFFFF" class="text-center" scope="col">Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">set</td>
                                                    <td>Bridge set, ME-6991</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">67,071.00</td>
                                                    <td class="text-center">67,071.00</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>Includes:</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>16x I-beam #5 (16) 24cm long; 36x I-beam #4 (36) 17cm long</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>36x I-beam #3 (36) 11.5cm long; 16x I-beam #2 (16) 8cm long</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>16x I-beam #1 (16) 5.5cm long</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>28x Connectors; 150x Screw; 1x Flexible road bed(3m)</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>                                                </tr>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>1x Track Coupler; 24x Road bed clips</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>1x Car with flag and mass; 1x Starter bracket</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>32x Cord tensioning clips; 1x Yellow cord (1 roll)</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td>1x Instruction Manual</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">unit</td>
                                                    <td>Wireless Load Cell and Accelerometer,PS-3216</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">24,434.00</td>
                                                    <td class="text-center">24,434.00</td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">unit</td>
                                                    <td>PASCO Capstone, Single User License, ui-5401</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">22,434.00</td>
                                                    <td class="text-center">22,434.00</td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <hr class="mt-2">

                                    <div class="inv--head-section inv--detail-section">

                                        <div class="row">

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-street-addr" style="color: #1a1e21; ">Description</p>
                                                <p class="inv-email-address" style="color: #1a1e21">Amount in Words</p>

                                            </div>

                                            <div class="col-sm-6 col-12 mr-auto">
                                                <p class="inv-email-address">Supplies for Laboratory Equipment (PASCO) - BASD Physics</p>
                                                <p class="inv-email-address">One Hundred Thirteen Thousand Nine Hundred Thirty Nine Pesos Only</p>
                                            </div>

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-email-address" style="color: #1a1e21; font-size: large">Total</p>
                                            </div>

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-email-address text-danger text-opacity-50" style="font-size: large">₱ 113,939.00</p>
                                            </div>
                                        </div>

                                    </div>

                                    <hr class="mt-2">

                                    <div class="inv--head-section inv--detail-section">

                                        <div class="row">

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-street-addr" style="color: #1a1e21;">Funds Cluster</p>
                                                <p class="inv-email-address" style="color: #1a1e21">Funds Available</p>

                                            </div>

                                            <div class="col-sm-6 col-12 mr-auto">
                                                <p class="inv-email-address">Supplies for Laboratory Equipment (PASCO) - BASD Physics</p>
                                                <p class="inv-email-address">Supplies for Laboratory Equipment (PASCO) - BASD Physics</p>
                                            </div>

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-email-address" style="color: #1a1e21;">ORS/BURS No. </p>
                                                <p class="inv-email-address" style="color: #1a1e21;">Date of the ORS/BURS</p>
                                                <p class="inv-email-address" style="color: #1a1e21;">Amount</p>
                                            </div>

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-email-address  text-opacity-50">2024 - 05 - 256</p>
                                                <p class="inv-email-address  text-opacity-50">5/30/24</p>
                                                <p class="inv-email-address  text-opacity-50">₱113,939.00</p>
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