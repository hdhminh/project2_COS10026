<?php
require_once "settings.php"; // Include database settings

// Establish connection
session_start();
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
$reference = isset($_GET['id']) ? mysqli_real_escape_string($dbconn, $_GET['id']) : '';

if (!$dbconn) {
    die("<p class='error-message'>Unable to connect to the database: " . mysqli_connect_error() . "</p>");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="jobdetails-page">
    <div id="page-container">
        <div class="job-details-container">
            <?php
            if (!empty($reference)) {
                $query = "SELECT * FROM jobs WHERE Ref = '$reference'";
                $result = mysqli_query($dbconn, $query);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
            ?>
            <header class="job-header">
                <div class="job-title-section">
                    <h1 class="job-title"><?php echo htmlspecialchars($row['Title']); ?></h1>
                    <span class="job-reference">Ref: <?php echo htmlspecialchars($row['Ref']); ?></span>
                </div>
                <div class="job-actions">
                    <a href="jobs.php" class="apply-button">
                        <i class="fas fa-arrow-left"></i> Return to jobs
                    </a>
                    <button class="share-button" onclick="shareJob()">
                        <i class="fas fa-share-alt"></i> Share
                    </button>
                </div>
            </header>

            <div class="job-highlights">
                <div class="highlight-item">
                    <i class="fas fa-money-bill-wave"></i>
                    <div class="highlight-content">
                        <span class="highlight-label">Salary Range</span>
                        <span class="highlight-value"><?php echo htmlspecialchars($row['Salary']); ?></span>
                    </div>
                </div>
                <div class="highlight-item">
                    <i class="fas fa-user-tie"></i>
                    <div class="highlight-content">
                        <span class="highlight-label">Reports To</span>
                        <span class="highlight-value"><?php echo htmlspecialchars($row['Report to']); ?></span>
                    </div>
                </div>
                <div class="highlight-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="highlight-content">
                        <span class="highlight-label">Location</span>
                        <span class="highlight-value">Melbourne, Australia</span>
                    </div>
                </div>
                <div class="highlight-item">
                    <i class="fas fa-clock"></i>
                    <div class="highlight-content">
                        <span class="highlight-label">Job Type</span>
                        <span class="highlight-value">Full Time</span>
                    </div>
                </div>
            </div>

            <div class="job-content">
                <div class="job-section">
                    <h2 class="section-title"><i class="fas fa-info-circle"></i> Overview</h2>
                    <div class="section-content">
                        <?php echo nl2br(htmlspecialchars($row['Overview'])); ?>
                    </div>
                </div>

                <div class="job-section">
                    <h2 class="section-title"><i class="fas fa-tasks"></i> Key Responsibilities</h2>
                    <div class="section-content">
                        <?php echo nl2br(htmlspecialchars($row['Key Responsibilities'])); ?>
                    </div>
                </div>

                <div class="job-section">
                    <h2 class="section-title"><i class="fas fa-check-circle"></i> Essential Requirements</h2>
                    <div class="section-content">
                        <?php echo nl2br(htmlspecialchars($row['Requirements'])); ?>
                    </div>
                </div>

                <div class="job-section">
                    <h2 class="section-title"><i class="fas fa-star"></i> Preferable Skills</h2>
                    <div class="section-content">
                        <?php echo nl2br(htmlspecialchars($row['Skills'])); ?>
                    </div>
                </div>
            </div>

            <div class="job-footer">
                <a href="apply.php?job=<?php echo htmlspecialchars($row['Ref']); ?>" class="apply-button large">
                    <i class="fas fa-paper-plane"></i> Apply for this Position
                </a>
                <div class="job-footer-info">
                    <p>Reference: <?php echo htmlspecialchars($row['Ref']); ?></p>
                    <p>Posted: <?php echo date("F j, Y"); ?></p>
                </div>
            </div>
            <?php
                } else {
                    echo '<div class="error-container">
                            <div class="error-icon"><i class="fas fa-exclamation-triangle"></i></div>
                            <h2>Job Not Found</h2>
                            <p>The job you\'re looking for doesn\'t exist or has been removed.</p>
                            <a href="jobs.php" class="back-button"><i class="fas fa-arrow-left"></i> Back to Jobs</a>
                          </div>';
                }
            } else {
                echo '<div class="error-container">
                        <div class="error-icon"><i class="fas fa-exclamation-triangle"></i></div>
                        <h2>Missing Job Reference</h2>
                        <p>No job reference was provided.</p>
                        <a href="jobs.php" class="back-button"><i class="fas fa-arrow-left"></i> Back to Jobs</a>
                      </div>';
            }
            
            // Close the database connection
            if (isset($result) && is_object($result)) {
                mysqli_free_result($result);
            }
            mysqli_close($dbconn);
            ?>
        </div>
    </div>
    <script>
    function shareJob() {
        // Job sharing functionality
        if (navigator.share) {
            navigator.share({
                    title: '<?php echo isset($row) ? htmlspecialchars($row['Title']) : "Job Opening"; ?>',
                    text: 'Check out this job opportunity!',
                    url: window.location.href
                })
                .catch((error) => console.log('Error sharing:', error));
        } else {
            // Fallback for browsers that don't support the Web Share API
            prompt("Copy this link to share:", window.location.href);
        }
    }
    </script>
</body>

</html>
