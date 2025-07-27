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

    // --- Calculate item amount (quantity × unit cost) ---
    function calculateItemAmount(row) {
        const quantityInput = row.find('input[name$="[po_items_quantity]"]');
        const costInput = row.find('input[name$="[po_items_cost]"]');
        const amountInput = row.find('input[name$="[po_items_amount]"]');

        const quantity = parseFloat(quantityInput.val()) || 0;
        const cost = parseFloat(costInput.val()) || 0;
        const amount = quantity * cost;

        amountInput.val(amount.toFixed(2));
        updateTotalAmount();
    }

    // --- Update total amount ---
    function updateTotalAmount() {
        let totalAmount = 0;
        $('.item-table tbody tr').each(function() {
            const amount = parseFloat($(this).find('input[name$="[po_items_amount]"]').val()) || 0;
            totalAmount += amount;
        });
        
        // Update the total amount field
        $('#po-total-amount').val(totalAmount.toFixed(2));
        
        // Optional: Update amount in words
        updateAmountInWords(totalAmount);
    }

    // --- Convert number to words (optional feature) ---
    function numberToWords(num) {
        if (num === 0) return 'Zero';
        
        const ones = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
        const teens = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
        const tens = ['', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
        const thousands = ['', 'Thousand', 'Million', 'Billion'];
        
        function convertHundreds(n) {
            let result = '';
            if (n >= 100) {
                result += ones[Math.floor(n / 100)] + ' Hundred ';
                n %= 100;
            }
            if (n >= 20) {
                result += tens[Math.floor(n / 10)] + ' ';
                n %= 10;
            } else if (n >= 10) {
                result += teens[n - 10] + ' ';
                n = 0;
            }
            if (n > 0) {
                result += ones[n] + ' ';
            }
            return result;
        }
        
        let result = '';
        let thousandIndex = 0;
        
        while (num > 0) {
            if (num % 1000 !== 0) {
                result = convertHundreds(num % 1000) + thousands[thousandIndex] + ' ' + result;
            }
            num = Math.floor(num / 1000);
            thousandIndex++;
        }
        
        return result.trim();
    }

    // --- Update amount in words ---
    function updateAmountInWords(amount) {
        const words = numberToWords(Math.floor(amount));
        const cents = Math.round((amount - Math.floor(amount)) * 100);
        let amountInWords = words + ' Pesos';
        
        if (cents > 0) {
            amountInWords += ' and ' + numberToWords(cents) + ' Centavos';
        }
        
        $('#po-amount-in-words').val(amountInWords + ' Only');
    }

    // --- Attach event listeners to row inputs ---
    function attachRowEventListeners(row) {
        row.find('input[name$="[po_items_quantity]"]').on('input', function() {
            calculateItemAmount(row);
        });
        row.find('input[name$="[po_items_cost]"]').on('input', function() {
            calculateItemAmount(row);
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
                <td class="px-1"><input type="number" step="0.01" class="form-control form-control-sm" name="items[0][po_items_quantity]"></td>
                <td class="px-1"><input type="number" step="0.01" class="form-control form-control-sm" name="items[0][po_items_cost]"></td>
                <td class="px-1"><input type="number" step="0.01" class="form-control form-control-sm" name="items[0][po_items_amount]" readonly></td>
                <td class="delete-item-row text-center">
                    <ul class="table-controls">
                        <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                    </ul>
                </td>
            </tr>`;
        var $newRow = $(newItemRow);
        $tbody.append($newRow);
        updateRowIndices();
        attachRowEventListeners($newRow);
    });

    // --- Delegate delete row event ---
    $('.item-table tbody').on('click', '.delete-item', function () {
        if ($('.item-table tbody tr').length > 1) {
            $(this).closest('tr').remove();
            updateRowIndices();
            updateTotalAmount(); // Recalculate total after deletion
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

    // --- Initialize existing items when editing ---
    function initializeExistingItems() {
        // Attach event listeners to all existing rows
        $('.item-table tbody tr').each(function() {
            const $row = $(this);
            attachRowEventListeners($row);
            calculateItemAmount($row);
        });
        
        // Update total amount on page load
        updateTotalAmount();
    }

    // --- Populate items when editing existing PO ---
    if (typeof poItems !== 'undefined' && poItems && poItems.length > 0) {
        const $tbody = $('.item-table tbody');
        $tbody.empty(); // Clear the default row
        
        poItems.forEach(function(item, index) {
            let specificationsHtml = '';
            
            // Add main description input
            let descriptionHtml = `
                <div class="input-group mb-1">
                    <input type="text" class="form-control form-control-sm description-input" name="items[${index}][po_items_descrip]" value="${item.po_items_descrip || ''}">
                    <button class="description-btn add-description" type="button" tabindex="-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0d6efd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                    </button>
                </div>`;
            
            // Add specifications if they exist
            if (item.specifications && item.specifications.length > 0) {
                item.specifications.forEach(function(spec) {
                    descriptionHtml += `
                        <div class="input-group mb-1">
                            <input type="text" class="form-control form-control-sm description-input-spec" name="items[${index}][specifications][]" value="${spec.po_item_spec_descrip || ''}" placeholder="Item specifications">
                            <button class="description-btn remove-description" type="button" tabindex="-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                            </button>
                        </div>`;
                });
            }
            
            const itemRowHtml = `
                <tr>
                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${index}][po_items_stockno]" value="${item.po_items_stockno || ''}"></td>
                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${index}][po_items_unit]" value="${item.po_items_unit || ''}"></td>
                    <td class="px-1">
                        <div class="description-container">
                            ${descriptionHtml}
                        </div>
                    </td>
                    <td class="px-1"><input type="number" step="0.01" class="form-control form-control-sm" name="items[${index}][po_items_quantity]" value="${item.po_items_quantity || ''}"></td>
                    <td class="px-1"><input type="number" step="0.01" class="form-control form-control-sm" name="items[${index}][po_items_cost]" value="${item.po_items_cost || ''}"></td>
                    <td class="px-1"><input type="number" step="0.01" class="form-control form-control-sm" name="items[${index}][po_items_amount]" value="${item.po_items_amount || ''}" readonly></td>
                    <td class="delete-item-row text-center">
                        <ul class="table-controls">
                            <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                        </ul>
                    </td>
                </tr>`;
            
            const $newRow = $(itemRowHtml);
            $tbody.append($newRow);
            attachRowEventListeners($newRow);
        });
    }
    
    // Initialize existing items on page load
    initializeExistingItems();
});

// Save & Submit confirmation
const poForm = document.getElementById('po-form');
const saveBtn = document.querySelector('.save-po');
const submitBtn = document.querySelector('.submit-po');

if (poForm && saveBtn) {
    saveBtn.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the form from submitting immediately

        Swal.fire({
            title: 'Confirm Save?',
            text: "Do you want to save this Purchase Order?",
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, save it!'
        }).then((result) => {
            if (result.isConfirmed) {
                poForm.action = this.getAttribute('formaction');
                poForm.submit();
            }
        });
    });
}

if (poForm && submitBtn) {
    submitBtn.addEventListener('click', function(e) {
        e.preventDefault(); // Prevent the form from submitting immediately

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
                poForm.action = this.getAttribute('formaction');
                poForm.submit();
            }
        });
    });
}
