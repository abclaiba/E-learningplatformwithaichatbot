<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "elearning");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$message = "";

// Capture course and page from URL parameters (used for enroll flow)
$course = isset($_GET['course']) ? $_GET['course'] : '';
$page   = isset($_GET['page'])   ? $_GET['page']   : '';

if (isset($_POST['login'])) {

    $email    = trim($_POST['email']);
    $password = $_POST['password'];

    // Also carry course/page if they came through the form
    $course = isset($_POST['course']) ? $_POST['course'] : $course;
    $page   = isset($_POST['page'])   ? $_POST['page']   : $page;

    $stmt = $conn->prepare(
        "SELECT id, fullname, password, status FROM student WHERE email = ?"
    );
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            // Block login until the admin has approved this account
            if ($user['status'] !== 'approved') {

                $message = "Your account is pending admin approval. Please try again later.";

            } else {

                $_SESSION['student_id']        = $user['id'];
                $_SESSION['student_name']      = $user['fullname'];
                $_SESSION['student_logged_in'] = true;

                // If an enrollment was requested, go finish it; else go home
                if ($course && $page) {
                    header("Location: enroll.php?course=" . urlencode($course) . "&page=" . urlencode($page));
                } else {
                    header("Location: aboutus.php");
                }
                exit();
            }

        } else {
            $message = "Incorrect Password!";
        }

    } else {
        $message = "User Not Found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login — EduLearn</title>
<link rel="stylesheet" href="auth.css">
</head>

<body>

<div class="auth-card">

    <div class="auth-logo"><span>🎓</span> EduLearn</div>
    <h2>Welcome Back</h2>
    <p class="auth-sub">Log in to continue learning</p>

    <form method="POST">

        <label>Email Address</label>
        <input type="email" name="email" placeholder="you@example.com" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <!-- carry the enroll flow params through the POST -->
        <input type="hidden" name="course" value="<?php echo htmlspecialchars($course); ?>">
        <input type="hidden" name="page"   value="<?php echo htmlspecialchars($page); ?>">

        <button type="submit" name="login">Login</button>
    </form>

    <div class="msg"><?php echo $message; ?></div>

    <p class="auth-foot">Don't have an account? <a href="signuppage.php">Sign Up</a></p>
    <a href="aboutus.php" class="back-home">← Back to Home</a>

</div>

</body>
</html>
