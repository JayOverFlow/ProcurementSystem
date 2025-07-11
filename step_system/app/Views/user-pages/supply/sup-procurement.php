<?= $this->extned('layouts/sup-base-layout') ?>

<?= $this->section('css') ?>
    <link href="<?= base_url('assets/src/plugins/src/apex/apexcharts.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/src/assets/css/light/dashboard/dash_1.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/dashboard/dash_1.css'); ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js'); ?>"></script>
<?= $this->endSection() ?>