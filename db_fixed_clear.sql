-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 11:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestsbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(10) UNSIGNED NOT NULL,
  `datein` datetime DEFAULT NULL,
  `dateout` datetime DEFAULT NULL,
  `guestsid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noRack` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noLoker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lantai_id` int(11) NOT NULL,
  `ruangan_id` int(11) NOT NULL,
  `access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `durasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_quality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `infrastructure_quality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clean_quality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `datein`, `dateout`, `guestsid`, `name`, `telephone`, `company`, `email`, `activity`, `noRack`, `noLoker`, `lokasi_id`, `lantai_id`, `ruangan_id`, `access`, `remarks`, `durasi`, `foto`, `service_quality`, `infrastructure_quality`, `clean_quality`, `id_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-02-08 18:04:08', NULL, '6791', 'Admin (Permanent)', '082284329183', 'PT NAP Info Lintas Nusa', 'admin@napinfo.co.id', 'Instalasi', '000', '000', '1', 0, 0, '', 'Don\'t Delete This', NULL, '60211aa8a66cf.png', NULL, NULL, NULL, '1', '2021-02-08 11:04:08', '2021-02-08 11:04:08', NULL),
(2, '2021-02-08 18:04:56', '2021-02-08 18:05:22', '7601', 'Aldi Javier', '081319201830', 'PT Garena Indonesia', 'aldijavier42@gmail.com', 'Troubleshoot', '009', '098', '2', 0, 0, '', 'Trouble', '0 Hari 00 Jam 0 Menit 26 Detik', '60211ad88fcaa.png', 'Sangat Memuaskan', 'Memuaskan', 'Sangat Memuaskan', '2', '2021-02-08 11:04:56', '2021-02-08 11:05:22', '2021-02-08 11:05:22'),
(3, '2021-02-08 18:06:00', '2021-02-08 18:21:50', '3166', 'Melvin Chandara', '081329201830', 'PT Cemerlang Nusantara', 'aldijavier42@gmail.com', 'Masuk Barang', '180', '055', '2', 0, 0, '', 'In Out', '0 Hari 00 Jam 15 Menit 50 Detik', '60211b1827232.png', 'Sangat Memuaskan', 'Sangat Memuaskan', 'Sangat Memuaskan', '2', '2021-02-08 11:06:00', '2021-02-08 11:21:50', '2021-02-08 11:21:50'),
(4, '2021-02-08 18:07:05', NULL, '7601', 'Aldi Javier', '081319201830', 'PT Garena Indonesia', 'aldijavier42@gmail.com', 'Instalasi', '009', '098', '2', 0, 0, '', 'Install', NULL, '60211b595311e.png', NULL, NULL, NULL, '1', '2021-02-08 11:07:05', '2021-02-08 11:07:05', NULL),
(5, '2021-02-08 18:22:50', NULL, '689', 'Salsa Hartini', '082284413437', 'PT Nusa Indah Remaja', 'salsa@insani.co.id', 'Masuk Barang', '076', '122', '1', 0, 0, '', 'In', NULL, '60211f0a904fa.png', NULL, NULL, NULL, '1', '2021-02-08 11:22:50', '2021-02-08 11:22:50', NULL),
(6, '2021-02-21 09:18:04', NULL, '4070', 'Sani Sanjoyo', '081312201830', 'PT Nusa Indah Remaja', 'aldijavier42@gmail.com', 'Instalasi', '009', '055', '1', 1, 1, '', 'test', NULL, '6031c2dc5b609.png', NULL, NULL, NULL, '1', '2021-02-21 02:18:04', '2021-02-21 02:18:04', NULL),
(7, '2021-02-21 09:20:01', '2021-02-21 09:54:02', '9458', 'Sinta', '081319101830', 'PT Abadi Makmur', 'aldijavier42@gmail.com', 'Maintenance', '766', '055', '3', 3, 3, '', 'Maintenance', '0 Hari 00 Jam 34 Menit 1 Detik', '6031c351e2865.png', '5', '5', '5', '2', '2021-02-21 02:20:01', '2021-02-21 02:54:02', '2021-02-21 02:54:02'),
(8, '2021-02-24 11:03:53', '2021-02-24 11:04:17', '9458', 'Sinta', '081319101830', 'PT Abadi Makmur', 'aldijavier42@gmail.com', 'Troubleshoot', '233', '002', '1', 1, 1, '', NULL, '0 Hari 00 Jam 0 Menit 24 Detik', '6035d029df94c.png', '5', '5', '5', '2', '2021-02-24 04:03:53', '2021-02-24 04:04:17', '2021-02-24 04:04:17'),
(9, '2021-02-25 11:06:45', '2021-03-02 08:06:18', '5384', 'Bambang Pri', '082260943781', 'PT Insan Remaja Indah', 'bambang@laila.co.id', 'Maintenance', '001', '001', '1', 1, 1, '', 'Maintenance', '4 Hari 20 Jam 59 Menit 33 Detik', '603722558193d.png', '5', '5', '5', '2', '2021-02-25 04:06:45', '2021-03-02 01:06:18', '2021-03-02 01:06:18'),
(10, '2021-03-18 12:20:16', NULL, '4159', 'Aldi Javier', '081319501830', 'PT Nusa Indah Remaja', 'aldijavie42@gmail.com', 'Troubleshoot', '009', '055', '2', 2, 2, '', NULL, NULL, '6052e310af295.png', NULL, NULL, NULL, '1', '2021-03-18 05:20:16', '2021-03-18 05:20:16', NULL),
(11, '2021-03-18 12:56:53', NULL, '6236', 'Sinta', '082260948732', 'PT Nusa Indah Remaja', 'sinta@garena.co.id', 'Instalasi', '003', '002', '3', 3, 3, '', NULL, NULL, '6052eba532d0b.png', NULL, NULL, NULL, '1', '2021-03-18 05:56:53', '2021-03-18 05:56:53', NULL),
(12, '2021-03-18 13:16:52', NULL, '9200', 'Aldi Javier', '081319201830', 'PT Nusa Indah Remaja', 'aldijavier42@gmail.com', 'Maintenance', '222', '098', '1', 1, 1, '', NULL, NULL, '6052f054a7bc2.png', NULL, NULL, NULL, '1', '2021-03-18 06:16:52', '2021-03-18 06:16:52', NULL),
(13, '2021-03-18 13:18:56', NULL, '2799', 'Sani Sanjoyo', '081319202830', 'PT Garena Indonesia', 'aldijavi4r42@gmail.com', 'Instalasi', '909', '889', '1', 1, 1, '', 'nice', NULL, '6052f0d0d0ba2.png', NULL, NULL, NULL, '1', '2021-03-18 06:18:56', '2021-03-18 06:18:56', NULL),
(14, '2021-03-18 13:22:50', NULL, '4861', 'Sinta', '0123124123121', 'PT Cemerlang Nusantara', 'jennifer324@gmail.com', 'Instalasi', '222', '223', '1', 1, 1, '', NULL, NULL, '6052f1bad1ea5.png', NULL, NULL, NULL, '1', '2021-03-18 06:22:50', '2021-03-18 06:22:50', NULL),
(15, '2021-03-22 19:27:58', NULL, '1900', 'Aldi Javier', '081319201830', 'PT Nusa Indah Remaja', 'aldijavier42@gmail.com', 'Troubleshoot', '009', '098', '1', 1, 1, '', NULL, NULL, '60588d4e563cc.png', NULL, NULL, NULL, '1', '2021-03-22 12:27:58', '2021-03-22 12:27:58', NULL),
(16, '2021-03-22 19:40:15', NULL, '302', 'dadang', '081319202830', 'PT Cemerlang Nusantara', 'aldijaeier42@gmail.com', 'Instalasi', '009', '055', '1', 1, 1, '009', 'Nice', NULL, '6058902f3e547.png', NULL, NULL, NULL, '1', '2021-03-22 12:40:15', '2021-03-22 12:40:15', NULL),
(17, '2021-03-24 16:48:04', NULL, '3861', 'Aldi Javier', '081319207830', 'PT Garena Indonesia', 'aldijavier422@gmail.com', 'Maintenance', '006', '009', '1', 1, 1, 'NAP001', 'Nice', NULL, '605b0ad3db320.png', NULL, NULL, NULL, '1', '2021-03-24 09:48:04', '2021-03-24 09:48:04', NULL),
(18, '2021-03-24 17:02:41', NULL, '9579', 'Aldi Javier', '081319201830', 'PT Abadi Makmur', 'aldijavier42@gmail.com', 'Maintenance', '180', '002', '1', 1, 1, 'asd', 'asd', NULL, '605b0e418c0cb.png', NULL, NULL, NULL, '1', '2021-03-24 10:02:41', '2021-03-24 10:02:41', NULL),
(19, '2021-03-24 17:33:23', NULL, '726', 'Sani Sanjoyo', '082260945674', 'PT Abadi Makmur', 'sani@kirana.co.id', 'Troubleshoot', '899', '009', '3', 3, 6, 'NAP003', 'Nice', NULL, '605b157385adb.png', NULL, NULL, NULL, '1', '2021-03-24 10:33:23', '2021-03-24 10:33:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lantais`
--

