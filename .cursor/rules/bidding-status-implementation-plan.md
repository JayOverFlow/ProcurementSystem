# Bidding Status Implementation Plan

## Objective:
Enable Supply Officers to view a list of approved PRs, save individual item bidding statuses, and conditionally submit a PR to the Head of Procurement once all its items are successfully bid.

## Important Notes and Rules:
*   **View File Location:** Store the view files for Supply user roles in `step_system/app/Views/user-pages/supply/`.
*   **Controller Location:** Create the Bidding Status Controller directly inside `step_system/app/Controllers/`, not within a subdirectory (e.g., `step_system/app/Controllers/BiddingController.php`).
*   **Unit Testing & Incremental Development:** Let's implement features bit by bit to allow for unit testing and ensure a working feature or function before proceeding to another implementation. This will help in error/debugging reduction.

## I. Database Schema (Prerequisites - as previously stated):

*   **`pr_items_tbl`**: Must include a `bidding_status` column (e.g., `VARCHAR(50)` or `ENUM('pending', 'successful', 'unsuccessful')`) with a default value of 'pending'.

## II. Backend (CodeIgniter 4) Implementation Plan:

### 1. Routing (`step_system/app/Config/Routes.php`):
*   **List Approved PRs for Bidding:**
    *   `$routes->get('supply/pr-for-bidding', 'BiddingController::listPrsForBidding', ['filter' => 'supplyOfficerAuth']);`
    *   This route will display the main table of approved PRs awaiting bidding status updates.
*   **Update Bidding Status Form:**
    *   `$routes->get('supply/pr/bidding-status-form/(:num)', 'BiddingController::displayBiddingStatusForm/$1', ['filter' => 'supplyOfficerAuth']);`
    *   This route will load the form to update bidding statuses for a specific PR.
*   **Process Bidding Status Save:**
    *   `$routes->post('supply/pr/save-bidding-status', 'BiddingController::saveBiddingStatus', ['filter' => 'supplyOfficerAuth']);`
    *   This route will handle the form submission for saving item bidding statuses.
*   **Process Bidding Status Submit:**
    *   `$routes->post('supply/pr/submit-bidding-to-procurement-head', 'BiddingController::submitBiddingToProcurementHead', ['filter' => 'supplyOfficerAuth']);`
    *   This route will handle the form submission for submitting the PR to the Procurement Head.
*   **View PR Details (Existing or New):**
    *   Ensure an existing route like `$routes->get('pr/preview/(:num)', 'PrController::preview/$1');` is available, which will open the full PR details in a new tab. If not, this needs to be created, likely in `PrController.php`.

### 2. Controller (`step_system/app/Controllers/BiddingController.php` - New File):

*   **`listPrsForBidding()` method:**
    *   **Purpose:** Fetch and display a list of PRs that are approved and awaiting bidding status updates.
    *   **Logic:**
        *   Instantiate `PrModel`.
        *   Query `pr_tbl` to get all PRs where `pr_status` is 'Approved' or 'Bidding In Progress'.
        *   Pass the fetched PR data to a new view file (e.g., `user-pages/supply/pr_bidding_list.php`).

*   **`displayBiddingStatusForm(int $prId)` method:**
    *   **Purpose:** Display the form for a specific PR, showing item details as text and providing a dropdown for bidding status.
    *   **Logic:**
        *   Instantiate `PrModel` and `PrItemModel`.
        *   Fetch PR details from `pr_tbl` for `$prId`.
        *   Fetch all associated items from `pr_items_tbl`, including their `bidding_status`.
        *   **NEW:** Determine `isReadOnlyForm`: If the PR's overall `pr_status` indicates bidding is completed (e.g., 'Bidding Completed' or 'Ready for PO Creation'), set this flag to `true`. This will disable the "Save" and "Submit" buttons entirely.
        *   **NEW:** Calculate `all_items_successful`: A boolean flag indicating if *every* item in the fetched PR items has `bidding_status` set to 'successful'. This will be passed to the view to control the "Submit" button's initial `disabled` state.
        *   Implement access control: Verify the user's role and PR status.
        *   Pass PR details, items, `isReadOnlyForm`, and `all_items_successful` to a new view file (e.g., `user-pages/supply/bidding_status_form.php`).

