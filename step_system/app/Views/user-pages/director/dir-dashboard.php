<?= $this->extend('user-pages/director/layout/dir-base-layout') ?>

<?= $this->section('title') ?>
    <title>TUP STEP | Director Dashboard</title>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
    <link href="<?= base_url('assets/src/plugins/src/apex/apexcharts.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/src/assets/css/light/dashboard/dash_1.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/src/assets/css/dark/dashboard/dash_1.css'); ?>" rel="stylesheet" type="text/css" />

<!-- For Data Tables -->
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/src/table/datatable/datatables.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/dt-global_style.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/light/table/datatable/custom_dt_custom.css'); ?>">

<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/dt-global_style.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/src/plugins/css/dark/table/datatable/custom_dt_custom.css'); ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row just-content-evenly h-100 align-items-stretch">
    <!-- Stepper -->
    <div class="col-xxl-3 col-lg-3 col-md-12 col-sm-12 col-12 d-flex flex-column">
        <div class="widget widget-activity-five h-100 d-flex flex-column">
            <div class="widget-heading ms-3 pb-0">
                <h4 class="text-center fw-bold" style="color: #8D0404">Procurement Status</h4>
            </div>
            <div class="widget-content">
                <div class="w-shadow-top"></div>
                <div class="mt-container mx-auto h-100">
                    <div class="timeline-line" id="stepper-timeline">
                        <!-- Stepper items will be dynamically loaded here -->
                    </div>                                    
                </div>
                <div class="w-shadow-bottom"></div>
            </div>
        </div>
    </div>
    <!-- Right Side Container: Cards (Row 1) + Data Table (Row 2) -->
    <?= $this->include('general-pages/head-dashboard') ?>

</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/src/plugins/src/apex/apexcharts.min.js') ?>"></script>
<script src="<?= base_url('assets/src/assets/js/dashboard/dash_1.js') ?>"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url('assets/js/dashboard/head-dashboard.js'); ?>"></script>

<!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url('assets/src/plugins/src/table/datatable/datatables.js') ?>"></script>

<script>

    c3 = $('#style-3').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 10
    });

    multiCheck(c3);
