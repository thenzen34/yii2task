-- MySQL dump 10.13  Distrib 5.7.17, for Linux (i686)
--
-- Host: localhost    Database: yii2basic
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Dumping data for table `dict_dish`
--

LOCK TABLES `dict_dish` WRITE;
/*!40000 ALTER TABLE `dict_dish` DISABLE KEYS */;
INSERT INTO `dict_dish` VALUES (16,'асорти'),(1,'борщ'),(7,'Варенная картошка'),(6,'Жаренная картошка'),(3,'калмыцкий чай'),(15,'Мясо по французски'),(12,'ничего'),(14,'Отварные яички'),(2,'салат (видим)'),(4,'салат (скрыт)'),(11,'Салат охотничий'),(13,'Яишница');
/*!40000 ALTER TABLE `dict_dish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dict_ingredient`
--

LOCK TABLES `dict_ingredient` WRITE;
/*!40000 ALTER TABLE `dict_ingredient` DISABLE KEYS */;
INSERT INTO `dict_ingredient` VALUES (1,'картошка',1),(2,'колбаса',1),(3,'яйца куриные',1),(4,'куриное филе',1),(5,'яйца перепелиные',1),(6,'огурец свежий',1),(7,'огурец соленный (скрыт)',0),(8,'молоко',1),(9,'чай черный',1),(10,'огурец соленный (видим)',1);
/*!40000 ALTER TABLE `dict_ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1490082864),('m170321_072854_create_dict_ingredient_table',1490082891),('m170321_073240_create_dict_dish_table',1490082891),('m170321_075519_create_rel_dish_ingredient_table',1490082941);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `rel_dish_ingredient`
--

LOCK TABLES `rel_dish_ingredient` WRITE;
/*!40000 ALTER TABLE `rel_dish_ingredient` DISABLE KEYS */;
INSERT INTO `rel_dish_ingredient` VALUES (1,1,1),(4,1,4),(5,1,3),(8,2,1),(9,2,4),(10,2,10),(11,2,3),(19,4,1),(20,4,7),(21,3,8),(22,3,9),(23,4,4),(24,4,3),(25,6,1),(33,15,1),(34,11,1),(35,11,3),(36,15,4),(37,13,3),(38,14,3),(39,16,2),(40,16,6),(41,16,3),(42,16,5),(43,7,1),(44,1,10),(45,2,5);
/*!40000 ALTER TABLE `rel_dish_ingredient` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-22 11:27:18
