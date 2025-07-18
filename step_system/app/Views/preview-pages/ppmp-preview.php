<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPMP Preview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: sans-serif;
        }
        .preview-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: .375rem;
        }
        h2 {
            color: #C62742;
        }
    </style>
</head>
<body>
    <div class="preview-container">
        <h2 class="fw-bold mb-4">Project Procurement Management Plan Preview</h2>

        <?php if (!empty($ppmp)): ?>
            <h5>PPMP Details</h5>
            <table class="table table-bordered mb-4">
                <tr>
                    <th>Office</th>
                    <td><?= esc($office) ?></td> 
                    <th>Period Covered</th>
                    <td><?= esc($ppmp['ppmp_period_covered']) ?></td>
                </tr>
                <tr>
                    <th>Prepared By</th>
                    <td><?= esc($prepared_by) ?> (<?= esc($ppmp['ppmp_prepared_by_position']) ?>)</td>
                    <th>Recommended By</th>
                    <td><?= esc($recommended_by) ?> (<?= esc($ppmp['ppmp_recommended_by_position']) ?>)</td>
                </tr>
                <tr>
                    <th>Total Proposed Budget</th>
                    <td><?= esc(number_format($ppmp['ppmp_total_proposed_budget'], 2)) ?></td>
                    <th>Total Budget Allocated</th>
                    <td><?= esc(number_format($ppmp['ppmp_total_budget_allocated'], 2)) ?></td>
                </tr>
            </table>

            <h5>Items</h5>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Code</th>
                        <th>General Description</th>
                        <th>Quantity/Size</th>
                        <th>Estimated Budget</th>
                        <th>Schedule</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($ppmp_items)): ?>
                        <?php foreach($ppmp_items as $item): ?>
                            <tr>
                                <td><?= esc($item['ppmp_item_code']) ?></td>
                                <td><?= esc($item['ppmp_item_name']) ?></td>
                                <td><?= esc($item['ppmp_item_quantity']) ?></td>
                                <td><?= esc(number_format($item['ppmp_item_estimated_budget'], 2)) ?></td>
                                <td>
                                    <?php 
                                        $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
                                        $scheduled = [];
                                        foreach($months as $month) {
                                            if ($item['ppmp_sched_' . $month]) {
                                                $scheduled[] = ucfirst($month);
                                            }
                                        }
                                        echo implode(', ', $scheduled);
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No items found for this PPMP.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">PPMP data could not be loaded.</p>
        <?php endif; ?>
    </div>
</body>
</html> 