<?= $this->extend('layouts/pro-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Procurement Dashboard</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?= base_url('assets/src/plugins/src/apex/apexcharts.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/src/assets/css/light/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES / FOR DATA TABLES-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/table/datatable/datatables.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/custom_dt_custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/custom_dt_custom.css') ?>">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

        <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="<?= base_url('assets/src/plugins/src/notification/snackbar/snackbar.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/src/assets/css/light/components/modal.css') ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/editors/quill/quill.snow.css') ?>">
    <link href="<?= base_url('assets/src/assets/css/light/apps/mailbox.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/src/assets/css/dark/components/modal.css') ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/editors/quill/quill.snow.css') ?>">
    <link href="<?= base_url('assets/src/assets/css/dark/apps/mailbox.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
    
    <!--  END CUSTOM STYLE FILE  -->

<?= $this->endSection() ?>
  

        <!--  BEGIN CONTENT AREA  -->
<?= $this->section('content') ?>
<div class="row just-content-evenly h-100 align-items-stretch">
                    <!-- Stepper Column -->
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                        <div class="widget widget-activity-five">
                            <div class="widget-heading">
                                <h5 class="">Procurement Status</h5>

                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="activitylog" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu left" aria-labelledby="activitylog" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">View All</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Mark as Read</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content">
                                <div class="w-shadow-top"></div>

                                <div class="mt-container mx-auto">
                                    <div class="timeline-line">

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Procurement Project Management Plan (PPMP) <span>Description</span></a></h5>
                                                </div>
                                                <p>07 May, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Annual Procurement Plan (APP) <br><span>Description</span></h5>
                                                </div>
                                                <p>06 May, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Purchase Request (PR) <br> <span>Description</span></h5>
                                                </div>
                                                <p>01 May, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                                <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Purchase Order (PR)<br> <span>Description</span></a></h5>
                                                </div>
                                                <p>30 Apr, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Bidding <br> <span>Description</span></h5>
                                                    <span class=""></span>
                                                </div>
                                                <p>25 Apr, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Delivery <br> <span>Description</span></h5>
                                                    <span class=""></span>
                                                </div>
                                                <p>10 Apr, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Inventory Custodian Slip (ICS) <br> <span>Description</span></h5>
                                                    <span class=""></span>
                                                </div>
                                                <p>10 Apr, 2024</p>
                                            </div>
                                        </div>

                                        <div class="item-timeline timeline-new">
                                            <div class="t-dot">
                                            <div class="t-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                            </div>
                                            <div class="t-content">
                                                <div class="t-uppercontent">
                                                    <h5>Property Acknowledgement Request (PAR) <br> <span>Description</span></h5>
                                                    <span class=""></span>
                                                </div>
                                                <p>10 Apr, 2024</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-shadow-bottom"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Mail Section -->
                    <div class="col-xl-9 col-lg-6 col-md-6 col-sm-6">
                        <!-- Mail Start -->
                        <div class="row">
                                <div class="col-xl-12  col-md-12">
                                    <div class="mail-box-container">
                                        <div class="mail-overlay"></div>
                                        <div id="mailbox-inbox" class="accordion mailbox-inbox">
                                            <div class="search">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                                                <input type="text" class="form-control input-search" placeholder="Search Here...">
                                            </div>
                                            <!-- Mail Content -->
                                            <div class="message-box">
                                                <div class="message-box-scroll" id="ct">
                                                    <div class="mail-item mailInbox important">
                                                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingFourteen">
                                                            <div class="mb-0">
                                                                <div class="mail-item-heading work collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseFourteen" aria-expanded="false">
                                                                    <div class="mail-item-inner">
    
                                                                        <div class="d-flex">
                                                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default14">
                                                                            </div>
                                                                            <div class="f-head">
                                                                                <!-- <div class="avatar avatar-sm">
                                                                                    <span class="avatar-title rounded-circle">E</span>
                                                                                </div> -->
                                                                            </div>
                                                                            <div class="f-body">    
                                                                                <div class="meta-mail-time">
                                                                                    <p class="user-email" data-mailTo="reevesErnest@mail.com">Ernest Reeves</p>
                                                                                </div>
                                                                                <div class="meta-title-tag">
                                                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Just uploaded new video Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Youtube">Youtube - </span>Just uploaded new video Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                    
                                                                                    <p class="meta-time align-self-center">25 Dec</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="mail-item mailInbox spam">
                                                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingFifteen">
                                                            <div class="mb-0">
                                                                <div class="mail-item-heading work collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseFifteen" aria-expanded="false">
                                                                    <div class="mail-item-inner">
    
                                                                        <div class="d-flex">
                                                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default15">
                                                                            </div>
                                                                            <!-- <div class="f-head">
                                                                                <img src="../src/assets/img/profile-15.jpeg" class="user-profile" alt="avatar">
                                                                            </div> -->
                                                                            <div class="f-body">
                                                                                <div class="meta-mail-time">
                                                                                    <p class="user-email" data-mailTo="infocompany@mail.com">Info Company</p>
                                                                                </div>
                                                                                <div class="meta-title-tag">
                                                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="50% Discount">50% Discount - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                    
                                                                                    <p class="meta-time align-self-center">15 Dec</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    
                                                    <div class="mail-item mailInbox spam">
                                                        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingTwenty">
                                                            <div class="mb-0">
                                                                <div class="mail-item-heading personal collapsed"  data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseTwenty" aria-expanded="false">
                                                                    <div class="mail-item-inner">
    
                                                                        <div class="d-flex">
                                                                            <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                                                <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default19">
                                                                            </div>
                                                                            <!-- <div class="f-head">
                                                                                <img src="../src/assets/img/profile-32.jpeg" class="user-profile" alt="avatar">
                                                                            </div> -->
                                                                            <div class="f-body">
                                                                                <div class="meta-mail-time">
                                                                                    <p class="user-email" data-mailTo="bradleyGreer@mail.com">Bradley Greer</p>
                                                                                </div>
                                                                                <div class="meta-title-tag">
                                                                                    <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'><span class="mail-title" data-mailTitle="Verficication Link">Verficication Link - </span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.</p>
                                                                                    
                                                                                    <p class="meta-time align-self-center">25 Nov</p>
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

                                    <!-- Modal -->
                                    <div class="modal fade" id="composeMailModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title add-title" id="notesMailModalTitleeLabel">Compose</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg> -->
                                                    <div class="compose-box">
                                                        <div class="compose-content">
                                                            <form>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="mb-4 mail-form">
                                                                            <p>From:</p>
                                                                            <select class="form-control" id="m-form">
                                                                                <option value="info@mail.com">Info &lt;info@mail.com&gt;</option>
                                                                                <option value="shaun@mail.com">Shaun Park &lt;shaun@mail.com&gt;</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-4 mail-to">
                                                                            <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> To:</p>
                                                                            <div class="">
                                                                                <input type="email" id="m-to" class="form-control">
                                                                                <span class="validation-text"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="mb-4 mail-cc">
                                                                            <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg> CC:</p>
                                                                            <div>
                                                                                <input type="text" id="m-cc" class="form-control">
                                                                                <span class="validation-text"></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="mb-4 mail-subject">
                                                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> Subject:</p>
                                                                    <div class="w-100">
                                                                        <input type="text" id="m-subject" class="form-control">
                                                                        <span class="validation-text"></span>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="">
                                                                    <p><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg> Upload Attachment:</p>
                                                                    <!-- <input type="file" class="form-control-file" id="mail_File_attachment" multiple="multiple"> -->
                                                                    <input class="form-control file-upload-input" type="file" id="formFile" multiple="multiple">
                                                                </div>
    
                                                                <div id="editor-container">
    
                                                                </div>
    
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button id="btn-save" class="btn float-left btn-success"> Save</button>
                                                    <button id="btn-reply-save" class="btn float-left btn-success"> Save Reply</button>
                                                    <button id="btn-fwd-save" class="btn float-left btn-success"> Save Fwd</button>
    
                                                    <button class="btn" data-bs-dismiss="modal"> <i class="flaticon-delete-1"></i> Discard</button>
    
                                                    <button id="btn-reply" class="btn btn-primary"> Reply</button>
                                                    <button id="btn-fwd" class="btn btn-primary"> Forward</button>
                                                    <button id="btn-send" class="btn btn-primary"> Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                </div>
    
    
                            </div>
                        <!-- Style 3 Table Section End -->
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?= $this->endSection() ?>


<?= $this->section('js') ?>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="<?= base_url('assets/src/plugins/src/apex/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js') ?>"></script>

<script src="<?= base_url('assets/src/plugins/src/editors/quill/quill.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/notification/snackbar/snackbar.min.js') ?>"></script>
<script src="<?= base_url('assets/src/assets/js/apps/mailbox.js') ?>"></script>
<!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<?= $this->endSection() ?>