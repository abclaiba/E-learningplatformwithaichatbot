<?php
/**
 * Return the list of completed lecture numbers for the logged-in student
 * in a given course. Called by progress.js on page load.
 * GET: course_name
 * Returns JSON: { ok, completed: [1,3,...] }
 */
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['student_id'])) {
    echo json_encode(['ok' => false, 'error' => 'not_logged_in', 'completed' => []]);
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "elearning");
if (!$conn) {
    echo json_encode(['ok' => false, 'error' => 'db', 'completed' => []]);
    exit();
}

$student_id  = intval($_SESSION['student_id']);
$course_name = isset($_GET['course_name']) ? mysqli_real_escape_string($conn, $_GET['course_name']) : '';

$completed = [];
$res = mysqli_query(
    $conn,
    "SELECT lecture_no FROM lecture_progress
     WHERE student_id='$student_id'
     AND course_name='$course_name'"
);
while ($row = mysqli_fetch_assoc($res)) {
    $completed[] = intval($row['lecture_no']);
}

echo json_encode(['ok' => true, 'completed' => $completed]);
?>
