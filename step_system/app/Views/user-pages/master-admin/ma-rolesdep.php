<?= $this->extend('user-pages/master-admin/layout/adm-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Admin Dashboard</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?= base_url('assets/src/plugins/src/apex/apexcharts.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/src/assets/css/light/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/dashboard/dash_1.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <!-- BEGIN PAGE LEVEL CUSTOM STYLES / FOR DATA TABLES-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/table/datatable/datatables.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/custom_dt_custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/dt-global_style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/custom_dt_custom.css') ?>">
    <!-- END PAGE LEVEL CUSTOM STYLES -->

    <!-- BEGIN SWEETALERT2 STYLES -->
    <link rel="stylesheet" href="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.css') ?>">
    <link href="<?= base_url('assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END SWEETALERT2 STYLES -->

<?= $this->endSection() ?>
  

        <!--  BEGIN CONTENT AREA  -->
<?= $this->section('content') ?>
                    <div class="row layout-top-spacing">

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                            <div class="widget widget-t-sales-widget widget-m-income">
                                <div class="media">
                                    <img src="<?= base_url('assets/images/icon-staff.svg') ?>" class="navbar-logo" alt="logo">
                                    <div class="media-body">
                                        <p class="widget-text">Staff</p>
                                        <p class="widget-numeric-value"><?= esc($staffCount ?? 0) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                            <div class="widget widget-t-sales-widget widget-m-customers">
                                <div class="media">
                                    <img src="<?= base_url('assets/images/icon-faculty.svg') ?>" class="navbar-logo" alt="logo">
                                    <div class="media-body">
                                        <p class="widget-text">Faculty</p>
                                        <p class="widget-numeric-value"><?= esc($facultyMembersCount ?? 0) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                            <div class="widget widget-t-sales-widget widget-m-sales">
                                <div class="media">
                                    <img src="<?= base_url('assets/images/icon-offices.svg') ?>" class="navbar-logo" alt="logo">
                                    <div class="media-body">
                                        <p class="widget-text">Roles</p>
                                        <p class="widget-numeric-value"><?= esc($allRoleCount ?? 0) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                            <div class="widget widget-t-sales-widget widget-m-orders">
                                <div class="media">
                                    <img src="<?= base_url('assets/images/icon-departments.svg') ?>" class="navbar-logo" alt="logo">
                                    <div class="media-body">
                                        <p class="widget-text">Offices</p>
                                        <p class="widget-numeric-value"><?= esc($allDepCount ?? 0) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row layout-spacing">
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <table id="style-1" class="table style-1 dt-table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-start">Role</th>
                                            <th>Office | Department</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($rolesDepartments) && is_array($rolesDepartments)): ?>
                                            <?php foreach ($rolesDepartments as $row): ?>
                                                <tr data-role-id="<?= esc($row['role_id']) ?>" data-dep-id="<?= esc($row['dep_id']) ?>">
                                                    <td class="text-start role-name-cell" data-original-value="<?= esc($row['role_name']) ?>"><?= esc($row['role_name']) ?></td>
                                                    <td class="department-name-cell" data-original-value="<?= esc($row['dep_name']) ?>" data-original-dep-id="<?= esc($row['dep_id']) ?>"><?= esc($row['dep_name']) ?></td>
                                                    <td class="text-center action-cell">
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="3" class="text-center">No roles or departments data available.</td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

        <!--  END CONTENT AREA  -->
<?= $this->endSection() ?>


<?= $this->section('js') ?>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="<?= base_url('assets/src/plugins/src/apex/apexcharts.min.js') ?>"></script>
    <script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js') ?>"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
