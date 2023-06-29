-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 01:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `posted_by` bigint(20) UNSIGNED NOT NULL,
  `answer_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `logo`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'shalini', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Database', 3, '2022-06-03 07:08:26', '2022-06-03 07:08:26'),
(2, 'shalini', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Database', 4, '2022-06-03 07:47:35', '2022-06-03 07:47:35'),
(3, 'Shalini R', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Created', 4, '2022-06-03 07:54:19', '2022-06-03 07:54:19'),
(4, 'Shalini R', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Created', 4, '2022-06-03 07:55:36', '2022-06-03 07:55:36'),
(5, 'Shalini R', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Creatred Successfully', 4, '2022-06-03 08:01:30', '2022-06-03 08:01:30'),
(6, 'Shalini R', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Creatred Successfully', 4, '2022-06-03 08:19:08', '2022-06-03 08:19:08'),
(7, 'Shalini R', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Creatred Successfully', 4, '2022-06-03 08:20:29', '2022-06-03 08:20:29'),
(8, 'Shalini R', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Creatred Successfully', 4, '2022-06-03 08:21:26', '2022-06-03 08:21:26'),
(9, 'Shalini R', 'C:\\xampp\\tmp\\php40CF.tmp', 'Updated Successfully', 4, '2022-06-03 22:41:17', '2022-06-04 02:51:40'),
(10, 'shalini', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Database', 4, '2022-06-04 00:27:35', '2022-06-04 00:27:35'),
(11, 'shalini', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Database', 4, '2022-06-04 00:30:33', '2022-06-04 00:30:33'),
(12, 'shalini', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Database', 4, '2022-06-04 00:57:07', '2022-06-04 00:57:07'),
(13, 'shalini', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Database Created', 4, '2022-06-04 00:57:57', '2022-06-04 00:57:57'),
(14, 'shalini', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Database Created', 4, '2022-06-04 00:58:35', '2022-06-04 00:58:35'),
(15, 'shalini', 'C:\\xampp\\htdocs\\mentor\\public/logo', 'Database Created', 4, '2022-06-04 01:02:32', '2022-06-04 01:02:32'),
(16, 'shalini', 'C:\\xampp\\htdocs\\mentor\\public\\storage\\app\\public', 'Database Created', 4, '2022-06-04 01:19:19', '2022-06-04 01:19:19'),
(17, 'shalini', 'C:\\xampp\\htdocs\\mentor\\storage\\public/C:\\xampp\\tmp\\php3E13.tmp', 'Database Created', 4, '2022-06-04 01:19:54', '2022-06-04 01:19:54'),
(18, 'shalini', 'C:\\xampp\\tmp\\phpD802.tmp', 'Database Created', 4, '2022-06-04 01:20:34', '2022-06-04 01:20:34'),
(19, 'shalini', 'C:\\xampp\\tmp\\phpD213.tmp', 'Database Created', 4, '2022-06-04 01:21:38', '2022-06-04 01:21:38'),
(20, 'shalini', 'C:\\xampp\\tmp\\php8D84.tmp', 'Database Created', 4, '2022-06-04 01:22:26', '2022-06-04 01:22:26'),
(21, 'shalini', 'C:\\xampp\\htdocs\\mentor\\storage\\public/C:\\xampp\\tmp\\phpDB86.tmp', 'Database Created', 4, '2022-06-04 01:22:46', '2022-06-04 01:22:46'),
(22, 'shalini', 'C:\\xampp\\htdocs\\mentor\\storage\\public/logoC:\\xampp\\tmp\\phpA4CB.tmp', 'Database Created', 4, '2022-06-04 01:32:22', '2022-06-04 01:32:22'),
(23, 'shalini', 'C:\\xampp\\htdocs\\mentor\\storage\\public/logoC:\\xampp\\tmp\\phpCC3A.tmp', 'Database Created', 4, '2022-06-04 01:32:32', '2022-06-04 01:32:32'),
(24, 'shalini', 'C:\\xampp\\tmp\\php4DD0.tmp', 'Database Created', 4, '2022-06-04 01:45:06', '2022-06-04 01:45:06'),
(25, 'shalini', 'C:\\xampp\\tmp\\phpB739.tmp', 'Database Created', 4, '2022-06-04 01:45:33', '2022-06-04 01:45:33'),
(26, 'shalini', 'C:\\xampp\\tmp\\php68C2.tmp', 'Database Created', 4, '2022-06-04 01:47:24', '2022-06-04 01:47:24'),
(27, 'shalini', 'C:\\xampp\\tmp\\php6544.tmp', 'Database Created', 4, '2022-06-04 01:48:28', '2022-06-04 01:48:28'),
(28, 'shalini', 'C:\\xampp\\tmp\\php8C3D.tmp', 'Database Created', 4, '2022-06-04 01:50:50', '2022-06-04 01:50:50'),
(29, 'shalini', 'C:\\xampp\\tmp\\phpD40B.tmp', 'Database Created', 4, '2022-06-04 01:53:19', '2022-06-04 01:53:19'),
(30, 'shalini', 'C:\\xampp\\tmp\\php5C28.tmp', 'Database Created', 4, '2022-06-04 01:53:54', '2022-06-04 01:53:54'),
(31, 'shalini', 'C:\\xampp\\tmp\\php151F.tmp', 'Database Created', 4, '2022-06-04 01:56:52', '2022-06-04 01:56:52'),
(32, 'shalini', 'C:\\xampp\\tmp\\php8389.tmp', 'Database Created', 4, '2022-06-04 01:57:21', '2022-06-04 01:57:21'),
(33, 'shalini', 'C:\\xampp\\tmp\\phpCD74.tmp', 'Database Created', 4, '2022-06-04 01:57:40', '2022-06-04 01:57:40'),
(34, 'shalini R', 'C:\\xampp\\tmp\\phpE182.tmp', 'Database Created', 4, '2022-06-04 01:59:56', '2022-06-04 01:59:56'),
(35, 'shalini R', '1654328478.png', 'Database Created', 4, '2022-06-04 02:11:18', '2022-06-04 02:11:18'),
(36, 'shalini R', '1654329112.png', 'Database Created', 4, '2022-06-04 02:21:52', '2022-06-04 02:21:52'),
(37, 'Shalini R', 'C:\\xampp\\tmp\\php86C7.tmp', 'Updated Successfully', 4, '2022-06-04 03:20:46', '2022-06-04 04:52:07'),
(38, 'shalini R', '1654337465.png', 'Database Createdeee', 4, '2022-06-04 04:41:05', '2022-06-04 04:41:05'),
(39, 'Shalini R', 'C:\\xampp\\tmp\\phpFAA0.tmp', 'Updated Successfully', 4, '2022-06-04 04:41:18', '2022-06-04 05:11:11'),
(40, 'Shalini R', 'C:\\xampp\\tmp\\phpFE0A.tmp', 'Updated Successfully', 4, '2022-06-04 04:49:55', '2022-06-04 05:02:28'),
(41, 'Shalini R', '1654348130.png', 'Updated Successfull', 4, '2022-06-04 05:04:23', '2022-06-04 07:38:50'),
(42, 'shalini R', '1654339120.png', 'Database Createdeee', 4, '2022-06-04 05:08:40', '2022-06-04 05:08:40'),
(43, 'shalini R', '1654339152.png', 'Database Createdeee', 4, '2022-06-04 05:09:12', '2022-06-04 05:09:12'),
(44, 'shalini R', '1654340894.png', 'Database Createdeee', 4, '2022-06-04 05:38:14', '2022-06-04 05:38:14'),
(45, 'shalini R', '1654340979.png', 'Database Createdeee', 4, '2022-06-04 05:39:39', '2022-06-04 05:39:39'),
(46, 'shalini R', '1654348108.png', 'Database Createdeee', 4, '2022-06-04 07:38:28', '2022-06-04 07:38:28'),
(47, 'shalini R', '1654496830.png', 'Database Createdeee', 4, '2022-06-06 00:57:10', '2022-06-06 00:57:10'),
(48, 'shalini R', '1654504729.png', 'Database Createdeee', 4, '2022-06-06 03:08:49', '2022-06-06 03:08:49'),
(49, 'shalini R', '1654504741.png', 'Database Createdeee', 4, '2022-06-06 03:09:01', '2022-06-06 03:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `company_mentor`
--

CREATE TABLE `company_mentor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_types`
--

CREATE TABLE `media_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_types`
--

INSERT INTO `media_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Image', '2022-06-06 01:06:40', '2022-06-06 01:06:40'),
(2, 'Video', '2022-06-06 01:06:54', '2022-06-06 01:06:54'),
(3, 'Document', '2022-06-06 01:07:10', '2022-06-06 01:07:10');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2022_05_31_070757_create_userrole_table', 1),
(10, '2022_05_31_071629_create_userprofile_table', 1),
(11, '2022_05_31_075248_alter_users_table', 1),
(12, '2022_06_01_103330_create_companies_table', 2),
(13, '2022_06_01_105650_create_company_mentor_table', 2),
(14, '2022_06_01_140002_create_post_table', 2),
(15, '2022_06_01_144230_create_media_type_table', 2),
(16, '2022_06_01_144421_create_post_type_table', 2),
(17, '2022_06_01_144631_create_post_media_table', 2),
(18, '2022_06_01_145224_create_answer_table', 2),
(19, '2022_06_01_145923_create_question_table', 2),
(20, '2022_06_02_043429_rename_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('1c7bb4dfcbea9582454c24c96c0ddb6a0f5d09f3525c1b52e3e82c0ddeb902e02b1d89d2468c3801', 4, 1, 'mentor', '[]', 0, '2022-06-03 22:40:54', '2022-06-03 22:40:54', '2023-06-04 04:10:54'),
('55db4ddf8b9f23e776a8074f3ebcc100696cb26b3c5b2c635ab9e12736181d531157f6fdd38a06f6', 3, 1, 'mentor', '[]', 0, '2022-06-03 01:19:15', '2022-06-03 01:19:15', '2023-06-03 06:49:15'),
('7bd8db46eecaab342d22303346caeb0106d4baef5373b2b07ef319273f31acacf31c34699bfadf87', 4, 1, 'mentor', '[]', 0, '2022-06-03 07:20:54', '2022-06-03 07:20:54', '2023-06-03 12:50:54'),
('e8ed292cb8cefa5ddbf320cd617a9dbfb52eddab1b103477fc05920dfaea88a8576a249af1b7f15a', 4, 1, 'mentor', '[]', 0, '2022-06-03 07:20:38', '2022-06-03 07:20:38', '2023-06-03 12:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'RvDhV3mY7zcAh9J8Mq254OfLHBfWx8Ig70fu1Jst', NULL, 'http://localhost', 1, 0, 0, '2022-06-03 01:19:04', '2022-06-03 01:19:04'),
(2, NULL, 'Laravel Password Grant Client', 'DE17OMtOEF4CflAKkyxiloZng5aKzdSUNejVqdJt', 'users', 'http://localhost', 0, 1, 0, '2022-06-03 01:19:04', '2022-06-03 01:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-06-03 01:19:04', '2022-06-03 01:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `postmedia`
--

CREATE TABLE `postmedia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `media_type_id` bigint(20) UNSIGNED NOT NULL,
  `media_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postmedia`
--

INSERT INTO `postmedia` (`id`, `post_id`, `media_type_id`, `media_url`, `created_at`, `updated_at`) VALUES
(1, 15, 1, 'http://localhost:8000/api/image/47', '2022-06-06 01:56:40', '2022-06-06 01:56:40'),
(2, 16, 1, 'http://localhost:8000/api/image/47', '2022-06-06 01:57:16', '2022-06-06 01:57:16'),
(3, 18, 1, 'C:\\xampp\\tmp\\php3644.tmp', '2022-06-06 02:10:26', '2022-06-06 02:10:26'),
(4, 19, 1, '1654501406.png', '2022-06-06 02:13:26', '2022-06-06 02:13:26'),
(5, 20, 1, 'http://localhost:8000/api/mediaimage', '2022-06-06 02:14:47', '2022-06-06 02:14:47'),
(6, 21, 1, '1654501906.png', '2022-06-06 02:21:46', '2022-06-06 02:21:46'),
(7, 22, 1, '1654502200.png', '2022-06-06 02:26:40', '2022-06-06 02:26:40'),
(8, 23, 2, '1654502594.mp4', '2022-06-06 02:33:14', '2022-06-06 02:33:14'),
(9, 24, 3, '1654502681.pdf', '2022-06-06 02:34:41', '2022-06-06 02:34:41'),
(10, 31, 3, '1654505253.pdf', '2022-06-06 03:17:33', '2022-06-06 03:17:33'),
(11, 32, 3, '1654505379.pdf', '2022-06-06 03:19:39', '2022-06-06 03:19:39'),
(12, 33, 3, '1654510336.jpeg', '2022-06-06 04:42:16', '2022-06-06 04:42:16'),
(13, 34, 3, '1654510395.jpeg', '2022-06-06 04:43:15', '2022-06-06 04:43:15'),
(14, 35, 3, '1654510454.jpeg', '2022-06-06 04:44:14', '2022-06-06 04:44:14'),
(15, 36, 3, '1654510481.jpeg', '2022-06-06 04:44:41', '2022-06-06 04:44:41'),
(16, 37, 3, '1654510758.pdf', '2022-06-06 04:49:18', '2022-06-06 04:49:18'),
(17, 38, 3, '1654510828.pdf', '2022-06-06 04:50:28', '2022-06-06 04:50:28'),
(18, 39, 3, '1654516294.pdf', '2022-06-06 06:21:34', '2022-06-06 06:21:34'),
(19, 40, 3, '1654516314.pdf', '2022-06-06 06:21:54', '2022-06-06 06:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_by_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `post_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_min` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_max` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `comment`, `posted_by_id`, `company_id`, `post_type_id`, `qualification`, `experience`, `salary_min`, `salary_max`, `created_at`, `updated_at`) VALUES
(1, 'tit', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-04 07:30:56', '2022-06-04 07:30:56'),
(2, 'tit', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-04 07:31:21', '2022-06-04 07:31:21'),
(3, 'tit', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-04 07:32:23', '2022-06-04 07:32:23'),
(4, 'tit', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-05 22:54:49', '2022-06-05 22:54:49'),
(5, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-05 22:55:12', '2022-06-05 22:55:12'),
(6, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-05 23:17:28', '2022-06-05 23:17:28'),
(7, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-05 23:17:54', '2022-06-05 23:17:54'),
(8, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-05 23:18:46', '2022-06-05 23:18:46'),
(9, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-05 23:21:55', '2022-06-05 23:21:55'),
(10, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-05 23:36:03', '2022-06-05 23:36:03'),
(11, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-05 23:36:42', '2022-06-05 23:36:42'),
(12, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-05 23:37:19', '2022-06-05 23:37:19'),
(13, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 01:53:26', '2022-06-06 01:53:26'),
(14, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 01:56:03', '2022-06-06 01:56:03'),
(15, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 01:56:40', '2022-06-06 01:56:40'),
(16, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 01:57:16', '2022-06-06 01:57:16'),
(17, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 02:08:54', '2022-06-06 02:08:54'),
(18, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 02:10:26', '2022-06-06 02:10:26'),
(19, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 02:13:26', '2022-06-06 02:13:26'),
(20, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 02:14:47', '2022-06-06 02:14:47'),
(21, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 02:21:46', '2022-06-06 02:21:46'),
(22, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 02:26:40', '2022-06-06 02:26:40'),
(23, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 02:33:14', '2022-06-06 02:33:14'),
(24, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 02:34:41', '2022-06-06 02:34:41'),
(25, 'title', 'good', 4, 45, '1', NULL, NULL, NULL, NULL, '2022-06-06 02:44:08', '2022-06-06 02:44:08'),
(26, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 03:12:34', '2022-06-06 03:12:34'),
(27, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 03:12:58', '2022-06-06 03:12:58'),
(28, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 03:13:34', '2022-06-06 03:13:34'),
(29, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 03:13:47', '2022-06-06 03:13:47'),
(30, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 03:16:49', '2022-06-06 03:16:49'),
(31, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 03:17:33', '2022-06-06 03:17:33'),
(32, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 03:19:39', '2022-06-06 03:19:39'),
(33, 'Content', 'Gooddddd', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 04:42:16', '2022-06-06 04:42:16'),
(34, 'Content', 'Gooddddd', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 04:43:15', '2022-06-06 04:43:15'),
(35, 'Content', 'Gooddddd', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 04:44:14', '2022-06-06 04:44:14'),
(36, 'Content', 'Gooddddd', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 04:44:41', '2022-06-06 04:44:41'),
(37, 'title', 'good', 4, 45, '2', NULL, NULL, NULL, NULL, '2022-06-06 04:49:18', '2022-06-06 04:49:18'),
(38, 'Mentor', 'Gooddd', 4, 5, '2', NULL, NULL, NULL, NULL, '2022-06-06 04:50:28', '2022-06-06 04:50:28'),
(39, 'Mentor', 'Gooddd', 4, 5, '2', NULL, NULL, NULL, NULL, '2022-06-06 06:21:34', '2022-06-06 06:21:34'),
(40, 'Mentor', 'Gooddd', 4, 5, '2', NULL, NULL, NULL, NULL, '2022-06-06 06:21:54', '2022-06-06 06:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `post_type`
--

CREATE TABLE `post_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `causes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommandations` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mentor', '2022-06-02 05:22:48', '2022-06-02 05:22:48'),
(2, 'Mentee', '2022-06-02 05:22:48', '2022-06-02 05:22:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userrole_id` bigint(20) UNSIGNED DEFAULT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `userrole_id`, `firstname`, `lastname`, `phonenumber`) VALUES
(1, NULL, 'shalini@gmail.com', NULL, '$2y$10$esiB85QiqRBus6FPid1BoO.BDZJ1EoJrh10Hf0ETOESyLP/QYLqka', NULL, '2022-06-03 01:03:30', '2022-06-03 01:03:30', 1, 'Shalini', 'Ramu', NULL),
(2, NULL, 'shalinir@gmail.com', NULL, '$2y$10$gayKQfxEkvGoXe2MFghu9eNrW47kIX04z81JteTATleWVClQGd4Rm', NULL, '2022-06-03 01:04:29', '2022-06-03 01:04:29', 2, 'Shalini', 'Ramu', NULL),
(3, NULL, 'shalinirait@gmail.com', NULL, '$2y$10$DvUJuVqvMPZgO122vM8bBOZrMdkKtRtCIeJKjF2h0ZeTvVDsZ7Gtq', NULL, '2022-06-03 01:17:48', '2022-06-03 01:17:48', 1, 'Shalini', 'Ramu', NULL),
(4, NULL, 'shaliniait@gmail.com', NULL, '$2y$10$7pzEANiKVNXWSlwFjJEKIuHEV1TmG60jPAQBnu5bQep4SRNg.6ZWa', NULL, '2022-06-03 07:20:30', '2022-06-03 07:20:30', 1, 'Shalini', 'Ramu', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answer_posted_by_foreign` (`posted_by`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companie_created_by_foreign` (`created_by`);

--
-- Indexes for table `company_mentor`
--
ALTER TABLE `company_mentor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_mentor_company_id_foreign` (`company_id`),
  ADD KEY `company_mentor_user_id_foreign` (`user_id`),
  ADD KEY `company_mentor_added_by_foreign` (`added_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media_types`
--
ALTER TABLE `media_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `postmedia`
--
ALTER TABLE `postmedia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_media_post_id_foreign` (`post_id`),
  ADD KEY `post_media_media_type_id_foreign` (`media_type_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_posted_by_id_foreign` (`posted_by_id`),
  ADD KEY `post_company_id_foreign` (`company_id`);

--
-- Indexes for table `post_type`
--
ALTER TABLE `post_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_created_by_foreign` (`created_by`),
  ADD KEY `question_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userprofile_user_id_foreign` (`user_id`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_userrole_id_foreign` (`userrole_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `company_mentor`
--
ALTER TABLE `company_mentor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_types`
--
ALTER TABLE `media_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `postmedia`
--
ALTER TABLE `postmedia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `post_type`
--
ALTER TABLE `post_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_posted_by_foreign` FOREIGN KEY (`posted_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companie_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `company_mentor`
--
ALTER TABLE `company_mentor`
  ADD CONSTRAINT `company_mentor_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `company_mentor_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `company_mentor_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `postmedia`
--
ALTER TABLE `postmedia`
  ADD CONSTRAINT `post_media_media_type_id_foreign` FOREIGN KEY (`media_type_id`) REFERENCES `media_types` (`id`),
  ADD CONSTRAINT `post_media_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `post_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `post_posted_by_id_foreign` FOREIGN KEY (`posted_by_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `question_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD CONSTRAINT `userprofile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_userrole_id_foreign` FOREIGN KEY (`userrole_id`) REFERENCES `userrole` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
