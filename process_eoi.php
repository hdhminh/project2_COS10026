<?php
/********************************************
  process_eoi.php
********************************************/

//
// 1. Prevent direct access
//
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Redirect user back to the form if they try to access directly
    header("Location: apply.php");
    exit;
}

//
// 2. Collect & sanitize form data
//
// Example fields—adjust for your actual form names
$jobRefNum    = trim(isset($_POST['position']) ? $_POST['position'] : '');
$skills = isset($_POST['Skills']) ? $_POST['Skills'] : array();
$skill1 = isset($skills[0]) ? $skills[0] : '';
$skill2 = isset($skills[1]) ? $skills[1] : '';
$skill3 = isset($skills[2]) ? $skills[2] : '';
$skill4 = isset($skills[3]) ? $skills[3] : '';
$skill5 = isset($skills[4]) ? $skills[4] : '';
$otherSkills = isset($skills[5]) ? $skills[5] : '';

// Remove backslashes and HTML special chars
$jobRefNum    = strip_tags(stripslashes($jobRefNum));
// ... Repeat for each field, or create a helper function that does both 
//     strip_tags() and stripslashes(), e.g. a "sanitize()" function

//
// 3. Server-side validation
//
// a) Required fields not empty?
//if (empty($jobRefNum) || empty($firstName) || empty($lastName) ||
//    empty($street) || empty($suburb) || empty($state) ||
//    empty($postcode) || empty($email) || empty($phone)) {
//    die("One or more required fields are missing. Please go back and try again.");
//}
// Validation errors
function showError($message) {
    echo "<script>alert('$message'); window.history.back();</script>";
    exit;
}

if (empty($jobRefNum)) showError("Job Reference Number is required.");

// b) Check job reference number is exactly 5 alphanumeric
if (!preg_match('/^[A-Za-z0-9]{5}$/', $jobRefNum)) showError("Job Reference Number must be exactly 5 alphanumeric characters.");

// i) If a “check box” was selected requiring OtherSkills, ensure not empty, etc.
// if ( /* skill checkbox was ticked */ && empty($otherSkills)) {...}

//
// 4. Connect to the database
//
$host   = "feenix-mariadb.swin.edu.au";  // or your DB host
$user   = "s104777308";       // DB username
$pass   = "070905";           // DB password
$dbName = "s104777308_db"; // DB name

$conn = mysqli_connect($host, $user, $pass, $dbName);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}


//
// 6. Insert the record
//

session_start(); // Start session to get user id

if (!isset($_SESSION['user_id'])) {
    die("Error: You must be logged in to apply."); // Check login
}


$user_id = $_SESSION['user_id']; // Get user id from users database

$insertSQL = "
    INSERT INTO eoi
    (user_id, JobReferenceNumber,
     Skill1, Skill2, Skill3, Skill4, Skill5, OtherSkills)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
";

$stmt = mysqli_prepare($conn, $insertSQL);
if (!$stmt) {
    die("Error preparing statement: " . mysqli_error($conn));
}

// Bind parameters (s = string). Adapt if you use other data types.
mysqli_stmt_bind_param($stmt, "isssssss",
    $user_id,
    $jobRefNum,
    $skill1,
    $skill2,
    $skill3,
    $skill4,
    $skill5,
    $otherSkills
);

if (!mysqli_stmt_execute($stmt)) {
    die("Error executing insert: " . mysqli_stmt_error($stmt));
}

// Get the auto-generated EOINumber
$newEOINumber = mysqli_insert_id($conn);

mysqli_stmt_close($stmt);
mysqli_close($conn);

//
// 7. Display a confirmation message
//
header("Location: confirmation.php?eoi=$newEOINumber");
exit()

?>
