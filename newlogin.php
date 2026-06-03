<?php
session_start();

$conn = new mysqli("localhost", "root", "", "elearning");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, fullname, password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];

            header("Location: dashboard.php");
            exit();

        } else {
            $message = "Incorrect password!";
        }

    } else {
        $message = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>
body{
    font-family:Arial,sans-serif;
    background:#f4f4f4;
}
.container{
    width:400px;
    margin:60px auto;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.2);
}
input{
    width:100%;
    padding:12px;
    margin:8px 0;
}
button{
    width:100%;
    padding:12px;
    background:#007bff;
    color:white;
    border:none;
    cursor:pointer;
}
.msg{
    margin-bottom:10px;
    color:red;
}
</style>
</head>
<body>

<div class="container">
    <h2>User Login</h2>

    <div class="msg"><?php echo $message; ?></div>

    <form method="POST">
        <input type="email" name="email" placeholder="Email Address" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <p>
        Don't have an account?
        <a href="signup.php">Sign Up</a>
    </p>
</div>

</body>
</html>