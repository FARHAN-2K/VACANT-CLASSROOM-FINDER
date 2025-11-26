<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: index.php"); exit(); }
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Find Classroom</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container py-5">
    <h1 class="mb-4">Hello <?= $_SESSION['user']; ?> 👋</h1>

    <!-- Classroom Search Card -->
    <div class="card p-4 mb-4" style="background-color:#1a1a1a; color:white; box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.5);">
        <h2 class="mb-3">Check Classroom Availability</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Day</label>
                <select name="day" class="form-select" required>
                    <option>Monday</option>
                    <option>Tuesday</option>
                    <option>Wednesday</option>
                    <option>Thursday</option>
                    <option>Friday</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Time Slot</label>
                <select name="time" class="form-select" required>
                    <option>07:00 - 09:00</option>
                    <option>09:00 - 11:00</option>
                    <option>11:00 - 13:00</option>
                    <option>14:00 - 16:00</option>
                    <option>17:00 - 19:00</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success w-100">Search</button>
        </form>
    </div>

    <!-- Classroom Results -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $day = $_POST['day'];
        $time = $_POST['time'];

        $sql = "SELECT * FROM availability WHERE day='$day' AND time_slot='$time'";
        $res = $conn->query($sql);

        if ($res->num_rows == 1) {
            $row = $res->fetch_assoc();

            echo "<div class='card p-4 mb-3' style='background-color:#1a1a1a; color:white; box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.5);'>";
            echo "<h3 class='mb-3'>$day ($time)</h3>";
            echo "<div class='row'>";

            foreach (['room_101','room_102','room_201','room_202'] as $room) {
                $status = $row[$room] == 0 ? "Available" : "Not Available";
                $color = $row[$room] == 0 ? "success" : "danger";
                echo "<div class='col-md-6 mb-2'>";
                echo "<div class='card p-3' style='background-color:#111; color:white; box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,0.5);'>";
                echo "<h5 class='card-title'>$room</h5>";
                echo "<p class='card-text text-$color fw-bold'>$status</p>";
                echo "</div>";
                echo "</div>";
            }

            echo "</div>";
            echo "</div>";

        } else {
            echo "<div class='alert alert-warning'>No data found for $day ($time).</div>";
        }
    }
    ?>

    <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
</div>

</body>
</html>
