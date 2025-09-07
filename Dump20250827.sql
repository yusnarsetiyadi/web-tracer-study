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
INSERT INTO `alumni` VALUES (1,'1000000001','Ahmad Fauziah','Jakartaaa','2002-02-01',2020,'Akuntansi','Jl. Melati No.1ag','08111111111212','ahmadaa.fauzi@gmail.com','202cb962ac59075b964b07152d234b70','6816307226345.png','2025-05-03 10:11:55','2025-05-13 06:39:45',1,NULL),(2,'1000000002','Siti Nurhaliza','Bandung','1996-02-20',2014,'Teknik Informatika','Jl. Mawar No.2','082222222222','siti.nurhaliza@gmail.com','00f5cdfcf6659644292bf07a27431fb9','6816369753ec9.png','2025-05-03 10:11:55','2025-08-27 03:32:19',0,NULL),(3,'1000000003','Budi Santoso','Surabaya','1994-03-10',2012,'Teknik Informatika','Jl. Kenanga No.3','083333333333','budi.santoso@gmail.com','52e0579d0b37899852c5703fac0d349d','681634d7e15a1.png','2025-05-03 10:11:55','2025-08-27 03:41:54',1,NULL),(4,'1000000004','Dewi Lestari','Yogyakarta','1995-07-25',2013,'Teknik Informatika','Jl. Anggrek No.4','084444444444','dewi.lestari@gmail.com','a3d79626ccc2fd2788c26a9b7f7a5be1','681636712e3f9.jpeg','2025-05-03 10:11:55','2024-08-27 03:41:54',1,NULL),(5,'1000000005','Rizky Ramadhan','Medan','1997-05-12',2015,'Teknik Informatika','Jl. Cempaka No.5','085555555555','rizky.ramadhan@gmail.com','08e902c7f77c85309a71d1f8ebdb8777','default.png','2025-05-03 10:11:55','2024-08-27 03:41:54',1,NULL),(6,'1000000006','Fitri Handayani','Palembang','1996-09-17',2014,'Teknik Informatika','Jl. Kamboja No.6','086666666666','fitri.handayani@gmail.com','72bc6ce6b605b3eebba9e12854b16837','default.png','2025-05-03 10:11:55','2025-08-27 03:41:54',1,NULL),(7,'1000000007','Agus Haryanto','Semarang','1993-11-05',2011,'Teknik Informatika','Jl. Dahlia No.7','087777777777','agus.haryanto@gmail.com','361e7bd728b7656f83917a17a55492cf','default.png','2025-05-03 10:11:55','2025-08-27 03:41:54',1,NULL),(8,'1000000008','Nurul Aini','Makassar','1994-12-30',2012,'Teknik Informatika','Jl. Sakura No.8','088888888888','nurul.aini@gmail.com','b6825443c0e3609a2c312fe8e51321ce','default.png','2025-05-03 10:11:55','2025-08-27 03:41:54',1,NULL),(9,'1000000009','Yusuf Maulana','Balikpapan','1998-06-09',2016,'Teknik Informatika','Jl. Flamboyan No.9','089999999999','yusuf.maulana@gmail.com','9d1f171f7f0ef0bf2d6dbc080d76fd7c','default.png','2025-05-03 10:11:55','2025-08-27 03:41:54',1,NULL),(10,'1000000010','Indah Permata','Denpasar','1997-08-19',2015,'Teknik Informatika','Jl. Teratai No.10','081000000001','indah.permata@gmail.com','dff33b7a07c653ce70469dd440fdaafe','default.png','2025-05-03 10:11:55','2025-08-27 03:41:54',1,NULL),(11,'1000000011','Fajar Pratama','Bogor','1995-04-14',2013,'Teknik Informatika','Jl. Melur No.11','082000000002','fajar.pratama@gmail.com','d406f95185d89492af497790be236d86','default.png','2025-05-03 10:11:55','2025-08-27 04:30:45',0,'susah nyari kerja jaman sekarang'),(12,'1000000012','Dian Anggraini','Tangerang','1996-10-22',2014,'Teknik Informatika','Jl. Alamanda No.12','083000000003','dian.anggraini@gmail.com','c82602ecc940241225faa1d233ae5550','default.png','2025-05-03 10:11:55','2025-08-27 04:30:45',0,'harus sarjana dulu'),(13,'1000000013','Rian Saputra','Bekasi','1997-03-18',2015,'Teknik Informatika','Jl. Bougenville No.13','084000000004','rian.saputra@gmail.com','a02258735c5a85f9207e1db61dbbc5fd','default.png','2025-05-03 10:11:55','2024-08-27 03:32:19',0,NULL),(14,'1000000014','Melati Kusuma','Depok','1994-07-27',2012,'Teknik Informatika','Jl. Cemara No.14','085000000005','melati.kusuma@gmail.com','1078ee1fba833b239dd21548d61e16e3','default.png','2025-05-03 10:11:55','2024-08-27 03:32:19',0,NULL),(15,'1000000015','Andi Wijaya','Padang','1995-02-28',2013,'Teknik Informatika','Jl. Pinus No.15','086000000006','andi.wijaya@gmail.com','5dc74a221b0fe5a79ba85ab8d4f3d79d','default.png','2025-05-03 10:11:55','2025-08-27 06:04:21',0,'males jirrr wkwk'),(16,'1000000016','Lisa Herlina','Pekanbaru','1993-06-30',2011,'Teknik Informatika','Jl. Sawo No.16','087000000007','lisa.herlina@gmail.com','040c18e90b7bc5f3c3890b61ffa64ca7','default.png','2025-05-03 10:11:55','2024-08-27 03:32:19',0,NULL),(17,'1000000017','Teguh Setiawan','Malang','1996-01-05',2014,'Teknik Informatika','Jl. Randu No.17','088000000008','teguh.setiawan@gmail.com','641d7d0b11a1748be50bcd45f982bc0e','default.png','2025-05-03 10:11:55','2024-08-27 03:32:19',0,NULL),(18,'1000000018','Lina Marlina','Pontianak','1998-04-16',2016,'Teknik Informatika','Jl. Jati No.18','089000000009','lina.marlina@gmail.com','40d9f95a409a62918eae8ce683404aec','default.png','2025-05-03 10:11:55','2025-08-27 03:32:19',0,NULL),(19,'1000000019','Hendra Kurniawan','Manado','1997-11-23',2015,'Teknik Informatika','Jl. Akasia No.19','081200000010','hendra.kurniawan@gmail.com','d877bad995316545cbe85fed2c19d99c','default.png','2025-05-03 10:11:55','2024-08-27 03:32:19',0,NULL),(20,'1000000020','Rina Oktaviani','Batam','1995-05-10',2013,'Teknik Informatika','Jl. Ketapang No.20','082300000011','rina.oktaviani@gmail.com','41bbc3b439f364520a2904cfae4d2e46','default.png','2025-05-03 10:11:55','2025-08-27 03:32:19',0,NULL),(21,'1021521122','anjay ucup','Banten','0000-00-00',2019,'Teknik Informatika','Jeungjing, Cisoka, Kab. Tangerang','081252544585','anjayucup@gmail.com','14052025','default.png','2025-05-03 14:25:33','2025-08-27 03:32:19',0,NULL),(24,'1000000121','nurohman','wonosobo','2022-06-08',2025,'Otomotif','Jeungjing, Cisoka, Kab. Tangerang','08115522','nurohmanjebeng@gmail.com','7246edb292a1a2ca0282b34ac9732229','default.png','2025-05-08 15:17:28','2025-08-27 03:32:19',0,NULL),(25,'1000000128','Ronny Alvian Jaya Mulia','Tangerang Kota','2001-06-07',2022,'Sistem Informasi','Cimone, Karawaci','081256488511','ronnyalvian@gmail.com','202cb962ac59075b964b07152d234b70','6831411ad0c2e.png','2025-05-24 03:46:11','2025-08-27 06:22:43',0,'mau istirahat dulu');
/*!40000 ALTER TABLE `alumni` ENABLE KEYS */;
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
  `sektor_perusahaan` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_telpon_instansi` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `waktu_tunggu_kerja` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instansi_pertama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sektor_instansi_pertama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nilai_gaji` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nilai_gaji_pertama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `ket_umr` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ket_umr_gaji_pertama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tracer`),
  KEY `fk_tracer_alumni` (`id_alumni`),
  CONSTRAINT `fk_tracer_alumni` FOREIGN KEY (`id_alumni`) REFERENCES `alumni` (`id_alumni`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tracer`
