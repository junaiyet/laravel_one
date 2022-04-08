-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 09:25 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eco`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `category_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `added_by`, `category_image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'Man', 2, '8.jpg', NULL, '2022-04-08 15:51:35', '2022-04-08 15:51:35'),
(9, 'Woman', 2, '9.jpg', NULL, '2022-04-08 15:51:51', '2022-04-08 15:51:51'),
(10, 'Child', 2, '10.jpg', NULL, '2022-04-08 15:52:21', '2022-04-08 15:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_04_01_153643_create_categories_table', 2),
(7, '2022_04_08_220120_create_subcategories_table', 3);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `subcategory_image`, `created_at`, `updated_at`) VALUES
(1, 8, 'Salvador Manning', '', '2022-02-28 18:55:03', NULL),
(2, 9, 'Salvador Manning', '', '2022-02-28 18:55:03', NULL),
(3, 10, 'afdsf', '', '2022-02-28 18:55:03', NULL),
(4, 8, 'Salvador Manning', '', '2022-02-28 18:55:03', NULL),
(5, 10, 'Sade Giles', '', '2022-04-08 17:16:24', NULL),
(6, 9, 'Jin Maldonado', '', '2022-04-08 17:17:19', NULL),
(7, 8, 'afdsf', '', '2022-04-08 17:27:05', NULL),
(8, 9, 'Nayda Leach', 'default.png', '2022-04-08 17:32:18', NULL),
(9, 8, 'asdefga', 'default.png', '2022-04-08 17:32:39', NULL),
(10, 8, 'Stuart Gaines', 'default.png', '2022-04-08 17:36:59', NULL),
(11, 8, 'Stuart Gaines', 'default.png', '2022-04-08 17:37:18', NULL),
(12, 8, 'Stuart Gaines', 'default.png', '2022-04-08 17:37:20', NULL),
(13, 8, 'Stuart Gaines', 'default.png', '2022-04-08 17:37:35', NULL),
(14, 8, 'Stuart Gaines', 'default.png', '2022-04-08 17:40:05', NULL),
(15, 8, 'Stuart Gaines', '15.jpg', '2022-04-08 17:40:48', '2022-04-08 17:40:48'),
(16, 8, 'awsdgfsa', '16.webp', '2022-04-08 17:52:40', '2022-04-08 17:52:41'),
(17, 9, 'aaa', 'default.png', '2022-04-08 17:53:40', NULL),
(18, 9, 'aaa', 'default.png', '2022-04-08 17:53:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Ginger Hubbard', 'dewal@mailinator.com', NULL, '$2y$10$22T7JuSYpYnnB5UVAjuiOOLFIucz0JD4EB/adRlIPfKuRN5gfJ6hO', 'EU38Q8wdeRBZ31w1txnQGpB4qt5VpfC8k2BzmEy39Dehttb5kGtjRHEgl03P', '2022-03-27 12:52:34', '2022-03-27 12:52:34'),
(5, 'Chase Frost', 'nowe@mailinator.com', NULL, '$2y$10$6uQI5PJ7OquhA5lHSpsg0e54USk5E8mJPZNyxMlcdluuLWaHp7N7e', NULL, '2022-03-27 14:24:16', '2022-03-27 14:24:16'),
(6, 'Zephania Hahn', 'magagovy@mailinator.com', NULL, '$2y$10$Qm1SQoNoWhi0pwbMIbaesuakt/JiAsw06VlGzdku5KzLHKFAjuW6i', NULL, '2022-03-27 14:24:23', '2022-03-27 14:24:23'),
(7, 'Brittany Vance', 'voso@mailinator.com', NULL, '$2y$10$jmYusNONofbxmsURoEQY9uYYUFI.BrMg/wxjAei/mGJyeuWgX.822', NULL, '2022-03-27 14:24:30', '2022-03-27 14:24:30'),
(8, 'Evangeline Dorsey', 'jabesejejo@mailinator.com', NULL, '$2y$10$jBOvWwPR/Z1p3gwlvG2oEuwkrFZh4al99uHL61cWvEbVw4Kq3/gSy', NULL, '2022-03-27 14:24:41', '2022-03-27 14:24:41'),
(9, 'Lisandra Simon', 'walo@mailinator.com', NULL, '$2y$10$.5FG4RzmBLLBh0.FMsC6JeEdavfkHPPEdWJPtWRh8jv0IoWPQw1uC', NULL, '2022-03-27 14:25:01', '2022-03-27 14:25:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
