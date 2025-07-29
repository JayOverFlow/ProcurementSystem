<!-- app/Views/general-pages/_subordinates-table.php -->
<div class="table-responsive">
    <table id="subordinates-table" class="table style-3 dt-table-hover" data-assigned-user="<?= esc($dashboard_data['assigned_user_name'] ?? '') ?>">
        <thead>
            <tr>
                <th class="checkbox-column text-center">TUP ID</th>
                <th class="text-center">First Name</th>
                <th class="text-center">Last Name</th>
                <th class="text-center">Status</th>
                <th class="text-center dt-no-sorting">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($dashboard_data['subordinates'])) : ?>
                <tr>
                    <td colspan="5" class="text-center">No subordinates found.</td>
                </tr>
            <?php else : ?>
                <?php foreach ($dashboard_data['subordinates'] as $subordinate) : ?>
                    <tr>
                        <td class="checkbox-column text-center"><?= esc($subordinate['user_tupid'] ?? 'N/A') ?></td>
                        <td class="text-center"><?= esc($subordinate['user_firstname']) ?></td>
                        <td class="text-center"><?= esc($subordinate['user_lastname']) ?></td>
                        <td class="text-center">
                            <span class="badge status-badge <?= $subordinate['has_assignment'] ? 'bg-warning' : 'badge-light-danger' ?>">
                                <?= $subordinate['has_assignment'] ? 'Pending' : 'Not Assigned' ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <?php
                            $buttonText = $subordinate['has_assignment'] ? 'Assigned' : 'Assign';
                            $buttonDisabled = $subordinate['has_assignment'] ? 'disabled' : '';
                            $buttonClass = 'btn-primary'; // Default

                            if ($dashboard_data['is_assignment_pending'] && !$subordinate['has_assignment']) {
                                $buttonClass = 'btn-secondary'; // Grayed out for reassignment
                            }
                            if ($subordinate['has_assignment']) {
                                $buttonClass = 'btn-success'; // Green for the assigned user
                            }
                            ?>
                            <button class="btn <?= $buttonClass ?> btn-sm assign-ppmp-btn" data-user-id="<?= $subordinate['user_id'] ?>" <?= $buttonDisabled ?>>
                                <?= $buttonText ?>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
