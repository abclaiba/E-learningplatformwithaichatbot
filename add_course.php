<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "elearning");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query($conn,
        "INSERT INTO course
        (course_name, description, instructor)
         VALUES ('$title', '$description', 'Admin')"
    );

    header("Location: admin_dashboard.php#courses");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>

<div class="content-box">
    <h2>Add New Course</h2>

    <form method="POST">
        <input type="text" name="title" placeholder="Course Title" required>
        <textarea name="description" placeholder="Course Description" required></textarea>
        <button type="submit">Add Course</button>
    </form>

    <a href="admin_dashboard.php">⬅ Back</a>
</div>

</body>
</html>