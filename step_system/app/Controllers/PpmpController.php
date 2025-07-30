<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PpmpModel;
use App\Models\PpmpItemModel;
use App\Models\TaskModel;
use App\Models\UserModel;
use App\Models\DepartmentModel;

class PpmpController extends BaseController
{
    protected $departmentModel;
    protected $userModel;
    protected $ppmpModel;
    protected $PpmpItemModel;
    protected $taskModel;

    public function __construct() {
        $this->departmentModel = new DepartmentModel();
        $this->userModel = new UserModel();
        $this->ppmpModel = new PpmpModel();
        $this->ppmpItemModel = new PpmpItemModel();
        $this->taskModel = new TaskModel();
    }

    public function index($ppmpId = null)
    {
        $userData = $this->loadUserSession();
        $departments = $this->departmentModel->getAllDepartments();
        $users = $this->userModel->getAllUsers();

        $data = [
            'user_data' => $userData,
            'departments' => $departments,
            'users' => $users,
            'ppmp' => null, // Will hold the PPMP main data if editing an existing form
            'ppmp_items' => [] // Will hold the PPMP items data if editing an existing form
        ];

        // If a ppmpId is provided in the URL, fetch the existing PPMP data
        if ($ppmpId) {
            $ppmp = $this->ppmpModel->find($ppmpId);
            if ($ppmp) {
                // If PPMP found, fetch its associated items
                $ppmpItems = $this->ppmpItemModel->where('ppmp_id_fk', $ppmpId)->findAll();
                // Populate the data array with existing PPMP and its items
                $data['ppmp'] = $ppmp;
                $data['ppmp_items'] = $ppmpItems;
            }
        }

        $role = $userData['gen_role'] ?? null;

        switch ($role) {
            case 'Director':
                return view('user-pages/director/dir-ppmp', $data);
            case 'Planning Officer':
                return view('user-pages/planning/plan-ppmp', $data);
            case 'Head':
                return view('user-pages/head/head-ppmp', $data);
            case 'Faculty': // = Section Head
                return view('user-pages/faculty/fac-ppmp', $data);
            case 'Procurement':
                return view('user-pages/procurement/pro-ppmp', $data);
            case 'Supply':
                return view('user-pages/supply/sup-ppmp', $data);
            default:
                return view('user-pages/unassigned/unassigned-ppmp', $data);
        }
    }

