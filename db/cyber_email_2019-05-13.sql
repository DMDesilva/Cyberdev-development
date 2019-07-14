-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2019 at 02:28 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cybermkt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitbucket_issues`
--

CREATE TABLE `bitbucket_issues` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(10) DEFAULT NULL,
  `priority` int(10) DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci,
  `local_id` int(10) DEFAULT NULL,
  `resource_uri` text COLLATE utf8mb4_unicode_ci,
  `reported_by` int(10) UNSIGNED DEFAULT NULL,
  `bitbucket_repo_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `hours` double DEFAULT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bitbucket_issues`
--

INSERT INTO `bitbucket_issues` (`id`, `status`, `priority`, `title`, `content`, `local_id`, `resource_uri`, `reported_by`, `bitbucket_repo_id`, `created_at`, `updated_at`, `deleted_at`, `deadline`, `hours`, `type`) VALUES
(1, 2, 5, 'abv', 'jhgf', NULL, 'htpp', 1, 29, '2019-05-13 19:27:14', '2019-05-13 19:27:14', NULL, '2019-01-05 00:00:00', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bitbucket_repositories`
--

CREATE TABLE `bitbucket_repositories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_private` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bitbucket_users`
--

CREATE TABLE `bitbucket_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bitbucket_users_issues`
--

CREATE TABLE `bitbucket_users_issues` (
  `id` int(10) UNSIGNED NOT NULL,
  `issues_id` int(10) UNSIGNED NOT NULL,
  `responsible` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bitbucket_users_repos`
--

CREATE TABLE `bitbucket_users_repos` (
  `id` int(10) UNSIGNED NOT NULL,
  `bitbucket_users_id` int(10) UNSIGNED NOT NULL,
  `bitbucket_repositories_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `good_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `good_name`, `contact_no`, `email`, `currency`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kamal', 'kamal', '0758686315', 'kamal@gmail.com', 'USD', '2019-05-09 20:02:31', '2019-05-13 11:33:04', '2019-05-13 11:33:04'),
(2, 'samaraweera', 'kamal', '0758686315', 'kamal@gmail.com', 'USD', '2019-05-12 23:55:27', '2019-05-13 11:33:08', '2019-05-13 11:33:08'),
(3, 'samaraweera', 'kamal', '0758686315', 'kamal@gmail.com', 'LKR', '2019-05-13 11:38:37', '2019-05-13 11:38:37', NULL),
(4, 'samaraweera', 'kamal', '0758686315', 'kamal@gmail.com', 'LKR', '2019-05-13 12:08:11', '2019-05-13 12:08:11', NULL),
(5, 'drtyu', 'yfyfy', '0758686315', 'kamal@gmail.com', 'LKR', '2019-05-13 12:24:14', '2019-05-13 12:24:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `developergroups`
--

CREATE TABLE `developergroups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `developer_developergroup`
--

CREATE TABLE `developer_developergroup` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `developer_id` int(10) UNSIGNED NOT NULL,
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
  `content` text,
  `type` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_logs`
--

INSERT INTO `email_logs` (`id`, `payment_id`, `content`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 1, '2019-02-19 08:37:15', '2019-02-19 08:37:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mailtypes`
--

CREATE TABLE `mailtypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13, '2019_04_19_134127_create_bitbucket_users_table', 1),
(14, '2019_04_19_152952_create_bitbucket_repositories_table', 1),
(15, '2019_04_22_102159_create_bitbucket_users_repos_table', 1),
(16, '2019_04_27_144337_create_bitbucket_issues_table', 1),
(17, '2019_04_28_134509_create_bitbucket_users_issues_table', 1),
(18, '2019_02_23_153320_create_clients_table', 2),
(19, '2019_02_12_090307_create_developers_table', 3),
(20, '2019_02_14_195845_create_developergroups_table', 3),
(22, '2019_05_09_072649_Modules', 4);

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
  `payment_no` varchar(20) DEFAULT NULL,
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

INSERT INTO `payments` (`id`, `payment_no`, `client_id`, `service_id`, `service_source`, `amount`, `duration`, `start_date`, `repeat`, `repeat_type`, `custom_duration`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PAY1001', 1, 1, 'Cybertech', 5000, 10, '2019-02-19', 1, 'Monthly', NULL, 1, '2019-02-19 08:37:12', '2019-02-19 08:37:12', NULL);

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
(1, 3, 1, '2019-02-19 08:37:12', '2019-02-19 08:37:12', NULL),
(2, 4, 1, '2019-02-19 08:37:12', '2019-02-19 08:37:12', NULL);

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
(1, 'admin', 'admin@cybertech.com', '$2y$10$RH1IFCJkJLX1XfoKhPcBru3nlf8Zk87XDzBrMgQ.U8lW2vLc2KlgG', 'yeWeQPbiJO6bMYRCUaBH6DhPA5kWxxjlvJds9TAGAuYweQiwlozL62H54RaE', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bitbucket_issues`
--
ALTER TABLE `bitbucket_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bitbucket_repositories`
--
ALTER TABLE `bitbucket_repositories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bitbucket_users`
--
ALTER TABLE `bitbucket_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bitbucket_users_username_unique` (`username`);

--
-- Indexes for table `bitbucket_users_issues`
--
ALTER TABLE `bitbucket_users_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bitbucket_users_repos`
--
ALTER TABLE `bitbucket_users_repos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developergroups`
--
ALTER TABLE `developergroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `developers_position_index` (`position`);

--
-- Indexes for table `developer_developergroup`
--
ALTER TABLE `developer_developergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailtypes`
--
ALTER TABLE `mailtypes`
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
-- AUTO_INCREMENT for table `bitbucket_issues`
--
ALTER TABLE `bitbucket_issues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bitbucket_repositories`
--
ALTER TABLE `bitbucket_repositories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitbucket_users`
--
ALTER TABLE `bitbucket_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitbucket_users_issues`
--
ALTER TABLE `bitbucket_users_issues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bitbucket_users_repos`
--
ALTER TABLE `bitbucket_users_repos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `developergroups`
--
ALTER TABLE `developergroups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `developer_developergroup`
--
ALTER TABLE `developer_developergroup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mailtypes`
--
ALTER TABLE `mailtypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_cc`
--
ALTER TABLE `payment_cc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
