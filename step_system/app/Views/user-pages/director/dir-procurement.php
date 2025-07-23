<?= $this->extend('layouts/dir-base-layout') ?>

<?= $this->section('title') ?>
<title>TUP STEP | Director Procurement</title>
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
<div class="row align-items-center justify-content-between">
	<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
		<div class="widget-content widget-content-area br-8 d-flex flex-column justify-content-center" style="min-height: 120px;">
			<div class="table-responsive">
				<div id="ecommerce-list_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
					<div class="row pt-4 pb-0 align-items-center justify-content-center">
						<div class="col-auto d-flex align-items-center ms-3" style="gap: 0.5rem;">
							<input class="form-check-input" type="checkbox" id="filterCheckbox" style="width: 1.1em; height: 1.1em;" checked>
							<label for="filter-form-type" class="form-label mb-0 me-1" style="font-weight: 500;">Filter:</label>
							<select class="form-select form-select-sm" id="filter-form-type" style="width: 110px; min-width: 80px; font-size: 0.95rem;">
								<option value="PR">PR</option>
								<option value="PPMP">PPMP</option>
								<option value="" selected>All</option>
							</select>
						</div>
						<div class="col d-flex justify-content-end align-items-center">
							<div class="input-group w-auto me-2" style="min-width:200px;">
								<input id="custom-search" type="text" class="form-control" placeholder="Search...">
							</div>
							<button class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#createFormModal">CREATE</button>
							<button class="btn btn-dark d-flex align-items-center justify-content-center p-0" style="height:38px; width:38px; min-width:0;">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
									<polyline points="3 6 5 6 21 6"></polyline>
									<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
									<line x1="10" y1="11" x2="10" y2="17"></line>
									<line x1="14" y1="11" x2="14" y2="17"></line>
								</svg>
							</button>
						</div>
					</div>
						<table id="procurement-table" class="table table-hover text-nowrap">
							<thead>
								<tr>
									<th style="min-width: 40px; width: 40px;"><input class="form-check-input" type="checkbox" id="select-all"></th>
									<th>Form</th>
									<th>Document-Id</th>
									<th>Sent To</th>
									<th>Created</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($forms)): ?>
									<?php foreach ($forms as $form): ?>
										<?php /* Make the entire row clickable to view/edit the form */ ?>
										<tr data-href="<?= base_url(strtolower($form['type']) . '/create/' . esc($form['document_id'])) ?>" style="cursor: pointer;">
											<td><input class="form-check-input" type="checkbox" onclick="event.stopPropagation();"></td>
											<td><?= esc($form['type']) ?></td>
											<td><?= esc($form['document_id']) ?></td>
											<td><?= esc($form['sent_to']) ?></td>
											<td><?= esc($form['created_at']) ?></td>
										</tr>
									<?php endforeach; ?>
								<?php else: ?>
									<tr>
										<td colspan="5" class="text-center">You haven't created any forms yet.</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
<script>
    $(document).ready(function() {
        var table = $('#procurement-table').DataTable({
            "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'>>><'table-responsive'tr><'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "\tShowing page _PAGE_ of _PAGES_",
                "sSearch": "",
                "sSearchPlaceholder": "",
                // No length menu
            },
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 10,
            "order": [],
            "columnDefs": [
                { "orderable": false, "targets": 0 }
            ]
        });
        // Custom search input
        $('#custom-search').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Handle "select all" checkbox
        $('#select-all').on('click', function() {
            var rows = table.rows({ 'search': 'applied' }).nodes();
            $('input[type="checkbox"]', rows).prop('checked', this.checked);
        });

        // Handle individual checkbox clicks
        $('#procurement-table tbody').on('change', 'input[type="checkbox"]', function() {
            if (!this.checked) {
                var el = $('#select-all').get(0);
                if (el && el.checked && ('indeterminate' in el)) {
                    el.indeterminate = true;
                }
            }
        });

        // Handle row click to navigate
        $('#procurement-table tbody').on('click', 'tr[data-href]', function(event) {
            // Prevent navigation if the click was on a checkbox
            if (!$(event.target).is('input[type="checkbox"]')) {
                window.location.href = $(this).data('href');
            }
        });
    });
</script>
<script src="<?= base_url('assets/src/assets/js/custom.js'); ?>"></script>
<script src="<?= base_url('assets/js/procurement_page/procurement.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') ?>"></script>
<?= $this->endSection() ?>