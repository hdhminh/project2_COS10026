<?php
// settings.php - Connect data server
$host = "feenix-mariadb.swin.edu.au";
$user = "s104777308"; 
$pwd = "070905";
$sql_db = "s104777308_db";

$conn = new mysqli($host, $user, $pwd, $sql_db);

// Check connection status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>