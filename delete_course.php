<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "elearning");

$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM course WHERE id=$id");

header("Location: admin_dashboard.php#courses");
?>