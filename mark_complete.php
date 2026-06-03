<?php
/**
 * Toggle a lecture's completion state for the logged-in student.
 * Called via fetch() from progress.js on each lecture page.
 * POST: course_name, lecture_no, action ("complete" | "uncomplete")
 * Returns JSON: { ok, completed_count }
 */
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['student_id'])) {
    echo json_encode(['ok' => false, 'error' => 'not_logged_in']);
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "elearning");
if (!$conn) {
    echo json_encode(['ok' => false, 'error' => 'db']);
    exit();
}

$student_id  = intval($_SESSION['student_id']);
$course_name = isset($_POST['course_name']) ? mysqli_real_escape_string($conn, $_POST['course_name']) : '';
$lecture_no  = isset($_POST['lecture_no'])  ? intval($_POST['lecture_no']) : 0;
$action      = isset($_POST['action'])      ? $_POST['action'] : 'complete';

if ($course_name === '' || $lecture_no < 1) {
    echo json_encode(['ok' => false, 'error' => 'bad_input']);
    exit();
}

if ($action === 'uncomplete') {
    mysqli_query(
        $conn,
        "DELETE FROM lecture_progress
         WHERE student_id='$student_id'
         AND course_name='$course_name'
         AND lecture_no='$lecture_no'"
    );
} else {
    // INSERT IGNORE avoids duplicates thanks to the UNIQUE key
    mysqli_query(
        $conn,
        "INSERT IGNORE INTO lecture_progress (student_id, course_name, lecture_no)
         VALUES ('$student_id', '$course_name', '$lecture_no')"
    );
}

$count = mysqli_num_rows(
    mysqli_query(
        $conn,
        "SELECT id FROM lecture_progress
         WHERE student_id='$student_id'
         AND course_name='$course_name'"
    )
);

echo json_encode(['ok' => true, 'completed_count' => $count]);
?>
