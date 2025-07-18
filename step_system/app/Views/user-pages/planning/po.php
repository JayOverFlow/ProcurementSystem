<?= $this->extend('layouts/preview-layout') ?>


<?= $this->section('css') ?>
    <link href="<?= base_url('assets/src/assets/css/light/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/src/assets/css/dark/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="row invoice layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="doc-container container">


                    <div class="col-xl-9" style="width: 100%">

                        <div class="invoice-content">

                            <div class="invoice-detail-body">

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
                                                    <p class="inv-street-addr mt-3" style="color: #1a1e21">Supplier</p>
                                                    <p class="inv-email-address" style="color: #1a1e21">Address</p>
                                                    <p class="inv-email-address" style="color: #1a1e21">Tel. No. </p>
                                                    <p class="inv-email-address" style="color: #1a1e21">TIN</p>
                                                </div>

                                                <div class="col-sm-6 col-12 mr-auto">
                                                    <p class="inv-street-addr mt-3">SCIENCESTAR CORPORATION</p>
                                                    <p class="inv-email-address">U-1201 OMMCC San Miguel Avenue, Ortigas Center</p>
                                                    <p class="inv-email-address">8882-3355 to 64</p>
                                                    <p class="inv-email-address">000-302-982-000</p>
                                                </div>

                                                <div class="col-sm-2 col-12 mr-auto">
                                                    <p class="inv-street-addr mt-3" style="color: #1a1e21">P.O. No.</p>
                                                    <p class="inv-email-address " style="color: #1a1e21">Date </p>
                                                    <p class="inv-email-address " style="color: #1a1e21">Mode of Procurement</p>
                                                    <p class="inv-email-address " style="color: #1a1e21">TUP-Taguig TIN</p>
                                                </div>

                                                <div class="col-sm-2 col-12 mr-auto">
                                                    <p class="inv-street-addr mt-3">2024-05-67</p>
                                                    <p class="inv-email-address">May 29, 2024</p>
                                                    <p class="inv-email-address text-danger text-opacity-50">Direct Contracting</p>
                                                    <p class="inv-email-address text-danger text-opacity-50">000-824-548-001</p>
                                                </div>
                                            </div>

                                        </div>


                                        <hr class="my-3">

                                        <div class="inv--detail-section inv--customer-detail-section">
                                            <p>Gentlemen:</p>
                                            <div class="row">
                                                <p class="inv-to ps-lg-5">Please furnish this Office the following articles subject to the term and conditions contained herein</p>
                                            </div>

                                        </div>


                                        <hr class="my-2">
                                        <div class="inv--head-section inv--detail-section">

                                            <div class="row">

                                                <div class="col-sm-2 col-12 mr-auto">
                                                    <p class="inv-street-addr mt-3" style="color: #1a1e21">Place of Delivery</p>
                                                    <p class="inv-email-address" style="color: #1a1e21">Date of Delivery</p>
                                                </div>

                                                <div class="col-sm-6 col-12 mr-auto">
                                                    <p class="inv-street-addr mt-3">TUP-TAGUIG Supply Office</p>
                                                    <p class="inv-email-address">00/00/0000</p>
                                                </div>

                                                <div class="col-sm-2 col-12 mr-auto">
                                                    <p class="inv-street-addr mt-3" style="color: #1a1e21">Delivery Term</p>
                                                    <p class="inv-email-address " style="color: #1a1e21">Payment Term </p>
                                                </div>

                                                <div class="col-sm-2 col-12 mr-auto">
                                                    <p class="inv-street-addr mt-3">90 Calendar Days</p>
                                                    <p class="inv-email-address">15 Calendar Days</p>
                                                </div>
                                            </div>

                                        </div>
                                        <hr class="my-2">

                                        <div class="inv--product-table-section">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead class="">
                                                    <tr>
                                                        <th style="background-color: #FFFFFF" scope="col text-center">Stock/Production No.</th>
                                                        <th style="background-color: #FFFFFF" scope="col text-center">Unit</th>
                                                        <th style="background-color: #FFFFFF" class="text-center" scope="col">Description</th>
                                                        <th style="background-color: #FFFFFF" class="text-center" scope="col">Quantity</th>
                                                        <th style="background-color: #FFFFFF" class="text-center" scope="col">Unit Cost</th>
                                                        <th style="background-color: #FFFFFF" class="text-center" scope="col">Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td>set</td>
                                                        <td>Bridge set, ME-6991</td>
                                                        <td class="text-center">1</td>
                                                        <td class="text-center">67.071.00</td>
                                                        <td class="text-center">67.071.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Includes:</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>16x I-beam #5(16) 24cm long; 36x I-beam #4 (36) 17 cm long</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>36x I-beam #3(36) 11.5cm long; 16x I-beam #2(16) 8 cm long</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>16x I-beam #1(16) 5.5cm long</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>28x Connectors: 150x Screw; 1x Flexible road bed (3m)</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>1x Track coupler; 24x Road bed clips;</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>1x Car with flag and mass; 1x Starter bracket;</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>32x Cord tensioning clips; 1x Yellow cord(1 roll);</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>1x Instruction Manual</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>unit</td>
                                                        <td>Wireless Load Cell and Accelerometer, PS-3216</td>
                                                        <td class="text-center">1</td>
                                                        <td class="text-center">24,434.00</td>
                                                        <td class="text-center">24,434.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>unit</td>
                                                        <td>PASCO Capstone, Single User License, UI-5401</td>
                                                        <td class="text-center">1</td>
                                                        <td class="text-center">22,434.00</td>
                                                        <td class="text-center">22,434.00</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <hr class="my-2">
                                                <div class="inv--detail-section inv--customer-detail-section">
                                                    <div class="row">
                                                        <p class="inv-to ps-lg-5 text-center pt-2"><i>Supplies for Laboratory Equipment (PASCO) - BASD Physics</i></p>
                                                    </div>

                                                </div>

                                                <hr class="my-2">
                                                <div class="inv--head-section inv--detail-section">

                                                    <div class="row">

                                                        <div class="col-sm-8 col-12 mr-auto">
                                                            <p class="inv-street-addr mt-3 text-center" style="color: #1a1e21">One Hundred thriteen Thousand Nine Hundred Thirty Nine Pesos Only</p>
                                                        </div>

                                                        <div class="col-sm-4 col-12 mr-auto">
                                                            <p class="inv-street-addr mt-3 text-center">113,939.00</p>
                                                        </div>

                                                    </div>

                                                </div>
                                                <hr class="my-2">
                                                <div class="inv--detail-section inv--customer-detail-section">
                                                    <p>In case of failure to make the full delivery within the time specified above, a penalty of one tenth (1/10) of one percent for everyday of delay shall be imposed on the undelivered item/s</p>

                                                </div>
                                                <div class="inv--head-section inv--detail-section">

                                                    <div class="row">

                                                        <div class="col-sm-6 col-12 mr-auto">
                                                            <p class="inv-street-addr mt-3 text-center" style="color: #1a1e21">Conforme</p>
                                                            <p class="inv-street-addr mt-3 text-center" style="color: #1a1e21">PATRICK JUSTIN ARIADO</p>
                                                            <p class="inv-email-address text-center" style="color: #1a1e21">06/04/2024</p>
                                                        </div>

                                                        <div class="col-sm-6 col-12 mr-auto">
                                                            <p class="inv-street-addr mt-3 text-center" style="color: #1a1e21">Truly yours,</p>
                                                            <p class="inv-street-addr mt-3 text-center" style="color: #1a1e21">ENGR.REXMELLE F. DECAPIA,JR., Ph.D</p>
                                                            <p class="inv-email-address text-center" style="color: #1a1e21">Campus Director</p>
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr class="my-2">
                                                <div class="inv--head-section inv--detail-section">

                                                    <div class="row">

                                                        <div class="col-sm-2 col-12 mr-auto">
                                                            <p class="inv-street-addr mt-3" style="color: #1a1e21">Funds Cluster</p>
                                                            <p class="inv-email-address" style="color: #1a1e21">Funds Available</p>
                                                        </div>

                                                        <div class="col-sm-6 col-12 mr-auto">
                                                            <p class="inv-street-addr mt-3">05</p>
                                                            <p class="inv-email-address">------</p>
                                                            <p class="inv-email-address text-center" style="color: #1a1e21">JULIET T. NAREZ</p>
                                                            <p class="inv-email-address text-center" style="color: #1a1e21">Accountant III</p>
                                                        </div>

                                                        <div class="col-sm-2 col-12 mr-auto">
                                                            <p class="inv-street-addr mt-3" style="color: #1a1e21">ORS/BURS No.</p>
                                                            <p class="inv-email-address " style="color: #1a1e21">Date of the ORS/BURS</p>
                                                            <p class="inv-email-address " style="color: #1a1e21">Amount</p>
                                                        </div>

                                                        <div class="col-sm-2 col-12 mr-auto">
                                                            <p class="inv-street-addr mt-3">2024-05-256</p>
                                                            <p class="inv-email-address">5/30/24</p>
                                                            <p class="inv-email-address">P 113,939.00</p>
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