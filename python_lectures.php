<?php
require_once 'check_enrollment.php';
$course_name = 'Python Programming';
if (!verify_enrollment($course_name)) {
    redirect_to_enroll($course_name);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Python Programming Lectures - EduLearn</title>
    <link rel="stylesheet" href="aboutus.css?v=3">
    <style>
        .lectures-section {
            padding: 50px 40px;
            background: #f8f9fa;
            min-height: 70vh;
        }
        .lectures-header {
            text-align: center;
            margin-bottom: 50px;
        }
        .lectures-header h2 {
            font-size: 36px;
            color: #1a237e;
            margin-bottom: 15px;
        }
        .lectures-header p {
            color: #555;
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
        }
        .video-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .video-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .video-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            background: #000;
        }
        .video-wrapper video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            object-fit: cover;
        }
        .video-info {
            padding: 20px;
        }
        .video-info h3 {
            color: #1a237e;
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .video-info p {
            color: #666;
            font-size: 15px;
            margin-bottom: 20px;
            line-height: 1.5;
        }
        .video-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: #777;
            border-top: 1px solid #eee;
            padding-top: 15px;
            font-weight: bold;
        }
        .module-badge {
            background: #e8eaf6;
            color: #1a237e;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>

        <?php include __DIR__ . '/partials/header.php'; ?>

    <!-- Lectures Section -->
    <section class="lectures-section">
        <div class="lectures-header">
            <h2>Python Programming </h2>
            <p>Master Python from the ground up. From basic syntax to advanced concepts like data structures and algorithms.</p>
        </div>

        <div class="video-container">
            <!-- Video 1 -->
            <div class="video-card">
                <div class="video-wrapper">
                  <!--  <video controls poster="https://images.pexels.com/photos/1181675/pexels-photo-1181675.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>-->
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/4EaYeZyzIB0?si=7Wphu0c7CIAinjjR" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h3>Lecture 1: Introduction to Python</h3>
                    <p>Get started with Python. Learn how to install Python, set up your environment, and write your first script.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 40 mins</span>
                        <span class="module-badge">Basics</span>
                    </div>
                </div>
            </div>

            <!-- Video 2 -->
            <div class="video-card">
                <div class="video-wrapper">
                  <!--  <video controls poster="https://images.pexels.com/photos/270404/pexels-photo-270404.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>-->
                  <iframe width="560" height="315" src="https://www.youtube.com/embed/R83OfbQeB7M?si=XrI1vGoiyJBBiu5i" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                
                </div>
                <div class="video-info">
                    <h3>Lecture 2: Variables and Data Types</h3>
                    <p>Deep dive into strings, integers, floats, and booleans. Understand how Python manages memory dynamically.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 50 mins</span>
                        <span class="module-badge">Fundamentals</span>
                    </div>
                </div>
            </div>

            <!-- Video 3 -->
            <div class="video-card">
                <div class="video-wrapper">
                  <!--  <video controls poster="https://images.pexels.com/photos/574070/pexels-photo-574070.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>-->
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/S73thl0AyFU?si=URIsplke6vrH2pDW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h3>Lecture 3: Control Flow and Loops</h3>
                    <p>Master if-else statements, for loops, and while loops to add logic and repetition to your Python programs.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 60 mins</span>
                        <span class="module-badge">Logic</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 4 -->
            <div class="video-card">
                <div class="video-wrapper">
                <!--    <video controls poster="https://images.pexels.com/photos/1181244/pexels-photo-1181244.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>-->
                   <iframe width="560" height="315" src="https://www.youtube.com/embed/n0krwG38SHI?si=Jp0KsFvh2GGg4bbv" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> </div>
                <div class="video-info">
                    <h3>Lecture 4: Lists, Tuples, and Dictionaries</h3>
                    <p>Learn how to store complex data using Python's built-in data structures. Iteration, methods, and best practices.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 55 mins</span>
                        <span class="module-badge">Data Structures</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 5 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <!--<video controls poster="https://images.pexels.com/photos/1089438/pexels-photo-1089438.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>-->
                     <iframe width="560" height="315" src="https://www.youtube.com/embed/OvTH-7ESoRA?si=t5lc5zCP1WOSofG7" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> </div>
                <div class="video-info">
                    <h3>Lecture 5: Functions and Modules</h3>
                    <p>Write reusable code blocks using functions. Learn how to import modules and organize your code efficiently.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 45 mins</span>
                        <span class="module-badge">Architecture</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 6 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <!--<video controls poster="https://images.pexels.com/photos/1181671/pexels-photo-1181671.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>--> <iframe width="560" height="315" src="https://www.youtube.com/embed/HeW-D6KpDwY?si=UFl1-AvbBIHs3haX" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h3>Lecture 6: Object-Oriented Programming</h3>
                    <p>Introduction to OOP in Python. Classes, objects, inheritance, and polymorphism explained with examples.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 75 mins</span>
                        <span class="module-badge">Advanced</span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <p>Contact: 03000000000</p>
        <p>Email: EduLearn123@gmail.com</p>
        <p>© 2025 EduLearn | All Rights Reserved</p>
    </footer>
    <script src="progress.js" data-course="<?php echo htmlspecialchars($course_name); ?>"></script>
</body>
</html>
