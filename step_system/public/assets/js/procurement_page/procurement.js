$(document).ready(function() {
    // Check if the table ID is defined and the table exists.
    if (typeof table_id === 'undefined' || $(table_id).length === 0) {
        return; // Exit if the table is not present on the page.
    }

    // Initialize the DataTable.
    var table = $(table_id).DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'>>><'table-responsive'tr><'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "\tShowing page _PAGE_ of _PAGES_",
            "sSearch": "",
            "sSearchPlaceholder": "",
        },
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10,
        "order": [],
        "columnDefs": [
            { "orderable": false, "targets": 0 } // Disable ordering on the first column (checkboxes)
        ]
    });

    // --- Conditional Event Handlers ---

    // Custom search functionality.
    if ($('#custom-search').length) {
        $('#custom-search').on('keyup', function() {
            table.search(this.value).draw();
        });
    }

    // Row click navigation.
    $(table_id + ' tbody').on('click', 'tr[data-href]', function(event) {
        // Prevent navigation if a checkbox was clicked.
        if (!$(event.target).is('input[type="checkbox"]')) {
            window.location.href = $(this).data('href');
        }
    });

    // --- Delete and Selection Feature ---

    // Only enable delete functionality if the delete button and deleteUrl are present.
    if ($('#delete-button').length && typeof deleteUrl !== 'undefined') {
        
        // Function to update the delete button's state (enabled/disabled).
        function updateDeleteButtonState() {
            const anyCheckboxChecked = $(table_id + ' tbody input[type="checkbox"]:checked').length > 0;
            $('#delete-button').prop('disabled', !anyCheckboxChecked);
        }

        // Handle "select all" checkbox.
        if ($('#select-all').length) {
            $('#select-all').on('click', function() {
                var rows = table.rows({ 'search': 'applied' }).nodes();
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
                updateDeleteButtonState();
            });
        }

        // Handle individual checkbox changes.
        $(table_id + ' tbody').on('change', 'input[type="checkbox"]', function() {
            if (!this.checked) {
                var el = $('#select-all').get(0);
                if (el && el.checked && ('indeterminate' in el)) {
                    el.indeterminate = true;
                }
            }
            updateDeleteButtonState();
        });

        // Initial state of the delete button.
        updateDeleteButtonState();

        // Attach click event to the delete button.
        $('#delete-button').on('click', function() {
            const selectedTaskIds = $(table_id + ' tbody input[type="checkbox"]:checked').map(function() {
                return $(this).val();
            }).get();

            if (selectedTaskIds.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'No Forms Selected',
                    text: 'Please select at least one form to delete.',
                    customClass: { confirmButton: 'btn btn-primary' },
                    buttonsStyling: false,
                });
                return;
            }

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                padding: '2em',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: deleteUrl,
                        type: 'POST',
                        data: JSON.stringify({ task_ids: selectedTaskIds }),
                        contentType: 'application/json',
                        dataType: 'json',
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Deleting Forms...',
                                text: 'Please wait.',
                                allowOutsideClick: false,
                                didOpen: () => { Swal.showLoading(); }
                            });
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: response.message,
                                    icon: 'success',
                                    customClass: { confirmButton: 'btn btn-success' },
                                    buttonsStyling: false
                                }).then(() => { window.location.reload(); });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: response.message || 'Failed to delete forms.',
                                    icon: 'error',
                                    customClass: { confirmButton: 'btn btn-danger' },
                                    buttonsStyling: false
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'AJAX Error!',
                                text: 'An error occurred: ' + xhr.responseText,
                                icon: 'error',
                                customClass: { confirmButton: 'btn btn-danger' },
                                buttonsStyling: false
                            });
                        }
                    });
                }
            });
        });
    }
}); 
