<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4">
    <div class="col">
        <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
            <div class="card-top-content">
                <div class="avatar avatar-lg">
                    <img src="<?= base_url('assets/images/all-icon.svg'); ?>" class="rounded-circle" alt="faculty icon">
                </div>
            </div>
            <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                <div class="card-body text-end">
                    <h5 class="card-title mb-2" style="color: #8C0404"><strong>All</strong></h5>
                    <h5 class="card-text" style="color: #515365">12</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
            <div class="card-top-content">
                <div class="avatar avatar-lg">
                    <img src="<?= base_url('assets/images/equipment-icon.svg'); ?>" class="rounded-circle" alt="faculty icon">
                </div>
            </div>
            <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                <div class="card-body text-end">
                    <h5 class="card-title mb-2" style="color: #8C0404"><strong>Equipments</strong></h5>
                    <h5 class="card-text" style="color: #515365">12</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
            <div class="card-top-content">
                <div class="avatar avatar-lg">
                    <img src="<?= base_url('assets/images/appliances-icon.svg'); ?>" class="rounded-circle" alt="faculty icon">
                </div>
            </div>
            <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                <div class="card-body text-end">
                    <h5 class="card-title mb-2" style="color: #8C0404"><strong>Appliances</strong></h5>
                    <h5 class="card-text" style="color: #515365">12</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
            <div class="card-top-content">
                <div class="avatar avatar-lg">
                    <img src="<?= base_url('assets/images/furnishings-icon.svg'); ?>" class="rounded-circle" alt="faculty icon">
                </div>
            </div>
            <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                <div class="card-body text-end">
                    <h5 class="card-title mb-2" style="color: #8C0404"><strong>Furnishings</strong></h5>
                    <h5 class="card-text" style="color: #515365">12</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card style-5 mb-md-0 mb-4 py-3 h-100 ">
            <div class="card-top-content">
                <div class="avatar avatar-lg">
                    <img src="<?= base_url('assets/images/materials-icon.svg'); ?>" class="rounded-circle" alt="faculty icon">
                </div>
            </div>
            <div class="card-content flex-grow-1 d-flex align-items-center justify-content-center">
                <div class="card-body text-end">
                    <h5 class="card-title mb-2" style="color: #8C0404"><strong>Materials</strong></h5>
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
                            <th class="">Quantity</th>
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
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

                                    
            

            