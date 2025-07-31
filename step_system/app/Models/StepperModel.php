<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * StepperModel handles database operations for the procurement stepper status.
 * It interacts with various procurement tables (PPMP, APP, PR, Bidding, PO, Delivery, PAR, ICS)
 * to determine the current phase status for each department and updates the `stepper_tbl` accordingly.
 */
class StepperModel extends Model
{
    // Define the table name for the stepper data
    protected $table            = 'stepper_tbl';
    // Define the primary key for the table
    protected $primaryKey       = 'stepper_id';
    // Define the fields that are allowed to be mass-assigned (inserted/updated)
    protected $allowedFields    = [
        'stepper_dep_id_fk',  // Foreign key linking to the departments_tbl (identifies the department)
        'stepper_phase',      // The name of the procurement phase (e.g., 'PPMP', 'APP', 'PR')
        'stepper_status',     // The current status of the phase: 'pending', 'in_progress', 'completed'
        'stepper_remark',     // A descriptive remark about the current status of the phase
        'stepper_updated_at'  // Timestamp when the status was last updated
    ];

    /**
     * Retrieves the current stepper status for a given department.
     * This is the main public method that the StepperController will call.
     * It ensures that the stepper statuses in the database are up-to-date
     * based on the latest procurement document statuses.
     *
     * @param int $departmentId The ID of the department for which to retrieve stepper status.
     * @return array An array of stepper phases, each with its current status and remarks.
     */
    /**
     * [NEW] Retrieves the real-time stepper status for a department by querying source tables directly.
     * This is the new entry point for the StepperController.
     */
    public function getStepperStatus(int $departmentId): array
    {
        $stepperData = [];

        // Phase 1: Get PPMP Status
        $stepperData['PPMP'] = $this->_getPpmpStatus($departmentId);

        // Phase 2: Get APP Status
        $stepperData['APP'] = $this->_getAppStatus($departmentId, $stepperData['PPMP']);

        // Phase 3: Get PR Status
        $stepperData['PR'] = $this->_getPrStatus($departmentId, $stepperData['APP']);

        // For now, the following phases are set to Pending by default.
        // TODO: Uncomment these lines as the corresponding features are implemented.

        // Phase 4: Get Bidding Status
        $stepperData['Bidding'] = ['status' => 'Pending', 'remark' => 'Awaiting PR approval.'];

        // Phase 5: Get PO Status
        $stepperData['PO'] = ['status' => 'Pending', 'remark' => 'Awaiting successful Bidding.'];

        // Phase 6: Get Delivery Status
        $stepperData['Delivery'] = ['status' => 'Pending', 'remark' => 'Awaiting PO approval.'];

        // Phase 7: Get PAR Status
        $stepperData['PAR'] = ['status' => 'Pending', 'remark' => 'Awaiting Delivery completion.'];

        // Phase 8: Get ICS Status
        $stepperData['ICS'] = ['status' => 'Pending', 'remark' => 'Awaiting PAR creation.'];

        return $stepperData;
    }

    /**
     * [NEW] Gets the real-time status for the PPMP phase.
     */
    private function _getPpmpStatus(int $departmentId): array
    {
        $ppmps = $this->db->table('ppmp_tbl')
                         ->select('ppmp_status')
                         ->where('ppmp_office_fk', $departmentId)
                         ->orderBy('ppmp_id', 'DESC')
                         ->limit(1)
                         ->get()
                         ->getResultArray();

        if (empty($ppmps) || $ppmps[0]['ppmp_status'] === 'Draft') {
            return [
                'status' => 'Pending',
                'remark' => 'Not yet started',
            ];
        }

        $latestPpmp = $ppmps[0];
        $statusMap = [
            'Approved' => 'Completed',
            'Pending'  => 'In Progress',
            'Rejected' => 'In Progress' // Rejected is a form of 'in_progress' as it requires action
        ];

        return [
            'status' => $statusMap[$latestPpmp['ppmp_status']] ?? 'Pending',
            'remark' => 'No remarks',
        ];
    }

