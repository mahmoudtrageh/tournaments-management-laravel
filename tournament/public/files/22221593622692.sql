-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2020 at 10:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport`
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
  `isSuper` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `img`, `password`, `isSuper`, `created_at`, `updated_at`) VALUES
(4, 'أدمن', 'admin@gmail.com', NULL, '$2y$12$KA71ok3wV3bHs94qXF4afOHKmZi6TU4hASMaPBiRFlCNb3FEauefG', 0, NULL, NULL),
(49, 'محمود', 'mahmoud@gmail.com', NULL, '$2y$10$cDNYedEgJ4BmDsssiKObOOQmsG6/6/K79n/m5DrvUiJztUpTf4yia', 0, NULL, NULL),
(50, 'عادل', 'adel@gmail.com', NULL, '$2y$10$pqUKVVgmyB96/XW/t/C/X.L.fjZr6hxdV4F4lbocT87XMycCAnKR2', 0, NULL, NULL),
(51, 'شوقي', 'shwky@gmail.com', NULL, '$2y$10$GJDKWdJCVMNDuTNDDzmAwuN3V1fAKVh65d08QJM2mc2Gd7f8bCZCC', 0, NULL, NULL),
(52, 'شوقي', 'shwky@gmail.com', NULL, '$2y$10$7LoNkIviVOr4jYix2BCMNOYaoxeyKj5QAr/A6w3hkr5lkfD9VWWCu', 0, NULL, NULL),
(54, 'محمود', 'admin@gmail.com', NULL, '$2y$10$ZUYiXla4yUMjxgOqtOgzCu8EkS4jJBVchBIiF42fs5rMmKqZQyr4G', 0, NULL, NULL);

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
(80, 49, 2, NULL, NULL),
(82, 50, 3, NULL, NULL),
(84, 54, 2, NULL, NULL);

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
(29, 49, 10, NULL, NULL),
(30, 50, 11, NULL, NULL),
(31, 53, 13, NULL, NULL),
(32, 54, 14, NULL, NULL);

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
('194d8f5e-b14e-4978-8bfe-1c61900074a4', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 1\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":10,\"created_at\":\"2020-06-24T14:05:46.000000Z\"}', '2020-06-28 07:42:48', '2020-06-24 12:05:47', '2020-06-28 07:42:48'),
('1adfd95b-5a5c-4268-bf01-0c2df4adf20a', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u062f\\u0627\\u062e\\u0644\\u064a \\u062c\\u062f\\u064a\\u062f\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":12,\"created_at\":\"2020-06-27T16:22:06.000000Z\"}', '2020-06-28 07:42:48', '2020-06-27 14:22:06', '2020-06-28 07:42:48'),
('381b866a-04d6-4cbf-99bf-13722a4a2048', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 2 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 2\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":5,\"created_at\":\"2020-06-23T13:35:48.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:35:48', '2020-06-28 07:42:49'),
('4d37ec5d-a3d9-4af4-99f5-5336c53d0d4c', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 2\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":7,\"created_at\":\"2020-06-23T13:42:29.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:42:30', '2020-06-28 07:42:49'),
('8cf9df27-df3c-49a6-8d16-f132d23bfbd7', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 1\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":8,\"created_at\":\"2020-06-23T13:43:18.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:43:18', '2020-06-28 07:42:49'),
('8e3d5811-82fd-4e4a-9821-e1444b1991fd', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0628\\u062d\\u062f \\u0623\\u0642\\u0635\\u064a\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":13,\"created_at\":\"2020-06-27T16:46:26.000000Z\"}', '2020-06-28 07:42:48', '2020-06-27 14:46:26', '2020-06-28 07:42:48'),
('a0fb9b4f-8769-4015-b98c-63f696312b8c', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 2\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":4,\"created_at\":\"2020-06-23T13:33:26.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:33:27', '2020-06-28 07:42:49'),
('c18c9eeb-75e3-413d-b3ad-938c35e6aa15', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 2\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":6,\"created_at\":\"2020-06-23T13:36:44.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:36:44', '2020-06-28 07:42:49'),
('c44257a7-9023-476a-941c-7b756bd1f609', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 2\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":11,\"created_at\":\"2020-06-24T14:07:29.000000Z\"}', '2020-06-28 07:42:48', '2020-06-24 12:07:29', '2020-06-28 07:42:48'),
('ddfa691e-6f92-4db7-a2f2-4e5f370e0da5', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 1 \\u0628\\u0637\\u0648\\u0644\\u0629 1 \\u0645\\u0648\\u0633\\u0645 1\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":3,\"created_at\":\"2020-06-23T13:32:52.000000Z\"}', '2020-06-28 07:42:49', '2020-06-23 11:32:52', '2020-06-28 07:42:49'),
('f4bba9b3-24df-463b-9394-52c3130e8285', 'App\\Notifications\\RegisterTeam', 'App\\Admin', 4, '{\"name\":\"\\u0641\\u0631\\u064a\\u0642 \\u0628\\u062d\\u062f \\u0623\\u0642\\u0635\\u064a\",\"message\":\"\\u062a\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644 \\u0641\\u0631\\u064a\\u0642 \\u062c\\u062f\\u064a\\u062f\",\"id\":14,\"created_at\":\"2020-06-27T17:28:32.000000Z\"}', '2020-06-28 07:42:48', '2020-06-27 15:28:32', '2020-06-28 07:42:48');

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
  `tournament_id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `birth` date DEFAULT NULL,
  `file1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_registered` int(11) NOT NULL DEFAULT 0,
  `season_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `created_at`, `updated_at`, `tournament_id`, `team_id`, `name`, `national_id`, `status`, `birth`, `file1`, `file2`, `img`, `club_name`, `nationality`, `club_registered`, `season_id`) VALUES
(3, '2020-06-24 12:11:48', '2020-06-24 12:11:48', 3, 10, 'لاعب فريق أول موسم أول', '1234567890', 0, '1996-02-02', '11771593007908.PNG', NULL, '83471593007908.PNG', 'الرباط', 'سعودي', 0, 3),
(4, '2020-06-24 12:12:51', '2020-06-24 12:12:51', 4, 11, 'لاعب فريق أول موسم ثاني', '3232323232', 0, '1996-01-01', '82331593007971.PNG', NULL, '9821593007971.png', 'حسي', 'سعودي', 0, 4),
(5, '2020-06-24 12:13:45', '2020-06-24 12:13:45', 4, 11, 'لاعب ثاني فريق أول موسم ثاني', '1234567892', 0, '1999-01-01', '9911593008025.PNG', NULL, '97021593008025.PNG', 'الاهلي', 'مصري', 0, 4),
(6, '2020-06-27 10:07:53', '2020-06-27 14:09:06', 4, 11, 'لاعب 27', '1234567895', 0, '2020-01-01', '71231593274146.jpg', NULL, '71591593259673.jpg', 'الرباط', 'سعودي', 0, 4),
(7, '2020-06-27 15:58:33', '2020-06-27 15:58:33', 3, 14, 'لاعب أقصي 2', '1234567894', 0, '1212-02-02', '55591593280713.PNG', NULL, '74411593280713.PNG', 'الرباط', 'سعودي', 0, 3),
(9, '2020-06-27 16:09:10', '2020-06-27 16:09:10', 3, 14, 'لاعب حصري', '1234537895', 0, '1222-02-12', '8741593281350.jpg', NULL, '91961593281350.PNG', 'الرباط', 'سعودي', 0, 3);

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
  `text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
