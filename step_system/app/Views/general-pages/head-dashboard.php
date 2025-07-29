<div class="col-xxl-9 col-lg-9 col-md-12 col-sm-12 col-12 d-flex flex-column h-100">
        <!-- Row 1: Three Cards -->
        <div class="row flex-grow-1">
            <!-- Faculty Members Card -->
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
                    <div class="card-top-content">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
                        </div>
                    </div>
                    <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                        <div class="card-body text-end">
                            <h5 class="card-title mb-2" style="color: #8C0404"><strong>Faculty Members</strong></h5>
                            <h5 class="card-text" style="color: #515365"><?= esc($dashboard_data['faculty_count']) ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Staff Card -->
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
                    <div class="card-top-content">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/images/icon-staff.svg'); ?>" class="rounded-circle" alt="faculty icon">
                        </div>
                    </div>
                    <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                        <div class="card-body text-end">
                            <h5 class="card-title mb-2" style="color: #8C0404"><strong>Staff</strong></h5>
                            <h5 class="card-text" style="color: #515365"><?= esc($dashboard_data['staff_count']) ?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Department Budget Card -->
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
                    <div class="card-top-content">
                        <div class="avatar avatar-lg">
                            <img src="<?= base_url('assets/images/icon-budget.svg'); ?>" class="rounded-circle" alt="faculty icon">
                        </div>
                    </div>
                    <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                        <div class="card-body text-end">
                            <h5 class="card-title mb-2" style="color: #8C0404"><strong>Department Budget</strong></h5>
                            <h5 class="card-text" style="color: #515365">₱<?= esc($dashboard_data['department_budget']['bud_total'] ?? '0.00') ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row 2: Data Table -->
        <div class="row flex-grow-1 mt-4">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="statbox widget box box-shadow h-100">
                    <div class="widget-content widget-content-area h-100">
                        <table id="style-3" class="table style-3 dt-table-hover" data-assigned-user="<?= esc($dashboard_data['assigned_user_name'] ?? '', 'attr') ?>">
                            <thead>
                                <tr>
                                    <th class="checkbox-column text-center">TUP-T ID</th>
                                    <th class="text-center">First Name</th>
                                    <th class="text-center">Last Name</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center dt-no-sorting">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($dashboard_data['subordinates'])): ?>
                                    <tr>
                                    <td colspan="5" class="text-center">Nothing to see here.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($dashboard_data['subordinates'] as $subordinate): ?>
                                        <tr>
                                            <td class="checkbox-column text-center"><?= esc($subordinate['user_tupid'] ?? 'Unknown') ?></td>
                                            <td class="text-center"><?= esc($subordinate['user_firstname']) ?></td>
                                            <td class="text-center"><?= esc($subordinate['user_lastname']) ?></td>
                                            <td class="text-center">
                                                <!-- Status Badge -->
                                                <?php
                                                    $hasAssignment = $subordinate['has_assignment'];
                                                    $statusText = $hasAssignment ? 'Pending' : 'Not Assigned';
                                                    $statusClass = $hasAssignment ? 'bg-warning' : 'badge-light-danger';
                                                ?>
                                                <span class="badge status-badge <?= $statusClass ?>">
                                                    <?= $statusText ?>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <!-- Action Button -->
                                                <?php
                                                    $nextTask = $subordinate['next_task'];
                                                    $taskTypeUpper = strtoupper($nextTask);
                                                    $isAssignmentPending = $dashboard_data['is_assignment_pending'];

                                                    // Default state
                                                    $buttonText = "Assign $taskTypeUpper";
                                                    $buttonClass = 'btn-danger';
                                                    $buttonDisabled = '';

                                                    if ($hasAssignment) {
                                                        // This is the currently assigned user
                                                        $buttonText = 'Assigned';
                                                        $buttonClass = 'btn-danger';
                                                        $buttonDisabled = 'disabled';
                                                    } elseif ($isAssignmentPending) {
                                                        // Another user is assigned, so this button is disabled to prevent multiple assignments.
                                                        $buttonText = "Assign $taskTypeUpper";
                                                        $buttonClass = 'btn-danger';
                                                        $buttonDisabled = 'disabled';
                                                    }
                                                ?>
                                                <button class="btn <?= $buttonClass ?> btn-sm assign-task-btn" 
                                                        data-user-id="<?= $subordinate['user_id'] ?>" 
                                                        data-task-type="<?= $nextTask ?>" <?= $buttonDisabled ?>>
                                                    <?= $buttonText ?>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                </div>
                </div>
            </div>
        </div>
    </div>