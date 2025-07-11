$(document).ready(function() {
    // Initialize the page
    initializePlanApp();
});

function initializePlanApp() {
    // Attach event listeners
    attachAddItemListener();
    attachDeleteItemListeners();
    attachTotalCalculation();
}

/**
 * ==================
 * Add Item Row
 * ==================
 */
function attachAddItemListener() {
    $(document).on('click', '.additem', function() {
        addNewRow();
    });
}

function addNewRow() {
    const newRowHtml = `
        <tr>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="code"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="procurement_project"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="pmo_end_user"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="mode_of_procurement"></td>
            <td class="px-1">
                <div class="d-flex justify-content-between">
                    <input type="text" class="form-control form-control-sm me-1" placeholder="" name="ads_post">
                    <input type="text" class="form-control form-control-sm me-1" placeholder="" name="sub_open">
                    <input type="text" class="form-control form-control-sm me-1" placeholder="" name="notice_award">
                    <input type="text" class="form-control form-control-sm me-1" placeholder="" name="contract_signing">
                </div>
            </td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="source_of_funds"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm total-amount" name="total"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="mooe"></td>
            <td class="px-1"><input type="text" class="form-control form-control-sm" name="co"></td>
            <td class="delete-item-row px-1 pt-2">
                <ul class="table-controls">
                    <li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                    </a></li>
                </ul>
            </td>
        </tr>
    `;
    
    $('.item-table tbody').append(newRowHtml);
    calculateTotal();
}

/**
 * ==================
 * Delete Item Row
 * ==================
 */
function attachDeleteItemListeners() {
    $(document).on('click', '.delete-item', function() {
        $(this).closest('tr').remove();
        calculateTotal();
    });
}

/**
 * ==================
 * Calculate Total Amount
 * ==================
 */
function attachTotalCalculation() {
    $(document).on('input', '.total-amount', function() {
        calculateTotal();
    });
}

function calculateTotal() {
    let total = 0;
    $('.total-amount').each(function() {
        const value = parseFloat($(this).val()) || 0;
        total += value;
    });
    
    // Format the total with commas and 2 decimal places
    const formattedTotal = total.toLocaleString('en-PH', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
    
    // Update the total display
    $('.mt-2.text-end span:last').text('₱' + formattedTotal);
}

/**
 * ==================
 * Save Functionality
 * ==================
 */
$(document).on('click', '.btn-download', function() {
    savePlanData();
});

function savePlanData() {
    const formData = collectFormData();
    
    // You can implement AJAX call here to save to server
    console.log('Saving plan data:', formData);
    
    // For now, just show a success message
    alert('Plan saved successfully!');
}

function collectFormData() {
    const data = {
        items: [],
        requested_by: {
            printed_name: $('#requested_by_printed_name').val(),
            designation: $('#requested_by_designation').val()
        },
        approved_by: {
            printed_name: $('#approved_by_printed_name').val(),
            designation: $('#approved_by_designation').val()
        },
        recommending_approval: {
            printed_name: $('#recommending_approval_printed_name').val(),
            designation: $('#recommending_approval_designation').val()
        }
    };
    
    $('.item-table tbody tr').each(function() {
        const row = $(this);
        const item = {
            code: row.find('input[name="code"]').val(),
            procurement_project: row.find('input[name="procurement_project"]').val(),
            pmo_end_user: row.find('input[name="pmo_end_user"]').val(),
            mode_of_procurement: row.find('input[name="mode_of_procurement"]').val(),
            ads_post: row.find('input[name="ads_post"]').val(),
            sub_open: row.find('input[name="sub_open"]').val(),
            notice_award: row.find('input[name="notice_award"]').val(),
            contract_signing: row.find('input[name="contract_signing"]').val(),
            source_of_funds: row.find('input[name="source_of_funds"]').val(),
            total: row.find('input[name="total"]').val(),
            mooe: row.find('input[name="mooe"]').val(),
            co: row.find('input[name="co"]').val()
        };
        data.items.push(item);
    });
    
    return data;
}

/**
 * ==================
 * Send Functionality
 * ==================
 */
$(document).on('click', '.btn-send', function() {
    sendPlanData();
});

function sendPlanData() {
    const formData = collectFormData();
    
    // You can implement AJAX call here to send to server
    console.log('Sending plan data:', formData);
    
    // For now, just show a success message
    alert('Plan sent successfully!');
}