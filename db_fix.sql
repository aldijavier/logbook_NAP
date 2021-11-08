-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 06:12 AM
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

INSERT INTO `guests` (`id`, `datein`, `dateout`, `guestsid`, `name`, `telephone`, `company`, `email`, `activity`, `noRack`, `noLoker`, `lokasi_id`, `lantai_id`, `ruangan_id`, `remarks`, `durasi`, `foto`, `service_quality`, `infrastructure_quality`, `clean_quality`, `id_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2021-02-08 18:04:08', NULL, '6791', 'Admin (Permanent)', '082284329183', 'PT NAP Info Lintas Nusa', 'admin@napinfo.co.id', 'Instalasi', '000', '000', '1', 0, 0, 'Don\'t Delete This', NULL, '60211aa8a66cf.png', NULL, NULL, NULL, '1', '2021-02-08 11:04:08', '2021-02-08 11:04:08', NULL),
(2, '2021-02-08 18:04:56', '2021-02-08 18:05:22', '7601', 'Aldi Javier', '081319201830', 'PT Garena Indonesia', 'aldijavier42@gmail.com', 'Troubleshoot', '009', '098', '2', 0, 0, 'Trouble', '0 Hari 00 Jam 0 Menit 26 Detik', '60211ad88fcaa.png', 'Sangat Memuaskan', 'Memuaskan', 'Sangat Memuaskan', '2', '2021-02-08 11:04:56', '2021-02-08 11:05:22', '2021-02-08 11:05:22'),
(3, '2021-02-08 18:06:00', '2021-02-08 18:21:50', '3166', 'Melvin Chandara', '081329201830', 'PT Cemerlang Nusantara', 'aldijavier42@gmail.com', 'Masuk Barang', '180', '055', '2', 0, 0, 'In Out', '0 Hari 00 Jam 15 Menit 50 Detik', '60211b1827232.png', 'Sangat Memuaskan', 'Sangat Memuaskan', 'Sangat Memuaskan', '2', '2021-02-08 11:06:00', '2021-02-08 11:21:50', '2021-02-08 11:21:50'),
(4, '2021-02-08 18:07:05', NULL, '7601', 'Aldi Javier', '081319201830', 'PT Garena Indonesia', 'aldijavier42@gmail.com', 'Instalasi', '009', '098', '2', 0, 0, 'Install', NULL, '60211b595311e.png', NULL, NULL, NULL, '1', '2021-02-08 11:07:05', '2021-02-08 11:07:05', NULL),
(5, '2021-02-08 18:22:50', NULL, '689', 'Salsa Hartini', '082284413437', 'PT Nusa Indah Remaja', 'salsa@insani.co.id', 'Masuk Barang', '076', '122', '1', 0, 0, 'In', NULL, '60211f0a904fa.png', NULL, NULL, NULL, '1', '2021-02-08 11:22:50', '2021-02-08 11:22:50', NULL),
(6, '2021-02-21 09:18:04', NULL, '4070', 'Sani Sanjoyo', '081312201830', 'PT Nusa Indah Remaja', 'aldijavier42@gmail.com', 'Instalasi', '009', '055', '1', 1, 1, 'test', NULL, '6031c2dc5b609.png', NULL, NULL, NULL, '1', '2021-02-21 02:18:04', '2021-02-21 02:18:04', NULL),
(7, '2021-02-21 09:20:01', '2021-02-21 09:54:02', '9458', 'Sinta', '081319101830', 'PT Abadi Makmur', 'aldijavier42@gmail.com', 'Maintenance', '766', '055', '3', 3, 3, 'Maintenance', '0 Hari 00 Jam 34 Menit 1 Detik', '6031c351e2865.png', '5', '5', '5', '2', '2021-02-21 02:20:01', '2021-02-21 02:54:02', '2021-02-21 02:54:02'),
(8, '2021-02-24 11:03:53', '2021-02-24 11:04:17', '9458', 'Sinta', '081319101830', 'PT Abadi Makmur', 'aldijavier42@gmail.com', 'Troubleshoot', '233', '002', '1', 1, 1, NULL, '0 Hari 00 Jam 0 Menit 24 Detik', '6035d029df94c.png', '5', '5', '5', '2', '2021-02-24 04:03:53', '2021-02-24 04:04:17', '2021-02-24 04:04:17'),
(9, '2021-02-25 11:06:45', '2021-03-02 08:06:18', '5384', 'Bambang Pri', '082260943781', 'PT Insan Remaja Indah', 'bambang@laila.co.id', 'Maintenance', '001', '001', '1', 1, 1, 'Maintenance', '4 Hari 20 Jam 59 Menit 33 Detik', '603722558193d.png', '5', '5', '5', '2', '2021-02-25 04:06:45', '2021-03-02 01:06:18', '2021-03-02 01:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `lantais`
--

CREATE TABLE `lantais` (
  `id` int(11) NOT NULL,
  `id_lantai` int(10) UNSIGNED NOT NULL,
  `name_lantai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lantais`
--

INSERT INTO `lantais` (`id`, `id_lantai`, `name_lantai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lt. UG', '2021-03-18 05:02:04', NULL),
(2, 2, 'Lt. 1', '2021-03-18 05:02:38', NULL),
(3, 3, 'Lt. 1', '2021-03-18 05:02:50', NULL),
(4, 3, 'Lt. 2', '2021-03-18 05:03:02', NULL),
(5, 4, 'Lt. 1', '2021-03-18 05:03:14', NULL),
(6, 4, 'Lt. 2', '2021-03-18 05:03:26', NULL),
(7, 5, 'Lt. 1', '2021-03-18 05:11:28', NULL);

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
  `id` int(11) NOT NULL,
  `id_ruang` int(10) UNSIGNED NOT NULL,
  `name_ruang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantais` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangs`
--

INSERT INTO `ruangs` (`id`, `id_ruang`, `name_ruang`, `lantais`, `created_at`, `updated_at`) VALUES
(1, 1, 'DC', 1, '2021-03-18 05:08:50', NULL),
(2, 1, 'MMR', 1, '2021-03-18 05:09:04', NULL),
(3, 2, 'DC', 2, '2021-03-18 05:09:36', NULL),
(4, 2, 'MMR', 2, '2021-03-18 05:09:50', NULL),
(5, 3, 'DCA', 3, '2021-03-18 05:10:02', NULL),
(6, 3, 'DCB', 3, '2021-03-18 05:10:14', NULL),
(7, 3, 'MMR', 3, '2021-03-18 05:10:23', NULL),
(8, 4, 'DC', 4, '2021-03-18 05:10:32', NULL),
(9, 4, 'MMR', 4, '2021-03-18 05:10:46', NULL),
(10, 5, 'Changi', 5, '2021-03-18 05:11:41', NULL);

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
(1, 'Admin', 'admin@napinfo.co.id', '$2y$10$sAf3Hl.QkGg/LcpmRnj69./CQWZj7DOuBJzV2a9W8Kofmb4X1/2YW', 'NnIk2nW1DCe9RoI14AyNQTLRGiML5PwLUA2nxbt33iHUSP5Fldm4PnHoEtRn', '2021-01-26 11:01:01', '2021-01-26 11:01:01');

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lantais`
--
ALTER TABLE `lantais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
