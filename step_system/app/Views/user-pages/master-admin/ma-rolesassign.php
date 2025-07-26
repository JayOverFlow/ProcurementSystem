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
                                            <th>TUPT-ID</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Role</th>
                                            <th>Department | Office</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($users) && is_array($users)): ?>
                                            <?php foreach ($users as $user): ?>
                                                <tr>
                                                    <td data-label="TUPT-ID"><?= esc($user['user_tupid'] ?? 'N/A') ?></td>
                                                    <td data-label="First Name"><?= esc($user['user_firstname'] ?? 'N/A') ?></td>
                                                    <td data-label="Last Name"><?= esc($user['user_lastname'] ?? 'N/A') ?></td>
                                                    <td data-label="Role" class="editable-role" data-role-id="<?= esc($user['role_id'] ?? '') ?>"><?= esc($user['role_name'] ?? 'None') ?></td>
                                                    <td data-label="Department | Office" class="editable-department" data-department-id="<?= esc($user['department_id'] ?? '') ?>"><?= esc($user['dep_name'] ?? 'Not Assigned') ?></td>
                                                    <td class="action-cell">
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit" 
                                                               data-user-id="<?= esc($user['user_id']) ?>" 
                                                               data-old-role-id="<?= esc($user['role_id'] ?? '') ?>" 
                                                               data-old-department-id="<?= esc($user['department_id'] ?? '') ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                            </a>
                                                            <!-- <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            </a> -->
                                                        </div>
                                                        <div class="edit-btns" style="display: none;">
                                                            <a href="javascript:void(0);" class="action-btn btn-save bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Save">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                                            </a>
                                                            <a href="javascript:void(0);" class="action-btn btn-cancel bs-tooltip" data-toggle="tooltip" data-placement="top" title="Cancel">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="7" class="text-center">No user data available.</td>
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
                console.log('Filter value:', val);
                // Perform a literal, smart, and case-insensitive search on the 'Department | Office' column (index 5).
                api.column(5).search(val, false, true, true).draw();
                console.log('Column 5 data:', api.column(5).data().toArray());
            });

            // Add button for new assignment
            var addButtonHtml = `
                <button class="btn btn-outline-secondary btn-sm ms-3" id="addAssignmentButton" style="box-shadow: none !important;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                </button>
            `;
            $('.myAddButton').html(addButtonHtml);

            $('#addAssignmentButton').on('click', function() {
                console.log(`[${performance.now().toFixed(2)}] Add Assignment Button Clicked!`);

                var newRowHtml = `
                    <tr class="new-row temp-new-assignment-row">
                        <td data-label="TUPT-ID"><span class="new-tupid-display">N/A</span></td>
                        <td data-label="First Name">
                            <input type="text" class="form-control form-control-sm user-firstname-input" placeholder="First Name">
                            <input type="hidden" class="new-user-id" value="">
                            <div class="user-suggestions-container" style="position: absolute; background-color: white; border: 1px solid #ccc; max-height: 200px; overflow-y: auto; z-index: 1000; width: auto; min-width: 150px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: none;"></div>
                        </td>
                        <td data-label="Last Name"><input type="text" class="form-control form-control-sm user-lastname-input" placeholder="Last Name"></td>
                        <td data-label="Role"><select class="form-control role-select"><option value="">Select Role</option></select></td>
                        <td data-label="Department | Office">` + getDepartmentSelectHtml(null) + `</td>
                        <td class="action-cell">
                            <div class="action-btns new-row-action-btns">
                                <a href="javascript:void(0);" class="action-btn btn-save-new bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Save New">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-save"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                                </a>
                                <a href="javascript:void(0);" class="action-btn btn-cancel-new bs-tooltip" data-toggle="tooltip" data-placement="top" title="Cancel">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                </a>
                            </div>
                        </td>
                    </tr>`;

                $('#style-1 tbody').prepend(newRowHtml);
                
                // Get a reference to the newly prepended row for event listeners
                var $newRow = $('#style-1 tbody').find('.temp-new-assignment-row:first');
                console.log(`[${performance.now().toFixed(2)}] New row prepended. $newRow length: ${$newRow.length}`);

                // Scroll to the new row if it's not visible
                $('html, body').animate({
                    scrollTop: $newRow.offset().top
                }, 500);

                // Attach event listeners for the new row's elements
                // User search functionality
                $newRow.find('.user-firstname-input, .user-lastname-input').on('keyup', function() {
                    var $thisInput = $(this);
                    var query = $thisInput.val();
                    var $suggestionsContainer = $thisInput.closest('td').find('.user-suggestions-container');
                    
                    if (query.length > 2) { // Start searching after 2 characters
                        $.ajax({
                            url: '<?= base_url('admin/rolesassign/searchUsers') ?>',
                            method: 'GET',
                            data: { query: query },
                            dataType: 'json',
                            success: function(users) {
                                $suggestionsContainer.empty();
                                if (users.length > 0) {
                                    users.forEach(function(user) {
                                        var fullname = user.user_firstname + ' ' + user.user_lastname;
                                        $suggestionsContainer.append(`<div class="suggestion-item" data-user-id="${user.user_id}" data-firstname="${user.user_firstname}" data-lastname="${user.user_lastname}" data-tupid="${user.user_tupid || 'N/A'}">${fullname}</div>`);
                                    });
                                    $suggestionsContainer.show();
                                } else {
                                    $suggestionsContainer.hide();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error("Error searching users:", xhr, status, error);
                                $suggestionsContainer.hide();
                            }
                        });
                    } else {
                        $suggestionsContainer.hide();
                    }
                });

                // Handle suggestion item click
                $newRow.on('click', '.suggestion-item', function() {
                    console.log(`[${performance.now().toFixed(2)}] Suggestion Item Clicked!`);
                    var $item = $(this);
                    var userId = $item.data('user-id');
                    var firstname = $item.data('firstname');
                    var lastname = $item.data('lastname');
                    var tuptid = $item.data('tupid');

                    $newRow.find('.new-user-id').val(userId);
                    $newRow.find('.user-firstname-input').val(firstname).prop('readonly', true);
                    $newRow.find('.user-lastname-input').val(lastname).prop('readonly', true);
                    $newRow.find('.new-tupid-display').text(tuptid);
                    $item.parent().hide(); // Hide suggestions container

                    // Now that user is selected, enable and load roles for the department
                    var $departmentSelect = $newRow.find('.department-select');
                    var selectedDepartmentId = $departmentSelect.val();
                    if (selectedDepartmentId) {
                        // Pass null for selectedRoleId for new assignments
                        loadRolesForDepartment(selectedDepartmentId, $newRow.find('.role-select'), null, userId, 'from_new_assign_after_user_select');
                    } else {
                        // If no department is pre-selected, clear roles just in case
                        $newRow.find('.role-select').empty().append('<option value="">None</option>');
                    }
                });

                // Hide suggestions when input loses focus, with a slight delay
                $newRow.find('.user-firstname-input, .user-lastname-input').on('focusout', function() {
                    var $suggestionsContainer = $(this).closest('td').find('.user-suggestions-container');
                    setTimeout(function() {
                        $suggestionsContainer.hide();
                    }, 200); // Small delay to allow click on suggestion item
                });

                // Department change listener for new row
                $newRow.find('.department-select').on('change', function() {
                    console.log(`[${performance.now().toFixed(2)}] New Assignment - Department Change Event Triggered!`);
                    var newDepartmentId = $(this).val();
                    var userId = $newRow.find('.new-user-id').val();
                    var roleSelectElement = $newRow.find('.role-select'); // Correctly target the role select element within the new row

                    if (userId && newDepartmentId) {
                        loadRolesForDepartment(newDepartmentId, roleSelectElement, null, userId, 'from_new_assign_change');
                    } else {
                        roleSelectElement.empty().append('<option value="">None</option>');
                    }
                });
            });
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
            alert('Please select a user.');
            return;
        }
        if (!newDepartmentId) {
            alert('Please select a Department.');
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
                    alert(response.message);
                    // Remove the temporary row before reloading to ensure DataTables refreshes correctly
                    row.remove();
                    window.location.reload(); // Reload to reflect the new assignment in the table
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(`[${performance.now().toFixed(2)}] Error creating user assignment:`, xhr, status, error);
                alert('Failed to create user assignment. Please try again.');
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