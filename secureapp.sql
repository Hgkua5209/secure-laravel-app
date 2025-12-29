-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2025 at 12:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secureapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `task_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audit_logs`
--

INSERT INTO `audit_logs` (`id`, `user_id`, `action`, `ip_address`, `created_at`, `updated_at`, `task_id`) VALUES
(1, 3, 'Created Task', '127.0.0.1', '2025-12-27 21:42:46', '2025-12-27 21:42:46', NULL),
(2, 3, 'Accessed Task List', '127.0.0.1', '2025-12-27 21:42:46', '2025-12-27 21:42:46', NULL),
(3, 3, 'Created Task', '127.0.0.1', '2025-12-27 21:43:03', '2025-12-27 21:43:03', NULL),
(4, 3, 'Accessed Task List', '127.0.0.1', '2025-12-27 21:43:03', '2025-12-27 21:43:03', NULL),
(5, 2, 'Created Task', '127.0.0.1', '2025-12-27 21:43:37', '2025-12-27 21:43:37', NULL),
(6, 2, 'Accessed Task List', '127.0.0.1', '2025-12-27 21:43:38', '2025-12-27 21:43:38', NULL),
(7, 2, 'Created Task', '127.0.0.1', '2025-12-27 21:43:51', '2025-12-27 21:43:51', NULL),
(8, 2, 'Accessed Task List', '127.0.0.1', '2025-12-27 21:43:51', '2025-12-27 21:43:51', NULL),
(9, 1, 'Accessed Task List', '127.0.0.1', '2025-12-27 21:44:09', '2025-12-27 21:44:09', NULL),
(10, 1, 'Updated Task ID 1', '127.0.0.1', '2025-12-27 21:44:19', '2025-12-27 21:44:19', NULL),
(11, 1, 'Accessed Task List', '127.0.0.1', '2025-12-27 21:44:19', '2025-12-27 21:44:19', NULL),
(12, 1, 'Updated Task ID 2', '127.0.0.1', '2025-12-27 21:44:26', '2025-12-27 21:44:26', NULL),
(13, 1, 'Accessed Task List', '127.0.0.1', '2025-12-27 21:44:26', '2025-12-27 21:44:26', NULL),
(14, 1, 'Deleted Task ID 4', '127.0.0.1', '2025-12-27 21:44:32', '2025-12-27 21:44:32', NULL),
(15, 1, 'Accessed Task List', '127.0.0.1', '2025-12-27 21:44:33', '2025-12-27 21:44:33', NULL),
(16, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:07:09', '2025-12-28 05:07:09', NULL),
(17, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:08:45', '2025-12-28 05:08:45', NULL),
(18, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:08:50', '2025-12-28 05:08:50', NULL),
(19, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:11:30', '2025-12-28 05:11:30', NULL),
(20, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:11:33', '2025-12-28 05:11:33', NULL),
(21, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:11:37', '2025-12-28 05:11:37', NULL),
(22, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:16:21', '2025-12-28 05:16:21', NULL),
(23, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:16:24', '2025-12-28 05:16:24', NULL),
(24, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:16:26', '2025-12-28 05:16:26', NULL),
(25, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:16:29', '2025-12-28 05:16:29', NULL),
(26, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:17:18', '2025-12-28 05:17:18', NULL),
(27, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:18:31', '2025-12-28 05:18:31', NULL),
(28, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:23:23', '2025-12-28 05:23:23', NULL),
(29, 2, 'Created Task', '127.0.0.1', '2025-12-28 05:23:39', '2025-12-28 05:23:39', NULL),
(30, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:23:39', '2025-12-28 05:23:39', NULL),
(31, 2, 'Updated Task ID 3', '127.0.0.1', '2025-12-28 05:23:52', '2025-12-28 05:23:52', NULL),
(32, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:23:52', '2025-12-28 05:23:52', NULL),
(33, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:28:49', '2025-12-28 05:28:49', NULL),
(34, 2, 'Deleted Task ID 5', '127.0.0.1', '2025-12-28 05:28:53', '2025-12-28 05:28:53', NULL),
(35, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:28:54', '2025-12-28 05:28:54', NULL),
(36, 2, 'Created Task', '127.0.0.1', '2025-12-28 05:29:13', '2025-12-28 05:29:13', NULL),
(37, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:29:14', '2025-12-28 05:29:14', NULL),
(38, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:29:30', '2025-12-28 05:29:30', NULL),
(39, 1, 'Updated Task ID 6', '127.0.0.1', '2025-12-28 05:29:42', '2025-12-28 05:29:42', NULL),
(40, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:29:42', '2025-12-28 05:29:42', NULL),
(41, 1, 'Deleted Task ID 6', '127.0.0.1', '2025-12-28 05:30:33', '2025-12-28 05:30:33', NULL),
(42, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:30:33', '2025-12-28 05:30:33', NULL),
(43, 1, 'Updated Task ID 1', '127.0.0.1', '2025-12-28 05:30:39', '2025-12-28 05:30:39', NULL),
(44, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:30:39', '2025-12-28 05:30:39', NULL),
(45, 1, 'Updated Task ID 3', '127.0.0.1', '2025-12-28 05:31:38', '2025-12-28 05:31:38', NULL),
(46, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:31:38', '2025-12-28 05:31:38', NULL),
(47, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:32:24', '2025-12-28 05:32:24', NULL),
(48, 1, 'Deleted Task ID 3', '127.0.0.1', '2025-12-28 05:32:31', '2025-12-28 05:32:31', NULL),
(49, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:32:32', '2025-12-28 05:32:32', NULL),
(50, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:49:13', '2025-12-28 05:49:13', NULL),
(51, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:50:13', '2025-12-28 05:50:13', NULL),
(52, 1, 'Created Task', '127.0.0.1', '2025-12-28 05:50:26', '2025-12-28 05:50:26', NULL),
(53, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:50:27', '2025-12-28 05:50:27', NULL),
(54, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:59:16', '2025-12-28 05:59:16', NULL),
(56, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 05:59:25', '2025-12-28 05:59:25', NULL),
(58, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:02:48', '2025-12-28 06:02:48', NULL),
(59, 1, 'Created Task', '127.0.0.1', '2025-12-28 06:02:59', '2025-12-28 06:02:59', NULL),
(60, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:03:00', '2025-12-28 06:03:00', NULL),
(62, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:03:04', '2025-12-28 06:03:04', NULL),
(63, 1, 'Created Task', '127.0.0.1', '2025-12-28 06:03:17', '2025-12-28 06:03:17', NULL),
(64, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:03:18', '2025-12-28 06:03:18', NULL),
(66, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:03:23', '2025-12-28 06:03:23', NULL),
(68, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:03:29', '2025-12-28 06:03:29', NULL),
(69, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:04:11', '2025-12-28 06:04:11', NULL),
(70, 2, 'Created Task', '127.0.0.1', '2025-12-28 06:04:23', '2025-12-28 06:04:23', NULL),
(71, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:04:24', '2025-12-28 06:04:24', NULL),
(72, 2, 'Created Task', '127.0.0.1', '2025-12-28 06:04:39', '2025-12-28 06:04:39', NULL),
(73, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:04:39', '2025-12-28 06:04:39', NULL),
(74, 2, 'Created Task', '127.0.0.1', '2025-12-28 06:04:58', '2025-12-28 06:04:58', NULL),
(75, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:04:58', '2025-12-28 06:04:58', NULL),
(76, 2, 'Updated Task ID 10', '127.0.0.1', '2025-12-28 06:05:06', '2025-12-28 06:05:06', 10),
(77, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:05:06', '2025-12-28 06:05:06', NULL),
(79, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:05:14', '2025-12-28 06:05:14', NULL),
(81, 2, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:05:17', '2025-12-28 06:05:17', NULL),
(82, 3, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:05:36', '2025-12-28 06:05:36', NULL),
(83, 3, 'Created Task', '127.0.0.1', '2025-12-28 06:05:53', '2025-12-28 06:05:53', NULL),
(84, 3, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:05:54', '2025-12-28 06:05:54', NULL),
(85, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:07:21', '2025-12-28 06:07:21', NULL),
(87, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 06:07:30', '2025-12-28 06:07:30', NULL),
(88, 1, 'Accessed Task List', '127.0.0.1', '2025-12-28 20:46:30', '2025-12-28 20:46:30', NULL),
(89, 1, 'Accessed Task List', '127.0.0.1', '2025-12-29 01:51:56', '2025-12-29 01:51:56', NULL),
(90, 1, 'Accessed Task List', '127.0.0.1', '2025-12-29 03:43:01', '2025-12-29 03:43:01', NULL),
(92, 1, 'Accessed Task List', '127.0.0.1', '2025-12-29 03:43:08', '2025-12-29 03:43:08', NULL),
(94, 1, 'Accessed Task List', '127.0.0.1', '2025-12-29 03:43:15', '2025-12-29 03:43:15', NULL),
(96, 1, 'Accessed Task List', '127.0.0.1', '2025-12-29 03:43:18', '2025-12-29 03:43:18', NULL),
(97, 1, 'Created Task', '127.0.0.1', '2025-12-29 03:43:48', '2025-12-29 03:43:48', NULL),
(98, 1, 'Accessed Task List', '127.0.0.1', '2025-12-29 03:43:49', '2025-12-29 03:43:49', NULL),
(100, 1, 'Accessed Task List', '127.0.0.1', '2025-12-29 03:43:53', '2025-12-29 03:43:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_12_27_082953_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_12_27_083002_add_role_id_to_users_table', 1),
(7, '2025_12_27_083006_create_tasks_table', 1),
(8, '2025_12_27_083012_create_audit_logs_table', 1),
(9, '2025_12_28_052842_update_status_in_tasks_table', 1),
(10, '2025_12_28_135531_add_task_id_to_audit_logs_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2025-12-27 21:41:15', '2025-12-27 21:41:15'),
(2, 'User', '2025-12-27 21:41:15', '2025-12-27 21:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('pending','in_progress','completed') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(10, 2, 'testing hadif 1', 'test', 'pending', '2025-12-28 06:04:23', '2025-12-28 06:05:06'),
(11, 2, 'testing hadif 2', 'test 2', 'pending', '2025-12-28 06:04:39', '2025-12-28 06:04:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$7sizt6d5FdhWSQZ0BgCNAuxLuHghUKc5GBsGOB709I81.avx94xya', 1, NULL, '2025-12-27 21:41:38', '2025-12-27 21:41:38'),
(2, 'hadif', 'hadiffikrifirdaus@gmail.com', NULL, '$2y$12$08OjbXJE3Qmmw4LxRnZNOez1jp6ZEsOyLbPpBgT5GDLXkbpaJD4Zm', 2, NULL, '2025-12-27 21:41:53', '2025-12-27 21:41:53'),
(3, 'Haziq', 'haziq@gmail.com', NULL, '$2y$12$0OGXLv73RVIdjX8qhYEaaee0fVPnAWxbaAbh7z4tmW4zxaEfV50pi', 2, NULL, '2025-12-27 21:42:08', '2025-12-27 21:42:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_logs_user_id_foreign` (`user_id`),
  ADD KEY `audit_logs_task_id_foreign` (`task_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `audit_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
