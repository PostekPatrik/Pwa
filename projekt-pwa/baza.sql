-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: projekt
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `main`
--

DROP TABLE IF EXISTS `main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main`
--

LOCK TABLES `main` WRITE;
/*!40000 ALTER TABLE `main` DISABLE KEYS */;
INSERT INTO `main` VALUES (1,'2022-06-17','Electro Harmonix Freeze','The aptly named Electro-Harmonix Freeze Sound Retainer guitar effects pedal lets you play a note or a chord, hit the pedal, and freeze that sound in sustain indefinitely. ','Condition	Brand New (New)\r\nBrand New items are sold by an authorized dealer or original builder and include all original packaging\r\nBrand	\r\nElectro-Harmonix\r\nModel	\r\nFreeze Nano Sound Retainer Sustain Pedal\r\nCategories	\r\nCompression and Sustain','freeze.jpg','novo',0),(2,'2022-06-17','Ibanez Ts9 Tubescreamer','The TS9 was reissued all the way back in 1993. Eleven years after its reissue the TS9 Tube Screamer is still going strong.','Brand	\r\nIbanez\r\nModel	\r\nTS9 Tube Screamer\r\nFinish	\r\nGreen\r\nYear	\r\n1992 - 2022\r\nMade In	\r\nJapan','tubescreamer.webp','novo',0),(3,'2022-06-17','VOX V845 WahWah','In the 60s VOX developed the first Wah-Wah effects pedal to allow guitarists to copy the sound of a muted trumpet. A wah-wah pedal is a sweepable bandpass filter. With the toe down, high frequencies are accentuated. ','Effect Type: Wah-Wah\r\nTechnology: Analog\r\nMono / Stereo: Mono In, Mono Out\r\nBypass Mode: Buffered Bypass\r\nPower supply: 9 VDC, Center negative\r\nPower Consumption: 5,5 mA\r\nBattery powered: Battery Powered\r\nBattery Type: 9 V Block\r\nHousing size: Standard\r\nDimensions (WxHxD / cm): 10,2x 7,5 x 25,2\r\nWeight: 1,6 kg\r\nCountry of Origin: China\r\nWah pedal based on the original Vox pedals from the 1960s\r\nInput / Output jacks: INST jack, AMP jack, DC iinput jack\r\nPower supply: One 9V DC battery\r\nPower consumption: 540uA @ 9VDC\r\nBattery life for continuous use: Approximately >100 hours with manganese battery\r\nDimensions: 102(W) x 252(D) x 75(H) including rubber feet, pedal in lowest postion)\r\nWeight: 942g including battery','voxwah.webp','novo',0),(4,'2022-06-17','Boss CS-2 Compression Sustainer','The CS-2 compresses high-input signals while boosting low-input signals, giving you smooth and long sustain without degrading the quality of the original sound. The CS-2 uses a VCA (Voltage Controlled Amplifier) instead of the photocouplers used by the CS-1. ','Controls: Level, Attack, Sustain\r\nConnectors: Input, Output, AC Adaptor\r\nCurrent Draw: 4 mA (DC 9V)\r\nWeight: 400g (15 oz.)\r\nInput Impedance: 1MOhm\r\nRecommended AC Adaptor: ACA Series','compression.jpg','rabljeno',0),(5,'2022-06-17','DUNLOP - FFM3 Jimi Hendrix Fuzz Face Mini','The Dunlop FFM3 Jimi Hendrix Fuzz Face Mini puts the same exact circuit JHF1 into a compact, pedalboard-friendly enclosure. The smooth, singing sounds of this fuzz were a major part of Jimi\'s signature sound.','Brand	\r\nDunlop\r\nModel	\r\nFFM3 Jimi Hendrix Signature Fuzz Face Mini\r\nFinish	\r\nLight Blue\r\nYear	\r\n2014 - 2022\r\nMade In	\r\nUnited States\r\nCategories	\r\nFuzz Pedals and Effects\r\nPedal Format	\r\nMini','fuzzface.webp','rabljeno',0),(6,'2022-06-17','MXR M290 Phase 95 Mini Phaser','The MXR Phase 95 is a mini phaser pedal that squeezes the sound and function of the Phase 45 and Phase 90 into a compact enclosure -- about half the size of a standard MXR pedal.','Brand	\r\nMXR\r\nModel	\r\nM290 Phase 95 Mini\r\nFinish	\r\nOrange\r\nYear	\r\n2016 - 2022\r\nMade In	\r\nUnited States\r\nCategories	\r\nPhaser Pedals\r\nPedal Format	\r\nMini','mixr.webp','rabljeno',0);
/*!40000 ALTER TABLE `main` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `level` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'zeljko','$2y$10$kCiKN5p08Bp5Fu9340.JmexPe.keaygEQLCUTdr3ay5egK/Qxt5A.','2022-06-17 21:03:07',0),(2,'patrik','$2y$10$1a2FAVFokXsmPTN3ojfK.OfcIZsxrGrJl0d9VaNv92dfDj3pCKCDm','2022-06-17 21:50:34',0),(3,'admin','$2y$10$GohAOp3EtvfwMTuBGbHFped6vG.5qTzTQfNksYtBOnoqx9mjhqED2','2022-06-18 17:55:12',1),(4,'sami','$2y$10$vtCvKU3LvEdMHRbsu19oiuyjUcjuQ2BejoqtPG1WB/ggGEfC1XIUS','2022-06-18 20:36:39',1),(5,'silvi','$2y$10$r4uat.dgRUOEa9oyu7XIf.7K4BVt6ggNfCyyKj8PUD47PF1SzsTR2','2022-06-18 20:49:13',0);
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

-- Dump completed on 2022-06-19 20:05:41
