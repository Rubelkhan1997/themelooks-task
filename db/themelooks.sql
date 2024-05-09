-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2024 at 10:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `themelooks`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2024_05_05_082530_create_products_table', 1),
(18, '2024_05_05_082549_create_product_variants_table', 1),
(23, '2024_05_09_062858_create_orders_table', 2),
(24, '2024_05_09_062903_create_order_products_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_quantity` int NOT NULL,
  `total_sub_amount` double(12,2) NOT NULL,
  `total_discount` double(8,2) NOT NULL,
  `total_tax` double(8,2) NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `total_quantity`, `total_sub_amount`, `total_discount`, `total_tax`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, '1', 3, 280.00, 30.00, 15.00, 265.00, '2024-05-09 03:19:59', '2024-05-09 03:19:59'),
(2, '2', 2, 140.00, 10.00, 10.00, 140.00, '2024-05-09 03:20:16', '2024-05-09 03:20:16'),
(3, '3', 2, 105.00, 0.00, 10.00, 115.00, '2024-05-09 03:20:54', '2024-05-09 03:20:54'),
(5, '4', 3, 160.00, 0.00, 15.00, 175.00, '2024-05-09 04:17:38', '2024-05-09 04:17:38'),
(6, '5', 2, 260.00, 20.00, 10.00, 250.00, '2024-05-09 04:17:48', '2024-05-09 04:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `tax` double(8,2) NOT NULL,
  `total` double(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `price`, `discount`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Meat (Beef)', 2, 90.00, 10.00, 5.00, 170.00, '2024-05-09 03:19:59', '2024-05-09 03:19:59'),
(2, 1, 7, 'Fish (Ilish)', 1, 100.00, 10.00, 5.00, 95.00, '2024-05-09 03:19:59', '2024-05-09 03:19:59'),
(3, 2, 1, 'Meat (Beef)', 1, 90.00, 10.00, 5.00, 85.00, '2024-05-09 03:20:16', '2024-05-09 03:20:16'),
(4, 2, 2, 'Meat (Chicken)', 1, 50.00, 0.00, 5.00, 55.00, '2024-05-09 03:20:16', '2024-05-09 03:20:16'),
(5, 3, 2, 'Meat (Chicken)', 1, 50.00, 0.00, 5.00, 55.00, '2024-05-09 03:20:54', '2024-05-09 03:20:54'),
(6, 3, 3, 'Rice (Aman)', 1, 55.00, 0.00, 5.00, 60.00, '2024-05-09 03:20:54', '2024-05-09 03:20:54'),
(7, 5, 2, 'Meat (Chicken)', 1, 50.00, 0.00, 5.00, 55.00, '2024-05-09 04:17:38', '2024-05-09 04:17:38'),
(8, 5, 3, 'Rice (Aman)', 2, 55.00, 0.00, 5.00, 120.00, '2024-05-09 04:17:38', '2024-05-09 04:17:38'),
(9, 6, 5, 'Rice (Kalijira)', 1, 60.00, 0.00, 5.00, 65.00, '2024-05-09 04:17:48', '2024-05-09 04:17:48'),
(10, 6, 6, 'Fish (Puti)', 1, 200.00, 20.00, 5.00, 185.00, '2024-05-09 04:17:48', '2024-05-09 04:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` enum('kg','liter','pieces') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_value` double(10,2) DEFAULT NULL,
  `tax` double(5,2) NOT NULL DEFAULT '0.00',
  `created_by` int NOT NULL,
  `updated_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `sku`, `unit`, `unit_value`, `tax`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Meat', 'meat', 'kg', 10.00, 5.00, 1, NULL, '2024-05-07 00:29:16', '2024-05-07 00:29:16'),
(2, 'Rice', 'rice', 'kg', 50.00, 5.00, 1, NULL, '2024-05-07 00:38:46', '2024-05-07 00:38:46'),
(3, 'Fish', 'fish', 'kg', 5.00, 5.00, 1, NULL, '2024-05-07 03:44:58', '2024-05-07 03:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` double(10,2) DEFAULT NULL,
  `selling_price` double(10,2) NOT NULL,
  `discount` double(5,2) NOT NULL DEFAULT '0.00',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `size`, `color`, `purchase_price`, `selling_price`, `discount`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Beef', 70.00, 100.00, 10.00, 'uploads/products/2024/05/gettyimages-174479270-612x612jpg1715063356.jpg', '2024-05-07 00:29:16', '2024-05-07 00:29:16'),
(2, 1, NULL, 'Chicken', 30.00, 50.00, 0.00, 'uploads/products/2024/05/fresh-raw-chicken-isolated-on-600nw-583587001webp1715063356.webp', '2024-05-07 00:29:16', '2024-05-07 00:29:16'),
(3, 2, NULL, 'Aman', 50.00, 55.00, 0.00, 'uploads/products/2024/05/close-up-of-milled-rice-in-bowls-free-photojpg1715063926.jpg', '2024-05-07 00:38:46', '2024-05-07 00:38:46'),
(4, 2, NULL, 'Balam', 52.00, 58.00, 0.00, 'uploads/products/2024/05/download-1jpg1715063926.jpg', '2024-05-07 00:38:46', '2024-05-07 00:38:46'),
(5, 2, NULL, 'Kalijira', 55.00, 60.00, 0.00, 'uploads/products/2024/05/downloadjpg1715063926.jpg', '2024-05-07 00:38:46', '2024-05-07 00:38:46'),
(6, 3, NULL, 'Puti', 150.00, 220.00, 20.00, 'uploads/products/2024/05/1635930471puti-fish-webp1715075098.jpg', '2024-05-07 03:44:58', '2024-05-07 03:44:58'),
(7, 3, NULL, 'Ilish', 70.00, 110.00, 10.00, 'uploads/products/2024/05/imagesjpg1715075098.jpg', '2024-05-07 03:44:58', '2024-05-07 03:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_index` (`order_id`),
  ADD KEY `order_products_product_id_index` (`product_id`);

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
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_name_index` (`name`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_index` (`product_id`),
  ADD KEY `product_variants_selling_price_index` (`selling_price`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
