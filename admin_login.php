<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "admin" && $password == "admin123") {
        $_SESSION['admin'] = "admin";
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid Admin Credentials";
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — EduLearn</title>
    <link rel="stylesheet" href="auth.css">
</head>
<body>

<div class="auth-card">

    <div class="auth-logo"><span>🛡️</span> EduLearn</div>
    <h2>Admin Panel</h2>
    <p class="auth-sub">Authorized access only</p>

    <form method="POST">
        <label>Admin Username</label>
        <input type="text" name="username" placeholder="admin" required>

        <label>Admin Password</label>
        <input type="password" name="password" placeholder="Enter admin password" required>

        <button type="submit">Login</button>
    </form>

    <?php if (isset($error)) echo "<div class='msg'>$error</div>"; ?>

    <a href="aboutus.php" class="back-home">← Back to Home</a>

</div>
</body>
