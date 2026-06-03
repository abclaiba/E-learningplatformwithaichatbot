<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "elearning");

$message = "";
$success = "";

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['signup'])) {

    $name = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Check existing email
    $check = $conn->prepare("SELECT id FROM student WHERE email=?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {

        $message = "Email already exists!";

    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // New accounts start as 'pending' and must be approved by the admin
        // before they can log in or enroll.
        $stmt = $conn->prepare(
            "INSERT INTO student(fullname,email,password,status)
             VALUES(?,?,?,'pending')"
        );

        $stmt->bind_param(
            "sss",
            $name,
            $email,
            $hashedPassword
        );

        if ($stmt->execute()) {

            // Do NOT log in automatically — wait for admin approval.
            $success = "Signup request sent! Please wait for admin approval before logging in.";

        } else {
            $message = "Signup Failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up — EduLearn</title>
    <link rel="stylesheet" href="auth.css">
</head>

<body>

<div class="auth-card">

    <div class="auth-logo"><span>🎓</span> EduLearn</div>
    <h2>Create Account</h2>
    <p class="auth-sub">Sign up and start learning today</p>

    <form method="POST">

        <label>Full Name</label>
        <input type="text" name="fullname" placeholder="Your full name" required>

        <label>Email Address</label>
        <input type="email" name="email" placeholder="you@example.com" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Create a password" required>

        <button type="submit" name="signup">Sign Up</button>
    </form>

    <div class="msg"><?php echo $message; ?></div>
    <div class="msg-success"><?php echo $success; ?></div>

    <p class="auth-foot">Already have an account? <a href="finallogin.php">Login</a></p>
    <a href="aboutus.php" class="back-home">← Back to Home</a>

</div>

</body>
</html>