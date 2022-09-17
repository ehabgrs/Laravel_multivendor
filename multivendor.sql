-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2022 at 03:10 PM
-- Server version: 8.0.30-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multivendor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ehab', 'h@h.com', '$2y$10$6NGKqLfoFhZsQRwjhwwbfun3HIdPoZtS83.ZxfajI77o3OJ0SwrSW', 1, NULL, '2022-08-29 10:32:30', '2022-08-29 10:32:30'),
(2, 'editor', 'editor@h.com', '$2y$10$nG53R0Rx3Rzb.3JP8.TarOGbI5KlKCb0vpydNNi0lvasDbXA2XwQO', 2, NULL, '2022-09-10 13:34:10', '2022-09-10 13:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `created_at`, `updated_at`) VALUES
(1, '2022-08-31 11:19:54', '2022-08-31 11:19:54'),
(2, '2022-08-31 11:23:58', '2022-08-31 11:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_values`
--

CREATE TABLE `attributes_values` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attribute_translations`
--

CREATE TABLE `attribute_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_translations`
--

INSERT INTO `attribute_translations` (`id`, `attribute_id`, `locale`, `name`) VALUES
(1, 1, 'en', 'COLOR'),
(2, 2, 'en', 'Size');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value_translations`
--

CREATE TABLE `attribute_value_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_value_id` bigint NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `is_active`, `photo`, `created_at`, `updated_at`) VALUES
(1, 0, '0', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(2, 0, '0', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(3, 1, '0', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(4, 0, '0', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(5, 1, '0', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(6, 0, '0', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(7, 1, '0', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(8, 1, '0', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(9, 1, '0', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(10, 1, '0', '2022-08-29 10:32:31', '2022-08-29 10:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `brand_translations`
--

CREATE TABLE `brand_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_translations`
--

INSERT INTO `brand_translations` (`id`, `brand_id`, `locale`, `name`) VALUES
(1, 1, 'en', 'Zita Ernser'),
(2, 2, 'en', 'Adolfo Treutel'),
(3, 3, 'en', 'Colin Crona'),
(4, 4, 'en', 'Miss Anita Lowe'),
(5, 5, 'en', 'Dr. Jerrod Gleichner'),
(6, 6, 'en', 'Edwina Kihn'),
(7, 7, 'en', 'Emilio Zemlak Jr.'),
(8, 8, 'en', 'Kaela Auer'),
(9, 9, 'en', 'Mr. Danny Gusikowski I'),
(10, 10, 'en', 'Anahi Wolf');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, NULL, 'eius-ex-minima-suscipit-tempore-voluptatibus-sapiente', 0, '2022-08-29 10:32:30', '2022-08-29 10:32:30'),
(2, NULL, 'laborum-velit-enim-dolorum-error-dicta-dolor', 1, '2022-08-29 10:32:30', '2022-08-29 10:32:30'),
(3, NULL, 'incidunt-dignissimos-delectus-quia-possimus-tempore-enim', 0, '2022-08-29 10:32:30', '2022-08-29 10:32:30'),
(4, NULL, 'quaerat-soluta-ad-id-ratione-unde', 0, '2022-08-29 10:32:30', '2022-08-29 10:32:30'),
(5, NULL, 'esse-tempora-laborum-accusamus-esse-maxime', 0, '2022-08-29 10:32:30', '2022-08-29 10:32:30'),
(6, 5, 'iure-aut-cupiditate-facilis-ipsam-repellat', 1, '2022-08-29 10:32:30', '2022-08-29 10:32:30'),
(7, 1, 'aut-occaecati-inventore-architecto-eius-laudantium-consequatur', 1, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(8, 3, 'sint-accusamus-quia-esse-est-soluta', 0, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(9, 5, 'necessitatibus-est-sapiente-commodi', 1, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(10, 5, 'quia-dolore-velit-saepe-aliquam-exercitationem', 0, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(11, 4, 'ipsam-ut-officia-et-velit', 0, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(12, 3, 'aliquid-non-voluptatum-blanditiis-id-quis-sunt-sint', 1, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(13, 1, 'inventore-animi-laboriosam-et-quia-iusto-magni-aut-minus', 1, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(14, 4, 'eaque-ullam-quos-fugiat-et-vel-nostrum', 0, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(15, 1, 'qui-ipsum-aspernatur-dolores-minima-unde-quia', 1, '2022-08-29 10:32:31', '2022-08-29 10:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`) VALUES
(1, 1, 'en', 'qui'),
(2, 2, 'en', 'odit'),
(3, 3, 'en', 'officia'),
(4, 4, 'en', 'tempore'),
(5, 5, 'en', 'molestiae'),
(6, 6, 'en', 'numquam'),
(7, 7, 'en', 'qui'),
(8, 8, 'en', 'omnis'),
(9, 9, 'en', 'nam'),
(10, 10, 'en', 'maiores'),
(11, 11, 'en', 'quae'),
(12, 12, 'en', 'sint'),
(13, 13, 'en', 'eos'),
(14, 14, 'en', 'explicabo'),
(15, 15, 'en', 'qui');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_17_073307_create_admins_table', 1),
(6, '2022_08_19_152645_create_settings_table', 1),
(7, '2022_08_19_152927_create_setting_translations_table', 1),
(8, '2022_08_22_101240_create_categories_table', 1),
(9, '2022_08_22_101604_create_category_translations_table', 1),
(10, '2022_08_25_102325_create_brands_table', 1),
(11, '2022_08_25_102538_create_brand_translations_table', 1),
(12, '2022_08_25_111628_add_photo_column_to_brands_table', 1),
(13, '2022_08_27_075900_create_tags_table', 1),
(14, '2022_08_27_082416_create_tag_translations_table', 1),
(15, '2022_08_28_070915_create_products_table', 1),
(16, '2022_08_28_070935_create_product_translations_table', 1),
(17, '2022_08_28_075104_create_product_tags_table', 1),
(18, '2022_08_28_080504_create_product_categories_table', 1),
(19, '2022_08_29_065546_create_product_images_table', 1),
(20, '2022_08_31_102051_create_attributes_table', 2),
(21, '2022_08_31_102522_create_attribute_translations_table', 2),
(22, '2022_08_31_133457_create_attributes_values_table', 3),
(23, '2022_08_31_133638_create_attribute_value_translations_table', 3),
(25, '2022_09_03_083521_add_mobile_column_to_user_table', 4),
(26, '2022_09_04_063842_create_users_mobile_verification_table', 5),
(28, '2022_09_06_084533_create_wishlists_table', 6),
(29, '2022_09_10_013653_create_roles_table', 7);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_id` bigint UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(18,4) UNSIGNED NOT NULL DEFAULT '0.0000',
  `special_price` decimal(18,4) UNSIGNED DEFAULT NULL,
  `special_price_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_price_start` date DEFAULT NULL,
  `special_price_end` date DEFAULT NULL,
  `selling_price` decimal(18,4) UNSIGNED NOT NULL DEFAULT '0.0000',
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manage_stock` tinyint(1) NOT NULL DEFAULT '1',
  `qty` int UNSIGNED NOT NULL DEFAULT '0',
  `views` int UNSIGNED NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `slug`, `price`, `special_price`, `special_price_type`, `special_price_start`, `special_price_end`, `selling_price`, `sku`, `manage_stock`, `qty`, `views`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'labore-ab-quia-numquam-quidem', '320.0000', '200.0000', 'amount', '2022-08-29', '2022-09-07', '833.0000', 'qui', 0, 45, 87, 1, NULL, '2022-08-29 10:32:31', '2022-08-29 14:04:46'),
(2, NULL, 'veritatis-quia-dolor-sunt-omnis', '597.0000', NULL, NULL, NULL, NULL, '53.0000', 'autem', 0, 47, 457, 1, NULL, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(3, NULL, 'possimus-eos-omnis-sequi-consequatur-vero-distinctio', '439.0000', NULL, NULL, NULL, NULL, '76.0000', 'quia', 0, 31, 16, 1, NULL, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(4, NULL, 'ducimus-aut-dolorem-animi-sint', '943.0000', NULL, NULL, NULL, NULL, '558.0000', 'sequi', 0, 1, 666, 1, NULL, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(5, NULL, 'aliquid-beatae-doloribus-at-quibusdam-veniam-minus-ratione', '864.0000', NULL, NULL, NULL, NULL, '399.0000', 'est', 0, 32, 261, 0, NULL, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(6, NULL, 'reiciendis-necessitatibus-et-cupiditate-eos-id-iure-molestiae-facilis', '986.0000', NULL, NULL, NULL, NULL, '943.0000', 'voluptas', 0, 81, 637, 1, NULL, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(7, NULL, 'deleniti-quos-tempora-voluptatem-perspiciatis-vel-facere-maxime', '700.0000', NULL, NULL, NULL, NULL, '204.0000', 'vero', 0, 10, 491, 0, NULL, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(8, NULL, 'quia-et-sed-inventore-ut-nemo-voluptatum-et', '378.0000', NULL, NULL, NULL, NULL, '807.0000', 'iusto', 0, 95, 300, 1, NULL, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(9, NULL, 'iure-commodi-nihil-beatae-quia-deserunt-et', '424.0000', NULL, NULL, NULL, NULL, '946.0000', 'architecto', 0, 65, 629, 0, NULL, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(10, NULL, 'molestiae-doloremque-est-nesciunt-ducimus-dolores-magni', '157.0000', NULL, NULL, NULL, NULL, '371.0000', 'eum', 0, 34, 442, 1, NULL, '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(11, NULL, 'panadol', '5.0000', NULL, NULL, NULL, NULL, '6.9500', NULL, 1, 10, 0, 1, NULL, '2022-08-29 10:32:37', '2022-08-29 10:32:37'),
(12, NULL, 'panadol 500', '4.0000', NULL, NULL, NULL, NULL, '5.2500', NULL, 1, 10, 0, 1, NULL, '2022-08-29 10:35:58', '2022-08-29 10:35:58'),
(13, 7, 'fevadol', '4.0000', NULL, NULL, NULL, NULL, '5.2500', NULL, 1, 10, 0, 1, NULL, '2022-08-29 10:41:33', '2022-08-29 10:41:33'),
(14, 5, 'adol500', '3.0000', NULL, NULL, NULL, NULL, '4.5000', NULL, 1, 10, 0, 1, NULL, '2022-08-29 10:44:29', '2022-08-29 10:44:29'),
(15, 3, 'new-product', '10.0000', NULL, NULL, NULL, NULL, '15.0000', '1241545dfjfgjgf', 1, 5, 0, 1, NULL, '2022-08-30 06:41:04', '2022-08-30 06:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_id`, `category_id`) VALUES
(1, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(14, 3),
(11, 8),
(11, 9);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 9, 'PuiDi04qzAV5ZfbRYSZFjUQ6nXtqN2hrX3zLAw3p.jpg', '2022-08-31 10:03:48', '2022-08-31 10:03:48'),
(2, 9, 'Lu2yY8s2WprrC2atLfplMAoKPRq28mMvwg9JICbq.jpg', '2022-08-31 10:03:48', '2022-08-31 10:03:48'),
(3, 9, 'NUWaemxQtGEmshgFXDXuU6CrESpV9vgN3vcOyFjI.jpg', '2022-08-31 10:08:52', '2022-08-31 10:08:52'),
(4, 9, 'MHQICmIUAWfojzOSXi3Zjop4Y7mwkjJQnZ227grr.jpg', '2022-08-31 10:08:52', '2022-08-31 10:08:52'),
(5, 1, 'hFGxCI2JVELjonYa5DJasCd0ljn6xGIC1x1rTzwd.jpg', '2022-09-06 05:59:51', '2022-09-06 05:59:51'),
(6, 1, 'j6RTBVMx705nvj6bSdFmteuNEHSPtD17Lo9GPxfH.jpg', '2022-09-06 05:59:51', '2022-09-06 05:59:51'),
(7, 1, 'vvHnZdIOAejWjMnSOv6d4N4tETJreXDFX1rZIhUL.jpg', '2022-09-06 05:59:51', '2022-09-06 05:59:51'),
(8, 1, 'm7Mdm455GNzH6VtzNiiwcpFmO66SoloddtmKem6W.jpg', '2022-09-06 05:59:51', '2022-09-06 05:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `product_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`product_id`, `tag_id`) VALUES
(11, 4),
(12, 4),
(14, 4),
(15, 4),
(14, 7),
(12, 9),
(13, 9),
(11, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `locale`, `name`, `description`, `short_description`) VALUES
(1, 1, 'en', 'Mr. Tod Dooley Sr.', 'Nemo et temporibus magnam. Similique velit quae et ullam dolorem voluptas tempora. Sit laudantium ut exercitationem iure optio molestias.', NULL),
(2, 2, 'en', 'Mr. Haley Kilback I', 'Optio aliquam labore nihil. Hic sint numquam nam officia vel explicabo sunt. Expedita qui autem quia rerum sapiente omnis et.', NULL),
(3, 3, 'en', 'Dr. Buddy Herman', 'Quae nisi hic enim molestiae ut cum possimus. Voluptate dolor in rem nulla incidunt atque. Amet aut id vel nisi vitae porro. Sint distinctio harum et sunt.', NULL),
(4, 4, 'en', 'Dr. Louisa Gleichner', 'Reprehenderit quaerat sit et. Consequatur perferendis dolores eius ut dignissimos ut. Sint amet accusantium amet sint. Nemo veritatis aperiam corporis sunt.', NULL),
(5, 5, 'en', 'Adele Kassulke', 'Reiciendis reprehenderit quidem nihil laborum officia quo quia. Provident nemo magnam ut eius. Sit rerum adipisci voluptas fuga aut praesentium reiciendis. Numquam perferendis itaque id ratione voluptatem perferendis.', NULL),
(6, 6, 'en', 'Dr. Emelie Cassin PhD', 'Repellendus aut iure et repudiandae rerum aliquid eaque. Eligendi nesciunt dolorem autem tempora quidem.', NULL),
(7, 7, 'en', 'Mrs. Fabiola Casper', 'Atque sunt rerum officia odio ab est molestiae nam. Nihil iusto qui accusantium ullam reiciendis voluptas. Ut laudantium sed optio veritatis repellat sunt assumenda illum.', NULL),
(8, 8, 'en', 'Emma Medhurst', 'Illum cum voluptas consequatur odio quo quo rem. Consequatur non explicabo et voluptatem. Nostrum et unde consequuntur.', NULL),
(9, 9, 'en', 'Quincy Beatty', 'Tempora error dicta eos facilis. Fuga accusamus quis voluptatum similique autem. Voluptas voluptas laborum sunt magnam sed. Suscipit est quo architecto minima dolor suscipit.', NULL),
(10, 10, 'en', 'Gay Swift', 'Ex officiis dolor sed et maxime quam. Eum et aspernatur labore nisi est ut id. Ea illum porro ipsam qui eum minima. Iste quia non fuga voluptate dolorem aliquid explicabo sapiente.', NULL),
(11, 11, 'en', 'panadol', 'PAIN KILLER', 'PAIN KILLER'),
(12, 12, 'en', 'panadol 500', 'PAIN KILLER', 'PAIN KILLER'),
(13, 13, 'en', 'panadol 500', 'PAIN KILLER', 'PAIN KILLER'),
(14, 14, 'en', 'adol500', 'PAIN KILLER', 'PAIN KILLER'),
(15, 15, 'en', 'new product', 'product for test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`) VALUES
(1, 'Admin', '[\"products\", \"tags\", \"categories\", \"brands\", \"options\", \"users\"]'),
(2, 'editor', '[\"products\", \"tags\", \"brands\"]');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_translatable` tinyint(1) NOT NULL DEFAULT '0',
  `plain_value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `is_translatable`, `plain_value`, `created_at`, `updated_at`) VALUES
(1, 'default_local', 0, 'ar', '2022-08-29 10:32:30', '2022-08-29 10:32:30'),
(2, 'default_timezone', 0, 'Africa/Cairo', '2022-08-29 10:32:30', '2022-08-29 10:32:30'),
(3, 'store_name', 1, NULL, '2022-08-29 10:32:30', '2022-08-29 10:32:30'),
(4, 'free_shipping', 1, NULL, '2022-08-29 10:32:30', '2022-08-29 10:32:30'),
(5, 'local_shipping', 1, NULL, '2022-08-29 10:32:30', '2022-08-29 10:32:30');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `setting_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `value`) VALUES
(1, 3, 'en', 'My store'),
(2, 4, 'en', 'Free shipping'),
(3, 5, 'en', 'Local shipping');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'aut-rerum-quam-perspiciatis-debitis-deserunt', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(2, 'quo-non-quibusdam-ut-deserunt-enim-rerum', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(3, 'quod-ipsam-qui-officiis-fuga', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(4, 'aut-qui-fugit-quia-atque-incidunt', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(5, 'reiciendis-sed-incidunt-corrupti', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(6, 'sed-consequatur-tenetur-eligendi-omnis-aliquid', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(7, 'aliquid-accusantium-in-sunt-et-ea', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(8, 'sequi-sed-saepe-ducimus-et-quia-exercitationem', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(9, 'officiis-culpa-quo-aut-quam', '2022-08-29 10:32:31', '2022-08-29 10:32:31'),
(10, 'tempore-ratione-accusantium-et-eaque-adipisci', '2022-08-29 10:32:31', '2022-08-29 10:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `tag_translations`
--

CREATE TABLE `tag_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_translations`
--

INSERT INTO `tag_translations` (`id`, `tag_id`, `locale`, `name`) VALUES
(1, 1, 'en', 'Trinity Hane IV'),
(2, 2, 'en', 'Prof. Sydni Abshire'),
(3, 3, 'en', 'Emory Sipes'),
(4, 4, 'en', 'Rex O\'Keefe'),
(5, 5, 'en', 'Samir Lubowitz'),
(6, 6, 'en', 'Rosario Larkin'),
(7, 7, 'en', 'Ettie Batz'),
(8, 8, 'en', 'Gay Ziemann'),
(9, 9, 'en', 'Eulalia Dare'),
(10, 10, 'en', 'Giovani McLaughlin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ehab', 'front@h.com', '0123456789', NULL, '$2y$10$Lct0yS3BjDDEdvFxJAtLoecxiT2ZDdGpFnJXaa.mNPYp1cQXD.f0K', 'rwNk85gePIojEf6DBxqhiIJcKFGI2mfgXFmz5eqMZuiK7JQnVNtsYTBzl6D2', '2022-09-02 14:56:16', '2022-09-02 14:56:16'),
(9, 'code test', 'h@h.com', '012345678910', '2022-09-04 14:07:36', '$2y$10$s2Ne022nxyqP8HC0WFyuJ.25fw2MT4GHKL2SSnjQGcXyCpGS/r/Ze', NULL, '2022-09-04 13:31:59', '2022-09-04 14:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `users_mobile_verification`
--

CREATE TABLE `users_mobile_verification` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-09-06 12:47:51', '2022-09-06 12:47:51');

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
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes_values`
--
ALTER TABLE `attributes_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_translations_attribute_id_locale_unique` (`attribute_id`,`locale`);

--
-- Indexes for table `attribute_value_translations`
--
ALTER TABLE `attribute_value_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attribute_value_translations_attribute_value_id_locale_unique` (`attribute_value_id`,`locale`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locale` (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`);

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
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD UNIQUE KEY `product_tags_product_id_tag_id_unique` (`product_id`,`tag_id`),
  ADD KEY `product_tags_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting_translations_setting_id_foreign` (`setting_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_translations_tag_id_locale_unique` (`tag_id`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_mobile_index` (`mobile`);

--
-- Indexes for table `users_mobile_verification`
--
ALTER TABLE `users_mobile_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attributes_values`
--
ALTER TABLE `attributes_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_value_translations`
--
ALTER TABLE `attribute_value_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_mobile_verification`
--
ALTER TABLE `users_mobile_verification`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_tags_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD CONSTRAINT `tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
