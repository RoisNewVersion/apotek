-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2015 at 02:39 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
`id` int(1) NOT NULL,
  `nama_gol` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `nama_gol`, `created_at`, `updated_at`) VALUES
(1, 'OBAT DALAM', '2015-08-19 19:02:36', '2015-08-19 19:02:36'),
(2, 'OBAT LUAR', '0000-00-00 00:00:00', '2015-08-26 03:18:33'),
(3, 'OBAT RESEP', '0000-00-00 00:00:00', '2015-08-26 03:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE IF NOT EXISTS `merk` (
`id` int(2) NOT NULL,
  `nama_merk` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id`, `nama_merk`, `created_at`, `updated_at`) VALUES
(1, 'FARMA', '2015-08-19 19:02:36', '2015-08-19 19:02:36'),
(2, 'KIMIA FARMA', '2015-08-26 05:35:30', '2015-08-26 05:35:30'),
(3, 'OSKADON', '2015-08-26 05:35:41', '2015-08-26 05:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

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
('2015_07_11_154458_add_foreign_keys_to_role_user_table', 1),
('2015_08_19_134602_create_golongan_table', 0),
('2015_08_19_134602_create_merk_table', 0),
('2015_08_19_134602_create_obat_table', 0),
('2015_08_19_134602_create_password_resets_table', 0),
('2015_08_19_134602_create_permission_role_table', 0),
('2015_08_19_134602_create_permission_user_table', 0),
('2015_08_19_134602_create_permissions_table', 0),
('2015_08_19_134602_create_rak_table', 0),
('2015_08_19_134602_create_role_user_table', 0),
('2015_08_19_134602_create_roles_table', 0),
('2015_08_19_134602_create_satuan_table', 0),
('2015_08_19_134602_create_supplier_table', 0),
('2015_08_19_134602_create_users_table', 0),
('2015_08_19_134605_add_foreign_keys_to_permission_role_table', 0),
('2015_08_19_134605_add_foreign_keys_to_permission_user_table', 0),
('2015_08_19_134605_add_foreign_keys_to_role_user_table', 0),
('2015_08_19_140652_create_golongan_table', 0),
('2015_08_19_140652_create_merk_table', 0),
('2015_08_19_140652_create_obat_table', 0),
('2015_08_19_140652_create_password_resets_table', 0),
('2015_08_19_140652_create_permission_role_table', 0),
('2015_08_19_140652_create_permission_user_table', 0),
('2015_08_19_140652_create_permissions_table', 0),
('2015_08_19_140652_create_rak_table', 0),
('2015_08_19_140652_create_role_user_table', 0),
('2015_08_19_140652_create_roles_table', 0),
('2015_08_19_140652_create_satuan_table', 0),
('2015_08_19_140652_create_supplier_table', 0),
('2015_08_19_140652_create_users_table', 0),
('2015_08_19_140653_add_foreign_keys_to_obat_table', 0),
('2015_08_19_140653_add_foreign_keys_to_permission_role_table', 0),
('2015_08_19_140653_add_foreign_keys_to_permission_user_table', 0),
('2015_08_19_140653_add_foreign_keys_to_role_user_table', 0),
('2015_08_20_022623_create_golongan_table', 0),
('2015_08_20_022623_create_merk_table', 0),
('2015_08_20_022623_create_obat_table', 0),
('2015_08_20_022623_create_password_resets_table', 0),
('2015_08_20_022623_create_permission_role_table', 0),
('2015_08_20_022623_create_permission_user_table', 0),
('2015_08_20_022623_create_permissions_table', 0),
('2015_08_20_022623_create_rak_table', 0),
('2015_08_20_022623_create_role_user_table', 0),
('2015_08_20_022623_create_roles_table', 0),
('2015_08_20_022623_create_satuan_table', 0),
('2015_08_20_022623_create_supplier_table', 0),
('2015_08_20_022623_create_users_table', 0),
('2015_08_20_022625_add_foreign_keys_to_obat_table', 0),
('2015_08_20_022625_add_foreign_keys_to_permission_role_table', 0),
('2015_08_20_022625_add_foreign_keys_to_permission_user_table', 0),
('2015_08_20_022625_add_foreign_keys_to_role_user_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
`id` int(4) NOT NULL,
  `nama_obat` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `barcode` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `golongan` int(1) NOT NULL,
  `merk` int(1) NOT NULL,
  `supplier` int(1) NOT NULL,
  `rak` int(1) NOT NULL,
  `diskon` int(2) DEFAULT NULL,
  `satuan` int(1) NOT NULL,
  `isi` int(1) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `status` enum('J','T') COLLATE utf8_unicode_ci NOT NULL COMMENT 'masih di JUAL / Tidak',
  `kadaluarsa` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `barcode`, `golongan`, `merk`, `supplier`, `rak`, `diskon`, `satuan`, `isi`, `harga_pokok`, `harga_jual`, `status`, `kadaluarsa`, `created_at`, `updated_at`) VALUES
(1, 'Sariawan', '123456', 1, 1, 3, 1, 10, 1, 10, 5000, 6000, 'J', '2015-12-24', '2015-08-19 20:29:03', '2015-08-26 05:06:51'),
(2, 'amoxilin', '1234234', 3, 1, 3, 1, 5, 2, 100, 300, 500, 'J', '2015-11-02', '2015-08-25 22:02:17', '2015-08-25 22:02:17'),
(3, 'Panas Dalam', '45672345', 1, 1, 3, 2, 3, 1, 15, 4500, 5000, 'J', '2015-11-02', '2015-08-26 05:34:48', '2015-08-26 05:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
`id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE IF NOT EXISTS `permission_user` (
`id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE IF NOT EXISTS `rak` (
`id` int(1) NOT NULL,
  `nama_rak` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id`, `nama_rak`, `created_at`, `updated_at`) VALUES
(1, 'RAK 1', '2015-08-19 19:02:36', '2015-08-19 19:02:36'),
(2, 'RAK 2', '2015-08-21 23:02:55', '2015-08-21 23:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
`id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
`id` int(1) NOT NULL,
  `nama_satuan` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `nama_satuan`, `created_at`, `updated_at`) VALUES
(1, 'BOTOL', '2015-08-19 19:02:36', '2015-08-19 19:02:36'),
(2, 'BUTIR', '2015-08-21 23:01:53', '2015-08-21 23:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id` int(1) NOT NULL,
  `nama_supl` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hp` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supl`, `alamat`, `hp`, `created_at`, `updated_at`) VALUES
(1, 'ROIS', 'semarang', '08965716073', '2015-08-19 19:02:36', '2015-08-25 03:45:31'),
(2, 'TAUFIK 123', 'demak', '089160731123', '2015-08-21 23:00:57', '2015-08-25 03:46:20'),
(3, 'ANITA', 'SALATIGA', '089123456', '2015-08-24 20:57:35', '2015-08-24 20:57:35'),
(4, 'ANITA 123', 'SALATIGA 123', '089123456', '2015-08-24 20:57:35', '2015-08-24 20:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'roisul', 'saya@gmail.com', '$2y$10$tZ4b7N8MSEb4z8Ifl5BxxOjFqmdU89zxYwKyQ02pNK9gllytamAwS', '5NH3ula7oXQBB0ZAs8BBV8Hbngg7BL93S9VKKudbL1zk9T44WR3zGDoO8M17', '2015-08-19 19:02:36', '2015-08-25 05:36:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
 ADD PRIMARY KEY (`id`), ADD KEY `FK_obat_golongan` (`golongan`), ADD KEY `FK_obat_merk` (`merk`), ADD KEY `FK_obat_supplier` (`supplier`), ADD KEY `FK_obat_rak` (`rak`), ADD KEY `FK_obat_satuan` (`satuan`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
 ADD PRIMARY KEY (`id`), ADD KEY `permission_role_permission_id_index` (`permission_id`), ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
 ADD PRIMARY KEY (`id`), ADD KEY `permission_user_permission_id_index` (`permission_id`), ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
 ADD PRIMARY KEY (`id`), ADD KEY `role_user_role_id_index` (`role_id`), ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permission_user`
--
ALTER TABLE `permission_user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
ADD CONSTRAINT `FK_obat_golongan` FOREIGN KEY (`golongan`) REFERENCES `golongan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_obat_merk` FOREIGN KEY (`merk`) REFERENCES `merk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_obat_rak` FOREIGN KEY (`rak`) REFERENCES `rak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_obat_satuan` FOREIGN KEY (`satuan`) REFERENCES `satuan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_obat_supplier` FOREIGN KEY (`supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
