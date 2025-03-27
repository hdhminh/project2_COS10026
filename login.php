<?php
// login.php - Login page
require_once "settings.php"; // Include database settings
session_start();

// Check if user is already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = "";

// Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
    
    if (!$dbconn) {
        $error = "Database connection failed: " . mysqli_connect_error();
    } else {
        $username = mysqli_real_escape_string($dbconn, $_POST['username']);
        $password = mysqli_real_escape_string($dbconn, $_POST['password']);
        
        // Query to check user credentials
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($dbconn, $query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            
            // Check password (plain text)
            if ($password === $user['password']) {
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['is_admin'] = $user['is_admin'];
                
                // Store additional user info in session if needed
                $_SESSION['first_name'] = $user['FirstName'];
                $_SESSION['last_name'] = $user['LastName'];
                $_SESSION['email'] = $user['email'];
                
                // Redirect to homepage
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid username or password";
            }
        } else {
            $error = "Invalid username or password";
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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="login-page">
    <div id="page-container">
        <div class="auth-container">
            <div class="auth-box">
                <h2><i class="fas fa-user-lock"></i> Login</h2>

                <?php if (!empty($error)): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
                <?php endif; ?>

                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="form-group">
                        <label for="username"><i class="fas fa-user"></i> Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="fas fa-key"></i> Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <button type="submit" class="submit-button">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </form>

                <div class="auth-links">
                    <p>Don't have an account? <a href="register.php">Register here</a></p>
                    <p><a href="index.php">Back to Home</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
