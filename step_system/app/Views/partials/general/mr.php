<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
    <div class="col">
        <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
            <div class="card-top-content">
                <div class="avatar avatar-lg">
                    <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
                </div>
            </div>
            <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                <div class="card-body text-end">
                    <h5 class="card-title mb-2" style="color: #DC3545"><strong>All</strong></h5>
                    <h5 class="card-text" style="color: #515365">12</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
            <div class="card-top-content">
                <div class="avatar avatar-lg">
                    <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
                </div>
            </div>
            <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                <div class="card-body text-end">
                    <h5 class="card-title mb-2" style="color: #DC3545"><strong>Equipments</strong></h5>
                    <h5 class="card-text" style="color: #515365">12</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
            <div class="card-top-content">
                <div class="avatar avatar-lg">
                    <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
                </div>
            </div>
            <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                <div class="card-body text-end">
                    <h5 class="card-title mb-2" style="color: #DC3545"><strong>Appliances</strong></h5>
                    <h5 class="card-text" style="color: #515365">12</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
            <div class="card-top-content">
                <div class="avatar avatar-lg">
                    <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
                </div>
            </div>
            <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                <div class="card-body text-end">
                    <h5 class="card-title mb-2" style="color: #DC3545"><strong>Furnishings</strong></h5>
                    <h5 class="card-text" style="color: #515365">12</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
            <div class="card-top-content">
                <div class="avatar avatar-lg">
                    <img src="<?= base_url('assets/images/icon-faculty.svg'); ?>" class="rounded-circle" alt="faculty icon">
                </div>
            </div>
            <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                <div class="card-body text-end">
                    <h5 class="card-title mb-2" style="color: #DC3545"><strong>Equipments</strong></h5>
                    <h5 class="card-text" style="color: #515365">12</h5>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <!-- Row 2: Data Table -->
            <div class="row layout-spacing mt-4">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <table id="style-3" class="table style-3 dt-table-hover">
                                <thead>
                                    <tr>
                                        <th class="checkbox-column text-center"> MR-Id </th>
                                        <th>Item Name</th>
                                        <th>Location</th>
                                        <th>Date Received</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($mr_items)): ?>
                                        <?php foreach ($mr_items as $item): ?>
                                            <tr>
                                                <td class="checkbox-column text-center"> <?= esc($item['mr_id']) ?> </td>
                                                <td><?= esc($item['item_name']) ?></td>
                                                <td><?= esc($item['mr_location']) ?></td>
                                                <td><?= esc($item['mr_date_received']) ?></td>
                                                <td class="text-center"><?= esc($item['mr_item_quantity']) ?>x</td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6" class="text-center">No items yet.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
<script>

c3 = $('#style-3').DataTable({
    "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center mt-sm-0 mt-3'><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
"<'table-responsive'tr>" +
"<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
    "oLanguage": {
        "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
        "sInfo": "Showing page _PAGE_ of _PAGES_",
        "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        "sSearchPlaceholder": "Search...",
        "sLengthMenu": "Category: <select class=\"form-control form-control-sm ms-1 me-1\" style=\"display: inline-block; width: auto;\"><option value=\"all\">All</option><option value=\"equipments\">Equipments</option><option value=\"appliances\">Appliances</option><option value=\"furnishings\">Furnishings</option></select>",
    },
    "stripeClasses": [],
    "lengthMenu": [5, 10, 20, 50],
    "pageLength": 10
});

multiCheck(c3);
</script>
            