-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for buku
CREATE DATABASE IF NOT EXISTS `buku` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `buku`;

-- Dumping structure for table buku.kategori
CREATE TABLE IF NOT EXISTS `kategori` (
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kode_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table buku.kategori: ~4 rows (approximately)
INSERT INTO `kategori` (`kode_kategori`, `nama_kategori`) VALUES
	('KAT001', 'Teknologi'),
	('KAT002', 'Fiksi'),
	('KAT003', 'Sejarah'),
	('KAT004', 'Psikologi');

-- Dumping structure for table buku.master_buku
CREATE TABLE IF NOT EXISTS `master_buku` (
  `kode_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(30) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `pengarang` varchar(10) DEFAULT NULL,
  `penerbit` varchar(10) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `deskripsi` text,
  `harga` int DEFAULT NULL,
  PRIMARY KEY (`kode_buku`),
  KEY `kategori` (`kategori`),
  KEY `pengarang` (`pengarang`),
  KEY `penerbit` (`penerbit`),
  CONSTRAINT `master_buku_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`kode_kategori`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `master_buku_ibfk_2` FOREIGN KEY (`pengarang`) REFERENCES `pengarang` (`kode_pengarang`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `master_buku_ibfk_3` FOREIGN KEY (`penerbit`) REFERENCES `penerbit` (`kode_penerbit`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table buku.master_buku: ~4 rows (approximately)
INSERT INTO `master_buku` (`kode_buku`, `judul_buku`, `kategori`, `pengarang`, `penerbit`, `tahun`, `deskripsi`, `harga`) VALUES
	('B001', 'Belajar PHP Dasar', 'KAT001', 'PEN001', 'PUB001', '2022', 'Panduan belajar PHP untuk pemula.', 85000),
	('B002', 'Petualangan Si Kancil', 'KAT002', 'PEN002', 'PUB002', '2020', 'Cerita fiksi anak-anak.', 50000),
	('B003', 'Sejarah Nusantara', 'KAT003', 'PEN003', 'PUB003', '2018', 'Buku sejarah Indonesia dari masa ke masa.', 120000),
	('B004', 'Dark Psychology', 'KAT004', 'PEN003', 'PUB003', '2012', 'Dark psychology adalah istilah yang mengeksplorasi bagaimana teknik manipulatif dan pengendalian dapat memengaruhi pikiran serta perilaku seseorang. Istilah ini sering kali merujuk pada penggunaan psikologi untuk tujuan yang tidak etis atau berbahaya, termasuk teknik manipulasi, penipuan, dan eksploitasi emosional.', 125000);

-- Dumping structure for table buku.penerbit
CREATE TABLE IF NOT EXISTS `penerbit` (
  `kode_penerbit` varchar(10) NOT NULL,
  `nama_penerbit` varchar(30) DEFAULT NULL,
  `kota_penerbit` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kode_penerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table buku.penerbit: ~3 rows (approximately)
INSERT INTO `penerbit` (`kode_penerbit`, `nama_penerbit`, `kota_penerbit`) VALUES
	('PUB001', 'Gramedia', 'Jakarta'),
	('PUB002', 'Erlangga', 'Bandung'),
	('PUB003', 'Deepublish', 'Yogyakarta');

-- Dumping structure for table buku.pengarang
CREATE TABLE IF NOT EXISTS `pengarang` (
  `kode_pengarang` varchar(10) NOT NULL,
  `nama_pengarang` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kode_pengarang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table buku.pengarang: ~3 rows (approximately)
INSERT INTO `pengarang` (`kode_pengarang`, `nama_pengarang`) VALUES
	('PEN001', 'Andi Pratama'),
	('PEN002', 'Siti Rahma'),
	('PEN003', 'Budi Santoso');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
