-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.44-0ubuntu0.14.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             8.3.0.4829
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for apotek
CREATE DATABASE IF NOT EXISTS `apotek` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `apotek`;


-- Dumping structure for table apotek.golongan
CREATE TABLE IF NOT EXISTS `golongan` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nama_gol` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.golongan: ~1 rows (approximately)
/*!40000 ALTER TABLE `golongan` DISABLE KEYS */;
INSERT INTO `golongan` (`id`, `nama_gol`, `created_at`, `updated_at`) VALUES
	(2, 'OBAT LUAR', '2015-08-16 12:12:28', '2015-08-16 12:12:28');
/*!40000 ALTER TABLE `golongan` ENABLE KEYS */;


-- Dumping structure for table apotek.merk
CREATE TABLE IF NOT EXISTS `merk` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nama_merk` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.merk: ~3 rows (approximately)
/*!40000 ALTER TABLE `merk` DISABLE KEYS */;
INSERT INTO `merk` (`id`, `nama_merk`, `updated_at`, `created_at`) VALUES
	(1, 'FARMA', '2015-07-20 13:27:20', '2015-07-20 13:27:20'),
	(3, 'KIMIA FARMA', '2015-08-18 13:23:24', '2015-08-18 13:23:24'),
	(4, 'KAPSUL', '2015-08-18 13:54:47', '2015-08-18 13:54:47');
/*!40000 ALTER TABLE `merk` ENABLE KEYS */;


-- Dumping structure for table apotek.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.migrations: ~17 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2015_07_11_154457_create_golongan_table', 1),
	('2015_07_11_154457_create_merk_table', 1),
	('2015_07_11_154457_create_obat_table', 1),
	('2015_07_11_154457_create_password_resets_table', 1),
	('2015_07_11_154457_create_permission_role_table', 1),
	('2015_07_11_154457_create_permission_user_table', 1),
	('2015_07_11_154457_create_permissions_table', 1),
	('2015_07_11_154457_create_rak_table', 1),
	('2015_07_11_154457_create_role_user_table', 1),
	('2015_07_11_154457_create_roles_table', 1),
	('2015_07_11_154457_create_satuan_table', 1),
	('2015_07_11_154457_create_supplier_table', 1),
	('2015_07_11_154457_create_users_table', 1),
	('2015_07_11_154458_add_foreign_keys_to_obat_table', 1),
	('2015_07_11_154458_add_foreign_keys_to_permission_role_table', 1),
	('2015_07_11_154458_add_foreign_keys_to_permission_user_table', 1),
	('2015_07_11_154458_add_foreign_keys_to_role_user_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table apotek.obat
CREATE TABLE IF NOT EXISTS `obat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plu` int(11) DEFAULT NULL,
  `nama_obat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `golongan` tinyint(1) DEFAULT NULL,
  `merk` tinyint(1) DEFAULT NULL,
  `supplier` tinyint(1) DEFAULT NULL,
  `rak` tinyint(1) DEFAULT NULL,
  `diskon` tinyint(1) DEFAULT NULL,
  `satuan` tinyint(1) DEFAULT NULL,
  `satuan_beli` tinyint(1) DEFAULT NULL,
  `isi` tinyint(1) DEFAULT NULL,
  `hpp` int(11) DEFAULT NULL,
  `harga_nr` int(11) DEFAULT NULL,
  `harga_rsp` int(11) DEFAULT NULL,
  `harga_kh` int(11) DEFAULT NULL,
  `status` enum('J','T') COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_obat_golongan` (`golongan`),
  KEY `FK_obat_merk` (`merk`),
  KEY `FK_obat_supplier` (`supplier`),
  KEY `FK_obat_merk_2` (`rak`),
  KEY `FK_obat_satuan` (`satuan`),
  KEY `FK_obat_satuan_2` (`satuan_beli`),
  CONSTRAINT `FK_obat_golongan` FOREIGN KEY (`golongan`) REFERENCES `golongan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_obat_merk` FOREIGN KEY (`merk`) REFERENCES `merk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_obat_merk_2` FOREIGN KEY (`rak`) REFERENCES `merk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_obat_satuan` FOREIGN KEY (`satuan`) REFERENCES `satuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_obat_satuan_2` FOREIGN KEY (`satuan_beli`) REFERENCES `satuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_obat_supplier` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.obat: ~0 rows (approximately)
/*!40000 ALTER TABLE `obat` DISABLE KEYS */;
/*!40000 ALTER TABLE `obat` ENABLE KEYS */;


-- Dumping structure for table apotek.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table apotek.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table apotek.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.permission_role: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;


-- Dumping structure for table apotek.permission_user
CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_index` (`permission_id`),
  KEY `permission_user_user_id_index` (`user_id`),
  CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.permission_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `permission_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_user` ENABLE KEYS */;


-- Dumping structure for table apotek.rak
CREATE TABLE IF NOT EXISTS `rak` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.rak: ~3 rows (approximately)
/*!40000 ALTER TABLE `rak` DISABLE KEYS */;
INSERT INTO `rak` (`id`, `nama_rak`, `created_at`, `updated_at`) VALUES
	(1, 'RAK 1', '2015-07-20 13:27:20', '2015-07-20 14:32:24'),
	(2, 'RAK 2', '2015-07-20 13:32:09', '2015-07-20 13:32:09'),
	(3, 'RAK 3', '2015-07-20 13:33:29', '2015-07-20 13:33:29');
/*!40000 ALTER TABLE `rak` ENABLE KEYS */;


-- Dumping structure for table apotek.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table apotek.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_index` (`role_id`),
  KEY `role_user_user_id_index` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.role_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;


-- Dumping structure for table apotek.satuan
CREATE TABLE IF NOT EXISTS `satuan` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.satuan: ~2 rows (approximately)
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
INSERT INTO `satuan` (`id`, `nama_satuan`, `created_at`, `updated_at`) VALUES
	(1, 'BOTOL 123', '2015-07-20 13:27:20', '2015-08-18 13:54:31'),
	(2, 'KAPSUL', '2015-08-18 14:01:53', '2015-08-18 14:01:53');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;


-- Dumping structure for table apotek.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `nama_supl` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.supplier: ~1 rows (approximately)
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id`, `nama_supl`, `created_at`, `updated_at`) VALUES
	(1, 'ROISUL ASOLOLE', '2015-07-20 13:27:21', '2015-08-19 02:09:09');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;


-- Dumping structure for table apotek.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table apotek.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'roisul', 'saya@gmail.com', '$2y$10$4ytn4NXSBiwPk7f6dvlXHelUhVBgTszfvAtf5FpM3f0dwYn9.rFtO', 'mi1i2e8wjBFwCJvRzh5R4APTQWmoWnTz1CJsrU3DNrv4oHwNYANuTemuVP26', '2015-07-20 13:27:20', '2015-08-18 03:51:57');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
