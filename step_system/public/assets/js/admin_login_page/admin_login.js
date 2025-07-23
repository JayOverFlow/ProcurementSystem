document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('adminLoginForm');
    const loginButton = document.getElementById('adminLoginButton');
    const loginMessage = document.getElementById('loginMessage');
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('admin_password');

    if (togglePassword && passwordField) {
        togglePassword.addEventListener('change', function() {
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();

            // Clear previous error messages
            clearErrors();
            loginMessage.classList.add('d-none');
            loginMessage.classList.remove('alert-danger', 'alert-success');
            loginMessage.innerHTML = '';

            const formData = new FormData(loginForm);
            const jsonData = {};
            formData.forEach((value, key) => { jsonData[key] = value; });

            // Disable button and show spinner (optional, if you have one)
            loginButton.disabled = true;
            loginButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Logging In...';

            fetch(loginForm.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest' // Indicate AJAX request
                },
                body: JSON.stringify(jsonData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    loginMessage.classList.remove('alert-danger');
                    loginMessage.classList.add('alert-success');
                    loginMessage.innerHTML = data.message;
                    loginMessage.classList.remove('d-none');
                    window.location.href = data.redirect; // Redirect on success
                } else {
                    loginMessage.classList.remove('alert-success');
                    loginMessage.classList.add('alert-danger');
                    loginMessage.innerHTML = data.message;
                    loginMessage.classList.remove('d-none');

                    if (data.validation) {
                        displayErrors(data.validation);
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                loginMessage.classList.remove('alert-success');
                loginMessage.classList.add('alert-danger');
                loginMessage.innerHTML = 'An unexpected error occurred. Please try again later.';
                loginMessage.classList.remove('d-none');
            })
            .finally(() => {
                loginButton.disabled = false;
                loginButton.innerHTML = 'LOGIN';
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