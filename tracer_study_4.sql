-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: tracer_study
-- ------------------------------------------------------
-- Server version	8.0.40

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
-- Table structure for table `alumni`
--

DROP TABLE IF EXISTS `alumni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumni` (
  `id_alumni` int NOT NULL AUTO_INCREMENT,
  `nisn` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tahun_lulus` int DEFAULT NULL,
  `jurusan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_hp` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foto_alumni` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `work` tinyint(1) DEFAULT '0',
  `reason` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_alumni`),
  UNIQUE KEY `NISN` (`nisn`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumni`
--

LOCK TABLES `alumni` WRITE;
/*!40000 ALTER TABLE `alumni` DISABLE KEYS */;
INSERT INTO `alumni` VALUES (1,'1000000001','Ahmad Fauziah','Jakartaaa','2002-02-01',2020,'Akuntansi','Jl. Melati No.1ag','08111111111212','ahmadaa.fauzi@gmail.com','202cb962ac59075b964b07152d234b70','6816307226345.png','2025-05-03 10:11:55','2026-02-11 14:29:51',1,NULL),(2,'1000000002','Siti Nurhaliza','Bandung','1996-02-20',2014,'Teknik Informatika','Jl. Mawar No.2','082222222222','siti.nurhaliza@gmail.com','202cb962ac59075b964b07152d234b70','6816369753ec9.png','2025-05-03 10:11:55','2026-02-12 05:15:05',1,NULL),(3,'1000000003','Budi Santoso','Surabaya','1994-03-10',2012,'Teknik Informatika','Jl. Kenanga No.3','083333333333','budi.santoso@gmail.com','202cb962ac59075b964b07152d234b70','681634d7e15a1.png','2025-05-03 10:11:55','2026-04-19 11:36:40',1,NULL),(4,'1000000004','Dewi Lestari','Yogyakarta','1995-07-25',2013,'Teknik Informatika','Jl. Anggrek No.4','084444444444','dewi.lestari@gmail.com','202cb962ac59075b964b07152d234b70','681636712e3f9.jpeg','2025-05-03 10:11:55','2026-04-19 11:36:40',1,NULL),(5,'1000000005','Rizky Ramadhan','Medan','1997-05-12',2015,'Teknik Informatika','Jl. Cempaka No.5','085555555555','rizky.ramadhan@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',1,NULL),(6,'1000000006','Fitri Handayani','Palembang','1996-09-17',2014,'Teknik Informatika','Jl. Kamboja No.6','086666666666','fitri.handayani@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',1,NULL),(7,'1000000007','Agus Haryanto','Semarang','1993-11-05',2011,'Teknik Informatika','Jl. Dahlia No.7','087777777777','agus.haryanto@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',1,NULL),(8,'1000000008','Nurul Aini','Makassar','1994-12-30',2012,'Teknik Informatika','Jl. Sakura No.8','088888888888','nurul.aini@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',1,NULL),(9,'1000000009','Yusuf Maulana','Balikpapan','1998-06-09',2016,'Teknik Informatika','Jl. Flamboyan No.9','089999999999','yusuf.maulana@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',1,NULL),(10,'1000000010','Indah Permata','Denpasar','1997-08-19',2015,'Teknik Informatika','Jl. Teratai No.10','081000000001','indah.permata@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',1,NULL),(11,'1000000011','Fajar Pratama','Bogor','1995-04-14',2013,'Teknik Informatika','Jl. Melur No.11','082000000002','fajar.pratama@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',0,'susah nyari kerja jaman sekarang'),(12,'1000000012','Dian Anggraini','Tangerang','1996-10-22',2014,'Teknik Informatika','Jl. Alamanda No.12','083000000003','dian.anggraini@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',0,'harus sarjana dulu'),(13,'1000000013','Rian Saputra','Bekasi','1997-03-18',2015,'Teknik Informatika','Jl. Bougenville No.13','084000000004','rian.saputra@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',0,NULL),(14,'1000000014','Melati Kusuma','Depok','1994-07-27',2012,'Teknik Informatika','Jl. Cemara No.14','085000000005','melati.kusuma@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',0,NULL),(15,'1000000015','Andi Wijaya','Padang','1995-02-28',2013,'Teknik Informatika','Jl. Pinus No.15','086000000006','andi.wijaya@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',0,'males jirrr wkwk'),(16,'1000000016','Lisa Herlina','Pekanbaru','1993-06-30',2011,'Teknik Informatika','Jl. Sawo No.16','087000000007','lisa.herlina@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',0,NULL),(17,'1000000017','Teguh Setiawan','Malang','1996-01-05',2014,'Teknik Informatika','Jl. Randu No.17','088000000008','teguh.setiawan@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',0,NULL),(18,'1000000018','Lina Marlina','Pontianak','1998-04-16',2016,'Teknik Informatika','Jl. Jati No.18','089000000009','lina.marlina@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',0,NULL),(19,'1000000019','Hendra Kurniawan','Manado','1997-11-23',2015,'Teknik Informatika','Jl. Akasia No.19','081200000010','hendra.kurniawan@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2026-04-19 11:36:40',0,NULL),(20,'1000000020','Rina Oktaviani','Batam','1995-05-10',2013,'Teknik Informatika','Jl. Ketapang No.20','082300000011','rina.oktaviani@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:11:55','2025-08-28 14:55:09',0,'okee'),(21,'1021521122','anjay ucup','Banten','0000-00-00',2019,'Teknik Informatika','Jeungjing, Cisoka, Kab. Tangerang','081252544585','anjayucup@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 14:25:33','2026-04-19 11:36:40',0,NULL),(24,'1000000121','nurohman','wonosobo','2022-06-08',2025,'Otomotif','Jeungjing, Cisoka, Kab. Tangerang','08115522','nurohmanjebeng@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-08 15:17:28','2026-04-19 11:36:40',0,NULL),(25,'1000000128','Ronny Alvian Jaya Mulia','Tangerang Kota','2001-06-07',2022,'Sistem Informasi','Cimone, Karawaci','081256488511','ronnyalvian@gmail.com','202cb962ac59075b964b07152d234b70','6831411ad0c2e.png','2025-05-24 03:46:11','2025-08-27 06:22:43',0,'mau istirahat dulu');
/*!40000 ALTER TABLE `alumni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_loker`
--

DROP TABLE IF EXISTS `info_loker`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_loker` (
  `id_loker` int NOT NULL AUTO_INCREMENT,
  `judul_pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_loker`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_loker`
--

LOCK TABLES `info_loker` WRITE;
/*!40000 ALTER TABLE `info_loker` DISABLE KEYS */;
INSERT INTO `info_loker` VALUES (2,'Operator Produksi','PT. Victory Chingluh Indonesia','Jl. Raya Ps. Kemis No.03, Ps. Kemis, Kec. Ps. Kemis, Kabupaten Tangerang, Banten 15560','Requirements :\r\n\r\nCandidates must be aware about Safety and Health and make it be their priority\r\n\r\nCandidate must possess at least Bachelor Degree in Automation/ Mechatronics/ Electrical/ Robotics Engineering\r\n\r\nProven experience 5 years in Mechanical, Electrical, Design and Automation\r\n\r\nHave knowledge, Skill and Attitude about Industrial mechanical and electrical systems, sensors, actuators, motors and drives. Proficiency in DFA, CAD software and Industrial electrical systems, sensors, actuators, motors, and drives. Understanding of industrial communication protocols. Strong understanding of mechanical principle and have experience with hand on mechanical design and knowledge of footwear manufacturing processes and automated equipment. Problem solving and Analytical Skills. Cultivates Innovation, Customer Focus and Delivers Quality\r\n\r\nUnderstanding vission mission company and safety policy.\r\n\r\nUnderstanding standards in work areas related regulation of OHS, energy, quality, and environment.','https://docs.google.com/forms/d/e/1FAIpQLSf-G-b4xNfzqD_qOeoaMhi7qccvZqwAo0UhqXzJmrf26ShP4g/viewform','operator','2026-02-12 00:27:38','2026-02-12 06:50:19');
/*!40000 ALTER TABLE `info_loker` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tracer`
--

DROP TABLE IF EXISTS `tracer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tracer` (
  `id_tracer` int NOT NULL AUTO_INCREMENT,
  `id_alumni` int DEFAULT NULL,
  `nama_instansi` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_instansi` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sedang_bekerja` enum('Ya','Tidak') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nilai_gaji` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `waktu_tunggu_kerja` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instansi_pertama` text COLLATE utf8mb4_general_ci,
  `gaji_pertama_manual` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `usaha_mandiri` enum('Ya','Tidak') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tracer`),
  KEY `fk_tracer_alumni` (`id_alumni`),
  CONSTRAINT `fk_tracer_alumni` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracer`
--

LOCK TABLES `tracer` WRITE;
/*!40000 ALTER TABLE `tracer` DISABLE KEYS */;
INSERT INTO `tracer` VALUES (1,1,'PT Astra International','Jl. Gaya Motor No. 8, Sunter II, Jakarta Utara','Ya','Rp5.000.000','6-12 bulan','PT Astra International','Rp5.000.000','Ya','2025-05-03 10:13:49','2026-02-12 01:59:24'),(2,1,'Bank Mandiri','Jl. Jenderal Gatot Subroto Kav. 36-38, Jakarta','Ya','Rp6.000.000','6-12 bulan','Bank Mandiri','Rp5.000.000','Tidak','2025-05-03 10:13:49','2026-02-12 01:59:24'),(3,3,'PT Telkom Indonesia','Jl. Japati No. 1, Bandung','Ya','Rp5.500.000','6-12 bulan','PT Telkom Indonesia','Rp5.000.000','Ya','2025-08-27 03:41:54','2026-02-12 01:59:24'),(4,4,'Shopee Indonesia','Pacific Century Place, SCBD, Jakarta','Ya','Rp4.500.000','6-12 bulan','Shopee Indonesia','Rp5.000.000','Tidak','2024-08-27 03:41:54','2026-02-12 01:59:24'),(5,5,'Universitas Indonesia','Kampus UI Depok','Ya','Rp4.200.000','6-12 bulan','Universitas Indonesia','Rp5.000.000','Ya','2024-08-27 03:41:54','2026-02-12 01:59:24'),(6,6,'PT PLN (Persero)','Jl. Trunojoyo Blok M-I No.135, Jakarta','Ya','Rp6.500.000','6-12 bulan','PT PLN (Persero)','Rp5.000.000','Tidak','2025-08-27 03:41:54','2026-02-12 01:59:24'),(7,7,'PT Gojek Indonesia','Pasaraya Blok M, Jakarta Selatan','Ya','Rp5.000.000','6-12 bulan','PT Gojek Indonesia','Rp5.000.000','Ya','2025-08-27 03:41:54','2026-02-12 01:59:24'),(8,8,'PT Bukalapak','Jl. Sultan Iskandar Muda No. 7, Jakarta','Ya','Rp4.800.000','6-12 bulan','PT Bukalapak','Rp5.000.000','Tidak','2025-08-27 03:41:54','2026-02-12 01:59:24'),(9,9,'Rumah Sakit Cipto Mangunkusumo','Jl. Diponegoro No.71, Jakarta Pusat','Ya','Rp4.000.000','6-12 bulan','Rumah Sakit Cipto Mangunkusumo','Rp5.000.000','Ya','2025-08-27 03:41:54','2026-02-12 01:59:24'),(10,10,'Dinas Pendidikan DKI Jakarta','Jl. Gatot Subroto, Jakarta Selatan','Ya','Rp4.700.000','6-12 bulan','Dinas Pendidikan DKI Jakarta','Rp5.000.000','Tidak','2025-08-27 03:41:54','2026-02-12 01:59:24'),(12,1,'PT BPRMAS','Cimone','Ya','Rp4.700.000','Telah bekerja sebelum lulus','PT BPRMAS','Rp5.000.000','Ya','2025-05-13 06:27:02','2026-02-12 01:59:24'),(13,1,'PEMDA Kab Tangerang','Banten','Ya','Rp4.700.000','< 3 bulan','PEMDA Kab Tangerang','Rp5.000.000','Tidak','2025-05-13 06:39:45','2026-02-12 01:59:24'),(26,2,'Tidak bekerja','Tidak bekerja','Tidak','0','6-12 bulan','Tidak bekerja','0','Ya','2026-02-12 05:15:05','2026-02-12 05:15:05');
/*!40000 ALTER TABLE `tracer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jabatan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `level` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foto_profil` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin','kepala sekolah','admin','admin@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:07:56','2025-08-25 09:09:18'),(2,'operator','operator','operator sekolah','operator','operator@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 10:08:45','2025-08-25 09:11:27'),(3,'arif','Arif Wahyudin Ucup','IT','admin','arifwahyudin12@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 12:49:22','2025-08-25 09:11:27'),(4,'gunawan','Gunawan Atmaja','IT Support','operator','gunawanatmaja@gmail.com','202cb962ac59075b964b07152d234b70','default.png','2025-05-03 12:57:59','2025-08-25 09:11:27');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-19 18:38:52
