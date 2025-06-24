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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `CodProd` varchar(50) NOT NULL,
  `CodigoBarras` varchar(20) DEFAULT NULL,
  `NombreProd` varchar(50) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `ID_Categoria` int DEFAULT NULL,
  `PrecioC` decimal(7,2) NOT NULL,
  `PrecioV` decimal(7,2) NOT NULL,
  `Stock` int NOT NULL,
  `StockMin` int DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`CodProd`),
  UNIQUE KEY `CodigoBarras` (`CodigoBarras`),
  KEY `ID_Categoria` (`ID_Categoria`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`ID_Categoria`) REFERENCES `categorias` (`ID_Categoria`),
  CONSTRAINT `chk_codprod_no_vacio` CHECK ((`CodProd` <> _utf8mb4'')),
  CONSTRAINT `chk_nombre_producto_no_vacio` CHECK ((`NombreProd` <> _utf8mb4'')),
  CONSTRAINT `chk_precio_venta_mayor_compra` CHECK ((`PrecioV` > `PrecioC`)),
  CONSTRAINT `chk_stock_no_negativo` CHECK ((`Stock` >= 0)),
  CONSTRAINT `chk_stockmin_no_negativo` CHECK ((`StockMin` >= 0))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES ('ART-001','7500600000011','Acuarelas Winsor & Newton','Set profesional 12 colores',6,650.00,1200.00,10,2,1),('ART-002','7500600000028','Pinceles Da Vinci','Set pinceles sintéticos',6,350.00,650.00,13,3,1),('ART-003','7500600000035','Block Canson XL','Papel acuarela 300g',6,25.00,45.00,27,6,1),('ART-004','7500600000042','Lápices Prismacolor','Set 24 lápices profesionales',6,450.00,850.00,11,3,1),('ART-005','7500600000059','Mesa de Dibujo','Tablero A3 ajustable',6,350.00,650.00,6,2,1),('ART-006','7500600000066','Tinta China Talens','Tinta negra 250ml',6,55.00,100.00,20,4,1),('ART-007','7500600000073','Acuarelas Van Gogh','Set profesional 24 colores',6,1200.00,2300.00,8,2,1),('ART-008','7500600000080','Pinceles Escoda Reserva','Pinceles de pelo de marta',6,550.00,1050.00,12,3,1),('ART-009','7500600000097','Block Fabriano Artistico','Papel acuarela 640g',6,65.00,120.00,25,5,1),('ART-010','7500600000103','Lápices Caran dAche','Set 36 lápices profesionales',6,850.00,1600.00,10,2,1),('CON-001','7500900000012','Tóner HP 83A','Tóner original negro',9,850.00,1600.00,10,2,1),('CON-002','7500900000029','Resma Papel HP','Papel premium 75g',9,150.00,280.00,40,8,1),('CON-003','7500900000036','Cintas Brother','Cinta para máquina de escribir',9,55.00,100.00,29,6,1),('CON-004','7500900000043','Cartucho Epson 802','Cartucho de tinta color',9,250.00,450.00,25,5,1),('CON-005','7500900000050','Etiquetas Avery 5160','Etiquetas para impresión',9,85.00,160.00,35,7,1),('CON-006','7500900000067','CD-R Verbatim','Paquete con 50 CD grabables',9,65.00,120.00,20,4,1),('CON-007','7500900000074','Tóner Brother TN-760','Tóner alto rendimiento',9,650.00,1200.00,12,3,1),('CON-008','7500900000081','Resma Papel Couché','Papel brillante 200g',9,180.00,340.00,25,5,1),('CON-009','7500900000098','Cartucho HP 664XL','Cartucho de tinta negro',9,350.00,650.00,20,4,1),('CON-010','7500900000104','Etiquetas Rhino 5200','Etiquetas resistentes al agua',9,95.00,180.00,30,6,1),('CUA-001','7500100000016','Cuaderno Norma Premium','Cuaderno rayado 100 hojas',1,45.00,85.00,50,10,1),('CUA-002','7500100000023','Cuaderno Scribe Profesional','Cuaderno cuadriculado 200 hojas',1,60.00,110.00,40,8,1),('CUA-003','7500100000030','Cuaderno Oxford Espiral','Cuaderno universitario 80 hojas',1,55.00,95.00,35,7,1),('CUA-004','7500100000047','Cuaderno Pentagramado','Para música, 50 hojas',1,40.00,75.00,20,5,1),('CUA-005','7500100000054','Cuaderno Ecológico Reciclado','100 hojas, pasta dura',1,65.00,120.00,30,6,1),('CUA-006','7500100000061','Cuaderno Ejecutivo piel','Cuaderno de lujo con cerradura',1,150.00,280.00,15,3,1),('CUA-007','7500100000078','Cuaderno Norma Espiral Grande','Cuaderno profesional 150 hojas',1,70.00,130.00,40,8,1),('CUA-008','7500100000085','Cuaderno Scribe Sketch','Para dibujo, papel grueso',1,85.00,160.00,25,5,1),('CUA-009','7500100000092','Cuaderno Oxford Ejecutivo','Pasta dura, 120 hojas',1,95.00,180.00,30,6,1),('CUA-010','7500100000108','Cuaderno Ecológico Bambú','100 hojas, pasta de bambú',1,110.00,210.00,20,4,1),('CUA-011','12546985751432','Cuaderno Norma Cuadro Chico 200 hojas','Cuaderno Profesional, Cuadro chico, 200 hojas',1,45.50,85.00,14,2,1),('CUA-012','5632489657','Cuaderno Scribe Rayas 100 Hojas','Cuaderno Profesional, Rayas, 100 hojas',1,13.50,30.00,14,2,1),('ESC-001','7500500000014','Pluma Pilot G2','Bolígrafo gel 0.7mm',5,25.00,45.00,60,12,1),('ESC-002','7500500000021','Marcador Sharpie','Marcador permanente fino',5,30.00,55.00,50,10,1),('ESC-003','7500500000038','Lápiz Staedtler','Portaminas profesional 0.5mm',5,45.00,85.00,40,8,1),('ESC-004','7500500000045','Resaltador Zebra Mildliner','Resaltador pastel doble punta',5,35.00,65.00,45,9,1),('ESC-005','7500500000052','Pluma Parker Jotter','Bolígrafo de acero',5,150.00,280.00,20,4,1),('ESC-006','7500500000069','Rotulador Faber-Castell','Marcador pincel Pitt',5,55.00,100.00,30,6,1),('ESC-007','7500500000076','Pluma Cross Classic','Bolígrafo de lujo mediano',5,220.00,420.00,25,5,1),('ESC-008','7500500000083','Marcador Posca PC-5M','Marcador acrílico fino',5,45.00,85.00,40,8,1),('ESC-009','7500500000090','Lápiz Faber-Castell 9000','Lápiz profesional grado B',5,18.00,35.00,60,12,1),('ESC-010','7500500000106','Set Pilot FriXion','Plumas borrables 3 colores',5,120.00,230.00,30,6,1),('FOL-001','7500400000017','Folder Avery Letter','Carpeta con gancho, 100h',4,25.00,45.00,50,10,1),('FOL-002','7500400000024','Folder Smead Colores','Carpeta clasificadora',4,30.00,55.00,40,8,1),('FOL-003','7500400000031','Portadocumentos Wilson','Carpeta ejecutiva piel',4,120.00,220.00,15,3,1),('FOL-004','7500400000048','Folder con Elástico Oxford','Carpeta integral tamaño carta',4,45.00,85.00,35,7,1),('FOL-005','7500400000055','Carpeta Pendaflex','Carpeta colgante para archivo',4,55.00,100.00,23,5,1),('FOL-006','7500400000062','Folder Proyecto Scribe','Carpeta para proyectos',4,65.00,120.00,20,4,1),('FOL-007','7500400000079','Folder Avery Heavy Duty','Carpeta reforzada para archivo',4,35.00,65.00,40,8,1),('FOL-008','7500400000086','Carpeta Pendaflex Hanging','Para archivador colgante',4,45.00,85.00,30,6,1),('FOL-009','7500400000093','Portadocumentos Wilson Elite','Carpeta ejecutiva con cierre',4,180.00,340.00,18,4,1),('FOL-010','7500400000109','Folder Smead Expanding','Carpeta expandible 2\"',4,55.00,105.00,35,7,1),('ORG-001','7500700000018','Organizador Stack-On','Bandejas apilables',7,150.00,280.00,25,5,1),('ORG-002','7500700000025','Revistero Fellowes','Organizador vertical',7,250.00,450.00,20,4,1),('ORG-003','7500700000032','Portalápices Bambú','Organizador ecológico',7,85.00,160.00,30,6,1),('ORG-004','7500700000049','Tablero Magnético','Pizarra organizadora',7,350.00,650.00,15,3,1),('ORG-005','7500700000056','Archivador Rotativo','Gavetas giratorias',7,450.00,850.00,10,2,1),('ORG-006','7500700000063','Organizador de Cables','Kit gestión cables',7,55.00,100.00,40,8,1),('ORG-007','7500700000070','Organizador Rotativo Fellowes','Para documentos A4',7,350.00,650.00,20,4,1),('ORG-008','7500700000087','Bandeja Stack-On Mesh','Bandeja metálica organizadora',7,120.00,230.00,30,6,1),('ORG-009','7500700000094','Tablero Corcho 90x60cm','Tablero de corcho natural',7,180.00,340.00,15,3,1),('ORG-010','7500700000100','Organizador de Joyería','Para pequeños accesorios',7,65.00,120.00,25,5,1),('PEG-001','7500300000010','Pegamento Blanco Pritt','Lápiz adhesivo 40g',3,15.00,30.00,60,12,1),('PEG-002','7500300000027','Super Glue Loctite','Pegamento instantáneo 3g',3,25.00,45.00,50,10,1),('PEG-003','7500300000034','Cinta Dúplex Scotch','Cinta adhesiva doble cara',3,30.00,55.00,40,8,1),('PEG-004','7500300000041','Pegamento en Barra UHU','Barra adhesiva 21g',3,18.00,35.00,45,9,1),('PEG-005','7500300000058','Silicona Líquida Pattex','Para manualidades 50ml',3,40.00,75.00,25,5,1),('PEG-006','7500300000065','Cinta Washi MT','Cinta decorativa japonesa',3,35.00,65.00,30,6,1),('PEG-007','7500300000072','Pegamento UHU Twist','Pegamento en barra retráctil',3,22.00,42.00,50,10,1),('PEG-008','7500300000089','Super Glue Gorilla','Pegamento ultra resistente',3,35.00,65.00,40,8,1),('PEG-009','7500300000096','Cinta Washi MT Basic','Set 5 colores básicos',3,45.00,85.00,30,6,1),('PEG-010','7500300000102','Pegamento Pritt Ecológico','Base vegetal, no tóxico',3,28.00,52.00,45,9,1),('TEC-001','7500800000015','Mouse Logitech MX','Mouse ergonómico inalámbrico',8,650.00,1200.00,15,3,1),('TEC-002','7500800000022','Teclado Microsoft Ergo','Teclado ergonómico',8,850.00,1600.00,12,3,1),('TEC-003','7500800000039','USB SanDisk 64GB','Memoria USB 3.0',8,150.00,280.00,30,6,1),('TEC-004','7500800000046','Base Laptop Cooler','Base ventilada para laptop',8,250.00,450.00,20,4,1),('TEC-005','7500800000053','Cargador Anker 60W','Cargador rápido USB-C',8,350.00,650.00,18,4,1),('TEC-006','7500800000060','Hub USB-C Satechi','Adaptador 7 en 1',8,450.00,850.00,15,3,1),('TEC-007','7500800000077','Mouse Microsoft Sculpt','Mouse ergonómico inalámbrico',8,450.00,850.00,18,4,1),('TEC-008','7500800000084','Teclado Logitech K380','Teclado bluetooth multidispositivo',8,350.00,650.00,22,5,1),('TEC-009','7500800000091','USB Samsung BAR Plus','Memoria USB 3.1 128GB',8,220.00,420.00,30,6,1),('TEC-010','7500800000107','Base Laptop Rain Design','Base aluminio ajustable',8,550.00,1050.00,15,3,1),('TIJ-001','7500200000013','Tijeras Maped Xtreme','Tijeras ergonómicas 18cm',2,65.00,120.00,25,5,1),('TIJ-002','7500200000020','Tijeras Scotch Precision','Para zurdos, 16cm',2,55.00,100.00,20,4,1),('TIJ-003','7500200000037','Tijeras Fiskars School','Punta redonda, 15cm',2,45.00,85.00,30,6,1),('TIJ-004','7500200000044','Tijeras Office Depot','Tijeras económicas 17cm',2,30.00,60.00,40,8,1),('TIJ-005','7500200000051','Tijeras Zig-Zag Mundial','Para manualidades',2,75.00,140.00,15,3,1),('TIJ-006','7500200000068','Tijeras Titanium','Acero inoxidable profesional',2,90.00,170.00,18,4,1),('TIJ-007','7500200000075','Tijeras Mundial Supercut','Acero inoxidable 19cm',2,75.00,140.00,22,5,1),('TIJ-008','7500200000082','Tijeras Fiskars Titanio','Tijeras premium para costura',2,120.00,230.00,15,3,1),('TIJ-009','7500200000099','Tijeras Maped Kiddy','Para niños con punta roma',2,40.00,75.00,35,7,1),('TIJ-010','7500200000105','Tijeras Bonsai Japonesas','Para artes manuales',2,150.00,280.00,12,3,1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-24  9:49:59
