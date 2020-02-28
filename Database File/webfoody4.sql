-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 21, 2020 at 04:03 PM
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
-- Table structure for table `checkmenubar`
--

DROP TABLE IF EXISTS `checkmenubar`;
CREATE TABLE IF NOT EXISTS `checkmenubar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Status` int(1) NOT NULL,
  UNIQUE KEY `UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `checkmenubar`
--

INSERT INTO `checkmenubar` (`id`, `Status`) VALUES
(1, 1);

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
  `FoodTypeCode` varchar(10) COLLATE utf16_bin NOT NULL,
  `Country` varchar(10) COLLATE utf16_bin NOT NULL,
  `Province` varchar(10) COLLATE utf16_bin DEFAULT NULL,
  `VideoLink` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `FoodImage` varchar(100) COLLATE utf16_bin DEFAULT NULL,
  `FoodDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserCode` varchar(10) COLLATE utf16_bin NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`FoodCode`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tblfood`
--

INSERT INTO `tblfood` (`id`, `FoodCode`, `FoodName`, `Category`, `FoodTypeCode`, `Country`, `Province`, `VideoLink`, `FoodImage`, `FoodDate`, `UserCode`, `Status`) VALUES
(1, 'F001', 'គីមឈីត្រសក់', 'Food', 'គោក', 'បរទេស', NULL, NULL, 'គីមឈីត្រសក់.jpg', '2020-02-18 14:32:34', 'U001', 1),
(2, 'F002', 'ឆាមឹកម្រេចខ្ចី ', 'Food', 'គោក', 'ខ្មែរ', NULL, 'https://www.youtube.com/watch?v=UOn8AD58ayU&t=8s', 'ឆាមឹកម្រេចខ្ចី.jpg', '2020-02-19 14:28:26', 'U002', 1),
(3, 'F003', 'បង្កងបំពងរំលីងអំបិលម្ទេស ', 'Food', 'គោក', 'ខ្មែរ', NULL, NULL, 'បង្កងបំពងរំលីងអំបិលម្ទេស.jpg', '2020-02-19 14:29:11', 'U001', 1),
(4, 'F004', 'បុកមឹកពិសេស ', 'Food', 'គោក', 'ខ្មែរ', NULL, 'https://www.youtube.com/watch?v=roCTwjQHSoY&t=77s', 'បុកមឹកពិសេស.jpg', '2020-02-19 14:30:06', 'U004', 1),
(5, 'F005', 'ប្រឡាក់សាច់គោងៀត ', 'Food', 'គោក', 'ខ្មែរ', 'សៀមរាប', 'https://www.youtube.com/watch?v=DKo-1omTdzs', 'ប្រឡាក់សាច់គោងៀត.jpg', '2020-02-19 14:32:32', 'U001', 1),
(6, 'F006', 'ស៊ុតចៀនស្អំបំពងម្សៅ', 'Food', 'គោក', 'ខ្មែរ', NULL, NULL, 'ស៊ុតចៀនស្អំបំពងម្សៅ.jpg', '2020-02-19 14:39:39', 'U001', 1),
(7, 'F007', 'សាច់គោអាំងទឹកអំពិល ', 'Food', 'គោក', 'ខ្មែរ', NULL, 'https://www.youtube.com/watch?v=PD5N_Iql-j4', 'សាច់គោអាំងទឹកអំពិល.jpg', '2020-02-19 14:41:42', 'U002', 1),
(8, 'F008', 'ចាហួយសរសៃពងមាន់', 'Sweet', 'នំ', 'ខ្មែរ', NULL, 'https://www.youtube.com/watch?v=3oQWjttRYoY&t=27s', 'ចាហួយសរសៃពងមាន់.jpg', '2020-02-19 14:48:43', 'U003', 1),
(9, 'F009', 'ចេកឆឹងទឹកស្ករ ', 'Sweet', 'Sweet', 'ខ្មែរ ', NULL, NULL, 'ចេកឆឹងទឹកស្ករ.jpg', '2020-02-19 14:50:07', 'U001', 1),
(10, 'F010', 'តាប៉ែខ្មៅ', 'Sweet', 'បង្អែម', 'ខ្មែរ', 'null', 'https://www.youtube.com/watch?v=DMa4U1FDxxI&t=46s', 'តាប៉ែខ្មៅ.jpg', '2020-02-19 15:08:29', 'U002', 1),
(11, 'F011', 'នំដូងចៀន ', 'Sweet', 'Sweet', 'ខ្មែរ', 'null', 'null', 'នំដូងចៀន.jpg', '2020-02-19 15:13:13', 'U002', 1),
(12, 'F012', 'នំអន្សមខ្នុរ ', 'Sweet', 'Sweet', 'ខ្មែរ', 'null', 'https://www.youtube.com/watch?v=GEWzGWkHIwk', 'នំអន្សមខ្នុរ.png', '2020-02-19 15:15:50', 'U003', 1),
(13, 'F013', 'នំស្លឹកតយ ', 'Sweet', 'Sweet', 'ខ្មែរ', 'null', 'https://www.youtube.com/watch?v=kAAaWnFP_dc&t=19s', 'នំស្លឹកតយ.jpg', '2020-02-19 15:17:08', 'U003', 1),
(14, 'F014', 'បាយដំណើបសង់ខ្យាល្ពៅ ', 'Sweet', 'Sweet', 'ខ្មែរ', 'null', 'https://www.youtube.com/watch?v=79ufZWzpbyY&t=9s', 'បាយដំណើបសង់ខ្យាល្ពៅ.jpg', '2020-02-19 15:18:10', 'U0014', 1),
(15, 'F015', ' Strawbeery ', 'Drink', 'ក្រឡុក', 'បរទេស', 'null', 'null', 'Strawbeery.jpg', '2020-02-19 15:19:28', 'U002', 1),
(16, 'F016', 'ការ៉ុតកាឡុក ', 'Drink', 'ក្រឡុក', 'បរទេស', 'null', 'null', 'ការ៉ុតកាឡុក.jpg', '2020-02-19 15:20:32', 'U006', 1),
(17, 'F017', 'ទឹកក្រូច ', 'Drink', 'ច្របាច់', 'ខ្មែរ', 'null', 'null', 'ទឹកក្រូច.jpg', '2020-02-19 15:22:00', 'U003', 1),
(18, 'F018', 'ទឹកក្រូចច្របាច់ ', 'Drink', 'ច្របាច់', 'បរទេស', 'null', 'null', 'ទឹកក្រូចច្របាច់.jpg', '2020-02-19 15:22:58', 'U003', 1),
(19, 'F019', 'ទឹកពោតផ្អែម ', 'Drink', 'ធម្មតា', 'ខ្មែរ', 'null', 'null', 'ទឹកពោតផ្អែម.jpg', '2020-02-19 15:25:08', 'U002', 1),
(20, 'F020', 'ទឹកម្នាស់ ', 'Drink', 'ទឹកកក', 'បរទេស', 'null', 'null', 'ទឹកម្នាស់.jpg', '2020-02-19 15:28:01', 'U002', 1);

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
  `UserImage` varchar(100) COLLATE utf16_bin NOT NULL,
  `RegisterDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Role` int(1) NOT NULL,
  `Status` int(1) NOT NULL,
  PRIMARY KEY (`UserCode`),
  UNIQUE KEY `UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `UserCode`, `FirstName`, `LastName`, `Gender`, `Email`, `Phone`, `Pwd`, `UserImage`, `RegisterDate`, `Role`, `Status`) VALUES
(1, 'U001', 'Pheary', 'Rin', 'ស្រី', 'pheary@gmail.com', NULL, '123', 'Pheary.jpg', '2020-02-17 22:56:35', 1, 1),
(2, 'U002', 'Enghorng', 'Lean', 'Female', 'enghorng@gmail.com', '016345238', '123', 'Enghorng.png', '2017-02-20 10:57:54', 1, 1),
(3, 'U003', 'ស្រីលាភ', 'រួន', 'ស្រី', 'sreyleab@gmail.com', '', '123', 'Sreyleap.jpg', '2018-02-20 05:58:25', 1, 1),
(6, 'U006', 'សេង', 'ហាក់', 'ប្រុស', 'hak@gmail.com', '', '123', 'Unknown.png', '2020-02-18 06:09:07', 1, 1);

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vuserfood`  AS  select `f`.`FoodCode` AS `FoodCode`,`f`.`FoodName` AS `FoodName`,`f`.`Category` AS `Category`,concat(`u`.`LastName`,' ',`u`.`FirstName`) AS `FullName`,`u`.`UserImage` AS `UserImage`,`f`.`FoodImage` AS `FoodImage`,`f`.`FoodDate` AS `FoodDate` from (`tblfood` `f` join `tbluser` `u` on((`f`.`UserCode` = `u`.`UserCode`))) where (`f`.`Status` = 1) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
