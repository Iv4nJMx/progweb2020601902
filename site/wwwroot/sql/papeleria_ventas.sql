-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: localhost    Database: papeleria
-- ------------------------------------------------------
-- Server version	8.0.42

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
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `Num_Venta` int NOT NULL AUTO_INCREMENT,
  `FechaHora` datetime DEFAULT CURRENT_TIMESTAMP,
  `ID_Usuario` int NOT NULL,
  `Total` decimal(7,2) NOT NULL,
  `MetodoPago` enum('efectivo','tarjeta','transferencia') NOT NULL,
  PRIMARY KEY (`Num_Venta`),
  KEY `ID_Usuario` (`ID_Usuario`),
  CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ID_Usuario`) REFERENCES `personal` (`ID_Usuario`),
  CONSTRAINT `chk_total_no_negativo` CHECK ((`Total` >= 0))
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'2025-06-17 04:34:48',1,215.00,'efectivo'),(2,'2025-06-17 04:34:48',1,340.00,'tarjeta'),(3,'2025-06-17 04:34:48',1,175.00,'efectivo'),(7,'2025-06-17 04:59:19',2,420.00,'tarjeta'),(8,'2025-06-17 04:59:19',2,95.00,'efectivo'),(9,'2025-06-17 04:59:19',2,630.00,'transferencia'),(15,'2025-06-17 06:06:27',1,1500.00,'efectivo'),(16,'2025-06-17 09:24:23',1,1400.00,'efectivo'),(17,'2025-06-22 10:34:21',2,335.00,'efectivo'),(18,'2025-06-23 22:39:11',1,650.00,'efectivo'),(19,'2025-06-24 08:15:13',1,115.00,'efectivo');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-24  9:49:56
