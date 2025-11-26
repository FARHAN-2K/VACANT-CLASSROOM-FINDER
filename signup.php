<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Create Account</h1>

    <div class="form-card">
        <h2>Signup</h2>

        <form action="signup_process.php" method="POST">

            <label>Full Name</label>
            <input type="text" name="fullname" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit">Create Account</button>
        </form>

        <p style="margin-top:15px;">
            Already have an account?
            <a href="index.php" class="link">Login here</a>
        </p>
    </div>

</div>

</body>
</html>
