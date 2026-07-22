-- Database Structure and Seed Data for Student Management System
CREATE DATABASE IF NOT EXISTS `student_management`;
USE `student_management`;

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `student_id` VARCHAR(50) NOT NULL,
  `student_name` VARCHAR(100) NOT NULL,
  `department` VARCHAR(50) NOT NULL,
  `semester` VARCHAR(20) NOT NULL,
  `gender` VARCHAR(10) NOT NULL,
  `phone` VARCHAR(20) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `address` TEXT DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `students` (`student_id`, `student_name`, `department`, `semester`, `gender`, `phone`, `email`, `address`) VALUES
('242-115-227', 'Umme koli', 'CSE', '6th', 'Female', '0161234568', 'koli@gmail.com', 'Sylhet'),
('242-115-228', 'Halima Jnnat', 'CSE', '6th', 'Female', '01752637687', 'halima@gmail.com', 'Sylhet'),
('242-115-229', 'Rahnuma tahi', 'CSE', '6th', 'Female', '01787667555', 'rahnuma@gmail.com', 'Sylhet'),
('242-115-230', 'Sabiha sami', 'CSE', '6th', 'Female', '01725367892', 'sabiha@gmail.com', 'Sylhet'),
('242-115-231', 'Tahiya akter', 'CSE', '6th', 'Female', '017797667555', 'tahiya@gmail.com', 'Sylhet');
