<?php
session_start();

/* ===================== DB CONNECTION ===================== */
$conn = mysqli_connect("localhost", "root", "", "elearning");
if (!$conn) {
    die("Database Connection Failed");
}

/* ===================== LOGIN CHECK ===================== */
if (!isset($_SESSION['student_id'])) {
    header("Location: finallogin.php");
    exit();
}

$student_id   = $_SESSION['student_id'];
$student_name = $_SESSION['student_name'];
$initial      = strtoupper(substr($student_name, 0, 1));

/* ===================== STATS ===================== */
$total_courses = mysqli_num_rows(
    mysqli_query($conn, "SELECT id FROM enrollment WHERE student_id='$student_id'")
);

// Overall progress across all enrolled courses (6 lectures per course)
$total_lectures_overall = $total_courses * 6;
$completed_overall = mysqli_num_rows(
    mysqli_query($conn,
        "SELECT lp.id FROM lecture_progress lp
         WHERE lp.student_id='$student_id'")
);
$overall_percent = $total_lectures_overall > 0
    ? round(($completed_overall / $total_lectures_overall) * 100)
    : 0;

/* ===================== LECTURE PAGE MAP ===================== */
$lecture_map = [
    'Web Development' => 'webdev_lectures.php',
    'Python Programming' => 'python_lectures.php',
    'Artificial Intelligence' => 'ai_lectures.php',
    'Machine Learning' => 'ml_lectures.php',
    'Graphic Designing' => 'graphic_design_lectures.php',
    'Data Science' => 'data_science_lecture.php',
    'Cybersecurity Fundamentals' => 'cybersecurity_lectures.php',
    'Database Management' => 'database_lectures.php',
    'Mobile App Development' => 'mobile_app_lectures.php',
    'Cloud Computing' => 'cloud_computing_lectures.php',
    'Software Engineering' => 'software_engineering_lectures.php',
    'Computer Networks' => 'computer_networks_lectures.php',
    'C++ Programming' => 'cpp_lectures.php',
];
$icon_map = [
    'Web Development' => '🌐', 'Python Programming' => '🐍', 'Artificial Intelligence' => '🤖',
    'Machine Learning' => '🧠', 'Graphic Designing' => '🎨', 'Data Science' => '📊',
    'Cybersecurity Fundamentals' => '🔐', 'Database Management' => '🗄️', 'Mobile App Development' => '📱',
    'Cloud Computing' => '☁️', 'Software Engineering' => '🛠️', 'Computer Networks' => '🔗',
    'C++ Programming' => '💻',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Dashboard — EduLearn</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap">
<style>
    * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',system-ui,Arial,sans-serif; }
    :root {
        --brand:#1a237e; --accent:#4f8ef7; --accent-2:#7c3aed;
        --grad:linear-gradient(135deg,#4f8ef7,#7c3aed);
        --grad-brand:linear-gradient(160deg,#1a237e,#3949ab);
        --bg:#f5f7fb; --card:#fff; --muted:#64748b; --border:#e6e9f2;
        --shadow:0 10px 30px rgba(16,24,64,.08);
    }
    body { background:var(--bg); color:#1e293b; }

    /* Sidebar */
    .sidebar {
        width:250px; height:100vh; position:fixed; left:0; top:0;
        background:var(--grad-brand); color:#fff; padding:26px 18px;
        display:flex; flex-direction:column; gap:6px; z-index:50;
    }
    .sidebar .brand { font-size:22px; font-weight:800; display:flex; align-items:center; gap:8px; margin-bottom:28px; padding:0 8px; }
    .sidebar a {
        display:flex; align-items:center; gap:12px;
        color:#dfe4f5; text-decoration:none; padding:12px 14px;
        border-radius:10px; font-weight:500; transition:.2s;
    }
    .sidebar a:hover, .sidebar a.active { background:rgba(255,255,255,.14); color:#fff; }
    .sidebar .spacer { flex:1; }
    .sidebar .logout { background:rgba(239,68,68,.2); }
    .sidebar .logout:hover { background:#ef4444; }

    /* Main */
    .main { margin-left:250px; padding:28px 34px; }

    .topbar {
        display:flex; justify-content:space-between; align-items:center;
        background:var(--card); padding:20px 26px; border-radius:16px;
        box-shadow:var(--shadow); margin-bottom:26px;
    }
    .topbar h1 { font-size:24px; color:var(--brand); }
    .topbar p { color:var(--muted); font-size:14px; }
    .userchip { display:flex; align-items:center; gap:12px; }
    .avatar { width:46px; height:46px; border-radius:50%; background:var(--grad);
        color:#fff; display:grid; place-items:center; font-weight:700; font-size:18px; }

    /* Stat cards */
    .cards { display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:20px; margin-bottom:30px; }
    .card { background:var(--card); border-radius:16px; padding:24px; box-shadow:var(--shadow);
        display:flex; align-items:center; gap:18px; }
    .card .ic { width:54px; height:54px; border-radius:14px; display:grid; place-items:center; font-size:26px; color:#fff; }
    .card .ic.a { background:var(--grad); }
    .card .ic.b { background:linear-gradient(135deg,#16a34a,#15803d); }
    .card .ic.c { background:linear-gradient(135deg,#f59e0b,#d97706); }
    .card h2 { font-size:30px; color:var(--brand); line-height:1; }
    .card span { color:var(--muted); font-size:14px; }

    /* Section */
    .section { background:var(--card); border-radius:16px; padding:26px; box-shadow:var(--shadow); }
    .section > h2 { font-size:20px; color:var(--brand); margin-bottom:20px; }

    .course-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(300px,1fr)); gap:22px; }
    .course-box { border:1px solid var(--border); border-radius:14px; overflow:hidden; transition:.3s; display:flex; flex-direction:column; }
    .course-box:hover { transform:translateY(-6px); box-shadow:var(--shadow); }
    .course-box .head { padding:18px 20px; display:flex; align-items:center; gap:12px; background:#f8faff; border-bottom:1px solid var(--border); }
    .course-box .head .em { font-size:28px; }
    .course-box .head h3 { color:var(--brand); font-size:17px; }
    .course-box .body { padding:18px 20px 22px; display:flex; flex-direction:column; flex:1; }
    .course-box .body p { color:var(--muted); font-size:14px; margin-bottom:16px; flex:1; }

    .pbar-top { display:flex; justify-content:space-between; font-size:12.5px; font-weight:600; color:var(--brand); margin-bottom:6px; }
    .pbar { background:#eef2ff; border-radius:20px; height:12px; overflow:hidden; margin-bottom:18px; }
    .pbar > div { height:100%; background:var(--grad); transition:width .4s; }

    .btn { display:inline-block; text-align:center; background:var(--grad); color:#fff; text-decoration:none;
        padding:11px 16px; border-radius:10px; font-weight:600; font-size:14px; transition:.2s; box-shadow:0 6px 16px rgba(79,142,247,.3); }
    .btn:hover { transform:translateY(-2px); }

    .empty { text-align:center; padding:50px 20px; color:var(--muted); }
    .empty a { color:var(--accent-2); font-weight:600; }

    /* Mobile */
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
    <div class="brand">🎓 EduLearn</div>
    <a href="student_dashboard.php" class="active">📊 Dashboard</a>
    <a href="#courses">📚 My Courses</a>
    <a href="aboutus.php#courses">➕ Browse Courses</a>
    <a href="aboutus.php">🏠 Home</a>
    <div class="spacer"></div>
    <a href="logout.php" class="logout">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

    <div class="topbar">
        <div style="display:flex; align-items:center; gap:14px;">
            <button class="menu-btn" onclick="document.getElementById('sidebar').classList.toggle('open')">☰</button>
            <div>
                <h1>Welcome back, <?php echo htmlspecialchars($student_name); ?> 👋</h1>
                <p>Here's your learning progress overview.</p>
            </div>
        </div>
        <div class="userchip">
            <div style="text-align:right;">
                <div style="font-weight:600;"><?php echo htmlspecialchars($student_name); ?></div>
                <div style="color:var(--muted); font-size:12.5px;">Student</div>
            </div>
            <div class="avatar"><?php echo htmlspecialchars($initial); ?></div>
        </div>
    </div>

    <!-- STAT CARDS -->
    <div class="cards">
        <div class="card">
            <div class="ic a">📚</div>
            <div><h2><?php echo $total_courses; ?></h2><span>Enrolled Courses</span></div>
        </div>
        <div class="card">
            <div class="ic b">✅</div>
            <div><h2><?php echo $completed_overall; ?></h2><span>Lectures Completed</span></div>
        </div>
        <div class="card">
            <div class="ic c">📈</div>
            <div><h2><?php echo $overall_percent; ?>%</h2><span>Overall Progress</span></div>
        </div>
    </div>

    <!-- MY COURSES -->
    <div class="section" id="courses">
        <h2>My Enrolled Courses</h2>

        <?php
        $query = "
            SELECT enrollment.course_name, course.description
            FROM enrollment
            INNER JOIN course ON enrollment.course_name = course.course_name
            WHERE enrollment.student_id='$student_id'
        ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo '<div class="course-grid">';
            while ($row = mysqli_fetch_assoc($result)) {
                $cname = $row['course_name'];
                $page  = isset($lecture_map[$cname]) ? $lecture_map[$cname] : '#';
                $icon  = isset($icon_map[$cname]) ? $icon_map[$cname] : '📘';

                $cname_esc = mysqli_real_escape_string($conn, $cname);
                $done = mysqli_num_rows(mysqli_query($conn,
                    "SELECT id FROM lecture_progress
                     WHERE student_id='$student_id' AND course_name='$cname_esc'"));
                $percent = round(($done / 6) * 100);
                ?>
                <div class="course-box">
                    <div class="head">
                        <span class="em"><?php echo $icon; ?></span>
                        <h3><?php echo htmlspecialchars($cname); ?></h3>
                    </div>
                    <div class="body">
                        <p><?php echo htmlspecialchars($row['description']); ?></p>
                        <div class="pbar-top">
                            <span>Progress</span>
                            <span><?php echo $done; ?>/6 (<?php echo $percent; ?>%)</span>
                        </div>
                        <div class="pbar"><div style="width:<?php echo $percent; ?>%"></div></div>
                        <a href="<?php echo $page; ?>" class="btn">▶ Continue Learning</a>
                    </div>
                </div>
                <?php
            }
            echo '</div>';
        } else {
            echo '<div class="empty">
                    <h3>No courses enrolled yet 😔</h3>
                    <p>Browse our catalog and start learning today.</p>
                    <br><a href="aboutus.php#courses">Explore Courses →</a>
                  </div>';
        }
        ?>
    </div>

</div>
</body>
</html>
