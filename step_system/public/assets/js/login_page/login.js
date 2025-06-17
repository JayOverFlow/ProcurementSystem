document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const loginButton = document.getElementById('loginButton');
    const loginMessage = document.getElementById('loginMessage');
    const userEmailInput = document.getElementById('user_email');
    const userPasswordInput = document.getElementById('user_password');
    const togglePasswordCheckbox = document.getElementById('togglePassword');

    // Function to clear previous validation errors
    function clearErrors() {
        userEmailInput.classList.remove('is-invalid');
        document.getElementById('user_email_error').textContent = '';
        userPasswordInput.classList.remove('is-invalid');
        document.getElementById('user_password_error').textContent = '';
        loginMessage.classList.add('d-none');
        loginMessage.classList.remove('alert-danger', 'alert-success');
        loginMessage.textContent = '';
    }

    // Toggle password visibility
    if (togglePasswordCheckbox) {
        togglePasswordCheckbox.addEventListener('change', function() {
            const type = userPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            userPasswordInput.setAttribute('type', type);
        });
    }

    // Handle form submission
    if (loginForm) {
        loginForm.addEventListener('submit', async function(event) {
            event.preventDefault(); // Prevent default form submission

            clearErrors(); // Clear any existing errors

            loginButton.disabled = true; // Disable button to prevent multiple submissions
            loginButton.textContent = 'Logging in...'; // Provide feedback

            const formData = new FormData(loginForm);

            try {
                const response = await fetch(loginForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest' // Identify as AJAX request
                    }
                });

                const result = await response.json();

                if (result.status === 'success') {
                    loginMessage.classList.remove('d-none');
                    loginMessage.classList.add('alert-success');
                    loginMessage.textContent = result.message;
                    // Redirect to the dashboard or intended page
                    window.location.href = result.redirect; 
                } else {
                    loginMessage.classList.remove('d-none');
                    loginMessage.classList.add('alert-danger');
                    loginMessage.textContent = result.message;

                    // Display specific validation errors if available
                    if (result.validation) {
                        if (result.validation.user_email) {
                            userEmailInput.classList.add('is-invalid');
                            document.getElementById('user_email_error').textContent = result.validation.user_email;
                        }
                        if (result.validation.user_password) {
                            userPasswordInput.classList.add('is-invalid');
                            document.getElementById('user_password_error').textContent = result.validation.user_password;
                        }
                    }
                }
            } catch (error) {
                console.error('Login error:', error);
                loginMessage.classList.remove('d-none');
                loginMessage.classList.add('alert-danger');
                loginMessage.textContent = 'An unexpected error occurred. Please try again.';
            } finally {
                loginButton.disabled = false; // Re-enable button
                loginButton.textContent = 'LOGIN'; // Restore button text
            }
        });
    }
});