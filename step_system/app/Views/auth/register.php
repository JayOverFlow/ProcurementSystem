<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>TUP STEP | Register</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/src/assets/img/favicon.ico'); ?>"/>
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/light/loader.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/dark/loader.css'); ?>" rel="stylesheet" type="text/css" />
    <script src="<?= base_url('assets/layouts/horizontal-light-menu/loader.js'); ?>"></script>
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?= base_url('assets/src/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/light/plugins.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/light/authentication/registration_stepper.css'); ?>" rel="stylesheet" type="text/css" />
    
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/dark/plugins.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/authentication/registration_stepper.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/stepper/bsStepper.min.php.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/assets/css/light/scrollspyNav.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/stepper/registration_stepper.css'); ?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/assets/css/dark/scrollspyNav.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/stepper/custom-bsStepper.css'); ?>">

    <!-- For Modal -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/assets/css/light/components/modal.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/assets/css/dark/components/modal.css'); ?>"/>

    <link type="text/css" href="<?= base_url('assets/src/plugins/src/animate/animate.css" rel="stylesheet'); ?>" />

    <!-- For Loader -->
    <link href="<?= base_url('assets/src/plugins/css/light/loaders/custom-loader.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/plugins/css/dark/loaders/custom-loader.css'); ?>" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    
