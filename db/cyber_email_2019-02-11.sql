-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2019 at 03:44 PM
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
-- Table structure for table `email_queues`
--

CREATE TABLE `email_queues` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=sent / 0 = pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

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
  `cc_client_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_source` varchar(255) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `repeat` int(11) DEFAULT NULL,
  `repeat_type` varchar(20) DEFAULT NULL,
  `custom_duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `client_id`, `cc_client_id`, `service_id`, `service_source`, `amount`, `duration`, `start_date`, `repeat`, `repeat_type`, `custom_duration`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 3, 1, 'test', 100, 4, '2019-02-07', 1, 'Daily', NULL, '2019-02-10 12:15:36', '2019-02-10 12:15:36', NULL);

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
-- AUTO_INCREMENT for table `email_queues`
--
ALTER TABLE `email_queues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
