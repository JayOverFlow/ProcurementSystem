document.addEventListener('DOMContentLoaded', function () {
    const taskModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
    
    // Modal fields
    const modalFullName = document.getElementById('modal-fullname');
    const modalEmail = document.getElementById('modal-email');
    const modalRole = document.getElementById('modal-role');
    const modalDate = document.getElementById('modal-date');
    const modalDescription = document.getElementById('modal-description');
    const modalPreviewLink = document.getElementById('modal-preview-link');
    const approveBtn = document.getElementById('approve-btn');
    const rejectBtn = document.getElementById('reject-btn');
    const modalActionButtons = document.getElementById('modal-action-buttons');
    const modalStatusDisplay = document.getElementById('modal-status-display');

    document.querySelector('#style-2 tbody').addEventListener('click', function(event) {
        const target = event.target;
        if (target.classList.contains('view-task-btn')) {
            const taskId = target.dataset.taskId;
            openTaskModal(taskId);
        }
    });

    function openTaskModal(taskId) {
        // Show loading state
        modalFullName.textContent = 'Loading...';
        modalEmail.textContent = '';
        modalRole.textContent = '';
        modalDate.textContent = '';
        modalDescription.textContent = '';
        modalPreviewLink.style.display = 'none';
        approveBtn.removeAttribute('data-ppmp-id');
        rejectBtn.removeAttribute('data-ppmp-id');
        modalActionButtons.style.display = 'block';
        modalStatusDisplay.style.display = 'none';

        fetch(`/planning/tasks/details/${taskId}`)
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                // Populate modal with fetched data
                modalFullName.textContent = data.user_fullname;
                modalEmail.textContent = data.user_email;
                modalRole.textContent = data.role_name || 'N/A';
                
                const date = new Date(data.created_at);
                modalDate.textContent = date.toLocaleString('en-US', { month: 'long', day: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit', hour12: true });
                
                modalDescription.textContent = data.task_description;

                if (data.ppmp_id_fk) {
                    modalPreviewLink.href = `/ppmp/preview/${data.ppmp_id_fk}`;
                    modalPreviewLink.style.display = 'inline-flex';
                    // Set ppmp id on buttons
                    approveBtn.setAttribute('data-ppmp-id', data.ppmp_id_fk);
                    rejectBtn.setAttribute('data-ppmp-id', data.ppmp_id_fk);
                }

                // Handle status display
                if (data.ppmp_status === 'Approved' || data.ppmp_status === 'Rejected') {
                    modalActionButtons.style.display = 'none';
                    const badgeClass = data.ppmp_status === 'Approved' ? 'badge-light-success' : 'badge-light-danger';
                    modalStatusDisplay.innerHTML = `<span class="fw-bold badge ${badgeClass}" style="font-size: 1.1rem;">${data.ppmp_status}</span>`;
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
        const ppmpId = this.dataset.ppmpId;
        const isApproved = this.id === 'approve-btn';
        const status = isApproved ? 'Approved' : 'Rejected';
        const confirmButtonColor = isApproved ? '#8ABB2F' : '#DC3545';
        const confirmButtonText = isApproved ? 'Approve' : 'Reject';

        Swal.fire({
            title: `Confirm ${status.toLowerCase()}?`,
            text: `Do you want to ${status.toLowerCase()} this PPMP?`,
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

                fetch('/planning/tasks/update-status', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ ppmp_id: ppmpId, status: status })
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
                            `The PPMP has been ${status.toLowerCase()}.`,
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