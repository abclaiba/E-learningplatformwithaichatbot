<?php
session_start();

require_once 'send_deadline_email.php';

$conn = mysqli_connect("localhost", "root", "", "elearning");

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

/*
=====================================
GET COURSE + PAGE FROM URL
=====================================
*/
$course_name = isset($_GET['course']) ? $_GET['course'] : '';
$page        = isset($_GET['page'])   ? $_GET['page']   : '';

/*
=====================================
LOGIN CHECK
If not logged in, send to login page but
KEEP the course + page so we can come back.
=====================================
*/
if (!isset($_SESSION['student_id'])) {

    header(
        "Location: finallogin.php?course=" . urlencode($course_name) .
        "&page=" . urlencode($page)
    );
    exit();
}

$student_id   = $_SESSION['student_id'];
$student_name = $_SESSION['student_name'];

/*
=====================================
CHECK EXISTING ENROLLMENT
=====================================
*/
$check = mysqli_query(
    $conn,
    "SELECT id FROM enrollment
     WHERE student_id = '" . mysqli_real_escape_string($conn, $student_id) . "'
     AND course_name = '" . mysqli_real_escape_string($conn, $course_name) . "'"
);

/*
=====================================
INSERT ENROLLMENT (only if new)
=====================================
*/
if (mysqli_num_rows($check) == 0 && $course_name !== '') {

    $s_id   = mysqli_real_escape_string($conn, $student_id);
    $s_name = mysqli_real_escape_string($conn, $student_name);
    $c_name = mysqli_real_escape_string($conn, $course_name);

    // Course "last date" = today + COURSE_DURATION_DAYS (from mail_config.php)
    $deadline = date('Y-m-d', strtotime('+' . COURSE_DURATION_DAYS . ' days'));

    mysqli_query(
        $conn,
        "INSERT INTO enrollment (student_id, student_name, course_name, deadline)
         VALUES ('$s_id', '$s_name', '$c_name', '$deadline')"
    );

    // Email the student their last date (sends via Gmail SMTP if configured,
    // otherwise logs to mail_log.txt — never blocks enrollment).
    $stu = mysqli_query(
        $conn,
        "SELECT email FROM student WHERE id='$s_id'"
    );

    if ($stu && $row = mysqli_fetch_assoc($stu)) {
        send_deadline_email($row['email'], $student_name, $course_name, $deadline);
    }
}

/*
=====================================
REDIRECT TO LECTURE PAGE
=====================================
*/
if ($page !== '') {
    header("Location: $page");
} else {
    header("Location: student_dashboard.php");
}
exit();
?>
