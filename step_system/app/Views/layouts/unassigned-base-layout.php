<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <?= $this->renderSection('title') ?>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/src/assets/img/favicon.ico'); ?>"/>
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/light/loader.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/dark/loader.css'); ?>" rel="stylesheet" type="text/css" />
    <script src="<?= base_url('assets/layouts/horizontal-light-menu/loader.js'); ?>"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?= base_url('assets/src/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/light/plugins.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/layouts/horizontal-light-menu/css/dark/plugins.css'); ?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <?= $this->renderSection('css') ?>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body class="layout-boxed enable-secondaryNav">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN HEADER  -->
    <div class="header-container container-xxl box-shadow-none">
        <?= $this->include('partials/unassigned/unassigned-header'); ?>
    </div>
    <!--  END HEADER  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN NAV  -->
        <?= $this->include('partials/unassigned/unassigned-nav'); ?>
        <!--  END NAV  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content mt-5">
            <div class="layout-px-spacing pt-3">

                <div class="middle-content container-xxl p-0">
                    <?= $this->renderSection('content'); ?>
                </div>

            </div>
            <!--  BEGIN FOOTER  -->
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('assets/src/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/src/plugins/src/mousetrap/mousetrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/src/plugins/src/waves/waves.min.js'); ?>"></script>
    <script src="<?= base_url('assets/layouts/horizontal-light-menu/app.js'); ?>"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <?= $this->renderSection('js') ?>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>