-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2025 at 07:26 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ahp`
--

CREATE TABLE `hasil_ahp` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `skor_akhir` double(8,2) NOT NULL,
  `ranking` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_ahp`
--

INSERT INTO `hasil_ahp` (`id`, `siswa_id`, `skor_akhir`, `ranking`, `created_at`, `updated_at`) VALUES
(1, 6, 92.22, 1, '2025-06-24 23:15:05', '2025-06-24 23:15:05'),
(2, 4, 90.68, 2, '2025-06-24 23:15:05', '2025-06-24 23:15:05'),
(3, 1, 86.75, 3, '2025-06-24 23:15:05', '2025-06-24 23:15:05'),
(4, 7, 82.53, 4, '2025-06-24 23:15:05', '2025-06-24 23:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`, `bobot`, `created_at`, `updated_at`) VALUES
(3, 'TF', 'Nilai TOEFL', 0.38, '2025-06-19 23:21:51', '2025-06-24 23:16:05'),
(4, 'RN', 'Ranking Akademik', 0.21, '2025-06-19 23:22:31', '2025-06-24 23:16:05'),
(5, 'WA', 'Wawancara', 0.12, '2025-06-19 23:22:39', '2025-06-24 23:16:05'),
(6, 'PI', 'Pengetahuan Indonesia', 0.11, '2025-06-19 23:22:52', '2025-06-24 23:16:05'),
(7, 'PA', 'Pengetahuan Australia', 0.06, '2025-06-19 23:23:09', '2025-06-24 23:16:05'),
(8, 'SN', 'Kesenian', 0.05, '2025-06-19 23:23:22', '2025-06-24 23:16:05'),
(9, 'KP', 'Kepribadian', 0.06, '2025-06-19 23:23:33', '2025-06-24 23:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_19_000919_create_users_table', 2),
(6, '2025_06_19_000951_create_siswa_table', 2),
(7, '2025_06_19_001020_create_kriteria_table', 2),
(8, '2025_06_19_001040_create_pairwise_kriteria_table', 2),
(9, '2025_06_19_001100_create_nilai_siswa_table', 2),
(10, '2025_06_19_001118_create_hasil_ahp_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `kriteria_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id`, `siswa_id`, `kriteria_id`, `user_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 90.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(2, 1, 4, 1, 80.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(3, 1, 5, 1, 95.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(4, 1, 6, 1, 85.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(5, 1, 7, 1, 95.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(6, 1, 8, 1, 90.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(7, 1, 9, 1, 80.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(8, 4, 3, 1, 90.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(9, 4, 4, 1, 90.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(10, 4, 5, 1, 100.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(11, 4, 6, 1, 98.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(12, 4, 7, 1, 90.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(13, 4, 8, 1, 92.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(14, 4, 9, 1, 80.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(15, 6, 3, 1, 90.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(16, 6, 4, 1, 100.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(17, 6, 5, 1, 100.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(18, 6, 6, 1, 95.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(19, 6, 7, 1, 92.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(20, 6, 8, 1, 85.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(21, 6, 9, 1, 80.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(22, 7, 3, 1, 90.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(23, 7, 4, 1, 70.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(24, 7, 5, 1, 80.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(25, 7, 6, 1, 88.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(26, 7, 7, 1, 80.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(27, 7, 8, 1, 95.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29'),
(28, 7, 9, 1, 80.00, '2025-06-24 23:14:29', '2025-06-24 23:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `pairwise_kriteria`
--

CREATE TABLE `pairwise_kriteria` (
  `id` bigint UNSIGNED NOT NULL,
  `kriteria_1_id` bigint UNSIGNED NOT NULL,
  `kriteria_2_id` bigint UNSIGNED NOT NULL,
  `nilai` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pairwise_kriteria`
--

INSERT INTO `pairwise_kriteria` (`id`, `kriteria_1_id`, `kriteria_2_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 3.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(2, 3, 5, 5.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(3, 3, 6, 5.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(4, 3, 7, 7.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(5, 3, 8, 5.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(6, 3, 9, 3.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(7, 4, 5, 3.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(8, 4, 6, 3.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(9, 4, 7, 5.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(10, 4, 8, 3.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(11, 4, 9, 3.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(12, 5, 6, 1.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(13, 5, 7, 3.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(14, 5, 8, 3.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(15, 5, 9, 3.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(16, 6, 7, 3.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(17, 6, 8, 3.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(18, 6, 9, 2.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(19, 7, 8, 2.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(20, 7, 9, 2.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49'),
(21, 8, 9, 1.00, '2025-06-24 23:12:49', '2025-06-24 23:12:49');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nisn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `nisn`, `nama`, `jenis_kelamin`, `alamat`, `foto`, `created_at`, `updated_at`) VALUES
(1, 2, '12345', 'albar', 'L', 'Sungai Jingah', NULL, NULL, NULL),
(4, 2, '123456', 'Muhammad Alfin', 'L', 'Pal 7', NULL, '2025-06-21 17:19:25', '2025-06-21 17:19:25'),
(6, 2, '1234567', 'Muhammad Nazar', 'L', 'Sungai Lulut', NULL, '2025-06-21 17:23:44', '2025-06-21 17:23:44'),
(7, 2, '01', 'amat galon', 'L', 'batulicin', NULL, '2025-06-21 17:46:31', '2025-06-21 17:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','siswa','wali_kelas','waka_kesiswaan','guru_penyeleksi','kepsek') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$nhi1HJ3A8MXQTrFVI7qryecmFUjZ0b4UycEzkMsMRlkHFyVDOATEG', 'admin', NULL, '2025-06-18 16:31:11', '2025-06-18 16:31:11'),
(2, 'Siswa', 'siswa@gmail.com', '$2y$10$wdwzJMIaaSpvOA9TFxy8yeg6IiUoXn.hu6l60r2o6hk6PKiwb6i5O', 'siswa', NULL, '2025-06-18 16:31:11', '2025-06-18 16:31:11'),
(3, 'Wali_kelas', 'wali_kelas@gmail.com', '$2y$10$2ab7BltOX7fZM/8SHyyah./GkcwP.OY.c.wXZLXHq3.4ZdSmoJJeO', 'wali_kelas', NULL, '2025-06-18 16:31:11', '2025-06-18 16:31:11'),
(4, 'Waka_kesiswaan', 'waka_kesiswaan@gmail.com', '$2y$10$VJ3SoDiFRVdhJEoWHYUDLehETUO1PPJ0oIh8G0FWuJb/myROP1zHG', 'waka_kesiswaan', NULL, '2025-06-18 16:31:11', '2025-06-18 16:31:11'),
(5, 'Guru_penyeleksi', 'guru_penyeleksi@gmail.com', '$2y$10$WAjqORT6L0J14g3oNB8pQuNy.3rvq/5Qm0mbjj2ZfaRWVacUxSNHq', 'guru_penyeleksi', NULL, '2025-06-18 16:31:11', '2025-06-18 16:31:11'),
(6, 'Kepsek', 'kepsek@gmail.com', '$2y$10$SqAn8DF2ow5c/bysxFsamOrmS7RPRnLAX3a.o.zvo0Calx8Czj2z.', 'kepsek', NULL, '2025-06-18 16:31:11', '2025-06-18 16:31:11'),
(12, 'Malbar', 'malbar@gmail.com', '$2y$10$.60h/Q6ixWMHALUKo0qh4uJ2fD2N/CUNef3HSKJAA1rYQ8PO2WptS', 'siswa', NULL, '2025-06-20 04:50:46', '2025-06-20 04:50:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hasil_ahp`
--
ALTER TABLE `hasil_ahp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_ahp_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kriteria_kode_unique` (`kode`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_siswa_siswa_id_foreign` (`siswa_id`),
  ADD KEY `nilai_siswa_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `nilai_siswa_user_id_foreign` (`user_id`);

--
-- Indexes for table `pairwise_kriteria`
--
ALTER TABLE `pairwise_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pairwise_kriteria_kriteria_1_id_foreign` (`kriteria_1_id`),
  ADD KEY `pairwise_kriteria_kriteria_2_id_foreign` (`kriteria_2_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nisn_unique` (`nisn`),
  ADD KEY `siswa_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_ahp`
--
ALTER TABLE `hasil_ahp`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pairwise_kriteria`
--
ALTER TABLE `pairwise_kriteria`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_ahp`
--
ALTER TABLE `hasil_ahp`
  ADD CONSTRAINT `hasil_ahp_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD CONSTRAINT `nilai_siswa_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_siswa_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_siswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pairwise_kriteria`
--
ALTER TABLE `pairwise_kriteria`
  ADD CONSTRAINT `pairwise_kriteria_kriteria_1_id_foreign` FOREIGN KEY (`kriteria_1_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pairwise_kriteria_kriteria_2_id_foreign` FOREIGN KEY (`kriteria_2_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
