<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Order</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 20px; 
            background: #f5f5f5; 
            font-size: 12px;
        }
        .container {
            max-width: 210mm;
            margin: 0 auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: left;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header h1 {
            color: #C62742;
            font-size: 18px;
            font-weight: bold;
            margin: 0;
        }
        .header .form-info {
            font-size: 10px;
            margin-top: 5px;
        }
        .info-row {
            display: flex;
            margin-bottom: 8px;
        }
        .info-col {
            flex: 1;
            margin-right: 20px;
        }
        .info-col:last-child {
            margin-right: 0;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            min-width: 80px;
        }
        .gentlemen {
            margin: 20px 0;
            font-size: 12px;
        }
        .delivery-info {
            display: flex;
            margin: 15px 0;
        }
        .delivery-left, .delivery-right {
            flex: 1;
        }
        .delivery-right {
            margin-left: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 11px;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: none;
        }
        th {
            border-bottom: 2px solid #f3f4f6;
            font-weight: normal;
            color: black;
        }
        tbody tr:nth-of-type(odd) td {
            background-color: rgba(0,0,0,.05);
        }
        .description {
            text-align: left !important;
        }
        .total-section {
            text-align: right;
            margin: 20px 0;
            font-size: 14px;
            font-weight: bold;
        }
        .signature-section {
            margin-top: 30px;
        }
        .signature-row {
            display: flex;
            margin-bottom: 20px;
        }
        .signature-col {
            flex: 1;
            margin-right: 20px;
        }
        .signature-col:last-child {
            margin-right: 0;
        }
        .underline {
            border-bottom: 1px solid #000;
            min-height: 20px;
            margin-bottom: 5px;
        }
        @media print {
            body { background: white; }
            .container { box-shadow: none; }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>PURCHASE ORDER</h1>
        <div class="form-info">FM-PR-007 &nbsp;&nbsp;&nbsp; REV 0 &nbsp;&nbsp;&nbsp; 09NOV2016</div>
    </div>

    <div class="info-row">
        <div class="info-col">
            <span class="label">Supplier:</span> <?= $po['po_supplier'] ?? 'SCIENCESTAR CORPORATION' ?>
        </div>
        <div class="info-col">
            <span class="label">P.O. No.:</span> <?= $po['po_ponumber'] ?? '2014-05-67' ?>
        </div>
    </div>

    <div class="info-row">
        <div class="info-col">
            <span class="label">Address:</span> <?= $po['po_address'] ?? 'Unit 1505 Antel Global Corporate Center, Julia Vargas Ave., Ortigas Center, Pasig City' ?>
        </div>
        <div class="info-col">
            <span class="label">Date:</span> <?= $po['po_date'] ?? date('Y-m-d') ?>
        </div>
    </div>

    <div class="info-row">
        <div class="info-col">
            <span class="label">Tel No.:</span> <?= $po['po_tele'] ?? '(02) 8631-8000' ?>
        </div>
        <div class="info-col">
            <span class="label">Mode of Procurement:</span>&nbsp;&nbsp; <?= $po['po_mode'] ?? 'N/A' ?>
        </div>
    </div>

    <div class="info-row">
        <div class="info-col">
            <span class="label">TIN:</span> <?= $po['po_tin'] ?? '123-456-789-000' ?>
        </div>
        <div class="info-col">
            <span class="label">TUP-Taguig TIN:</span> <?= $po['po_tuptin'] ?? '000-123-456-789' ?>
        </div>
    </div>
    <br>
    <hr class="my-2">
    <div class="gentlemen">
        <p><strong>Gentlemen:</strong></p>
        <p>Please furnish this Office the following articles subject to the terms and conditions contained herein:</p>
    </div>
    <hr class="my-2">

    <div class="delivery-info">
        <div class="delivery-left">
            <div><span class="label">Place of Delivery:</span> <?= $po['po_place_delivery'] ?? 'OR' ?></div>
            <div><span class="label">Date of Delivery:</span> <?= $po['po_date_delivery'] ?? '2014-05-67' ?></div>
        </div>
        <div class="delivery-right">
            <div><span class="label">Delivery Term:</span> <?= $po['po_delivery_term'] ?? '30' ?></div>
            <div><span class="label">Payment Term:</span> <?= $po['po_payment_term'] ?? '2014-05-67' ?></div>
        </div>
    </div>
<hr class="my-2">
    <table>
        <thead>
            <tr>
                <th>Stock</th>
                <th>Unit</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Cost</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Debug: Show what data we have
            // echo "<tr><td colspan='6'>Debug: po_items count: " . count($po_items ?? []) . "</td></tr>";
            ?>
            <?php if (!empty($po_items)): ?>
                <?php foreach ($po_items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars($item['po_items_stockno'] ?? '') ?></td>
                        <td><?= htmlspecialchars($item['po_items_unit'] ?? '') ?></td>
                        <td class="description">
                            <?= htmlspecialchars($item['po_items_descrip'] ?? '') ?>
                            <?php if (!empty($item['specifications'])): ?>
                                <br>
                                <?php foreach ($item['specifications'] as $spec): ?>
                                    - <?= htmlspecialchars($spec['po_item_spec_descrip'] ?? '') ?><br>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($item['po_items_quantity'] ?? '') ?></td>
                        <td>₱ <?= number_format($item['po_items_cost'] ?? 0, 2) ?></td>
                        <td>₱ <?= number_format($item['po_items_amount'] ?? 0, 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback static data for demonstration -->
                <tr>
                    <td>N/A</td>
                    <td>set</td>
                    <td class="description">Bridge Set<br>
                        - Span: 18.30 m<br>
                        - Width: 4.30 m<br>
                        - Load Capacity: 15 tons<br>
                        - Material: Steel and Concrete
                    </td>
                    <td>1</td>
                    <td>₱ 113,939.00</td>
                    <td>₱ 113,939.00</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<hr class="my-2">
    <div class="info-row">
        <div class="info-col">
            <span class="label">Description:</span> <?= $po['po_description'] ?? 'Supplies for Laboratory Equipment (PASCO) - BASIC Physics' ?>
        </div>
        <div class="info-col" style="text-align: right;">
            <span class="label">Total</span> <strong>₱ <?= number_format($po['po_total_amount'] ?? 113939, 2) ?></strong>
        </div>
    </div>

    <div class="info-row">
        <div class="info-col">
            <span class="label">Amount in Words:</span> <?= $po['po_amount_in_words'] ?? 'One Hundred Thirteen Thousand Nine Hundred Thirty Nine Pesos Only' ?>
        </div>
    </div>
    <hr class="my-2">
    <div class="signature-section">
        <div class="signature-row">
            <div class="signature-col">
                <div><strong>Conforme:</strong></div>
              
                <div style="text-align: center; margin-top: 5px;"><?= $po['conforme_name_of_supplier'] ?? 'Ron Eric Legaspi' ?></div>
                <div style="text-align: center; font-size: 10px;">Signature over Printed Name</div>
                <div style="text-align: center; margin-top: 10px;"><?= $po['conforme_date'] ?? '08/01/2024' ?></div>
                <div style="text-align: center; font-size: 10px;">Date</div>
            </div>
            <div class="signature-col">
                <div><strong>Yours truly,</strong></div>
                
                <div style="text-align: center; margin-top: 5px;"><?= $po['conforme_campus_director'] ?? 'ENGR. REXMELLE P. DECAMPA JR., Ph.D' ?></div>
                <div style="text-align: center; font-size: 10px;">Campus Director</div>
            </div>
        </div>
        <hr class="my-2">
        <div class="signature-row">
            <div class="signature-col">
                <div><strong>Funds Cluster:</strong> <?= $po['po_fund_cluster'] ?? 'N/A' ?></div>
                <div><span class="label">Funds Available:</span> <?= $po['po_fund_available'] ?? 'Supplies for Laboratory Equipment (PASCO) - BASIC Physics' ?></div>
                <div class="" style="margin-top: 30px;"></div>
                <div style="text-align: center; margin-top: 5px;"><?= $po['po_accountant'] ?? 'Juliet T. Navor' ?></div>
                <div style="text-align: center; font-size: 10px;">Accountant III</div>
            </div>
            <div class="signature-col">
                <div><span class="label">ORS/BURS No.:</span> <?= $po['po_orsburs'] ?? '2024 - 09 - 256' ?></div>
                <div><span class="label">Date of the ORS/BURS:</span> <?= $po['po_date_orsburs'] ?? '5/30/24' ?></div>
                <div><span class="label">Amount:</span> ₱<?= number_format($po['po_amount'] ?? 113939, 2) ?></div>
            </div>
        </div>
</div>

</body>
</html>
