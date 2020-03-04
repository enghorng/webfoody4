-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2020 at 02:50 PM
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
(1, 2, 'Admin', 'U007');

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
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tblfood`
--

INSERT INTO `tblfood` (`id`, `FoodCode`, `FoodName`, `Category`, `FoodType`, `Country`, `Province`, `VideoLink`, `FoodImage`, `FoodDate`, `UserCode`, `Status`) VALUES
(1, 'F001', 'គីមឈីត្រសក់', 'Food', 'NoWater', 'Foreign', NULL, NULL, 'គីមឈីត្រសក់.jpg', '2020-02-18 14:32:34', 'U007', 1),
(2, 'F002', 'ឆាមឹកម្រេចខ្ចី ', 'Food', 'NoWater', 'Khmer', '', 'https://www.youtube.com/watch?v=UOn8AD58ayU&t=8s', 'ឆាមឹកម្រេចខ្ចី.jpg', '2020-02-19 14:28:26', 'U011', 1),
(3, 'F003', 'បង្កងបំពងរំលីងអំបិលម្ទេស ', 'Food', 'Water', 'Khmer', NULL, NULL, 'បង្កងបំពងរំលីងអំបិលម្ទេស.jpg', '2020-02-19 14:29:11', 'U007', 1),
(5, 'F005', 'ប្រឡាក់សាច់គោងៀត ', 'Food', 'NoWater', 'Khmer', 'សៀមរាប', 'https://www.youtube.com/watch?v=DKo-1omTdzs', 'ប្រឡាក់សាច់គោងៀត.jpg', '2020-02-19 14:32:32', 'U001', 1),
(6, 'F006', 'ស៊ុតចៀនស្អំបំពងម្សៅ', 'Food', 'NoWater', 'Khmer', NULL, NULL, 'ស៊ុតចៀនស្អំបំពងម្សៅ.jpg', '2020-02-19 14:39:39', 'U001', 1),
(91, 'F91', 'ចេកឆឹងទឹកស្ករ', 'Sweet', 'Sweet', 'Khmer', '', 'https://www.youtube.com/watch?v=DQR7t_Jnvco', 'ចេកឆឹងទឹកស្ករ.jpg', '2020-03-03 09:22:50', 'U001', 1),
(10, 'F010', 'តាប៉ែខ្មៅ', 'Sweet', 'Sweet', 'Khmer', NULL, 'https://www.youtube.com/watch?v=DMa4U1FDxxI&t=46s', 'តាប៉ែខ្មៅ.jpg', '2020-02-19 15:08:29', 'U011', 1),
(94, 'F94', 'នំស្លឹកតយ', 'Sweet', 'Cake', 'Khmer', '', 'https://www.youtube.com/watch?v=kAAaWnFP_dc', 'នំស្លឹកតយ.jpg', '2020-03-03 09:39:31', 'U003', 1),
(12, 'F012', 'នំអន្សមខ្នុរ ', 'Sweet', 'Sweet', 'Khmer', NULL, 'https://www.youtube.com/watch?v=GEWzGWkHIwk', 'នំអន្សមខ្នុរ.png', '2020-02-19 15:15:50', 'U003', 1),
(95, 'F95', 'សាច់គោអាំងទឹកអំពិល', 'Food', 'NoWater', 'Khmer', '', 'https://www.youtube.com/watch?v=PD5N_Iql-j4', 'សាច់គោអាំងទឹកអំពិល.jpg', '2020-03-03 09:46:49', 'U002', 1),
(14, 'F014', 'បាយដំណើបសង់ខ្យាល្ពៅ ', 'Sweet', 'Sweet', 'Khmer', NULL, 'https://www.youtube.com/watch?v=79ufZWzpbyY&t=9s', 'បាយដំណើបសង់ខ្យាល្ពៅ.jpg', '2020-02-19 15:18:10', 'U011', 1),
(15, 'F015', ' Strawbeery ', 'Drink', 'Shake', 'Foreign', NULL, NULL, 'Strawbeery.jpg', '2020-02-19 15:19:28', 'U007', 1),
(16, 'F016', 'ការ៉ុតកាឡុក ', 'Drink', 'Shake', 'Foreign', NULL, NULL, 'ការ៉ុតកាឡុក.jpg', '2020-02-19 15:20:32', 'U006', 1),
(17, 'F017', 'ទឹកក្រូច ', 'Drink', 'Juice', 'Khmer', NULL, NULL, 'ទឹកក្រូច.jpg', '2020-02-19 15:22:00', 'U003', 1),
(18, 'F018', 'ទឹកក្រូចច្របាច់ ', 'Drink', 'Juice', 'Foreign', NULL, NULL, 'ទឹកក្រូចច្របាច់.jpg', '2020-02-19 15:22:58', 'U007', 1),
(19, 'F019', 'ទឹកពោតផ្អែម ', 'Drink', 'Simple', 'Khmer', NULL, NULL, 'ទឹកពោតផ្អែម.jpg', '2020-02-19 15:25:08', 'U002', 1),
(20, 'F020', 'ទឹកម្នាស់ ', 'Drink', 'Ice', 'Foreign', NULL, NULL, 'ទឹកម្នាស់.jpg', '2020-02-19 15:28:01', 'U002', 1),
(67, 'F67', 'កកូរ', 'Food', 'Water', 'Khmer', 'កំពង់ឆ្នាំង', '', 'addfood.png', '2020-02-29 09:56:19', 'U006', 3),
(88, 'F84', 'ទឹកត្រសក់ស្រូវក្រឡុក', 'Drink', 'Ice', 'Khmer', '', '', 'ទឹកត្រសក់ស្រូវ.png', '2020-03-02 03:13:02', 'U020', 1),
(89, 'F89', 'មាន់ដុតពិសេស', 'Food', 'NoWater', '', '', '', 'មាន់ដុត.png', '2020-03-02 03:26:35', 'U011', 1),
(90, 'F90', 'ចាហួយសរសៃពងមាន់', 'Sweet', 'Sweet', 'Khmer', '', 'https://www.youtube.com/watch?v=3oQWjttRYoY', 'ចាហួយសរសៃពងមាន់.jpg', '2020-03-03 09:17:40', 'U003', 1),
(93, 'F92', 'នំដូងចៀន', 'Sweet', 'Cake', 'Foreign', '', 'https://www.youtube.com/watch?v=b4CL4q8WkHc', 'នំដូងចៀន.jpg', '2020-03-03 09:33:16', 'U007', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

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
(17, 'F86', 'd'),
(18, 'F84', ''),
(19, 'F84', 'គុណប្រយោជន៍ផ្នែកអាហារ \r\nក្នុងផ្លែត្រសក់ស្រូវ សម្បូរទៅដោយជីវជាតិអាហារ ផ្សេងៗ ដូចជាថាមពល ការបូអ៊ីដ្រាត ប្រូតេអ៊ីន កាកសរសៃ វីតាមីន និងជាតិរ៉ែខនិជ។ \r\nគុណប្រយោជន៍ផ្នែកឱសថ \r\nសាច់ត្រសក់ស្រូវ មានភាពត្រជាក់ មានប្រសិទ្ធភាពបំបាត់ការស្រេកទឹក កាត់បន្ថយកំដៅ ក្នុងរាងកាយ បញ្ចុះទឹកនោម។ ចំពោះអ្នកដែលឩស្សាហ៍ រាករូសញឹកញាប់ មិនគួរពិសាទឹកត្រសក់ស្រូវ ច្រើនពេកទេ ៕\r\n'),
(20, 'F89', ''),
(21, 'F90', ''),
(22, 'F91', ''),
(23, 'F92', ''),
(24, 'F92', ''),
(25, 'F94', ''),
(26, 'F95', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

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
(24, 'F83', 'ស្លឹកតយ', '២-៣សន្លឹក'),
(25, 'F84', 'ត្រសក់ស្រូវទុំ ហាន់ជាចំណិតតូចៗ ', 'កន្លះពែង'),
(26, 'F84', 'ទឹកដោះគោឆៅ ', 'កន្លះពែង'),
(27, 'F89', 'មើមខ្ទឹម ', '៥កំពិស'),
(28, 'F89', 'មាន់ស្រែ', 'ទម្ងន់ប្រហែល ១គ.ក្រ ១ក្បាល'),
(29, 'F90', 'ពងមាន់', '២-៣ គ្រាប់'),
(30, 'F90', 'ម្សៅចាហួយ', '១០ ក្រាម'),
(31, 'F90', 'ទឹក ', '១ លីត្រ'),
(32, 'F90', 'ស្ករស ', '១៥០ក្រាម'),
(33, 'F90', 'ស្លឹកតើយ ', '២-៣សន្លឹក'),
(34, 'F91', 'ចេកណាំវ៉ាទុំស្រគៀល (កុំឱ្យទុំពេក)', ''),
(35, 'F91', 'ស្ករក្រហម', ''),
(36, 'F91', 'កំបោរ', ''),
(37, 'F91', 'អំបិល', ''),
(38, 'F91', 'សាច់ដូង', ''),
(39, 'F91', 'កោសជាសសៃៗ', ''),
(40, 'F92', ' អង្ករដំណើបខ្មៅ ', '៣០០ ក្រាម'),
(41, 'F92', 'មេតាប៉ែ', '១ ស្លាបព្រាបាយ (បុកឲ្យម៉ត)'),
(42, 'F92', 'ស្លឹកចេក', '១០-១៥ សន្លឹកកាត់ជារាងមូល​តូចល្មម'),
(43, 'F92', 'អបិលកន្លះស្លាបព្រាកាហ្វេលាយជា​មួយ​ទឹក​កន្លះ​កូន​ចាន​ចង្កឹះ', ''),
(44, 'F92', 'សាច់ដូង​ខ្ចី', '១ ចំហៀង កោស ឬចិតជាសសៃ​ចំណិត​តូចៗ'),
(45, 'F92', 'ម្សៅអង្ករដំណើប ', '១កូនចានចង្កឹះ'),
(46, 'F92', 'ខ្ទិះដូង ', 'កន្លះកូនចានចង្កឹះ'),
(47, 'F92', 'អំបិល', 'បន្តិច'),
(48, 'F92', 'ស្ករស ', 'កន្លះកូនចានចង្កឹះ'),
(49, 'F92', 'សាច់ដូងកោស ឬហាន់ជាសរសៃល្មម ', '២កូនចានចង្កឹះ'),
(50, 'F95', 'សាច់គោ(សាច់ផុយជាប់ខ្លាញ់)', '៨០០ក្រាម'),
(51, 'F95', 'អំបិល ', '១ស្លាបព្រាកាហ្វេ'),
(52, 'F95', 'ម្រេចម៉ត់ ', '២ស្លាបព្រាកាហ្វេ'),
(53, 'F95', 'ប្រេងសណ្តែក ', '២ស្លាបព្រាបាយ'),
(54, 'F95', 'ទឹកប្រេងខ្យង ', '២ស្លាបព្រាបាយ'),
(55, 'F95', 'ប័រ ', '១ស្លាបព្រាបាយ'),
(56, 'F95', 'ទឹកអំពិលទុំ ', '៤ស្លាបព្រាបាយ'),
(57, 'F95', 'ទឹកក្រូចឆ្មារ ', '១ស្លាបព្រាបាយ '),
(58, 'F95', 'ទឹកត្រី ', '៤ស្លាបព្រាបាយ'),
(59, 'F95', 'ស្ករ ', '៣ស្លាបព្រាបាយ'),
(60, 'F95', 'ម្ទេសហុយ ', '៣ស្លាបព្រាបាយ '),
(61, 'F95', 'អង្ករលីង ', '២ស្លាបព្រាបាយ');

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
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

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
(45, 'F63', '1'),
(61, 'F84', 'ដាក់គ្រឿងផ្សំទាំងអស់ ចូលក្នុងម៉ាស៊ីនក្រឡុក កិនក្រឡុកវាអោយចូលគ្នា រួចចាក់ដាក់កែវ'),
(62, 'F89', 'វិធីដុតយកឈើមកដោតមាន់ ដោយបន្សល់ចុងម្ខាងសំរាប់ដោតទៅនឹងដី ហើយយកសំបកប៉ោតមកគ្របពីលើ ទើបយកចំបើងមកគរលើសំបកប៉ោតអោយលិចទៀត ហើយសឹមដុតចំបើង អោយឆេះទ្រលោមឡើងលិចប៉ោតនោះ ប្រហែលជា១៥ទៅ ២០នាទីចាំលើកសំបកប៉ោតចេញ'),
(63, 'F90', 'គោះពងមាន់ដាក់ចានវាយបញ្ចូលគ្នាឱ្យសព្វ រួចចាក់ច្រោះកុំឱ្យដោយដុំៗ'),
(64, 'F90', 'ដាំឆ្នាំងដាក់ទឹកចូលដាំឱ្យពុះ រួចដាក់ម្សៅចាហួយចូលកូរឱ្យសព្វ ហើយដាក់ស្លឹកតើយ និងស្ករសចូលកូរឱ្យសព្វចូលគ្នាល្អ ទុកមួយរំពុះ'),
(65, 'F90', 'បន្ទាប់មកស្រង់ស្លឹកតើយចេញ ហើយចាក់ពងមាន់ចូលរាយជាសរសៃឱ្យពេញឆ្នាំងកុំឱ្យដុំៗ រួចកូរចូលគ្នា'),
(66, 'F90', 'រួចរាល់ហើយលើកចេញពីចង្រ្កានចាក់ចូលចាន ឬពុម្ព ពេលដួសចាក់ចូលកូរផងកុំឱ្យពងមាន់ដុំៗ ទុកចោលឱ្យត្រជាក់ឡើងជាចាហួយជាការស្រេច'),
(67, 'F91', 'ចេកណាំវ៉ាបកសំបក ត្រាំក្នុងទឹកកំបោរឱ្យបានកន្លះម៉ោង ឬ១ម៉ោង ទើបស្រង់ឡើងលាងទឹកឱ្យស្អាត ដាក់មួយកន្លែងឱ្យស្រោះទឹក។'),
(68, 'F91', 'យកឆ្នាំងខ្ទះចាក់ស្ករក្រហមចូល និងដាំលើភ្លើង កូរអោយឡើងជើងអង្ក្រង ទើបដាក់ចេកចូល ប្រែចេកចុះឡើងៗឱ្យសព្វ បង់អំបិលមួយចិប ចាក់ទឹកចូលបន្តិច ឆឹងរហូតដល់ឆ្អិនចេក រីងទឹក ទាល់តែស្ករឡើងស្អិតដាក់សសៃដូងកូរសប់ល្អទើបលើកចុះ ជាការស្រេច។'),
(69, 'F92', 'ជា​ដំ​បូង​អ្នក​ត្រូវ​ដាំ​បាយដំណើបឲ្យឆ្អិនជាមុនសិន។'),
(70, 'F92', 'នៅពេលដែល​អ្នក​ដាំបាយដំណើប​ឆ្អិនហើយ ត្រូវដួសបាយ​ដំណើប​នោះ​ដាក់​ចូល​ក្នុង​ថាស​​​បន្ទាប់​មក​រង្គាយបាយ​ដំ​ណើប​ ឲ្យ​ស្មើទៅ​តាម​ថាស រួច​ហើយ​ទុក​ឲ្យ​ត្រ​ជាក់​។'),
(71, 'F92', 'បន្ទាប់​ពី​បាយ​ដំ​ណើប​ត្រ​ជាក់​ហើយ​ត្រូវ​យក​មេតាប៉ែ​មក​រោយពីលើ​រួច​ច្របល់​បញ្ចូល​​គ្នាឲ្យសពល្អ​។'),
(72, 'F92', 'យក​ទឹក​អំបិល​មកដាក់​ឲ្យ​សើម​ជា​មួយ​នឹង​ដៃ បន្ទាប់​មក​យក​បាយ​ដំណើប​ធ្វើ​ឲ្យ​ទៅ​ជា​ដុំ​មូលៗ​តូច​ល្មម ឬ​តាមដែល​អ្នក​ចង់​បាន​ រួច​ហើយ​​យក​ស្លឹក​ចេក​ទ្រាប់​ពីក្រោម​ដាក់​ចូល​ទៅ​ក្នុង​ឆ្នាំងធ្វើ​ដូច​ នេះទាល់​តែ​អស់​បាយ​ដំ​ណើប​នោះ បន្ទាប់មក​អ្នកយក​គំរប​គ្រប​ឲ្យ​ជិត​ រក្សាទុកបីយប់​។'),
(73, 'F92', 'យកម្សៅលាយជាមួយស្ករស និងអំបិលច្របល់ចូលគ្នាអោយសព្វ រួចដាក់ខ្ទិះដូងចូលច្របល់ចូលគ្នាអោយសព្វរហូតឡើងជាល្បាយៗ ហើយដាក់សាច់ដូងចូលច្របល់ចូលគ្នាអោយសព្វ'),
(74, 'F92', 'បន្ទាប់មកដាំខ្ទះអោយក្តៅ រួចដួសម្សៅដាក់ចៀនជាបន្ទះ ឬជាដុំល្មម (ដួសម្សៅ ១ស្លាបព្រាបាយ) ចៀនអោយឆ្អិនក្រៀមល្មមជាការស្រច៕'),
(75, 'F95', 'សាច់គោហាន់ជាបន្ទះធំៗល្មម យកសមដែកចាក់លើសាច់ឲ្យសព្វ (ដើម្បីពេលប្រឡាក់សាច់ចូលជាតិល្អ) រួចដាក់អំបិល ម្រេច ទឹកប្រេងខ្យង និងប្រេងសណ្តែកចូលប្រឡាក់ជាមួយសាច់ឲ្យសព្វល្អទុកចោលរយៈពេល១០នាទី។'),
(76, 'F95', 'ធ្វើទឹកជ្រលក់ លាយទឹកអំពិលទុំ ស្ករ ទឹកត្រី ទឹកក្រូចឆ្មារ និងម្ទេសហុយចូលគ្នា រួចដាក់អង្ករលីងចូល កូរចូលគ្នា ហើយដាក់ស្លឹកជីរ ឬស្លឹកខ្ទឹម និងខ្ទឹមក្រហមចូលជាការស្រេច។'),
(77, 'F95', 'ដាំខ្ទះ(ខ្ទះធម្មតា ឬខ្ទះបន្ទះដែកសម្រាប់អាំងសាច់) លាបប័រឲ្យសព្វ រួចយកសាច់គោដាក់ចូល ចំអិនឲ្យឆ្អិនល្មម ឬក៏យកទៅអាំងបែបធម្មតាក៏បានតាមចំណូលចិត្ត។'),
(78, 'F95', 'រួចរាល់អស់ហើយយកសាច់គោហាន់ជាដុំៗតាមចំណូលចិត្ត ហូបជាមួយបន្លែអន្លក់ ជ្រលក់ជាមួយទឹកត្រីអំពិលទុំរសជាតិហឹរឆ្ងាញ់ ឬក៏ស្រោយទឹកជ្រលក់ចូលក៏បាន');

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
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `UserCode`, `FirstName`, `LastName`, `Gender`, `Email`, `Phone`, `Pwd`, `UserImage`, `RegisterDate`, `Role`, `Status`) VALUES
(1, 'U001', 'សុភារី', 'រីន', 'ស្រី', 'pheary@gmail.com', '012654876', '123', 'Pheary.png', '2020-02-17 22:56:35', 2, 1),
(46, 'U002', 'អេងហ៊ង', 'លាន', 'ស្រី', 'enghorng@gmail.com', '016345238', '123', 'Enghorng.png', '2020-03-03 20:31:12', 2, 1),
(3, 'U003', 'ស្រីលាភ', 'រុន', 'ស្រី', 'sreyleab@gmail.com', '098765567', '123', 'Sreyleap.png', '2018-02-20 05:58:25', 2, 1),
(6, 'U006', 'សេងហាក់', 'ឃួន', 'ប្រុស', 'senghak@gmail.com', '098123764', '123', 'Senghak.png', '2020-02-18 06:09:07', 2, 1),
(10, 'U007', 'Admin', 'User', 'ប្រុស', 'admin@gmail.com', '', '123', 'admin.png', '2020-02-22 04:34:06', 2, 1),
(11, 'U011', 'Member', 'User', 'ស្រី', 'member@gmail.com', '098765567', '123', 'member.png', '2020-02-22 04:35:13', 1, 1);

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
