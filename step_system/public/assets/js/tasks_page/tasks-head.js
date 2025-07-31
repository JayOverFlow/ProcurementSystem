document.addEventListener('DOMContentLoaded', function () {
    const taskModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
    
    // Modal fields
    const modalFullName = document.getElementById('modal-fullname');
    const modalEmail = document.getElementById('modal-email');
    const modalRole = document.getElementById('modal-role');
    const modalDate = document.getElementById('modal-date');
    const modalDescription = document.getElementById('modal-description');
    const modalPreviewLink = document.getElementById('modal-preview-link');
    const modalPreviewLinkText = document.getElementById('modal-preview-link-text');
    const approveBtn = document.getElementById('approve-btn');
    const rejectBtn = document.getElementById('reject-btn');
    const modalActionButtons = document.getElementById('modal-action-buttons');
    const modalStatusDisplay = document.getElementById('modal-status-display');

    // Initialize DataTable
    const table = $('#tasks-table').DataTable({
        "dom": "<'table-responsive'tr>" +
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
        "pageLength": 10,
        "order": [],
        "columnDefs": [
            { "orderable": false, "targets": 0 } // Disable ordering on the first column (checkboxes)
        ]
    });

    // Custom search functionality
    $('#custom-search').on('keyup', function() {
        table.search(this.value).draw();
    });

    // Filter by document type
    $('#filter-document-type').on('change', function () {
        const selectedType = $(this).val();
        table.column(2).search(selectedType).draw(); // Column 2 is 'Document Type'
    });

    // Modal functionality
    $('#tasks-table tbody').on('click', '.task-row', function(event) {
        // Prevent modal from opening if a checkbox was clicked
        if (!$(event.target).is('input[type="checkbox"]')) {
            const taskId = $(this).data('taskId');
            openTaskModal(taskId);
        }
    });

    function openTaskModal(taskId) {
        taskModal.show();
        // Store taskId on the button to make it available to the event handler
        approveBtn.setAttribute('data-task-id', taskId);
        rejectBtn.setAttribute('data-task-id', taskId);

        // Show loading state
        modalFullName.textContent = 'Loading...';
        modalEmail.textContent = '';
        modalRole.textContent = '';
        modalDate.textContent = '';
        modalDescription.textContent = '';
        modalPreviewLink.style.display = 'none';
        approveBtn.removeAttribute('data-id');
        approveBtn.removeAttribute('data-task-type');
        rejectBtn.removeAttribute('data-id');
        rejectBtn.removeAttribute('data-task-type');
        modalActionButtons.style.display = 'block';
        modalStatusDisplay.style.display = 'none';

        fetch(`/tasks/details/${taskId}`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                modalFullName.textContent = data.user_fullname;
                modalEmail.textContent = data.user_email;
                modalRole.textContent = data.role_name || 'N/A';

                const date = new Date(data.created_at);
                modalDate.textContent = date.toLocaleString('en-US', { month: 'long', day: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit', hour12: true });

                modalDescription.textContent = data.task_description;

                if (data.task_type === 'Purchase Order Review') {
                    modalActionButtons.innerHTML = `<button type="button" id="reject-btn" class="btn btn-sm warning reject" style="background-color: #7B7B7B; color: #FFFFFF">REJECT</button>
                                                    <button type="button" id="approve-btn" class="btn btn-sm warning approve" style="background-color: #C62742; color: #FFFFFF">Approve</button>`;
                    modalStatusDisplay.style.display = 'none';

                    // Set data attributes for review actions
                    const approveBtn = document.getElementById('approve-btn');
                    const rejectBtn = document.getElementById('reject-btn');
                    approveBtn.setAttribute('data-task-id', taskId);
                    approveBtn.setAttribute('data-task-type', 'po');
                    approveBtn.setAttribute('data-id', data.po_id_fk);
                    rejectBtn.setAttribute('data-task-id', taskId);
                    rejectBtn.setAttribute('data-task-type', 'po');
                    rejectBtn.setAttribute('data-id', data.po_id_fk);

                    // Re-attach event listeners
                    approveBtn.addEventListener('click', handleStatusUpdate);
                    rejectBtn.addEventListener('click', handleStatusUpdate);

                    modalPreviewLink.href = `/po/preview/${data.po_id_fk}`;
                    modalPreviewLinkText.textContent = 'View submitted Purchase Order';
                    modalPreviewLink.style.display = 'inline-flex';

                } else if (data.task_type === 'Purchase Order') {
                    // Hide generic approve/reject buttons and status display
                    modalActionButtons.innerHTML = `<button type="button" id="create-po-btn" class="btn btn-sm btn-danger" data-pr-id="${data.pr_id_fk}">Create Purchase Order</button>`;
                    modalStatusDisplay.style.display = 'none';

                    // Set preview link for PR
                    modalPreviewLink.href = `/pr/preview/${data.pr_id_fk}`;
                    modalPreviewLinkText.textContent = 'View submitted Purchase Request';
                    modalPreviewLink.style.display = 'inline-flex';

                    // Add event listener for the new button
                    document.getElementById('create-po-btn').addEventListener('click', function() {
                        window.location.href = `/po/create`;
                    });

                } else if (data.ppmp_id_fk) {
                    modalPreviewLink.href = `/ppmp/preview/${data.ppmp_id_fk}`;
                    modalPreviewLink.style.display = 'inline-flex';
                    modalPreviewLinkText.textContent = 'View submitted PPMP';
                    approveBtn.setAttribute('data-task-type', 'ppmp');
                    approveBtn.setAttribute('data-id', data.ppmp_id_fk);
                    rejectBtn.setAttribute('data-task-type', 'ppmp');
                    rejectBtn.setAttribute('data-id', data.ppmp_id_fk);
                } else if (data.app_id_fk) {
                    modalPreviewLink.href = `/app/preview/${data.app_id_fk}`;
                    modalPreviewLink.style.display = 'inline-flex';
                    modalPreviewLinkText.textContent = 'View submitted APP';
                    approveBtn.setAttribute('data-task-type', 'app');
                    approveBtn.setAttribute('data-id', data.app_id_fk);
                    rejectBtn.setAttribute('data-task-type', 'app');
                    rejectBtn.setAttribute('data-id', data.app_id_fk);
                } else if (data.pr_id_fk) {
                    modalPreviewLink.href = `/pr/preview/${data.pr_id_fk}`;
                    modalPreviewLink.style.display = 'inline-flex';
                    modalPreviewLinkText.textContent = 'View submitted Purchase Request';
                    approveBtn.setAttribute('data-task-type', 'pr');
                    approveBtn.setAttribute('data-id', data.pr_id_fk);
                    rejectBtn.setAttribute('data-task-type', 'pr');
                    rejectBtn.setAttribute('data-id', data.pr_id_fk);
                } else if (data.po_id_fk) {
                    modalPreviewLink.href = `/po/preview/${data.po_id_fk}`;
                    modalPreviewLink.style.display = 'inline-flex';
                    modalPreviewLinkText.textContent = 'View submitted Purchase Order';
                    approveBtn.setAttribute('data-task-type', 'po');
                    approveBtn.setAttribute('data-id', data.po_id_fk);
                    rejectBtn.setAttribute('data-task-type', 'po');
                    rejectBtn.setAttribute('data-id', data.po_id_fk);
                } else if (data.par_id_fk) {
                    modalPreviewLink.href = `/par/preview/${data.par_id_fk}`;
                    modalPreviewLink.style.display = 'inline-flex';
                    modalPreviewLinkText.textContent = 'View submitted Property Acknowledgement Receipt';
                    approveBtn.setAttribute('data-task-type', 'par');
                    approveBtn.setAttribute('data-id', data.par_id_fk);
                    rejectBtn.setAttribute('data-task-type', 'par');
                    rejectBtn.setAttribute('data-id', data.par_id_fk);
                } else if (data.ics_id_fk) {
                    modalPreviewLink.href = `/ics/preview/${data.ics_id_fk}`;
                    modalPreviewLink.style.display = 'inline-flex';
                    modalPreviewLinkText.textContent = 'View submitted Inventory Custodian Slip';
                    approveBtn.setAttribute('data-task-type', 'ics');
                    approveBtn.setAttribute('data-id', data.ics_id_fk);
                    rejectBtn.setAttribute('data-task-type', 'ics');
                    rejectBtn.setAttribute('data-id', data.ics_id_fk);
                }

                // Set modal buttons and status display
                const userGenRole = document.body.dataset.userGenRole;
                const headRoles = ['Head', 'Director', 'Assistant Director', 'Supply', 'Procurement'];

                if (data.ppmp_id_fk && headRoles.includes(userGenRole)) {
                    approveBtn.textContent = 'Submit';
                    rejectBtn.disabled = true; // As per user request
                } else {
                    approveBtn.textContent = 'Approve';
                    rejectBtn.disabled = false;
                }
                const status = data.ppmp_status || data.app_status || data.pr_status || data.po_status || data.prop_ack_status || data.invent_custo_status;
                if (status === 'Approved' || status === 'Rejected') {
                    modalActionButtons.style.display = 'none';
                    const badgeClass = status === 'Approved' ? 'badge-success' : 'badge-danger';
                    modalStatusDisplay.innerHTML = `<span class="fw-bold badge ${badgeClass}" style="font-size: 1.1rem;">${status}</span>`;
                    modalStatusDisplay.style.display = 'block';
                } else {
                    modalActionButtons.style.display = 'block';
                    modalStatusDisplay.style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                modalFullName.textContent = 'Error loading details.';
            });
    }

    function handleStatusUpdate(event) {
        const id = this.dataset.id; // This is the ppmp_id, app_id, etc.
        const taskId = this.dataset.taskId; // Retrieve the taskId from the button
        const taskType = this.dataset.taskType;
        const isApproved = this.id === 'approve-btn';
        const status = isApproved ? 'Approved' : 'Rejected';
        const confirmButtonColor = isApproved ? '#8ABB2F' : '#DC3545';
        const approveButtonText = document.getElementById('approve-btn').textContent.trim();
        const confirmButtonText = isApproved ? approveButtonText : 'Yes, reject it!';
        
        let documentType, endpoint, payload, actionText;

        switch (taskType) {
            case 'ppmp':
                documentType = 'Project Procurement Management Plan';
                if (approveButtonText === 'Submit' && isApproved) {
                    actionText = 'submit this PPMP to the Planning Officer';
                    endpoint = '/ppmp/submit-from-head'; // New endpoint for Head submission
                    payload = { task_id: taskId, ppmp_id: id }; // Send both task_id and ppmp_id
                } else {
                    actionText = `${status.toLowerCase()} this PPMP`;
                    endpoint = isApproved ? '/ppmp/approve' : '/ppmp/reject';
                    payload = { ppmp_id: id };
                }
                break;
            case 'app':
                documentType = 'Annual Procurement Plan';
                endpoint = '/tasks/update-app-status';
                payload = { app_id: id, status: status };
                break;
            case 'pr':
                documentType = 'Purchase Request';
                endpoint = '/tasks/update-pr-status';
                payload = { pr_id: id, status: status };
                break;
            case 'po':
                documentType = 'Purchase Order';
                endpoint = '/tasks/update-po-status';
                payload = { po_id: id, status: status };
                break;
            case 'par':
                documentType = 'Property Acknowledgement Receipt';
                endpoint = '/tasks/update-par-status';
                payload = { par_id: id, status: status };
                break;
            case 'ics':
                documentType = 'Inventory Custodian Slip';
                endpoint = '/tasks/update-ics-status';
                payload = { ics_id: id, status: status };
                break;
            default:
                console.error('Unknown task type:', taskType);
                return;
        }

        let swalTitle, swalText;

        if (taskType === 'ppmp' && approveButtonText === 'Submit' && isApproved) {
            swalTitle = 'Confirm Submission?';
            swalText = 'This Project Procurement Management Plan will be sent to the Planning Officer.';
        } else {
            swalTitle = `Confirm ${status.toLowerCase()}?`;
            swalText = `Do you want to ${status.toLowerCase()} this ${documentType}?`;
        }

        Swal.fire({
            title: swalTitle,
            text: swalText,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: confirmButtonColor,
            cancelButtonColor: '#7B7B7B',
            confirmButtonText: confirmButtonText
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Processing...',
                    text: 'Please wait while we update the status.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch(endpoint, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(payload)
                })
                .then(response => {
                    if (!response.ok) throw new Error('Server responded with an error.');
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        taskModal.hide();
                        Swal.fire(
                            `${status}!`,
                            `The ${documentType} has been ${status.toLowerCase()}.`,
                            'success'
                        ).then(() => location.reload()); // Reload page to see changes
                    } else {
                        throw new Error('Update failed.');
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while updating the status.'
                    });
                });
            }
        });
    }

    approveBtn.addEventListener('click', handleStatusUpdate);
    rejectBtn.addEventListener('click', handleStatusUpdate);
}); 
