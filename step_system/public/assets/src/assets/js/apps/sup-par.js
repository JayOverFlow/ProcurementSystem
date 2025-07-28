document.addEventListener('DOMContentLoaded', function() {
    const itemTableBody = document.querySelector('.item-table tbody');
    const addItemButton = document.querySelector('.additem');

    // Function to update the grand total
    function updateGrandTotal() {
        let grandTotal = 0;
        itemTableBody.querySelectorAll('tr').forEach(row => {
            const qtyInput = row.querySelector('input[name$="[par_qty]"]');
            const amountInput = row.querySelector('input[name$="[par_amount]"]');
            if (qtyInput && amountInput) {
                const qty = parseFloat(qtyInput.value) || 0;
                const amount = parseFloat(amountInput.value) || 0;
                grandTotal += qty * amount;
            }
        });
        const totalAmountElement = document.getElementById('total-amount-par');
        if (totalAmountElement) {
            totalAmountElement.textContent = grandTotal.toFixed(2);
        }
    }

    // Function to add a new item row
    function addItem(itemData = {}) {
        const newRow = document.createElement('tr');
        // Use the current number of rows as the index to ensure uniqueness and prevent conflicts
        const index = itemTableBody.rows.length;

        newRow.innerHTML = `
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${index}][par_qty]" value="${itemData.par_qty || ''}"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${index}][par_unit]" value="${itemData.par_unit || ''}"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${index}][par_descrip]" value="${itemData.par_descrip || ''}"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${index}][par_prop_no]" value="${itemData.par_prop_no || ''}"></td>
            <td class="px-1"><input type="date" class="form-control form-control-sm" name="items[${index}][par_date_acquired]" value="${itemData.par_date_acquired || ''}"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm amount" name="items[${index}][par_amount]" value="${itemData.par_amount || ''}"></td>
            <td class="delete-item-row">
                <ul class="table-controls">
                    <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                </ul>
            </td>
        `;
        itemTableBody.appendChild(newRow);
    }

    // --- Event Delegation ---
    // Handles input changes for quantity and amount fields
    itemTableBody.addEventListener('input', function(e) {
        if (e.target && (e.target.matches('input[name$="[par_qty]"]') || e.target.matches('input[name$="[par_amount]"]'))) {
            updateGrandTotal();
        }
    });

    // Handles clicks on delete buttons
    itemTableBody.addEventListener('click', function(e) {
        const deleteButton = e.target.closest('.delete-item');
        if (deleteButton) {
            e.preventDefault();
            deleteButton.closest('tr').remove();
            updateGrandTotal();
        }
    });

    // --- Add Item Button ---
    if (addItemButton) {
        addItemButton.addEventListener('click', function() {
            addItem();
        });
    }

    // --- Initialization ---
    function initializeForm() {
        // Populate existing items if `existingItems` is available
        if (typeof existingItems !== 'undefined' && existingItems.length > 0) {
            itemTableBody.innerHTML = ''; // Clear any template rows
            existingItems.forEach(item => {
                addItem(item);
            });
        } else {
            // Ensure at least one empty row exists if the table is empty
            if (itemTableBody.querySelectorAll('tr').length === 0) {
                addItem();
            }
        }
        // Calculate the initial total
        updateGrandTotal();
    }

    initializeForm();
});

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

    if (parForm && submitBtn) {
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
                    parForm.action = this.getAttribute('formaction');
                    parForm.submit();
                }
            });
        });
    }
});