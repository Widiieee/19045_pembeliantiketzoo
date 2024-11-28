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


-- Dumping database structure for 19045_pembeliantiketzoo
CREATE DATABASE IF NOT EXISTS `19045_pembeliantiketzoo` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `19045_pembeliantiketzoo`;

-- Dumping structure for table 19045_pembeliantiketzoo.fasilitas_servis
CREATE TABLE IF NOT EXISTS `fasilitas_servis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_fasilitas` varchar(50) NOT NULL DEFAULT '0',
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table 19045_pembeliantiketzoo.fasilitas_servis: ~0 rows (approximately)
INSERT INTO `fasilitas_servis` (`id`, `nama_fasilitas`, `deskripsi`) VALUES
	(1, 'Area Parkir Luas', 'Tersedia area parkir yang luas dan aman untuk pengunjung, termasuk tempat parkir khusus untuk kendaraan roda dua dan roda empat. Jadi pengunjung tidak perlu hawatir.'),
	(2, 'Foto Bersama Satwa', 'Pengunjung dapat berinteraksi langsung dengan beberapa satwa tertentu dan mengabadikan momen bersama mereka. Ini dilakukan dengan pengawasan petugas untuk memastikan keselamatan pengunjung dan kesejahteraan satwa.'),
	(3, 'Pemandu Wisata', 'Pemandu profesional yang memberikan informasi menarik tentang tempat wisata, satwa, atau fasilitas lainnya. Mereka membantu pengunjung mendapatkan pengalaman lebih bermakna selama kunjungan.'),
	(4, 'Restoran dan Kafe', 'Menyediakan berbagai pilihan makanan dan minuman, dari camilan hingga hidangan lengkap. Tempat ini nyaman untuk bersantai setelah berkeliling lokasi wisata.'),
	(5, 'Toko Souvenir', 'Menawarkan berbagai produk khas seperti cendera mata, kerajinan tangan, dan barang-barang bertema wisata. Cocok untuk oleh-oleh bagi keluarga atau teman.'),
	(6, 'Wi-Fi Gratis', 'Fasilitas internet gratis yang memudahkan pengunjung untuk berbagi pengalaman secara online, mencari informasi, atau tetap terhubung selama berada di lokasi.'),
	(7, 'Area Bermain Anak', 'Ruang bermain khusus yang dirancang untuk anak-anak, dilengkapi permainan yang aman dan menyenangkan. Tempat ini membantu keluarga menikmati kunjungan bersama.'),
	(8, 'Ruang Istirahat', 'Area khusus yang nyaman untuk beristirahat, dilengkapi dengan tempat duduk dan fasilitas lainnya. Cocok untuk pengunjung yang membutuhkan jeda sejenak sebelum melanjutkan aktivitas di lokasi wisata.'),
	(9, 'Petting Zoo', 'Area interaktif di mana pengunjung, terutama anak-anak, dapat berinteraksi langsung dengan hewan-hewan jinak seperti kelinci, kambing, dan domba.'),
	(10, 'Aquadome', 'Wahana air yang menampilkan kehidupan laut, di mana pengunjung bisa menikmati pemandangan ikan dan makhluk laut lainnya melalui akuarium raksasa.'),
	(11, 'Safari Satwa Liar', 'Wahana ini mengajak pengunjung untuk berkeliling melihat satwa liar di habitat yang mirip dengan aslinya. Dilengkapi dengan kendaraan terbuka, pengunjung dapat menikmati perjalanan sambil melihat satwa dari jarak dekat.');

