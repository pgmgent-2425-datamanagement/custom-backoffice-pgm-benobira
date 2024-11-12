-- MySQL dump 10.13  Distrib 8.0.38, for macos14 (arm64)
--
-- Host: 127.0.0.1    Database: db
-- ------------------------------------------------------
-- Server version	5.5.5-10.11.8-MariaDB-ubu2204-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Grilled Steak','A juicy grilled steak served with a side of roasted vegetables',19.99,'grilled_steak.jpg'),(2,'Vegetarian Pasta','A delicious pasta dish with fresh vegetables and a light tomato sauce',12.50,'vegetarian_pasta.jpg'),(3,'Seafood Platter','A selection of fresh seafood including shrimp, mussels, and salmon',24.00,'seafood_platter.jpg'),(4,'Chicken Caesar Salad','Grilled chicken breast on a bed of romaine lettuce with Caesar dressing',10.99,'chicken_caesar_salad.jpg'),(5,'Veggie Burger','A plant-based burger served with a side of fries',9.50,'veggie_burger.jpg'),(6,'Salmon Fillet','Grilled salmon fillet served with lemon butter sauce and steamed vegetables',18.75,'salmon_fillet.jpg'),(7,'Beef Tacos','Soft tacos filled with seasoned beef, lettuce, cheese, and salsa',11.50,'beef_tacos.jpg'),(8,'Vegan Buddha Bowl','A healthy mix of quinoa, chickpeas, avocado, and fresh greens',13.25,'vegan_buddha_bowl.jpg'),(9,'Lobster Bisque','A rich and creamy lobster soup with a hint of sherry',15.00,'lobster_bisque.jpg'),(10,'Stuffed Bell Peppers','Bell peppers stuffed with a mix of rice, beans, and vegetables',10.00,'stuffed_bell_peppers.jpg'),(13,'Teriyaki Noodles','Asian noodles topped with a delicious and simple homemade teriyaki sauce',13.00,'671eee8b45aa3_teriyaki_noodles.jpg'),(17,'Pasta Carbonara','Italian pasta dish combining silky cheese sauce with crisp pancetta and black pepper',12.00,'671e73d70dbbc_pasta_carbonara.jpg');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_menu`
--

DROP TABLE IF EXISTS `reservation_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_menu`
--

LOCK TABLES `reservation_menu` WRITE;
/*!40000 ALTER TABLE `reservation_menu` DISABLE KEYS */;
INSERT INTO `reservation_menu` VALUES (4,3,5,3),(5,3,6,2),(6,4,1,1),(7,4,2,2),(8,5,3,2),(9,6,5,3),(10,6,6,3),(11,7,7,2),(12,7,8,2),(13,8,1,4),(14,8,2,4),(15,9,3,2),(16,9,9,1),(17,10,10,4),(18,11,1,2),(19,12,2,5),(20,13,3,3),(21,14,4,2),(22,15,5,5),(23,15,6,1),(24,16,7,3),(25,16,8,1),(26,17,9,3),(27,18,10,2),(28,18,6,3),(29,19,7,2),(30,20,8,3),(31,21,1,6),(32,22,2,7),(33,23,3,4),(34,24,4,2),(46,1,1,2),(47,1,2,2),(84,27,1,4),(85,27,2,5),(86,28,10,2),(87,30,6,2),(88,30,8,2),(90,25,1,3),(91,25,5,2);
/*!40000 ALTER TABLE `reservation_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation_table`
--

DROP TABLE IF EXISTS `reservation_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservation_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation_table`
--

LOCK TABLES `reservation_table` WRITE;
/*!40000 ALTER TABLE `reservation_table` DISABLE KEYS */;
INSERT INTO `reservation_table` VALUES (3,3,3),(4,4,1),(5,5,6),(6,6,3),(7,7,4),(8,8,5),(9,9,9),(10,10,4),(11,11,2),(12,12,3),(13,13,7),(14,14,6),(15,15,3),(16,16,9),(17,17,4),(18,18,3),(19,19,2),(20,20,4),(21,21,3),(22,22,5),(23,23,9),(24,24,2),(32,1,1),(49,27,8),(50,28,2),(51,30,3),(53,25,3);
/*!40000 ALTER TABLE `reservation_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reservation_date` date DEFAULT NULL,
  `reservation_time` time NOT NULL,
  `guests` int(11) NOT NULL,
  `status` enum('pending','accepted','cancelled') NOT NULL,
  `comment` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,2,'2024-11-10','18:30:00',4,'pending','A couple of two people from France.'),(3,4,'2024-11-12','20:00:00',5,'cancelled',NULL),(4,1,'2024-11-13','18:00:00',3,'pending',NULL),(5,2,'2024-11-14','21:00:00',2,'accepted',NULL),(6,3,'2024-11-15','19:30:00',6,'pending',NULL),(7,4,'2024-11-16','18:45:00',4,'accepted',NULL),(8,1,'2024-11-17','20:15:00',8,'cancelled',NULL),(9,2,'2024-11-18','18:30:00',3,'accepted',NULL),(10,3,'2024-11-19','19:00:00',4,'pending',NULL),(11,4,'2024-11-20','20:00:00',2,'accepted',NULL),(12,1,'2024-11-21','18:00:00',5,'cancelled',NULL),(13,2,'2024-11-22','19:15:00',3,'accepted',NULL),(14,3,'2024-11-23','18:45:00',2,'pending',NULL),(15,4,'2024-11-24','21:00:00',6,'accepted',NULL),(16,1,'2024-11-25','18:00:00',4,'pending',NULL),(17,2,'2024-11-26','19:30:00',3,'accepted',NULL),(18,3,'2024-11-27','20:30:00',5,'cancelled',NULL),(19,4,'2024-11-28','18:15:00',2,'accepted',NULL),(20,1,'2024-11-29','19:45:00',3,'pending',NULL),(21,2,'2024-11-30','18:30:00',6,'accepted',NULL),(22,3,'2024-12-01','20:00:00',7,'cancelled',NULL),(23,4,'2024-12-02','19:00:00',4,'accepted',NULL),(24,1,'2024-12-03','20:15:00',2,'pending',NULL),(25,2,'2024-12-04','18:45:00',5,'accepted',''),(27,1,'2024-11-10','19:00:00',9,'accepted','2 Kids menu for the Grilled Steak'),(28,3,'2024-11-10','21:00:00',2,'pending',''),(30,2,'2024-11-10','21:00:00',6,'accepted','');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_number` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
INSERT INTO `tables` VALUES (1,1,4),(2,2,2),(3,3,6),(4,4,4),(5,5,8),(6,6,2),(7,7,4),(8,8,10),(9,9,4),(10,10,6);
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@resto.com','123'),(2,'Benoit','benoit@resto.com','123'),(3,'Alice','alice@resto.com','123'),(4,'John','john@resto.com','123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-12 19:43:07
