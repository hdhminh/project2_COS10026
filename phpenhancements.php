<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Login System</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="enhancepage">
    <div id="page-container">
        <div class="container" id="assignment_2_PHP">
            <h1>Interactive Login Enhancement</h1>
            <p>
                This page showcases the enhanced login system with JavaScript validation and interactive elements,
                including a registration function.
            </p>

            <div class="toc">
                <h2>Table of Contents</h2>
                <ul>
                    <li><a href="#login-form">Enhanced Login Form</a></li>
                    <li><a href="#register-form">Registration Form</a></li>
                    <li><a href="#summary_list">Return</a></li>
                </ul>
            </div>

            <div id="login-form" class="animation-card">
                <h2>Enhanced Login Form</h2>
                <p>
                    The login form below incorporates all the enhancements: real-time validation,
                    password visibility toggle, and secure session management.
                </p>

                <div class="demo-section">
                    <h3>Live Demo</h3>
                    <p>
                        This complete login form features all enhancements in one place:
                    </p>
                    <?php if (!empty($error) && (!isset($_POST['form_type']) || $_POST['form_type'] != 'register')): ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                    </div>
                    <?php endif; ?>

                    <div class="form-demo">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                            id="login-form">
                            <input type="hidden" name="form_type" value="login">
                            <div class="form-group">
                                <label for="username"><i class="fas fa-user"></i> Username</label>
                                <input type="text" id="username" name="username" required>
                                <span class="error-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="password"><i class="fas fa-key"></i> Password</label>
                                <input type="password" id="password" name="password" required>
                                <span class="error-message"></span>
                            </div>

                            <div class="show-password">
                                <input type="checkbox" id="show-password">
                                <label for="show-password">Show password</label>
                            </div>

                            <div class="form-error-summary"></div>

                            <div class="form-actions">
                                <button type="submit" class="submit-button">
                                    Login
                                </button>
                                <input type="reset" value="Reset Form" class="reset-button">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="register-form" class="animation-card">
                <h2>Registration Form</h2>
                <p>
                    The registration form below includes real-time validation, password visibility toggle,
                    and ensures all required fields are properly filled out.
                </p>

                <div class="demo-section">
                    <h3>Live Demo</h3>
                    <p>
                        Create a new account with enhanced form validation:
                    </p>
                    <?php if (!empty($error) && isset($_POST['form_type']) && $_POST['form_type'] == 'register'): ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                    </div>
                    <?php endif; ?>

                    <?php if (!empty($success)): ?>
                    <div class="success-message">
                        <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                    </div>
                    <?php endif; ?>

                    <div class="form-demo">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                            id="registration-form">
                            <input type="hidden" name="form_type" value="register">
                            <div class="form-group">
                                <label for="reg_username"><i class="fas fa-user"></i> Username</label>
                                <input type="text" id="reg_username" name="reg_username" required>
                                <span class="error-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="reg_email"><i class="fas fa-envelope"></i> Email</label>
                                <input type="email" id="reg_email" name="reg_email" required>
                                <span class="error-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="reg_password"><i class="fas fa-key"></i> Password</label>
                                <input type="password" id="reg_password" name="reg_password" required>
                                <span class="error-message"></span>
                            </div>

                            <div class="form-group">
                                <label for="reg_confirm_password"><i class="fas fa-lock"></i> Confirm Password</label>
                                <input type="password" id="reg_confirm_password" name="reg_confirm_password" required>
                                <span class="error-message"></span>
                            </div>

                            <div class="show-password">
                                <input type="checkbox" id="show-reg-password">
                                <label for="show-reg-password">Show passwords</label>
                            </div>

                            <div class="form-error-summary"></div>

                            <div class="form-actions">
                                <button type="submit" class="submit-button">
                                    Register
                                </button>
                                <input type="reset" value="Reset Form" class="reset-button">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="auth-links">
                <p><a href="index.php">Back to Home</a></p>
            </div>
        </div>
    </div>

    <script>
    // Demo functionality for both login and register pages
    document.addEventListener('DOMContentLoaded', function() {
        // Function to set up form validation
        function setupFormValidation(formId, passwordFieldId, confirmPasswordFieldId = null) {
            const form = document.getElementById(formId);
            if (form) {
                const inputs = form.querySelectorAll('input[required]');

                inputs.forEach(input => {
                    input.addEventListener('blur', function() {
                        validateInput(this, confirmPasswordFieldId);
                    });

                    input.addEventListener('input', function() {
                        if (this.classList.contains('invalid')) {
                            validateInput(this, confirmPasswordFieldId);
                        }
                    });
                });

                function validateInput(input, confirmPasswordId) {
                    const errorElement = input.nextElementSibling;
                    let isValid = true;
                    let errorMessage = '';

                    input.classList.remove('invalid');

                    if (!input.value.trim()) {
                        isValid = false;
                        errorMessage = 'This field is required';
                    } else if ((input.id === 'username' || input.id === 'reg_username') &&
                        !/^[a-zA-Z0-9_]+$/.test(input.value)) {
                        isValid = false;
                        errorMessage = 'Username can only contain letters, numbers, and underscores';
                    } else if ((input.id === 'password' || input.id === 'reg_password') &&
                        input.value.length < 6) {
                        isValid = false;
                        errorMessage = 'Password must be at least 6 characters long';
                    } else if (input.id === 'reg_email' &&
                        !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value)) {
                        isValid = false;
                        errorMessage = 'Please enter a valid email address';
                    } else if (input.id === 'reg_confirm_password' && confirmPasswordId) {
                        const passwordField = document.getElementById(confirmPasswordId);
                        if (passwordField && input.value !== passwordField.value) {
                            isValid = false;
                            errorMessage = 'Passwords do not match';
                        }
                    }

                    if (!isValid) {
                        input.classList.add('invalid');
                        if (errorElement) {
                            errorElement.textContent = errorMessage;
                            errorElement.style.display = 'block';
                        }
                    } else if (errorElement) {
                        errorElement.textContent = '';
                        errorElement.style.display = 'none';
                    }

                    return isValid;
                }

                form.addEventListener('submit', function(e) {
                    let formValid = true;

                    inputs.forEach(input => {
                        if (!validateInput(input, confirmPasswordFieldId)) {
                            formValid = false;
                        }
                    });

                    const errorSummary = form.querySelector('.form-error-summary');
                    if (!formValid && errorSummary) {
                        e.preventDefault();
                        errorSummary.textContent = 'Please correct the errors above before submitting';
                        errorSummary.style.display = 'block';
                    }
                });
            }
        }

        // Set up password visibility toggles
        function setupPasswordToggle(checkboxId, ...passwordFieldIds) {
            const toggleCheckbox = document.getElementById(checkboxId);
            if (toggleCheckbox) {
                toggleCheckbox.addEventListener('change', function() {
                    passwordFieldIds.forEach(fieldId => {
                        const passwordField = document.getElementById(fieldId);
                        if (passwordField) {
                            passwordField.type = this.checked ? 'text' : 'password';
                        }
                    });
                });
            }
        }

        // Function to set up form reset
        function setupFormReset(buttonSelector) {
            function clearSessionAndReset() {
                // Create a hidden form to submit a reset request
                var resetForm = document.createElement('form');
                resetForm.method = 'POST';
                resetForm.action = window.location.href;

                var resetInput = document.createElement('input');
                resetInput.type = 'hidden';
                resetInput.name = 'reset_form';
                resetInput.value = '1';

                resetForm.appendChild(resetInput);
                document.body.appendChild(resetForm);
                resetForm.submit();

                // Prevent the default reset behavior until our form submits
                return false;
            }

            // Add onclick handler to the reset buttons
            const resetButtons = document.querySelectorAll(buttonSelector);
            resetButtons.forEach(button => {
                button.onclick = clearSessionAndReset;
            });
        }

        // Initialize all validations and functions
        setupFormValidation('login-form', 'password');
        setupFormValidation('registration-form', 'reg_password', 'reg_password');

        setupPasswordToggle('show-password', 'password');
        setupPasswordToggle('show-reg-password', 'reg_password', 'reg_confirm_password');

        setupFormReset('.reset-button');

        // Additional validation for confirm password field
        const confirmPasswordField = document.getElementById('reg_confirm_password');
        const passwordField = document.getElementById('reg_password');

        if (confirmPasswordField && passwordField) {
            passwordField.addEventListener('change', function() {
                if (confirmPasswordField.value) {
                    const errorElement = confirmPasswordField.nextElementSibling;
                    if (this.value !== confirmPasswordField.value) {
                        confirmPasswordField.classList.add('invalid');
                        if (errorElement) {
                            errorElement.textContent = 'Passwords do not match';
                            errorElement.style.display = 'block';
                        }
                    } else {
                        confirmPasswordField.classList.remove('invalid');
                        if (errorElement) {
                            errorElement.textContent = '';
                            errorElement.style.display = 'none';
                        }
                    }
                }
            });
        }
    });
    </script>
</body>

</html>
