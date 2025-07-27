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
                                    <img src="<?= base_url('assets/images/roles.svg') ?>" class="navbar-logo" alt="logo">
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
                                    <img src="<?= base_url('assets/images/offices.svg') ?>" class="navbar-logo" alt="logo">
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
                                            <th>Type</th>
                                            <th>Department | Office</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (isset($users) && is_array($users)): ?>
                                            <?php foreach ($users as $user): ?>
                                                <tr data-user-id="<?= esc($user['user_id']) ?>" data-original-dep-id="<?= esc($user['dep_id']) ?>" data-original-type="<?= esc($user['user_type']) ?>">
                                                    <td><?= esc($user['user_tupid'] ?? '000000') ?></td>
                                                    <td><?= esc($user['user_firstname']) ?></td>
                                                    <td><?= esc($user['user_lastname']) ?></td>
                                                    <td class="user-type-cell" data-original-value="<?= esc($user['user_type']) ?>"><?= esc($user['user_type']) ?></td>
                                                    <td class="department-name-cell" data-original-value="<?= esc($user['dep_name']) ?>" data-original-dep-id="<?= esc($user['dep_id']) ?>"><?= esc($user['dep_name']) ?></td>
                                                    <td class="action-cell">
                                                        <div class="action-btns">
                                                            <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                                            </a>
                                                            <!-- <a href="javascript:void(0);" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            </a> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No user data available.</td>
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

    <script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>
    <script src="<?= base_url('assets/src/plugins/src/sweetalerts2/sweetalerts2.min.js') ?>"></script>

<script>
    var departmentsData = <?= json_encode($departments) ?>; // Make available globally or in scope

    // Helper function to generate department select HTML
    function getDepartmentSelectHtml(selectedDepId) {
        var departmentSelectHtml = `<select class="form-control form-control-sm department-select">`;
        departmentSelectHtml += `<option value="">Select Department</option>`;

        if (departmentsData.Academic && departmentsData.Academic.length > 0) {
            departmentsData.Academic.sort((a, b) => a.dep_name.localeCompare(b.dep_name));
            departmentSelectHtml += `<optgroup label="Academic">`;
            departmentsData.Academic.forEach(function(department) {
                var selected = (department.dep_id == selectedDepId) ? 'selected' : '';
                departmentSelectHtml += `<option value="${department.dep_id}" ${selected}>${department.dep_name}</option>`;
            });
            departmentSelectHtml += `</optgroup>`;
        }

        if (departmentsData.Administrative && departmentsData.Administrative.length > 0) {
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

    // Helper function to generate user type select HTML
    function getUserTypeSelectHtml(selectedType) {
        var typeSelectHtml = `<select class="form-control form-control-sm user-type-select">`;
        typeSelectHtml += `<option value="Faculty" ${selectedType === 'Faculty' ? 'selected' : ''}>Faculty</option>`;
        typeSelectHtml += `<option value="Staff" ${selectedType === 'Staff' ? 'selected' : ''}>Staff</option>`;
        typeSelectHtml += `</select>`;
        return typeSelectHtml;
    }

    var c1 = $('#style-1').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'<'myFilterDropdown'>><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
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
            var departments = departmentsData;

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
                // Perform a literal, smart, and case-insensitive search on the 'Department | Office' column (index 4).
                api.column(4).search(val, false, true, true).draw();
                console.log('Column 4 data:', api.column(4).data().toArray());
            });
        }
    });

    // Handle Edit button click
    $('#style-1').on('click', '.btn-edit', function () {
        var $row = $(this).closest('tr');
        var userId = $row.data('user-id');
        var originalDepId = $row.data('original-dep-id');
        var originalType = $row.data('original-type');

        // Store original values for cancel functionality
        $row.find('.department-name-cell').data('original-value', $row.find('.department-name-cell').text());
        $row.find('.department-name-cell').data('original-dep-id', originalDepId);
        $row.find('.user-type-cell').data('original-value', $row.find('.user-type-cell').text());

        // Make Department editable as a dropdown
        $row.find('.department-name-cell').html(getDepartmentSelectHtml(originalDepId));

        // Make Type editable as a dropdown
        $row.find('.user-type-cell').html(getUserTypeSelectHtml(originalType));

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

    // Handle Cancel button click
    $('#style-1').on('click', '.btn-cancel', function () {
        var $row = $(this).closest('tr');
        var originalDepName = $row.find('.department-name-cell').data('original-value');
        var originalType = $row.find('.user-type-cell').data('original-value');

        $row.find('.department-name-cell').text(originalDepName);
        $row.find('.user-type-cell').text(originalType);
        $row.find('.action-cell').html(`
            <div class="action-btns">
                <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                </a>
            </div>
        `);
    });

    // Handle Save button click
    $('#style-1').on('click', '.btn-save', function () {
        var $row = $(this).closest('tr');
        var userId = $row.data('user-id');
        var newDepId = $row.find('.department-name-cell select').val();
        var newDepName = $row.find('.department-name-cell select option:selected').text();
        var newType = $row.find('.user-type-cell select').val();

        // Basic validation with SweetAlert
        if (!newDepId || !newType) {
            Swal.fire({
                title: 'Validation Error',
                text: 'Department and Type cannot be empty.',
                icon: 'error',
                confirmButtonColor: '#3085d6'
            });
            return;
        }

        // Show SweetAlert confirmation
        Swal.fire({
            title: 'Confirm Update',
            text: 'Are you sure you want to update this user\'s department and type?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading state
                Swal.fire({
                    title: 'Updating...',
                    text: 'Please wait while we update the user information.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                var url = '<?= base_url('admin/usertype/update') ?>'; // Corrected endpoint
                var dataToSend = {
                    user_id: userId,
                    department_id: newDepId,
                    user_type: newType,
                    '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                };

                // AJAX request to save data
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: dataToSend,
                    dataType: 'json',
                    success: function (response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: 'User updated successfully!',
                                icon: 'success',
                                confirmButtonColor: '#3085d6'
                            }).then(() => {
                                // Update the row with new values
                                $row.find('.user-type-cell').text(newType).data('original-value', newType);
                                $row.find('.department-name-cell').text(newDepName).data('original-value', newDepName).data('original-dep-id', newDepId);

                                // Update DataTables internal data and redraw to reflect changes
                                var rowData = c1.row($row).data();
                                rowData[3] = newType; // Assuming Type is the 4th column (index 3)
                                rowData[4] = newDepName; // Assuming Department is the 5th column (index 4)
                                c1.row($row).data(rowData).draw(false);

                                // Revert buttons to Edit only
                                $row.find('.action-cell').html(`
                                    <div class="action-btns">
                                        <a href="javascript:void(0);" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        </a>
                                    </div>
                                `);
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
                    error: function (xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while updating the user. Please try again.',
                            icon: 'error',
                            confirmButtonColor: '#3085d6'
                        });
                    }
                });
            }
        });
    });

    multiCheck(c1);

</script>
<!-- END PAGE LEVEL SCRIPTS -->

<?= $this->endSection() ?>