    public function save()
    {
        $userData = $this->loadUserSession();
        $db = \Config\Database::connect();

        $ppmpId = $this->request->getPost('ppmp_id'); // Get ppmp_id from hidden input

        // Validation rules for all required fields
        $validationRules = [
            'ppmp_office_fk' => [
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'Office is required.',
                    'greater_than' => 'Please select a valid office.'
                ]
            ],
            'ppmp_period_covered' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Period covered is required.',
                    'min_length' => 'Period covered must be at least 4 characters.'
                ]
            ],
            'ppmp_total_budget_allocated' => [
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Total budget allocated is required.',
                    'numeric' => 'Total budget allocated must be a valid number.',
                    'greater_than' => 'Total budget allocated must be greater than 0.'
                ]
            ],
            'ppmp_total_proposed_budget' => [
                'rules' => 'required|numeric|greater_than[0]',
                'errors' => [
                    'required' => 'Total proposed budget is required.',
                    'numeric' => 'Total proposed budget must be a valid number.',
                    'greater_than' => 'Total proposed budget must be greater than 0.'
                ]
            ],
            'ppmp_prepared_by_position' => [
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required' => 'Prepared by position is required.',
                    'min_length' => 'Position must be at least 2 characters.'
                ]
            ],
            'ppmp_prepared_by_name' => [
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'Prepared by personnel is required.',
                    'greater_than' => 'Please select a valid personnel.'
                ]
            ],
            'ppmp_recommended_by_position' => [
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required' => 'Recommended by position is required.',
                    'min_length' => 'Position must be at least 2 characters.'
                ]
            ],
            'ppmp_recommended_by_name' => [
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'Recommended by personnel is required.',
                    'greater_than' => 'Please select a valid personnel.'
                ]
            ],
            'ppmp_evaluated_by_position' => [
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required' => 'Evaluated by position is required.',
                    'min_length' => 'Position must be at least 2 characters.'
                ]
            ],
            'ppmp_evaluated_by_name' => [
                'rules' => 'required|greater_than[0]',
                'errors' => [
                    'required' => 'Evaluated by personnel is required.',
                    'greater_than' => 'Please select a valid personnel.'
                ]
            ]
        ];

        // Validate the form data
        if (!$this->validate($validationRules)) {
            $errors = $this->validator->getErrors();
        } else {
            $errors = [];
        }
        
        // Validate items - ensure at least one item in either MOOE or CO is provided
        $mooeItems = $this->request->getPost('items') ?? [];
        $coItems = $this->request->getPost('items_co') ?? [];
        
        // Filter out empty items (items that don't have required fields filled)
        $validMooeItems = array_filter($mooeItems, function($item) {
            return !empty($item['code']) && !empty($item['gen_desc']);
        });
        
        $validCoItems = array_filter($coItems, function($item) {
            return !empty($item['code']) && !empty($item['gen_desc']);
        });
        
        // Check if at least one row in either MOOE or CO is filled out
        if (empty($validMooeItems) && empty($validCoItems)) {
            $errors['items'] = 'No data was entered';
        } else {
            // Validate each valid item
            $allValidItems = array_merge($validMooeItems, $validCoItems);
            foreach ($allValidItems as $index => $item) {
                if (empty($item['code'])) {
                    $errors['items'] = 'All items must have a code.';
                    break;
                }
                if (empty($item['gen_desc'])) {
                    $errors['items'] = 'All items must have a general description.';
                    break;
                }
                // Quantity/size is now optional - no validation required
                
                if (empty($item['est_budget'])) {
                    $errors['items'] = 'All items must have an estimated budget.';
                    break;
                }
                // Check if at least one month is selected
                $months = $item['month'] ?? [];
                if (empty($months)) {
                    $errors['items'] = 'All items must have at least one month selected.';
                    break;
                }
            }
        }
        
        // If there are any validation errors, redirect back
        if (!empty($errors)) {
            return redirect()->back()->withInput()->with('errors', $errors);
        }

        $db->transStart();

        try {
            // 1. Insert into ppmp_tbl
            $ppmpData = [
                'ppmp_office_fk' => $this->request->getPost('ppmp_office_fk'),
                'saved_by_user_id_fk' => $userData['user_id'],
                'ppmp_period_covered' => $this->request->getPost('ppmp_period_covered'),
                'ppmp_date_approved' => $this->request->getPost('ppmp_date_approved'),
                'ppmp_total_budget_allocated' => $this->request->getPost('ppmp_total_budget_allocated'),
                'ppmp_total_proposed_budget' => $this->request->getPost('ppmp_total_proposed_budget'),
                'ppmp_prepared_by_position' => $this->request->getPost('ppmp_prepared_by_position'),
                'ppmp_prepared_by_name' => $this->request->getPost('ppmp_prepared_by_name'),
                'ppmp_recommended_by_position' => $this->request->getPost('ppmp_recommended_by_position'),
                'ppmp_recommended_by_name' => $this->request->getPost('ppmp_recommended_by_name'),
                'ppmp_evaluated_by_position' => $this->request->getPost('ppmp_evaluated_by_position'),
                'ppmp_evaluated_by_name' => $this->request->getPost('ppmp_evaluated_by_name'),
                'ppmp_status' => 'Draft', // Default status
                'ppmp_remarks' => 'PPMP remark'
            ];

            if ($ppmpId) {
                // Update existing PPMP
                $this->ppmpModel->update($ppmpId, $ppmpData);

                // Delete existing items for this PPMP before inserting new ones
                $this->ppmpItemModel->where('ppmp_id_fk', $ppmpId)->delete();
            } else {
                // Insert new PPMP
                $this->ppmpModel->insert($ppmpData);
                $ppmpId = $this->ppmpModel->getInsertID();
            }

            // 2. Prepare and insert/update into ppmp_items_tbl
            $allItems = [];
            $mooeItems = $this->request->getPost('items') ?? [];
            $coItems = $this->request->getPost('items_co') ?? [];
            
            $items = array_merge($mooeItems, $coItems);

            foreach ($items as $item) {
                $months = $item['month'] ?? [];

                $allItems[] = [
                    'ppmp_id_fk' => $ppmpId,
                    'ppmp_item_code' => $item['code'],
                    'ppmp_item_name' => $item['gen_desc'],
                    'ppmp_item_quantity' => $item['qty_size'],
                    'ppmp_item_estimated_budget' => $item['est_budget'],
                    'ppmp_sched_jan' => $months['jan'] ?? 0,
                    'ppmp_sched_feb' => $months['feb'] ?? 0,
                    'ppmp_sched_mar' => $months['mar'] ?? 0,
                    'ppmp_sched_apr' => $months['apr'] ?? 0,
                    'ppmp_sched_may' => $months['may'] ?? 0,
                    'ppmp_sched_jun' => $months['jun'] ?? 0,
                    'ppmp_sched_jul' => $months['jul'] ?? 0,
                    'ppmp_sched_aug' => $months['aug'] ?? 0,
                    'ppmp_sched_sep' => $months['sep'] ?? 0,
                    'ppmp_sched_oct' => $months['oct'] ?? 0,
                    'ppmp_sched_nov' => $months['nov'] ?? 0,
                    'ppmp_sched_dec' => $months['dec'] ?? 0,
                ];
            }

            if (!empty($allItems)) {
                $this->ppmpItemModel->insertBatch($allItems);
            }
            
            // Create/Update task for Planning Officers
            $taskData = [
                'submitted_by' => $userData['user_id'],
                'submitted_to' => null,
                'ppmp_id_fk' => $ppmpId,
                'task_type' => 'Project Procurement Management Plan',
                'task_description' => 'Project Procurement Management Plan has been ' . ($ppmpId ? 'updated' : 'submitted') . ' for your review.',
                'is_deleted' => 0 // Explicitly set is_deleted to 0 for new or updated tasks
            ];

            // Check if a task for this PPMP already exists
            $existingTask = $this->taskModel->where('ppmp_id_fk', $ppmpId)->first();

            if ($existingTask) {
                // When updating an existing task, ensure is_deleted remains 0 unless intended to be restored
                // For now, if it was previously 0, it stays 0. If it was 1 (soft deleted), it will remain 1 unless explicitly changed.
                // We add is_deleted to $taskData above to ensure consistency on update as well.
                $this->taskModel->update($existingTask['task_id'], $taskData);
            } else {
                $this->taskModel->insert($taskData);
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'An error occurred while saving the Project Procurement Management Plan.');
            } else {
                // return redirect()->back()->with('success', 'Your Project Procurement Management Plan has been saved.');
                return redirect()->to('ppmp/create/' . $ppmpId)->with('success', 'Your Project Procurement Management Plan has been saved.');
            }

        } catch (\Exception $e) {
            log_message('error', 'PPMP Saving/Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again.');
        }
    }

    public function preview($ppmpId)
    {
        $ppmpModel = new PpmpModel();
        $ppmpItemModel = new PpmpItemModel();
        $departmentModel = new DepartmentModel;
        $userModel = new UserModel();

        $ppmp = $ppmpModel->find($ppmpId);
        $ppmpItems = $ppmpItemModel->where('ppmp_id_fk', $ppmpId)->findAll();

        $data = [
            'ppmp' => $ppmp,
            'ppmp_items' => $ppmpItems,
            'office' => $departmentModel->getDepartmentNameById($ppmp['ppmp_office_fk']),
            'prepared_by' => $userModel->getUserFullNameById($ppmp['ppmp_prepared_by_name']),
            'recommended_by' => $userModel->getUserFullNameById($ppmp['ppmp_recommended_by_name']),
            'ppmp_prepared_by_position' => $ppmp['ppmp_prepared_by_position'] ?? '',
            'ppmp_recommended_by_position' => $ppmp['ppmp_recommended_by_position'] ?? '',
            'ppmp_evaluated_by_position' => $ppmp['ppmp_evaluated_by_position'] ?? '',
            'evaluated_by' => isset($ppmp['ppmp_evaluated_by_name']) ? $userModel->getUserFullNameById($ppmp['ppmp_evaluated_by_name']) : '',
        ];

        if (empty($data['ppmp'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('PPMP not found');
        }

        return view('preview-pages/ppmp-preview', $data);
    }

    public function submit()
    {
        $db = \Config\Database::connect();
        $ppmpId = $this->request->getPost('ppmp_id');
        $userModel = new UserModel();
        $taskModel = new TaskModel();
        $session = session();

        if (empty($ppmpId)) {
            return redirect()->back()->with('error', 'Invalid Project Procurement Management Plan ID for submission.');
        }

        // Check if PPMP has already been submitted
        $ppmp = $this->ppmpModel->find($ppmpId);
        if ($ppmp && $ppmp['ppmp_status'] !== 'Draft') {
            return redirect()->to('ppmp/create/' . $ppmpId)->with('error', 'This Project Procurement Management Plan has already been submitted.');
        }

        // Get current user's info
        $userGenRole = $session->get('user_gen_role');
        $userId = $session->get('user_id');
        $userDepId = $session->get('user_dep_id');

        // Subordinate roles that need Head approval first
        $subordinateRoles = ['Faculty', null, ''];

        $db->transStart();

        try {
            if (in_array($userGenRole, $subordinateRoles)) {
                // === WORKFLOW FOR SUBORDINATES (e.g., Faculty) ===
                $userDetails = $userModel->getUserDetailsById($userId);
                $userDepId = $userDetails['dep_id'] ?? null;
                $headId = $userModel->getHeadByDepId($userDepId);

                if (empty($headId)) {
                    return redirect()->back()->with('error', 'Cannot submit: Your Department Head is not found in the system.');
                }

                // Update the original task to be submitted to the Head
                $originalTask = $taskModel->withDeleted()->where('ppmp_id_fk', $ppmpId)->where('is_deleted', 0)->first();
                if ($originalTask) {
                    $taskModel->update($originalTask['task_id'], [
                        'submitted_to' => $headId,
                        'task_description' => 'A new PPMP from ' . $session->get('user_fullname') . ' requires your approval.'
                    ]);
                } else {
                    return redirect()->back()->with('error', 'Cannot find the original task to submit.');
                }

                // Update PPMP status to reflect it's waiting for Head approval
                                $this->ppmpModel->update($ppmpId, ['ppmp_status' => 'Pending']);

                $successMessage = 'Project Procurement Management Plan successfully submitted to your Department Head for review.';
            } else {
                // === ORIGINAL WORKFLOW FOR HEADS AND OTHER ROLES ===
                $planningOfficers = $userModel->getUsersByGenRole('Planning Officer');

                if (empty($planningOfficers)) {
                    return redirect()->back()->with('error', 'Cannot submit: No Planning Officer found in the system.');
                }

                // Update the original task for the first planning officer
                $firstOfficerId = $planningOfficers[0]; // Get the first Planning Officer ID
                $originalTask = $taskModel->withDeleted()->where('ppmp_id_fk', $ppmpId)->where('is_deleted', 0)->first();

                if ($originalTask) {
                    $taskModel->update($originalTask['task_id'], [
                        'submitted_to' => $firstOfficerId,
                        'task_description' => 'A new Project Procurement Management Plan has been submitted for your review.'
                    ]);
                } else {
                    return redirect()->back()->with('error', 'Cannot find the original task to submit.');
                }

                // Create new tasks for other planning officers (if any)
                for ($i = 1; $i < count($planningOfficers); $i++) {
                    $taskModel->insert([
                        'ppmp_id_fk' => $ppmpId,
                        'task_name' => 'Review PPMP',
                        'task_description' => 'A new Project Procurement Management Plan has been submitted for your review.',
                        'submitted_by' => $userId,
                        'submitted_to' => $planningOfficers[$i],
                        'created_at' => date('Y-m-d H:i:s'),
                        'is_deleted' => 0
                    ]);
                }

                // Update PPMP status to 'Submitted'
                                $this->ppmpModel->update($ppmpId, ['ppmp_status' => 'Pending']);

                $successMessage = 'Project Procurement Management Plan successfully submitted to the Planning Officer.';
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                return redirect()->back()->with('error', 'Failed to submit Project Procurement Management Plan due to a database error.');
            }

            return redirect()->to('ppmp/create/' . $ppmpId)->with('success', $successMessage);

        } catch (\Exception $e) {
            log_message('error', 'PPMP Submission Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred during submission.');
        }
    }

    public function approve()
    {
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $ppmpId = $this->request->getJSON()->ppmp_id;
            $session = session();
            $userId = $session->get('user_id');
            $userGenRole = $session->get('user_gen_role');

            if ($userGenRole === 'Planning Officer') {
                // === FINAL APPROVAL BY PLANNING OFFICER ===

                // 1. Update PPMP status to 'Approved'
                $this->ppmpModel->update($ppmpId, ['ppmp_status' => 'Approved']);

                // Task is no longer soft-deleted. The 'Approved' ppmp_status will be used to control UI state.

            } else {
                // === APPROVAL BY HEAD, FORWARD TO PLANNING ===

                // 1. Update PPMP status to 'Approved' to signify Head's action is complete
                $this->ppmpModel->update($ppmpId, ['ppmp_status' => 'Approved']);

                // 2. Find the task submitted to the current user (Head)
                $task = $this->taskModel->where('ppmp_id_fk', $ppmpId)
                                        ->where('submitted_to', $userId)
                                        ->first();

                if (!$task) {
                    throw new \Exception('Task not found for this PPMP and user.');
                }

                // 3. Find Planning Officers
                $planningOfficers = $this->userModel->getUsersByGenRole('Planning Officer');
                if (empty($planningOfficers)) {
                    throw new \Exception('No Planning Officer found in the system.');
                }

                // 4. Re-assign the task to the first Planning Officer
                $firstOfficerId = array_shift($planningOfficers);
                $this->taskModel->update($task['task_id'], [
                    'submitted_to' => $firstOfficerId,
                    'task_description' => 'A PPMP approved by the Department Head requires your review.'
                ]);

                // 5. Create new tasks for other planning officers
                foreach ($planningOfficers as $officerId) {
                    $this->taskModel->insert([
                        'submitted_by' => $task['submitted_by'],
                        'submitted_to' => $officerId,
                        'ppmp_id_fk' => $ppmpId,
                        'task_type' => 'Project Procurement Management Plan',
                        'task_description' => 'A PPMP approved by the Department Head requires your review.'
                    ]);
                }
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                return $this->response->setJSON(['success' => false, 'message' => 'Database transaction failed.']);
            }

            return $this->response->setJSON(['success' => true]);

        } catch (\Exception $e) {
            log_message('error', '[PPMP AppFsubmirove Error] ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'An unexpected error occurred.']);
        }
    }

    public function submitFromHead()
    {
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $ppmpId = $this->request->getJSON()->ppmp_id;
            $taskId = $this->request->getJSON()->task_id;
            $session = session();
            $userId = $session->get('user_id');

            // 1. Find the original task submitted to the Head
            $headTask = $this->taskModel->find($taskId);
            if (!$headTask || $headTask['submitted_to'] != $userId) {
                throw new \Exception('Task not found or not assigned to the current user.');
            }

            // 2. Update the Head's task status to 'Approved'
            // This will be a custom status update, as we are not using the main 'approve' flow.
            // We need a 'task_status' column in 'tasks_tbl' for this.
            // Assuming 'task_status' ENUM('Pending', 'Approved', 'Rejected') exists.
            $this->taskModel->update($taskId, ['task_status' => 'Approved']);

            // 3. Find Planning Officers
            $planningOfficers = $this->userModel->getUsersByGenRole('Planning Officer');
            if (empty($planningOfficers)) {
                throw new \Exception('No Planning Officer found in the system.');
            }

            // 4. Create new task(s) for Planning Officer(s)
            foreach ($planningOfficers as $officerId) {
                $this->taskModel->insert([
                    'submitted_by' => $userId, // The Head is the one submitting to Planning
                    'submitted_to' => $officerId,
                    'ppmp_id_fk' => $ppmpId,
                    'task_type' => 'Project Procurement Management Plan',
                    'task_description' => 'A PPMP from ' . $session->get('user_fullname') . ' has been submitted for your review.',
                    'task_status' => 'Pending' // New task is pending for Planning
                ]);
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                return $this->response->setJSON(['success' => false, 'message' => 'Database transaction failed.']);
            }

            return $this->response->setJSON(['success' => true, 'message' => 'PPMP successfully submitted to Planning.']);

        } catch (\Exception $e) {
            log_message('error', '[PPMP Submit From Head Error] ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'An unexpected error occurred: ' . $e->getMessage()]);
        }
    }

    public function reject()
    {
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            if (!$task) {
                throw new \Exception('Task not found for this PPMP and user.');
            }

            // 3. Re-assign the task back to the original submitter
            $this->taskModel->update($task['task_id'], [
                'submitted_to' => $task['submitted_by'],
                'task_description' => 'Your submitted PPMP has been rejected by the Department Head. Please review and resubmit.'
            ]);

            $db->transComplete();

            if ($db->transStatus() === false) {
                return $this->response->setJSON(['success' => false, 'message' => 'Database transaction failed.']);
            }

            return $this->response->setJSON(['success' => true]);

        } catch (\Exception $e) {
            log_message('error', '[PPMP Reject Error] ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'An unexpected error occurred.']);
        }
    }

    public function submitToPlanning()
    {
        $db = \Config\Database::connect();
        $db->transStart();

        try {
            $ppmpId = $this->request->getJSON()->ppmp_id;
            $session = session();
            $userId = $session->get('user_id');

            // 1. Update PPMP status to 'Submitted'
                            $this->ppmpModel->update($ppmpId, ['ppmp_status' => 'Pending']);

            // 2. Find the task assigned to the current user (Head)
            $task = $this->taskModel->where('ppmp_id_fk', $ppmpId)
                                    ->where('submitted_to', $userId)
                                    ->first();

            if (!$task) {
                throw new \Exception('Task not found for this PPMP and user.');
            }

            // 3. Find Planning Officers
            $planningOfficers = $this->userModel->getUsersByGenRole('Planning Officer');
            if (empty($planningOfficers)) {
                throw new \Exception('No Planning Officer found in the system.');
            }

            // 4. Re-assign the task to the first Planning Officer
            $firstOfficerId = array_shift($planningOfficers);
            $this->taskModel->update($task['task_id'], [
                'submitted_to' => $firstOfficerId,
                'task_description' => 'A new PPMP from ' . $session->get('user_fullname') . ' has been submitted for your review.'
            ]);

            // 5. Create new tasks for other planning officers
            foreach ($planningOfficers as $officerId) {
                $this->taskModel->insert([
                    'submitted_by' => $task['submitted_by'], // Keep the original submitter
                    'submitted_to' => $officerId,
                    'ppmp_id_fk' => $ppmpId,
                    'task_type' => 'Project Procurement Management Plan',
                    'task_description' => 'A new PPMP from ' . $session->get('user_fullname') . ' has been submitted for your review.'
                ]);
            }

            $db->transComplete();

            if ($db->transStatus() === false) {
                 return $this->response->setJSON(['success' => false, 'message' => 'Database transaction failed.']);
            }

            return $this->response->setJSON(['success' => true]);

        } catch (\Exception $e) {
            log_message('error', '[PPMP Submit to Planning Error] ' . $e->getMessage());
            return $this->response->setJSON(['success' => false, 'message' => 'An unexpected error occurred.']);
        }
    }
}