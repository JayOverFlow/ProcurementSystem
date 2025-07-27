<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project Procurement Management Plan</title>
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
        .ppmp-header { border-bottom: 1px solid #dee2e6; margin-bottom: 1.2rem; }
        .ppmp-title { color: #C62742; font-weight: bold; margin-bottom: 0.1rem; }
        .ppmp-meta { font-size: 0.95em; color: black; margin-bottom: 0.2rem; margin-left: 2px; }
        .ppmp-details-label { color: black; font-size: 0.97em; margin-bottom: 0.1rem; }
        .ppmp-details-position { color: black; font-size: 0.97em; font-weight: normal; margin-bottom: 0.1rem; }
        .ppmp-details-value { font-weight: normal; color: black; margin-bottom: 0.2rem; }
        .ppmp-details-section { margin-bottom: 0.2rem; }
        .note-section {
            font-size: 0.97em;
        }
        .category-row {
            background:rgb(223, 227, 239);
            font-weight: normal;
            color: black;
        }
        .category-row td {
            padding: 0.5rem 0;
            border: none;
        }
        .category-header {
            margin-left: 1rem;
            font-size: 0.97em;
            color: black;
            font-weight: normal;
        }
        .schedule-dot {
            color: #C62742;
            font-size: 1.2em;
            font-weight: bold;
            display: block;
            text-align: center;
        }
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
        .text-danger { color: #C62742!important; }
        .ppmp-details-row {
            margin-bottom: 0.7rem;
        }
        .ppmp-details-col {
            padding-left: 0;
            padding-right: 0;
        }
        @media (max-width: 767px) {
            .ppmp-details-col { max-width: 100%; padding-right: 0; }
            .ppmp-details-row { flex-direction: column; }
        }
    </style>
</head>
<body>
<div class="paper-container">
<div class="container-fluid">
    <div class="ppmp-header pb-2 mb-3">
        <div class="text-start">
            <h2 class="ppmp-title mb-0">Project Procurement Management Plan</h2>
            <div class="ppmp-meta">FM-PR-007 &nbsp;&nbsp;&nbsp; REV 0 &nbsp;&nbsp;&nbsp; 09NOV2016</div>
        </div>
    </div>
    <?php if (!empty($ppmp)): ?>
    <div class="row ppmp-details-row align-items-start mb-2">
        <div class="col-md-7 ppmp-details-col">
            <div class="ppmp-details-section d-flex align-items-center">
                <div class="ppmp-details-label" style="margin-left: 1rem; margin-right: 12.3rem;">Office</div>
                <div class="ppmp-details-value"><?= esc($office) ?></div>
            </div>
            <div class="ppmp-details-section">
                <div class="d-flex align-items-center mb-1">
                    <div class="ppmp-details-label" style="margin-left: 1rem; margin-right: 9.7rem;">Prepared By</div>
                    <div class="ppmp-details-position"><?= esc($ppmp['ppmp_prepared_by_position']) ?></div>
                </div>
                <div class="ppmp-details-value" style="margin-left: 15.8rem;"><?= esc($prepared_by) ?></div>
            </div>
            <div class="ppmp-details-section">
                <div class="d-flex align-items-center mb-1">
                    <div class="ppmp-details-label" style="margin-left: 1rem; margin-right: 7rem;">Recommended By</div>
                    <div class="ppmp-details-position"><?= esc($ppmp['ppmp_recommended_by_position']) ?></div>
                </div>
                <div class="ppmp-details-value" style="margin-left: 15.7rem;"><?= esc($recommended_by) ?></div>
            </div>
            <div class="ppmp-details-section">
                <div class="d-flex align-items-center mb-1">
                    <div class="ppmp-details-label" style="margin-left: 1rem; margin-right: 3rem;">Evaluated and Approved By</div>
                    <div class="ppmp-details-position"><?= esc($ppmp_evaluated_by_position ?? '') ?></div>
                </div>
                <div class="ppmp-details-value" style="margin-left: 15.8rem;"><?= esc($evaluated_by ?? '') ?></div>
            </div>
        </div>
        <div class="col-md-5 ppmp-details-col">
            <div class="ppmp-details-section d-flex align-items-center">
                <div class="ppmp-details-label"style="margin-right: 7rem;">Period Covered</div>
                <div class="ppmp-details-value"><?= esc($ppmp['ppmp_period_covered']) ?></div>
            </div>
            <div class="ppmp-details-section d-flex align-items-center">
                <div class="ppmp-details-label"style="margin-right: 7rem;">Date Approved</div>
                <div class="ppmp-details-value"><?= esc($ppmp['ppmp_date_approved'] ?? '00/00/0000') ?></div>
            </div>
            <div class="ppmp-details-section d-flex align-items-center">
                <div class="ppmp-details-label"style="margin-right: 3.5rem;">Total Budget Allocation</div>
                <div class="ppmp-details-value text-danger">₱ <?= esc(number_format($ppmp['ppmp_total_budget_allocated'], 2)) ?></div>
            </div>
            <div class="ppmp-details-section d-flex align-items-center">
                <div class="ppmp-details-label"style="margin-right: 3.7rem;">Total Proposed Budget</div>
                <div class="ppmp-details-value text-danger">₱ <?= esc(number_format($ppmp['ppmp_total_proposed_budget'], 2)) ?></div>
            </div>
        </div>
        <br>
        <hr class="mt-3">
    <div class="note-section">
        <span class>Note:</span> <i>Technical Specification for each item/project shall be submitted as part of the PPMP. General description may be used when filling out this form. However, when preparing your APP, please state full specification of the item.</i>
    </div>
    <hr class="my-3">
    <div class="table-responsive">
        <table class="table table-borderless align-middle mb-0">
            <thead>
            <tr>
                <th>Code</th>
                <th>General Description</th>
                <th class="text-center mb-2">Quantity/Size</th>
                <th class="text-center mb-2">Estimated Budget</th>
                <th class="text-center mb-2" colspan="12">
                        Schedule / Milestone of Activities
                        <div class="d-flex justify-content-between text-muted">
                            <small>Jan</small>
                            <small>Feb</small>
                            <small>Mar</small>
                            <small>Apr</small>
                            <small>May</small>
                            <small>Jun</small>
                            <small>Jul</small>
                            <small>Aug</small>
                            <small>Sep</small>
                            <small>Oct</small>
                            <small>Nov</small>
                            <small>Dec</small>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
<?php
$mooe_items = [];
$co_items = [];
foreach ($ppmp_items as $item) {
    $budget = floatval($item['ppmp_item_estimated_budget']);
    if ($budget >= 50000) {
        $co_items[] = $item;
    } else {
        $mooe_items[] = $item;
    }
}
?>
<?php if (!empty($mooe_items)): ?>
<tr class="category-row">
    <td colspan="16"><div class="category-header">MISCELLANY SUPPLIES, MATERIALS AND EQUIPMENT (Below PHP 50,000.00)</div></td>
</tr>
<?php $row_counter = 0; foreach($mooe_items as $item): $row_counter++; ?>
<tr style="background-color: <?= $row_counter % 2 == 0 ? '#f3f4f6' : 'white' ?>">
    <td><?= esc($item['ppmp_item_code']) ?></td>
    <td><?= esc($item['ppmp_item_name']) ?></td>
    <td class="text-center"><?= esc($item['ppmp_item_quantity']) ?></td>
    <td class="text-center"><?= is_numeric($item['ppmp_item_estimated_budget']) ? '<span class="text-danger">₱ ' . esc(number_format($item['ppmp_item_estimated_budget'], 2)) . '</span>' : esc($item['ppmp_item_estimated_budget']) ?></td>
    <?php
        $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
        foreach($months as $month) {
            echo '<td class="text-center">';
            if (!empty($item['ppmp_sched_' . $month])) {
                echo '<span class="schedule-dot">•</span>';
            } else {
                echo '&nbsp;';
            }
            echo '</td>';
        }
    ?>
</tr>
<?php endforeach; ?>
<?php endif; ?>
<?php if (!empty($co_items)): ?>
<tr class="category-row">
    <td colspan="16"><div class="category-header">CO/ANY CAPITAL OUTLAY (PHP 50,000.00/ITEM AND ABOVE)</div></td>
</tr>
<?php $row_counter = 0; foreach($co_items as $item): $row_counter++; ?>
<tr style="background-color: <?= $row_counter % 2 == 0 ? '#f3f4f6' : 'white' ?>">
    <td><?= esc($item['ppmp_item_code']) ?></td>
    <td><?= esc($item['ppmp_item_name']) ?></td>
    <td class="text-center"><?= esc($item['ppmp_item_quantity']) ?></td>
    <td class="text-center"><?= is_numeric($item['ppmp_item_estimated_budget']) ? '<span class="text-danger">₱ ' . esc(number_format($item['ppmp_item_estimated_budget'], 2)) . '</span>' : esc($item['ppmp_item_estimated_budget']) ?></td>
    <?php
        $months = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
        foreach($months as $month) {
            echo '<td class="text-center">';
            if (!empty($item['ppmp_sched_' . $month])) {
                echo '<span class="schedule-dot">•</span>';
            } else {
                echo '&nbsp;';
            }
            echo '</td>';
        }
    ?>
</tr>
<?php endforeach; ?>
<?php endif; ?>
<?php if (empty($ppmp_items)): ?>
<tr>
    <td colspan="16" class="text-center">No items found for this PPMP.</td>
</tr>
<?php endif; ?>
</tbody>
</table>
</div>
    <?php else: ?>
        <p class="text-center">PPMP data could not be loaded.</p>
    <?php endif; ?>
</div>
</div>
</body>
</html> 