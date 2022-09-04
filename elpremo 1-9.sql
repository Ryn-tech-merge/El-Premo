-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2022 at 11:27 AM
-- Server version: 10.5.13-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u992110970_elpremo`
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
(1, 'براند كوكاكولا', 'uploads/sub_categories/81941661797616.jpg', 2, '2022-08-12 20:06:07', '2022-08-29 18:26:56'),
(2, 'شركة سفن', 'uploads/sub_categories/4121661797639.jpg', 2, '2022-08-12 20:07:25', '2022-08-29 18:27:19'),
(3, 'test brand', 'uploads/sub_categories/13261661797657.jpg', NULL, '2022-08-16 07:16:32', '2022-08-29 18:27:37');

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
(2, 'uploads/categories/94651661797404.jpg', 'شركة كوكاكولا', '2022-08-11 13:14:06', '2022-08-29 18:23:24'),
(3, 'uploads/categories/13171661797420.jpg', 'قسم 2', '2022-08-12 18:40:02', '2022-08-29 18:24:09'),
(4, 'uploads/categories/18971661797437.jpg', 'قسم 3', '2022-08-16 08:34:31', '2022-08-29 18:24:51'),
(5, 'uploads/categories/72031661797519.jpg', 'قسم 4', '2022-08-16 08:34:54', '2022-08-29 18:25:19'),
(6, 'uploads/categories/44741661797560.jpg', 'قسم 5', '2022-08-16 08:35:37', '2022-08-29 18:26:00');

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
(11, 2, 1, '2022-08-29 18:23:24', '2022-08-29 18:23:24'),
(14, 3, 2, '2022-08-29 18:24:09', '2022-08-29 18:24:09'),
(15, 4, 2, '2022-08-29 18:24:51', '2022-08-29 18:24:51'),
(16, 5, 1, '2022-08-29 18:25:19', '2022-08-29 18:25:19'),
(17, 5, 3, '2022-08-29 18:25:19', '2022-08-29 18:25:19'),
(20, 6, 1, '2022-08-29 18:26:00', '2022-08-29 18:26:00'),
(21, 6, 3, '2022-08-29 18:26:00', '2022-08-29 18:26:00');

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
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `governorate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `governorate_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 4, 'مدينة الجيزة 1', NULL, NULL),
(2, 1, 'شبين الكوم', NULL, NULL),
(3, 1, 'تلا', NULL, NULL),
(4, 1, 'الشهداء', NULL, NULL),
(5, 1, 'منوف', NULL, NULL);

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
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `type` enum('value','percentage') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'value',
  `for_all` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `min_price` double DEFAULT NULL,
  `max_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_users`
--

CREATE TABLE `coupon_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_paid` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `governorate`
--

CREATE TABLE `governorate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorate`
--

INSERT INTO `governorate` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'المنوفية', NULL, NULL),
(2, 'القاهرة', NULL, NULL),
(3, 'الشرقية', NULL, NULL),
(4, 'الجيزة', NULL, NULL);

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
(1, 'offer testtt', 'uploads/offer/63591661974546.jpg', 100, '2022-08-23', '2022-09-24', 'percentage', NULL, 5, 100, 95, 'yes', '2022-08-24 06:39:59', '2022-08-31 19:35:46'),
(3, 'test offer1', 'uploads/offer/29851661974525.jpg', 93, '2022-08-16', '2026-09-04', 'percentage', 10, 5, 100, 95, 'yes', '2022-08-16 13:54:21', '2022-08-31 19:35:25'),
(4, 'admin1', 'uploads/offer/32061661974501.jpg', 1, '2022-08-22', '2023-08-04', 'value', 10, NULL, 100, 90, 'yes', '2022-08-16 13:58:46', '2022-08-31 19:35:01'),
(5, 'offer testtt', 'uploads/offer/52651661974472.jpg', 120, '2022-08-23', '2022-09-30', 'percentage', NULL, 5, 100, 95, 'yes', '2022-08-24 06:39:59', '2022-08-31 19:34:32'),
(6, 'neskafa', 'uploads/offer/29091661974425.jpg', 120, '2022-08-31', '2022-09-30', 'percentage', NULL, 5, 100, 95, 'no', '2022-08-31 09:22:04', '2022-08-31 19:33:45');

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
(28, 6, 5, 2, 100, '2022-08-31 19:33:45', '2022-08-31 19:33:45'),
(29, 6, 4, 3, 15, '2022-08-31 19:33:45', '2022-08-31 19:33:45'),
(30, 6, 3, 3, 90, '2022-08-31 19:33:45', '2022-08-31 19:33:45'),
(31, 5, 3, 2, 5, '2022-08-31 19:34:32', '2022-08-31 19:34:32'),
(32, 5, 4, 3, 3, '2022-08-31 19:34:32', '2022-08-31 19:34:32'),
(33, 4, 3, 3, 20, '2022-08-31 19:35:01', '2022-08-31 19:35:01'),
(34, 3, 4, 3, 15, '2022-08-31 19:35:25', '2022-08-31 19:35:25'),
(35, 3, 3, 2, 3, '2022-08-31 19:35:25', '2022-08-31 19:35:25'),
(36, 1, 4, 2, 20, '2022-08-31 19:35:46', '2022-08-31 19:35:46');

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
  `lg_unit_price` double DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sm_unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `min_sm_amount` int(11) NOT NULL DEFAULT 1,
  `max_sm_amount` int(11) DEFAULT NULL,
  `lg_unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `min_lg_amount` int(11) DEFAULT NULL,
  `max_lg_amount` int(11) DEFAULT NULL,
  `lg_sm_amount` int(11) NOT NULL DEFAULT 1,
  `amount` int(11) NOT NULL DEFAULT 1,
  `purchase_price` double NOT NULL DEFAULT 0,
  `is_available` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `sm_unit_price`, `lg_unit_price`, `category_id`, `brand_id`, `sm_unit_id`, `min_sm_amount`, `max_sm_amount`, `lg_unit_id`, `min_lg_amount`, `max_lg_amount`, `lg_sm_amount`, `amount`, `purchase_price`, `is_available`, `created_at`, `updated_at`) VALUES
