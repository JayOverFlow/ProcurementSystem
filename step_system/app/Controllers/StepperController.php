<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\StepperModel;

/**
 * StepperController handles the requests related to the procurement stepper.
 * It acts as an intermediary between the frontend (views) and the backend (StepperModel).
 * Its primary responsibility is to fetch the latest stepper status for a given department,
 * format this data with appropriate visual elements (icons, colors), and send it as a JSON response.
 */
class StepperController extends BaseController
{
    /**
     * @var StepperModel $stepperModel An instance of the StepperModel to interact with stepper data.
     */
    protected $stepperModel;

    /**
     * Constructor for the StepperController.
     * Initializes the StepperModel, making it available for use throughout the controller.
     */
    public function __construct()
    {
        $this->stepperModel = new StepperModel();
    }

    /**
     * Retrieves the stepper status for a given department and returns it as a JSON response.
     * This method is accessed via an AJAX call from the frontend (e.g., `head-dashboard.php`).
     *
     * @param int $departmentId The ID of the department to retrieve stepper status for.
     *                            This ID is typically passed as a URL segment (e.g., `/stepper/stepper-status/1`).
     * @return ResponseInterface The JSON response containing the formatted stepper status data.
     */
    public function getStepperStatus(int $departmentId): ResponseInterface
    {
        // 1. Retrieve and update the stepper status from the StepperModel.
        //    The model handles all the complex logic of checking various procurement tables
        //    and updating the `stepper_tbl` before returning the latest status.
        $result = $this->stepperModel->getDepartmentStepperStatus($departmentId);

        // 2. Prepare the data for the frontend display.
        //    This involves adding dynamic icons and text colors based on the `stepper_status`.
        $formattedResult = [];
        foreach ($result as $phase) {
            // Convert the status to lowercase to ensure consistency with switch statement cases.
            $status = strtolower($phase['stepper_status']);
            $icon = '';        // Stores the HTML for the icon (SVG or image)
            $iconClass = '';   // Stores CSS class for the icon's background circle/container
            $textColor = '';

            // Determine the appropriate display name for the phase.
            $displayName = '';
            switch ($phase['stepper_phase']) {
                case 'PPMP':
                    $displayName = 'Project Procurement Management Plan';
                    break;
                case 'APP':
                    $displayName = 'Annual Procurement Plan';
                    break;
                case 'PR':
                    $displayName = 'Purchase Request';
                    break;
                case 'Bidding':
                    $displayName = 'Bidding Process';
                    break;
                case 'PO':
                    $displayName = 'Purchase Order';
                    break;
                case 'Delivery':
                    $displayName = 'Delivery Status';
                    break;
                case 'PAR':
                    $displayName = 'Property Acknowledgement Receipt';
                    break;
                case 'ICS':
                    $displayName = 'Inventory Custodian Slip';
                    break;
                default:
                    $displayName = $phase['stepper_phase']; // Fallback to original if not mapped
                    break;
            }

            // Determine the appropriate icon, icon class, and text color based on the phase status.
            switch ($status) {
                case 'completed':
                    // Checkmark icon for completed phases
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>';
                    $iconClass = 't-success';   // Green background for success
                    $textColor = 'text-success'; // Green text
                    break;
                case 'in_progress':
                    // Clock icon for phases that are currently being processed/reviewed
                    $icon = '<img src="' . base_url('assets/images/clock.svg') . '" alt="clock">';
                    $iconClass = 't-warning';   // Amber background for warning/in-progress
                    $textColor = 'text-warning'; // Amber text
                    break;
                case 'rejected':
                    // 'X' icon for rejected phases
                    $icon = '<img src="' . base_url('assets/images/x.svg') . '" alt="x">';
                    $iconClass = 't-danger';    // Red background for danger
                    $textColor = 'text-danger';  // Red text
                    break;
                case 'pending':
                default:
                    // Default to clock icon for pending phases (not yet started or awaiting prerequisite)
                    $icon = '<img src="' . base_url('assets/images/clock.svg') . '" alt="pending">';
                    $iconClass = 't-secondary'; // Grey background for pending/secondary status
                    $textColor = 'text-secondary';// Grey text
                    break;
            }

            // Add the formatted phase data to the result array.
            $formattedResult[] = [
                'phase'     => $phase['stepper_phase'],    // The short name of the phase (e.g., PPMP)
                'display_name' => $displayName,             // The full, user-friendly name of the phase
                'status'    => $status,                     // The processed status (lowercase)
                'remark'    => $phase['stepper_remark'],    // The remark from the database
                'updated_at'=> $phase['stepper_updated_at'], // Timestamp of last update
                'icon'      => $icon,                       // HTML string for the icon
                'icon_class'=> $iconClass,                 // CSS class for the icon container
                'text_color'=> $textColor                   // CSS class for text color
            ];
        }

        // 3. Log the formatted result for debugging purposes (useful for frontend troubleshooting).
        log_message('debug', 'Formatted Stepper Data: ' . json_encode($formattedResult));

        // 4. Return the formatted data as a JSON response to the frontend.
        //    The frontend JavaScript will then parse this JSON and dynamically render the stepper.
        return $this->response->setJSON($formattedResult);
    }
}
