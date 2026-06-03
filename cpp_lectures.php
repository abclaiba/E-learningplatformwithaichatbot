<?php
require_once 'check_enrollment.php';
$course_name = 'C++ Programming';
if (!verify_enrollment($course_name)) {
    redirect_to_enroll($course_name);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>C++ Programming Lectures - EduLearn</title>
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
            <h2>C++ Programming</h2>
            <p>Master OOP concepts, data structures, memory management, and algorithms. Build high-performance applications from scratch.</p>
        </div>

        <div class="video-container">
            <!-- Video 1 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/1181671/pexels-photo-1181671.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 1: Introduction to C++ & Basic Syntax</h3>
                    <p>Learn the history of C++, setting up your IDE, basic syntax, variables, data types, and writing your first "Hello World" program.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 45 mins</span>
                        <span class="module-badge">Basics</span>
                    </div>
                </div>
            </div>

            <!-- Video 2 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/546819/pexels-photo-546819.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 2: Control Structures & Functions</h3>
                    <p>Master if-else statements, loops (for, while, do-while), switch cases, function declarations, parameters, and return types.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 50 mins</span>
                        <span class="module-badge">Fundamentals</span>
                    </div>
                </div>
            </div>

            <!-- Video 3 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/11035471/pexels-photo-11035471.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 3: Pointers, References & Memory Management</h3>
                    <p>Understand memory addresses, pointers, dereferencing, pass-by-reference vs pass-by-value, and dynamic memory allocation.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 55 mins</span>
                        <span class="module-badge">Memory</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 4 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/1181271/pexels-photo-1181271.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 4: Object-Oriented Programming (OOP) Basics</h3>
                    <p>Dive into classes, objects, constructors, destructors, encapsulation, and access specifiers (public, private, protected).</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 60 mins</span>
                        <span class="module-badge">OOP</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 5 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/270404/pexels-photo-270404.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 5: Inheritance, Polymorphism & Virtual Functions</h3>
                    <p>Explore base and derived classes, method overriding, polymorphism, abstract classes, and the role of virtual functions.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 65 mins</span>
                        <span class="module-badge">Advanced OOP</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 6 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/3861969/pexels-photo-3861969.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 6: Standard Template Library (STL) & Exception Handling</h3>
                    <p>Learn about vectors, maps, iterators, generic programming with templates, and robust error handling using try-catch blocks.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 50 mins</span>
                        <span class="module-badge">STL & Exceptions</span>
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