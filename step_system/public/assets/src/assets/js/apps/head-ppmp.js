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
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="code" name="items[' + currentIndex + '][code]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="gen-desc" name="items[' + currentIndex + '][gen_desc]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="qty-size" name="items[' + currentIndex + '][qty_size]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget" name="items[' + currentIndex + '][est_budget]">' +
    '  <td class="d-flex justify-content-between px-0 ps-1 py-3">' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="jan" name="items[' + currentIndex + '][month][jan]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="feb" name="items[' + currentIndex + '][month][feb]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="mar" name="items[' + currentIndex + '][month][mar]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="par" name="items[' + currentIndex + '][month][apr]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="may" name="items[' + currentIndex + '][month][may]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="jun" name="items[' + currentIndex + '][month][jun]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="jul" name="items[' + currentIndex + '][month][jul]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="aug" name="items[' + currentIndex + '][month][aug]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="sep" name="items[' + currentIndex + '][month][sep]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="oct" name="items[' + currentIndex + '][month][oct]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="nov" name="items[' + currentIndex + '][month][nov]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="dec" name="items[' + currentIndex + '][month][dec]">' +
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
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="code_co" name="items_co[' + currentIndex + '][code]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="gen-desc_co" name="items_co[' + currentIndex + '][gen_desc]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="qty-size_co" name="items_co[' + currentIndex + '][qty_size]">' +
    '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="est-budget_co" name="items_co[' + currentIndex + '][est_budget]">' +
    '  <td class="d-flex justify-content-between px-0 ps-1 py-3">' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="jan_co" name="items_co[' + currentIndex + '][month][jan]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="feb_co" name="items_co[' + currentIndex + '][month][feb]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="mar_co" name="items_co[' + currentIndex + '][month][mar]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="par_co" name="items_co[' + currentIndex + '][month][apr]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="may_co" name="items_co[' + currentIndex + '][month][may]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="jun_co" name="items_co[' + currentIndex + '][month][jun]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="jul_co" name="items_co[' + currentIndex + '][month][jul]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="aug_co" name="items_co[' + currentIndex + '][month][aug]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="sep_co" name="items_co[' + currentIndex + '][month][sep]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="oct_co" name="items_co[' + currentIndex + '][month][oct]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="nov_co" name="items_co[' + currentIndex + '][month][nov]">' +
    '      </div>' +
    '      <div class="form-check form-check-danger form-check-inline">' +
    '          <input class="form-check-input" type="checkbox" value="1" id="dec_co" name="items_co[' + currentIndex + '][month][dec]">' +
    '      </div>' +
    '  </td>' +
    '  <td class="delete-item-row-co">' +
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

