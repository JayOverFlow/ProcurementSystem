var currentDate = new Date();

/**
 * ==================
 * Single File Upload
 * ==================
*/

function deleteItemRow() {
    deleteItem = document.querySelectorAll('.delete-item');
    for (var i = 0; i < deleteItem.length; i++) {
        deleteItem[i].addEventListener('click', function() {
            this.parentElement.parentNode.parentNode.parentNode.remove();
        })
    }
}

document.getElementsByClassName('additem')[0].addEventListener('click', function() {

  getTableElement = document.querySelector('.item-table');
  currentIndex = getTableElement.rows.length;

  $html =
    '<tr>' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[' + currentIndex + '][code]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[' + currentIndex + '][gen_desc]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[' + currentIndex + '][qty_size]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[' + currentIndex + '][est_budget]">' +
    '  <td class="d-flex justify-content-between px-0 ps-1 py-2">' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][jan]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][feb]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][mar]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][apr]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][may]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][jun]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][jul]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][aug]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][sep]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][oct]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][nov]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items[' + currentIndex + '][month][dec]">' +
    '      </div>' +
    '  </td>' +
    '  <td class="delete-item-row text-center">' +
    '      <ul class="table-controls">' +
    '          <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>' +
    '      </ul>' +
    '  </td>' +
    '</tr>';
  $(".item-table tbody").append($html);
  deleteItemRow();

})

function deleteItemRowCO() {
    deleteItem = document.querySelectorAll('.delete-item-co');
    for (var i = 0; i < deleteItem.length; i++) {
        deleteItem[i].addEventListener('click', function() {
            this.parentElement.parentNode.parentNode.parentNode.remove();
        })
    }
}

document.getElementsByClassName('additem-co')[0].addEventListener('click', function() {
  getTableElement = document.querySelector('.item-table-co');
  currentIndex = getTableElement.rows.length;

  $html =
    '<tr>' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" name="items_co[' + currentIndex + '][code]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" name="items_co[' + currentIndex + '][gen_desc]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" name="items_co[' + currentIndex + '][qty_size]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" name="items_co[' + currentIndex + '][est_budget]" value="50000">' +
    '  <td class="d-flex justify-content-between px-0 ps-1 py-3">' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][jan]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][feb]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][mar]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][apr]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][may]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][jun]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][jul]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][aug]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][sep]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][oct]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][nov]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" name="items_co[' + currentIndex + '][month][dec]">' +
    '      </div>' +
    '  </td>' +
    '  <td class="delete-item-row-co text-center">' +
    '      <ul class="table-controls">' +
    '          <li class="p-2"><a href="javascript:void(0);" class="delete-item-co" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>' +
    '      </ul>' +
    '  </td>' +
    '</tr>';
  $(".item-table-co tbody").append($html);
  deleteItemRowCO();

})

deleteItemRow();
deleteItemRowCO();

document.addEventListener('DOMContentLoaded', function() {
    const calculateTotal = (tableName, totalElementId) => {
        let total = 0;
        document.querySelectorAll(`.${tableName} tbody tr`).forEach(row => {
            const estBudgetInput = row.querySelector('input[name*="[est_budget]"]');
            if (estBudgetInput) {
                total += parseFloat(estBudgetInput.value) || 0;
            }
        });
        const totalElement = document.getElementById(totalElementId);
        if (totalElement) {
          totalElement.textContent = total.toFixed(2);
        }
    };

    const setupTableListeners = (tableName, totalElementId) => {
        const table = document.querySelector(`.${tableName}`);
        if (table) {
            calculateTotal(tableName, totalElementId); // Initial calculation
            table.addEventListener('input', (event) => {
                if (event.target.name.includes('[est_budget]')) {
                    calculateTotal(tableName, totalElementId);
                }
            });
            const addBtn = table.closest('.invoice-detail-items').querySelector('.additem, .additem-co');
            if (addBtn) {
                addBtn.addEventListener('click', () => {
                     // Recalculate after a brief delay to allow the new row to be added
                    setTimeout(() => calculateTotal(tableName, totalElementId), 100);
                });
            }
        }
    };

    setupTableListeners('item-table', 'total-amount-mooe');
    setupTableListeners('item-table-co', 'total-amount-co');

    const ppmpForm = document.getElementById('ppmp-form');
    const saveBtn = document.querySelector('.save-ppmp');
    const submitBtn = document.querySelector('.submit-ppmp');

    if (ppmpForm && saveBtn) {
        saveBtn.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Confirm Save?',
                text: "Do you want to save this Project Procurement Management Plan?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    ppmpForm.action = this.getAttribute('formaction');
                    ppmpForm.submit();
                }
            });
        });
    }

    if (ppmpForm && submitBtn) {
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
                    ppmpForm.action = this.getAttribute('formaction');
                    ppmpForm.submit();
                }
            });
        });
    }
});