// Function to fetch and render stepper status
function fetchAndRenderStepper(departmentId) {
        fetch(`<?= base_url('stepper/stepper-status/') ?>${departmentId}`)
            .then(response => response.json())
            .then(data => {
                const timeline = document.getElementById('stepper-timeline');
                timeline.innerHTML = ''; // Clear existing content

                data.forEach(phase => {
                    const itemTimeline = document.createElement('div');
                    itemTimeline.classList.add('item-timeline', 'timeline-new');

                    itemTimeline.innerHTML = `
                        <div class="t-dot">
                            <div class="${phase.icon_class}">${phase.icon}</div>
                        </div>
                        <div class="t-content">
                            <div class="t-uppercontent">
                                <h5>${phase.display_name} <a href="#" class="${phase.text_color} description-link" data-bs-toggle="modal" data-bs-target="#stepperDetailModal" data-phase="${phase.phase}" data-status="${phase.status}" data-remark="${phase.remark}" data-updated-at="${phase.updated_at}">Description</a></h5>
                            </div>
                            <p>${(phase.status === 'completed' || phase.status === 'rejected') && phase.updated_at ? new Date(phase.updated_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) : ''}</p>
                        </div>
                    `;
                    timeline.appendChild(itemTimeline);
                });

                // --- Customizing Stepper Phase Content and Date Display ---
                // If you want to change the content or title of the phase and the date display:
                // 1.  **Changing the main phase title (e.g., "PPMP")**: This text comes directly from `phase.phase`.
                //     This `phase.phase` value is retrieved from the `stepper_phase` column in your `stepper_tbl`
                //     and is defined in the `$stepperPhases` array within `StepperModel.php`.
                //     - To change the display text for a phase (e.g., show "Project Management Plan" instead of "PPMP"):
                //       You would modify the `switch` statement in `StepperController.php` within the `getStepperStatus` method.
                //       You could add a new property to the `$formattedResult` array, like `display_phase_name`, and assign your desired full name there.
                //       Then, in this HTML, use `${phase.display_phase_name}` instead of `${phase.phase}`.
                //       Example in StepperController.php:
                //       ```php
                //       case 'PPMP':
                //           $displayPhaseName = 'Project Procurement Management Plan';
                //           break;
                //       // ... other cases
                //       $formattedResult[] = [
                //           'phase' => $phase['stepper_phase'],
                //           'display_phase_name' => $displayPhaseName, // New field
                //           // ... other properties
                //       ];
                //       ```
                //       Then in HTML: `<h5>${phase.display_phase_name} ...`
                // 2.  **Changing the "Description" link text**: This is static text in the `<a>` tag.
                //     - To change "Description" to something else (e.g., "View Details" or "Status Info"):
                //       Simply edit the text `Description` within the `<a>` tag above:
                //       `...<a href="#" ...>View Details</a>...`
                // 3.  **Changing the content *under* the phase title (currently the "Description" link and date)**:
                //     This entire block is part of the `itemTimeline.innerHTML` template literal.
                //     You can restructure or add more HTML elements within the `t-uppercontent` div or below it.
                //     Example: To add a short dynamic summary instead of just the "Description" link and date:
                //     ```javascript
                //     itemTimeline.innerHTML = `
                //         ...
                //         <div class="t-content">
                //             <div class="t-uppercontent">
                //                 <h5>${phase.phase} <a href="#" ...>Description</a></h5>
                //                 <p class="short-summary">${phase.remark}</p> <!-- Add a summary here -->
                //             </div>
                //             <p>${phase.updated_at ? new Date(phase.updated_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) : 'N/A'}</p>
                //         </div>
                //     `;
                //     ```
                // 4.  **Changing the Date Display Format**: The date is formatted using JavaScript's `toLocaleDateString()` method.
                //     - To change the format (e.g., just year-month-day, or with time):
                //       Modify the `toLocaleDateString()` options or use `toLocaleString()`.
                //       Current: `new Date(phase.updated_at).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })`
                //       Example (YYYY-MM-DD): `new Date(phase.updated_at).toISOString().slice(0,10)`
                //       Example (with time): `new Date(phase.updated_at).toLocaleString('en-US', { year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' })`
                // ----------------------------------------------------------------------------------------------------------

                document.querySelectorAll('.description-link').forEach(link => {
                    link.addEventListener('click', function() {
                        const phase = this.getAttribute('data-phase');
                        const status = this.getAttribute('data-status');
                        const remark = this.getAttribute('data-remark');
                        const updatedAt = this.getAttribute('data-updated-at');

                        // --- UI Improvement 1: Changing from Modal to Toast/SweetAlert ---
                        // If you want to change from a Bootstrap modal to a different component (like a toast or SweetAlert):
                        // 1. Remove the `data-bs-toggle="modal"` and `data-bs-target="#stepperDetailModal"` attributes from the `<a>` tag above.
                        // 2. Instead of populating the modal elements (modalStepperPhase, modalStepperStatus, etc.),
                        //    call the function for your desired component here.
                        //    - For a Bootstrap Toast: Manually create or clone a toast element, populate its content (phase, status, remark), and show it.
                        //      You'll need to ensure toast CSS/JS is loaded and positioned correctly.
                        //    - For SweetAlert2: Include the SweetAlert2 library. Then, you can use `Swal.fire({ title: phase, html: `Status: ${status}<br>Remark: ${remark}<br>Last Updated: ${updatedAt}` });`
                        //    - For other custom notifications: Implement your custom notification logic here to display the collected `phase`, `status`, `remark`, and `updatedAt`.
                        // 3. The `<div class="modal fade" ...>` block at the end of this file (outside this script tag) would then be removed or commented out.
                        // ----------------------------------------------------------------

                        document.getElementById('modalStepperPhase').textContent = phase;
                        document.getElementById('modalStepperStatus').textContent = `Status: ${status}`;
                        document.getElementById('modalStepperRemark').textContent = `Remark: ${remark}`;
                        document.getElementById('modalStepperUpdatedAt').textContent = `Last Updated: ${updatedAt ? new Date(updatedAt).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' }) : 'N/A'}`;
                    });
                });
            })
            .catch(error => console.error('Error fetching stepper status:', error));
    }

    // Call the function with a placeholder department ID (e.g., 1 for testing)
    // You need to replace '1' with the actual department ID of the logged-in user.
    // This ID should be passed from the backend PHP to the JavaScript.
    // For example: fetchAndRenderStepper(<?= $user_department_id ?>);
    // For now, using a static ID for demonstration purposes.

    // Assuming you have the user's department ID available in a PHP variable, e.g., $user_department_id
    // Replace `null` with the actual PHP variable that holds the department ID.
    const userDepartmentId = <?php echo esc($user_department_id ?? 'null'); ?>;

    if (userDepartmentId !== null) {
        fetchAndRenderStepper(userDepartmentId);
    } else {
        console.error('User department ID is not available.');
    }
