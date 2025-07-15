<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\PpmpModel;
use App\Models\PpmpItemModel;
use App\Models\PrModel;
use App\Models\PrItemModel;
use App\Models\FilesModel;

class ExportController extends BaseController
{
    public function exportPpmp () {
        log_message('debug', 'ExportController::exportPpmp started.');

        // Initialize models
        $ppmpModel = new PpmpModel();
        $ppmpItemModel = new PpmpItemModel();
        $filesModel = new FilesModel();

        // Define upload path
        $uploadPath = WRITEPATH . 'uploads' . DIRECTORY_SEPARATOR . 'ppmp' . DIRECTORY_SEPARATOR;
        
        // Ensure the upload directory exists
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
            log_message('debug', 'Created upload directory: ' . $uploadPath);
        }

        // Check if db is available
        if ($this->db) {
            log_message('debug', 'Database connection property $this->db is available.');
        } else {
            log_message('error', 'Database connection property $this->db is NOT available.');
        }

        // Start database transaction
        try {
            $ppmpModel->db->transBegin();
            log_message('debug', 'Database transaction started for PPMP.');
        } catch (\Exception $e) {
            log_message('error', 'Failed to start database transaction: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to start database transaction: ' . $e->getMessage());
        }

        try {
            // Load the spreadsheet template
            log_message('debug', 'Attempting to load spreadsheet template: ' . FCPATH . 'assets/form-templates/ppmp.xlsx');
            $spreadsheet = IOFactory::load(FCPATH . 'assets/form-templates/ppmp.xlsx');
            $sheet = $spreadsheet->getActiveSheet();
            log_message('debug', 'Spreadsheet template loaded successfully.');

            // Get data from the form submission
            $office = "OFFICE: " . $this->request->getPost('office');
            $position1 = "PREPARED BY: " . $this->request->getPost('position1');
            $personnel1 = $this->request->getPost('personnel1');
            $position2 = "RECOMMENDED: " . $this->request->getPost('position2');
            $personnel2 = $this->request->getPost('personnel2');
            $position3 = "EVALUATED AND APPROVED BY: " . $this->request->getPost('position3');
            $personnel3 = $this->request->getPost('personnel3');
            $period_covered = $this->request->getPost('period_covered');
            $date_approved = $this->request->getPost('date_approved');
            $ttl_budget_allocated = $this->request->getPost('ttl_budget_allocated');
            $ttl_proposed_budget = $this->request->getPost('ttl_proposed_budget');
            $items = $this->request->getPost('items'); // MOOE items
            $items_co = $this->request->getPost('items_co'); // Capital Outlay items
            
            log_message('debug', 'Received form data: ' . json_encode($this->request->getPost()));
            log_message('debug', 'MOOE Items: ' . json_encode($items));
            log_message('debug', 'Capital Outlay Items: ' . json_encode($items_co));
            
            // Calculate total amount from items for MOOE
            $totalAmountMOOE = 0;
            if (!empty($items)) {
                foreach ($items as $item) {
                    $amount = floatval($item['est_budget'] ?? 0);
                    $totalAmountMOOE += $amount;
                }
            }
            log_message('debug', 'Total MOOE Amount: ' . $totalAmountMOOE);

            // Calculate total amount from items for Capital Outlay
            $totalAmountCO = 0;
            if (!empty($items_co)) {
                foreach ($items_co as $item) {
                    $amount = floatval($item['est_budget'] ?? 0);
                    $totalAmountCO += $amount;
                }
            }
            log_message('debug', 'Total Capital Outlay Amount: ' . $totalAmountCO);

            // $overallTotalAmount = $totalAmountMOOE + $totalAmountCO;
            // log_message('debug', 'Overall Total Amount: ' . $overallTotalAmount);

            // Prepare data for ppmp_tbl
            $ppmpData = [
                'ppmp_office_fk' => 1, // Assuming a default office ID for now, this needs to be dynamically set
                'ppmp_total_budget_allocation' => $ttl_budget_allocated,
                'ppmp_total_proposed_allocation' => $ttl_proposed_budget,
                'ppmp_period_covered' => date('Y', strtotime($period_covered)), // Extract year from period_covered
                'ppmp_date_submitted_fk' => 1, // Placeholder
                'ppmp_date_signed_fk' => 1, // Placeholder
                'ppmp_prepared_by_user_fk' => 1, // Placeholder
                'ppmp_evaluated_by_user_fk' => 1, // Placeholder
                'ppmp_recommended_by_user_fk' => 1, // Placeholder
                'ppmp_remarks' => 'PPMP submitted',
                'ppmp_status' => 'Pending',
            ];

            log_message('debug', 'PPMP Data to insert: ' . json_encode($ppmpData));
            $ppmpModel->insert($ppmpData);
            $ppmpId = $ppmpModel->getInsertID();
            log_message('debug', 'Inserted PPMP ID: ' . $ppmpId);

            // Save MOOE items to ppmp_items_tbl
            if (!empty($items) && $ppmpId) {
                log_message('debug', 'Saving MOOE items.');
                foreach ($items as $item) {
                    $itemData = [
                        'ppmp_id_fk' => $ppmpId,
                        'ppmp_item_name' => $item['gen_desc'] ?? '',
                        'ppmp_item_quantity' => $item['qty_size'] ?? '',
                        'ppmp_item_estimated_budget' => $item['est_budget'] ?? 0.00,
                        'ppmp_sched_jan' => isset($item['month']['jan']) ? 1 : 0,
                        'ppmp_sched_feb' => isset($item['month']['feb']) ? 1 : 0,
                        'ppmp_sched_mar' => isset($item['month']['mar']) ? 1 : 0,
                        'ppmp_sched_apr' => isset($item['month']['apr']) ? 1 : 0,
                        'ppmp_sched_may' => isset($item['month']['may']) ? 1 : 0,
                        'ppmp_sched_jun' => isset($item['month']['jun']) ? 1 : 0,
                        'ppmp_sched_jul' => isset($item['month']['jul']) ? 1 : 0,
                        'ppmp_sched_aug' => isset($item['month']['aug']) ? 1 : 0,
                        'ppmp_sched_sep' => isset($item['month']['sep']) ? 1 : 0,
                        'ppmp_sched_oct' => isset($item['month']['oct']) ? 1 : 0,
                        'ppmp_sched_nov' => isset($item['month']['nov']) ? 1 : 0,
                        'ppmp_sched_dec' => isset($item['month']['dec']) ? 1 : 0,
                        'ppmp_item_code' => $item['code'] ?? '',
                    ];
                    log_message('debug', 'Inserting MOOE Item: ' . json_encode($itemData));
                    $ppmpItemModel->insert($itemData);
                }
            }

            // Save Capital Outlay items to ppmp_items_tbl
            if (!empty($items_co) && $ppmpId) {
                log_message('debug', 'Saving Capital Outlay items.');
                foreach ($items_co as $item) {
                    $itemData = [
                        'ppmp_id_fk' => $ppmpId,
                        'ppmp_item_name' => $item['gen_desc'] ?? '',
                        'ppmp_item_quantity' => $item['qty_size'] ?? '',
                        'ppmp_item_estimated_budget' => $item['est_budget'] ?? 0.00,
                        'ppmp_sched_jan' => isset($item['month']['jan']) ? 1 : 0,
                        'ppmp_sched_feb' => isset($item['month']['feb']) ? 1 : 0,
                        'ppmp_sched_mar' => isset($item['month']['mar']) ? 1 : 0,
                        'ppmp_sched_apr' => isset($item['month']['apr']) ? 1 : 0,
                        'ppmp_sched_may' => isset($item['month']['may']) ? 1 : 0,
                        'ppmp_sched_jun' => isset($item['month']['jun']) ? 1 : 0,
                        'ppmp_sched_jul' => isset($item['month']['jul']) ? 1 : 0,
                        'ppmp_sched_aug' => isset($item['month']['aug']) ? 1 : 0,
                        'ppmp_sched_sep' => isset($item['month']['sep']) ? 1 : 0,
                        'ppmp_sched_oct' => isset($item['month']['oct']) ? 1 : 0,
                        'ppmp_sched_nov' => isset($item['month']['nov']) ? 1 : 0,
                        'ppmp_sched_dec' => isset($item['month']['dec']) ? 1 : 0,
                        'ppmp_item_code' => $item['code'] ?? '',
                    ];
                    log_message('debug', 'Inserting CO Item: ' . json_encode($itemData));
                    $ppmpItemModel->insert($itemData);
                }
            }

            // Commit transaction
            $ppmpModel->db->transCommit();
            log_message('debug', 'Database transaction committed.');

            // Map form data to specific cells in the Excel template
            log_message('debug', 'Starting Excel data mapping.');
            $sheet->setCellValue('B6', $office);
            $sheet->setCellValue('B7', $position1);
            $sheet->setCellValue('B8', $personnel1);
            $sheet->setCellValue('D7', $position2);
            $sheet->setCellValue('D8', $personnel2);
            $sheet->setCellValue('F7', $position3);
            $sheet->setCellValue('F8', $personnel3);
            $sheet->setCellValue('H7', $period_covered);
            $sheet->setCellValue('H9', $date_approved);
            $sheet->setCellValue('N7', $ttl_budget_allocated);
            $sheet->setCellValue('N9', $ttl_proposed_budget);
            // $sheet->setCellValue('J44', $overallTotalAmount);
            log_message('debug', 'Header fields mapped in Excel.');

            // Item details for MOOE - Starting from row 12 for MOOE items
            $row = 15; 
            if (!empty($items)) {
                foreach ($items as $item) {
                    log_message('debug', 'Mapping MOOE item to Excel: ' . json_encode($item));
                    $sheet->setCellValue('B' . $row, $item['code'] ?? '');
                    $sheet->setCellValue('C' . $row, $item['gen_desc'] ?? '');
                    $sheet->setCellValue('F' . $row, $item['qty_size'] ?? '');
                    $sheet->setCellValue('G' . $row, $item['est_budget'] ?? '');
                    
                    // Map months
                    $monthCol = 'H';
                    foreach (['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'] as $month) {
                        if (isset($item['month'][$month]) && $item['month'][$month] == 1) {
                            $sheet->setCellValue($monthCol . $row, '•');
                        }
                        $monthCol++;
                    }
                    $row++; 
                }
            }
            log_message('debug', 'MOOE items mapped in Excel. Next available row: ' . $row);

            // Item details for Capital Outlay - Starting from row 40 for CO items
            $row = 30; 
            if (!empty($items_co)) {
                foreach ($items_co as $item) {
                    log_message('debug', 'Mapping CO item to Excel: ' . json_encode($item));
                    $sheet->setCellValue('B' . $row, $item['code'] ?? '');
                    $sheet->setCellValue('C' . $row, $item['gen_desc'] ?? '');
                    $sheet->setCellValue('F' . $row, $item['qty_size'] ?? '');
                    $sheet->setCellValue('G' . $row, $item['est_budget'] ?? '');

                    // Map months
                    $monthCol = 'H';
                    foreach (['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'] as $month) {
                        if (isset($item['month'][$month]) && $item['month'][$month] == 1) {
                            $sheet->setCellValue($monthCol . $row, '•');
                        }
                        $monthCol++;
                    }
                    $row++; 
                }
            }
            log_message('debug', 'Capital Outlay items mapped in Excel. Next available row: ' . $row);

            // Set headers for download
            $filename = 'Project_Procurement_Management_Plan_' . date('Ymd_His') . '.xlsx';
            log_message('debug', 'Setting download headers for filename: ' . $filename);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Output the Excel file to a file instead of directly to output
            $filePath = $uploadPath . $filename;
            log_message('debug', 'Saving Excel file to: ' . $filePath);
            if (ob_get_length()) ob_end_clean();
            log_message('debug', 'Outputting Excel file.');

            $writer = new Xlsx($spreadsheet);
            $writer->save($filePath);
            log_message('debug', 'Excel file outputted successfully to: ' . $filePath);

            // Save file information to files_tbl
            $userData = $this->loadUserSession();
            $fileData = [
                'file_type' => 'ppmp',
                'file_name' => $filename,
                'file_uploaded_by' => $userData['user_id'] ?? 1, // Use logged in user ID, fallback to 1
                'file_sent_to' => null, // This can be set later if sent to a specific user
                'file_path' => 'writable/uploads/ppmp/' . $filename,
            ];
            log_message('debug', 'File data to insert: ' . json_encode($fileData));
            $filesModel->insert($fileData);
            log_message('debug', 'File information saved to files_tbl.');

            // Set headers for browser download
            log_message('debug', 'Setting download headers for browser: ' . $filename);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Output the Excel file to the browser
            if (ob_get_length()) ob_end_clean();
            log_message('debug', 'Outputting Excel file to browser.');

            $writer = new Xlsx($spreadsheet); // Re-instantiate writer to output to browser
            $writer->save('php://output');
            log_message('debug', 'Excel file outputted to browser successfully. Exiting.');
            exit();

        } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
            $ppmpModel->db->transRollback();
            log_message('error', 'PhpSpreadsheet error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'PhpSpreadsheet error: ' . $e->getMessage());
        } catch (\Exception $e) {
            $ppmpModel->db->transRollback();
            log_message('error', 'General error saving PPMP: ' . $e->getMessage() . ' Trace: ' . $e->getTraceAsString());
            return redirect()->back()->with('error', 'Failed to save PPMP: ' . $e->getMessage());
        }


    }


    public function exportPurchaseRequest()
    {
        // log_message('debug', 'ExportController::exportPurchaseRequest started.');

        // Initialize models
        $prModel = new PrModel();
        $prItemModel = new PrItemModel();
        $filesModel = new FilesModel();

        // Define upload path
        $uploadPath = WRITEPATH . 'uploads' . DIRECTORY_SEPARATOR . 'pr' . DIRECTORY_SEPARATOR;
        
        // Ensure the upload directory exists
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0777, true);
            log_message('debug', 'Created upload directory: ' . $uploadPath);
        }

        // Start database transaction
        $prModel->db->transBegin();
        // log_message('debug', 'Database transaction started.');

        try {
            // Load the spreadsheet template
            // log_message('debug', 'Attempting to load spreadsheet template.');
            $spreadsheet = IOFactory::load(FCPATH . 'assets/form-templates/purchase-request.xlsx');
            $sheet = $spreadsheet->getActiveSheet();
            // log_message('debug', 'Spreadsheet template loaded successfully.');

            // Get data from the form submission
            // log_message('debug', 'Getting form data.');
            $department = $this->request->getPost('department');
            $section = $this->request->getPost('section');
            $prNumDate = $this->request->getPost('pr_date');
            $saiNoDate = $this->request->getPost('sai_no_date');
            $printedName1 = $this->request->getPost('printed_name1');
            $designation1 = $this->request->getPost('designation1');
            $printedName2 = $this->request->getPost('printed_name2');
            $designation2 = $this->request->getPost('designation2');
            $items = $this->request->getPost('items');
            // log_message('debug', 'Form data retrieved.');
            
            // Calculate total amount from items
            $totalAmount = 0;
            if (!empty($items)) {
                foreach ($items as $item) {
                    $amount = floatval($item['total_cost'] ?? 0);
                    $totalAmount += $amount;
                }
            }
            // log_message('debug', 'Total amount calculated: ' . $totalAmount);

            // Prepare data for pr_tbl (Purchase Request)
            // log_message('debug', 'Preparing data for pr_tbl insertion.');
            $prData = [
                // 'pr_app_item_id_fk' => null, // This might need to be linked to an APP item later if applicable
                'pr_department' => $department,
                'pr_section' => $section,
                'pr_status1' => 'Pending', // Initial status
                'pr_status2' => 'Pending', // Initial status
                'pr_total' => $totalAmount,
                'pr_prdate' => $prNumDate, // Use the date from the form
                'pr_saidate' => $saiNoDate, // Use the date from the form
                'pr_remarks' => 'Purchase request submitted by ' . $printedName1,
            ];

            $prModel->insert($prData);
            $prId = $prModel->getInsertID();
            log_message('debug', 'pr_tbl inserted with ID: ' . $prId);

            // Save items to pr_items_tbl
            if (!empty($items) && $prId) {
                // log_message('debug', 'Saving items to pr_items_tbl.');
                foreach ($items as $item) {
                    $itemData = [
                        'pr_id_fk' => $prId,
                        'pr_items_quantity' => $item['qty'] ?? 0,
                        'pr_items_cost' => $item['unit_cost'] ?? 0.00,
                        'pr_items_total_cost' => $item['total_cost'] ?? 0.00,
                        'pr_items_unit' => $item['unit'] ?? '',
                        'pr_items_descrip' => $item['desc'] ?? '',
                    ];
                    $prItemModel->insert($itemData);
                }
                // log_message('debug', count($items) . ' items saved to pr_items_tbl.');
            }

            // Commit transaction
            $prModel->db->transCommit();
            // log_message('debug', 'Database transaction committed.');

            // Map form data to specific cells in the Excel template
            // log_message('debug', 'Mapping form data to Excel cells.');
            $sheet->setCellValue('B8', $department); // Example: Department field maps to C11
            $sheet->setCellValue('B9', $section);    // Example: Section field maps to C12
            $sheet->setCellValue('F8', $prNumDate);  // Example: P.R. No. Date maps to H11
            $sheet->setCellValue('F9', $saiNoDate);  // Example: SAI. No. Date maps to H12

            // Item details - Assuming a single item row starting from row 12 based on the template.
            $row = 12; // Starting row for items in your template
            if (!empty($items)) {
                log_message('debug', 'Populating item details in Excel.');
                foreach ($items as $item) {
                    // Adjust column mapping based on new head-pr.php table structure
                    $sheet->setCellValue('A' . $row, $item['qty'] ?? '');
                    $sheet->setCellValue('B' . $row, $item['unit'] ?? '');
                    $sheet->setCellValue('C' . $row, $item['desc'] ?? '');
                    $sheet->setCellValue('E' . $row, $item['unit_cost'] ?? '');
                    $sheet->setCellValue('G' . $row, $item['total_cost'] ?? '');
                    $row++; // Move to the next row for the next item
                }
            }
            // log_message('debug', 'Excel cells populated.');

            // Requested by and Approved by fields
            $sheet->setCellValue('C53', $printedName1); 
            $sheet->setCellValue('C54', $designation1); 
            $sheet->setCellValue('E53', $printedName2); 
            $sheet->setCellValue('E54', $designation2); 
            $sheet->setCellValue('F49', $totalAmount); // Map total amount to F49
            // log_message('debug', 'Signature fields mapped.');

            // Output the Excel file to a file instead of directly to output
            $filename = 'Purchase_Request_' . date('Ymd_His') . '.xlsx';
            $filePath = $uploadPath . $filename;

            log_message('debug', 'Saving Excel file to: ' . $filePath);
            $writer = new Xlsx($spreadsheet);
            $writer->save($filePath);
            log_message('debug', 'Excel file saved successfully to: ' . $filePath);

            // Save file information to files_tbl
            $userData = $this->loadUserSession();
            $fileData = [
                'file_type' => 'pr',
                'file_name' => $filename,
                'file_uploaded_by' => $userData['user_id'] ?? 1, // Use logged in user ID, fallback to 1
                'file_sent_to' => null, // This can be set later if sent to a specific user
                'file_path' => 'writable/uploads/pr/' . $filename,
            ];
            log_message('debug', 'File data to insert: ' . json_encode($fileData));
            $filesModel->insert($fileData);
            log_message('debug', 'File information saved to files_tbl.');

            // Set headers for browser download
            log_message('debug', 'Setting download headers for browser: ' . $filename);
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');

            // Output the Excel file to the browser
            if (ob_get_length()) ob_end_clean();
            log_message('debug', 'Outputting Excel file to browser.');

            $writer = new Xlsx($spreadsheet); // Re-instantiate writer to output to browser
            $writer->save('php://output');
            log_message('debug', 'Excel file outputted to browser successfully. Exiting.');
            exit();

        } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
            // Rollback transaction on PhpSpreadsheet error
            $prModel->db->transRollback();
            // Log the error and redirect with an error message
            // log_message('error', 'PhpSpreadsheet error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'PhpSpreadsheet error: ' . $e->getMessage());
        } catch (\Exception $e) {
            // Rollback transaction on error
            $prModel->db->transRollback();
            // Log the error and redirect with an error message
            // log_message('error', 'General error saving purchase request: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to save purchase request: ' . $e->getMessage());
        }
    }


}