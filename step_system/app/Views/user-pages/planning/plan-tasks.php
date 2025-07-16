<?= $this->extend('layouts/plan-base-layout') ?>

<?= $this->section('title') ?>
<title>TUP STEP | Faculty Tasks</title>
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

<!-- <link href="<?= base_url('asssets/src/assets/css/dark/components/modal.css') ?>" rel="stylesheet" type="text/css" /> -->
<link href="<?= base_url('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="statbox widget box box-shadow">
    <div class="widget-content widget-content-area">
        <table id="style-2" class="table style-2 dt-table-hover">
            <thead>
                <tr>
                    <th>Submitted By</th>
                    <th>Document Type</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($tasks)): ?>
                    <?php foreach ($tasks as $task): ?>
                        <tr>
                            <td><?= esc($task['submitted_by_name']) ?></td>
                            <td><?= esc($task['task_type']) ?></td>
                            <td><?= esc(date('F j, Y, g:i a', strtotime($task['created_at']))) ?></td>
                            <td>
                                <?php
                                    $status = esc($task['ppmp_status']);
                                    $badge_class = 'badge-light-primary'; // Default for Pending
                                    if ($status === 'Approved') {
                                        $badge_class = 'badge-light-success';
                                    } elseif ($status === 'Rejected') {
                                        $badge_class = 'badge-light-danger';
                                    }
                                ?>
                                <span class="badge <?= $badge_class ?>"><?= $status ?></span>
                            </td>
                            <td class="text-center">
                                <button class="btn danger btn-sm view-task-btn" style="background-color: #C62742; color: #FFFFFF" data-task-id="<?= esc($task['task_id']) ?>" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Open</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No tasks found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-start border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </button>
                <h5 class="modal-title ms-3" id="exampleModalCenterTitle">Procurement Task</h5>
            </div>
            <hr class="border border-dark my-1">
            <div class="modal-body d-flex justify-content-start align-items-center">
                <div class="ms-3">
                    <h6 id="modal-fullname"></h6>
                    <p id="modal-role"></p>
                    <p ><span id="modal-email"></span> - <span id="modal-date" class="fw-bold"></span></p>
                </div>
            </div>
            <hr class="border border-dark my-1">
            <div class="modal-body">
                <p id="modal-description"></p>
                <div id="modal-action-buttons" class="widget-content text-center mt-5">
                    <button type="button" id="reject-btn" class="btn btn-sm warning reject" style="background-color: #7B7B7B; color: #FFFFFF">REJECT</button>
                    <button type="button" id="approve-btn" class="btn btn-sm warning approve" style="background-color: #C62742; color: #FFFFFF">APPROVE</button>
                </div>
                <div id="modal-status-display" class="text-center mt-5" style="display: none;">
                    <!-- Content will be set by JavaScript -->
                </div>
            </div>
            <hr class="border border-dark my-1">
            <div class="modal-footer d-flex justify-content-start border-top-0">
                <a href="#" id="modal-preview-link" target="_blank" class="ms-3" style="display: none;">
                <img src="<?= base_url('assets/images/red-file-icon.png'); ?>" class="border-0 rounded-0 me-2" alt="file" style="width: 24px; height: 24px;">
                    <span class="text-primary ms-2">View submitted PPMP</span>
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
<script src="<?= base_url('assets/src/assets/js/custom.js'); ?>"></script>
<script src="<?= base_url('assets/js/tasks_page/plan-tasks.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') ?>"></script>

<script>
    c2 = $('#style-2').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'f><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
        },
        "pageLength": 10,
        "order": []
    });
</script>
<?= $this->endSection() ?>