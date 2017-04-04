-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 08:57 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursemgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(10) UNSIGNED NOT NULL,
  `assignment` varchar(40) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `dateposted` date NOT NULL,
  `towho` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `datesubmitted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `assignment`, `instructor_id`, `course_id`, `student_id`, `dateposted`, `towho`, `deadline`, `datesubmitted`) VALUES
(1, 'choicestoneletterhead.docx', 1, 1, 0, '2016-11-24', 2, '2016-11-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `courseregistration`
--

CREATE TABLE `courseregistration` (
  `coursereg_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `semester` int(11) NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseregistration`
--

INSERT INTO `courseregistration` (`coursereg_id`, `student_id`, `course_id`, `instructor_id`, `semester`, `session`) VALUES
(1, 1, 1, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `course_name` varchar(40) NOT NULL,
  `course_unit` int(11) NOT NULL,
  `course_code` varchar(15) NOT NULL,
  `course_status` varchar(15) NOT NULL,
  `department_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_unit`, `course_code`, `course_status`, `department_id`, `level_id`, `semester_id`) VALUES
(1, 'Introduction to computer science', 3, 'csc101', '', 1, 1, 1),
(2, 'Algebra1', 2, 'mts101', '', 2, 1, 1),
(4, 'Organic chemistry1', 2, 'CHM102', '', 4, 1, 2),
(5, 'Calculus And Geometry', 2, 'MTS102', '', 2, 1, 2),
(7, 'Human Physiology', 3, 'BIO202', '', 5, 2, 1),
(8, 'Flowchart and Algorithm', 2, 'csc102', '', 1, 1, 2),
(9, 'Programming 1', 3, 'csc201', '', 1, 2, 1),
(10, 'Programming 2', 3, 'csc202', '', 1, 2, 2),
(11, 'Groups and Rings', 3, 'mts301', '', 2, 3, 1),
(12, 'Operation Research', 2, 'mts363', '', 2, 3, 1),
(13, 'Maths Method 2', 3, 'mts341', '', 2, 3, 1),
(14, 'Chemical Reactions', 2, 'chm222', '', 7, 2, 1),
(15, 'Soap Making', 3, 'chm223', '', 7, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `courseschedule`
--

CREATE TABLE `courseschedule` (
  `course_sched_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `coursetime` time NOT NULL,
  `coursedate` date NOT NULL,
  `venue` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseschedule`
--

INSERT INTO `courseschedule` (`course_sched_id`, `course_id`, `instructor_id`, `coursetime`, `coursedate`, `venue`) VALUES
(1, 1, 1, '13:59:00', '2016-11-30', '1');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(10) UNSIGNED NOT NULL,
  `department_name` varchar(30) NOT NULL,
  `department_alias` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `department_alias`) VALUES
(1, 'Computer Science', 'csc'),
(2, 'Mathematics', 'mts'),
(3, 'Statistics', 'sts'),
(5, 'Biology', 'BIO'),
(6, 'Physics', 'PHS'),
(7, 'Chemistry', 'chm'),
(8, 'Biochemistry', 'BCH');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `info_id` int(11) NOT NULL,
  `info` longtext NOT NULL,
  `info_title` varchar(100) NOT NULL,
  `post_date` datetime NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`info_id`, `info`, `info_title`, `post_date`, `course_id`) VALUES
(1, 'Dear student,\r\n\r\nHope you are well', 'Upcoming Test', '2016-11-24 20:55:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(10) UNSIGNED NOT NULL,
  `instructor_firstname` varchar(40) NOT NULL,
  `instructor_lastname` varchar(40) NOT NULL,
  `instructor_email` varchar(40) NOT NULL,
  `instructor_phonenum` varchar(20) NOT NULL,
  `instructor_dob` date NOT NULL,
  `instructor_sex` varchar(10) NOT NULL,
  `instructor_qualification` varchar(30) NOT NULL,
  `instructor_yr_appointed` year(4) NOT NULL,
  `instructor_regno` varchar(20) NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `instructor_firstname`, `instructor_lastname`, `instructor_email`, `instructor_phonenum`, `instructor_dob`, `instructor_sex`, `instructor_qualification`, `instructor_yr_appointed`, `instructor_regno`, `department_id`, `course_id`) VALUES
(1, 'Pedro ', 'Adams', 'adams@uk.co', '05090909090', '2016-11-01', 'male', 'MSc', 2005, 'LEC101', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecturenotes`
--

CREATE TABLE `lecturenotes` (
  `lecturenote_id` int(10) UNSIGNED NOT NULL,
  `department_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `lecturenote` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturenotes`
--

INSERT INTO `lecturenotes` (`lecturenote_id`, `department_id`, `course_id`, `lecturenote`) VALUES
(1, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level`) VALUES
(1, '100L'),
(2, '200L'),
(3, '300L'),
(4, '400L'),
(5, '500L');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `grade` text NOT NULL,
  `test_score` decimal(10,2) NOT NULL,
  `assignment_score` decimal(10,2) NOT NULL,
  `exam_score` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `percentage` decimal(10,2) NOT NULL,
  `semester` int(11) NOT NULL,
  `session` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`score_id`, `student_id`, `course_id`, `grade`, `test_score`, `assignment_score`, `exam_score`, `total`, `percentage`, `semester`, `session`) VALUES
(1, 1, 1, '', '0.00', '0.00', '0.00', '0.00', '0.00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(10) UNSIGNED NOT NULL,
  `session` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session`) VALUES
(1, '2013/2014'),
(2, '2014/2015'),
(3, '2015/2016'),
(4, '2016/2017'),
(5, '2017/2018');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) UNSIGNED NOT NULL,
  `student_firstname` varchar(40) NOT NULL,
  `student_lastname` varchar(40) NOT NULL,
  `student_phonenum` varchar(40) NOT NULL,
  `student_email` varchar(40) NOT NULL,
  `student_dob` date NOT NULL,
  `student_level` varchar(11) NOT NULL,
  `student_matric_no` varchar(20) NOT NULL,
  `student_dept_id` int(11) NOT NULL,
  `student_sex` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_firstname`, `student_lastname`, `student_phonenum`, `student_email`, `student_dob`, `student_level`, `student_matric_no`, `student_dept_id`, `student_sex`, `role`) VALUES
(1, 'Adiche', 'Amaka', '09000000000', 'amaka@aba.com', '2016-11-03', '1', '20130001', 1, 'female', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_email`, `role`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin'),
(5, '20130001', 'amaka', 'amaka@aba.com', 'student'),
(6, 'LEC101', 'adamas', 'adams@uk.co', 'instructor');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL,
  `venue` varchar(40) NOT NULL,
  `capacity` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`venue_id`, `venue`, `capacity`) VALUES
(1, 'JAO1', '300'),
(2, 'Anenih2', '200'),
(3, 'JAO3', '500'),
(5, 'JAO2', '300');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `courseregistration`
--
ALTER TABLE `courseregistration`
  ADD PRIMARY KEY (`coursereg_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `courseschedule`
--
ALTER TABLE `courseschedule`
  ADD PRIMARY KEY (`course_sched_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `lecturenotes`
--
ALTER TABLE `lecturenotes`
  ADD PRIMARY KEY (`lecturenote_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courseregistration`
--
ALTER TABLE `courseregistration`
  MODIFY `coursereg_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `courseschedule`
--
ALTER TABLE `courseschedule`
  MODIFY `course_sched_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lecturenotes`
--
ALTER TABLE `lecturenotes`
  MODIFY `lecturenote_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `session_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
