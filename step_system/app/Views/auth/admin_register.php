<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>TUP STEP | Admin Register</title>
    <link rel="icon" type="image/x-xicon" href="<?= base_url('assets/src/assets/img/favicon.ico'); ?>"/>
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/light/loader.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/dark/loader.css'); ?>" rel="stylesheet" type="text/css" />
    <script src="<?= base_url('assets/layouts/horizontal-light-menu/loader.js'); ?>"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?= base_url('assets/src/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/light/plugins.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/light/authentication/auth-cover.css'); ?>" rel="stylesheet" type="text/css" />
    
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/dark/plugins.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/authentication/auth-cover.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
</head>
<body class="form">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">
    
            <div class="row">
    
                <div class="col-6 d-lg-flex d-none h-100 my-auto top-0 start-0 text-center justify-content-center flex-column">
                    <div class="auth-cover-bg-image"></div>
                    <div class="auth-overlay"></div>
                        
                    <div class="auth-cover">
    
                        <div class="position-relative">
                        </div>
                        
                    </div>

                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                    <div class="card">
                        <div class="card-body">
    
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    
                                    <h2>Admin Registration</h2>
                                    <p>Enter your details to register</p>
                                    
                                </div>
                                <div class="col-md-12">
                                    
                                    <!-- Display general error/success messages -->
                                    <div id="registrationMessage" class="alert d-none" role="alert"></div>

                                    <?php if (isset($validation)): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->listErrors() ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (isset($error)): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= esc($error) ?>
                                        </div>
                                    <?php endif; ?>

                                    <form id="adminRegisterForm" method="POST" action="<?= base_url('/admin/register'); ?>">
                                        <div class="mb-3">
                                            <label for="admin_username" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="admin_username" name="admin_username" value="<?= esc($data['admin_username'] ?? '') ?>">
                                            <div class="invalid-feedback" id="admin_username_error"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label for="admin_password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="admin_password" name="admin_password" value="<?= esc($data['admin_password'] ?? '') ?>">
                                                <div class="invalid-feedback" id="admin_password_error"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?= esc($data['confirm_password'] ?? '') ?>">
                                                <div class="invalid-feedback" id="confirm_password_error"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label for="master_key" class="form-label">Master Key</label>
                                                <input type="text" class="form-control" id="master_key" name="master_key" value="<?= esc($data['master_key'] ?? '') ?>">
                                                <div class="invalid-feedback" id="master_key_error"></div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <div class="form-check form-switch form-check-inline form-switch-danger">
                                                    <input class="form-check-input" type="checkbox" role="switch" id="togglePassword">
                                                    <label class="form-check-label" for="togglePassword">Show Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <button type="submit" id="adminRegisterButton" class="btn w-100" style="background-color: #C62742; color: #FFFFFF">REGISTER</button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="col-12">
                                        <div class="text-center">
                                            <p class="mb-0">Already have an admin account? <a href="<?= base_url('admin/login'); ?>" style="color: #C62742">Login Here</a></p>
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
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('assets/src/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- START PAGE SCRIPTS -->
    <script src="<?= base_url('assets/js/admin_registration_page/admin_register.js'); ?>"></script> <!-- Your custom admin registration JavaScript -->
    <!-- END PAGE SCRIPTS -->


</body>
</html> 