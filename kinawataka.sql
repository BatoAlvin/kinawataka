-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 01:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kinawataka`
--

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `action`, `user_id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Member added successfully', 2, 3, '2023-03-23 07:30:20', '2023-03-23 07:30:20'),
(2, 'Savings updated successfully', 2, 2, '2023-03-23 08:55:19', '2023-03-23 08:55:19'),
(3, 'Savings added successfully', 2, 2, '2023-03-23 08:59:20', '2023-03-23 08:59:20'),
(4, 'Savings updated successfully', 2, 2, '2023-03-23 09:00:51', '2023-03-23 09:00:51'),
(5, 'Savings updated successfully', 2, 2, '2023-03-23 09:03:13', '2023-03-23 09:03:13'),
(6, 'Savings added successfully', 2, 2, '2023-03-23 09:03:38', '2023-03-23 09:03:38'),
(7, 'Savings updated successfully', 2, 2, '2023-03-23 09:04:04', '2023-03-23 09:04:04'),
(8, 'Savings updated successfully', 2, 2, '2023-03-23 09:04:17', '2023-03-23 09:04:17'),
(9, 'Savings added successfully', 2, 2, '2023-03-23 09:04:50', '2023-03-23 09:04:50');

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
-- Table structure for table `familymembers`
--

CREATE TABLE `familymembers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `position_id` varchar(255) DEFAULT NULL,
  `enroll` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `familymembers`
--

INSERT INTO `familymembers` (`id`, `family_name`, `email`, `contact`, `location`, `position_id`, `enroll`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Kevin', 'kevin@gmail.com', '0784893992', 'Kira', NULL, 0, 1, '2023-03-23 04:34:31', '2023-03-23 04:34:31'),
(8, 'Alvin', 'alvinbato112@gmail.com', '0784893992', 'Mbuya', NULL, 1, 1, '2023-03-23 04:36:35', '2023-03-23 04:36:49'),
(9, 'Lee', 'lee@gmail.com', '098766554', 'Japan', NULL, 0, 1, '2023-03-23 07:30:20', '2023-03-23 07:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_id` varchar(255) NOT NULL,
  `loan_amount` varchar(255) NOT NULL,
  `return_amount` varchar(255) NOT NULL,
  `loan_percentage` varchar(255) NOT NULL,
  `loan_description` varchar(255) NOT NULL,
  `loan_date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `family_id`, `loan_amount`, `return_amount`, `loan_percentage`, `loan_description`, `loan_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '8', '100000', '105000', '5', 'investment', '2023-03-23', 1, '2023-03-23 04:54:08', '2023-03-23 05:13:13');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_03_034753_create_familymembers_table', 1),
(6, '2022_12_03_221721_create_savings_table', 1),
(7, '2022_12_10_105131_create_savingsummaries_table', 1),
(8, '2022_12_10_181241_create_eldersgiftexchanges_table', 1),
(9, '2022_12_11_074235_create_studentsgiftexchanges_table', 1),
(10, '2022_12_11_105759_create_workingclassgiftexchanges_table', 1),
(11, '2022_12_11_123824_create_non_workingclassgiftexchanges_table', 1),
(12, '2022_12_11_202617_create_inlaws_table', 1),
(13, '2022_12_14_040300_create_loans_table', 1),
(14, '2022_12_27_070655_create_userpermissions_table', 1),
(15, '2023_03_23_095236_create_table_name', 2),
(16, '2023_03_23_095438_create_audits', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `amount` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `name`, `amount`, `description`, `date`, `status`, `created_at`, `updated_at`) VALUES
(8, '7', '3000000', 'housing', '2023-03-23', 1, '2023-03-23 04:34:55', '2023-03-23 09:03:13'),
(11, '9', '6000000', 'herenow mate', '2023-03-23', 1, '2023-03-23 09:03:38', '2023-03-23 09:04:17'),
(12, '8', '5000000', 'come on', '2023-03-16', 1, '2023-03-23 09:04:50', '2023-03-23 09:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `savingsummaries`
--

CREATE TABLE `savingsummaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `table_name`
--

CREATE TABLE `table_name` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userpermissions`
--

CREATE TABLE `userpermissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `view_familymember` tinyint(1) NOT NULL DEFAULT 0,
  `add_familymember` tinyint(1) NOT NULL DEFAULT 0,
  `update_familymember` tinyint(1) NOT NULL DEFAULT 0,
  `delete_familymember` tinyint(1) NOT NULL DEFAULT 0,
  `view_saving` tinyint(1) NOT NULL DEFAULT 0,
  `add_saving` tinyint(1) NOT NULL DEFAULT 0,
  `update_saving` tinyint(1) NOT NULL DEFAULT 0,
  `delete_saving` tinyint(1) NOT NULL DEFAULT 0,
  `view_savingsummary` int(11) NOT NULL DEFAULT 0,
  `view_audit` int(11) NOT NULL DEFAULT 0,
  `view_loan` int(11) NOT NULL DEFAULT 0,
  `add_loan` int(11) NOT NULL DEFAULT 0,
  `update_loan` int(11) NOT NULL DEFAULT 0,
  `delete_loan` int(11) NOT NULL DEFAULT 0,
  `view_permission` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userpermissions`
--

INSERT INTO `userpermissions` (`id`, `role_name`, `view_familymember`, `add_familymember`, `update_familymember`, `delete_familymember`, `view_saving`, `add_saving`, `update_saving`, `delete_saving`, `view_savingsummary`, `view_audit`, `view_loan`, `add_loan`, `update_loan`, `delete_loan`, `view_permission`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, NULL, NULL),
(2, 'User', 1, 1, 1, 1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, NULL, '2023-03-23 08:54:26');

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
  `role_id` varchar(255) DEFAULT NULL,
  `family_id` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `family_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Dan', 'dan@gmail.com', NULL, '$2y$10$XumjFoyGkQ9awwFuWbkFxumDrSt3eEBkG0dTeTvUSxwe1/hGExv.W', '1', '1', NULL, '2023-03-16 23:10:04', '2023-03-16 23:10:04'),
(8, 'Alvin', 'alvinbato112@gmail.com', NULL, '$2y$10$xVMks60ADQMVDpeLGcdEr.pRKf6fQ2Q1xZJiP/7dx4ah/ovHoKoxG', '2', '8', NULL, '2023-03-23 04:36:49', '2023-03-23 04:36:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `familymembers`
--
ALTER TABLE `familymembers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `familymembers_email_unique` (`email`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savingsummaries`
--
ALTER TABLE `savingsummaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_name`
--
ALTER TABLE `table_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userpermissions`
--
ALTER TABLE `userpermissions`
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
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `familymembers`
--
ALTER TABLE `familymembers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `savingsummaries`
--
ALTER TABLE `savingsummaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `table_name`
--
ALTER TABLE `table_name`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userpermissions`
--
ALTER TABLE `userpermissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
