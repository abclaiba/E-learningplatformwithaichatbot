<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EduLearn</title>
    <link rel="stylesheet" href="loginpage.css">
</head>
<body>
    <div class="login-container">
        <h2>Login to EduLearn</h2>

        <form action="login.php" method="POST">

            <input type="email" name="email" placeholder="Enter Email" required>
            <input type="password" name="password" placeholder="Enter Password" required>

            <button type="submit" class="btn">Login</button>

            <p class="signup-text">Don't have an account? <a href="signuppage.php">Sign Up</a></p>
        </form>
    </div>
    
</body>
</html>

      