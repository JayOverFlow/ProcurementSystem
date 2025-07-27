<?= $this->extend('user-pages/procurement/layout/pro-base-layout') ?>

<?= $this->section('title') ?>
<title>TUP STEP | Procurement Officer Procurement</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/table/datatable/datatables.css') ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/dt-global_style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/custom_dt_custom.css') ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/custom_dt_custom.css') ?>">

<link rel="stylesheet" href="<?= base_url('assets/src/plugins/src/sweetalerts2/step-sweetalert.css') ?>">

<link href="<?= base_url('assets/src/assets/css/light/components/modal.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />

<link href="<?= base_url('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('general-pages/procurement-table') ?>

<!-- Create Form Modal -->
<div class="modal" id="createFormModal" tabindex="-1" aria-labelledby="createFormModalLabel" aria-hidden="true" data-bs-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius: 1rem;">
      <div class="modal-header position-relative">
        <h5 class="modal-title" id="createFormModalLabel">Create Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <button type="button" class="btn position-absolute top-0 end-0 mt-2 me-2 p-0" data-bs-dismiss="modal" aria-label="Close" style="background:transparent; border:none; z-index:1052;">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#C62742" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="15" y1="9" x2="9" y2="15"></line>
            <line x1="9" y1="9" x2="15" y2="15"></line>
          </svg>
        </button>
      </div>
      <div class="modal-body d-flex flex-column gap-2">
        <a href="<?= base_url('ppmp/create') ?>" class="btn" style="background:#6b0011; color:white;">PROJECT PROCUREMENT MANAGEMENT PLAN</a>
        <a href="<?= base_url('pr/create') ?>" class="btn" style="background:#a10013; color:white;">PURCHASE REQUEST</a>
		<a href="<?= base_url('po/create') ?>" class="btn" style="background:#2d0006; color:white;">PURCHASE ORDER</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') ?>"></script>

<!-- Centralized Procurement Logic -->
<script>
    // Define page-specific variables for the centralized script
    const table_id = '#procurement-table';
    const deleteUrl = '<?= base_url('procurement/delete') ?>';
</script>
<script src="<?= base_url('assets/js/procurement_page/procurement.js') ?>"></script>
<script src="<?= base_url('assets/src/assets/js/custom.js'); ?>"></script>
<?= $this->endSection() ?>