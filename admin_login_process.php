<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE email='$email'";
    $res = $conn->query($sql);

    if ($res->num_rows == 1) {
        $admin = $res->fetch_assoc();

        // Verify password
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin'] = $admin['fullname'];
            header("Location: admin_dashboard.php");
            exit();
        } else {
            echo "<p>Incorrect password. <a href='admin_login.php'>Try again</a></p>";
        }
    } else {
        echo "<p>No admin found with that email. <a href='admin_login.php'>Try again</a></p>";
    }
} else {
    header("Location: admin_login.php");
    exit();
}
?>
