-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 04:01 AM
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
-- Database: `seriramadan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `username`, `password`) VALUES
(1, 'Admin', 'admin@example.com', '08123456789', 'admin', '$2y$12$7MP6Y4pquhbbvv6GZIsKTOzh4LNR7cnbSTXNHpXL9AX1bRSAa8vku');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_service`
--

CREATE TABLE `customer_service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_service`
--

INSERT INTO `customer_service` (`id`, `name`, `email`, `phone`, `address`) VALUES
(1, 'cs', 'cs@gmail.com', '082280994738', 'jl. indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_couriers`
--

CREATE TABLE `delivery_couriers` (
  `id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_couriers`
--

INSERT INTO `delivery_couriers` (`id`, `shipper_id`, `name`, `address`, `email`, `phone`) VALUES
(1, 1, 'Joko', 'jabar', 'jabar', 'jabar'),
(2, 2, 'kuris sicepat', 'indonesia', 'sicepat@gmail.com', '082280994738');

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
-- Table structure for table `grocier_prices`
--

CREATE TABLE `grocier_prices` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landing_pages`
--

CREATE TABLE `landing_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `visitors` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `use_section_1` tinyint(1) NOT NULL DEFAULT 1,
  `section_1_title` text NOT NULL DEFAULT '-',
  `section_1_description` text NOT NULL DEFAULT '-',
  `section_1_media` varchar(255) NOT NULL DEFAULT '-',
  `use_section_2` tinyint(1) NOT NULL DEFAULT 1,
  `section_2_title` text NOT NULL DEFAULT '-',
  `section_2_description` text NOT NULL DEFAULT '-',
  `section_2_media` varchar(255) NOT NULL DEFAULT '-',
  `use_section_3` tinyint(1) NOT NULL DEFAULT 0,
  `section_3_title` text NOT NULL DEFAULT '-',
  `section_3_description` text NOT NULL DEFAULT '-',
  `section_3_media` varchar(255) NOT NULL DEFAULT '-',
  `use_section_4` tinyint(1) NOT NULL DEFAULT 0,
  `section_4_title` text NOT NULL DEFAULT '-',
  `section_4_description` text NOT NULL DEFAULT '-',
  `section_4_media` varchar(255) NOT NULL DEFAULT '-',
  `use_section_5` tinyint(1) NOT NULL DEFAULT 0,
  `section_5_title` text NOT NULL DEFAULT '-',
  `section_5_description` text NOT NULL DEFAULT '-',
  `section_5_media` varchar(255) NOT NULL DEFAULT '-',
  `use_section_6` tinyint(1) NOT NULL DEFAULT 0,
  `section_6_title` text NOT NULL DEFAULT '-',
  `section_6_description` text NOT NULL DEFAULT '-',
  `section_6_media` varchar(255) NOT NULL DEFAULT '-',
  `section_1_bg` varchar(255) NOT NULL DEFAULT 'white',
  `section_2_bg` varchar(255) NOT NULL DEFAULT 'white',
  `section_3_bg` varchar(255) NOT NULL DEFAULT 'white',
  `section_4_bg` varchar(255) NOT NULL DEFAULT 'white',
  `section_5_bg` varchar(255) NOT NULL DEFAULT 'white',
  `section_6_bg` varchar(255) NOT NULL DEFAULT 'white'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_pages`
--

INSERT INTO `landing_pages` (`id`, `name`, `visitors`, `product_id`, `slug`, `use_section_1`, `section_1_title`, `section_1_description`, `section_1_media`, `use_section_2`, `section_2_title`, `section_2_description`, `section_2_media`, `use_section_3`, `section_3_title`, `section_3_description`, `section_3_media`, `use_section_4`, `section_4_title`, `section_4_description`, `section_4_media`, `use_section_5`, `section_5_title`, `section_5_description`, `section_5_media`, `use_section_6`, `section_6_title`, `section_6_description`, `section_6_media`, `section_1_bg`, `section_2_bg`, `section_3_bg`, `section_4_bg`, `section_5_bg`, `section_6_bg`) VALUES
(7, 'gemasajaa', 24, 11, 'gemasajaa', 1, 'JUDUL SECTION 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'uploads/LcCBwsDCqjGjoXtVUPIgWpB1JaJCZS4ACBC3PLY1.png', 1, '<p>Detail Website</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'uploads/lnjCNa1TmSad4BsUDky2CO9QAjeNZCejXOPqSkNx.png', 1, 'JUDUL SECTION 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'uploads/OqCvy19kIOoQrgEaMwh07gYkUCpjsTkoINxHfgQd.png', 1, 'JUDUL SECTION 4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'uploads/xp5L57bZkgiNx6o3GtAiAgs5bkeCBTmHd4IaTWvz.png', 1, 'JUDUL SECTION 5', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'uploads/NjHVq7gE9VVaIdmeQCWVTtioBEKNbAuL5BZ0zFKO.png', 0, 'JUDUL SECTION 6', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'uploads/N2O3Ap2o7nLZzDVTilftUKsYc8d6FpBACb0Rmg0N.png', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff', '#ffffff');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_27_022316_create_landing_pages_table', 1),
(5, '2025_03_27_065202_create_sections_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_status` enum('paid','unpaid','refunded') NOT NULL DEFAULT 'unpaid',
  `orders_status` enum('pending','processing','shipped','delivered','canceled') NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) NOT NULL,
  `payment_data` varchar(255) NOT NULL,
  `payment_unique` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `shipping_cost` int(11) NOT NULL,
  `product_service_id` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_address_province` varchar(255) NOT NULL,
  `customer_address_district` varchar(255) NOT NULL,
  `customer_address_subdistrict` varchar(255) NOT NULL,
  `customer_address_village` varchar(255) NOT NULL,
  `customer_address_full` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date_created`, `product_id`, `total_price`, `payment_status`, `orders_status`, `payment_method`, `payment_data`, `payment_unique`, `shipper_id`, `courier_id`, `shipping_cost`, `product_service_id`, `tags`, `customer_name`, `customer_phone`, `customer_address_province`, `customer_address_district`, `customer_address_subdistrict`, `customer_address_village`, `customer_address_full`) VALUES
