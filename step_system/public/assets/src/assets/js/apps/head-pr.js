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
            updateGrandTotal(); // Update grand total after deleting an item
        })
    }
}

// Function to calculate total cost for a single item row
function calculateItemTotal(row) {
    const qty = parseFloat(row.querySelector('input[name$="[qty]"]').value) || 0;
    const unitCost = parseFloat(row.querySelector('input[name$="[unit_cost]"]').value) || 0;
    const totalCost = qty * unitCost;
    row.querySelector('input[name$="[total_cost]"]').value = totalCost.toFixed(2); // Format to 2 decimal places
    updateGrandTotal();
}

// Function to update the grand total amount
function updateGrandTotal() {
    let grandTotal = 0;
    document.querySelectorAll('.item-table tbody tr').forEach(row => {
        const totalCost = parseFloat(row.querySelector('input[name$="[total_cost]"]').value) || 0;
        grandTotal += totalCost;
    });
    document.querySelector('.invoice-detail-items p span:last-child').textContent = grandTotal.toFixed(2);
}

document.getElementsByClassName('additem')[0].addEventListener('click', function() {
  console.log('dfdf')

  getTableElement = document.querySelector('.item-table');
  currentIndex = getTableElement.rows.length - 1; // Subtract 1 because 0-indexed and for thead

  $html =
    '<tr>' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="qty" name="items[' + currentIndex + '][qty]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="unit" name="items[' + currentIndex + '][unit]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="desc" name="items[' + currentIndex + '][desc]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="unit_cost" name="items[' + currentIndex + '][unit_cost]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="total_cost" name="items[' + currentIndex + '][total_cost]" readonly>' + // Make total_cost readonly
    '  <td class="delete-item-row">' +
    '      <ul class="table-controls">' +
    '          <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>' +
    '      </ul>' +
    '  </td>' +
    '</tr>';
  $(".item-table tbody").append($html);

  // Add event listeners to the new row for dynamic calculation
  const newRow = document.querySelector('.item-table tbody').lastElementChild;
  newRow.querySelector('input[name$="[qty]"]').addEventListener('input', () => calculateItemTotal(newRow));
  newRow.querySelector('input[name$="[unit_cost]"]').addEventListener('input', () => calculateItemTotal(newRow));

  deleteItemRow();
  updateGrandTotal(); // Update grand total after adding an item

});

// Initial setup for existing rows
document.querySelectorAll('.item-table tbody tr').forEach(row => {
    row.querySelector('input[name$="[qty]"]').addEventListener('input', () => calculateItemTotal(row));
    row.querySelector('input[name$="[unit_cost]"]').addEventListener('input', () => calculateItemTotal(row));
    calculateItemTotal(row); // Calculate initial total for existing rows
});

deleteItemRow();
updateGrandTotal(); // Initial calculation of grand total