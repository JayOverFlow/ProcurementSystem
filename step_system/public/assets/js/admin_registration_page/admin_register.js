document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('adminRegisterForm');
    const registerButton = document.getElementById('adminRegisterButton');
    const registrationMessage = document.getElementById('registrationMessage');
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('admin_password');
    const confirmPasswordField = document.getElementById('confirm_password');

    if (togglePassword && passwordField && confirmPasswordField) {
        togglePassword.addEventListener('change', function() {
            if (this.checked) {
                passwordField.type = 'text';
                confirmPasswordField.type = 'text';
            } else {
                passwordField.type = 'password';
                confirmPasswordField.type = 'password';
            }
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault();

            // Clear previous error messages
            clearErrors();
            registrationMessage.classList.add('d-none');
            registrationMessage.classList.remove('alert-danger', 'alert-success');
            registrationMessage.innerHTML = '';

            const formData = new FormData(registerForm);
            const jsonData = {};
            formData.forEach((value, key) => { jsonData[key] = value; });

            // Disable button and show spinner
            registerButton.disabled = true;
            registerButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Registering...';

            fetch(registerForm.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify(jsonData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    registrationMessage.classList.remove('alert-danger');
                    registrationMessage.classList.add('alert-success');
                    registrationMessage.innerHTML = data.message;
                    registrationMessage.classList.remove('d-none');
                    // Optionally redirect or clear form after successful registration
                    window.location.href = data.redirect; // Redirect to the URL provided by the backend

                } else {
                    registrationMessage.classList.remove('alert-success');
                    registrationMessage.classList.add('alert-danger');
                    registrationMessage.innerHTML = data.message;
                    registrationMessage.classList.remove('d-none');

                    if (data.validation) {
                        displayErrors(data.validation);
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                registrationMessage.classList.remove('alert-success');
                registrationMessage.classList.add('alert-danger');
                registrationMessage.innerHTML = 'An unexpected error occurred. Please try again later.';
                registrationMessage.classList.remove('d-none');
            })
            .finally(() => {
                registerButton.disabled = false;
                registerButton.innerHTML = 'REGISTER';
            });
        });
    }

    function clearErrors() {
        document.querySelectorAll('.form-control').forEach(input => {
            input.classList.remove('is-invalid');
        });
        document.querySelectorAll('.invalid-feedback').forEach(feedback => {
            feedback.innerHTML = '';
        });
    }

    function displayErrors(errors) {
        for (const [field, message] of Object.entries(errors)) {
            const input = document.getElementById(field);
            const errorFeedback = document.getElementById(field + '_error');

            if (input) {
                input.classList.add('is-invalid');
            }
            if (errorFeedback) {
                errorFeedback.innerHTML = message;
            }
        }
    }
}); 