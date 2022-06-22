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


-- Dumping database structure for perpustakaan
CREATE DATABASE IF NOT EXISTS `perpustakaan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `perpustakaan`;

-- Dumping structure for table perpustakaan.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `jabatan` varchar(256) NOT NULL,
  `no_hp` varchar(256) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table perpustakaan.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id_admin`, `email`, `password`, `nama`, `jabatan`, `no_hp`, `alamat`) VALUES
  (5, 'rhadi.indrawankkpi@gmail.com', '$2y$12$AmuatGLvupAxS0aA4Nk50O1O8rxZtI6HWQQ7ocfOuYmkBJnol0WdG', 'Rhadi Indrawan', 'Bos', '085255554789', 'Pongtiku');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_anggota
CREATE TABLE IF NOT EXISTS `tb_anggota` (
  `kode_agt` varchar(200) NOT NULL,
  `nama_agt` varchar(200) DEFAULT NULL,
  `jkl_agt` varchar(200) DEFAULT NULL,
  `no_telp` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `foto` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`kode_agt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpustakaan.tb_anggota: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_anggota` DISABLE KEYS */;
INSERT INTO `tb_anggota` (`kode_agt`, `nama_agt`, `jkl_agt`, `no_telp`, `alamat`, `foto`) VALUES
  ('AGT460356342', 'hulk', 'L', '085255554789', 'Pongtiku', '1223585626hulk.jpg');
/*!40000 ALTER TABLE `tb_anggota` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_buku
CREATE TABLE IF NOT EXISTS `tb_buku` (
  `kode_buku` varchar(50) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `penulis` varchar(50) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `thn_terbit` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `id_rak` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpustakaan.tb_buku: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_buku` DISABLE KEYS */;
INSERT INTO `tb_buku` (`kode_buku`, `judul`, `penulis`, `penerbit`, `thn_terbit`, `stok`, `id_rak`) VALUES
  ('BOOK1277307004', 'Kapal Pecah', 'Rhadi', 'erlangga', 2020, 200, 5),
  ('BOOK628597328', 'pedoman', 'rhadi', 'erlangga', 2020, 40, 6),
  ('BOOK79825963', 'Resep Makanan', 'Ahmad', 'erlangga', 2019, 50, 1);
/*!40000 ALTER TABLE `tb_buku` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_peminjaman
CREATE TABLE IF NOT EXISTS `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `kode_buku` varchar(50) DEFAULT NULL,
  `kode_agt` varchar(200) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_peminjaman`),
  KEY `kode_buku` (`kode_buku`),
  KEY `kode_agt` (`kode_agt`),
  KEY `id_petugas` (`id_admin`) USING BTREE,
  CONSTRAINT `tb_peminjaman_ibfk_1` FOREIGN KEY (`kode_buku`) REFERENCES `tb_buku` (`kode_buku`),
  CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`kode_agt`) REFERENCES `tb_anggota` (`kode_agt`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpustakaan.tb_peminjaman: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_peminjaman` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_peminjaman` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_pengembalian
CREATE TABLE IF NOT EXISTS `tb_pengembalian` (
  `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tgl_dikembalikan` date DEFAULT NULL,
  `denda` double DEFAULT NULL,
  `kode_buku` varchar(50) DEFAULT NULL,
  `kode_agt` varchar(200) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pengembalian`),
  KEY `kode_buku` (`kode_buku`),
  KEY `kode_agt` (`kode_agt`),
  KEY `id_petugas` (`id_admin`) USING BTREE,
  CONSTRAINT `tb_pengembalian_ibfk_1` FOREIGN KEY (`kode_buku`) REFERENCES `tb_buku` (`kode_buku`),
  CONSTRAINT `tb_pengembalian_ibfk_2` FOREIGN KEY (`kode_agt`) REFERENCES `tb_anggota` (`kode_agt`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpustakaan.tb_pengembalian: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_pengembalian` DISABLE KEYS */;
INSERT INTO `tb_pengembalian` (`id_pengembalian`, `tgl_pinjam`, `tgl_kembali`, `tgl_dikembalikan`, `denda`, `kode_buku`, `kode_agt`, `id_admin`) VALUES
  (2, '2022-05-30', '2022-05-31', '2022-06-02', 2000, 'BOOK628597328', 'AGT460356342', 5),
  (3, '2022-05-30', '2022-06-09', '2022-06-02', 0, 'BOOK79825963', 'AGT460356342', 5);
/*!40000 ALTER TABLE `tb_pengembalian` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_rak
CREATE TABLE IF NOT EXISTS `tb_rak` (
  `id_rak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(150) DEFAULT NULL,
  `lokasi_rak` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table perpustakaan.tb_rak: ~5 rows (approximately)
/*!40000 ALTER TABLE `tb_rak` DISABLE KEYS */;
INSERT INTO `tb_rak` (`id_rak`, `nama_rak`, `lokasi_rak`) VALUES
  (1, 'ilmu sains', 'di depan'),
  (2, 'ilmu hukum', 'di depan'),
  (3, 'ilmu fisika', 'di depan'),
  (5, 'ilmu geologi', 'di depan'),
  (6, 'ilmu agama', 'di depan');
/*!40000 ALTER TABLE `tb_rak` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