</script>

<!-- Stepper Detail Modal -->
<!-- --- UI Improvement 2: Changing Modal Colors --- -->
<!-- If you want to change the color of the modal components (header, body, footer):
1.  **Using Bootstrap Utility Classes**: For basic changes, you can add Bootstrap background color classes (e.g., `bg-primary`, `bg-info`, `bg-danger`, `bg-warning`, `bg-success`, `bg-dark`, `bg-light`) directly to `.modal-header`, `.modal-body`, or `.modal-footer`.
    Example: `<div class="modal-header bg-primary">`
2.  **Using Custom CSS**: For more granular control or custom colors:
    a.  Open a custom CSS file (e.g., `assets/src/assets/css/light/custom-styles.css` or create a new one).
    b.  Target the specific modal classes and apply your desired `background-color` or `color`.
        Example:
        ```css
        .modal-header {
            background-color: #8D0404; /* Your desired color */
            color: #FFFFFF; /* Text color */
        }
        .modal-body {
            background-color: #F8F9FA; /* Light background for the body */
        }
        /* You can also target text within the modal if needed */
        .modal-title {
            color: #333;
        }
        ```
    c.  Ensure your custom CSS file is linked in the `<head>` section of your layout or specific page after Bootstrap's CSS, so it can override default styles.
3.  **The text color of the 'Description' link**: This is dynamically set by the `phase.text_color` variable coming from the `StepperController`, which assigns Bootstrap text color classes (`text-success`, `text-warning`, `text-danger`, `text-secondary`). If you want to change these specific text colors, you would either:
    a.  Modify the definitions of these Bootstrap utility classes in your custom SCSS/CSS if you're compiling Bootstrap.
    b.  Override them with more specific CSS rules in your custom CSS.
-->
<div class="modal fade" id="stepperDetailModal" tabindex="-1" role="dialog" aria-labelledby="stepperDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalStepperPhase"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <p id="modalStepperStatus"></p>
                <!-- <p id="modalStepperRemark"></p> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- --- UI Improvement 3: Changing Phase Icons Based on Status --- -->
<!-- The icons for each phase are currently generated in the StepperController based on `stepper_status`. -->
<!-- To change them:
1.  **Modify StepperController.php**: Open `step_system/app/Controllers/StepperController.php`.
2.  **Locate the `switch ($status)` block**: Inside the `getStepperStatus` method, you will find a `switch` statement that assigns the `$icon` variable based on the `$status`.
    Example:
    ```php
    switch ($status) {
        case 'completed':
            $icon = '<svg>...check icon...</svg>'; // Current checkmark icon
            break;
        case 'in_progress':
            $icon = '<img src="...clock.svg...">'; // Current clock icon
            break;
        case 'rejected':
            $icon = '<img src="...x.svg...">'; // Current X icon
            break;
        case 'pending':
        default:
            $icon = '<img src="...clock.svg...">'; // Current clock icon for pending
            break;
    }
    ```
3.  **Update Icon HTML**: Replace the SVG or `<img>` tags with your desired icon HTML for each status.
    - You can use different SVG icons (e.g., from Bootstrap Icons, Feather Icons, or Font Awesome) by embedding their SVG code directly.
    - You can use different image assets by updating the `src` attribute of the `<img>` tag.
    - Ensure any new icons are appropriately sized and styled (e.g., using `width="24"`, `height="24"`).
    - You can also change the `iconClass` (e.g., `t-success`, `t-warning`) if you want to apply different background colors or styles to the circle around the icon.
-->

<!-- --- Other Potential UI Improvements --- -->
<!--
1.  **Progress Bar for Stepper**: Add a visual progress bar (e.g., Bootstrap Progress) to indicate the overall completion of the procurement process. You would calculate the percentage of completed phases in the JavaScript and update the progress bar dynamically.
2.  **Clickable Phase Titles**: Make the phase titles themselves clickable (not just the "Description" link) to trigger the modal, if that enhances UX.
3.  **Styling of Stepper Items**: Further customize the look and feel of `item-timeline`, `t-dot`, and `t-content` classes in your CSS files (`assets/src/assets/css/light/dashboard/dash_1.css` or custom CSS) to match your application's theme.
4.  **Dynamic Date Formatting**: Offer more flexible date formatting options for `updated_at` in the JavaScript based on user preferences or locale.
5.  **Hover Effects**: Add subtle hover effects to the stepper items to make them more interactive.
-->

<?= $this->endSection() ?>
