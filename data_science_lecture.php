<?php
require_once 'check_enrollment.php';
$course_name = 'Data Science';
if (!verify_enrollment($course_name)) {
    redirect_to_enroll($course_name);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Science Lectures - EduLearn</title>
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
            <h2>Data Science</h2>
            <p>Learn data analysis, visualization, predictive modeling, and turn raw data into actionable insights.</p>
        </div>

        <div class="video-container">
            <!-- Video 1 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/590022/pexels-photo-590022.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 1: Intro to Data Science</h3>
                    <p>What is Data Science? Understand the data lifecycle and core tools like Python, Pandas, and NumPy.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 40 mins</span>
                        <span class="module-badge">Basics</span>
                    </div>
                </div>
            </div>

            <!-- Video 2 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/265081/pexels-photo-265081.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 2: Data Cleaning & Preprocessing</h3>
                    <p>Learn how to handle missing data, identify outliers, and scale features for analysis.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 55 mins</span>
                        <span class="module-badge">Data Prep</span>
                    </div>
                </div>
            </div>

            <!-- Video 3 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/590041/pexels-photo-590041.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 3: Exploratory Data Analysis (EDA)</h3>
                    <p>Visualize data and understand distributions using libraries like Matplotlib and Seaborn.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 60 mins</span>
                        <span class="module-badge">Analysis</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 4 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/209151/pexels-photo-209151.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 4: Statistical Foundations</h3>
                    <p>Cover probability, hypothesis testing, and statistical distributions crucial for Data Science.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 50 mins</span>
                        <span class="module-badge">Statistics</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 5 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/669615/pexels-photo-669615.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 5: Predictive Modeling</h3>
                    <p>Build basic predictive models using linear regression and evaluate their performance.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 65 mins</span>
                        <span class="module-badge">Modeling</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 6 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <video controls poster="https://images.pexels.com/photos/106344/pexels-photo-106344.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>
                </div>
                <div class="video-info">
                    <h3>Lecture 6: Data Visualization & Dashboards</h3>
                    <p>Create interactive dashboards and compelling visual narratives to communicate insights.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 45 mins</span>
                        <span class="module-badge">Visualization</span>
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