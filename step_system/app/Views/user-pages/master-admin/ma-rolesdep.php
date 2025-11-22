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

    <style>
        /* Ensure the container for search and buttons is a flex container and vertically aligned */
        .dataTables_wrapper .dt--top-section .dataTables_filter {
            display: flex;
            align-items: center;
        }

        /* Style for rows/items marked for deletion */
        .item-marked-for-deletion {
            text-decoration: line-through;
            opacity: 0.6;
        }
        .item-marked-for-deletion input, .item-marked-for-deletion select {
            pointer-events: none; /* Disable interaction */
            background-color: #ffdddd !important;
        }

        /* Custom styles for buttons */
        #editRolesButton {
            padding: 0.7rem 1rem; /* Align with search bar */
            margin-top: 0.4rem;     
            margin-right: 0.2rem;
            line-height: 1;
            color: #b6afaf !important;
            border-color:rgb(182, 175, 175) !important;
            background-color: transparent;
        }
        #editRolesButton:hover {
            background-color: #e7515a !important;
            color: #fff !important;
        }
        .btn-action-icon {
            padding: 0.4rem 0.5rem; /* Align with search bar */
            margin-top: 0.4rem;
            line-height: 1;
        }
        .btn-icon-add {
            color: #1abc9c !important;
            border-color: #1abc9c !important;
        }
        .btn-icon-add:hover {
            background-color: #1abc9c !important;
            color: #fff !important;
        }
        .btn-icon-save {
            color: #1abc9c !important;
            border-color: #1abc9c !important;
        }
        .btn-icon-save:hover {
            background-color: #1abc9c !important;
            color: #fff !important;
        }
        .btn-icon-cancel {
            color: #e7515a !important;
            border-color: #e7515a !important;
        }
        .btn-icon-cancel:hover {
            background-color: #e7515a !important;
            color: #fff !important;
        }
    </style>

<?= $this->endSection() ?>
  

        <!--  BEGIN CONTENT AREA  -->
