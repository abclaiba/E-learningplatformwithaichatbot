<?php

// Database connection
$conn = mysqli_connect("localhost", "root", "", "elearning");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Getting form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Check if email already exists
$check_email = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($conn, $check_email);

if (mysqli_num_rows($result) > 0) {
    echo "<h3>Email already registered. Try another!</h3>";
    exit();
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert into database
$query = "INSERT INTO users (name, email, password) 
          VALUES ('$name', '$email', '$hashed_password')";

if (mysqli_query($conn, $query)) {
    header("Location: index.html?signup=success");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

?>
