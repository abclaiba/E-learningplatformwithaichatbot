<?php
session_start();

/* ===================== DB CONNECTION ===================== */
$conn = mysqli_connect("localhost", "root", "", "elearning");
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

/* ===================== ADMIN AUTH ===================== */
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

/* ===================== APPROVE / REJECT SIGNUP ===================== */
if (isset($_GET['approve_student'])) {
    $sid = intval($_GET['approve_student']);
    mysqli_query($conn, "UPDATE student SET status='approved' WHERE id='$sid'");
    header("Location: admin_dashboard.php#requests");
    exit();
}
if (isset($_GET['reject_student'])) {
    $sid = intval($_GET['reject_student']);
    mysqli_query($conn, "DELETE FROM student WHERE id='$sid'");
    header("Location: admin_dashboard.php#requests");
    exit();
}

/* ===================== DELETE HANDLERS ===================== */
if (isset($_GET['delete_course'])) {
    $cid = intval($_GET['delete_course']);
    mysqli_query($conn, "DELETE FROM course WHERE id='$cid'");
    header("Location: admin_dashboard.php#courses");
    exit();
}
if (isset($_GET['delete_student'])) {
    $sid = intval($_GET['delete_student']);
    mysqli_query($conn, "DELETE FROM student WHERE id='$sid'");
    header("Location: admin_dashboard.php#students");
    exit();
}
if (isset($_GET['delete_enrollment'])) {
    $eid = intval($_GET['delete_enrollment']);
    mysqli_query($conn, "DELETE FROM enrollment WHERE id='$eid'");
    header("Location: admin_dashboard.php#enrollments");
    exit();
}

