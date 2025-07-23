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

        // Fetch PPMP forms saved by the user
        $ppmpForms = $this->ppmpModel->where('saved_by_user_id_fk', $userId)->findAll();
        foreach ($ppmpForms as $form) {
            $task = $this->taskModel->where('ppmp_id_fk', $form['ppmp_id'])->first();
            $sentTo = 'Not yet submitted';
            $createdAt = 'N/A';
            if ($task) {
                if ($task['submitted_to']) {
                    $recipient = $this->userModel->getUserFullNameById($task['submitted_to']);
                    $sentTo = $recipient ?: 'Unknown User';
                }
                $createdAt = $task['created_at'];
            }
            $forms[] = [
                'type' => 'PPMP',
                'document_id' => $form['ppmp_id'],
                'sent_to' => $sentTo,
                'created_at' => $createdAt,
                'task_id' => $task['task_id'] ?? null // Add task_id
            ];
        }

        // Fetch APP forms saved by the user
        $appForms = $this->appModel->where('saved_by_user_id_fk', $userId)->findAll();
        foreach ($appForms as $form) {
            $task = $this->taskModel->where('app_id_fk', $form['app_id'])->first();
            $sentTo = 'Not yet submitted';
            $createdAt = 'N/A';
            if ($task) {
                if ($task['submitted_to']) {
                    $recipient = $this->userModel->getUserFullNameById($task['submitted_to']);
                    $sentTo = $recipient ?: 'Unknown User';
                }
                $createdAt = $task['created_at'];
            }
            $forms[] = [
                'type' => 'APP',
                'document_id' => $form['app_id'],
                'sent_to' => $sentTo,
                'created_at' => $createdAt,
                'task_id' => $task['task_id'] ?? null // Add task_id
            ];
        }

        // Fetch PR forms saved by the user
        $prForms = $this->prModel->where('saved_by_user_id_fk', $userId)->findAll();
        foreach ($prForms as $form) {
            $task = $this->taskModel->where('pr_id_fk', $form['pr_id'])->first();
            $sentTo = 'Not yet submitted';
            $createdAt = 'N/A';
            if ($task) {
                if ($task['submitted_to']) {
                    $recipient = $this->userModel->getUserFullNameById($task['submitted_to']);
                    $sentTo = $recipient ?: 'Unknown User';
                }
                $createdAt = $task['created_at'];
            }
            $forms[] = [
                'type' => 'PR',
                'document_id' => $form['pr_id'],
                'sent_to' => $sentTo,
                'created_at' => $createdAt,
                'task_id' => $task['task_id'] ?? null // Add task_id
            ];
        }

        // Fetch PO forms saved by the user
        $poForms = $this->poModel->where('saved_by_user_id_fk', $userId)->findAll();
        foreach ($poForms as $form) {
            $task = $this->taskModel->where('po_id_fk', $form['po_id'])->first();
            $sentTo = 'Not yet submitted';
            $createdAt = 'N/A';
            if ($task) {
                if ($task['submitted_to']) {
                    $recipient = $this->userModel->getUserFullNameById($task['submitted_to']);
                    $sentTo = $recipient ?: 'Unknown User';
                }
                $createdAt = $task['created_at'];
            }
            $forms[] = [
                'type' => 'PO',
                'document_id' => $form['po_id'],
                'sent_to' => $sentTo,
                'created_at' => $createdAt,
                'task_id' => $task['task_id'] ?? null // Add task_id
            ];
        }

        // Fetch PAR forms saved by the user
        $parForms = $this->parModel->where('saved_by_user_id_fk', $userId)->findAll();
        foreach ($parForms as $form) {
            $task = $this->taskModel->where('par_id_fk', $form['prop_ack_id'])->first();
            $sentTo = 'Not yet submitted';
            $createdAt = 'N/A';
            if ($task) {
                if ($task['submitted_to']) {
                    $recipient = $this->userModel->getUserFullNameById($task['submitted_to']);
                    $sentTo = $recipient ?: 'Unknown User';
                }
                $createdAt = $task['created_at'];
            }
            $forms[] = [
                'type' => 'PAR',
                'document_id' => $form['prop_ack_id'],
                'sent_to' => $sentTo,
                'created_at' => $createdAt,
                'task_id' => $task['task_id'] ?? null // Add task_id
            ];
        }

        // Fetch ICS forms saved by the user
        $icsForms = $this->icsModel->where('saved_by_user_id_fk', $userId)->findAll();
        foreach ($icsForms as $form) {
            $task = $this->taskModel->where('ics_id_fk', $form['invent_custo_id'])->first();
            $sentTo = 'Not yet submitted';
            $createdAt = 'N/A';
            if ($task) {
                if ($task['submitted_to']) {
                    $recipient = $this->userModel->getUserFullNameById($task['submitted_to']);
                    $sentTo = $recipient ?: 'Unknown User';
                }
                $createdAt = $task['created_at'];
            }
            $forms[] = [
                'type' => 'ICS',
                'document_id' => $form['invent_custo_id'],
                'sent_to' => $sentTo,
                'created_at' => $createdAt,
                'task_id' => $task['task_id'] ?? null // Add task_id
            ];
        }

        // Sort forms by created_at in descending order
        usort($forms, function ($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });

        return $forms;
    }

    public function deleteForms()
    {
        $this->response->setHeader('Content-Type', 'application/json');
        if ($this->request->isAJAX() && $this->request->getMethod() === 'post') {
            $taskIds = $this->request->getPost('task_ids');

            if (empty($taskIds)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'No tasks selected for deletion.'
                ]);
            }

            $deletedCount = 0;
            foreach ($taskIds as $taskId) {
                if ($this->taskModel->delete((int)$taskId)) {
                    $deletedCount++;
                }
            }

            if ($deletedCount > 0) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => $deletedCount . ' form(s) soft deleted successfully.'
                ]);
            } else {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'No forms were deleted. They might already be deleted or do not exist.'
                ]);
            }
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid request.'
            ]);
        }
    }
} 