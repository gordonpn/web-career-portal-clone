-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: gxc353_1
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Dumping data for table `Applications`
--

LOCK TABLES `Applications` WRITE;
/*!40000 ALTER TABLE `Applications` DISABLE KEYS */;
INSERT INTO `Applications` VALUES (1,'tiffany','2020-08-06 19:54:37',1,NULL),(2,'tiffany','2020-08-06 19:54:37',NULL,NULL),(3,'tiffany','2020-08-06 19:54:37',NULL,NULL),(4,'tiffany','2020-08-06 19:54:37',NULL,NULL),(5,'tiffany','2020-08-06 19:54:37',NULL,NULL),(8,'gordon','2020-08-07 00:07:05',NULL,NULL),(2,'gordon','2020-08-07 00:41:01',NULL,NULL),(2,'simba','2020-08-07 01:36:06',NULL,NULL),(2,'arun','2020-08-07 01:36:14',NULL,NULL),(2,'tyson','2020-08-07 01:40:03',1,1);
/*!40000 ALTER TABLE `Applications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Emails`
--

LOCK TABLES `Emails` WRITE;
/*!40000 ALTER TABLE `Emails` DISABLE KEYS */;
INSERT INTO `Emails` VALUES (1,'bob','Payment made of $100 by bob. Current balance is 0$.','Payment Made','2020-08-06 22:59:42'),(2,'gordon','Your account is now suffering starting 2020-08-06 19:02:27','Balance Negative','2020-08-06 23:02:27'),(3,'gordon','Payment made of $10 by gordon. Current balance is 0$.','Payment Made','2020-08-06 23:02:33'),(4,'gordon','Payment made of $25 by gordon. Current balance is 25$.','Payment Made','2020-08-07 02:34:47'),(5,'leo','Your account is now suffering starting 2020-08-06 22:40:38','Balance Negative','2020-08-07 02:40:38'),(6,'gordon','Payment made of $35 by gordon. Current balance is 70$.','Payment Made','2020-08-07 02:41:27'),(7,'sujan','Your account is now suffering starting 2020-08-06 22:42:54','Balance Negative','2020-08-07 02:42:54'),(8,'jcole','Your account is now suffering starting 2020-08-06 22:42:55','Balance Negative','2020-08-07 02:42:55'),(9,'leo','Payment made of $50 by leo. Current balance is 0$.','Payment Made','2020-08-07 02:45:02'),(10,'gordon','Payment made of $12341234 by gordon. Current balance is 12341304$.','Payment Made','2020-08-07 02:58:56');
/*!40000 ALTER TABLE `Emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Employer_Categories`
--

LOCK TABLES `Employer_Categories` WRITE;
/*!40000 ALTER TABLE `Employer_Categories` DISABLE KEYS */;
INSERT INTO `Employer_Categories` VALUES (1,'leo','STEM'),(2,'bob','Stocks'),(3,'sujan','Design'),(4,'jcole','Music'),(5,'ariana','Music'),(6,'joe','Software'),(13,'chris','');
/*!40000 ALTER TABLE `Employer_Categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Job_Categories`
--

LOCK TABLES `Job_Categories` WRITE;
/*!40000 ALTER TABLE `Job_Categories` DISABLE KEYS */;
INSERT INTO `Job_Categories` VALUES (1,2),(2,1),(3,4),(4,3),(5,2),(6,6),(7,2),(8,2),(9,2),(10,2),(12,8);
/*!40000 ALTER TABLE `Job_Categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Job_Categories_List`
--

LOCK TABLES `Job_Categories_List` WRITE;
/*!40000 ALTER TABLE `Job_Categories_List` DISABLE KEYS */;
INSERT INTO `Job_Categories_List` VALUES (8,'Angular'),(3,'Business'),(5,'Database'),(1,'Finance'),(4,'Information Technology'),(7,'React'),(6,'System Engineering'),(2,'Technology');
/*!40000 ALTER TABLE `Job_Categories_List` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Jobs`
--

LOCK TABLES `Jobs` WRITE;
/*!40000 ALTER TABLE `Jobs` DISABLE KEYS */;
INSERT INTO `Jobs` VALUES (1,'leo',1,'Software Developer',85000,'Must have 15 years of experience in PHP',3,'2020-07-15 04:00:00','active'),(2,'bob',2,'Human Resources',120000,'Must have 20 years experience at any company',1,'2020-08-02 04:00:00','active'),(3,'sujan',3,'IT Help Desk',60000,'Required Skills: Java, mySQL',1,'2020-08-13 04:00:00','expired'),(4,'jcole',4,'Business Analyst',85000,'Requirements: Bachelors in Business',5,'2020-07-15 04:00:00','expired'),(5,'jcole',4,'Software Developer',90000,'Must know C++',3,'2020-07-15 04:00:00','active'),(6,'ariana',5,'Database Administrator',60000,'Looking for McGill students only',1,'2020-07-06 04:00:00','active'),(7,'joe',6,'Python Developer',80000,'Must know snakes',5,'2020-08-01 04:00:00','active'),(8,'joe',7,'Java Developer',60000,'Must like coffee',2,'2020-08-02 04:00:00','active'),(9,'joe',8,'JavaScript Developer',70000,'Must know all frameworks',8,'2020-08-03 04:00:00','active'),(10,'joe',9,'Rust Developer',85000,'We will ask about metals',3,'2020-08-04 04:00:00','active'),(12,'joe',11,'Software Developer',100000,'Work on Angular apps',4,'2020-08-07 01:40:38','active');
/*!40000 ALTER TABLE `Jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Location`
--

LOCK TABLES `Location` WRITE;
/*!40000 ALTER TABLE `Location` DISABLE KEYS */;
INSERT INTO `Location` VALUES (1,'123 Maple','Brossard','J4Y 1G6','Quebec'),(2,'456 Oak','Laval','J8X 1J7','Quebec'),(3,'789 Palm','Toronto','B7S 8H6','Ontario'),(4,'9193 Rainbow Road','Burlington','1001','Vermont'),(5,'52 Bowser Castle','Los Angeles','2002','California'),(6,'3269  Brew Creek Rd','North Pender Island','V0N 2M1','British Columbia'),(7,'1046  Scotts Lane','Cobble Hill','V0R 1L1','British Columbia'),(8,'3719  Toy Avenue','Pickering','L1S 6L6','Ontario'),(9,'4470  rue des Églises Est','Ile Perrot','J0P 1K0','Quebec'),(10,'Downtown','Montreal','H1L 5H3','Quebec'),(11,'Downtown','Montreal','H1L 5H3','Qc'),(12,'Downtown','Montreal','H1L 5H3','Qc');
/*!40000 ALTER TABLE `Location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Payment_Methods`
--

LOCK TABLES `Payment_Methods` WRITE;
/*!40000 ALTER TABLE `Payment_Methods` DISABLE KEYS */;
INSERT INTO `Payment_Methods` VALUES (1,'gordon',1,'debit',1234),(2,'tiffany',1,'credit',1112),(3,'tiffany',0,'credit',8312),(4,'arun',1,'credit',1718),(5,'leo',1,'debit',2324),(6,'bob',1,'credit',2930),(7,'tyson',1,'debit',3536),(8,'khaled',1,'credit',94364),(9,'sujan',1,'debit',5392),(10,'jcole',1,'debit',6789),(11,'ariana',1,'credit',5566),(12,'simba',1,'credit',12341234),(13,'gordon',0,'credit',1111111111),(14,'tyson',0,'credit',123515),(15,'leo',0,'credit',12341234),(16,'leo',0,'credit',555555),(17,'tiffany',0,'credit',123412341234),(18,'leo',0,'credit',12341234);
/*!40000 ALTER TABLE `Payment_Methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Payments`
--

LOCK TABLES `Payments` WRITE;
/*!40000 ALTER TABLE `Payments` DISABLE KEYS */;
INSERT INTO `Payments` VALUES (1,6,100,'2020-08-06 22:59:42'),(2,1,10,'2020-08-06 23:02:33'),(3,1,25,'2020-08-07 02:34:47'),(4,1,35,'2020-08-07 02:41:27'),(5,5,50,'2020-08-07 02:45:02'),(6,1,12341234,'2020-08-07 02:58:56');
/*!40000 ALTER TABLE `Payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Plans`
--

LOCK TABLES `Plans` WRITE;
/*!40000 ALTER TABLE `Plans` DISABLE KEYS */;
INSERT INTO `Plans` VALUES (1,'Employee Basic',0,0,0,'employee'),(2,'Employee Prime',10,5,0,'employee'),(3,'Employee Gold',20,NULL,0,'employee'),(4,'Employer Prime',50,0,5,'employer'),(5,'Employer Gold',100,0,NULL,'employer'),(6,'Admin',0,0,0,'admin');
/*!40000 ALTER TABLE `Plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Profiles`
--

LOCK TABLES `Profiles` WRITE;
/*!40000 ALTER TABLE `Profiles` DISABLE KEYS */;
INSERT INTO `Profiles` VALUES ('alice',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('ariana',5,'SmallMusic','Ariana','Grande','Singer','Female',NULL,NULL,'514-232-2323',NULL),('arun',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('bob',2,'Stonks','Bob','Taylor','Doctor','Male',NULL,NULL,'514-567-8910',NULL),('chris',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('gordon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('jcole',4,'BigMusic','Jcole','Rapper','Singer','Male',NULL,NULL,'514-454-5454',NULL),('joe',9,'Logic Industries','Logic','Joe','Musician','Male',NULL,NULL,'514-937-8367',NULL),('khaled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('leo',1,'Siens','Leo','Silao','Senior Developer','Male',NULL,NULL,'514-555-8888',NULL),('simba',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('sujan',3,'Diff','Sujan','S.','Tech Lead','Male',NULL,NULL,'514-676-6767',NULL),('tiffany',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),('tyson',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `System_Activity`
--

LOCK TABLES `System_Activity` WRITE;
/*!40000 ALTER TABLE `System_Activity` DISABLE KEYS */;
INSERT INTO `System_Activity` VALUES (1,'gordon has been created.','User Created','2020-08-06 19:54:36'),(2,'tiffany has been created.','User Created','2020-08-06 19:54:36'),(3,'simba has been created.','User Created','2020-08-06 19:54:36'),(4,'arun has been created.','User Created','2020-08-06 19:54:36'),(5,'leo has been created.','User Created','2020-08-06 19:54:36'),(6,' has been created.','Employer Category Created','2020-08-06 19:54:36'),(7,'bob has been created.','User Created','2020-08-06 19:54:36'),(8,' has been created.','Employer Category Created','2020-08-06 19:54:36'),(9,'alice has been created.','User Created','2020-08-06 19:54:36'),(10,'khaled has been created.','User Created','2020-08-06 19:54:36'),(11,'sujan has been created.','User Created','2020-08-06 19:54:36'),(12,' has been created.','Employer Category Created','2020-08-06 19:54:36'),(13,'jcole has been created.','User Created','2020-08-06 19:54:36'),(14,' has been created.','Employer Category Created','2020-08-06 19:54:36'),(15,'ariana has been created.','User Created','2020-08-06 19:54:36'),(16,' has been created.','Employer Category Created','2020-08-06 19:54:36'),(17,'joe has been created.','User Created','2020-08-06 19:54:36'),(18,' has been created.','Employer Category Created','2020-08-06 19:54:36'),(19,'tyson has been created.','User Created','2020-08-06 19:54:36'),(20,'Finance has been created.','Job Category Created','2020-08-06 19:54:36'),(21,'Technology has been created.','Job Category Created','2020-08-06 19:54:36'),(22,'Business has been created.','Job Category Created','2020-08-06 19:54:36'),(23,'Information Technology has been created.','Job Category Created','2020-08-06 19:54:36'),(24,'Database has been created.','Job Category Created','2020-08-06 19:54:36'),(25,'System Engineering has been created.','Job Category Created','2020-08-06 19:54:36'),(26,'gordon created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(27,'tiffany created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(28,'tiffany created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(29,'arun created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(30,'leo created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(31,'bob created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(32,'tyson created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(33,'khaled created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(34,'sujan created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(35,'jcole created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(36,'ariana created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(37,'simba created a new payment method.','Payment Method Created','2020-08-06 19:54:36'),(38,'0 has been created.','Job Created','2020-08-06 19:54:37'),(39,'0 has been created.','Job Created','2020-08-06 19:54:37'),(40,'0 has been created.','Job Created','2020-08-06 19:54:37'),(41,'0 has been created.','Job Created','2020-08-06 19:54:37'),(42,'0 has been created.','Job Created','2020-08-06 19:54:37'),(43,'0 has been created.','Job Created','2020-08-06 19:54:37'),(44,'0 has been created.','Job Created','2020-08-06 19:54:37'),(45,'0 has been created.','Job Created','2020-08-06 19:54:37'),(46,'0 has been created.','Job Created','2020-08-06 19:54:37'),(47,'0 has been created.','Job Created','2020-08-06 19:54:37'),(48,'tiffany created an application to job 1','Application Created','2020-08-06 19:54:37'),(49,'tiffany created an application to job 2','Application Created','2020-08-06 19:54:37'),(50,'tiffany created an application to job 3','Application Created','2020-08-06 19:54:37'),(51,'tiffany created an application to job 4','Application Created','2020-08-06 19:54:37'),(52,'tiffany created an application to job 5','Application Created','2020-08-06 19:54:37'),(53,'bob has changed their balance.','Balance Changed','2020-08-06 22:59:42'),(54,'bob made payment of 100','Payment Made','2020-08-06 22:59:42'),(55,'gordon has changed their plan.','Plan ID Changed','2020-08-06 23:02:27'),(56,'gordon has changed their balance.','Balance Changed','2020-08-06 23:02:27'),(57,'gordon has changed their balance.','Balance Changed','2020-08-06 23:02:33'),(58,'gordon made payment of 10','Payment Made','2020-08-06 23:02:33'),(59,'leo has changed their activity status.','User Account Status Changed','2020-08-06 23:03:15'),(60,'gordon created an application to job 1','Application Created','2020-08-06 23:04:07'),(61,'gordon deleted an application to job 1','Application Deleted','2020-08-06 23:04:20'),(62,'gordon created an application to job 1','Application Created','2020-08-06 23:04:21'),(63,'gordon created an application to job 2','Application Created','2020-08-06 23:04:45'),(64,'gordon created an application to job 5','Application Created','2020-08-06 23:04:48'),(65,'gordon created an application to job 6','Application Created','2020-08-06 23:04:49'),(66,'gordon created an application to job 7','Application Created','2020-08-06 23:04:50'),(67,'gordon has changed their plan.','Plan ID Changed','2020-08-06 23:04:51'),(68,'gordon has changed their balance.','Balance Changed','2020-08-06 23:04:51'),(69,'gordon deleted an application to job 1','Application Deleted','2020-08-06 23:08:48'),(70,'React has been created.','Job Category Created','2020-08-06 23:10:05'),(71,'0 has been created.','Job Created','2020-08-06 23:10:05'),(72,'gordon has changed their plan.','Plan ID Changed','2020-08-06 23:10:37'),(73,'gordon has changed their balance.','Balance Changed','2020-08-06 23:10:37'),(74,'gordon created an application to job 11','Application Created','2020-08-06 23:10:44'),(75,'11 has been deleted.','Job Deleted','2020-08-06 23:11:48'),(76,'gordon created an application to job 1','Application Created','2020-08-06 23:51:07'),(77,'gordon deleted an application to job 1','Application Deleted','2020-08-06 23:59:29'),(78,'gordon created an application to job 1','Application Created','2020-08-06 23:59:30'),(79,'gordon deleted an application to job 2','Application Deleted','2020-08-07 00:06:33'),(80,'gordon deleted an application to job 5','Application Deleted','2020-08-07 00:06:34'),(81,'gordon deleted an application to job 6','Application Deleted','2020-08-07 00:06:34'),(82,'gordon deleted an application to job 7','Application Deleted','2020-08-07 00:06:35'),(83,'gordon deleted an application to job 1','Application Deleted','2020-08-07 00:06:35'),(84,'gordon created an application to job 1','Application Created','2020-08-07 00:06:48'),(85,'gordon created an application to job 5','Application Created','2020-08-07 00:07:00'),(86,'gordon created an application to job 7','Application Created','2020-08-07 00:07:04'),(87,'gordon created an application to job 8','Application Created','2020-08-07 00:07:05'),(88,'gordon deleted an application to job 1','Application Deleted','2020-08-07 00:07:43'),(89,'gordon deleted an application to job 5','Application Deleted','2020-08-07 00:09:02'),(90,'khaled has changed their activity status.','User Account Status Changed','2020-08-07 00:35:14'),(91,'gordon created an application to job 1','Application Created','2020-08-07 00:40:54'),(92,'gordon created an application to job 2','Application Created','2020-08-07 00:41:01'),(93,'gordon deleted an application to job 1','Application Deleted','2020-08-07 00:41:50'),(95,'simba created an application to job 2','Application Created','2020-08-07 01:36:06'),(96,'arun created an application to job 2','Application Created','2020-08-07 01:36:14'),(98,'tyson created an application to job 2','Application Created','2020-08-07 01:40:03'),(99,'Angular has been created.','Job Category Created','2020-08-07 01:40:38'),(100,'0 has been created.','Job Created','2020-08-07 01:40:38'),(101,'chris has been created.','User Created','2020-08-07 01:43:56'),(102,' has been created.','Employer Category Created','2020-08-07 01:43:56'),(103,'gordon created a new payment method.','Payment Method Created','2020-08-07 02:16:06'),(104,'tyson created a new payment method.','Payment Method Created','2020-08-07 02:18:24'),(105,'joe has changed their withdrawal type.','Withdrawal Type Changed','2020-08-07 02:34:22'),(106,'gordon has changed their withdrawal type.','Withdrawal Type Changed','2020-08-07 02:34:32'),(107,'gordon has changed their withdrawal type.','Withdrawal Type Changed','2020-08-07 02:34:34'),(108,'gordon has changed their withdrawal type.','Withdrawal Type Changed','2020-08-07 02:34:35'),(109,'gordon has changed their balance.','Balance Changed','2020-08-07 02:34:47'),(110,'gordon made payment of 25','Payment Made','2020-08-07 02:34:47'),(111,'leo has changed their withdrawal type.','Withdrawal Type Changed','2020-08-07 02:35:18'),(112,'leo has changed their plan.','Plan ID Changed','2020-08-07 02:40:38'),(113,'leo has changed their balance.','Balance Changed','2020-08-07 02:40:38'),(114,'gordon has changed their plan.','Plan ID Changed','2020-08-07 02:41:11'),(115,'gordon has changed their balance.','Balance Changed','2020-08-07 02:41:11'),(116,'gordon has changed their plan.','Plan ID Changed','2020-08-07 02:41:14'),(117,'gordon has changed their balance.','Balance Changed','2020-08-07 02:41:14'),(118,'gordon has changed their plan.','Plan ID Changed','2020-08-07 02:41:16'),(119,'gordon has changed their balance.','Balance Changed','2020-08-07 02:41:16'),(120,'gordon has changed their plan.','Plan ID Changed','2020-08-07 02:41:18'),(121,'gordon has changed their balance.','Balance Changed','2020-08-07 02:41:18'),(122,'gordon has changed their plan.','Plan ID Changed','2020-08-07 02:41:20'),(123,'gordon has changed their balance.','Balance Changed','2020-08-07 02:41:20'),(124,'gordon has changed their balance.','Balance Changed','2020-08-07 02:41:27'),(125,'gordon made payment of 35','Payment Made','2020-08-07 02:41:27'),(126,'tiffany has changed their plan.','Plan ID Changed','2020-08-07 02:42:16'),(127,'tiffany has changed their balance.','Balance Changed','2020-08-07 02:42:16'),(128,'sujan has changed their balance.','Balance Changed','2020-08-07 02:42:54'),(129,'jcole has changed their balance.','Balance Changed','2020-08-07 02:42:55'),(130,'leo has changed their balance.','Balance Changed','2020-08-07 02:45:02'),(131,'leo made payment of 50','Payment Made','2020-08-07 02:45:02'),(132,'leo created a new payment method.','Payment Method Created','2020-08-07 02:53:43'),(133,'leo created a new payment method.','Payment Method Created','2020-08-07 02:55:13'),(134,'gordon has changed their balance.','Balance Changed','2020-08-07 02:58:56'),(135,'gordon made payment of 12341234','Payment Made','2020-08-07 02:58:56'),(136,'gordon deleted an application to job 7','Application Deleted','2020-08-07 03:01:01'),(137,'tiffany created a new payment method.','Payment Method Created','2020-08-07 03:02:09'),(138,'leo created a new payment method.','Payment Method Created','2020-08-07 03:02:47');
/*!40000 ALTER TABLE `System_Activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'gordon',1,'gordon@comp353.com','gordon','2020-01-15 04:00:00',1,NULL,12341304,0),(2,'tiffany',3,'tiffany@comp353.com','tiffany','2020-02-15 04:00:00',1,NULL,0,0),(3,'simba',2,'simba@comp353.com','simba','2019-12-15 04:00:00',1,NULL,0,1),(4,'arun',3,'arun@comp353.com','arun','2020-03-15 04:00:00',1,NULL,10,0),(5,'leo',5,'leo@comp353.com','leo','2020-04-15 04:00:00',1,NULL,0,0),(6,'bob',5,'bob@comp353.com','bob','2020-05-15 04:00:00',1,NULL,0,0),(7,'alice',6,'alice@comp353.com','alice','2020-06-15 04:00:00',1,NULL,0,1),(8,'khaled',1,'khaled@comp353.com','khaled','2019-06-15 04:00:00',0,'2019-06-15 04:00:00',-50,1),(9,'sujan',4,'sujan@comp353.com','sujan','2019-06-15 04:00:00',0,'2020-08-07 02:42:54',-50,1),(10,'jcole',5,'jcole@comp353.com','jcole','2019-06-15 04:00:00',0,'2020-08-07 02:42:55',-50,1),(11,'ariana',4,'ariana@comp353.com','ariana','2019-06-15 04:00:00',0,NULL,10,1),(12,'joe',4,'joe@comp353.com','joe','2020-01-14 04:00:00',1,NULL,0,0),(13,'tyson',2,'tyson@comp353.com','tyson','2020-03-15 04:00:00',1,'2020-03-15 04:00:00',-10,1),(14,'chris',5,'chris@comp353.com','chris','2020-08-07 01:43:56',1,NULL,0,1);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed
