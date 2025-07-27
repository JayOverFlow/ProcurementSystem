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
    const quantityInput = row.querySelector('input[name$="[pr_items_quantity]"]');
    const costInput = row.querySelector('input[name$="[pr_items_cost]"]');
    const totalInput = row.querySelector('input[name$="[pr_items_total_cost]"]');

    const quantity = parseFloat(quantityInput.value) || 0;
    const cost = parseFloat(costInput.value) || 0;
    const total = quantity * cost;

    totalInput.value = total.toFixed(2);
    updateGrandTotal();
}

function updateGrandTotal() {
    let grandTotal = 0;
    document.querySelectorAll('.item-table tbody tr').forEach(row => {
        const totalCost = parseFloat(row.querySelector('input[name$="[pr_items_total_cost]"]').value) || 0;
        grandTotal += totalCost;
    });
    document.getElementById('total-amount-pr').textContent = grandTotal.toFixed(2);
}

function attachRowEventListeners(row) {
    row.querySelector('input[name$="[pr_items_quantity]"]').addEventListener('input', () => calculateItemTotal(row));
    row.querySelector('input[name$="[pr_items_cost]"]').addEventListener('input', () => calculateItemTotal(row));
}

document.querySelector('.additem').addEventListener('click', function() {
    const tableBody = document.querySelector('.item-table tbody');
    const newIndex = tableBody.rows.length;

    const newRowHtml = `
        <tr>
            <td class="px-1"><input type="number" class="form-control form-control-sm" name="items[${newIndex}][pr_items_quantity]"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${newIndex}][pr_items_unit]"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${newIndex}][pr_items_descrip]"></td>
            <td class="px-1"><input type="number" step="0.01" class="form-control form-control-sm unit-cost" name="items[${newIndex}][pr_items_cost]"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm total-cost" name="items[${newIndex}][pr_items_total_cost]" readonly></td>
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
    const prForm = document.getElementById('pr-form');
    const saveBtn = document.querySelector('.save-pr');
    const submitBtn = document.querySelector('.submit-pr');

    if (prForm && saveBtn) {
        saveBtn.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Confirm Save?',
                text: "Do you want to save this Purchase Request?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    prForm.submit();
                }
            });
        });
    }

    if (prForm && submitBtn) {
        submitBtn.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Confirm Submission?',
                text: "Are you sure you want to submit this for review? You will not be able to edit it after submission.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    prForm.action = this.getAttribute('formaction');
                    prForm.submit();
                }
            });
        });
    }
});