*   **`saveBiddingStatus()` method (Handles "Save" button):**
    *   **Purpose:** Update the `bidding_status` of individual PR items.
    *   **Logic:**
        *   Retrieve `pr_id` and an array of submitted item statuses from POST data.
        *   Start a database transaction.
        *   Perform server-side validation on inputs (e.g., `pr_id` is valid, each `bidding_status` is 'successful' or 'unsuccessful').
        *   Iterate through the submitted item statuses and update the `bidding_status` column for each corresponding `pr_item_id` in `pr_items_tbl`.
        *   **PR Status Update:** If the PR's `pr_status` is currently 'Approved', update it to 'Bidding In Progress' in `pr_tbl`. This ensures the PR is marked as being actively worked on.
        *   Commit or rollback the transaction.
        *   Set a session flash message (success or error).
        *   Redirect the user back to the same `bidding-status-form` page for the `pr_id` to reflect changes and update button states (`redirect()->to('supply/pr/bidding-status-form/' . $prId)->with('success', 'Bidding statuses saved successfully.');`).

*   **`submitBiddingToProcurementHead()` method (Handles "Submit" button):**
    *   **Purpose:** Finalize the bidding process for a PR and assign the next task to the Head of Procurement.
    *   **Logic:**
        *   Retrieve `pr_id` from POST data.
        *   Start a database transaction.
        *   **Critical Validation:** Use `PrItemModel::areAllItemsSuccessful($prId)` to *server-side verify* that all items in the PR have a 'successful' bidding status. If not, rollback the transaction, set an error flash message, and redirect back. This prevents submission if conditions aren't met.
        *   **PR Status Update:** Update `pr_tbl.pr_status` to 'Bidding Completed' or 'Ready for PO Creation'.
        *   **Task Management:**
            *   Locate any existing task in `tasks_tbl` associated with this `pr_id` (e.g., "PR Bidding Status Update") and assigned to the current Supply Officer. Mark it as `completed` and set `is_deleted` to `1` (if applicable for soft deletes).
            *   Get the `user_id` of the "Head of Procurement" using `UserModel::getUsersByRoleName()` or a similar helper.
            *   Create a **NEW** task in `tasks_tbl` assigned to the "Head of Procurement" with `task_type` 'PO Creation', `pr_id_fk` set to the submitted PR's ID, and a clear `task_description` (e.g., "Create Purchase Order for PR # [PR Number] - Bidding Successful").
        *   Commit or rollback the transaction.
        *   Set a session flash message.
        *   Redirect the user to the `supply/pr-for-bidding` list page.

### 3. Models (`step_system/app/Models/PrModel.php`, `step_system/app/Models/PrItemModel.php`, `step_system/app/Models/UserModel.php`, `step_system/app/Models/TaskModel.php`):

*   **`PrModel.php`:**
    *   Add methods to retrieve approved/in-progress PRs and to update `pr_status`.
*   **`PrItemModel.php`:**
    *   Ensure `bidding_status` is in `$allowedFields`.
    *   **NEW:** Add `areAllItemsSuccessful(int $prId)` method:
        ```php
        public function areAllItemsSuccessful(int $prId): bool
        {
            // Count items for the given PR that are NOT 'successful'
            $count = $this->where('pr_id_fk', $prId)
                          ->where('bidding_status !=', 'successful')
                          ->countAllResults();
            return $count === 0; // True if all are 'successful'
        }
        ```
*   **`UserModel.php`:**
    *   Ensure `getUsersByRoleName(string $roleName)` is robust enough to retrieve the `user_id` for 'Head of Procurement'.
*   **`TaskModel.php`:**
    *   Methods for creating and updating/soft-deleting tasks.

## III. Frontend (Bootstrap 5+ & JavaScript) Implementation Plan:

