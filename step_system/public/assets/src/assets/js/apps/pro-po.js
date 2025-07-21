$(document).ready(function () {
    function getNewRowHtml() {
        return '<tr>' +
            '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="stock" name="stock"></td>' +
            '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="unit" name="unit"></td>' +
            '  <td class="px-1">' +
            '    <div id="description-container">' +
            '      <div class="input-group mb-1">' +
            '        <input type="text" class="form-control form-control-sm description-input" name="desc[]" placeholder="Item specifications">' +
            '        <button class="description-btn add-description" type="button" tabindex="-1" style="border-radius: 0 .25rem .25rem 0;">' +
            '          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0d6efd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>' +
            '        </button>' +
            '      </div>' +
            '    </div>' +
            '  </td>' +
            '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="qty" name="qty"></td>' +
            '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="unit-cost" name="unit_cost"></td>' +
            '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="amount" name="amount"></td>' +
            '  <td class="delete-item-row text-center">' +
            '      <ul class="table-controls">' +
            '          <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>' +
            '      </ul>' +
            '  </td>' +
            '</tr>';
    }

    // Add Item button click handler
    $('.additem').on('click', function () {
        var $tbody = $('.item-table tbody');
        $tbody.append(getNewRowHtml());
    });

    // Delegate delete row event (works for dynamically added rows)
    $('.item-table tbody').on('click', '.delete-item', function () {
        var $rows = $('.item-table tbody tr');
        if ($rows.length > 1) {
            $(this).closest('tr').remove();
        }
    });

    // Add/Remove Description logic (moved from inline script)
    // Use event delegation for dynamic rows
    $(document).on('click', '.add-description', function() {
        var newInput = '\
            <div class="input-group mb-1">\
              <input type="text" class="form-control form-control-sm description-input" name="desc[]" placeholder="Item specifications">\
              <button class="description-btn remove-description" type="button" tabindex="-1" style="border-radius: 0 .25rem .25rem 0;">\
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#dc3545" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>\
              </button>\
            </div>\
        ';
        // Only add to the correct row's description container
        $(this).closest('#description-container').append(newInput);
    });

    $(document).on('click', '.remove-description', function() {
        $(this).closest('.input-group').remove();
    });
});
