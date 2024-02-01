/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - job_lister
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`job_lister` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `job_lister`;

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `company_category_id` int(10) unsigned NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `companies` */

/*Table structure for table `company_categories` */

DROP TABLE IF EXISTS `company_categories`;

CREATE TABLE `company_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `company_categories` */

insert  into `company_categories`(`id`,`category_name`) values 
(1,'IT & Telecommunication'),
(2,'Marketing / Advertising'),
(4,'Banking / Insurance /Financial Services'),
(5,'Construction / Engineering / Architects '),
(6,'Creative / Graphics / Designing'),
(7,'Social work'),
(8,'hospitality'),
(9,'journalism-editor-media'),
(10,'Agriculture + Livestock'),
(11,'Teaching profession'),
(12,'Engineer'),
(13,'Sales'),
(14,'Leadership'),
(15,'Web development'),
(16,'Mobile App'),
(17,'Sales'),
(18,'E-Commerce'),
(19,'Others'),
(20,'IT & Telecommunication'),
(21,'Marketing / Advertising'),
(22,'General Mgmt'),
(23,'Banking / Insurance /Financial Services'),
(24,'Construction / Engineering / Architects '),
(25,'Creative / Graphics / Designing'),
(26,'Social work'),
(27,'hospitality'),
(28,'journalism-editor-media'),
(29,'Agriculture + Livestock'),
(30,'Teaching profession'),
(31,'Engineer'),
(32,'Sales'),
(33,'Leadership'),
(34,'Web development'),
(35,'Mobile App'),
(36,'Sales'),
(37,'E-Commerce'),
(38,'Others');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `job_applications` */

DROP TABLE IF EXISTS `job_applications`;

CREATE TABLE `job_applications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_applications` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),
(4,'2019_08_19_000000_create_failed_jobs_table',1),
(5,'2020_10_09_104919_create_permission_tables',1),
(6,'2020_10_09_144234_create_company_categories_table',1),
(7,'2020_10_09_145555_create_companies_table',1),
(8,'2020_10_11_024354_create_posts_table',1),
(9,'2020_10_12_133736_create_post_user_table',1),
(10,'2020_10_13_111952_create_job_applications_table',1);

/*Table structure for table `model_has_permissions` */

DROP TABLE IF EXISTS `model_has_permissions`;

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_permissions` */

/*Table structure for table `model_has_roles` */

DROP TABLE IF EXISTS `model_has_roles`;

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `model_has_roles` */

insert  into `model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(1,'App\\Models\\User',3),
(2,'App\\Models\\User',4),
(2,'App\\Models\\User',7),
(2,'App\\Models\\User',8),
(3,'App\\Models\\User',5);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'view-dashboard','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(2,'create-post','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(3,'edit-post','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(4,'delete-post','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(5,'manage-authors','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(6,'author-section','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(7,'create-category','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(8,'edit-category','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(9,'delete-category','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(10,'create-company','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(11,'edit-company','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(12,'delete-company','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(13,'view-dashboard','web','2024-01-25 18:55:36','2024-01-25 18:55:36'),
(14,'create-post','web','2024-01-25 18:55:36','2024-01-25 18:55:36'),
(15,'edit-post','web','2024-01-25 18:55:37','2024-01-25 18:55:37'),
(16,'delete-post','web','2024-01-25 18:55:37','2024-01-25 18:55:37'),
(17,'manage-authors','web','2024-01-25 18:55:37','2024-01-25 18:55:37'),
(18,'author-section','web','2024-01-25 18:55:37','2024-01-25 18:55:37'),
(19,'create-category','web','2024-01-25 18:55:37','2024-01-25 18:55:37'),
(20,'edit-category','web','2024-01-25 18:55:37','2024-01-25 18:55:37'),
(21,'delete-category','web','2024-01-25 18:55:37','2024-01-25 18:55:37'),
(22,'create-company','web','2024-01-25 18:55:37','2024-01-25 18:55:37'),
(23,'edit-company','web','2024-01-25 18:55:37','2024-01-25 18:55:37'),
(24,'delete-company','web','2024-01-25 18:55:37','2024-01-25 18:55:37');

/*Table structure for table `post_user` */

DROP TABLE IF EXISTS `post_user`;

CREATE TABLE `post_user` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `post_user` */

insert  into `post_user`(`post_id`,`user_id`) values 
(10,3);

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) unsigned NOT NULL,
  `job_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_level` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacancy_count` smallint(5) unsigned DEFAULT NULL,
  `employment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `education_level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specifications` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` mediumint(8) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

/*Table structure for table `role_has_permissions` */

DROP TABLE IF EXISTS `role_has_permissions`;

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `role_has_permissions` */

insert  into `role_has_permissions`(`permission_id`,`role_id`) values 
(1,1),
(2,1),
(2,2),
(3,1),
(3,2),
(4,1),
(4,2),
(5,1),
(6,1),
(6,2),
(7,1),
(8,1),
(9,1),
(10,1),
(10,2),
(11,1),
(11,2),
(12,1),
(12,2);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'admin','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(2,'author','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(3,'author','web','2024-01-25 18:55:00','2024-01-25 18:55:00'),
(4,'admin','web','2024-01-25 18:55:36','2024-01-25 18:55:36'),
(5,'author','web','2024-01-25 18:55:36','2024-01-25 18:55:36'),
(6,'user','web','2024-01-25 18:55:36','2024-01-25 18:55:36');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`remember_token`,`created_at`,`updated_at`) values 
(3,'admin user','admin@admin.com','2024-01-25 18:55:38','$2y$10$iiNPyAfrf40yX1tduGc.Cu3rxIR00Zh07.KPKImU2ZwMz6YdY22ay',NULL,NULL,'ZKnDGR24MTwi45fqwHgIrOw0gtiwuWgHO1MLul9oKaPN8byFpbf5e7ll4AHS','2024-01-25 18:55:38','2024-01-25 18:55:38'),
(4,'author user','author@author.com','2024-01-25 18:55:38','$2y$10$iiNPyAfrf40yX1tduGc.Cu3rxIR00Zh07.KPKImU2ZwMz6YdY22ay',NULL,NULL,'aLEBDGyPyvu0Dk3GSl0zS03h4Dlu7vK4DDMW29TaQ8OXhW8azqaIWckeWLAZ','2024-01-25 18:55:38','2024-01-25 18:55:38'),
(5,'simple user','user@user.com','2024-01-25 18:55:38','$2y$10$iiNPyAfrf40yX1tduGc.Cu3rxIR00Zh07.KPKImU2ZwMz6YdY22ay',NULL,NULL,'Q8Jj1tlfaW','2024-01-25 18:55:38','2024-01-25 18:55:38');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