('ord-20250409-A7DHAQ', '2025-04-09 22:26:58', 11, 2261924, 'paid', 'delivered', 'transfer', '-', 391, 2, 2, 1231231, 12, 'Belum Selesai, Order Baru', 'RAHMAT AGEM PRATAMA', '082280994738', 'BENGKULU', 'KABUPATEN KAUR', 'MAJE', 'SUMBER HARAPAN', 'Jl. Kandang Mas 3 Rt 20 Rw 06'),
('ord-20250409-ZEBT12', '2025-04-09 22:27:41', 11, 2262249, 'unpaid', 'pending', 'transfer', '-', 716, 2, 2, 1231231, 12, 'Belum Selesai, Order Baru', 'RAHMAT AGEM PRATAMA', '082280994738', 'BENGKULU', 'KABUPATEN KAUR', 'MAJE', 'SUMBER HARAPAN', 'Jl. Kandang Mas 3 Rt 20 Rw 06'),
('ord-20250409-ZJPGQ2', '2025-04-09 22:28:05', 11, 1919077, 'paid', 'pending', 'transfer', '-', 978, 2, 2, 1231231, 12, 'Belum Selesai, Order Baru', 'RAHMAT AGEM PRATAMA', '082280994738', 'BENGKULU', 'KABUPATEN BENGKULU SELATAN', 'KOTA MANNA', 'PAGAR DEWA', 'Jl. Kandang Mas 3 Rt 20 Rw 06');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `variation_id`, `qty`) VALUES
(11, 'ord-20250409-A7DHAQ', 11, 34, 3),
(12, 'ord-20250409-ZEBT12', 11, 34, 3),
(13, 'ord-20250409-ZJPGQ2', 11, 34, 2);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `classification_id` int(11) NOT NULL,
  `cs_id` int(11) NOT NULL,
  `checkout_url` varchar(255) NOT NULL,
  `status` enum('active','nonactive') NOT NULL DEFAULT 'active',
  `description` text NOT NULL,
  `payment_transfer` tinyint(1) NOT NULL DEFAULT 0,
  `payment_cod` tinyint(1) NOT NULL DEFAULT 0,
  `payment_ewallet` tinyint(1) NOT NULL DEFAULT 0,
  `payment_transfer_notes` text NOT NULL DEFAULT '-',
  `payment_cod_notes` text NOT NULL DEFAULT '-',
  `payment_ewallet_notes` text NOT NULL DEFAULT '-',
  `normal_price` int(11) DEFAULT NULL,
  `hpp` int(11) NOT NULL,
  `variations` tinyint(1) NOT NULL DEFAULT 0,
  `stock` int(11) DEFAULT NULL,
  `region_province` varchar(255) NOT NULL,
  `region_district` varchar(255) NOT NULL,
  `region_subdistrict` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `category_id`, `classification_id`, `cs_id`, `checkout_url`, `status`, `description`, `payment_transfer`, `payment_cod`, `payment_ewallet`, `payment_transfer_notes`, `payment_cod_notes`, `payment_ewallet_notes`, `normal_price`, `hpp`, `variations`, `stock`, `region_province`, `region_district`, `region_subdistrict`) VALUES