    /**
     * [NEW] Gets the real-time status for the APP phase.
     * The APP status is dependent on the PPMP phase being completed.
     */
    private function _getAppStatus(int $departmentId, array $ppmpStatus): array
    {
        // Check if the prerequisite PPMP phase is completed. If not, APP is pending.
        if ($ppmpStatus['status'] !== 'Completed') {
            return ['status' => 'Pending', 'remark' => 'Awaiting PPMP completion.'];
        }

        // Query for the latest APP record for the given department.
        $apps = $this->db->table('app_tbl')
                        ->select('app_status') // Select only the columns we need
                        ->where('app_dep_id_fk', $departmentId)
                        ->orderBy('app_id', 'DESC') // Get the most recent APP
                        ->limit(1)
                        ->get()
                        ->getResultArray();

        // If no APP record exists yet, the status is in progress.
        if (empty($apps)) {
            return ['status' => 'In Progress', 'remark' => 'APP creation is pending.'];
        }

        $latestApp = $apps[0];
        // Map the database status to the stepper's standardized statuses.
        $statusMap = [
            'Approved' => 'Completed',
            'Pending'  => 'In Progress',
            'Rejected' => 'In Progress' // Rejected means it needs rework, so it's 'In Progress'.
        ];

        // Return the mapped status and remark. Default to 'Pending' if status is unrecognized.
        return [
            'status' => $statusMap[$latestApp['app_status']] ?? 'Pending',
            'remark' => 'No remarks'
        ];
    }

    private function _getPrStatus(int $departmentId, array $appStatus): array
    {
        if ($appStatus['status'] !== 'Completed') {
            return ['status' => 'Pending', 'remark' => 'Awaiting APP completion.'];
        }

        $prs = $this->db->table('pr_tbl')
                       ->select('pr_status')
                       ->where('pr_department', $departmentId)
                       ->orderBy('pr_id', 'DESC')->limit(1)->get()->getResultArray();

        if (empty($prs)) {
            return ['status' => 'In Progress', 'remark' => 'Purchase Request creation is pending.'];
        }

        $latestPr = $prs[0];
        $statusMap = ['Approved' => 'Completed', 'Pending' => 'In Progress', 'Rejected' => 'In Progress'];
        return ['status' => $statusMap[$latestPr['pr_status']] ?? 'Pending', 'remark' => 'No remarks'];
    }

    private function _getBiddingStatus(int $departmentId, array $prStatus): array
    {
        if ($prStatus['status'] !== 'Completed') {
            return ['status' => 'Pending', 'remark' => 'Awaiting PR approval.'];
        }

        $biddings = $this->db->table('bidding_status')
                         ->select('bidding_status')
                         ->where('bidding_department', $departmentId)
                         ->orderBy('bidding_id', 'DESC')->limit(1)->get()->getResultArray();

        if (empty($biddings)) {
            return ['status' => 'In Progress', 'remark' => 'Bidding process is pending.'];
        }

        $latestBidding = $biddings[0];
        $statusMap = ['Successful' => 'Completed', 'Failed' => 'In Progress'];
        return ['status' => $statusMap[$latestBidding['bidding_status']] ?? 'Pending', 'remark' => 'No remarks'];
    }

    private function _getPoStatus(int $departmentId, array $biddingStatus): array
    {
        if ($biddingStatus['status'] !== 'Completed') {
            return ['status' => 'Pending', 'remark' => 'Awaiting successful Bidding.'];
        }

        $pos = $this->db->table('po_tbl')
                       ->select('po_status')
                       ->join('pr_tbl', 'po_tbl.po_pr_fk = pr_tbl.pr_id')
                       ->where('pr_tbl.pr_department', $departmentId)
                       ->orderBy('po_id', 'DESC')->limit(1)->get()->getResultArray();

        if (empty($pos)) {
            return ['status' => 'In Progress', 'remark' => 'Purchase Order creation is pending.'];
        }

        $latestPo = $pos[0];
        $statusMap = ['Approved' => 'Completed', 'Pending' => 'In Progress', 'Rejected' => 'In Progress'];
        return ['status' => $statusMap[$latestPo['po_status']] ?? 'Pending', 'remark' => 'No remarks'];
    }

