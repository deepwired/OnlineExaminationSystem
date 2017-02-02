-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2015 at 03:37 AM
-- Server version: 5.6.19-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `examportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `schedule_id` bigint(20) DEFAULT NULL,
  `question_paper_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_answers_1_idx` (`question_paper_id`),
  KEY `fk_answers_2_idx` (`schedule_id`),
  KEY `fk_answers_3_idx` (`group_id`),
  KEY `fk_answers_4_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `schedule_id`, `question_paper_id`, `group_id`, `user_id`, `question_id`, `answer`) VALUES
(65, 80, 198, 75, 57, 140, 'C'),
(66, 80, 198, 75, 57, 141, 'B'),
(67, 80, 198, 75, 57, 142, 'B'),
(68, 80, 198, 75, 57, 143, ' asdasd'),
(69, 80, 198, 75, 57, 144, ' primary'),
(70, 80, 198, 75, 57, 145, ' dsdsdsds'),
(71, 83, 199, 71, 57, 146, 'D'),
(72, 83, 199, 71, 57, 147, ' dsdsdsdfdffd'),
(73, 83, 199, 71, 57, 148, 'B'),
(74, 83, 199, 71, 57, 149, 'D'),
(75, 83, 199, 71, 57, 150, 'A'),
(76, 83, 199, 71, 57, 151, 'A'),
(77, 84, 199, 75, 57, 146, 'A'),
(78, 84, 199, 75, 57, 147, ' vxcvxcvcvcvc'),
(79, 84, 199, 75, 57, 148, 'D'),
(80, 84, 199, 75, 57, 149, 'C'),
(81, 84, 199, 75, 57, 150, 'D'),
(82, 84, 199, 75, 57, 151, 'B'),
(83, 80, 198, 75, 54, 140, 'C'),
(84, 80, 198, 75, 54, 141, 'D'),
(85, 80, 198, 75, 54, 142, 'D'),
(86, 80, 198, 75, 54, 143, 'dfsdfsddsdssd '),
(87, 80, 198, 75, 54, 144, 'klklklklklk '),
(88, 80, 198, 75, 54, 145, ' lklklklklk');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `creator_id` bigint(20) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `parent_group_id` int(11) NOT NULL,
  `group_type_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_group_1_idx` (`creator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `creator_id`, `name`, `description`, `parent_group_id`, `group_type_id`, `time`) VALUES
(71, 51, 'MSc(CA) 2014-16', 'Masters of Science in Computer Applications', 0, 0, '2015-10-15 20:04:10'),
(72, 51, 'MBA(IT) 2014-16', 'MBA in Information Technology', 0, 0, '2015-10-15 22:30:06'),
(74, 51, 'RDBMS', 'Semester 1 Relational Database Management Sys', 71, 0, '2015-10-15 22:31:41'),
(75, 51, 'JavaScript', 'Semester 1 (HTML , HTML 5 )', 71, 0, '2015-10-15 22:32:26'),
(76, 51, 'R Programming', 'Data Mining and Data Clustering', 71, 0, '2015-10-15 22:41:27'),
(77, 51, 'TCS', 'Aptitude Test', 0, 0, '2015-10-15 22:42:01'),
(78, 51, 'Wipro', 'Technical Test', 0, 0, '2015-10-15 22:42:21'),
(79, 51, 'BBA(IT)', 'Under Graduation Programme', 0, 0, '2015-10-15 22:43:01'),
(80, 51, 'SPM', 'Project Management Specialization', 72, 0, '2015-10-15 22:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `group_type`
--

CREATE TABLE IF NOT EXISTS `group_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `question_paper_id` bigint(20) DEFAULT NULL,
  `question` varchar(800) DEFAULT NULL,
  `a` varchar(45) DEFAULT NULL,
  `b` varchar(45) DEFAULT NULL,
  `c` varchar(45) DEFAULT NULL,
  `d` varchar(45) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `value` bigint(20) DEFAULT NULL,
  `question_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_question_1_idx` (`question_paper_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question_paper_id`, `question`, `a`, `b`, `c`, `d`, `answer`, `value`, `question_type`) VALUES
(140, 198, ' Consider the following snippet code\n\nvar string1 = â€123â€;\nvar intvalue = 123;\nalert( string1 + intvalue );\n\n\nThe Result will be', '123246', '246', '123123', 'Exception', 'C', 1, 1),
(141, 198, 'A function definition expression can be called', 'Function prototype', 'Function literal', 'Function definition', 'Function declaration', 'B', 1, 1),
(142, 198, 'The property of a primary expression is', 'stand-alone expressions', 'basic expressions containing all necessary fu', 'contains variable references alone', 'complex expressions', 'A', 1, 1),
(143, 198, 'The JavaScriptâ€™s syntax calling ( or executing ) a function or method is called', '', '', '', '', 'invocation Expression', 1, 2),
(144, 198, 'What kind of an expression is â€œnew Point(2,3)â€', '', '', '', '', 'Object Creation Expression', 1, 2),
(145, 198, 'â€œAn expression that can legally appear on the left side of an assignment expression.â€ is a well known explanation for variables, properties of objects, and elements of arrays. They are called', '', '', '', '', 'Lvalue', 1, 2),
(146, 199, 'The behaviour of the instances present of a class inside a method is defined by', 'Method', 'Classes', 'Interfaces', 'Classes and Interfaces', 'B', 1, 1),
(147, 199, 'The keyword or the property that you use to refer to an object through which they were invoked i', '', '', '', '', 'this', 1, 2),
(148, 199, 'The basic difference between JavaScript and Java is', 'There is no difference', ' Functions are considered as fields', '. Variables are specific', 'functions are values, and there is no hard di', 'D', 1, 1),
(149, 199, 'The meaning for Augmenting classes is that', 'objects inherit prototype properties even in ', 'objects inherit prototype properties only in ', 'objects inherit prototype properties in stati', ' None of the mentioned', 'A', 1, 1),
(150, 199, ' The property of JSON() method is:', 'it can be invoked manually as object.JSON()', 'it will be automatically invoked by the compi', 'it is invoked automatically by the JSON.strin', ' it cannot be invoked in any form', 'C', 1, 1),
(151, 199, 'When a class B can extend another class A, we say that', 'A is the superclass and B is the subclass', ' B is the superclass and A is the subclass', '. Both A and B are the superclas', ' Both A and B are the subclass', 'A', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_paper`
--

CREATE TABLE IF NOT EXISTS `question_paper` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_question_paper_1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=200 ;

--
-- Dumping data for table `question_paper`
--

INSERT INTO `question_paper` (`id`, `user_id`, `name`, `description`, `time`) VALUES
(198, 51, 'Java Script Test 1', 'Expressions and Operators', '2015-10-15 22:59:57'),
(199, 51, 'JavaScript Exam2', 'Classes in JS', '2015-10-15 23:14:09');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'supervisor'),
(3, 'invigilator'),
(4, 'applicant'),
(5, 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `creator_id` bigint(20) DEFAULT NULL,
  `question_paper_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `time` time DEFAULT NULL,
  `attempt` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_schedule_1_idx` (`group_id`),
  KEY `fk_schedule_2_idx` (`question_paper_id`),
  KEY `fk_schedule_3_idx` (`creator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `creator_id`, `question_paper_id`, `group_id`, `start_time`, `end_time`, `time`, `attempt`) VALUES
(80, 51, 198, 75, '2015-10-15 23:21:00', '2015-10-16 23:22:00', '01:00:00', 0),
(83, 51, 199, 71, '2015-10-16 01:57:00', '2015-10-17 01:58:00', '01:00:00', 0),
(84, 51, 199, 75, '2015-10-16 02:00:00', '2015-10-17 02:01:00', '01:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `schedule_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `score` bigint(20) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `submit_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `schedule_id`, `user_id`, `score`, `start_time`, `submit_time`) VALUES
(84, 80, 57, 2, '2015-10-16 01:25:58', '2015-10-16 01:27:44'),
(85, 83, 57, 1, '2015-10-16 02:12:50', '2015-10-16 02:19:21'),
(86, 84, 57, 1, '2015-10-16 02:21:21', '2015-10-16 02:22:32'),
(87, 80, 54, 1, '2015-10-16 02:48:58', '2015-10-16 02:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_user_1_idx` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `name`, `password`, `email`, `phone`, `time`) VALUES
(50, 1, 'kinnary raval', 'e10adc3949ba59abbe56e057f20f883e', 'ravalkinnary.ec@gmail.com', '9673658512', '2015-10-13 05:23:33'),
(51, 2, 'deep singh baweja', 'e10adc3949ba59abbe56e057f20f883e', 'deepwired@gmail.com', '7798143430', '2015-10-13 14:16:17'),
(54, 4, 'karan manshani', 'e10adc3949ba59abbe56e057f20f883e', 'karan@manshani.com', '7567560018', '2015-10-12 06:13:16'),
(57, 4, 'jay jayswal', 'e10adc3949ba59abbe56e057f20f883e', 'jjay2310@gmail.com', '9673658512', '2015-10-15 07:15:25');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_group_1_idx` (`group_id`),
  KEY `fk_user_group_2_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=322 ;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(318, 54, 71),
(319, 57, 71),
(320, 54, 75),
(321, 57, 75);

-- --------------------------------------------------------

--
-- Table structure for table `user_interaction`
--

CREATE TABLE IF NOT EXISTS `user_interaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `receiver_role_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_interaction`
--

INSERT INTO `user_interaction` (`id`, `sender_id`, `message`, `receiver_role_id`, `receiver_id`, `time`) VALUES
(1, 54, 'hi kinn', 4, 50, NULL),
(2, 51, 'Regarding u : u r d best', 0, 0, '2015-10-15 00:17:45'),
(3, 51, 'Regarding Evaluation of Sem 1 Javascript Paper : Our faculty has asked questions out of scope. We request to inform about syllabus in detail from next time', 0, 0, '2015-10-16 02:42:32');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_answers_1` FOREIGN KEY (`question_paper_id`) REFERENCES `question_paper` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_answers_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_answers_3` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_answers_4` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `fk_group_1` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_1` FOREIGN KEY (`question_paper_id`) REFERENCES `question_paper` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD CONSTRAINT `fk_question_paper_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `fk_schedule_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_schedule_2` FOREIGN KEY (`question_paper_id`) REFERENCES `question_paper` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_schedule_3` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `fk_user_group_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_group_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
