// procurement.js for plan-procurement.php
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

    // CREATE modal button logic
    $('#createFormModal .modal-body .btn').on('click', function() {
        var formType = $(this).text().trim();
        // Placeholder: Replace with AJAX/modal logic as needed
        console.log('Create form clicked:', formType);
        // Example: window.location.href = '/planning/create/' + formType.toLowerCase().replace(/\s+/g, '-');
    });

    // (Optional) Placeholder for future AJAX integration
    // function loadProcurementData() { ... }
}); 