    private function _getDeliveryStatus(int $departmentId, array $poStatus): array
    {
        if ($poStatus['status'] !== 'Completed') {
            return ['status' => 'Pending', 'remark' => 'Awaiting PO approval.'];
        }

        $deliveries = $this->db->table('delivery_status_tbl')
                              ->select('status')
                              ->join('po_tbl', 'delivery_status_tbl.po_id_fk = po_tbl.po_id')
                              ->join('pr_tbl', 'po_tbl.po_pr_fk = pr_tbl.pr_id')
                              ->where('pr_tbl.pr_department', $departmentId)
                              ->orderBy('delivery_stat_id', 'DESC')->limit(1)->get()->getResultArray();

        if (empty($deliveries)) {
            return ['status' => 'In Progress', 'remark' => 'Delivery is pending.'];
        }

        $latestDelivery = $deliveries[0];
        $statusMap = ['Delivered' => 'Completed'];
        return ['status' => $statusMap[$latestDelivery['status']] ?? 'Pending', 'remark' => 'No remarks'];
    }

    private function _getParStatus(int $departmentId, array $deliveryStatus): array
    {
        if ($deliveryStatus['status'] !== 'Completed') {
            return ['status' => 'Pending', 'remark' => 'Awaiting Delivery completion.'];
        }

        $par = $this->db->table('prop_ack_tbl')
                        ->join('po_items_tbl', 'prop_ack_tbl.prop_ack_po_item_id_fk = po_items_tbl.po_items_id')
                        ->join('po_tbl', 'po_items_tbl.po_items_id_fk = po_tbl.po_id')
                        ->join('pr_items_tbl', 'po_tbl.po_pr_items_id_fk = pr_items_tbl.pr_items_id')
                        ->join('pr_tbl', 'pr_items_tbl.pr_id_fk = pr_tbl.pr_id')
                        ->where('pr_tbl.pr_department', $departmentId)
                        ->countAllResults();

        if ($par > 0) {
            return ['status' => 'Completed', 'remark' => 'Property Acknowledgement Receipt created.'];
        }
        return ['status' => 'In Progress', 'remark' => 'PAR creation is pending.'];
    }

    private function _getIcsStatus(int $departmentId, array $parStatus): array
    {
        if ($parStatus['status'] !== 'Completed') {
            return ['status' => 'Pending', 'remark' => 'Awaiting PAR creation.'];
        }

        $ics = $this->db->table('invent_custo_tbl')
                        ->join('prop_ack_tbl', 'invent_custo_tbl.invent_custo_prop_ack_fk = prop_ack_tbl.prop_ack_id')
                        ->join('po_items_tbl', 'prop_ack_tbl.prop_ack_po_item_id_fk = po_items_tbl.po_items_id')
                        ->join('po_tbl', 'po_items_tbl.po_items_id_fk = po_tbl.po_id')
                        ->join('pr_items_tbl', 'po_tbl.po_pr_items_id_fk = pr_items_tbl.pr_items_id')
                        ->join('pr_tbl', 'pr_items_tbl.pr_id_fk = pr_tbl.pr_id')
                        ->where('pr_tbl.pr_department', $departmentId)
                        ->countAllResults();

        if ($ics > 0) {
            return ['status' => 'Completed', 'remark' => 'Inventory Custodian Slip created.'];
        }
        return ['status' => 'In Progress', 'remark' => 'ICS creation is pending.'];
    }

    /**
     * @deprecated This method uses the old, stateful logic of reading from and updating stepper_tbl.
     */
    public function getDepartmentStepperStatus_DEPRECATED(int $departmentId): array
    {
        // Define all the procurement phases in the correct order of progression
        $stepperPhases = [
            'PPMP', 'APP', 'PR', 'Bidding', 'PO', 'Delivery', 'PAR', 'ICS'
        ];

        // 1. Fetch existing stepper entries for the given department from `stepper_tbl`.
        //    This gives us the last known state of the stepper for this department.
        $existingStepper = $this->where('stepper_dep_id_fk', $departmentId)
                                ->orderBy('stepper_id', 'ASC') // Order by ID to ensure consistent processing order
                                ->findAll();

        // 2. Transform the fetched data into an associative array for easier lookup by phase name.
        //    This helps in quickly checking the status of a preceding phase.
        $stepperData = [];
        foreach ($existingStepper as $entry) {
            $stepperData[$entry['stepper_phase']] = [
                'status' => $entry['stepper_status'],
                'remark' => $entry['stepper_remark'],
                'updated_at' => $entry['stepper_updated_at']
            ];
        }

        // 3. Call the private method to update the stepper statuses based on the actual procurement documents.
        //    This is where the core logic for advancing the stepper resides.
        $this->updateStepperBasedOnProcurementStatus($departmentId, $stepperPhases, $stepperData);

        // 4. After updating, re-fetch the latest stepper status from the database.
        //    This ensures that the returned data reflects all the changes made in the `updateStepperBasedOnProcurementStatus` call.
        return $this->where('stepper_dep_id_fk', $departmentId)
                    ->orderBy('stepper_id', 'ASC')
                    ->findAll();
    }

