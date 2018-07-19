-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2018 at 07:35 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_kajandi`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `accessories_id` tinyint(1) DEFAULT NULL COMMENT '1 for ser 0 for unset',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` tinyint(4) DEFAULT NULL COMMENT '1 admin, 2 moderator, 3 editor',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN ADMIN', 'admin@gmail.com', '$2y$10$gwxHgRvcnIbeaEpJkLfaCeb2TdK448NERuW4wr8AYH05Iilu5gwA6', NULL, NULL, NULL, NULL),
(2, 'admin 2', 'admin2@gmail.com', '$2y$10$/ZZ.MFnQJ7vUkYRSEFRqv.zAKKH3B2zohM38zrEgEsUYGJ/.sA9s2', 1, NULL, '2018-06-26 11:54:39', '2018-06-26 11:54:39'),
(3, 'ADMIN 3', 'admin3@gmail.com', '$2y$10$HIp1/femCejQy6b6RmMBSO8XirJzLnb4tVRqWzFeO9hMVBsorXaDG', 1, NULL, '2018-06-27 00:00:37', '2018-06-27 00:00:37'),
(4, 'Admin 5', 'admin5@gmail.com', '$2y$10$HPhykWQSBlIHaHPACZ0DX.2/sRz1SgVL3agIN0p8RH8YMG2QxU65.', 1, NULL, '2018-06-27 00:03:27', '2018-06-27 00:03:27'),
(5, 'admin 6', 'admin6@gmail.com', '$2y$10$xCWDCQijKErVynFIUawCsuGERIR93wD9nk.jFg8YjPO2jQd7DlZk.', 1, NULL, '2018-06-27 09:53:48', '2018-06-27 09:53:48'),
(6, 'Admin 8', 'admin8@gmail.com', '$2y$10$b39Drg7S/Hbeoxs4TGYGd.F8u5C8OBRdvtcjxdTolEgkejcd6aMn.', 1, NULL, '2018-06-27 10:59:43', '2018-06-27 10:59:43'),
(7, 'ADMIN 9', 'admin9@gmail.com', '$2y$10$8QMp.hH8gLPJsd6e2a7G7./Q1b7mlrgvx0zm0SJ92vs4xf0wK7ciW', 1, NULL, '2018-06-27 11:02:18', '2018-06-27 11:02:18'),
(8, 'ADMIN 10', 'admin10@gmail.com', '$2y$10$LjQWQ5Q3a85tlX3JqKsS9ehfWntGHkyQReORtN/gyjmNh2inWi6tG', 1, '6ryw8EDYR8C05gfbp3JvtbWCh7h8oP71SuaMHztMgiB9qukvLdRtEpeOR9LQ', '2018-06-27 11:02:56', '2018-06-28 11:34:18'),
(9, 'Moderator Admin', 'moderate@gmail.com', '$2y$10$Lkd3D009a2E9mzmk3Efbq.2/D2XGh.gzTMXjcAqRXWEFKi7WCfvNG', 3, NULL, '2018-06-27 11:14:19', '2018-06-27 11:14:19'),
(10, 'Moderator 100', 'moderator100@gmail.com', '$2y$10$XtMX7yjKe/fx9Oo5soF4m.qVmbG7d9TJ7efyLiHWfy7ooe/9A6Iga', 3, NULL, '2018-06-28 02:52:55', '2018-06-28 02:52:55'),
(11, 'ADMIN 59', 'admin59@gmail.com', '$2y$10$FF5awTHxD7dumrztzLVOJuNaYevZtRqGtuomQwpmJ/Abe33BAjKNG', 1, NULL, '2018-07-14 11:06:26', '2018-07-14 11:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `android_iphones`
--

CREATE TABLE `android_iphones` (
  `id` int(10) UNSIGNED NOT NULL,
  `android` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iphone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `cat_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_major` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_id`, `cat_title`, `cat_name`, `cat_image`, `cat_major`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Electronics', 'Electronics', 'public/CategoryImage/1531675737_1.jpg', 1, '2018-07-15 11:28:57', '2018-07-16 09:48:23'),
(2, NULL, 'Man Fashion', 'Man Fashion', 'public/CategoryImage/1531675782_4.jpg', 1, '2018-07-15 11:29:42', '2018-07-16 09:48:31'),
(3, NULL, 'Mobile', 'Mobile', 'public/CategoryImage/1531675824_2.jpg', 1, '2018-07-15 11:30:24', '2018-07-16 09:48:37'),
(4, NULL, 'Smart Phone', 'Smart Phone', 'public/CategoryImage/1531675853_aa.jpg', NULL, '2018-07-15 11:30:53', '2018-07-15 11:30:53'),
(5, NULL, 'Home & Living', 'Home & Living', 'public/CategoryImage/1531675907_aa.jpg', NULL, '2018-07-15 11:31:47', '2018-07-15 11:31:47'),
(6, NULL, 'Air Conditioner & Air Cooler', 'Air Conditioner & Air Cooler', 'public/CategoryImage/1531676000_3.jpeg', NULL, '2018-07-15 11:33:20', '2018-07-15 11:33:20'),
(7, NULL, 'Construction', 'Construction', 'public/CategoryImage/1531709933_1.jpg', NULL, '2018-07-15 20:58:53', '2018-07-15 20:58:53'),
(8, NULL, 'Engineering', 'Engineering', 'public/CategoryImage/1531709952_IM1.png', NULL, '2018-07-15 20:59:12', '2018-07-15 20:59:12'),
(9, NULL, 'Wood Product', 'Wood Product', 'public/CategoryImage/1531709994_download.jpg', NULL, '2018-07-15 20:59:54', '2018-07-15 20:59:54'),
(10, NULL, 'Kid\'s toy', 'Kid\'s toy', 'public/CategoryImage/1531710031_4.jpg', NULL, '2018-07-15 21:00:31', '2018-07-15 21:00:31'),
(11, NULL, 'Cloths', 'Cloths', 'public/CategoryImage/1531710067_download.jpg', NULL, '2018-07-15 21:01:07', '2018-07-15 21:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread' COMMENT 'default:unread,read,replay',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_suppliers`
--

CREATE TABLE `contact_suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_message` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attach_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `bil_address_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bil_address_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bil_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bil_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bil_email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bil_first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bil_last_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bil_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bil_state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bil_zipcode` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` tinyint(1) DEFAULT NULL COMMENT '0:Ship to this address;1:Ship to different address',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cus_id`, `bil_address_1`, `bil_address_2`, `bil_city`, `bil_country`, `bil_email`, `bil_first_name`, `bil_last_name`, `bil_phone`, `bil_state`, `bil_zipcode`, `shipping_address`, `created_at`, `updated_at`) VALUES
(1, 5, 'sahapur rupganj', NULL, 'naray', 'Bangladesh', 'tanveerfunclub@gmail.com', 'TANBHIR', 'HOSSAIN', '018292929', 'nana', '1460', 0, '2018-07-11 19:21:00', '2018-07-12 19:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `customer_answers`
--

CREATE TABLE `customer_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_questions`
--

CREATE TABLE `customer_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `question` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE `customer_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_reviews`
--

INSERT INTO `customer_reviews` (`id`, `user_id`, `product_id`, `order_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(1, 3, 5, NULL, 'good', '5', '2018-07-05 18:27:24', '2018-07-05 18:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `email_subscribers`
--

CREATE TABLE `email_subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDelete` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_subscribers`
--

INSERT INTO `email_subscribers` (`id`, `email`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'afojalcons@gmail.com', NULL, '2018-06-22 10:57:37', '2018-06-22 10:57:37'),
(2, 'aaaaa@gmail.com', 1, '2018-06-22 10:58:27', '2018-06-22 10:58:27'),
(3, 'wwww@gmail.com', 1, '2018-06-22 10:59:22', '2018-06-22 10:59:22'),
(4, 'testing@gmail.com', NULL, NULL, NULL),
(5, 'test2@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faqanswers`
--

CREATE TABLE `faqanswers` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ans_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faquestions`
--

CREATE TABLE `faquestions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_pages`
--

CREATE TABLE `footer_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_pages`
--

INSERT INTO `footer_pages` (`id`, `section_name`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Testing Service', 1, '2018-07-16 11:43:14', '2018-07-16 21:09:22'),
(2, 'Buy on Testbaba.com', 1, '2018-07-16 11:43:23', '2018-07-16 21:11:13'),
(3, 'About Us', 1, '2018-07-16 11:43:28', '2018-07-16 21:12:27'),
(4, 'Sell on Testbaba.com', 1, '2018-07-16 11:43:33', '2018-07-16 21:15:33'),
(5, 'Trade Services', 1, '2018-07-16 20:36:33', '2018-07-16 21:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `home_adverts`
--

CREATE TABLE `home_adverts` (
  `ads_id` int(10) UNSIGNED NOT NULL,
  `ads_section` int(11) NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `banner_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_adverts`
--

INSERT INTO `home_adverts` (`ads_id`, `ads_section`, `seller_id`, `product_id`, `banner_color`, `ads_image`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '#00caca', 'public/backend/AdvertImg/1532020156_aa.jpg', 1, '2018-07-08 02:47:32', '2018-07-19 11:09:16'),
(2, 2, 1, 1, '#000000', '', 1, '2018-07-13 19:49:54', '2018-07-13 19:49:54'),
(3, 3, 1, 1, '#000000', NULL, 1, '2018-07-13 19:51:12', '2018-07-13 19:51:12'),
(4, 1, 1, 1, '#f60e5b', NULL, 1, '2018-07-08 02:47:32', '2018-07-08 02:48:50'),
(5, 1, 1, 1, '#f60e5b', NULL, 1, '2018-07-08 02:47:32', '2018-07-08 02:48:50'),
(6, 2, 1, 1, '#000000', '', 1, '2018-07-13 19:49:54', '2018-07-13 19:49:54'),
(7, 1, 1, 1, '#f60e5b', NULL, 1, '2018-07-08 02:47:32', '2018-07-08 02:48:50'),
(8, 2, 1, 1, '#000000', '', 1, '2018-07-13 19:49:54', '2018-07-13 19:49:54'),
(9, 2, 1, 4, '#000000', '', 1, '2018-07-15 18:04:56', '2018-07-15 18:04:56'),
(10, 2, 1, 4, '#000000', '', 1, '2018-07-15 18:05:14', '2018-07-15 18:05:14'),
(11, 2, 1, 4, '#000000', '', 1, '2018-07-15 18:05:24', '2018-07-15 18:05:24'),
(12, 2, 1, 4, '#000000', 'public/backend/AdvertImg/1531699560_3.jpeg', 1, '2018-07-15 18:06:00', '2018-07-15 18:06:00'),
(13, 3, 1, 1, '#000000', '', 1, '2018-07-15 18:06:35', '2018-07-15 18:06:35'),
(14, 3, 1, 3, '#000000', 'public/backend/AdvertImg/1531699611_aa.jpg', 1, '2018-07-15 18:06:51', '2018-07-15 18:06:51'),
(15, 3, 1, 4, '#000000', '', 1, '2018-07-15 18:07:05', '2018-07-15 18:07:05'),
(16, 2, 1, 5, '#000000', '', 1, '2018-07-15 18:07:17', '2018-07-15 18:07:17'),
(17, 2, 1, 6, '#000000', '', 1, '2018-07-15 18:07:38', '2018-07-15 18:07:38'),
(18, 3, 1, 4, '#000000', '', 1, '2018-07-15 18:08:05', '2018-07-15 18:08:05'),
(19, 3, 1, 5, '#000000', '', 1, '2018-07-15 18:08:36', '2018-07-15 18:08:36'),
(20, 3, 1, 4, '#000000', 'public/backend/AdvertImg/1531699736_4.jpg', 1, '2018-07-15 18:08:56', '2018-07-15 18:08:56'),
(21, 3, 1, 5, '#000000', '', 1, '2018-07-15 18:09:10', '2018-07-15 18:09:10'),
(22, 4, 1, 3, '#ff0080', '', 1, '2018-07-15 18:09:42', '2018-07-15 18:09:42'),
(23, 4, 1, 5, '#d96c00', 'public/backend/AdvertImg/1531710432_4.jpg', 1, '2018-07-15 18:10:10', '2018-07-15 21:07:13'),
(24, 1, 7, 7, '#000000', '', 1, '2018-07-19 10:41:59', '2018-07-19 10:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `slider_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `seller_id`, `product_id`, `slider_title`, `slider_description`, `slider_image`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'AMAZING RATE DON\'T MISS THE OFFER', 'Smart Weldings', 'public/frontend/img/slider/1532020733_bg.jpg', NULL, '2018-07-19 11:18:53', '2018-07-19 11:18:53'),
(4, 6, 2, 'Testing Welder This Sites', 'Electronics product by testing', '', NULL, '2018-07-19 11:23:00', '2018-07-19 11:23:00'),
(5, 1, 4, 'Testing Welder This Sites', 'Smart Welding', 'public/frontend/img/slider/1532021006_bg.jpg', NULL, '2018-07-19 11:23:26', '2018-07-19 11:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `manufacters`
--

CREATE TABLE `manufacters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacters`
--

INSERT INTO `manufacters` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'STARGOLD', '2018-06-20 21:19:10', '2018-06-20 21:19:10'),
(2, 'STARLIGHT', '2018-06-20 21:19:17', '2018-06-20 21:19:17'),
(3, 'STARLIFE', '2018-06-20 21:19:24', '2018-06-20 21:19:24'),
(4, 'TOKYOSAT', '2018-06-20 21:19:31', '2018-06-20 21:19:31'),
(5, 'MALIK STREAMS', '2018-06-20 21:19:47', '2018-06-20 21:19:47');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2017_03_06_053818_create_roles_table', 1),
(5, '2017_03_06_053834_create_role_admins_table', 1),
(6, '2018_06_01_102032_create_categories_table', 1),
(7, '2018_06_01_102210_create_subcategories_table', 1),
(8, '2018_06_01_165946_create_products_table', 1),
(9, '2018_06_02_171515_create_manufacters_table', 1),
(10, '2018_06_02_173824_create_product_models_table', 1),
(11, '2018_06_06_213002_create_product_images_table', 1),
(12, '2018_06_06_225328_create_accessories_table', 1),
(14, '2018_06_07_173144_create_role_sellers_table', 1),
(16, '2018_06_10_222605_create_wishlists_table', 1),
(17, '2018_06_12_174441_create_orders_table', 1),
(18, '2018_06_12_174611_create_order_details_table', 1),
(19, '2018_06_12_174628_create_payments_table', 1),
(20, '2018_06_12_174650_create_shippings_table', 1),
(21, '2018_06_12_185038_create_customers_table', 1),
(23, '2018_06_17_004928_create_customer_reviews_table', 1),
(24, '2018_06_07_173143_create_sellers_table', 2),
(27, '2018_06_19_000041_create_socials_table', 4),
(28, '2018_06_19_004900_create_android_iphones_table', 4),
(29, '2018_06_19_014350_create_contact_forms_table', 4),
(31, '2018_06_20_054427_create_customer_answers_table', 4),
(32, '2018_06_22_161306_create_email_subscribers_table', 5),
(35, '2018_06_21_192104_create_page_models_table', 7),
(36, '2018_06_22_190415_create_blog_categories_table', 7),
(37, '2018_06_22_193222_create_blogs_table', 7),
(38, '2017_03_06_023521_createAdminTable', 8),
(40, '2018_06_23_161616_create_faquestions_table', 9),
(41, '2018_06_23_161637_create_faqanswers_table', 9),
(42, '2018_06_10_045322_create_seller_products_table', 10),
(43, '2018_06_30_170617_create_units_table', 11),
(45, '2018_06_15_120010_create_home_adverts_table', 12),
(46, '2018_06_20_054405_create_customer_questions_table', 13),
(47, '2018_07_13_164009_create_contact_suppliers_table', 14),
(51, '2018_07_16_162018_create_footer_pages_table', 16),
(52, '2018_07_16_163026_create_page_links_table', 16),
(53, '2018_07_16_011019_create_home_sliders_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `ship_id` int(11) DEFAULT NULL,
  `order_total` double(10,2) DEFAULT NULL,
  `total_qty` int(11) DEFAULT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cus_id`, `ship_id`, `order_total`, `total_qty`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 363.00, 3, 'confirm', '2018-07-12 19:45:52', '2018-07-12 19:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double(10,2) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'STARGOLD EMERGENCY LIGHT WITH CHARGER', 100.00, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_links`
--

CREATE TABLE `page_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `link_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_links`
--

INSERT INTO `page_links` (`id`, `section_id`, `link_title`, `link_url`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Page Link 1', 'http://r25n.com', NULL, '2018-07-16 18:40:50', '2018-07-16 21:21:13'),
(3, 2, 'Page Link 2', 'http://r25n.com', NULL, '2018-07-16 20:22:57', '2018-07-16 21:22:27'),
(4, 1, 'Page Link 1', 'http://r25n.com', NULL, '2018-07-16 18:40:50', '2018-07-16 21:21:13'),
(5, 2, 'Page Link 2', 'http://r25n.com', NULL, '2018-07-16 20:22:57', '2018-07-16 21:22:27'),
(6, 1, 'Page Link 3', 'http://r25n.com', NULL, '2018-07-16 18:40:50', '2018-07-16 21:21:13'),
(7, 2, 'Page Link 3', 'http://r25n.com', NULL, '2018-07-16 20:22:57', '2018-07-16 21:22:27'),
(8, 1, 'Page Link 4', 'http://r25n.com', NULL, '2018-07-16 18:40:50', '2018-07-16 21:21:13'),
(9, 2, 'Page Link 4', 'http://r25n.com', NULL, '2018-07-16 20:22:57', '2018-07-16 21:22:27'),
(11, 3, 'Page Link 1', 'http://r25n.com', NULL, '2018-07-16 21:27:54', '2018-07-16 21:27:54'),
(12, 3, 'Page Link 2', 'http://r25n.com', NULL, '2018-07-16 21:28:11', '2018-07-16 21:28:11'),
(13, 4, 'Page Link 1', 'http://r25n.com', NULL, '2018-07-16 21:28:25', '2018-07-16 21:28:25'),
(14, 5, 'Page Link 1', 'http://r25n.com', NULL, '2018-07-16 21:28:33', '2018-07-16 21:28:33'),
(15, 3, 'Page Link 2', 'http://r25n.com', NULL, '2018-07-16 21:28:56', '2018-07-16 21:28:56'),
(16, 3, 'Page Link 3', 'http://r25n.com', NULL, '2018-07-16 21:29:06', '2018-07-16 21:29:06'),
(17, 4, 'Page Link 2', 'http://r25n.com', NULL, '2018-07-16 21:29:15', '2018-07-16 21:29:15'),
(18, 4, 'Page Link 3', 'http://r25n.com', NULL, '2018-07-16 21:29:25', '2018-07-16 21:29:25'),
(19, 5, 'Page Link 2', 'http://r25n.com', NULL, '2018-07-16 21:29:32', '2018-07-16 21:29:32'),
(20, 5, 'Page Link 3', 'http://r25n.com', NULL, '2018-07-16 21:29:43', '2018-07-16 21:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `page_models`
--

CREATE TABLE `page_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_models`
--

INSERT INTO `page_models` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Testing Page', '<p>New Page</p>', '', '2018-06-28 21:45:15', '2018-06-28 21:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'cash', 'pending', '2018-07-06 19:31:39', '2018-07-06 19:31:39'),
(2, 2, 'cash', 'pending', '2018-07-06 19:33:03', '2018-07-06 19:33:03'),
(3, 3, 'cash', 'pending', '2018-07-11 18:49:42', '2018-07-11 18:49:42'),
(4, 4, 'cash', 'pending', '2018-07-11 23:16:49', '2018-07-11 23:16:49'),
(5, 1, 'cash', 'pending', '2018-07-12 19:45:52', '2018-07-12 19:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `sub_cat_id` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `partnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `availability` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1 for in stock 2 out of stock 0 inactive',
  `price` double(8,2) DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `length` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider` tinyint(1) DEFAULT NULL COMMENT '1 for set 0 unset',
  `discount_price` double(8,2) DEFAULT NULL,
  `hot` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stuff_pick` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_feature` text COLLATE utf8mb4_unicode_ci,
  `more_description` text COLLATE utf8mb4_unicode_ci,
  `more_specification` text COLLATE utf8mb4_unicode_ci,
  `accessories_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_models`
--

CREATE TABLE `product_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'seller', NULL, NULL),
(3, 'moderator', NULL, NULL),
(4, 'editor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_admins`
--

CREATE TABLE `role_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_admins`
--

INSERT INTO `role_admins` (`id`, `role_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 8, '2018-06-27 11:02:56', '2018-06-27 11:02:56'),
(3, 3, 9, '2018-06-27 11:14:19', '2018-06-27 11:14:19'),
(4, 3, 10, '2018-06-28 02:52:55', '2018-06-28 02:52:55'),
(5, 1, 11, '2018-07-14 11:06:26', '2018-07-14 11:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_sellers`
--

CREATE TABLE `role_sellers` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_sellers`
--

INSERT INTO `role_sellers` (`id`, `role_id`, `seller_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendorname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workforce` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yearsofexp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratings` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactphone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactemail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chairmanname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chairmanphone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chairmanemail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producttype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acStatus` tinyint(1) DEFAULT NULL,
  `company_banner` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_img_1` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_img_2` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_img_3` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `established_year` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_revenue` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_products` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_market` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `user_id`, `admin_id`, `email`, `vendorname`, `address`, `country`, `url`, `cac`, `workforce`, `yearsofexp`, `ratings`, `contactname`, `contactphone`, `contactemail`, `chairmanname`, `chairmanphone`, `chairmanemail`, `producttype`, `location`, `vendor_type`, `password`, `acStatus`, `company_banner`, `company_img_1`, `company_img_2`, `company_img_3`, `established_year`, `annual_revenue`, `main_products`, `main_market`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 's1@s.com', 'SELLER 1', 'Sahapur Rupganj Narayanganj', 'Bangladesh', NULL, NULL, NULL, NULL, NULL, 'Md Takrim Mohammad', '01911881811', 'tapta@gmail.com', NULL, NULL, NULL, '1', 'BAYELSA', '1', '$2y$10$vHyiOwQP79yikLJvwV58ze0XmDNCmhtxapZxn/BuVuZHCsTeDP0ES', NULL, 'public/seller/company_img/1531632124_company-overview-banner.jpg', 'public/seller/company_img/1531584202_4.jpg', 'public/seller/company_img/1531584202_IM1.png', 'public/seller/company_img/1531584202_download.jpg', '2009', '1500$ billion - 2000$ Million', 'Electronics', 'America, Los Angelse', NULL, '2018-07-08 02:37:31', '2018-07-14 23:22:04'),
(2, 6, NULL, 'afojalenterprise@gmail.com', 'AFOJAL ENTERPRISE', 'NO 1 JALANA BATU ANAM', 'Malaysia', NULL, NULL, NULL, NULL, NULL, 'MOHAMMAD ABDUL GAFFER AL MASUD', '01112922', 'masud@gmail.com', NULL, NULL, NULL, '1', 'Outside Nigeria', '2', '$2y$10$Ld02xsiJS6Dh76iIG8G0Pu2q0QNDAL91BaNQx1LCWjmp36W/w6Wc.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-15 09:58:06', '2018-07-15 10:20:52'),
(3, 7, NULL, 'afojalcons@gmail.com', 'AFOJAL CONSTRUCTION & ENGINEERING SDN BHD', 'NO 23 JLN BSS 1/2D, BANDAR SEREMBAN SELATAN 73400 SEREMBAN NEGERI SEMBILAN', 'Malaysia', 'htttp://afojal.com', NULL, NULL, NULL, '1', 'MD RAJIB MIAH', '018292929', 'rajib@afojal.com', NULL, NULL, NULL, '1', 'Outside Nigeria', '2', '$2y$10$Isy09lLgew6NRQvijnIKnOV0W2Dt4m41j3eqCDdAuo8fFlBGdGtu2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-16 23:27:21', '2018-07-16 23:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `seller_products`
--

CREATE TABLE `seller_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED DEFAULT NULL,
  `pro_status` int(11) NOT NULL COMMENT '0=>Inactive, 1=>Inactive, 2=>Low Stock, 3=>Out of Stock ',
  `pro_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_generic_name` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supply_type` int(11) DEFAULT NULL COMMENT '1=>OEM / Manufacturer, 2=>Distributor, 3=>Wholesaler, 4=>Retailer',
  `pro_cat_id` int(10) UNSIGNED NOT NULL,
  `pro_subcat_id` int(10) UNSIGNED NOT NULL,
  `pro_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `conditions` int(11) DEFAULT NULL COMMENT '1=>New, 2=>Refurbished, 3=>Fairly Used',
  `pro_warranty` int(11) DEFAULT NULL COMMENT '1=>Less Then 0, 2=>One Year, 3=>Above One Year',
  `pro_gurrantee` int(11) DEFAULT NULL COMMENT '1=>Less Then 0, 2=>One Year, 3=>Above One Year',
  `a_img_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_img_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_img_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `a_img_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speacial_feature` text COLLATE utf8mb4_unicode_ci,
  `small_order_accpeted` int(11) DEFAULT NULL COMMENT '1=>Yes, 2=>No',
  `minumum_order_qty` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `unit_price` double(8,2) NOT NULL,
  `price_for_optional_units` double(8,2) DEFAULT NULL,
  `price_15_days` double(8,2) DEFAULT NULL,
  `price_30_days` double(8,2) DEFAULT NULL,
  `stock_qty` int(11) NOT NULL,
  `sample_fee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_in_naira` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_payment_details` text COLLATE utf8mb4_unicode_ci,
  `optional_description` text COLLATE utf8mb4_unicode_ci,
  `model_id` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight_per_pack` int(11) DEFAULT NULL,
  `export_carton_width` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `export_carton_length` int(11) DEFAULT NULL,
  `export_carton_weight` int(11) DEFAULT NULL,
  `payment_type` int(11) NOT NULL COMMENT '1=>Cash in advance, 2=>Cash on delivery',
  `delivery_w_state` int(11) DEFAULT NULL COMMENT '2=>No, 1=>Yes',
  `delivery_rate_w_range` double(8,2) DEFAULT NULL,
  `delivery_rate_o_range` double(8,2) DEFAULT NULL,
  `duration_delivery_state` int(11) DEFAULT NULL COMMENT '1=>24 Hours, 2=>48 Hours, 3=>3 Days, 4=>5 Days, 5=>7 Days, 6=>9 Days, 7=>20 days ',
  `duration_within_state` int(11) DEFAULT NULL COMMENT '1=>24 Hours, 2=>48 Hours, 3=>3 Days, 4=>5 Days, 5=>7 Days, 6=>9 Days, 7=>20 days ',
  `duration_out_state` int(11) DEFAULT NULL COMMENT '1=>24 Hours, 2=>48 Hours, 3=>3 Days, 4=>5 Days, 5=>7 Days, 6=>9 Days, 7=>20 days ',
  `strength_of_meterial` int(11) DEFAULT NULL COMMENT '1=>Grade 1, 2=>Grade 2, 3=>Grade 3, 4=>Grade 4 ',
  `seller_remark` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_products`
--

INSERT INTO `seller_products` (`id`, `seller_id`, `pro_status`, `pro_name`, `pro_generic_name`, `pro_description`, `pro_keyword`, `part_number`, `model_number`, `supply_type`, `pro_cat_id`, `pro_subcat_id`, `pro_image`, `manufacture_id`, `conditions`, `pro_warranty`, `pro_gurrantee`, `a_img_1`, `a_img_2`, `a_img_3`, `a_img_4`, `pro_color`, `speacial_feature`, `small_order_accpeted`, `minumum_order_qty`, `unit`, `unit_price`, `price_for_optional_units`, `price_15_days`, `price_30_days`, `stock_qty`, `sample_fee`, `currency_in_naira`, `credit_payment_details`, `optional_description`, `model_id`, `length`, `width`, `height`, `weight_per_pack`, `export_carton_width`, `export_carton_length`, `export_carton_weight`, `payment_type`, `delivery_w_state`, `delivery_rate_w_range`, `delivery_rate_o_range`, `duration_delivery_state`, `duration_within_state`, `duration_out_state`, `strength_of_meterial`, `seller_remark`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'STARGOLD EMERGENCY LIGHT WITH CHARGER', 'STARGOLD Emergency Lights', '<ul>\r\n	<li>Very Nice Design</li>\r\n	<li>Comfortable ti use</li>\r\n	<li>Carriable</li>\r\n	<li>Externel Bettery can use</li>\r\n</ul>', 'TESTING KEYWORD', '00011', 'TEST-0013', 2, 5, 1, 'public/seller/product_img/1531444493_2.jpg', 4, 2, 2, NULL, 'public/seller/product_img/1531444493_3.jpeg', 'public/seller/product_img/1531444493_4.jpg', 'public/seller/product_img/1531444493_aa.jpg', 'public/seller/product_img/1531444554_download.jpg', '#000000', '<p>PD///////////////////////////</p>', 1, 1, 1, 100.00, NULL, 25.00, NULL, 997, NULL, NULL, '<p>PD///////////////////////////</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-12 19:14:53', '2018-07-12 19:20:22'),
(2, 6, 1, 'Eveready HL52 39-LEDs Rechargeable Home Light (Red)', 'Eveready HL52 39-LEDs', 'PD............', 'TESTING KEYWORD', '00011', 'TEST-0013', 2, 2, 1, 'public/seller/product_img/1531671788_3.jpeg', 4, 1, 2, NULL, 'public/seller/product_img/1531671788_2.jpg', '', '', '', '#000000', NULL, 1, 1, 1, 80.00, NULL, NULL, NULL, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-15 10:23:08', '2018-07-15 10:23:08'),
(3, 1, 1, 'STARGOLD EMERGENCY LIGHT WITH CHARGER 2', 'STARGOLD Emergency Lights', '<ul>\r\n	<li>Very Nice Design</li>\r\n	<li>Comfortable ti use</li>\r\n	<li>Carriable</li>\r\n	<li>Externel Bettery can use</li>\r\n</ul>', 'TESTING KEYWORD', '00011', 'TEST-0013', 2, 1, 1, 'public/seller/product_img/1531444493_2.jpg', 4, 2, 2, NULL, 'public/seller/product_img/1531444493_3.jpeg', 'public/seller/product_img/1531444493_4.jpg', 'public/seller/product_img/1531444493_aa.jpg', 'public/seller/product_img/1531444554_download.jpg', '#000000', '<p>PD///////////////////////////</p>', 1, 1, 1, 100.00, NULL, 25.00, NULL, 997, NULL, NULL, '<p>PD///////////////////////////</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-12 19:14:53', '2018-07-12 19:20:22'),
(4, 1, 1, 'STARGOLD EMERGENCY LIGHT WITH CHARGER 3', 'STARGOLD Emergency Lights', '<ul>\r\n	<li>Very Nice Design</li>\r\n	<li>Comfortable ti use</li>\r\n	<li>Carriable</li>\r\n	<li>Externel Bettery can use</li>\r\n</ul>', 'TESTING KEYWORD', '00011', 'TEST-0013', 2, 1, 1, 'public/seller/product_img/1531444493_2.jpg', 4, 2, 2, NULL, 'public/seller/product_img/1531444493_3.jpeg', 'public/seller/product_img/1531444493_4.jpg', 'public/seller/product_img/1531444493_aa.jpg', 'public/seller/product_img/1531444554_download.jpg', '#000000', '<p>PD///////////////////////////</p>', 1, 1, 1, 100.00, NULL, 25.00, NULL, 997, NULL, NULL, '<p>PD///////////////////////////</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-12 19:14:53', '2018-07-12 19:20:22'),
(5, 1, 1, 'STARGOLD EMERGENCY LIGHT WITH CHARGER 4', 'STARGOLD Emergency Lights', '<ul>\r\n	<li>Very Nice Design</li>\r\n	<li>Comfortable ti use</li>\r\n	<li>Carriable</li>\r\n	<li>Externel Bettery can use</li>\r\n</ul>', 'TESTING KEYWORD', '00011', 'TEST-0013', 2, 1, 1, 'public/seller/product_img/1531444493_2.jpg', 4, 2, 2, NULL, 'public/seller/product_img/1531444493_3.jpeg', 'public/seller/product_img/1531444493_4.jpg', 'public/seller/product_img/1531444493_aa.jpg', 'public/seller/product_img/1531444554_download.jpg', '#000000', '<p>PD///////////////////////////</p>', 1, 1, 1, 100.00, NULL, 25.00, NULL, 997, NULL, NULL, '<p>PD///////////////////////////</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-12 19:14:53', '2018-07-12 19:20:22'),
(6, 1, 1, 'STARGOLD EMERGENCY LIGHT WITH CHARGER 3', 'STARGOLD Emergency Lights 3', '<ul>\r\n	<li>Very Nice Design</li>\r\n	<li>Comfortable ti use</li>\r\n	<li>Carriable</li>\r\n	<li>Externel Bettery can use</li>\r\n</ul>', 'TESTING KEYWORD', '00011', 'TEST-0013', 2, 1, 1, 'public/seller/product_img/1531444493_2.jpg', 4, 2, 2, NULL, 'public/seller/product_img/1531444493_3.jpeg', 'public/seller/product_img/1531444493_4.jpg', 'public/seller/product_img/1531444493_aa.jpg', 'public/seller/product_img/1531444554_download.jpg', '#000000', '<p>PD///////////////////////////</p>', 1, 1, 1, 100.00, NULL, 25.00, NULL, 997, NULL, NULL, '<p>PD///////////////////////////</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-07-12 19:14:53', '2018-07-12 19:20:22'),
(7, 7, 1, 'UN LESITE SGS MACHINE', 'SGS MACHINE', 'MACHINARY', 'MACHINE', '00011', 'LST800', 1, 7, 1, 'public/seller/product_img/1531805719_1509026351.jpg', 3, 1, 1, 2, 'public/seller/product_img/1531805719_airqual2.png', 'public/seller/product_img/1531805719_p-KSN770-list-300x215.png', 'public/seller/product_img/1531805719_tig_welding.png', 'public/seller/product_img/1531805719_Tipo-Paquete-Condensado-por-Aire-Marca-Trane-de-5-TR-en-adelante.png', '#ff0080', 'SP...............', 1, 1, 1, 1233.00, 105.00, 25.00, 30.00, 85, '20', '800', 'CPD>>>>>>>>>>>>', 'OD>>>>>>>>>>>>>>>>', NULL, 16, 13, 16, 10, '10', 10, 15, 1, 1, 11.00, 22.00, 2, 2, 3, 19, 'SR..........................................', '2018-07-16 23:35:19', '2018-07-18 21:21:57');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `ship_address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_country` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_first_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_last_name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_zip` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `cus_id`, `ship_address_1`, `ship_address_2`, `ship_city`, `ship_country`, `ship_email`, `ship_first_name`, `ship_last_name`, `ship_phone`, `ship_state`, `ship_zip`, `created_at`, `updated_at`) VALUES
(1, 5, 'sahapur rupganj', NULL, 'naray', 'Bangladesh', 'tanveerfunclub@gmail.com', 'TANBHIR', 'HOSSAIN', '018292929', 'nana', '1460', '2018-07-11 23:16:08', '2018-07-11 23:16:08'),
(2, 5, 'sahapur rupganj', NULL, 'naray', NULL, 'tanveerfunclub@gmail.com', 'TANBHIR', 'HOSSAIN', '018292929', 'nana', '1460', '2018-07-12 19:45:20', '2018-07-12 19:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_cat_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `cat_id`, `sub_cat_name`, `sub_cat_desc`, `created_at`, `updated_at`) VALUES
(1, 1, 'Torch Light', 'Hand Torch Light', '2018-06-20 21:27:31', '2018-06-20 21:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Unit A', '2018-07-01 02:21:21', '2018-07-01 02:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=>buyer, 2=>seller, 3=>both',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `user_type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SELLER 1', 's1@s.com', '01911881811', '2', '$2y$10$jNGViiVOm/jO49dn9dHKs.MfNXrcICXBO2EXPrpuZBlCC3ZFilT4S', '1YL1JEEXFSwv0nOXvg5gFhGmKpb1bI9NvFHlm4NwiCFCMIGrn0LvWhwdEZIN', '2018-07-08 02:37:31', '2018-07-08 02:37:31'),
(2, 'TANBHIR HOSSAIN', 'tanveer@gmail.com', '01758578360', '1', '$2y$10$/yN.lzvQNt/TwGeJbwctgO9Kr4wsftiHenBkz3OwqSynLpeEwbDPa', 'SASj5KcCXEjaY9mPPH3r6cqcqQCajXQBB5oe4hXgMFuecTyRABJja5Rw6YIN', '2018-07-11 18:47:43', '2018-07-11 18:47:43'),
(5, 'TAKRIM MOHAMMAD', 'takrim@gmail.com', '029020202020', '1', '$2y$10$yOIGuNZNvbh3FkpiCFL/b.1o9bLCjh58m5KHT9OjrgeQmut/PHMDa', 'oAXo6lh7kgxz1SugroLoFn1PPT32Upag6yATUomuK3Gc6L1CdOP9epWWLe8T', '2018-07-11 19:20:59', '2018-07-11 19:20:59'),
(6, 'AFOJAL ENTERPRISE', 'afojalenterprise@gmail.com', '01112922', '2', '$2y$10$gVeFtzzal5LujlybGSCVrOdwy8J9b3eyhXKuO0oaQQ/QnOgk72gr.', 'Y9OIq0yAG9OTGDKtF9cDnz12fPHmr02zImyehlYB71Ei2y3LGP2DNfZ6RcpP', '2018-07-15 09:58:05', '2018-07-15 09:58:05'),
(7, 'AFOJAL CONSTRUCTION & ENGINEERING SDN BHD', 'afojalcons@gmail.com', '018292929', '2', '$2y$10$vzGiHNbFMp4zoBpQbdlp6eTo7dDSdHinxtmwRXSPzu/.pvp3bM2mS', 'GJxPhL0nWc8IJotEwmAySYyt5W6S9fbVWL3q2mkrfdfZMJMYYz7u4lmNvkpB', '2018-07-16 23:27:21', '2018-07-16 23:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `android_iphones`
--
ALTER TABLE `android_iphones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_suppliers`
--
ALTER TABLE `contact_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_bil_email_unique` (`bil_email`);

--
-- Indexes for table `customer_answers`
--
ALTER TABLE `customer_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_questions`
--
ALTER TABLE `customer_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_subscribers`
--
ALTER TABLE `email_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_subscribers_email_unique` (`email`);

--
-- Indexes for table `faqanswers`
--
ALTER TABLE `faqanswers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faquestions`
--
ALTER TABLE `faquestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_pages`
--
ALTER TABLE `footer_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footer_pages_added_by_foreign` (`added_by`);

--
-- Indexes for table `home_adverts`
--
ALTER TABLE `home_adverts`
  ADD PRIMARY KEY (`ads_id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacters`
--
ALTER TABLE `manufacters`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_links`
--
ALTER TABLE `page_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_models`
--
ALTER TABLE `page_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_models`
--
ALTER TABLE `product_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_admins`
--
ALTER TABLE `role_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_sellers`
--
ALTER TABLE `role_sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`);

--
-- Indexes for table `seller_products`
--
ALTER TABLE `seller_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `android_iphones`
--
ALTER TABLE `android_iphones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_suppliers`
--
ALTER TABLE `contact_suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_answers`
--
ALTER TABLE `customer_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_questions`
--
ALTER TABLE `customer_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_subscribers`
--
ALTER TABLE `email_subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faqanswers`
--
ALTER TABLE `faqanswers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faquestions`
--
ALTER TABLE `faquestions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_pages`
--
ALTER TABLE `footer_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home_adverts`
--
ALTER TABLE `home_adverts`
  MODIFY `ads_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manufacters`
--
ALTER TABLE `manufacters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_links`
--
ALTER TABLE `page_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `page_models`
--
ALTER TABLE `page_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_models`
--
ALTER TABLE `product_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_admins`
--
ALTER TABLE `role_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_sellers`
--
ALTER TABLE `role_sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller_products`
--
ALTER TABLE `seller_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `footer_pages`
--
ALTER TABLE `footer_pages`
  ADD CONSTRAINT `footer_pages_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
