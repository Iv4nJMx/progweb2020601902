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
-- Table structure for table `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_ventas` (
  `V_Num_Venta` int NOT NULL,
  `P_CodProd` varchar(50) NOT NULL,
  `Cantidad` int NOT NULL,
  `PrecioUnitario` decimal(7,2) NOT NULL,
  `Subtotal` decimal(7,2) NOT NULL,
  PRIMARY KEY (`V_Num_Venta`,`P_CodProd`),
  KEY `P_CodProd` (`P_CodProd`),
  CONSTRAINT `detalle_ventas_ibfk_1` FOREIGN KEY (`V_Num_Venta`) REFERENCES `ventas` (`Num_Venta`),
  CONSTRAINT `detalle_ventas_ibfk_2` FOREIGN KEY (`P_CodProd`) REFERENCES `productos` (`CodProd`),
  CONSTRAINT `chk_cantidad_positiva` CHECK ((`Cantidad` > 0)),
  CONSTRAINT `chk_precio_unitario_positivo` CHECK ((`PrecioUnitario` > 0)),
  CONSTRAINT `chk_subtotal_correcto` CHECK ((`Subtotal` = (`Cantidad` * `PrecioUnitario`)))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ventas`
--

LOCK TABLES `detalle_ventas` WRITE;
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
INSERT INTO `detalle_ventas` VALUES (1,'CUA-002',1,110.00,110.00),(1,'ESC-001',2,45.00,90.00),(1,'PEG-001',1,30.00,30.00),(2,'FOL-003',1,220.00,220.00),(2,'TIJ-001',1,120.00,120.00),(3,'ART-003',2,45.00,90.00),(3,'ESC-004',1,65.00,65.00),(3,'PEG-004',1,35.00,35.00),(7,'CUA-006',1,280.00,280.00),(7,'ESC-005',1,280.00,280.00),(8,'PEG-002',1,45.00,45.00),(8,'TIJ-003',1,85.00,85.00),(9,'CON-002',2,280.00,560.00),(9,'ORG-001',1,280.00,280.00),(9,'TEC-001',1,1200.00,1200.00),(15,'ART-002',1,650.00,650.00),(15,'ART-004',1,850.00,850.00),(16,'ART-005',2,650.00,1300.00),(16,'CON-003',1,100.00,100.00),(17,'ART-003',3,45.00,135.00),(17,'FOL-005',2,100.00,200.00),(18,'ART-002',1,650.00,650.00),(19,'CUA-011',1,85.00,85.00),(19,'CUA-012',1,30.00,30.00);
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-24  9:50:03
