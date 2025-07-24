<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\AppModel;
use App\Models\InventCustoModel;
use App\Models\ParModel;
use App\Models\PoModel;
use App\Models\PpmpModel;
use App\Models\PrModel;
use App\Models\TaskModel;
use App\Models\UserModel;

class ProcurementPageController extends BaseController
{
    protected $ppmpModel;
    protected $appModel;
    protected $prModel;
    protected $poModel;
    protected $parModel;
    protected $icsModel;
    protected $taskModel;
    protected $userModel;

    public function __construct()
    {
        $this->ppmpModel = new PpmpModel();
        $this->appModel = new AppModel();
        $this->prModel = new PrModel();
        $this->poModel = new PoModel();
        $this->parModel = new ParModel();
        $this->icsModel = new InventCustoModel(); // ICS uses InventCustoModel
        $this->taskModel = new TaskModel();
        $this->userModel = new UserModel();
    }

    /**
     * Fetches all procurement forms for a given user.
     *
     * @param int $userId The ID of the logged-in user.
     * @return array An array of combined and sorted form data.
     */
    protected function getUsersForms(int $userId): array
    {
        $forms = [];

        log_message('debug', 'getUsersForms: Current userId being used: ' . $userId);

        // Instead of fetching from individual form models and then looking up tasks,
        // start by querying the tasks_tbl directly, which now respects soft deletes.
        // This ensures that only non-deleted tasks are considered from the start.

        // Fetch all non-deleted tasks for the user.
        $allTasks = $this->taskModel
            ->withDeleted() // Bypass default soft-delete filtering
            ->where('submitted_by', $userId)
            ->where('is_deleted', 0) // Explicitly filter for non-deleted tasks
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $latestTasks = [];
        $processedDocumentFks = [
            'ppmp_id_fk' => [],
            'app_id_fk' => [],
            'pr_id_fk' => [],
            'po_id_fk' => [],
            'par_id_fk' => [],
            'ics_id_fk' => [],
        ];

        // Iterate through all tasks to find the latest version of each document
        foreach ($allTasks as $task) {
            $foundKey = false;
            foreach ($processedDocumentFks as $fk_name => $processed_ids) {
                // Check if the task has a valid FK and if we haven't processed this document yet
                if (!empty($task[$fk_name]) && !in_array($task[$fk_name], $processed_ids)) {
                    $latestTasks[] = $task; // Since the query is ordered by created_at DESC, the first one we see is the latest
                    $processedDocumentFks[$fk_name][] = $task[$fk_name]; // Mark this document FK as processed
                    $foundKey = true;
                    break; // Move to the next task
                }
            }
            // If a task has no FKs (e.g., older data), include it.
            if (!$foundKey) {
                $isOrphan = true;
                foreach (array_keys($processedDocumentFks) as $fk_name) {
                    if (!empty($task[$fk_name])) {
                        $isOrphan = false;
                        break;
                    }
                }
                if ($isOrphan) {
                    $latestTasks[] = $task;
                }
            }
        }

        $tasks = $latestTasks;

        log_message('debug', 'getUsersForms: Fetched tasks for user ' . $userId . ': ' . json_encode($tasks));

        foreach ($tasks as $task) {
            log_message('debug', 'getUsersForms: Processing task: ' . json_encode($task));

            $formType = $task['task_type'];
            $documentId = null;
            $formDetails = null;

            // Determine the correct form and its ID based on task_type
            switch ($formType) {
                case 'Project Procurement Management':
                    if ($task['ppmp_id_fk']) {
                        $formDetails = $this->ppmpModel->find($task['ppmp_id_fk']);
                        $documentId = $formDetails['ppmp_id'] ?? null;
                        log_message('debug', 'getUsersForms: PPMP formDetails (' . $task['ppmp_id_fk'] . '): ' . json_encode($formDetails));
                        log_message('debug', 'getUsersForms: PPMP documentId: ' . $documentId);
                    }
                    break;
                case 'Annual Procurement Plan':
                    if ($task['app_id_fk']) {
                        $formDetails = $this->appModel->find($task['app_id_fk']);
                        $documentId = $formDetails['app_id'] ?? null;
                        log_message('debug', 'getUsersForms: APP formDetails (' . $task['app_id_fk'] . '): ' . json_encode($formDetails));
                        log_message('debug', 'getUsersForms: APP documentId: ' . $documentId);
                    }
                    break;
                case 'Purchase Request':
                    if ($task['pr_id_fk']) {
                        $formDetails = $this->prModel->find($task['pr_id_fk']);
                        $documentId = $formDetails['pr_id'] ?? null;
                        log_message('debug', 'getUsersForms: PR formDetails (' . $task['pr_id_fk'] . '): ' . json_encode($formDetails));
                        log_message('debug', 'getUsersForms: PR documentId: ' . $documentId);
                    }
                    break;
                case 'Purchase Order':
                    if ($task['po_id_fk']) {
                        $formDetails = $this->poModel->find($task['po_id_fk']);
                        $documentId = $formDetails['po_id'] ?? null;
                        log_message('debug', 'getUsersForms: PO formDetails (' . $task['po_id_fk'] . '): ' . json_encode($formDetails));
                        log_message('debug', 'getUsersForms: PO documentId: ' . $documentId);
                    }
                    break;
                case 'Property Acknowledgement Receipt':
                    if ($task['par_id_fk']) {
                        $formDetails = $this->parModel->find($task['par_id_fk']);
                        $documentId = $formDetails['prop_ack_id'] ?? null;
                        log_message('debug', 'getUsersForms: PAR formDetails (' . $task['par_id_fk'] . '): ' . json_encode($formDetails));
                        log_message('debug', 'getUsersForms: PAR documentId: ' . $documentId);
                    }
                    break;
                case 'Inventory Custodian Slip':
                    if ($task['ics_id_fk']) {
                        $formDetails = $this->icsModel->find($task['ics_id_fk']);
                        $documentId = $formDetails['invent_custo_id'] ?? null;
                        log_message('debug', 'getUsersForms: ICS formDetails (' . $task['ics_id_fk'] . '): ' . json_encode($formDetails));
                        log_message('debug', 'getUsersForms: ICS documentId: ' . $documentId);
                    }
                    break;
            }

            log_message('debug', 'getUsersForms: Final check for task ' . $task['task_id'] . ': documentId=' . ($documentId ?? 'NULL') . ', formDetails=' . ($formDetails ? 'Present' : 'NULL'));
            // Only include the form if its details could be found (i.e., it hasn't been manually deleted from its primary table)
            // and it's associated with a non-deleted task.
            if ($documentId !== null && $formDetails !== null) {
                $sentTo = 'Not yet submitted';
                if ($task['submitted_to']) {
                    $recipient = $this->userModel->getUserFullNameById($task['submitted_to']);
                    $sentTo = $recipient ?: 'Unknown User';
                }

                // Determine the correct URL slug based on the task type
                $urlSlug = '';
                switch ($task['task_type']) {
                    case 'Project Procurement Management':
                        $urlSlug = 'ppmp';
                        break;
                    case 'Purchase Request':
                        $urlSlug = 'pr';
                        break;
                    case 'Annual Procurement Plan':
                        $urlSlug = 'app';
                        break;
                    // Add more cases for other form types here as needed in the future
                    default:
                        $urlSlug = ''; // Fallback for unknown types
                        break;
                }
                
                // Log the task type and determined URL slug for debugging
                log_message('debug', 'getUsersForms: Task Type: ' . $task['task_type'] . ', Determined URL Slug: ' . $urlSlug);

                $forms[] = [
                    'task_id' => $task['task_id'], // Crucial for deletion
                    'type' => $task['task_type'],
                    'document_id' => $documentId,
                    'sent_to' => $sentTo,
                    'created_at' => $task['created_at'],
                    'url_slug' => $urlSlug, // Add the URL slug here
                ];
            }
        }

        // The forms are already sorted by created_at from the taskModel query, so no need for usort again.
        // usort($forms, function ($a, $b) {
        //     return strtotime($b['created_at']) - strtotime($a['created_at']);
        // });

        return $forms;
    }

