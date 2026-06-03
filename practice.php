<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: finallogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta-name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Platform</title>
    <link rel="stylesheet" href="aboutus.css">
</head>
<body>

    <!-- Header + Nav -->
    <header>
        <div class="logo">EduLearn</div>
        <nav>


            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#courses">Courses</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="signuppage.php" class="btn">Sign up</a></li>
                <li><a href="finallogin.php" class="btn">Login</a></li>

            </ul>
 
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <h1>Learn New Skills Anytime, Anywhere</h1>
            <p>Join thousands of learners from around the world. Start your learning journey today!</p>
            <a href="#courses" class="btn hero-btn">Explore Courses</a>
        </div>
    </section>
 <div class="logo">
        <div class="logo-icon"></div> 
         <a href="aibot.html"class="btn">🤖AI BOT</a>
      </div>
    <!-- Courses Section -->
    <section id="courses" class="courses">
        <h2>Popular Courses</h2>

        <div class="course-container">

            <!-- Course 1 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Web Development</h3>
                <p>Learn HTML, CSS, JavaScript and start building modern websites.</p>
                <a href="webdev_lectures.php" class="btn">Enroll Now</a>
        
            </div>

            <!-- Course 2 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Python Programming</h3>
                <p>Master Python from basics to advanced with easy lectures.</p>
                <a href="python_lectures.php" class="btn">Enroll Now</a>
            </div>

            <!-- Course 3 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Graphic Designing</h3>
                <p>Learn Photoshop, Illustrator, and create stunning designs.</p>
                <a href="graphic_design_lectures.php" class="btn">Enroll Now</a>
            </div>

            <!-- Course 4 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Artificial Intelligence</h3>
                <p>Understand AI, machine learning models, and neural networks.</p>
                <a href="ai_lectures.php" class="btn">Enroll Now</a>
            </div>

            <!-- Course 5 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Machine Learning</h3>
                <p>Learn supervised, unsupervised learning, and ML algorithms.</p>
                <a href="ml_lectures.php" class="btn">Enroll Now</a>
            </div>

            <!-- Course 6 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Data Science</h3>
                <p>Learn data analysis, visualization and predictive modeling.</p>
                <a href="data_science_lectures.php" class="btn">Enroll Now</a>
            </div>

            <!-- Course 7 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Cybersecurity Fundamentals</h3>
                <p>Learn ethical hacking, network security and cyber attacks.</p>
                <a href="cybersecurity_lectures.php" class="btn">Enroll Now</a>
            </div>

            <!-- Course 8 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Database Management</h3>
                <p>Master SQL, MySQL, Oracle and database concepts.</p>
                <a href="database_lectures.php" class="btn">Enroll Now</a>
            </div>

            <!-- Course 9 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Mobile App Development</h3>
                <p>Build apps using Flutter & React Native.</p>
                <a href="mobile_app_lectures.php" class="btn">Enroll Now</a>
            </div>

            <!-- Course 10 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Cloud Computing</h3>
                <p>Learn AWS, Azure, and cloud infrastructure setup.</p>
                <a href="cloud_computing_lectures.php" class="btn">Enroll Now</a>
            </div>

            <!-- Course 11 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Software Engineering</h3>
                <p>Learn SDLC, agile, testing and complete software design.</p>
                <a href="software_engineering_lectures.php" class="btn">Enroll Now</a>
            </div>

            <!-- Course 12 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>Computer Networks</h3>
                <p>Learn networking basics, OSI model and routing concepts.</p>
                <a href="computer_networks_lectures.php" class="btn">Enroll Now</a>
            </div>

            <!-- Course 13 -->
            <div class="course-card">
                <img src="https://via.placeholder.com/300x200" alt="">
                <h3>C++ Programming</h3>
                <p>Master OOP concepts, data structures, and algorithms.</p>
                 <a href="cpp_lectures.php" class="btn">Enroll Now</a>
            </div>

        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="about">
        <h2>About Us</h2>
        <p>
            EduLearn is a modern e-learning platform designed to help students enhance their skills 
            through high-quality video lectures.Our mission is to provide affordable and accessible education to everyone.
        </p>
        <p>
            We offer professional courses in Computer Science, including AI, Machine Learning, 
            Programming, Networking, Cybersecurity, Web Development, and more.  
            Learn at your own place and start building your career today!
        </p>

             
    </section>

    <!-- Footer -->
    <footer id="contact">
      <p>
              Contact:03000000000 
              </p>
              <p>
              Email :EduLearn123@gmail.com
              </p> 
        <p>© 2025 EduLearn | All Rights Reserved</p>
    </footer>
   </body>
</html>
