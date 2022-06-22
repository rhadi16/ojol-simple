-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ojol-simple
CREATE DATABASE IF NOT EXISTS `ojol-simple` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `ojol-simple`;

-- Dumping structure for table ojol-simple.driver
CREATE TABLE IF NOT EXISTS `driver` (
  `id_driver` int(11) NOT NULL AUTO_INCREMENT,
  `nama_driver` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_driver`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ojol-simple.driver: ~0 rows (approximately)
/*!40000 ALTER TABLE `driver` DISABLE KEYS */;
INSERT INTO `driver` (`id_driver`, `nama_driver`, `email`, `password`, `no_hp`) VALUES
	(1, 'rhadi indrawan', 'rhadi.indrawankkpi@gmail.com', '$2y$12$8KCeJTY3teYdP7dCswTr7uSQCED3kAgSmpzy0/6XQLKI4fWQELmi.', '085255554789');
/*!40000 ALTER TABLE `driver` ENABLE KEYS */;

-- Dumping structure for table ojol-simple.orderan
CREATE TABLE IF NOT EXISTS `orderan` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_passenger` int(11) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lon` varchar(50) DEFAULT NULL,
  `tujuan` varchar(150) DEFAULT NULL,
  `id_driver` int(11) DEFAULT NULL,
  `stat_order` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ojol-simple.orderan: ~2 rows (approximately)
/*!40000 ALTER TABLE `orderan` DISABLE KEYS */;
INSERT INTO `orderan` (`id_order`, `id_passenger`, `lat`, `lon`, `tujuan`, `id_driver`, `stat_order`) VALUES
	(3, 1, '-5.1239631', '119.4318805', 'jl. pongtiku 1 no. 13', 1, 'Selesai'),
	(5, 1, '-5.1402165', '119.4832745', 'Sunu', 0, 'Mencari Driver');
/*!40000 ALTER TABLE `orderan` ENABLE KEYS */;

-- Dumping structure for table ojol-simple.passenger
CREATE TABLE IF NOT EXISTS `passenger` (
  `id_passenger` int(11) NOT NULL AUTO_INCREMENT,
  `nama_passenger` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_passenger`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table ojol-simple.passenger: ~0 rows (approximately)
/*!40000 ALTER TABLE `passenger` DISABLE KEYS */;
INSERT INTO `passenger` (`id_passenger`, `nama_passenger`, `email`, `password`, `no_hp`) VALUES
	(1, 'amran', 'amran@amran.com', '$2y$12$mxU2gwa7y0KdmXui4.Clier9rmpkaHZWbyocoxaQFWiskYLITE3bq', '085255554789');
/*!40000 ALTER TABLE `passenger` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
