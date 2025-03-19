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
$firstName    = trim(isset($_POST['First_Name']) ? $_POST['First_Name'] : '');
$lastName     = trim(isset($_POST['Last_Name']) ? $_POST['Last_Name'] : '');
$dateOfBirth  = trim(isset($_POST['DOB']) ? $_POST['DOB'] : '');
$gender       = trim(isset($_POST['Gender']) ? $_POST['Gender'] : '');
$street       = trim(isset($_POST['Street_Address']) ? $_POST['Street_Address'] : '');
$suburb       = trim(isset($_POST['Suburb/town']) ? $_POST['Suburb/town'] : '');
$state        = trim(isset($_POST['state']) ? $_POST['state'] : '');
$postcode     = trim(isset($_POST['Postcode']) ? $_POST['Postcode'] : '');
$email        = trim(isset($_POST['Email']) ? $_POST['Email'] : '');
$phone        = trim(isset($_POST['Phone']) ? $_POST['Phone'] : '');
$skills = isset($_POST['Skills']) ? $_POST['Skills'] : array();
$skill1 = isset($skills[0]) ? $skills[0] : '';
$skill2 = isset($skills[1]) ? $skills[1] : '';
$skill3 = isset($skills[2]) ? $skills[2] : '';
$skill4 = isset($skills[3]) ? $skills[3] : '';
$skill5 = isset($skills[4]) ? $skills[4] : '';
$otherSkills = isset($skills[5]) ? $skills[5] : '';


$createTableSQL = "CREATE TABLE IF NOT EXISTS eoi (
    eoi_id INT AUTO_INCREMENT PRIMARY KEY,
    jobRefNum VARCHAR(20) NOT NULL,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    dateOfBirth DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    street VARCHAR(100) NOT NULL,
    suburb VARCHAR(50) NOT NULL,
    state VARCHAR(10) NOT NULL,
    postcode VARCHAR(10) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    skill1 VARCHAR(50),
    skill2 VARCHAR(50),
    skill3 VARCHAR(50),
    skill4 VARCHAR(50),
    skill5 VARCHAR(50),
    otherSkills TEXT,
    status VARCHAR(20) DEFAULT 'New'
);";

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
if (empty($firstName)) showError("First Name is required.");
if (empty($lastName)) showError("Last Name is required.");
if (empty($street)) showError("Street is required.");
if (empty($suburb)) showError("Suburb is required.");
if (empty($state)) showError("State is required.");
if (empty($postcode)) showError("Postcode is required.");
if (empty($email)) showError("Email is required.");
if (empty($phone)) showError("Phone Number is required.");

// b) Check job reference number is exactly 5 alphanumeric
if (!preg_match('/^[A-Za-z0-9]{5}$/', $jobRefNum)) showError("Job Reference Number must be exactly 5 alphanumeric characters.");
if (!preg_match('/^[a-zA-Z ]{1,20}$/', $firstName)) showError("First Name must be 1–20 alphabetic characters.");
if (!preg_match('/^[A-Za-z-]{1,20}$/', $lastName)) showError("Last Name must be 1–20 alphabetic characters.");
if (!preg_match('/^(0[1-9]|[12]\d|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/', $dateOfBirth)) showError("Date of Birth must be in format dd/mm/yyyy.");
if (!in_array($state, ["VIC","NSW","QLD","NT","WA","SA","TAS","ACT"])) showError("Invalid state selection.");
if (!preg_match('/^\d{4}$/', $postcode)) showError("Postcode must be exactly 4 digits.");
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) showError("Invalid email address format.");
if (!preg_match('/^[0-9 ]{8,12}$/', $phone)) showError("Phone number must be 8–12 digits/spaces.");


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

if (!mysqli_query($conn, $createTableSQL)) {
    die("Error creating table: " . mysqli_error($conn));
}

//
// 6. Insert the record
//
$insertSQL = "
    INSERT INTO eoi
    (JobReferenceNumber, FirstName, LastName, DateOfBirth, Gender,
     StreetAddress, Suburb, State, Postcode, Email, Phone,
     Skill1, Skill2, Skill3, Skill4, Skill5, OtherSkills)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
";

$stmt = mysqli_prepare($conn, $insertSQL);
if (!$stmt) {
    die("Error preparing statement: " . mysqli_error($conn));
}

// Bind parameters (s = string). Adapt if you use other data types.
mysqli_stmt_bind_param($stmt, "sssssssssssssssss",
    $jobRefNum,
    $firstName,
    $lastName,
    $dateOfBirth,
    $gender,
    $street,
    $suburb,
    $state,
    $postcode,
    $email,
    $phone,
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
