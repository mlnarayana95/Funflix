-- MySQL dump 10.13  Distrib 5.7.23, for Win64 (x86_64)
--
-- Host: localhost    Database: funflix_video_db
-- ------------------------------------------------------
-- Server version	5.7.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre`
--

LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'Drama','2019-07-24 03:55:05',NULL),(2,'Horror','2019-07-24 03:55:05',NULL),(3,'Sci-fi','2019-07-24 03:55:05',NULL),(4,'Biopic','2019-07-24 03:55:05',NULL),(5,'Thriller','2019-07-24 03:55:05',NULL),(6,'Mystery','2019-07-24 03:55:05',NULL),(7,'Comedy','2019-07-24 03:55:05',NULL);
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genre_video`
--

DROP TABLE IF EXISTS `genre_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genre_video` (
  `genre_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genre_video`
--

LOCK TABLES `genre_video` WRITE;
/*!40000 ALTER TABLE `genre_video` DISABLE KEYS */;
INSERT INTO `genre_video` VALUES (1,1),(1,2),(1,3),(7,4),(2,5),(1,6),(6,7),(3,8),(5,9),(4,10),(4,11),(2,12),(1,13),(3,14),(3,15),(5,16),(7,17),(5,18),(2,19),(3,20);
/*!40000 ALTER TABLE `genre_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordered_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'Credit Card',1,3,'mlnarayana95@gmail.com','2019-07-24 03:57:46'),(2,'Debit Card',2,20,'ravipatel@gmail.com','2019-07-24 03:57:46'),(3,'Credit Card',3,2,'deepbhalotia@gmail.com','2019-07-24 03:57:46'),(4,'Debit Card',4,10,'m_perry@gmail.com','2019-07-24 03:57:46'),(5,'Debit Card',5,1,'sid_bindra@gmail.com','2019-07-24 03:57:46');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
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
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (12,'Narain','Madabhushi','#406, 595, River Avenue','Winnipeg','R3L0E6','Manitoba','Canada','2044303747','mlnarayana95@gmail.com','$2y$10$C7HdzETmAWr5rziDNGyvoeCRHV1NgApnttwoDIQN2tpAGtBDEnlDq','2019-08-22 00:19:35',NULL),(13,'Narayana','Mada','406, 595, River Avenue','Winnipeg','R3L0E6','Manitoba','Canada','2044303747','narayana@gmail.com','$2y$10$1DKbHEUDWDDN25H1ju9IOurv1mmmn36UVQjIH7/FQecT8Y4ieFuP2','2019-08-22 17:05:58',NULL),(14,'Narain','Madabhushi','406, 595, River Avenue','Winnipeg','R3L0E6','Manitoba','Canada','2044303747','mlnarna95@gmail.com','$2y$10$mill2uk0RLrqCA1950dvpea5qwcx15H2Wl3sbWVmR.4MFof7L7.aq','2019-08-22 19:53:45',NULL),(15,'Narain','Narain','406, 595, River Avenue','Winnipeg','R3L0E6','Manitoba','Canada','2044303747','rayana95@gmail.com','$2y$10$rQPWeV2Eb4R0ZLqphUBaAekGGC.Itae7cv.6VaEUBpl81KYBGiln6','2019-08-22 21:13:54',NULL),(16,'Lloyd','Guadez','624 Broadway','Winnipeg','R3G2F9','Manitoba','Canada','2048989055','lguadez@gmail.com','$2y$10$iReRtp2OdkMdXVyEN.75HuZO9tG4WW5Ucu3y9Lyd6XNLb7nAi.i0K','2019-08-23 00:30:01',NULL),(17,'Narain','Madabhushi','#406, 595, River Avenue','Winnipeg','R3L0E6','Manitoba','Canada','2044303747','mlnarayana95.a@gmail.com','$2y$10$ZdLeIpeQnn8hu4UlECpLeutNjKYXIB0In7Sf8GYqEEOJ8K3T3Zr7e','2019-08-23 00:44:40',NULL),(18,'Narain','Madabhushi','#406, 595, River Avenue','Winnipeg','R3L0E6','Manitoba','Canada','2044303747','narain@gmail.com','$2y$10$nT9QvP0fvX4Bdoj8v5mxpOuPdC1q7ZaOsNtreCP9XgTbV30bFNvYy','2019-09-04 19:13:02',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vid_collection`
--

DROP TABLE IF EXISTS `vid_collection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vid_collection` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_type` enum('TVSHOW','MOVIES') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `synopsis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_of_season` int(11) DEFAULT NULL,
  `release_date` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vid_collection`
--

LOCK TABLES `vid_collection` WRITE;
/*!40000 ALTER TABLE `vid_collection` DISABLE KEYS */;
INSERT INTO `vid_collection` VALUES (1,'FRIENDS','TVSHOW','english',9.0,'Three young men and three young women -- of the BFF kind -- live in the same apartment complex and face life and love in New York. ',10,'1994-09-24 00:00:00','2019-07-24 03:00:33',NULL),(2,'WHEN THEY SEE US','TVSHOW','english',9.1,'About the Central Park Five Incident',1,'2019-05-31 00:00:00','2019-07-24 03:52:50',NULL),(3,'UNFORGOTTEN','TVSHOW','english',8.2,'The detectives are on a mission to uncover the mystery behind an unsolved murder that occurred 39 years ago',3,'2015-10-01 00:00:00','2019-07-24 03:52:50',NULL),(4,'Will & Grace','TVSHOW','english',7.3,'Emmy Award Winning Movie',10,'1998-09-21 00:00:00','2019-07-24 03:52:50',NULL),(5,'Silicon Valley','TVSHOW','ENGLISH',8.5,'Silicon Valley Culture Comedy',5,'2014-04-06 00:00:00','2019-07-24 03:52:50',NULL),(6,'The Daily Show','TVSHOW','ENGLISH',8.2,'Trevor Noah takes on the very tall task of replacing longtime host Jon Stewart on Comedy Central',24,'1995-10-08 00:00:00','2019-07-24 03:52:50',NULL),(7,'How to Get Away with Murder','TVSHOW','ENGLISH',8.2,'Law & order in Philedelphia',5,'2014-09-25 00:00:00','2019-07-24 03:52:50',NULL),(8,'Suits','TVSHOW','ENGLISH',8.5,'Big-time Manhattan corporate lawyer Harvey Specter and his team',8,'2011-06-23 00:00:00','2019-07-24 03:52:50',NULL),(9,'Stranger Things','TVSHOW','ENGLISH',8.9,'This thrilling Netflix original drama',3,'2016-07-15 00:00:00','2019-07-24 03:52:50',NULL),(10,'Narcos','TVSHOW','ENGLISH',8.8,' the rise of the cocaine trade in Colombia',3,'2015-08-28 00:00:00','2019-07-24 03:52:50',NULL),(11,'Avengers Endgame','MOVIES','ENGLISH',8.7,'Avengers Endgame',0,'2019-04-26 00:00:00','2019-07-24 03:52:50',NULL),(12,'Spider-Man: Far From Home','MOVIES','ENGLISH',7.9,'Following the events of Avengers, Spider-Man must step up to take on new threats in a world that has changed forever',0,'2019-07-02 00:00:00','2019-07-24 03:52:50',NULL),(13,'Inception','MOVIES','ENGLISH',8.8,'Award Winning Sci-fi thriller',0,'2010-07-16 00:00:00','2019-07-24 03:52:50',NULL),(14,'Interstellar','MOVIES','ENGLISH',8.6,'a brilliant NASA physicist, is working on plans to save mankind',0,'2014-11-07 00:00:00','2019-07-24 03:52:50',NULL),(15,'Man of Steel','MOVIES','ENGLISH',8.5,'Jor-El (Russell Crowe) and his wife seek to preserve their race',0,'2013-06-14 00:00:00','2019-07-24 03:52:50',NULL),(16,'The Dark Knight','MOVIES','english',9.0,'Batman controls crime in Gotham City',NULL,'2008-07-18 00:00:00','2019-07-24 03:52:50',NULL),(17,'The Dark Knight Rises','MOVIES','ENGLISH',8.4,'It has been eight years since Batman (Christian Bale), in collusion with Commissioner Gordon (Gary Oldman), vanished into the night.',0,'2014-09-25 00:00:00','2019-07-24 03:52:50',NULL),(18,'Wolf of Wall Street','MOVIES','ENGLISH',8.2,'Story of Jordan Belfort',0,'2010-06-23 00:00:00','2019-07-24 03:52:50',NULL),(19,'The Big Short','MOVIES','ENGLISH',7.8,'Wall Street guru Michael Burry realizes that a number of subprime home loans are in danger of defaulting. ',0,'2015-12-23 00:00:00','2019-07-24 03:52:50',NULL),(20,'V for vendetta','MOVIES','ENGLISH',8.2,'Following world war, London is a police state occupied by a fascist government, and a vigilante known only as V (Hugo Weaving) uses terrorist tactics',0,'2012-08-18 00:00:00','2019-07-24 03:52:50',NULL),(21,'Silicon Valley','TVSHOW','English',9.0,'Test',3,'2012-01-01 00:00:00','2019-08-26 15:57:29',NULL);
/*!40000 ALTER TABLE `vid_collection` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-04 21:42:15
