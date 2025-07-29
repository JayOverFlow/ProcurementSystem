document.addEventListener('DOMContentLoaded', function() {
    const itemTableBody = document.querySelector('.item-table tbody');
    const addItemButton = document.querySelector('.additem');

    // Function to update the grand total
    function updateGrandTotal() {
        let grandTotal = 0;
        itemTableBody.querySelectorAll('tr').forEach(row => {
            const qtyInput = row.querySelector('input[name$="[ics_qty]"]');
            const unitCostInput = row.querySelector('input[name$="[ics_unit_cost]"]');
            if (qtyInput && unitCostInput) {
                const qty = parseFloat(qtyInput.value) || 0;
                const unitCost = parseFloat(unitCostInput.value) || 0;
                const totalCost = qty * unitCost;
                row.querySelector('input[name$="[ics_total_cost]"]').value = totalCost.toFixed(2);
                grandTotal += totalCost;
            }
        });
        const totalAmountElement = document.getElementById('total-amount-ics');
        if (totalAmountElement) {
            totalAmountElement.textContent = grandTotal.toFixed(2);
        }
    }

    // Function to add a new item row
    function addItem(itemData = {}) {
        const newRow = document.createElement('tr');
        const index = itemTableBody.rows.length;

        newRow.innerHTML = `
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${index}][ics_qty]" value="${itemData.ics_qty || ''}" ${isReadOnly ? 'disabled' : ''}></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${index}][ics_unit]" value="${itemData.ics_unit || ''}" ${isReadOnly ? 'disabled' : ''}></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm unit-cost" name="items[${index}][ics_unit_cost]" value="${itemData.ics_unit_cost || ''}" ${isReadOnly ? 'disabled' : ''}></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm total-cost" name="items[${index}][ics_total_cost]" value="${itemData.ics_total_cost || ''}" readonly ${isReadOnly ? 'disabled' : ''}></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${index}][ics_descrip]" value="${itemData.ics_descrip || ''}" ${isReadOnly ? 'disabled' : ''}></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${index}][ics_invent_item_no]" value="${itemData.ics_invent_item_no || ''}" ${isReadOnly ? 'disabled' : ''}></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${index}][ics_est_use_life]" value="${itemData.ics_est_use_life || ''}" ${isReadOnly ? 'disabled' : ''}></td>
            <td class="delete-item-row">
                <ul class="table-controls">
                    <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete" ${isReadOnly ? 'style="pointer-events: none; color: grey;"' : ''}><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                </ul>
            </td>
        `;
        itemTableBody.appendChild(newRow);
    }

    // Make isReadOnly accessible globally or pass it
    const isReadOnly = document.querySelector('input[name="invent_custo_id"]').disabled; // Assuming the hidden input for ID gets disabled when read-only

    // --- Event Delegation ---
    // Handles input changes for quantity and unit cost fields
    itemTableBody.addEventListener('input', function(e) {
        if (e.target && (e.target.matches('input[name$="[ics_qty]"]') || e.target.matches('input[name$="[ics_unit_cost]"]'))) {
            updateGrandTotal();
        }
    });

    // Handles clicks on delete buttons
    itemTableBody.addEventListener('click', function(e) {
        const deleteButton = e.target.closest('.delete-item');
        if (deleteButton && !isReadOnly) {
            e.preventDefault();
            deleteButton.closest('tr').remove();
            updateGrandTotal();
        }
    });

    // --- Add Item Button ---
    if (addItemButton && !isReadOnly) {
        addItemButton.addEventListener('click', function() {
            addItem();
        });
    }

    // --- Initialization ---
    function initializeForm() {
        if (typeof existingItems !== 'undefined' && existingItems.length > 0) {
            itemTableBody.innerHTML = '';
            existingItems.forEach(item => {
                addItem(item);
            });
        } else {
            if (itemTableBody.querySelectorAll('tr').length === 0) {
                addItem();
            }
        }
        updateGrandTotal();
    }

    initializeForm();
});

document.addEventListener('DOMContentLoaded', function() {
    const icsForm = document.getElementById('ics-form');
    const saveBtn = document.querySelector('.save-ics');
    const submitBtn = document.querySelector('.submit-ics');

    if (icsForm && saveBtn) {
        saveBtn.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Confirm Save?',
                text: "Do you want to save this Inventory Custodian Slip?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    icsForm.action = this.getAttribute('formaction');
                    icsForm.submit();
                }
            });
        });
    }

    if (icsForm && submitBtn) {
        submitBtn.addEventListener('click', function(e) {
            e.preventDefault();
            var form = $(this).closest('form');

            const selectedReceivedByUserElement = document.getElementById('ics-received-by-user-fk');
            const selectedReceivedByUserOption = selectedReceivedByUserElement.options[selectedReceivedByUserElement.selectedIndex];
            const recipientFullName = selectedReceivedByUserOption.getAttribute('data-fullname');

            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to submit this Inventory Custodian Slip. It will be submitted to " + recipientFullName + ". Do you want to continue?",
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
    }
});