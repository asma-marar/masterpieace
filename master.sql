-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 10:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `master`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-12-26 13:51:59', '2024-12-26 13:51:59'),
(2, 3, '2024-12-31 01:53:59', '2024-12-31 01:53:59'),
(3, 2, '2024-12-31 12:47:18', '2024-12-31 12:47:18'),
(4, 6, '2025-01-06 16:41:08', '2025-01-06 16:41:08'),
(5, 7, '2025-01-07 00:44:55', '2025-01-07 00:44:55'),
(6, 8, '2025-01-07 04:48:22', '2025-01-07 04:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(98, 2, 31, 1, '2025-01-02 12:00:36', '2025-01-02 12:00:36'),
(101, 2, 20, 1, '2025-01-03 02:12:13', '2025-01-03 02:12:13'),
(102, 2, 6, 1, '2025-01-03 02:24:42', '2025-01-03 02:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Men', 'Men clothes', '1734465803.jpg', '2024-11-22 04:46:18', '2024-12-17 17:03:23', NULL),
(7, 'Women', 'Women clothes', '1736182956.jfif', '2024-12-17 17:02:45', '2025-01-06 14:02:36', NULL),
(8, 'Kids', 'kids clothes', '1736182619.jfif', '2024-12-17 17:04:09', '2025-01-06 13:56:59', NULL),
(9, 'Shoes', 'Shoes for all', '1736182821.jfif', '2024-12-17 17:04:47', '2025-01-06 14:00:21', NULL),
(10, 'Accessories', 'Accessories', '1736183427.jfif', '2024-12-17 17:05:46', '2025-01-06 14:10:27', NULL),
(11, 'test', 'testing', '1734938258.jpg', '2024-12-23 04:17:38', '2024-12-23 04:26:54', '2024-12-23 04:26:54'),
(12, 'test', 'test', '1734939286.jpg', '2024-12-23 04:34:46', '2025-01-03 11:47:29', '2025-01-03 11:47:29'),
(13, 'test', 'test', '1734943489.jpg', '2024-12-23 05:44:49', '2025-01-03 11:47:26', '2025-01-03 11:47:26'),
(14, 'Home', 'Home products', '1736222115.jfif', '2025-01-07 00:55:15', '2025-01-07 00:55:15', NULL),
(15, 'test', 'test', '1736236390.jfif', '2025-01-07 04:53:10', '2025-01-07 04:53:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `customer_id`, `message`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, 'good products', '2025-01-02 13:28:29', '2025-01-03 15:21:00', 'seen'),
(3, 7, 'HELLO', '2025-01-07 00:44:40', '2025-01-07 00:56:44', 'seen'),
(4, 8, 'hello', '2025-01-07 04:48:01', '2025-01-07 04:54:06', 'seen');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('seller','buyer') NOT NULL DEFAULT 'buyer',
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `role`, `phone`, `address`, `city`, `profile_image`, `email_verified_at`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'sara', 'sara@gmail.com', 'buyer', '07864547', 'zarqa', 'Amman', '1735985745_android-chrome-192x192.png', NULL, '$2y$10$PNXELKyhkKewhofZczsfau8XrWuEv7/qTuxxFAnBxykDuLEobh9ky', '2024-12-18 10:17:09', '2025-01-04 07:15:45', NULL),
(2, 'test', 'test@gmail.com', 'buyer', '07897545', 'anything', 'Irbid', NULL, NULL, '$2y$10$z09q7q6oCqV7YntvYGHzmu64s1YQgs3RFWaPZuzjKjlB4tAekqrRi', '2024-12-30 07:39:56', '2024-12-31 15:36:45', NULL),
(3, 'zaid', 'zaid@gmail.com', 'buyer', '07897545', 'anything', 'Irbid', NULL, NULL, '$2y$10$EnZdV1VpK3hfeLyh.UlGT.s9zS2.H.6sBGBIoUEuEgcMLJkl6KE9O', '2024-12-30 07:42:45', '2024-12-31 08:15:12', NULL),
(5, 'Women', 'women@gmail.com', 'buyer', '00', 'Amman', 'Amman', NULL, NULL, '$2y$10$VNCYoI81KgXjoTqVHLLed.OTerGnZeJQ3XksZ2OTJF3qAgf9R3ODO', '2025-01-03 07:36:11', '2025-01-03 14:01:22', '2025-01-03 14:01:22'),
(6, 'esraa', 'esraa@gmail.com', 'buyer', '0776892026', 'alzwahra', 'Zarqa', NULL, NULL, '$2y$10$e8dPNiwr6GHUYlKOFDj.xO7vBkr1obTWXt6I/tNB3vlzYjtDG7WJy', '2025-01-04 05:22:19', '2025-01-04 05:22:19', NULL),
(7, 'TET22', 'test1@gmail.com', 'buyer', '0776892026', 'om nwara', 'Amman', NULL, NULL, '$2y$10$XjWZje.UEuTRmE45Svmk4OgwkHRUIIZ3LRB3CLdp/Wn.bxau4md66', '2025-01-07 00:44:15', '2025-01-07 00:47:12', NULL),
(8, 'mona', 'mona@gmail.com', 'buyer', '0786892029', 'Amman', 'Amman', NULL, NULL, '$2y$10$ekNdB308ZlkjiM6cZAPyj.AzD7a2Z15fUsGpWK7aZAWtGX0ny5F2.', '2025-01-07 04:47:20', '2025-01-07 04:50:10', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_11_20_151846_add_role_as_to_users_table', 2),
(7, '2024_11_21_071437_create_categories_table', 3),
(8, '2024_11_23_001452_add_deleted_at_to_users_table', 4),
(9, '2024_11_23_004141_add_deleted_at_to_categories_table', 5),
(10, '2024_11_23_065623_create_products_table', 6),
(11, '2024_11_23_133456_add_city_to_users_table', 7),
(12, '2024_11_23_133713_add_address_to_users_table', 7),
(13, '2024_11_23_135359_drop_address_column_from_table_name', 8),
(14, '2024_11_23_185349_create_orders_table', 9),
(15, '2024_11_23_185532_create_order_products_table', 9),
(16, '2024_11_24_053533_create_contacts_table', 10),
(17, '2024_11_26_063103_update_users_table', 11),
(18, '2024_11_26_132405_add_price_to_order_products_table', 12),
(19, '2024_12_01_013116_create_reviews_table', 13),
(20, '2024_12_18_123813_create_customers_table', 14),
(23, '2024_12_20_120506_create_product_images_table', 15),
(27, '2024_12_25_114101_create_product_images_table', 16),
(28, '2024_12_25_130526_drop_products_table', 17),
(29, '2024_12_25_131438_create_products_table', 18),
(30, '2024_12_25_185333_create_wishlists_table', 19),
(31, '2024_12_26_155359_create_carts_table', 20),
(32, '2024_12_26_160127_create_cart_items_table', 21),
(33, '2024_12_27_131919_drop_orders_table', 22),
(34, '2024_12_27_132310_create_orders_table', 23),
(35, '2024_12_31_105536_create_ratings_table', 24),
(36, '2025_01_02_160201_create_contacts_table', 25),
(37, '2025_01_03_181328_add_status_to_contacts_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `order_status` enum('pending','processing','delivered','cancelled') NOT NULL DEFAULT 'pending',
  `order_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_total`, `order_status`, `order_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 323.00, 'pending', 'Amman', '2024-12-27 17:00:35', '2024-12-27 17:00:35', NULL),
(2, 1, 134.00, 'pending', 'Amman', '2024-12-27 17:36:30', '2024-12-27 17:36:30', NULL),
(3, 1, 263.00, 'pending', 'Amman', '2024-12-28 14:24:14', '2024-12-28 14:24:14', NULL),
(4, 1, 323.00, 'pending', 'Amman', '2024-12-29 16:16:01', '2024-12-29 16:16:01', NULL),
(5, 3, 272.00, 'pending', 'anything', '2024-12-31 08:15:21', '2024-12-31 08:15:21', NULL),
(6, 3, 115.00, 'delivered', 'anything', '2024-12-31 10:39:17', '2024-12-31 10:39:17', NULL),
(7, 1, 105.00, 'delivered', 'zarqa', '2024-12-31 15:34:47', '2024-12-31 15:34:47', NULL),
(8, 2, 253.00, 'delivered', 'anything', '2024-12-31 15:36:53', '2024-12-31 15:36:53', NULL),
(9, 3, 74.00, 'pending', 'anything', '2025-01-02 09:52:17', '2025-01-02 09:52:17', NULL),
(10, 3, 55.00, 'delivered', 'anything', '2025-01-02 10:32:48', '2025-01-02 10:32:48', NULL),
(11, 1, 105.00, 'pending', 'zarqa', '2025-01-03 00:37:45', '2025-01-03 00:37:45', NULL),
(12, 1, 105.00, 'pending', 'zarqa', '2025-01-03 00:44:30', '2025-01-03 00:44:30', NULL),
(13, 1, 135.00, 'pending', 'zarqa', '2025-01-03 16:29:34', '2025-01-03 16:29:34', NULL),
(14, 1, 145.00, 'pending', 'zarqa', '2025-01-04 10:42:23', '2025-01-04 10:42:23', NULL),
(15, 6, 324.44, 'pending', 'alzwahra', '2025-01-06 16:41:21', '2025-01-06 16:41:21', NULL),
(16, 7, 265.00, 'delivered', 'om nwara', '2025-01-07 00:46:25', '2025-01-07 00:56:20', NULL),
(17, 8, 215.00, 'delivered', 'Amman', '2025-01-07 04:49:24', '2025-01-07 04:53:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 2, 5, 1, 20.00, '2024-11-30 14:37:30', '2024-11-30 14:37:30'),
(3, 1, 5, 2, 69.00, '2024-12-27 17:00:35', '2024-12-27 17:00:35'),
(4, 1, 6, 2, 60.00, '2024-12-27 17:00:35', '2024-12-27 17:00:35'),
(5, 1, 4, 1, 60.00, '2024-12-27 17:00:35', '2024-12-27 17:00:35'),
(6, 2, 2, 1, 69.00, '2024-12-27 17:36:30', '2024-12-27 17:36:30'),
(7, 2, 6, 1, 60.00, '2024-12-27 17:36:30', '2024-12-27 17:36:30'),
(8, 3, 6, 2, 60.00, '2024-12-28 14:24:14', '2024-12-28 14:24:14'),
(9, 3, 5, 1, 69.00, '2024-12-28 14:24:14', '2024-12-28 14:24:14'),
(10, 3, 2, 1, 69.00, '2024-12-28 14:24:14', '2024-12-28 14:24:14'),
(11, 4, 5, 2, 69.00, '2024-12-29 16:16:01', '2024-12-29 16:16:01'),
(12, 4, 6, 3, 60.00, '2024-12-29 16:16:01', '2024-12-29 16:16:01'),
(13, 5, 11, 1, 30.00, '2024-12-31 08:15:21', '2024-12-31 08:15:21'),
(14, 5, 13, 1, 30.00, '2024-12-31 08:15:21', '2024-12-31 08:15:21'),
(15, 5, 18, 1, 69.00, '2024-12-31 08:15:21', '2024-12-31 08:15:21'),
(16, 5, 19, 1, 69.00, '2024-12-31 08:15:21', '2024-12-31 08:15:21'),
(17, 5, 32, 1, 69.00, '2024-12-31 08:15:21', '2024-12-31 08:15:21'),
(18, 6, 31, 1, 50.00, '2024-12-31 10:39:17', '2024-12-31 10:39:17'),
(19, 6, 30, 1, 60.00, '2024-12-31 10:39:17', '2024-12-31 10:39:17'),
(20, 7, 33, 2, 50.00, '2024-12-31 15:34:47', '2024-12-31 15:34:47'),
(21, 8, 32, 2, 69.00, '2024-12-31 15:36:53', '2024-12-31 15:36:53'),
(22, 8, 33, 1, 50.00, '2024-12-31 15:36:53', '2024-12-31 15:36:53'),
(23, 8, 30, 1, 60.00, '2024-12-31 15:36:53', '2024-12-31 15:36:53'),
(24, 9, 32, 1, 69.00, '2025-01-02 09:52:17', '2025-01-02 09:52:17'),
(25, 10, 31, 1, 50.00, '2025-01-02 10:32:48', '2025-01-02 10:32:48'),
(26, 11, 33, 2, 50.00, '2025-01-03 00:37:45', '2025-01-03 00:37:45'),
(27, 12, 33, 2, 50.00, '2025-01-03 00:44:30', '2025-01-03 00:44:30'),
(28, 13, 35, 1, 70.00, '2025-01-03 16:29:34', '2025-01-03 16:29:34'),
(29, 13, 34, 1, 60.00, '2025-01-03 16:29:34', '2025-01-03 16:29:34'),
(30, 14, 35, 1, 70.00, '2025-01-04 10:42:23', '2025-01-04 10:42:23'),
(31, 14, 36, 1, 70.00, '2025-01-04 10:42:23', '2025-01-04 10:42:23'),
(32, 15, 31, 4, 49.86, '2025-01-06 16:41:21', '2025-01-06 16:41:21'),
(33, 15, 30, 2, 60.00, '2025-01-06 16:41:21', '2025-01-06 16:41:21'),
(34, 16, 29, 1, 60.00, '2025-01-07 00:46:25', '2025-01-07 00:46:25'),
(35, 16, 28, 4, 50.00, '2025-01-07 00:46:25', '2025-01-07 00:46:25'),
(36, 17, 37, 2, 70.00, '2025-01-07 04:49:24', '2025-01-07 04:49:24'),
(37, 17, 35, 1, 70.00, '2025-01-07 04:49:24', '2025-01-07 04:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `category_id`, `quantity`, `color`, `size`, `deleted_at`, `created_at`, `updated_at`, `customer_id`) VALUES
(1, 'Women', 'ddddddddddd', 'uploads/product/1735137454.jpg', 30.00, 9, 4, 'yellow', 'L', '2025-01-03 12:48:04', '2024-12-25 11:37:34', '2025-01-03 12:48:04', 1),
(2, 'watch', 'aaaaaaaaaaaa', 'uploads/product/1735138888.jpg', 69.00, 9, 1, 'green', 'M', '2025-01-03 12:48:05', '2024-12-25 12:01:28', '2025-01-03 12:48:05', 1),
(3, 'Philip Montgomery', 'Sed aliqua Perferen', 'uploads/product/1735139005.jpg', 844.00, 10, 195, 'purple', 'M', NULL, '2024-12-25 12:03:25', '2024-12-25 12:03:25', 1),
(4, 'baby wear', 'kids clothes', 'uploads/product/1735145200.jpg', 60.00, 8, 1, 'yellow', 'M', NULL, '2024-12-25 13:46:40', '2024-12-25 13:46:40', 1),
(5, 'kids wear', 'nice clothes', 'uploads/product/1735146010.jpg', 69.00, 8, 2, 'blue', 'L', NULL, '2024-12-25 14:00:10', '2024-12-25 14:00:10', 1),
(6, 'Women', 'women', 'uploads/product/1735250410.jpg', 60.00, 7, 4, 'blue', 'XL', NULL, '2024-12-26 19:00:10', '2024-12-26 19:00:10', 1),
(7, 'as', 'test', 'uploads/product/1735470419.jpg', 49.00, 9, 1, 'green', 'L', NULL, '2024-12-29 08:06:59', '2024-12-29 08:06:59', 1),
(8, 'jeans', 'jeans for women', 'uploads/product/1735472034.jpg', 70.00, 7, 2, 'blue', 'M', NULL, '2024-12-29 08:33:54', '2024-12-29 08:33:54', 1),
(9, 'Women', 'kokoo', 'uploads/product/1735475828.jpg', 50.00, 7, 2, 'green', 'M', NULL, '2024-12-29 09:37:08', '2024-12-29 09:37:08', 1),
(10, 'Women', 'all all all', 'uploads/product/1735475915.jpg', 69.00, 7, 4, 'green', 'M', NULL, '2024-12-29 09:38:35', '2024-12-29 09:38:35', 1),
(11, 'Women', 'weeeeeeeeeeeeeee', 'uploads/product/1735478881.jpg', 30.00, 10, 4, 'blue', 'M', NULL, '2024-12-29 10:28:01', '2024-12-29 10:28:01', 1),
(12, 'watch', 'whatt', 'uploads/product/1735479884.jpg', 50.00, 10, 2, 'green', 'L', NULL, '2024-12-29 10:44:44', '2024-12-29 10:44:44', 1),
(13, 'jacket', 'jacket for kids', 'uploads/product/1735488556.jpg', 30.00, 8, 1, 'beige', '1-2 years', NULL, '2024-12-29 13:09:16', '2024-12-29 13:09:16', 1),
(14, 'Asma', 'all', 'uploads/product/1735490443.jpg', 50.00, 8, 2, 'blue', 'XL', NULL, '2024-12-29 13:40:43', '2024-12-29 13:40:43', 1),
(15, 'watch', 'nice', 'uploads/product/1735492279.jpg', 60.00, 10, 2, 'green', 'M', NULL, '2024-12-29 14:11:19', '2024-12-29 14:11:19', 1),
(16, 'watch', 'nice', 'uploads/product/1735492341.jpg', 60.00, 10, 2, 'green', 'M', NULL, '2024-12-29 14:12:21', '2024-12-29 14:12:21', 1),
(17, 'Asma', 'any', 'uploads/product/1735492475.jpg', 69.00, 8, 2, 'yellow', 'XL', NULL, '2024-12-29 14:14:35', '2024-12-29 14:14:35', 1),
(18, 'Asma', 'any', 'uploads/product/1735492516.jpg', 69.00, 8, 2, 'yellow', 'XL', NULL, '2024-12-29 14:15:16', '2024-12-29 14:15:16', 1),
(19, 'Asma', 'any', 'uploads/product/1735492525.jpg', 69.00, 8, 2, 'yellow', 'XL', NULL, '2024-12-29 14:15:25', '2024-12-29 14:15:25', 1),
(20, 'watch', 'we route', 'uploads/product/1735497978.jpg', 50.00, 9, 4, 'red', 'S', NULL, '2024-12-29 15:46:18', '2024-12-29 15:46:18', 1),
(21, 'Women', 'asmaa', 'uploads/product/1735498129.jpg', 70.00, 8, 2, 'brown', 'XL', NULL, '2024-12-29 15:48:49', '2024-12-29 15:48:49', 1),
(22, 'kids clothes', 'kids', 'uploads/product/1735498276.jpg', 70.00, 7, 2, 'gray', '1-2 years', NULL, '2024-12-29 15:51:16', '2024-12-29 15:51:16', 1),
(23, 'kids wear', 'jeans', 'uploads/product/1735498425.jpg', 50.00, 10, 5, 'blue', 'M', NULL, '2024-12-29 15:53:45', '2024-12-29 15:53:45', 1),
(24, 'kids wear', 'jeans kids', 'uploads/product/1735498775.jpg', 40.00, 8, 66, 'yellow', '1-2 years', NULL, '2024-12-29 15:59:35', '2024-12-29 15:59:35', 1),
(25, 'kids wear', 'jeans kids', 'uploads/product/1735498942.jpg', 40.00, 7, 66, 'red', 'M', NULL, '2024-12-29 16:02:22', '2024-12-29 16:02:22', 1),
(26, 'kids wear', 'jeans kids for kids', 'uploads/product/1735499163.jpg', 55.00, 8, 21, 'yellow', 'XL', NULL, '2024-12-29 16:06:03', '2025-01-04 07:35:23', 1),
(27, 'kids wear', 'jeans kids for kids', 'uploads/product/1735499374.jpg', 80.00, 7, 21, 'yellow', '1-2 years', NULL, '2024-12-29 16:09:34', '2024-12-29 16:09:34', 1),
(28, 'watch', 'all', 'uploads/product/1735499892.jpg', 50.00, 9, 0, 'blue', 'L', NULL, '2024-12-29 16:18:12', '2025-01-07 00:46:25', 1),
(29, 'Women', 'all', 'uploads/product/1735500410.jpg', 60.00, 7, 0, 'blue', '1-2 years', NULL, '2024-12-29 16:26:50', '2025-01-07 00:46:25', 1),
(30, 'Women', 'all', 'uploads/product/1735500844.jpg', 60.00, 3, 0, 'green', '1-2 years', NULL, '2024-12-29 16:34:04', '2025-01-06 16:41:21', 1),
(31, 'watch', 'll', 'uploads/product/1735500877.jpg', 49.86, 3, 0, 'blue', 'M', NULL, '2024-12-29 16:34:37', '2025-01-06 16:41:21', 1),
(32, 'Women', 'all', 'uploads/product/1735548451.jpg', 69.00, 7, 0, 'turquoise', 'XL', NULL, '2024-12-30 05:47:31', '2025-01-04 08:05:25', 1),
(33, 'Women', 'the special price for the special people', 'uploads/product/1735623478.jfif', 50.00, 7, 2, 'purple', 'M', NULL, '2024-12-31 02:37:58', '2025-01-03 00:44:30', 3),
(34, 'T-shirt', 'color beige have good quality', 'uploads/product/1735877151.jfif', 60.00, 7, 0, 'beige', 'XL', NULL, '2025-01-03 01:05:51', '2025-01-03 16:29:34', 3),
(35, 'Jackets', 'jacket have a good quality for men', 'uploads/product/1735877279.jfif', 70.00, 3, 1, 'brown', 'XL', NULL, '2025-01-03 01:07:59', '2025-01-07 04:49:24', 3),
(36, 'boots', 'women boot have a nice color new for sale', 'uploads/product/1735877392.jpg', 70.00, 9, 1, 'violet', '40', NULL, '2025-01-03 01:09:52', '2025-01-04 10:42:23', 3),
(37, 'dress', 'nice dress for the party', 'uploads/product/1735987033.jfif', 70.00, 7, 0, 'lavender', 'L', NULL, '2025-01-04 07:37:13', '2025-01-07 04:49:24', 1),
(38, 'kids wear', 'nice accessories', 'uploads/product/1736221767.jfif', 30.00, 8, 0, 'purple', '1-2 years', NULL, '2025-01-07 00:49:27', '2025-01-07 00:51:15', 7),
(39, 'Women', 'any thing', 'uploads/product/1736236266.jfif', 30.00, 8, 0, 'purple', '1-2 years', NULL, '2025-01-07 04:51:06', '2025-01-07 04:51:56', 8);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `is_primary`, `created_at`, `updated_at`) VALUES
(1, 8, 'HXW1A1XdFzAhlomb88byWqTFtNEQRMqXPj8F30uG.jpg', 0, '2024-12-29 08:33:54', '2024-12-29 08:33:54'),
(2, 9, 'products/jp1oZPCAoLcaDF7oyxEczhZx8aAZy75gGQMoGBKa.jpg', 0, '2024-12-29 09:37:08', '2024-12-29 09:37:08'),
(3, 10, 'uploads/product/1735475915_pexels-thallenmerlin-1630436.jpg', 0, '2024-12-29 09:38:35', '2024-12-29 09:38:35'),
(4, 13, 'uploads/product/1735488556_pexels-ruxandra-scutelnic-1470184397-28259754.jpg', 0, '2024-12-29 13:09:16', '2024-12-29 13:09:16'),
(5, 14, 'uploads/product/1735490443_pexels-karolina-grabowska-4210866.jpg', 0, '2024-12-29 13:40:43', '2024-12-29 13:40:43'),
(6, 28, 'uploads/product/1735499892_pexels-nietjuh-934070.jpg', 0, '2024-12-29 16:18:12', '2024-12-29 16:18:12'),
(7, 29, 'uploads/product/1735500410_pexels-karolina-grabowska-4210866.jpg', 0, '2024-12-29 16:26:50', '2024-12-29 16:26:50'),
(8, 30, 'uploads/product/1735500844_pexels-nietjuh-934070.jpg', 0, '2024-12-29 16:34:04', '2024-12-29 16:34:04'),
(9, 31, 'uploads/product/1735500877_pexels-karolina-grabowska-4210866.jpg', 0, '2024-12-29 16:34:37', '2024-12-29 16:34:37'),
(10, 32, 'uploads/product/1735548451_ff644477-a865-4d41-97b0-016e94444ccf.jfif', 0, '2024-12-30 05:47:31', '2024-12-30 05:47:31'),
(11, 33, 'uploads/product/1735623478_7885eded-bc75-4d2b-b8ec-fce945657aa6.jfif', 0, '2024-12-31 02:37:58', '2024-12-31 02:37:58'),
(12, 26, 'uploads/products/1735986888_67790ec88361a.jpg', 0, '2025-01-04 07:34:48', '2025-01-04 07:34:48'),
(13, 37, 'uploads/product/1735987033_49788365-5497-4104-be1a-ecd1090abac2.jfif', 0, '2025-01-04 07:37:13', '2025-01-04 07:37:13'),
(14, 38, 'uploads/product/1736221767_66ddac72-6596-46de-ae66-1baa8f34f909.jfif', 0, '2025-01-07 00:49:27', '2025-01-07 00:49:27'),
(15, 39, 'uploads/product/1736236266_00a16437-6a43-449b-b57b-e060232f2259.jfif', 0, '2025-01-07 04:51:06', '2025-01-07 04:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `rated_customer_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `order_id`, `customer_id`, `rated_customer_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 1, 3, 'very good', '2024-12-31 08:53:50', '2024-12-31 08:53:50'),
(2, 6, 3, 1, 4, 'i can trust her again', '2024-12-31 12:44:05', '2024-12-31 12:44:05'),
(4, 8, 2, 1, 3, 'good person', '2024-12-31 15:37:41', '2024-12-31 15:37:41'),
(6, 10, 3, 1, 4, 'good and nice product', '2025-01-02 18:17:16', '2025-01-02 18:17:16'),
(7, 16, 7, 1, 4, 'thank you i will trust you always', '2025-01-07 00:58:24', '2025-01-07 00:58:24'),
(8, 16, 7, 1, 4, 'thank you i will trust you always', '2025-01-07 00:58:57', '2025-01-07 00:58:57'),
(9, 17, 8, 1, 4, 'good product', '2025-01-07 04:55:03', '2025-01-07 04:55:03'),
(10, 17, 8, 3, 5, 'good product', '2025-01-07 04:55:09', '2025-01-07 04:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','customer','intermediary') NOT NULL DEFAULT 'customer',
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Asma', 'asma@gmail.com', 'customer', '0771234567', 'om nowara', NULL, '$2y$10$jzp8ryCN0uQqA6hkpC0lvuZ9PulIk5gtF/w3i8AfCgnXXywpdKjYC', NULL, '2024-11-20 10:09:37', '2024-11-26 04:55:09', NULL),
(3, 'admin', 'admin@gmail.com', 'admin', '0799876543', NULL, NULL, '$2y$10$BF4PmATmfUfl6XY7Vg8YGu2LuwmzzUSCnWpyL.4UbzRTFyTY.tepW', NULL, '2024-11-21 03:46:32', '2024-11-21 03:46:32', NULL),
(4, 'Esraa', 'esraa@gmail.com', 'intermediary', '0779876543', NULL, NULL, '12345678', NULL, '2024-11-22 13:29:57', '2025-01-03 12:41:56', '2025-01-03 12:41:56'),
(5, 'Mohammed', 'mohammed@gmail.com', 'customer', '0795555555', NULL, NULL, '$2y$10$OdX/e2d/gmCmD2w7UBd2SOAxC8XWm/kqFEy5muBlkD3/pWsTUG4zi', NULL, '2024-11-22 13:33:14', '2024-11-22 13:33:14', NULL),
(6, 'Tasneem', 'toto1@gmail.com', 'customer', '0775555555', NULL, NULL, '$2y$10$R5j5yILEoijxKgkUtcKhfeT9Ht6qMrZYQTvaP8jXAKtS7mBd6XceS', NULL, '2024-11-22 13:35:36', '2024-11-22 21:37:42', '2024-11-22 21:37:42'),
(8, 'Asma Marar', 'asma33@gmail.com', 'customer', '0771111111', NULL, NULL, '$2y$10$ILHwxQ3ztp1W14Rs9l4fM.o8RrAHeaM5seQFvbOz4hHxbq6VCQ7.a', NULL, '2024-11-23 03:34:47', '2024-11-23 03:34:47', NULL),
(9, 'maha', 'maha@gmail.com', 'customer', '0792222222', NULL, NULL, '$2y$10$7y7hcNWMnBgvF.rQZZLWzOGA3OG8lArqzvn6iPto/fpJGhdjN7kZW', NULL, '2024-11-23 10:55:15', '2024-11-23 10:55:15', NULL),
(10, 'as', 'as@gmail.com', 'customer', '0772222222', NULL, NULL, '$2y$10$.QqK.J7tUx6kzgPo3gG.3OzAjQ.MhvqcZVP4APn3htIlkfj4qtDyG', NULL, '2024-11-23 14:53:10', '2024-11-23 14:53:10', NULL),
(11, 'hisham', 'hisham@yahoo.com', 'customer', NULL, NULL, NULL, '$2y$10$wsFXham92LpbOJ2LQDenauym.On6zllOvKshGttNJ3Vk7U.7hv7QO', NULL, '2024-11-23 14:54:08', '2024-11-23 14:54:08', NULL),
(12, 'osama', 'osama@hotmail.com', 'customer', NULL, NULL, NULL, '$2y$10$klweqZwQXBPOiO04BWa38.lnY7rJV.k602UwmQkE0mAPHcFXpt4ha', NULL, '2024-11-23 14:54:40', '2024-11-23 14:54:40', NULL),
(14, 'Mohammed', 'mohammed22@gmail.com', 'customer', NULL, NULL, NULL, '$2y$10$6srdHHa7QBrp.SWGiHDPref5uqjqdo1cmS.MrMZVkVTv..xVjk0cO', NULL, '2024-11-23 14:55:26', '2024-11-23 14:55:26', NULL),
(15, 'yahya', 'yahya@gmail.com', 'customer', NULL, NULL, NULL, '$2y$10$C6ffGEsHLtIIoADDIjrjOeo/sRUZjT88OUSlr7vO/fkUZ3001eWz.', NULL, '2024-11-23 14:55:54', '2024-11-23 14:55:54', NULL),
(16, 'Women', 'women@gmail.com', 'customer', NULL, NULL, NULL, '$2y$10$5F8mOlWcb.OGsfgROyHJ7ep3awLJKvxyklHAx8G9M9zAY1SeatMU2', NULL, '2025-01-03 20:01:19', '2025-01-03 20:01:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(46, 3, 3, '2024-12-31 01:53:56', '2024-12-31 01:53:56'),
(47, 3, 2, '2024-12-31 02:12:54', '2024-12-31 02:12:54'),
(48, 3, 12, '2024-12-31 02:19:08', '2024-12-31 02:19:08'),
(49, 3, 11, '2024-12-31 02:19:29', '2024-12-31 02:19:29'),
(50, 3, 15, '2024-12-31 02:27:31', '2024-12-31 02:27:31'),
(51, 3, 14, '2024-12-31 02:27:33', '2024-12-31 02:27:33'),
(52, 3, 19, '2024-12-31 02:33:01', '2024-12-31 02:33:01'),
(58, 3, 1, '2024-12-31 11:43:12', '2024-12-31 11:43:12'),
(59, 3, 25, '2024-12-31 11:43:16', '2024-12-31 11:43:16'),
(62, 3, 20, '2025-01-03 02:12:14', '2025-01-03 02:12:14'),
(63, 3, 32, '2025-01-03 02:24:33', '2025-01-03 02:24:33'),
(64, 3, 6, '2025-01-03 02:24:43', '2025-01-03 02:24:43'),
(65, 3, 30, '2025-01-03 02:37:29', '2025-01-03 02:37:29'),
(68, 1, 34, '2025-01-03 16:28:47', '2025-01-03 16:28:47'),
(69, 1, 35, '2025-01-03 18:45:09', '2025-01-03 18:45:09'),
(70, 1, 36, '2025-01-03 18:45:13', '2025-01-03 18:45:13'),
(73, 6, 29, '2025-01-06 16:33:43', '2025-01-06 16:33:43'),
(74, 6, 37, '2025-01-06 16:33:44', '2025-01-06 16:33:44'),
(75, 6, 33, '2025-01-06 16:33:48', '2025-01-06 16:33:48'),
(76, 7, 29, '2025-01-07 00:44:53', '2025-01-07 00:44:53'),
(78, 7, 28, '2025-01-07 00:45:01', '2025-01-07 00:45:01'),
(79, 8, 37, '2025-01-07 04:48:17', '2025-01-07 04:48:17'),
(80, 8, 35, '2025-01-07 04:48:27', '2025-01-07 04:48:27'),
(81, 8, 26, '2025-01-07 04:48:30', '2025-01-07 04:48:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_index` (`customer_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_order_id_foreign` (`order_id`),
  ADD KEY `ratings_customer_id_foreign` (`customer_id`),
  ADD KEY `ratings_rated_customer_id_foreign` (`rated_customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_customer_id_foreign` (`customer_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_rated_customer_id_foreign` FOREIGN KEY (`rated_customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
