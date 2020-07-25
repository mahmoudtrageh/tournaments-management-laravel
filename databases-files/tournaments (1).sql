-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2020 at 05:25 AM
-- Server version: 5.6.47-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tournaments`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isSuper` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `img`, `password`, `isSuper`, `created_at`, `updated_at`) VALUES
(4, 'أدمن', 'admin@gmail.com', NULL, '$2y$12$KA71ok3wV3bHs94qXF4afOHKmZi6TU4hASMaPBiRFlCNb3FEauefG', 0, NULL, NULL),
(88, 'راشد الدوسري', 'abonafil0026@gmail.com', NULL, '$2y$10$bddFbRHYoHO8Jri6YmoESe0VJpArGnAckBUga7ooerzKnKpreLA9K', 0, NULL, NULL),
(89, 'عمر بن خضير العنزي', 'yvl@hotmail.com', NULL, '$2y$10$skWWdaYF6NT0m4qBl53oYeOJhzEqU5IjYy5VF1yohqWemqqF8ys8.', 0, NULL, NULL),
(93, 'جابر الاسمري', 'r-a00a@hotmail.com', NULL, '$2y$10$KLR2aN35i0PAEJdl4rbEdOW6kGYtToqO/uun6W36AmGqofrQN9mke', 0, NULL, NULL),
(94, 'ابوشايع', 'hq9999@gmail.com', NULL, '$2y$10$6L5OEYw0uGd2c.W75YWiyOJnfA1G7Yo32l9CE/UIDkJ6bDZobxlCW', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(4, 4, 1, NULL, NULL),
(128, 88, 2, NULL, NULL),
(131, 89, 3, NULL, NULL),
(140, 93, 2, NULL, NULL),
(141, 94, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_team`
--

CREATE TABLE `admin_team` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_team`
--

INSERT INTO `admin_team` (`id`, `admin_id`, `team_id`, `created_at`, `updated_at`) VALUES
(54, 87, 37, NULL, NULL),
(55, 88, 38, NULL, NULL),
(56, 89, 39, NULL, NULL),
(57, 92, 41, NULL, NULL),
(58, 93, 42, NULL, NULL),
(59, 94, 43, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(68, '2019_07_13_211305_create_admins_table', 1),
(69, '2019_07_13_214628_create_roles_table', 1),
(70, '2019_07_13_221134_create_admin_role_table', 1),
(77, '2020_02_27_102436_create_admin_team_table', 1),
(99, '2014_10_12_100000_create_password_resets_table', 2),
(100, '2020_02_23_211053_create_tournaments_table', 2),
(101, '2020_02_24_123229_create_teams_table', 2),
(102, '2020_02_25_102655_create_players_table', 2),
(103, '2020_02_27_160213_add_code_expired_to_teams_table', 2),
(104, '2020_02_28_124416_create_notifications_table', 2),
(105, '2020_03_07_090326_create_codes_table', 2),
(106, '2020_05_26_182308_create_seasons_table', 2),
(107, '2020_05_26_184107_add_type_to_tournaments_table', 2),
(108, '2020_05_26_184218_add_logo_and_details_to_tournaments_table', 2),
(109, '2020_05_26_203744_add_type_and_logo_and_city_trainer_to_teams_table', 2),
(110, '2020_05_27_145640_add_club_registered_and_club_name_and_nationality_to_players_table', 2),
(111, '2020_05_28_111110_create_site_news_table', 2),
(112, '2020_05_28_112829_create_punishments_table', 2),
(113, '2020_05_28_115538_add_admin_id_to_tournaments_table', 2),
(114, '2020_05_31_112134_add_season_id_to_tournaments_table', 2),
(115, '2020_06_02_105158_add_season_id_to_teams_table', 2),
(116, '2020_06_22_133956_create_team_seasons_table', 2),
(117, '2020_06_27_114247_add_season_id_to_players_table', 3),
(118, '2020_06_27_162539_add_max_player_to_teams_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('010fa6b6-fc1c-43c9-8f21-5bdfac8b1fce', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"Z5\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":31,\"created_at\":\"2020-07-07T18:15:55.000000Z\"}', '2020-07-12 14:22:52', '2020-07-08 01:15:55', '2020-07-12 14:22:52'),
('194d8f5e-b14e-4978-8bfe-1c61900074a4', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 1\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":10,\"created_at\":\"2020-06-24T14:05:46.000000Z\"}', '2020-06-28 07:42:48', '2020-06-24 12:05:47', '2020-06-28 07:42:48'),
('1adfd95b-5a5c-4268-bf01-0c2df4adf20a', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u062f\\u0627\\u062e\\u0644\\u064a \\u062c\\u062f\\u064a\\u062f\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":12,\"created_at\":\"2020-06-27T16:22:06.000000Z\"}', '2020-06-28 07:42:48', '2020-06-27 14:22:06', '2020-06-28 07:42:48'),
('26cb6e0d-a963-4e2e-9907-8030bf4d19d2', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0628\\u062f\\u0648\\u0646 \\u0628\\u0637\\u0648\\u0644\\u0629\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":21,\"created_at\":\"2020-07-06T12:03:24.000000Z\"}', '2020-07-07 01:43:36', '2020-07-06 19:03:25', '2020-07-07 01:43:36'),
('2ce8f27d-13a0-48f2-8a8b-89c7d96780fd', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0628\\u0648\\u0645\\u0627 71\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":42,\"created_at\":\"2020-07-12T07:27:27.000000Z\"}', NULL, '2020-07-12 14:27:27', '2020-07-12 14:27:27'),
('33d9d7e9-b067-4db0-8699-f6f8ae69808f', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0628\\u0648\\u0645\\u0627 71\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":41,\"created_at\":\"2020-07-12T07:24:39.000000Z\"}', NULL, '2020-07-12 14:24:39', '2020-07-12 14:24:39'),
('381b866a-04d6-4cbf-99bf-13722a4a2048', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 2 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 2\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":5,\"created_at\":\"2020-06-23T13:35:48.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:35:48', '2020-06-28 07:42:49'),
('3df9a9df-9c1e-437b-83c5-e1d2c3729d64', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0645\\u062d\\u0645\\u0648\\u062f\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":20,\"created_at\":\"2020-07-05T19:31:26.000000Z\"}', '2020-07-07 01:43:36', '2020-07-06 02:31:26', '2020-07-07 01:43:36'),
('4d37ec5d-a3d9-4af4-99f5-5336c53d0d4c', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 2\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":7,\"created_at\":\"2020-06-23T13:42:29.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:42:30', '2020-06-28 07:42:49'),
('4fcf5e4f-c653-4d3a-8ae6-5c0a788cef14', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":23,\"created_at\":\"2020-07-06T18:15:48.000000Z\"}', '2020-07-07 01:43:36', '2020-07-07 01:15:48', '2020-07-07 01:43:36'),
('503d0358-1d42-4745-af43-71ca10e1a62a', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0627\\u0643\\u0627\\u062f\\u064a\\u0645\\u064a\\u0629 \\u0627\\u0644\\u0641\\u0647\\u062f\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":39,\"created_at\":\"2020-07-09T21:03:13.000000Z\"}', '2020-07-12 14:22:52', '2020-07-10 04:03:13', '2020-07-12 14:22:52'),
('5bdb286c-7cf2-46a2-8cc9-943abf106aa9', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0627\\u0644\\u0646\\u062c\\u0648\\u0645\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":38,\"created_at\":\"2020-07-09T20:16:05.000000Z\"}', '2020-07-12 14:22:52', '2020-07-10 03:16:05', '2020-07-12 14:22:52'),
('61e48b82-c5cc-4bc6-83ca-b01788167399', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0627\\u0644\\u0638\\u0647\\u0631\\u0627\\u0646\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":43,\"created_at\":\"2020-07-12T07:54:52.000000Z\"}', NULL, '2020-07-12 14:54:52', '2020-07-12 14:54:52'),
('64e4ceb7-682c-4461-82bd-5a52d6df55d7', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0628\\u0648\\u0645\\u0627 71\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":37,\"created_at\":\"2020-07-09T15:57:22.000000Z\"}', '2020-07-12 14:22:52', '2020-07-09 22:57:23', '2020-07-12 14:22:52'),
('71218f7a-047e-4bb2-9389-69b28c9f78cd', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u062b\\u0627\\u0646\\u064a \\u0628\\u0628\\u0637\\u0648\\u0644\\u0629\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":28,\"created_at\":\"2020-07-07T12:15:36.000000Z\"}', '2020-07-07 21:55:09', '2020-07-07 19:15:36', '2020-07-07 21:55:09'),
('7bbd2c37-be10-42c7-b217-d0c3a063f4db', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0628\\u0648\\u0645\\u0627 \\u0667\\u0661\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":22,\"created_at\":\"2020-07-06T17:10:23.000000Z\"}', '2020-07-07 01:43:36', '2020-07-07 00:10:23', '2020-07-07 01:43:36'),
('7fa6c5dc-831b-4204-8d3f-66e136e53324', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0628\\u0648\\u0645\\u0627\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":29,\"created_at\":\"2020-07-07T15:08:11.000000Z\"}', '2020-07-12 14:22:52', '2020-07-07 22:08:11', '2020-07-12 14:22:52'),
('851b9575-fa56-48d5-9cc9-22279c5d8401', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"Mahmoud Taha\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":19,\"created_at\":\"2020-07-05T17:10:29.000000Z\"}', '2020-07-06 00:55:36', '2020-07-06 00:10:29', '2020-07-06 00:55:36'),
('8cf9df27-df3c-49a6-8d16-f132d23bfbd7', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 1\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":8,\"created_at\":\"2020-06-23T13:43:18.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:43:18', '2020-06-28 07:42:49'),
('8e3d5811-82fd-4e4a-9821-e1444b1991fd', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0628\\u062d\\u062f \\u0623\\u0642\\u0635\\u064a\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":13,\"created_at\":\"2020-06-27T16:46:26.000000Z\"}', '2020-06-28 07:42:48', '2020-06-27 14:46:26', '2020-06-28 07:42:48'),
('93f031d6-24fa-4595-9e80-0939f492499e', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0628\\u062f\\u0648\\u0646 \\u0628\\u0637\\u0648\\u0644\\u0629\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":24,\"created_at\":\"2020-07-07T11:55:50.000000Z\"}', '2020-07-07 21:55:09', '2020-07-07 18:55:51', '2020-07-07 21:55:09'),
('9808e9f9-75b7-48c7-81e6-f5061dc27dc3', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0645\\u0648\\u0633\\u0645 \\u062b\\u0627\\u0646\\u064a\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":36,\"created_at\":\"2020-07-08T12:07:14.000000Z\"}', '2020-07-12 14:22:52', '2020-07-08 19:07:14', '2020-07-12 14:22:52'),
('9b897bd5-ca04-4648-9f96-dafecdf31f17', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":18,\"created_at\":\"2020-07-01T19:24:46.000000Z\"}', '2020-07-06 00:55:36', '2020-07-02 02:24:46', '2020-07-06 00:55:36'),
('a03763d3-1485-46b7-81f4-06587e5ec2f0', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0628\\u0628\\u0637\\u0648\\u0644\\u0629\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":35,\"created_at\":\"2020-07-08T12:00:51.000000Z\"}', '2020-07-12 14:22:52', '2020-07-08 19:00:51', '2020-07-12 14:22:52'),
('a0457452-57f1-40e1-8242-7875eb253ee2', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0628\\u0628\\u0637\\u0648\\u0644\\u0629\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":26,\"created_at\":\"2020-07-07T12:10:01.000000Z\"}', '2020-07-07 21:55:09', '2020-07-07 19:10:01', '2020-07-07 21:55:09'),
('a0fb9b4f-8769-4015-b98c-63f696312b8c', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 2\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":4,\"created_at\":\"2020-06-23T13:33:26.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:33:27', '2020-06-28 07:42:49'),
('a2aa63da-711d-45d3-a686-afa0ea76adcd', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0628\\u0648\\u0645\\u0627 \\u0667\\u0661\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":40,\"created_at\":\"2020-07-12T07:14:52.000000Z\"}', '2020-07-12 14:22:52', '2020-07-12 14:14:52', '2020-07-12 14:22:52'),
('a69d5d06-0baa-4739-9a5d-2d402f762711', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0639\\u0644\\u064a\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":16,\"created_at\":\"2020-07-01T16:12:10.000000Z\"}', '2020-07-01 23:27:13', '2020-07-01 23:12:10', '2020-07-01 23:27:13'),
('a980ce84-84dd-4f81-b724-c380b0ba9912', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u062b\\u0627\\u0646\\u064a \\u0628\\u062f\\u0648\\u0646 \\u0628\\u0637\\u0648\\u0644\\u0629\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":27,\"created_at\":\"2020-07-07T12:14:53.000000Z\"}', '2020-07-07 21:55:09', '2020-07-07 19:14:53', '2020-07-07 21:55:09'),
('a9d5193d-55a8-4f5a-9cdb-74bc9ecf0c9b', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0628\\u0648\\u0645\\u0627 \\u0667\\u0661\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":17,\"created_at\":\"2020-07-01T16:16:47.000000Z\"}', '2020-07-01 23:27:13', '2020-07-01 23:16:47', '2020-07-01 23:27:13'),
('b5da792d-f6af-411f-be37-85b7694fdc89', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0623\\u0648\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0628\\u0637\\u0648\\u0644\\u0629\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":34,\"created_at\":\"2020-07-08T09:23:52.000000Z\"}', '2020-07-12 14:22:52', '2020-07-08 16:23:52', '2020-07-12 14:22:52'),
('c18c9eeb-75e3-413d-b3ad-938c35e6aa15', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 2\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":6,\"created_at\":\"2020-06-23T13:36:44.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:36:44', '2020-06-28 07:42:49'),
('c44257a7-9023-476a-941c-7b756bd1f609', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 2\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":11,\"created_at\":\"2020-06-24T14:07:29.000000Z\"}', '2020-06-28 07:42:48', '2020-06-24 12:07:29', '2020-06-28 07:42:48'),
('c52f75bb-801e-4a48-a7e7-5210babf1208', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0623\\u0648\\u0644 \\u0628\\u062f\\u0648\\u0646 \\u0628\\u0637\\u0648\\u0644\\u0629\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":32,\"created_at\":\"2020-07-08T09:05:47.000000Z\"}', '2020-07-12 14:22:52', '2020-07-08 16:05:47', '2020-07-12 14:22:52'),
('d848b4aa-36a9-4cee-8b2c-dd41a99ae2a2', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0628\\u0648\\u0645\\u0627 \\u0667\\u0661\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":30,\"created_at\":\"2020-07-07T16:50:45.000000Z\"}', '2020-07-12 14:22:52', '2020-07-07 23:50:45', '2020-07-12 14:22:52'),
('ddfa691e-6f92-4db7-a2f2-4e5f370e0da5', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 1\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":3,\"created_at\":\"2020-06-23T13:32:52.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:32:52', '2020-06-28 07:42:49'),
('e8b6b098-0da9-4280-be6c-0aa09a505458', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0628\\u062f\\u0648\\u0646 \\u0628\\u0637\\u0648\\u0644\\u0629\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":25,\"created_at\":\"2020-07-07T12:03:24.000000Z\"}', '2020-07-07 21:55:09', '2020-07-07 19:03:24', '2020-07-07 21:55:09'),
('f4bba9b3-24df-463b-9394-52c3130e8285', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0628\\u062d\\u062f \\u0623\\u0642\\u0635\\u064a\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":14,\"created_at\":\"2020-06-27T17:28:32.000000Z\"}', '2020-06-28 07:42:48', '2020-06-27 15:28:32', '2020-06-28 07:42:48'),
('f76c89b9-c3ee-4951-be3b-cfe139d5de0a', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u062b\\u0627\\u0646\\u064a \\u0628\\u062f\\u0648\\u0646 \\u0628\\u0637\\u0648\\u0644\\u0629\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":33,\"created_at\":\"2020-07-08T09:06:53.000000Z\"}', '2020-07-12 14:22:52', '2020-07-08 16:06:53', '2020-07-12 14:22:52'),
('fa32b833-be5d-4ea1-a1ec-2db47e267799', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0628\\u0648\\u0645\\u0627 \\u0667\\u0661\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":15,\"created_at\":\"2020-06-30T22:48:36.000000Z\"}', '2020-07-01 05:57:47', '2020-07-01 05:48:36', '2020-07-01 05:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tournament_id` bigint(20) UNSIGNED DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `birth` date DEFAULT NULL,
  `file1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_registered` int(11) NOT NULL DEFAULT '0',
  `season_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `created_at`, `updated_at`, `tournament_id`, `team_id`, `name`, `national_id`, `status`, `birth`, `file1`, `file2`, `img`, `club_name`, `nationality`, `club_registered`, `season_id`) VALUES
(39, '2020-07-10 03:12:19', '2020-07-10 03:12:19', NULL, 37, 'علي سعيد ال عبيه', '1065524801', 0, '1988-09-27', '34651594325539.jpeg', NULL, '8801594325539.jpeg', 'نجران', 'سعودي', 0, 16),
(40, '2020-07-10 04:24:41', '2020-07-10 04:24:41', NULL, 39, 'خليفه منصور القطان', '1086816319', 0, '1995-07-11', '68241594329881.jpeg', NULL, '75821594329881.jpeg', NULL, 'سعودي', 0, 16),
(41, '2020-07-10 04:50:47', '2020-07-12 03:15:41', NULL, 38, 'خالد علي طليحان الشمري', '1094141684', 1, '1997-01-27', '13791594331447.jpeg', NULL, '48101594331447.jpeg', NULL, 'سعودي', 0, 16),
(42, '2020-07-10 05:04:24', '2020-07-10 05:04:24', NULL, 38, 'فوزي سالم بالحارث', '1119002226', 0, '2000-02-29', '2371594332264.jpeg', NULL, '86611594332264.jpeg', 'رأس تنورة', 'سعودي', 0, 16),
(43, '2020-07-10 05:20:19', '2020-07-10 05:20:19', NULL, 38, 'مساعد عبدالله عبده', '2160306037', 0, '1999-05-16', '44681594333219.jpeg', NULL, '57251594333219.jpeg', NULL, 'يمني', 0, 16),
(44, '2020-07-10 05:29:20', '2020-07-10 05:29:20', NULL, 38, 'فيصل سليمان التميمي', '1089504078', 0, '1996-01-25', '1631594333760.jpeg', NULL, '36671594333760.jpeg', 'النعيرية', 'سعودي', 0, 16),
(45, '2020-07-10 06:09:51', '2020-07-10 06:09:51', NULL, 38, 'طلال علي طليحان الشمري', '1099103572', 0, '1998-04-18', '34491594336191.jpeg', NULL, '96991594336190.jpeg', NULL, 'سعودي', 0, 16),
(46, '2020-07-10 21:56:32', '2020-07-10 21:56:32', NULL, 39, 'صفوان الحربي', '1066655729', 0, '1990-06-27', '70671594392991.jpg', NULL, '79061594392991.jpeg', NULL, 'سعودي', 0, 16),
(47, '2020-07-10 22:04:21', '2020-07-10 22:04:21', NULL, 39, 'محمد علي سعيد الغامدي', '1110883418', 0, '2001-01-28', '53681594393461.jpeg', NULL, NULL, 'القادسيه', 'سعودي', 0, 16),
(48, '2020-07-11 19:44:56', '2020-07-11 19:44:56', NULL, 39, 'محمد عبدالعزيز الشهراني', '1085938205', 0, '1994-06-04', '6631594471496.jpeg', NULL, '81871594471496.jpeg', NULL, 'سعودي', 0, 16);

-- --------------------------------------------------------

--
-- Table structure for table `punishments`
--

CREATE TABLE `punishments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `player_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_ar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'مدير موقع', NULL, NULL, NULL),
(2, 'مدير فريق', NULL, NULL, NULL),
(3, 'مدير بطولة', 'tournament manager', NULL, NULL),
(5, 'غير مصرح بحذف لاعبين', 'not allowed to delete players', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `max` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `created_at`, `updated_at`, `name`, `status`, `start`, `end`, `max`) VALUES
(16, '2020-07-09 00:33:58', '2020-07-09 00:35:46', 'موسم 2020', 1, '2020-01-01', '2020-12-31', 40);

-- --------------------------------------------------------

--
-- Table structure for table `site_news`
--

CREATE TABLE `site_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tournament_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_expired` int(11) NOT NULL DEFAULT '0',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trainer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `season_id` bigint(20) UNSIGNED DEFAULT NULL,
  `max_player` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `created_at`, `updated_at`, `tournament_id`, `status`, `name`, `manager_name`, `manager_email`, `mobile_number`, `code`, `password`, `code_expired`, `type`, `logo`, `city`, `trainer`, `season_id`, `max_player`) VALUES
(37, '2020-07-09 22:57:22', '2020-07-10 03:09:59', NULL, 1, 'بوما 71', 'جابر الاسمري', 'r-a00a@hotmail.com', '0545200500', '0CjFf', '$2y$10$KmDwg/wzIE2Vq.oHe3yqXeJ7q1qHE4znUrXuZwv1h7xUQerbd8BMe', 0, NULL, '53081594310242.jpeg', 'الدمام', 'علي سعيد ال عبيه', 16, 40),
(38, '2020-07-10 03:16:05', '2020-07-12 03:20:52', NULL, 1, 'النجوم', 'راشد الدوسري', 'abonafil0026@gmail.com', '0503834170', 'EWSVl', '$2y$10$bddFbRHYoHO8Jri6YmoESe0VJpArGnAckBUga7ooerzKnKpreLA9K', 0, NULL, '781594498852.jpg', 'رأس تنورة', 'جابر محمد مجرشي', 16, 40),
(39, '2020-07-10 04:03:13', '2020-07-10 04:05:42', NULL, 1, 'اكاديمية الفهد', 'عمر بن خضير العنزي', 'yvl@hotmail.com', '0503888273', 'HRsJs', '$2y$10$9T7xWZzFhMWjQHBKHFC.3uXHfKR1czz.O4w/JUZWdbwkOfM..pSZe', 0, NULL, '39631594328593.jpeg', 'الدمام', 'عمر العنزي', 16, 40),
(42, '2020-07-12 14:27:27', '2020-07-12 14:27:27', NULL, 0, 'بوما 71', 'جابر الاسمري', 'r-a00a@hotmail.com', '0545200500', NULL, '$2y$10$OFzJnCUBP71leESEK9s4cOt9kzuP1wtn14LMAmCVNWmlooVj0/wUu', 0, NULL, '52091594538847.jpeg', 'الدمام', 'علي ال عبيه', 16, 40),
(43, '2020-07-12 14:54:52', '2020-07-12 14:54:52', NULL, 0, 'الظهران', 'ابوشايع', 'hq9999@gmail.com', '966504999934', NULL, '$2y$10$knw75NhEiCtcW2AvpyjEbe716SgBMcOmpZpJDqDBCh5eQa6aqDT4S', 0, NULL, NULL, 'Dammam', 'طلال', 16, 40);

-- --------------------------------------------------------

--
-- Table structure for table `team_seasons`
--

CREATE TABLE `team_seasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `season_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `season_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `created_at`, `updated_at`, `name`, `status`, `start`, `end`, `type`, `logo`, `details`, `admin_id`, `season_id`) VALUES
(16, '2020-07-12 03:32:39', '2020-07-12 03:32:45', 'بطولة البقاء للاقوئ', 1, '2020-07-12', '2020-08-11', NULL, '23701594499559.jpeg', 'بطولة خروج المغلوب تتكون من ٤ فرق', 89, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_role_admin_id_foreign` (`admin_id`),
  ADD KEY `admin_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `admin_team`
--
ALTER TABLE `admin_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codes_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`),
  ADD KEY `players_tournament_id_foreign` (`tournament_id`),
  ADD KEY `players_team_id_foreign` (`team_id`),
  ADD KEY `players_season_id_foreign` (`season_id`);

--
-- Indexes for table `punishments`
--
ALTER TABLE `punishments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `punishments_player_id_foreign` (`player_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_news`
--
ALTER TABLE `site_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_tournament_id_foreign` (`tournament_id`),
  ADD KEY `teams_season_id_foreign` (`season_id`);

--
-- Indexes for table `team_seasons`
--
ALTER TABLE `team_seasons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_seasons_team_id_foreign` (`team_id`),
  ADD KEY `team_seasons_season_id_foreign` (`season_id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tournaments_admin_id_foreign` (`admin_id`),
  ADD KEY `tournaments_season_id_foreign` (`season_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `admin_team`
--
ALTER TABLE `admin_team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `punishments`
--
ALTER TABLE `punishments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `site_news`
--
ALTER TABLE `site_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `team_seasons`
--
ALTER TABLE `team_seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `codes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `players_tournament_id_foreign` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `punishments`
--
ALTER TABLE `punishments`
  ADD CONSTRAINT `punishments_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teams_tournament_id_foreign` FOREIGN KEY (`tournament_id`) REFERENCES `tournaments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_seasons`
--
ALTER TABLE `team_seasons`
  ADD CONSTRAINT `team_seasons_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_seasons_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD CONSTRAINT `tournaments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tournaments_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
