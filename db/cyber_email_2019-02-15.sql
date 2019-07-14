-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2019 at 07:30 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyber_email`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `good_name` varchar(45) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `good_name`, `contact_no`, `email`, `currency`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rumesh Dananjayaaa', 'Rumesh', '0787151295', 'rumeshpriv@gmail.com', 'LKR', NULL, '2019-02-09 14:03:11', NULL),
(2, 'test', 'test', '0445553332', 'rumeshee@gmail.com', 'LKR', '2019-02-09 11:21:32', '2019-02-09 14:07:24', '2019-02-09 14:07:24'),
(3, 'Britanney Walters', 'Rhona Morrow', '0887778887', 'gecicon@mailinator.net', 'USD', '2019-02-09 13:50:29', '2019-02-09 13:50:29', NULL),
(4, 'Camilla Dillon', 'test', '2659977411', 'vadu@mailinator.com', 'LKR', '2019-02-09 13:50:44', '2019-02-09 13:50:44', NULL),
(5, 'Nathaniel Baldwin', 'test', '4311011594', 'catyba@mailinator.net', 'LKR', '2019-02-09 13:51:50', '2019-02-09 13:51:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_queues`
--

CREATE TABLE `email_queues` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=sent / 0 = pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_queues`
--

INSERT INTO `email_queues` (`id`, `payment_id`, `date`, `type`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, '2019-02-12', 'Main', 0, NULL, '2019-02-11 13:50:56', NULL),
(2, 3, '2019-02-13', 'Main', 0, '2019-02-11 13:54:09', '2019-02-11 13:54:09', NULL),
(3, 13, '1970-12-16', 'Main', 0, '2019-02-12 12:40:17', '2019-02-12 12:40:17', NULL),
(4, 14, '1986-09-06', 'Main', 0, '2019-02-12 12:40:56', '2019-02-12 12:40:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_12_052401_create_positions_table', 2),
(4, '2019_02_12_090307_create_developers_table', 2),
(5, '2019_02_13_170229_create_projects_table', 2),
(6, '2019_02_13_170820_create_project_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_source` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `repeat` int(11) DEFAULT NULL,
  `repeat_type` varchar(20) DEFAULT NULL,
  `custom_duration` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `client_id`, `service_id`, `service_source`, `amount`, `duration`, `start_date`, `repeat`, `repeat_type`, `custom_duration`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 1, 'test', 100, 4, '2019-01-31', 1, 'Monthly', NULL, 1, '2019-02-10 12:15:36', '2019-02-10 12:15:36', NULL),
(4, 1, 1, 'test', 155, 1, '2019-02-14', 1, 'Quarterly', NULL, 1, '2019-02-12 12:30:18', '2019-02-12 12:30:18', NULL),
(5, 1, 1, 'test', 155, 1, '2019-02-14', 1, 'Quarterly', NULL, 1, '2019-02-12 12:30:32', '2019-02-12 12:30:32', NULL),
(6, 4, 1, 'Nisi commodi sint b', 5, 53, '1970-12-16', 1, 'Daily', NULL, 1, '2019-02-12 12:32:37', '2019-02-12 12:32:37', NULL),
(7, 4, 1, 'Nisi commodi sint b', 5, 53, '1970-12-16', 1, 'Daily', NULL, 1, '2019-02-12 12:32:48', '2019-02-12 12:32:48', NULL),
(8, 4, 1, 'Nisi commodi sint b', 5, 53, '1970-12-16', 1, 'Daily', NULL, 1, '2019-02-12 12:33:36', '2019-02-12 12:33:36', NULL),
(9, 4, 1, 'Nisi commodi sint b', 5, 53, '1970-12-16', 1, 'Daily', NULL, 1, '2019-02-12 12:35:39', '2019-02-12 12:35:39', NULL),
(10, 4, 1, 'Nisi commodi sint b', 5, 53, '1970-12-16', 1, 'Daily', NULL, 1, '2019-02-12 12:36:50', '2019-02-12 12:36:50', NULL),
(11, 4, 1, 'Nisi commodi sint b', 5, 53, '1970-12-16', 1, 'Daily', NULL, 1, '2019-02-12 12:39:35', '2019-02-12 12:39:35', NULL),
(12, 4, 1, 'Nisi commodi sint b', 5, 53, '1970-12-16', 1, 'Daily', NULL, 1, '2019-02-12 12:39:46', '2019-02-12 12:39:46', NULL),
(13, 4, 1, 'Nisi commodi sint b', 5, 53, '1970-12-16', 1, 'Daily', NULL, 1, '2019-02-12 12:40:16', '2019-02-12 12:40:16', NULL),
(14, 5, 1, 'Autem veniam atque', 10, 75, '1986-09-06', 1, 'Daily', NULL, 1, '2019-02-12 12:40:56', '2019-02-12 12:40:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_cc`
--

CREATE TABLE `payment_cc` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_cc`
--

INSERT INTO `payment_cc` (`id`, `client_id`, `payment_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 13, '2019-02-12 12:40:17', '2019-02-12 12:40:17', NULL),
(2, 5, 13, '2019-02-12 12:40:17', '2019-02-12 12:40:17', NULL),
(3, 3, 14, '2019-02-12 12:40:56', '2019-02-12 12:40:56', NULL),
(4, 4, 14, '2019-02-12 12:40:56', '2019-02-12 12:40:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved_date` date NOT NULL,
  `dev_start_date` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_clients`
--

CREATE TABLE `project_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `due_percentage` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `service_type`, `due_percentage`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Software', 'Hosting', 4, 'Development', NULL, '2019-02-10 10:06:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@cybertech.com', '$2y$10$RH1IFCJkJLX1XfoKhPcBru3nlf8Zk87XDzBrMgQ.U8lW2vLc2KlgG', 'L2SeTQ1JCwrCnIQm9l7NZMJKTMkanOZ2hxuDrkLNcweSmChio4nBbAU9MIyz', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `developers_position_index` (`position`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_queues`
--
ALTER TABLE `email_queues`
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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_cc`
--
ALTER TABLE `payment_cc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_clients`
--
ALTER TABLE `project_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_clients_project_id_index` (`project_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_queues`
--
ALTER TABLE `email_queues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment_cc`
--
ALTER TABLE `payment_cc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_clients`
--
ALTER TABLE `project_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `developers`
--
ALTER TABLE `developers`
  ADD CONSTRAINT `developers_position_foreign` FOREIGN KEY (`position`) REFERENCES `positions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_clients`
--
ALTER TABLE `project_clients`
  ADD CONSTRAINT `project_clients_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
