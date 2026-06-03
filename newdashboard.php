<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: newlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>

<h2>Welcome <?php echo $_SESSION['fullname']; ?></h2>

<a href="newlogout.php">Logout</a>

</body>
</html>