<?php
$day = $_POST['day'] ?? '';
$time = $_POST['time_slot'] ?? '';

$conn = new mysqli("localhost", "root", "", "classroom_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM availability WHERE day = ? AND time_slot = ? LIMIT 1");
$stmt->bind_param("ss", $day, $time);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container result">
    <h2>Availability for <?php echo htmlspecialchars($day . ' — ' . $time); ?></h2>

    <?php if ($row): ?>
    <div class="card">
        <p><strong>Room 101:</strong> <?php echo $row['room_101'] == 0 ? 'Available (0)' : 'Not Available (1)'; ?></p>
        <p><strong>Room 102:</strong> <?php echo $row['room_102'] == 0 ? 'Available (0)' : 'Not Available (1)'; ?></p>
        <p><strong>Room 201:</strong> <?php echo $row['room_201'] == 0 ? 'Available (0)' : 'Not Available (1)'; ?></p>
        <p><strong>Room 202:</strong> <?php echo $row['room_202'] == 0 ? 'Available (0)' : 'Not Available (1)'; ?></p>
    </div>
    <?php else: ?>
    <div class="card">
        <p>No data found for that day and time slot.</p>
    </div>
    <?php endif; ?>

    <a href="index.html" class="back-btn">← Back</a>
</div>

</body>
</html>
