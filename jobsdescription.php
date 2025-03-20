<?php
require_once "settings.php"; // Include database settings

// Establish connection
session_start();
$dbconn = @mysqli_connect($host, $user, $pwd, $sql_db);
$reference = $_GET['id'];

if (!$dbconn) {
    die("<p class='error-message'>Unable to connect to the database: " . mysqli_connect_error() . "</p>");
}
else {
    $query = "SELECT * FROM jobs WHERE Ref = '$reference'";
    $result = mysqli_query ($dbconn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>" . $row['Title'] . "</p>";
            echo "<p>" . $row['Ref'] . "</p>";
            echo "<p>" . $row['Salary'] . "</p>";
            echo "<p>" . $row['Report to'] . "</p>";
            echo "<p>" . $row['Overview'] . "</p>";
            echo "<p>" . $row['Key Responsibilities'] . "</p>";
            echo "<p>" . $row['Requirements'] . "</p>";
            echo "<p>" . $row['Skills'] . "</p>";
        }
    }
    else {
        echo "<p>There are no jobs to display.</p>";
    }
}
?>