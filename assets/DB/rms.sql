-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 10:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(30) NOT NULL,
  `user_id` int(50) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_full_name` varchar(60) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `section` varchar(20) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `faculty_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `user_id`, `course_name`, `course_full_name`, `semester`, `section`, `subject_id`, `faculty_id`) VALUES
(58, 27, 'BSc.CSIT', 'Information Technology & Computer Science', 'seven', 'a', '37', '38'),
(59, 28, 'BSc.CSIT', 'Information Technology & Computer Science', 'seven', 'a', '41', '39'),
(60, 28, 'BSc.CSIT', 'Information Technology & Computer Science', 'seven', 'a', '42', '39'),
(61, 28, 'BSc.CSIT', 'Information Technology & Computer Science', 'seven', 'a', '43', '39'),
(62, 28, 'BSc.CSIT', 'Information Technology & Computer Science', 'seven', 'a', '43', '39');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(30) NOT NULL,
  `user_id` int(50) NOT NULL,
  `faculty_code` varchar(30) NOT NULL,
  `faculty_name` varchar(50) NOT NULL,
  `designation` varchar(60) NOT NULL,
  `qualification` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `user_id`, `faculty_code`, `faculty_name`, `designation`, `qualification`) VALUES
(38, 27, 'CSIT', 'Engineering', 'instructor', 'Phd'),
(39, 28, 'CSIT', 'Engineering', 'Lecturer', 'Phd'),
(40, 28, 'ECS', 'Education', 'Lecturer', 'Phd');

-- --------------------------------------------------------

--
-- Table structure for table `freetime`
--

CREATE TABLE `freetime` (
  `user_id` int(30) NOT NULL,
  `time_id` int(30) NOT NULL,
  `teacher_id` int(30) NOT NULL,
  `day` int(30) NOT NULL,
  `start_hour` int(30) NOT NULL,
  `start_min` int(30) NOT NULL,
  `end_hour` int(30) NOT NULL,
  `end_min` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freetime`
--

INSERT INTO `freetime` (`user_id`, `time_id`, `teacher_id`, `day`, `start_hour`, `start_min`, `end_hour`, `end_min`) VALUES
(28, 57, 27, 1, 7, 0, 10, 45),
(28, 58, 27, 2, 7, 0, 10, 45),
(28, 59, 27, 3, 7, 0, 10, 45),
(28, 63, 28, 1, 7, 30, 9, 45),
(28, 64, 28, 2, 8, 30, 10, 0),
(28, 65, 28, 3, 8, 30, 10, 0),
(28, 66, 29, 1, 10, 0, 12, 0),
(28, 67, 29, 2, 10, 30, 12, 45),
(28, 68, 29, 3, 10, 30, 12, 45);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(30) NOT NULL,
  `teacher_id` int(30) NOT NULL,
  `user_id` int(50) NOT NULL,
  `subject_code` varchar(30) NOT NULL,
  `subject_name` varchar(60) NOT NULL,
  `l` int(15) NOT NULL DEFAULT 0,
  `c_taken` int(9) DEFAULT 0,
  `slack` decimal(9,0) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `teacher_id`, `user_id`, `subject_code`, `subject_name`, `l`, `c_taken`, `slack`) VALUES
(41, 27, 28, 'Csc 401', 'IT', 6, 0, '0'),
(42, 28, 28, 'Csc 402', 'SPM', 5, 0, '0'),
(43, 29, 28, 'Csc 403', 'AJP', 5, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `user_id` int(30) NOT NULL,
  `teacher_id` int(30) NOT NULL,
  `teacher_code` varchar(30) NOT NULL,
  `teacher_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`user_id`, `teacher_id`, `teacher_code`, `teacher_name`) VALUES
(28, 27, 'KD', 'Keshav Dhami'),
(28, 28, 'MA', 'Manish Aryal'),
(28, 29, 'AS', 'Arjun Saud');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `uname` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `ip_address`, `date`, `time`, `username`, `email`, `uname`) VALUES
(29, '76d80224611fc919a5d54f0ff9fba446', '', '2019-08-23', '08:07:25', 'qwe', 'asd@asd.com', 'Sagarmatha'),
(30, '7815696ecbf1c96e6894b779456d330e', '', '2019-08-23', '08:26:37', 'asd', 'asd@asd.com', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `freetime`
--
ALTER TABLE `freetime`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `freetime`
--
ALTER TABLE `freetime`
  MODIFY `time_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
