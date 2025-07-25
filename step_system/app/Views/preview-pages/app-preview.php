<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP Preview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: sans-serif;
        }
        .preview-container {
            max-width: 1400px; /* Adjusted for wider table */
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: .375rem;
        }
        h2 {
            color: #C62742;
        }
        th, td {
            font-size: 0.85rem; /* Smaller font for more content */
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="preview-container">
        <div class="text-center mb-4">
            <h4 class="fw-bold">ANNUAL PROCUREMENT PLAN (APP)</h4>
            <h5 class="fw-bold">FY <?= date('Y') ?></h5>
        </div>

        <?php if (!empty($app)): ?>
            <table class="table table-bordered mb-4">
                <tr>
                    <th class="p-2">Prepared By:</th>
                    <td class="p-2"><?= esc($app['app_prepared_by_name']) ?></td>
                    <th class="p-2">Recommending Approval:</th>
                    <td class="p-2"><?= esc($app['app_recommending_by_name']) ?></td>
                    <th class="p-2">Approved By:</th>
                    <td class="p-2"><?= esc($app['app_approved_by_name']) ?></td>
                </tr>
                <tr>
                    <th class="p-2">Designation:</th>
                    <td class="p-2"><?= esc($app['app_prepared_by_designation']) ?></td>
                    <th class="p-2">Designation:</th>
                    <td class="p-2"><?= esc($app['app_recommending_by_designation']) ?></td>
                    <th class="p-2">Designation:</th>
                    <td class="p-2"><?= esc($app['app_approved_by_designation']) ?></td>
                </tr>
            </table>

            <h5 class="mt-4">Items</h5>
            <table class="table table-striped table-bordered">
                <thead class="table-dark text-center">
                    <tr>
                        <th rowspan="2">Code</th>
                        <th rowspan="2">Procurement Project</th>
                        <th rowspan="2">PMO/End-User</th>
                        <th rowspan="2">Mode of Procurement</th>
                        <th colspan="4">Schedule for each Procurement Activity</th>
                        <th rowspan="2">Source of Funds</th>
                        <th colspan="3">Estimated Budget</th>
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
        <?php else: ?>
            <p class="text-center">APP data could not be loaded.</p>
        <?php endif; ?>
    </div>
</body>
</html> 