(11, 'Diganti Test', 'asdasdasd', 2, 1, 1, 'sdasdasda', 'nonactive', 'asdasdasda', 1, 0, 1, 'Bayar pake transfer ya', '-', 'Gunakan Qris', 123123, 1231231, 1, 0, 'Malaysia', 'Malaysia', 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`) VALUES
(1, 'Laptop'),
(2, 'Baju'),
(3, 'Celana'),
(4, 'Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `product_classifications`
--

CREATE TABLE `product_classifications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_classifications`
--

INSERT INTO `product_classifications` (`id`, `name`) VALUES
(1, 'Baru');

-- --------------------------------------------------------

--
-- Table structure for table `product_insurance`
--

CREATE TABLE `product_insurance` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_insurance`
--

INSERT INTO `product_insurance` (`id`, `product_id`, `name`, `description`) VALUES
(12, 11, 'asdasdasdasd', '123asdasdasdasda');

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`id`, `url`, `product_id`) VALUES
(11, 'uploads/Mz1aNGpOVXpmARqBZXcDJDEJ2VEAXYwteCocmkAx.png', 11);

-- --------------------------------------------------------

--
-- Table structure for table `product_services`
--

CREATE TABLE `product_services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cost` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_services`
--

INSERT INTO `product_services` (`id`, `name`, `description`, `cost`, `product_id`) VALUES
(12, 'Standar', 'Pelayanan Standar', 0, 11);

-- --------------------------------------------------------

--
-- Table structure for table `product_shipping`
--

CREATE TABLE `product_shipping` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_shipping`
--

INSERT INTO `product_shipping` (`id`, `product_id`, `shipper_id`, `courier_id`, `cost`) VALUES
(20, 11, 2, 2, 1231231);

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` enum('active','nonactive') NOT NULL DEFAULT 'active',
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `name`, `description`, `price`, `stock`, `status`, `product_id`) VALUES
(34, '23asdasdasda', 'asdasdasdasda', 343434, 45, 'active', 11);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `landing_page_id` bigint(20) UNSIGNED NOT NULL,
  `section_number` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `bg_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('F1y4p4UPstFVvxdAizmPrmiaXGjA6KFS7JyUxRL5', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTVFReEhzRmRIWUd5QU4xeWFFOVJoSkh5UkpaTVhtVlhXeHBOaFhuZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sYW5kaW5nL2dlbWFzYWphYSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1745310993);

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

CREATE TABLE `shippers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shippers`
--

