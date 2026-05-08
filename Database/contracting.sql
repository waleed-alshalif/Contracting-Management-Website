-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2024 at 04:15 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contracting`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_project_to_manager`
--

DROP TABLE IF EXISTS `add_project_to_manager`;
CREATE TABLE IF NOT EXISTS `add_project_to_manager` (
  `Date` date NOT NULL,
  `Price` int NOT NULL,
  `Description` varchar(300) NOT NULL,
  `ID_manager` smallint NOT NULL,
  KEY `ID_manager` (`ID_manager`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_project_to_manager`
--

INSERT INTO `add_project_to_manager` (`Date`, `Price`, `Description`, `ID_manager`) VALUES
('2024-05-10', 120000, 'waleed alshalif\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 932),
('2024-05-13', 12000, 'build the My home ', 932),
('2024-05-13', 1212, 'wzergvibjhk;l', 932),
('2024-05-13', 23456789, 'awectyvubjnmkl', 932),
('2024-05-13', 12002, '1212j1', 932),
('2024-05-13', 234567, 'ectyibhl', 932),
('2024-05-13', 123456, 'efcjhkl', 932),
('2024-05-13', 2345678, 'setrvhjnk', 932),
('2024-05-13', 12000, 'dsld f;sdf ,xmc v;cj ', 932),
('2024-05-13', 12000, ';ksdbfv', 932),
('2024-05-13', 1200000, 'WERYUJNMKL;,.', 932),
('2024-05-13', 1200000, 'lsadn;flsd', 932),
('2024-05-13', 1200, 'ertyu', 615),
('2024-05-13', 12789, 'etryui;', 140),
('2024-05-13', 2345678, '567890-sdfghjkl;', 140),
('2024-05-14', 120000, 'Eyed Almogahed', 140);

-- --------------------------------------------------------

--
-- Table structure for table `admines`
--

DROP TABLE IF EXISTS `admines`;
CREATE TABLE IF NOT EXISTS `admines` (
  `Username` varchar(30) NOT NULL,
  `Pass` varchar(200) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone_Number` int NOT NULL,
  `Registeration_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admines`
--

INSERT INTO `admines` (`Username`, `Pass`, `Email`, `Phone_Number`, `Registeration_date`) VALUES
('waleed', '$2y$10$NGPhEiAxRoMF0d/Uubyyc.SWP6nGgA9i3v/L6cYwqljXDo8ZjqvVS', 'waleed@gmail.com', 778221289, '2024-04-15 21:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `Message` varchar(300) DEFAULT NULL,
  `Date_Massage` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Message`, `Date_Massage`) VALUES
('Waleed Alshalif The Best ', '2024-03-14 13:58:48'),
('Elasakdwkd', '2024-03-03 11:02:32'),
('werxdfcghbkjnkm', '2024-03-03 11:13:15'),
('wesrdtfygvhbjnkwesrdftghb', '2024-03-03 11:44:21'),
('Shahd the best one ', '2024-04-15 21:58:03'),
('uavsdfusdvy', '2024-05-13 12:54:19'),
('skdjfbasd', '2024-05-13 18:57:12'),
('skdjfbasd', '2024-05-13 18:57:47'),
('skdjfbasd', '2024-05-13 18:58:52'),
('a,s A', '2024-05-13 18:59:02'),
('ADS,CAS/D', '2024-05-13 18:59:10'),
(' waleed  \r\n', '2024-05-13 19:05:54'),
('                \r\n html coding ', '2024-05-13 19:07:02'),
('                .m.', '2024-05-13 21:24:43'),
('\r\n\r\n\r\n waleedlsadbf;sjd;skd j\r\n                ', '2024-05-13 21:25:15'),
('                tablish ongoing relationships that allow us to contribute and assist financially and practically in the long-term success of their projects or Te', '2024-05-14 18:55:02'),
('                tablish ongoing relationships that allow us to contribute and assist financially and practically in the long-term success of their projects or Te', '2024-05-14 19:00:16'),
('                tablish ongoing relationships that allow us to contribute and assist financially and practically in the long-term success of their projects or Te', '2024-05-14 19:00:50'),
('                WALED', '2024-05-14 19:04:08'),
('                WALED', '2024-05-14 19:04:41'),
('                WALEED ALSHALIF', '2024-05-14 19:04:59'),
('                Sorry. Your Massage Not Access To Us', '2024-05-14 19:05:29'),
('                WERTRGHJ', '2024-05-14 19:06:14'),
('                WERTRGHJ', '2024-05-14 19:07:23'),
('                ', '2024-05-14 19:07:35'),
('                ', '2024-05-14 19:07:49'),
('                ', '2024-05-14 19:08:08'),
('                uccess of their projects', '2024-05-14 19:08:46'),
('                WALED ASJD;F', '2024-05-14 20:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `contractors`
--

DROP TABLE IF EXISTS `contractors`;
CREATE TABLE IF NOT EXISTS `contractors` (
  `Icon` varchar(30) NOT NULL,
  `Company_name` varchar(40) NOT NULL,
  `Location` varchar(25) NOT NULL,
  `Phone_Number` int NOT NULL,
  `ID_company` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Classification` smallint NOT NULL,
  `Email` varchar(20) NOT NULL,
  `File` varchar(30) NOT NULL,
  `Registertion_date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_company`)
) ENGINE=MyISAM AUTO_INCREMENT=982 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contractors`
--

INSERT INTO `contractors` (`Icon`, `Company_name`, `Location`, `Phone_Number`, `ID_company`, `Classification`, `Email`, `File`, `Registertion_date`) VALUES
('Qatar.jpg', 'Qater', 'Taiz', 18283922, 665, 21, 'qater@gmail.com', 'Php Mid Term Exam Model A & B.', '2024-04-17 21:32:01'),
('aljood.jpg', 'WaleedJood', 'Yemen / Sana.a', 1111182, 316, 2, 'walsoft@gmmail.com', 'Smallpdf_2024-01-14.pdf', '2024-04-17 21:22:31');

-- --------------------------------------------------------

--
-- Table structure for table `daily_views`
--

DROP TABLE IF EXISTS `daily_views`;
CREATE TABLE IF NOT EXISTS `daily_views` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `views` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `daily_views`
--

INSERT INTO `daily_views` (`id`, `date`, `views`) VALUES
(1, '2024-03-25', 6),
(101, '0000-00-00', 6),
(2, '2024-04-11', 12);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `Company_Name` varchar(30) NOT NULL,
  `Job_Name` varchar(25) NOT NULL,
  `Job_End` date NOT NULL,
  `Location` varchar(25) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Registertion_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`Company_Name`, `Job_Name`, `Job_End`, `Location`, `Email`, `Registertion_date`) VALUES
('Qatar', 'Analysis', '2024-06-03', 'Taiz', 'Qatar@gmail.com', '2024-04-17 21:29:31'),
('WaleedJood', 'Builders', '2024-07-31', ' Sana.a', 'waljood@gmail.com', '2024-04-17 21:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `offering_job`
--

DROP TABLE IF EXISTS `offering_job`;
CREATE TABLE IF NOT EXISTS `offering_job` (
  `First_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(15) NOT NULL,
  `Phone_Number` int NOT NULL,
  `Email` varchar(20) NOT NULL,
  `CV_Files` varchar(30) NOT NULL,
  `Specialization_Name` varchar(30) NOT NULL,
  `Specialization_Level` char(8) NOT NULL,
  `Job_Title` varchar(20) NOT NULL,
  `Registertion_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offering_job`
--

INSERT INTO `offering_job` (`First_Name`, `Last_Name`, `Phone_Number`, `Email`, `CV_Files`, `Specialization_Name`, `Specialization_Level`, `Job_Title`, `Registertion_date`) VALUES
('waleed', 'alshailf', 778221289, 'wa@gmail.com', '8 - 14 chapter summary.pdf', 'BIT', 'Doctora', ' PHP', '2024-05-13 21:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `Company_Name` varchar(40) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `Project_Name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Location` varchar(25) NOT NULL,
  `Date_End` date NOT NULL,
  `File_Project` varchar(30) NOT NULL,
  `date_upload` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`Company_Name`, `icon`, `Project_Name`, `Location`, `Date_End`, `File_Project`, `date_upload`) VALUES
('Amrain ', 'amrain.jpg', 'provide 200 case to build school ', 'amrain', '2024-05-31', 'model A&B network.pdf', '2024-04-17'),
('Qatar ', 'Qatar.jpg', 'build the clinic in the taiz', 'Taiz', '2024-12-03', 'Model ( A ) .pdf', '2024-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `project_manager`
--

DROP TABLE IF EXISTS `project_manager`;
CREATE TABLE IF NOT EXISTS `project_manager` (
  `Manager_Name` varchar(30) NOT NULL,
  `ID_manager` smallint NOT NULL AUTO_INCREMENT,
  `Icon` varchar(30) DEFAULT NULL,
  `Major` varchar(20) NOT NULL,
  `Previous_Jobs` int NOT NULL,
  `Manager_Location` varchar(25) NOT NULL,
  `Phone_Number` int NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Registertion_date` datetime DEFAULT NULL,
  PRIMARY KEY (`ID_manager`)
) ENGINE=MyISAM AUTO_INCREMENT=32768 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_manager`
--

INSERT INTO `project_manager` (`Manager_Name`, `ID_manager`, `Icon`, `Major`, `Previous_Jobs`, `Manager_Location`, `Phone_Number`, `Email`, `Registertion_date`) VALUES
('Waleed Alshalif', 932, 'waleed.jpg', 'BIT', 1201, 'wa@gmail.com', 778221289, 'waleed@gmail.com', '2024-04-17 21:23:49'),
('Ruba Noman', 615, 'ruba.jpg', 'EI', 1210, 'Ibb', 778221289, 'ruba@gmail.com', '2024-04-17 21:25:11'),
('Eyed Almogehad', 140, '2.jpg', 'BIT', 120, 'Ibb', 778221289, 'eyed@gmail.com', '2024-05-13 18:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Username` varchar(30) NOT NULL,
  `Pass` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Phone_Number` int NOT NULL,
  `Registertion_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Pass`, `Email`, `Phone_Number`, `Registertion_date`) VALUES
('waleed', '$2y$10$QAo9t7wedWNsynM6YLH1g.XYEFGfOR5yeyLKxdbOgwtfMVj/ZYSla', 'wa@gmail.com', 778221289, '2024-04-16 00:47:06'),
('Eyed ', '$2y$10$nzEVYudE/YxxSzq8PIjnReN5MqJfkgt9SnSYeV9jAPqmHF1Hdw9GC', 'eyed@gmail.com', 778221289, '2024-05-09 18:51:00'),
('wwww', '$2y$10$/DhTBPP/bVpemGc.2pRM4u4vgknPENvLhqrCrBAp8IikbpznJRMpy', 'wa@gmail.com', 778221289, '2024-05-09 19:26:14'),
('waleed alshlaif', '$2y$10$3lJYHNMxOa1/NGc18zoQLOW3eoiOCRh8avyLp6lDT0mMQAC90ogta', 'waleed@gmail.com', 778221289, '2024-05-09 19:41:10'),
('eyed khaild', '$2y$10$VXV0evikmON.SKOcrZXYhuh.f7rfFlw9Mp1WLx1.vIYQsr6uZOzAm', 'eyed@gmail.com', 778221289, '2024-05-09 19:41:36'),
('Osaka', '$2y$10$T6pvQB0RJ2cbbXlrr6M7h.dWeRWUnJLQWbwWv0vJkNO6QtcMvOiKe', 'osa@gmail.com', 778221289, '2024-05-09 19:41:59'),
('eyed', '$2y$10$Tv4kQudq3wgz6/QNXYp6Nu1PLRXR1nYIeQBbQWnWM1k4gI8waIZSS', 'eyed@gmail.com', 778221289, '2024-05-13 18:08:35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