(4, 'إمكانية حذف لاعبين', 'allow delete players', NULL, NULL),
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
  `status` int(11) NOT NULL DEFAULT 0,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `max` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `created_at`, `updated_at`, `name`, `status`, `start`, `end`, `max`) VALUES
(3, '2020-06-24 11:46:43', '2020-06-27 15:29:29', 'موسم أول', 1, '2020-01-01', '2020-10-02', 2),
(4, '2020-06-24 11:47:42', '2020-06-24 11:47:42', 'موسم ثاني', 0, '2020-01-01', '2021-01-01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `site_news`
--

CREATE TABLE `site_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
  `status` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_expired` int(11) NOT NULL DEFAULT 0,
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
(10, '2020-06-24 12:05:46', '2020-06-24 12:11:09', 3, 1, 'فريق 1 بطولة 1 موسم 1', 'محمود', 'mahmoud@gmail.com', '01063993558', 'q2a8n', '$2y$10$qtavRfsC5Twrj9gwKA3ILOzp/R7LiHb1oKyNIqzfYzX.v4hd9.k1K', 0, NULL, '68791593007546.jpg', 'elsanta', 'مصطفي سعيد', 3, NULL),
(11, '2020-06-24 12:07:29', '2020-06-25 12:02:48', 4, 1, 'فريق 1 بطولة 1 موسم 2', 'عادل', 'adel@gmail.com', '01063993558', 'XVVo7', '$2y$10$agp/.qoxbI0H2MGECie/xu3r.4cIPY04wptqr/jONylii3v7Jxi7W', 0, NULL, '95891593007648.PNG', 'elsanta', 'مصطفي سعيد', 4, NULL),
(12, '2020-06-27 14:22:06', '2020-06-27 14:22:06', 3, 0, 'فريق داخلي جديد', 'محمود', 'mahmoud@gmail.com', '01063993558', NULL, '$2y$10$qtavRfsC5Twrj9gwKA3ILOzp/R7LiHb1oKyNIqzfYzX.v4hd9.k1K', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2020-06-27 15:28:32', '2020-06-27 16:07:44', 3, 1, 'فريق بحد أقصي', 'محمود', 'admin@gmail.com', '01063993558', 'ryHdL', '$2y$10$y3W0TUZVCVoEDjww.XX29uwzx.MxF5mZPbDSYpLxXg7uZ07/5S.ym', 0, NULL, '40781593278912.PNG', 'elsanta', 'مصطفي سعيد', 3, 2);

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

--
-- Dumping data for table `team_seasons`
--

INSERT INTO `team_seasons` (`id`, `created_at`, `updated_at`, `team_id`, `season_id`) VALUES
(4, NULL, NULL, 10, 3),
(5, NULL, NULL, 11, 4),
(7, NULL, NULL, 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `season_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `created_at`, `updated_at`, `name`, `status`, `start`, `end`, `type`, `logo`, `details`, `admin_id`, `season_id`) VALUES
(3, '2020-06-24 11:47:18', '2020-06-24 13:03:31', 'بطولة 1 موسم 1', 1, '2020-01-01', '2020-10-01', NULL, '30861593006438.jpg', 'وصف البطولة', 50, 3),
(4, '2020-06-24 11:48:10', '2020-06-24 13:03:33', 'بطولة 1 موسم 2', 1, '2020-01-01', '2021-01-01', NULL, '79981593006490.jpg', 'شيشيش', 4, 4);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `admin_team`
--
ALTER TABLE `admin_team`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_news`
--
ALTER TABLE `site_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `team_seasons`
--
ALTER TABLE `team_seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
