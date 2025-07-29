$(document).ready(function() {
    // Use event delegation for dynamically created buttons
    $('#style-3 tbody').on('click', '.assign-ppmp-btn', function () {
        const clickedButton = $(this);
        const userId = clickedButton.data('user-id');
        const table = $('#style-3');
        const assignedUser = table.data('assigned-user');
        const isReassigning = clickedButton.hasClass('btn-secondary');

        // Define confirmation dialog options
        let confirmationOptions = {
            title: 'Confirm Assignment',
            text: 'Are you sure you want to assign this task?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, assign it!'
        };

        // If another user is already assigned, change the confirmation message
        if (isReassigning && assignedUser) {
            confirmationOptions.title = 'Reassign Task?';
            confirmationOptions.text = `You have already assigned ${assignedUser} to draft the PPMP. Do you wish to continue?`;
        }

        Swal.fire(confirmationOptions).then((result) => {
            // Proceed only if the user confirms
            if (result.isConfirmed) {
                $.ajax({
                    url: '/tasks/assign/ppmp', // The endpoint to handle the assignment
                    type: 'POST',
                    data: { user_id: userId },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Assigned!', 'Task assigned successfully.', 'success');

                            // --- Real-time UI Updates ---

                            // 1. Update the main table's data attribute with the new assignee's name
                            const newAssigneeName = clickedButton.closest('tr').find('td:eq(1)').text() + ' ' + clickedButton.closest('tr').find('td:eq(2)').text();
                            $('#style-3').data('assigned-user', newAssigneeName.trim());

                            // 2. Update all rows in the table to reflect the new assignment state
                            $('#style-3').find('tbody tr').each(function() {
                                const row = $(this);
                                const rowUserId = row.find('.assign-ppmp-btn').data('user-id');
                                const button = row.find('.assign-ppmp-btn');
                                const statusBadge = row.find('.status-badge');

                                // Logic to update the row based on the new assignment
                                if (rowUserId === userId) {
                                    // This is the user who was just assigned
                                    statusBadge.text('Pending').removeClass('badge-light-danger').addClass('bg-warning');
                                    button.text('Assigned').prop('disabled', true).removeClass('btn-primary btn-secondary').addClass('btn-danger');
                                } else {
                                    // These are the other users
                                    statusBadge.text('Not Assigned').removeClass('bg-warning').addClass('badge-light-danger');
                                    button.text('Assign').prop('disabled', false).removeClass('btn-primary btn-danger').addClass('btn-secondary');
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
