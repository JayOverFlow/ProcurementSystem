$(document).ready(function () {
    function getNewRowHtml() {
        return '<tr>' +
            '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="stock" name="stock"></td>' +
            '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="unit" name="unit"></td>' +
            '  <td class="px-1"><input type="text" class="form-control form-control-sm" id="desc" name="desc"></td>' +
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
});
