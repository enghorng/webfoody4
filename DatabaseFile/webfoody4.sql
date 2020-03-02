-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2020 at 01:52 AM
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
(1, 2, 'Pheary', 'U001');

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
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tblfood`
--

INSERT INTO `tblfood` (`id`, `FoodCode`, `FoodName`, `Category`, `FoodType`, `Country`, `Province`, `VideoLink`, `FoodImage`, `FoodDate`, `UserCode`, `Status`) VALUES
(1, 'F001', 'គីមឈីត្រសក់', 'Food', 'NoWater', 'Foreign', NULL, NULL, 'គីមឈីត្រសក់.jpg', '2020-02-18 14:32:34', 'U001', 1),
(2, 'F002', 'ឆាមឹកម្រេចខ្ចី ', 'Food', 'NoWater', 'Khmer', '', 'https://www.youtube.com/watch?v=UOn8AD58ayU&t=8s', 'ឆាមឹកម្រេចខ្ចី.jpg', '2020-02-19 14:28:26', 'U002', 1),
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
(67, 'F67', 'កកូរ', 'Food', 'Water', 'Khmer', 'កំពង់ឆ្នាំង', '', 'addfood.png', '2020-02-29 09:56:19', 'U006', 2),
(83, 'F83', 'ចាហួយសរសែរពងមាន់', 'Sweet', 'Sweet', 'Khmer', '', '', 'ចាហួយសរសៃពងមាន់.jpg', '2020-03-01 05:45:15', 'U002', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tblfoodnote`
--

INSERT INTO `tblfoodnote` (`id`, `FoodCode`, `Note`) VALUES
(1, 'F001', 'មិនមាន'),
(2, 'F71', ''),
(3, 'F72', ''),
(4, 'F73', 'ថថ'),
(5, 'F74', 'សស'),
(6, 'F75', 'ឆឆឆ'),
(7, 'F76', 'កក'),
(8, 'F77', 'កក'),
(9, 'F78', 'យយ'),
(10, 'F79', 'កក'),
(11, 'F80', 'កក'),
(12, 'F81', 'កក'),
(13, 'F82', 'កក9'),
(14, 'F83', 'ចាហួយសរសែរពងមាន់'),
(15, 'F84', 'យយ'),
(16, 'F85', ''),
(17, 'F86', 'd');

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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

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
(11, 'F64', 'I3', 'Q3'),
(12, 'F65', 'គ្រឿងទេស', 'បរិមាណ'),
(13, 'F65', 'គ្រឿងទេស', 'បរិមាណ'),
(14, 'F67', 'អំបិល', '១ក្រាម'),
(15, 'F67', 'ស្ករ', '១ក្រាម'),
(16, 'F69', 'កកកក', 'កកកក'),
(17, 'F69', 'កកកក', 'កកកក'),
(18, 'F70', 'កកកក', 'កកកក'),
(19, 'F70', 'កកកក', 'កកកក'),
(20, 'F83', 'ពងមាន់', '២ គ្រាប់'),
(21, 'F83', 'ម្សៅចាហួយ', '១០​ ក្រាម'),
(22, 'F83', 'ស្ករស', '១៥០ ក្រាម'),
(23, 'F83', 'ទឹកស្អាត', '១ លីត្រ'),
(24, 'F83', 'ស្លឹកតយ', '២-៣សន្លឹក');

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
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tblrecipe`
--

INSERT INTO `tblrecipe` (`id`, `FoodCode`, `Recipe`) VALUES
(1, 'F001', 'យកត្រសក់ទៅលាងទឹកឱ្យស្អាត ពុះជា ៤(ផ្ដាច់ចុងចោលម្ខាង កុំឱ្យដាច់ពីគ្នា )'),
(2, 'F001', 'លីងល្ងឱ្យឈ្ងុយ'),
(3, 'F001', 'យកត្រសក់ដែលចិតរួចទៅប្រឡាក់ជាមួយអំបិលឱ្យសព្វ ហើយទុកចោល មួយម៉ោងទើបលាងទឹកចេញឱ្យស្អាត'),
(4, 'F001', 'លាយគ្រឿងផ្សំ និងបន្លែទាំងអស់ចូលគ្នាឱ្យសព្វ រួចយកមកប្រឡាក់ ជាមួយត្រសក់ឱ្យសព្វ ផ្អាប់ទុករយៈពេល៦ម៉ោងជាការស្រេច'),
(60, 'F83', 'គោះពងមាន់ដាក់ចាន ហើយលាយបញ្ចូលគ្នាឱ្យសព្វ រួចច្រោះកុំឱ្យដោយកាក'),
(59, 'F70', 'កកកក'),
(58, 'F70', 'កកកក'),
(57, 'F69', 'កកកក'),
(56, 'F69', 'កកកក'),
(55, 'F67', 'កកកកកកកកកកកកកកកកកកកកកកកកកក'),
(54, 'F65', 'របៀបធ្វើ២'),
(53, 'F65', 'របៀបធ្វើ១'),
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
  `Phone` varchar(20) COLLATE utf16_bin DEFAULT NULL,
  `Pwd` varchar(10) COLLATE utf16_bin NOT NULL,
  `UserImage` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `RegisterDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Role` int(1) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`UserCode`),
  UNIQUE KEY `UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `UserCode`, `FirstName`, `LastName`, `Gender`, `Email`, `Phone`, `Pwd`, `UserImage`, `RegisterDate`, `Role`, `Status`) VALUES
(1, 'U001', 'Pheary', 'Rin', 'ស្រី', 'pheary@gmail.com', '012654876', '123', 'Pheary.png', '2020-02-17 22:56:35', 2, 1),
(2, 'U002', 'Enghorng', 'Lean', 'ស្រី', 'enghorng22@gmail.com', '066345238', '098', 'Enghorng.png', '2017-02-20 10:57:54', 2, 1),
(3, 'U003', 'ស្រីលាភ', 'រុន', 'ស្រី', 'sreyleab@gmail.com', '098765567', '123', 'Sreyleap.png', '2018-02-20 05:58:25', 2, 1),
(6, 'U006', 'ហាក់', 'សេង', 'ប្រុស', 'hak@gmail.com', '098', '123', 'Male.png', '2020-02-18 06:09:07', 2, 1),
(10, 'U007', 'Admin', 'User', 'ប្រុស', 'admin@gmail.com', NULL, '123', 'Male.png', '2020-02-22 04:34:06', 1, 1),
(11, 'U011', 'Test', 'User', 'ស្រី', 'test@gmail.com', NULL, '123', 'Female.png', '2020-02-22 04:35:13', 1, 1),
(12, 'U012', 'User', 'Test', 'ស្រី', 'user@gmail.com', NULL, '123', 'Female.png', '2020-02-22 04:37:09', 1, 1),
(18, 'U018', 'Rith', 'Mat', 'ប្រុស', 'rith@gmail.com', '', '123', 'Male.png', '2020-02-25 11:12:59', 1, 1),
(17, 'U013', 'Davy', 'Chan', 'ស្រី', 'davy@gmail.com', '', '123', 'Female.png', '2020-02-25 11:10:26', 2, 1),
(19, 'U019', 'កុក', 'វា', 'ស្រី', 'kok@gmail.com', '081231031', '123', 'Male.png', '2020-02-26 04:31:42', 1, 1);

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
