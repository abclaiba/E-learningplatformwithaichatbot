<?php
$conn = mysqli_connect("localhost", "root", "", "elearning");

$message = "";

if (isset($_POST['signup'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO students (fullname, email, password)
              VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $query)) {
        $message = "Signup Successful!";
    } else {
        $message = "Error: Signup Failed";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signup-box {
            background: #fff;
            padding: 30px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #4facfe;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #00c6fb;
        }

        .msg {
            text-align: center;
            margin-top: 10px;
            color: green;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="signup-box">
    <h2>Create Account</h2>

    <form method="POST">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="signup">Sign Up</button>
    </form>

    <div class="msg"><?php echo $message; ?></div>

    <div class="login-link">
        Already have an account? <a href="loginpage.php">Login</a>
    </div>
</div>

</body>
</html>