$(document).ready(function() {
    // Use event delegation for dynamically created buttons
    $('#style-3 tbody').on('click', '.assign-ppmp-btn', function () {
        const userId = $(this).data('user-id');
        const button = $(this);

        Swal.fire({
            title: 'Confirm Assignment',
            text: 'Are you sure you want to assign this task?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, assign it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/tasks/assign/ppmp',
                    type: 'POST',
                    data: { user_id: userId },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Assigned!', 'Task assigned successfully.', 'success');
                            
                            const row = button.closest('tr');
                            row.find('td:eq(3)').html('<span class="badge outline-badge-success mb-1 me-1">Assigned</span>');
                            button.remove();
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
