$(document).ready(function() {
    // Use event delegation for dynamically created buttons
    $('#style-3 tbody').on('click', '.assign-task-btn', function () {
        const clickedButton = $(this);
        const userId = clickedButton.data('user-id');
        const taskType = clickedButton.data('task-type'); // 'ppmp' or 'pr'
        const taskTypeUpper = taskType.toUpperCase();
        const table = $('#style-3');
        const assignedUser = table.data('assigned-user');
        const isReassigning = clickedButton.hasClass('btn-secondary');

        // Define confirmation dialog options
        // Define confirmation dialog options dynamically
        let confirmationOptions = {
            title: `Confirm ${taskTypeUpper} Assignment`,
            text: `Are you sure you want to assign the ${taskTypeUpper} task?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, assign it!'
        };

        // If another user is already assigned, change the confirmation message
        if (isReassigning && assignedUser) {
            confirmationOptions.title = 'Reassign Task?';
            confirmationOptions.text = `You have already assigned a task. Do you wish to reassign the ${taskTypeUpper} task?`;
        }

        Swal.fire(confirmationOptions).then((result) => {
            // Proceed only if the user confirms
            if (result.isConfirmed) {
                $.ajax({
                    url: '/tasks/assign', // The generalized endpoint
                    type: 'POST',
                    data: { 
                        user_id: userId, 
                        task_type: taskType // Send the task type to the backend
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Assigned!', 'Task assigned successfully.', 'success');

                            // --- Real-time UI Updates ---

                            // --- Real-time UI Updates ---
                            const newAssigneeName = clickedButton.closest('tr').find('td:eq(1)').text().trim() + ' ' + clickedButton.closest('tr').find('td:eq(2)').text().trim();
                            table.data('assigned-user', newAssigneeName);
                            table.data('is-assignment-pending', 'true');

                            // Update all rows in the table to reflect the new state
                            $('#style-3 tbody tr').each(function() {
                                const row = $(this);
                                const button = row.find('.assign-task-btn');
                                const statusBadge = row.find('.status span');
                                const currentUserId = button.data('user-id');

                                if (currentUserId === userId) {
                                    // The user who was just assigned the task
                                    button.text('Assigned').prop('disabled', true).removeClass('btn-primary btn-secondary').addClass('btn-danger');
                                    statusBadge.text('Pending').removeClass('bg-success').addClass('bg-danger');
                                } else {
                                    // All other subordinates
                                    button.text(`Assign ${taskTypeUpper}`).prop('disabled', false).removeClass('btn-danger btn-primary').addClass('btn-secondary');
                                    statusBadge.text('Active').removeClass('bg-danger').addClass('bg-success');
                                }
                            });

                        } else {
                            Swal.fire('Error!', response.message || 'Failed to assign task.', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error!', 'An unexpected error occurred.', 'error');
                    }
                });
            }
        });
    });
});
