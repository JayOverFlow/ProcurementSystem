<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>TUP STEP | Login</title>
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
    
                            <img src="<?= base_url('assets/src/assets/img/auth-cover.svg'); ?>" alt="auth-img">
    
                            <h2 class="mt-5 text-white font-weight-bolder px-2">Join the community of expert developers</h2>
                            <p class="text-white px-2">It is easy to setup with great customer experience. Start your 7-day free trial</p>
                        </div>
                        
                    </div>

                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center ms-lg-auto me-lg-0 mx-auto">
                    <div class="card">
                        <div class="card-body">
    
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    
                                    <h2>Login</h2>
                                    <p>Enter your email and password to login</p>
                                    
                                </div>
                                <div class="col-md-12">
                                    
                                    <!-- Display general error/success messages -->
                                    <div id="loginMessage" class="alert d-none" role="alert"></div>

                                    <!-- CodeIgniter server-side validation errors (for non-AJAX fallback if needed) -->
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

                                    <form id="loginForm" method="POST" action="<?= base_url('/login'); ?>">
                                        <div class="mb-3">
                                            <label for="user_email" class="form-label">TUP Email</label>
                                            <input type="email" class="form-control" id="user_email" name="user_email" value="<?= esc($data['user_email'] ?? '') ?>">
                                            <div class="invalid-feedback" id="user_email_error"></div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-4">
                                                <label for="user_password" class="form-label">Password</label>
                                                <input type="password" class="form-control" id="user_password" name="user_password" value="<?= esc($data['user_password'] ?? '') ?>">
                                                <div class="invalid-feedback" id="user_password_error"></div>
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
                                                <button type="submit" id="loginButton" class="btn w-100" style="background-color: #C62742; color: #FFFFFF">LOGIN</button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="col-12">
                                        <div class="text-center">
                                            <p class="mb-0">Don't have an account ? <a href="<?= base_url('register'); ?>" style="color: #C62742">Register</a></p>
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
    <script src="<?= base_url('assets/js/login_page/login.js'); ?>"></script> <!-- Your custom login JavaScript -->
    <!-- END PAGE SCRIPTS -->


</body>
</html>