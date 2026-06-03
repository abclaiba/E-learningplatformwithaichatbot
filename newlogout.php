<?php
session_start();
session_destroy();
header("Location: newlogin.php");
exit();
?>