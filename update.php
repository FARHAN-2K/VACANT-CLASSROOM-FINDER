<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: admin_login.html"); exit(); }

$conn = new mysqli("localhost", "root", "", "classroom_db");

$id   = intval($_POST['id']);
$r101 = intval($_POST['r101']);
$r102 = intval($_POST['r102']);
$r201 = intval($_POST['r201']);
$r202 = intval($_POST['r202']);

$stmt = $conn->prepare("UPDATE availability SET room_101 = ?, room_102 = ?, room_201 = ?, room_202 = ? WHERE id = ?");
$stmt->bind_param("iiiii", $r101, $r102, $r201, $r202, $id);
$stmt->execute();

header("Location: admin_panel.php");
?>
