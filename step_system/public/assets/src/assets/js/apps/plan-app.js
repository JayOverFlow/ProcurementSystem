document.addEventListener('DOMContentLoaded', function() {
    function deleteItemRow() {
        const deleteItems = document.querySelectorAll('.delete-item');
        deleteItems.forEach(item => {
            item.removeEventListener('click', deleteRow);
            item.addEventListener('click', deleteRow);
        });
    }

    function deleteRow() {
        this.closest('tr').remove();
        calculateTotal();
    }

    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('.item-table tbody tr').forEach(row => {
            const totalInput = row.querySelector('input[name*="[total]"]');
            if (totalInput) {
                total += parseFloat(totalInput.value) || 0;
            }
        });
        const totalElement = document.getElementById('total-amount-app');
        if (totalElement) {
            totalElement.textContent = total.toFixed(2);
        }
    }

    const addItemButton = document.querySelector('.additem');
    if (addItemButton) {
        addItemButton.addEventListener('click', function() {
            const table = document.querySelector('.item-table tbody');
            const currentIndex = table.rows.length;
            const html = `
                <tr>
                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][app_item_code]"></td>
                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][procurement_project]"></td>
                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][pmo_end_user]"></td>
                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][mode_of_procurement]"></td>
                    <td class="px-1">
                        <div class="d-flex justify-content-between">
                            <input type="text" class="form-control form-control-sm me-1 text-center" placeholder="" name="items[${currentIndex}][ads_post]">
                            <input type="text" class="form-control form-control-sm me-1 text-center" placeholder="" name="items[${currentIndex}][sub_open]">
                            <input type="text" class="form-control form-control-sm me-1 text-center" placeholder="" name="items[${currentIndex}][notice_award]">
                            <input type="text" class="form-control form-control-sm me-1" placeholder="" name="items[${currentIndex}][contract_signing]">
                        </div>
                    </td>
                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][source_of_funds]"></td>
                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][total]"></td>
                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][mooe]"></td>
                    <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[${currentIndex}][co]"></td>
                    <td class="delete-item-row px-1 pt-2">
                        <ul class="table-controls">
                            <li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                        </ul>
                    </td>
                </tr>`;
            table.insertAdjacentHTML('beforeend', html);
            deleteItemRow();
        });
    }

    deleteItemRow();
    calculateTotal();

    const itemTable = document.querySelector('.item-table');
    if (itemTable) {
        itemTable.addEventListener('input', (event) => {
            if (event.target.name.includes('[total]')) {
                calculateTotal();
            }
        });
    }

    const appForm = document.getElementById('app-form');
    const saveBtn = document.querySelector('.save');
    const submitBtn = document.querySelector('.submit');

    if (appForm && saveBtn) {
        saveBtn.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Confirm Save?',
                text: "Do you want to save this Annual Procurement Plan?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    appForm.action = this.getAttribute('formaction');
                    appForm.submit();
                }
            });
        });
    }

    if (appForm && submitBtn) {
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
                    appForm.action = this.getAttribute('formaction');
                    appForm.submit();
                }
            });
        });
    }
}); 