<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit();
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "elearning");
if (!$conn) {
    die("Connection failed");
}

$username = $_SESSION['user'];

// Fetch user data
$query = "SELECT * FROM users WHERE name='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>

<div class="profile-container">

    <h2>My Profile</h2>

    <form action="update_profile.php" method="POST">

        <label>Full Name</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

        <label>New Password</label>
        <input type="password" name="password" placeholder="Leave blank to keep old password">

        <button type="submit">Update Profile</button>

    </form>

    <a href="dashboard.php" class="back-btn">⬅ Back to Dashboard</a>

</div>

</body>
</html>