<?= $this->section('content') ?>
                    <div class="row layout-top-spacing">

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                            <div class="widget widget-t-sales-widget widget-m-income">
                                <div class="media">
                                    <img src="<?= base_url('assets/images/icon-staff.svg') ?>" class="" alt="logo">
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
                                    <img src="<?= base_url('assets/images/icon-faculty.svg') ?>" class="" alt="logo">
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
                                    <img src="<?= base_url('assets/images/roles.svg') ?>" class="" alt="logo">
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
                                    <img src="<?= base_url('assets/images/offices.svg') ?>" class="" alt="logo">
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
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($rolesDepartments) && is_array($rolesDepartments)): ?>
                                            <?php foreach ($rolesDepartments as $row): ?>
                                                <tr data-role-id="<?= esc($row['role_id']) ?>" data-dep-id="<?= esc($row['dep_id']) ?>">
                                                    <td class="text-start role-name-cell" data-original-value="<?= esc($row['role_name']) ?>"><?= esc($row['role_name']) ?></td>
                                                    <td class="department-name-cell" data-original-value="<?= esc($row['dep_name']) ?>" data-original-dep-id="<?= esc($row['dep_id']) ?>"><?= esc($row['dep_name']) ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="2" class="text-center">No roles or departments data available.</td>
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
            var actionButtonsHtml = `
                <!-- Edit button -->
                <button class="btn btn-outline-danger btn-sm ms-1" id="editRolesButton">Edit</button>
                
                <!-- Add New Row button -->
                <button class="btn btn-outline-secondary btn-sm ms-3 btn-icon-add btn-action-icon" id="addNewRowButton" style="display: none;" title="Add New Row">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </button>
                <!-- Save Changes button -->
                <button class="btn btn-outline-success btn-sm ms-1 btn-icon-save btn-action-icon" id="saveRolesButton" style="display: none;" title="Save Changes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                </button>
                <!-- Cancel button -->
                <button class="btn btn-outline-danger btn-sm ms-1 btn-icon-cancel btn-action-icon" id="cancelEditButton" style="display: none;" title="Cancel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            `;
            $('.myAddButton').html(actionButtonsHtml);

            $('#addNewRowButton').on('click', function() {
                var newRowNode = c1.row.add([
                    `<input type="text" class="form-control form-control-sm new-role-name-input" placeholder="Enter New Role Name">`,
                    getDepartmentSelectHtml(null) // Null for no pre-selected department
                ]).draw().node();
                $(newRowNode).addClass('new-row-entry'); // Add a class to identify new rows for saving
            });
        }
    });

    // Helper function to generate department select HTML
    function getDepartmentSelectHtml(selectedDepId) {
        var departmentSelectHtml = `<select class="form-control form-control-sm department-select">`;
        departmentSelectHtml += `<option value="">Select Department</option>`;
        departmentSelectHtml += `<option value="create-new" style="background-color: #e3f2fd; font-weight: bold;">+ Create New Department</option>`;

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

    // Helper function to generate new department creation HTML
    function getNewDepartmentHtml() {
        return `
            <div class="new-department-container">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm new-dep-name-input" placeholder="Enter Department Name">
                    </div>
                    <div class="col-md-4">
                        <select class="form-control form-control-sm new-dep-type-select">
                            <option value="">Type</option>
                            <option value="Academic">Academic</option>
                            <option value="Administrative">Administrative</option>
                        </select>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="button" class="btn btn-danger mb-2 me-4 create-dep-btn">Create Department</button>
                    <button type="button" class="btn btn-light-danger mb-2 me-4 cancel-new-dep-btn">Cancel</button>
                </div>
            </div>
        `;
    }

    // =========================================================================
    // === GLOBAL EDIT MODE LOGIC ===
    // =========================================================================

    // --- Enter Edit Mode ---
    // When the main 'Edit' button is clicked.
    $(document).on('click', '#editRolesButton', function() {
        // 1. Toggle the main action buttons
        $('#editRolesButton').hide();
        $('#addNewRowButton, #saveRolesButton, #cancelEditButton').show();

        // 2. Make each row in the table editable
        $('#style-1 tbody tr').each(function() {
            var $row = $(this);
            // Skip any row that is for creating a new entry
            if ($row.hasClass('new-row')) {
                return; // 'continue' in a .each() loop
            }

            // Get original values from the cells
            var $roleCell = $row.find('.role-name-cell');
            var originalRoleName = $roleCell.data('original-value');

            var $depCell = $row.find('.department-name-cell');
            var originalDepId = $depCell.data('original-dep-id');

            // --- Make Role cell editable ---
            var roleRemoveButton = '<button class="btn btn-danger btn-sm ms-2 remove-role-btn" title="Remove this Role">&times;</button>';
            $roleCell.html(`<div class="d-flex align-items-center">` + `<input type="text" class="form-control form-control-sm" value="${originalRoleName}">` + roleRemoveButton + `</div>`);

            // --- Make Department cell editable ---
            var depRemoveButton = '<button class="btn btn-danger btn-sm ms-2 remove-dep-btn" title="Remove this Department and all its Roles">&times;</button>';
            $depCell.html(`<div class="d-flex align-items-center">` + getDepartmentSelectHtml(originalDepId) + depRemoveButton + `</div>`);
        });
    });

    // --- Save Changes (Revised Logic) ---
    $(document).on('click', '#saveRolesButton', function() {
        let rolesToDelete = [];
        let depsToDelete = [];
        let itemsToUpdate = [];
        let itemsToCreate = [];
        let isValid = true;

        let deletedRoleNames = [];
        let deletedDepNames = [];

        // 1. Collect data from all rows
        $('#style-1 tbody tr').each(function() {
            const $row = $(this);

            if ($row.hasClass('new-row-entry')) {
                const newRoleName = $row.find('.new-role-name-input').val().trim();
                const newDepId = $row.find('.department-select').val();
                if (newRoleName && newDepId) {
                    itemsToCreate.push({ role_name: newRoleName, dep_id: newDepId });
                } else if (newRoleName || newDepId) {
                    // If one field is filled but not the other, it's an error
                    isValid = false;
                }
                return; // continue
            }

            const roleId = $row.data('role-id');
            const depId = $row.data('dep-id');
            const originalRoleName = $row.find('.role-name-cell').data('original-value');
            const originalDepId = $row.find('.department-name-cell').data('original-dep-id');

            const $roleCellDiv = $row.find('.role-name-cell div');
            const $depCellDiv = $row.find('.department-name-cell div');

            if ($roleCellDiv.hasClass('item-marked-for-deletion')) {
                rolesToDelete.push(roleId);
                deletedRoleNames.push(`"${originalRoleName}"`);
            } else if ($depCellDiv.hasClass('item-marked-for-deletion')) {
                depsToDelete.push(depId);
                const depName = $row.find('.department-name-cell').data('original-value');
                deletedDepNames.push(`"${depName}"`);
            } else {
                const newRoleName = $roleCellDiv.find('input').val().trim();
                const newDepId = $depCellDiv.find('select').val();

                if (!newRoleName || !newDepId) {
                    isValid = false;
                    return false; // break
                }

                if (newRoleName !== originalRoleName || newDepId != originalDepId) {
                    itemsToUpdate.push({ role_id: roleId, role_name: newRoleName, dep_id: newDepId });
                }
            }
        });

        if (!isValid) {
            Swal.fire('Invalid Input', 'All fields are required for new or updated roles.', 'error');
            return;
        }

        // 2. Build dynamic confirmation message
        let confirmationText = 'Are you sure?\n';
        if (itemsToCreate.length > 0) {
            confirmationText += `\nYou are about to CREATE ${itemsToCreate.length} new item(s).`;
        }
        if (deletedRoleNames.length > 0) {
            confirmationText += `\nYou are about to DELETE ${deletedRoleNames.length} role(s).`;
        }
        if (deletedDepNames.length > 0) {
            confirmationText += `\nYou are about to DELETE ${deletedDepNames.length} department(s) and all their roles.`;
        }
        if (itemsToUpdate.length > 0) {
            confirmationText += `\nYou are about to UPDATE ${itemsToUpdate.length} item(s).`;
        }
        confirmationText += '\nThis action cannot be undone.';

        if (rolesToDelete.length === 0 && depsToDelete.length === 0 && itemsToUpdate.length === 0 && itemsToCreate.length === 0) {
            Swal.fire('No Changes', 'You have not made any changes to save.', 'info');
            return;
        }

        // 3. Show confirmation
        Swal.fire({
            title: 'Confirm Changes',
            text: confirmationText,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, save it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Chain AJAX calls: Dep Deletions -> Role Deletions -> Creations -> Updates
                deleteDepartments(depsToDelete).then(() => {
                    deleteRoles(rolesToDelete).then(() => {
                        createItems(itemsToCreate).then(() => {
                            updateItems(itemsToUpdate).then(() => {
                                Swal.fire('Success!', 'All changes have been saved.', 'success').then(() => {
                                    location.reload();
                                });
                            });
                        });
                    });
                });
            }
        });
    });

    // Helper function for department deletion AJAX
    function deleteDepartments(depIds) {
        if (depIds.length === 0) return Promise.resolve();
        return $.ajax({
            url: '<?= base_url('admin/rolesdep/bulk-delete-deps') ?>',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(depIds),
            error: (e) => Swal.fire('Error!', 'Failed to delete departments.', 'error')
        });
    }

    // Helper function for role deletion AJAX
    function deleteRoles(roleIds) {
        if (roleIds.length === 0) return Promise.resolve();
        return $.ajax({
            url: '<?= base_url('admin/rolesdep/bulk-delete') ?>',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(roleIds),
            error: (e) => Swal.fire('Error!', 'Failed to delete roles.', 'error')
        });
    }

    // Helper function for item update AJAX
    function updateItems(items) {
        if (items.length === 0) return Promise.resolve();
        return $.ajax({
            url: '<?= base_url('admin/rolesdep/bulk-update') ?>',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(items),
            error: (e) => Swal.fire('Error!', 'Failed to update items.', 'error')
        });
    }

    // Helper function for item creation AJAX
    function createItems(items) {
        if (items.length === 0) return Promise.resolve();
        
        // We need to send these one by one because the endpoint is designed for single creation
        const createPromises = items.map(item => {
            return $.ajax({
                url: '<?= base_url('admin/rolesdep/create') ?>',
                type: 'POST',
                data: {
                    'role_name': item.role_name,
                    'dep_id': item.dep_id,
                    '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                },
                error: (e) => Swal.fire('Error!', `Failed to create role: ${item.role_name}.`, 'error')
            });
        });

        return Promise.all(createPromises);
    }

    // --- Cancel Edit Mode ---
    // When the main 'Cancel' button is clicked.
    $(document).on('click', '#cancelEditButton', function() {
        // 1. Restore the main action buttons to their default state
        $('#addNewRowButton, #saveRolesButton, #cancelEditButton').hide();
        $('#editRolesButton').show();

        // 2. Revert all rows back to their original, non-editable state
        $('#style-1 tbody tr').each(function() {
            var $row = $(this);
            // If a new-row was added and not saved, remove it on cancel
            if ($row.hasClass('new-row-entry')) {
                c1.row($row).remove().draw(false);
                return; // 'continue' in a .each() loop
            }

            // Remove deletion marking if it exists
            $row.find('.item-marked-for-deletion').removeClass('item-marked-for-deletion');

            // --- Revert Role cell ---
            var $roleCell = $row.find('.role-name-cell');
            var originalRoleName = $roleCell.data('original-value');
            $roleCell.text(originalRoleName);

            // --- Revert Department cell ---
            var $depCell = $row.find('.department-name-cell');
            var originalDepName = $depCell.data('original-value');
            $depCell.text(originalDepName);
        });
    });

    // --- Mark Role for Deletion ---
    $(document).on('click', '.remove-role-btn', function() {
        var $container = $(this).closest('div');
        $container.toggleClass('item-marked-for-deletion');
        // If marking a role for deletion, ensure the department is not marked
        $container.closest('tr').find('.department-name-cell div').removeClass('item-marked-for-deletion');
    });

    // --- Mark Department for Deletion ---
    $(document).on('click', '.remove-dep-btn', function() {
        var $container = $(this).closest('div');
        $container.toggleClass('item-marked-for-deletion');
        // If marking a department for deletion, ensure the role is not marked
        $container.closest('tr').find('.role-name-cell div').removeClass('item-marked-for-deletion');
    });

    // Handle department select change - show create new department form when "create-new" is selected
    $('#style-1').on('change', '.department-select', function() {
        var $select = $(this);
        var $cell = $select.closest('td');
        
        if ($select.val() === 'create-new') {
            $cell.html(getNewDepartmentHtml());
        }
    });

    // Handle create department button click
    $('#style-1').on('click', '.create-dep-btn', function() {
        var $container = $(this).closest('.new-department-container');
        var depName = $container.find('.new-dep-name-input').val().trim();
        var depType = $container.find('.new-dep-type-select').val();
        
        // Validation
        if (!depName) {
            alert('Department name is required.');
            return;
        }
        
        if (!depType) {
            alert('Department type is required.');
            return;
        }
        
        // AJAX request to create new department
        $.ajax({
            url: '<?= base_url('admin/department/create') ?>',
            type: 'POST',
            data: {
                dep_name: depName,
                dep_type: depType,
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Add the new department to the departmentsData object
                    var newDepartment = {
                        dep_id: response.dep_id,
                        dep_name: response.dep_name,
                        dep_type: response.dep_type
                    };
                    
                    if (!departmentsData[response.dep_type]) {
                        departmentsData[response.dep_type] = [];
                    }
                    departmentsData[response.dep_type].push(newDepartment);
                    
                    // Replace the create form with a select dropdown with the new department selected
                    var $cell = $container.closest('td');
                    $cell.html(getDepartmentSelectHtml(response.dep_id));
                    
                    // After creating the department, automatically proceed to save the role
                    var $row = $cell.closest('tr');
                    var isNewRow = $row.hasClass('new-row');
                    
                    if (isNewRow) {
                        // Get the role name from the input field
                        var newRoleName = $row.find('.new-role-name-input').val().trim();
                        
                        if (newRoleName) {
                            // Automatically save the role with the newly created department
                            saveRoleWithDepartment($row, newRoleName, response.dep_id, response.dep_name, true);
                        } else {
                            Swal.fire(
                                'Department Created!',
                                'Department "' + response.dep_name + '" created successfully. Please enter a role name to complete the process.',
                                'success'
                            );
                        }
                    } else {
                        Swal.fire(
                            'Created!',
                            'Department "' + response.dep_name + '" created successfully.',
                            'success'
                        );
                    }
                } else {
                    Swal.fire(
                        'Error!',
                        response.message,
                        'error'
                    );
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                Swal.fire(
                    'Error!',
                    'An error occurred while creating the department.',
                    'error'
                );
            }
        });
    });

    // Handle cancel new department button click
    $('#style-1').on('click', '.cancel-new-dep-btn', function() {
        var $container = $(this).closest('.new-department-container');
        var $cell = $container.closest('td');
        
        // Replace the create form with the original select dropdown
        $cell.html(getDepartmentSelectHtml(null));
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