INSERT INTO `shippers` (`id`, `name`, `address`, `phone`, `email`) VALUES
(1, 'Jnt', 'indonesia', '082280994738', 'jnt@gmail.com'),
(2, 'Sicepat', 'indonesia', '082280994738', 'sicepat@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customer_service`
--
ALTER TABLE `customer_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_couriers`
--
ALTER TABLE `delivery_couriers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_deliverycouriers_shipper` (`shipper_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grocier_prices`
--
ALTER TABLE `grocier_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_pages`
--
ALTER TABLE `landing_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_landing_pages_to_products` (`product_id`);

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
  ADD KEY `fk_products` (`product_id`),
  ADD KEY `fk_shipper` (`shipper_id`),
  ADD KEY `fk_courier` (`courier_id`),
  ADD KEY `fk_product_service_id` (`product_service_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_details_orders` (`order_id`),
  ADD KEY `fk_orderdetails_product` (`product_id`),
  ADD KEY `fk_orderdetails_variation` (`variation_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categories` (`category_id`),
  ADD KEY `fk_classification` (`classification_id`),
  ADD KEY `fk_customerservice_product` (`cs_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_classifications`
--
ALTER TABLE `product_classifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_insurance`
--
ALTER TABLE `product_insurance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productinsurave_product` (`product_id`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product` (`product_id`);

--
-- Indexes for table `product_services`
--
ALTER TABLE `product_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_service_product` (`product_id`);

--
-- Indexes for table `product_shipping`
--
ALTER TABLE `product_shipping`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_shipping_product_shipping` (`product_id`),
  ADD KEY `fk_product_shipping_shipper` (`shipper_id`),
  ADD KEY `fk_product_shipping_courier` (`courier_id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_variation_product_variation` (`product_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_landing_page_id_foreign` (`landing_page_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_service`
--
ALTER TABLE `customer_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_couriers`
--
ALTER TABLE `delivery_couriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grocier_prices`
--
ALTER TABLE `grocier_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landing_pages`
--
ALTER TABLE `landing_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_classifications`
--
ALTER TABLE `product_classifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_insurance`
--
ALTER TABLE `product_insurance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_services`
--
ALTER TABLE `product_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_shipping`
--
ALTER TABLE `product_shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippers`
--
ALTER TABLE `shippers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery_couriers`
--
ALTER TABLE `delivery_couriers`
  ADD CONSTRAINT `fk_deliverycouriers_shipper` FOREIGN KEY (`shipper_id`) REFERENCES `shippers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `landing_pages`
--
ALTER TABLE `landing_pages`
  ADD CONSTRAINT `fk_landing_pages_to_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_courier` FOREIGN KEY (`courier_id`) REFERENCES `delivery_couriers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_service_id` FOREIGN KEY (`product_service_id`) REFERENCES `product_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shipper` FOREIGN KEY (`shipper_id`) REFERENCES `shippers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderdetails_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderdetails_variation` FOREIGN KEY (`variation_id`) REFERENCES `product_variations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_categories` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_classification` FOREIGN KEY (`classification_id`) REFERENCES `product_classifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_customerservice_product` FOREIGN KEY (`cs_id`) REFERENCES `customer_service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_insurance`
--
ALTER TABLE `product_insurance`
  ADD CONSTRAINT `fk_productinsurave_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_media`
--
ALTER TABLE `product_media`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_services`
--
ALTER TABLE `product_services`
  ADD CONSTRAINT `fk_product_service_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_shipping`
--
ALTER TABLE `product_shipping`
  ADD CONSTRAINT `fk_product_shipping_courier` FOREIGN KEY (`courier_id`) REFERENCES `delivery_couriers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_shipping_product_shipping` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_shipping_shipper` FOREIGN KEY (`shipper_id`) REFERENCES `shippers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD CONSTRAINT `fk_product_variation_product_variation` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_landing_page_id_foreign` FOREIGN KEY (`landing_page_id`) REFERENCES `landing_pages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
