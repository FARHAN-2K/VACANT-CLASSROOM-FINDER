<?php
ob_start();
session_start();
include 'db.php';

// Redirect if already logged in
if (isset($_SESSION['admin'])) {
    header("Location: admin_dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="form-card">
        <h2>Admin Login</h2>
        <form method="POST" action="admin_login_process.php">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p><a href="index.php">Back to User Login</a></p>
    </div>
</div>
</body>
</html>