-- Dumping structure for table 19045_pembeliantiketzoo.harga_tiket
CREATE TABLE IF NOT EXISTS `harga_tiket` (
  `id_harga` int NOT NULL AUTO_INCREMENT,
  `nama_tiket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` varchar(50) NOT NULL DEFAULT '',
  `kategori` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_harga`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table 19045_pembeliantiketzoo.harga_tiket: ~0 rows (approximately)
INSERT INTO `harga_tiket` (`id_harga`, `nama_tiket`, `harga`, `kategori`, `deskripsi`) VALUES
	(1, 'Tiket Dewasa', '20000', 'Reguler Senin-Jumat', 'Tiket Reguler khusus untuk diatas 7 tahun'),
	(2, 'Tiket Anak-Anak', '15000', 'Reguler Senin-Jumat', 'Tiket untuk anak-anak dibawah 7 tahun'),
	(3, 'Tiket Dewasa', '25000', 'Sabtu, Minggu & Hari Libur Nasional', 'Tiket untuk dewasa 7 tahun ke atas. Harga tiket ini berlaku saat hari Sabtu, Minggu dan hari libur nasional.'),
	(4, 'Tiket Anak-Anak', '20000', 'Sabtu, Minggu & Hari Libur Nasional', 'Tiket untuk anak-naka dibawah usia 7 tahun');

-- Dumping structure for table 19045_pembeliantiketzoo.pesan
CREATE TABLE IF NOT EXISTS `pesan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pengirim` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table 19045_pembeliantiketzoo.pesan: ~2 rows (approximately)
INSERT INTO `pesan` (`id`, `nama_pengirim`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
	(1, 'Widiatri Nur Zahra', 'Widiatrinurzahra.22@gmail.com', 'Kritik dan Saran', 'Saya kxsixosio,xdisodiwoidow,diw', '2024-11-27 13:40:17'),
	(2, 'Yafi Alifia Zahida', 'yafialza@gmail.com', 'Kritik dan Saran', 'Saya kxsixosio,xdisodiwoidow,diw', '2024-11-27 13:41:57'),
	(3, 'Oriza Sativa', 'orizastfa@gmail.com', 'Saran', 'saran saya\r\nmssjsa soix\r\njmxsxis\r\nxjsmxisx', '2024-11-28 07:49:33');

-- Dumping structure for table 19045_pembeliantiketzoo.satwa
CREATE TABLE IF NOT EXISTS `satwa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_satwa` varchar(50) NOT NULL DEFAULT '0',
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table 19045_pembeliantiketzoo.satwa: ~0 rows (approximately)
INSERT INTO `satwa` (`id`, `nama_satwa`, `foto`) VALUES
	(2, 'Zebra', '866145764_animal-md-2.jpg'),
	(3, 'Jerapah', '890770957_animal-lg-3.jpg'),
	(4, 'Harimau', '1721848300_bg-1.jpg'),
	(5, 'Gajah', '1968627082_animal-md-3.jpg'),
	(6, 'Kucing', 'animal-lg-2.jpg');

-- Dumping structure for table 19045_pembeliantiketzoo.status_tiket
CREATE TABLE IF NOT EXISTS `status_tiket` (
  `id_status` int NOT NULL AUTO_INCREMENT,
  `id_tiket` int NOT NULL,
  `status` enum('booked','claimed','cancel','expired') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_status`),
  KEY `FK_status_tiket_tiket` (`id_tiket`),
  CONSTRAINT `FK_status_tiket_tiket` FOREIGN KEY (`id_tiket`) REFERENCES `tiket` (`id_tiket`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table 19045_pembeliantiketzoo.status_tiket: ~0 rows (approximately)
INSERT INTO `status_tiket` (`id_status`, `id_tiket`, `status`) VALUES
	(2, 9, 'claimed'),
	(3, 10, 'claimed'),
	(4, 11, 'claimed'),
	(5, 12, 'booked'),
	(6, 13, 'booked');

-- Dumping structure for table 19045_pembeliantiketzoo.tabel_admin
CREATE TABLE IF NOT EXISTS `tabel_admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table 19045_pembeliantiketzoo.tabel_admin: ~0 rows (approximately)
INSERT INTO `tabel_admin` (`id`, `username`, `password`) VALUES
	(1, 'faunatopia', 'admin');

-- Dumping structure for table 19045_pembeliantiketzoo.tiket
CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` int NOT NULL AUTO_INCREMENT,
  `id_harga` int NOT NULL DEFAULT '0',
  `nama_tiket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga` varchar(50) NOT NULL DEFAULT '',
  `nama_pemesan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nomor_telepon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jumlah_tiket` int NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `total_harga` varchar(50) NOT NULL DEFAULT '',
  `tanggal_pemesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tiket`),
  KEY `FK_tiket_harga_tiket` (`id_harga`),
  CONSTRAINT `FK_tiket_harga_tiket` FOREIGN KEY (`id_harga`) REFERENCES `harga_tiket` (`id_harga`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table 19045_pembeliantiketzoo.tiket: ~0 rows (approximately)
INSERT INTO `tiket` (`id_tiket`, `id_harga`, `nama_tiket`, `kategori`, `harga`, `nama_pemesan`, `email`, `nomor_telepon`, `jumlah_tiket`, `tanggal_kunjungan`, `total_harga`, `tanggal_pemesanan`) VALUES
	(9, 4, 'Tiket Anak-Anak', 'Sabtu, Minggu & Hari Libur Nasional', '20000', 'Widiatri Nur Zahra', 'Widiatrinurzahra.22@gmail.com', '082264478231', 1, '2024-11-28', '20000', '2024-11-27 06:45:32'),
	(10, 2, 'Tiket Anak-Anak', 'Reguler Senin-Jumat', '15000', 'Oriza Sativa', 'orizastfa@gmail.com', '08960479692', 3, '2024-11-28', '45000', '2024-11-27 06:53:59'),
	(11, 3, 'Tiket Dewasa', 'Sabtu, Minggu & Hari Libur Nasional', '25000', 'Yafi Alifia Zahida', 'yafialza@gmail.com', '088877766655', 2, '2024-11-29', '50000', '2024-11-27 07:06:31'),
	(12, 3, 'Tiket Dewasa', 'Sabtu, Minggu & Hari Libur Nasional', '25000', 'Oriza Sativa', 'orizastfa@gmail.com', '08960479692', 3, '2024-11-29', '75000', '2024-11-27 07:59:09'),
	(13, 1, 'Tiket Dewasa', 'Reguler Senin-Jumat', '20000', 'Kurnia Widi', 'kurniawidip@gmail.com', '082264478251', 4, '2024-11-28', '80000', '2024-11-28 03:30:56');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