### 1. New View File (`step_system/app/Views/user-pages/supply/pr_bidding_list.php`):
*   Displays a table of PRs.
*   Each row will have "Update" (`site_url('supply/pr/bidding-status-form/' . $pr['pr_id'])`) and "View" (`site_url('pr/preview/' . $pr['pr_id'])` with `target="_blank"`) buttons.
*   Include SweetAlert flash message display.

### 2. New View File (`step_system/app/Views/user-pages/supply/bidding_status_form.php`):
*   **PR Details:** Display key PR info at the top.
*   **Items Table:**
    *   Columns: Item Description, Quantity, Unit, Estimated Cost, Bidding Status.
    *   For each item, display `description`, `quantity`, `unit`, `estimated_cost` as plain text.
    *   The `bidding_status` column will contain the `select` dropdown:
        ```html
        <!-- Inside form loop for each item -->
        <tr>
            <td><?= esc($item['pr_item_description']) ?></td>
            <td><?= esc($item['pr_item_quantity']) ?></td>
            <td><?= esc($item['pr_item_unit']) ?></td>
            <td><?= esc(number_format($item['pr_item_estimated_cost'], 2)) ?></td>
            <td>
                <select class="form-select bidding-status-select" name="items[<?= $item['pr_item_id'] ?>][bidding_status]" <?= $isReadOnlyForm ? 'disabled' : '' ?>>
                    <option value="pending" <?= $item['bidding_status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="successful" <?= $item['bidding_status'] == 'successful' ? 'selected' : '' ?>>Successful</option>
                    <option value="unsuccessful" <?= $item['bidding_status'] == 'unsuccessful' ? 'selected' : '' ?>>Unsuccessful</option>
                </select>
            </td>
        </tr>
        ```
        (Note: `$isReadOnlyForm` variable will be passed from the controller, similar to other forms, to disable inputs if the PR is in a final state for bidding).
*   **Action Buttons:**
    *   `<button type="submit" class="btn btn-primary" id="saveBiddingBtn" <?= $isReadOnlyForm ? 'disabled' : '' ?>>Save Bidding Status</button>`
    *   `<button type="button" class="btn btn-success ms-2" id="submitBiddingBtn" <?= ($isReadOnlyForm || !$all_items_successful) ? 'disabled' : '' ?>>Submit to Procurement Head</button>`
    *   Add a conditional alert at the top of the form if `$isReadOnlyForm` is true.
*   SweetAlert flash message display script.

### 3. New JavaScript File (`step_system/public/assets/js/apps/sup-bidding.js`):
*   **`checkAndToggleSubmitButton()` function:**
    *   This function will be called on `DOMContentLoaded` and whenever a `bidding-status-select` dropdown changes.
    *   It will iterate through all elements with the class `bidding-status-select`.
    *   It will determine if *all* selected values are 'successful'.
    *   If `true`, enable `#submitBiddingBtn`. If `false`, disable it.
    *   Ensure this function also respects the `$isReadOnlyForm` state, so if the form is read-only, the submit button remains disabled regardless of individual item statuses.
*   **"Save" Button Confirmation:**
    *   Attach `submit` event listener to the form containing `#saveBiddingBtn`.
    *   Trigger a SweetAlert confirmation: "Are you sure you want to save these bidding statuses?".
    *   If confirmed, allow form submission (to `saveBiddingStatus`).
*   **"Submit" Button Confirmation (AJAX):**
    *   Attach `click` event listener to `#submitBiddingBtn`.
    *   Trigger a SweetAlert confirmation: "Are you sure you want to submit this PR to the Procurement Head? This action cannot be undone."
    *   If confirmed, collect the `pr_id` (e.g., from a hidden input or `data-pr-id` attribute on the button).
    *   Make an AJAX POST request to `supply/pr/submit-bidding-to-procurement-head` with the `pr_id`.
    *   On success, display SweetAlert success and redirect to `supply/pr-for-bidding`.
    *   On error, display SweetAlert error.