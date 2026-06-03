<?php
session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "elearning");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Form data
$email = $_POST['email'];
$password = $_POST['password'];

// Query
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Checking password
    if (password_verify($password, $row['password'])) {

        $_SESSION['user'] = $row['name'];

        header("Location: dashboard.php");
        exit();

    } else {
        echo "<h3>Invalid Password!</h3>";
    }
} else {
    echo "<h3>Email Not Found!</h3>";
}
?>
