## PO Creation Task Handling Plan for Procurement Officer

### Objective:
When a Procurement Officer views a task of type 'Purchase Order', the modal will display standard task details, a "Create Purchase Order" button (redirecting to a blank PO form), and a preview link to the associated PR. The task will remain 'Pending' until the actual PO is submitted.

## Important Notes and Rules:
*   **View File Location:** Store the view files for Supply user roles in `step_system/app/Views/user-pages/supply/`.
*   **Controller Location:** Create the Bidding Status Controller directly inside `step_system/app/Controllers/`, not within a subdirectory (e.g., `step_system/app/Controllers/BiddingController.php`).
*   **Unit Testing & Incremental Development:** Let's implement features bit by bit to allow for unit testing and ensure a working feature or function before proceeding to another implementation. This will help in error/debugging reduction.

### I. Backend (CodeIgniter 4) - Revised Plan:

1.  **`TaskModel.php` (`getTaskDetails($taskId)` method):**
    *   **Purpose:** Ensure all standard task details (submitted by name, role, email, created at, description) are correctly fetched, along with `pr_id_fk` for 'Purchase Order' tasks.
    *   **Idea:** The existing `getTaskDetails` method already fetches most of the required user and task details. We just need to ensure `pr_id_fk` is explicitly selected. No specific joins for `pr_tbl` columns (like `pr_section`, `pr_no_date`, `pr_requested_by_name`, `pr_department`) are needed for the modal *display* beyond the `pr_id_fk` for the preview link, as per the new requirement for modal consistency.

2.  **`PoController.php`:**
    *   **Purpose:** No new method for `createFromPr` is needed. The existing `index()` method (which typically serves the blank form for `po/create`) will be sufficient.
    *   **Idea:** We **do not** need to modify `PoController` for this specific part of the flow, as it simply needs to render a blank form when `po/create` is accessed.

3.  **Routing (`step_system/app/Config/Routes.php`):**
    *   **No new route is needed.** The existing route for `po/create` is: `$routes->get('po/create', 'PoController::index');`.
    *   Verify that this route does *not* have a `procurementOfficerAuth` filter if it's meant to be generally accessible for PO creation by different roles or if the filter is handled at a higher level (as indicated by "without the procurementOfficerAuth").

---

### II. Frontend (Bootstrap 5+ & JavaScript) - Revised Plan:

1.  **`step_system/app/Views/general-pages/tasks-head.php`:**
    *   No direct changes needed. This template already includes placeholders for standard task details (`modal-fullname`, `modal-email`, `modal-role`, `modal-date`, `modal-description`).

2.  **`step_system/public/assets/js/tasks_page/tasks-head.js` (`openTaskModal(taskId)` function):**
    *   **Purpose:** Control the task modal's content and actions specifically for 'Purchase Order' tasks.
    *   **Idea:**
        *   Within the `fetch('/tasks/details/${taskId}')` `.then(data => { ... })` block.
        *   **Standard Task Details:** Ensure the `modalFullName.textContent`, `modalEmail.textContent`, `modalRole.textContent`, `modalDate.textContent`, and `modalDescription.textContent` are populated as they are for other task types. (The current implementation already does this).
        *   **Conditional Action Display for 'Purchase Order' tasks:**
            *   Add a specific `if` condition for `data.task_type === 'Purchase Order'`.
            *   **Inside this `if` block:**
                *   Hide the generic "REJECT" and "APPROVE" buttons: `modalActionButtons.style.display = 'block';` (or `inline-flex` if needed for styling) and then dynamically set its content.
                *   Create and append a "Create Purchase Order" button. This button will link directly to the PO creation form.
                    ```javascript
                    modalActionButtons.innerHTML = `<button type="button" id="create-po-btn" class="btn btn-sm btn-success" data-pr-id="${data.pr_id_fk}">Create Purchase Order</button>`;
                    modalStatusDisplay.style.display = 'none'; // Ensure no status badge shows
                    ```
                *   Set the `modal-preview-link`:
                    `modalPreviewLink.href = `/pr/preview/${data.pr_id_fk}`;`
                    `modalPreviewLinkText.textContent = 'View submitted Purchase Request';`
                    `modalPreviewLink.style.display = 'inline-flex';`
            *   **`else` block (for other task types):** Retain the existing logic that shows "REJECT" and "APPROVE" buttons and the status badge.
        *   **Event Listener for "Create PO" Button:**
            *   Attach a `click` event listener to `#create-po-btn`. This must be done *after* the button is added to the DOM.
            *   When clicked, perform a direct redirect: `window.location.href = `/po/create`;` (No SweetAlert confirmation needed as per requirement).

3.  **`step_system/app/Views/user-pages/procurement/pro-tasks.php`:**
    *   No direct changes needed to this file, as it already includes the `tasks-head.php` and `tasks-head.js`.

---

### III. Task Status (Clarification):

*   The task in the Procurement Officer's task list (type 'Purchase Order') will explicitly remain 'Pending'.
*   Its status will *only* change (e.g., to 'Completed' or 'Deleted') when the Procurement Officer has successfully filled out and **submitted** the new Purchase Order. This means the `PoController::save()` or `PoController::submit()` method (when a new PO is created that is linked to a PR) will be responsible for updating or soft-deleting this specific task in `tasks_tbl`. This part is a follow-up, not part of this immediate implementation.