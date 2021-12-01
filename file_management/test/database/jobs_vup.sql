-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2021 at 06:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs_vup`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accounts_type` tinyint(1) NOT NULL,
  `station_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `station_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_term` tinyint(1) DEFAULT NULL,
  `accounts_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accounts_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accounts_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accounts_cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accounts_fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accounts_lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accounts_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accounts_address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accounts_address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accounts_address3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accounts_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accounts_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ntn_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'mem_avatar.jpg',
  `cnic_pic_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'photo-id_a.jpg',
  `cnic_pic_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'photo-id_b.jpg',
  `company_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'no_image.jpg',
  `accounts_status` tinyint(1) NOT NULL DEFAULT 0,
  `verify_status` tinyint(1) NOT NULL DEFAULT 0,
  `profile_status` tinyint(1) NOT NULL DEFAULT 0,
  `accounts_agreement` tinyint(1) NOT NULL DEFAULT 0,
  `verified_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `accounts_type`, `station_code`, `station_name`, `payment_term`, `accounts_number`, `accounts_email`, `accounts_username`, `accounts_cnic`, `accounts_fname`, `accounts_lname`, `accounts_company`, `accounts_address1`, `accounts_address2`, `accounts_address3`, `city_name`, `zip_code`, `state_name`, `country_name`, `accounts_phone`, `accounts_mobile`, `ntn_number`, `profile_pic`, `cnic_pic_a`, `cnic_pic_b`, `company_logo`, `accounts_status`, `verify_status`, `profile_status`, `accounts_agreement`, `verified_by`, `activated_by`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(3, 1, '0042', 'LAHORE', 1, '10001', 'mnszaidyy@gmail.com', 'moniszaidi5', '3810129512815', 'Mudassar', 'Khan', 'Apx', '37 Raza Block', 'Allama Iqbal Town', 'imam bargah', 'Lahore', '44000', 'Punjab', 'Pakistan', '03165165155', '03165165155', NULL, 'profile_pic_1852315221.jpg', 'cnic_pic_a2108873192.jpg', 'cnic_pic_b843596839.jpg', 'logo_733389396.jpg', 1, 0, 1, 1, 'Wajahat', 'Wajahat', '2021-04-12 09:46:34', '2021-04-21 23:38:54', 'Web Registration', 'Wajahat', NULL),
