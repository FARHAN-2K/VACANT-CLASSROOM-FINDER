<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: admin_login.html"); exit(); }

$conn = new mysqli("localhost", "root", "", "classroom_db");
$id = intval($_GET['id'] ?? 0);

$stmt = $conn->prepare("SELECT * FROM availability WHERE id = ? LIMIT 1");
$stmt->bind_param("i", $id);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Slot</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Edit: <?php echo htmlspecialchars($row['day'] . ' — ' . $row['time_slot']); ?></h2>

    <form action="update.php" method="POST" class="form-card">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>Day</label>
        <input type="text" value="<?php echo htmlspecialchars($row['day']); ?>" readonly>

        <label>Time Slot</label>
        <input type="text" value="<?php echo htmlspecialchars($row['time_slot']); ?>" readonly>

        <label>Room 101 (0=Available, 1=Not Available)</label>
        <input type="number" min="0" max="1" name="r101" value="<?php echo $row['room_101']; ?>">

        <label>Room 102</label>
        <input type="number" min="0" max="1" name="r102" value="<?php echo $row['room_102']; ?>">

        <label>Room 201</label>
        <input type="number" min="0" max="1" name="r201" value="<?php echo $row['room_201']; ?>">

        <label>Room 202</label>
        <input type="number" min="0" max="1" name="r202" value="<?php echo $row['room_202']; ?>">

        <button type="submit">Save Changes</button>
    </form>

    <a class="back-btn" href="admin_panel.php">← Back</a>
</div>

</body>
</html>