    /**
     * Updates the `stepper_tbl` based on the actual status of procurement forms.
     * This method contains the core logic for advancing the stepper through its phases.
     * It checks the status of each procurement document (PPMP, APP, PR, etc.) and updates
     * the corresponding stepper phase in `stepper_tbl`.
     * Progression to a new phase typically requires the preceding phase to be 'completed'.
     *
     * @param int $departmentId The ID of the department.
     * @param array $stepperPhases All defined stepper phases in sequential order.
     * @param array $currentStepperData Reference to the current data from `stepper_tbl` for the department.
     *                                  This array is updated in real-time as phases are processed.
     */
    /**
     * @deprecated This is the old, complex waterfall logic for updating stepper statuses.
     */
    private function updateStepperBasedOnProcurementStatus_DEPRECATED(int $departmentId, array $stepperPhases, array &$currentStepperData): void
    {
        // Load CodeIgniter's date helper for functions like `now()`
        helper('date');

        // --- PPMP Phase Logic (Phase 1) ---
        // Check the status of the latest PPMP for the given department.
        // `ppmp_office_fk` is used to link the PPMP to a specific department.
        $ppmpStatus = $this->db->table('ppmp_tbl')
                               ->select('ppmp_status, ppmp_remarks')
                               ->where('ppmp_office_fk', $departmentId)
                               ->orderBy('ppmp_id', 'DESC') // Get the most recent PPMP
                               ->limit(1)
                               ->get()
                               ->getRowArray();

        // Update the 'PPMP' phase status in `stepper_tbl`.
        // If no PPMP is found or it's not submitted, it defaults to 'pending'.
        $this->updatePhaseStatus(
            $departmentId,
            'PPMP',
            $ppmpStatus,
            'ppmp_status',
            'ppmp_remarks',
            'pending', // Default status for PPMP if no record or pending
            'PPMP creation/submission is pending.',
            $currentStepperData // Passed by reference to keep track of real-time changes
        );

        // --- APP Phase Logic (Phase 2) ---
        // APP can only progress if the PPMP phase is 'completed'.
        if (isset($currentStepperData['PPMP']) && $currentStepperData['PPMP']['status'] === 'completed') {
            // Fetch the status of the latest APP linked to this department's PPMPs.
            $appStatus = $this->db->table('app_tbl')
                                  ->select('app_status')
                                  ->join('ppmp_tbl', 'app_tbl.app_ppmp_items_id_fk = ppmp_tbl.ppmp_id')
                                  ->where('ppmp_tbl.ppmp_office_fk', $departmentId) // Link APP via its associated PPMP to the department
                                  ->orderBy('app_id', 'DESC')
                                  ->limit(1)
                                  ->get()
                                  ->getRowArray();

            // Update the 'APP' phase status.
            $this->updatePhaseStatus(
                $departmentId,
                'APP',
                $appStatus,
                'app_status',
                null, // No direct remarks column in app_tbl for status, so pass null
                'pending',
                'APP review is pending.',
                $currentStepperData
            );
        } else {
            // If PPMP is not completed, force APP status to 'pending' awaiting PPMP approval.
            $this->forceUpdatePhase($departmentId, 'APP', 'pending', 'Awaiting PPMP approval.', $currentStepperData);
        }

        // --- PR Phase Logic (Phase 3) ---
        // PR can only progress if the APP phase is 'completed'.
        if (isset($currentStepperData['APP']) && $currentStepperData['APP']['status'] === 'completed') {
            // Fetch the status of the latest PR for this department.
            $prStatus = $this->db->table('pr_tbl')
                                 ->select('pr_status2') // Assuming `pr_status2` indicates final approval for PR
                                 ->where('pr_department', $departmentId) // PR is directly linked to a department
                                 ->orderBy('pr_id', 'DESC')
                                 ->limit(1)
                                 ->get()
                                 ->getRowArray();

            // Update the 'PR' phase status.
            $this->updatePhaseStatus(
                $departmentId,
                'PR',
                $prStatus,
                'pr_status2',
                null, // No direct remarks column for status
                'pending',
                'PR review is pending.',
                $currentStepperData
            );
        } else {
            // If APP is not completed, force PR status to 'pending' awaiting APP approval.
            $this->forceUpdatePhase($departmentId, 'PR', 'pending', 'Awaiting APP approval.', $currentStepperData);
        }

        // --- Bidding Phase Logic (Phase 4) ---
        // Bidding can only progress if the PR phase is 'completed'.
        if (isset($currentStepperData['PR']) && $currentStepperData['PR']['status'] === 'completed') {
            // Fetch the status of the latest Bidding entry linked through PO and PR.
            $biddingStatus = $this->db->table('bid_status')
                                      ->select('bid_stat, bit_stat_remarks')
                                      ->join('po_tbl', 'bid_status.bid_stat_po_item_fk = po_tbl.po_id') // Join to PO
                                      ->join('pr_items_tbl', 'po_tbl.po_pr_items_id_fk = pr_items_tbl.pr_items_id') // Join to PR Items
                                      ->join('pr_tbl', 'pr_items_tbl.pr_id_fk = pr_tbl.pr_id') // Join to PR
                                      ->where('pr_tbl.pr_department', $departmentId) // Link to department via PR
                                      ->orderBy('bid_stat_id', 'DESC')
                                      ->limit(1)
                                      ->get()
                                      ->getRowArray();

            // Update the 'Bidding' phase status.
            $this->updatePhaseStatus(
                $departmentId,
                'Bidding',
                $biddingStatus,
                'bid_stat',
                'bit_stat_remarks',
                'pending',
                'Bidding process is pending.',
                $currentStepperData
            );
        } else {
            // If PR is not completed, force Bidding status to 'pending' awaiting PR approval.
            $this->forceUpdatePhase($departmentId, 'Bidding', 'pending', 'Awaiting PR approval.', $currentStepperData);
        }


        // --- PO Phase Logic (Phase 5) ---
        // PO can only progress if the Bidding phase is 'completed' (i.e., successful).
        if (isset($currentStepperData['Bidding']) && $currentStepperData['Bidding']['status'] === 'completed') {
            // Fetch the status of the latest PO linked through PR.
            $poStatus = $this->db->table('po_tbl')
                                 ->select('po_status, po_remarks')
                                 ->join('pr_items_tbl', 'po_tbl.po_pr_items_id_fk = pr_items_tbl.pr_items_id')
                                 ->join('pr_tbl', 'pr_items_tbl.pr_id_fk = pr_tbl.pr_id')
                                 ->where('pr_tbl.pr_department', $departmentId)
                                 ->orderBy('po_id', 'DESC')
                                 ->limit(1)
                                 ->get()
                                 ->getRowArray();

            // Update the 'PO' phase status.
            $this->updatePhaseStatus(
                $departmentId,
                'PO',
                $poStatus,
                'po_status',
                'po_remarks',
                'pending',
                'Purchase Order creation/submission is pending.',
                $currentStepperData
            );
        } else {
            // If Bidding is not completed, force PO status to 'pending' awaiting Bidding completion.
            $this->forceUpdatePhase($departmentId, 'PO', 'pending', 'Awaiting Bidding completion.', $currentStepperData);
        }


        // --- Delivery Phase Logic (Phase 6) ---
        // Delivery can only progress if the PO phase is 'completed' (i.e., approved).
        if (isset($currentStepperData['PO']) && $currentStepperData['PO']['status'] === 'completed') {
            // Fetch the status of the latest Delivery entry linked through PO and PR.
            $deliveryStatus = $this->db->table('delivery_status_tbl')
                                       ->select('delivery_stat_, delivery_stat_remarks')
                                       ->join('po_tbl', 'delivery_status_tbl.delivery_stat_po_item_fk = po_tbl.po_id')
                                       ->join('pr_items_tbl', 'po_tbl.po_pr_items_id_fk = pr_items_tbl.pr_items_id')
                                       ->join('pr_tbl', 'pr_items_tbl.pr_id_fk = pr_tbl.pr_id')
                                       ->where('pr_tbl.pr_department', $departmentId)
                                       ->orderBy('delivery_stat_id', 'DESC')
                                       ->limit(1)
                                       ->get()
                                       ->getRowArray();

            // Update the 'Delivery' phase status.
            $this->updatePhaseStatus(
                $departmentId,
                'Delivery',
                $deliveryStatus,
                'delivery_stat_',
                'delivery_stat_remarks',
                'pending',
                'Delivery is pending.',
                $currentStepperData
            );
        } else {
            // If PO is not completed, force Delivery status to 'pending' awaiting PO approval.
            $this->forceUpdatePhase($departmentId, 'Delivery', 'pending', 'Awaiting PO approval.', $currentStepperData);
        }

        // --- PAR Phase Logic (Phase 7) ---
        // PAR can only progress if the Delivery phase is 'completed'.
        if (isset($currentStepperData['Delivery']) && $currentStepperData['Delivery']['status'] === 'completed') {
            // Check for the existence of the latest PAR record linked through PO and PR.
            // Existence implies creation/completion for this phase.
            $parStatus = $this->db->table('prop_ack_tbl')
                                  ->select('prop_ack_id') // Simply checking for existence of an entry
                                  ->join('po_items_tbl', 'prop_ack_tbl.prop_ack_po_item_id_fk = po_items_tbl.po_items_id')
                                  ->join('po_tbl', 'po_items_tbl.po_items_id_fk = po_tbl.po_id')
                                  ->join('pr_items_tbl', 'po_tbl.po_pr_items_id_fk = pr_items_tbl.pr_items_id')
                                  ->join('pr_tbl', 'pr_items_tbl.pr_id_fk = pr_tbl.pr_id')
                                  ->where('pr_tbl.pr_department', $departmentId)
                                  ->orderBy('prop_ack_id', 'DESC')
                                  ->limit(1)
                                  ->get()
                                  ->getRowArray();

            // Update the 'PAR' phase status based on whether a PAR record exists.
            if ($parStatus) {
                $this->updateOrInsertStepper(
                    $departmentId,
                    'PAR',
                    'completed',
                    'Property Acknowledgement Receipt (PAR) has been created.',
                    $currentStepperData
                );
            } else {
                $this->updateOrInsertStepper(
                    $departmentId,
                    'PAR',
                    'pending',
                    'Property Acknowledgement Receipt (PAR) creation is pending.',
                    $currentStepperData
                );
            }
        } else {
            // If Delivery is not completed, force PAR status to 'pending' awaiting Delivery completion.
            $this->forceUpdatePhase($departmentId, 'PAR', 'pending', 'Awaiting Delivery completion.', $currentStepperData);
        }

        // --- ICS Phase Logic (Phase 8) ---
        // ICS can only progress if the PAR phase is 'completed'.
        if (isset($currentStepperData['PAR']) && $currentStepperData['PAR']['status'] === 'completed') {
            // Check for the existence of the latest ICS record linked through PAR, PO, and PR.
            // Existence implies creation/completion for this phase.
            $icsStatus = $this->db->table('invent_custo_tbl')
                                  ->select('invent_custo_id') // Simply checking for existence of an entry
                                  ->join('prop_ack_tbl', 'invent_custo_tbl.invent_custo_prop_ack_fk = prop_ack_tbl.prop_ack_id')
                                  ->join('po_items_tbl', 'prop_ack_tbl.prop_ack_po_item_id_fk = po_items_tbl.po_items_id')
                                  ->join('po_tbl', 'po_items_tbl.po_items_id_fk = po_tbl.po_id')
                                  ->join('pr_items_tbl', 'po_tbl.po_pr_items_id_fk = pr_items_tbl.pr_items_id')
                                  ->join('pr_tbl', 'pr_items_tbl.pr_id_fk = pr_tbl.pr_id')
                                  ->where('pr_tbl.pr_department', $departmentId)
                                  ->orderBy('invent_custo_id', 'DESC')
                                  ->limit(1)
                                  ->get()
                                  ->getRowArray();

            // Update the 'ICS' phase status based on whether an ICS record exists.
            if ($icsStatus) {
                $this->updateOrInsertStepper(
                    $departmentId,
                    'ICS',
                    'completed',
                    'Inventory Custodian Slip (ICS) has been created.',
                    $currentStepperData
                );
            } else {
                $this->updateOrInsertStepper(
                    $departmentId,
                    'ICS',
                    'pending',
                    'Inventory Custodian Slip (ICS) creation is pending.',
                    $currentStepperData
                );
            }
        } else {
            // If PAR is not completed, force ICS status to 'pending' awaiting PAR creation.
            $this->forceUpdatePhase($departmentId, 'ICS', 'pending', 'Awaiting PAR creation.', $currentStepperData);
        }

        // --- Final Step: Ensure all phases exist in the database ---
        // This loop iterates through all defined stepper phases.
        // If a phase doesn't have an entry in `stepper_tbl` for the current department (meaning it wasn't touched by the logic above),
        // it will be inserted with a default 'pending' status.
        foreach ($stepperPhases as $phase) {
            if (!isset($currentStepperData[$phase])) {
                $this->insert([
                    'stepper_dep_id_fk' => $departmentId,
                    'stepper_phase'     => $phase,
                    'stepper_status'    => 'pending',
                    'stepper_remark'    => 'Not yet started.',
                    'stepper_updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
    }

    /**
     * Helper method to either update an existing stepper phase entry or insert a new one.
     * This method ensures that the `stepper_tbl` reflects the most recent status of each phase.
     *
     * @param int $departmentId The ID of the department.
     * @param string $phase The name of the phase (e.g., 'PPMP', 'APP').
     * @param string $status The status to set for the phase ('pending', 'in_progress', 'completed', 'rejected').
     * @param string $remark A descriptive remark for the status.
     * @param array $currentStepperData Reference to the current stepper data array. This is updated locally
     *                                  to reflect changes immediately for subsequent phase logic in `updateStepperBasedOnProcurementStatus`.
     */
    private function updateOrInsertStepper(int $departmentId, string $phase, string $status, string $remark, array &$currentStepperData): void
    {
        // Check if an entry for this phase and department already exists.
        $existingEntry = $this->where('stepper_dep_id_fk', $departmentId)
                              ->where('stepper_phase', $phase)
                              ->first();

        // Prepare the data for insertion or update.
        $data = [
            'stepper_dep_id_fk' => $departmentId,
            'stepper_phase'     => $phase,
            'stepper_status'    => $status,
            'stepper_remark'    => $remark,
            'stepper_updated_at' => date('Y-m-d H:i:s') // Set current timestamp
        ];

        // If an existing entry is found, decide whether to update it.
        if ($existingEntry) {
            // Only update if the new status or remark is different from the existing one
            // This prevents unnecessary database writes if the status hasn't changed.
            if ($existingEntry['stepper_status'] !== $status || $existingEntry['stepper_remark'] !== $remark) {
                $this->update($existingEntry['stepper_id'], $data);
            }
        } else {
            // If no existing entry, insert a new one.
            $this->insert($data);
        }
        // Update the local `$currentStepperData` array. This is crucial for subsequent conditional logic
        // within `updateStepperBasedOnProcurementStatus` to see the immediate effect of the current phase's update.
        $currentStepperData[$phase] = ['status' => $status, 'remark' => $remark, 'updated_at' => $data['stepper_updated_at']];
    }

    /**
     * Standardizes and updates the status of a stepper phase based on the retrieved status
     * from a procurement document table (e.g., PPMP, APP, PR).
     * It maps raw database statuses (e.g., 'Approved', 'Delivered') to the stepper's internal statuses
     * ('completed', 'in_progress', 'rejected', 'pending').
     *
     * @param int $departmentId The ID of the department.
     * @param string $phaseName The name of the stepper phase (e.g., 'PPMP', 'APP').
     * @param array|null $recordStatus An associative array containing the status and remarks from a procurement table.
     *                                   Can be null if no record is found.
     * @param string $statusKey The key in `$recordStatus` that holds the status value (e.g., 'ppmp_status').
     * @param string|null $remarkKey The key in `$recordStatus` that holds the remark value (e.g., 'ppmp_remarks').
     *                                 Can be null if no specific remark column is available for status.
     * @param string $defaultStatus The default status to use if `$recordStatus` is null or does not contain a clear status.
     * @param string $defaultRemark The default remark to use.
     * @param array $currentStepperData Reference to the current stepper data array to keep it updated.
     */
    private function updatePhaseStatus(
        int $departmentId,
        string $phaseName,
        ?array $recordStatus,
        string $statusKey,
        ?string $remarkKey,
        string $defaultStatus,
        string $defaultRemark,
        array &$currentStepperData
    ): void {
        $status = $defaultStatus;
        $remark = $defaultRemark;

        // If a record status is provided from a procurement table
        if ($recordStatus) {
            // Get the database status value based on the provided key
            $dbStatus = $recordStatus[$statusKey];
            // Get the database remark if a remark key is provided, otherwise null
            $dbRemark = $remarkKey ? $recordStatus[$remarkKey] : null;

            // Map database statuses to internal stepper statuses (case-insensitive comparison)
            if (strcasecmp($dbStatus, 'Approved') === 0 || strcasecmp($dbStatus, 'Delivered') === 0 || strcasecmp($dbStatus, 'Successful') === 0) {
                $status = 'Completed'; // Procurement document is approved/completed
                $remark = 'Phase ' . $phaseName . ' has been approved/completed.';
            } elseif (strcasecmp($dbStatus, 'Rejected') === 0) {
                $status = 'In Progress'; // When a form is rejected, it goes back to pending/in-progress for revision
                $remark = 'Phase ' . $phaseName . ' was rejected and is pending revision.' . ($remarkKey ? ' Reason: ' . ($dbRemark ?? 'N/A') : '');
            } elseif (strcasecmp($dbStatus, 'Pending') === 0) {
                $status = 'In Progress'; // Procurement document is pending review
                $remark = 'Phase ' . $phaseName . ' is currently pending review.';
            } else {
                // If status exists but doesn't fall into above categories, consider it in progress
                $status = 'In Progress';
                $remark = 'Phase ' . $phaseName . ' is in progress. Status: ' . $dbStatus;
            }
        }

        // Update or insert the stepper entry with the determined status and remark.
        // `strtolower($status)` ensures the status is saved in lowercase to match the ENUM type in `stepper_tbl`.
        $this->updateOrInsertStepper($departmentId, $phaseName, strtolower($status), $remark, $currentStepperData);
    }

    /**
     * Forces an update of a stepper phase to a specific status and remark.
     * This is primarily used to set subsequent phases to 'pending' when a preceding phase
     * has not yet reached the 'completed' state. It prevents a phase from showing 'in_progress'
     * or 'completed' if its prerequisite is not met.
     *
     * @param int $departmentId The ID of the department.
     * @param string $phaseName The name of the phase to force update.
     * @param string $status The status to force set (e.g., 'pending').
     * @param string $remark The remark for the forced status.
     * @param array $currentStepperData Reference to the current stepper data array to keep it updated.
     */
    private function forceUpdatePhase(int $departmentId, string $phaseName, string $status, string $remark, array &$currentStepperData): void
    {
        // Only force update if the current status is NOT already 'completed' or 'rejected' by a direct action.
        // This prevents overwriting a legitimately completed or rejected status if a previous phase regresses.
        if (!isset($currentStepperData[$phaseName]) || ($currentStepperData[$phaseName]['status'] !== 'completed' && $currentStepperData[$phaseName]['status'] !== 'rejected')) {
            $this->updateOrInsertStepper($departmentId, $phaseName, $status, $remark, $currentStepperData);
        }
    }
}