    // Removed temporary diagnostic method testTaskFetch().

    /**
     * Handles the soft deletion of procurement forms.
     * Expects an AJAX POST request with an array of task_ids to be deleted.
     */
    public function deleteForms(): \CodeIgniter\HTTP\ResponseInterface // Corrected return type hint
    {
        $input = $this->request->getJSON(true);
        $taskIds = $input['task_ids'] ?? [];

        // Basic validation
        if (empty($taskIds) || !is_array($taskIds)) {
            log_message('debug', 'deleteForms: No or invalid task IDs received: ' . json_encode($taskIds));
            return $this->response->setJSON(['status' => 'error', 'message' => 'No forms selected for deletion.']);
        }

        log_message('debug', 'deleteForms: Received task IDs for deletion: ' . json_encode($taskIds));

        $db = \Config\Database::connect();
        $db->transStart();

        try {
            // Use whereIn for batch deletion to ensure a WHERE clause is always present
            // This prevents the "Deletes are not allowed unless they contain a 'where' or 'like' clause" error
            if (!empty($taskIds)) {
                log_message('debug', 'deleteForms: Before delete operation. Task IDs: ' . json_encode($taskIds));
                
                // Manually update the 'is_deleted' column to 1 for soft deletion
                // This bypasses CodeIgniter's problematic automatic soft-delete update behavior for TINYINT
                $this->taskModel->whereIn('task_id', $taskIds)->set('is_deleted', 1)->update();

                // Get and log affected rows after the delete operation
                $affectedRows = $this->taskModel->db()->affectedRows();
                log_message('debug', 'deleteForms: After delete operation. Affected Rows: ' . $affectedRows);

                log_message('debug', 'deleteForms: Soft delete query executed (status unknown at this point).');
            }

            $db->transComplete(); // This attempts to commit or rollback

            // Log transaction status explicitly after transComplete()
            log_message('debug', 'deleteForms: Transaction complete. Status: ' . ($db->transStatus() ? 'SUCCESS' : 'FAILED'));

            if ($db->transStatus() === false) {
                // Transaction failed
                return $this->response->setJSON(['status' => 'error', 'message' => 'Database transaction failed.']);
            }

            return $this->response->setJSON(['status' => 'success', 'message' => 'Selected forms soft-deleted successfully.']);

        } catch (\Exception $e) {
            $db->transRollback();
            // Log the error for debugging
            log_message('error', 'Error during soft delete: {exception}', ['exception' => $e]);
            return $this->response->setJSON(['status' => 'error', 'message' => 'An error occurred during deletion. Please try again.']);
        }
    }
} 