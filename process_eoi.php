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
$jobRefNum    = trim($_POST['jobRefNum'] ?? '');
$firstName    = trim($_POST['firstName'] ?? '');
$lastName     = trim($_POST['lastName'] ?? '');
$dateOfBirth  = trim($_POST['dob'] ?? '');
$gender       = trim($_POST['gender'] ?? '');
$street       = trim($_POST['street'] ?? '');
$suburb       = trim($_POST['suburb'] ?? '');
$state        = trim($_POST['state'] ?? '');
$postcode     = trim($_POST['postcode'] ?? '');
$email        = trim($_POST['email'] ?? '');
$phone        = trim($_POST['phone'] ?? '');
$skill1       = trim($_POST['skill1'] ?? '');
$skill2       = trim($_POST['skill2'] ?? '');
$skill3       = trim($_POST['skill3'] ?? '');
$skill4       = trim($_POST['skill4'] ?? '');
$skill5       = trim($_POST['skill5'] ?? '');
$otherSkills  = trim($_POST['otherSkills'] ?? '');

// Remove backslashes and HTML special chars
$jobRefNum    = strip_tags(stripslashes($jobRefNum));
// ... Repeat for each field, or create a helper function that does both 
//     strip_tags() and stripslashes(), e.g. a "sanitize()" function

//
// 3. Server-side validation
//
// a) Required fields not empty?
if (empty($jobRefNum) || empty($firstName) || empty($lastName) ||
    empty($street) || empty($suburb) || empty($state) ||
    empty($postcode) || empty($email) || empty($phone)) {
    die("One or more required fields are missing. Please go back and try again.");
}

// b) Check job reference number is exactly 5 alphanumeric
if (!preg_match('/^[A-Za-z0-9]{5}$/', $jobRefNum)) {
    die("Job Reference Number must be exactly 5 alphanumeric characters.");
}

// c) Check names (only letters, up to 20 chars)
if (!preg_match('/^[A-Za-z]{1,20}$/', $firstName)) {
    die("First name must be 1–20 alphabetic characters.");
}
if (!preg_match('/^[A-Za-z]{1,20}$/', $lastName)) {
    die("Last name must be 1–20 alphabetic characters.");
}

// d) Validate date of birth is dd/mm/yyyy and age between 15 and 80 (example)
$dobPattern = '/^(0[1-9]|[12]\d|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/';
if (!preg_match($dobPattern, $dateOfBirth)) {
    die("Date of birth must be in format dd/mm/yyyy.");
}
// Additional check for age range...

// e) Validate state is one of the given values
$validStates = ["VIC","NSW","QLD","NT","WA","SA","TAS","ACT"];
if (!in_array($state, $validStates)) {
    die("Invalid state selection.");
}

// f) Validate postcode is exactly 4 digits
if (!preg_match('/^\d{4}$/', $postcode)) {
    die("Postcode must be exactly 4 digits.");
}

// g) Basic email format check
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address format.");
}

// h) Phone 8 to 12 digits (optionally allow spaces)
if (!preg_match('/^[0-9 ]{8,12}$/', $phone)) {
    die("Phone number must be 8–12 digits/spaces.");
}

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
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
";

$stmt = mysqli_prepare($conn, $insertSQL);
if (!$stmt) {
    die("Error preparing statement: " . mysqli_error($conn));
}

// Bind parameters (s = string). Adapt if you use other data types.
mysqli_stmt_bind_param($stmt, "ssssssssssssssss",
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
echo "<h1>Thank you!</h1>";
echo "<p>Your Expression of Interest has been recorded.</p>";
echo "<p>Your unique EOI Number is: <strong>{$newEOINumber}</strong></p>";

?>
