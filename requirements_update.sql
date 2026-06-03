-- =====================================================
-- EduLearn — schema updates for supervisor requirements
-- Run: mysql -u root elearning < requirements_update.sql
-- =====================================================
USE `elearning`;

-- Req 2: admin approval for new signups -----------------
ALTER TABLE `student`
  ADD COLUMN `status` ENUM('pending','approved') NOT NULL DEFAULT 'pending'
  AFTER `password`;

-- existing seeded students stay usable
UPDATE `student` SET `status` = 'approved';

-- Req 4: enrollment deadline (last date) ----------------
ALTER TABLE `enrollment`
  ADD COLUMN `deadline` DATE DEFAULT NULL
  AFTER `enrolled_at`;

-- Req 1: per-lecture progress tracking ------------------
DROP TABLE IF EXISTS `lecture_progress`;
CREATE TABLE `lecture_progress` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `student_id` INT(11) NOT NULL,
  `course_name` VARCHAR(255) NOT NULL,
  `lecture_no` INT(11) NOT NULL,
  `completed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_progress` (`student_id`,`course_name`,`lecture_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
