<?php
/**
 * Enrollment Verification Helper
 * Checks if a logged-in student is enrolled in a given course.
 */

function verify_enrollment($course_name)
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // Must be logged in
    if (!isset($_SESSION['student_id'])) {
        header("Location: finallogin.php");
        exit();
    }

    $conn = mysqli_connect("localhost", "root", "", "elearning");

    if (!$conn) {
        die("Database Connection Failed: " . mysqli_connect_error());
    }

    $student_id = mysqli_real_escape_string($conn, $_SESSION['student_id']);
    $course     = mysqli_real_escape_string($conn, $course_name);

    $result = mysqli_query(
        $conn,
        "SELECT id FROM enrollment
         WHERE student_id = '$student_id'
         AND course_name = '$course'"
    );

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    $is_enrolled = mysqli_num_rows($result);

    mysqli_close($conn);

    // true if enrolled, false otherwise
    return $is_enrolled > 0;
}

function get_student_name()
{
    if (isset($_SESSION['student_name'])) {
        return $_SESSION['student_name'];
    }
    return "Student";
}

function redirect_to_enroll($course_name)
{
    header("Location: aboutus.php?error=Please enroll in $course_name to access lectures");
    exit();
}
?>
