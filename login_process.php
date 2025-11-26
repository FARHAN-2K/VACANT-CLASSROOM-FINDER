<?php
session_start();
include "db.php";

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM users WHERE email='$email'";
$res = $conn->query($sql);

if ($res->num_rows == 1) {
    $user = $res->fetch_assoc();

    if (password_verify($pass, $user['password'])) {
        $_SESSION['user'] = $user['fullname'];
        header("Location: user_dashboard.php");
        exit();
    }
}

echo "<script>alert('Invalid email or password'); window.location='index.php';</script>";
?>
