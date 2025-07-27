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
                                        <h2 class="fw-bold" style="color: #C62742">Project Procurement Management Plan</h2>
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
                                                <p class="inv-street-addr mt-3" style="color: #1a1e21">Office</p>
                                                <p class="inv-email-address pb-2" style="color: #1a1e21">Prepared By</p>
                                                <p class="inv-email-address" style="padding-top:22px; color: #1a1e21">Recommended By</p>
                                                <p class="inv-email-address" style="padding-top:30px; color: #1a1e21">Evaluated and Approved By</p>
                                            </div>

                                            <div class="col-sm-6 col-12 mr-auto">
                                                <p class="inv-street-addr mt-3">BASIC ARTS AND SCIENCES DEPARTMENT</p>
                                                <p class="inv-email-address">DEPARTMENT HEAD</p>
                                                <p class="inv-email-address">DR. HEHERSON P. RAMOS</p>
                                                <p class="inv-email-address">ASSISTANT DIRECTOR FOR ACADEMIC AFFAIRS</p>
                                                <p class="inv-email-address">ENGR. GLENN ORTIZ,PECE,ASEAN ENGR.</p>
                                                <p class="inv-email-address">ASSISTANT DIRECTOR FOR ADMINISTRATION AND FINANCE</p>
                                                <p class="inv-email-address">ATTY. CHRISTIAN C. CALINGASAN</p>
                                            </div>

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-street-addr mt-3" style="color: #1a1e21">Period Covered</p>
                                                <p class="inv-email-address " style="color: #1a1e21">Date Approved</p>
                                                <p class="inv-email-address " style="color: #1a1e21">Total Budget Allocation</p>
                                                <p class="inv-email-address " style="color: #1a1e21">Total Proposed Budget</p>
                                            </div>

                                            <div class="col-sm-2 col-12 mr-auto">
                                                <p class="inv-street-addr mt-3">SY 2025</p>
                                                <p class="inv-email-address">00/00/0000</p>
                                                <p class="inv-email-address text-danger text-opacity-50">P 743,000.00</p>
                                                <p class="inv-email-address text-danger text-opacity-50">P 743,000.00</p>
                                            </div>
                                        </div>

                                    </div>

                                    <hr class="my-3">
                                        <div class="inv--detail-section inv--customer-detail-section">

                                            <div class="row">
                                                <p class="inv-to" style="margin-left: 10px; padding:0px 20px 0px 20px" ><span>Note:</span> <i>Technical Specification for each item/project shall be submitted as part of the PPMP. General desrciption may be used when fillingout this form. However, when preparing your APP, please state full specification of the item.</i></p>
                                            </div>

                                        </div>

                                    <hr class="my-2">

                                    <div class="inv--product-table-section">
                                        <div class="table-responsive">
                                            <table class="table-striped table">
                                                <thead class="">
                                                <tr>
                                                    <th style="background: #FFFFFF" scope="col text-center">Code</th>
                                                    <th style="background: #FFFFFF" scope="col text-center">General Description</th>
                                                    <th style="background: #FFFFFF" class="text-center" scope="col">Quantity/size</th>
                                                    <th style="background: #FFFFFF" class="text-center" scope="col">Estimated Budget</th>
                                                    <th style="background: #FFFFFF" class="col-4 text-center " >
                                                        Schedule / Milestone of Activities
                                                        <div class="d-flex justify-content-between text-muted ">
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
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td colspan="5" style="padding-left: 70px">MODE/ANY SUPPLIES, MATERIALS AND EQUIPMENT (Below PHP 50,000.00)</td>
                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Physics Laboratory Equipment Supplies and Materials</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">₱        50,000.00</td>
                                                    <td class="d-flex justify-content-between px-10 ps-1 ">
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold text-center">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Wallfan and orbit Fan</td>
                                                    <td class="text-center">15</td>
                                                    <td class="text-center">₱        52,500.00</td>
                                                    <td class="d-flex justify-content-between px-10 ps-1 ">
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold text-center">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>BTVTED Computer Programming</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">₱        25,000.00</td>
                                                    <td class="d-flex justify-content-between px-10  ">
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold text-center ">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold text-center ">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold text-center ">•</span>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>BTVTE Laboratory equipment materials</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">₱        45,000.00</td>
                                                    <td class="d-flex justify-content-between px-10">
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>BTVTE Industrial Arts Tools</td>
                                                    <td class="text-center">15</td>
                                                    <td class="text-center">₱        30,000.00</td>
                                                    <td class="d-flex justify-content-between px-10 ">
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>2G Chemistry Laboratory Stool</td>
                                                    <td class="text-center">20</td>
                                                    <td class="text-center">₱        28,000.00</td>
                                                    <td class="d-flex justify-content-between px-10  ">
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>30L Trash Colored Trash Bin</td>
                                                    <td class="text-center">8</td>
                                                    <td class="text-center">c/o supply</td>
                                                    <td class="d-flex justify-content-between px-10 ps-1 ">
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Ink for Epson Printer L3210</td>
                                                    <td class="text-center">20</td>
                                                    <td class="text-center">c/o supply</td>
                                                    <td class="d-flex justify-content-between px-10 ">
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Bond paper</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">c/o supply</td>
                                                    <td class="d-flex justify-content-between px-10 ">
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Board Marker</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">c/o supply</td>
                                                    <td>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Folder</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">c/o supply</td>
                                                    <td>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Envelope</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">c/o supply</td>
                                                    <td>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Fastener</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">c/o supply</td>
                                                    <td>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Flourescent Bulb</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">c/o supply</td>
                                                    <td>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Taner and Maintenance of photocopier</td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">c/o supply</td>
                                                    <td>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Masking Tape/Scotchtape</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">c/o supply</td>
                                                    <td>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Steel Cabinet</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">₱        20,000.00</td>
                                                    <td>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>TV 55in</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-center">₱        40,000.00</td>
                                                    <td>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Extraordinary/Misc Expenses</td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">₱        30,000.00</td>
                                                    <td >
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>Arm Chairs</td>
                                                    <td class="text-center">150</td>
                                                    <td class="text-center">₱        210,000.00</td>
                                                    <td class="d-flex justify-content-between px-10 ">
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>8D0143005</td>
                                                    <td>CCTV Camera set</td>
                                                    <td class="text-center">4</td>
                                                    <td class="text-center">₱        23,000.00</td>
                                                    <td class="d-flex justify-content-between px-10">
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline">
                                                            <span class="text-danger fw-bold">•</span>
                                                        </div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                        <div class="form-check form-check-danger form-check-inline"></div>
                                                    </td>

                                                </tr>
                                                </tbody>
                                            </table>
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