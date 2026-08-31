-- MySQL dump 10.13  Distrib 8.0.46, for Win64 (x86_64)
--
-- Host: localhost    Database: kas_db
-- ------------------------------------------------------
-- Server version	8.0.46

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
-- Table structure for table `log_pembayaran`
--

DROP TABLE IF EXISTS `log_pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `log_pembayaran` (
  `id_log` int NOT NULL AUTO_INCREMENT,
  `id_pembayaran` int DEFAULT NULL,
  `aksi` varchar(20) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_pembayaran`
--

LOCK TABLES `log_pembayaran` WRITE;
/*!40000 ALTER TABLE `log_pembayaran` DISABLE KEYS */;
INSERT INTO `log_pembayaran` VALUES (1,8,'INSERT','2026-08-26 11:53:17'),(2,8,'DELETE','2026-08-26 12:08:24'),(3,7,'DELETE','2026-08-26 12:09:02'),(4,10,'INSERT','2026-08-26 14:06:45'),(5,10,'DELETE','2026-08-26 14:19:16'),(6,14,'INSERT','2026-08-26 14:22:30'),(7,15,'INSERT','2026-08-26 14:22:48');
/*!40000 ALTER TABLE `log_pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembayaran` (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `id_siswa` int NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` decimal(10,2) NOT NULL,
  `status` enum('lunas','belum lunas') NOT NULL DEFAULT 'lunas',
  PRIMARY KEY (`id_pembayaran`),
  KEY `fk_pembayaran_siswa` (`id_siswa`),
  CONSTRAINT `fk_pembayaran_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES (2,2,'2026-01-02',20000.00,'lunas'),(3,3,'2026-01-03',10000.00,'belum lunas'),(4,4,'2026-01-04',10000.00,'belum lunas'),(5,5,'2026-01-05',20000.00,'lunas'),(6,6,'2026-01-06',2000.00,'belum lunas'),(14,1,'2026-01-01',2000.00,'belum lunas'),(15,7,'2026-01-07',20000.00,'lunas');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siswa` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `kelas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `nis` (`nis`),
  KEY `nis_idx` (`nis`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (1,'231001','adis','siswa','XII RPL 1'),(2,'231002','cella','sekertaris 1','XII RPL 1'),(3,'231003','fano','bendahara 1','XII RPL 1'),(4,'231004','dupan','bendahara 2','XII RPL 1'),(5,'231005','fahmi','ketua','XII RPL 1'),(6,'231006','azka','wakil ketua','XII RPL 1'),(7,'231007','evan','sekertaris 2','XII RPL 1'),(8,'231008','adista','siswa','XII RPL 1'),(9,'231009','sinay','siswa','XII RPL 1'),(10,'231010','rapip','siswa','XII RPL 1');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-28 11:08:41
