<?php
/**
 * Shared, session-aware site header / navbar.
 * Include with:  <?php include __DIR__ . '/partials/header.php'; ?>
 *
 * When a student is logged in it shows their name + Dashboard + Logout.
 * Otherwise it shows Sign up / Login / Admin.
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$is_logged_in = isset($_SESSION['student_id']);
$nav_name     = $is_logged_in ? $_SESSION['student_name'] : '';
$initial      = $is_logged_in ? strtoupper(substr($nav_name, 0, 1)) : '';
?>
<header class="site-header">
    <a href="aboutus.php" class="logo">
        <span class="logo-mark">🎓</span> EduLearn
    </a>

    <input type="checkbox" id="nav-toggle" class="nav-toggle">
    <label for="nav-toggle" class="nav-toggle-label" aria-label="Menu">
        <span></span><span></span><span></span>
    </label>

    <nav class="site-nav">
        <ul>
            <li><a href="aboutus.php">Home</a></li>
            <li><a href="aboutus.php#courses">Courses</a></li>
            <li><a href="aboutus.php#about">About</a></li>
            <li><a href="aboutus.php#contact">Contact</a></li>

            <?php if ($is_logged_in): ?>
                <li class="nav-profile">
                    <a href="student_dashboard.php" class="profile-chip" title="Go to dashboard">
                        <span class="avatar"><?php echo htmlspecialchars($initial); ?></span>
                        <span class="profile-name"><?php echo htmlspecialchars($nav_name); ?></span>
                    </a>
                </li>
                <li><a href="student_dashboard.php" class="btn btn-ghost">Dashboard</a></li>
                <li><a href="logout.php" class="btn btn-danger">Logout</a></li>
            <?php else: ?>
                <li><a href="signuppage.php" class="btn btn-ghost">Sign up</a></li>
                <li><a href="finallogin.php" class="btn">Login</a></li>
                <li><a href="admin_login.php" class="btn btn-dark">Admin</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
