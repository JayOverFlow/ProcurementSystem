<?= $this->extend('user-pages/supply/layout/sup-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Supply PR Bidding List</title>
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
    <div class="row layout-spacing mt-4">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">

                    <table id="pr-bidding-table" class="table style-3 dt-table-hover">
                        <thead>
                        <tr>
                            <th>PR ID</th>
                            <th>Requested By</th>
                            <th>Department</th>
                            <th>PR Date</th>
                            <th class="text-center dt-no-sorting">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($prs)): ?>
                            <?php foreach ($prs as $pr): ?>
                                <tr>
                                    <td><?= esc($pr['pr_id']) ?></td>
                                    <td><?= esc($pr['requested_by_name']) ?></td>
                                    <td><?= esc($pr['department_name']) ?></td>
                                    <td><?= esc($pr['pr_no_date']) ?></td>
                                    <td class="text-center">
                                        <ul class="table-controls">
                                            <li>
                                                <a href="<?= site_url('supply/pr/bidding-status-form/' . $pr['pr_id']) ?>" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Update Bidding Status">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= site_url('pr/preview/' . $pr['pr_id']) ?>" target="_blank" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="View PR Details">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye p-1 br-8 mb-1"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No approved Purchase Requests found for bidding.</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Department Filter Content -->
    <div id="department-filter-content" style="display: none;">
        <label for="departmentFilter" class="form-label mt-2 me-2">Department: </label>
        <select class="form-control form-control-sm w-50" id="departmentFilter">
            <option value="">All Departments</option>
            <?php foreach ($departments as $department): ?>
                <option value="<?= esc($department['dep_name']) ?>"><?= esc($department['dep_name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
    <script>
        $(document).ready(function() {
            var table = $('#pr-bidding-table').DataTable({
                "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center dt-filter-target'><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
                    "<'table-responsive'tr>" +
                    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count mb-sm-0 mb-3'i><'dt--pagination'p>>",
                "oLanguage": {
                    "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_", // Keep sLengthMenu for translation but it won't be used due to `l` removal
                },
                "stripeClasses": [],
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 10,
                "columnDefs": [
                    { "orderable": false, "targets": [4] } // Disable sorting for Action column
                ]
            });

            // Move and display the custom department filter
            $('.dt-filter-target').append($('#department-filter-content').contents());
            $('#department-filter-content').remove(); // Remove the now empty hidden div

            // Custom filtering for department
            $('#departmentFilter').on('change', function() {
                table.column(2).search(this.value).draw(); // Column index 2 is 'Department'
            });
        });
    </script>
<?= $this->endSection() ?>