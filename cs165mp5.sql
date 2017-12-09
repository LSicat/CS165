-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2017 at 04:56 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs165mp5`
--

-- --------------------------------------------------------

--
-- Table structure for table `college_university`
--

CREATE TABLE `college_university` (
  `school_id` int(11) NOT NULL,
  `enrollment_rates` int(11) DEFAULT NULL,
  `graduation_rates` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `elementary_school`
--

CREATE TABLE `elementary_school` (
  `school_id` int(11) NOT NULL,
  `enrollment_rates` int(11) DEFAULT NULL,
  `graduation_rates` int(11) DEFAULT NULL,
  `num_who_enter_college` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `average_salary` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `located_in`
--

CREATE TABLE `located_in` (
  `located_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `region_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offers_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `professor_id` int(11) NOT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `t_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `field` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_faculty_ba_bs` int(11) DEFAULT NULL,
  `num_faculty_ma_ms` int(11) DEFAULT NULL,
  `num_faculty_phd` int(11) DEFAULT NULL,
  `num_students_ba_bs` int(11) DEFAULT NULL,
  `num_students_ms_ma` int(11) DEFAULT NULL,
  `num_students_phd` int(11) DEFAULT NULL,
  `cost_per_student` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `user_id` int(11) DEFAULT NULL,
  `rat_id` int(11) NOT NULL,
  `rate` decimal(1,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_num` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_enrollees` int(11) DEFAULT NULL,
  `num_non_enrollees` int(11) DEFAULT NULL,
  `cost_student` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `user_id` int(11) DEFAULT NULL,
  `rev_id` int(11) NOT NULL,
  `timestamp` date DEFAULT NULL,
  `text` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num_of_faculty` int(11) DEFAULT NULL,
  `num_of_students` int(11) DEFAULT NULL,
  `student_faculty_ratio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `name`, `num_of_faculty`, `num_of_students`, `student_faculty_ratio`) VALUES
(30, 'accusantium', 2, 9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `stores1`
--

CREATE TABLE `stores1` (
  `stores1_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `rev_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores2`
--

CREATE TABLE `stores2` (
  `stores2_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `rat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_body_id` int(11) DEFAULT NULL,
  `sname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isgraduating` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_body`
--

CREATE TABLE `student_body` (
  `student_body_id` int(11) NOT NULL,
  `num_female_enrollees` int(11) DEFAULT NULL,
  `num_male_enrollees` int(11) DEFAULT NULL,
  `male_female_ratio` int(11) DEFAULT NULL,
  `average_cost` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studies_in`
--

CREATE TABLE `studies_in` (
  `studies_id` int(11) NOT NULL,
  `student_body_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submits1`
--

CREATE TABLE `submits1` (
  `submits1_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rev_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submits2`
--

CREATE TABLE `submits2` (
  `submits2_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `teaches` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `technical_vocational_school`
--

CREATE TABLE `technical_vocational_school` (
  `school_id` int(11) NOT NULL,
  `enrollment_rates` int(11) DEFAULT NULL,
  `graduation_rates` int(11) DEFAULT NULL,
  `num_of_vocations_taught` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college_university`
--
ALTER TABLE `college_university`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elementary_school`
--
ALTER TABLE `elementary_school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `located_in`
--
ALTER TABLE `located_in`
  ADD PRIMARY KEY (`located_id`,`school_id`,`region_num`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `region_num` (`region_num`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offers_id`,`school_id`,`program_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`professor_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rat_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_num`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rev_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `stores1`
--
ALTER TABLE `stores1`
  ADD PRIMARY KEY (`stores1_id`,`school_id`,`rev_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `rev_id` (`rev_id`);

--
-- Indexes for table `stores2`
--
ALTER TABLE `stores2`
  ADD PRIMARY KEY (`stores2_id`,`school_id`,`rat_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `rat_id` (`rat_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_body`
--
ALTER TABLE `student_body`
  ADD PRIMARY KEY (`student_body_id`);

--
-- Indexes for table `studies_in`
--
ALTER TABLE `studies_in`
  ADD PRIMARY KEY (`studies_id`,`student_body_id`,`school_id`),
  ADD KEY `student_body_id` (`student_body_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `submits1`
--
ALTER TABLE `submits1`
  ADD PRIMARY KEY (`submits1_id`,`user_id`,`rev_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rev_id` (`rev_id`);

--
-- Indexes for table `submits2`
--
ALTER TABLE `submits2`
  ADD PRIMARY KEY (`submits2_id`,`user_id`,`rat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rat_id` (`rat_id`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`teaches`,`faculty_id`,`program_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `technical_vocational_school`
--
ALTER TABLE `technical_vocational_school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `located_in`
--
ALTER TABLE `located_in`
  ADD CONSTRAINT `located_in_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`),
  ADD CONSTRAINT `located_in_ibfk_2` FOREIGN KEY (`region_num`) REFERENCES `region` (`region_num`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`),
  ADD CONSTRAINT `offers_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `stores1`
--
ALTER TABLE `stores1`
  ADD CONSTRAINT `stores1_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`),
  ADD CONSTRAINT `stores1_ibfk_2` FOREIGN KEY (`rev_id`) REFERENCES `review` (`rev_id`);

--
-- Constraints for table `stores2`
--
ALTER TABLE `stores2`
  ADD CONSTRAINT `stores2_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`),
  ADD CONSTRAINT `stores2_ibfk_2` FOREIGN KEY (`rat_id`) REFERENCES `rating` (`rat_id`);

--
-- Constraints for table `studies_in`
--
ALTER TABLE `studies_in`
  ADD CONSTRAINT `studies_in_ibfk_1` FOREIGN KEY (`student_body_id`) REFERENCES `student_body` (`student_body_id`),
  ADD CONSTRAINT `studies_in_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`);

--
-- Constraints for table `submits1`
--
ALTER TABLE `submits1`
  ADD CONSTRAINT `submits1_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `submits1_ibfk_2` FOREIGN KEY (`rev_id`) REFERENCES `review` (`rev_id`);

--
-- Constraints for table `submits2`
--
ALTER TABLE `submits2`
  ADD CONSTRAINT `submits2_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `submits2_ibfk_2` FOREIGN KEY (`rat_id`) REFERENCES `rating` (`rat_id`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
