<?= $this->extend('user-pages/procurement/layout/pro-base-layout') ?>

<?= $this->section('title') ?>
<title>TUP STEP | Procurement Office Purchase Order</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>

<link href="<?= base_url('assets/src/assets/css/light/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />

<link href="<?= base_url('assets/src/assets/css/dark/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />

<!-- For Sweet Alerts -->
<link rel="stylesheet" href="<?= base_url('assets/src/plugins/src/sweetalerts2/step-sweetalert.css') ?>">
<link href="<?= base_url('assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('forms/po') ?>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
  .description-btn {
    border: none;
    background: none;
    color: inherit;
    height: 32px;
    padding-top: 0;
    padding-bottom: 0;
  }
  .description-btn:focus {
    box-shadow: none;
  }
  .input-group .description-btn,
  .input-group .description-btn:focus,
  .input-group .description-btn:active,
  .input-group .description-btn:hover {
    background: none !important;
    border: none !important;
    box-shadow: none !important;
    color: inherit !important;
    outline: none !important;
  }
</style>
<script src="<?= base_url('assets/src/assets/js/apps/pro-po.js') ?>"></script>

<!-- For Sweet Alerts -->
<script src="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') ?>"></script>

<script>
    <?php if (session()->getFlashdata('success')) : ?>
        Swal.fire({
            icon: 'success',
            title: 'Saved!',
            text: '<?= session()->getFlashdata('success') ?>',
        });
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')) : ?>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '<?= session()->getFlashdata('error') ?>',
        });
    <?php endif; ?>
</script>
<?= $this->endSection() ?>