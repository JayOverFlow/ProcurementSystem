document.addEventListener('DOMContentLoaded', function () {
    var formValidation = document.querySelector('.stepper-form-validation-one'); // Select the stepper
    // Initalize a stepper
    var stepper = new Stepper(formValidation, {
        animation: true
    });

    // Convert NodeList which querySelectorAll returns to Array to perform array methods
    var stepperPanList = [].slice.call(formValidation.querySelectorAll('.content'));
    var formEl = formValidation.querySelector('.bs-stepper-content form');

    // Select all the inputs from Step 1
    var inputFirstName = formValidation.querySelector('#user-firstname');
    var inputLastName = formValidation.querySelector('#user-lastname');
    var inputMiddleName = formValidation.querySelector('#user-middlename');
    var inputSuffix = formValidation.querySelector('#user-suffix');
    var inputTUPID = formValidation.querySelector('#user-tupid');

    // Select all the inputs from Step 2
    var inputEmail = formValidation.querySelector('#user-tup-email');
    var inputPassword = formValidation.querySelector('#user-password');
    var inputConfirmPassword = formValidation.querySelector('#confirm-password');
    var showPasswordSwitch = document.getElementById('form-switch-primary'); // This is a switch to toggle password
    var userTypeRadios = formValidation.querySelectorAll('input[name="user_type"]');

    // Select all the span elements (initially empty) to display user data for Step 3 review
    var reviewFirstName = formValidation.querySelector('#review-firstname');
    var reviewLastName = formValidation.querySelector('#review-lastname');
    var reviewMiddleName = formValidation.querySelector('#review-middlename');
    var reviewSuffix = formValidation.querySelector('#review-suffix');
    var reviewTUPID = formValidation.querySelector('#review-tupid');
    var reviewTupEmail = formValidation.querySelector('#review-tup-email');
    var reviewPasswordContainer = formValidation.querySelector('#review-password-container');
    var reviewPasswordText = formValidation.querySelector('#review-password-text');
    var reviewPasswordToggle = formValidation.querySelector('#review-password-toggle'); // Review password
    var reviewUserType = formValidation.querySelector('#review-user-type');

    // Select all elements on Step 4
    var confirmSendOtpBtn = document.getElementById('confirmSendOtpBtn'); // The Next button on step 3 to trigger the modal
    var verifyOtpBtn = document.getElementById('verifyOtpBtn');
    var resendOtpLink = document.getElementById('resendOtpLink');
    var otpInputs = formValidation.querySelectorAll('.otp-input'); // OTP input fields
    var otpErrorMessage = document.getElementById('otp-error-message');
    var otpSuccessMessage = document.getElementById('otp-success-message');

    // Select laoder
    var sendingOtpLoader = document.getElementById('sendingOtpLoader');
    var resendingOtpLoader = document.getElementById('resendingOtpLoader');
    var verifyingOtpLoader = document.getElementById('verifyingOtpLoader');

    // Select countdown element
    var resendCountdownDisplay = document.getElementById('resendCountdownDisplay');

    // Timer variables
    var resendTimerInterval = null;
    var resendCountdown = 60; // Initial countdown in seconds
    

    // Select modal elements
    var otpConfirmationModal = new bootstrap.Modal(document.getElementById('otpConfirmationModal')); // Initialize Bootstrap Modal
    var modalEmailDisplay = document.getElementById('modal-email-display');
    var proceedToOtpBtn = document.getElementById('proceedToOtpBtn');

    // Toggle Password visibility switch on Step 2
    function togglePasswordVisibility() {
        if (showPasswordSwitch) {
            if (showPasswordSwitch.checked) {
                if (inputPassword) inputPassword.type = 'text';
                if (inputConfirmPassword) inputConfirmPassword.type = 'text';
            } else {
                if (inputPassword) inputPassword.type = 'password';
                if (inputConfirmPassword) inputConfirmPassword.type = 'password';
            }
        }
    }

    // Event listner for switch element
    if (showPasswordSwitch) {
        showPasswordSwitch.addEventListener('change', togglePasswordVisibility);
        togglePasswordVisibility();
    }

    // Review password on step 3
    function toggleReviewPasswordVisibility() {
        if (reviewPasswordText && reviewPasswordToggle) {
            const actualPassword = reviewPasswordText.dataset.actualPassword;

            if (reviewPasswordText.textContent === '********') {
                reviewPasswordText.textContent = actualPassword;
                reviewPasswordToggle.querySelector('path').setAttribute('d', 'M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8zM12 9a3 3 0 1 0 0 6 3 3 0 1 0 0-6z');
                reviewPasswordToggle.classList.remove('feather-eye-off');
                reviewPasswordToggle.classList.add('feather-eye');
            } else {
                reviewPasswordText.textContent = '********';
                reviewPasswordToggle.querySelector('path').setAttribute('d', 'M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.06 18.06 0 0 1 4.76-4.95M9.91 4.24A9.91 9.91 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.9 5.05M2 2l20 20');
                reviewPasswordToggle.classList.remove('feather-eye');
                reviewPasswordToggle.classList.add('feather-eye-off');
            }
        }
    }

    // Event lisnter if the eye button is clicked
    if (reviewPasswordToggle) {
        reviewPasswordToggle.addEventListener('click', toggleReviewPasswordVisibility);
    }

    // Helper function to display validation error for selected input field for all steps
    // param: html element, input field
    // param: string, the error message to display
    function showValidationError(inputElement, message) {
        if (inputElement) {
            inputElement.classList.add('is-invalid');
            let feedbackElement = inputElement.nextElementSibling;
            if (!feedbackElement || !feedbackElement.classList.contains('invalid-feedback')) {
                const specificFeedbackId = inputElement.id + '-feedback';
                feedbackElement = formValidation.querySelector('#' + specificFeedbackId);
            }

            if (feedbackElement && feedbackElement.classList.contains('invalid-feedback')) {
                feedbackElement.textContent = message;
                feedbackElement.style.display = 'block';
            } else {
                console.warn(`Validation feedback element not found for ${inputElement.id}. Message: ${message}`);
            }
        }
    }

    // Helper function to clear the validation error for each input fields for all steps
    // param: html element, input field
    function clearValidationError(inputElement) {
        if (inputElement) {
            inputElement.classList.remove('is-invalid');
            let feedbackElement = inputElement.nextElementSibling;
            if (!feedbackElement || !feedbackElement.classList.contains('invalid-feedback')) {
                const specificFeedbackId = inputElement.id + '-feedback';
                feedbackElement = formValidation.querySelector('#' + specificFeedbackId);
            }

            if (feedbackElement && feedbackElement.classList.contains('invalid-feedback')) {
                feedbackElement.textContent = '';
                feedbackElement.style.display = 'none';
            }
        }
    }

    // Function to clear all validation errors in the form
    function clearAllValidationErrors() {
        formEl.classList.remove('was-validated');
        formValidation.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        formValidation.querySelectorAll('.invalid-feedback').forEach(el => {
            el.textContent = '';
            el.style.display = 'none';
        });
    }

    // EVENT LISTENERS FOR STEPPER NAVIAGATION BUTTONS. PREV & NEXT (AJAX ENABLED)
    
    // Event Listener for Next button on step 1
    // Triggers validations if clicked
    document.querySelector('#validationStep-one .btn-nxt').addEventListener('click', function(e) {
        e.preventDefault();
        clearAllValidationErrors();

        let validationFailed = false;

        // Client-side validation for Step 1
        if (!inputFirstName.value.trim()) {
            showValidationError(inputFirstName, 'First name is required');
            validationFailed = true;
        } else if (!/^[a-zA-Z\s]*$/.test(inputFirstName.value)) {
            showValidationError(inputFirstName, 'First name must contain only alphabets and spaces');
            validationFailed = true;
        } else if (inputFirstName.value.length > 80) {
            showValidationError(inputFirstName, 'First name cannot exceed 80 characters');
            validationFailed = true;
        } else {
            clearValidationError(inputFirstName);
        }

        if (!inputMiddleName.value.trim()) {
            showValidationError(inputMiddleName, 'Middle name is required');
            validationFailed = true;
        } else if (inputMiddleName.value.length > 50) {
            showValidationError(inputMiddleName, 'Middle name cannot exceed 50 characters');
            validationFailed = true;
        } else {
            clearValidationError(inputMiddleName);
        }

        if (!inputLastName.value.trim()) {
            showValidationError(inputLastName, 'Last name is required');
            validationFailed = true;
        } else if (inputLastName.value.length > 50) {
            showValidationError(inputLastName, 'Last name cannot exceed 50 characters');
            validationFailed = true;
        } else {
            clearValidationError(inputLastName);
        }

        if (inputSuffix.value.trim() !== '' && inputSuffix.value.length > 15) {
            showValidationError(inputSuffix, 'Suffix cannot exceed 15 characters');
            validationFailed = true;
        } else {
            clearValidationError(inputSuffix);
        }

        const tupIdRegex = /^\d{6}$/; // Exact 6 digits
        if (!inputTUPID.value.trim()) {
            showValidationError(inputTUPID, 'TUP ID is required');
            validationFailed = true;
        } else if (!tupIdRegex.test(inputTUPID.value.trim())) {
            showValidationError(inputTUPID, 'TUP ID must be exactly 6 digits');
            validationFailed = true;
        } else {
            clearValidationError(inputTUPID);
        }

        if (!validationFailed) {
            // Frontend validation passed, now perform backend validation for TUP ID
            const formData = new FormData();
            formData.append('user_tupid', inputTUPID.value);

            fetch(BASE_URL + 'auth/checkTupId', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        stepper.next(); // TUP ID is unique, proceed to step 2
                    } else {
                        // TUP ID is not unique, display error
                        if (data.validation && data.validation.user_tupid) {
                            showValidationError(inputTUPID, data.validation.user_tupid);
                        } else if (data.message) {
                            alert(data.message); // Fallback for other potential errors
                        }
                        formEl.classList.add('was-validated'); // Ensure validation styles are applied
                    }
                })
                .catch(error => {
                    console.error('Error checking TUP ID:', error);
                    alert('An error occurred while verifying TUP ID. Please try again.');
                    formEl.classList.add('was-validated'); // Ensure validation styles are applied
                });
        } else {
            formEl.classList.add('was-validated');
        }
    });

    // Event Listener for Next button on step 2
    // Triggers validations if clicked
    document.querySelector('#validationStep-two .btn-nxt').addEventListener('click', function(e) {
        e.preventDefault();
        clearAllValidationErrors();

        let validationFailed = false;

        // FrontEnd validations
        const emailRegex = /^[a-zA-Z0-9._%+-]+@tup\.edu\.ph$/;
        if (!inputEmail.value.trim()) {
            showValidationError(inputEmail, 'Email address is required');
            validationFailed = true;
        } else if (!emailRegex.test(inputEmail.value)) {
            showValidationError(inputEmail, 'Please use a valid TUP email address (@tup.edu.ph)');
            validationFailed = true;
        } else {
            clearValidationError(inputEmail);
        }

        if (!inputPassword.value.trim()) {
            showValidationError(inputPassword, 'Password is required');
            validationFailed = true;
        } else if (inputPassword.value.length < 8) {
            showValidationError(inputPassword, 'Password must be at least 8 characters long');
            validationFailed = true;
        } else if (inputPassword.value.length > 70) {
            showValidationError(inputPassword, 'Password cannot exceed 70 characters');
            validationFailed = true;
        } else {
            clearValidationError(inputPassword);
        }

        if (!inputConfirmPassword.value.trim()) {
            showValidationError(inputConfirmPassword, 'Please confirm your password');
            validationFailed = true;
        } else if (inputConfirmPassword.value !== inputPassword.value) {
            showValidationError(inputConfirmPassword, 'Passwords do not match');
            validationFailed = true;
        } else {
            clearValidationError(inputConfirmPassword);
        }

        let isUserTypeSelected = Array.from(userTypeRadios).some(radio => radio.checked);
        const userTypeFeedback = formValidation.querySelector('#user-type-feedback');
        if (!isUserTypeSelected) {
            if (userTypeFeedback) {
                userTypeFeedback.textContent = 'User type is required';
                userTypeFeedback.style.display = 'block';
            }
            userTypeRadios.forEach(radio => radio.classList.add('is-invalid'));
            validationFailed = true;
        } else {
            if (userTypeFeedback) {
                userTypeFeedback.textContent = '';
                userTypeFeedback.style.display = 'none';
            }
            userTypeRadios.forEach(radio => radio.classList.remove('is-invalid'));
        }

        if (!validationFailed) {
            // Frontend validation passed, now perform backend validation for email
            const formData = new FormData();
            formData.append('user_email', inputEmail.value);

            fetch(BASE_URL + 'auth/checkEmail', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        stepper.next();
                    } else {
                        if (data.validation && data.validation.user_email) {
                            showValidationError(inputEmail, data.validation.user_email);
                        } else if (data.message) {
                            alert(data.message);
                        }
                        formEl.classList.add('was-validated');
                    }
                })
                .catch(error => {
                    console.error('Error checking email:', error);
                    alert('An error occurred while verifying email. Please try again.');
                    formEl.classList.add('was-validated'); // Ensure validation styles are applied
                });
        } else {
            formEl.classList.add('was-validated');
        }

        // If the frontend valdiations on step 2 passed
        // Begin the backend validation for remaning fields
        if (!validationFailed) {
            // Initialize FromData where we store the user's inputs to send backend for validations
            const formData = new FormData();
            // Add all user's input into formData
            formData.append('user_firstname', inputFirstName.value);
            formData.append('user_middlename', inputMiddleName.value);
            formData.append('user_lastname', inputLastName.value);
            formData.append('user_suffix', inputSuffix.value);
            formData.append('user_tupid', inputTUPID.value);
            formData.append('user_email', inputEmail.value);
            formData.append('user_password', inputPassword.value);
            formData.append('confirm_password', inputConfirmPassword.value);
            formData.append('user_type', document.querySelector('input[name="user_type"]:checked').value);

            // AJAX Fetch json response from register method in AuthController
            fetch(BASE_URL + 'register', {
                    method: 'POST',
                    body: formData, // The user's inputs
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json()) // Parse reponse to JSON
                // Handle the data object from the register method in AuthController
                .then(data => {
                    // If backend validation passed
                    if (data.status === 'success') {
                        stepper.next(); // Proceed to step 3
                    } else {
                        // Backend validation failed
                        if (data.validation) {
                            for (const field in data.validation) {
                                const inputId = `user-${field.replace(/_([a-z])/g, (g) => g[1].toUpperCase())}`;
                                const input = formValidation.querySelector(`#${inputId}`);
                                if (input) {
                                    showValidationError(input, data.validation[field]);
                                } else if (field === 'user_type') {
                                    const userTypeFeedback = formValidation.querySelector('#user-type-feedback');
                                    if (userTypeFeedback) {
                                        userTypeFeedback.textContent = data.validation[field];
                                        userTypeFeedback.style.display = 'block';
                                        userTypeRadios.forEach(radio => radio.classList.add('is-invalid'));
                                    }
                                }
                            }
                        } else if (data.message) {
                            alert(data.message);
                        }
                        formEl.classList.add('was-validated');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred during registration. Please try again.');
                });
        } else {
            formEl.classList.add('was-validated');
        }
    });

    // Event listener for Prev button on all steps
    document.querySelectorAll('.btn-prev').forEach(element => {
        element.addEventListener('click', function() {
            clearAllValidationErrors();
            stepper.previous();
        });
    });

    // Stepper event listener for showing/hiding steps and populating review
    formValidation.addEventListener('show.bs-stepper', function (event) {
        clearAllValidationErrors();

        var nextStepIndex = event.detail.indexStep;

        // Populate review fields when navigating TO Step 3 (index 2)
        if (nextStepIndex === 2) { 
            // From step 1
            if (reviewFirstName) reviewFirstName.textContent = inputFirstName.value.trim() || 'N/A';
            if (reviewLastName) reviewLastName.textContent = inputLastName.value.trim() || 'N/A';
            if (reviewMiddleName) reviewMiddleName.textContent = inputMiddleName.value.trim() || 'N/A';
            if (reviewSuffix) reviewSuffix.textContent = inputSuffix.value.trim() || 'N/A';
            if (reviewTUPID) reviewTUPID.textContent = inputTUPID.value.trim() || 'N/A';

            // From step 2
            if (reviewTupEmail) reviewTupEmail.textContent = inputEmail.value.trim() || 'N/A';
            if (inputPassword && reviewPasswordText) {
                reviewPasswordText.dataset.actualPassword = inputPassword.value.trim();
                reviewPasswordText.textContent = '********';
            }

            // Reset review password toggle icon to eye-off when entering Step 3
            if (reviewPasswordToggle) {
                reviewPasswordToggle.querySelector('path').setAttribute('d', 'M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.06 18.06 0 0 1 4.76-4.95M9.91 4.24A9.91 9.91 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.9 5.05M2 2l20 20');
                reviewPasswordToggle.classList.remove('feather-eye');
                reviewPasswordToggle.classList.add('feather-eye-off');
            }

            let selectedUserType = '';
            userTypeRadios.forEach(radio => {
                if (radio.checked) {
                    selectedUserType = radio.value;
                }
            });
            if (reviewUserType) reviewUserType.textContent = selectedUserType || 'N/A';
        }

        // Populate email in OTP modal when showing Step 3
        // If navigating TO Step 3
        if (event.detail.to === 2) {
            if (modalEmailDisplay) {
                modalEmailDisplay.textContent = inputEmail.value.trim();
            }
        }

        // If moving backward, remove 'crossed' class from the step we are moving TO
        if (event.detail.from > event.detail.to) {
            formValidation.querySelectorAll('.step')[event.detail.to].classList.remove('crossed');
        }
    });

    // OTP MODAL AND VERIFICATION LOGIC

    // Event listener for the Proceed button in the OTP confirmation modal
    proceedToOtpBtn.addEventListener('click', function() {
        otpConfirmationModal.hide(); // Hide the modal
        clearMessages();
        otpInputs.forEach(input => input.value = '');

        showSendingOtpLoader(); // Loading

        // Send OTP AJAX request to backend
        fetch(BASE_URL + 'auth/sendOtp', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                hideSendingOtpLoader(); // Hide loader
                // If OTP sent success from backend
                if (data.status === 'success') {
                    showSuccessMessage(data.message);
                    stepper.next(); // Move to step 4 for OTP verification
                    otpInputs[0].focus(); // Focus on the first OTP input
                } else {
                    showErrorMessage(data.message);
                    // If OTP sending fails, keep the user on the Review step or show a more specific error.
                    // For now, display the error and the user will have to click "Next" again.
                }
            })
            .catch(error => {
                console.error('Error sending OTP:', error);
                showErrorMessage('An error occurred while sending OTP. Please try again.');
            });
    });

    // Event listener for Verify button
    verifyOtpBtn.addEventListener('click', function() {
        clearMessages();

        showVerifyingOtpLoader();

         // Get all the input for each OTP field and store in variable below
        let enteredOtp = '';
        otpInputs.forEach(input => {
            enteredOtp += input.value;
        });

        if (enteredOtp.length !== 6) { 
            showErrorMessage('Please enter a 6-digit OTP.');
            return;
        }

        // Create a new FormData object to send to backend to veify OTP code from database
        const formData = new FormData();
        formData.append('otp', enteredOtp);

        fetch(BASE_URL + 'auth/verifyOtp', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                hideVerifyingOtpLoader();
                if (data.status === 'success') {
                    // Show success message and then redirect to login
                    alert(data.message);
                    window.location.href = BASE_URL + 'login';
                } else {
                    showErrorMessage(data.message);
                    // Clear OTP inputs on failure for re-entry
                    otpInputs.forEach(input => input.value = '');
                    otpInputs[0].focus(); // Focus on the first input for easy re-entry
                    verifyOtpBtn.disabled = true;
                }
            })
            .catch(error => {
                console.error('Error verifying OTP:', error);
                showErrorMessage('An error occurred while verifying OTP. Please try again.');
            });
    });

    // Event listener for Resend link
    resendOtpLink.addEventListener('click', function(e) {
        e.preventDefault();

        if (resendTimerInterval) { // Prevent multiple clicks during countdown
            return;
        }

        clearMessages();
        otpInputs.forEach(input => input.value = ''); // Clear inputs
        otpInputs[0].focus(); // Focus on the first input
        verifyOtpBtn.disabled = true; // Disable Verify OTP button until new inputs are filled

        showResendingOtpLoader();

        startResendTimer(60); // Start the 60-second countdown immediatel

        fetch(BASE_URL + 'auth/resendOtp', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                hideResendingOtpLoader();
                if (data.status === 'success') {
                    showSuccessMessage(data.message);
                } else {
                    showErrorMessage(data.message);
                }
            })
            .catch(error => {
                console.error('Error resending OTP:', error);
                showErrorMessage('An error occurred while resending OTP. Please try again.');
            });
    });

    // Helper functions for OTP messages
    function showErrorMessage(message) {
        otpErrorMessage.textContent = message;
        otpErrorMessage.style.display = 'block';
        otpSuccessMessage.style.display = 'none';
    }

    function showSuccessMessage(message) {
        otpSuccessMessage.textContent = message;
        otpSuccessMessage.style.display = 'block';
        otpErrorMessage.style.display = 'none';
    }

    function clearMessages() {
        otpErrorMessage.textContent = '';
        otpErrorMessage.style.display = 'none';
        otpSuccessMessage.textContent = '';
        otpSuccessMessage.style.display = 'none';
    }

    function showSendingOtpLoader() {
        if (sendingOtpLoader) {
            sendingOtpLoader.classList.remove('d-none');
            document.body.style.overflow = 'hidden';
        }
    }

    function hideSendingOtpLoader() {
        if (sendingOtpLoader) {
            sendingOtpLoader.classList.add('d-none');
            document.body.style.overflow = '';
        }
    }

    function showResendingOtpLoader() {
        if (resendingOtpLoader) {
            resendingOtpLoader.classList.remove('d-none');
            document.body.style.overflow = 'hidden';
        }
    }

    function hideResendingOtpLoader() {
        if (resendingOtpLoader) {
            resendingOtpLoader.classList.add('d-none');
            document.body.style.overflow = '';
        } verifyingOtpLoader
    }
    
    function showVerifyingOtpLoader() {
        if (verifyingOtpLoader) {
            verifyingOtpLoader.classList.remove('d-none');
            document.body.style.overflow = 'hidden';
        }
    }

    function hideVerifyingOtpLoader() {
        if (verifyingOtpLoader) {
            verifyingOtpLoader.classList.add('d-none');
            document.body.style.overflow = '';
        }
    }

    // Helper functions for Resend OTP countdown
    function startResendTimer(duration) {
        resendCountdown = duration;
        resendOtpLink.classList.add('d-none'); // Hide resend link
        resendCountdownDisplay.classList.remove('d-none'); // Show countdown display

        // Update the display immediately
        resendCountdownDisplay.textContent = ` (${resendCountdown}s)`;

        resendTimerInterval = setInterval(() => {
            resendCountdown--;
            resendCountdownDisplay.textContent = ` (${resendCountdown}s)`;

            if (resendCountdown <= 0) {
                stopResendTimer();
            }
        }, 1000); // Update every 1 second
    }

    function stopResendTimer() {
        clearInterval(resendTimerInterval);
        resendTimerInterval = null;
        resendCountdown = 60; // Reset for next time
        resendOtpLink.classList.remove('d-none'); // Show resend link
        resendCountdownDisplay.classList.add('d-none'); // Hide countdown display
    }

    // Automatically focus on the next OTP input as digits are typed
    otpInputs.forEach((input, index) => {
        input.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 1); // Allow only one digit
            if (this.value.length === 1 && index < otpInputs.length - 1) {
                otpInputs[index + 1].focus();
            }
            // Check if all OTP inputs are filled to enable the VERIFY OTP button
            let allFilled = true;
            otpInputs.forEach(otpInput => {
                if (otpInput.value.length !== 1) {
                    allFilled = false;
                }
            });
            if (allFilled) {
                verifyOtpBtn.disabled = false;
            } else {
                verifyOtpBtn.disabled = true;
            }
        });

        input.addEventListener('keydown', function(event) {
            if (event.key === 'Backspace' && this.value === '' && index > 0) {
                otpInputs[index - 1].focus();
            }
            // If Backspace and current input has a value, clear it but don't move focus
            else if (event.key === 'Backspace' && this.value !== '') {
                this.value = '';
                verifyOtpBtn.disabled = true;
            }
        });
    });

    // Initial state: Verify OTP button should be disabled until inputs are filled
    if (verifyOtpBtn) {
        verifyOtpBtn.disabled = true;
    }
});