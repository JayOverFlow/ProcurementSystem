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
    console.log('dfdf')

    getTableElement = document.querySelector('.item-table');
    currentIndex = getTableElement.rows.length;

    $html =
        '<tr>' +
        '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="code" name="code">' +
        '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="gen-desc" name="gen_desc">' +
        '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget" name="est_budget">' +
        '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="schd-milestone-acts" name="schd_milestone_acts">' +
        '  <td class="d-flex justify-content-between px-0 ps-1 py-3">' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="jan" name="month">' +
        '      </div>' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="feb" name="month">' +
        '      </div>' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="mar" name="month">' +
        '      </div>' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="par" name="month">' +
        '      </div>' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="may" name="month">' +
        '      </div>' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="jun" name="month">' +
        '      </div>' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="jul" name="month">' +
        '      </div>' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="aug" name="month">' +
        '      </div>' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="sep" name="month">' +
        '      </div>' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="oct" name="month">' +
        '      </div>' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="nov" name="month">' +
        '      </div>' +
        '      <div class="form-check form-check-danger form-check-inline">' +
        '          <input class="form-check-input" type="checkbox" value="" id="dec" name="month">' +
        '      </div>' +
        '  </td>' +
        '  <td class="delete-item-row">' +
        '      <ul class="table-controls">' +
        '          <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>' +
        '      </ul>' +
        '  </td>' +
        '</tr>';
    $(".item-table tbody").append($html);
    deleteItemRow();

})

deleteItemRow();