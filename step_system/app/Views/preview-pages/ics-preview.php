<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Request</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="<?= base_url('assets/src/assets/css/light/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #e8e8e8; }
        .paper-container {
            max-width: 340mm;
            margin: 20px auto;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1), 0 6px 20px rgba(0,0,0,0.1);
            border-radius: 4px;
            padding: 40px;
            min-height: 297mm;
        }
        .pr-header { border-bottom: 1px solid #dee2e6; margin-bottom: 1.2rem; }
        .pr-title { color: #C62742; font-weight: bold; margin-bottom: 0.1rem; }
        .pr-meta { font-size: 0.95em; color: black; margin-bottom: 0.2rem; margin-left: 2px; }
        .pr-details-label { color: black; font-size: 0.97em; margin-bottom: 0.1rem; }
        .pr-details-value { font-weight: normal; color: black; margin-bottom: 0.2rem; }
        .pr-details-section { margin-bottom: 0.2rem; }
        .table thead th, .table thead td {
            border-bottom: 2px solid #f3f4f6;
            color: black;
            font-weight: normal;
        }
        .table-striped tbody tr:nth-of-type(odd) td {
            background-color: rgba(0,0,0,.05);
        }
        .text-danger { color: #C62742!important; }
        .pr-details-row {
            margin-bottom: 0.7rem;
        }
        .pr-details-col {
            padding-left: 0;
            padding-right: 0;
        }
        @media (max-width: 767px) {
            .pr-details-col { max-width: 100%; padding-right: 0; }
            .pr-details-row { flex-direction: column; }
        }
    </style>
</head>
<body>
<div class="paper-container">
<div class="container-fluid">
    <div class="pr-header pb-2 mb-3">
        <div class="text-start">
            <h2 class="pr-title mb-0">Purchase Request</h2>
            <div class="pr-meta">FM-PR-007 &nbsp;&nbsp;&nbsp; REV 0 &nbsp;&nbsp;&nbsp; 09NOV2016</div>
        </div>
    </div>
    
    <?php if (!empty($pr)): ?>
    <div class="row pr-details-row align-items-start mb-2">
        <div class="col-md-6 pr-details-col">
            <div class="pr-details-section d-flex align-items-center">
                <div class="pr-details-label" style="margin-left: 1rem; margin-right: 5rem;">Department</div>
                <div class="pr-details-value"><?= esc($department ?? '') ?></div>
            </div>
            <div class="pr-details-section d-flex align-items-center">
                <div class="pr-details-label" style="margin-left: 1rem; margin-right: 7rem;">Section</div>
                <div class="pr-details-value"><?= esc($pr['pr_section'] ?? '') ?></div>
            </div>
        </div>
        <div class="col-md-6 pr-details-col">
            <div class="pr-details-section d-flex align-items-center">
                <div class="pr-details-label" style="margin-right: 3rem;">P.R. No. Date</div>
                <div class="pr-details-value"><?= esc($pr['pr_no_date'] ?? 'N/A') ?></div>
            </div>
            <div class="pr-details-section d-flex align-items-center">
                <div class="pr-details-label" style="margin-right: 3rem;">SAI No. Date</div>
                <div class="pr-details-value"><?= esc($pr['pr_sai_no_date'] ?? 'N/A') ?></div>
            </div>
        </div>
    </div>

    <hr class="my-3">

    <div class="table-responsive">
        <table class="table table-striped align-middle mb-0">
            <thead>
            <tr>
                <th class="text-center">Qty.</th>
                <th class="text-center">Unit</th>
                <th class="">Description</th>
                <th class="text-center">Unit Cost</th>
                <th class="text-center">Total Cost</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $total_amount = 0;
            if (!empty($pr_items)): 
                foreach ($pr_items as $item): 
                    $total_cost = floatval($item['pr_items_total_cost'] ?? 0);
                    $total_amount += $total_cost;
            ?>
            <tr>
                <td class="text-center"><?= esc($item['pr_items_quantity'] ?? '1') ?></td>
                <td class="text-center"><?= esc($item['pr_items_unit'] ?? 'N/A') ?></td>
                <td><?= esc($item['pr_items_descrip'] ?? 'N/A') ?></td>
                <td class="text-center">₱ <?= number_format(floatval($item['pr_items_cost'] ?? 0), 2) ?></td>
                <td class="text-center">₱ <?= number_format($total_cost, 2) ?></td>
            </tr>
            <?php 
                endforeach; 
            else: 
            ?>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">N/A</td>
                <td>No items found</td>
                <td class="text-center">₱ 0.00</td>
                <td class="text-center">₱ 0.00</td>
            </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="row mt-3">
        <div class="col-md-10">
            <p class="text-end pr-details-label">Total Amount</p>
        </div>
        <div class="col-md-2">
            <p class="text-end pr-details-value">₱ <?= number_format($total_amount, 2) ?></p>
        </div>
    </div>

    <hr class="mt-2">

    <div class="row pr-details-row align-items-start">
        <div class="col-md-6 pr-details-col">
            <div class="pr-details-section">
                <div class="pr-details-label text-start">Requested By</div>
                <div class="pr-details-value text-center"><?= esc($requested_by ?? 'N/A') ?></div>
                <div class="pr-details-value text-center"><?= esc($pr['pr_requested_by_designation'] ?? 'N/A') ?></div>
            </div>
        </div>
        <div class="col-md-6 pr-details-col">
            <div class="pr-details-section">
                <div class="pr-details-label text-start">Approved By</div>
                <div class="pr-details-value text-center"><?= esc($approved_by ?? 'N/A') ?></div>
                <div class="pr-details-value text-center"><?= esc($pr['pr_approved_by_designation'] ?? 'N/A') ?></div>
            </div>
        </div>
    </div>
    
    <?php else: ?>
    <!-- Static content when no PR data is available -->
    <div class="row pr-details-row align-items-start mb-2">
        <div class="col-md-6 pr-details-col">
            <div class="pr-details-section d-flex align-items-center">
                <div class="pr-details-label" style="margin-left: 1rem; margin-right: 5rem;">Department</div>
                <div class="pr-details-value">Basic Arts and Sciences Department</div>
            </div>
            <div class="pr-details-section d-flex align-items-center">
                <div class="pr-details-label" style="margin-left: 1rem; margin-right: 7rem;">Section</div>
                <div class="pr-details-value">Chemistry</div>
            </div>
        </div>
        <div class="col-md-6 pr-details-col">
            <div class="pr-details-section d-flex align-items-center">
                <div class="pr-details-label" style="margin-right: 3rem;">P.R. No. Date</div>
                <div class="pr-details-value">00000000</div>
            </div>
            <div class="pr-details-section d-flex align-items-center">
                <div class="pr-details-label" style="margin-right: 3rem;">SAI No. Date</div>
                <div class="pr-details-value">00/00/0000</div>
            </div>
        </div>
    </div>

    <hr class="my-3">

    <div class="table-responsive">
        <table class="table table-striped align-middle mb-0">
            <thead>
            <tr>
                <th class="text-center">Qty.</th>
                <th class="text-center">Unit</th>
                <th class="text-center">Description</th>
                <th class="text-center">Unit Cost</th>
                <th class="text-center">Total Cost</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">IoT</td>
                <td>LED Projector, HDMI, 3600 lumens</td>
                <td class="text-center">₱ 35,000.00</td>
                <td class="text-center">₱ 35,000.00</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="row mt-3">
        <div class="col-md-10">
            <p class="text-end pr-details-label">Total Amount</p>
        </div>
        <div class="col-md-2">
            <p class="text-end pr-details-value">₱ 35,000.00</p>
        </div>
    </div>

    <hr class="mt-2">

    <div class="row pr-details-row align-items-start">
        <div class="col-md-6 pr-details-col">
            <div class="pr-details-section">
                <div class="pr-details-label text-start">Requested By</div>
                <div class="pr-details-value text-center">BASD - Department Head</div>
                <div class="pr-details-value text-center">Engr. Rexmelle F. Decapia, Jr. PhD</div>
            </div>
        </div>
        <div class="col-md-6 pr-details-col">
            <div class="pr-details-section">
                <div class="pr-details-label text-start">Approved By</div>
                <div class="pr-details-value text-center">Campus Director</div>
                <div class="pr-details-value text-center">Engr. Rexmelle F. Decapia, Jr. PhD</div>
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>
</div>
</body>
</html>
