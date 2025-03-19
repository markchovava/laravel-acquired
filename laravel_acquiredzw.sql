-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2025 at 03:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_acquiredzw`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_infos`
--

CREATE TABLE `app_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `province_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `user_id`, `city_id`, `province_id`, `image`, `name`, `description`, `price`, `address`, `phone`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 5, 'assets/img/business/business_20250319480.jpg', 'Chrome Mine', '<p>Chrome Mine</p>', 300.00, '88 Ages Road, Borrowdale', '1234', 'mk@email.com', NULL, '2025-03-19 10:55:33', '2025-03-19 10:55:33'),
(2, 1, 6, 8, 'assets/img/business/business_20250319317.jpg', 'Tomato Farm', '<p>Tomato Farm</p>', 2010.00, '14949 Zvishavane, Zimbabwe', '123', 'to@email.com', NULL, '2025-03-19 11:06:59', '2025-03-19 11:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `business_categories`
--

CREATE TABLE `business_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_categories`
--

INSERT INTO `business_categories` (`id`, `user_id`, `business_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2025-03-19 10:55:06', '2025-03-19 10:55:06'),
(2, 1, 2, 2, '2025-03-19 11:06:49', '2025-03-19 11:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `business_details`
--

CREATE TABLE `business_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_details`
--

INSERT INTO `business_details` (`id`, `user_id`, `business_id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Area', '1000 sqmtrs', '2025-03-19 10:55:33', '2025-03-19 10:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `business_messages`
--

CREATE TABLE `business_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `timeframe` varchar(255) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mining', '2025-03-19 10:48:52', '2025-03-19 10:48:52'),
(2, 1, 'Manufacturing', '2025-03-19 10:49:01', '2025-03-19 10:49:01'),
(3, 1, 'Healthcare', '2025-03-19 10:49:09', '2025-03-19 10:49:09'),
(4, 1, 'Technology', '2025-03-19 10:49:17', '2025-03-19 10:49:17'),
(5, 1, 'Education', '2025-03-19 10:49:27', '2025-03-19 10:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `province_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `user_id`, `province_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Harare', '2025-03-19 10:51:35', '2025-03-19 10:51:35'),
(2, 1, 2, 'Bulawayo', '2025-03-19 10:51:47', '2025-03-19 10:51:47'),
(3, 1, 5, 'Masvingo', '2025-03-19 10:52:03', '2025-03-19 10:52:03'),
(4, 1, 6, 'Mutare', '2025-03-19 10:52:24', '2025-03-19 10:52:24'),
(5, 1, 8, 'Gweru', '2025-03-19 10:52:33', '2025-03-19 10:52:33'),
(6, 1, 8, 'Zvishavane', '2025-03-19 10:53:10', '2025-03-19 10:53:10');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_19_081444_create_personal_access_tokens_table', 1),
(28, '2025_03_19_111428_create_app_infos_table', 2),
(29, '2025_03_19_111443_create_businesses_table', 2),
(30, '2025_03_19_111451_create_business_categories_table', 2),
(31, '2025_03_19_111505_create_business_details_table', 2),
(32, '2025_03_19_111516_create_business_messages_table', 2),
(33, '2025_03_19_111530_create_categories_table', 2),
(34, '2025_03_19_111537_create_cities_table', 2),
(35, '2025_03_19_111548_create_faqs_table', 2),
(36, '2025_03_19_111602_create_partners_table', 2),
(37, '2025_03_19_111613_create_provinces_table', 2),
(38, '2025_03_19_111620_create_roles_table', 2),
(39, '2025_03_19_111629_create_subscriptions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(3, 'App\\Models\\User', 1, 'mark@email.com', '4ee1bd94e7871cef8e970ddea90241ded8d20ee6849f0206c97df5104b4ceaa6', '[\"*\"]', '2025-03-19 11:29:07', NULL, '2025-03-19 10:38:14', '2025-03-19 11:29:07');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Harare', '2025-03-19 10:49:55', '2025-03-19 10:49:55'),
(2, 1, 'Bulawayo', '2025-03-19 10:50:03', '2025-03-19 10:50:03'),
(3, 1, 'Mashonaland East', '2025-03-19 10:50:17', '2025-03-19 10:50:17'),
(4, 1, 'Matebeleland North', '2025-03-19 10:50:31', '2025-03-19 10:50:31'),
(5, 1, 'Masvingo', '2025-03-19 10:50:38', '2025-03-19 10:50:38'),
(6, 1, 'Manicaland', '2025-03-19 10:50:46', '2025-03-19 10:50:46'),
(7, 1, 'Mashonaland West', '2025-03-19 10:51:01', '2025-03-19 10:51:01'),
(8, 1, 'Midlands', '2025-03-19 10:51:20', '2025-03-19 10:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('05Xcm48iaBFilcvhcTb63PlTtjdHhRIx9g4xrbhI', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2RkNkI4TktXTlJidklLa0J2YXBzcDVXdmNBejFZR043MDRqMnNLSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRlZ29yeS1hbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742388326),
('5VoQyI0r2NXtTgvK1i2UZ4mQIbBaTxfHYKaNRL4P', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3lRZ29tdFF6Q3NIaGNMU0JrdFlkcXhkZFNtejFVd3ZkZFdiT3FsZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742389623),
('5W5I8MhgApQySEZn7xuvnpTXleVOO5NAT9egQS6p', NULL, '127.0.0.1', 'node', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMHBERFNxMDZ5VEJDOWRaT2lsZFNkQ0xCejN4dWJMbDZtcHJrRzRzUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742387352),
('683xD6ecskxluqZyiNYF856DbmdZPGK9HYlvmPvt', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0hQMTJBMFB0ejZ4MHlnQjVjTkVJN3A1VGloaHA1ZllUT1l5dFAzZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaXR5LWFsbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742389624),
('7uvRuFplEXhAhxonHMh9ZksbfWUHaZrdgzi7z6s5', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0ZXZmVSQVhhTnM5MmcxOWV3ODh4VmxmMkRqbmc5R2NQT0k4dTREayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742387179),
('8Gx3CJvyY4oP1X0YrPJ7LKGLbJQcHrLNbX2n1CMJ', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOTVZZktnd3ZoTUpEZlZDUWZrdUFKTlpTUUhoQXdrZUZ2azhWM3UzUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcy1zZWFyY2gtY2l0eS1jYXRlZ29yeT9jYXRlZ29yeV9pZD0mY2l0eV9pZD00JnNlYXJjaD0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742389649),
('9z2M3bricNrhukVjFtNLXRCFFbAzmIYYTond6F0X', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHJHcGpOMTAwcnZxdXVNZlNIUUR2TEgyVGNJTGtjWkcyQTRKSlBUVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcHAtaW5mbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742387136),
('afuyluqysP3WrI1LAkPGHZNJ7GuxOPCKksTZC7Z7', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGtkcjkzM0w4bDM3RU16Y0o1Wnpzd2F5S3dWSFhodnFaNnN3SmhKMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcy8yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742389631),
('B5vYaFaUjhwV6qye864wBMIhXhkXKtONNZla7qvp', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFRMQVRXUElBck5KWFNhNnZWTElHUVR5SlByMHpuUE04R0FWSm1qcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcy1zZWFyY2gtY2l0eS1jYXRlZ29yeT9jYXRlZ29yeV9pZD0yJmNpdHlfaWQ9JnNlYXJjaD0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742390872),
('CF9TW7gqfVzSJsfoS1ij3Urw1w15MGMN9pEVXDWU', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicWNXVlgxejdxcVZmSmttMnJ4NUJkVGdGZ0twYmFsdTFiTjV3UnRJRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742387215),
('f5qmIssvlo1dAXQgypJaR0j3dLGa5p762g7rOnWd', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSXhZTmx3a05ZaFV4TDFxWlJIUHU5am9oTVhDTWZNREtna0prNHIzNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm92aW5jZS1hbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742387180),
('H9MT3dtL1G6USV1g0zAxCxVNkf0eNZVomrl8v2X3', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDRQVmo0QkFQbUkweVNiUnEwbTl2d1VMck5YMXRUR0dLMHR3Wm1TUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcy1zZWFyY2gtY2l0eS1jYXRlZ29yeT9jYXRlZ29yeV9pZD0mY2l0eV9pZD0mc2VhcmNoPXRvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742389117),
('hVxF0BpPbYYAFtLxMu4sZ4QjnGKezQeRzygbdghK', NULL, '127.0.0.1', 'node', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiVWxrSjVnRlVQYUxsbFdsUTduMXNpOXh5QlptWGJJb1F0dFlxbjRjTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742387700),
('ibIz0vtU01ukzSWeYPNFArj0CX0FFAGo8qsNX0il', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ2V5S3dPcjBoZElFa3BJUzFQazFjUm55SXRtWTNuVVlVc1JPcmFjVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm92aW5jZS1hbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742387215),
('irvFRFCWqBNqgQEMnlDo9HIot48IIyUaixzS1Mqb', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGVLOXlwOHRDQ0R3amZIUTJBd2NOYmtnekN1RFVna0p6aDNlRTZMQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRlZ29yeS1hbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742387180),
('IUKOCWooAjBLTi7EJXJRYmCmzKeFeNOTjMmYmMyQ', NULL, '127.0.0.1', 'node', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiYVRvZTVjSU9rYlNpYzZEUUFBdWxra1dHUjZMWGIyVFNnZm95T0d3aCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742387894),
('j0i90E4pZHclnG1bPHvU0e2cehmCRtqj3pBvMNbl', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVG1tM0V1WW9jMnNEUmFoR3NKWUNZempZcTg1dU5rc010eklqV3FrUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcy8yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742390875),
('jZNUowMlvhmB5stmBExZQuHnmlkV30mdYR1dSsUP', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMFphMmMyQlF1SDBMaTU0dXNIbFI4UTJuSjJ0dTBFbkhMUmc2b25ndCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaXR5LWFsbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742388325),
('LgH7bADm37LZN29LBdRxQ7bdFtHycFkc2J7i7Kfa', NULL, '127.0.0.1', 'node', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiSU1UazhqMkdNc2w3anNGVWE3aVh1blAxTDU2aHFidGk4WHJMeXlkeCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742387247),
('LI8wYEdi3ToUKKsww1QZ7PGyRN2HA5R7nhYCB5BG', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVllvcmZyTzhERm5Sb083dXdZNXFUcm12Tmg0NDVJdEdxSE1oU3prSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaXR5LWFsbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742387179),
('LLndLQpdJnokAuf8gJEAkuWFtX5Lt14UcWEAoRAv', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUHJSeGpEc0RKVU5zQU5oc0loWG9vOWhBdG9XVk5WUXVVbE5kV0hmeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRlZ29yeS1hbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742389624),
('lQ1BihfYO8cxiqeiCOI5jlZzblg2mwvt2haygnbi', NULL, '127.0.0.1', 'node', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWlRQd2Q5T3JKV0NHNjZpT3BQMkZGUjYxamJ2YmRWaXN6ZUE4SzlUcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742387239),
('meReB3Hp7RbzdIjSIQR4gPE2ZOcipm2u1BJcftO0', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1hycEROMndJWHg2Nmw2cmNmQzJoaUhGNkgzMzdaWklrTGJpYk1icCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcy1zZWFyY2gtY2l0eS1jYXRlZ29yeT9jYXRlZ29yeV9pZD0mY2l0eV9pZD02JnNlYXJjaD0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742389652),
('nd7Is1BDidvUmwxdboncvYk6XDpI41woUS3tLneG', NULL, '127.0.0.1', 'node', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiaFFSNGV2UXdKS1ZzWDZWbVRlVUVIalRrb3Y5UTNHSWV4eGlaWmVudyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742387732),
('qCuwzSj2rnATUioFCJBYHeFtwlLRqdR6PsBdFEoa', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWjVPbEtBaDNWN2k4U0Ria01zTnp2elFYT3Z2Mko4UkdBVkFwS2kwSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW1iZXJzaGlwLWZpcnN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742389542),
('QH13hITuUrrvTTQ1qFAr5Ne2guZp3y13QZ3WmnEq', NULL, '127.0.0.1', 'node', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoibEhPaXN5T1RodkZDWGhCbW43THdpZjdXTXFBbnBHbWh0dThuS3R5ZSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742387861),
('qjNFntk3VomOGksB3tTJAjr0EC0ggqYYxmAMsK50', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFg5QWREVWVvNlZYME9xRkpObmdYMWR1VnhETktMMHFUUlZUOTRHcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXRlZ29yeS1hbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742387216),
('qkU0CAIHPMUVRG1G9TSmv6PqHIhneP6izBkSf91u', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0lhSjZvUGpjOVBKSjNOQWUzSWRwY0JjOGRITE55SElFV3lFQzl3SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742389123),
('u2otY0xkevXhc49WE2YeJuSMpxwLYL5qaLVVslOo', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidjhQWUFFb3dlOVBab3V1dkV3eUhCREtHaUpQYjdnSW5JWjFKdWd1dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm92aW5jZS1hbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742388325),
('uoX4vxpzjXe74NIJfONgNrYwbWmdLRdJ686R7zYk', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWDZJZW50REFTaUllaHNlNGxHSjZTdmpkNzJDUEoxTGJsemJDNGdoUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW1iZXJzaGlwLWZpcnN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742388323),
('wfIyH6Mx2bstl5oe0oHfItPGdA3GAX7meOxxuxgB', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidk9Yb0FLUUVUdmVOMXl1WVQ1ZHI4ektyT1U5cGVncDNZWHlPUWJXSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW1iZXJzaGlwLWZpcnN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742388327),
('X14aSTfl69l9lS5J4JRqMTluHf9JSDXZYEtJQuHF', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGpXeG1PSzhJSk5oZ0pZM1A3cXJTYmkwSzlwVzBNR2pVT2hUS1ZneiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm92aW5jZS1hbGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742389623),
('xk6jcMQaltAw37AuNDDWAymgv5tAxA8tOWvpwYzf', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV3dlYU9BTHRadlNTaHlUOWdhV0pBTTc5V2xsQTBlVlA4enpOSlZ5ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaXR5LWFsbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742387215),
('xkDY5FB7gZ1XOCeUR4mwNcOn1u26FDDnVZFEmLx0', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ1VnYlJGYmp4cGEzVmxUZnRTUnVZV01vRFdNV1hvUHVRejkwd0o4UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcy1tZXNzYWdlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742388322),
('xl6fSUwrTNJLhRdjX5Oarki9pOaovDpsfJDvd4f6', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVmJtWDY5d0JJMXg4VEJQeUNSelQwY3BQWjNTd05paHcxNG5DVGNSUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1742388324),
('yKYcdt3cZytvU9vNIWe4IvHx4sr8rsnVaX2icurF', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRk9udHJIUEhYZVF2amJNdXRhSFQxV1FYZTRSU0pZNlBNWFgwS042ZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tZW1iZXJzaGlwLWZpcnN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742389543),
('ZG7QQAc3rRSoAi7FIGkfQLyUMy1EbYCeMYzeIqES', NULL, '127.0.0.1', 'node', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZkRYY1BjTndHdXczb2xwakl2MkhycFJFQ3dkcUZPU2VCSUQ1ZmUyTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9idXNpbmVzcy8yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742390884);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `business_id` bigint(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `amount_paid` mediumint(9) DEFAULT NULL,
  `expiry_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role_level` int(11) DEFAULT NULL,
  `is_admin` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `bio` longtext DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_level`, `is_admin`, `phone`, `address`, `linkedin`, `code`, `bio`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 4, 'Yes', NULL, NULL, NULL, '12345678', NULL, 'mark@email.com', NULL, '$2y$12$m83DQkJXGs8C28wSSRSEKOIjmuqibb4g4qFO7gWjfK89QD1XE.I8K', NULL, '2025-03-19 10:27:19', '2025-03-19 10:27:19'),
(2, NULL, 4, 'No', NULL, NULL, NULL, '12345678', NULL, 'tapiwa@email.com', NULL, '$2y$12$1jW.TBnpae7F598yL31OfOrJVmnR0DuLrvSHXck6.Cv1o.G/8AFnm', NULL, '2025-03-19 10:37:41', '2025-03-19 10:37:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_infos`
--
ALTER TABLE `app_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_categories`
--
ALTER TABLE `business_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_details`
--
ALTER TABLE `business_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_messages`
--
ALTER TABLE `business_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
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
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
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
-- AUTO_INCREMENT for table `app_infos`
--
ALTER TABLE `app_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_categories`
--
ALTER TABLE `business_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_details`
--
ALTER TABLE `business_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `business_messages`
--
ALTER TABLE `business_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
