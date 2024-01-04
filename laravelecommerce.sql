-- -------------------------------------------------------------
-- TablePlus 5.6.6(520)
--
-- https://tableplus.com/
--
-- Database: laravelecommerce
-- Generation Time: 2024-01-04 10:34:32.0630
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `para` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_desc` mediumtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `selling_price` int NOT NULL,
  `quantity` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '1= hidden , 0= visible',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;;

INSERT INTO `banners` (`id`, `image`, `heading`, `para`, `status`, `created_at`, `updated_at`) VALUES
(1, 'banners/December2023/1703656350.jpg', 'best place to shop', 'welcome to our store', 1, '2023-12-27 05:52:31', '2023-12-27 05:52:31'),
(2, 'banners/December2023/1703656398.jpg', 'select the best collections', 'choose your best', 1, '2023-12-27 05:53:18', '2023-12-27 05:53:18');

INSERT INTO `categories` (`id`, `name`, `image`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Men\'s Clothing', 'categories/December2023/1703054931.jpg', 'get best clothes for mens', 1, '2023-12-14 10:46:42', '2023-12-20 06:48:51'),
(4, 'Women\'s Clothing', 'categories/December2023/1703054939.jpg', 'get best clothes for  womens', 1, '2023-12-14 10:47:04', '2023-12-20 06:48:59'),
(5, 'Kid\'s Clothes', 'categories/December2023/1703054947.jpg', 'get best clothes for kids', 1, '2023-12-14 10:47:23', '2023-12-20 06:49:07'),
(6, 'Accessories', 'categories/December2023/1703054955.jpg', 'get best quality Accesories heree', 1, '2023-12-14 10:47:45', '2023-12-20 06:49:26'),
(7, 'Bags', 'categories/December2023/1703054978.jpg', 'best bags', 1, '2023-12-20 06:49:38', '2023-12-20 06:49:38'),
(8, 'Shoes', 'categories/December2023/1703054991.jpg', 'best Shoes', 1, '2023-12-20 06:49:51', '2023-12-20 06:49:51');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_11_102510_create_categories_table', 1),
(6, '2023_12_14_051624_create_products_table', 1),
(7, '2023_12_14_102302_add_role_to_users_table', 2),
(8, '2023_12_15_051529_create_orders_table', 3),
(10, '2023_12_18_051937_create_banners_table', 4),
(11, '2023_12_22_100859_create_colors_table', 5),
(12, '2023_12_22_101512_create_sizes_table', 6),
(13, '2023_12_25_053059_add_color_to_products_table', 7);

INSERT INTO `products` (`id`, `category_id`, `name`, `image`, `small_desc`, `description`, `selling_price`, `quantity`, `status`, `created_at`, `updated_at`, `slug`, `color`, `size`) VALUES
(6, 4, 'One piece', 'products/December2023/1703137032.jpg', NULL, 'best clothesbest clothesbest clothes', 400, 11, 1, '2023-12-21 05:37:12', '2023-12-25 05:53:29', 'One piece', 'White', 'M'),
(7, 3, 'Shirt', 'products/December2023/1703137061.jpg', NULL, 'best clothes', 350, 11, 1, '2023-12-21 05:37:41', '2023-12-25 05:55:41', 'Shirt', 'Black', 'L'),
(8, 5, 'Shirt', 'products/December2023/1703137083.jpg', NULL, 'best clothes', 300, 11, 1, '2023-12-21 05:38:03', '2023-12-25 05:55:53', 'Shirt', 'Blue', 'XS'),
(9, 4, 'One piece', 'products/December2023/1703137105.jpg', NULL, 'best clothes', 250, 11, 1, '2023-12-21 05:38:25', '2023-12-25 05:56:01', 'One piece', 'Black', 'S'),
(10, 5, 'Jeans Top', 'products/December2023/1703137141.jpg', NULL, 'best Clothes', 200, 12, 1, '2023-12-21 05:39:01', '2023-12-25 05:56:09', 'Jeans Top', 'White', 'XS'),
(11, 3, 'Suit', 'products/December2023/1703137171.jpg', NULL, 'best clothe', 150, 11, 1, '2023-12-21 05:39:31', '2023-12-25 05:56:41', 'Suit', 'White', 'L'),
(12, 4, 'Long shrug', 'products/December2023/1703137196.jpg', NULL, 'best clothe', 111, 100, 1, '2023-12-21 05:39:56', '2023-12-25 05:56:57', 'Long shrug', 'Green', 'L'),
(13, 5, 'Shirt', 'products/December2023/1703137221.jpg', NULL, 'best clothe', 50, 11, 1, '2023-12-21 05:40:21', '2023-12-25 05:56:23', 'Shirt', 'Blue', 'M');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(2, 'latika', 'latika123@gmail.com', NULL, '$2y$10$pE/tL/pxMc3Ht6SoTJG6jOZ.1x9tTQWnuJlSKLSZOuohpeY5bg1f2', NULL, '2023-12-14 10:45:58', '2023-12-14 10:45:58', 1),
(3, 'latika', 'latika@gmail.com', NULL, '$2y$10$j4QAKKGIgaz2TcJcVet0Se24qdP9L1bqovrzuKmwbKSsN6jcGOhx2', 'BktD8p45YszfdDAGLK3DR0Ip13hmzp2OaxxXMlsjlhhhD2EGL4yISNjCM0HO', '2023-12-14 11:05:33', '2023-12-14 11:05:33', 1),
(5, 'nichu', 'nichu00@gmail.com', NULL, '$2y$10$yFANkaC5aXG4OQCq5kh4O.vROw5GRP.K3GznZfhtSqAys0f3BgLyC', NULL, '2023-12-16 06:36:48', '2023-12-16 06:36:48', 1),
(6, 'test', 'test@gmail.com', NULL, '$2y$10$83sZ5SbstGJK4CgbO8q/DOP4xyxL2d54LK5rXYUZdTP38jRWyubf2', 'PqlsTiqi7cS6L5Zn4Y2unJtabpufqamU67CdiwS5shi2hPyQaVj7DdQo7vwU', '2023-12-16 06:41:39', '2023-12-16 06:41:39', 0),
(7, 'nishu', 'nishu@gmail.com', NULL, '$2y$10$H5.O7ybHDvYnVDWVlc1yAuvGwqNVIoTrglPQjvdJpT/pJQl8F56TK', NULL, '2023-12-16 09:30:18', '2023-12-16 09:30:18', 0),
(8, 'ayushi', 'ayushi@gmail.com', NULL, '$2y$10$cAqZv0cjRyXmUkloov1UK.cLc/IymLTpOAD.QGcFQVw5VEDlGvPYS', NULL, '2023-12-18 09:46:54', '2023-12-18 10:00:59', 0),
(9, 'qwerty', 'qwertyyy@gmail.com', NULL, '$2y$10$YuVGKrS1al4O6vTAhnpTdudnYgbOU5MqMkL5yn2iCnLFuTyAV6lmK', NULL, '2023-12-18 10:03:47', '2023-12-18 10:03:47', 0),
(10, 'latika', 'latika99@gmail.com', NULL, '$2y$10$krbEPkPxWzFlgCNlig.AbuCglH3yEzBy0NdiZX/.a.SSEJuSVtRma', NULL, '2023-12-19 05:48:16', '2023-12-19 05:48:16', 0);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;