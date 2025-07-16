document.addEventListener('DOMContentLoaded', function () {
    const viewButtons = document.querySelectorAll('.view-task-btn');
    const taskModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));
    
    const modalFullName = document.getElementById('modal-fullname');
    const modalEmail = document.getElementById('modal-email');
    const modalRole = document.getElementById('modal-role');
    const modalDate = document.getElementById('modal-date');
    const modalDescription = document.getElementById('modal-description');
    const modalPreviewLink = document.getElementById('modal-preview-link');
    
    viewButtons.forEach(button => {
        button.addEventListener('click', function () {
            const taskId = this.dataset.taskId;

            // Show loading state
            modalFullName.textContent = 'Loading...';
            modalEmail.textContent = '';
            modalRole.textContent = '';
            modalDate.textContent = '';
            modalDescription.textContent = '';
            modalPreviewLink.style.display = 'none';

            fetch(`/planning/tasks/details/${taskId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Populate modal with fetched data
                    modalFullName.textContent = data.user_fullname;
                    modalEmail.textContent = data.user_email;
                    modalRole.textContent = data.role_name || 'N/A';
                    
                    const date = new Date(data.created_at);
                    modalDate.textContent = date.toLocaleString('en-US', {
                        month: 'long',
                        day: 'numeric',
                        year: 'numeric',
                        hour: 'numeric',
                        minute: '2-digit',
                        hour12: true
                    });
                    
                    modalDescription.textContent = data.task_description;

                    if (data.ppmp_id_fk) {
                        modalPreviewLink.href = `/ppmp/preview/${data.ppmp_id_fk}`;
                        modalPreviewLink.style.display = 'inline-flex';
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    modalFullName.textContent = 'Error loading details.';
                });
        });
    });
}); 