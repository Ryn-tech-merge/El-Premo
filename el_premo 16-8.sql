-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2022 at 06:07 PM
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
(2, NULL, NULL, '2022-08-16 08:01:40', '2022-08-16 08:01:40'),
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
(2, '1', 'شششش', '4566', '777777777777777777777', NULL, NULL);

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
  `amount` int(11) NOT NULL DEFAULT 1,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `type` enum('value','percentage') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double DEFAULT NULL,
  `percentage` double DEFAULT NULL,
  `old_price` double NOT NULL DEFAULT 0,
  `price` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `image`, `amount`, `start_date`, `end_date`, `type`, `value`, `percentage`, `old_price`, `price`, `created_at`, `updated_at`) VALUES
(1, 'offer1', NULL, 1, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL),
(2, 'offer2', NULL, 1, NULL, NULL, NULL, 0, 0, 0, 0, NULL, NULL),
(3, 'test offer', 'uploads/offer/37541660665261.jpg', 1, NULL, NULL, 'value', 10, NULL, 100, 90, '2022-08-16 13:54:21', '2022-08-16 13:54:21'),
(4, 'admin1', 'uploads/offer/49781660665526.PNG', 1, '2022-08-16', '2022-08-17', 'value', 10, NULL, 100, 90, '2022-08-16 13:58:46', '2022-08-16 13:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `offer_products`
--

CREATE TABLE `offer_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_products`
--

INSERT INTO `offer_products` (`id`, `offer_id`, `product_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 2, '2022-08-16 13:54:21', '2022-08-16 13:54:21'),
(2, 3, 3, 3, '2022-08-16 13:54:21', '2022-08-16 13:54:21'),
(3, 4, 3, 20, '2022-08-16 13:58:47', '2022-08-16 13:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('waiting','new','on_going','delivery','ended','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'waiting',
  `delivery_date` date DEFAULT NULL,
  `price` double NOT NULL DEFAULT 0,
  `discount` double NOT NULL,
  `total` double NOT NULL,
  `wallet_paid` double NOT NULL,
  `cash_paid` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 1,
  `type` enum('product','offer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `sm_unit_price`, `lg_unit_price`, `category_id`, `brand_id`, `sm_unit_id`, `min_sm_amount`, `max_sm_amount`, `lg_unit_id`, `min_lg_amount`, `max_lg_amount`, `lg_sm_amount`, `amount`, `created_at`, `updated_at`) VALUES
(3, 'منتج اختبار1', 'uploads/product/14601660660297.jpg', 5, 10, 6, 3, 3, 21, 11, 2, 1, 2, 10000, 1000000, '2022-08-16 11:33:59', '2022-08-16 12:31:37'),
(4, 'منتج اختبار2', 'uploads/product/14601660660297.jpg', 5, 10, 6, 3, 3, 21, 11, 2, 1, 2, 10000, 1000000, '2022-08-16 11:33:59', '2022-08-16 12:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_time` time DEFAULT NULL,
  `call_center` int(11) DEFAULT NULL,
  `delivery_days` int(11) NOT NULL DEFAULT 0,
  `gift_for` int(11) NOT NULL DEFAULT 0,
  `gift_price` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `order_time`, `call_center`, `delivery_days`, `gift_for`, `gift_price`, `created_at`, `updated_at`) VALUES
(1, '22:00:00', 196331, 1, 11000, 150, NULL, '2022-08-15 14:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('product','offer','brand') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `type`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'offer', 'uploads/sliders/77341660595137.jpg', 1, '2022-08-15 17:12:55', '2022-08-15 18:25:37'),
(2, 'brand', 'uploads/sliders/19251660591638.PNG', 2, '2022-08-15 17:27:18', '2022-08-15 18:26:00'),
(3, 'brand', 'uploads/sliders/70431660591660.PNG', 1, '2022-08-15 17:27:40', '2022-08-15 17:27:40');

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
  `shop_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shop_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` int(11) NOT NULL DEFAULT 0,
  `block` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `code`, `address`, `latitude`, `longitude`, `shop_image`, `shop_name`, `shop_address`, `wallet`, `block`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '+20', NULL, 0, 0, NULL, NULL, NULL, 0, 'no', NULL, NULL),
(3, 'aaa', '1234', '+20', 'batanoun ', 123.1, 456, 'aaaa', 'my shop', 'menofia', 10, 'yes', NULL, '2022-08-11 12:34:44'),
(4, 'aaa', '1234', '+20', 'batanoun ', 123.1, 456, 'aaaa', 'my shop', 'menofia', 10, 'no', NULL, '2022-08-11 12:34:53'),
(5, 'aaa', '1234', '+20', 'batanoun ', 71.5494042, 134.0097237, 'aaaa', 'my shop', 'menofia', 10, 'no', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `type` enum('gift','enter','purchases') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_unit_id_foreign` (`unit_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offer_products`
--
ALTER TABLE `offer_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
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
