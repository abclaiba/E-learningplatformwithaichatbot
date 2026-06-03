-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 03, 2026 at 03:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `instructor` varchar(100) DEFAULT 'Admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_name`, `description`, `instructor`, `created_at`) VALUES
(1, 'Web Development', 'Learn HTML, CSS, JavaScript and start building modern websites.', 'Admin', '2026-06-02 04:46:34'),
(2, 'Python Programming', 'Master Python from basics to advanced with easy lectures.', 'Admin', '2026-06-02 04:46:34'),
(3, 'Graphic Designing', 'Learn Photoshop, Illustrator, and create stunning designs.', 'Admin', '2026-06-02 04:46:34'),
(4, 'Artificial Intelligence', 'Understand AI, machine learning models, and neural networks.', 'Admin', '2026-06-02 04:46:34'),
(5, 'Machine Learning', 'Learn supervised, unsupervised learning, and ML algorithms.', 'Admin', '2026-06-02 04:46:34'),
(6, 'Data Science', 'Learn data analysis, visualization and predictive modeling.', 'Admin', '2026-06-02 04:46:34'),
(7, 'Cybersecurity Fundamentals', 'Learn ethical hacking, network security and cyber attacks.', 'Admin', '2026-06-02 04:46:34'),
(8, 'Database Management', 'Master SQL, MySQL, Oracle and database concepts.', 'Admin', '2026-06-02 04:46:34'),
(9, 'Mobile App Development', 'Build apps using Flutter & React Native.', 'Admin', '2026-06-02 04:46:34'),
(10, 'Cloud Computing', 'Learn AWS, Azure, and cloud infrastructure setup.', 'Admin', '2026-06-02 04:46:34'),
(11, 'Software Engineering', 'Learn SDLC, agile, testing and complete software design.', 'Admin', '2026-06-02 04:46:34'),
(12, 'Computer Networks', 'Learn networking basics, OSI model and routing concepts.', 'Admin', '2026-06-02 04:46:34'),
(13, 'C++ Programming', 'Master OOP concepts, data structures, and algorithms.', 'Admin', '2026-06-02 04:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `enrolled_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `student_id`, `student_name`, `course_name`, `enrolled_at`, `deadline`) VALUES
(1, 1, 'ali', 'Web Development', '2026-06-02 03:56:55', NULL),
(2, 1, 'ali', 'Graphic Designing', '2026-06-02 03:58:02', NULL),
(3, 1, 'ali', 'Artificial Intelligence', '2026-06-02 04:15:55', NULL),
(4, 3, 'aiza', 'Web Development', '2026-06-02 05:44:55', NULL),
(5, 1, 'ali', 'Python Programming', '2026-06-02 05:46:49', NULL),
(6, 5, 'shahram Awan', 'Web Development', '2026-06-02 05:30:28', NULL),
(9, 6, 'ahmed', 'Web Development', '2026-06-03 01:55:21', '2026-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `lecture_progress`
--

CREATE TABLE `lecture_progress` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `lecture_no` int(11) NOT NULL,
  `completed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecture_progress`
--

INSERT INTO `lecture_progress` (`id`, `student_id`, `course_name`, `lecture_no`, `completed_at`) VALUES
(1, 1, 'Web Development', 1, '2026-06-03 01:20:53'),
(2, 6, 'Web Development', 1, '2026-06-03 01:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('pending','approved') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `email`, `password`, `status`) VALUES
(1, 'ali', 'ali123@gmail.com', '$2y$10$TgOg2gRjPhbnWQemvrUOveadSBsqhqnVgdDvO5zb5O7I8C8z1aMX2', 'approved'),
(2, 'amna', 'amna123@gmail.com', '$2y$10$oRArjZIbrmx/Jgnw5II4Me7hHL7ouJn2D2ZEz72bXvcDJj4uuE4aC', 'approved'),
(3, 'aiza', 'aiza123@gmail.com', '$2y$10$3PhBCud8yOhgHXhT4kWXsu24DeIPLCjsWg.oY3Xk/54iJ8WdSxGBC', 'approved'),
(4, 'shahram', 'shahram@gmail.com', '$2y$10$6Mhh8ok8k08WwKC2d161iOpr8TGnQcrIaX3ZNOcqaMaW9EBbFanmC', 'approved'),
(5, 'shahram Awan', 'shahramawan0@gmail.com', '$2y$10$1qTSOi3BwgGpi/SqKwxN/OEB.uuZNzdjkAZpQ6WA8yOkAczH2mFCK', 'approved'),
(6, 'ahmed', 'ahmed@gmail.com', '$2y$10$6Cq0.Nv2JWDYDHluxUmwruWstvv56rdNF0cj7L93ClMipTFpeeQMS', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecture_progress`
--
ALTER TABLE `lecture_progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_progress` (`student_id`,`course_name`,`lecture_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lecture_progress`
--
ALTER TABLE `lecture_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
