-- -------------------------------------------------------------
-- TablePlus 6.4.2(600)
--
-- https://tableplus.com/
--
-- Database: laravel_role
-- Generation Time: 2025-03-26 11:10:12.8910
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_24_184706_create_permission_tables', 1);

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'web', 'dashboard', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(2, 'dashboard.edit', 'web', 'dashboard', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(3, 'blog.create', 'web', 'blog', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(4, 'blog.view', 'web', 'blog', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(5, 'blog.edit', 'web', 'blog', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(6, 'blog.delete', 'web', 'blog', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(7, 'blog.approve', 'web', 'blog', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(8, 'user.create', 'web', 'user', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(9, 'user.view', 'web', 'user', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(10, 'user.edit', 'web', 'user', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(11, 'user.delete', 'web', 'user', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(12, 'user.approve', 'web', 'user', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(13, 'role.create', 'web', 'role', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(14, 'role.view', 'web', 'role', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(15, 'role.edit', 'web', 'role', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(16, 'role.delete', 'web', 'role', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(17, 'role.approve', 'web', 'role', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(18, 'profile.view', 'web', 'profile', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(19, 'profile.edit', 'web', 'profile', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(20, 'profile.delete', 'web', 'profile', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(21, 'profile.update', 'web', 'profile', '2025-03-26 05:09:39', '2025-03-26 05:09:39');

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 2);

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2025-03-26 05:09:39', '2025-03-26 05:09:39'),
(2, 'Subscriber', 'web', '2025-03-26 05:09:39', '2025-03-26 05:09:39');

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@example.com', 'superadmin', NULL, '$2y$10$nnb5dFhZIfKIZn0jvNN1oOrR59OtrW/iNyqdfv9TZctwmgSvN3j0O', NULL, NULL, NULL),
(2, 'Subscriber', 'subscriber@example.com', 'subscriber', NULL, '$2y$10$ZKJNyp0Ig1xNgNOwEdsTQ.9YFZd9nh.FN8oSkvxv4bCpCNuUy.s5W', NULL, NULL, NULL),
(3, 'Walton Bartell', 'bernier.malachi@example.org', 'golda15', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'MMqtT3LEK8', '2025-02-11 15:48:17', '2025-02-09 04:17:52'),
(4, 'Jedediah Ankunding', 'ybode@example.com', 'rempel.reuben', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'okGDSDnadp', '2024-10-10 21:02:09', '2024-12-26 16:52:55'),
(5, 'Prof. Oran Marvin', 'jarrod27@example.net', 'ngreen', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'rAxTsC1mou', '2025-01-28 03:57:21', '2024-04-01 09:17:24'),
(6, 'Zane Douglas', 'gklocko@example.net', 'retta.terry', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'G9OWZtDRpE', '2024-06-13 11:46:47', '2024-10-20 13:08:26'),
(7, 'Anabelle Hill', 'ykerluke@example.net', 'schinner.murray', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'zNxxYMsMGv', '2024-06-01 22:40:10', '2025-01-24 16:43:51'),
(8, 'Heath O\'Reilly', 'prohaska.nia@example.org', 'audrey.fay', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'G8cUwggSGQ', '2025-03-25 01:58:22', '2024-07-23 00:31:42'),
(9, 'Oswald Cole', 'minerva.huels@example.net', 'mstokes', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'j1lO7l9lxt', '2024-04-03 07:01:17', '2025-03-03 05:31:25'),
(10, 'Simone Roberts II', 'concepcion.sauer@example.net', 'mfeil', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'pSfGze5BHv', '2024-07-04 11:31:34', '2024-04-30 15:10:40'),
(11, 'Gabriella Berge', 'waldo.mante@example.com', 'xhickle', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'XOUvYx6tHI', '2024-08-15 04:33:08', '2025-01-23 08:15:14'),
(12, 'Selmer Howe', 'neal43@example.net', 'ternser', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', '9MX1cD9nKW', '2025-02-17 23:03:35', '2024-12-22 23:55:55'),
(13, 'Freda Mosciski', 'jerod54@example.net', 'pauline.littel', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'uwGDdae5GY', '2024-05-30 10:20:33', '2025-01-23 10:06:14'),
(14, 'Mr. Quinn Schuppe', 'kaitlyn.larson@example.org', 'cordia.schmidt', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'o9ZC3WQIXn', '2024-06-19 18:36:15', '2024-07-28 04:52:54'),
(15, 'Prof. Frederick Windler', 'pkutch@example.com', 'camille.kunde', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'xjy9yrUUY6', '2025-01-12 00:47:28', '2024-07-06 20:05:00'),
(16, 'Hollie Hickle', 'ukling@example.com', 'jlind', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'sBJn3zme24', '2024-08-21 15:18:27', '2024-08-27 16:30:50'),
(17, 'Jaquelin Olson', 'dexter87@example.com', 'zola.tillman', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'mdJ9ls5VHd', '2025-02-22 18:18:58', '2024-08-25 19:32:12'),
(18, 'Dawn Satterfield', 'mariela.marvin@example.org', 'smcglynn', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'zHnOo2tmwq', '2024-09-14 04:43:05', '2025-02-18 08:14:09'),
(19, 'Penelope Ratke', 'lerdman@example.net', 'haag.josianne', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'UjmX4fBoRX', '2024-12-14 14:17:14', '2025-02-17 16:55:43'),
(20, 'Prof. Elvera Dickinson III', 'myrtie.bednar@example.com', 'tblanda', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', '8XhnbyEaWE', '2025-01-07 10:37:06', '2024-06-18 20:25:35'),
(21, 'Dr. Adriel Hills', 'okeefe.nelda@example.com', 'osinski.jan', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'C55uoFGi5m', '2024-07-17 23:45:03', '2024-08-29 11:55:05'),
(22, 'Marta Herman', 'willms.ryann@example.com', 'efrain.watsica', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'D1iPwLZqtv', '2024-09-23 00:23:36', '2024-05-24 13:44:56'),
(23, 'Prof. Kristin Luettgen Sr.', 'kellie.moen@example.com', 'pagac.ava', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', '2ADux9klEk', '2025-03-04 19:30:13', '2024-12-21 09:58:41'),
(24, 'Prof. Alessandra Wyman', 'abernathy.gabrielle@example.com', 'brannon49', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'y22rLMLa3f', '2025-02-02 14:56:25', '2024-04-07 00:45:45'),
(25, 'Weston Schowalter V', 'oconnell.van@example.com', 'herman.terrill', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'Z3PR7FrIXb', '2024-04-04 12:45:51', '2025-03-24 14:27:30'),
(26, 'Barbara Harber Sr.', 'mitchell.block@example.net', 'vivien14', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'nWEidREXk8', '2024-08-02 22:05:39', '2025-02-28 03:25:03'),
(27, 'Rosalinda Rosenbaum', 'efeest@example.net', 'elmo.boyer', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', '3MYumM42cn', '2024-10-28 20:30:52', '2025-02-06 10:19:55'),
(28, 'Mr. Johnathan Kautzer II', 'ygreen@example.org', 'becker.javon', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'l8vu7YWi84', '2024-10-21 00:58:58', '2025-03-23 20:38:40'),
(29, 'Dr. Emma Mann Jr.', 'jkshlerin@example.org', 'kameron.medhurst', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'T7CbjoDrlL', '2024-06-11 13:02:15', '2024-06-21 19:03:19'),
(30, 'Dr. Sedrick Shields', 'willa22@example.org', 'ferry.shana', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'jlLq3WKXQ7', '2025-02-04 23:50:41', '2025-01-13 05:11:52'),
(31, 'Ervin Schneider', 'jody30@example.org', 'yhagenes', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'w1K9XQbcPd', '2024-08-31 08:27:22', '2024-07-19 10:14:59'),
(32, 'Tessie Wunsch', 'kerluke.zachary@example.org', 'lonny44', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'eoowkLPKNm', '2024-10-19 05:27:49', '2025-01-01 09:18:04'),
(33, 'Bo Torphy', 'maurice.boyle@example.com', 'auer.alvera', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'OkvOKtZkBx', '2024-11-07 18:47:26', '2024-09-26 11:59:23'),
(34, 'Prof. Kacie O\'Keefe', 'haley.cicero@example.net', 'leannon.baron', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'SNVg19HnNO', '2024-07-07 13:05:55', '2025-02-04 02:58:43'),
(35, 'Zoey Gutmann', 'srosenbaum@example.org', 'pfeffer.lorna', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'PEHgQFvaYq', '2025-02-05 07:42:59', '2024-07-08 01:35:36'),
(36, 'Mr. Kay Fay II', 'dvonrueden@example.com', 'christy.schaefer', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'adE0HTCl9U', '2024-05-25 16:13:44', '2024-11-23 14:07:02'),
(37, 'Frank Price', 'ohomenick@example.org', 'golden16', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'E35D9JHAlj', '2024-03-27 13:24:44', '2025-01-08 08:35:43'),
(38, 'Leo Bode IV', 'dulce88@example.com', 'reichert.jacklyn', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'FAGUahpXqi', '2024-05-28 13:41:38', '2024-04-03 04:27:23'),
(39, 'Jena Bechtelar I', 'bode.amparo@example.org', 'xbechtelar', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', '0EvoEWLXR6', '2025-03-05 05:07:23', '2024-12-03 12:22:37'),
(40, 'Dr. Pierce Hickle', 'westley.haley@example.net', 'krystal16', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'yKZRsDRVRW', '2024-07-24 23:35:49', '2024-11-26 22:12:52'),
(41, 'Hilda Stroman', 'hazle33@example.net', 'eleazar95', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', '158FEeadxo', '2024-12-18 08:06:45', '2024-05-07 06:58:13'),
(42, 'Prof. Joshuah Kuhn III', 'yroberts@example.net', 'oquitzon', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'kup2oHfjib', '2024-09-28 21:58:58', '2024-11-07 14:33:50'),
(43, 'Miss Susan DuBuque V', 'satterfield.maxie@example.net', 'jaskolski.colten', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'opmKe1xHdB', '2025-03-09 04:29:27', '2024-11-09 15:19:23'),
(44, 'Elda McCullough', 'jconnelly@example.org', 'americo30', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', '3GrdfI0Lcd', '2024-08-17 11:38:44', '2024-11-10 06:18:26'),
(45, 'Ms. Isobel Aufderhar II', 'aaron85@example.com', 'banderson', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', '0tmZ1IkmJe', '2024-06-03 04:12:49', '2024-07-01 13:46:36'),
(46, 'Mrs. Casandra Smith', 'kihn.elmira@example.net', 'forrest33', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'xDKvYbueBx', '2025-01-01 21:35:46', '2025-01-28 20:38:53'),
(47, 'Kirk Goodwin', 'davonte54@example.org', 'heathcote.aurore', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'GyJ0MSs7SL', '2024-04-14 06:17:59', '2024-06-24 04:51:12'),
(48, 'Freddy Braun', 'ukohler@example.com', 'scotty.schuppe', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', '37ryMtw39u', '2024-10-24 11:51:52', '2024-09-30 22:13:28'),
(49, 'Sophie Johnson IV', 'kylee.kreiger@example.net', 'kemmer.alayna', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'vGSY6L1yfm', '2025-02-21 22:56:42', '2024-04-29 00:49:20'),
(50, 'Sandra Little', 'lleffler@example.net', 'rbradtke', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'Fde3lkKFoj', '2024-09-29 03:29:38', '2024-09-02 18:06:47'),
(51, 'Deja Schinner', 'damore.greyson@example.org', 'milton.kub', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'rPPUgRjB6x', '2024-10-19 02:48:15', '2024-06-28 19:21:22'),
(52, 'Tevin Hayes', 'jovanny.hammes@example.org', 'wstracke', '2025-03-26 05:09:39', '$2y$10$TsKpikFmjFjC/KHiVPjeTOPbjorvmNryFoMCJYy6chn9BvX3XDPJy', 'VumyNYySST', '2025-03-23 10:49:35', '2025-02-19 15:24:17');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;