--

LOCK TABLES `tracer` WRITE;
/*!40000 ALTER TABLE `tracer` DISABLE KEYS */;
INSERT INTO `tracer` VALUES (1,1,'PT Astra International','Jl. Gaya Motor No. 8, Sunter II, Jakarta Utara','Swasta','0216530991','6-12 bulan','PT Astra International','Lainnya','Rp5.000.000','3-5 Juta','Di atas UMR','Sesuai UMR','2025-05-03 10:13:49','2025-05-13 05:58:40'),(2,1,'Bank Mandiri','Jl. Jenderal Gatot Subroto Kav. 36-38, Jakarta','BUMN','02152997777','6-12 bulan','Bank Mandiri','Lainnya','Rp6.000.000','3-5 Juta','Di atas UMR','Sesuai UMR','2025-05-03 10:13:49','2025-05-13 05:58:40'),(3,3,'PT Telkom Indonesia','Jl. Japati No. 1, Bandung','BUMN','0224523456','6-12 bulan','PT Telkom Indonesia','Lainnya','Rp5.500.000','3-5 Juta','Di atas UMR','Sesuai UMR','2025-08-27 03:41:54','2025-08-27 06:41:12'),(4,4,'Shopee Indonesia','Pacific Century Place, SCBD, Jakarta','Swasta','02180687777','6-12 bulan','Shopee Indonesia','Lainnya','Rp4.500.000','3-5 Juta','Di atas UMR','Sesuai UMR','2024-08-27 03:41:54','2025-08-27 06:42:23'),(5,5,'Universitas Indonesia','Kampus UI Depok','Pendidikan','0217867222','6-12 bulan','Universitas Indonesia','Lainnya','Rp4.200.000','3-5 Juta','Sesuai UMR','Sesuai UMR','2024-08-27 03:41:54','2025-08-27 06:42:23'),(6,6,'PT PLN (Persero)','Jl. Trunojoyo Blok M-I No.135, Jakarta','BUMN','0217261122','6-12 bulan','PT PLN (Persero)','Lainnya','Rp6.500.000','3-5 Juta','Di atas UMR','Sesuai UMR','2025-08-27 03:41:54','2025-08-27 06:42:23'),(7,7,'PT Gojek Indonesia','Pasaraya Blok M, Jakarta Selatan','Startup','02150849000','6-12 bulan','PT Gojek Indonesia','Lainnya','Rp5.000.000','3-5 Juta','Di atas UMR','Sesuai UMR','2025-08-27 03:41:54','2025-08-27 06:42:23'),(8,8,'PT Bukalapak','Jl. Sultan Iskandar Muda No. 7, Jakarta','Startup','02180623000','6-12 bulan','PT Bukalapak','Lainnya','Rp4.800.000','3-5 Juta','Di atas UMR','Sesuai UMR','2025-08-27 03:41:54','2025-08-27 06:42:23'),(9,9,'Rumah Sakit Cipto Mangunkusumo','Jl. Diponegoro No.71, Jakarta Pusat','Kesehatan','0211500135','6-12 bulan','Rumah Sakit Cipto Mangunkusumo','Lainnya','Rp4.000.000','3-5 Juta','Sesuai UMR','Sesuai UMR','2025-08-27 03:41:54','2025-08-27 06:42:23'),(10,10,'Dinas Pendidikan DKI Jakarta','Jl. Gatot Subroto, Jakarta Selatan','Pemerintahan','0215703303','6-12 bulan','Dinas Pendidikan DKI Jakarta','Lainnya','Rp4.700.000','3-5 Juta','Di atas UMR','Sesuai UMR','2025-08-27 03:41:54','2025-08-27 06:42:23'),(12,1,'PT BPRMAS','Cimone','Finansial','0081254','Telah bekerja sebelum lulus','PT BPRMAS','Finansial','5-7 Juta','3-5 Juta','Tidak Sesuai UMR - Lebih Besar','Sesuai UMR','2025-05-13 06:27:02','2025-05-13 06:38:28'),(13,1,'PEMDA Kab Tangerang','Banten','Instansi Pemerintahan','08123456','< 3 bulan','PEMDA Kab Tangerang','PEMDA Kab Tangerang','2-3 Juta','2-3 Juta','Tidak Sesuai UMR - Lebih Kecil','Tidak Sesuai UMR - Lebih Kecil','2025-05-13 06:39:45','2025-08-27 06:56:11');
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

-- Dump completed on 2025-08-27 15:02:13
