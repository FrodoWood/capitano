-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 02:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capitano`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Men', NULL, NULL, '2024-10-07 23:16:54'),
(2, 'Women', NULL, NULL, '2024-10-07 23:16:23'),
(3, 'Shoes', 1, NULL, NULL),
(4, 'Shoes', 2, NULL, NULL),
(5, 'Jordan', 3, NULL, '2024-10-08 20:27:27'),
(11, 'Clothing', 1, '2024-10-08 23:15:08', '2024-10-08 23:15:08'),
(12, 'Lifestyle', 3, '2024-10-08 23:16:32', '2024-10-08 23:16:32'),
(13, 'Running', 3, '2024-10-08 23:16:41', '2024-10-08 23:16:41'),
(14, 'Football', 3, '2024-10-08 23:16:49', '2024-10-08 23:16:49'),
(15, 'Basketball', 3, '2024-10-08 23:17:01', '2024-10-08 23:17:01'),
(16, 'Training and Gym', 3, '2024-10-08 23:17:24', '2024-10-08 23:17:24'),
(17, 'Skateboarding', 3, '2024-10-08 23:17:34', '2024-10-08 23:17:34'),
(18, 'Tops and T-Shirts', 11, '2024-10-08 23:18:25', '2024-10-08 23:18:25'),
(19, 'Hoodies and Sweatshirts', 11, '2024-10-08 23:18:56', '2024-10-08 23:18:56'),
(20, 'Shorts', 11, '2024-10-08 23:19:04', '2024-10-08 23:19:04'),
(21, 'Trousers', 11, '2024-10-08 23:20:28', '2024-10-08 23:20:28'),
(22, 'Jackets', 11, '2024-10-08 23:20:57', '2024-10-08 23:20:57'),
(23, 'Accessories', 1, '2024-10-08 23:21:30', '2024-10-08 23:21:30'),
(24, 'Bags and Backpacks', 23, '2024-10-08 23:21:56', '2024-10-08 23:21:56'),
(25, 'Headwear', 23, '2024-10-08 23:22:04', '2024-10-08 23:22:04'),
(26, 'Socks', 23, '2024-10-08 23:22:10', '2024-10-08 23:22:10'),
(27, 'Lifestyle', 4, '2024-10-08 23:28:11', '2024-10-08 23:28:11'),
(28, 'Jordan', 4, '2024-10-08 23:28:19', '2024-10-08 23:28:19'),
(29, 'Running', 4, '2024-10-08 23:28:27', '2024-10-08 23:28:27'),
(30, 'Training and Gym', 4, '2024-10-08 23:28:38', '2024-10-08 23:28:38'),
(31, 'Football', 4, '2024-10-08 23:28:45', '2024-10-08 23:28:45'),
(32, 'Clothing', 2, '2024-10-08 23:28:55', '2024-10-08 23:28:55'),
(33, 'Tops and T-Shirts', 32, '2024-10-08 23:29:16', '2024-10-08 23:29:16'),
(34, 'Hoodies and Sweatshirts', 32, '2024-10-08 23:29:33', '2024-10-08 23:29:33'),
(35, 'Leggings', 32, '2024-10-08 23:29:41', '2024-10-08 23:29:41'),
(36, 'Shorts', 32, '2024-10-08 23:29:52', '2024-10-08 23:29:52'),
(37, 'Trousers', 32, '2024-10-08 23:30:01', '2024-10-08 23:30:01'),
(38, 'Skirts and Dresses', 32, '2024-10-08 23:30:32', '2024-10-08 23:30:32'),
(39, 'Accessories', 2, '2024-10-08 23:30:51', '2024-10-08 23:30:51'),
(40, 'Bags and Backpacks', 39, '2024-10-08 23:31:02', '2024-10-08 23:31:02'),
(41, 'Headwear', 39, '2024-10-08 23:31:13', '2024-10-08 23:31:13'),
(42, 'Socks', 39, '2024-10-08 23:31:22', '2024-10-08 23:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_25_131615_create_products_table', 1),
(6, '2022_11_07_230054_add_role_to_users_table', 1),
(7, '2022_11_20_125218_create_orders_table', 1),
(8, '2022_11_20_125356_create_order_items_table', 1),
(9, '2022_11_22_010816_create_cart_items_table', 1),
(10, '2022_11_26_021117_create_order_addresses_table', 1),
(11, '2024_09_24_215422_create_categories_table', 1),
(12, '2024_09_25_131955_create_carts_table', 1),
(13, '2024_09_25_171443_update_cart_items_table', 1),
(14, '2024_10_05_182617_update_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_items` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`order_items`)),
  `price` decimal(8,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_addresses`
--

CREATE TABLE `order_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `image`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'quia', 'Qui unde facere fugit cumque occaecati.', '53.00', 'https://placeimg.com/400/520/nature?45', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL),
(2, 'pariatur', 'Eaque natus exercitationem repellat quo id nulla facilis sapiente.', '83.00', 'https://placeimg.com/400/520/nature?2', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL),
(3, 'omnis', 'Dolore delectus est reprehenderit.', '64.00', 'https://placeimg.com/400/520/nature?73', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL),
(4, 'quas', 'Necessitatibus eius quo sed quis velit soluta.', '28.00', 'https://placeimg.com/400/520/nature?45', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL),
(5, 'animi', 'Ipsam deserunt eum animi incidunt quaerat qui.', '88.00', 'https://placeimg.com/400/520/nature?93', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL),
(6, 'quam', 'Officia saepe a quasi nesciunt molestias cupiditate dolorem.', '71.00', 'https://placeimg.com/400/520/nature?35', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL),
(7, 'eos', 'Assumenda molestias possimus qui iusto.', '87.00', 'https://placeimg.com/400/520/nature?33', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL),
(8, 'ad', 'Eveniet nam veritatis commodi.', '11.00', 'https://placeimg.com/400/520/nature?63', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL),
(9, 'quo', 'Cupiditate ratione modi dignissimos modi magni explicabo est.', '92.00', 'https://placeimg.com/400/520/nature?40', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL),
(10, 'accusamus', 'Veniam voluptatem consequuntur voluptatem dolor.', '69.00', 'https://placeimg.com/400/520/nature?24', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL),
(11, 'quasi', 'Aut at tenetur hic sit aut et.', '56.00', 'https://placeimg.com/400/520/nature?13', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL),
(12, 'ad', 'Aspernatur perferendis porro omnis ut nisi.', '54.00', 'https://placeimg.com/400/520/nature?52', '2024-10-07 11:45:35', '2024-10-07 11:45:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Veronica Connelly', 'kaylin96@example.com', '2024-10-07 11:45:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'l5qlh3S8Wk', '2024-10-07 11:45:35', '2024-10-07 11:45:35', 0),
(2, 'Mr. Danial Cummings', 'gideon.johnson@example.org', '2024-10-07 11:45:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RWLqXF9ioA', '2024-10-07 11:45:35', '2024-10-07 11:45:35', 0),
(3, 'Merritt Hermann', 'meghan.jones@example.net', '2024-10-07 11:45:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'P2gI5pa4I0', '2024-10-07 11:45:35', '2024-10-07 11:45:35', 0),
(4, 'Celine Robel', 'kacey.bernhard@example.org', '2024-10-07 11:45:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Z0rQEbf1l4', '2024-10-07 11:45:35', '2024-10-07 11:45:35', 0),
(5, 'Mr. Carmine Zieme', 'liliana.blanda@example.com', '2024-10-07 11:45:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ksKIr48ABj', '2024-10-07 11:45:35', '2024-10-07 11:45:35', 0),
(6, 'Ms. Marguerite Streich Jr.', 'gjerde@example.org', '2024-10-07 11:45:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'b51McEjTpe', '2024-10-07 11:45:35', '2024-10-07 11:45:35', 0),
(7, 'Ramiro Marks', 'stokes.teagan@example.com', '2024-10-07 11:45:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1FfreOl7ez', '2024-10-07 11:45:35', '2024-10-07 11:45:35', 0),
(8, 'Ewell Mann', 'ari93@example.net', '2024-10-07 11:45:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BRAlMF3I82', '2024-10-07 11:45:35', '2024-10-07 11:45:35', 0),
(9, 'Josue Kreiger', 'name66@example.org', '2024-10-07 11:45:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eABbFm5YqX', '2024-10-07 11:45:35', '2024-10-07 11:45:35', 0),
(10, 'Prof. Weldon Herman', 'durward.walsh@example.net', '2024-10-07 11:45:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NaGQkz5mKd', '2024-10-07 11:45:35', '2024-10-07 11:45:35', 0),
(11, 'Admin', 'admin@gmail.com', '2024-10-07 11:45:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dMKphnImvy1rpFi2UKe2soljx0dBWfX2eT6w4Vw0ZYb5e5JISnC8WwgQ18Xb', '2024-10-07 11:45:35', '2024-10-07 11:45:35', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_addresses`
--
ALTER TABLE `order_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_addresses_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_addresses`
--
ALTER TABLE `order_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_addresses`
--
ALTER TABLE `order_addresses`
  ADD CONSTRAINT `order_addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
