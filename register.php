<?php
// register.php - Registration page
require_once "settings.php"; // Include database settings
session_start();

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = "";
$success = "";

// Process registration form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
    
    if (!$dbconn) {
        $error = "Database connection failed: " . mysqli_connect_error();
    } else {
        // Sanitize and escape user inputs
        $username = mysqli_real_escape_string($dbconn, $_POST['username']);
        $email = mysqli_real_escape_string($dbconn, $_POST['email']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        
        // Additional fields from the form
        $first_name = mysqli_real_escape_string($dbconn, $_POST['First_Name']);
        $last_name = mysqli_real_escape_string($dbconn, $_POST['Last_Name']);
        $dob = mysqli_real_escape_string($dbconn, $_POST['DOB']);
        $gender = mysqli_real_escape_string($dbconn, $_POST['Gender']);
        $street_address = mysqli_real_escape_string($dbconn, $_POST['Street_Address']);
        $suburb = mysqli_real_escape_string($dbconn, $_POST['Suburb/town']);
        $state = mysqli_real_escape_string($dbconn, $_POST['state']);
        $postcode = mysqli_real_escape_string($dbconn, $_POST['Postcode']);
        $phone = mysqli_real_escape_string($dbconn, $_POST['Phone']);
        
        // Validate input
        if (empty($username) || empty($email) || empty($password) || 
            empty($first_name) || empty($last_name) || empty($dob) || 
            empty($street_address) || empty($suburb) || empty($state) || 
            empty($postcode) || empty($phone)) {
            $error = "All fields are required";
        } elseif ($password != $confirm_password) {
            $error = "Passwords do not match";
        } else {
            // Check if username or email already exists
            $check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $check_result = mysqli_query($dbconn, $check_query);
            
            if ($check_result && mysqli_num_rows($check_result) > 0) {
                $error = "Username or email already exists";
            } else {
                // Insert new user with all fields
                $insert_query = "INSERT INTO users (
                    username, 
                    email, 
                    password, 
                    is_admin, 
                    FirstName, 
                    LastName, 
                    DateOfBirth, 
                    Gender, 
                    StreetAddress, 
                    Suburb, 
                    State, 
                    Postcode, 
                    Phone
                ) VALUES (
                    '$username', 
                    '$email', 
                    '$password', 
                    0, 
                    '$first_name', 
                    '$last_name', 
                    '$dob', 
                    '$gender', 
                    '$street_address', 
                    '$suburb', 
                    '$state', 
                    '$postcode', 
                    '$phone'
                )";
                
                if (mysqli_query($dbconn, $insert_query)) {
                    $success = "Registration successful. You can now log in.";
                } else {
                    $error = "Registration failed: " . mysqli_error($dbconn);
                }
            }
        }
        
        mysqli_close($dbconn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="register-page">
    <div id="page-container">
        <div class="auth-container">
            <div class="auth-box">
                <h2><i class="fas fa-user-plus"></i> Register</h2>

                <div class="progress-indicator">
                    <div class="progress-step active">1</div>
                    <div class="progress-step">2</div>
                    <div class="progress-step">3</div>
                </div>

                <?php if (!empty($error)): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
                <?php endif; ?>

                <?php if (!empty($success)): ?>
                <div class="success-message">
                    <i class="fas fa-check-circle"></i> <?php echo $success; ?>
                </div>
                <?php endif; ?>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                    id="registrationForm">
                    <!-- Account Information Section -->
                    <div class="form-section active" id="accountSection">
                        <div class="form-group">
                            <label for="username"><i class="fas fa-user"></i> Username</label>
                            <input type="text" id="username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="password"><i class="fas fa-key"></i> Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password"><i class="fas fa-lock"></i> Confirm Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" required>
                        </div>

                        <button type="button" class="next-section-btn" onclick="nextSection()">
                            Next: Personal Information <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <!-- Personal Information Section -->
                    <div class="form-section" id="personalSection">
                        <div class="form-group">
                            <label for="FirstName"><i class="fas fa-user"></i> First Name</label>
                            <input type="text" id="FirstName" name="First_Name" maxlength="20" required>
                        </div>

                        <div class="form-group">
                            <label for="LastName"><i class="fas fa-user"></i> Last Name</label>
                            <input type="text" id="LastName" name="Last_Name" maxlength="20" required>
                        </div>

                        <div class="form-group">
                            <label for="DateOfBirth"><i class="fas fa-calendar"></i> Date of Birth</label>
                            <input type="text" id="DateOfBirth" name="DOB" placeholder="DD/MM/YYYY"
                                pattern="\d{2}/\d{2}/\d{4}" required>
                        </div>

                        <div class="form-group">
                            <label for="genders"><i class="fas fa-venus-mars"></i> Gender</label>
                            <div class="gender-options">
                                <input type="radio" id="male" name="Gender" value="Male" checked>
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="Gender" value="Female">
                                <label for="female">Female</label>
                                <input type="radio" id="others" name="Gender" value="Others">
                                <label for="others">Others</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="PhoneNumber"><i class="fas fa-phone"></i> Phone Number</label>
                            <input type="text" id="PhoneNumber" name="Phone" pattern="[0-9]+" required>
                        </div>

                        <div class="form-navigation">
                            <button type="button" class="next-section-btn" onclick="previousSection()">
                                <i class="fas fa-arrow-left"></i> Previous
                            </button>
                            <button type="button" class="next-section-btn" onclick="nextSection()">
                                Next: Address <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Address Section -->
                    <div class="form-section" id="addressSection">
                        <div class="form-group">
                            <label for="StreetAddress"><i class="fas fa-road"></i> Street Address</label>
                            <input type="text" id="StreetAddress" name="Street_Address" maxlength="40" required>
                        </div>

                        <div class="form-group">
                            <label for="SuburbTown"><i class="fas fa-city"></i> Suburb/Town</label>
                            <input type="text" id="SuburbTown" name="Suburb/town" maxlength="40" required>
                        </div>

                        <div class="form-group">
                            <label for="State"><i class="fas fa-map-marker-alt"></i> State</label>
                            <select name="state" id="State" required>
                                <option value="" disabled selected>Please Select Your State</option>
                                <option value="VIC">VIC</option>
                                <option value="NSW">NSW</option>
                                <option value="QLD">QLD</option>
                                <option value="NT">NT</option>
                                <option value="WA">WA</option>
                                <option value="SA">SA</option>
                                <option value="TAS">TAS</option>
                                <option value="ACT">ACT</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="Postcode"><i class="fas fa-mail-bulk"></i> Post Code</label>
                            <input type="text" id="Postcode" name="Postcode" maxlength="4" pattern="[0-9]+" required>
                        </div>

                        <div class="form-navigation">
                            <button type="button" class="next-section-btn" onclick="previousSection()">
                                <i class="fas fa-arrow-left"></i> Previous
                            </button>
                            <button type="submit" class="submit-button">
                                <i class="fas fa-user-plus"></i> Register
                            </button>
                        </div>
                    </div>
                </form>

                <div class="auth-links">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                    <p><a href="index.php">Back to Home</a></p>
                </div>
            </div>
        </div>
    </div>

    <script>
    let currentSection = 0;
    const sections = document.querySelectorAll('.form-section');
    const progressSteps = document.querySelectorAll('.progress-step');

    function nextSection() {
        // Basic validation for the current section
        const currentSectionElement = sections[currentSection];
        const inputs = currentSectionElement.querySelectorAll('input, select');
        let isValid = true;

        inputs.forEach(input => {
            if (!input.checkValidity()) {
                input.reportValidity();
                isValid = false;
            }
        });

        if (isValid && currentSection < sections.length - 1) {
            sections[currentSection].classList.remove('active');
            progressSteps[currentSection].classList.remove('active');

            currentSection++;

            sections[currentSection].classList.add('active');
            progressSteps[currentSection].classList.add('active');
        }
    }

    function previousSection() {
        if (currentSection > 0) {
            sections[currentSection].classList.remove('active');
            progressSteps[currentSection].classList.remove('active');

            currentSection--;

            sections[currentSection].classList.add('active');
            progressSteps[currentSection].classList.add('active');
        }
    }
    </script>
</body>

</html>