(3, 'منتج اختبار1', 'uploads/product/33601661797270.jpg', 5, 10, 6, 3, 3, 21, 11, 2, 1, 2, 10000, 990000, 0, 'yes', '2022-08-16 11:33:59', '2022-08-29 18:21:10'),
(4, 'منتج اختبار2', 'uploads/product/28321661797263.jpg', 5, 10, 6, 3, 3, 21, 11, 2, 1, 2, 10000, 559980, 0, 'yes', '2022-08-16 11:33:59', '2022-08-29 18:21:03'),
(5, 'منتج اختبار3', 'uploads/product/64801661797247.jpg', 5, 10, 6, 1, 3, 21, 11, 2, 1, 2, 10000, 1000000, 0, 'yes', '2022-08-16 11:33:59', '2022-08-29 18:20:47'),
(6, 'ahmed samir', 'uploads/product/89211661799391.jpg', 7, NULL, 2, 1, 3, 5, 100, NULL, NULL, NULL, 1, 100, 10, 'yes', '2022-08-29 18:56:31', '2022-08-31 06:09:37');

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
(1, '22:00:00', 196331, 1, 110001, 1000, NULL, '2022-08-31 13:02:18');

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
(1, 'offer', 'uploads/sliders/11151661797356.jpg', 1, NULL, '2022-08-15 17:12:55', '2022-08-29 18:22:36'),
(2, 'brand', 'uploads/sliders/37061661797343.jpg', 3, 6, '2022-08-15 17:27:18', '2022-08-29 18:22:23'),
(3, 'brand', 'uploads/sliders/66121661797334.jpg', 1, 6, '2022-08-15 17:27:40', '2022-08-29 18:22:14'),
(4, 'product', 'uploads/sliders/31321661797325.jpg', 4, NULL, '2022-08-29 17:05:17', '2022-08-29 18:22:05');

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
  `phone_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '+20',
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `governorate_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double NOT NULL DEFAULT 0,
  `longitude` double NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` double NOT NULL DEFAULT 0,
  `wallet` int(11) NOT NULL DEFAULT 0,
  `is_active` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `block` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `phone_code`, `city_id`, `governorate_id`, `address`, `latitude`, `longitude`, `image`, `points`, `wallet`, `is_active`, `block`, `created_at`, `updated_at`, `email`) VALUES
(14, 'ahmed samir', '1234567893174', '+20', 5, 1, NULL, 0, 0, NULL, 11000, 0, 'no', 'no', '2022-08-29 17:53:34', '2022-08-29 17:53:34', 'a@aa.comaa3174'),
(15, 'ahmed samir', '12345678931741', '+20', 5, 1, NULL, 0, 0, NULL, 11000, 0, 'yes', 'no', '2022-08-29 17:55:32', '2022-08-31 10:57:28', 'a@aa.comaa31742'),
(16, 'ahmed samir', '12345678931744', '+20', 5, 1, NULL, 0, 0, NULL, 11000, 0, 'no', 'no', '2022-08-29 17:56:01', '2022-08-31 10:57:30', 'a@aa.comaa31743'),
(17, 'ahmed samir', '1234567893177', '+20', 5, 1, NULL, 0, 0, NULL, 11000, 0, 'yes', 'yes', '2022-08-29 17:56:42', '2022-08-31 10:57:51', 'a@aa.comaa393'),
(18, 'ahmed samir', '1234567893178', '+20', 5, 1, NULL, 0, 0, NULL, 11000, 0, 'yes', 'no', '2022-08-29 17:58:55', '2022-08-31 10:55:37', 'a@aa.comaa391');

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
(9, 15, NULL, 11000, 'register', '2022-08-29 17:55:32', '2022-08-29 17:55:32'),
(10, 16, NULL, 11000, 'register', '2022-08-29 17:56:01', '2022-08-29 17:56:01'),
(11, 17, NULL, 11000, 'register', '2022-08-29 17:56:42', '2022-08-29 17:56:42'),
(12, 18, NULL, 11000, 'register', '2022-08-29 17:58:55', '2022-08-29 17:58:55');

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
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_gov_id` (`governorate_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_users`
--
ALTER TABLE `coupon_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorate`
--
ALTER TABLE `governorate`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_governorate_id` (`governorate_id`),
  ADD KEY `user_city_id` (`city_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category_images`
--
ALTER TABLE `category_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_users`
--
ALTER TABLE `coupon_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorate`
--
ALTER TABLE `governorate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offer_products`
--
ALTER TABLE `offer_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `targets`
--
ALTER TABLE `targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_gov_id` FOREIGN KEY (`governorate_id`) REFERENCES `governorate` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_governorate_id` FOREIGN KEY (`governorate_id`) REFERENCES `governorate` (`id`) ON DELETE CASCADE;

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