/* ===================== COUNTS ===================== */
$total_students    = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM student WHERE status='approved'"));
$total_pending     = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM student WHERE status='pending'"));
$total_courses     = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM course"));
$total_enrollments = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM enrollment"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard — EduLearn</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap">
<style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',system-ui,Arial,sans-serif; }
    :root {
        --brand:#0f172a; --accent:#4f8ef7; --accent-2:#7c3aed;
        --grad:linear-gradient(135deg,#4f8ef7,#7c3aed);
        --grad-side:linear-gradient(160deg,#0f172a,#1e293b);
        --bg:#f1f5f9; --card:#fff; --muted:#64748b; --border:#e6e9f2;
        --shadow:0 10px 30px rgba(16,24,64,.07);
    }
    body { background:var(--bg); color:#1e293b; }

    .sidebar { width:250px; height:100vh; position:fixed; left:0; top:0;
        background:var(--grad-side); color:#fff; padding:26px 18px; display:flex; flex-direction:column; gap:6px; z-index:50; }
    .sidebar .brand { font-size:21px; font-weight:800; display:flex; align-items:center; gap:8px; margin-bottom:26px; padding:0 8px; }
    .sidebar a { display:flex; align-items:center; gap:12px; color:#cbd5e1; text-decoration:none;
        padding:12px 14px; border-radius:10px; font-weight:500; transition:.2s; }
    .sidebar a:hover, .sidebar a.active { background:rgba(255,255,255,.12); color:#fff; }
    .sidebar .spacer { flex:1; }
    .sidebar .logout { background:rgba(239,68,68,.2); }
    .sidebar .logout:hover { background:#ef4444; }

    .main { margin-left:250px; padding:28px 34px; }
    .topbar { display:flex; justify-content:space-between; align-items:center;
        background:var(--card); padding:20px 26px; border-radius:16px; box-shadow:var(--shadow); margin-bottom:26px; }
    .topbar h1 { font-size:23px; color:var(--brand); }
    .topbar p { color:var(--muted); font-size:14px; }

    .cards { display:grid; grid-template-columns:repeat(auto-fit,minmax(210px,1fr)); gap:20px; margin-bottom:30px; }
    .card { background:var(--card); border-radius:16px; padding:24px; box-shadow:var(--shadow); display:flex; align-items:center; gap:18px; }
    .card .ic { width:54px; height:54px; border-radius:14px; display:grid; place-items:center; font-size:25px; color:#fff; }
    .ic.a{background:var(--grad);} .ic.b{background:linear-gradient(135deg,#16a34a,#15803d);}
    .ic.c{background:linear-gradient(135deg,#f59e0b,#d97706);} .ic.d{background:linear-gradient(135deg,#ef4444,#b91c1c);}
    .card h2 { font-size:30px; color:var(--brand); line-height:1; }
    .card span { color:var(--muted); font-size:14px; }

    .section { background:var(--card); border-radius:16px; padding:26px; box-shadow:var(--shadow); margin-bottom:26px; }
    .section .sh { display:flex; justify-content:space-between; align-items:center; margin-bottom:18px; flex-wrap:wrap; gap:12px; }
    .section h2 { font-size:19px; color:var(--brand); }
    .badge { background:#fef3c7; color:#b45309; padding:3px 12px; border-radius:999px; font-size:12.5px; font-weight:700; }

    .table-wrap { overflow-x:auto; }
    table { width:100%; border-collapse:collapse; min-width:520px; }
    th { background:#f8fafc; color:#475569; padding:13px 14px; text-align:left; font-size:13px; text-transform:uppercase; letter-spacing:.5px; border-bottom:2px solid var(--border); }
    td { padding:13px 14px; border-bottom:1px solid var(--border); font-size:14.5px; }
    tr:hover td { background:#fafbff; }

    .pill-btn { display:inline-block; color:#fff; text-decoration:none; padding:7px 14px; border-radius:8px; font-size:13px; font-weight:600; transition:.2s; }
    .approve { background:linear-gradient(135deg,#16a34a,#15803d); }
    .reject, .delete-btn { background:linear-gradient(135deg,#ef4444,#b91c1c); }
    .pill-btn:hover { transform:translateY(-1px); opacity:.92; }
    .add-btn { background:var(--grad); color:#fff; text-decoration:none; padding:10px 18px; border-radius:10px; font-weight:600; font-size:14px; display:inline-block; }
    .add-btn:hover { transform:translateY(-2px); }

    .menu-btn { display:none; }
    @media (max-width:860px) {
        .sidebar { transform:translateX(-100%); transition:.3s; }
        .sidebar.open { transform:translateX(0); }
        .main { margin-left:0; }
        .menu-btn { display:inline-grid; place-items:center; width:42px; height:42px; border:none;
            background:var(--brand); color:#fff; border-radius:10px; font-size:20px; cursor:pointer; }
    }
</style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar" id="sidebar">
    <div class="brand">🛡️ EduLearn Admin</div>
    <a href="#" class="active">📊 Dashboard</a>
    <a href="#requests">📨 Signup Requests</a>
    <a href="#students">👥 Students</a>
    <a href="#courses">📚 Courses</a>
    <a href="#enrollments">📝 Enrollments</a>
    <a href="add_course.php">➕ Add Course</a>
    <div class="spacer"></div>
    <a href="logout.php" class="logout">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

    <div class="topbar">
        <div style="display:flex; align-items:center; gap:14px;">
            <button class="menu-btn" onclick="document.getElementById('sidebar').classList.toggle('open')">☰</button>
            <div>
                <h1>Welcome, Admin 🛡️</h1>
                <p>Manage students, courses and enrollments.</p>
            </div>
        </div>
        <a href="add_course.php" class="add-btn">+ Add Course</a>
    </div>

    <!-- STAT CARDS -->
    <div class="cards">
        <div class="card"><div class="ic a">👥</div><div><h2><?php echo $total_students; ?></h2><span>Students</span></div></div>
        <div class="card"><div class="ic b">📚</div><div><h2><?php echo $total_courses; ?></h2><span>Courses</span></div></div>
        <div class="card"><div class="ic c">📝</div><div><h2><?php echo $total_enrollments; ?></h2><span>Enrollments</span></div></div>
        <div class="card"><div class="ic d">📨</div><div><h2><?php echo $total_pending; ?></h2><span>Pending Requests</span></div></div>
    </div>

    <!-- PENDING REQUESTS -->
    <div class="section" id="requests">
        <div class="sh">
            <h2>Pending Signup Requests</h2>
            <?php if ($total_pending > 0) echo '<span class="badge">'.$total_pending.' waiting</span>'; ?>
        </div>
        <div class="table-wrap">
        <table>
            <tr><th>ID</th><th>Full Name</th><th>Email</th><th>Action</th></tr>
            <?php
            $pending = mysqli_query($conn, "SELECT * FROM student WHERE status='pending' ORDER BY id DESC");
            if (mysqli_num_rows($pending) == 0) {
                echo "<tr><td colspan='4' style='color:#94a3b8;'>No pending requests right now.</td></tr>";
            }
            while ($row = mysqli_fetch_assoc($pending)) {
                echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.htmlspecialchars($row['fullname']).'</td>
                    <td>'.htmlspecialchars($row['email']).'</td>
                    <td>
                        <a class="pill-btn approve" href="admin_dashboard.php?approve_student='.$row['id'].'">✓ Approve</a>
                        <a class="pill-btn reject" href="admin_dashboard.php?reject_student='.$row['id'].'">✕ Reject</a>
                    </td></tr>';
            }
            ?>
        </table>
        </div>
    </div>

    <!-- STUDENTS -->
    <div class="section" id="students">
        <div class="sh"><h2>Registered Students</h2></div>
        <div class="table-wrap">
        <table>
            <tr><th>ID</th><th>Full Name</th><th>Email</th><th>Action</th></tr>
            <?php
            $students = mysqli_query($conn, "SELECT * FROM student WHERE status='approved'");
            while ($row = mysqli_fetch_assoc($students)) {
                echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.htmlspecialchars($row['fullname']).'</td>
                    <td>'.htmlspecialchars($row['email']).'</td>
                    <td><a class="pill-btn delete-btn" href="admin_dashboard.php?delete_student='.$row['id'].'">Delete</a></td>
                </tr>';
            }
            ?>
        </table>
        </div>
    </div>

    <!-- COURSES -->
    <div class="section" id="courses">
        <div class="sh">
            <h2>Available Courses</h2>
            <a href="add_course.php" class="add-btn">+ Add New Course</a>
        </div>
        <div class="table-wrap">
        <table>
            <tr><th>ID</th><th>Course Name</th><th>Description</th><th>Action</th></tr>
            <?php
            $courses = mysqli_query($conn, "SELECT * FROM course");
            while ($row = mysqli_fetch_assoc($courses)) {
                echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.htmlspecialchars($row['course_name']).'</td>
                    <td>'.htmlspecialchars($row['description']).'</td>
                    <td><a class="pill-btn delete-btn" href="admin_dashboard.php?delete_course='.$row['id'].'">Delete</a></td>
                </tr>';
            }
            ?>
        </table>
        </div>
    </div>

    <!-- ENROLLMENTS -->
    <div class="section" id="enrollments">
        <div class="sh"><h2>Student Enrollment Details</h2></div>
        <div class="table-wrap">
        <table>
            <tr><th>ID</th><th>Student ID</th><th>Student</th><th>Course</th><th>Date</th><th>Last Date</th><th>Action</th></tr>
            <?php
            $enr = mysqli_query($conn, "SELECT * FROM enrollment ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($enr)) {
                echo '<tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['student_id'].'</td>
                    <td>'.htmlspecialchars($row['student_name']).'</td>
                    <td>'.htmlspecialchars($row['course_name']).'</td>
                    <td>'.$row['enrolled_at'].'</td>
                    <td>'.($row['deadline'] ?: '—').'</td>
                    <td><a class="pill-btn delete-btn" href="admin_dashboard.php?delete_enrollment='.$row['id'].'">Delete</a></td>
                </tr>';
            }
            ?>
        </table>
        </div>
    </div>

</div>
</body>
</html>
