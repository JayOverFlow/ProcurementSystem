<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Annual Procurement Plan (APP)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="<?= base_url('assets/src/assets/css/light/apps/invoice-add.css') ?>" rel="stylesheet" type="text/css" />
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #e8e8e8; }
        .paper-container {
            max-width: 310mm;
            margin: 20px auto;
            background: white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1), 0 6px 20px rgba(0,0,0,0.1);
            border-radius: 4px;
            padding: 40px;
        }
        .app-header { border-bottom: 1px solid #dee2e6; margin-bottom: 1.2rem; }
        .app-title { color: #C62742; font-weight: bold; margin-bottom: 0.1rem; }
        .app-meta { font-size: 0.95em; color: black; margin-bottom: 0.2rem; margin-left: 2px; }
        .app-details-label { color: black; font-size: 0.8em; margin-bottom: 0.1rem; }
        .app-details-position { color: black; font-size: 0.8em; font-weight: normal; margin-bottom: 0.1rem; margin-left: 60px; }
        .app-details-value { font-weight: normal; color: black; font-size: 0.8em; margin-bottom: 0.2rem; margin-left: 60px; }
        .app-details-section { margin-bottom: 0.2rem; }
        .table thead th, .table thead td {
            border-bottom: 2px solid #f3f4f6;
            color: black;
            font-weight: normal;
        }
        .table-borderless tbody tr:not(.category-row) td {
            border: none;
        }
        .table-borderless thead th {
            border-bottom: 1px solid #f3f4f6;
        }
        .table-borderless td, .table-borderless th {
            background: transparent;
        }
        .table-borderless tbody tr:nth-child(even) {
            background-color: #f3f4f6;
        }
        .table-borderless tbody tr:nth-child(odd) {
            background-color: white;
        }
        .table th, .table td {
            font-size: 0.75rem;
            padding: 0.5rem 0.3rem;
            text-align: center;
        }
        .table thead th {
            font-size: 0.8rem;
            font-weight: 600;
        }
        .text-danger { color: #C62742!important; }
        .app-details-row {
            margin-bottom: 0.7rem;
        }
        .app-details-col {
            padding-left: 0;
            padding-right: 0;
        }
        .app-subtitle {
            font-size: 0.9rem;
            font-weight: normal;
            color: #333;
        }
        .recommending-section .app-details-value,
        .recommending-section .app-details-position {
            margin-left: 150px;
        }
        @media (max-width: 767px) {
            .app-details-col { max-width: 100%; padding-right: 0; }
            .app-details-row { flex-direction: column; }
        }
    </style>
</head>
<body>
<div class="paper-container">
<div class="container-fluid">
    <div class="app-header pb-2 mb-3">
        <div class="text-start">
            <h2 class="app-title mb-0">Annual Procurement Plan (APP)</h2>
            <div class="app-meta">FM-PR-007 &nbsp;&nbsp;&nbsp; REV 0 &nbsp;&nbsp;&nbsp; 09NOV2016</div>
        </div>
    </div>
    <div class="mb-4">
        <h5 class="app-subtitle">Annual Procurement Plan for SY 2025</h5>
    </div>
    <hr class="my-2">
    <?php if (!empty($app)): ?>
    <div class="table-responsive">
        <table class="table table-borderless align-middle mb-0">
            <thead class="text-center">
                <tr>
                    <th rowspan="2">Code</th>
                    <th rowspan="2">Procurement Project</th>
                    <th rowspan="2">PMO/End-User</th>
                    <th rowspan="2">Mode of Procurement</th>
                    <th colspan="4">Schedule for each Procurement Activity</th>
                    <th rowspan="2">Source of Funds</th>
                    <th rowspan="2">Remarks</th>
                </tr>
                <tr>
                    <th>Ads/Post of IB/REI</th>
                    <th>Sub/Open of Bids</th>
                    <th>Notice of Award</th>
                    <th>Contract Signing</th>
                    <th>Total</th>
                    <th>MOOE</th>
                    <th>CO</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($items)): ?>
                    <?php foreach($items as $item): ?>
                        <tr>
                            <td><?= esc($item['app_item_code']) ?></td>
                            <td><?= esc($item['app_item_name']) ?></td>
                            <td><?= esc($item['app_item_pmo']) ?></td>
                            <td><?= esc($item['app_item_mode']) ?></td>
                            <td><?= esc($item['app_item_adspost']) ?></td>
                            <td><?= esc($item['app_item_subopen']) ?></td>
                            <td><?= esc($item['app_item_notice']) ?></td>
                            <td><?= esc($item['app_item_contract']) ?></td>
                            <td><?= esc($item['app_item_source_fund']) ?></td>
                            <td><?= esc(number_format($item['app_item_estimated_total'], 2)) ?></td>
                            <td><?= esc(number_format($item['app_item_estimated_mooe'], 2)) ?></td>
                            <td><?= esc(number_format($item['app_item_estimated_co'], 2)) ?></td>
                            <td><?= esc($item['app_item_remarks']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="13" class="text-center">No items found for this APP.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <hr class="my-2">
    <div class="row app-details-row align-items-start mb-4 mt-5">
        <div class="col-md-4 app-details-col">
            <div class="app-details-section">
                <div class="app-details-label">Prepared</div>
                <div class="app-details-value"><?= esc($app['app_prepared_by_name']) ?></div>
                <div class="app-details-position"><?= esc($app['app_prepared_by_designation']) ?></div>
            </div>
        </div>
        <div class="col-md-4 app-details-col">
            <div class="app-details-section recommending-section">
                <div class="app-details-label">Recommending Approval</div>
                <div class="app-details-value"><?= esc($app['app_recommending_by_name']) ?></div>
                <div class="app-details-position"><?= esc($app['app_recommending_by_designation']) ?></div>
            </div>
        </div>
        <div class="col-md-4 app-details-col">
            <div class="app-details-section">
                <div class="app-details-label">Approved</div>
                <div class="app-details-value"><?= esc($app['app_approved_by_name']) ?></div>
                <div class="app-details-position"><?= esc($app['app_approved_by_designation']) ?></div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <p class="text-center">APP data could not be loaded.</p>
    <?php endif; ?>
</div>
</div>
</body>
</html>