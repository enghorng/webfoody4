-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 29, 2020 at 03:55 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webfoody4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcheckrole`
--

DROP TABLE IF EXISTS `tblcheckrole`;
CREATE TABLE IF NOT EXISTS `tblcheckrole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Role` int(1) NOT NULL,
  `FirstName` varchar(100) COLLATE utf16_bin NOT NULL,
  `UserCode` varchar(10) COLLATE utf16_bin NOT NULL,
  UNIQUE KEY `UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tblcheckrole`
--

INSERT INTO `tblcheckrole` (`id`, `Role`, `FirstName`, `UserCode`) VALUES
(1, 2, 'ហាក់', 'U006');

-- --------------------------------------------------------

--
-- Table structure for table `tbldetailfood`
--

DROP TABLE IF EXISTS `tbldetailfood`;
CREATE TABLE IF NOT EXISTS `tbldetailfood` (
  `id` int(1) NOT NULL,
  `FoodCode` varchar(10) COLLATE utf16_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tbldetailfood`
--

INSERT INTO `tbldetailfood` (`id`, `FoodCode`) VALUES
(1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tblfood`
--

DROP TABLE IF EXISTS `tblfood`;
CREATE TABLE IF NOT EXISTS `tblfood` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `FoodCode` varchar(10) COLLATE utf16_bin NOT NULL,
  `FoodName` varchar(100) COLLATE utf16_bin NOT NULL,
  `Category` varchar(10) COLLATE utf16_bin NOT NULL,
  `FoodType` varchar(10) COLLATE utf16_bin NOT NULL,
  `Country` varchar(10) COLLATE utf16_bin DEFAULT NULL,
  `Province` varchar(255) COLLATE utf16_bin DEFAULT NULL,
  `VideoLink` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `FoodImage` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `FoodDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserCode` varchar(10) COLLATE utf16_bin NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`FoodCode`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tblfood`
--

INSERT INTO `tblfood` (`id`, `FoodCode`, `FoodName`, `Category`, `FoodType`, `Country`, `Province`, `VideoLink`, `FoodImage`, `FoodDate`, `UserCode`, `Status`) VALUES
(1, 'F001', 'គីមឈីត្រសក់', 'Food', 'NoWater', 'Foreign', NULL, NULL, 'គីមឈីត្រសក់.jpg', '2020-02-18 14:32:34', 'U001', 1),
(2, 'F002', 'ឆាមឹកម្រេចខ្ចី ', 'Food', 'NoWater', 'Khmer', NULL, 'https://www.youtube.com/watch?v=UOn8AD58ayU&t=8s', 'ឆាមឹកម្រេចខ្ចី.jpg', '2020-02-19 14:28:26', 'U002', 1),
(3, 'F003', 'បង្កងបំពងរំលីងអំបិលម្ទេស ', 'Food', 'Water', 'Khmer', NULL, NULL, 'បង្កងបំពងរំលីងអំបិលម្ទេស.jpg', '2020-02-19 14:29:11', 'U001', 1),
(5, 'F005', 'ប្រឡាក់សាច់គោងៀត ', 'Food', 'NoWater', 'Khmer', 'សៀមរាប', 'https://www.youtube.com/watch?v=DKo-1omTdzs', 'ប្រឡាក់សាច់គោងៀត.jpg', '2020-02-19 14:32:32', 'U001', 1),
(6, 'F006', 'ស៊ុតចៀនស្អំបំពងម្សៅ', 'Food', 'NoWater', 'Khmer', NULL, NULL, 'ស៊ុតចៀនស្អំបំពងម្សៅ.jpg', '2020-02-19 14:39:39', 'U001', 1),
(7, 'F007', 'សាច់គោអាំងទឹកអំពិល ', 'Food', 'NoWater', 'Khmer', NULL, 'https://www.youtube.com/watch?v=PD5N_Iql-j4', 'សាច់គោអាំងទឹកអំពិល.jpg', '2020-02-19 14:41:42', 'U002', 1),
(8, 'F008', 'ចាហួយសរសៃពងមាន់', 'Sweet', 'Cake', 'Khmer', NULL, 'https://www.youtube.com/watch?v=3oQWjttRYoY&t=27s', 'ចាហួយសរសៃពងមាន់.jpg', '2020-02-19 14:48:43', 'U003', 1),
(9, 'F009', 'ចេកឆឹងទឹកស្ករ ', 'Sweet', 'Sweet', 'Khmer', NULL, NULL, 'ចេកឆឹងទឹកស្ករ.jpg', '2020-02-19 14:50:07', 'U001', 1),
(10, 'F010', 'តាប៉ែខ្មៅ', 'Sweet', 'Sweet', 'Khmer', NULL, 'https://www.youtube.com/watch?v=DMa4U1FDxxI&t=46s', 'តាប៉ែខ្មៅ.jpg', '2020-02-19 15:08:29', 'U002', 1),
(11, 'F011', 'នំដូងចៀន ', 'Sweet', 'Sweet', 'Khmer', NULL, NULL, 'នំដូងចៀន.jpg', '2020-02-19 15:13:13', 'U002', 1),
(12, 'F012', 'នំអន្សមខ្នុរ ', 'Sweet', 'Sweet', 'Khmer', NULL, 'https://www.youtube.com/watch?v=GEWzGWkHIwk', 'នំអន្សមខ្នុរ.png', '2020-02-19 15:15:50', 'U003', 1),
(13, 'F013', 'នំស្លឹកតយ ', 'Sweet', 'Sweet', 'Khmer', NULL, 'https://www.youtube.com/watch?v=kAAaWnFP_dc&t=19s', 'នំស្លឹកតយ.jpg', '2020-02-19 15:17:08', 'U003', 1),
(14, 'F014', 'បាយដំណើបសង់ខ្យាល្ពៅ ', 'Sweet', 'Sweet', 'Khmer', NULL, 'https://www.youtube.com/watch?v=79ufZWzpbyY&t=9s', 'បាយដំណើបសង់ខ្យាល្ពៅ.jpg', '2020-02-19 15:18:10', 'U003', 1),
(15, 'F015', ' Strawbeery ', 'Drink', 'Shake', 'Foreign', NULL, NULL, 'Strawbeery.jpg', '2020-02-19 15:19:28', 'U002', 1),
(16, 'F016', 'ការ៉ុតកាឡុក ', 'Drink', 'Shake', 'Foreign', NULL, NULL, 'ការ៉ុតកាឡុក.jpg', '2020-02-19 15:20:32', 'U006', 1),
(17, 'F017', 'ទឹកក្រូច ', 'Drink', 'Juice', 'Khmer', NULL, NULL, 'ទឹកក្រូច.jpg', '2020-02-19 15:22:00', 'U003', 1),
(18, 'F018', 'ទឹកក្រូចច្របាច់ ', 'Drink', 'Juice', 'Foreign', NULL, NULL, 'ទឹកក្រូចច្របាច់.jpg', '2020-02-19 15:22:58', 'U003', 1),
(19, 'F019', 'ទឹកពោតផ្អែម ', 'Drink', 'Simple', 'Khmer', NULL, NULL, 'ទឹកពោតផ្អែម.jpg', '2020-02-19 15:25:08', 'U002', 1),
(20, 'F020', 'ទឹកម្នាស់ ', 'Drink', 'Ice', 'Foreign', NULL, NULL, 'ទឹកម្នាស់.jpg', '2020-02-19 15:28:01', 'U002', 1),
(22, 'F022', 'Test', 'Sweet', 'Sweet', 'Khmer', '', 'youtube.com', 'Non-User.PNG', '2020-02-29 04:29:39', 'U006', 2),
(24, 'F024', 'Food', 'Sweet', 'Cake', 'Khmer', '', '', 'User.PNG', '2020-02-29 04:32:37', 'U006', 2),
(38, 'F38', 'ល', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:50:53', 'U006', 2),
(37, 'F37', 'ស្ងោរ', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:49:36', 'U006', 2),
(27, 'F027', 'ស្ងោរ', 'Sweet', 'Cake', '', '', '', '', '2020-02-29 04:47:49', 'U006', 2),
(41, 'F41', 'ល', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:51:33', 'U006', 2),
(42, 'F42', 'ល', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:51:35', 'U006', 2),
(40, 'F40', 'ល', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:51:32', 'U006', 2),
(39, 'F39', 'ល', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:51:30', 'U006', 2),
(32, 'F032', 'ស្ងោរ', 'Sweet', 'Cake', '', '', '', '', '2020-02-29 05:09:17', 'U006', 2),
(33, 'F033', 'ផផ', 'Sweet', 'Sweet', 'Khmer', 'កែប', 'youtube.com', 'Thanks.PNG', '2020-02-29 05:18:25', 'U006', 2),
(34, 'F034', 'ល', 'Drink', 'Ice', 'Khmer', '', '', '', '2020-02-29 05:20:07', 'U006', 2),
(35, 'F35', 'ស្ងោរ', 'Food', 'Water', 'Khmer', '', '', 'Non-User.PNG', '2020-02-29 09:43:39', 'U006', 2),
(36, 'F36', 'ស្ងោរ', 'Food', 'Water', '', '', '', 'addfood.png', '2020-02-29 09:45:15', 'U006', 2),
(43, 'F43', 'Food', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:51:50', 'U006', 2),
(44, 'F44', 'Food', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:52:09', 'U006', 2),
(45, 'F45', 'Food', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:52:21', 'U006', 2),
(46, 'F46', 'Food', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:53:27', 'U006', 2),
(47, 'F47', 'Food', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:53:51', 'U006', 2),
(48, 'F48', 'ស្ងោរ', 'Drink', 'Juice', '', '', '', 'addfood.png', '2020-02-29 09:54:43', 'U006', 2),
(49, 'F49', 'Hello', 'Sweet', 'Sweet', '', '', '', 'addfood.png', '2020-02-29 09:58:07', 'U006', 2),
(50, 'F50', '6', 'Food', 'Water', '', '', '', 'addfood.png', '2020-02-29 09:58:51', 'U006', 2),
(51, 'F51', 'ស្ងោរ', 'Food', 'Water', '', '', '', 'addfood.png', '2020-02-29 09:59:17', 'U006', 2),
(52, 'F52', '88', 'Food', 'Water', '', '', '', 'addfood.png', '2020-02-29 10:01:34', 'U006', 2),
(53, 'F53', 'Hello', 'Food', 'NoWater', '', '', '', 'addfood.png', '2020-02-29 10:11:52', 'U006', 2),
(54, 'F54', 'ស្ងោរ', 'Food', 'Water', '', '', '', 'addfood.png', '2020-02-29 10:12:20', 'U006', 2),
(55, 'F55', '999', 'Food', 'Water', '', '', '', 'addfood.png', '2020-02-29 10:12:44', 'U006', 2),
(56, 'F56', '1010', 'Food', 'Water', '', '', '', 'addfood.png', '2020-02-29 10:14:29', 'U006', 2),
(57, 'F57', 'y', 'Drink', 'Juice', '', '', '', 'addfood.png', '2020-02-29 10:28:35', 'U006', 2),
(58, 'F58', 'tt', 'Sweet', 'Cake', '', '', '', 'addfood.png', '2020-02-29 10:29:57', 'U006', 2),
(59, 'F59', 'tt', 'Sweet', 'Cake', '', '', '', 'addfood.png', '2020-02-29 10:30:33', 'U006', 2),
(60, 'F60', 'A', 'Drink', 'Shake', '', '', '', 'addfood.png', '2020-02-29 10:31:19', 'U006', 2),
(61, 'F61', 'A', 'Drink', 'Shake', '', '', '', 'addfood.png', '2020-02-29 10:35:31', 'U006', 2),
(62, 'F62', 'Recipe', 'Drink', 'Shake', '', '', '', 'addfood.png', '2020-02-29 10:37:03', 'U006', 2),
(63, 'F63', 'Recipe1', 'Drink', 'Shake', 'Khmer', '', '', 'addfood.png', '2020-02-29 10:41:31', 'U006', 2),
(64, 'F64', 'Ingredient Recipe', 'Food', 'Water', '', '', '', 'addfood.png', '2020-02-29 10:47:30', 'U006', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblfoodnote`
--

DROP TABLE IF EXISTS `tblfoodnote`;
CREATE TABLE IF NOT EXISTS `tblfoodnote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FoodCode` varchar(10) COLLATE utf16_bin NOT NULL,
  `Note` varchar(1000) COLLATE utf16_bin NOT NULL,
  UNIQUE KEY `UNQIUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tblfoodnote`
--

INSERT INTO `tblfoodnote` (`id`, `FoodCode`, `Note`) VALUES
(1, 'F001', 'មិនមាន');

-- --------------------------------------------------------

--
-- Table structure for table `tblingredient`
--

DROP TABLE IF EXISTS `tblingredient`;
CREATE TABLE IF NOT EXISTS `tblingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FoodCode` varchar(10) COLLATE utf16_bin NOT NULL,
  `Ingredient` varchar(100) COLLATE utf16_bin NOT NULL,
  `Qty` varchar(100) COLLATE utf16_bin NOT NULL,
  UNIQUE KEY `UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tblingredient`
--

INSERT INTO `tblingredient` (`id`, `FoodCode`, `Ingredient`, `Qty`) VALUES
(1, 'F001', 'ត្រសក់(ខ្ចី)', '6​ ផ្លែ'),
(2, 'F001', 'អំបិល', '2 ស្លាបព្រា'),
(3, 'F001', 'ស្លឹកកាឆាយ', '2 ខាំ(កាត់ឱ្យខ្លី)'),
(4, 'F001', 'ខ្ទឹមបារាំង', '1 ផ្លែតូច'),
(5, 'F001', 'ខ្ទឹមសកិន', '1 ស្លាបព្រាបាយ'),
(6, 'F001', 'ទឹក', '0.5 លីត្រ'),
(7, 'F001', 'ទឹកត្រី', '4 ស្លាបព្រាបាយ'),
(8, 'F001', 'ល្ងស', '1 ខាំ'),
(9, 'F64', 'I1', 'Q1'),
(10, 'F64', 'I2', 'Q2'),
(11, 'F64', 'I3', 'Q3');

-- --------------------------------------------------------

--
-- Table structure for table `tblrecipe`
--

DROP TABLE IF EXISTS `tblrecipe`;
CREATE TABLE IF NOT EXISTS `tblrecipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FoodCode` varchar(10) COLLATE utf16_bin NOT NULL,
  `Recipe` varchar(1000) COLLATE utf16_bin NOT NULL,
  UNIQUE KEY `UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tblrecipe`
--

INSERT INTO `tblrecipe` (`id`, `FoodCode`, `Recipe`) VALUES
(1, 'F001', 'យកត្រសក់ទៅលាងទឹកឱ្យស្អាត ពុះជា ៤(ផ្ដាច់ចុងចោលម្ខាង កុំឱ្យដាច់ពីគ្នា )'),
(2, 'F001', 'លីងល្ងឱ្យឈ្ងុយ'),
(3, 'F001', 'យកត្រសក់ដែលចិតរួចទៅប្រឡាក់ជាមួយអំបិលឱ្យសព្វ ហើយទុកចោល មួយម៉ោងទើបលាងទឹកចេញឱ្យស្អាត'),
(4, 'F001', 'លាយគ្រឿងផ្សំ និងបន្លែទាំងអស់ចូលគ្នាឱ្យសព្វ រួចយកមកប្រឡាក់ ជាមួយត្រសក់ឱ្យសព្វ ផ្អាប់ទុករយៈពេល៦ម៉ោងជាការស្រេច'),
(52, 'F64', 'R3'),
(51, 'F64', 'R2'),
(50, 'F64', 'R1'),
(49, 'F63', '6'),
(48, 'F63', '5'),
(47, 'F63', '3'),
(46, 'F63', '2'),
(45, 'F63', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `UserCode` varchar(10) COLLATE utf16_bin NOT NULL,
  `FirstName` varchar(100) COLLATE utf16_bin NOT NULL,
  `LastName` varchar(100) COLLATE utf16_bin NOT NULL,
  `Gender` varchar(100) COLLATE utf16_bin NOT NULL,
  `Email` varchar(100) COLLATE utf16_bin NOT NULL,
  `Phone` varchar(10) COLLATE utf16_bin DEFAULT NULL,
  `Pwd` varchar(10) COLLATE utf16_bin NOT NULL,
  `UserImage` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `RegisterDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Role` int(1) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`UserCode`),
  UNIQUE KEY `UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `UserCode`, `FirstName`, `LastName`, `Gender`, `Email`, `Phone`, `Pwd`, `UserImage`, `RegisterDate`, `Role`, `Status`) VALUES
(1, 'U001', 'Pheary', 'Rin', 'ស្រី', 'pheary@gmail.com', NULL, '123', 'Pheary.png', '2020-02-17 22:56:35', 1, 1),
(2, 'U002', 'Enghorng', 'Lean', 'Female', 'enghorng@gmail.com', '016345238', '123', 'Enghorng.png', '2017-02-20 10:57:54', 1, 1),
(3, 'U003', 'ស្រីលាភ', 'រួន', 'ស្រី', 'sreyleab@gmail.com', NULL, '123', 'Sreyleap.png', '2018-02-20 05:58:25', 2, 1),
(6, 'U006', 'ហាក់', 'សេង', 'ប្រុស', 'hak@gmail.com', NULL, '123', 'Male.png', '2020-02-18 06:09:07', 2, 1),
(10, 'U007', 'Admin', 'User', 'ប្រុស', 'admin@gmail.com', NULL, '123', 'Male.png', '2020-02-22 04:34:06', 1, 1),
(11, 'U011', 'Test', 'User', 'ស្រី', 'test@gmail.com', NULL, '123', 'Female.png', '2020-02-22 04:35:13', 1, 1),
(12, 'U012', 'User', 'Test', 'ស្រី', 'user@gmail.com', NULL, '123', 'Female.png', '2020-02-22 04:37:09', 1, 1),
(18, 'U018', 'Rith', 'Mat', 'ប្រុស', 'rith@gmail.com', '', '123', 'Male.png', '2020-02-25 11:12:59', 1, 1),
(17, 'U013', 'Davy', 'Chan', 'ស្រី', 'davy@gmail.com', '', '123', 'Female.png', '2020-02-25 11:10:26', 1, 1),
(19, 'U019', 'កុក', 'វា', 'ប្រុស', 'kok@gmail.com', '081231031', '123', 'Male.png', '2020-02-26 04:31:42', 1, 1),
(21, 'U020', 'កុក', 'វា', 'ប្រុស', 'kok@gmail.com', '081231031', '123', 'Male.png', '2020-02-26 04:37:26', 1, 1),
(22, 'U022', '', '', 'ប្រុស', '', '', '', 'Male.png', '2020-02-26 04:37:52', 1, 1),
(23, 'U023', '', '', 'ប្រុស', '', '', '', 'Male.png', '2020-02-26 04:38:13', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vuserfood`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vuserfood`;
CREATE TABLE IF NOT EXISTS `vuserfood` (
`FoodCode` varchar(10)
,`FoodName` varchar(100)
,`Category` varchar(10)
,`FoodType` varchar(10)
,`Country` varchar(10)
,`Province` varchar(255)
,`VideoLink` varchar(100)
,`FullName` varchar(201)
,`UserImage` varchar(100)
,`FoodImage` varchar(100)
,`FoodDate` datetime
);

-- --------------------------------------------------------

--
-- Structure for view `vuserfood`
--
DROP TABLE IF EXISTS `vuserfood`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vuserfood`  AS  select `f`.`FoodCode` AS `FoodCode`,`f`.`FoodName` AS `FoodName`,`f`.`Category` AS `Category`,`f`.`FoodType` AS `FoodType`,`f`.`Country` AS `Country`,`f`.`Province` AS `Province`,`f`.`VideoLink` AS `VideoLink`,concat(`u`.`LastName`,' ',`u`.`FirstName`) AS `FullName`,`u`.`UserImage` AS `UserImage`,`f`.`FoodImage` AS `FoodImage`,`f`.`FoodDate` AS `FoodDate` from (`tblfood` `f` join `tbluser` `u` on((`f`.`UserCode` = `u`.`UserCode`))) where (`f`.`Status` = 1) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
