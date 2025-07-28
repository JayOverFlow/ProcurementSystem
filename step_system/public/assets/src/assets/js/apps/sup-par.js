var currentDate = new Date();

/**
 * ==================
 * Single File Upload
 * ==================
 */

function deleteItemRow() {
    const deleteButtons = document.querySelectorAll('.delete-item');
    deleteButtons.forEach(button => {
        button.removeEventListener('click', deleteRowHandler);
        button.addEventListener('click', deleteRowHandler);
    });
}

function deleteRowHandler() {
    this.closest('tr').remove();
    updateGrandTotal();
}

function calculateItemTotal(row) {
    const quantityInput = row.querySelector('input[name$="[par_qty]"]');
    const amountInput = row.querySelector('input[name$="[par_amount]"]');

    const quantity = parseFloat(quantityInput.value) || 0;
    const amount = parseFloat(amountInput.value) || 0;
    const total = quantity * amount;

    amountInput.value = total.toFixed(2);
    updateGrandTotal();
}

function updateGrandTotal() {
    let grandTotal = 0;
    document.querySelectorAll('.item-table tbody tr').forEach(row => {
        const amount = parseFloat(row.querySelector('input[name$="[par_amount]"]').value) || 0;
        grandTotal += amount;
    });
    document.getElementById('total-amount-par').textContent = grandTotal.toFixed(2);
}

function attachRowEventListeners(row) {
    row.querySelector('input[name$="[par_qty]"]').addEventListener('input', () => calculateItemTotal(row));
    row.querySelector('input[name$="[par_amount]"]').addEventListener('input', () => calculateItemTotal(row));
}

document.querySelector('.additem').addEventListener('click', function() {
    const tableBody = document.querySelector('.item-table tbody');
    const newIndex = tableBody.rows.length;

    const newRowHtml = `
        <tr>
            <td class="px-1"><input type="number" class="form-control form-control-sm" name="items[${newIndex}][par_qty]"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${newIndex}][par_unit]"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${newIndex}][par_descrip]"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${newIndex}][par_prop_no]"></td>
            <td class="px-1"><input type="date" class="form-control form-control-sm" name="items[${newIndex}][par_date_acquired]"></td>
            <td class="px-1"><input type="number" step="0.01" class="form-control form-control-sm item-amount" name="items[${newIndex}][par_amount]"></td>
            <td class="delete-item-row text-center">
                <ul class="table-controls">
                    <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                </ul>
            </td>
        </tr>`;

    tableBody.insertAdjacentHTML('beforeend', newRowHtml);
    const newRow = tableBody.lastElementChild;
    attachRowEventListeners(newRow);
    deleteItemRow();
});

// Initial setup for existing rows
document.querySelectorAll('.item-table tbody tr').forEach(row => {
    attachRowEventListeners(row);
    calculateItemTotal(row); 
});

deleteItemRow();
updateGrandTotal();

document.addEventListener('DOMContentLoaded', function() {
    const parForm = document.getElementById('par-form');
    const saveBtn = document.querySelector('.save-par');
    const submitBtn = document.querySelector('.submit-par');

    if (parForm && saveBtn) {
        saveBtn.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Confirm Save?',
                text: "Do you want to save this Property Acknowledgement Receipt?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    parForm.action = this.getAttribute('formaction');
                    parForm.submit();
                }
            });
        });
    }

    // SweetAlert for Submit button
    $('.submit-par').on('click', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');

        const selectedUserElement = document.getElementById('par-received-from-user-fk');
        const selectedOption = selectedUserElement.options[selectedUserElement.selectedIndex];
        const recipientFullName = selectedOption.getAttribute('data-fullname');

        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to submit this Property Acknowledgement Receipt. It will be submitted to " + recipientFullName + ". Do you want to continue?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.attr('action', $(this).attr('formaction')).submit();
            }
        });
    });
});