CREATE TABLE `lantais` (
  `id_lantai` int(10) UNSIGNED NOT NULL,
  `name_lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lantais`
--

INSERT INTO `lantais` (`id_lantai`, `name_lantai`, `id_lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Lt. UG', 1, NULL, NULL),
(2, 'Lt. 1', 2, NULL, NULL),
(3, 'Lt. 1', 3, NULL, NULL),
(4, 'Lt. 2', 3, NULL, NULL),
(5, 'Lt. 1', 4, NULL, NULL),
(6, 'Lt. 2', 4, NULL, NULL),
(7, 'Lt. 1', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lokasis`
--

CREATE TABLE `lokasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasis`
--

INSERT INTO `lokasis` (`id`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'MDC JK1 - Plaza Kuningan', '2021-01-13 11:38:02', NULL),
(2, 'MDC JK2 - Cyber 1', '2021-01-13 11:38:10', NULL),
(3, 'MDC JK3 - Pantai Mutiara', '2021-02-16 08:14:25', '2021-02-16 08:14:25'),
(4, 'MDC BM1 - Nongsa', '2021-02-16 08:14:44', '2021-02-16 08:14:44'),
(5, 'MDC SG1 - North Changi', '2021-02-16 08:15:03', '2021-02-16 08:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_19_021943_create_guests_table', 1),
(4, '2021_01_19_044511_create_lokasis_table', 2),
(5, '2021_01_19_044634_create_lokasis_table', 3),
(6, '2021_01_19_052234_create_guests_table', 4),
(7, '2021_01_19_052313_create_guests_table', 5),
(8, '2021_01_19_060645_create_guests_table', 6),
(9, '2021_01_19_082445_create_statuses_table', 7),
(10, '2021_02_08_102753_add_soft_delete_on_guests_table', 8),
(11, '2021_02_17_120330_create_lantais_table', 9),
(12, '2021_02_17_120349_create_ruangs_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangs`
--

CREATE TABLE `ruangs` (
  `id_ruang` int(10) UNSIGNED NOT NULL,
  `name_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantais` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangs`
--

INSERT INTO `ruangs` (`id_ruang`, `name_ruang`, `lantais`, `created_at`, `updated_at`) VALUES
(1, 'DC', 1, NULL, NULL),
(2, 'UPS Room', 1, NULL, NULL),
(3, 'DC', 2, NULL, NULL),
(4, 'MMR', 2, NULL, NULL),
(5, 'DCA', 3, NULL, NULL),
(6, 'DCB', 3, NULL, NULL),
(7, 'MMR', 3, NULL, NULL),
(8, 'DC', 4, NULL, NULL),
(9, 'MMR', 4, NULL, NULL),
(10, 'Changi Room', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Check In', NULL, NULL),
(2, 'Check Out', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@napinfo.co.id', '$2y$10$sAf3Hl.QkGg/LcpmRnj69./CQWZj7DOuBJzV2a9W8Kofmb4X1/2YW', 'cOFbFBqgJGCkVaX4T6wlNltZY3npLzG4eBSmGyVbaXRQxQEM2ZAM6bAgw3eP', '2021-01-26 11:01:01', '2021-01-26 11:01:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lantais`
--
ALTER TABLE `lantais`
  ADD PRIMARY KEY (`id_lantai`);

--
-- Indexes for table `lokasis`
--
ALTER TABLE `lokasis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ruangs`
--
ALTER TABLE `ruangs`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `lantais`
--
ALTER TABLE `lantais`
  MODIFY `id_lantai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lokasis`
--
ALTER TABLE `lokasis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ruangs`
--
ALTER TABLE `ruangs`
  MODIFY `id_ruang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
