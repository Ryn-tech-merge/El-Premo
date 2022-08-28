-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 04:34 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `el_premo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password_reset` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `image`, `phone`, `email_verified_at`, `password_reset`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Samir', 'admin@admin.com', 'storage/admin/WUFpF8IHpZgjUSvnAIOQK2s8eRcLum8e6l9eGSJO.png', '01026638997', NULL, NULL, '$2y$10$6rlvRvrxWQrc1iF.eS0cLuo1rAMwSX3ohC45b//0e.YHj4ovvcg3S', NULL, NULL, '2022-08-09 09:42:26'),
(6, 'admin', 'admin2@admin.com', 'storage/admin/WUFpF8IHpZgjUSvnAIOQK2s8eRcLum8e6l9eGSJO.png', '01026638997', NULL, NULL, NULL, NULL, NULL, '2022-08-10 17:49:08'),
(7, 'Chadwick Dejesus', 'defoxu@mailinator.com', NULL, NULL, NULL, NULL, '$2y$10$WIEchsk6/ee19nc8Vquxg.ajf.Yxjb3aUkrhVU87rBAebvlgQg9Tu', NULL, '2022-08-10 17:53:14', '2022-08-10 17:53:14'),
(8, 'Grady Black', 'gukusid@mailinator.com', NULL, NULL, NULL, NULL, '$2y$10$TZyxA605v4Q0sQwj6I4rl.qs9E25CBsjnVdQ3NWUADwPmcuYSEc.e', NULL, '2022-08-10 17:54:10', '2022-08-10 17:54:10'),
(10, 'Vera Hamilton', 'newoxug@mailinator.com', NULL, NULL, NULL, NULL, '$2y$10$jSqhD0V0zDesnLfAfo8T3./5HPCPvyzH5Xx0NpniX2aXi0Mr25CYi', NULL, '2022-08-10 17:56:48', '2022-08-10 17:56:48'),
(11, 'Rooney Kinney', 'kozyk@mailinator.com', NULL, NULL, NULL, NULL, '$2y$10$UrekEcbVnYnj/nZaiGrS/evavRD9501Kp31nyM.OcPnL2itenJk3u', NULL, '2022-08-10 18:00:58', '2022-08-10 18:00:58'),
(16, 'Ciaran Johnsto', 'tiquk@mailinator.co', NULL, NULL, NULL, NULL, NULL, NULL, '2022-08-10 18:08:16', '2022-08-10 18:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'admin11', 'uploads/sub_categories/29271660342914.PNG', 2, '2022-08-12 20:06:07', '2022-08-12 20:21:54'),
(2, 'birth day', 'uploads/sub_categories/9291660342045.PNG', 2, '2022-08-12 20:07:25', '2022-08-12 20:07:25'),
(3, 'test brand2', 'uploads/sub_categories/37181660641392.jpg', NULL, '2022-08-16 07:16:32', '2022-08-16 07:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `created_at`, `updated_at`) VALUES
(2, 'uploads/categories/82581660231228.PNG', 'ahmed samir', '2022-08-11 13:14:06', '2022-08-11 13:20:28'),
(3, 'uploads/categories/95531660336802.jpg', 'ahmed samir', '2022-08-12 18:40:02', '2022-08-12 18:40:02'),
(4, 'uploads/categories/78181660646071.jpg', 'ahmed samir', '2022-08-16 08:34:31', '2022-08-16 08:34:31'),
(5, 'uploads/categories/73901660646094.jpg', 'ahmed samir', '2022-08-16 08:34:54', '2022-08-16 08:34:54'),
(6, 'uploads/categories/43591660647185.PNG', 'admin111', '2022-08-16 08:35:37', '2022-08-16 08:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `category_brands`
--

CREATE TABLE `category_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_brands`
--

INSERT INTO `category_brands` (`id`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(9, 6, 1, '2022-08-16 08:56:47', '2022-08-16 08:56:47'),
(10, 6, 3, '2022-08-16 08:56:47', '2022-08-16 08:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `category_images`
--

CREATE TABLE `category_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_images`
--

INSERT INTO `category_images` (`id`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/category_images/92641660340009.PNG', 2, '2022-08-11 20:12:08', '2022-08-12 19:33:29'),
(2, 'uploads/category_images/80951660255976.PNG', NULL, '2022-08-11 20:12:56', '2022-08-11 20:12:56'),
(3, 'uploads/category_images/72331660337125.jpg', NULL, '2022-08-12 18:45:25', '2022-08-12 18:45:25'),
(5, 'uploads/category_images/21681660337179.jpg', 2, '2022-08-12 18:46:19', '2022-08-12 18:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `mail`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, '1', 'شششش', '4566', '777777777777777777777', NULL, NULL),
(2, '1', 'شششش', '4566', '777777777777777777777', NULL, NULL),
(3, 'ahmed', 'a@a.com', 'test contact', 'test contact message', '2022-08-24 07:08:03', '2022-08-24 07:08:03'),
(4, 'ahmed', 'a@a.com', 'test contact', 'test contact message', '2022-08-24 07:08:39', '2022-08-24 07:08:39'),
(5, 'ahmed', 'a@a.com', 'test contact', 'test contact message', '2022-08-24 07:13:35', '2022-08-24 07:13:35'),
(6, NULL, 'a@a.com', 'test contact', 'test contact message', '2022-08-28 09:30:24', '2022-08-28 09:30:24'),
(7, '1234567', 'a@a.com', 'test contact', 'test contact message', '2022-08-28 09:31:28', '2022-08-28 09:31:28');

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
(31, '2022_08_10_201958_create_users_table', 1),
(32, '2022_08_10_202104_create_notifications_table', 1),
(33, '2022_08_10_202218_create_orders_table', 1),
(34, '2022_08_10_202255_create_settings_table', 1),
(35, '2022_08_10_202310_create_contacts_table', 1),
(36, '2022_08_10_202405_create_units_table', 1),
(37, '2022_08_10_202430_create_categories_table', 1),
(38, '2022_08_10_202445_create_brands_table', 1),
(39, '2022_08_10_202511_create_category_images_table', 1),
(40, '2022_08_10_202543_create_products_table', 1),
(41, '2022_08_10_202606_create_offers_table', 1),
(42, '2022_08_10_202633_create_sliders_table', 1),
(43, '2022_08_10_202703_create_offer_products_table', 1),
(44, '2022_08_10_202756_create_order_details_table', 1),
(45, '2022_08_10_202830_create_wallets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `title`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 'شششش', 'شششششششششششششششششثثثثثثثثثثثثثثثثثثثثثثثثثث', '2022-08-17 13:15:38', '2022-08-17 13:15:38'),
(2, 3, 'شششش', 'شششششششششششششششششثثثثثثثثثثثثثثثثثثثثثثثثثث', '2022-08-17 13:15:38', '2022-08-17 13:15:38'),
(3, 4, 'شششش', 'شششششششششششششششششثثثثثثثثثثثثثثثثثثثثثثثثثث', '2022-08-17 13:15:38', '2022-08-17 13:15:38'),
(4, 5, 'شششش', 'شششششششششششششششششثثثثثثثثثثثثثثثثثثثثثثثثثث', '2022-08-17 13:15:38', '2022-08-17 13:15:38'),
(5, 3, 'ش', 'صص', '2022-08-17 13:16:18', '2022-08-17 13:16:18'),
(6, 4, 'ش', 'صص', '2022-08-17 13:16:18', '2022-08-17 13:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` enum('value','percentage') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  `old_price` double NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `is_available` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `image`, `amount`, `start_date`, `end_date`, `type`, `value`, `percentage`, `old_price`, `price`, `is_available`, `created_at`, `updated_at`) VALUES
(3, 'test offer1', 'uploads/offer/37541660665261.jpg', 93, '2022-08-16', '2022-08-19', 'percentage', 10, 5, 100, 95, 'yes', '2022-08-16 13:54:21', '2022-08-28 09:27:38'),
(4, 'admin1', 'uploads/offer/49781660665526.PNG', 1, '2022-08-22', '2022-08-25', 'value', 10, NULL, 100, 90, 'yes', '2022-08-16 13:58:46', '2022-08-16 13:58:46'),
(5, 'offer testtt', 'uploads/offer/87371661330399.jpg', NULL, '2022-08-23', '2022-08-27', 'percentage', NULL, 5, 100, 95, 'yes', '2022-08-24 06:39:59', '2022-08-24 06:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `offer_products`
--

CREATE TABLE `offer_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_products`
--

INSERT INTO `offer_products` (`id`, `offer_id`, `product_id`, `unit_id`, `amount`, `created_at`, `updated_at`) VALUES
(3, 4, 3, 2, 20, '2022-08-16 13:58:47', '2022-08-16 13:58:47'),
(6, 3, 4, 3, 10, '2022-08-17 07:35:59', '2022-08-17 07:35:59'),
(7, 3, 4, 3, 15, '2022-08-17 07:35:59', '2022-08-17 07:35:59'),
(8, 3, 3, 2, 3, '2022-08-17 07:35:59', '2022-08-17 07:35:59'),
(9, 5, 3, 3, 5, '2022-08-24 06:39:59', '2022-08-24 06:39:59'),
(10, 5, 4, 3, 3, '2022-08-24 06:39:59', '2022-08-24 06:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('waiting','new','on_going','delivery','ended','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `delivery_date` date DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL DEFAULT 0,
  `total` double NOT NULL DEFAULT 0,
  `wallet_paid` double DEFAULT NULL,
  `cash_paid` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `delivery_date`, `price`, `discount`, `total`, `wallet_paid`, `cash_paid`, `created_at`, `updated_at`) VALUES
(2, 3, 'waiting', '2022-08-19', 500, 50, 890, 10, 80, NULL, '2022-08-28 08:47:46'),
(3, 3, 'waiting', '2022-08-25', 100, 10, 200, NULL, NULL, '2022-08-24 09:26:51', '2022-08-24 09:26:51'),
(4, 3, 'ended', '2022-08-25', 100, 10, 200, NULL, NULL, '2022-08-24 09:30:43', '2022-08-24 13:31:22'),
(5, 3, 'waiting', '2022-08-25', 100, 10, 200, NULL, NULL, '2022-08-24 09:33:13', '2022-08-24 09:33:13'),
(6, 3, 'waiting', '2022-08-25', 100, 10, 200, NULL, NULL, '2022-08-24 09:35:08', '2022-08-24 09:35:08'),
(7, 3, 'waiting', '2022-08-25', 100, 10, 200, NULL, NULL, '2022-08-24 10:10:52', '2022-08-24 10:10:52'),
(8, 3, 'waiting', '2022-08-25', 100, 10, 200, NULL, NULL, '2022-08-24 10:12:19', '2022-08-24 10:12:19'),
(9, 3, 'waiting', '2022-08-25', 100, 10, 200, NULL, NULL, '2022-08-24 10:12:43', '2022-08-24 10:12:43'),
(10, 3, 'waiting', '2022-08-25', 100, 10, 200, NULL, NULL, '2022-08-24 10:13:21', '2022-08-24 10:13:21'),
(11, 3, 'ended', '2022-08-25', 100, 10, 200, NULL, NULL, '2022-08-24 10:16:52', '2022-08-28 11:26:54'),
(12, 3, 'canceled', '2022-08-24', 1001, 101, 2001, NULL, NULL, '2022-08-23 10:35:19', '2022-08-24 12:58:55'),
(13, 7, 'waiting', '2022-08-27', 100, 10, 200, NULL, NULL, '2022-08-26 09:55:57', '2022-08-26 09:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 1,
  `type` enum('product','offer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `unit_id`, `amount`, `type`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 3, 1, 'product', NULL, NULL),
(2, 2, 3, 2, 4, 'offer', NULL, '2022-08-28 08:41:26'),
(3, 2, 3, 3, 1, 'product', NULL, NULL),
(4, 2, 4, 3, 1, 'product', NULL, NULL),
(5, 2, 4, 3, 1, 'product', NULL, NULL),
(6, 2, 4, 3, 1, 'product', NULL, NULL),
(7, 2, 4, 3, 1, 'product', NULL, NULL),
(8, 3, 4, NULL, 10, 'product', '2022-08-24 09:26:51', '2022-08-24 09:26:51'),
(9, 3, 3, NULL, 1, 'offer', '2022-08-24 09:26:51', '2022-08-24 09:26:51'),
(10, 4, 4, NULL, 10, 'product', '2022-08-24 09:30:43', '2022-08-24 09:30:43'),
(11, 4, 3, NULL, 1, 'offer', '2022-08-24 09:30:43', '2022-08-24 09:30:43'),
(12, 5, 4, NULL, 10, 'product', '2022-08-24 09:33:13', '2022-08-24 09:33:13'),
(13, 5, 3, NULL, 1, 'offer', '2022-08-24 09:33:13', '2022-08-24 09:33:13'),
(14, 6, 4, 3, 10, 'product', '2022-08-24 09:35:09', '2022-08-24 09:35:09'),
(15, 6, 3, 2, 1, 'offer', '2022-08-24 09:35:09', '2022-08-24 09:35:09'),
(16, 7, 4, 3, 10, 'product', '2022-08-24 10:10:52', '2022-08-24 10:10:52'),
(17, 7, 3, 2, 1, 'offer', '2022-08-24 10:10:52', '2022-08-24 10:10:52'),
(18, 8, 4, 3, 10, 'product', '2022-08-24 10:12:19', '2022-08-24 10:12:19'),
(19, 8, 3, 2, 1, 'offer', '2022-08-24 10:12:19', '2022-08-24 10:12:19'),
(20, 9, 4, 3, 10, 'product', '2022-08-24 10:12:43', '2022-08-24 10:12:43'),
(21, 9, 3, 2, 1, 'offer', '2022-08-24 10:12:43', '2022-08-24 10:12:43'),
(22, 10, 4, 3, 10, 'product', '2022-08-24 10:13:21', '2022-08-24 10:13:21'),
(23, 10, 3, 2, 1, 'offer', '2022-08-24 10:13:21', '2022-08-24 10:13:21'),
(24, 11, 4, 3, 10, 'product', '2022-08-24 10:16:52', '2022-08-24 10:16:52'),
(25, 11, 3, 2, 1, 'offer', '2022-08-24 10:16:52', '2022-08-24 10:16:52'),
(28, 12, 3, 2, 1, 'offer', '2022-08-24 12:52:35', '2022-08-24 12:52:35'),
(29, 12, 4, 3, 10, 'product', '2022-08-24 12:52:35', '2022-08-24 12:52:35'),
(30, 2, 4, 3, 10, 'product', '2022-08-26 09:54:48', '2022-08-26 09:54:48'),
(31, 2, 3, 2, 1, 'offer', '2022-08-26 09:54:49', '2022-08-26 09:54:49'),
(32, 13, 4, 3, 10, 'product', '2022-08-26 09:55:57', '2022-08-26 09:55:57'),
(33, 13, 3, 2, 1, 'offer', '2022-08-26 09:55:57', '2022-08-26 09:55:57'),
(34, 13, 4, 3, 10, 'product', '2022-08-26 09:57:19', '2022-08-26 09:57:19'),
(35, 13, 3, 2, 1, 'offer', '2022-08-26 09:57:19', '2022-08-26 09:57:19'),
(36, 2, 4, 3, 10, 'product', '2022-08-26 09:57:48', '2022-08-26 09:57:48'),
(37, 2, 3, 2, 1, 'offer', '2022-08-26 09:57:48', '2022-08-26 09:57:48'),
(38, 2, 4, 3, 10, 'product', '2022-08-26 10:14:12', '2022-08-26 10:14:12'),
(39, 2, 3, 2, 1, 'offer', '2022-08-26 10:14:12', '2022-08-26 10:14:12'),
(40, 2, 4, 2, 10, 'product', '2022-08-26 10:16:30', '2022-08-26 10:16:30'),
(41, 2, 3, 2, 1, 'offer', '2022-08-26 10:16:30', '2022-08-26 10:16:30'),
(42, 2, 4, 2, 10, 'product', '2022-08-26 10:35:12', '2022-08-26 10:35:12'),
(43, 2, 3, 2, 1, 'offer', '2022-08-26 10:35:12', '2022-08-26 10:35:12'),
(44, 2, 4, 2, 10, 'product', '2022-08-26 10:43:41', '2022-08-26 10:43:41'),
(45, 2, 3, 2, 1, 'offer', '2022-08-26 10:43:41', '2022-08-26 10:43:41'),
(46, 2, 4, 2, 10, 'product', '2022-08-26 10:54:21', '2022-08-26 10:54:21'),
(47, 2, 3, 2, 1, 'offer', '2022-08-26 10:54:21', '2022-08-26 10:54:21'),
(48, 2, 4, 2, 2, 'product', '2022-08-26 11:13:10', '2022-08-26 11:13:10'),
(49, 2, 3, 2, 1, 'offer', '2022-08-26 11:13:10', '2022-08-26 11:13:10'),
(50, 2, 4, 2, 2, 'product', '2022-08-26 11:14:11', '2022-08-26 11:14:11'),
(51, 2, 3, 2, 1, 'offer', '2022-08-26 11:14:11', '2022-08-26 11:14:11'),
(52, 2, 3, 2, 2, 'product', '2022-08-28 08:41:26', '2022-08-28 08:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `phone_token`
--

CREATE TABLE `phone_token` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('ios','android') COLLATE utf8mb4_unicode_ci DEFAULT 'android',
  `phone_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_token`
--

INSERT INTO `phone_token` (`id`, `user_id`, `type`, `phone_token`, `created_at`, `updated_at`) VALUES
(12, 1, 'android', 'aaaaaaaaaaaaaaaaaaaaaaaaa', '2022-01-27', '2022-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sm_unit_price` double NOT NULL DEFAULT 0,
  `lg_unit_price` double NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sm_unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `min_sm_amount` int(11) NOT NULL DEFAULT 1,
  `max_sm_amount` int(11) DEFAULT NULL,
  `lg_unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `min_lg_amount` int(11) NOT NULL DEFAULT 1,
  `max_lg_amount` int(11) DEFAULT NULL,
  `lg_sm_amount` int(11) NOT NULL DEFAULT 1,
  `amount` int(11) NOT NULL DEFAULT 1,
  `is_available` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `sm_unit_price`, `lg_unit_price`, `category_id`, `brand_id`, `sm_unit_id`, `min_sm_amount`, `max_sm_amount`, `lg_unit_id`, `min_lg_amount`, `max_lg_amount`, `lg_sm_amount`, `amount`, `is_available`, `created_at`, `updated_at`) VALUES
(3, 'منتج اختبار1', 'uploads/product/14601660660297.jpg', 5, 10, 6, 3, 3, 21, 11, 2, 1, 2, 10000, 990000, 'yes', '2022-08-16 11:33:59', '2022-08-28 08:41:26'),
(4, 'منتج اختبار2', 'uploads/product/14601660660297.jpg', 5, 10, 6, 3, 3, 21, 11, 2, 1, 2, 10000, 559980, 'yes', '2022-08-16 11:33:59', '2022-08-28 09:27:39'),
(5, 'منتج اختبار3', 'uploads/product/14601660660297.jpg', 5, 10, 6, 1, 3, 21, 11, 2, 1, 2, 10000, 1000000, 'yes', '2022-08-16 11:33:59', '2022-08-16 12:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_time` time DEFAULT NULL,
  `call_center` int(11) DEFAULT NULL,
  `delivery_days` int(11) NOT NULL DEFAULT 0,
  `register_gift` int(11) NOT NULL DEFAULT 0,
  `purchase_gift` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `order_time`, `call_center`, `delivery_days`, `register_gift`, `purchase_gift`, `created_at`, `updated_at`) VALUES
(1, '22:00:00', 196331, 1, 11000, 1000, NULL, '2022-08-15 14:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('product','offer','brand') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'in case type => brand',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `type`, `image`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'offer', 'uploads/sliders/77341660595137.jpg', 1, NULL, '2022-08-15 17:12:55', '2022-08-15 18:25:37'),
(2, 'brand', 'uploads/sliders/19251660591638.PNG', 3, 6, '2022-08-15 17:27:18', '2022-08-15 18:26:00'),
(3, 'brand', 'uploads/sliders/70431660591660.PNG', 1, 6, '2022-08-15 17:27:40', '2022-08-15 17:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `targets`
--

CREATE TABLE `targets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gifts_for` int(11) DEFAULT NULL,
  `gifts_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `targets`
--

INSERT INTO `targets` (`id`, `gifts_for`, `gifts_price`, `created_at`, `updated_at`) VALUES
(1, 1000, 50, NULL, NULL),
(2, 1500, 100, NULL, NULL),
(3, 10000, 550, NULL, NULL),
(4, 15000, 1500, NULL, NULL),
(5, 100, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'كيلو', '2022-08-15 18:54:33', '2022-08-15 18:54:33'),
(3, 'جرام', '2022-08-15 18:54:44', '2022-08-15 18:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '+20',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double NOT NULL DEFAULT 0,
  `longitude` double NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` double NOT NULL DEFAULT 0,
  `wallet` int(11) NOT NULL DEFAULT 0,
  `block` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `code`, `address`, `latitude`, `longitude`, `image`, `points`, `wallet`, `block`, `created_at`, `updated_at`, `email`) VALUES
(1, NULL, NULL, '+20', NULL, 0, 0, NULL, 0, 0, 'no', NULL, NULL, NULL),
(3, 'aaa', '1234', '+20', 'batanoun ', 123.1, 456, 'aaaa', 14000, 10, 'no', NULL, '2022-08-28 11:27:28', NULL),
(4, 'aaa', '1234', '+20', 'batanoun ', 123.1, 456, 'aaaa', 0, 10, 'no', NULL, '2022-08-11 12:34:53', NULL),
(5, 'aaa', '1234', '+20', 'batanoun ', 71.5494042, 134.0097237, 'aaaa', 0, 10, 'no', NULL, NULL, NULL),
(6, 'ahmed samir', '1234', '+20', NULL, 0, 0, 'uploads/users/30891661173005.jpg', 0, 0, 'no', '2022-08-22 10:56:45', '2022-08-22 10:56:45', 'a@a.com'),
(7, 'ahmed samir', '12345', '+20', NULL, 0, 0, 'uploads/users/8531661173295.jpg', 0, 0, 'no', '2022-08-22 11:01:35', '2022-08-22 11:01:35', 'a@aa.com'),
(8, 'ahmed samir', '123456', '+20', NULL, 0, 0, 'uploads/users/48341661175066.jpg', 0, 0, 'no', '2022-08-22 11:02:06', '2022-08-24 13:44:39', 'a@aa.coma'),
(9, 'ahmed samir', '123456789', '+20', NULL, 0, 0, NULL, 0, 0, 'no', '2022-08-28 10:21:33', '2022-08-28 10:21:33', 'a@aa.comaa'),
(10, 'ahmed samir', '1234567893', '+20', NULL, 0, 0, 'uploads/users/36131661689398.jpg', 0, 0, 'no', '2022-08-28 10:23:18', '2022-08-28 10:23:18', 'a@aa.comaa3'),
(11, 'ahmed samir', '123456789313', '+20', NULL, 0, 0, 'uploads/users/82871661690031.jpg', 0, 0, 'no', '2022-08-28 10:33:51', '2022-08-28 10:33:51', 'a@aa.comaa314'),
(12, 'ahmed samir', '123456789317', '+20', NULL, 0, 0, 'uploads/users/77711661690212.jpg', 11000, 0, 'no', '2022-08-28 10:36:52', '2022-08-28 10:36:53', 'a@aa.comaa317');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `type` enum('register','purchases') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `user_id`, `order_id`, `price`, `type`, `created_at`, `updated_at`) VALUES
(1, 9, NULL, 11000, 'register', '2022-08-28 10:21:34', '2022-08-28 10:21:34'),
(2, 10, NULL, 11000, 'register', '2022-08-28 10:23:18', '2022-08-28 10:23:18'),
(3, 11, NULL, 11000, 'register', '2022-08-28 10:33:51', '2022-08-28 10:33:51'),
(4, 12, NULL, 11000, 'register', '2022-08-28 10:36:53', '2022-08-28 10:36:53'),
(5, 3, NULL, 11000, 'register', '2022-08-28 10:36:53', '2022-08-28 10:36:53'),
(6, 3, 4, 0, 'purchases', '2022-08-28 11:27:28', '2022-08-28 11:27:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_brands`
--
ALTER TABLE `category_brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_brand_cat_id` (`category_id`),
  ADD KEY `cat_brand_brand_id` (`brand_id`);

--
-- Indexes for table `category_images`
--
ALTER TABLE `category_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_images_category_id_foreign` (`category_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_products`
--
ALTER TABLE `offer_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_products_offer_id_foreign` (`offer_id`),
  ADD KEY `offer_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_foriegn` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_unit_id_foreign` (`unit_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `phone_token`
--
ALTER TABLE `phone_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client45494_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_sm_unit_id_foreign` (`sm_unit_id`),
  ADD KEY `products_lg_unit_id_foreign` (`lg_unit_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `targets`
--
ALTER TABLE `targets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_user_id_foreign` (`user_id`),
  ADD KEY `wallets_order_id_foreign` (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_brands`
--
ALTER TABLE `category_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_images`
--
ALTER TABLE `category_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `offer_products`
--
ALTER TABLE `offer_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `phone_token`
--
ALTER TABLE `phone_token`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_brands`
--
ALTER TABLE `category_brands`
  ADD CONSTRAINT `cat_brand_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cat_brand_cat_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_images`
--
ALTER TABLE `category_images`
  ADD CONSTRAINT `category_images_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offer_products`
--
ALTER TABLE `offer_products`
  ADD CONSTRAINT `offer_products_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `offer_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `order_user_foriegn` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_lg_unit_id_foreign` FOREIGN KEY (`lg_unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sm_unit_id_foreign` FOREIGN KEY (`sm_unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wallets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
