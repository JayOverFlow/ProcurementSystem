document.addEventListener('DOMContentLoaded', function() {
    const tableBody = document.querySelector('.item-table tbody');

    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('input[name*="[total]"]').forEach(input => {
            total += parseFloat(input.value) || 0;
        });
        document.getElementById('total-amount-app').textContent = total.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

    // Add Item functionality
    document.querySelector('.additem').addEventListener('click', function() {
        const currentIndex = tableBody.rows.length;
        const newRow = `
        <tr>
                <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][app_item_code]"></td>
                <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][procurement_project]"></td>
                <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][pmo_end_user]"></td>
                <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][mode_of_procurement]"></td>
            <td class="px-1">
                <div class="d-flex justify-content-between">
                        <input type="text" class="form-control form-control-sm me-1 text-center" name="items[${currentIndex}][ads_post]">
                        <input type="text" class="form-control form-control-sm me-1 text-center" name="items[${currentIndex}][sub_open]">
                        <input type="text" class="form-control form-control-sm me-1 text-center" name="items[${currentIndex}][notice_award]">
                        <input type="text" class="form-control form-control-sm me-1" name="items[${currentIndex}][contract_signing]">
                </div>
            </td>
                <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][source_of_funds]"></td>
                <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][total]"></td>
                <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][mooe]"></td>
                <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][co]"></td>
                <td class="delete-item-row px-1 pt-2 text-center">
                <ul class="table-controls">
                        <li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                </ul>
            </td>
            </tr>`;
        tableBody.insertAdjacentHTML('beforeend', newRow);
        calculateTotal();
    });

    // Event delegation for delete and total calculation
    tableBody.addEventListener('click', function(event) {
        if (event.target.closest('.delete-item')) {
            event.target.closest('tr').remove();
        calculateTotal();
        }
    });

    tableBody.addEventListener('input', function(event) {
        if (event.target.name.includes('[total]')) {
            calculateTotal();
}
    });

    // Save & Submit confirmation
    const saveSubmitButton = document.querySelector('.warning.save');
    if(saveSubmitButton) {
        saveSubmitButton.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the form from submitting immediately
    
            Swal.fire({
                title: 'Confirm Save?',
                text: "Do you want to save this Annual Procurement Plan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#8ABB2F',
                cancelButtonColor: '#7B7B7B',
                confirmButtonText: 'Save'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('app-form').submit();
                }
            });
        });
    }

    // Initial calculation on page load
    calculateTotal();
});