</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!-- OTP Loader Overlay -->
    <div id="sendingOtpLoader" class="d-none">
        <div class="loader-container">
            <div class="spinner-grow align-self-center text-danger"></div>
            <p class="loader-text">Sending OTP...</p>
        </div>
    </div>

    <div id="resendingOtpLoader" class="d-none">
        <div class="loader-container">
            <div class="spinner-grow align-self-center text-danger"></div>
            <p class="loader-text">Resending OTP...</p>
        </div>
    </div>

    <div id="verifyingOtpLoader" class="d-none">
        <div class="loader-container">
            <div class="spinner-grow align-self-center text-danger"></div>
            <p class="loader-text">Verifying OTP...</p>
        </div>
    </div>

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
    
                <div class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                    <div class="auth-cover-bg-image"></div>
                    <div class="auth-overlay"></div>
                        
                    <div class="auth-cover">
    
                        <div class="position-relative">
    
                            <img src="<?= base_url('assets/src/assets/img/auth-cover.svg'); ?>" alt="auth-img">
    
                            <h2 class="mt-5 text-white font-weight-bolder px-2">Join the community of expert developers</h2>
                            <p class="text-white px-2">It is easy to setup with great customer experience. Start your 7-day free trial</p>
                        </div>

                    </div>
                </div>

                <!-- OTP Confirmation Modal -->
                <div class="modal fade" id="otpConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="otpConfirmationModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="otpConfirmationModal">Verify Your Email</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                            </div>
                            <div class="modal-body">
                            <p>To complete your registration, we need to verify your email address. An OTP will be sent to <strong><span id="modal-email-display"></span></strong>. Do you want to proceed?</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="proceedToOtpBtn">Proceed</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Register</h4>
                                <p>Fill out the form to Register</p>
                            </div>
                        </div>
                    </div>
                    <div class="bs-stepper stepper-form-validation-one">
                            <div class="bs-stepper-header" role="tablist">
                                <div class="step" data-target="#validationStep-one">
                                    <button type="button" class="step-trigger" role="tab" id="validationStep-one-trigger" aria-controls="validationStep-one">
                                        <div class="d-flex flex-row align-items-center">
                                            <span class="bs-stepper-circle me-2" style="background-color: #C62742"><img src="<?= base_url('assets/images/person-vcard 1.png'); ?>" alt="1"></span>
                                            <span class="bs-stepper-label">Step One</span>
                                        </div>
                                    </button>
                                </div>
                            <div class="line"></div>
                            <div class="step" data-target="#validationStep-two">
                                <button type="button" class="step-trigger" role="tab" id="validationStep-two-trigger" aria-controls="validationStep-two" >
                                    <div class="d-flex flex-row align-items-center">
                                        <span class="bs-stepper-circle" style="background-color: #C62742"><img src="<?= base_url('assets/images/@.png'); ?>" alt="2"></span>
                                        <span class="bs-stepper-label">Step Two</span>
                                    </div>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#validationStep-three">
                                <button type="button" class="step-trigger" role="tab" id="validationStep-three-trigger" aria-controls="validationStep-three" >
                                    <div class="d-flex flex-row align-items-center">
                                        <span class="bs-stepper-circle" style="background-color: #C62742"><img src="<?= base_url('assets/images/card-checklist.png'); ?>" alt="3"></span>
                                        <span class="bs-stepper-title">Review</span>
                                    </div>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#validationStep-four">
                                <button type="button" class="step-trigger" role="tab" id="validationStep-four-trigger" aria-controls="validationStep-four" >
                                    <div class="d-flex flex-row align-items-center">
                                        <span class="bs-stepper-circle" style="background-color: #C62742"><img src="<?= base_url('assets/images/security.png'); ?>" alt="4"></span>
                                        <span class="bs-stepper-title">Verify OTP</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                        <div class="bs-stepper-content">
                            <form class="needs-validation" onsubmit="return false" novalidate>

                                <div id="validationStep-one" class="content" role="tabpanel" aria-labelledby="validationStep-one-trigger">
                                    <div id="test-form-1" class="needs-validation">
                                        <div class="form-group mb-4">
                                            <label for="user-firstname">First Name</label>
                                            <input type="text" class="form-control" id="user-firstname" placeholder="" required>
                                            <div class="invalid-feedback">Please enter your first name</div>

                                            <label for="user-middlename" class="mt-2">Middle Name</label>
                                            <input type="text" class="form-control" id="user-middlename" placeholder="" required>
                                            <div class="invalid-feedback">Please enter your middle name</div>

                                            <label for="user-lastname" class="mt-2">Last Name</label>
                                            <input type="text" class="form-control" id="user-lastname" placeholder="" required>
                                            <div class="invalid-feedback">Please enter your last name</div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="user-suffix" class="mt-2">Suffix</label>
                                                    <input type="text" class="form-control" id="user-suffix" placeholder="Optional">
                                                    <div class="invalid-feedback">Please enter your suffix</div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="user-tupid" class="mt-2">TUP ID</label>
                                                    <input type="text" class="form-control" id="user-tupid" placeholder="" required>
                                                    <div class="invalid-feedback">Please enter your TUP ID</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="button-action mt-5 d-flex justify-content-center">
                                        <button class="btn btn-prev me-3" style="background-color: #C62742; color: #FFFFFF" disabled>Prev</button>
                                        <button class="btn btn-nxt" style="background-color: #C62742; color: #FFFFFF">Next</button>
                                    </div>
                                </div>
                                <div id="validationStep-two" class="content" role="tabpanel" aria-labelledby="validationStep-two-trigger">
                                    <div class="needs-validation">
                                        <div class="form-group mb-4">
                                            <label for="user-tup-email">TUP Email</label>
                                            <input type="email" class="form-control" id="user-tup-email" placeholder="" required>
                                            <div class="invalid-feedback">Please fill the email field</div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="user-password">Password</label>
                                            <input type="password" class="form-control" id="user-password" placeholder="" required>
                                            <div class="invalid-feedback">Please fill the password field</div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="confirm-password">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm-password" placeholder="" required>
                                            <div class="invalid-feedback">Please fill the field</div>
                                        </div>

                                        <div class="form-check form-switch form-check-inline form-switch-danger">
                                            <input class="form-check-input" type="checkbox" role="switch" id="form-switch-primary">
                                            <label class="form-check-label" for="form-switch-primary">Show Password</label>
                                        </div>

                                        <div class="row">
                                            <div class="form-group mb-4 col">
                                                <label for="form-check-radio-primary" class="mt-2">User Type</label> <br>
                                                <div class="form-check form-check-danger form-check-inline">
                                                    <input class="form-check-input" type="radio" name="user_type" id="user-type-faculty" value="Faculty">
                                                    <label class="form-check-label" for="user-type-faculty">
                                                        Faculty
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-danger form-check-inline">
                                                    <input class="form-check-input" type="radio" name="user_type" id="user-type-staff" value="Staff">
                                                    <label class="form-check-label" for="user-type-staff">
                                                        Staff
                                                    </label>
                                                </div>
                                                <div class="invalid-feedback" id="user-type-feedback" style="display: none;"></div>
                                            </div>
                                            <div class="btn-group mb-4 mr-2 col">
                                                <div class="d-flex flex-column ms-5">
                                                    <label for="form-check-radio-primary" class="mt-2">Department / Office</label>
                                                    <button class="btn btn-outline-dark btn-sm dropdown-toggle" type="button" id="departmentDropdownButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Select <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                                                    </button>
                                                    <input type="hidden" id="selectedDepartmentId" name="selected_department_id" value="">
                                                    <div class="invalid-feedback" id="department-feedback" style="display: none;">Please select a department or office</div>
                                                    <div class="dropdown-menu dropdown-menu-scrollable" style="max-height: 250px; overflow-y: auto !important;">
                                                    <?php if (isset($departments) && is_array($departments)): ?>
                                                        <?php foreach ($departments as $department): ?>
                                                            <a href="javascript:void(0);" class="dropdown-item" data-id="<?= esc($department['dep_id']) ?>"><?= esc($department['dep_name']) ?></a>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <a href="javascript:void(0);" class="dropdown-item">No departments found</a>
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="button-action mt-5 d-flex justify-content-center">
                                        <button class="btn btn-prev me-3" style="background-color: #C62742; color: #FFFFFF">Prev</button>
                                        <button class="btn btn-nxt" style="background-color: #C62742; color: #FFFFFF">Next</button>
                                    </div>
                                </div>
                                <div id="validationStep-three" class="content" role="tabpanel" aria-labelledby="validationStep-three-trigger">
                                    <div class="row needs-validation">
                                        <div class="container needs-validation">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted mb-0">First Name</label>
                                                    <span id="review-firstname" class="form-control-plaintext fw-bold"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted mb-0">Middle Name</label>
                                                    <span id="review-middlename" class="form-control-plaintext fw-bold"></span>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted mb-0">Last Name</label>
                                                    <span id="review-lastname" class="form-control-plaintext fw-bold"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted mb-0">Suffix</label>
                                                    <span id="review-suffix" class="form-control-plaintext fw-bold"></span>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                            <div class="col-md-6">
                                                    <label class="form-label text-muted mb-0">TUP Email</label>
                                                    <span id="review-tup-email" class="form-control-plaintext fw-bold"></span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted mb-0">TUP ID</label>
                                                    <span id="review-tupid" class="form-control-plaintext fw-bold"></span>
                                                </div>
                                            </div>
    
                                            <div class="row mb-3">
                                                
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted mb-0">Password</label>
                                                    <span id="review-password-container" class="form-control-plaintext fw-bold d-inline-flex align-items-center">
                                                        <span id="review-password-text">********</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off ms-2" style="width: 1.2em; height: 1.2em; color: #6c757d; cursor: pointer;" id="review-password-toggle">
                                                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.06 18.06 0 0 1 4.76-4.95M9.91 4.24A9.91 9.91 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.9 5.05M2 2l20 20"></path>
                                                        </svg>
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label text-muted mb-0">User Type</label>
                                                    <span id="review-user-type" class="form-control-plaintext fw-bold"></span>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <label class="form-label text-muted mb-0">Department / Office</label>
                                                    <span id="review-department" class="form-control-plaintext fw-bold"></span>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>

                                    <div class="button-action mt-5 d-flex justify-content-center">
                                        <button class="btn btn-prev me-3" style="background-color: #C62742; color: #FFFFFF">Prev</button>
                                        <button class="btn" style="background-color: #C62742; color: #FFFFFF" id="confirmSendOtpBtn" data-bs-toggle="modal" data-bs-target="#otpConfirmationModal">Next</button>
                                    </div>
                                </div>
                                <div id="validationStep-four" class="content" role="tabpanel" aria-labelledby="validationStep-four-trigger">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <h2>Email Verification</h2>
                                            <p>A 6-digit verification code has been sent to your email. Please enter it below.</p>
                                            <p class="text-danger" id="otp-error-message" style="display: none;"></p>
                                            <p class="text-success" id="otp-success-message" style="display: none;"></p>
                                        </div>
                                        <div class="col-12"> <!-- Wrapper column to contain the OTP inputs row and center them -->
                                            <div class="row justify-content-center"> <!-- Row to center the inputs horizontally -->
                                                <div class="col-sm-2 col-3"> <!-- Removed ms-auto from here -->
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control otp-input text-center" maxlength="1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-3">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control otp-input text-center" maxlength="1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-3">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control otp-input text-center" maxlength="1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-3">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control otp-input text-center" maxlength="1">
                                                    </div>
                                                </div>
                                                <!-- ADDED: Two new input fields for 6-digit OTP -->
                                                <div class="col-sm-2 col-3">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control otp-input text-center" maxlength="1">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2 col-3">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control otp-input text-center" maxlength="1">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 mt-4">
                                            <div class="mb-4">
                                                <button class="btn w-100" id="verifyOtpBtn" style="background-color: #C62742; color: #FFFFFF">VERIFY OTP</button>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="text-center">
                                                <p class="mb-0">Didn't receive the code ? <a href="javascript:void(0);" class="text-danger" id="resendOtpLink">Resend</a> <span id="resendCountdownDisplay" class="d-none text-muted ms-2"> (60s)</span></p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="button-action mt-5 d-flex justify-content-center">
                                        <button class="btn btn-prev me-3" style="background-color: #C62742; color: #FFFFFF">Back</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="text-center">
                            <p class="mb-0">Already have an account ? <a href="<?= base_url('login'); ?>" style="color: #C62742">Login</a></p>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

    </div>
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('assets/src/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <script>
        const BASE_URL = "<?= base_url(); ?>";
    </script>
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
     <!-- For Stepper -->
    <script src="<?= base_url('assets/src/plugins/src/stepper/bsStepper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/src/plugins/src/stepper/stepper_registration.js'); ?>"></script>
    
    <!-- END PAGE LEVEL SCRIPTS -->  


</body>
</html>