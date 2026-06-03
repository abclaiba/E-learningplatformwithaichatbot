<?php
$conn = new mysqli("localhost", "root", "", "elearning");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (!empty($fullname) && !empty($email) && !empty($password)) {

        $check = $conn->prepare("SELECT id FROM users WHERE email=?");
        $check->bind_param("s", $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $message = "Email already exists!";
        } else {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users(fullname,email,password) VALUES(?,?,?)");
            $stmt->bind_param("sss", $fullname, $email, $hashedPassword);

            if ($stmt->execute()) {
                $message = "Registration successful! <a href='newlogin.php'>Login Now</a>";
            } else {
                $message = "Registration failed!";
            }
        }
    } else {
        $message = "Please fill all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Signup</title>
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
    background:#28a745;
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
    <h2>Create Account</h2>

    <div class="msg"><?php echo $message; ?></div>

    <form method="POST">
        <input type="text" name="fullname" placeholder="Full Name" required>

        <input type="email" name="email" placeholder="Email Address" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Sign Up</button>
    </form>

    <p>
        Already have an account?
        <a href="newlogin.php">Login</a>
    </p>
</div>

</body>
</html>