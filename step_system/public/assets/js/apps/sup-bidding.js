document.addEventListener('DOMContentLoaded', function () {
    const saveBiddingBtn = document.getElementById('saveBiddingBtn');
    const submitBiddingBtn = document.getElementById('submitBiddingBtn');
    const biddingStatusSelects = document.querySelectorAll('.bidding-status-select');
    const prId = submitBiddingBtn.dataset.prId;

    // Function to check if all items are successful and toggle submit button
    function checkAndToggleSubmitButton() {
        let allItemsSuccessful = true;
        biddingStatusSelects.forEach(select => {
            if (select.value !== 'successful') {
                allItemsSuccessful = false;
            }
        });

        // Only enable if all items are successful AND the form is not read-only
        // The form is read-only if isReadOnlyForm is true, which also disables the save button
        const isFormDisabledByBackend = saveBiddingBtn.disabled; // If save button is disabled, the form is read-only
        // The submit button's state is controlled by the backend's $all_items_successful variable on page load.
        // No dynamic client-side toggling needed here as it caused incorrect behavior.
        // Its disabled state is set directly in the HTML based on backend logic.
    }

    // Initial check on page load
    checkAndToggleSubmitButton();

    // Add event listener to all select dropdowns to re-check status
    biddingStatusSelects.forEach(select => {
        select.addEventListener('change', checkAndToggleSubmitButton);
    });

    // SweetAlert for Save Bidding Status button
    if (saveBiddingBtn) {
        saveBiddingBtn.addEventListener('click', function (event) { // Changed to 'click' event on the button itself
            event.preventDefault(); // Prevent default button action and form submission
            if (this.disabled) { // Use 'this' to refer to the clicked button
                return;
            }
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to save the bidding statuses?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, programmatically submit the closest form
                    this.closest('form').submit();
                }
            });
        });
    }

    // SweetAlert for Submit to Procurement Head button (AJAX submission)
    if (submitBiddingBtn) {
        submitBiddingBtn.addEventListener('click', function () {
            if (submitBiddingBtn.disabled) {
                return; // Do nothing if button is disabled
            }

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to submit this PR to the Procurement Head? This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, submit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform AJAX submission
                    const submitUrl = submitBiddingBtn.dataset.submitUrl;
                    const redirectUrl = submitBiddingBtn.dataset.redirectUrl;

                    fetch(submitUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Adjust if CSRF token is handled differently
                        },
                        body: JSON.stringify({ pr_id: prId })
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire(
                                    'Submitted!',
                                    'Your Purchase Request has been submitted to the Procurement Head.',
                                    'success'
                                ).then(() => {
                                    window.location.href = redirectUrl; // Redirect to list page
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    data.message || 'Failed to submit Purchase Request.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'An unexpected error occurred. Please try again.',
                                'error'
                            );
                        });
                }
            });
        });
    }
});