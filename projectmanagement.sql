-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 01:54 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `apikeys`
--

CREATE TABLE `apikeys` (
  `id` int(11) NOT NULL,
  `apikey` varchar(250) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apikeys`
--

INSERT INTO `apikeys` (`id`, `apikey`, `createdBy`, `createdDate`) VALUES
(1, 'ashraf', 4, '2017-12-10 12:48:59'),
(2, 'lazycoder', 4, '2017-12-10 12:48:59'),
(3, 'farzan', 4, '2017-12-10 13:17:08'),
(4, 'tuhin', 4, '2017-12-10 13:17:08'),
(5, '4c25ec36e94e5be888d4b029cab8febc', 4, '2017-12-10 13:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` int(10) UNSIGNED NOT NULL,
  `catagory` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `catagory`, `created_at`, `updated_at`) VALUES
(1, 'Web application', '2017-10-22 18:00:00', '2017-10-22 18:00:00'),
(2, 'Object Oriented Program', '2017-10-22 18:00:00', '2017-10-22 18:00:00'),
(3, 'Structure', '2017-10-22 18:00:00', '2017-10-22 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `documentations`
--

CREATE TABLE `documentations` (
  `id` int(10) UNSIGNED NOT NULL,
  `documentation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documentations`
--

INSERT INTO `documentations` (`id`, `documentation`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'hello its just for testing documentation', 4, 1, '2017-12-10 08:41:49', '2017-12-10 08:41:49'),
(5, 'update documentation', 4, 1, '2017-12-10 08:43:08', '2017-12-10 08:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `feature` text COLLATE utf8mb4_unicode_ci,
  `uniqueness` text COLLATE utf8mb4_unicode_ci,
  `new_add` text COLLATE utf8mb4_unicode_ci,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `feature`, `uniqueness`, `new_add`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'DIU Student Project Portal.', 'DIU Student Project Portal.', 'DIU Student Project Portal.', 4, 1, '2017-10-24 10:41:09', '2017-10-24 11:32:07'),
(5, 'meeeeeeeeeeeeeeeeeeeee', NULL, NULL, 7, 1, '2017-11-02 23:14:57', '2017-11-02 23:22:30'),
(7, 'good', 'asdf', 'asdfasdf', 7, 1, NULL, NULL),
(8, NULL, NULL, NULL, 4, 1, NULL, NULL),
(9, NULL, NULL, NULL, 4, 1, NULL, NULL),
(10, NULL, NULL, NULL, 4, 1, NULL, NULL),
(11, NULL, NULL, NULL, 4, 1, NULL, NULL),
(12, 'pagla mosha', NULL, NULL, 4, 1, NULL, NULL),
(13, 'pagla mosha', NULL, NULL, 4, 1, NULL, NULL),
(14, 'pagla mosha', NULL, NULL, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frameworks`
--

CREATE TABLE `frameworks` (
  `id` int(10) UNSIGNED NOT NULL,
  `framework` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `frameworks`
--

INSERT INTO `frameworks` (`id`, `framework`, `created_at`, `updated_at`) VALUES
(1, NULL, '2017-10-22 18:00:00', '2017-10-22 18:00:00'),
(2, 'Laravel', '2017-10-22 18:00:00', '2017-10-22 18:00:00'),
(3, 'Spring', '2017-10-22 18:00:00', '2017-10-22 18:00:00'),
(4, 'MVC', '2017-10-22 18:00:00', '2017-10-22 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `requirement_engineer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designer` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tester` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_manager` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srs` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proposal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documentation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `requirement_engineer`, `programer`, `designer`, `tester`, `project_manager`, `srs`, `proposal`, `documentation`, `project_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(7, '*94/78917891+7891+78', 'asdfsadf', 'asdf', 'asdf', '5417554154154', 'asdf', 'asdf', 'asdf', 4, 1, '2017-10-25 13:01:08', '2017-10-25 13:01:08'),
(10, '*94/78917891+7891+78', 'asdfsadf', 'asdf', 'asdf', '5417554154154', 'asdf', 'asdf', 'asdf', 7, 1, '2017-11-02 23:03:58', '2017-11-02 23:07:07'),
(37, '*94/78917891+7891+78', 'asdfsadf', 'asdf', 'asdf', '5417554154154', 'asdf', 'asdf', 'asdf', 4, 1, NULL, NULL),
(40, '*94/78917891+7891+78', 'asdfsadf', 'asdf', 'asdf', '5417554154154', 'asdf', 'asdf', 'asdf', 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `language` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`, `created_at`, `updated_at`) VALUES
(1, 'Php', '2017-10-22 18:00:00', '2017-10-22 18:00:00'),
(2, 'Java', '2017-10-22 18:00:00', '2017-10-22 18:00:00'),
(3, '.Net programing', '2017-10-22 18:00:00', '2017-10-22 18:00:00'),
(4, 'C', '2017-10-22 18:00:00', '2017-10-22 18:00:00');

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
(3, '2017_10_22_152050_create_semesters_table', 1),
(4, '2017_10_22_152956_create_languages_table', 1),
(5, '2017_10_22_153205_create_frameworks_table', 1),
(6, '2017_10_22_153532_create_subjects_table', 1),
(7, '2017_10_22_153632_create_catagories_table', 1),
(8, '2017_10_22_154832_create_projects_table', 1),
(18, '2017_10_22_060142_create_groups_table', 2),
(20, '2017_10_24_143554_create_features_table', 3),
(21, '2017_10_25_155535_create_presentations_table', 4),
(22, '2017_10_25_175509_create_proposals_table', 5),
(23, '2017_10_26_023919_create_software_requirement_specifications_table', 6),
(24, '2017_10_26_035456_create_documentations_table', 7),
(25, '2017_10_26_122039_create_reviews_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tfarzan007@gmail.com', '$2y$10$WRsE1MrI3VPKpI3zRSdzqeAfE/y1dDvY.oKYtznIochlODTzl5TPK', '2017-11-06 09:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `presentations`
--

CREATE TABLE `presentations` (
  `id` int(10) UNSIGNED NOT NULL,
  `presentation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presentations`
--

INSERT INTO `presentations` (`id`, `presentation`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(9, 'hello boss', 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `framework` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `group_name`, `slug`, `semester`, `subject`, `catagory`, `language`, `framework`, `admin_id`, `created_at`, `updated_at`) VALUES
(4, 'DIU Student Project Portal.', 'Ant', 'diu-student-project-portal', '10', 'SWE 332', 'Web application', 'Php', 'Laravel', 1, '2017-10-23 10:48:09', '2017-11-02 23:08:31'),
(6, 'Farzan', 'Ant 3', 'farzan', '11', 'SWE 221', 'Object Oriented Program', 'Php', 'Spring', 1, '2017-10-24 11:42:54', '2017-10-24 11:42:54'),
(7, 'Bus ticket management', 'Luck', 'bus-ticket-management', '11', 'SWE 221', 'Structure', 'C', NULL, 1, '2017-10-24 12:02:32', '2017-10-24 12:02:32'),
(8, 'Online basic computer component shopping', 'Lucky', 'online-basic-computer-component-shopping', '10', 'SWE 332', 'Web application', 'Java', 'Spring', 1, '2017-10-24 12:03:13', '2017-10-24 12:03:31'),
(9, 'Lucky DIU Student Project Portal', 'Mack', 'lucky-diu-student-project-portal', '10', 'SWE 332', 'Web application', '.Net programing', 'MVC', 1, '2017-10-24 12:04:09', '2017-10-24 12:04:09'),
(10, 'Makes', 'None', 'make', '10', 'SWE 332', 'Web application', 'Php', 'Laravel', 1, '2017-10-26 07:36:25', '2017-11-02 22:52:37'),
(11, 'BoomBoom', 'Chota, MURGI', 'boomboom', '10', 'SWE 332', 'Object Oriented Program', 'Java', 'Spring', 4, '2017-11-05 07:26:09', '2017-11-05 07:26:09');

-- --------------------------------------------------------

--
-- Table structure for table `proposals`
--

CREATE TABLE `proposals` (
  `id` int(10) UNSIGNED NOT NULL,
  `proposal` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposals`
--

INSERT INTO `proposals` (`id`, `proposal`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Proposal DIU Student Project Portal.....3', 4, 1, '2017-10-25 20:58:16', '2017-10-25 20:58:16'),
(6, 'kkkkk', 7, 1, '2017-11-02 23:26:13', '2017-11-02 23:34:50'),
(10, 'Steering the Craft', 4, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'helo', 4, 1, '2017-10-26 06:56:02', '2017-10-26 07:00:11'),
(7, 'Farzan vai je kaw e ki project je kono kisu add korte parbe?', 8, 3, '2017-11-05 07:16:13', '2017-11-05 07:16:13'),
(8, 'Good', 11, 4, '2017-11-05 07:26:39', '2017-11-05 07:26:39'),
(9, 'sdfgdsgfdsfgdsfgdsfg', 4, 1, '2017-12-03 03:19:31', '2017-12-03 03:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`, `created_at`, `updated_at`) VALUES
(1, '10', '2017-10-22 18:00:00', '2017-10-22 18:00:00'),
(2, '11', '2017-10-22 18:00:00', '2017-10-22 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `software_requirement_specifications`
--

CREATE TABLE `software_requirement_specifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `srs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `software_requirement_specifications`
--

INSERT INTO `software_requirement_specifications` (`id`, `srs`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '11111111111111111111111111', 4, 1, '2017-10-25 21:43:37', '2017-10-25 21:46:32'),
(5, 'bbbbbbbbbbbbbbbbbbbbbbbbbbb', 7, 1, '2017-11-02 23:37:03', '2017-11-02 23:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `created_at`, `updated_at`) VALUES
(1, 'SWE 332', '2017-10-22 18:00:00', '2017-10-22 18:00:00'),
(2, 'SWE 221', '2017-10-22 18:00:00', '2017-10-22 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tahmid Farzan', 'tfarzan007@gmail.com', '$2y$10$BB2AFZuSGJvubfaRczAKm.dCSwd2Gt0r7lpx7WcG7JKTT0I6NdcUi', 'YGHQY21ODzvboTrAcOkhTsnvux6CXORtNfZlzNjQDNepy9x9ziBUU56MBqNV', '2017-10-23 10:20:03', '2017-10-23 10:20:03'),
(2, 'TF', 'farzan771@diu.edu.bd', '$2y$10$ewLTlEVZERGBfGnmMYF7.u0BF9YblfMVCJhxRFW05eEGvQ.bQGDvS', 'm3RKjIb2rjDdPf6OhKQ6EhsCa9EptGWXZI6OdvsGHwBVJUcbanE8vsJQZc1q', '2017-10-23 13:38:15', '2017-10-23 13:38:15'),
(3, 'Nk Tuhin', 'nktuhin12@gmail.com', '$2y$10$tPoja0EMx146axI2WUols.J9BURufg45Rx3R3hXat.SIJZavM/FBm', 'h6IpD5KK3pZgjhK7qH2oehLVlTMiEg6RmMy0btAPloJWPrJXEWjrV5nM5Y0O', '2017-11-05 07:06:09', '2017-11-05 07:06:09'),
(4, 'Lazycoder', 'lazycoder789@gmail.com', '$2y$10$O5bkmDP0O4WQZgednFYUpOhMaSNM/wXpHJAsOVqzvpiDa2E0.p0Yq', 'ashraf', '2017-11-05 07:25:24', '2017-11-05 07:25:24'),
(45, 'syed ashraf ullah', 'ashraf@gmail.com', '4f047130d5b729466962e3259d5511018ea58009', '4c25ec36e94e5be888d4b029cab8febc', '2017-12-03 11:03:12', '2017-12-03 11:03:12'),
(46, 'lazycoder', 'ashraf789@gmail.com', 'f728a05bff256b010851978c8cb831ef95f2aaed', 'b8d6e75ee861842fe1318f743eae036e', '2017-12-03 11:04:14', '2017-12-03 11:04:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apikeys`
--
ALTER TABLE `apikeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documentations`
--
ALTER TABLE `documentations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documentations_project_id_foreign` (`project_id`),
  ADD KEY `documentations_user_id_foreign` (`user_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_project_id_foreign` (`project_id`),
  ADD KEY `features_user_id_foreign` (`user_id`);

--
-- Indexes for table `frameworks`
--
ALTER TABLE `frameworks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_project_id_foreign` (`project_id`),
  ADD KEY `groups_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
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
-- Indexes for table `presentations`
--
ALTER TABLE `presentations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presentations_project_id_foreign` (`project_id`),
  ADD KEY `presentations_user_id_foreign` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_slug_unique` (`slug`),
  ADD KEY `projects_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_project_id_foreign` (`project_id`),
  ADD KEY `proposals_user_id_foreign` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_project_id_foreign` (`project_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `software_requirement_specifications`
--
ALTER TABLE `software_requirement_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `software_requirement_specifications_project_id_foreign` (`project_id`),
  ADD KEY `software_requirement_specifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
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
-- AUTO_INCREMENT for table `apikeys`
--
ALTER TABLE `apikeys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `documentations`
--
ALTER TABLE `documentations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `frameworks`
--
ALTER TABLE `frameworks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `presentations`
--
ALTER TABLE `presentations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `software_requirement_specifications`
--
ALTER TABLE `software_requirement_specifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `documentations`
--
ALTER TABLE `documentations`
  ADD CONSTRAINT `documentations_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `documentations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `features_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `groups_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `presentations`
--
ALTER TABLE `presentations`
  ADD CONSTRAINT `presentations_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `presentations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `software_requirement_specifications`
--
ALTER TABLE `software_requirement_specifications`
  ADD CONSTRAINT `software_requirement_specifications_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `software_requirement_specifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
