document.addEventListener('DOMContentLoaded', function () {

    /**
     * * Validation Horizontal  
     * */

    var formValidation = document.querySelector('.stepper-form-validation-one');
    var stepper = new Stepper(formValidation, {
        animation: true
    });
    var formValidationNextButton = formValidation.querySelectorAll('.btn-nxt');
    var formValidationPrevButton = formValidation.querySelectorAll('.btn-prev');
    var formValidationSubmit = formValidation.querySelector('.btn-submit');
    var stepperPanList = [].slice.call(formValidation.querySelectorAll('.content'));

    // Step 1 Inputs
    var inputFirstName = formValidation.querySelector('#user-firstname');
    var inputLastName = formValidation.querySelector('#user-lastname');
    var inputMiddleName = formValidation.querySelector('#user-middlename');
    var inputSuffix = formValidation.querySelector('#user-suffix');
    var inputTUPID = formValidation.querySelector('#user-tupid');

    // Step 2 Inputs
    var inputEmail = formValidation.querySelector('#user-tup-email');
    var inputPassword = formValidation.querySelector('#user-password');
    var inputConfirmPassword = formValidation.querySelector('#confirm-password');
    var showPasswordSwitch = document.getElementById('form-switch-primary'); // For show/hide password feature
    var userTypeRadios = formValidation.querySelectorAll('input[name="user_type"]'); // For user_type radios

    // Step 3 Review Display Elements (Variables for the <span> elements)
    var reviewFirstName = formValidation.querySelector('#review-firstname');
    var reviewLastName = formValidation.querySelector('#review-lastname');
    var reviewMiddleName = formValidation.querySelector('#review-middlename');
    var reviewSuffix = formValidation.querySelector('#review-suffix');
    var reviewTUPID = formValidation.querySelector('#review-tupid');
    var reviewTupEmail = formValidation.querySelector('#review-tup-email');
    
    // Corrected variables for Step 3 password review
    var reviewPasswordContainer = formValidation.querySelector('#review-password-container'); // Parent span
    var reviewPasswordText = formValidation.querySelector('#review-password-text'); // Text span inside the container
    var reviewPasswordToggle = formValidation.querySelector('#review-password-toggle'); // The SVG icon
    var reviewUserType = formValidation.querySelector('#review-user-type'); // Assuming this element exists for review

    var formEl = formValidation.querySelector('.bs-stepper-content form');

    /**
     * Toggles the visibility of the password fields based on the switch's checked state.
     */
    function togglePasswordVisibility() {
        if (showPasswordSwitch) { // Ensure switch exists
            if (showPasswordSwitch.checked) {
                if (inputPassword) {
                    inputPassword.type = 'text';
                }
                if (inputConfirmPassword) {
                    inputConfirmPassword.type = 'text';
                }
            } else {
                if (inputPassword) {
                    inputPassword.type = 'password';
                }
                if (inputConfirmPassword) {
                    inputConfirmPassword.type = 'password';
                }
            }
        }
    }

    // Attach event listener for show password switch
    if (showPasswordSwitch) {
        showPasswordSwitch.addEventListener('change', togglePasswordVisibility);
        // Call the function once on load to set initial state based on default 'checked' attribute (default off)
        togglePasswordVisibility();
    }

    // --- START: NEW FUNCTION FOR REVIEW PASSWORD TOGGLE ---
    /**
     * Toggles the visibility of the password in the Step 3 review section.
     */
    function toggleReviewPasswordVisibility() {
        if (reviewPasswordText && reviewPasswordToggle) {
            const actualPassword = reviewPasswordText.dataset.actualPassword; // Get actual password from data-attribute
            
            if (reviewPasswordText.textContent === '********') {
                // Show password
                reviewPasswordText.textContent = actualPassword;
                reviewPasswordToggle.querySelector('path').setAttribute('d', 'M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8zM12 9a3 3 0 1 0 0 6 3 3 0 1 0 0-6z'); // eye icon path
                reviewPasswordToggle.classList.remove('feather-eye-off');
                reviewPasswordToggle.classList.add('feather-eye');
            } else {
                // Hide password
                reviewPasswordText.textContent = '********';
                reviewPasswordToggle.querySelector('path').setAttribute('d', 'M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.06 18.06 0 0 1 4.76-4.95M9.91 4.24A9.91 9.91 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.9 5.05M2 2l20 20'); // eye-off icon path
                reviewPasswordToggle.classList.remove('feather-eye');
                reviewPasswordToggle.classList.add('feather-eye-off');
            }
        }
    }

    // Attach event listener for the password toggle icon in Step 3
    if (reviewPasswordToggle) {
        reviewPasswordToggle.addEventListener('click', toggleReviewPasswordVisibility);
    }
    // --- END: NEW FUNCTION FOR REVIEW PASSWORD TOGGLE ---


    // Event listeners for Next and Previous buttons
    formValidationNextButton.forEach(element => {
        element.addEventListener('click', function() {
            stepper.next();
        });
    });

    formValidationPrevButton.forEach(element => {
        element.addEventListener('click', function() {
            stepper.previous();
        });
    });

    /**
     * Helper function to show validation error for a given input.
     * @param {HTMLElement} inputElement - The input field element.
     * @param {string} message - The error message to display.
     */
    function showValidationError(inputElement, message) {
        if (inputElement) {
            inputElement.classList.add('is-invalid');
            // Check for a sibling .invalid-feedback or a specific feedback element
            let feedbackElement = inputElement.nextElementSibling; 
            if (!feedbackElement || !feedbackElement.classList.contains('invalid-feedback')) {
                // If not a direct sibling, try to find by ID (e.g., for radio groups)
                const specificFeedbackId = inputElement.id + '-feedback';
                feedbackElement = formValidation.querySelector('#' + specificFeedbackId);
            }

            if (feedbackElement && feedbackElement.classList.contains('invalid-feedback')) {
                feedbackElement.textContent = message;
                feedbackElement.style.display = 'block'; // Ensure it's visible
            } else {
                // Fallback: log to console if feedback element is not found
                console.warn(`Validation feedback element not found for ${inputElement.id}. Message: ${message}`);
            }
        }
    }

    /**
     * Helper function to clear validation error for a given input.
     * @param {HTMLElement} inputElement - The input field element.
     */
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
                feedbackElement.style.display = 'none'; // Hide it
            }
        }
    }

    // Main stepper event listener for showing/hiding steps and performing validation
    formValidation.addEventListener('show.bs-stepper', function (event) {
        // Clear all previous validation messages and styles for the *current* step being validated
        // (i.e., the step we are moving FROM)
        formEl.classList.remove('was-validated'); 
        
        // Ensure currentStepContent is properly defined for clearing errors
        let currentStepContentToClear = stepperPanList[event.detail.from];
        if (currentStepContentToClear) {
            currentStepContentToClear.querySelectorAll('input, select, textarea').forEach(input => clearValidationError(input));
            currentStepContentToClear.querySelectorAll('.invalid-feedback').forEach(feedback => {
                feedback.textContent = '';
                feedback.style.display = 'none';
            });
        }


        var nextStepIndex = event.detail.indexStep; // The index of the step being shown (0-indexed)
        var currentStepContent = stepperPanList[event.detail.from]; // The content div of the step we are moving FROM

        // Populate review fields when navigating TO Step 3 (index 2)
        if (nextStepIndex === 2) {
            // Personal Information
            if (reviewFirstName) reviewFirstName.textContent = inputFirstName.value.trim() || 'N/A';
            if (reviewLastName) reviewLastName.textContent = inputLastName.value.trim() || 'N/A';
            if (reviewMiddleName) reviewMiddleName.textContent = inputMiddleName.value.trim() || 'N/A';
            if (reviewSuffix) reviewSuffix.textContent = inputSuffix.value.trim() || 'N/A';
            if (reviewTUPID) reviewTUPID.textContent = inputTUPID.value.trim() || 'N/A';
            
            // Account Information
            if (reviewTupEmail) reviewTupEmail.textContent = inputEmail.value.trim() || 'N/A';
            
            // --- START: CORRECTED PASSWORD POPULATION FOR TOGGLE ---
            // Store actual password in a data-attribute for Step 3 toggle
            if (inputPassword && reviewPasswordText) { 
                reviewPasswordText.dataset.actualPassword = inputPassword.value.trim(); // Store the actual password
                reviewPasswordText.textContent = '********'; // Always start masked in the display
            }
            
            // Reset review password toggle icon to eye-off when entering Step 3
            if (reviewPasswordToggle) {
                reviewPasswordToggle.querySelector('path').setAttribute('d', 'M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.06 18.06 0 0 1 4.76-4.95M9.91 4.24A9.91 9.91 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.9 5.05M2 2l20 20'); // eye-off icon path
                reviewPasswordToggle.classList.remove('feather-eye');
                reviewPasswordToggle.classList.add('feather-eye-off');
            }
            // --- END: CORRECTED PASSWORD POPULATION FOR TOGGLE ---
            
            // Populate review user type (assuming it exists in HTML for review)
            let selectedUserType = '';
            userTypeRadios.forEach(radio => {
                if (radio.checked) {
                    selectedUserType = radio.value;
                }
            });
            if (reviewUserType) reviewUserType.textContent = selectedUserType || 'N/A';
        }


        // Validation logic based on provided rules
        let validationFailed = false;

        // --- Step 1 Validation (when moving FROM validationStep-one) ---
        if (event.detail.to > event.detail.from) { 
            // --- Step 1 Validation (when moving FROM validationStep-one) ---
            if (currentStepContent.getAttribute('id') === 'validationStep-one') {
                // First Name
                if (!inputFirstName.value.trim()) {
                    showValidationError(inputFirstName, 'First name is required');
                    validationFailed = true;
                } else if (!/^[a-zA-Z\s]*$/.test(inputFirstName.value)) { // alpha_space rule
                    showValidationError(inputFirstName, 'First name must contain only alphabets and spaces');
                    validationFailed = true;
                } else if (inputFirstName.value.length > 80) { // max_length[80] rule (using 80 characters as per rule)
                    showValidationError(inputFirstName, 'First name cannot exceed 80 characters'); 
                    validationFailed = true;
                } else {
                    clearValidationError(inputFirstName);
                }

                // Middle Name
                if (!inputMiddleName.value.trim()) {
                    showValidationError(inputMiddleName, 'Middle name is required');
                    validationFailed = true;
                } else if (inputMiddleName.value.length > 50) { // max_length[50] rule
                    showValidationError(inputMiddleName, 'Middle name cannot exceed 50 characters');
                    validationFailed = true;
                } else {
                    clearValidationError(inputMiddleName);
                }

                // Last Name
                if (!inputLastName.value.trim()) {
                    showValidationError(inputLastName, 'Last name is required');
                    validationFailed = true;
                } else if (inputLastName.value.length > 50) { // max_length[50] rule
                    showValidationError(inputLastName, 'Last name cannot exceed 50 characters');
                    validationFailed = true;
                } else {
                    clearValidationError(inputLastName);
                }

                // Suffix (permit_empty|max_length[15])
                // The logic correctly handles 'permit_empty' as it only validates max_length if a value is present.
                if (inputSuffix.value.trim() !== '' && inputSuffix.value.length > 15) {
                    showValidationError(inputSuffix, 'Suffix cannot exceed 15 characters');
                    validationFailed = true;
                } else {
                    clearValidationError(inputSuffix);
                }

                // TUP-T ID
                const tupIdRegex = /^\d+$/; // Regex to ensure only digits
                if (!inputTUPID.value.trim()) {
                    showValidationError(inputTUPID, 'TUP ID is required');
                    validationFailed = true;
                } else if (!tupIdRegex.test(inputTUPID.value.trim())) { // Added check for digits only
                    showValidationError(inputTUPID, 'TUP ID must contain only digits');
                    validationFailed = true;
                }
                else if (inputTUPID.value.length !== 6) { // exact_length[6] rule
                    showValidationError(inputTUPID, 'TUP ID must be exactly 6 characters');
                    validationFailed = true;
                } 
                // 'is_unique' check omitted for client-side JavaScript (requires server-side)
                else {
                    clearValidationError(inputTUPID);
                }
            }
            // --- End Step 1 Validation ---

            // --- Step 2 Validation (when moving FROM validationStep-two) ---
            else if (currentStepContent.getAttribute('id') === 'validationStep-two') {
                // TUP Email
                const emailRegex = /^[a-zA-Z0-9._%+-]+@tup\.edu\.ph$/;
                if (!inputEmail.value.trim()) {
                    showValidationError(inputEmail, 'Email address is required');
                    validationFailed = true;
                } else if (!emailRegex.test(inputEmail.value)) { // regex_match rule
                    showValidationError(inputEmail, 'Please use a valid TUP email address (@tup.edu.ph)');
                    validationFailed = true;
                }
                // 'is_unique' check omitted for client-side JavaScript (requires server-side)
                else {
                    clearValidationError(inputEmail);
                }

                // Password
                if (!inputPassword.value.trim()) {
                    showValidationError(inputPassword, 'Password is required');
                    validationFailed = true;
                } else if (inputPassword.value.length < 8) { // min_length[8] rule
                    showValidationError(inputPassword, 'Password must be at least 8 characters long');
                    validationFailed = true;
                } else if (inputPassword.value.length > 70) { // max_length[70] rule
                    showValidationError(inputPassword, 'Password cannot exceed 70 characters');
                    validationFailed = true;
                } else {
                    clearValidationError(inputPassword);
                }

                // Confirm Password
                if (!inputConfirmPassword.value.trim()) {
                    showValidationError(inputConfirmPassword, 'Please confirm your password');
                    validationFailed = true;
                } else if (inputConfirmPassword.value !== inputPassword.value) { // matches[user_password] rule
                    showValidationError(inputConfirmPassword, 'Passwords do not match');
                    validationFailed = true;
                } else {
                    clearValidationError(inputConfirmPassword);
                }

                // User Type (Radio Buttons)
                let isUserTypeSelected = Array.from(userTypeRadios).some(radio => radio.checked);
                // Assuming a feedback div like <div class="invalid-feedback" id="user-type-feedback"></div> exists near radios
                const userTypeFeedback = formValidation.querySelector('#user-type-feedback'); 

                if (!isUserTypeSelected) { // required rule
                    if (userTypeFeedback) {
                        userTypeFeedback.textContent = 'User type is required';
                        userTypeFeedback.style.display = 'block'; 
                    }
                    userTypeRadios.forEach(radio => radio.classList.add('is-invalid')); // Visually mark radios invalid
                    validationFailed = true;
                } else {
                    if (userTypeFeedback) {
                        userTypeFeedback.textContent = '';
                        userTypeFeedback.style.display = 'none'; 
                    }
                    userTypeRadios.forEach(radio => radio.classList.remove('is-invalid'));
                    // in_list rule: This is implicitly handled if only 'Faculty' and 'Staff' radios exist.
                    // If more options were possible and selected, explicit check would be needed.
                }
            }
            // --- End Step 2 Validation ---

            // --- Step 3 Validation ---
            // This step is purely for review now. No client-side validation for inputs here.
            // --- End Step 3 Validation ---
        } // End of if (event.detail.to > event.detail.from)

        // --- Step 3 Validation ---
        // This step is purely for review now. No client-side validation for inputs here.
        // --- End Step 3 Validation ---

        if (validationFailed) {
            event.preventDefault(); // Stop the stepper from moving to the next step
            formEl.classList.add('was-validated'); // Trigger Bootstrap's validation styling
            console.log("Validation failed for the current step.");
        } else {
            // This part handles the 'crossed' class for completed steps
            if (event.detail.from < event.detail.to) {
                formValidation.querySelectorAll('.step')[event.detail.from].classList.add('crossed');
            } else {
                // If moving backward, remove 'crossed' class from the step we are moving TO
                formValidation.querySelectorAll('.step')[event.detail.to].classList.remove('crossed');
            }
        }
    });

    // Event listener for the final form submission button
    formValidationSubmit.addEventListener('click', function() {
        formEl.classList.remove('was-validated');
        // Clear previous validation messages for the final step before re-validating
        formValidation.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        formValidation.querySelectorAll('.invalid-feedback').forEach(el => {
            el.textContent = '';
            el.style.display = 'none';
        });


        // Validation for the final step (Step 4) before submission
        if (!inputEme.value.trim()) {
            showValidationError(inputEme, 'This field is required'); // Generic message for now for step 4
            formEl.classList.add('was-validated');
            console.log("Form not submitted: Step 4 field is empty.");
        } else {
            clearValidationError(inputEme);
            // All forms are valid, you can submit the form here
            console.log("Form submitted successfully!");
            // You might want to collect all data and send it to a server here using fetch API, etc.
        }
    });

});