<!-- BEGIN SWEETALERT2 SCRIPTS -->
<script src="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/sweetalerts2/custom-sweetalert.js') ?>"></script>
<!-- END SWEETALERT2 SCRIPTS -->
<script>
    var departmentsData = <?= json_encode($departments) ?>;

    c1 = $('#style-1').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'<'myFilterDropdown'>><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'<'myAddButton'>f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10,
        initComplete: function () {
            var api = this.api();
            var departments = departmentsData;

            var filterHtml = `
                <label class="d-flex align-items-center">Filter:
                    <select id="departmentFilter" class="form-control form-control-sm ms-2">
                        <option value="">All Offices</option>
                        `;

            if (departments.Academic && departments.Academic.length > 0) {
                // Sort Academic departments alphabetically
                departments.Academic.sort((a, b) => a.dep_name.localeCompare(b.dep_name));
                filterHtml += `<optgroup label="Academic">`;
                departments.Academic.forEach(function(department) {
                    filterHtml += `<option value="${department.dep_name}">${department.dep_name}</option>`;
                });
                filterHtml += `</optgroup>`;
            }

            if (departments.Administrative && departments.Administrative.length > 0) {
                // Sort Administrative departments alphabetically
                departments.Administrative.sort((a, b) => a.dep_name.localeCompare(b.dep_name));
                filterHtml += `<optgroup label="Administrative">`;
                departments.Administrative.forEach(function(department) {
                    filterHtml += `<option value="${department.dep_name}">${department.dep_name}</option>`;
                });
                filterHtml += `</optgroup>`;
            }

            filterHtml += `
                    </select>
                </label>
            `;

            $('.myFilterDropdown').html(filterHtml);

            $('#departmentFilter').on('change', function () {
                var val = $(this).val();
                api.column(1).search(val ? '^' + $.fn.dataTable.util.escapeRegex(val) + '$' : '', true, false).draw();
            });

            // Add button for new row
            var addButtonHtml = `
                <button class="btn btn-outline-secondary btn-sm ms-3" id="addRoleButton" style="box-shadow: none !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </button>
            `;
            $('.myAddButton').html(addButtonHtml);

            $('#addRoleButton').on('click', function() {
                var newRowNode = c1.row.add([
                    `<input type="text" class="form-control form-control-sm new-role-name-input" placeholder="New Role Name">`,
                    getDepartmentSelectHtml(null), // Null for no pre-selected department
                    `<div class="action-btns">
                        <a href="javascript:void(0);" class="action-btn btn-save-new bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Save New">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                        </a>
                        <a href="javascript:void(0);" class="action-btn btn-cancel-new bs-tooltip" data-toggle="tooltip" data-placement="top" title="Cancel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        </a>
                    </div>`
                ]).draw().node();
                $(newRowNode).addClass('new-row'); // Add a class to identify new rows

                // Scroll to the new row if it's not visible
                $('html, body').animate({
                    scrollTop: $(newRowNode).offset().top
                }, 500);
            });
        }
    });

    // Helper function to generate department select HTML
    function getDepartmentSelectHtml(selectedDepId) {
        var departmentSelectHtml = `<select class="form-control form-control-sm department-select">`;
        departmentSelectHtml += `<option value="">Select Department</option>`;

        if (departmentsData.Academic && departmentsData.Academic.length > 0) {
            // Sort Academic departments alphabetically
            departmentsData.Academic.sort((a, b) => a.dep_name.localeCompare(b.dep_name));
            departmentSelectHtml += `<optgroup label="Academic">`;
            departmentsData.Academic.forEach(function(department) {
                var selected = (department.dep_id == selectedDepId) ? 'selected' : '';
                departmentSelectHtml += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelectHtml += `</optgroup>`;
        }

        if (departmentsData.Administrative && departmentsData.Administrative.length > 0) {
            // Sort Administrative departments alphabetically
            departmentsData.Administrative.sort((a, b) => a.dep_name.localeCompare(b.dep_name));
            departmentSelectHtml += `<optgroup label="Administrative">`;
            departmentsData.Administrative.forEach(function(department) {
                var selected = (department.dep_id == selectedDepId) ? 'selected' : '';
                departmentSelectHtml += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelectHtml += `</optgroup>`;
        }
        departmentSelectHtml += `</select>`;
        return departmentSelectHtml;
    }

    // Handle Edit button click
    $('#style-1').on('click', '.btn-edit', function () {
        var $row = $(this).closest('tr');
        var roleId = $row.data('role-id');
        var originalRoleName = $row.find('.role-name-cell').data('original-value');
        var originalDepName = $row.find('.department-name-cell').data('original-value');
        var originalDepId = $row.find('.department-name-cell').data('original-dep-id');

        // Make Role Name editable
        $row.find('.role-name-cell').html(`<input type="text" class="form-control form-control-sm" value="${originalRoleName}">`);

        // Make Department editable as a dropdown
        $row.find('.department-name-cell').html(getDepartmentSelectHtml(originalDepId));

        // Change buttons to Save and Cancel
        $row.find('.action-cell').html(`
            <div class="action-btns">
                <a href="javascript:void(0);" class="action-btn btn-save bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Save">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                </a>
                <a href="javascript:void(0);" class="action-btn btn-cancel bs-tooltip" data-toggle="tooltip" data-placement="top" title="Cancel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                </a>
            </div>
        `);
    });

    // Handle Cancel button click (modified to handle new rows)
    $('#style-1').on('click', '.btn-cancel, .btn-cancel-new', function () {
        var $row = $(this).closest('tr');
        if ($row.hasClass('new-row')) {
            c1.row($row).remove().draw(false); // Remove new row if not saved
        } else {
            var originalRoleName = $row.find('.role-name-cell').data('original-value');
            var originalDepName = $row.find('.department-name-cell').data('original-value');

            $row.find('.role-name-cell').text(originalRoleName);
            $row.find('.department-name-cell').text(originalDepName);
            $row.find('.action-cell').html(`
                <div class="action-btns">
                    <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                    </a>
                    <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                </a>
                </div>
            `);
        }
    });

    // Handle Save button click (modified to handle new rows)
    $('#style-1').on('click', '.btn-save, .btn-save-new', function () {
        var $row = $(this).closest('tr');
        var isNewRow = $row.hasClass('new-row');
        var roleId = isNewRow ? null : $row.data('role-id');
        var newRoleName = isNewRow ? $row.find('.new-role-name-input').val() : $row.find('.role-name-cell input').val();
        var newDepId = isNewRow ? $row.find('.department-select').val() : $row.find('.department-name-cell select').val();
        var newDepName = isNewRow ? $row.find('.department-select option:selected').text() : $row.find('.department-name-cell select option:selected').text(); // Get text for display

        // Basic validation
        if (!newRoleName.trim() || !newDepId) {
            alert('Role Name and Department cannot be empty.');
            return;
        }

        var url = isNewRow ? '<?= base_url('admin/rolesdep/create') ?>' : '<?= base_url('admin/rolesdep/update') ?>';
        var dataToSend = {
            role_name: newRoleName,
            dep_id: newDepId,
            '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
        };

        if (!isNewRow) {
            dataToSend.role_id = roleId;
        }

        // AJAX request to save data
        $.ajax({
            url: url,
            type: 'POST',
            data: dataToSend,
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    Swal.fire(
                        isNewRow ? 'Added!' : 'Updated!',
                        isNewRow ? 'Role added successfully.' : 'Role updated successfully.',
                        'success'
                    );
                    if (isNewRow) {
                        // For new row, assign the new role_id and convert to static display
                        $row.data('role-id', response.role_id); // Assuming response returns the new role_id
                        $row.removeClass('new-row');
                    }
                    // Update the row with new values
                    $row.find('.role-name-cell').text(newRoleName).data('original-value', newRoleName);
                    $row.find('.department-name-cell').text(newDepName).data('original-value', newDepName).data('original-dep-id', newDepId);

                    // Update DataTables internal data and redraw
                    var rowData = c1.row($row).data();
                    rowData[0] = newRoleName; // Assuming Role Name is the first column (index 0)
                    rowData[1] = newDepName; // Assuming Department Name is the second column (index 1)
                    c1.row($row).data(rowData).draw(false); // redraw(false) to keep current paging/sorting

                    // Revert buttons to Edit and Delete
                    $row.find('.action-cell').html(`
                        <div class="action-btns">
                            <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            </a>
                            <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </a>
                        </div>
                    `);
                } else {
                    Swal.fire(
                        'Error!',
                        response.message,
                        'error'
                    );
                    // For new rows, if save fails, keep it editable or provide option to retry
                    if (isNewRow) {
                        // Optionally, revert the buttons to save/cancel new if error persists.
                        // Or simply leave it as is for user to correct.
                    }
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
                Swal.fire(
                    'Error!',
                    'An error occurred. Please check console for details.',
                    'error'
                );
            }
        });
    });

    // Handle Delete button click
    $(document).on('click', '.btn-delete', function() {
        var row = $(this).closest('tr');
        var roleId = row.data('role-id');
        var roleName = row.find('.role-name-cell').text();

        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to delete role \"" + roleName + "\". You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('admin/rolesdep/delete') ?>',
                    type: 'POST',
                    data: {
                        role_id: roleId,
                        <?= csrf_token() ?>: '<?= csrf_hash() ?>' // CSRF token
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            );
                            c1.row(row).remove().draw(); // Remove row from DataTable
                        } else {
                            Swal.fire(
                                'Error!',
                                response.message,
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error: ", status, error, xhr.responseText);
                        Swal.fire(
                            'Error!',
                            'An error occurred while trying to delete the role.',
                            'error'
                        );
                    }
                });
            }
        })
    });

    multiCheck(c1);

</script>
<!-- END PAGE LEVEL SCRIPTS -->

<?= $this->endSection() ?>