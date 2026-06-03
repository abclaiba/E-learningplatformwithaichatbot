<?php
require_once 'check_enrollment.php';
$course_name = 'Artificial Intelligence';
if (!verify_enrollment($course_name)) {
    redirect_to_enroll($course_name);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artificial Intelligence Lectures - EduLearn</title>
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
            <h2>Artificial Intelligence</h2>
            <p>Understand AI, machine learning models, and neural networks. Dive deep into intelligent systems.</p>
        </div>

        <div class="video-container">
            <!-- Video 1 -->
            <div class="video-card">
                <div class="video-wrapper">
                  <!--  <video controls poster="https://images.pexels.com/photos/8386440/pexels-photo-8386440.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>--><iframe width="560" height="315" src="https://www.youtube.com/embed/SSE4M0gcmvE?si=HzewEajunVLug-RO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h3>Lecture 1: Introduction to AI</h3>
                    <p>What is Artificial Intelligence? Explore the history, types of AI, and its applications in the real world.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 45 mins</span>
                        <span class="module-badge">Basics</span>
                    </div>
                </div>
            </div>

            <!-- Video 2 -->
            <div class="video-card">
                <div class="video-wrapper">
                   <!-- <video controls poster="https://images.pexels.com/photos/373543/pexels-photo-373543.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>--><iframe width="560" height="315" src="https://www.youtube.com/embed/o3bWqPdWJ88?si=2fzqgF4Hkusz73LQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h3>Lecture 2: Machine Learning vs Deep Learning</h3>
                    <p>Understand the differences between ML and DL, and when to use algorithms from each domain.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 50 mins</span>
                        <span class="module-badge">Fundamentals</span>
                    </div>
                </div>
            </div>

            <!-- Video 3 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <!--<video controls poster="https://images.pexels.com/photos/8438918/pexels-photo-8438918.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>--><iframe width="560" height="315" src="https://www.youtube.com/embed/aircAruvnKk?si=zfM1jDrS1CBagaue" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h3>Lecture 3: Neural Networks Demystified</h3>
                    <p>Learn how artificial neural networks work, including perceptrons, activation functions, and backpropagation.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 60 mins</span>
                        <span class="module-badge">Architecture</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 4 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <!--<video controls poster="https://images.pexels.com/photos/8386371/pexels-photo-8386371.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>--><iframe width="560" height="315" src="https://www.youtube.com/embed/SSE4M0gcmvE?si=HzewEajunVLug-RO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h3>Lecture 4: Natural Language Processing</h3>
                    <p>Discover how AI processes text and speech. Learn about sentiment analysis, chatbots, and language models.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 55 mins</span>
                        <span class="module-badge">Applications</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 5 -->
            <div class="video-card">
                <div class="video-wrapper">
                   <!-- <video controls poster="https://images.pexels.com/photos/8386422/pexels-photo-8386422.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>--><iframe width="560" height="315" src="https://www.youtube.com/embed/NGeHyQm-0m8?si=FqPpCj84bKocIQYi" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h3>Lecture 5: Computer Vision</h3>
                    <p>Explore how computers see and interpret images using convolutional neural networks (CNNs).</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 60 mins</span>
                        <span class="module-badge">Applications</span>
                    </div>
                </div>
            </div>
            
            <!-- Video 6 -->
            <div class="video-card">
                <div class="video-wrapper">
                    <!--<video controls poster="https://images.pexels.com/photos/3861969/pexels-photo-3861969.jpeg?auto=compress&cs=tinysrgb&w=600">
                        <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                        Your browser does not support HTML video.
                    </video>-->
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/EH5jx5qPabU?si=nTp1wbwEWmgAKvAy" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h3>Lecture 6: Building Your First AI Model</h3>
                    <p>A hands-on coding session to build, train, and evaluate a simple AI model using Python and TensorFlow.</p>
                    <div class="video-meta">
                        <span><span style="font-size:16px; margin-right:5px">⏱</span> 75 mins</span>
                        <span class="module-badge">Hands-on</span>
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