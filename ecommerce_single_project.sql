-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 08, 2023 at 04:30 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_single_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'ipsam in', 'ipsam-in', '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(2, 'et qui', 'et-qui', '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(3, 'eaque qui', 'eaque-qui', '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(4, 'qui aut', 'qui-aut', '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(5, 'est dolor', 'est-dolor', '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(6, 'voluptatem sunt', 'voluptatem-sunt', '2023-06-25 10:44:06', '2023-06-25 10:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `comment`, `created_at`, `updated_at`) VALUES
(2, 'nazmul hasan', 'nazmul115@gmail.com', '016791425', 'product is very beautiful', '2023-07-03 21:47:52', '2023-07-03 21:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(8,2) NOT NULL,
  `cart_value` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT '2023-06-26',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `cart_value`, `created_at`, `updated_at`, `expiry_date`) VALUES
(4, 'offer100', 'fixed', '50.00', '100.00', '2023-06-26 06:36:44', '2023-06-26 07:53:47', '2023-06-29'),
(2, 'per', 'percent', '10.00', '2000.00', '2023-06-26 03:42:38', '2023-06-26 07:33:30', '2023-06-26'),
(3, 'date', 'fixed', '100.00', '500.00', '2023-06-26 04:34:57', '2023-06-26 06:30:24', '2023-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_categories`
--

DROP TABLE IF EXISTS `home_categories`;
CREATE TABLE IF NOT EXISTS `home_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sel_categories` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `sel_categories`, `no_of_product`, `created_at`, `updated_at`) VALUES
(1, '1,2,3,4,5', 8, '2022-07-21 10:07:59', '2023-06-26 03:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

DROP TABLE IF EXISTS `home_sliders`;
CREATE TABLE IF NOT EXISTS `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `subtitle`, `price`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dfdf', 'dfdf', '500', '#', '1687712016.jpg', 1, '2023-06-25 10:53:36', '2023-06-25 10:53:36'),
(2, 'fgfg', 'fgfg', '200', '#', '1687712078.jpg', 1, '2023-06-25 10:54:38', '2023-06-25 10:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_06_14_104831_create_sessions_table', 1),
(7, '2023_06_15_090738_create_categories_table', 1),
(8, '2023_06_15_090856_create_products_table', 1),
(9, '2023_06_21_055252_create_home_sliders_table', 1),
(10, '2023_06_21_143946_create_home_categories_table', 1),
(11, '2023_06_22_025220_create_sales_table', 1),
(12, '2023_06_23_162047_create_coupons_table', 1),
(13, '2023_06_25_161924_add_expiry_date_coupon_table', 2),
(14, '2023_06_26_144325_create_orders_table', 3),
(15, '2023_06_26_144737_create_order_items_table', 3),
(16, '2023_06_26_144819_create_shippings_table', 3),
(17, '2023_06_26_145008_create_transactions_table', 3),
(18, '2023_07_01_125612_add_delivered_canceled_date_to_orders_table', 4),
(19, '2023_07_02_042407_create_reviews_table', 5),
(20, '2023_07_02_043239_add_rstatus_to_order_items_tabel', 6),
(21, '2023_07_04_031907_create_contacts_table', 7),
(22, '2023_07_04_041856_create_settings_table', 8),
(23, '2023_07_05_131440_create_subcategories_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ordered','delivered','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivered_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `subtotal`, `discount`, `tax`, `total`, `firstname`, `lastname`, `email`, `phone`, `add1`, `add2`, `city`, `country`, `postcode`, `status`, `is_shipping_different`, `created_at`, `updated_at`, `delivered_date`, `canceled_date`) VALUES
(2, 1, '408.00', '0.00', '85.68', '493.68', 'vvvv', 'vvvv', 'murzeniyde@biyac.com', '01900000000', 'sherput jala sherpur', 'nmnmn', 'Sherpur', 'Bangladesh', '2100', 'delivered', 1, '2023-06-30 04:23:07', '2023-07-01 07:52:37', '2023-07-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quentity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rstatus` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_order_id_foreign` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quentity`, `created_at`, `updated_at`, `rstatus`) VALUES
(3, 12, 2, '12.00', 1, '2023-06-30 04:23:07', '2023-06-30 04:23:07', 0),
(4, 13, 2, '396.00', 1, '2023-06-30 04:23:07', '2023-07-02 00:07:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('nazmulhossen115@gmail.com', '$2y$10$rBLHLPO8Ak/QZQ.WUEOSZOVZkB0YhCRqvvQe3MWURrJiH.MY.Se3i', '2023-07-04 06:38:42'),
('nazmulhossen022@gmail.com', '$2y$10$1nrMZuXm4JEzmy8p530oM.FhhQsainweWKKhrQmiyAa3IlxE86lXG', '2023-07-04 06:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` decimal(8,2) NOT NULL,
  `sale_price` decimal(8,2) DEFAULT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` enum('instock','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT '10',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `sort_description`, `long_description`, `regular_price`, `sale_price`, `sku`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'fggfg', 'fggfg', 'gfgfg', 'fgfgfg', '120.00', '120.00', '1230-l', 'instock', 0, 10, 'k.jpg', NULL, 1, '2023-06-24 18:00:00', '2023-06-24 18:00:00'),
(2, 'aperiam molestiae et occaecati', 'aperiam-molestiae-et-occaecati', 'Illo voluptatem sint qui iure dicta. Voluptatibus quibusdam explicabo et eveniet molestiae itaque culpa. Consectetur facilis non dolorem. Sit rerum quod eaque deserunt.', 'Hic voluptatibus voluptas vel eaque quam quod. Quisquam rem est qui soluta repellendus. Qui ut aliquid amet odit temporibus doloribus autem. Facere repellat possimus qui ea quos. Dicta non corporis ut aut. Quibusdam error sunt nostrum modi nulla et qui. Natus doloremque velit facere et omnis atque enim. Ullam aut et enim ut facilis. Unde minus sapiente sed. Necessitatibus eius a itaque sit aliquid minus.', '440.00', '353.00', 'DIGI280', 'instock', 0, 181, 'digital_19.jpg', NULL, 4, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(3, 'beatae officiis quis aut', 'beatae-officiis-quis-aut', 'Distinctio porro qui omnis numquam tenetur. Modi dolores quos dolores ut est ut. Unde quam dolore nulla voluptas unde. Quod qui suscipit iusto mollitia. Placeat qui iure et quibusdam.', 'Distinctio nemo quo iusto iure. Non consequuntur odit animi voluptates nobis necessitatibus. Ipsum omnis voluptas omnis. Dolore dolor quia libero quis dolores ut ut. Facilis in ex aut maiores nam. Delectus cumque sit qui itaque consequuntur et ipsam. Dolorem nihil qui et dolores. Mollitia vero molestiae provident quae. Est natus corporis temporibus corporis. Quod atque dolorem veritatis magni. Maxime earum iusto blanditiis ea optio non doloremque quia. Laborum hic velit incidunt in molestias.', '267.00', '275.00', 'DIGI284', 'instock', 0, 155, 'digital_16.jpg', NULL, 3, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(4, 'consequatur explicabo neque veniam', 'consequatur-explicabo-neque-veniam', 'Quo adipisci a nisi fuga maiores. Et velit esse distinctio non quia. Est consequatur qui officiis mollitia quas ipsam. Necessitatibus culpa eos aperiam ipsam deleniti impedit.', 'Corrupti repellat totam non rerum. Cupiditate reiciendis inventore incidunt omnis ut et totam in. Reprehenderit quas aut id deleniti reiciendis omnis. Tempore sint voluptates quasi sed. Quisquam ad corrupti aliquid sed culpa ex esse. Magnam laborum doloremque nostrum deserunt deserunt. Dolorem libero est est doloribus nisi. Eos velit voluptatem ex doloribus consequatur qui sed. Non porro quisquam odit rerum. Et amet explicabo consequatur doloribus. Odit eaque nostrum tempore nisi.', '48.00', '331.00', 'DIGI169', 'instock', 0, 166, 'digital_2.jpg', NULL, 2, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(5, 'sed voluptas labore est', 'sed-voluptas-labore-est', 'Iusto suscipit hic voluptatibus natus. Voluptas aut quis corrupti minima tempora sequi. Voluptatibus eius rem id aut id in. Quo cum sit quia saepe corporis quibusdam.', 'Sunt accusamus eos et ab. Sit perferendis non non sed hic. Voluptas culpa facere vel. Earum vel voluptas impedit occaecati culpa cupiditate aut. Iusto ipsam explicabo veritatis deleniti a non voluptas. Odit et a dolores magni recusandae. Debitis aliquid modi repellat in a non perferendis. Praesentium dolores eveniet libero maxime esse delectus voluptas et. Quidem quam magni omnis quasi sint. Doloremque praesentium voluptatem consectetur nulla ipsa.', '271.00', '309.00', 'DIGI113', 'instock', 0, 175, 'digital_13.jpg', NULL, 3, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(6, 'placeat praesentium quam fugit', 'placeat-praesentium-quam-fugit', 'Eos illum veniam neque dolores suscipit a quasi natus. Quo necessitatibus beatae reprehenderit corporis qui. Provident occaecati amet nostrum in nemo. Hic dolore natus magni.', 'Omnis voluptatem dolore sint distinctio laborum nam. Beatae porro dolores quasi autem recusandae sunt esse. Optio nulla maxime qui. Voluptates placeat quis nesciunt sed iure tenetur totam. Id fuga necessitatibus illum omnis totam doloremque. Esse a minus qui. Reiciendis consequatur eum quia voluptate aut omnis.', '391.00', '473.00', 'DIGI379', 'instock', 0, 123, 'digital_3.jpg', NULL, 1, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(7, 'voluptate impedit maiores voluptas', 'voluptate-impedit-maiores-voluptas', 'Sit voluptates et deleniti dolorem laudantium. Magnam et ut tempora voluptatem ut vel praesentium. Enim omnis harum qui quia sint deleniti. Nesciunt tenetur ea est amet.', 'Voluptatem odit quia ad sed. Quia praesentium mollitia distinctio dolorem fugiat. Enim quas nam corporis commodi cum dolores ab. Eius ut rerum maiores sit molestiae. Molestiae fuga asperiores fugiat voluptatem natus beatae. Explicabo consequatur quo tenetur. Consequatur ex incidunt enim. Qui omnis dolor nam asperiores quis placeat.', '283.00', '409.00', 'DIGI354', 'instock', 0, 126, 'digital_20.jpg', NULL, 2, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(8, 'est quibusdam maxime velit', 'est-quibusdam-maxime-velit', 'Mollitia voluptas voluptatem in tempora dolorem itaque culpa. Est aspernatur dolore et. Ut dicta cupiditate deserunt dolorem ut. Non et ipsa iusto dignissimos nemo.', 'Quia reiciendis et nostrum aut fugit. Ducimus mollitia et tempora totam deserunt. Quasi blanditiis ipsum deserunt iusto et eaque. Id dolores sit alias alias aut sint. Quod ullam qui quos. Dignissimos illo fugit ratione alias voluptate. Dignissimos quo sint a sunt deleniti harum laborum. Nobis repellat dolores similique vel consectetur deleniti eaque. Eum enim in vel fugiat accusamus dicta saepe. Et autem omnis quo minima.', '239.00', '118.00', 'DIGI309', 'instock', 0, 118, 'digital_5.jpg', NULL, 5, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(9, 'enim error et sequi', 'enim-error-et-sequi', 'Laborum laboriosam autem aut deleniti quasi debitis animi. Impedit perspiciatis illum explicabo voluptatem suscipit. Magni sit quia adipisci magni est nihil.', 'Ut repudiandae sint repellat impedit omnis non magnam consequuntur. Laudantium molestiae officiis impedit quis omnis laboriosam. Error ut ea quos unde velit nobis sit. Porro nam eius excepturi vero. Nobis cum eos quasi aut totam cumque. Illum eligendi nemo officiis nulla odit at. Explicabo eveniet aut occaecati nihil consectetur iste. Distinctio iste doloribus ut eveniet amet. Molestiae neque occaecati et enim totam dignissimos. Nesciunt maxime nihil et neque.', '125.00', '44.00', 'DIGI162', 'instock', 0, 120, 'digital_21.jpg', NULL, 1, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(10, 'beatae qui dolorem provident', 'beatae-qui-dolorem-provident', 'Nulla quasi aut sed aut cupiditate ipsa eligendi. Eos praesentium enim deleniti sed impedit. Consequatur inventore sit quas nulla.', 'Ducimus consectetur temporibus assumenda consectetur voluptas repellat. Tempore suscipit natus non dolorem nemo enim. Quasi aut pariatur sit quis. Exercitationem cum consectetur eum ratione est aut et. Est voluptas eveniet repellendus corrupti quasi necessitatibus id. Facilis assumenda doloribus nemo nesciunt temporibus incidunt commodi. Odio neque rerum incidunt ut iusto iusto ullam libero.', '403.00', '399.00', 'DIGI191', 'instock', 0, 147, 'digital_17.jpg', NULL, 5, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(11, 'et animi sequi nulla', 'et-animi-sequi-nulla', 'Qui magni eaque neque consequatur omnis officia. Distinctio sint doloremque amet officiis.', 'Accusantium cum quisquam eos voluptates. Qui aut dicta velit molestiae eius. Nihil eaque sint in dicta soluta harum blanditiis. Impedit excepturi eius qui est deleniti facilis magnam. Velit ad sint autem dignissimos sit aperiam. Dolorem provident facere provident recusandae. Repellendus magni quia veniam illum modi et et. Deleniti tempore quae quo. Aut occaecati tempore ratione.', '153.00', '128.00', 'DIGI269', 'instock', 0, 137, 'digital_15.jpg', NULL, 4, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(12, 'dolore pariatur magni quo', 'dolore-pariatur-magni-quo', 'Impedit excepturi omnis ea esse eum harum soluta. Expedita error modi ab unde. Dolores sunt repudiandae voluptatem aliquam. Excepturi excepturi et deleniti qui et.', 'Consequuntur est fugiat voluptatem et quis. Ut quae minus vitae animi laborum a. Quos sequi voluptatem occaecati aperiam alias id. Quia a qui neque perferendis cumque quidem fugit. Animi aspernatur delectus quaerat sit quis. Nemo dolorem corporis eos magni vero dolorem saepe. Asperiores esse nemo qui. Quibusdam voluptatem atque hic.', '358.00', '12.00', 'DIGI432', 'instock', 0, 126, 'digital_8.jpg', NULL, 1, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(13, 'dolor velit sunt suscipit', 'dolor-velit-sunt-suscipit', 'Quos sapiente et eius itaque sit eum. Reiciendis quam id dolorum aut accusantium. Et assumenda porro excepturi reprehenderit non debitis cum.', 'Qui minima culpa qui dicta. Nihil nemo natus beatae voluptatem. Vero tenetur quis eligendi repellat ut enim officiis corrupti. Unde possimus in enim veritatis. Sit cum corrupti aut sint distinctio tempore iste. Voluptas temporibus vel sunt consequatur. Corporis dolorum omnis maiores. Ut dolorem repellat similique. Ullam rerum accusamus non pariatur.', '191.00', '396.00', 'DIGI459', 'instock', 0, 191, 'digital_12.jpg', NULL, 4, '2023-06-25 10:44:06', '2023-06-25 10:44:06'),
(14, 'aliquam, urna cubilia class conubia torquent', 'aliquam,-urna-cubilia-class-conubia-torquent', ' class donec mus praesent aptent pharetra, dictumst posuere taciti ut maecenas nisi, a viverra metus ', 'ttis nec aliquet sollicitudin vulputate aenean sodales per non fringilla. Sociosqu convallis congue facilisi senectus euismod ligula tincidunt velit, potenti turpis urna magna per duis mollis conubia, leo lacus erat iaculis hendrerit morbi nec. Nunc vehicula condimentum himenaeos potenti fames vivamus cursus et, habitasse ridiculus faucibus eget integer pharetra cubilia etiam nisl, enim mus tellus ac bibendum porta luctus.', '500.00', '450.00', 'sk-2501', 'instock', 0, 50, '1688471879.jpg', ',16885350720.jpg,16885350721.jpg,16885350722.jpg', 2, '2023-07-04 05:58:00', '2023-07-04 23:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_order_item_id_foreign` (`order_item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `comment`, `order_item_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'Nice product for home.', 4, '2023-07-02 00:06:30', '2023-07-02 00:06:30'),
(3, 3, 'Nice product ', 4, '2023-07-02 00:07:06', '2023-07-02 00:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sale_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023-06-29 08:33:59', 1, '2023-06-24 18:00:00', '2023-06-26 07:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('UnIilTa4TguxKJb4UloygRtf5JuBwRhlvN8wuWEC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNVRyUndqTzJhS2ltemthYk0wZldyVndIcTFLUHp5YXdUTEVLR1FxVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1688624866);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` varchar(800) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twiter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagarm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `phone2`, `address`, `map`, `twiter`, `facebook`, `pinterest`, `instagarm`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'nazmulhossen022@gmail.com', '01924691725', '', 'sherpur, dhaka-1212', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.7905227040133!2d90.03201117602319!3d25.075088136634605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3757d79e8c3a9c55%3A0x62a9e3f9526f86c6!2sBazitkhila%20Union%20Parishad!5e0!3m2!1sen!2sbd!4v1688470118289!5m2!1sen!2sbd', '#', '#', '#', '#', '#', NULL, '2023-07-04 05:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
CREATE TABLE IF NOT EXISTS `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `add2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shippings_order_id_foreign` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `firstname`, `lastname`, `email`, `phone`, `add1`, `add2`, `city`, `country`, `postcode`, `created_at`, `updated_at`) VALUES
(2, 2, 'vvvv', 'vvvv', 'murzeniyde@biyac.com', '01924691725', 'sherpur thana sherpur', 'mmn', 'Sherpur', 'Bangladesh', '2100', '2023-06-30 04:23:07', '2023-06-30 04:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

DROP TABLE IF EXISTS `shoppingcart`;
CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategories_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'tv', 'tv', 2, '2023-07-05 08:40:29', '2023-07-05 08:40:29'),
(4, 'fan', 'fan', 3, '2023-07-05 08:40:37', '2023-07-05 08:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('code','cart','paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','declined','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_foreign` (`user_id`),
  KEY `transactions_order_id_foreign` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'code', 'pending', '2023-06-30 04:23:07', '2023-06-30 04:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM for Admin and USR for User or Customer',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`) VALUES
(1, 'nazmul', 'nazmulhossen022@gmail.com', NULL, '$2y$10$JxV4R9jWJSrq6KidnRpG3OgpuVTpvBF70s0DYTQphOrUYC9niMezC', NULL, NULL, NULL, NULL, NULL, NULL, 'ADM', '2023-06-25 10:41:39', '2023-06-25 10:41:39'),
(2, 'nazmulhossen115@gmail.com', 'nazmulhossen115@gmail.com', NULL, '$2y$10$03mrDN3n8x3uJyZq7U0Z3OrJ0.GQ475EnBYfGqsDVF1yrcSSv2OC2', NULL, NULL, NULL, NULL, NULL, NULL, 'USR', '2023-06-30 21:44:48', '2023-07-03 08:56:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
