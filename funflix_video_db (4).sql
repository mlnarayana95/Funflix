-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 13, 2019 at 08:13 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funflix_video_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

DROP TABLE IF EXISTS `archive`;
CREATE TABLE IF NOT EXISTS `archive` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` enum('TVSHOW','MOVIES') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `synopsis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` int(4) DEFAULT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_of_season` int(11) DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`video_id`, `title`, `video_type`, `language`, `rating`, `synopsis`, `plot`, `image`, `length`, `director`, `num_of_season`, `release_date`, `created_date`, `updated_date`) VALUES
(1, 'FRIENDS', 'TVSHOW', 'english', '9.0', 'Follows the personal and professional lives of six twenty to thirty-something-year-old friends living in Manhattan.', NULL, NULL, NULL, NULL, 10, '1994-09-24 00:00:00', '2019-09-12 12:41:44', NULL),
(2, 'WHEN THEY SEE US', 'TVSHOW', 'english', '9.1', 'About the Central Park Five Incident', NULL, NULL, NULL, NULL, 1, '2019-05-31 00:00:00', '2019-09-12 12:42:29', NULL),
(3, 'UNFORGOTTEN', 'TVSHOW', 'english', '8.2', 'The detectives are on a mission to uncover the mystery behind an unsolved murder that occurred 39 years ago', 'This crime-drama stars Nicola Walker and Sanjeev Bhaskar as the lead characters DCI Cassie Stuart and DS Sunil \"Sunny\" Khan. The detectives are on a mission to uncover the mystery behind an unsolved murder that occurred 39 years ago', 'unforgotten', 45, 'Andy Wilson', 3, '2015-10-01 00:00:00', '2019-09-12 22:12:35', NULL),
(4, 'WHEN THEY SEE US', 'TVSHOW', 'english', '9.0', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'whentheyseeus', 296, 'Ava DuVernay', 1, '2019-05-31 00:00:00', '2019-09-13 01:14:42', NULL),
(5, 'WHEN THEY SEE US', 'TVSHOW', 'english', '9.0', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'whentheyseeus', 296, 'Ava DuVernay', 1, '2019-05-31 00:00:00', '2019-09-13 01:15:09', NULL),
(6, 'WHEN THEY SEE US', 'TVSHOW', 'english', '9.0', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'whentheyseeus', 296, 'Ava DuVernay', 1, '2019-05-31 00:00:00', '2019-09-13 01:15:45', NULL),
(7, 'WHEN THEY SEE US', 'TVSHOW', 'english', '9.0', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'whentheyseeus', 296, 'Ava DuVernay', 1, '2019-05-31 00:00:00', '2019-09-13 01:17:49', NULL),
(8, 'WHEN THEY SEE US', 'TVSHOW', 'english', '9.0', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'whentheyseeus', 296, 'Ava DuVernay', 1, '2019-05-31 00:00:00', '2019-09-13 01:19:41', NULL),
(9, 'WHEN THEY SEE US', 'TVSHOW', 'english', '9.0', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'whentheyseeus', 296, 'Ava DuVernay', 1, '2019-05-31 00:00:00', '2019-09-13 01:21:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`, `created_date`, `updated_date`) VALUES
(1, 'Drama', '2019-07-24 03:55:05', NULL),
(2, 'Horror', '2019-07-24 03:55:05', NULL),
(3, 'Sci-fi', '2019-07-24 03:55:05', NULL),
(4, 'Biopic', '2019-07-24 03:55:05', NULL),
(5, 'Thriller', '2019-07-24 03:55:05', NULL),
(6, 'Mystery', '2019-07-24 03:55:05', NULL),
(7, 'Comedy', '2019-07-24 03:55:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genre_video`
--

DROP TABLE IF EXISTS `genre_video`;
CREATE TABLE IF NOT EXISTS `genre_video` (
  `genre_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre_video`
--

INSERT INTO `genre_video` (`genre_id`, `video_id`) VALUES
(7, 1),
(7, 4),
(7, 5),
(1, 6),
(6, 7),
(3, 8),
(5, 9),
(4, 10),
(4, 11),
(2, 12),
(1, 13),
(3, 14),
(3, 15),
(5, 16),
(7, 17),
(5, 18),
(2, 19),
(3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=324 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `event`) VALUES
(1, '2019-09-13 05:42:33 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(2, '2019-09-13 05:42:57 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(3, '2019-09-13 05:43:30 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(4, '2019-09-13 05:45:19 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(5, '2019-09-13 05:46:28 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(6, '2019-09-13 05:46:55 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(7, '2019-09-13 05:47:21 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(8, '2019-09-13 05:48:20 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(9, '2019-09-13 05:48:33 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(10, '2019-09-13 05:49:45 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(11, '2019-09-13 05:50:02 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(12, '2019-09-13 05:50:27 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(13, '2019-09-13 05:51:26 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(14, '2019-09-13 05:51:51 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(15, '2019-09-13 05:52:51 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(16, '2019-09-13 05:53:08 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(17, '2019-09-13 05:54:00 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(18, '2019-09-13 05:54:23 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(19, '2019-09-13 05:54:44 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(20, '2019-09-13 05:54:46 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(21, '2019-09-13 05:54:49 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(22, '2019-09-13 05:54:51 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(23, '2019-09-13 05:54:53 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(24, '2019-09-13 05:56:10 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(25, '2019-09-13 05:56:12 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(26, '2019-09-13 05:56:13 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(27, '2019-09-13 05:56:14 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(28, '2019-09-13 05:56:46 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(29, '2019-09-13 05:57:38 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(30, '2019-09-13 05:57:39 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(31, '2019-09-13 05:57:41 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(32, '2019-09-13 05:57:43 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(33, '2019-09-13 05:57:44 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(34, '2019-09-13 05:57:46 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(35, '2019-09-13 05:57:48 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(36, '2019-09-13 05:57:49 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(37, '2019-09-13 05:59:15 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(38, '2019-09-13 05:59:16 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(39, '2019-09-13 05:59:17 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(40, '2019-09-13 05:59:27 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(41, '2019-09-13 05:59:28 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(42, '2019-09-13 05:59:29 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(43, '2019-09-13 05:59:30 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(44, '2019-09-13 05:59:32 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(45, '2019-09-13 05:59:33 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(46, '2019-09-13 05:59:49 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(47, '2019-09-13 06:00:01 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(48, '2019-09-13 06:02:08 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(49, '2019-09-13 06:03:13 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(50, '2019-09-13 06:07:47 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(51, '2019-09-13 06:09:19 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(52, '2019-09-13 06:11:14 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(53, '2019-09-13 06:11:28 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(54, '2019-09-13 06:11:58 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(55, '2019-09-13 06:12:00 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(56, '2019-09-13 06:12:37 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(57, '2019-09-13 06:13:14 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(58, '2019-09-13 06:13:58 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(59, '2019-09-13 06:13:58 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(60, '2019-09-13 06:14:04 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(61, '2019-09-13 06:14:08 | GET | /admin/vidcollection.php?delete=21 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(62, '2019-09-13 06:14:36 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(63, '2019-09-13 06:14:39 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(64, '2019-09-13 06:14:42 | GET | /admin/vidcollection.php?delete=25 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(65, '2019-09-13 06:15:09 | GET | /admin/vidcollection.php?delete=24 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(66, '2019-09-13 06:15:14 | GET | /admin/vidcollection.php?delete=24 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(67, '2019-09-13 06:15:19 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(68, '2019-09-13 06:15:43 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(69, '2019-09-13 06:15:45 | GET | /admin/vidcollection.php?delete=23 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(70, '2019-09-13 06:16:15 | GET | /admin/vidcollection.php?delete=23 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(71, '2019-09-13 06:16:18 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(72, '2019-09-13 06:16:40 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(73, '2019-09-13 06:17:17 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(74, '2019-09-13 06:17:17 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(75, '2019-09-13 06:17:43 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(76, '2019-09-13 06:17:49 | GET | /admin/vidcollection.php?delete=26 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(77, '2019-09-13 06:18:20 | GET | /admin/vidcollection.php?delete=26 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(78, '2019-09-13 06:18:22 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(79, '2019-09-13 06:18:26 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(80, '2019-09-13 06:18:51 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(81, '2019-09-13 06:18:51 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(82, '2019-09-13 06:19:14 | GET | /admin/vidcollection.php?delete=27 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(83, '2019-09-13 06:19:41 | GET | /admin/vidcollection.php?delete=27 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(84, '2019-09-13 06:19:52 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(85, '2019-09-13 06:20:31 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(86, '2019-09-13 06:21:00 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(87, '2019-09-13 06:21:00 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(88, '2019-09-13 06:21:05 | GET | /admin/vidcollection.php?delete=28 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(89, '2019-09-13 06:22:08 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(90, '2019-09-13 06:22:12 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(91, '2019-09-13 06:22:35 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(92, '2019-09-13 06:22:35 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(93, '2019-09-13 06:22:42 | GET | /login.php?logout=1 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(94, '2019-09-13 06:22:42 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(95, '2019-09-13 06:22:48 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(96, '2019-09-13 06:22:48 | GET | /my_profile.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(97, '2019-09-13 06:22:51 | GET | /home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(98, '2019-09-13 06:22:56 | GET | /login.php?logout=1 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(99, '2019-09-13 06:22:56 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(100, '2019-09-13 06:23:01 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(101, '2019-09-13 06:23:10 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(102, '2019-09-13 06:23:13 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(103, '2019-09-13 06:23:15 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(104, '2019-09-13 06:23:18 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(105, '2019-09-13 06:23:20 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(106, '2019-09-13 06:23:22 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(107, '2019-09-13 06:23:23 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(108, '2019-09-13 06:24:51 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(109, '2019-09-13 06:32:42 | GET | /login.php?logout=1 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(110, '2019-09-13 06:32:42 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(111, '2019-09-13 06:32:52 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(112, '2019-09-13 06:32:52 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(113, '2019-09-13 06:33:00 | GET | /login.php?logout=1 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(114, '2019-09-13 06:33:00 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(115, '2019-09-13 06:35:34 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(116, '2019-09-13 06:35:34 | GET | /my_profile.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(117, '2019-09-13 06:35:43 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(118, '2019-09-13 06:36:05 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(119, '2019-09-13 06:36:59 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(120, '2019-09-13 06:36:59 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(121, '2019-09-13 06:37:06 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(122, '2019-09-13 06:37:10 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(123, '2019-09-13 06:37:15 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(124, '2019-09-13 06:37:16 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(125, '2019-09-13 06:37:16 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(126, '2019-09-13 06:38:51 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(127, '2019-09-13 06:39:09 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(128, '2019-09-13 06:41:22 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(129, '2019-09-13 06:41:28 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(130, '2019-09-13 06:41:28 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(131, '2019-09-13 06:42:54 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(132, '2019-09-13 06:42:59 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(133, '2019-09-13 06:43:05 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(134, '2019-09-13 06:43:31 | GET | / | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(135, '2019-09-13 06:43:33 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(136, '2019-09-13 06:43:38 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(137, '2019-09-13 06:43:38 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(138, '2019-09-13 06:44:03 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(139, '2019-09-13 06:44:08 | GET | /login.php?logout=1 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(140, '2019-09-13 06:44:08 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(141, '2019-09-13 06:44:14 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(142, '2019-09-13 06:44:14 | GET | /my_profile.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(143, '2019-09-13 06:44:23 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(144, '2019-09-13 06:44:23 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(145, '2019-09-13 06:48:11 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(146, '2019-09-13 06:48:18 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(147, '2019-09-13 06:48:18 | GET | /my_profile.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(148, '2019-09-13 06:48:27 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(149, '2019-09-13 06:48:27 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(150, '2019-09-13 06:49:40 | GET | /home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(151, '2019-09-13 06:49:49 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(152, '2019-09-13 06:49:50 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(153, '2019-09-13 06:50:01 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(154, '2019-09-13 06:50:01 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(155, '2019-09-13 06:50:42 | GET | /admin/edit.php?video_id=3 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(156, '2019-09-13 06:50:42 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(157, '2019-09-13 06:50:56 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(158, '2019-09-13 06:51:21 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(159, '2019-09-13 06:51:21 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(160, '2019-09-13 06:51:37 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(161, '2019-09-13 06:51:37 | GET | /my_profile.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(162, '2019-09-13 06:51:42 | GET | /login.php?logout=1 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(163, '2019-09-13 06:51:42 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(164, '2019-09-13 06:51:46 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(165, '2019-09-13 06:51:46 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(166, '2019-09-13 06:51:48 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(167, '2019-09-13 06:51:49 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(168, '2019-09-13 06:52:12 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(169, '2019-09-13 06:52:15 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(170, '2019-09-13 06:52:18 | POST | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(171, '2019-09-13 06:52:21 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(172, '2019-09-13 06:52:23 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(173, '2019-09-13 06:52:25 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(174, '2019-09-13 06:52:27 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(175, '2019-09-13 06:52:28 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(176, '2019-09-13 06:52:29 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(177, '2019-09-13 06:54:30 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(178, '2019-09-13 06:54:32 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(179, '2019-09-13 06:54:33 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(180, '2019-09-13 06:54:34 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(181, '2019-09-13 06:54:37 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(182, '2019-09-13 06:54:38 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(183, '2019-09-13 06:54:39 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(184, '2019-09-13 06:54:40 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(185, '2019-09-13 06:54:44 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(186, '2019-09-13 06:55:04 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(187, '2019-09-13 06:59:21 | GET | /admin/edit.php?video_id=4 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(188, '2019-09-13 06:59:32 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(189, '2019-09-13 06:59:35 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(190, '2019-09-13 06:59:36 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(191, '2019-09-13 06:59:42 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(192, '2019-09-13 06:59:45 | GET | /admin/edit.php?video_id=4 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(193, '2019-09-13 07:04:22 | GET | /admin/edit.php?video_id=4 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(194, '2019-09-13 07:04:24 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(195, '2019-09-13 07:04:25 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(196, '2019-09-13 07:04:28 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(197, '2019-09-13 07:05:38 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(198, '2019-09-13 07:06:39 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(199, '2019-09-13 07:07:01 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(200, '2019-09-13 07:07:34 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(201, '2019-09-13 07:08:15 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(202, '2019-09-13 07:08:44 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(203, '2019-09-13 07:10:09 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(204, '2019-09-13 07:12:32 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(205, '2019-09-13 07:12:45 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(206, '2019-09-13 07:13:35 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(207, '2019-09-13 07:13:39 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(208, '2019-09-13 07:13:41 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(209, '2019-09-13 07:13:43 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(210, '2019-09-13 07:13:57 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(211, '2019-09-13 07:15:13 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(212, '2019-09-13 07:15:26 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(213, '2019-09-13 07:15:43 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(214, '2019-09-13 07:16:25 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(215, '2019-09-13 07:16:27 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(216, '2019-09-13 07:16:30 | GET | /admin/edit.php?video_id=29 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(217, '2019-09-13 07:16:34 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(218, '2019-09-13 07:16:57 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(219, '2019-09-13 07:16:58 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(220, '2019-09-13 07:17:00 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(221, '2019-09-13 07:17:04 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(222, '2019-09-13 07:20:19 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(223, '2019-09-13 07:20:20 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(224, '2019-09-13 07:37:27 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(225, '2019-09-13 07:38:27 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(226, '2019-09-13 07:38:30 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(227, '2019-09-13 07:38:36 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(228, '2019-09-13 07:38:59 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(229, '2019-09-13 07:39:20 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(230, '2019-09-13 07:39:22 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(231, '2019-09-13 07:39:23 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(232, '2019-09-13 07:39:25 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(233, '2019-09-13 07:39:39 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(234, '2019-09-13 07:40:49 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(235, '2019-09-13 07:41:11 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(236, '2019-09-13 07:41:19 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(237, '2019-09-13 07:41:39 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(238, '2019-09-13 07:41:39 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(239, '2019-09-13 07:41:43 | GET | /admin/edit.php?video_id=36 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(240, '2019-09-13 07:41:49 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(241, '2019-09-13 07:41:52 | GET | /admin/edit.php?video_id=36 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(242, '2019-09-13 07:41:58 | POST | /admin/edit.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(243, '2019-09-13 07:42:12 | POST | /admin/edit.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(244, '2019-09-13 07:42:31 | POST | /admin/edit.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(245, '2019-09-13 07:42:31 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(246, '2019-09-13 07:42:36 | GET | /admin/edit.php?video_id=36 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(247, '2019-09-13 07:42:44 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(248, '2019-09-13 07:48:06 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(249, '2019-09-13 07:48:27 | POST | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(250, '2019-09-13 07:48:27 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(251, '2019-09-13 07:48:36 | GET | /admin/edit.php?video_id=37 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(252, '2019-09-13 07:48:38 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(253, '2019-09-13 07:48:41 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(254, '2019-09-13 07:48:47 | GET | /admin/edit.php?video_id=37 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(255, '2019-09-13 07:48:52 | POST | /admin/edit.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(256, '2019-09-13 07:48:52 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(257, '2019-09-13 07:48:59 | GET | /admin/edit.php?video_id=37 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(258, '2019-09-13 07:49:10 | POST | /admin/edit.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(259, '2019-09-13 07:49:11 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(260, '2019-09-13 07:52:30 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(261, '2019-09-13 07:52:42 | GET | /admin/edit.php?video_id=37 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(262, '2019-09-13 07:52:48 | POST | /admin/edit.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(263, '2019-09-13 07:53:23 | POST | /admin/edit.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(264, '2019-09-13 07:53:34 | POST | /admin/edit.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(265, '2019-09-13 07:53:34 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(266, '2019-09-13 07:54:00 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(267, '2019-09-13 07:54:06 | GET | /admin/edit.php?video_id=37 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(268, '2019-09-13 07:54:11 | POST | /admin/edit.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(269, '2019-09-13 07:54:11 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(270, '2019-09-13 07:56:09 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(271, '2019-09-13 07:56:13 | GET | /admin/edit.php?video_id=37 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(272, '2019-09-13 07:56:15 | POST | /admin/edit.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(273, '2019-09-13 07:57:35 | GET | /admin/edit.php?video_id=37 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(274, '2019-09-13 07:57:37 | POST | /admin/edit.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(275, '2019-09-13 07:58:12 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(276, '2019-09-13 07:58:16 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(277, '2019-09-13 07:58:48 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(278, '2019-09-13 07:58:51 | GET | /admin/edit.php?video_id=4 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(279, '2019-09-13 07:58:56 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(280, '2019-09-13 07:59:02 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(281, '2019-09-13 07:59:17 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(282, '2019-09-13 07:59:18 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(283, '2019-09-13 07:59:19 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(284, '2019-09-13 08:04:21 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(285, '2019-09-13 08:04:34 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(286, '2019-09-13 08:04:36 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(287, '2019-09-13 08:04:38 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36');
INSERT INTO `log` (`id`, `event`) VALUES
(288, '2019-09-13 08:04:39 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(289, '2019-09-13 08:04:41 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(290, '2019-09-13 08:04:44 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(291, '2019-09-13 08:04:46 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(292, '2019-09-13 08:04:48 | GET | /admin/edit.php?video_id=4 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(293, '2019-09-13 08:04:51 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(294, '2019-09-13 08:04:51 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(295, '2019-09-13 08:04:53 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(296, '2019-09-13 08:04:54 | GET | /admin/addvideo.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(297, '2019-09-13 08:04:57 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(298, '2019-09-13 08:05:05 | GET | /login.php?logout=1 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(299, '2019-09-13 08:05:05 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(300, '2019-09-13 08:05:42 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(301, '2019-09-13 08:06:00 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(302, '2019-09-13 08:06:08 | GET | /index.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(303, '2019-09-13 08:06:13 | GET | /signup.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(304, '2019-09-13 08:08:23 | GET | /signup.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(305, '2019-09-13 08:08:54 | GET | /signup.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(306, '2019-09-13 08:09:13 | GET | /signup.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(307, '2019-09-13 08:10:15 | GET | /signup.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(308, '2019-09-13 08:10:41 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(309, '2019-09-13 08:11:03 | GET | /signup.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(310, '2019-09-13 08:11:16 | GET | /signup.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(311, '2019-09-13 08:11:35 | GET | /signup.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(312, '2019-09-13 08:12:35 | GET | /signup.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(313, '2019-09-13 08:12:38 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(314, '2019-09-13 08:12:43 | POST | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(315, '2019-09-13 08:12:43 | GET | /admin/home.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(316, '2019-09-13 08:12:46 | GET | /admin/vidcollection.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(317, '2019-09-13 08:12:48 | GET | /admin/users.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(318, '2019-09-13 08:12:50 | GET | /admin/genre.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(319, '2019-09-13 08:12:51 | GET | /admin/viewlist.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(320, '2019-09-13 08:12:53 | GET | /login.php?logout=1 | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(321, '2019-09-13 08:12:53 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(322, '2019-09-13 08:13:14 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36'),
(323, '2019-09-13 08:13:16 | GET | /login.php | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `street`, `city`, `postal_code`, `province`, `country`, `phone`, `email`, `password`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Narain', 'Madabhushi', '#406, 595, River Avenue', 'Winnipeg', 'R3L0E6', 'Manitoba', 'Canada', '2044303747', 'mlnarayana95@gmail.com', '$2y$10$C7HdzETmAWr5rziDNGyvoeCRHV1NgApnttwoDIQN2tpAGtBDEnlDq', '2019-08-22 00:19:35', NULL, 1),
(13, 'Narayana', 'Mada', '406, 595, River Avenue', 'Winnipeg', 'R3L0E6', 'Manitoba', 'Canada', '2044303747', 'narayana@gmail.com', '$2y$10$1DKbHEUDWDDN25H1ju9IOurv1mmmn36UVQjIH7/FQecT8Y4ieFuP2', '2019-08-22 17:05:58', NULL, 0),
(14, 'Narain', 'Madabhushi', '406, 595, River Avenue', 'Winnipeg', 'R3L0E6', 'Manitoba', 'Canada', '2044303747', 'mlnarna95@gmail.com', '$2y$10$mill2uk0RLrqCA1950dvpea5qwcx15H2Wl3sbWVmR.4MFof7L7.aq', '2019-08-22 19:53:45', NULL, 0),
(15, 'Narain', 'Narain', '406, 595, River Avenue', 'Winnipeg', 'R3L0E6', 'Manitoba', 'Canada', '2044303747', 'rayana95@gmail.com', '$2y$10$rQPWeV2Eb4R0ZLqphUBaAekGGC.Itae7cv.6VaEUBpl81KYBGiln6', '2019-08-22 21:13:54', NULL, 0),
(16, 'Lloyd', 'Guadez', '624 Broadway', 'Winnipeg', 'R3G2F9', 'Manitoba', 'Canada', '2048989055', 'lguadez@gmail.com', '$2y$10$iReRtp2OdkMdXVyEN.75HuZO9tG4WW5Ucu3y9Lyd6XNLb7nAi.i0K', '2019-08-23 00:30:01', NULL, 0),
(17, 'Narain', 'Madabhushi', '#406, 595, River Avenue', 'Winnipeg', 'R3L0E6', 'Manitoba', 'Canada', '2044303747', 'mlnarayana95.a@gmail.com', '$2y$10$ZdLeIpeQnn8hu4UlECpLeutNjKYXIB0In7Sf8GYqEEOJ8K3T3Zr7e', '2019-08-23 00:44:40', NULL, 0),
(23, 'Narain', 'Madabhushi', '#406, 595, River Avenue', 'Winnipeg', 'R3L0E6', 'Manitoba', 'Canada', '2044303747', 'nain95@gmail.com', '$2y$10$5z.leamEnPBK2us7P9zonO.dfZetZ66jcY88qL.xGF1jjz/JU18Ee', '2019-09-10 12:59:58', NULL, 0),
(24, 'Narain', 'Madabhushi', '#406, 595, River Avenue', 'Winnipeg', 'R3L0E6', 'Manitoba', 'Canada', '2044303747', 'nainain95@gmail.com', '$2y$10$SuiQbtnaYZAYOk13jBUvCOoYosPCvKeZPAQFuW/fKVYuAVxZLf2Ju', '2019-09-10 13:57:54', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vid_collection`
--

DROP TABLE IF EXISTS `vid_collection`;
CREATE TABLE IF NOT EXISTS `vid_collection` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` enum('TVSHOW','MOVIES') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `synopsis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` int(4) DEFAULT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_of_season` int(11) DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`video_id`),
  UNIQUE KEY `title` (`title`,`language`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vid_collection`
--

INSERT INTO `vid_collection` (`video_id`, `title`, `video_type`, `language`, `rating`, `synopsis`, `plot`, `image`, `length`, `director`, `num_of_season`, `release_date`, `created_date`, `updated_date`) VALUES
(4, 'Will & Grace', 'TVSHOW', 'english', '7.3', 'Emmy Award Winning Movie', 'Will and Grace live together in an apartment in New York City. He\'s a gay lawyer, she\'s a straight interior designer. Their best friends are Jack, a gleeful but proud gay man, and Karen, a charismatic, filthy rich, amoral socialite.', 'willandgrace', 22, 'James Burrows', 10, '1998-09-21 00:00:00', '2019-07-24 03:52:50', NULL),
(5, 'Silicon Valley', 'TVSHOW', 'english', '8.5', 'Silicon Valley Culture Comedy', 'Follows the struggle of Richard Hendricks, a Silicon Valley engineer trying to build his own company called Pied Piper.', 'siliconvalley', 28, 'John Altschuler', 5, '2014-04-06 00:00:00', '2019-07-24 03:52:50', NULL),
(6, 'The Daily Show', 'TVSHOW', 'english', '8.2', 'Trevor Noah takes on the very tall task of replacing longtime host Jon Stewart on Comedy Central', 'Providing comedy/news in the tradition of TV Nation and SNL\'s Weekend Update, Comedy Central\'s Daily Show reports on the foibles and of the real world with a satirical edge.', 'dailyshow', 22, 'Paul Pennolino', 24, '1995-10-08 00:00:00', '2019-07-24 03:52:50', NULL),
(7, 'How to Get Away with Murder', 'TVSHOW', 'ENGLISH', '8.2', 'Law & order in Philedelphia', 'A group of ambitious law students and their brilliant criminal defense professor become involved in a twisted murder plot that promises to change the course of their lives.', 'howtogetawaywithmurder', 43, 'Peter Nowalk\r\n', 5, '2014-09-25 00:00:00', '2019-07-24 03:52:50', NULL),
(8, 'Suits', 'TVSHOW', 'ENGLISH', '8.5', 'Big-time Manhattan corporate lawyer Harvey Specter and his team', 'On the run from a drug deal gone bad, Mike Ross, a brilliant college dropout, finds himself a job working with Harvey Specter, one of New York City\'s best lawyers.', 'suits', 44, ' Aaron Korsh', 8, '2011-06-23 00:00:00', '2019-07-24 03:52:50', NULL),
(9, 'Stranger Things', 'TVSHOW', 'english', '8.9', 'This thrilling Netflix original drama', 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying supernatural forces in order to get him back.', 'strangerthings', 51, 'Matt Duffer', 3, '2016-07-15 00:00:00', '2019-07-24 03:52:50', NULL),
(10, 'Narcos', 'TVSHOW', 'spanish', '8.8', ' the rise of the cocaine trade in Colombia', 'A chronicled look at the criminal exploits of Colombian drug lord Pablo Escobar, as well as the many other drug kingpins who plagued the country through the years.', 'narcos', 49, ' Carlo Bernard', 3, '2015-08-28 00:00:00', '2019-07-24 03:52:50', NULL),
(11, 'Avengers Endgame', 'MOVIES', 'ENGLISH', '8.7', 'Avengers Endgame', 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos\' actions and restore balance to the universe.', 'avengersendgame', 181, ' Anthony Russo', 0, '2019-04-26 00:00:00', '2019-07-24 03:52:50', NULL),
(12, 'Spider-Man: Far From Home', 'MOVIES', 'ENGLISH', '7.9', 'Following the events of Avengers, Spider-Man must step up to take on new threats in a world that has changed forever', 'Following the events of Avengers: Endgame (2019), Spider-Man must step up to take on new threats in a world that has changed forever.', 'spidermanfarfromhome', 129, 'John Watts', 0, '2019-07-02 00:00:00', '2019-07-24 03:52:50', NULL),
(13, 'Inception', 'MOVIES', 'ENGLISH', '8.8', 'Award Winning Sci-fi thriller', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 'inception', 148, 'Christopher Nolan', 0, '2010-07-16 00:00:00', '2019-07-24 03:52:50', NULL),
(14, 'Interstellar', 'MOVIES', 'ENGLISH', '8.6', 'a brilliant NASA physicist, is working on plans to save mankind', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.', 'interstellar', 169, 'Christopher Nolan', 0, '2014-11-07 00:00:00', '2019-07-24 03:52:50', NULL),
(15, 'Man of Steel', 'MOVIES', 'ENGLISH', '8.5', 'Jor-El (Russell Crowe) and his wife seek to preserve their race', 'Clark Kent is an alien who as a child was evacuated from his dying world and came to Earth, living as a normal human. But when survivors of his alien home invade Earth, he must reveal himself to the world.\r\n', 'manofsteel', 143, 'Zack Snyder', 0, '2013-06-14 00:00:00', '2019-07-24 03:52:50', NULL),
(16, 'The Dark Knight', 'MOVIES', 'english', '9.0', 'Batman controls crime in Gotham City', 'When the menace known as The Joker emerges from his mysterious past, he wreaks havoc and chaos on the people of Gotham. The Dark Knight must accept one of the greatest psychological and physical tests of his ability to fight injustice.', 'darkknight', 152, 'Christopher Nolan', NULL, '2008-07-18 00:00:00', '2019-07-24 03:52:50', NULL),
(17, 'The Dark Knight Rises', 'MOVIES', 'ENGLISH', '8.4', 'It has been eight years since Batman (Christian Bale), in collusion with Commissioner Gordon (Gary Oldman), vanished into the night.', 'Eight years after the Joker\'s reign of anarchy, Batman, with the help of the enigmatic Catwoman, is forced from his exile to save Gotham City, now on the edge of total annihilation, from the brutal guerrilla terrorist Bane.', 'darknightrises', 164, 'Christopher Nolan', 0, '2014-09-25 00:00:00', '2019-07-24 03:52:50', NULL),
(18, 'Wolf of Wall Street', 'MOVIES', 'ENGLISH', '8.2', 'Story of Jordan Belfort', 'Based on the true story of Jordan Belfort, from his rise to a wealthy stock-broker living the high life to his fall involving crime, corruption and the federal government.\r\n', 'wolfofwallstreet', 180, 'Martin Scorsese', 0, '2010-06-23 00:00:00', '2019-07-24 03:52:50', NULL),
(19, 'The Big Short', 'MOVIES', 'ENGLISH', '7.8', 'Wall Street guru Michael Burry realizes that a number of subprime home loans are in danger of defaulting. ', 'In 2006-7 a group of investors bet against the US mortgage market. In their research they discover how flawed and corrupt the market is.\r\n', 'thebigshort', 130, 'Adam Mckay', 0, '2015-12-23 00:00:00', '2019-07-24 03:52:50', NULL),
(20, 'V for vendetta', 'MOVIES', 'ENGLISH', '8.2', 'Following world war, London is a police state occupied by a fascist government, and a vigilante known only as V (Hugo Weaving) uses terrorist tactics', 'In a future British tyranny, a shadowy freedom fighter, known only by the alias of \"V\", plots to overthrow it with the help of a young woman.\r\n', 'vforvendetta', 132, 'James McTeigue', 0, '2012-08-18 00:00:00', '2019-07-24 03:52:50', NULL),
(29, 'WHEN THEY SEE US', 'TVSHOW', 'english', '9.0', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'Five teens from Harlem become trapped in a nightmare when they\'re falsely accused of a brutal attack in Central Park. Based on the true story.', 'whentheyseeus', 296, 'Ava DuVernay', 1, '2019-05-31 00:00:00', '2019-09-13 01:22:35', NULL),
(36, 'WHEN THEY SEE US 2', 'TVSHOW', 'english', '9.0', 'asdasdasdasd            ', ' asdsadsadasdsad   ', 'whentheyseeus', 296, 'Ava DuVernay', 1, '2019-05-31 00:00:00', '2019-09-13 02:41:39', NULL),
(37, 'WHEN THEY SEE US', 'TVSHOW', 'arabic', '9.0', '     asdasdadasd', 'asdasdadad  ', 'whentheyseeus', 296, 'Ava DuVernay', 1, '2019-05-31 00:00:00', '2019-09-13 02:48:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `view_list`
--

DROP TABLE IF EXISTS `view_list`;
CREATE TABLE IF NOT EXISTS `view_list` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `list_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `view_list`
--

INSERT INTO `view_list` (`list_id`, `user_id`, `list_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Horror', '2019-09-06 22:32:59', NULL),
(2, 2, 'Action', '2019-09-06 22:32:59', NULL),
(3, 2, 'Horror', '2019-09-06 22:32:59', NULL),
(4, 1, 'Fun', '2019-09-06 22:32:59', NULL),
(5, 3, 'MyList', '2019-09-06 22:32:59', NULL),
(6, 1, 'Test', '2019-09-06 22:43:13', NULL),
(7, 1, 'Sample', '2019-09-06 22:43:22', NULL),
(8, 1, 'Test2', '2019-09-08 23:42:32', NULL),
(16, 1, 'Narayana', '2019-09-09 00:31:46', NULL),
(18, 1, 'Narayana_test', '2019-09-09 00:38:31', NULL),
(21, 1, 'Test3', '2019-09-09 10:37:41', NULL),
(27, 15, 'Narayana', '2019-09-10 11:42:26', NULL),
(28, 15, 'test', '2019-09-10 11:43:10', NULL),
(29, 24, 'Nainain', '2019-09-10 13:59:33', NULL),
(30, 23, 'Narayana', '2019-09-11 01:16:12', NULL),
(32, 23, 'Test', '2019-09-11 01:21:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `view_list_video`
--

DROP TABLE IF EXISTS `view_list_video`;
CREATE TABLE IF NOT EXISTS `view_list_video` (
  `view_list_video_id` int(11) NOT NULL AUTO_INCREMENT,
  `list_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`view_list_video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `view_list_video`
--

INSERT INTO `view_list_video` (`view_list_video_id`, `list_id`, `video_id`) VALUES
(1, 1, 1),
(3, 6, 4),
(4, 7, 7),
(5, 4, 1),
(6, 4, 11),
(7, 4, 12),
(8, 7, 1),
(9, 8, 1),
(10, 16, 1),
(11, 17, 1),
(12, 19, 1),
(13, 18, 1),
(15, 21, 1),
(16, 16, 10),
(19, 27, 1),
(20, 28, 13),
(22, 30, 11),
(23, 32, 11),
(24, 32, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
