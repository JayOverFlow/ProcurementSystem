$(document).ready(function () {
    // --- Helper function to update indices on all rows ---
    function updateRowIndices() {
        $('.item-table tbody tr').each(function(index) {
            $(this).find('input, select, textarea').each(function() {
                var name = $(this).attr('name');
                if (name) {
                    var newName = name.replace(/items\[\d+\]/, 'items[' + index + ']');
                    $(this).attr('name', newName);
                }
            });
            // Update specification indices within the row
            $(this).find('.description-input-spec').each(function() {
                var specName = $(this).attr('name');
                if (specName) {
                    var newSpecName = specName.replace(/items\[\d+\]\[specifications\]\[\d*\]/, 'items[' + index + '][specifications][]');
                     $(this).attr('name', newSpecName);
                }
            });
        });
    }

    // --- Add Item button click handler ---
    $('.additem').on('click', function () {
        var $tbody = $('.item-table tbody');
        var newItemRow = `
            <tr>
                <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][po_items_stockno]"></td>
                <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[0][po_items_unit]"></td>
                <td class="px-1">
                    <div class="description-container">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control form-control-sm description-input" name="items[0][po_items_descrip]">
                            <button class="description-btn add-description" type="button" tabindex="-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0d6efd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                            </button>
                        </div>
                    </div>
                </td>
                <td class="px-1"><input type="number" class="form-control form-control-sm" name="items[0][po_items_quantity]"></td>
                <td class="px-1"><input type="number" class="form-control form-control-sm" name="items[0][po_items_cost]"></td>
                <td class="px-1"><input type="number" class="form-control form-control-sm" name="items[0][po_items_amount]" readonly></td>
                <td class="delete-item-row text-center">
                    <ul class="table-controls">
                        <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                    </ul>
                </td>
            </tr>`;
        $tbody.append(newItemRow);
        updateRowIndices();
    });

    // --- Delegate delete row event ---
    $('.item-table tbody').on('click', '.delete-item', function () {
        if ($('.item-table tbody tr').length > 1) {
            $(this).closest('tr').remove();
            updateRowIndices();
        }
    });

    // --- Add/Remove Description logic ---
    $(document).on('click', '.add-description', function() {
        var itemRow = $(this).closest('tr');
        var itemIndex = $('.item-table tbody tr').index(itemRow);
        var newSpecInput = `
            <div class="input-group mb-1">
              <input type="text" class="form-control form-control-sm description-input-spec" name="items[${itemIndex}][specifications][]" placeholder="Item specifications">
              <button class="description-btn remove-description" type="button" tabindex="-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
              </button>
            </div>`;
        $(this).closest('.description-container').append(newSpecInput);
    });

    $(document).on('click', '.remove-description', function() {
        $(this).closest('.input-group').remove();
    });
});

// Save & Submit confirmation
const saveSubmitButton = document.querySelector('.warning.save');
if(saveSubmitButton) {
    saveSubmitButton.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the form from submitting immediately

        Swal.fire({
            title: 'Confirm Save',
            text: "Do you want to save this Purchase Order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#8ABB2F',
            cancelButtonColor: '#7B7B7B',
            confirmButtonText: 'Save'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('po-form').submit();
            }
        });
    });
}
