<?php
session_start();
include "db.php";

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users(fullname, email, password) VALUES('$fullname', '$email', '$password')";

if ($conn->query($sql)) {
    echo "<script>alert('Signup successful! Please login.'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Email already in use.'); window.location='signup.php';</script>";
}
?>
