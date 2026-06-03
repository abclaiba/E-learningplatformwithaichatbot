<?php
require_once 'check_enrollment.php';
$course_name = 'Software Engineering';
if (!verify_enrollment($course_name)) {
    redirect_to_enroll($course_name);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Engineering Lectures - EduLearn</title>
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
            <h2>Software Engineering</h2>
            <p>Learn SDLC, Agile methodologies, software testing, and complete system design. Master the principles of building robust, scalable software products.</p>
        </div>

        <div class="video-container">
            <!-- Video 1 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/3183150/pexels-photo-3183150.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 1: Intro to Software Engineering & SDLC</h3>
                    <p>Understand the Software Development Life Cycle (SDLC), waterfall, iterative models, and the core phases of software engineering.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 45 mins</span>
                        <span class="module-badge">Basics</span>
                    </div>
                </div>
            </div>

            <!-- Video 2 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/3153198/pexels-photo-3153198.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 2: Agile & Scrum Methodologies</h3>
                    <p>Dive into modern Agile practices. Learn about Scrum frameworks, sprints, user stories, kanban boards, and daily standups.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 50 mins</span>
                        <span class="module-badge">Agile</span>
                    </div>
                </div>
            </div>

            <!-- Video 3 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/3182773/pexels-photo-3182773.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 3: Requirements Engineering & Analysis</h3>
                    <p>Learn how to gather, analyze, and document functional and non-functional requirements using SRS documents and use cases.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 55 mins</span>
                        <span class="module-badge">Requirements</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 4 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/1181244/pexels-photo-1181244.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 4: Software Architecture & System Design</h3>
                    <p>Explore architectural patterns (Monolith, Microservices, MVC) and high-level system design principles for scalable applications.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 60 mins</span>
                        <span class="module-badge">Architecture</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 5 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/1181675/pexels-photo-1181675.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 5: Design Patterns & Clean Code</h3>
                    <p>Master object-oriented design principles (SOLID) and essential design patterns like Singleton, Factory, and Observer.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 65 mins</span>
                        <span class="module-badge">Design Patterns</span>
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
                    <h3>Lecture 6: Software Testing & Quality Assurance</h3>
                    <p>Learn about Unit Testing, Integration Testing, TDD (Test-Driven Development), CI/CD pipelines, and automated QA practices.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 50 mins</span>
                        <span class="module-badge">Testing & QA</span>
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
