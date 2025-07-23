// procurement.js
$(document).ready(function() {
    // Filter logic
    function filterTable() {
        var filterEnabled = $('#filterCheckbox').is(':checked');
        var filterType = $('#filter-form-type').val();
        $('#procurement-table tbody tr').each(function() {
            var formType = $(this).find('td:nth-child(2)').text().trim();
            if (!filterEnabled || filterType === '' || formType.toUpperCase().includes(filterType)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    $('#filterCheckbox, #filter-form-type').on('change', filterTable);
    filterTable(); // Initial call

    // Set initial filter to "All" and checkbox checked
    $('#filter-form-type').val(''); // Set dropdown to "All"
    $('#filterCheckbox').prop('checked', true); // Check the checkbox
    filterTable(); // Apply initial filter

    $('#deleteSelectedButton').on('click', function() {
        const selectedTaskIds = [];
        $('#procurement-table tbody input[type="checkbox"]:checked').each(function() {
            selectedTaskIds.push($(this).data('task-id'));
        });

        if (selectedTaskIds.length === 0) {
            Swal.fire('No forms selected', 'Please select at least one form to delete.', 'info');
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to delete the selected form(s). You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete them!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: BASE_URL + 'procurement/deleteForms',
                    type: 'POST',
                    data: {
                        task_ids: selectedTaskIds,
                        [csrf_token_name]: CSRF_TOKEN // Use the global CSRF_TOKEN
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            ).then(() => {
                                // Reload the page to reflect changes
                                location.reload();
                            });
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
                            'An error occurred while trying to delete the form(s).',
                            'error'
                        );
                    }
                });
            }
        });
    });

    // CREATE modal button logic
    $('#createFormModal .modal-body .btn').on('click', function() {
        var formType = $(this).text().trim();
        // Placeholder: Replace with AJAX/modal logic as needed
        console.log('Create form clicked:', formType);
        // Example: window.location.href = '/planning/create/' + formType.toLowerCase().replace(/\s+/g, '-');
    });
}); 