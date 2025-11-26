<?php
$servername = "sql311.infinityfree.com";  // MySQL Host Name
$username = "if0_40511545";               // MySQL User Name
$password = "2k4Oh9sO8Q";     // MySQL Password
$dbname = "if0_40511545_database";        // MySQL DB Name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
