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

    <!-- For Sweet Alerts -->
    <link rel="stylesheet" href="<?= base_url('assets/src/plugins/src/sweetalerts2/step-sweetalert.css') ?>">
    <link href="<?= base_url('assets/src/plugins/css/light/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/plugins/css/dark/sweetalerts2/custom-sweetalert.css') ?>" rel="stylesheet" type="text/css" />

    <style>
        /* Ensure the container for search and buttons is a flex container and vertically aligned */
        .dataTables_wrapper .dt--top-section .dataTables_filter {
            display: flex;
            align-items: center;
        }

        /* Custom styles for buttons */
        #editAssignmentsButton {
            padding: 0.7rem 1rem; /* Align with search bar */
            margin-top: 0.4rem;
            margin-right: 0.2rem;
            line-height: 1;
            color:rgb(89, 85, 85) !important;
            border-color:rgb(182, 175, 175) !important;
            background-color: transparent;
        }
        #editAssignmentsButton:hover {
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
                                            <th>TUPT-ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Role</th>
                                            <th>Department | Office</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($users) && is_array($users)): ?>
                                            <?php foreach ($users as $user): ?>
                                                <tr data-assignment-id="<?= esc($user['assignment_id']) ?>">
                                                    <td data-label="TUPT-ID" data-user-id="<?= esc($user['user_id']) ?>"><?= esc($user['user_tupid'] ?? 'N/A') ?></td>
                                                    <td data-label="First Name"><?= esc($user['user_firstname'] ?? 'N/A') ?></td>
                                                    <td data-label="Last Name"><?= esc($user['user_lastname'] ?? 'N/A') ?></td>
                                                    <td data-label="Role" class="editable-role" data-role-id="<?= esc($user['role_id'] ?? '') ?>"><?= esc($user['role_name'] ?? 'None') ?></td>
                                                    <td data-label="Department | Office" class="editable-department" data-department-id="<?= esc($user['department_id'] ?? '') ?>"><?= esc($user['dep_name'] ?? 'Not Assigned') ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center">No user data available.</td>
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

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?= base_url('assets/src/assets/js/custom.js') ?>"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
<script src="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') ?>"></script>
<script>
    // var e;
    c1 = $('#style-1').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'<'myFilterDropdown'>><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'<'myAddButton'>f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
        },
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10,
        initComplete: function () {
            var api = this.api();
            var departments = <?= json_encode($departments) ?>;

            var filterHtml = `
                <label class="d-flex align-items-center">Filter:
                    <select id="departmentFilter" class="form-control form-control-sm ms-2">
                        <option value="">All Departments</option>
                        `;

            if (departments.Academic && departments.Academic.length > 0) {
                filterHtml += `<optgroup label="Academic">`;
                departments.Academic.forEach(function(department) {
                    filterHtml += `<option value="${department.dep_name}">${department.dep_name}</option>`;
                });
                filterHtml += `</optgroup>`;
            }

            if (departments.Administrative && departments.Administrative.length > 0) {
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
                // The 'Department | Office' column is the 5th one (index 4)
                api.column(4).search(val ? '^' + val + '$' : '', true, false).draw();
            });

            // Add button for new assignment
            var actionButtonsHtml = `
                <!-- Edit button -->
                <button class="btn btn-outline-danger btn-sm ms-1" id="editAssignmentsButton">Edit</button>
                
                <!-- Add New Row button (Hidden as per request) -->
                <button class="btn btn-outline-secondary btn-sm ms-3 btn-icon-add btn-action-icon" id="addNewAssignmentButton" style="display: none;" title="Add New Assignment" hidden>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </button>
                <!-- Save Changes button -->
                <button class="btn btn-outline-success btn-sm ms-1 btn-icon-save btn-action-icon" id="saveAssignmentsButton" style="display: none;" title="Save Changes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                </button>
                <!-- Cancel button -->
                <button class="btn btn-outline-danger btn-sm ms-1 btn-icon-cancel btn-action-icon" id="cancelEditButton" style="display: none;" title="Cancel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            `;
            $('.myAddButton').html(actionButtonsHtml);

            // Logic for adding a new row will be handled by a new event handler

        }
    });

    // Helper function to generate department select HTML (moved/ensured presence)
    function getDepartmentSelectHtml(selectedDepId) {
        var departmentSelectHtml = `<select class="form-control form-control-sm department-select">`;
        departmentSelectHtml += `<option value="">Select Department</option>`;

        // Sort departments alphabetically within their groups for better UX
        var academicDeps = allDepartments.filter(dep => dep.dep_type === 'Academic').sort((a, b) => a.dep_name.localeCompare(b.dep_name));
        var administrativeDeps = allDepartments.filter(dep => dep.dep_type === 'Administrative').sort((a, b) => a.dep_name.localeCompare(b.dep_name));

        if (academicDeps.length > 0) {
            departmentSelectHtml += `<optgroup label="Academic">`;
            academicDeps.forEach(function(department) {
                var selected = (department.dep_id == selectedDepId) ? 'selected' : '';
                departmentSelectHtml += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelectHtml += `</optgroup>`;
        }

        if (administrativeDeps.length > 0) {
            departmentSelectHtml += `<optgroup label="Administrative">`;
            administrativeDeps.forEach(function(department) {
                var selected = (department.dep_id == selectedDepId) ? 'selected' : '';
                departmentSelectHtml += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelectHtml += `</optgroup>`;
        }
        departmentSelectHtml += `</select>`;
        return departmentSelectHtml;
    }

    // --- GLOBAL EDIT MODE LOGIC ---
    $(document).on('click', '#editAssignmentsButton', function() {
        // Toggle main buttons
        $('#editAssignmentsButton').hide();
        $('#addNewAssignmentButton, #saveAssignmentsButton, #cancelEditButton').show();

        // Make each row editable
        $('#style-1 tbody tr').each(function() {
            var $row = $(this);
            // Correctly get the user-id from the data attribute on the first cell.
            var userId = $row.find('td:first').data('user-id');

            // Store original values
            var originalRoleCell = $row.find('.editable-role');
            var originalDepCell = $row.find('.editable-department');
            $row.data('original-role-html', originalRoleCell.html());
            $row.data('original-dep-html', originalDepCell.html());
            $row.data('original-role-id', originalRoleCell.data('role-id'));
            $row.data('original-department-id', originalDepCell.data('department-id'));
            $row.data('user-id', $row.find('td:first').data('user-id'));
            $row.data('assignment-id', $row.data('assignment-id'));

            // Make Department editable
            var depId = originalDepCell.data('department-id');
            originalDepCell.html(getDepartmentSelectHtml(depId));

            // Make Role editable
            var roleId = originalRoleCell.data('role-id');
            var roleSelect = $('<select class="form-control form-control-sm role-select"></select>');
            originalRoleCell.html(roleSelect);
            loadRolesForDepartment(depId, roleSelect, roleId, userId, 'edit-mode-init');
        });
    });

    // Delegated event handler for department change in edit mode
    $('#style-1 tbody').on('change', 'tr:not(.new-assignment-row) .department-select', function() {
        var $row = $(this).closest('tr');
        var newDepId = $(this).val();
        var roleSelect = $row.find('.role-select');
        var userId = $row.data('user-id');
        // When department changes, we don't pre-select any role
        loadRolesForDepartment(newDepId, roleSelect, null, userId, 'edit-mode-change');
    });

    $(document).on('click', '#cancelEditButton', function() {
        // Toggle main buttons
        $('#addNewAssignmentButton, #saveAssignmentsButton, #cancelEditButton').hide();
        $('#editAssignmentsButton').show();

        // Revert all rows
        $('#style-1 tbody tr').each(function() {
            var $row = $(this);
            if ($row.hasClass('new-assignment-row')) {
                $row.remove();
                return;
            }
            
            $row.find('.editable-role').html($row.data('original-role-html'));
            $row.find('.editable-department').html($row.data('original-dep-html')); // This also removes the appended button
        });
        c1.draw(false); // Redraw table to fix any display issues
    });

    $(document).on('click', '#saveAssignmentsButton', function() {
        var newAssignments = [];
        var updatedAssignments = [];

        // Collect New Assignments
        $('.new-assignment-row').each(function() {
            var $row = $(this);
            var userId = $row.find('.new-user-id').val();
            var departmentId = $row.find('.department-select').val();
            var roleId = $row.find('.role-select').val();

            if (userId && departmentId) { 
                newAssignments.push({ userId: userId, departmentId: departmentId, roleId: roleId || null });
            }
        });

        // Collect Updated Assignments
        $('#style-1 tbody tr:not(.new-assignment-row)').each(function() {
            var $row = $(this);
            var originalRole = $row.data('original-role-id');
            var originalDep = $row.data('original-department-id');
            var newRole = $row.find('.role-select').val();
            var newDep = $row.find('.department-select').val();

            // Check if a change has been made
            if (newRole !== undefined && newDep !== undefined) { // Ensure we are in edit mode for this row
                // Convert to string for consistent comparison, as data attributes can be strings and .val() can be number/string
                var originalRoleStr = String(originalRole || '');
                var newRoleStr = String(newRole || '');
                var originalDepStr = String(originalDep || '');
                var newDepStr = String(newDep || '');

                if (originalRoleStr !== newRoleStr || originalDepStr !== newDepStr) {
                    updatedAssignments.push({
                        assignmentId: $row.data('assignment-id'), // Can be null for users not in the table
                        userId: $row.data('user-id'), // Always needed for the upsert logic
                        newRoleId: newRole || null,
                        newDepartmentId: newDep
                    });
                }
            }
        });

        if (newAssignments.length === 0 && updatedAssignments.length === 0) {
            Swal.fire('No Changes', 'No new or updated assignments to save.', 'info');
            return;
        }

        var confirmText = `You are about to:\n` +
                          (newAssignments.length > 0 ? `- Create ${newAssignments.length} new assignment(s)\n` : '') +
                          (updatedAssignments.length > 0 ? `- Update ${updatedAssignments.length} existing assignment(s)` : '');

        Swal.fire({
            title: 'Confirm Save',
            text: confirmText,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Yes, save it!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?= base_url('admin/rolesassign/bulk-save') ?>',
                    method: 'POST',
                    contentType: 'application/json',
                    data: JSON.stringify({ 
                        newAssignments: newAssignments,
                        updatedAssignments: updatedAssignments
                    }),
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire('Success!', response.message, 'success').then(() => location.reload());
                        } else {
                            Swal.fire('Error!', response.message, 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                    }
                });
            }
        });
    });

    // Handle adding a new row for assignment
    $(document).on('click', '#addNewAssignmentButton', function() {
        var newRowHtml = `
            <tr class="new-assignment-row">
                <td><span class="new-tupid-display">N/A</span></td>
                <td>
                    <input type="text" class="form-control form-control-sm user-search-input" data-search-type="firstname" placeholder="First Name">
                    <div class="user-suggestions-container" style="position: absolute; background-color: white; border: 1px solid #ccc; max-height: 200px; overflow-y: auto; z-index: 1000; width: auto; min-width: 150px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: none;"></div>
                </td>
                <td><input type="text" class="form-control form-control-sm user-search-input" data-search-type="lastname" placeholder="Last Name"></td>
                <td><select class="form-control form-control-sm role-select"><option value="">Select Role</option></select></td>
                <td>${getDepartmentSelectHtml(null)}</td>
            </tr>`;
        
        var $newRow = $(newRowHtml);
        $('#style-1 tbody').prepend($newRow);

        // --- Event listeners for the new row ---
        var $suggestionsContainer = $newRow.find('.user-suggestions-container');

        $newRow.find('.user-search-input').on('keyup', function() {
            var $input = $(this);
            var query = $input.val();
            
            // Position the suggestions container relative to the current input field
            $suggestionsContainer.css({ top: $input.position().top + $input.outerHeight(), left: $input.position().left });

            if (query.length > 1) { // Search after 2 characters
                $.ajax({
                    url: '<?= base_url('admin/rolesassign/searchUsers') ?>',
                    method: 'GET', data: { query: query }, dataType: 'json',
                    success: function(users) {
                        $suggestionsContainer.empty().show();
                        if (users.length > 0) {
                            users.forEach(function(user) {
                                $suggestionsContainer.append(`<div class="suggestion-item" data-user-id="${user.user_id}" data-firstname="${user.user_firstname}" data-lastname="${user.user_lastname}" data-tupid="${user.user_tupid || 'N/A'}">${user.user_firstname} ${user.user_lastname}</div>`);
                            });
                        } else {
                            $suggestionsContainer.append('<div class="p-2">No users found</div>');
                        }
                    }
                });
            } else {
                $suggestionsContainer.hide();
            }
        });

        $suggestionsContainer.on('click', '.suggestion-item', function() {
            var $item = $(this);
            var userId = $item.data('user-id');
            var firstname = $item.data('firstname');
            var lastname = $item.data('lastname');
            var tuptid = $item.data('tupid');

            $newRow.find('.new-user-id').val(userId);
            $newRow.find('.new-tupid-display').text(tuptid);
            $newRow.find('input[data-search-type="firstname"]').val(firstname).prop('readonly', true);
            $newRow.find('input[data-search-type="lastname"]').val(lastname).prop('readonly', true);
            $suggestionsContainer.hide();
        });

        // Hide suggestions when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.user-suggestions-container, .user-search-input').length) {
                $suggestionsContainer.hide();
            }
        });

        $newRow.find('.department-select').on('change', function() {
            var depId = $(this).val();
            var userId = $newRow.find('.new-user-id').val(); // May be empty, and that's okay
            var roleSelect = $newRow.find('.role-select');
            // Load roles as soon as a department is selected. 
            // The user ID is passed so that if a user IS selected, we can still correctly disable occupied roles.
            loadRolesForDepartment(depId, roleSelect, null, userId, 'new-row-change');
        });
    });

    multiCheck(c1);

    // Get all departments and roles data
    var allDepartments = <?= json_encode($allDepartments) ?>;
    // allOccupiedRoles is not used here directly as loadRolesForDepartment fetches specific occupied roles per department

    $('#style-1 tbody').on('click', '.btn-edit', function() {
        console.log(`[${performance.now().toFixed(2)}] Edit Button Clicked!`);

        var row = $(this).closest('tr');
        var userId = $(this).data('user-id');
        var oldRoleId = $(this).data('old-role-id'); // This is the actual role ID from the button's data attribute
        var oldDepartmentId = $(this).data('old-department-id');

        console.log(`[${performance.now().toFixed(2)}] Edit Data - userId: ${userId}, oldRoleId: ${oldRoleId}, oldDepartmentId: ${oldDepartmentId}`);

        // Store original values
        row.data('original-role-text', row.find('.editable-role').text());
        row.data('original-role-id', oldRoleId); // Store oldRoleId from button
        row.data('original-department-text', row.find('.editable-department').text());
        row.data('original-department-id', oldDepartmentId);

        // Hide action buttons, show edit buttons
        row.find('.action-btns').hide();
        row.find('.edit-btns').show();

        // Make Department | Office editable (dropdown)
        var departmentCell = row.find('.editable-department');
        var currentDepartmentId = departmentCell.data('department-id');
        var departmentSelect = `<select class="form-control department-select" data-current-id="${currentDepartmentId}">`;
        departmentSelect += `<option value="">Select Department</option>`;
        // Sort departments alphabetically within their groups for better UX
        var academicDeps = allDepartments.filter(dep => dep.dep_type === 'Academic').sort((a, b) => a.dep_name.localeCompare(b.dep_name));
        var administrativeDeps = allDepartments.filter(dep => dep.dep_type === 'Administrative').sort((a, b) => a.dep_name.localeCompare(b.dep_name));

        if (academicDeps.length > 0) {
            departmentSelect += `<optgroup label="Academic">`;
            academicDeps.forEach(function(department) {
                var selected = (department.dep_id == currentDepartmentId) ? 'selected' : '';
                departmentSelect += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelect += `</optgroup>`;
        }

        if (administrativeDeps.length > 0) {
            departmentSelect += `<optgroup label="Administrative">`;
            administrativeDeps.forEach(function(department) {
                var selected = (department.dep_id == currentDepartmentId) ? 'selected' : '';
                departmentSelect += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelect += `</optgroup>`;
        }
        departmentSelect += `</select>`;
        departmentCell.html(departmentSelect);
        console.log(`[${performance.now().toFixed(2)}] Department Select element replaced in DOM.`);

        // Make Role editable (dropdown)
        var roleCell = row.find('.editable-role');
        // We use oldRoleId here as the selected role for initial population
        var newRoleSelectElement = $('<select class="form-control role-select"><option value="">Select Role</option></select>');
        newRoleSelectElement.attr('data-current-id', oldRoleId); // Set data-current-id on the new select for potential debugging
        roleCell.html(newRoleSelectElement);
        console.log(`[${performance.now().toFixed(2)}] Role Select element replaced in DOM.`);

        // Event listener for department change
        departmentCell.find('.department-select').off('change').on('change', function() {
            console.log(`[${performance.now().toFixed(2)}] Edit - Department Change Event Triggered!`);
            var newDepartmentId = $(this).val();
            // Pass oldRoleId as selectedRoleId to loadRolesForDepartment for initial selection and subsequent changes
            loadRolesForDepartment(newDepartmentId, newRoleSelectElement, oldRoleId, userId, 'from_edit_change');
        });

        // Manually trigger change to load roles for the initially selected department on edit
        departmentCell.find('.department-select').trigger('change');
        console.log(`[${performance.now().toFixed(2)}] Manual 'change' trigger fired for Department Select.`);
    });

    function loadRolesForDepartment(departmentId, roleSelectElement, selectedRoleId, currentEditingUserId, context = 'unknown') {
        console.log(`[${performance.now().toFixed(2)}] --- Entering loadRolesForDepartment (${context}) ---`);
        console.log(`[${performance.now().toFixed(2)}] Args: departmentId= ${departmentId}, selectedRoleId= ${selectedRoleId}, currentEditingUserId= ${currentEditingUserId}`);
        
        if (roleSelectElement.length === 0) {
            console.warn(`[${performance.now().toFixed(2)}] loadRolesForDepartment: roleSelectElement not found or is empty (length 0). Aborting population.`);
            return; // Abort if element not found
        }

        console.log(`[${performance.now().toFixed(2)}] Role select element before empty(): ${roleSelectElement.html()}`);
        roleSelectElement.empty().append('<option value="">None</option>'); // Add None option
        console.log(`[${performance.now().toFixed(2)}] Role select element after empty() and adding None: ${roleSelectElement.html()}`);

        if (departmentId) {
            $.ajax({
                url: '<?= base_url('admin/rolesassign/getRolesByDepartment') ?>/' + departmentId,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    console.log(`[${performance.now().toFixed(2)}] AJAX Success (${context}): Roles received for department ${departmentId}:`, response.roles);
                    var roles = response.roles;
                    var occupiedRolesInDepartment = response.occupiedRoles;
                    console.log(`[${performance.now().toFixed(2)}] Processing roles. Total roles from AJAX: ${roles.length}`);
                    console.log(`[${performance.now().toFixed(2)}] Roles received from backend (raw):`, roles); // Debugging for duplicated roles
                    console.log(`[${performance.now().toFixed(2)}] Role select element before appending roles: ${roleSelectElement.html()}`);
                    roles.forEach(function(role) {
                        // Handle selectedRoleId being 0 or null/empty string as not selected, unless role.role_id is also 0/null.
                        // Explicitly convert selectedRoleId to number for comparison if role.role_id is number, or string if role.role_id is string.
                        const isSelected = (selectedRoleId !== null && selectedRoleId !== '' && role.role_id == selectedRoleId);
                        console.log(`[${performance.now().toFixed(2)}] Adding role: ${role.role_name} ID: ${role.role_id}, Selected check: ${isSelected}, Disabled check: ${(occupiedRolesInDepartment[role.role_id] && occupiedRolesInDepartment[role.role_id] != currentEditingUserId)}`);
                        var selected = isSelected ? 'selected' : '';
                        var disabled = '';
                        // Disable role if it's occupied by another user and not the current user being edited
                        if (occupiedRolesInDepartment[role.role_id] && occupiedRolesInDepartment[role.role_id] != currentEditingUserId) {
                            disabled = 'disabled';
                        }
                        roleSelectElement.append(`<option value="${role.role_id}" ${selected} ${disabled}>${role.role_name}</option>`);
                    });
                    console.log(`[${performance.now().toFixed(2)}] After roles.forEach loop: roleSelect content: ${roleSelectElement.html()}`);
                },
                error: function(xhr, status, error) {
                    console.error(`[${performance.now().toFixed(2)}] Error fetching roles (${context}):`, xhr, status, error);
                    alert('Failed to load roles. Please try again.');
                }
            });
        }
    }

    $('#style-1 tbody').on('click', '.btn-save', function() {
        var row = $(this).closest('tr');
        var userId = row.find('.btn-edit').data('user-id');
        var oldRoleId = row.data('original-role-id');
        var oldDepartmentId = row.data('original-department-id');

        var newDepartmentId = row.find('.department-select').val();
        var newRoleId = row.find('.role-select').val();

        // If newRoleId is empty (None), set it to null for backend
        if (newRoleId === "") {
            newRoleId = null;
        }
        // If newDepartmentId is empty (e.g., if somehow a department isn't selected, though it should be required)
        if (newDepartmentId === "") {
            newDepartmentId = null;
        }

        // Validation checks with SweetAlert
        if (newDepartmentId === null && newRoleId !== null) {
            Swal.fire({
                title: 'Validation Error',
                text: "Cannot assign a role without a department. Please select a department.",
                icon: 'error',
                confirmButtonColor: '#3085d6'
            });
            return;
        } else if (!newRoleId && !newDepartmentId) {
            Swal.fire({
                title: 'Validation Error',
                text: 'Please select a Department and a Role (or None for Role).',
                icon: 'error',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        // Prepare confirmation message based on the action
        var confirmTitle = 'Confirm Assignment Update';
        var confirmText = 'Are you sure you want to update this user assignment?';
        var confirmIcon = 'question';

        if (newRoleId === null && newDepartmentId === null && (oldRoleId !== null || oldDepartmentId !== null)) {
            confirmTitle = 'Confirm Unassignment';
            confirmText = "Are you sure you want to unassign this user from their role and department?";
            confirmIcon = 'warning';
        } else if (newRoleId === null && newDepartmentId !== null) {
            confirmTitle = 'Confirm Department Assignment';
            confirmText = "Are you sure you want to assign this user to a department without a specific role?";
            confirmIcon = 'warning';
        }

        // Show SweetAlert confirmation
        Swal.fire({
            title: confirmTitle,
            text: confirmText,
            icon: confirmIcon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading state
                Swal.fire({
                    title: 'Saving...',
                    text: 'Please wait while we update the assignment.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                var postData = {
                    userId: userId,
                    oldRoleId: oldRoleId,
                    oldDepartmentId: oldDepartmentId,
                    newRoleId: newRoleId,
                    newDepartmentId: newDepartmentId
                };
                console.log(`[${performance.now().toFixed(2)}] Sending data for updateUserAssignment:`, postData);

                $.ajax({
                    url: '<?= base_url('admin/rolesassign/updateUserAssignment') ?>',
                    method: 'POST',
                    data: JSON.stringify(postData),
                    contentType: 'application/json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonColor: '#3085d6'
                            }).then(() => {
                                // Reload the page after successful update
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error',
                                confirmButtonColor: '#3085d6'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(`[${performance.now().toFixed(2)}] Error updating user assignment:`, xhr, status, error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to update user assignment. Please try again.',
                            icon: 'error',
                            confirmButtonColor: '#3085d6'
                        });
                    }
                });
            }
        });
    });

    $('#style-1 tbody').on('click', '.btn-cancel', function() {
        var row = $(this).closest('tr');

        // Revert to original displayed values
        row.find('.editable-role').text(row.data('original-role-text'));
        row.find('.editable-role').data('role-id', row.data('original-role-id'));
        row.find('.editable-department').text(row.data('original-department-text'));
        row.find('.editable-department').data('department-id', row.data('original-department-id'));

        // Revert to display mode
        row.find('.action-btns').show();
        row.find('.edit-btns').hide();
    });

    $('#style-1 tbody').on('click', '.btn-save-new', function() {
        var row = $(this).closest('tr');
        var userId = row.find('.new-user-id').val();
        var newDepartmentId = row.find('.department-select').val();
        var newRoleId = row.find('.role-select').val();

        // Basic validation for new assignment
        if (!userId) {
            Swal.fire({
                title: 'Validation Error!',
                text: 'Please select a user.',
                icon: 'warning',
                confirmButtonColor: '#3085d6'
            });
            return;
        }
        if (!newDepartmentId) {
            Swal.fire({
                title: 'Validation Error!',
                text: 'Please select a Department.',
                icon: 'warning',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        // If newRoleId is empty (None), set it to null for backend
        if (newRoleId === "") {
            newRoleId = null;
        }

        var postData = {
            userId: userId,
            newRoleId: newRoleId,
            newDepartmentId: newDepartmentId
        };
        console.log(`[${performance.now().toFixed(2)}] Sending data for createUserAssignment:`, postData);

        $.ajax({
            url: '<?= base_url('admin/rolesassign/createUserAssignment') ?>',
            method: 'POST',
            data: JSON.stringify(postData),
            contentType: 'application/json',
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonColor: '#3085d6'
                    }).then(() => {
                        // Remove the temporary row before reloading to ensure DataTables refreshes correctly
                        row.remove();
                        window.location.reload(); // Reload to reflect the new assignment in the table
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonColor: '#3085d6'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(`[${performance.now().toFixed(2)}] Error creating user assignment:`, xhr, status, error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to create user assignment. Please try again.',
                    icon: 'error',
                    confirmButtonColor: '#3085d6'
                });
            }
        });
    });

    $('#style-1 tbody').on('click', '.btn-cancel-new', function() {
        var row = $(this).closest('tr');
        row.remove(); // Simply remove the temporary new row
    });


</script>
<!-- END PAGE LEVEL SCRIPTS -->

<?= $this->endSection() ?>