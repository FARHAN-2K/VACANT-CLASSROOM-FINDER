<?php
session_start();
include 'db.php';

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $day = $_POST['day'];
    $time = $_POST['time'];
    
    // Rooms availability: 0 = available, 1 = not available
    $room_101 = isset($_POST['room_101']) ? 1 : 0;
    $room_102 = isset($_POST['room_102']) ? 1 : 0;
    $room_201 = isset($_POST['room_201']) ? 1 : 0;
    $room_202 = isset($_POST['room_202']) ? 1 : 0;

    // Check if entry exists
    $check = $conn->query("SELECT * FROM availability WHERE day='$day' AND time_slot='$time'");
    if ($check->num_rows > 0) {
        // Update existing
        $conn->query("UPDATE availability SET 
            room_101=$room_101, room_102=$room_102, room_201=$room_201, room_202=$room_202
            WHERE day='$day' AND time_slot='$time'");
        $message = "Updated successfully!";
    } else {
        // Insert new
        $conn->query("INSERT INTO availability (day, time_slot, room_101, room_102, room_201, room_202)
            VALUES ('$day', '$time', $room_101, $room_102, $room_201, $room_202)");
        $message = "Added successfully!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h1>Welcome, <?php echo $_SESSION['admin']; ?> 👑</h1>

<div class="form-card">
    <h2>Manage Classroom Availability</h2>
    
    <?php if(isset($message)) echo "<p style='color:lime'>$message</p>"; ?>

    <form method="POST">
        <label>Day</label>
        <select name="day" required>
            <option>Monday</option>
            <option>Tuesday</option>
            <option>Wednesday</option>
            <option>Thursday</option>
            <option>Friday</option>
        </select>

        <label>Time Slot</label>
        <select name="time" required>
            <option>07:00 - 09:00</option>
            <option>09:00 - 11:00</option>
            <option>11:00 - 13:00</option>
            <option>14:00 - 16:00</option>
            <option>17:00 - 19:00</option>
        </select>

        <h3>Rooms</h3>
        <label><input type="checkbox" name="room_101"> Room 101 Not Available</label><br>
        <label><input type="checkbox" name="room_102"> Room 102 Not Available</label><br>
        <label><input type="checkbox" name="room_201"> Room 201 Not Available</label><br>
        <label><input type="checkbox" name="room_202"> Room 202 Not Available</label><br>

        <button type="submit">Save</button>
    </form>
</div>

<a href="admin_logout.php" class="back-btn">Logout</a>
</div>
</body>
</html>