(8, 0, '0453', 'BHAKKAR', 0, '10002', 'ptcbehal@gmail.com', 'fahad110', '3810178025565', 'Fahad', 'Ahmad', 'VUP Logistics', 'Jinnah Road Lahore', NULL, NULL, 'Lahore', '340005', 'Punjab', 'Pakistan', '03338058091', '03338058091', NULL, 'profile_pic_648170344.jpg', 'cnic_pic_a1942472056.jpg', 'cnic_pic_b1796333023.jpg', 'logo_338050184.jpg', 1, 0, 1, 1, 'Wajahat', 'Wajahat', '2021-04-22 00:44:44', '2021-04-22 00:53:31', 'Web Registration', 'Wajahat', NULL),
(9, 0, NULL, NULL, NULL, NULL, 'ahmad07malik92@gmail.com', 'managervup1', '3820434556079', 'Mohammad', 'Zain Naqvi', 'APX Logistics', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03338055543', '03156670092', NULL, 'mem_avatar.jpg', 'photo-id_a.jpg', 'photo-id_b.jpg', 'no_image.jpg', 0, 0, 0, 1, NULL, NULL, '2021-04-22 01:13:45', '2021-04-22 01:13:45', 'Web Registration', NULL, NULL),
(10, 0, '042', 'LAYYAH', 0, '10003', 'ahmad007malik92@gmail.com', 'managervup01', '3820434556335', 'Mohammad', 'Zain Naqvi', 'VUP Logistics', 'Riwand Road Lahore', NULL, NULL, 'Lahore', '340005', 'Punjab', 'Pakistan', '03338055002', '03156670033', NULL, 'profile_pic_1345172121.jpg', 'cnic_pic_a1453687493.jpg', 'cnic_pic_b2009499466.jpg', 'logo_1572438032.webp', 1, 0, 1, 1, 'Wajahat', 'Wajahat', '2021-04-22 01:21:30', '2021-04-22 01:25:35', 'Web Registration', 'Wajahat', NULL),
(11, 0, NULL, NULL, NULL, NULL, 'malikv214@gmail.com', 'waqar119', '3810162801919', 'waqar', 'hussain', 'APX Logistics', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0453232284', '03407954119', NULL, 'mem_avatar.jpg', 'photo-id_a.jpg', 'photo-id_b.jpg', 'no_image.jpg', 0, 0, 0, 1, NULL, NULL, '2021-08-05 22:00:27', '2021-08-05 22:00:27', 'Web Registration', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `module_name`, `action_name`, `user_name`, `created_at`, `updated_at`) VALUES
(1, 'Shipment Create', 'Visited Create Shipment Page', 'Monis', '2021-04-17 10:32:16', '2021-04-17 10:32:16'),
(2, 'Shipment Create', 'Visited Create Shipment Page', 'Monis', '2021-04-17 10:37:52', '2021-04-17 10:37:52'),
(3, 'Shipment Created', 'Created new Shipment', 'Monis', '2021-04-17 10:44:31', '2021-04-17 10:44:31'),
(4, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 10:44:32', '2021-04-17 10:44:32'),
(5, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 10:45:12', '2021-04-17 10:45:12'),
(6, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 10:45:39', '2021-04-17 10:45:39'),
(7, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 10:46:33', '2021-04-17 10:46:33'),
(8, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 10:55:51', '2021-04-17 10:55:51'),
(9, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 10:56:53', '2021-04-17 10:56:53'),
(10, 'Shipment Create', 'Visited Create Shipment Page', 'Dilber', '2021-04-17 11:12:27', '2021-04-17 11:12:27'),
(11, 'Shipment Created', 'Created new Shipment', 'Dilber', '2021-04-17 11:20:45', '2021-04-17 11:20:45'),
(12, 'Shipment Show', 'Checked Shipment Record', 'Dilber', '2021-04-17 11:20:46', '2021-04-17 11:20:46'),
(13, 'Shipment Show', 'Checked Shipment Record', 'Dilber', '2021-04-17 11:21:27', '2021-04-17 11:21:27'),
(14, 'Shipment Show', 'Checked Shipment Record', 'Dilber', '2021-04-17 11:27:57', '2021-04-17 11:27:57'),
(15, 'Shipment Show', 'Checked Shipment Record', 'Dilber', '2021-04-17 11:31:35', '2021-04-17 11:31:35'),
(16, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 11:34:07', '2021-04-17 11:34:07'),
(17, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 11:34:47', '2021-04-17 11:34:47'),
(18, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 11:36:06', '2021-04-17 11:36:06'),
(19, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 11:37:11', '2021-04-17 11:37:11'),
(20, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 11:40:26', '2021-04-17 11:40:26'),
(21, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 11:41:04', '2021-04-17 11:41:04'),
(22, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 11:53:36', '2021-04-17 11:53:36'),
(23, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 11:55:57', '2021-04-17 11:55:57'),
(24, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 11:57:06', '2021-04-17 11:57:06'),
(25, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 11:58:26', '2021-04-17 11:58:26'),
(26, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 12:00:21', '2021-04-17 12:00:21'),
(27, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 12:02:10', '2021-04-17 12:02:10'),
(28, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 12:02:58', '2021-04-17 12:02:58'),
(29, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 12:05:39', '2021-04-17 12:05:39'),
(30, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 12:07:38', '2021-04-17 12:07:38'),
(31, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 12:09:29', '2021-04-17 12:09:29'),
(32, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 12:10:00', '2021-04-17 12:10:00'),
(33, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 12:11:53', '2021-04-17 12:11:53'),
(34, 'Shipment Show', 'Checked Shipment Record', 'Monis', '2021-04-17 12:12:37', '2021-04-17 12:12:37'),
(35, 'Role index', 'Visited Role index Page', 'Monis', '2021-04-20 00:30:44', '2021-04-20 00:30:44'),
(36, 'Role Edited', 'Visited Role Edit Page', 'Monis', '2021-04-20 00:30:50', '2021-04-20 00:30:50'),
(37, 'Role updated', 'Edited a Role Name', 'Monis', '2021-04-20 00:31:23', '2021-04-20 00:31:23'),
(38, 'Role index', 'Visited Role index Page', 'Monis', '2021-04-20 00:31:23', '2021-04-20 00:31:23'),
(39, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 00:31:38', '2021-04-20 00:31:38'),
(40, 'User Edit', 'Visited User Edit Page', 'Monis', '2021-04-20 00:31:44', '2021-04-20 00:31:44'),
(41, 'User updated', 'Edited A User Record', 'Monis', '2021-04-20 00:31:56', '2021-04-20 00:31:56'),
(42, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 00:31:57', '2021-04-20 00:31:57'),
(43, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 00:35:19', '2021-04-20 00:35:19'),
(44, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 00:35:29', '2021-04-20 00:35:29'),
(45, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 00:35:33', '2021-04-20 00:35:33'),
(46, 'Shipment Create', 'Visited Create Shipment Page', 'Monis', '2021-04-20 00:35:40', '2021-04-20 00:35:40'),
(47, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 00:36:08', '2021-04-20 00:36:08'),
(48, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Monis', '2021-04-20 00:36:13', '2021-04-20 00:36:13'),
(49, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 00:36:17', '2021-04-20 00:36:17'),
(50, 'Shipment Datewise', 'Visited Shipment Datewise', 'Monis', '2021-04-20 00:36:20', '2021-04-20 00:36:20'),
(51, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 00:37:43', '2021-04-20 00:37:43'),
(52, 'Station Show', 'Checked Station Record', 'Monis', '2021-04-20 00:37:55', '2021-04-20 00:37:55'),
(53, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 00:37:59', '2021-04-20 00:37:59'),
(54, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 00:38:09', '2021-04-20 00:38:09'),
(55, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 00:40:00', '2021-04-20 00:40:00'),
(56, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 00:40:08', '2021-04-20 00:40:08'),
(57, 'Country index', 'Visited Country Index', 'Monis', '2021-04-20 00:54:27', '2021-04-20 00:54:27'),
(58, 'Country index', 'Visited Country Index', 'Monis', '2021-04-20 00:55:12', '2021-04-20 00:55:12'),
(59, 'Country Create', 'Visited Create Country Page', 'Monis', '2021-04-20 00:55:22', '2021-04-20 00:55:22'),
(60, 'Country index', 'Visited Country Index', 'Monis', '2021-04-20 00:55:32', '2021-04-20 00:55:32'),
(61, 'Country Upload', 'Visited Country Upload Page', 'Monis', '2021-04-20 00:55:46', '2021-04-20 00:55:46'),
(62, 'Country Upload', 'Visited Country Upload Page', 'Monis', '2021-04-20 00:55:49', '2021-04-20 00:55:49'),
(63, 'Country index', 'Visited Country Index', 'Monis', '2021-04-20 01:00:50', '2021-04-20 01:00:50'),
(64, 'Country Create', 'Visited Create Country Page', 'Monis', '2021-04-20 01:00:56', '2021-04-20 01:00:56'),
(65, 'Country index', 'Visited Country Index', 'Monis', '2021-04-20 01:01:08', '2021-04-20 01:01:08'),
(66, 'State index', 'Visited State Index', 'Monis', '2021-04-20 01:01:59', '2021-04-20 01:01:59'),
(67, 'State index', 'Visited State Index', 'Monis', '2021-04-20 01:02:17', '2021-04-20 01:02:17'),
(68, 'State Upload', 'Visited State Upload Page', 'Monis', '2021-04-20 01:02:54', '2021-04-20 01:02:54'),
(69, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 01:03:04', '2021-04-20 01:03:04'),
(70, 'Station Upload', 'Visited Station Upload Page', 'Monis', '2021-04-20 01:03:09', '2021-04-20 01:03:09'),
(71, 'Shipment Create', 'Visited Create Shipment Page', 'Monis', '2021-04-20 01:03:15', '2021-04-20 01:03:15'),
(72, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:03:25', '2021-04-20 01:03:25'),
(73, 'Shipment Create', 'Visited Create Shipment Page', 'Monis', '2021-04-20 01:03:39', '2021-04-20 01:03:39'),
(74, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:03:43', '2021-04-20 01:03:43'),
(75, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:05:10', '2021-04-20 01:05:10'),
(76, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 01:19:43', '2021-04-20 01:19:43'),
(77, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 01:22:18', '2021-04-20 01:22:18'),
(78, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 01:22:49', '2021-04-20 01:22:49'),
(79, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 01:22:56', '2021-04-20 01:22:56'),
(80, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 01:24:45', '2021-04-20 01:24:45'),
(81, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 01:25:35', '2021-04-20 01:25:35'),
(82, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 01:26:52', '2021-04-20 01:26:52'),
(83, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:27:01', '2021-04-20 01:27:01'),
(84, 'User Create', 'Visited User Create Page', 'Monis', '2021-04-20 01:27:38', '2021-04-20 01:27:38'),
(85, 'Shipment Create', 'Visited Create Shipment Page', 'Monis', '2021-04-20 01:28:37', '2021-04-20 01:28:37'),
(86, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:30:24', '2021-04-20 01:30:24'),
(87, 'User Create', 'Visited User Create Page', 'Monis', '2021-04-20 01:30:30', '2021-04-20 01:30:30'),
(88, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Monis', '2021-04-20 01:30:36', '2021-04-20 01:30:36'),
(89, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Monis', '2021-04-20 01:31:15', '2021-04-20 01:31:15'),
(90, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Monis', '2021-04-20 01:31:37', '2021-04-20 01:31:37'),
(91, 'Shipmentstatus Create', 'Visited Create Shipmentstatus Page', 'Monis', '2021-04-20 01:31:41', '2021-04-20 01:31:41'),
(92, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Monis', '2021-04-20 01:31:47', '2021-04-20 01:31:47'),
(93, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:31:50', '2021-04-20 01:31:50'),
(94, 'User Create', 'Visited User Create Page', 'Monis', '2021-04-20 01:31:53', '2021-04-20 01:31:53'),
(95, 'Shipment Datewise', 'Visited Shipment Datewise', 'Monis', '2021-04-20 01:32:01', '2021-04-20 01:32:01'),
(96, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Monis', '2021-04-20 01:32:13', '2021-04-20 01:32:13'),
(97, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Monis', '2021-04-20 01:33:17', '2021-04-20 01:33:17'),
(98, 'Shipment Create', 'Visited Create Shipment Page', 'Monis', '2021-04-20 01:33:20', '2021-04-20 01:33:20'),
(99, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:33:35', '2021-04-20 01:33:35'),
(100, 'User Create', 'Visited User Create Page', 'Monis', '2021-04-20 01:33:38', '2021-04-20 01:33:38'),
(101, 'Account Create', 'Visited Create Account Page', 'Monis', '2021-04-20 01:33:45', '2021-04-20 01:33:45'),
(102, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:34:00', '2021-04-20 01:34:00'),
(103, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:35:03', '2021-04-20 01:35:03'),
(104, 'Account Create', 'Visited Create Account Page', 'Monis', '2021-04-20 01:35:08', '2021-04-20 01:35:08'),
(105, 'Account Create', 'Visited Create Account Page', 'Monis', '2021-04-20 01:35:16', '2021-04-20 01:35:16'),
(106, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:35:24', '2021-04-20 01:35:24'),
(107, 'Account index', 'Visited Account Index', 'Monis', '2021-04-20 01:35:27', '2021-04-20 01:35:27'),
(108, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:35:50', '2021-04-20 01:35:50'),
(109, 'User Create', 'Visited User Create Page', 'Monis', '2021-04-20 01:35:55', '2021-04-20 01:35:55'),
(110, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:36:02', '2021-04-20 01:36:02'),
(111, 'User Create', 'Visited User Create Page', 'Monis', '2021-04-20 01:36:05', '2021-04-20 01:36:05'),
(112, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:36:11', '2021-04-20 01:36:11'),
(113, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:36:16', '2021-04-20 01:36:16'),
(114, 'Company Create', 'Visited Create Company Page', 'Monis', '2021-04-20 01:36:29', '2021-04-20 01:36:29'),
(115, 'Airwaybill index', 'Visited Airwaybill Index', 'Monis', '2021-04-20 01:36:35', '2021-04-20 01:36:35'),
(116, 'Service index', 'Visited Service Index', 'Monis', '2021-04-20 01:36:44', '2021-04-20 01:36:44'),
(117, 'Service index', 'Visited Service Index', 'Monis', '2021-04-20 01:38:06', '2021-04-20 01:38:06'),
(118, 'Shipmenttype index', 'Visited Shipmenttype Index', 'Monis', '2021-04-20 01:38:12', '2021-04-20 01:38:12'),
(119, 'Shipmenttype index', 'Visited Shipmenttype Index', 'Monis', '2021-04-20 01:39:19', '2021-04-20 01:39:19'),
(120, 'Shipmenttype Create', 'Visited Create Shipmenttype Page', 'Monis', '2021-04-20 01:39:26', '2021-04-20 01:39:26'),
(121, 'Shipmentmode index', 'Visited Shipmentmode Index', 'Monis', '2021-04-20 01:39:40', '2021-04-20 01:39:40'),
(122, 'Shipmentmode index', 'Visited Shipmentmode Index', 'Monis', '2021-04-20 01:41:02', '2021-04-20 01:41:02'),
(123, 'Title index', 'Visited Title Index', 'Monis', '2021-04-20 01:41:22', '2021-04-20 01:41:22'),
(124, 'Title index', 'Visited Title Index', 'Monis', '2021-04-20 01:42:09', '2021-04-20 01:42:09'),
(125, 'Currency index', 'Visited Currency Index', 'Monis', '2021-04-20 01:42:21', '2021-04-20 01:42:21'),
(126, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 01:43:08', '2021-04-20 01:43:08'),
(127, 'Station Create', 'Visited Create Station Page', 'Monis', '2021-04-20 01:43:10', '2021-04-20 01:43:10'),
(128, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:43:14', '2021-04-20 01:43:14'),
(129, 'User Create', 'Visited User Create Page', 'Monis', '2021-04-20 01:43:16', '2021-04-20 01:43:16'),
(130, 'User Create', 'Visited User Create Page', 'Monis', '2021-04-20 01:47:00', '2021-04-20 01:47:00'),
(131, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:48:48', '2021-04-20 01:48:48'),
(132, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:48:52', '2021-04-20 01:48:52'),
(133, 'Company Create', 'Visited Create Company Page', 'Monis', '2021-04-20 01:49:02', '2021-04-20 01:49:02'),
(134, 'Service index', 'Visited Service Index', 'Monis', '2021-04-20 01:49:06', '2021-04-20 01:49:06'),
(135, 'Title index', 'Visited Title Index', 'Monis', '2021-04-20 01:49:10', '2021-04-20 01:49:10'),
(136, 'Currency index', 'Visited Currency Index', 'Monis', '2021-04-20 01:49:15', '2021-04-20 01:49:15'),
(137, 'Currency index', 'Visited Currency Index', 'Monis', '2021-04-20 01:49:58', '2021-04-20 01:49:58'),
(138, 'Currency Create', 'Visited Create Currency Page', 'Monis', '2021-04-20 01:50:03', '2021-04-20 01:50:03'),
(139, 'Location index', 'Visited Location Index', 'Monis', '2021-04-20 01:50:10', '2021-04-20 01:50:10'),
(140, 'Location index', 'Visited Location Index', 'Monis', '2021-04-20 01:50:49', '2021-04-20 01:50:49'),
(141, 'Location index', 'Visited Location Index', 'Monis', '2021-04-20 01:51:09', '2021-04-20 01:51:09'),
(142, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Monis', '2021-04-20 01:51:15', '2021-04-20 01:51:15'),
(143, 'Shipmentstatus Create', 'Visited Create Shipmentstatus Page', 'Monis', '2021-04-20 01:51:20', '2021-04-20 01:51:20'),
(144, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Monis', '2021-04-20 01:51:30', '2021-04-20 01:51:30'),
(145, 'Country index', 'Visited Country Index', 'Monis', '2021-04-20 01:51:38', '2021-04-20 01:51:38'),
(146, 'State index', 'Visited State Index', 'Monis', '2021-04-20 01:51:45', '2021-04-20 01:51:45'),
(147, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 01:52:07', '2021-04-20 01:52:07'),
(148, 'Debitsource index', 'Visited Debitsource Index', 'Monis', '2021-04-20 01:52:22', '2021-04-20 01:52:22'),
(149, 'Debitsource index', 'Visited Debitsource Index', 'Monis', '2021-04-20 01:53:03', '2021-04-20 01:53:03'),
(150, 'Accountserial index', 'Visited Accountserial Index', 'Monis', '2021-04-20 01:53:11', '2021-04-20 01:53:11'),
(151, 'Accountserial index', 'Visited Accountserial Index', 'Monis', '2021-04-20 01:54:11', '2021-04-20 01:54:11'),
(152, 'Accountserial Create', 'Visited Create Accountserial Page', 'Monis', '2021-04-20 01:54:22', '2021-04-20 01:54:22'),
(153, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 01:56:00', '2021-04-20 01:56:00'),
(154, 'User Create', 'Visited User Create Page', 'Monis', '2021-04-20 01:56:02', '2021-04-20 01:56:02'),
(155, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 04:03:23', '2021-04-20 04:03:23'),
(156, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 04:28:13', '2021-04-20 04:28:13'),
(157, 'Station Create', 'Visited Create Station Page', 'Monis', '2021-04-20 04:28:20', '2021-04-20 04:28:20'),
(158, 'Station Created', 'Created new Station', 'Monis', '2021-04-20 04:28:41', '2021-04-20 04:28:41'),
(159, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 04:28:41', '2021-04-20 04:28:41'),
(160, 'Station Create', 'Visited Create Station Page', 'Monis', '2021-04-20 04:28:47', '2021-04-20 04:28:47'),
(161, 'Station Created', 'Created new Station', 'Monis', '2021-04-20 04:29:05', '2021-04-20 04:29:05'),
(162, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 04:29:06', '2021-04-20 04:29:06'),
(163, 'Station', 'Trashed Multiple stations', 'Monis', '2021-04-20 04:29:27', '2021-04-20 04:29:27'),
(164, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 04:29:28', '2021-04-20 04:29:28'),
(165, 'Station Create', 'Visited Create Station Page', 'Monis', '2021-04-20 04:29:30', '2021-04-20 04:29:30'),
(166, 'Station Created', 'Created new Station', 'Monis', '2021-04-20 04:29:42', '2021-04-20 04:29:42'),
(167, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 04:29:42', '2021-04-20 04:29:42'),
(168, 'Station Create', 'Visited Create Station Page', 'Monis', '2021-04-20 04:29:51', '2021-04-20 04:29:51'),
(169, 'Station Created', 'Created new Station', 'Monis', '2021-04-20 04:30:03', '2021-04-20 04:30:03'),
(170, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 04:30:03', '2021-04-20 04:30:03'),
(171, 'Station Edit', 'Visited Station Edit Page', 'Monis', '2021-04-20 04:30:19', '2021-04-20 04:30:19'),
(172, 'Station Updated', 'Edited a Station', 'Monis', '2021-04-20 04:30:24', '2021-04-20 04:30:24'),
(173, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 04:30:24', '2021-04-20 04:30:24'),
(174, 'Station Create', 'Visited Create Station Page', 'Monis', '2021-04-20 04:30:29', '2021-04-20 04:30:29'),
(175, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 04:30:41', '2021-04-20 04:30:41'),
(176, 'Station Create', 'Visited Create Station Page', 'Monis', '2021-04-20 04:30:49', '2021-04-20 04:30:49'),
(177, 'Station Created', 'Created new Station', 'Monis', '2021-04-20 04:31:03', '2021-04-20 04:31:03'),
(178, 'Station index', 'Visited Station Index', 'Monis', '2021-04-20 04:31:04', '2021-04-20 04:31:04'),
(179, 'User Index', 'Visited User Index Page', 'Monis', '2021-04-20 04:31:09', '2021-04-20 04:31:09'),
(180, 'User Create', 'Visited User Create Page', 'Monis', '2021-04-20 04:31:11', '2021-04-20 04:31:11'),
(181, 'Shipment Create', 'Visited Create Shipment Page', 'Monis', '2021-04-20 04:31:37', '2021-04-20 04:31:37'),
(182, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-20 04:35:51', '2021-04-20 04:35:51'),
(183, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-20 04:37:03', '2021-04-20 04:37:03'),
(184, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-20 04:53:05', '2021-04-20 04:53:05'),
(185, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-20 04:57:59', '2021-04-20 04:57:59'),
(186, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-20 04:58:06', '2021-04-20 04:58:06'),
(187, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-20 04:58:38', '2021-04-20 04:58:38'),
(188, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 04:58:39', '2021-04-20 04:58:39'),
(189, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 04:58:46', '2021-04-20 04:58:46'),
(190, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-20 05:01:43', '2021-04-20 05:01:43'),
(191, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-20 05:02:24', '2021-04-20 05:02:24'),
(192, 'Shipment Created', 'Created new Shipment', 'Wajahat', '2021-04-20 05:15:07', '2021-04-20 05:15:07'),
(193, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-20 05:15:07', '2021-04-20 05:15:07'),
(194, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-20 05:17:18', '2021-04-20 05:17:18'),
(195, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-20 05:18:48', '2021-04-20 05:18:48'),
(196, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 05:19:05', '2021-04-20 05:19:05'),
(197, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 05:19:18', '2021-04-20 05:19:18'),
(198, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 05:29:16', '2021-04-20 05:29:16'),
(199, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 05:31:23', '2021-04-20 05:31:23'),
(200, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 05:32:11', '2021-04-20 05:32:11'),
(201, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 05:32:16', '2021-04-20 05:32:16'),
(202, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 05:33:42', '2021-04-20 05:33:42'),
(203, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 05:33:57', '2021-04-20 05:33:57'),
(204, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 05:34:21', '2021-04-20 05:34:21'),
(205, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 05:40:59', '2021-04-20 05:40:59'),
(206, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 05:42:12', '2021-04-20 05:42:12'),
(207, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-20 05:46:58', '2021-04-20 05:46:58'),
(208, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 05:47:08', '2021-04-20 05:47:08'),
(209, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 05:47:19', '2021-04-20 05:47:19'),
(210, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-20 05:48:02', '2021-04-20 05:48:02'),
(211, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-20 05:48:04', '2021-04-20 05:48:04'),
(212, 'Station Created', 'Created new Station', 'Wajahat', '2021-04-20 05:50:40', '2021-04-20 05:50:40'),
(213, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-20 05:50:41', '2021-04-20 05:50:41'),
(214, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-20 05:52:31', '2021-04-20 05:52:31'),
(215, 'Station Created', 'Created new Station', 'Wajahat', '2021-04-20 05:52:47', '2021-04-20 05:52:47'),
(216, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-20 05:52:48', '2021-04-20 05:52:48'),
(217, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-20 05:53:29', '2021-04-20 05:53:29'),
(218, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-20 05:55:45', '2021-04-20 05:55:45'),
(219, 'Station Show', 'Checked Station Record', 'Wajahat', '2021-04-20 05:55:59', '2021-04-20 05:55:59'),
(220, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-20 05:56:09', '2021-04-20 05:56:09'),
(221, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 05:56:17', '2021-04-20 05:56:17'),
(222, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 05:56:19', '2021-04-20 05:56:19'),
(223, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-20 12:04:20', '2021-04-20 12:04:20'),
(224, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-20 12:04:24', '2021-04-20 12:04:24'),
(225, 'Station Created', 'Created new Station', 'Wajahat', '2021-04-20 12:04:46', '2021-04-20 12:04:46'),
(226, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-20 12:04:46', '2021-04-20 12:04:46'),
(227, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 12:05:01', '2021-04-20 12:05:01'),
(228, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 12:05:06', '2021-04-20 12:05:06'),
(229, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-20 12:42:22', '2021-04-20 12:42:22'),
(230, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-20 12:47:29', '2021-04-20 12:47:29'),
(231, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-20 12:49:04', '2021-04-20 12:49:04'),
(232, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-20 12:49:17', '2021-04-20 12:49:17'),
(233, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 12:49:42', '2021-04-20 12:49:42'),
(234, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 12:49:51', '2021-04-20 12:49:51'),
(235, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 12:49:56', '2021-04-20 12:49:56'),
(236, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 12:50:04', '2021-04-20 12:50:04'),
(237, 'Account Create', 'Visited Create Account Page', 'Wajahat', '2021-04-20 12:50:11', '2021-04-20 12:50:11'),
(238, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 12:50:40', '2021-04-20 12:50:40'),
(239, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 12:50:46', '2021-04-20 12:50:46'),
(240, 'Shipment Create', 'Visited Create Shipment Page', 'test', '2021-04-20 12:51:38', '2021-04-20 12:51:38'),
(241, 'Shipment Create', 'Visited Create Shipment Page', 'test', '2021-04-20 12:57:20', '2021-04-20 12:57:20'),
(242, 'Shipment Create', 'Visited Create Shipment Page', 'test', '2021-04-20 12:57:45', '2021-04-20 12:57:45'),
(243, 'Shipment Create', 'Visited Create Shipment Page', 'test', '2021-04-20 22:57:59', '2021-04-20 22:57:59'),
(244, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-20 23:15:09', '2021-04-20 23:15:09'),
(245, 'Station Show', 'Checked Station Record', 'Wajahat', '2021-04-20 23:15:16', '2021-04-20 23:15:16'),
(246, 'Station Edit', 'Visited Station Edit Page', 'Wajahat', '2021-04-20 23:15:20', '2021-04-20 23:15:20'),
(247, 'Station Updated', 'Edited a Station', 'Wajahat', '2021-04-20 23:15:24', '2021-04-20 23:15:24'),
(248, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-20 23:15:24', '2021-04-20 23:15:24'),
(249, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 23:15:46', '2021-04-20 23:15:46'),
(250, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 23:16:01', '2021-04-20 23:16:01'),
(251, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 23:21:05', '2021-04-20 23:21:05'),
(252, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-20 23:21:13', '2021-04-20 23:21:13'),
(253, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-20 23:21:26', '2021-04-20 23:21:26'),
(254, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 23:21:37', '2021-04-20 23:21:37'),
(255, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-20 23:21:58', '2021-04-20 23:21:58'),
(256, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-20 23:22:16', '2021-04-20 23:22:16'),
(257, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 23:22:17', '2021-04-20 23:22:17'),
(258, 'My User', 'Visited My User Index Page', 'Dilber', '2021-04-20 23:22:55', '2021-04-20 23:22:55'),
(259, 'Shipment Create', 'Visited Create Shipment Page', 'Dilber', '2021-04-20 23:23:58', '2021-04-20 23:23:58'),
(260, 'Shipment Create', 'Visited Create Shipment Page', 'Dilber', '2021-04-20 23:24:19', '2021-04-20 23:24:19'),
(261, 'Shipment Datewise', 'Visited Shipment Datewise', 'Dilber', '2021-04-20 23:25:00', '2021-04-20 23:25:00'),
(262, 'Shipment Datewise', 'Visited Shipment Datewise', 'Dilber', '2021-04-20 23:25:05', '2021-04-20 23:25:05'),
(263, 'My User', 'Visited My User Index Page', 'Dilber', '2021-04-20 23:25:18', '2021-04-20 23:25:18'),
(264, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-20 23:27:39', '2021-04-20 23:27:39'),
(265, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-20 23:27:42', '2021-04-20 23:27:42'),
(266, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-20 23:29:18', '2021-04-20 23:29:18'),
(267, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-20 23:34:11', '2021-04-20 23:34:11'),
(268, 'Role create', 'Visited Role Create Page', 'Wajahat', '2021-04-20 23:34:19', '2021-04-20 23:34:19'),
(269, 'Role create', 'Visited Role Create Page', 'Wajahat', '2021-04-20 23:34:41', '2021-04-20 23:34:41'),
(270, 'Role create', 'Visited Role Create Page', 'Wajahat', '2021-04-20 23:38:51', '2021-04-20 23:38:51'),
(271, 'Role create', 'Visited Role Create Page', 'Wajahat', '2021-04-20 23:40:56', '2021-04-20 23:40:56'),
(272, 'Role create', 'Visited Role Create Page', 'Wajahat', '2021-04-20 23:41:11', '2021-04-20 23:41:11'),
(273, 'My User', 'Visited My User Index Page', 'Dilber', '2021-04-20 23:44:41', '2021-04-20 23:44:41'),
(274, 'Shipment Create', 'Visited Create Shipment Page', 'Dilber', '2021-04-20 23:49:23', '2021-04-20 23:49:23'),
(275, 'Shipment Create', 'Visited Create Shipment Page', 'Dilber', '2021-04-20 23:54:57', '2021-04-20 23:54:57'),
(276, 'Shipment Datewise', 'Visited Shipment Datewise', 'Dilber', '2021-04-20 23:55:20', '2021-04-20 23:55:20'),
(277, 'My User', 'Visited My User Index Page', 'Dilber', '2021-04-21 00:14:17', '2021-04-21 00:14:17'),
(278, 'Shipment Create', 'Visited Create Shipment Page', 'Dilber', '2021-04-21 00:16:31', '2021-04-21 00:16:31'),
(279, 'Shipment Datewise', 'Visited Shipment Datewise', 'Dilber', '2021-04-21 00:16:40', '2021-04-21 00:16:40'),
(280, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Dilber', '2021-04-21 00:16:50', '2021-04-21 00:16:50'),
(281, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:17:05', '2021-04-21 00:17:05'),
(282, 'Shipment Datewise', 'Visited Shipment Datewise', 'Dilber', '2021-04-21 00:30:36', '2021-04-21 00:30:36'),
(283, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-21 00:32:16', '2021-04-21 00:32:16'),
(284, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:32:23', '2021-04-21 00:32:23'),
(285, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:34:31', '2021-04-21 00:34:31'),
(286, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 00:37:00', '2021-04-21 00:37:00'),
(287, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 00:37:25', '2021-04-21 00:37:25'),
(288, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 00:40:02', '2021-04-21 00:40:02'),
(289, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:40:12', '2021-04-21 00:40:12'),
(290, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 00:40:49', '2021-04-21 00:40:49'),
(291, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:41:05', '2021-04-21 00:41:05'),
(292, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-21 00:41:15', '2021-04-21 00:41:15'),
(293, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:41:47', '2021-04-21 00:41:47'),
(294, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-21 00:41:53', '2021-04-21 00:41:53'),
(295, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:42:01', '2021-04-21 00:42:01'),
(296, 'Shipment Datewise', 'Visited Shipment Datewise', 'Wajahat', '2021-04-21 00:42:06', '2021-04-21 00:42:06'),
(297, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-21 00:42:15', '2021-04-21 00:42:15'),
(298, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-21 00:42:20', '2021-04-21 00:42:20'),
(299, 'Shipment', 'Trashed Multiple shipments', 'Wajahat', '2021-04-21 00:42:33', '2021-04-21 00:42:33'),
(300, 'Shipment Deleted', 'Checked Shipment Trash', 'Wajahat', '2021-04-21 00:42:36', '2021-04-21 00:42:36'),
(301, 'Shipment Restore', 'Restored Single Shipment', 'Wajahat', '2021-04-21 00:42:39', '2021-04-21 00:42:39'),
(302, 'Account Create', 'Visited Create Account Page', 'Wajahat', '2021-04-21 00:42:47', '2021-04-21 00:42:47'),
(303, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:42:50', '2021-04-21 00:42:50'),
(304, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-21 00:42:56', '2021-04-21 00:42:56'),
(305, 'Account Show', 'Checked Account Record', 'Wajahat', '2021-04-21 00:43:00', '2021-04-21 00:43:00'),
(306, 'Account Show', 'Checked Account Record', 'Wajahat', '2021-04-21 00:43:00', '2021-04-21 00:43:00'),
(307, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-21 00:43:04', '2021-04-21 00:43:04'),
(308, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:43:08', '2021-04-21 00:43:08'),
(309, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 00:43:12', '2021-04-21 00:43:12'),
(310, 'Shipment Create', 'Visited Create Shipment Page', 'Dilber', '2021-04-21 00:43:50', '2021-04-21 00:43:50'),
(311, 'Shipment Create', 'Visited Create Shipment Page', 'Dilber', '2021-04-21 00:43:57', '2021-04-21 00:43:57'),
(312, 'Shipment Datewise', 'Visited Shipment Datewise', 'Dilber', '2021-04-21 00:44:04', '2021-04-21 00:44:04'),
(313, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Dilber', '2021-04-21 00:44:12', '2021-04-21 00:44:12'),
(314, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 00:48:10', '2021-04-21 00:48:10'),
(315, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 00:48:15', '2021-04-21 00:48:15'),
(316, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:48:24', '2021-04-21 00:48:24'),
(317, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-21 00:48:33', '2021-04-21 00:48:33'),
(318, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-21 00:48:44', '2021-04-21 00:48:44'),
(319, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:48:44', '2021-04-21 00:48:44'),
(320, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 00:48:54', '2021-04-21 00:48:54'),
(321, 'Account Create', 'Visited Create Account Page', 'Wajahat', '2021-04-21 00:51:19', '2021-04-21 00:51:19'),
(322, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:51:24', '2021-04-21 00:51:24'),
(323, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 00:51:27', '2021-04-21 00:51:27'),
(324, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 00:59:11', '2021-04-21 00:59:11'),
(325, 'Profile Create', 'Visited Create Profile Page', 'Abbas', '2021-04-21 00:59:42', '2021-04-21 00:59:42'),
(326, 'Profile Created', 'Created new Profile', 'Abbas', '2021-04-21 01:00:14', '2021-04-21 01:00:14'),
(327, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 01:00:32', '2021-04-21 01:00:32'),
(328, 'Account Show', 'Checked Account Record', 'Wajahat', '2021-04-21 01:00:38', '2021-04-21 01:00:38'),
(329, 'Account Edit', 'Visited Account Edit Page', 'Wajahat', '2021-04-21 01:00:41', '2021-04-21 01:00:41'),
(330, 'Account Updated', 'Edited a Account', 'Wajahat', '2021-04-21 01:04:44', '2021-04-21 01:04:44'),
(331, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-21 01:04:44', '2021-04-21 01:04:44'),
(332, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 01:04:53', '2021-04-21 01:04:53'),
(333, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-21 01:05:07', '2021-04-21 01:05:07'),
(334, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-21 01:05:20', '2021-04-21 01:05:20'),
(335, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 01:05:20', '2021-04-21 01:05:20'),
(336, 'Shipment Create', 'Visited Create Shipment Page', 'Abbas', '2021-04-21 01:05:50', '2021-04-21 01:05:50'),
(337, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:12:09', '2021-04-21 01:12:09'),
(338, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-21 01:13:42', '2021-04-21 01:13:42'),
(339, 'Role Show', 'Viewed  a Role Record', 'Wajahat', '2021-04-21 01:13:56', '2021-04-21 01:13:56'),
(340, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-21 01:14:06', '2021-04-21 01:14:06'),
(341, 'Role Edited', 'Visited Role Edit Page', 'Wajahat', '2021-04-21 01:14:11', '2021-04-21 01:14:11'),
(342, 'Role updated', 'Edited a Role Name', 'Wajahat', '2021-04-21 01:14:35', '2021-04-21 01:14:35'),
(343, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-21 01:14:35', '2021-04-21 01:14:35'),
(344, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 01:14:54', '2021-04-21 01:14:54'),
(345, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:14:57', '2021-04-21 01:14:57'),
(346, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 01:18:30', '2021-04-21 01:18:30'),
(347, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-21 01:18:41', '2021-04-21 01:18:41'),
(348, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-21 01:18:52', '2021-04-21 01:18:52'),
(349, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 01:18:53', '2021-04-21 01:18:53'),
(350, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:18:55', '2021-04-21 01:18:55'),
(351, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 01:23:29', '2021-04-21 01:23:29'),
(352, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:23:31', '2021-04-21 01:23:31'),
(353, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:25:05', '2021-04-21 01:25:05'),
(354, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:26:42', '2021-04-21 01:26:42'),
(355, 'User Created', 'Created New User', 'Wajahat', '2021-04-21 01:27:29', '2021-04-21 01:27:29'),
(356, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 01:27:30', '2021-04-21 01:27:30'),
(357, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-21 01:27:48', '2021-04-21 01:27:48'),
(358, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-21 01:28:03', '2021-04-21 01:28:03'),
(359, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 01:28:03', '2021-04-21 01:28:03'),
(360, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 01:29:04', '2021-04-21 01:29:04'),
(361, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:29:07', '2021-04-21 01:29:07'),
(362, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:36:09', '2021-04-21 01:36:09'),
(363, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:36:26', '2021-04-21 01:36:26'),
(364, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:38:14', '2021-04-21 01:38:14'),
(365, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:40:01', '2021-04-21 01:40:01'),
(366, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-21 01:54:26', '2021-04-21 01:54:26'),
(367, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-21 01:59:05', '2021-04-21 01:59:05'),
(368, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 01:59:47', '2021-04-21 01:59:47'),
(369, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:02:35', '2021-04-21 02:02:35'),
(370, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:04:13', '2021-04-21 02:04:13'),
(371, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:12:12', '2021-04-21 02:12:12'),
(372, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:16:32', '2021-04-21 02:16:32'),
(373, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:20:31', '2021-04-21 02:20:31'),
(374, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:21:14', '2021-04-21 02:21:14'),
(375, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:22:03', '2021-04-21 02:22:03'),
(376, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:24:03', '2021-04-21 02:24:03'),
(377, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:24:24', '2021-04-21 02:24:24'),
(378, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:26:29', '2021-04-21 02:26:29'),
(379, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:27:58', '2021-04-21 02:27:58'),
(380, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:28:52', '2021-04-21 02:28:52'),
(381, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:29:43', '2021-04-21 02:29:43'),
(382, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:30:13', '2021-04-21 02:30:13'),
(383, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:31:19', '2021-04-21 02:31:19'),
(384, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:31:45', '2021-04-21 02:31:45'),
(385, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:32:01', '2021-04-21 02:32:01'),
(386, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:32:25', '2021-04-21 02:32:25'),
(387, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:34:34', '2021-04-21 02:34:34'),
(388, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 02:35:17', '2021-04-21 02:35:17'),
(389, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-21 02:35:22', '2021-04-21 02:35:22'),
(390, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:39:52', '2021-04-21 02:39:52'),
(391, 'User Created', 'Created New User', 'Wajahat', '2021-04-21 02:41:26', '2021-04-21 02:41:26'),
(392, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 02:41:26', '2021-04-21 02:41:26'),
(393, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 02:41:37', '2021-04-21 02:41:37'),
(394, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 02:41:55', '2021-04-21 02:41:55'),
(395, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-21 02:41:58', '2021-04-21 02:41:58'),
(396, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-21 02:42:20', '2021-04-21 02:42:20'),
(397, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 02:42:27', '2021-04-21 02:42:27'),
(398, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:42:30', '2021-04-21 02:42:30'),
(399, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-21 02:43:02', '2021-04-21 02:43:02'),
(400, 'Shipmentstatus Create', 'Visited Create Shipmentstatus Page', 'Wajahat', '2021-04-21 02:43:10', '2021-04-21 02:43:10'),
(401, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-21 02:43:20', '2021-04-21 02:43:20'),
(402, 'Shipmentstatus Create', 'Visited Create Shipmentstatus Page', 'Wajahat', '2021-04-21 02:43:25', '2021-04-21 02:43:25'),
(403, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-21 02:43:32', '2021-04-21 02:43:32'),
(404, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 02:43:37', '2021-04-21 02:43:37'),
(405, 'Shipment Datewise', 'Visited Shipment Datewise', 'Wajahat', '2021-04-21 02:43:47', '2021-04-21 02:43:47'),
(406, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-21 02:43:58', '2021-04-21 02:43:58'),
(407, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-21 02:44:01', '2021-04-21 02:44:01'),
(408, 'Account Create', 'Visited Create Account Page', 'Wajahat', '2021-04-21 02:44:11', '2021-04-21 02:44:11'),
(409, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 02:45:30', '2021-04-21 02:45:30'),
(410, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 02:45:33', '2021-04-21 02:45:33'),
(411, 'Account Create', 'Visited Create Account Page', 'Wajahat', '2021-04-21 02:46:41', '2021-04-21 02:46:41'),
(412, 'Account Create', 'Visited Create Account Page', 'Wajahat', '2021-04-21 02:46:53', '2021-04-21 02:46:53'),
(413, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-21 02:49:40', '2021-04-21 02:49:40'),
(414, 'Role Edited', 'Visited Role Edit Page', 'Wajahat', '2021-04-21 02:49:49', '2021-04-21 02:49:49'),
(415, 'Role updated', 'Edited a Role Name', 'Wajahat', '2021-04-21 02:50:25', '2021-04-21 02:50:25'),
(416, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-21 02:50:25', '2021-04-21 02:50:25'),
(417, 'User Index', 'Visited User Index Page', 'Abbas', '2021-04-21 02:51:57', '2021-04-21 02:51:57'),
(418, 'Role Edited', 'Visited Role Edit Page', 'Wajahat', '2021-04-21 02:52:05', '2021-04-21 02:52:05'),
(419, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-21 02:52:19', '2021-04-21 02:52:19'),
(420, 'Role Edited', 'Visited Role Edit Page', 'Wajahat', '2021-04-21 02:52:22', '2021-04-21 02:52:22'),
(421, 'Role updated', 'Edited a Role Name', 'Wajahat', '2021-04-21 02:52:29', '2021-04-21 02:52:29'),
(422, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-21 02:52:29', '2021-04-21 02:52:29'),
(423, 'User Index', 'Visited User Index Page', 'Abbas', '2021-04-21 02:52:33', '2021-04-21 02:52:33'),
(424, 'User Index', 'Visited User Index Page', 'Abbas', '2021-04-21 02:52:46', '2021-04-21 02:52:46'),
(425, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 03:48:47', '2021-04-21 03:48:47'),
(426, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-21 03:48:53', '2021-04-21 03:48:53'),
(427, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 03:48:57', '2021-04-21 03:48:57'),
(428, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 03:54:41', '2021-04-21 03:54:41'),
(429, 'Shipment Create', 'Visited Create Shipment Page', 'test', '2021-04-21 03:55:38', '2021-04-21 03:55:38'),
(430, 'Shipment Create', 'Visited Create Shipment Page', 'test', '2021-04-21 03:56:04', '2021-04-21 03:56:04'),
(431, 'Shipment Created', 'Created new Shipment', 'test', '2021-04-21 04:09:18', '2021-04-21 04:09:18'),
(432, 'Shipment Show', 'Checked Shipment Record', 'test', '2021-04-21 04:09:19', '2021-04-21 04:09:19'),
(433, 'Shipment Show', 'Checked Shipment Record', 'test', '2021-04-21 04:10:07', '2021-04-21 04:10:07'),
(434, 'Shipment Create', 'Visited Create Shipment Page', 'test', '2021-04-21 04:35:05', '2021-04-21 04:35:05'),
(435, 'Account Create', 'Visited Create Account Page', 'Wajahat', '2021-04-21 04:35:18', '2021-04-21 04:35:18'),
(436, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 04:35:23', '2021-04-21 04:35:23'),
(437, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 04:38:50', '2021-04-21 04:38:50'),
(438, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 04:43:54', '2021-04-21 04:43:54'),
(439, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:14:25', '2021-04-21 05:14:25'),
(440, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 05:15:40', '2021-04-21 05:15:40'),
(441, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:15:44', '2021-04-21 05:15:44'),
(442, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:16:55', '2021-04-21 05:16:55'),
(443, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 05:17:19', '2021-04-21 05:17:19'),
(444, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:17:24', '2021-04-21 05:17:24'),
(445, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:20:43', '2021-04-21 05:20:43'),
(446, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-21 05:21:07', '2021-04-21 05:21:07'),
(447, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:21:24', '2021-04-21 05:21:24'),
(448, 'Shipment Create', 'Visited Create Shipment Page', 'test', '2021-04-21 05:21:40', '2021-04-21 05:21:40'),
(449, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:23:22', '2021-04-21 05:23:22'),
(450, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:25:15', '2021-04-21 05:25:15'),
(451, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:25:58', '2021-04-21 05:25:58'),
(452, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:26:37', '2021-04-21 05:26:37'),
(453, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:26:58', '2021-04-21 05:26:58'),
(454, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:29:01', '2021-04-21 05:29:01'),
(455, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:29:14', '2021-04-21 05:29:14'),
(456, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:30:23', '2021-04-21 05:30:23'),
(457, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:31:05', '2021-04-21 05:31:05'),
(458, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:32:44', '2021-04-21 05:32:44'),
(459, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:33:00', '2021-04-21 05:33:00'),
(460, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:33:14', '2021-04-21 05:33:14'),
(461, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:34:22', '2021-04-21 05:34:22'),
(462, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:34:29', '2021-04-21 05:34:29'),
(463, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:35:06', '2021-04-21 05:35:06'),
(464, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:35:12', '2021-04-21 05:35:12'),
(465, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:36:35', '2021-04-21 05:36:35'),
(466, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:36:45', '2021-04-21 05:36:45'),
(467, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:43:59', '2021-04-21 05:43:59'),
(468, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:44:43', '2021-04-21 05:44:43'),
(469, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:46:57', '2021-04-21 05:46:57'),
(470, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:49:06', '2021-04-21 05:49:06'),
(471, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:49:31', '2021-04-21 05:49:31'),
(472, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:50:23', '2021-04-21 05:50:23'),
(473, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:50:34', '2021-04-21 05:50:34'),
(474, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:52:13', '2021-04-21 05:52:13');
INSERT INTO `activities` (`id`, `module_name`, `action_name`, `user_name`, `created_at`, `updated_at`) VALUES
(475, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:52:21', '2021-04-21 05:52:21'),
(476, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:53:33', '2021-04-21 05:53:33'),
(477, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 05:53:41', '2021-04-21 05:53:41'),
(478, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:58:16', '2021-04-21 05:58:16'),
(479, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:58:36', '2021-04-21 05:58:36'),
(480, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:59:03', '2021-04-21 05:59:03'),
(481, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 05:59:59', '2021-04-21 05:59:59'),
(482, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 06:00:05', '2021-04-21 06:00:05'),
(483, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 06:00:49', '2021-04-21 06:00:49'),
(484, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 06:21:05', '2021-04-21 06:21:05'),
(485, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 06:22:40', '2021-04-21 06:22:40'),
(486, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-21 06:23:04', '2021-04-21 06:23:04'),
(487, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-21 06:23:57', '2021-04-21 06:23:57'),
(488, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-21 06:24:12', '2021-04-21 06:24:12'),
(489, 'Shipment Datewise', 'Visited Shipment Datewise', 'Wajahat', '2021-04-21 06:24:26', '2021-04-21 06:24:26'),
(490, 'Location index', 'Visited Location Index', 'Wajahat', '2021-04-21 06:24:40', '2021-04-21 06:24:40'),
(491, 'Currency index', 'Visited Currency Index', 'Wajahat', '2021-04-21 06:24:47', '2021-04-21 06:24:47'),
(492, 'Currency Show', 'Checked Currency Record', 'Wajahat', '2021-04-21 06:24:52', '2021-04-21 06:24:52'),
(493, 'Currency index', 'Visited Currency Index', 'Wajahat', '2021-04-21 06:25:07', '2021-04-21 06:25:07'),
(494, 'Shipmentmode index', 'Visited Shipmentmode Index', 'Wajahat', '2021-04-21 06:25:12', '2021-04-21 06:25:12'),
(495, 'Shipment Show', 'Checked Shipment Record', 'Fahad', '2021-04-21 09:49:50', '2021-04-21 09:49:50'),
(496, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 09:50:05', '2021-04-21 09:50:05'),
(497, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 09:50:42', '2021-04-21 09:50:42'),
(498, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 09:50:49', '2021-04-21 09:50:49'),
(499, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 09:50:54', '2021-04-21 09:50:54'),
(500, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-21 09:50:57', '2021-04-21 09:50:57'),
(501, 'Station Created', 'Created new Station', 'Wajahat', '2021-04-21 09:54:58', '2021-04-21 09:54:58'),
(502, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 09:54:59', '2021-04-21 09:54:59'),
(503, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 09:55:08', '2021-04-21 09:55:08'),
(504, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 09:55:11', '2021-04-21 09:55:11'),
(505, 'User Created', 'Created New User', 'Wajahat', '2021-04-21 09:57:04', '2021-04-21 09:57:04'),
(506, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 09:57:04', '2021-04-21 09:57:04'),
(507, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-21 09:59:33', '2021-04-21 09:59:33'),
(508, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 09:59:37', '2021-04-21 09:59:37'),
(509, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-21 09:59:41', '2021-04-21 09:59:41'),
(510, 'Shipment Datewise', 'Visited Shipment Datewise', 'Wajahat', '2021-04-21 10:00:38', '2021-04-21 10:00:38'),
(511, 'Account Create', 'Visited Create Account Page', 'Wajahat', '2021-04-21 10:00:46', '2021-04-21 10:00:46'),
(512, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 10:00:51', '2021-04-21 10:00:51'),
(513, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-21 10:00:54', '2021-04-21 10:00:54'),
(514, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 10:01:05', '2021-04-21 10:01:05'),
(515, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 10:01:08', '2021-04-21 10:01:08'),
(516, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 10:01:12', '2021-04-21 10:01:12'),
(517, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 10:29:23', '2021-04-21 10:29:23'),
(518, 'User Index', 'Visited User Index Page', 'Fahad', '2021-04-21 10:32:04', '2021-04-21 10:32:04'),
(519, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-21 10:33:39', '2021-04-21 10:33:39'),
(520, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 10:50:51', '2021-04-21 10:50:51'),
(521, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 10:53:09', '2021-04-21 10:53:09'),
(522, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 10:54:52', '2021-04-21 10:54:52'),
(523, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-21 10:54:57', '2021-04-21 10:54:57'),
(524, 'Station Created', 'Created new Station', 'Wajahat', '2021-04-21 10:55:12', '2021-04-21 10:55:12'),
(525, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 10:55:12', '2021-04-21 10:55:12'),
(526, 'Station Deleted', 'Checked Station Trash', 'Wajahat', '2021-04-21 10:55:15', '2021-04-21 10:55:15'),
(527, 'Station Restore', 'Restored Single Station', 'Wajahat', '2021-04-21 10:55:22', '2021-04-21 10:55:22'),
(528, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 10:55:22', '2021-04-21 10:55:22'),
(529, 'Station Deleted', 'Checked Station Trash', 'Wajahat', '2021-04-21 10:55:26', '2021-04-21 10:55:26'),
(530, 'Station Restore', 'Restored Single Station', 'Wajahat', '2021-04-21 10:55:29', '2021-04-21 10:55:29'),
(531, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 10:55:29', '2021-04-21 10:55:29'),
(532, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 11:05:19', '2021-04-21 11:05:19'),
(533, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 11:05:22', '2021-04-21 11:05:22'),
(534, 'User Created', 'Created New User', 'Wajahat', '2021-04-21 11:08:41', '2021-04-21 11:08:41'),
(535, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 11:08:41', '2021-04-21 11:08:41'),
(536, 'User Index', 'Visited User Index Page', 'Hassan', '2021-04-21 11:09:37', '2021-04-21 11:09:37'),
(537, 'User Index', 'Visited User Index Page', 'Hassan', '2021-04-21 11:09:39', '2021-04-21 11:09:39'),
(538, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-21 11:10:02', '2021-04-21 11:10:02'),
(539, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-21 11:10:16', '2021-04-21 11:10:16'),
(540, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 11:10:16', '2021-04-21 11:10:16'),
(541, 'User Index', 'Visited User Index Page', 'Hassan', '2021-04-21 11:10:37', '2021-04-21 11:10:37'),
(542, 'User Index', 'Visited User Index Page', 'Hassan', '2021-04-21 11:11:47', '2021-04-21 11:11:47'),
(543, 'Profile Create', 'Visited Create Profile Page', 'ali', '2021-04-21 11:15:27', '2021-04-21 11:15:27'),
(544, 'Profile Created', 'Created new Profile', 'ali', '2021-04-21 11:15:52', '2021-04-21 11:15:52'),
(545, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 11:22:17', '2021-04-21 11:22:17'),
(546, 'Account Show', 'Checked Account Record', 'Wajahat', '2021-04-21 11:22:21', '2021-04-21 11:22:21'),
(547, 'Account Edit', 'Visited Account Edit Page', 'Wajahat', '2021-04-21 11:22:26', '2021-04-21 11:22:26'),
(548, 'Account Updated', 'Edited a Account', 'Wajahat', '2021-04-21 11:22:51', '2021-04-21 11:22:51'),
(549, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-21 11:22:51', '2021-04-21 11:22:51'),
(550, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 11:28:39', '2021-04-21 11:28:39'),
(551, 'Account Show', 'Checked Account Record', 'Wajahat', '2021-04-21 11:28:46', '2021-04-21 11:28:46'),
(552, 'Account Edit', 'Visited Account Edit Page', 'Wajahat', '2021-04-21 11:28:50', '2021-04-21 11:28:50'),
(553, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 11:30:13', '2021-04-21 11:30:13'),
(554, 'Account Show', 'Checked Account Record', 'Wajahat', '2021-04-21 11:30:19', '2021-04-21 11:30:19'),
(555, 'Account Edit', 'Visited Account Edit Page', 'Wajahat', '2021-04-21 11:30:25', '2021-04-21 11:30:25'),
(556, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 23:18:24', '2021-04-21 23:18:24'),
(557, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-21 23:18:27', '2021-04-21 23:18:27'),
(558, 'Station Created', 'Created new Station', 'Wajahat', '2021-04-21 23:18:42', '2021-04-21 23:18:42'),
(559, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 23:18:42', '2021-04-21 23:18:42'),
(560, 'Station Edit', 'Visited Station Edit Page', 'Wajahat', '2021-04-21 23:18:51', '2021-04-21 23:18:51'),
(561, 'Station Updated', 'Edited a Station', 'Wajahat', '2021-04-21 23:18:59', '2021-04-21 23:18:59'),
(562, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 23:18:59', '2021-04-21 23:18:59'),
(563, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 23:19:05', '2021-04-21 23:19:05'),
(564, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-21 23:19:08', '2021-04-21 23:19:08'),
(565, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-21 23:19:13', '2021-04-21 23:19:13'),
(566, 'Shipment Datewise', 'Visited Shipment Datewise', 'Wajahat', '2021-04-21 23:19:30', '2021-04-21 23:19:30'),
(567, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-21 23:20:05', '2021-04-21 23:20:05'),
(568, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-21 23:29:49', '2021-04-21 23:29:49'),
(569, 'Account Edit', 'Visited Account Edit Page', 'Wajahat', '2021-04-21 23:29:54', '2021-04-21 23:29:54'),
(570, 'Account Updated', 'Edited a Account', 'Wajahat', '2021-04-21 23:38:54', '2021-04-21 23:38:54'),
(571, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-21 23:38:54', '2021-04-21 23:38:54'),
(572, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 23:40:17', '2021-04-21 23:40:17'),
(573, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 23:40:29', '2021-04-21 23:40:29'),
(574, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-21 23:40:38', '2021-04-21 23:40:38'),
(575, 'Shipment Created', 'Created new Shipment', 'Wajahat', '2021-04-21 23:49:03', '2021-04-21 23:49:03'),
(576, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-21 23:49:03', '2021-04-21 23:49:03'),
(577, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-21 23:49:12', '2021-04-21 23:49:12'),
(578, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-21 23:49:17', '2021-04-21 23:49:17'),
(579, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-21 23:52:00', '2021-04-21 23:52:00'),
(580, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 23:54:54', '2021-04-21 23:54:54'),
(581, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 23:54:57', '2021-04-21 23:54:57'),
(582, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 23:55:01', '2021-04-21 23:55:01'),
(583, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 23:57:22', '2021-04-21 23:57:22'),
(584, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-21 23:57:27', '2021-04-21 23:57:27'),
(585, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:01:15', '2021-04-22 00:01:15'),
(586, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-22 00:01:45', '2021-04-22 00:01:45'),
(587, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:01:50', '2021-04-22 00:01:50'),
(588, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:02:51', '2021-04-22 00:02:51'),
(589, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-22 00:03:00', '2021-04-22 00:03:00'),
(590, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-22 00:03:10', '2021-04-22 00:03:10'),
(591, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:03:11', '2021-04-22 00:03:11'),
(592, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:03:42', '2021-04-22 00:03:42'),
(593, 'Country index', 'Visited Country Index', 'Wajahat', '2021-04-22 00:12:56', '2021-04-22 00:12:56'),
(594, 'Country index', 'Visited Country Index', 'Wajahat', '2021-04-22 00:13:17', '2021-04-22 00:13:17'),
(595, 'Country index', 'Visited Country Index', 'Wajahat', '2021-04-22 00:13:43', '2021-04-22 00:13:43'),
(596, 'Country index', 'Visited Country Index', 'Wajahat', '2021-04-22 00:17:53', '2021-04-22 00:17:53'),
(597, 'Country index', 'Visited Country Index', 'Wajahat', '2021-04-22 00:18:44', '2021-04-22 00:18:44'),
(598, 'Country index', 'Visited Country Index', 'Wajahat', '2021-04-22 00:21:16', '2021-04-22 00:21:16'),
(599, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 00:21:42', '2021-04-22 00:21:42'),
(600, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:21:47', '2021-04-22 00:21:47'),
(601, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 00:21:52', '2021-04-22 00:21:52'),
(602, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:29:19', '2021-04-22 00:29:19'),
(603, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:29:26', '2021-04-22 00:29:26'),
(604, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 00:29:37', '2021-04-22 00:29:37'),
(605, 'Shipment Datewise', 'Visited Shipment Datewise', 'Wajahat', '2021-04-22 00:29:49', '2021-04-22 00:29:49'),
(606, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:29:56', '2021-04-22 00:29:56'),
(607, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:30:01', '2021-04-22 00:30:01'),
(608, 'Account Show', 'Checked Account Record', 'Wajahat', '2021-04-22 00:30:06', '2021-04-22 00:30:06'),
(609, 'Account Edit', 'Visited Account Edit Page', 'Wajahat', '2021-04-22 00:30:10', '2021-04-22 00:30:10'),
(610, 'Account Updated', 'Edited a Account', 'Wajahat', '2021-04-22 00:31:05', '2021-04-22 00:31:05'),
(611, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 00:31:06', '2021-04-22 00:31:06'),
(612, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:32:06', '2021-04-22 00:32:06'),
(613, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:32:10', '2021-04-22 00:32:10'),
(614, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 00:32:13', '2021-04-22 00:32:13'),
(615, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:32:15', '2021-04-22 00:32:15'),
(616, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:34:56', '2021-04-22 00:34:56'),
(617, 'User Index', 'Visited User Index Page', 'Hassan', '2021-04-22 00:37:12', '2021-04-22 00:37:12'),
(618, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:37:45', '2021-04-22 00:37:45'),
(619, 'User delete', 'Trashed A User Record', 'Wajahat', '2021-04-22 00:38:01', '2021-04-22 00:38:01'),
(620, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:38:02', '2021-04-22 00:38:02'),
(621, 'User delete', 'Trashed A User Record', 'Wajahat', '2021-04-22 00:38:12', '2021-04-22 00:38:12'),
(622, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:38:12', '2021-04-22 00:38:12'),
(623, 'User delete', 'Trashed A User Record', 'Wajahat', '2021-04-22 00:38:18', '2021-04-22 00:38:18'),
(624, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:38:19', '2021-04-22 00:38:19'),
(625, 'User delete', 'Trashed A User Record', 'Wajahat', '2021-04-22 00:38:24', '2021-04-22 00:38:24'),
(626, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:38:25', '2021-04-22 00:38:25'),
(627, 'User delete', 'Trashed A User Record', 'Wajahat', '2021-04-22 00:38:30', '2021-04-22 00:38:30'),
(628, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:38:30', '2021-04-22 00:38:30'),
(629, 'User delete', 'Trashed A User Record', 'Wajahat', '2021-04-22 00:38:36', '2021-04-22 00:38:36'),
(630, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:38:37', '2021-04-22 00:38:37'),
(631, 'User delete', 'Trashed A User Record', 'Wajahat', '2021-04-22 00:38:42', '2021-04-22 00:38:42'),
(632, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:38:42', '2021-04-22 00:38:42'),
(633, 'User delete', 'Trashed A User Record', 'Wajahat', '2021-04-22 00:38:51', '2021-04-22 00:38:51'),
(634, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:38:52', '2021-04-22 00:38:52'),
(635, 'User delete', 'Trashed A User Record', 'Wajahat', '2021-04-22 00:38:57', '2021-04-22 00:38:57'),
(636, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:38:58', '2021-04-22 00:38:58'),
(637, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:39:03', '2021-04-22 00:39:03'),
(638, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:39:07', '2021-04-22 00:39:07'),
(639, 'User Deleted', 'Visited User Delete Page', 'Wajahat', '2021-04-22 00:39:10', '2021-04-22 00:39:10'),
(640, 'User Permanently Delete', 'Permanently Deleted a User', 'Wajahat', '2021-04-22 00:39:22', '2021-04-22 00:39:22'),
(641, 'User Deleted', 'Visited User Delete Page', 'Wajahat', '2021-04-22 00:39:22', '2021-04-22 00:39:22'),
(642, 'User Permanently Delete', 'Permanently Deleted a User', 'Wajahat', '2021-04-22 00:39:28', '2021-04-22 00:39:28'),
(643, 'User Deleted', 'Visited User Delete Page', 'Wajahat', '2021-04-22 00:39:28', '2021-04-22 00:39:28'),
(644, 'User Permanently Delete', 'Permanently Deleted a User', 'Wajahat', '2021-04-22 00:39:35', '2021-04-22 00:39:35'),
(645, 'User Deleted', 'Visited User Delete Page', 'Wajahat', '2021-04-22 00:39:35', '2021-04-22 00:39:35'),
(646, 'User Permanently Delete', 'Permanently Deleted a User', 'Wajahat', '2021-04-22 00:39:39', '2021-04-22 00:39:39'),
(647, 'User Deleted', 'Visited User Delete Page', 'Wajahat', '2021-04-22 00:39:40', '2021-04-22 00:39:40'),
(648, 'User Permanently Delete', 'Permanently Deleted a User', 'Wajahat', '2021-04-22 00:39:45', '2021-04-22 00:39:45'),
(649, 'User Deleted', 'Visited User Delete Page', 'Wajahat', '2021-04-22 00:39:45', '2021-04-22 00:39:45'),
(650, 'User Permanently Delete', 'Permanently Deleted a User', 'Wajahat', '2021-04-22 00:39:53', '2021-04-22 00:39:53'),
(651, 'User Deleted', 'Visited User Delete Page', 'Wajahat', '2021-04-22 00:39:53', '2021-04-22 00:39:53'),
(652, 'User Permanently Delete', 'Permanently Deleted a User', 'Wajahat', '2021-04-22 00:39:58', '2021-04-22 00:39:58'),
(653, 'User Deleted', 'Visited User Delete Page', 'Wajahat', '2021-04-22 00:39:58', '2021-04-22 00:39:58'),
(654, 'User Permanently Delete', 'Permanently Deleted a User', 'Wajahat', '2021-04-22 00:40:02', '2021-04-22 00:40:02'),
(655, 'User Deleted', 'Visited User Delete Page', 'Wajahat', '2021-04-22 00:40:02', '2021-04-22 00:40:02'),
(656, 'User Permanently Delete', 'Permanently Deleted a User', 'Wajahat', '2021-04-22 00:40:07', '2021-04-22 00:40:07'),
(657, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:40:07', '2021-04-22 00:40:07'),
(658, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 00:40:44', '2021-04-22 00:40:44'),
(659, 'Account', 'Trashed Multiple accounts', 'Wajahat', '2021-04-22 00:41:13', '2021-04-22 00:41:13'),
(660, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 00:41:13', '2021-04-22 00:41:13'),
(661, 'Account Create', 'Visited Create Account Page', 'Wajahat', '2021-04-22 00:41:32', '2021-04-22 00:41:32'),
(662, 'Profile Create', 'Visited Create Profile Page', 'Fahad', '2021-04-22 00:45:14', '2021-04-22 00:45:14'),
(663, 'Profile Created', 'Created new Profile', 'Fahad', '2021-04-22 00:47:10', '2021-04-22 00:47:10'),
(664, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:47:51', '2021-04-22 00:47:51'),
(665, 'Account Show', 'Checked Account Record', 'Wajahat', '2021-04-22 00:47:58', '2021-04-22 00:47:58'),
(666, 'Account Edit', 'Visited Account Edit Page', 'Wajahat', '2021-04-22 00:48:02', '2021-04-22 00:48:02'),
(667, 'Company Create', 'Visited Create Company Page', 'Wajahat', '2021-04-22 00:49:12', '2021-04-22 00:49:12'),
(668, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 00:49:46', '2021-04-22 00:49:46'),
(669, 'Station', 'Trashed Multiple stations', 'Wajahat', '2021-04-22 00:49:54', '2021-04-22 00:49:54'),
(670, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 00:49:55', '2021-04-22 00:49:55'),
(671, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 00:50:20', '2021-04-22 00:50:20'),
(672, 'Account Deleted', 'Checked Account Trash', 'Wajahat', '2021-04-22 00:50:23', '2021-04-22 00:50:23'),
(673, 'Account Perm. Bulk Delete', 'Permanently Deleted Multiple accounts', 'Wajahat', '2021-04-22 00:50:30', '2021-04-22 00:50:30'),
(674, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 00:50:31', '2021-04-22 00:50:31'),
(675, 'Account Create', 'Visited Create Account Page', 'Wajahat', '2021-04-22 00:50:45', '2021-04-22 00:50:45'),
(676, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 00:51:23', '2021-04-22 00:51:23'),
(677, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-22 00:51:26', '2021-04-22 00:51:26'),
(678, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-22 00:51:39', '2021-04-22 00:51:39'),
(679, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 00:52:01', '2021-04-22 00:52:01'),
(680, 'Station Deleted', 'Checked Station Trash', 'Wajahat', '2021-04-22 00:52:05', '2021-04-22 00:52:05'),
(681, 'Station Perm. Bulk Delete', 'Permanently Deleted Multiple stations', 'Wajahat', '2021-04-22 00:52:10', '2021-04-22 00:52:10'),
(682, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 00:52:11', '2021-04-22 00:52:11'),
(683, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-22 00:52:13', '2021-04-22 00:52:13'),
(684, 'Station Created', 'Created new Station', 'Wajahat', '2021-04-22 00:52:22', '2021-04-22 00:52:22'),
(685, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 00:52:23', '2021-04-22 00:52:23'),
(686, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-22 00:52:26', '2021-04-22 00:52:26'),
(687, 'Station Created', 'Created new Station', 'Wajahat', '2021-04-22 00:52:41', '2021-04-22 00:52:41'),
(688, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 00:52:41', '2021-04-22 00:52:41'),
(689, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 00:52:49', '2021-04-22 00:52:49'),
(690, 'Account Show', 'Checked Account Record', 'Wajahat', '2021-04-22 00:52:56', '2021-04-22 00:52:56'),
(691, 'Account Edit', 'Visited Account Edit Page', 'Wajahat', '2021-04-22 00:53:00', '2021-04-22 00:53:00'),
(692, 'Account Updated', 'Edited a Account', 'Wajahat', '2021-04-22 00:53:31', '2021-04-22 00:53:31'),
(693, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 00:53:31', '2021-04-22 00:53:31'),
(694, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-22 00:54:15', '2021-04-22 00:54:15'),
(695, 'Role Edited', 'Visited Role Edit Page', 'Wajahat', '2021-04-22 00:54:21', '2021-04-22 00:54:21'),
(696, 'Role create', 'Visited Role Create Page', 'Wajahat', '2021-04-22 00:55:02', '2021-04-22 00:55:02'),
(697, 'Role create', 'Visited Role Create Page', 'Wajahat', '2021-04-22 00:55:32', '2021-04-22 00:55:32'),
(698, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-22 00:55:38', '2021-04-22 00:55:38'),
(699, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-22 00:55:43', '2021-04-22 00:55:43'),
(700, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 01:06:05', '2021-04-22 01:06:05'),
(701, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 01:06:11', '2021-04-22 01:06:11'),
(702, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-22 01:06:14', '2021-04-22 01:06:14'),
(703, 'User Created', 'Created New User', 'Wajahat', '2021-04-22 01:08:52', '2021-04-22 01:08:52'),
(704, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 01:08:53', '2021-04-22 01:08:53'),
(705, 'User Index', 'Visited User Index Page', 'Hamza', '2021-04-22 01:09:50', '2021-04-22 01:09:50'),
(706, 'User Index', 'Visited User Index Page', 'Hamza', '2021-04-22 01:10:12', '2021-04-22 01:10:12'),
(707, 'Profile Create', 'Visited Create Profile Page', 'Mohammad', '2021-04-22 01:22:00', '2021-04-22 01:22:00'),
(708, 'Profile Created', 'Created new Profile', 'Mohammad', '2021-04-22 01:23:24', '2021-04-22 01:23:24'),
(709, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 01:24:06', '2021-04-22 01:24:06'),
(710, 'Account Show', 'Checked Account Record', 'Wajahat', '2021-04-22 01:24:26', '2021-04-22 01:24:26'),
(711, 'Account Edit', 'Visited Account Edit Page', 'Wajahat', '2021-04-22 01:24:36', '2021-04-22 01:24:36'),
(712, 'Account Updated', 'Edited a Account', 'Wajahat', '2021-04-22 01:25:35', '2021-04-22 01:25:35'),
(713, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 01:25:35', '2021-04-22 01:25:35'),
(714, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 01:26:49', '2021-04-22 01:26:49'),
(715, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 01:27:02', '2021-04-22 01:27:02'),
(716, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 01:27:57', '2021-04-22 01:27:57'),
(717, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-22 01:28:04', '2021-04-22 01:28:04'),
(718, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-22 01:28:14', '2021-04-22 01:28:14'),
(719, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 01:28:15', '2021-04-22 01:28:15'),
(720, 'User Index', 'Visited User Index Page', 'Mohammad', '2021-04-22 01:28:40', '2021-04-22 01:28:40'),
(721, 'Shipment Datewise', 'Visited Shipment Datewise', 'Mohammad', '2021-04-22 01:29:34', '2021-04-22 01:29:34'),
(722, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Mohammad', '2021-04-22 01:29:54', '2021-04-22 01:29:54'),
(723, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-22 01:34:56', '2021-04-22 01:34:56'),
(724, 'Role Edited', 'Visited Role Edit Page', 'Wajahat', '2021-04-22 01:35:00', '2021-04-22 01:35:00'),
(725, 'Role updated', 'Edited a Role Name', 'Wajahat', '2021-04-22 01:35:20', '2021-04-22 01:35:20'),
(726, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-22 01:35:20', '2021-04-22 01:35:20'),
(727, 'Role Edited', 'Visited Role Edit Page', 'Wajahat', '2021-04-22 01:35:23', '2021-04-22 01:35:23'),
(728, 'Role updated', 'Edited a Role Name', 'Wajahat', '2021-04-22 01:35:52', '2021-04-22 01:35:52'),
(729, 'Role index', 'Visited Role index Page', 'Wajahat', '2021-04-22 01:35:52', '2021-04-22 01:35:52'),
(730, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 01:36:29', '2021-04-22 01:36:29'),
(731, 'Location index', 'Visited Location Index', 'Wajahat', '2021-04-22 01:36:34', '2021-04-22 01:36:34'),
(732, 'Location Show', 'Checked Location Record', 'Wajahat', '2021-04-22 01:36:41', '2021-04-22 01:36:41'),
(733, 'Location index', 'Visited Location Index', 'Wajahat', '2021-04-22 01:36:44', '2021-04-22 01:36:44'),
(734, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 01:36:57', '2021-04-22 01:36:57'),
(735, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 01:41:05', '2021-04-22 01:41:05'),
(736, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 01:41:25', '2021-04-22 01:41:25'),
(737, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 01:45:11', '2021-04-22 01:45:11'),
(738, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 01:48:38', '2021-04-22 01:48:38'),
(739, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 01:53:37', '2021-04-22 01:53:37'),
(740, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 01:59:05', '2021-04-22 01:59:05'),
(741, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 01:59:44', '2021-04-22 01:59:44'),
(742, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 02:00:36', '2021-04-22 02:00:36'),
(743, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 02:07:36', '2021-04-22 02:07:36'),
(744, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 02:14:18', '2021-04-22 02:14:18'),
(745, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 02:15:16', '2021-04-22 02:15:16'),
(746, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 02:15:22', '2021-04-22 02:15:22'),
(747, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 02:16:45', '2021-04-22 02:16:45'),
(748, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-22 02:20:26', '2021-04-22 02:20:26'),
(749, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 02:24:49', '2021-04-22 02:24:49'),
(750, 'Shipment Created', 'Created new Shipment', 'Wajahat', '2021-04-22 02:28:23', '2021-04-22 02:28:23'),
(751, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-22 02:28:23', '2021-04-22 02:28:23'),
(752, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 02:35:20', '2021-04-22 02:35:20'),
(753, 'Shipment Create', 'Visited Create Shipment Page', 'Fahad', '2021-04-22 02:35:30', '2021-04-22 02:35:30'),
(754, 'Shipment Created', 'Created new Shipment', 'Fahad', '2021-04-22 02:45:18', '2021-04-22 02:45:18'),
(755, 'Shipment Show', 'Checked Shipment Record', 'Fahad', '2021-04-22 02:45:55', '2021-04-22 02:45:55'),
(756, 'Shipment Show', 'Checked Shipment Record', 'Fahad', '2021-04-22 02:46:12', '2021-04-22 02:46:12'),
(757, 'Shipment Create', 'Visited Create Shipment Page', 'Fahad', '2021-04-22 02:46:38', '2021-04-22 02:46:38'),
(758, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 02:47:17', '2021-04-22 02:47:17'),
(759, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:47:20', '2021-04-22 02:47:20'),
(760, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 02:47:24', '2021-04-22 02:47:24'),
(761, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 02:48:35', '2021-04-22 02:48:35'),
(762, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 02:48:36', '2021-04-22 02:48:36'),
(763, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-22 02:48:39', '2021-04-22 02:48:39'),
(764, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:48:43', '2021-04-22 02:48:43'),
(765, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:49:41', '2021-04-22 02:49:41'),
(766, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:49:52', '2021-04-22 02:49:52'),
(767, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:49:55', '2021-04-22 02:49:55'),
(768, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 02:49:59', '2021-04-22 02:49:59'),
(769, 'Shipment Datewise', 'Visited Shipment Datewise', 'Wajahat', '2021-04-22 02:50:06', '2021-04-22 02:50:06'),
(770, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 02:50:17', '2021-04-22 02:50:17'),
(771, 'Shipment Create', 'Visited Create Shipment Page', 'Fahad', '2021-04-22 02:50:55', '2021-04-22 02:50:55'),
(772, 'Shipment Create', 'Visited Create Shipment Page', 'Fahad', '2021-04-22 02:51:13', '2021-04-22 02:51:13'),
(773, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:51:34', '2021-04-22 02:51:34'),
(774, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:51:51', '2021-04-22 02:51:51'),
(775, 'User Index', 'Visited User Index Page', 'Hassan', '2021-04-22 02:52:14', '2021-04-22 02:52:14'),
(776, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:53:01', '2021-04-22 02:53:01'),
(777, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:53:05', '2021-04-22 02:53:05'),
(778, 'User delete', 'Trashed A User Record', 'Wajahat', '2021-04-22 02:54:00', '2021-04-22 02:54:00'),
(779, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:54:00', '2021-04-22 02:54:00'),
(780, 'User Deleted', 'Visited User Delete Page', 'Wajahat', '2021-04-22 02:54:10', '2021-04-22 02:54:10'),
(781, 'User Permanently Delete', 'Permanently Deleted a User', 'Wajahat', '2021-04-22 02:54:15', '2021-04-22 02:54:15'),
(782, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:54:15', '2021-04-22 02:54:15'),
(783, 'User Index', 'Visited User Index Page', 'Hamza', '2021-04-22 02:54:32', '2021-04-22 02:54:32'),
(784, 'User delete', 'Trashed A User Record', 'Wajahat', '2021-04-22 02:54:57', '2021-04-22 02:54:57'),
(785, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:54:58', '2021-04-22 02:54:58'),
(786, 'User Deleted', 'Visited User Delete Page', 'Wajahat', '2021-04-22 02:55:00', '2021-04-22 02:55:00'),
(787, 'User Permanently Delete', 'Permanently Deleted a User', 'Wajahat', '2021-04-22 02:55:05', '2021-04-22 02:55:05'),
(788, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 02:55:06', '2021-04-22 02:55:06'),
(789, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 06:45:15', '2021-04-22 06:45:15'),
(790, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-22 06:46:28', '2021-04-22 06:46:28'),
(791, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 06:47:05', '2021-04-22 06:47:05'),
(792, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 06:50:45', '2021-04-22 06:50:45'),
(793, 'User Create', 'Visited User Create Page', 'Wajahat', '2021-04-22 06:52:34', '2021-04-22 06:52:34'),
(794, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 06:53:52', '2021-04-22 06:53:52'),
(795, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 06:54:54', '2021-04-22 06:54:54'),
(796, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 07:01:52', '2021-04-22 07:01:52'),
(797, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 07:07:56', '2021-04-22 07:07:56'),
(798, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 07:09:39', '2021-04-22 07:09:39'),
(799, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 10:17:14', '2021-04-22 10:17:14'),
(800, 'Station Create', 'Visited Create Station Page', 'Wajahat', '2021-04-22 10:17:22', '2021-04-22 10:17:22'),
(801, 'Station Created', 'Created new Station', 'Wajahat', '2021-04-22 10:17:34', '2021-04-22 10:17:34'),
(802, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 10:17:34', '2021-04-22 10:17:34'),
(803, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 10:17:40', '2021-04-22 10:17:40'),
(804, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 10:19:07', '2021-04-22 10:19:07'),
(805, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 10:20:54', '2021-04-22 10:20:54'),
(806, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 10:21:35', '2021-04-22 10:21:35'),
(807, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 10:23:51', '2021-04-22 10:23:51'),
(808, 'Instruction Created', 'Created new Instruction', 'Wajahat', '2021-04-22 10:25:06', '2021-04-22 10:25:06'),
(809, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 10:25:55', '2021-04-22 10:25:55'),
(810, 'User Index', 'Visited User Index Page', 'Mohammad', '2021-04-22 10:26:14', '2021-04-22 10:26:14'),
(811, 'User Index', 'Visited User Index Page', 'Mohammad', '2021-04-22 10:27:38', '2021-04-22 10:27:38'),
(812, 'User Index', 'Visited User Index Page', 'Mohammad', '2021-04-22 10:29:57', '2021-04-22 10:29:57'),
(813, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 10:31:04', '2021-04-22 10:31:04'),
(814, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 10:31:10', '2021-04-22 10:31:10'),
(815, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 10:31:18', '2021-04-22 10:31:18'),
(816, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 10:31:24', '2021-04-22 10:31:24'),
(817, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 10:33:03', '2021-04-22 10:33:03'),
(818, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 10:39:23', '2021-04-22 10:39:23'),
(819, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-22 10:39:41', '2021-04-22 10:39:41'),
(820, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-22 10:40:07', '2021-04-22 10:40:07'),
(821, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 10:40:07', '2021-04-22 10:40:07'),
(822, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 10:40:17', '2021-04-22 10:40:17'),
(823, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 10:40:23', '2021-04-22 10:40:23'),
(824, 'Company Create', 'Visited Create Company Page', 'Wajahat', '2021-04-22 10:40:45', '2021-04-22 10:40:45'),
(825, 'Airwaybill index', 'Visited Airwaybill Index', 'Wajahat', '2021-04-22 10:42:38', '2021-04-22 10:42:38'),
(826, 'Service index', 'Visited Service Index', 'Wajahat', '2021-04-22 10:42:45', '2021-04-22 10:42:45'),
(827, 'Shipmenttype index', 'Visited Shipmenttype Index', 'Wajahat', '2021-04-22 10:42:50', '2021-04-22 10:42:50'),
(828, 'Shipmentmode index', 'Visited Shipmentmode Index', 'Wajahat', '2021-04-22 10:42:56', '2021-04-22 10:42:56'),
(829, 'Title index', 'Visited Title Index', 'Wajahat', '2021-04-22 10:43:01', '2021-04-22 10:43:01'),
(830, 'Currency index', 'Visited Currency Index', 'Wajahat', '2021-04-22 10:43:06', '2021-04-22 10:43:06'),
(831, 'Currency Create', 'Visited Create Currency Page', 'Wajahat', '2021-04-22 10:43:13', '2021-04-22 10:43:13'),
(832, 'Currency Create', 'Visited Create Currency Page', 'Wajahat', '2021-04-22 10:43:31', '2021-04-22 10:43:31'),
(833, 'Currency Create', 'Visited Create Currency Page', 'Wajahat', '2021-04-22 10:44:11', '2021-04-22 10:44:11'),
(834, 'Currency Created', 'Created new Currency', 'Wajahat', '2021-04-22 10:44:50', '2021-04-22 10:44:50'),
(835, 'Currency index', 'Visited Currency Index', 'Wajahat', '2021-04-22 10:44:50', '2021-04-22 10:44:50'),
(836, 'Location index', 'Visited Location Index', 'Wajahat', '2021-04-22 10:45:02', '2021-04-22 10:45:02'),
(837, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 10:45:08', '2021-04-22 10:45:08'),
(838, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 10:45:22', '2021-04-22 10:45:22'),
(839, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 10:45:26', '2021-04-22 10:45:26'),
(840, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 11:21:35', '2021-04-22 11:21:35'),
(841, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 11:23:16', '2021-04-22 11:23:16'),
(842, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 11:23:36', '2021-04-22 11:23:36'),
(843, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 11:26:05', '2021-04-22 11:26:05'),
(844, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 11:26:26', '2021-04-22 11:26:26'),
(845, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 11:27:02', '2021-04-22 11:27:02'),
(846, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 11:40:17', '2021-04-22 11:40:17'),
(847, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 11:41:00', '2021-04-22 11:41:00'),
(848, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 11:42:45', '2021-04-22 11:42:45'),
(849, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 11:58:11', '2021-04-22 11:58:11'),
(850, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 12:01:26', '2021-04-22 12:01:26'),
(851, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 12:01:28', '2021-04-22 12:01:28'),
(852, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 12:01:31', '2021-04-22 12:01:31'),
(853, 'Shipment Datewise', 'Visited Shipment Datewise', 'Wajahat', '2021-04-22 12:01:35', '2021-04-22 12:01:35'),
(854, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 12:01:39', '2021-04-22 12:01:39'),
(855, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 12:01:42', '2021-04-22 12:01:42'),
(856, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 12:01:48', '2021-04-22 12:01:48'),
(857, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 12:01:57', '2021-04-22 12:01:57'),
(858, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 21:45:22', '2021-04-22 21:45:22'),
(859, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 21:54:45', '2021-04-22 21:54:45'),
(860, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-22 21:56:12', '2021-04-22 21:56:12'),
(861, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 21:58:57', '2021-04-22 21:58:57'),
(862, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 21:59:23', '2021-04-22 21:59:23'),
(863, 'Shipment Created', 'Created new Shipment', 'Wajahat', '2021-04-22 22:03:01', '2021-04-22 22:03:01'),
(864, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-22 22:03:01', '2021-04-22 22:03:01'),
(865, 'Shipment Show', 'Checked Shipment Record', 'Wajahat', '2021-04-22 22:03:22', '2021-04-22 22:03:22'),
(866, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 22:04:23', '2021-04-22 22:04:23'),
(867, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 22:07:56', '2021-04-22 22:07:56'),
(868, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 22:08:30', '2021-04-22 22:08:30'),
(869, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 22:08:52', '2021-04-22 22:08:52'),
(870, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 22:08:58', '2021-04-22 22:08:58'),
(871, 'Shipmenttracking Created', 'Created new Shipmenttracking', 'Wajahat', '2021-04-22 22:15:08', '2021-04-22 22:15:08'),
(872, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:17:47', '2021-04-22 22:17:47'),
(873, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:18:25', '2021-04-22 22:18:25'),
(874, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:18:48', '2021-04-22 22:18:48'),
(875, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:20:17', '2021-04-22 22:20:17'),
(876, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:20:23', '2021-04-22 22:20:23'),
(877, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:27:38', '2021-04-22 22:27:38'),
(878, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:30:10', '2021-04-22 22:30:10'),
(879, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:30:49', '2021-04-22 22:30:49'),
(880, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:32:38', '2021-04-22 22:32:38'),
(881, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 22:36:31', '2021-04-22 22:36:31'),
(882, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 22:36:38', '2021-04-22 22:36:38'),
(883, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 22:36:43', '2021-04-22 22:36:43'),
(884, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 22:36:56', '2021-04-22 22:36:56'),
(885, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 22:37:01', '2021-04-22 22:37:01'),
(886, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:37:15', '2021-04-22 22:37:15'),
(887, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 22:37:22', '2021-04-22 22:37:22'),
(888, 'Shipment Datewise', 'Visited Shipment Datewise', 'Wajahat', '2021-04-22 22:37:28', '2021-04-22 22:37:28'),
(889, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 22:37:49', '2021-04-22 22:37:49'),
(890, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 22:44:32', '2021-04-22 22:44:32'),
(891, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:46:22', '2021-04-22 22:46:22'),
(892, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:50:02', '2021-04-22 22:50:02'),
(893, 'Shipmenttracking Created', 'Created new Shipmenttracking', 'Wajahat', '2021-04-22 22:51:31', '2021-04-22 22:51:31'),
(894, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:51:37', '2021-04-22 22:51:37'),
(895, 'Shipmenttracking Create', 'Visited Create Shipmenttracking Page', 'Wajahat', '2021-04-22 22:52:38', '2021-04-22 22:52:38'),
(896, 'Shipmenttracking Show', 'Checked Shipmenttracking Record', 'Wajahat', '2021-04-22 22:52:48', '2021-04-22 22:52:48'),
(897, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:53:35', '2021-04-22 22:53:35'),
(898, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:54:14', '2021-04-22 22:54:14'),
(899, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 22:54:38', '2021-04-22 22:54:38'),
(900, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 22:54:56', '2021-04-22 22:54:56'),
(901, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 22:55:31', '2021-04-22 22:55:31'),
(902, 'Shipment Datewise', 'Visited Shipment Datewise', 'Wajahat', '2021-04-22 22:59:34', '2021-04-22 22:59:34'),
(903, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 22:59:47', '2021-04-22 22:59:47'),
(904, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 23:08:47', '2021-04-22 23:08:47'),
(905, 'Shipmentstatus index', 'Visited Shipmentstatus Index', 'Wajahat', '2021-04-22 23:08:51', '2021-04-22 23:08:51'),
(906, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 23:08:53', '2021-04-22 23:08:53'),
(907, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 23:27:23', '2021-04-22 23:27:23'),
(908, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:27:56', '2021-04-22 23:27:56'),
(909, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:29:45', '2021-04-22 23:29:45'),
(910, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:32:57', '2021-04-22 23:32:57'),
(911, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:36:31', '2021-04-22 23:36:31'),
(912, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:37:46', '2021-04-22 23:37:46'),
(913, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:38:34', '2021-04-22 23:38:34'),
(914, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:39:12', '2021-04-22 23:39:12'),
(915, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:43:16', '2021-04-22 23:43:16'),
(916, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:44:47', '2021-04-22 23:44:47'),
(917, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 23:44:50', '2021-04-22 23:44:50'),
(918, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 23:44:53', '2021-04-22 23:44:53'),
(919, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-22 23:44:57', '2021-04-22 23:44:57'),
(920, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 23:45:02', '2021-04-22 23:45:02'),
(921, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-22 23:45:06', '2021-04-22 23:45:06'),
(922, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:45:12', '2021-04-22 23:45:12'),
(923, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-22 23:45:51', '2021-04-22 23:45:51'),
(924, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:45:54', '2021-04-22 23:45:54'),
(925, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-22 23:45:56', '2021-04-22 23:45:56'),
(926, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-22 23:46:07', '2021-04-22 23:46:07'),
(927, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:12:34', '2021-04-23 00:12:34'),
(928, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-23 00:12:37', '2021-04-23 00:12:37'),
(929, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:14:45', '2021-04-23 00:14:45'),
(930, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-23 00:14:52', '2021-04-23 00:14:52'),
(931, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-23 00:15:23', '2021-04-23 00:15:23'),
(932, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:15:23', '2021-04-23 00:15:23'),
(933, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:15:43', '2021-04-23 00:15:43'),
(934, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-23 00:19:10', '2021-04-23 00:19:10'),
(935, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:19:12', '2021-04-23 00:19:12');
INSERT INTO `activities` (`id`, `module_name`, `action_name`, `user_name`, `created_at`, `updated_at`) VALUES
(936, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:28:22', '2021-04-23 00:28:22'),
(937, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:28:26', '2021-04-23 00:28:26'),
(938, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:29:40', '2021-04-23 00:29:40'),
(939, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:30:23', '2021-04-23 00:30:23'),
(940, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:30:36', '2021-04-23 00:30:36'),
(941, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:31:39', '2021-04-23 00:31:39'),
(942, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:31:43', '2021-04-23 00:31:43'),
(943, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:32:32', '2021-04-23 00:32:32'),
(944, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:32:37', '2021-04-23 00:32:37'),
(945, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:36:24', '2021-04-23 00:36:24'),
(946, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:38:18', '2021-04-23 00:38:18'),
(947, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:38:25', '2021-04-23 00:38:25'),
(948, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:38:28', '2021-04-23 00:38:28'),
(949, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:40:29', '2021-04-23 00:40:29'),
(950, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:40:35', '2021-04-23 00:40:35'),
(951, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:40:39', '2021-04-23 00:40:39'),
(952, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:41:45', '2021-04-23 00:41:45'),
(953, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:41:53', '2021-04-23 00:41:53'),
(954, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:42:09', '2021-04-23 00:42:09'),
(955, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:47:48', '2021-04-23 00:47:48'),
(956, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 00:47:53', '2021-04-23 00:47:53'),
(957, 'Company Create', 'Visited Create Company Page', 'Wajahat', '2021-04-23 00:48:12', '2021-04-23 00:48:12'),
(958, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 00:48:53', '2021-04-23 00:48:53'),
(959, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-23 00:48:57', '2021-04-23 00:48:57'),
(960, 'Account Show', 'Checked Account Record', 'Wajahat', '2021-04-23 00:49:03', '2021-04-23 00:49:03'),
(961, 'Account index', 'Visited Account Index', 'Wajahat', '2021-04-23 00:49:15', '2021-04-23 00:49:15'),
(962, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-23 00:49:22', '2021-04-23 00:49:22'),
(963, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-23 00:50:48', '2021-04-23 00:50:48'),
(964, 'Company Create', 'Visited Create Company Page', 'Wajahat', '2021-04-23 01:18:13', '2021-04-23 01:18:13'),
(965, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 02:07:59', '2021-04-23 02:07:59'),
(966, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 02:08:08', '2021-04-23 02:08:08'),
(967, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 02:08:12', '2021-04-23 02:08:12'),
(968, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-23 02:08:15', '2021-04-23 02:08:15'),
(969, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-23 02:09:53', '2021-04-23 02:09:53'),
(970, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 02:09:53', '2021-04-23 02:09:53'),
(971, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 02:10:46', '2021-04-23 02:10:46'),
(972, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 02:12:31', '2021-04-23 02:12:31'),
(973, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 02:13:12', '2021-04-23 02:13:12'),
(974, 'Station index', 'Visited Station Index', 'Wajahat', '2021-04-23 02:27:40', '2021-04-23 02:27:40'),
(975, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 02:27:46', '2021-04-23 02:27:46'),
(976, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-23 02:27:53', '2021-04-23 02:27:53'),
(977, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 02:28:14', '2021-04-23 02:28:14'),
(978, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-23 02:28:18', '2021-04-23 02:28:18'),
(979, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-23 02:28:28', '2021-04-23 02:28:28'),
(980, 'Shipment Datewise', 'Visited Shipment Datewise', 'Wajahat', '2021-04-23 02:28:34', '2021-04-23 02:28:34'),
(981, 'User Index', 'Visited User Index Page', 'Mohammad', '2021-04-23 02:29:00', '2021-04-23 02:29:00'),
(982, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-23 02:29:23', '2021-04-23 02:29:23'),
(983, 'Shipment Datewise', 'Visited Shipment Datewise', 'Mohammad', '2021-04-23 02:30:07', '2021-04-23 02:30:07'),
(984, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Mohammad', '2021-04-23 02:30:18', '2021-04-23 02:30:18'),
(985, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 02:31:21', '2021-04-23 02:31:21'),
(986, 'Shipment Create', 'Visited Create Shipment Page', 'Fahad', '2021-04-23 02:32:29', '2021-04-23 02:32:29'),
(987, 'User Index', 'Visited User Index Page', 'Mohammad', '2021-04-23 03:02:49', '2021-04-23 03:02:49'),
(988, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Mohammad', '2021-04-23 03:02:54', '2021-04-23 03:02:54'),
(989, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Mohammad', '2021-04-23 03:03:39', '2021-04-23 03:03:39'),
(990, 'Shipment Datewise', 'Visited Shipment Datewise', 'Mohammad', '2021-04-23 03:03:43', '2021-04-23 03:03:43'),
(991, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Mohammad', '2021-04-23 03:03:52', '2021-04-23 03:03:52'),
(992, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Mohammad', '2021-04-23 03:05:01', '2021-04-23 03:05:01'),
(993, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Mohammad', '2021-04-23 03:08:29', '2021-04-23 03:08:29'),
(994, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Mohammad', '2021-04-23 03:08:37', '2021-04-23 03:08:37'),
(995, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 04:38:52', '2021-04-23 04:38:52'),
(996, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-23 04:39:48', '2021-04-23 04:39:48'),
(997, 'User Index', 'Visited User Index Page', 'Mohammad', '2021-04-23 04:41:30', '2021-04-23 04:41:30'),
(998, 'User Index', 'Visited User Index Page', 'Mohammad', '2021-04-23 04:42:27', '2021-04-23 04:42:27'),
(999, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Mohammad', '2021-04-23 04:42:34', '2021-04-23 04:42:34'),
(1000, 'Shipment Create', 'Visited Create Shipment Page', 'Fahad', '2021-04-23 10:02:03', '2021-04-23 10:02:03'),
(1001, 'Shipment Datewise Result', 'Visited Shipment Datewise Result', 'Wajahat', '2021-04-23 10:02:28', '2021-04-23 10:02:28'),
(1002, 'Shipmenttracking index', 'Visited Shipmenttracking Index', 'Wajahat', '2021-04-23 10:02:34', '2021-04-23 10:02:34'),
(1003, 'Shipment Create', 'Visited Create Shipment Page', 'Wajahat', '2021-04-23 10:02:45', '2021-04-23 10:02:45'),
(1004, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-23 10:03:24', '2021-04-23 10:03:24'),
(1005, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-23 10:18:31', '2021-04-23 10:18:31'),
(1006, 'Shipment Create', 'Visited Create Shipment Page', 'Mohammad', '2021-04-23 10:18:48', '2021-04-23 10:18:48'),
(1007, 'Shipment Created', 'Created new Shipment', 'Mohammad', '2021-04-23 10:20:46', '2021-04-23 10:20:46'),
(1008, 'Shipment Show', 'Checked Shipment Record', 'Mohammad', '2021-04-23 10:20:47', '2021-04-23 10:20:47'),
(1009, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 10:43:40', '2021-04-23 10:43:40'),
(1010, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 10:46:13', '2021-04-23 10:46:13'),
(1011, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 10:53:00', '2021-04-23 10:53:00'),
(1012, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 10:53:45', '2021-04-23 10:53:45'),
(1013, 'Shipment Create', 'Visited Create Shipment Page', 'Fahad', '2021-04-23 11:04:58', '2021-04-23 11:04:58'),
(1014, 'User Show', 'Viewed User Show Page', 'Mohammad', '2021-04-23 11:05:30', '2021-04-23 11:05:30'),
(1015, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 11:06:03', '2021-04-23 11:06:03'),
(1016, 'User Show', 'Viewed User Show Page', 'Mohammad', '2021-04-23 11:09:58', '2021-04-23 11:09:58'),
(1017, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 11:10:41', '2021-04-23 11:10:41'),
(1018, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-23 11:10:54', '2021-04-23 11:10:54'),
(1019, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-23 11:11:08', '2021-04-23 11:11:08'),
(1020, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 11:11:08', '2021-04-23 11:11:08'),
(1021, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-23 11:11:36', '2021-04-23 11:11:36'),
(1022, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-23 11:11:59', '2021-04-23 11:11:59'),
(1023, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 11:11:59', '2021-04-23 11:11:59'),
(1024, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-23 11:13:49', '2021-04-23 11:13:49'),
(1025, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-23 11:14:02', '2021-04-23 11:14:02'),
(1026, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 11:14:03', '2021-04-23 11:14:03'),
(1027, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 11:15:05', '2021-04-23 11:15:05'),
(1028, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-23 11:16:14', '2021-04-23 11:16:14'),
(1029, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-23 11:31:18', '2021-04-23 11:31:18'),
(1030, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-23 11:32:05', '2021-04-23 11:32:05'),
(1031, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 11:32:06', '2021-04-23 11:32:06'),
(1032, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 11:33:01', '2021-04-23 11:33:01'),
(1033, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 11:35:47', '2021-04-23 11:35:47'),
(1034, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-23 11:35:51', '2021-04-23 11:35:51'),
(1035, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-23 11:36:03', '2021-04-23 11:36:03'),
(1036, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 11:36:03', '2021-04-23 11:36:03'),
(1037, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-23 11:36:53', '2021-04-23 11:36:53'),
(1038, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-23 11:37:02', '2021-04-23 11:37:02'),
(1039, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 11:37:03', '2021-04-23 11:37:03'),
(1040, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 11:37:14', '2021-04-23 11:37:14'),
(1041, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 11:39:01', '2021-04-23 11:39:01'),
(1042, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 11:39:06', '2021-04-23 11:39:06'),
(1043, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 11:39:21', '2021-04-23 11:39:21'),
(1044, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 11:39:51', '2021-04-23 11:39:51'),
(1045, 'User Edit', 'Visited User Edit Page', 'Wajahat', '2021-04-23 11:39:55', '2021-04-23 11:39:55'),
(1046, 'User updated', 'Edited A User Record', 'Wajahat', '2021-04-23 11:40:17', '2021-04-23 11:40:17'),
(1047, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 11:40:17', '2021-04-23 11:40:17'),
(1048, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 11:40:22', '2021-04-23 11:40:22'),
(1049, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-04-23 11:40:30', '2021-04-23 11:40:30'),
(1050, 'User Show', 'Viewed User Show Page', 'Mohammad', '2021-04-23 11:40:43', '2021-04-23 11:40:43'),
(1051, 'User Show', 'Viewed User Show Page', 'Mohammad', '2021-04-23 11:41:15', '2021-04-23 11:41:15'),
(1052, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-04-23 11:41:38', '2021-04-23 11:41:38'),
(1053, 'Station index', 'Visited Station Index', 'Wajahat', '2021-05-24 13:31:08', '2021-05-24 13:31:08'),
(1054, 'User Index', 'Visited User Index Page', 'Wajahat', '2021-07-07 11:20:39', '2021-07-07 11:20:39'),
(1055, 'Job index', 'Visited Job Index', 'Wajahat', '2021-07-07 11:45:44', '2021-07-07 11:45:44'),
(1056, 'Job Create', 'Visited Create Job Page', 'Wajahat', '2021-07-07 11:45:53', '2021-07-07 11:45:53'),
(1057, 'Job Create', 'Visited Create Job Page', 'Wajahat', '2021-07-07 11:48:05', '2021-07-07 11:48:05'),
(1058, 'Job Created', 'Created new Job', 'Wajahat', '2021-07-07 11:48:44', '2021-07-07 11:48:44'),
(1059, 'Job index', 'Visited Job Index', 'Wajahat', '2021-07-07 11:48:45', '2021-07-07 11:48:45'),
(1060, 'Job index', 'Visited Job Index', 'Wajahat', '2021-07-07 11:48:54', '2021-07-07 11:48:54'),
(1061, 'Job index', 'Visited Job Index', 'Wajahat', '2021-07-07 11:53:00', '2021-07-07 11:53:00'),
(1062, 'Job index', 'Visited Job Index', 'Wajahat', '2021-07-07 11:54:19', '2021-07-07 11:54:19'),
(1063, 'Job index', 'Visited Job Index', 'Wajahat', '2021-07-07 11:55:16', '2021-07-07 11:55:16'),
(1064, 'Category index', 'Visited Category Index', 'Wajahat', '2021-07-07 12:12:13', '2021-07-07 12:12:13'),
(1065, 'Category Create', 'Visited Create Category Page', 'Wajahat', '2021-07-07 12:12:18', '2021-07-07 12:12:18'),
(1066, 'Category Created', 'Created new Category', 'Wajahat', '2021-07-07 12:12:34', '2021-07-07 12:12:34'),
(1067, 'Category index', 'Visited Category Index', 'Wajahat', '2021-07-07 12:12:35', '2021-07-07 12:12:35'),
(1068, 'Category Create', 'Visited Create Category Page', 'Wajahat', '2021-07-07 12:12:41', '2021-07-07 12:12:41'),
(1069, 'Category Created', 'Created new Category', 'Wajahat', '2021-07-07 12:13:02', '2021-07-07 12:13:02'),
(1070, 'Category index', 'Visited Category Index', 'Wajahat', '2021-07-07 12:13:02', '2021-07-07 12:13:02'),
(1071, 'Category Create', 'Visited Create Category Page', 'Wajahat', '2021-07-07 12:13:07', '2021-07-07 12:13:07'),
(1072, 'Category Created', 'Created new Category', 'Wajahat', '2021-07-07 12:13:46', '2021-07-07 12:13:46'),
(1073, 'Category index', 'Visited Category Index', 'Wajahat', '2021-07-07 12:13:47', '2021-07-07 12:13:47'),
(1074, 'Job index', 'Visited Job Index', 'Wajahat', '2021-07-07 12:25:01', '2021-07-07 12:25:01'),
(1075, 'Job Edit', 'Visited Job Edit Page', 'Wajahat', '2021-07-07 12:25:36', '2021-07-07 12:25:36'),
(1076, 'Job Edit', 'Visited Job Edit Page', 'Wajahat', '2021-07-07 12:25:48', '2021-07-07 12:25:48'),
(1077, 'Job Updated', 'Edited a Job', 'Wajahat', '2021-07-07 12:27:09', '2021-07-07 12:27:09'),
(1078, 'Job index', 'Visited Job Index', 'Wajahat', '2021-07-07 12:27:10', '2021-07-07 12:27:10'),
(1079, 'Job', 'Trashed a Job', 'Wajahat', '2021-07-07 12:27:31', '2021-07-07 12:27:31'),
(1080, 'Job index', 'Visited Job Index', 'Wajahat', '2021-07-07 12:27:31', '2021-07-07 12:27:31'),
(1081, 'Job Deleted', 'Checked Job Trash', 'Wajahat', '2021-07-07 12:27:36', '2021-07-07 12:27:36'),
(1082, 'Job Restore', 'Restored Single Job', 'Wajahat', '2021-07-07 12:27:43', '2021-07-07 12:27:43'),
(1083, 'Job index', 'Visited Job Index', 'Wajahat', '2021-07-07 12:27:44', '2021-07-07 12:27:44'),
(1084, 'Category index', 'Visited Category Index', 'Wajahat', '2021-07-07 12:29:08', '2021-07-07 12:29:08'),
(1085, 'Category', 'Trashed a Category', 'Wajahat', '2021-07-07 12:29:17', '2021-07-07 12:29:17'),
(1086, 'Category index', 'Visited Category Index', 'Wajahat', '2021-07-07 12:29:18', '2021-07-07 12:29:18'),
(1087, 'Category Deleted', 'Checked Category Trash', 'Wajahat', '2021-07-07 12:29:23', '2021-07-07 12:29:23'),
(1088, 'Category Restore', 'Restored Single Category', 'Wajahat', '2021-07-07 12:29:28', '2021-07-07 12:29:28'),
(1089, 'Category index', 'Visited Category Index', 'Wajahat', '2021-07-07 12:29:28', '2021-07-07 12:29:28'),
(1090, 'Category Edit', 'Visited Category Edit Page', 'Wajahat', '2021-07-07 12:29:42', '2021-07-07 12:29:42'),
(1091, 'Category Updated', 'Edited a Category', 'Wajahat', '2021-07-07 12:29:53', '2021-07-07 12:29:53'),
(1092, 'Category index', 'Visited Category Index', 'Wajahat', '2021-07-07 12:29:54', '2021-07-07 12:29:54'),
(1093, 'Category index', 'Visited Category Index', 'Wajahat', '2021-07-07 12:30:06', '2021-07-07 12:30:06'),
(1094, 'User Show', 'Viewed User Show Page', 'Wajahat', '2021-07-07 12:54:03', '2021-07-07 12:54:03'),
(1095, 'Category index', 'Visited Category Index', 'Wajahat', '2021-07-07 14:06:06', '2021-07-07 14:06:06'),
(1096, 'Job index', 'Visited Job Index', 'Waqar', '2021-07-11 15:03:20', '2021-07-11 15:03:20'),
(1097, 'Job Create', 'Visited Create Job Page', 'Waqar', '2021-07-11 15:03:47', '2021-07-11 15:03:47'),
(1098, 'Category index', 'Visited Category Index', 'Waqar', '2021-07-11 15:04:15', '2021-07-11 15:04:15'),
(1099, 'Category Edit', 'Visited Category Edit Page', 'Waqar', '2021-07-11 15:04:26', '2021-07-11 15:04:26'),
(1100, 'Category Updated', 'Edited a Category', 'Waqar', '2021-07-11 15:04:33', '2021-07-11 15:04:33'),
(1101, 'Category index', 'Visited Category Index', 'Waqar', '2021-07-11 15:04:33', '2021-07-11 15:04:33'),
(1102, 'User Show', 'Viewed User Show Page', 'Waqar', '2021-07-11 15:05:35', '2021-07-11 15:05:35'),
(1103, 'Account Create', 'Visited Create Account Page', 'Waqar', '2021-07-11 15:06:11', '2021-07-11 15:06:11'),
(1104, 'User Index', 'Visited User Index Page', 'Waqar', '2021-07-11 15:06:23', '2021-07-11 15:06:23'),
(1105, 'User Create', 'Visited User Create Page', 'Waqar', '2021-07-11 15:06:53', '2021-07-11 15:06:53'),
(1106, 'Job index', 'Visited Job Index', 'Waqar', '2021-07-25 12:16:04', '2021-07-25 12:16:04'),
(1107, 'Job index', 'Visited Job Index', 'Waqar', '2021-07-25 12:20:02', '2021-07-25 12:20:02'),
(1108, 'Job index', 'Visited Job Index', 'Waqar', '2021-07-25 12:20:26', '2021-07-25 12:20:26'),
(1109, 'Job index', 'Visited Job Index', 'Waqar', '2021-07-25 12:21:24', '2021-07-25 12:21:24'),
(1110, 'Job index', 'Visited Job Index', 'Waqar', '2021-07-25 12:21:37', '2021-07-25 12:21:37'),
(1111, 'Job index', 'Visited Job Index', 'Waqar', '2021-07-25 12:22:16', '2021-07-25 12:22:16'),
(1112, 'Job index', 'Visited Job Index', 'Waqar', '2021-07-25 12:23:12', '2021-07-25 12:23:12'),
(1113, 'Job index', 'Visited Job Index', 'Waqar', '2021-07-25 12:23:26', '2021-07-25 12:23:26'),
(1114, 'Job index', 'Visited Job Index', 'Waqar', '2021-07-25 12:29:44', '2021-07-25 12:29:44'),
(1115, 'User Show', 'Viewed User Show Page', 'Waqar', '2021-07-25 14:01:22', '2021-07-25 14:01:22'),
(1116, 'City index', 'Visited City Index', 'Waqar', '2021-07-25 14:53:55', '2021-07-25 14:53:55'),
(1117, 'City Upload', 'Visited City Upload Page', 'Waqar', '2021-07-25 14:57:13', '2021-07-25 14:57:13'),
(1118, 'City index', 'Visited City Index', 'Waqar', '2021-07-25 14:59:47', '2021-07-25 14:59:47'),
(1119, 'City index', 'Visited City Index', 'Waqar', '2021-07-25 15:00:29', '2021-07-25 15:00:29'),
(1120, 'City Upload', 'Visited City Upload Page', 'Waqar', '2021-07-25 15:00:34', '2021-07-25 15:00:34'),
(1121, 'City Uploaded', 'Uploaded Multiple cities with CSV', 'Waqar', '2021-07-25 15:01:11', '2021-07-25 15:01:11'),
(1122, 'City index', 'Visited City Index', 'Waqar', '2021-07-25 15:01:12', '2021-07-25 15:01:12'),
(1123, 'Job index', 'Visited Job Index', 'Waqar', '2021-08-02 21:49:38', '2021-08-02 21:49:38'),
(1124, 'Job index', 'Visited Job Index', 'Waqar', '2021-08-02 21:49:56', '2021-08-02 21:49:56'),
(1125, 'Job index', 'Visited Job Index', 'Waqar', '2021-08-02 21:56:01', '2021-08-02 21:56:01'),
(1126, 'Job index', 'Visited Job Index', 'Waqar', '2021-08-02 21:58:38', '2021-08-02 21:58:38'),
(1127, 'Category index', 'Visited Category Index', 'Waqar', '2021-08-02 22:13:38', '2021-08-02 22:13:38'),
(1128, 'Job index', 'Visited Job Index', 'Waqar', '2021-08-02 22:13:55', '2021-08-02 22:13:55'),
(1129, 'Category index', 'Visited Category Index', 'Waqar', '2021-08-02 22:13:59', '2021-08-02 22:13:59'),
(1130, 'Account Create', 'Visited Create Account Page', 'Waqar', '2021-08-02 22:25:00', '2021-08-02 22:25:00'),
(1131, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-02 22:25:02', '2021-08-02 22:25:02'),
(1132, 'Account index', 'Visited Account Index', 'Waqar', '2021-08-02 22:25:06', '2021-08-02 22:25:06'),
(1133, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-02 22:25:08', '2021-08-02 22:25:08'),
(1134, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-02 22:25:10', '2021-08-02 22:25:10'),
(1135, 'Job index', 'Visited Job Index', 'Waqar', '2021-08-02 22:25:14', '2021-08-02 22:25:14'),
(1136, 'Category index', 'Visited Category Index', 'Waqar', '2021-08-02 22:25:17', '2021-08-02 22:25:17'),
(1137, 'Account Create', 'Visited Create Account Page', 'Waqar', '2021-08-02 23:40:07', '2021-08-02 23:40:07'),
(1138, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-02 23:40:11', '2021-08-02 23:40:11'),
(1139, 'Account index', 'Visited Account Index', 'Waqar', '2021-08-02 23:40:33', '2021-08-02 23:40:33'),
(1140, 'Account Create', 'Visited Create Account Page', 'Waqar', '2021-08-05 21:09:36', '2021-08-05 21:09:36'),
(1141, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-05 21:09:40', '2021-08-05 21:09:40'),
(1142, 'Account index', 'Visited Account Index', 'Waqar', '2021-08-05 21:09:42', '2021-08-05 21:09:42'),
(1143, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-05 21:09:46', '2021-08-05 21:09:46'),
(1144, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-05 21:18:12', '2021-08-05 21:18:12'),
(1145, 'Job index', 'Visited Job Index', 'Waqar', '2021-08-05 21:18:32', '2021-08-05 21:18:32'),
(1146, 'Category index', 'Visited Category Index', 'Waqar', '2021-08-05 21:18:36', '2021-08-05 21:18:36'),
(1147, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-05 21:18:44', '2021-08-05 21:18:44'),
(1148, 'Account index', 'Visited Account Index', 'Waqar', '2021-08-05 21:18:47', '2021-08-05 21:18:47'),
(1149, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-05 21:18:50', '2021-08-05 21:18:50'),
(1150, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-05 21:18:52', '2021-08-05 21:18:52'),
(1151, 'Job index', 'Visited Job Index', 'waqar', '2021-08-06 20:42:40', '2021-08-06 20:42:40'),
(1152, 'Job index', 'Visited Job Index', 'Waqar', '2021-08-06 20:43:29', '2021-08-06 20:43:29'),
(1153, 'Category index', 'Visited Category Index', 'Waqar', '2021-08-06 20:43:32', '2021-08-06 20:43:32'),
(1154, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-06 20:44:23', '2021-08-06 20:44:23'),
(1155, 'User Create', 'Visited User Create Page', 'Waqar', '2021-08-06 20:44:28', '2021-08-06 20:44:28'),
(1156, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-06 20:45:09', '2021-08-06 20:45:09'),
(1157, 'Account Create', 'Visited Create Account Page', 'Waqar', '2021-08-06 20:45:13', '2021-08-06 20:45:13'),
(1158, 'Account Create', 'Visited Create Account Page', 'Waqar', '2021-08-06 20:45:34', '2021-08-06 20:45:34'),
(1159, 'Job index', 'Visited Job Index', 'waqar', '2021-08-06 20:46:21', '2021-08-06 20:46:21'),
(1160, 'Job index', 'Visited Job Index', 'waqar', '2021-08-06 20:47:09', '2021-08-06 20:47:09'),
(1161, 'Job index', 'Visited Job Index', 'waqar', '2021-08-06 21:00:20', '2021-08-06 21:00:20'),
(1162, 'Job index', 'Visited Job Index', 'waqar', '2021-08-06 21:03:30', '2021-08-06 21:03:30'),
(1163, 'Job index', 'Visited Job Index', 'waqar', '2021-08-06 21:05:38', '2021-08-06 21:05:38'),
(1164, 'Job index', 'Visited Job Index', 'waqar', '2021-08-06 21:06:12', '2021-08-06 21:06:12'),
(1165, 'User Show', 'Viewed User Show Page', 'Waqar', '2021-08-06 21:07:41', '2021-08-06 21:07:41'),
(1166, 'User Show', 'Viewed User Show Page', 'waqar', '2021-08-06 21:11:29', '2021-08-06 21:11:29'),
(1167, 'User Show', 'Viewed User Show Page', 'ali', '2021-08-06 22:27:16', '2021-08-06 22:27:16'),
(1168, 'Job index', 'Visited Job Index', 'ali', '2021-08-06 22:29:00', '2021-08-06 22:29:00'),
(1169, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-06 22:51:20', '2021-08-06 22:51:20'),
(1170, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-06 22:53:06', '2021-08-06 22:53:06'),
(1171, 'Category index', 'Visited Category Index', 'Waqar', '2021-08-06 22:53:12', '2021-08-06 22:53:12'),
(1172, 'User Index', 'Visited User Index Page', 'Waqar', '2021-08-06 22:55:32', '2021-08-06 22:55:32'),
(1173, 'User Show', 'Viewed User Show Page', 'Waqar', '2021-08-06 23:12:41', '2021-08-06 23:12:41'),
(1174, 'User Show', 'Viewed User Show Page', 'Waqar', '2021-08-06 23:13:12', '2021-08-06 23:13:12'),
(1175, 'User Show', 'Viewed User Show Page', 'Waqar', '2021-08-06 23:14:33', '2021-08-06 23:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_code`, `category_name`, `category_status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'MILTRY', 'MILTARY JOBS', 1, '2021-07-07 12:12:34', '2021-07-11 15:04:33', 'Wajahat', 'Waqar', NULL),
(2, 'CIVIL', 'CIVIL JOBS', 1, '2021-07-07 12:13:02', '2021-07-07 12:13:02', 'Wajahat', NULL, NULL),
(3, 'MEDIA', 'MEDIA JOBS', 1, '2021-07-07 12:13:46', '2021-07-07 12:13:46', 'Wajahat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_code`, `city_name`, `city_status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'Karachi', 'Karachi', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(2, 'Lahore', 'Lahore', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(3, 'Faisalabad', 'Faisalabad', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(4, 'Rawalpindi', 'Rawalpindi', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(5, 'Gujranwala', 'Gujranwala', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(6, 'Peshawar', 'Peshawar', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(7, 'Multan', 'Multan', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(8, 'Saidu Sharif', 'Saidu Sharif', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(9, 'Hyderabad City', 'Hyderabad City', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(10, 'Islamabad', 'Islamabad', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(11, 'Quetta', 'Quetta', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(12, 'Bahawalpur', 'Bahawalpur', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(13, 'Sargodha', 'Sargodha', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(14, 'Sialkot City', 'Sialkot City', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(15, 'Sukkur', 'Sukkur', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(16, 'Larkana', 'Larkana', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(17, 'Chiniot', 'Chiniot', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(18, 'Shekhupura', 'Shekhupura', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(19, 'Jhang City', 'Jhang City', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(20, 'Dera Ghazi Khan', 'Dera Ghazi Khan', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(21, 'Gujrat', 'Gujrat', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(22, 'Rahimyar Khan', 'Rahimyar Khan', 1, '2021-07-25 15:01:04', '2021-07-25 15:01:04', NULL, NULL, NULL),
(23, 'Kasur', 'Kasur', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(24, 'Mardan', 'Mardan', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(25, 'Mingaora', 'Mingaora', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(26, 'Nawabshah', 'Nawabshah', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(27, 'Sahiwal', 'Sahiwal', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(28, 'Mirpur Khas', 'Mirpur Khas', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(29, 'Okara', 'Okara', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(30, 'Mandi Burewala', 'Mandi Burewala', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(31, 'Jacobabad', 'Jacobabad', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(32, 'Saddiqabad', 'Saddiqabad', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(33, 'Kohat', 'Kohat', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(34, 'Muridke', 'Muridke', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(35, 'Muzaffargarh', 'Muzaffargarh', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(36, 'Khanpur', 'Khanpur', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(37, 'Gojra', 'Gojra', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(38, 'Mandi Bahauddin', 'Mandi Bahauddin', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(39, 'Abbottabad', 'Abbottabad', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(40, 'Turbat', 'Turbat', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(41, 'Dadu', 'Dadu', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(42, 'Bahawalnagar', 'Bahawalnagar', 1, '2021-07-25 15:01:05', '2021-07-25 15:01:05', NULL, NULL, NULL),
(43, 'Khuzdar', 'Khuzdar', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(44, 'Pakpattan', 'Pakpattan', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(45, 'Tando Allahyar', 'Tando Allahyar', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(46, 'Ahmadpur East', 'Ahmadpur East', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(47, 'Vihari', 'Vihari', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(48, 'Jaranwala', 'Jaranwala', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(49, 'New Mirpur', 'New Mirpur', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(50, 'Kamalia', 'Kamalia', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(51, 'Kot Addu', 'Kot Addu', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(52, 'Nowshera', 'Nowshera', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(53, 'Swabi', 'Swabi', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(54, 'Khushab', 'Khushab', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(55, 'Dera Ismail Khan', 'Dera Ismail Khan', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(56, 'Chaman', 'Chaman', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(57, 'Charsadda', 'Charsadda', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(58, 'Kandhkot', 'Kandhkot', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(59, 'Chishtian', 'Chishtian', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(60, 'Hasilpur', 'Hasilpur', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(61, 'Attock Khurd', 'Attock Khurd', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(62, 'Muzaffarabad', 'Muzaffarabad', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(63, 'Mianwali', 'Mianwali', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(64, 'Jalalpur Jattan', 'Jalalpur Jattan', 1, '2021-07-25 15:01:06', '2021-07-25 15:01:06', NULL, NULL, NULL),
(65, 'Bhakkar', 'Bhakkar', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(66, 'Zhob', 'Zhob', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(67, 'Dipalpur', 'Dipalpur', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(68, 'Kharian', 'Kharian', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(69, 'Mian Channun', 'Mian Channun', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(70, 'Bhalwal', 'Bhalwal', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(71, 'Jamshoro', 'Jamshoro', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(72, 'Pattoki', 'Pattoki', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(73, 'Harunabad', 'Harunabad', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(74, 'Kahror Pakka', 'Kahror Pakka', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(75, 'Toba Tek Singh', 'Toba Tek Singh', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(76, 'Samundri', 'Samundri', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(77, 'Shakargarh', 'Shakargarh', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(78, 'Sambrial', 'Sambrial', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(79, 'Shujaabad', 'Shujaabad', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(80, 'Hujra Shah Muqim', 'Hujra Shah Muqim', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(81, 'Kabirwala', 'Kabirwala', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(82, 'Mansehra', 'Mansehra', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(83, 'Lala Musa', 'Lala Musa', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(84, 'Chunian', 'Chunian', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(85, 'Nankana Sahib', 'Nankana Sahib', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(86, 'Bannu', 'Bannu', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(87, 'Pasrur', 'Pasrur', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(88, 'Timargara', 'Timargara', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(89, 'Parachinar', 'Parachinar', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(90, 'Chenab Nagar', 'Chenab Nagar', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(91, 'Gwadar', 'Gwadar', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(92, 'Abdul Hakim', 'Abdul Hakim', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(93, 'Hassan Abdal', 'Hassan Abdal', 1, '2021-07-25 15:01:07', '2021-07-25 15:01:07', NULL, NULL, NULL),
(94, 'Tank', 'Tank', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(95, 'Hangu', 'Hangu', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(96, 'Risalpur Cantonment', 'Risalpur Cantonment', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(97, 'Karak', 'Karak', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(98, 'Kundian', 'Kundian', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(99, 'Umarkot', 'Umarkot', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(100, 'Chitral', 'Chitral', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(101, 'Dainyor', 'Dainyor', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(102, 'Kulachi', 'Kulachi', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(103, 'Kalat', 'Kalat', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(104, 'Kotli', 'Kotli', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(105, 'Gilgit', 'Gilgit', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(106, 'Narowal', 'Narowal', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(107, 'Khairpur Mir’s', 'Khairpur Mir’s', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(108, 'Khanewal', 'Khanewal', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(109, 'Jhelum', 'Jhelum', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(110, 'Haripur', 'Haripur', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(111, 'Shikarpur', 'Shikarpur', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(112, 'Rawala Kot', 'Rawala Kot', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(113, 'Hafizabad', 'Hafizabad', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(114, 'Lodhran', 'Lodhran', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(115, 'Malakand', 'Malakand', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(116, 'Attock City', 'Attock City', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(117, 'Batgram', 'Batgram', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(118, 'Matiari', 'Matiari', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(119, 'Ghotki', 'Ghotki', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(120, 'Naushahro Firoz', 'Naushahro Firoz', 1, '2021-07-25 15:01:08', '2021-07-25 15:01:08', NULL, NULL, NULL),
(121, 'Alpurai', 'Alpurai', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(122, 'Bagh', 'Bagh', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(123, 'Daggar', 'Daggar', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(124, 'Leiah', 'Leiah', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(125, 'Tando Muhammad Khan', 'Tando Muhammad Khan', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(126, 'Chakwal', 'Chakwal', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(127, 'Badin', 'Badin', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(128, 'Lakki', 'Lakki', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(129, 'Rajanpur', 'Rajanpur', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(130, 'Dera Allahyar', 'Dera Allahyar', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(131, 'Shahdad Kot', 'Shahdad Kot', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(132, 'Pishin', 'Pishin', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(133, 'Sanghar', 'Sanghar', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(134, 'Upper Dir', 'Upper Dir', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(135, 'Thatta', 'Thatta', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(136, 'Dera Murad Jamali', 'Dera Murad Jamali', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(137, 'Kohlu', 'Kohlu', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(138, 'Mastung', 'Mastung', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(139, 'Dasu', 'Dasu', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(140, 'Athmuqam', 'Athmuqam', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(141, 'Loralai', 'Loralai', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(142, 'Barkhan', 'Barkhan', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(143, 'Musa Khel Bazar', 'Musa Khel Bazar', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(144, 'Ziarat', 'Ziarat', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(145, 'Gandava', 'Gandava', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(146, 'Sibi', 'Sibi', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(147, 'Dera Bugti', 'Dera Bugti', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(148, 'Eidgah', 'Eidgah', 1, '2021-07-25 15:01:09', '2021-07-25 15:01:09', NULL, NULL, NULL),
(149, 'Uthal', 'Uthal', 1, '2021-07-25 15:01:10', '2021-07-25 15:01:10', NULL, NULL, NULL),
(150, 'Chilas', 'Chilas', 1, '2021-07-25 15:01:10', '2021-07-25 15:01:10', NULL, NULL, NULL),
(151, 'Panjgur', 'Panjgur', 1, '2021-07-25 15:01:10', '2021-07-25 15:01:10', NULL, NULL, NULL),
(152, 'Gakuch', 'Gakuch', 1, '2021-07-25 15:01:10', '2021-07-25 15:01:10', NULL, NULL, NULL),
(153, 'Qila Saifullah', 'Qila Saifullah', 1, '2021-07-25 15:01:10', '2021-07-25 15:01:10', NULL, NULL, NULL),
(154, 'Kharan', 'Kharan', 1, '2021-07-25 15:01:10', '2021-07-25 15:01:10', NULL, NULL, NULL),
(155, 'Aliabad', 'Aliabad', 1, '2021-07-25 15:01:10', '2021-07-25 15:01:10', NULL, NULL, NULL),
(156, 'Awaran', 'Awaran', 1, '2021-07-25 15:01:10', '2021-07-25 15:01:10', NULL, NULL, NULL),
(157, 'Dalbandin', 'Dalbandin', 1, '2021-07-25 15:01:10', '2021-07-25 15:01:10', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_code`, `job_description`, `job_link`, `job_status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'JOB1', 'THIS IS TEST JOB.', 'HTTPS://WWW.JOBZ.PK/NATIONAL-POLICE-FOUNDATION-NPF-BHARA-KHAU-JOBS-2021_JOBS-436940.HTML', 1, '2021-07-07 11:48:44', '2021-07-07 12:27:43', 'Wajahat', 'Wajahat', NULL);

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_09_26_133340_create_activities_table', 1),
(6, '2021_02_08_001153_create_permission_tables', 1),
(7, '2021_02_08_002238_create_activity_log_table', 1),
(8, '2021_03_28_222012_create_airwaybills_table', 1),
(9, '2021_03_28_225153_create_countries_table', 1),
(10, '2021_03_28_225154_create_states_table', 1),
(11, '2021_03_28_225155_create_cities_table', 1),
(12, '2021_03_28_225156_create_companies_table', 1),
(13, '2021_03_29_065057_create_services_table', 1),
(14, '2021_03_29_072153_create_shipmenttypes_table', 1),
(15, '2021_03_29_082050_create_shipmentmodes_table', 1),
(16, '2021_03_29_084909_create_titles_table', 1),
(17, '2021_03_30_184859_create_currencies_table', 1),
(18, '2021_03_31_115011_create_shipmentcontents_table', 1),
(19, '2021_04_01_074825_create_shipmentweights_table', 1),
(20, '2021_04_01_100219_create_shipmenttrackings_table', 1),
(21, '2021_04_03_135536_create_shipmentstatuses_table', 1),
(22, '2021_04_03_144042_create_locations_table', 1),
(23, '2021_04_03_174510_create_instructions_table', 1),
(24, '2021_04_06_155246_create_stations_table', 1),
(25, '2021_04_08_144920_create_debitsources_table', 1),
(26, '2021_04_09_110918_create_accountserials_table', 1),
(30, '2014_10_11_000000_create_accounts_table', 2),
(32, '2014_10_12_000000_create_users_table', 3),
(36, '2021_04_09_110919_create_shipments_table', 4),
(38, '2021_07_07_043008_create_jobs_table', 5),
(39, '2021_07_07_051101_create_categories_table', 6),
(40, '2021_07_25_075237_create_cities_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 1),
(5, 'App\\User', 10),
(5, 'App\\User', 11),
(5, 'App\\User', 12),
(5, 'App\\User', 13),
(5, 'App\\User', 15),
(5, 'App\\User', 18),
(5, 'App\\User', 19),
(5, 'App\\User', 20),
(10, 'App\\User', 2),
(10, 'App\\User', 3),
(10, 'App\\User', 4),
(10, 'App\\User', 5),
(10, 'App\\User', 6),
(10, 'App\\User', 7),
(10, 'App\\User', 8),
(10, 'App\\User', 9),
(10, 'App\\User', 14),
(10, 'App\\User', 16),
(10, 'App\\User', 17),
(10, 'App\\User', 21),
(10, 'App\\User', 22),
(10, 'App\\User', 23);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin-list', 'web', '2021-04-09 10:55:51', '2021-04-09 10:55:51'),
(2, 'SuperAdmin-create', 'web', '2021-04-09 10:55:51', '2021-04-09 10:55:51'),
(3, 'SuperAdmin-edit', 'web', '2021-04-09 10:55:52', '2021-04-09 10:55:52'),
(4, 'SuperAdmin-upload', 'web', '2021-04-09 10:55:52', '2021-04-09 10:55:52'),
(5, 'SuperAdmin-download', 'web', '2021-04-09 10:55:52', '2021-04-09 10:55:52'),
(6, 'SuperAdmin-export', 'web', '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(7, 'SuperAdmin-show-deleted', 'web', '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(8, 'SuperAdmin-restore', 'web', '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(9, 'SuperAdmin-delete', 'web', '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(10, 'SuperAdmin-perm-delete', 'web', '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(11, 'Admin-list', 'web', '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(12, 'Admin-create', 'web', '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(13, 'Admin-edit', 'web', '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(14, 'Admin-upload', 'web', '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(15, 'Admin-download', 'web', '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(16, 'Admin-export', 'web', '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(17, 'Admin-show-deleted', 'web', '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(18, 'Admin-restore', 'web', '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(19, 'Admin-delete', 'web', '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(20, 'Admin-perm-delete', 'web', '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(21, 'Management-list', 'web', '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(22, 'Management-create', 'web', '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(23, 'Management-edit', 'web', '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(24, 'Management-upload', 'web', '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(25, 'Management-download', 'web', '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(26, 'Management-export', 'web', '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(27, 'Management-show-deleted', 'web', '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(28, 'Management-restore', 'web', '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(29, 'Management-delete', 'web', '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(30, 'Management-perm-delete', 'web', '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(31, 'Accounts-list', 'web', '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(32, 'Accounts-create', 'web', '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(33, 'Accounts-edit', 'web', '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(34, 'Accounts-upload', 'web', '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(35, 'Accounts-download', 'web', '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(36, 'Accounts-export', 'web', '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(37, 'Accounts-show-deleted', 'web', '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(38, 'Accounts-restore', 'web', '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(39, 'Accounts-delete', 'web', '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(40, 'Accounts-perm-delete', 'web', '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(41, 'Manager-list', 'web', '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(42, 'Manager-create', 'web', '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(43, 'Manager-edit', 'web', '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(44, 'Manager-upload', 'web', '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(45, 'Manager-download', 'web', '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(46, 'Manager-export', 'web', '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(47, 'Manager-show-deleted', 'web', '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(48, 'Manager-restore', 'web', '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(49, 'Manager-delete', 'web', '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(50, 'Manager-perm-delete', 'web', '2021-04-09 10:55:58', '2021-04-09 10:55:58'),
(51, 'Sales-list', 'web', '2021-04-09 10:55:58', '2021-04-09 10:55:58'),
(52, 'Sales-create', 'web', '2021-04-09 10:55:58', '2021-04-09 10:55:58'),
(53, 'Sales-edit', 'web', '2021-04-09 10:55:58', '2021-04-09 10:55:58'),
(54, 'Sales-upload', 'web', '2021-04-09 10:55:58', '2021-04-09 10:55:58'),
(55, 'Sales-download', 'web', '2021-04-09 10:55:58', '2021-04-09 10:55:58'),
(56, 'Sales-export', 'web', '2021-04-09 10:55:58', '2021-04-09 10:55:58'),
(57, 'Sales-show-deleted', 'web', '2021-04-09 10:55:58', '2021-04-09 10:55:58'),
(58, 'Sales-restore', 'web', '2021-04-09 10:55:59', '2021-04-09 10:55:59'),
(59, 'Sales-delete', 'web', '2021-04-09 10:55:59', '2021-04-09 10:55:59'),
(60, 'Sales-perm-delete', 'web', '2021-04-09 10:55:59', '2021-04-09 10:55:59'),
(61, 'Shipment-list', 'web', '2021-04-09 10:55:59', '2021-04-09 10:55:59'),
(62, 'Shipment-create', 'web', '2021-04-09 10:55:59', '2021-04-09 10:55:59'),
(63, 'Shipment-edit', 'web', '2021-04-09 10:55:59', '2021-04-09 10:55:59'),
(64, 'Shipment-upload', 'web', '2021-04-09 10:55:59', '2021-04-09 10:55:59'),
(65, 'Shipment-download', 'web', '2021-04-09 10:55:59', '2021-04-09 10:55:59'),
(66, 'Shipment-export', 'web', '2021-04-09 10:56:00', '2021-04-09 10:56:00'),
(67, 'Shipment-show-deleted', 'web', '2021-04-09 10:56:00', '2021-04-09 10:56:00'),
(68, 'Shipment-restore', 'web', '2021-04-09 10:56:00', '2021-04-09 10:56:00'),
(69, 'Shipment-delete', 'web', '2021-04-09 10:56:00', '2021-04-09 10:56:00'),
(70, 'Shipment-perm-delete', 'web', '2021-04-09 10:56:00', '2021-04-09 10:56:00'),
(71, 'FrontDesk-list', 'web', '2021-04-09 10:56:00', '2021-04-09 10:56:00'),
(72, 'FrontDesk-create', 'web', '2021-04-09 10:56:01', '2021-04-09 10:56:01'),
(73, 'FrontDesk-edit', 'web', '2021-04-09 10:56:01', '2021-04-09 10:56:01'),
(74, 'FrontDesk-upload', 'web', '2021-04-09 10:56:01', '2021-04-09 10:56:01'),
(75, 'FrontDesk-download', 'web', '2021-04-09 10:56:01', '2021-04-09 10:56:01'),
(76, 'FrontDesk-export', 'web', '2021-04-09 10:56:01', '2021-04-09 10:56:01'),
(77, 'FrontDesk-show-deleted', 'web', '2021-04-09 10:56:02', '2021-04-09 10:56:02'),
(78, 'FrontDesk-restore', 'web', '2021-04-09 10:56:02', '2021-04-09 10:56:02'),
(79, 'FrontDesk-delete', 'web', '2021-04-09 10:56:02', '2021-04-09 10:56:02'),
(80, 'FrontDesk-perm-delete', 'web', '2021-04-09 10:56:02', '2021-04-09 10:56:02'),
(81, 'Employee-list', 'web', '2021-04-09 10:56:02', '2021-04-09 10:56:02'),
(82, 'Employee-create', 'web', '2021-04-09 10:56:02', '2021-04-09 10:56:02'),
(83, 'Employee-edit', 'web', '2021-04-09 10:56:02', '2021-04-09 10:56:02'),
(84, 'Employee-upload', 'web', '2021-04-09 10:56:02', '2021-04-09 10:56:02'),
(85, 'Employee-download', 'web', '2021-04-09 10:56:03', '2021-04-09 10:56:03'),
(86, 'Employee-export', 'web', '2021-04-09 10:56:03', '2021-04-09 10:56:03'),
(87, 'Employee-show-deleted', 'web', '2021-04-09 10:56:03', '2021-04-09 10:56:03'),
(88, 'Employee-restore', 'web', '2021-04-09 10:56:03', '2021-04-09 10:56:03'),
(89, 'Employee-delete', 'web', '2021-04-09 10:56:03', '2021-04-09 10:56:03'),
(90, 'Employee-perm-delete', 'web', '2021-04-09 10:56:03', '2021-04-09 10:56:03'),
(91, 'Customer-list', 'web', '2021-04-09 10:56:04', '2021-04-09 10:56:04'),
(92, 'Customer-create', 'web', '2021-04-09 10:56:04', '2021-04-09 10:56:04'),
(93, 'Customer-edit', 'web', '2021-04-09 10:56:04', '2021-04-09 10:56:04'),
(94, 'Customer-upload', 'web', '2021-04-09 10:56:04', '2021-04-09 10:56:04'),
(95, 'Customer-download', 'web', '2021-04-09 10:56:04', '2021-04-09 10:56:04'),
(96, 'Customer-export', 'web', '2021-04-09 10:56:04', '2021-04-09 10:56:04'),
(97, 'Customer-show-deleted', 'web', '2021-04-09 10:56:05', '2021-04-09 10:56:05'),
(98, 'Customer-restore', 'web', '2021-04-09 10:56:05', '2021-04-09 10:56:05'),
(99, 'Customer-delete', 'web', '2021-04-09 10:56:05', '2021-04-09 10:56:05'),
(100, 'Customer-perm-delete', 'web', '2021-04-09 10:56:05', '2021-04-09 10:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', '2021-04-09 10:56:05', '2021-04-09 10:56:05'),
(2, 'Admin', 'web', '2021-04-09 10:56:08', '2021-04-09 10:56:08'),
(5, 'Manager', 'web', '2021-04-09 10:56:15', '2021-04-09 10:56:15'),
(10, 'Customer', 'web', '2021-04-09 10:56:25', '2021-04-09 10:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 5),
(22, 5),
(23, 5),
(24, 5),
(25, 5),
(26, 5),
(27, 5),
(28, 5),
(29, 5),
(30, 5),
(41, 5),
(42, 5),
(43, 5),
(44, 5),
(45, 5),
(46, 5),
(47, 5),
(48, 5),
(49, 5),
(50, 5),
(61, 5),
(62, 5),
(62, 10),
(63, 5),
(64, 5),
(65, 5),
(66, 5),
(67, 5),
(68, 5),
(69, 5),
(70, 5),
(91, 10),
(92, 2),
(92, 10),
(93, 2),
(93, 10),
(94, 10),
(95, 10),
(96, 10),
(97, 10),
(98, 10),
(99, 10),
(100, 10);

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `title_code`, `title_name`, `title_status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'MR.', 'MISTER', 1, '2021-04-13 04:19:56', '2021-04-13 04:19:56', 'Monis', NULL, NULL),
(2, 'MRS.', 'MISTERESS', 1, '2021-04-13 04:20:39', '2021-04-13 04:20:39', 'Monis', NULL, NULL),
(3, 'MISS', 'MISS', 1, '2021-04-13 04:23:57', '2021-04-13 04:23:57', 'Monis', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `accounts_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usercompany` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'mem_avatar.jpg',
  `user_status` tinyint(1) NOT NULL DEFAULT 0,
  `accounts_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `accounts_number`, `email`, `username`, `fname`, `lname`, `usercompany`, `email_verified_at`, `password`, `profile_pic`, `user_status`, `accounts_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '10001', 'admin@vup.edu.pk', '3810145614031', 'Waqar', 'Hussain', 'None', '2021-04-12 11:23:43', '$2y$10$KM/4Q53.TKAAiDngtvnNnu1MwnYOGKluWGqwf7myQslaQyQKWIU4C', 'admin.jpg', 1, '1', NULL, '2021-04-12 06:23:00', '2021-04-23 02:09:52', NULL, NULL, 'Wajahat', NULL),
(17, '10002', 'ptcbehal@gmail.com', 'fahad110', 'Fahad', 'Ahmad', 'None', '2021-04-22 00:45:14', '$2y$10$nFeMgBc1l26wuOJ3xkIJWOwCb647Ze/gl0MDPpSnRAGCcPvKCzgjO', 'profile_pic_648170344.jpg', 1, '8', NULL, '2021-04-22 00:44:44', '2021-04-22 00:53:31', NULL, 'Wajahat', NULL, NULL),
(19, '100002', 'ahmad07malik92@gmail.com', 'managervup1', 'Mohammad', 'Zain Naqvi', 'None', NULL, '$2y$10$7F8SIgd9W6EXEjzY9RNSieX7TbCxvPfDHdUCky.fLd203WwVvCSL6', 'userProfile_pic_1081143087.jpg', 1, '9', NULL, '2021-04-22 01:13:45', '2021-04-23 11:36:03', NULL, 'Web Registration', 'Wajahat', NULL),
(20, '10003', 'ahmad007malik92@gmail.com', 'managervup01', 'Mohammad', 'Zain Naqvi', 'None', '2021-04-22 01:22:00', '$2y$10$OycCEaLihc.suQNGeerZje9oalbSSiev2cThu8I9eOaCrikTbux8G', 'userProfile_pic_1356239681.jpg', 1, '10', NULL, '2021-04-22 01:21:31', '2021-04-23 11:40:17', NULL, 'Wajahat', 'Wajahat', NULL),
(21, NULL, 'malikv214@gmail.com', 'waqar119', 'waqar', 'hussain', 'APX Logistics', NULL, '$2y$10$Cewx8YIEyUMR72FQUIB4XenHQ3ixtfPkZ8/VXbfQFB7KKp3CsNTva', 'mem_avatar.jpg', 0, '11', 'atuvyRLSWEhAwanMtaI66ryNzOM0SE9zN7ZGYlDa2TANOITPVSyaQwwIcep4', '2021-08-05 22:00:28', '2021-08-05 22:00:28', NULL, 'Web Registration', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_accounts_email_unique` (`accounts_email`),
  ADD UNIQUE KEY `accounts_accounts_username_unique` (`accounts_username`),
  ADD UNIQUE KEY `accounts_accounts_cnic_unique` (`accounts_cnic`),
  ADD UNIQUE KEY `accounts_accounts_number_unique` (`accounts_number`);

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_code_unique` (`category_code`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cities_city_code_unique` (`city_code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobs_job_code_unique` (`job_code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titles_title_code_unique` (`title_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1176;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
