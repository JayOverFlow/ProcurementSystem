<?= $this->extend('user-pages/assistant-director/layout/ast-dir-base-layout') ?>

<?= $this->section('title') ?>
<title>TUP STEP | Dashboard MR</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="<?= base_url('assets/src/plugins/src/apex/apexcharts.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('assets/src/assets/css/light/dashboard/dash_1.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/src/assets/css/dark/dashboard/dash_1.css'); ?>" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/table/datatable/datatables.css') ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/dt-global_style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/custom_dt_custom.css') ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/custom_dt_custom.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('partials/general/mr'); ?>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js'); ?>"></script>
<script src="<?= base_url('assets/src/assets/js/custom.js'); ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
<script src="<?= base_url('assets/js/mr_page/mr.js') ?>"></script>

<?= $this->endSection() ?>