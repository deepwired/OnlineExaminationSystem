-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2015 at 08:54 PM
-- Server version: 10.0.21-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) NOT NULL,
  `schedule_id` bigint(20) DEFAULT NULL,
  `question_paper_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` bigint(20) NOT NULL,
  `creator_id` bigint(20) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `parent_group_id` int(11) NOT NULL,
  `group_type_id` int(11) NOT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `creator_id`, `name`, `description`, `parent_group_id`, `group_type_id`, `time`) VALUES
(3, 17, 'Msc CA (2014-2016)', 'This is Sparta Group', 0, 0, '2015-09-01 16:39:17'),
(4, 17, 'Msc CA (2014-2016)', 'This is Sparta Group', 0, 0, '2015-09-01 16:40:23'),
(5, 17, 'MBA IT (2014-2016)', 'This is Sparta', 0, 0, '2015-09-01 16:40:47'),
(6, 17, 'MBA IT (2014-2016)', 'This is Sparta', 0, 0, '2015-09-01 16:41:03'),
(7, 17, 'MBA IT (2014-2016)', 'This is Sparta', 0, 0, '2015-09-01 16:41:17'),
(8, 17, 'English', 'EnglishEnglishEnglishEnglish', 5, 0, '2015-09-01 17:00:02'),
(9, 17, 'sub group', 'sub groupsub groupsub group', 3, 0, '2015-09-01 17:03:36'),
(10, 17, 'sub group2', 'sub group2sub group2sub group2sub group2', 5, 0, '2015-09-01 17:03:48'),
(11, 17, 'sub group3', 'sub group3sub group3sub group3sub group3sub g', 5, 0, '2015-09-01 17:04:00'),
(13, 17, 'sparta group', 'yo yo', 8, 0, '2015-09-01 17:17:57'),
(14, 17, 'Deep Inception', 'Yes sparta', 13, 0, '2015-09-01 17:23:03'),
(15, 17, 'Sparta Solo', 'Ph Yeay', 0, 0, '2015-09-01 18:30:17'),
(16, 17, 'Oh Yea', 'asd', 15, 0, '2015-09-01 18:30:34'),
(17, 17, 'asdfgh', 'wsrdfghjkml', 15, 0, '2015-09-01 18:32:16'),
(18, 17, 'Kinnary', 'abcd', 0, 0, '2015-09-02 10:26:20'),
(19, 17, 'asdfghjkll', 'sadfghjk', 18, 0, '2015-09-02 10:26:31'),
(20, 17, 'asdasdasd', 'asdasd', 0, 0, '2015-09-02 11:42:57'),
(21, 17, 'Sardar', 'sadfsada', 0, 0, '2015-09-02 14:39:01'),
(22, 17, 'Kinn', 'awsedrfg', 4, 0, '2015-09-02 15:28:11'),
(23, 17, 'sgtfrd', 'qre', 0, 0, '2015-09-02 15:30:34'),
(26, 17, 'sdsdfsdf', 'dsfsdfsd', 4, 0, '2015-09-02 18:22:32'),
(27, 17, 'asdasd', 'asdasd', 7, 0, '2015-09-02 18:32:34'),
(28, 17, 'testingadd', 'testing add na , stop bothering me', 0, 0, '2015-09-02 20:53:13'),
(29, 17, 'ABC', 'abcsxsaxcasc', 0, 0, '2015-09-02 21:09:08'),
(30, 17, 'intest', 'asdasd', 3, 0, '2015-09-03 14:54:37'),
(31, 17, 'This is SAdasdasda', 'ASDASDsad', 0, 0, '2015-09-05 13:02:50'),
(32, 17, 'adasdasd', 'asdasdasd', 0, 0, '2015-09-05 13:17:43'),
(33, 17, 'asdasd', 'asd\nas\ndas\nd\nasd\na\nsd\n', 0, 0, '2015-09-05 13:30:06'),
(34, 17, 'SRV ', '                            DXDXDXDX', 0, 0, '2015-09-05 16:12:52'),
(35, 17, 'asd', '                            ', 0, 0, '2015-09-06 03:43:21'),
(36, 17, 'adasd', '                            adad', 0, 0, '2015-09-06 03:46:27'),
(39, 17, 'This is FAFda', '                            Dasdasd', 21, 0, '2015-09-07 13:58:21'),
(40, 17, 'asdasdasd', '                            asdasdasd', 28, 0, '2015-09-18 18:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `group_type`
--

CREATE TABLE IF NOT EXISTS `group_type` (
  `id` int(11) NOT NULL,
  `group_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` bigint(20) NOT NULL,
  `question_paper_id` bigint(20) DEFAULT NULL,
  `question` varchar(800) DEFAULT NULL,
  `a` varchar(45) DEFAULT NULL,
  `b` varchar(45) DEFAULT NULL,
  `c` varchar(45) DEFAULT NULL,
  `d` varchar(45) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL,
  `value` bigint(20) DEFAULT NULL,
  `question_type` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question_paper_id`, `question`, `a`, `b`, `c`, `d`, `answer`, `value`, `question_type`) VALUES
(1, 83, 'asdasd', 'adad', 'ad', 'asd', 'ad', NULL, 1, 0),
(2, 84, 'adasdaSda sdascfacad', 'cad', 'dasf', 'as', 'asfsafc', NULL, 1, 0),
(3, 84, 'asdASSD ASFAS DASdasd aSd ASD ASDsa SAD ', 'cad', 'dasf', 'as', 'asfsafc', NULL, 1, 0),
(4, 84, 'as ASF ASFAS DASD asDASD ASD ', 'cad', 'dasf', 'as', 'asfsafc', NULL, 1, 0),
(5, 85, 'asdas', 'dasd', 'dad', 'ada', 'as', NULL, 1, 0),
(6, 85, 'asdasdasd', 'dasd', 'dad', 'ada', 'as', NULL, 1, 0),
(7, 86, '', 'adad', 'asdasd', 'adas', 'asdasd', NULL, 1, 0),
(8, 86, '', 'adad', 'asdasd', 'adas', 'asdasd', NULL, 1, 0),
(9, 86, '', 'adad', 'asdasd', 'adas', 'asdasd', NULL, 1, 0),
(10, 86, 'dds asd', 'adadAS', 'asdasd', 'adasD AS', 'asdasd', NULL, 1, 0),
(11, 87, 'dadada', 'asdasd', 'asd', 'a', '', NULL, 1, 0),
(12, 88, 'asdad aSD ASD ASD aSDaSdasd aSD Ad', 'sdasd  ', 'as as ', 'daSd ', 'A asd ', 'A', 1, 0),
(13, 89, 'asdasd', 'asdas', 'a', 'da', 'asdasd', 'A', 1, 0),
(14, 91, 'WTGsrZHTDYJDHGEFRTSHJFDHDGF awfsd AF SDF GAFSG', 'FA ', 'AFF', 'SDF', 'SAFSF', 'A', 1, 0),
(15, 92, 'ASD ASd ASD ASDAD aSd ASD aSD ASd aASD ASd ASD ASDAD aSd ASD aSD ASd aASD ASd ASD ASDAD aSd ASD aSD ASd a', 'asasdASD', 'adad', 'ASDas', 'asd', 'A', 1, 0),
(16, 93, 'ASD ASd ASD ASDAD aSd ASD aSD ASd aASD ASd ASD ASDAD aSd ASD aSD ASd aASD ASd ASD ASDAD aSd ASD aSD ASd aASD ASd ASD ASDAD aSd ASD aSD ASd aASD ASd ASD ASDAD aSd ASD aSD ASd aASD ASd ASD ASDAD aSd ASD aSD ASd a', 'AD ASD ', 'dasdasd', 'as dAD ASd ', 'asdas', 'A', 1, 0),
(17, 99, 'AsdasdAsdasdAsdasdAsdasdAsdasdAsdasdAsdasd', 'ASDAdAd', 'AdAD', 'aD', 'adSAD', 'A', 1, 0),
(18, 99, 'AsdasdAsdasdAsdasdAsdasdAsdasdAsdasdAsdasd', 'ASDAdAd', 'AdAD', 'aD', 'adSAD', 'A', 1, 0),
(19, 99, 'AsdasdAsdasdAsdasdAsdasdAsdasdAsdasdAsdasd', 'ASDAdAd', 'AdAD', 'aD', 'adSAD', 'C', 1, 0),
(20, 99, 'AWSREDTCFYHUIJMOKL,;.''/', 'ASDAdAd', 'AdAD', 'aD', 'adSAD', '', 1, 0),
(21, 100, 'asdASd ASd asdASd ASd asdASd ASd asdASd ASd asdASd ASd asdASd ASd asdASd ASd asdASd ASd asdASd ASd asdASd ASd ', 'da', 'dasd', 'add', 'asdas', 'A', 1, 0),
(22, 102, 'AFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSdAFSaSd', 'vvvasdas', 'adad', 'd', 'asd', 'A', 1, 0),
(23, 102, 'ASD ASDA Sd aSDA S ', 'vvvasdas', 'adad', 'd', 'asd', '', 1, 0),
(24, 103, 'A SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dSA SdADF AD dS', 'a', 'd', 'as', 'asd', 'A', 1, 0),
(25, 105, 'AD ASd', ' ASD AS', ' aSAD ad', 'D D A', ' as', 'B', 1, 0),
(26, 105, 'AD ASD AD AD', ' ASD AS', ' aSAD ad', 'D D A', ' as', 'aSD ASD ASA dAD ', 1, 0),
(27, 105, 'AD ASD AD AD', ' ASD AS', ' aSAD ad', 'D D A', ' as', 'aSD ASD ASA dAD ', 1, 0),
(28, 105, '', ' ASD AS', ' aSAD ad', 'D D A', ' as', '', 1, 0),
(29, 105, '', ' ASD AS', ' aSAD ad', 'D D A', ' as', '', 1, 0),
(30, 105, '', ' ASD AS', ' aSAD ad', 'D D A', ' as', '', 1, 0),
(31, 105, '', ' ASD AS', ' aSAD ad', 'D D A', ' as', '', 1, 0),
(32, 106, 'A DASD ASD ASD asd A DASD ASD ASD asd A DASD ASD ASD asd A DASD ASD ASD asd A DASD ASD ASD asd A DASD ASD ASD asd ', 'a', 'a', 'a', 'sd', 'B', 1, 0),
(33, 107, 'QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD QWDEEDASD SQdQD ', 'ASDASD', 'ASDA', 'ASSDA', 'SDASD', 'A', 1, 0),
(34, 109, 'select question,a,b,c,d,answer,value from questionsselect question,a,b,c,d,answer,value from questionsselect question,a,b,c,d,answer,value from questionsselect question,a,b,c,d,answer,value from questions', 'Ad as', 'AD asD ', 'd AS', 'AD AD ', 'A', 1, 0),
(35, 111, '$row = $result-&gt;fetch_array(MYSQLI_NUM)$row = $result-&gt;fetch_array(MYSQLI_NUM)$row = $result-&gt;fetch_array(MYSQLI_NUM)$row = $result-&gt;fetch_array(MYSQLI_NUM)', 'ASD ASd ', 'D Ad', 'AD ', 'ASD ', 'A', 1, 0),
(36, 112, 'asd asd AS', 'asdasd', 'dsadasd', 'a', 'dasd', 'A', 1, 0),
(37, 113, '$row = $result-&gt;fetch_array(MYSQLI_NUM)$row = $result-&gt;fetch_array(MYSQLI_NUM)$row = $result-&gt;fetch_array(MYSQLI_NUM)$row = $result-&gt;fetch_array(MYSQLI_NUM)', 'as', 'sdasd', 'ds', 'da', 'A', 1, 0),
(38, 114, 'ad AD SA', 'D Ad ', 'asdad asd', 'as', 'd ', 'A', 1, 0),
(39, 115, 'ASD AS', 'D AS', 'D ', 'D ASD ', 'ASD ', 'A', 1, 0),
(40, 116, '$question, $a,$b,$c,$d,$answer,$value', '$question, $a,$b,$c,$d,$answer,$value', '$question, $a,$b,$c,$d,$answer,$value', '$question, $a,$b,$c,$d,$answer,$value', '$question, $a,$b,$c,$d,$answer,$value', 'A', 1, 0),
(41, 119, 'asdASD ASd AS', 'd ASd ', 'd asd asd ', 'a d', 'as', 'A', 1, 0),
(42, 121, 'ad ad', 'ad', 'asdad', 'a', 'd', 'A', 1, 0),
(43, 122, 'ASd SAD asd ', 'ada ', ' asd', 'a', 'asd asd ', 'A', 1, 0),
(44, 124, 'ad ASd AS', 'D a d', 'd', 'a', 'aasd', 'A', 1, 0),
(45, 125, '\n                    alert(wow[''question'']);', 'acv', '', 'asd', '', 'A', 1, 0),
(46, 125, 'asdasdASDasda', 'acvsdasdas', 'adas', 'asddasd', 'adsad', '', 1, 0),
(47, 126, 'AS DASd aS', 'a', ' asdadad', 'a', 'asd', 'A', 1, 0),
(48, 127, 'A DASd ', 'ad', 'sdasd', 'as', 'da', 'A', 1, 0),
(49, 128, 'ad aSdaSSd', 'd', 'd', 'a', 'dasd ', 'A', 1, 0),
(50, 130, 'A Da', 'ads', 'd ', 'asd ad', 'd asd', 'A', 1, 0),
(51, 134, 'A SDASD asD aSd asD ASa sa a', 'a', 'c', 'd', 'x', 'B', 1, 0),
(52, 134, 'A SDASD asD aSd asD ASa sa a', 'a', 'c', 'd', 'x', 'B', 1, 0),
(53, 134, '', 'a', 'c', 'd', 'x', '', 1, 0),
(54, 134, '', 'a', 'c', 'd', 'x', '', 1, 0),
(55, 134, 'AD ASD asa Sd aasd asd ', 'a', 'c ADad ', 'dda da', 'x', 'aSD asD ', 1, 0),
(56, 146, 'This is Question 1as', 'asdasd', 'dasdasd', 'da', 'asadsaaaaaaaaaaaaaaaa', 'A', 1, 0),
(57, 146, 'This is Question 2, Oh yayasd ASD ASD ASD ', 'asd asda', 'd asd ', 'S Daaaaa', 'sasdasdasd', '', 1, 0),
(58, 147, 'AS ADASDa SD ASD ASD ASD ', 'aSD ', 'asd ', 'ASD AS', 'D as', 'A', 1, 0),
(59, 147, 'A SDASD ASD ASDA asd sA', 'A SDASD', 'A SD', 'AS D', 'ASD ', '', 1, 0),
(60, 149, 'A SDASD AD A A SDASD AD A A SDASD AD A A SDASD AD A A SDASD AD A A SDASD AD A A SDASD AD A ', 'a sda', 'AS DASD SAd ASD ', 'da', 'asda sD ASD A', 'A', 1, 0),
(61, 149, 'ASD ASD ASD asdbbjknlkm, aOklm,.km,a m ,.A Sda;s d; ;', 'ad; asd; ;', ''' aSD ASd  asd asda ', ' a ;l', '; asdasd ', '', 1, 0),
(62, 149, 'This is Spaer', 'a', 'c', 'd', 's', '', 1, 0),
(63, 150, 'aS DASD ', 'add ', 'as das dasd ', 'aa', '', 'A', 1, 0),
(64, 150, 'AD ASD  AD ', '', '', '', '', 'ASD ASD', 1, 0),
(65, 151, 'A SAS', 'a ad ', 'sa asd a', 'a sdassad asd asd ', 'D ASD as', 'A', 1, 0),
(66, 151, 'AD ASD ', ' ADAD AD', 'AS D', 'AS DASD ', '  ADSA  SD', '', 1, 0),
(67, 151, 'aSd AS', '', '', '', '', 'D aD ASD AS ', 6, 0),
(68, 155, 'A DAS', 'D aSd ', 'aD ', 'AS', ' aSD ', 'A', 1, 0),
(69, 155, 'ASD ASD', ' assadasdaad', 'A D', 'd ASD ', 'as dasD ', '', 1, 0),
(70, 155, 'A SD', 'ad ', 'A ', 'asd ', 'A AS SAD ', '', 1, 0),
(71, 156, 'asd asd', ' ASD', 'AD ', ' ASd ', 'ASD ', 'A', 1, 0),
(72, 157, 'sd ', 'd asd ', ' aD AD ', 'ASD', 'ADa', 'A', 1, 0),
(73, 157, 'A DSAD ASD SD ASdas', 'A DaSd aD', 'D aSDASD Aa dasd ', ' a s', 'D as aS D', 'B', 1, 0),
(74, 157, 'Da ASD ASD AS', 'AD', 'S D aS', ' sd ', 'd ASd as', 'A', 1, 0),
(75, 157, ' ADA', 'Sd A', 'ad ', 'SD ', ' ASDAD ', '', 1, 0),
(76, 162, 'z asd as', 'd asd ', 'd  sad ', 'd as', 'd asd', 'A', 1, 0),
(77, 170, 'asdasd', 'da', 'asdasd', 'asd', 'a', 'A', 1, 0),
(78, 170, 'asdasd', 'asdas', 'das', 'd', 'asdas', 'asdasdasd', 1, 0),
(79, 170, 'asdasd', '', '', '', '', 'asdasd', 1, 0),
(80, 170, 'aa sdasd ', '', '', '', '', 'ASD aSD ASd ', 1, 0),
(81, 171, 'asd asdasd', 'asd ', 'asd asd asd ', 'asd ', 'sa d', 'A', 1, 0),
(82, 175, 'asd as', 'd as', 'd ass', 'sd d ', ' asda', 'A', 1, 0),
(83, 175, 'a sdasd asd as', 'd asd ', 'AD sad asd ', 'asd AS', 'D D ', '', 1, 0),
(84, 175, 'asd AS DASd ASd ', 'as dasd ', 'D ASD SAd ', 'asd a', 'as aSD SA', 'A', 1, 0),
(85, 175, '', '', '', '', '', '', 1, 0),
(86, 175, '', '', '', '', '', '', 1, 0),
(87, 175, '', '', '', '', '', '', 1, 0),
(88, 175, '', '', '', '', '', '', 1, 0),
(89, 175, '', '', '', '', '', '', 1, 0),
(90, 175, '', '', '', '', '', '', 1, 0),
(91, 176, 'a dAS', 'D ', 'D ASD AD ', ' ', 'asD', 'A', 1, 0),
(92, 178, 'a SDSA', 'SD aS', 'aS', 'D asD D ', 'ASd ASd ', 'A', 1, 0),
(93, 179, 'aD ASD asd ASD AS', 'D asd ', 'D D sad ', 'ASD ', 'SAD AS', 'A', 1, 0),
(94, 180, 'asd as', 'd asd ', 'asd asd sad', 'asd ', 'asd sad ', 'A', 1, 0),
(95, 180, 'a ASD ', 'aSD asASD ', 'asd ASD  ADasD asD ', 'd asd s', 'ad d', '', 1, 0),
(96, 180, 'dA Das Dasd as', ' AS', 'd SD ', 'SD SD ', 'asda s', '', 1, 0),
(97, 180, 'ASD sAD ASD ASDASD a', ' Dsa', 'D SAD ASD', 'AD ', 'SA', 'B', 1, 0),
(98, 180, 'ad ASD aSD ASD ASD ', '', '', '', '', 'ASD ASD AD AD', 1, 0),
(99, 180, 'ASD ASD sad', '', '', '', '', 'a SDasd ', 1, 0),
(100, 180, 'ASD ASD sadAS DAS', 'D ', 'DAS SD', 'ad as ', ' ', '', 1, 0),
(101, 180, 'asd', '', '', '', '', ' ADASD ', 1, 0),
(102, 180, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'as d', 'D SAD ', 'ASD ', 'as', 'B', 1, 0),
(103, 180, 'A SDaS SA', 'S DASD as DASD ', 'Aa sdASD ASD as', 'A  as', 'SD aSD d D aSD', 'D', 1, 0),
(104, 180, '', '', '', '', '', '', 1, 0),
(105, 180, '', '', '', '', '', '', 1, 0),
(106, 180, '', '', '', '', '', '', 1, 0),
(107, 180, '', '', '', '', '', '', 1, 0),
(108, 180, '', '', '', '', '', '', 1, 0),
(109, 180, '', '', '', '', '', '', 1, 0),
(110, 180, '', '', '', '', '', '', 1, 0),
(111, 180, '', '', '', '', '', '', 1, 0),
(112, 180, '', '', '', '', '', '', 1, 0),
(113, 180, '', '', '', '', '', '', 1, 0),
(114, 181, 'adasd', 'asdas', 'dasd', 'dasdasd', 'asdas', 'A', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question_paper`
--

CREATE TABLE IF NOT EXISTS `question_paper` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_paper`
--

INSERT INTO `question_paper` (`id`, `user_id`, `name`, `description`, `time`) VALUES
(1, 4, 'Maths', 'This is Sparta', '2015-09-05 18:33:14'),
(2, 4, 'asda', 'sasdasdad', '2015-09-05 18:40:00'),
(3, 4, 'dsd', 'ssdd', '2015-09-05 18:41:47'),
(4, 4, 'dsd', 'ssdd', '2015-09-05 18:44:17'),
(5, 4, 'dsd', 'ssdd', '2015-09-05 18:44:41'),
(6, 4, 'dsd', 'ssdd', '2015-09-05 18:52:58'),
(7, 4, 'dsdasd', 'ssddasd', '2015-09-05 18:56:11'),
(8, 4, 'dsdasd', 'ssddasd', '2015-09-05 18:58:57'),
(9, 4, 'dsdasd', 'ssddasd', '2015-09-05 18:59:26'),
(10, 4, 'dsdasd', 'ssddasd', '2015-09-05 18:59:47'),
(11, 4, 'aSASD', 'ASD', '2015-09-05 19:02:04'),
(12, 4, 'aSASD', 'ASD', '2015-09-05 19:04:42'),
(13, 4, 'aSASD', 'ASD', '2015-09-05 19:06:25'),
(14, 4, 'aSASD', 'ASD', '2015-09-05 19:06:53'),
(15, 4, 'aSASD', 'ASD', '2015-09-05 19:07:18'),
(16, 4, 'aSASD', 'ASD', '2015-09-05 19:07:44'),
(17, 4, 'aSASD', 'ASD', '2015-09-05 19:08:04'),
(18, 4, 'aSASD', 'ASD', '2015-09-05 19:08:20'),
(19, 4, 'aSASD', 'ASD', '2015-09-05 19:08:32'),
(20, 4, 'aSASD', 'ASD', '2015-09-05 19:08:59'),
(21, 4, 'aSASD', 'ASD', '2015-09-05 19:09:30'),
(22, 4, 'aSASD', 'ASD', '2015-09-05 19:12:51'),
(23, 4, 'aSASD', 'ASD', '2015-09-05 19:14:38'),
(24, 4, 'aSASD', 'ASD', '2015-09-05 19:17:15'),
(25, 4, 'aSASD', 'ASD', '2015-09-05 19:19:00'),
(26, 4, 'aSASD', 'ASD', '2015-09-05 19:19:20'),
(27, 4, '', '', '2015-09-05 19:22:54'),
(28, 4, 'asdasd', 'asdasd', '2015-09-05 19:25:02'),
(29, 4, '', '', '2015-09-05 19:26:50'),
(30, 4, 'ad', 'adad', '2015-09-06 04:01:09'),
(31, 4, 'ad', 'as', '2015-09-06 04:08:25'),
(32, 4, '', '', '2015-09-06 04:09:13'),
(33, 4, '', '', '2015-09-06 04:11:09'),
(34, 4, '', '', '2015-09-06 04:11:51'),
(35, 4, '', '', '2015-09-06 04:14:45'),
(36, 4, 'sasdas', 'dasdasd', '2015-09-08 14:02:08'),
(37, 4, 'Testing Kinnaries Create Test', 'Checking this Stuff OUt', '2015-09-08 14:13:58'),
(38, 4, 'asdasdasd', 'asdasdasd', '2015-09-08 15:01:21'),
(39, 4, 'awsc', 'adsczx', '2015-09-08 15:09:50'),
(40, 4, '', '', '2015-09-10 15:44:03'),
(41, 4, 'Final Testing', '', '2015-09-10 15:45:09'),
(42, 4, 'sad', 'asd', '2015-09-10 15:46:49'),
(43, 4, 'asdas', 'dasdasd', '2015-09-10 15:47:30'),
(44, 4, 'asd', 'asd', '2015-09-10 15:50:42'),
(45, 4, 'asdasdasdasd', 'asdasd', '2015-09-10 15:57:49'),
(46, 17, 'adada', '                dasda', '2015-09-10 16:57:57'),
(47, 17, 'asdasdas', '                dasdasd', '2015-09-10 16:58:22'),
(48, 17, 'asdasdas', '                dasdasd', '2015-09-10 17:48:51'),
(49, 17, 'Thkald', 'asda SDA                 ', '2015-09-10 17:53:07'),
(50, 17, 'adasd', '                asdasd', '2015-09-10 17:55:04'),
(51, 17, 'adasd', '                asdasd', '2015-09-10 17:55:59'),
(52, 17, 'asdasdasd', '                asdasd', '2015-09-10 17:59:14'),
(53, 17, 'asdasdas', '                dasdasd', '2015-09-10 18:00:24'),
(54, 17, 'adasd', '                assdad', '2015-09-10 18:01:15'),
(55, 17, 'adasd', '                asdasd', '2015-09-10 18:04:11'),
(56, 17, 'ads', '                adad', '2015-09-10 18:05:25'),
(57, 17, 'asdasd', '                asdasd', '2015-09-10 18:05:39'),
(58, 17, 'adasd', '                asdasd', '2015-09-10 18:06:54'),
(59, 17, 'asdasdasd', '                asdasd', '2015-09-10 18:10:03'),
(60, 17, 'asdasd', '                asdasd', '2015-09-10 18:11:32'),
(61, 17, 'dsad', '                asdasdasd', '2015-09-10 18:13:44'),
(62, 17, 'asdasd', '                adasdasd', '2015-09-10 18:20:07'),
(63, 17, 'asdasd', '                sdd', '2015-09-10 18:25:40'),
(64, 17, 'asdas', '                asdad', '2015-09-10 18:32:02'),
(65, 17, 'asdas', '                dadad', '2015-09-10 18:34:01'),
(66, 17, 'asdasd', '                adadda', '2015-09-10 18:40:03'),
(67, 17, 'asads', '                as', '2015-09-10 18:40:31'),
(68, 17, 'asdasd', '                asdasd', '2015-09-10 18:41:59'),
(69, 17, 'asdasd', '                asdasd', '2015-09-10 18:55:41'),
(70, 17, 'adasda', '                dadasd', '2015-09-10 18:56:29'),
(71, 17, 'asdad', '                asdasdad', '2015-09-10 18:57:39'),
(72, 17, 'addasd', '                asdasd', '2015-09-10 19:01:17'),
(73, 17, 'asdasd', '                sadasd', '2015-09-10 19:02:55'),
(74, 17, 'asdasd', '                asdasdad', '2015-09-10 19:03:53'),
(75, 17, 'dasdas', '                adasdas', '2015-09-10 19:09:35'),
(76, 17, 'asdadas', '                dasdad', '2015-09-10 19:10:19'),
(77, 17, 'adasd', '                ada', '2015-09-10 19:11:27'),
(78, 17, 'asdasd', '                asdasda', '2015-09-10 19:19:44'),
(79, 17, 'asdAD', '                aDASD', '2015-09-11 17:58:30'),
(80, 17, 'qewrsfd', '                dadszf', '2015-09-11 19:05:51'),
(81, 17, 'THis is Sparta Test', 'ASdjalkD:LKAD:L ;d S ASd                 ', '2015-09-11 23:39:31'),
(82, 17, 'asd', '                asdasdda', '2015-09-11 23:40:33'),
(83, 17, 'asdas', '                dasdasd', '2015-09-11 23:41:45'),
(84, 17, 'asdasd', '                asdadad', '2015-09-11 23:51:21'),
(85, 17, 'ad ASD ', '                asd asd asdad ', '2015-09-11 23:52:29'),
(86, 17, 'asdasd', '                ASADASD', '2015-09-11 23:53:15'),
(87, 17, 'asd asd', '                asdasda', '2015-09-11 23:54:58'),
(88, 17, 'asdas', '                dasdasd', '2015-09-11 23:55:39'),
(89, 17, 'adasdassdA SDASD ASD ASD aasd ', '                asd SADAS D', '2015-09-11 23:57:27'),
(90, 17, 'ASD ASD AS ASDasd sad asD ASD ASd A', '                SD asD aSD aSD aSD ad', '2015-09-11 23:58:13'),
(91, 17, 'ASD ASD AS ASDasd sad asD ASD ASd A', '                SD asD aSD aSD aSD ad', '2015-09-11 23:58:13'),
(92, 17, 'ASD ASD', '                ASD ASD ASAD ', '2015-09-11 23:59:11'),
(93, 17, 'asd ASD A', 'SDAD AD ASDA DDA ', '2015-09-12 00:02:34'),
(94, 17, 'fadsVfda', '                qDFAVWAd', '2015-09-12 00:04:33'),
(95, 17, 'fadsVfda', '                qDFAVWAd', '2015-09-12 00:04:33'),
(96, 17, 'fadsVfda', '                qDFAVWAd', '2015-09-12 00:04:33'),
(97, 17, 'fadsVfda', '                qDFAVWAd', '2015-09-12 00:04:33'),
(98, 17, 'fadsVfda', '                qDFAVWAd', '2015-09-12 00:04:33'),
(99, 17, 'fadsVfda', '                qDFAVWAd', '2015-09-12 00:04:33'),
(100, 17, 'AS a', '                sd asASA SA', '2015-09-12 00:51:18'),
(101, 17, 'AD ASD', '                 ASD ASD ASD ', '2015-09-12 00:52:15'),
(102, 17, 'AD ASD', '                 ASD ASD ASD ', '2015-09-12 00:52:15'),
(103, 17, 'ADASD ASD ASD ASasD AS', 'Das ASDASD ASD DA ', '2015-09-12 00:55:40'),
(104, 17, 'ad ASD Ad', '                aD ASD AS', '2015-09-12 00:58:00'),
(105, 17, 'D D ASD ASDA ', '                AD AS', '2015-09-12 01:02:22'),
(106, 17, 'sad asdaSD ', '                ASD ASD ASD ASD ', '2015-09-12 01:09:08'),
(107, 17, 'EGRSTDHFYJGKJHG', '                RFEaefsgHFJGKGHFDSA', '2015-09-12 12:09:56'),
(108, 17, 'da as DsaD asd As', 'd ASd asd asd asd ', '2015-09-12 12:11:18'),
(109, 17, 'da as DsaD asd As', 'd ASd asd asd asd ', '2015-09-12 12:11:18'),
(110, 17, 'A SdAFASD ASDaSd', '                aSd ASD sD ASd', '2015-09-12 12:13:54'),
(111, 17, 'A SdAFASD ASDaSd', '                aSd ASD sD ASd', '2015-09-12 12:13:54'),
(112, 17, 'a DASD', 'AS DSAD ASD ASd ', '2015-09-12 12:14:52'),
(113, 17, '$row = $result-&gt;fetch_array(MYSQLI_NUM)', '                $row = $result-&gt;fetch_array(MYSQLI_NUM)$row = $result-&gt;fetch_array(MYSQLI_NUM)', '2015-09-12 12:16:39'),
(114, 17, ' asdasd ', '                ad ad as', '2015-09-12 12:20:36'),
(115, 17, 'A DASD ', '                ASd ASD AS', '2015-09-12 12:21:22'),
(116, 17, '$question, $a,$b,$c,$d,$answer,$value', '                $question, $a,$b,$c,$d,$answer,$value$question, $a,$b,$c,$d,$answer,$value$question, $a,$b,$c,$d,$answer,$value', '2015-09-12 12:21:45'),
(117, 17, 'asd', '                aas', '2015-09-12 12:22:54'),
(118, 17, 'ad ad', '                 asdasdasd ', '2015-09-12 12:23:04'),
(119, 17, 'AS DAS', 'D AS', '2015-09-12 12:23:29'),
(120, 17, 'asd AS', 'D ASDASd ', '2015-09-12 12:24:11'),
(121, 17, 'asd AS', 'D ASDASd ', '2015-09-12 12:24:11'),
(122, 17, 'a dAS', '                d AD aSd ', '2015-09-12 12:25:23'),
(123, 17, 'ad as', '                d asd asd', '2015-09-12 12:27:56'),
(124, 17, 'ad as', '                d asd asd', '2015-09-12 12:27:56'),
(125, 17, '                     alert(wow[''question'']);', '                \n                    alert(wow[''question'']);\n                    alert(wow[''question'']);\n                    alert(wow[''question'']);', '2015-09-12 12:29:57'),
(126, 17, 'AD ASD as', 'D ASD ASD ', '2015-09-12 13:54:48'),
(127, 17, 'as daS', 'D ASD ASd asd', '2015-09-12 13:55:33'),
(128, 17, 'asd ASD as', 'Das Das', '2015-09-12 13:56:55'),
(129, 17, ' dasd AD ', '                ASD ASd ', '2015-09-12 13:58:09'),
(130, 17, ' dasd AD ', '                ASD ASd ', '2015-09-12 13:58:09'),
(131, 17, 'Testing it like a Boss', '                ASDASD ASD asDA SAS D', '2015-09-12 14:15:13'),
(132, 17, 'A SDASD ', '                ASD asD aSD ', '2015-09-12 14:16:14'),
(133, 17, 'AD ASd AS ASD aSd aSD as', '                D aSAS DasD asd ', '2015-09-12 14:16:44'),
(134, 17, 'AD ASd AS ASD aSd aSD as', '                D aSAS DasD asd ', '2015-09-12 14:16:44'),
(135, 17, ' dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd ', '                AD ASD ASD ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd  dad asd ASd ', '2015-09-12 14:46:46'),
(136, 17, 'sdf sdf sd', '                f sdf sf sdf sd', '2015-09-12 14:47:57'),
(137, 17, 'aS asd ad asdasd', '                A SDA SdAD ASD ad aSd ASD ASD ', '2015-09-12 14:50:52'),
(138, 17, 'asd asd asd ada a asd asd asd ada a ', '                asd asd asd ada a asd asd asd ada a asd asd asd ada a asd asd asd ada a asd asd asd ada a asd asd asd ada a asd asd asd ada a asd asd asd ada a ', '2015-09-12 14:53:02'),
(139, 17, 'sxasxas', '                sxasxx', '2015-09-12 14:55:17'),
(140, 17, 'ASd aD ', '                A SDaS DDA ', '2015-09-12 15:03:59'),
(141, 17, 'aS AS', 'd ASd ASd sD ASD ', '2015-09-12 15:11:50'),
(142, 17, 'aS AS', 'd ASd ASd sD ASD ', '2015-09-12 15:11:51'),
(143, 17, 'aS AS', 'd ASd ASd sD ASD ', '2015-09-12 15:11:51'),
(144, 17, 'Hpenieniasnd asdherehr', 'rsdetfyhiokpl[;as daSD MKSALD&lt;ASD as dADA                 ', '2015-09-12 15:16:55'),
(145, 17, 'sdfdfsd', 'fsdfsdfsf                ', '2015-09-12 15:24:39'),
(146, 17, 'First Proper Question Paper', 'I Hope this worksI Hope this worksI Hope this worksI Hope this worksI Hope this works', '2015-09-12 17:34:41'),
(147, 17, 'asD aSdASD ASD AS', 'D ASD ASD AD ASD ', '2015-09-12 18:20:57'),
(148, 17, ' A DA D aSD aD ASD ASD ', 'as DASD ASD ASD ASD ', '2015-09-12 18:34:55'),
(149, 17, 'ASD ADA Sda ', 'ASD ASDa sDASD asD ASD ', '2015-09-12 18:35:21'),
(150, 17, 'AD ASD a', '                SD ASD D', '2015-09-12 18:38:46'),
(151, 17, 'A SDAS DAS', '                D asdaSD SD ', '2015-09-13 10:10:29'),
(152, 17, ' dsad asd ', '                Asd sad asd ', '2015-09-14 10:41:26'),
(153, 17, 'ASD ASD AS', 'D asD ASD ', '2015-09-14 10:44:39'),
(154, 17, 'This is Sparta', 'Oh yea                ', '2015-09-14 10:46:58'),
(155, 17, 'This is So Cool', 'Ok                ', '2015-09-14 10:49:32'),
(156, 17, 'ASD SAD ', '                ASD ASD ', '2015-09-14 10:55:43'),
(157, 17, 'A DAS', 'D asD ASD ', '2015-09-14 10:56:23'),
(158, 17, 'AD ad q', '                 qd qdq', '2015-09-14 11:00:42'),
(159, 17, 'ad aS', '                d AD AD', '2015-09-14 11:01:12'),
(160, 17, 'ad aS', '                d AD AD', '2015-09-14 11:01:12'),
(161, 17, 'AD ASD ', '                A SDASd ', '2015-09-14 11:01:40'),
(162, 17, 'AS DASD ', 'asd aSD ', '2015-09-14 11:02:10'),
(163, 17, 'SAD AS', '                A SD', '2015-09-14 11:02:49'),
(164, 17, 'SAD AS', '                A SD', '2015-09-14 11:02:49'),
(165, 17, 'aS DSA', 'D asD asD ', '2015-09-14 11:03:13'),
(166, 17, 'asd as', '                d asdas d', '2015-09-14 11:05:21'),
(167, 17, 'asd ad', '                 a sdad ', '2015-09-14 11:05:39'),
(168, 17, 'asdasd', '                asdasdasd', '2015-09-14 11:08:14'),
(169, 17, 'asdasdasdas', '                dasdad', '2015-09-14 11:09:26'),
(170, 17, 'asdadasd', '                adasd', '2015-09-14 11:11:44'),
(171, 17, 'asdasdas', '                dasdasdasd', '2015-09-14 11:22:36'),
(172, 17, 'asdas', 'dasdasd', '2015-09-14 11:22:51'),
(173, 17, 'dasdasdasd', '                asdas', '2015-09-14 11:25:50'),
(174, 17, 'dasdasd', '                asdasdas', '2015-09-14 11:26:11'),
(175, 17, 'as dasd ', '                asd as ', '2015-09-14 11:28:46'),
(176, 17, 'asd as', 'd ASD ASD ', '2015-09-14 11:29:20'),
(177, 17, 'asd as', 'd ASD ASD ', '2015-09-14 11:29:20'),
(178, 17, 'ad asdaSD ASD ', ' aSDASD ASD', '2015-09-14 11:31:40'),
(179, 17, 'AS DASD ', 'ASD ASD A', '2015-09-14 11:31:53'),
(180, 17, 'asd aSD ', 'ASD ASD ', '2015-09-18 18:39:36'),
(181, 17, 'asd asd as', '                d aSD ASD ', '2015-09-18 20:49:07'),
(182, 17, 'asd asd as', '                d aSD ASD ', '2015-09-18 20:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` bigint(20) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  `id` bigint(20) NOT NULL,
  `creator_id` bigint(20) DEFAULT NULL,
  `question_paper_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `attempt` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `creator_id`, `question_paper_id`, `group_id`, `start_time`, `end_time`, `time`, `attempt`) VALUES
(1, 17, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(3, 17, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(4, 17, 9, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(6, 17, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(7, 17, 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(8, 17, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(12, 17, 1, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(13, 17, 5, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(14, 17, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(15, 17, 28, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(16, 17, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(17, 17, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647),
(18, 17, 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL,
  `role_id` bigint(20) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `name`, `password`, `email`, `phone`, `time`) VALUES
(1, 3, 'Admin', 'e10adc3949ba59abbe56e057f20f883e', 'deep.singh.baweja@protonmail.com', '9819979357', '2015-09-01 00:56:02'),
(2, 5, 'stuone', 'e10adc3949ba59abbe56e057f20f883e', 'one@one.com', '9999999999', '2015-09-01 01:12:09'),
(3, 1, 'stutwo', 'e10adc3949ba59abbe56e057f20f883e', 'two@one.com', '9999999999', '2015-09-01 01:22:55'),
(4, 3, 'sparta', 'sparta', 'sparta', '9999999999', '2015-09-01 01:37:59'),
(17, 2, 'Deep Singh Baweja', 'e10adc3949ba59abbe56e057f20f883e', 'deepwired@gmail.com', '9819979357', '2015-09-01 04:32:34'),
(18, 4, 'stufour', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:53:29'),
(19, 4, 'stufive', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:53:44'),
(20, 4, 'stusix', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:53:54'),
(21, 4, 'stuseven', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:54:21'),
(22, 4, 'stueight', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:54:32'),
(23, 4, 'stunine', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:54:45'),
(24, 4, 'stuten', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:54:56'),
(25, 4, 'stueleven', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:55:07'),
(26, 4, 'stutwelve', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:55:17'),
(27, 4, 'stuthirteen', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:55:25'),
(28, 4, 'stufourteen', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:55:35'),
(29, 2, 'stufifteen', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:55:43'),
(30, 4, 'stusixteen', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:55:50'),
(31, 4, 'stuseventeen', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:56:00'),
(32, 4, 'stuseightteen', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:56:08'),
(33, 4, 'stusnineteen', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:56:17'),
(34, 4, 'stutwenty', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:56:32'),
(35, 4, 'stutwentyone', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:56:40'),
(36, 4, 'stutwentytwo', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:56:46'),
(37, 4, 'stutwentythree', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:56:57'),
(38, 4, 'stutwentyfour', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:57:04'),
(39, 4, 'stutwentyfive', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:57:13'),
(40, 4, 'stutwentysix', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:57:19'),
(41, 4, 'stutwentyseven', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:57:26'),
(42, 4, 'stutwentyeight', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:57:34'),
(43, 4, 'stutwentynine', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:57:41'),
(44, 4, 'stuhirty', 'e10adc3949ba59abbe56e057f20f883e', NULL, '9999999999', '2015-09-01 04:57:53'),
(45, 4, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '2015-09-05 16:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, 19, 5),
(2, 20, 5),
(9, 2, 19),
(10, 2, 18),
(12, 2, 5),
(18, 2, 28),
(20, 20, 28),
(21, 21, 28),
(22, 22, 28),
(23, 3, 18),
(24, 4, 18),
(25, 18, 18),
(26, 41, 18),
(27, 42, 18),
(28, 43, 18),
(29, 2, 29),
(30, 3, 29),
(31, 4, 29),
(32, 22, 29),
(33, 23, 29),
(34, 24, 29),
(35, 25, 29),
(36, 26, 29),
(37, 27, 29),
(43, 19, 18),
(44, 20, 18),
(45, 21, 18),
(46, 22, 18),
(47, 2, 18),
(48, 4, 18),
(49, 20, 18),
(50, 22, 18),
(51, 19, 18),
(52, 23, 18),
(53, 3, 18),
(54, 18, 18),
(55, 24, 18),
(56, 23, 18),
(57, 25, 18),
(58, 30, 18),
(59, 22, 5),
(60, 25, 5),
(61, 26, 5),
(62, 27, 5),
(63, 24, 5),
(64, 4, 7),
(65, 18, 7),
(66, 19, 7),
(67, 20, 7),
(161, 23, 6),
(167, 27, 6),
(169, 2, 22),
(170, 3, 22),
(171, 4, 22),
(172, 18, 22),
(173, 19, 22),
(174, 20, 22),
(177, 20, 21),
(178, 21, 21),
(179, 22, 21),
(180, 23, 21),
(181, 24, 21),
(182, 25, 21),
(183, 26, 21),
(184, 27, 21),
(185, 28, 21),
(186, 30, 21),
(187, 31, 21),
(193, 18, 15),
(194, 19, 15),
(195, 20, 15),
(196, 21, 15),
(197, 22, 15),
(198, 23, 15),
(199, 18, 16),
(200, 19, 16),
(201, 23, 16),
(202, 18, 33),
(203, 19, 33),
(204, 20, 33),
(223, 28, 3),
(224, 19, 4),
(225, 21, 4),
(226, 22, 4),
(227, 23, 4),
(228, 25, 4),
(229, 20, 6),
(230, 21, 6),
(231, 25, 6),
(232, 26, 6),
(234, 30, 6),
(236, 26, 3),
(244, 44, 3),
(245, 45, 3),
(247, 22, 3),
(251, 35, 3),
(252, 36, 3),
(253, 37, 3),
(254, 39, 3),
(256, 21, 39),
(257, 22, 39),
(266, 18, 5),
(267, 21, 5),
(268, 28, 5),
(274, 35, 5),
(275, 37, 5),
(276, 38, 5),
(277, 39, 5),
(278, 41, 5),
(279, 42, 5),
(280, 18, 3),
(281, 27, 3),
(282, 33, 3),
(283, 42, 3),
(284, 34, 6),
(285, 35, 6),
(286, 36, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_answers_1_idx` (`question_paper_id`),
  ADD KEY `fk_answers_2_idx` (`schedule_id`),
  ADD KEY `fk_answers_3_idx` (`group_id`),
  ADD KEY `fk_answers_4_idx` (`user_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_group_1_idx` (`creator_id`);

--
-- Indexes for table `group_type`
--
ALTER TABLE `group_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question_1_idx` (`question_paper_id`);

--
-- Indexes for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_question_paper_1_idx` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_schedule_1_idx` (`group_id`),
  ADD KEY `fk_schedule_2_idx` (`question_paper_id`),
  ADD KEY `fk_schedule_3_idx` (`creator_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_1_idx` (`role_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_group_1_idx` (`group_id`),
  ADD KEY `fk_user_group_2_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `group_type`
--
ALTER TABLE `group_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `question_paper`
--
ALTER TABLE `question_paper`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=183;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=287;
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
