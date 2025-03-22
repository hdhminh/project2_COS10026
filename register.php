<?php
// register.php - Registration page (No password hashing)
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
        $username = mysqli_real_escape_string($dbconn, $_POST['username']);
        $email = mysqli_real_escape_string($dbconn, $_POST['email']);
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        
        // Validate input
        if (empty($username) || empty($email) || empty($password)) {
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
                // Insert new user (plain text password, is_admin = 0)
                $insert_query = "INSERT INTO users (username, email, password, is_admin) 
                                 VALUES ('$username', '$email', '$password', 0)";
                
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

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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

                    <button type="submit" class="submit-button">
                        <i class="fas fa-user-plus"></i> Register
                    </button>
                </form>

                <div class="auth-links">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                    <p><a href="index.php">Back to Home</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>