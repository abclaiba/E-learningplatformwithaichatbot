<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduLearn — Learn New Skills Anytime, Anywhere</title>
    <link rel="stylesheet" href="aboutus.css?v=3">
</head>
<body>

    <?php include __DIR__ . '/partials/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <h1>Learn New Skills <span>Anytime, Anywhere</span></h1>
            <p>Join thousands of learners worldwide. Hands-on courses in programming, AI, design and more — start your journey today.</p>
            <a href="#courses" class="btn hero-btn">Explore Courses</a>

            <div class="hero-stats">
                <div class="stat"><strong>13+</strong><span>Courses</span></div>
                <div class="stat"><strong>1000+</strong><span>Learners</span></div>
                <div class="stat"><strong>100%</strong><span>Online</span></div>
            </div>
        </div>
        <div class="hero-img">
            <img src="https://images.pexels.com/photos/4145153/pexels-photo-4145153.jpeg?auto=compress&cs=tinysrgb&w=900" alt="Students learning online">
        </div>
    </section>

    <!-- Courses Section -->
    <section id="courses" class="courses">
        <div class="section-head">
            <span class="eyebrow">Our Catalog</span>
            <h2>Popular Courses</h2>
        </div>

        <div class="course-container">
            <?php
            $courses = [
                ['Web Development', '🌐', 'Learn HTML, CSS, JavaScript and start building modern websites.', 'webdev_lectures.php'],
                ['Python Programming', '🐍', 'Master Python from basics to advanced with easy lectures.', 'python_lectures.php'],
                ['Graphic Designing', '🎨', 'Learn Photoshop, Illustrator, and create stunning designs.', 'graphic_design_lectures.php'],
                ['Artificial Intelligence', '🤖', 'Understand AI, machine learning models, and neural networks.', 'ai_lectures.php'],
                ['Machine Learning', '🧠', 'Learn supervised, unsupervised learning, and ML algorithms.', 'ml_lectures.php'],
                ['Data Science', '📊', 'Learn data analysis, visualization and predictive modeling.', 'data_science_lecture.php'],
                ['Cybersecurity Fundamentals', '🔐', 'Learn ethical hacking, network security and cyber attacks.', 'cybersecurity_lectures.php'],
                ['Database Management', '🗄️', 'Master SQL, MySQL, Oracle and database concepts.', 'database_lectures.php'],
                ['Mobile App Development', '📱', 'Build apps using Flutter & React Native.', 'mobile_app_lectures.php'],
                ['Cloud Computing', '☁️', 'Learn AWS, Azure, and cloud infrastructure setup.', 'cloud_computing_lectures.php'],
                ['Software Engineering', '🛠️', 'Learn SDLC, agile, testing and complete software design.', 'software_engineering_lectures.php'],
                ['Computer Networks', '🔗', 'Learn networking basics, OSI model and routing concepts.', 'computer_networks_lectures.php'],
                ['C++ Programming', '💻', 'Master OOP concepts, data structures, and algorithms.', 'cpp_lectures.php'],
            ];

            foreach ($courses as $c) {
                $name = $c[0]; $icon = $c[1]; $desc = $c[2]; $page = $c[3];
                $enroll = 'enroll.php?course=' . urlencode($name) . '&page=' . urlencode($page);
                echo '
                <div class="course-card">
                    <div class="thumb">' . $icon . '</div>
                    <div class="course-card-body">
                        <h3>' . htmlspecialchars($name) . '</h3>
                        <p>' . htmlspecialchars($desc) . '</p>
                        <a href="' . $enroll . '" class="btn">Enroll Now</a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about">
        <div class="section-head">
            <span class="eyebrow">Who We Are</span>
            <h2>About EduLearn</h2>
        </div>
        <p>
            EduLearn is a modern e-learning platform designed to help students enhance their skills
            through high-quality video lectures. Our mission is to provide affordable and accessible
            education to everyone, everywhere.
        </p>

        <div class="about-grid">
            <div class="about-card">
                <div class="ic">🎯</div>
                <h4>Our Mission</h4>
                <p>Make quality tech education affordable and accessible to every learner.</p>
            </div>
            <div class="about-card">
                <div class="ic">🎥</div>
                <h4>Quality Lectures</h4>
                <p>Hands-on video lectures across 13+ in-demand computer science fields.</p>
            </div>
            <div class="about-card">
                <div class="ic">⏰</div>
                <h4>Learn Anytime</h4>
                <p>Study at your own pace, track your progress, and learn on any device.</p>
            </div>
            <div class="about-card">
                <div class="ic">🏆</div>
                <h4>Build a Career</h4>
                <p>Gain practical skills that help you grow and build a career in tech.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="section-head">
            <span class="eyebrow">Get In Touch</span>
            <h2>Contact Us</h2>
        </div>

        <div class="contact-wrap">
            <div class="contact-info">
                <div class="contact-item">
                    <div class="ic">📍</div>
                    <div><h4>Address</h4><p>EduLearn Campus, Lahore, Pakistan</p></div>
                </div>
                <div class="contact-item">
                    <div class="ic">📞</div>
                    <div><h4>Phone</h4><p>0300-0000000</p></div>
                </div>
                <div class="contact-item">
                    <div class="ic">✉️</div>
                    <div><h4>Email</h4><p>EduLearn123@gmail.com</p></div>
                </div>
                <div class="contact-item">
                    <div class="ic">🕘</div>
                    <div><h4>Working Hours</h4><p>Mon – Sat, 9:00 AM – 6:00 PM</p></div>
                </div>
            </div>

            <form class="contact-form" onsubmit="alert('Thank you! Your message has been sent.'); return false;">
                <input type="text" placeholder="Your Name" required>
                <input type="email" placeholder="Your Email" required>
                <textarea placeholder="Your Message" required></textarea>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="f-logo">🎓 EduLearn</div>
        <p>Contact: 0300-0000000 &nbsp;|&nbsp; Email: <a href="mailto:EduLearn123@gmail.com">EduLearn123@gmail.com</a></p>
        <p>© <?php echo date('Y'); ?> EduLearn — All Rights Reserved</p>
    </footer>

    <!-- Floating AI Bot -->
    <a href="aibot.html" class="ai-fab">🤖 AI Bot</a>

</body>
</html>
