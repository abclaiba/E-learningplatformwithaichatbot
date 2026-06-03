<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "elearning");

$message = "";

// Capture course and page from URL parameters
$course = isset($_GET['course']) ? $_GET['course'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : 'aboutus.php';

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT id, fullname, password
         FROM students
         WHERE email=?"
    );

    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        if(mysqli_num_rows($result) > 0){

    $row = mysqli_fetch_assoc($result);

    $_SESSION['student_id'] = $row['id'];
    $_SESSION['student_name'] = $row['fullname'];
    $_SESSION['student_logged_in'] = true;

    // Redirect to enroll.php if course is specified, otherwise to aboutus.php
    if ($course && $page) {
        header("Location: enroll.php?course=" . urlencode($course) . "&page=" . urlencode($page));
    } else {
        header("Location: aboutus.php");
    }
    exit();

} else {

    echo "Invalid Email or Password";
}

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['student_id'] = $user['id'];
            $_SESSION['student_name'] = $user['fullname'];

            // Redirect to enroll.php if course is specified, otherwise to aboutus.php
            if ($course && $page) {
                header("Location: enroll.php?course=" . urlencode($course) . "&page=" . urlencode($page));
            } else {
                header("Location: aboutus.php");
            }
            exit();

        } else {

            $message = "Incorrect Password!";
        }

    } else {

        $message = "User Not Found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>

body{
    font-family:Arial;
    background:linear-gradient(to right,#4facfe,#00f2fe);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-box{
    background:white;
    width:350px;
    padding:30px;
    border-radius:10px;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
}

button{
    width:100%;
    padding:12px;
    background:#007bff;
    color:white;
    border:none;
}

.msg{
    text-align:center;
    color:red;
}

</style>
</head>

<body>

<div class="login-box">

    <h2>User Login</h2>

    <form method="POST">

        <input type="email"
               name="email"
               placeholder="Email"
               required>

        <input type="password"
               name="password"
               placeholder="Password"
               required>

        <button type="submit" name="login">
            Login
        </button>

    </form>

    <div class="msg">
        <?php echo $message; ?>
    </div>

</div>

</body>
</html>