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
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal` (
  `ID_Usuario` int NOT NULL AUTO_INCREMENT,
  `NombrePe` varchar(45) NOT NULL,
  `ApePaterno` varchar(45) NOT NULL,
  `ApeMaterno` varchar(45) NOT NULL,
  `TelPersonal` varchar(10) NOT NULL,
  `TelCasa` varchar(10) DEFAULT NULL,
  `FechaContrato` date NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Rol` enum('Administrador','Empleado') NOT NULL,
  PRIMARY KEY (`ID_Usuario`),
  UNIQUE KEY `Usuario` (`Usuario`),
  CONSTRAINT `chk_contrasena_no_vacia` CHECK ((`Contrasena` <> _utf8mb4'')),
  CONSTRAINT `chk_telefono_valido` CHECK (regexp_like(`TelPersonal`,_utf8mb4'^[0-9]{10}$')),
  CONSTRAINT `chk_usuario_no_vacio` CHECK ((`Usuario` <> _utf8mb4''))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,'Iván','Jiménez','Huerta','5571053012','5554291985','2024-08-17','IvanJ16','$2y$12$xqqHdN77qupCECYZXzaZR.0SdAaJtShJDnWc8nDwJiNG2N2udcXtC','Administrador'),(2,'Andrea','Castellón','Jiménez','5554236578','5554869575','2025-05-17','AndyJ17','$2y$12$YOUbdE6lMtvWEEV62BEAbu5kRCreIZUP8ERaataLLRCxX9O7gmyqS','Empleado'),(3,'Abraham','Jiménez ','Huerta','5654235896','5554298564','2024-11-20','AbrahamJ12','$2y$12$1TnSpwwKLnmdPMrfQJi68OZOadwgpN7BaQesbyoP1GWYF/8C5NB8O','Administrador'),(4,'Karina','Huerta','Hernandez','5523654865','5524658545','2024-11-25','KarinaH07','$2y$12$yNoYYMT8fKvazGk6zIm0nezKMULKQJYTC8PC30dr.oSzMExtnwSpu','Empleado');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-24  9:50:01
