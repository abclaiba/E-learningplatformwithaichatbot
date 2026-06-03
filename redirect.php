<?php
session_start();
include "db.php";

if(isset($_GET['page'])){
    $_SESSION['redirect_page'] = $_GET['page'];
}

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM student
              WHERE email='$email'
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        $_SESSION['student_id'] = $row['id'];
        $_SESSION['student_name'] = $row['fullname'];
        $_SESSION['student_logged_in'] = true;

        // Redirect to lecture page
        if(isset($_SESSION['redirect_page'])){

            $page = $_SESSION['redirect_page'];

            header("Location: $page");
            exit();

        } else {

            header("Location: student_dashboard.php");
            exit();
        }

    } else {

        echo "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
</head>
<body>

<h2>Student Login</h2>

<form method="POST">

    <input type="email"
           name="email"
           placeholder="Enter Email"
           required>

    <br><br>

    <input type="password"
           name="password"
           placeholder="Enter Password"
           required>

    <br><br>

    <button type="submit" name="login">
        Login
    </button>

</form>

</body>
</html>