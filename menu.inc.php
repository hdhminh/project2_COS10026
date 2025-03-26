<div class="navbar">
    <a href="index.php">Home</a>
    <a href="jobs.php" alt="10477308@student.swin.edu.au">Jobs</a>
    <a href="apply.php" alt="104777308@student.swin.edu.au">Apply</a>
    <a href="enhancements.php" alt="105505856@student.swin.edu.au">Enhance</a>
    <a href="about.php" alt="105551558@student.swin.edu.au">About Us</a>

    <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
    <a href="manage.php"><i class="fas fa-cogs"></i> Manage</a>
    <?php endif; ?>

    <?php if (isset($_SESSION['user_id'])): ?>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    <?php else: ?>
    <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
    <a href="register.php"><i class="fas fa-user-plus"></i> Register</a>
    <?php endif; ?>
</div>
