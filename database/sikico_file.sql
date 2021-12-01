-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2021 at 07:07 PM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikico_file`
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
(3, 1, '0042', 'LAHORE', 1, '10001', 'mnszaidyy@gmail.com', 'moniszaidi5', '3810129512815', 'Mudassar', 'Khan', 'Apx', '37 Raza Block', 'Allama Iqbal Town', 'imam bargah', 'Lahore', '44000', 'Punjab', 'Pakistan', '03165165155', '03165165155', NULL, 'profile_pic_1852315221.jpg', 'cnic_pic_a2108873192.jpg', 'cnic_pic_b843596839.jpg', 'logo_733389396.jpg', 1, 0, 1, 1, 'Wajahat', 'Wajahat', '2021-04-12 09:46:34', '2021-04-21 23:38:54', 'Web Registration', 'Wajahat', NULL);

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
(1, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 16:32:31', '2021-09-15 16:32:31'),
(2, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 16:48:10', '2021-09-15 16:48:10'),
(3, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 16:49:37', '2021-09-15 16:49:37'),
(4, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 16:51:33', '2021-09-15 16:51:33'),
(5, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 16:52:41', '2021-09-15 16:52:41'),
(6, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 16:54:53', '2021-09-15 16:54:53'),
(7, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 17:03:27', '2021-09-15 17:03:27'),
(8, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 17:04:58', '2021-09-15 17:04:58'),
(9, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 17:05:14', '2021-09-15 17:05:14'),
(10, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 17:11:31', '2021-09-15 17:11:31'),
(11, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 17:11:58', '2021-09-15 17:11:58'),
(12, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 17:20:54', '2021-09-15 17:20:54'),
(13, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 17:22:18', '2021-09-15 17:22:18'),
(14, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 17:22:47', '2021-09-15 17:22:47'),
(15, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 17:23:14', '2021-09-15 17:23:14'),
(16, 'File Updated', 'Edited a File', 'Admin', '2021-09-15 17:23:23', '2021-09-15 17:23:23'),
(17, 'File index', 'Visited File Index', 'Admin', '2021-09-15 17:23:23', '2021-09-15 17:23:23'),
(18, 'File Create', 'Visited Create File Page', 'Admin', '2021-09-15 17:33:48', '2021-09-15 17:33:48'),
(19, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-15 17:46:44', '2021-09-15 17:46:44'),
(20, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-15 17:51:23', '2021-09-15 17:51:23'),
(21, 'File index', 'Visited File Index', 'Admin', '2021-09-15 20:01:07', '2021-09-15 20:01:07'),
(22, 'File Create', 'Visited Create File Page', 'Admin', '2021-09-15 20:01:26', '2021-09-15 20:01:26'),
(23, 'File index', 'Visited File Index', 'Admin', '2021-09-15 20:01:32', '2021-09-15 20:01:32'),
(24, 'File Edit', 'Visited File Edit Page', 'Admin', '2021-09-15 20:01:36', '2021-09-15 20:01:36'),
(25, 'File Updated', 'Edited a File', 'Admin', '2021-09-15 20:01:57', '2021-09-15 20:01:57'),
(26, 'File index', 'Visited File Index', 'Admin', '2021-09-15 20:01:57', '2021-09-15 20:01:57'),
(27, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-15 20:03:35', '2021-09-15 20:03:35'),
(28, 'File index', 'Visited File Index', 'Admin', '2021-09-15 21:09:52', '2021-09-15 21:09:52'),
(29, 'File index', 'Visited File Index', 'Admin', '2021-09-15 21:29:45', '2021-09-15 21:29:45'),
(30, 'File index', 'Visited File Index', 'Admin', '2021-09-15 21:30:35', '2021-09-15 21:30:35'),
(31, 'User Index', 'Visited User Index Page', 'Super', '2021-09-15 21:38:39', '2021-09-15 21:38:39'),
(32, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 21:39:08', '2021-09-15 21:39:08'),
(33, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 21:40:49', '2021-09-15 21:40:49'),
(34, 'User Index', 'Visited User Index Page', 'Super', '2021-09-15 21:40:52', '2021-09-15 21:40:52'),
(35, 'User Edit', 'Visited User Edit Page', 'Super', '2021-09-15 21:41:11', '2021-09-15 21:41:11'),
(36, 'User Index', 'Visited User Index Page', 'Super', '2021-09-15 21:41:24', '2021-09-15 21:41:24'),
(37, 'User Create', 'Visited User Create Page', 'Super', '2021-09-15 21:41:26', '2021-09-15 21:41:26'),
(38, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 21:42:08', '2021-09-15 21:42:08'),
(39, 'Role Show', 'Viewed  a Role Record', 'Super', '2021-09-15 21:42:26', '2021-09-15 21:42:26'),
(40, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 21:42:30', '2021-09-15 21:42:30'),
(41, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 21:42:35', '2021-09-15 21:42:35'),
(42, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 21:47:15', '2021-09-15 21:47:15'),
(43, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 21:47:22', '2021-09-15 21:47:22'),
(44, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 21:48:09', '2021-09-15 21:48:09'),
(45, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 21:48:14', '2021-09-15 21:48:14'),
(46, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 21:48:43', '2021-09-15 21:48:43'),
(47, 'Department index', 'Visited Department Index', 'Super', '2021-09-15 21:51:24', '2021-09-15 21:51:24'),
(48, 'Building index', 'Visited Building Index', 'Super', '2021-09-15 21:51:29', '2021-09-15 21:51:29'),
(49, 'Office index', 'Visited Office Index', 'Super', '2021-09-15 21:51:31', '2021-09-15 21:51:31'),
(50, 'Office index', 'Visited Office Index', 'Super', '2021-09-15 21:55:37', '2021-09-15 21:55:37'),
(51, 'Category index', 'Visited Category Index', 'Super', '2021-09-15 21:57:16', '2021-09-15 21:57:16'),
(52, 'Category index', 'Visited Category Index', 'Super', '2021-09-15 21:59:22', '2021-09-15 21:59:22'),
(53, 'File Create', 'Visited Create File Page', 'Super', '2021-09-15 21:59:26', '2021-09-15 21:59:26'),
(54, 'File Create', 'Visited Create File Page', 'Super', '2021-09-15 22:02:22', '2021-09-15 22:02:22'),
(55, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:03:30', '2021-09-15 22:03:30'),
(56, 'Permission index', 'Visited Permission Index', 'Super', '2021-09-15 22:03:39', '2021-09-15 22:03:39'),
(57, 'Permission Create', 'Visited Create Permission Page', 'Super', '2021-09-15 22:03:44', '2021-09-15 22:03:44'),
(58, 'Permission Created', 'Created new Permission', 'Super', '2021-09-15 22:04:16', '2021-09-15 22:04:16'),
(59, 'Permission index', 'Visited Permission Index', 'Super', '2021-09-15 22:04:17', '2021-09-15 22:04:17'),
(60, 'Permission Create', 'Visited Create Permission Page', 'Super', '2021-09-15 22:04:20', '2021-09-15 22:04:20'),
(61, 'Permission Created', 'Created new Permission', 'Super', '2021-09-15 22:04:29', '2021-09-15 22:04:29'),
(62, 'Permission index', 'Visited Permission Index', 'Super', '2021-09-15 22:04:29', '2021-09-15 22:04:29'),
(63, 'Permission Create', 'Visited Create Permission Page', 'Super', '2021-09-15 22:04:32', '2021-09-15 22:04:32'),
(64, 'Permission Created', 'Created new Permission', 'Super', '2021-09-15 22:04:39', '2021-09-15 22:04:39'),
(65, 'Permission index', 'Visited Permission Index', 'Super', '2021-09-15 22:04:39', '2021-09-15 22:04:39'),
(66, 'Permission Create', 'Visited Create Permission Page', 'Super', '2021-09-15 22:04:42', '2021-09-15 22:04:42'),
(67, 'Permission Created', 'Created new Permission', 'Super', '2021-09-15 22:04:52', '2021-09-15 22:04:52'),
(68, 'Permission index', 'Visited Permission Index', 'Super', '2021-09-15 22:04:52', '2021-09-15 22:04:52'),
(69, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:04:59', '2021-09-15 22:04:59'),
(70, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 22:05:05', '2021-09-15 22:05:05'),
(71, 'Role updated', 'Edited a Role Name', 'Super', '2021-09-15 22:05:17', '2021-09-15 22:05:17'),
(72, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:05:17', '2021-09-15 22:05:17'),
(73, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 22:05:22', '2021-09-15 22:05:22'),
(74, 'Role updated', 'Edited a Role Name', 'Super', '2021-09-15 22:05:30', '2021-09-15 22:05:30'),
(75, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:05:30', '2021-09-15 22:05:30'),
(76, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 22:05:35', '2021-09-15 22:05:35'),
(77, 'Role updated', 'Edited a Role Name', 'Super', '2021-09-15 22:05:50', '2021-09-15 22:05:50'),
(78, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:05:52', '2021-09-15 22:05:52'),
(79, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 22:06:24', '2021-09-15 22:06:24'),
(80, 'Role updated', 'Edited a Role Name', 'Super', '2021-09-15 22:06:31', '2021-09-15 22:06:31'),
(81, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:06:32', '2021-09-15 22:06:32'),
(82, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:09:52', '2021-09-15 22:09:52'),
(83, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:11:20', '2021-09-15 22:11:20'),
(84, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:13:01', '2021-09-15 22:13:01'),
(85, 'Permission index', 'Visited Permission Index', 'Super', '2021-09-15 22:13:09', '2021-09-15 22:13:09'),
(86, 'Permission', 'Trashed Multiple permissions', 'Super', '2021-09-15 22:13:31', '2021-09-15 22:13:31'),
(87, 'Permission index', 'Visited Permission Index', 'Super', '2021-09-15 22:13:32', '2021-09-15 22:13:32'),
(88, 'User Index', 'Visited User Index Page', 'Super', '2021-09-15 22:13:36', '2021-09-15 22:13:36'),
(89, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:13:39', '2021-09-15 22:13:39'),
(90, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 22:13:45', '2021-09-15 22:13:45'),
(91, 'Permission index', 'Visited Permission Index', 'Super', '2021-09-15 22:14:07', '2021-09-15 22:14:07'),
(92, 'Permission Deleted', 'Checked Permission Trash', 'Super', '2021-09-15 22:14:11', '2021-09-15 22:14:11'),
(93, 'Permission Perm. Bulk Delete', 'Permanently Deleted Multiple permissions', 'Super', '2021-09-15 22:14:19', '2021-09-15 22:14:19'),
(94, 'Permission index', 'Visited Permission Index', 'Super', '2021-09-15 22:14:20', '2021-09-15 22:14:20'),
(95, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:14:25', '2021-09-15 22:14:25'),
(96, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 22:14:30', '2021-09-15 22:14:30'),
(97, 'File index', 'Visited File Index', 'Super', '2021-09-15 22:16:49', '2021-09-15 22:16:49'),
(98, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-15 22:17:14', '2021-09-15 22:17:14'),
(99, 'File index', 'Visited File Index', 'Super', '2021-09-15 22:17:17', '2021-09-15 22:17:17'),
(100, 'File index', 'Visited File Index', 'RMU', '2021-09-15 22:17:40', '2021-09-15 22:17:40'),
(101, 'File index', 'Visited File Index', 'RMU', '2021-09-15 22:18:00', '2021-09-15 22:18:00'),
(102, 'File index', 'Visited File Index', 'RMU', '2021-09-15 22:20:47', '2021-09-15 22:20:47'),
(103, 'File index', 'Visited File Index', 'RMU', '2021-09-15 22:21:39', '2021-09-15 22:21:39'),
(104, 'File index', 'Visited File Index', 'RMU', '2021-09-15 22:22:46', '2021-09-15 22:22:46'),
(105, 'File index', 'Visited File Index', 'RMU', '2021-09-15 22:24:00', '2021-09-15 22:24:00'),
(106, 'File index', 'Visited File Index', 'Super', '2021-09-15 22:24:32', '2021-09-15 22:24:32'),
(107, 'File index', 'Visited File Index', 'Super', '2021-09-15 22:25:47', '2021-09-15 22:25:47'),
(108, 'File Create', 'Visited Create File Page', 'Super', '2021-09-15 22:25:56', '2021-09-15 22:25:56'),
(109, 'File index', 'Visited File Index', 'RMU', '2021-09-15 22:26:32', '2021-09-15 22:26:32'),
(110, 'File index', 'Visited File Index', 'RMU', '2021-09-15 22:26:34', '2021-09-15 22:26:34'),
(111, 'File index', 'Visited File Index', 'RMU', '2021-09-15 22:27:57', '2021-09-15 22:27:57'),
(112, 'File index', 'Visited File Index', 'RMU', '2021-09-15 22:36:23', '2021-09-15 22:36:23'),
(113, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:37:37', '2021-09-15 22:37:37'),
(114, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 22:37:43', '2021-09-15 22:37:43'),
(115, 'Role updated', 'Edited a Role Name', 'Super', '2021-09-15 22:38:24', '2021-09-15 22:38:24'),
(116, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:38:25', '2021-09-15 22:38:25'),
(117, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:39:48', '2021-09-15 22:39:48'),
(118, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 22:39:53', '2021-09-15 22:39:53'),
(119, 'Role updated', 'Edited a Role Name', 'Super', '2021-09-15 22:40:23', '2021-09-15 22:40:23'),
(120, 'Role index', 'Visited Role index Page', 'Super', '2021-09-15 22:40:23', '2021-09-15 22:40:23'),
(121, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-15 22:40:29', '2021-09-15 22:40:29'),
(122, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-16 09:13:20', '2021-09-16 09:13:20'),
(123, 'File index', 'Visited File Index', 'RMU', '2021-09-16 09:13:43', '2021-09-16 09:13:43'),
(124, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-16 13:46:27', '2021-09-16 13:46:27'),
(125, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-16 14:18:44', '2021-09-16 14:18:44'),
(126, 'Department index', 'Visited Department Index', 'Super', '2021-09-16 14:26:24', '2021-09-16 14:26:24'),
(127, 'Department Create', 'Visited Create Department Page', 'Super', '2021-09-16 14:26:27', '2021-09-16 14:26:27'),
(128, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-17 12:19:54', '2021-09-17 12:19:54'),
(129, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-17 20:12:18', '2021-09-17 20:12:18'),
(130, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-17 20:35:20', '2021-09-17 20:35:20'),
(131, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-17 20:37:26', '2021-09-17 20:37:26'),
(132, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 09:04:04', '2021-09-18 09:04:04'),
(133, 'File Create', 'Visited Create File Page', 'Super', '2021-09-18 09:14:09', '2021-09-18 09:14:09'),
(134, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 09:15:13', '2021-09-18 09:15:13'),
(135, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 09:22:04', '2021-09-18 09:22:04'),
(136, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 09:23:54', '2021-09-18 09:23:54'),
(137, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 09:25:06', '2021-09-18 09:25:06'),
(138, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 09:29:35', '2021-09-18 09:29:35'),
(139, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 09:49:02', '2021-09-18 09:49:02'),
(140, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 09:52:30', '2021-09-18 09:52:30'),
(141, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 09:53:20', '2021-09-18 09:53:20'),
(142, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 09:56:32', '2021-09-18 09:56:32'),
(143, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 10:00:18', '2021-09-18 10:00:18'),
(144, 'File index', 'Visited File Index', 'RMU', '2021-09-18 11:35:00', '2021-09-18 11:35:00'),
(145, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 11:37:49', '2021-09-18 11:37:49'),
(146, 'File index', 'Visited File Index', 'RMU', '2021-09-18 11:41:45', '2021-09-18 11:41:45'),
(147, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 11:44:35', '2021-09-18 11:44:35'),
(148, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 11:46:14', '2021-09-18 11:46:14'),
(149, 'File index', 'Visited File Index', 'RMU', '2021-09-18 11:46:26', '2021-09-18 11:46:26'),
(150, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 12:20:22', '2021-09-18 12:20:22'),
(151, 'File index', 'Visited File Index', 'RMU', '2021-09-18 12:20:33', '2021-09-18 12:20:33'),
(152, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 12:22:45', '2021-09-18 12:22:45'),
(153, 'File index', 'Visited File Index', 'RMU', '2021-09-18 12:33:41', '2021-09-18 12:33:41'),
(154, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 12:41:18', '2021-09-18 12:41:18'),
(155, 'File index', 'Visited File Index', 'RMU', '2021-09-18 12:41:24', '2021-09-18 12:41:24'),
(156, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 12:46:17', '2021-09-18 12:46:17'),
(157, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 12:54:17', '2021-09-18 12:54:17'),
(158, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 13:03:52', '2021-09-18 13:03:52'),
(159, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 13:09:37', '2021-09-18 13:09:37'),
(160, 'Category index', 'Visited Category Index', 'Super', '2021-09-18 13:13:19', '2021-09-18 13:13:19'),
(161, 'Category Show', 'Checked Category Record', 'Super', '2021-09-18 13:13:25', '2021-09-18 13:13:25'),
(162, 'Category index', 'Visited Category Index', 'Super', '2021-09-18 13:13:56', '2021-09-18 13:13:56'),
(163, 'Category Edit', 'Visited Category Edit Page', 'Super', '2021-09-18 13:14:02', '2021-09-18 13:14:02'),
(164, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 14:40:10', '2021-09-18 14:40:10'),
(165, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 14:40:43', '2021-09-18 14:40:43'),
(166, 'File index', 'Visited File Index', 'RMU', '2021-09-18 14:41:08', '2021-09-18 14:41:08'),
(167, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 17:57:56', '2021-09-18 17:57:56'),
(168, 'File Show', 'Checked File Record', 'RMU', '2021-09-18 17:58:29', '2021-09-18 17:58:29'),
(169, 'File index', 'Visited File Index', 'Super', '2021-09-18 18:00:47', '2021-09-18 18:00:47'),
(170, 'Department index', 'Visited Department Index', 'Super', '2021-09-18 18:04:25', '2021-09-18 18:04:25'),
(171, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-18 18:06:56', '2021-09-18 18:06:56'),
(172, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:10:58', '2021-09-19 11:10:58'),
(173, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:11:48', '2021-09-19 11:11:48'),
(174, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:12:42', '2021-09-19 11:12:42'),
(175, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:14:19', '2021-09-19 11:14:19'),
(176, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:16:16', '2021-09-19 11:16:16'),
(177, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:17:26', '2021-09-19 11:17:26'),
(178, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:18:07', '2021-09-19 11:18:07'),
(179, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:18:42', '2021-09-19 11:18:42'),
(180, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:19:03', '2021-09-19 11:19:03'),
(181, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:20:20', '2021-09-19 11:20:20'),
(182, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:21:15', '2021-09-19 11:21:15'),
(183, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:24:31', '2021-09-19 11:24:31'),
(184, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:24:55', '2021-09-19 11:24:55'),
(185, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:25:26', '2021-09-19 11:25:26'),
(186, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:26:45', '2021-09-19 11:26:45'),
(187, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:28:01', '2021-09-19 11:28:01'),
(188, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 11:28:13', '2021-09-19 11:28:13'),
(189, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 12:57:01', '2021-09-19 12:57:01'),
(190, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 12:59:25', '2021-09-19 12:59:25'),
(191, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:00:36', '2021-09-19 13:00:36'),
(192, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:00:41', '2021-09-19 13:00:41'),
(193, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:01:03', '2021-09-19 13:01:03'),
(194, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:01:17', '2021-09-19 13:01:17'),
(195, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:01:46', '2021-09-19 13:01:46'),
(196, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:02:07', '2021-09-19 13:02:07'),
(197, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:02:41', '2021-09-19 13:02:41'),
(198, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:03:13', '2021-09-19 13:03:13'),
(199, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:03:56', '2021-09-19 13:03:56'),
(200, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:04:17', '2021-09-19 13:04:17'),
(201, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:08:28', '2021-09-19 13:08:28'),
(202, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:09:12', '2021-09-19 13:09:12'),
(203, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:11:01', '2021-09-19 13:11:01'),
(204, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:11:46', '2021-09-19 13:11:46'),
(205, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:15:00', '2021-09-19 13:15:00'),
(206, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:15:09', '2021-09-19 13:15:09'),
(207, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:15:21', '2021-09-19 13:15:21'),
(208, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:15:42', '2021-09-19 13:15:42'),
(209, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:25:55', '2021-09-19 13:25:55'),
(210, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:27:36', '2021-09-19 13:27:36'),
(211, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:27:43', '2021-09-19 13:27:43'),
(212, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:28:35', '2021-09-19 13:28:35'),
(213, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:28:44', '2021-09-19 13:28:44'),
(214, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:38:36', '2021-09-19 13:38:36'),
(215, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:39:45', '2021-09-19 13:39:45'),
(216, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:52:46', '2021-09-19 13:52:46'),
(217, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 13:54:21', '2021-09-19 13:54:21'),
(218, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 14:24:08', '2021-09-19 14:24:08'),
(219, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 14:24:58', '2021-09-19 14:24:58'),
(220, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 14:40:39', '2021-09-19 14:40:39'),
(221, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 14:51:36', '2021-09-19 14:51:36'),
(222, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 14:52:58', '2021-09-19 14:52:58'),
(223, 'File index', 'Visited File Index', 'RMU', '2021-09-19 14:53:32', '2021-09-19 14:53:32'),
(224, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 14:57:32', '2021-09-19 14:57:32'),
(225, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 15:01:01', '2021-09-19 15:01:01'),
(226, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 15:06:13', '2021-09-19 15:06:13'),
(227, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 15:06:29', '2021-09-19 15:06:29'),
(228, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 15:20:31', '2021-09-19 15:20:31'),
(229, 'File index', 'Visited File Index', 'RMU', '2021-09-19 15:22:00', '2021-09-19 15:22:00'),
(230, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 15:22:09', '2021-09-19 15:22:09'),
(231, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 15:22:53', '2021-09-19 15:22:53'),
(232, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 15:23:01', '2021-09-19 15:23:01'),
(233, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 15:23:08', '2021-09-19 15:23:08'),
(234, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 15:23:56', '2021-09-19 15:23:56'),
(235, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 15:26:10', '2021-09-19 15:26:10'),
(236, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 16:28:53', '2021-09-19 16:28:53'),
(237, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 16:33:19', '2021-09-19 16:33:19'),
(238, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 16:44:26', '2021-09-19 16:44:26'),
(239, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 16:47:10', '2021-09-19 16:47:10'),
(240, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 16:52:16', '2021-09-19 16:52:16'),
(241, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 16:53:16', '2021-09-19 16:53:16'),
(242, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 17:25:56', '2021-09-19 17:25:56'),
(243, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-19 17:28:48', '2021-09-19 17:28:48'),
(244, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 14:30:10', '2021-09-20 14:30:10'),
(245, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 14:30:28', '2021-09-20 14:30:28'),
(246, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 14:30:37', '2021-09-20 14:30:37'),
(247, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 14:31:16', '2021-09-20 14:31:16'),
(248, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 14:31:23', '2021-09-20 14:31:23'),
(249, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 14:31:30', '2021-09-20 14:31:30'),
(250, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 14:31:39', '2021-09-20 14:31:39'),
(251, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 14:38:06', '2021-09-20 14:38:06'),
(252, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 15:17:04', '2021-09-20 15:17:04'),
(253, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 15:41:47', '2021-09-20 15:41:47'),
(254, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 15:41:47', '2021-09-20 15:41:47'),
(255, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 16:43:27', '2021-09-20 16:43:27'),
(256, 'File Edit', 'Visited File Edit Page', 'RMU', '2021-09-20 17:33:26', '2021-09-20 17:33:26'),
(257, 'File index', 'Visited File Index', 'Action', '2021-09-20 08:17:20', '2021-09-20 08:17:20'),
(258, 'File index', 'Visited File Index', 'Action', '2021-09-20 08:27:39', '2021-09-20 08:27:39'),
(259, 'File index', 'Visited File Index', 'Action', '2021-09-20 08:27:56', '2021-09-20 08:27:56'),
(260, 'File index', 'Visited File Index', 'Action', '2021-09-20 08:28:24', '2021-09-20 08:28:24'),
(261, 'File index', 'Visited File Index', 'Action', '2021-09-20 08:28:38', '2021-09-20 08:28:38'),
(262, 'File index', 'Visited File Index', 'Action', '2021-09-20 08:29:05', '2021-09-20 08:29:05'),
(263, 'File index', 'Visited File Index', 'Action', '2021-09-20 08:29:34', '2021-09-20 08:29:34'),
(264, 'File index', 'Visited File Index', 'Action', '2021-09-20 08:29:43', '2021-09-20 08:29:43'),
(265, 'File index', 'Visited File Index', 'Action', '2021-09-20 08:29:46', '2021-09-20 08:29:46'),
(266, 'File index', 'Visited File Index', 'Action', '2021-09-20 08:29:49', '2021-09-20 08:29:49'),
(267, 'File index', 'Visited File Index', 'Action', '2021-09-21 00:52:37', '2021-09-21 00:52:37'),
(268, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:01:10', '2021-09-21 01:01:10'),
(269, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:01:29', '2021-09-21 01:01:29'),
(270, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:01:47', '2021-09-21 01:01:47'),
(271, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:01:56', '2021-09-21 01:01:56'),
(272, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:05:02', '2021-09-21 01:05:02'),
(273, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:06:52', '2021-09-21 01:06:52'),
(274, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:07:13', '2021-09-21 01:07:13'),
(275, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:07:16', '2021-09-21 01:07:16'),
(276, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:07:20', '2021-09-21 01:07:20'),
(277, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:07:22', '2021-09-21 01:07:22'),
(278, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:09:46', '2021-09-21 01:09:46'),
(279, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:09:49', '2021-09-21 01:09:49'),
(280, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:09:59', '2021-09-21 01:09:59'),
(281, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:10:08', '2021-09-21 01:10:08'),
(282, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:10:16', '2021-09-21 01:10:16'),
(283, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:10:33', '2021-09-21 01:10:33'),
(284, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:15:15', '2021-09-21 01:15:15'),
(285, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:20:22', '2021-09-21 01:20:22'),
(286, 'User Index', 'Visited User Index Page', 'Super', '2021-09-21 01:23:06', '2021-09-21 01:23:06'),
(287, 'Role index', 'Visited Role index Page', 'Super', '2021-09-21 01:23:09', '2021-09-21 01:23:09'),
(288, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-21 01:23:14', '2021-09-21 01:23:14'),
(289, 'Role index', 'Visited Role index Page', 'Super', '2021-09-21 01:24:23', '2021-09-21 01:24:23'),
(290, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-21 01:24:30', '2021-09-21 01:24:30'),
(291, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:25:45', '2021-09-21 01:25:45'),
(292, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:25:53', '2021-09-21 01:25:53'),
(293, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:29:19', '2021-09-21 01:29:19'),
(294, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:29:59', '2021-09-21 01:29:59'),
(295, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-21 01:31:21', '2021-09-21 01:31:21'),
(296, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:31:23', '2021-09-21 01:31:23'),
(297, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:34:08', '2021-09-21 01:34:08'),
(298, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:35:59', '2021-09-21 01:35:59'),
(299, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:36:05', '2021-09-21 01:36:05'),
(300, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:36:27', '2021-09-21 01:36:27'),
(301, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:36:43', '2021-09-21 01:36:43'),
(302, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:36:50', '2021-09-21 01:36:50'),
(303, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:38:33', '2021-09-21 01:38:33'),
(304, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:38:38', '2021-09-21 01:38:38'),
(305, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:39:44', '2021-09-21 01:39:44'),
(306, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:42:32', '2021-09-21 01:42:32'),
(307, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:42:48', '2021-09-21 01:42:48'),
(308, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:42:53', '2021-09-21 01:42:53'),
(309, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:43:40', '2021-09-21 01:43:40'),
(310, 'File index', 'Visited File Index', 'Action', '2021-09-21 01:43:45', '2021-09-21 01:43:45'),
(311, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:02:19', '2021-09-21 02:02:19'),
(312, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:07:24', '2021-09-21 02:07:24'),
(313, 'File index', 'Visited File Index', 'Super', '2021-09-21 02:07:34', '2021-09-21 02:07:34'),
(314, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:10:50', '2021-09-21 02:10:50'),
(315, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:19:38', '2021-09-21 02:19:38'),
(316, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:20:11', '2021-09-21 02:20:11'),
(317, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:20:25', '2021-09-21 02:20:25'),
(318, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:21:00', '2021-09-21 02:21:00'),
(319, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:28:53', '2021-09-21 02:28:53'),
(320, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:45:26', '2021-09-21 02:45:26'),
(321, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:45:49', '2021-09-21 02:45:49'),
(322, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:46:12', '2021-09-21 02:46:12'),
(323, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:46:54', '2021-09-21 02:46:54'),
(324, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:47:36', '2021-09-21 02:47:36'),
(325, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:53:44', '2021-09-21 02:53:44'),
(326, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:54:57', '2021-09-21 02:54:57'),
(327, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:56:06', '2021-09-21 02:56:06'),
(328, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:57:12', '2021-09-21 02:57:12'),
(329, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:58:45', '2021-09-21 02:58:45'),
(330, 'File index', 'Visited File Index', 'Action', '2021-09-21 02:59:52', '2021-09-21 02:59:52'),
(331, 'File index', 'Visited File Index', 'Action', '2021-09-21 03:00:30', '2021-09-21 03:00:30'),
(332, 'File index', 'Visited File Index', 'Action', '2021-09-21 03:01:22', '2021-09-21 03:01:22'),
(333, 'File Show', 'Checked File Record', 'Action', '2021-09-21 03:01:53', '2021-09-21 03:01:53'),
(334, 'File index', 'Visited File Index', 'Action', '2021-09-21 03:04:38', '2021-09-21 03:04:38'),
(335, 'File index', 'Visited File Index', 'Action', '2021-09-21 03:05:05', '2021-09-21 03:05:05'),
(336, 'File index', 'Visited File Index', 'Action', '2021-09-21 03:06:24', '2021-09-21 03:06:24'),
(337, 'File index', 'Visited File Index', 'Action', '2021-09-21 04:39:17', '2021-09-21 04:39:17'),
(338, 'File index', 'Visited File Index', 'Action', '2021-09-21 04:39:55', '2021-09-21 04:39:55'),
(339, 'File index', 'Visited File Index', 'Action', '2021-09-21 04:40:28', '2021-09-21 04:40:28'),
(340, 'File index', 'Visited File Index', 'Action', '2021-09-21 04:42:18', '2021-09-21 04:42:18'),
(341, 'File index', 'Visited File Index', 'Action', '2021-09-21 04:42:52', '2021-09-21 04:42:52'),
(342, 'File index', 'Visited File Index', 'Action', '2021-09-21 04:49:33', '2021-09-21 04:49:33'),
(343, 'File index', 'Visited File Index', 'Action', '2021-09-21 04:53:29', '2021-09-21 04:53:29'),
(344, 'File index', 'Visited File Index', 'Action', '2021-09-21 04:54:12', '2021-09-21 04:54:12'),
(345, 'File index', 'Visited File Index', 'Action', '2021-09-21 04:54:52', '2021-09-21 04:54:52'),
(346, 'File index', 'Visited File Index', 'Action', '2021-09-21 04:56:23', '2021-09-21 04:56:23'),
(347, 'File index', 'Visited File Index', 'Action', '2021-09-21 05:30:15', '2021-09-21 05:30:15'),
(348, 'File index', 'Visited File Index', 'Action', '2021-09-21 05:31:04', '2021-09-21 05:31:04'),
(349, 'File index', 'Visited File Index', 'Action', '2021-09-21 05:33:39', '2021-09-21 05:33:39'),
(350, 'File index', 'Visited File Index', 'Action', '2021-09-21 05:41:12', '2021-09-21 05:41:12'),
(351, 'File index', 'Visited File Index', 'Action', '2021-09-21 05:42:43', '2021-09-21 05:42:43'),
(352, 'File index', 'Visited File Index', 'Action', '2021-09-21 05:44:36', '2021-09-21 05:44:36'),
(353, 'File index', 'Visited File Index', 'Action', '2021-09-21 05:45:42', '2021-09-21 05:45:42'),
(354, 'File index', 'Visited File Index', 'Action', '2021-09-21 05:45:54', '2021-09-21 05:45:54'),
(355, 'File index', 'Visited File Index', 'Action', '2021-09-21 05:46:03', '2021-09-21 05:46:03'),
(356, 'File index', 'Visited File Index', 'Action', '2021-09-21 05:46:51', '2021-09-21 05:46:51'),
(357, 'File index', 'Visited File Index', 'Action', '2021-09-21 05:56:25', '2021-09-21 05:56:25'),
(358, 'File index', 'Visited File Index', 'Action', '2021-09-21 06:33:40', '2021-09-21 06:33:40'),
(359, 'File Request', 'Visited File Requests', 'Super', '2021-09-21 06:41:54', '2021-09-21 06:41:54'),
(360, 'File index', 'Visited File Index', 'Action', '2021-09-21 06:42:06', '2021-09-21 06:42:06'),
(361, 'File Request', 'Visited File Requests', 'Super', '2021-09-21 06:42:43', '2021-09-21 06:42:43'),
(362, 'File Request', 'Visited File Requests', 'Super', '2021-09-21 06:51:41', '2021-09-21 06:51:41'),
(363, 'File Request', 'Visited File Requests', 'Super', '2021-09-21 06:52:01', '2021-09-21 06:52:01'),
(364, 'File index', 'Visited File Index', 'Action', '2021-09-21 06:52:10', '2021-09-21 06:52:10'),
(365, 'Role index', 'Visited Role index Page', 'Super', '2021-09-23 04:46:37', '2021-09-23 04:46:37'),
(366, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-23 04:46:46', '2021-09-23 04:46:46'),
(367, 'Role updated', 'Edited a Role Name', 'Super', '2021-09-23 04:47:03', '2021-09-23 04:47:03'),
(368, 'Role index', 'Visited Role index Page', 'Super', '2021-09-23 04:47:03', '2021-09-23 04:47:03'),
(369, 'File index', 'Visited File Index', 'Super', '2021-09-23 04:47:24', '2021-09-23 04:47:24'),
(370, 'File Create', 'Visited Create File Page', 'Super', '2021-09-23 04:47:35', '2021-09-23 04:47:35'),
(371, 'Role index', 'Visited Role index Page', 'Super', '2021-09-23 05:28:37', '2021-09-23 05:28:37'),
(372, 'Role Edited', 'Visited Role Edit Page', 'Super', '2021-09-23 05:28:46', '2021-09-23 05:28:46'),
(373, 'Role updated', 'Edited a Role Name', 'Super', '2021-09-23 05:28:59', '2021-09-23 05:28:59'),
(374, 'Role index', 'Visited Role index Page', 'Super', '2021-09-23 05:29:00', '2021-09-23 05:29:00'),
(375, 'Role index', 'Visited Role index Page', 'Super', '2021-09-23 05:37:35', '2021-09-23 05:37:35'),
(376, 'Role index', 'Visited Role index Page', 'Super', '2021-09-23 06:40:46', '2021-09-23 06:40:46'),
(377, 'Master index', 'Visited Master Index', 'Super', '2021-09-24 02:18:20', '2021-09-24 02:18:20'),
(378, 'Master Create', 'Visited Create Master Page', 'Super', '2021-09-24 02:18:32', '2021-09-24 02:18:32'),
(379, 'Master Create', 'Visited Create Master Page', 'Super', '2021-09-24 02:21:45', '2021-09-24 02:21:45'),
(380, 'Master Created', 'Created new Master', 'Super', '2021-09-24 02:22:02', '2021-09-24 02:22:02'),
(381, 'Master index', 'Visited Master Index', 'Super', '2021-09-24 02:22:04', '2021-09-24 02:22:04'),
(382, 'Master Create', 'Visited Create Master Page', 'Super', '2021-09-24 02:22:25', '2021-09-24 02:22:25'),
(383, 'Master Created', 'Created new Master', 'Super', '2021-09-24 02:22:45', '2021-09-24 02:22:45'),
(384, 'Master index', 'Visited Master Index', 'Super', '2021-09-24 02:22:46', '2021-09-24 02:22:46'),
(385, 'Master index', 'Visited Master Index', 'Super', '2021-09-24 02:32:39', '2021-09-24 02:32:39'),
(386, 'Classification index', 'Visited Classification Index', 'Super', '2021-09-24 02:32:48', '2021-09-24 02:32:48'),
(387, 'Classification Create', 'Visited Create Classification Page', 'Super', '2021-09-24 02:32:54', '2021-09-24 02:32:54'),
(388, 'Classification Create', 'Visited Create Classification Page', 'Super', '2021-09-24 02:34:52', '2021-09-24 02:34:52'),
(389, 'Classification Create', 'Visited Create Classification Page', 'Super', '2021-09-24 02:35:28', '2021-09-24 02:35:28'),
(390, 'Classification Created', 'Created new Classification', 'Super', '2021-09-24 02:35:46', '2021-09-24 02:35:46'),
(391, 'Classification index', 'Visited Classification Index', 'Super', '2021-09-24 02:35:47', '2021-09-24 02:35:47'),
(392, 'Classification Create', 'Visited Create Classification Page', 'Super', '2021-09-24 02:35:51', '2021-09-24 02:35:51'),
(393, 'Classification Created', 'Created new Classification', 'Super', '2021-09-24 02:36:04', '2021-09-24 02:36:04'),
(394, 'Classification index', 'Visited Classification Index', 'Super', '2021-09-24 02:36:04', '2021-09-24 02:36:04'),
(395, 'Classification Create', 'Visited Create Classification Page', 'Super', '2021-09-24 02:36:07', '2021-09-24 02:36:07'),
(396, 'Classification Created', 'Created new Classification', 'Super', '2021-09-24 02:36:24', '2021-09-24 02:36:24'),
(397, 'Classification index', 'Visited Classification Index', 'Super', '2021-09-24 02:36:24', '2021-09-24 02:36:24'),
(398, 'File Create', 'Visited Create File Page', 'Super', '2021-09-24 02:36:49', '2021-09-24 02:36:49'),
(399, 'File Create', 'Visited Create File Page', 'Super', '2021-09-24 02:38:05', '2021-09-24 02:38:05'),
(400, 'File Create', 'Visited Create File Page', 'Super', '2021-09-24 02:42:25', '2021-09-24 02:42:25'),
(401, 'File Create', 'Visited Create File Page', 'Super', '2021-09-24 02:42:53', '2021-09-24 02:42:53'),
(402, 'File Create', 'Visited Create File Page', 'Super', '2021-09-24 02:54:40', '2021-09-24 02:54:40'),
(403, 'File Created', 'Created new File', 'Super', '2021-09-24 02:55:20', '2021-09-24 02:55:20'),
(404, 'File index', 'Visited File Index', 'Super', '2021-09-24 02:55:21', '2021-09-24 02:55:21'),
(405, 'File index', 'Visited File Index', 'Super', '2021-09-24 02:57:21', '2021-09-24 02:57:21'),
(406, 'File index', 'Visited File Index', 'Super', '2021-09-24 23:20:46', '2021-09-24 23:20:46'),
(407, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:21:13', '2021-09-24 23:21:13'),
(408, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:22:40', '2021-09-24 23:22:40'),
(409, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:25:16', '2021-09-24 23:25:16'),
(410, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:29:37', '2021-09-24 23:29:37'),
(411, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:31:16', '2021-09-24 23:31:16'),
(412, 'File Updated', 'Edited a File', 'Super', '2021-09-24 23:32:09', '2021-09-24 23:32:09'),
(413, 'File index', 'Visited File Index', 'Super', '2021-09-24 23:32:10', '2021-09-24 23:32:10'),
(414, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:34:38', '2021-09-24 23:34:38'),
(415, 'File Updated', 'Edited a File', 'Super', '2021-09-24 23:34:54', '2021-09-24 23:34:54'),
(416, 'File index', 'Visited File Index', 'Super', '2021-09-24 23:34:56', '2021-09-24 23:34:56'),
(417, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:35:12', '2021-09-24 23:35:12'),
(418, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:35:12', '2021-09-24 23:35:12'),
(419, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:37:30', '2021-09-24 23:37:30'),
(420, 'File Updated', 'Edited a File', 'Super', '2021-09-24 23:37:42', '2021-09-24 23:37:42'),
(421, 'File index', 'Visited File Index', 'Super', '2021-09-24 23:37:43', '2021-09-24 23:37:43'),
(422, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:37:51', '2021-09-24 23:37:51'),
(423, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:39:11', '2021-09-24 23:39:11'),
(424, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:40:05', '2021-09-24 23:40:05'),
(425, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:40:11', '2021-09-24 23:40:11'),
(426, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:41:07', '2021-09-24 23:41:07'),
(427, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:41:11', '2021-09-24 23:41:11'),
(428, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:50:27', '2021-09-24 23:50:27'),
(429, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-24 23:50:31', '2021-09-24 23:50:31'),
(430, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-25 00:02:36', '2021-09-25 00:02:36'),
(431, 'File Updated', 'Edited a File', 'Super', '2021-09-25 00:10:33', '2021-09-25 00:10:33'),
(432, 'File index', 'Visited File Index', 'Super', '2021-09-25 00:10:34', '2021-09-25 00:10:34'),
(433, 'File Edit', 'Visited File Edit Page', 'Super', '2021-09-25 00:10:50', '2021-09-25 00:10:50'),
(434, 'File index', 'Visited File Index', 'Super', '2021-09-25 01:39:47', '2021-09-25 01:39:47'),
(435, 'File index', 'Visited File Index', 'Super', '2021-09-25 01:39:52', '2021-09-25 01:39:52'),
(436, 'Department index', 'Visited Department Index', 'Super', '2021-10-07 05:51:42', '2021-10-07 05:51:42'),
(437, 'Department Create', 'Visited Create Department Page', 'Super', '2021-10-07 05:51:47', '2021-10-07 05:51:47'),
(438, 'Office index', 'Visited Office Index', 'Super', '2021-10-07 05:52:58', '2021-10-07 05:52:58'),
(439, 'Office Create', 'Visited Create Office Page', 'Super', '2021-10-07 05:53:01', '2021-10-07 05:53:01'),
(440, 'Building index', 'Visited Building Index', 'Super', '2021-10-07 06:29:13', '2021-10-07 06:29:13'),
(441, 'Department index', 'Visited Department Index', 'Super', '2021-10-07 06:30:05', '2021-10-07 06:30:05'),
(442, 'Department Create', 'Visited Create Department Page', 'Super', '2021-10-07 06:30:08', '2021-10-07 06:30:08'),
(443, 'Office index', 'Visited Office Index', 'Super', '2021-10-07 06:44:40', '2021-10-07 06:44:40'),
(444, 'Office Create', 'Visited Create Office Page', 'Super', '2021-10-07 06:44:55', '2021-10-07 06:44:55'),
(445, 'Department index', 'Visited Department Index', 'Super', '2021-10-07 06:44:59', '2021-10-07 06:44:59'),
(446, 'Department Create', 'Visited Create Department Page', 'Super', '2021-10-07 06:45:03', '2021-10-07 06:45:03'),
(447, 'Office index', 'Visited Office Index', 'Super', '2021-10-07 06:46:52', '2021-10-07 06:46:52'),
(448, 'Office Create', 'Visited Create Office Page', 'Super', '2021-10-07 06:46:56', '2021-10-07 06:46:56'),
(449, 'Department Create', 'Visited Create Department Page', 'Super', '2021-10-07 07:34:41', '2021-10-07 07:34:41'),
(450, 'Office Create', 'Visited Create Office Page', 'Super', '2021-10-07 07:41:28', '2021-10-07 07:41:28'),
(451, 'Office Create', 'Visited Create Office Page', 'Super', '2021-10-07 07:42:05', '2021-10-07 07:42:05'),
(452, 'Office Create', 'Visited Create Office Page', 'Super', '2021-10-07 07:42:13', '2021-10-07 07:42:13'),
(453, 'Office Created', 'Created new Office', 'Super', '2021-10-07 07:44:54', '2021-10-07 07:44:54'),
(454, 'Office index', 'Visited Office Index', 'Super', '2021-10-07 07:44:55', '2021-10-07 07:44:55'),
(455, 'Office index', 'Visited Office Index', 'Super', '2021-10-07 08:03:32', '2021-10-07 08:03:32'),
(456, 'Office index', 'Visited Office Index', 'Super', '2021-10-07 08:04:15', '2021-10-07 08:04:15'),
(457, 'Office index', 'Visited Office Index', 'Super', '2021-10-07 08:05:07', '2021-10-07 08:05:07'),
(458, 'Office', 'Trashed Multiple offices', 'Super', '2021-10-07 08:05:19', '2021-10-07 08:05:19'),
(459, 'Office index', 'Visited Office Index', 'Super', '2021-10-07 08:05:19', '2021-10-07 08:05:19'),
(460, 'Office Deleted', 'Checked Office Trash', 'Super', '2021-10-07 08:05:22', '2021-10-07 08:05:22'),
(461, 'Office Restore', 'Restored Single Office', 'Super', '2021-10-07 08:05:27', '2021-10-07 08:05:27'),
(462, 'Office index', 'Visited Office Index', 'Super', '2021-10-07 08:05:28', '2021-10-07 08:05:28'),
(463, 'Office index', 'Visited Office Index', 'Super', '2021-10-07 08:06:46', '2021-10-07 08:06:46'),
(464, 'Section index', 'Visited Section Index', 'Super', '2021-10-07 08:07:29', '2021-10-07 08:07:29'),
(465, 'Section Show', 'Checked Section Record', 'Super', '2021-10-07 09:09:48', '2021-10-07 09:09:48'),
(466, 'Section index', 'Visited Section Index', 'Super', '2021-10-07 09:09:58', '2021-10-07 09:09:58'),
(467, 'Section index', 'Visited Section Index', 'Super', '2021-10-07 09:22:44', '2021-10-07 09:22:44'),
(468, 'Section index', 'Visited Section Index', 'Super', '2021-10-07 09:24:18', '2021-10-07 09:24:18'),
(469, 'Section index', 'Visited Section Index', 'Super', '2021-10-07 09:28:51', '2021-10-07 09:28:51'),
(470, 'File index', 'Visited File Index', 'Action', '2021-10-07 09:36:39', '2021-10-07 09:36:39'),
(471, 'File index', 'Visited File Index', 'Action', '2021-10-07 09:36:44', '2021-10-07 09:36:44'),
(472, 'File index', 'Visited File Index', 'Action', '2021-10-07 21:49:15', '2021-10-07 21:49:15'),
(473, 'File index', 'Visited File Index', 'Action', '2021-10-07 21:49:28', '2021-10-07 21:49:28'),
(474, 'File index', 'Visited File Index', 'Super', '2021-10-07 22:08:35', '2021-10-07 22:08:35'),
(475, 'File Request', 'Visited File Requests', 'Super', '2021-10-07 22:08:55', '2021-10-07 22:08:55'),
(476, 'File Request', 'Visited File Requests', 'Action', '2021-10-07 22:09:23', '2021-10-07 22:09:23'),
(477, 'Section index', 'Visited Section Index', 'Super', '2021-10-09 02:31:25', '2021-10-09 02:31:25'),
(478, 'Master index', 'Visited Master Index', 'Super', '2021-10-09 02:39:47', '2021-10-09 02:39:47'),
(479, 'File Request', 'Visited File Requests', 'Super', '2021-10-09 03:04:55', '2021-10-09 03:04:55'),
(480, 'File index', 'Visited File Index', 'Action', '2021-10-09 03:58:21', '2021-10-09 03:58:21'),
(481, 'File index', 'Visited File Index', 'Action', '2021-10-09 03:58:30', '2021-10-09 03:58:30'),
(482, 'File index', 'Visited File Index', 'Action', '2021-10-09 03:58:38', '2021-10-09 03:58:38'),
(483, 'File index', 'Visited File Index', 'Action', '2021-10-09 03:58:50', '2021-10-09 03:58:50'),
(484, 'File index', 'Visited File Index', 'Action', '2021-10-09 03:58:55', '2021-10-09 03:58:55'),
(485, 'File index', 'Visited File Index', 'Action', '2021-10-09 03:59:09', '2021-10-09 03:59:09'),
(486, 'File Request', 'Visited File Requests', 'Super', '2021-10-09 03:59:14', '2021-10-09 03:59:14'),
(487, 'File Request', 'Visited File Requests', 'Super', '2021-10-09 03:59:19', '2021-10-09 03:59:19'),
(488, 'File index', 'Visited File Index', 'Action', '2021-10-09 03:59:23', '2021-10-09 03:59:23'),
(489, 'File index', 'Visited File Index', 'Action', '2021-10-09 03:59:30', '2021-10-09 03:59:30'),
(490, 'File Request', 'Visited File Requests', 'Super', '2021-10-09 04:08:30', '2021-10-09 04:08:30'),
(491, 'File Request', 'Visited File Requests', 'Super', '2021-10-09 04:08:37', '2021-10-09 04:08:37'),
(492, 'File index', 'Visited File Index', 'Action', '2021-10-09 04:09:06', '2021-10-09 04:09:06'),
(493, 'File index', 'Visited File Index', 'Action', '2021-10-09 04:10:04', '2021-10-09 04:10:04'),
(494, 'File index', 'Visited File Index', 'Action', '2021-10-09 05:59:25', '2021-10-09 05:59:25'),
(495, 'File index', 'Visited File Index', 'Action', '2021-10-09 05:59:38', '2021-10-09 05:59:38'),
(496, 'File Request', 'Visited File Requests', 'Super', '2021-10-09 07:39:54', '2021-10-09 07:39:54'),
(497, 'File index', 'Visited File Index', 'Action', '2021-10-09 07:41:55', '2021-10-09 07:41:55'),
(498, 'File Request', 'Visited File Requests', 'Super', '2021-10-09 07:52:23', '2021-10-09 07:52:23'),
(499, 'File index', 'Visited File Index', 'Super', '2021-10-09 07:54:12', '2021-10-09 07:54:12'),
(500, 'File index', 'Visited File Index', 'Action', '2021-10-09 07:55:53', '2021-10-09 07:55:53'),
(501, 'File index', 'Visited File Index', 'Action', '2021-10-09 08:09:11', '2021-10-09 08:09:11'),
(502, 'File index', 'Visited File Index', 'Action', '2021-10-09 08:17:00', '2021-10-09 08:17:00');
INSERT INTO `activities` (`id`, `module_name`, `action_name`, `user_name`, `created_at`, `updated_at`) VALUES
(503, 'File index', 'Visited File Index', 'Action', '2021-10-09 08:18:38', '2021-10-09 08:18:38'),
(504, 'File index', 'Visited File Index', 'Super', '2021-10-09 08:20:58', '2021-10-09 08:20:58'),
(505, 'File index', 'Visited File Index', 'Action', '2021-10-09 08:36:21', '2021-10-09 08:36:21'),
(506, 'File index', 'Visited File Index', 'Action', '2021-10-09 08:36:54', '2021-10-09 08:36:54'),
(507, 'File index', 'Visited File Index', 'Action', '2021-10-09 08:36:59', '2021-10-09 08:36:59'),
(508, 'File index', 'Visited File Index', 'Action', '2021-10-09 08:37:04', '2021-10-09 08:37:04'),
(509, 'File index', 'Visited File Index', 'Super', '2021-10-09 08:57:21', '2021-10-09 08:57:21'),
(510, 'File index', 'Visited File Index', 'Action', '2021-10-09 08:58:15', '2021-10-09 08:58:15'),
(511, 'File index', 'Visited File Index', 'Action', '2021-10-09 08:58:21', '2021-10-09 08:58:21'),
(512, 'File index', 'Visited File Index', 'Action', '2021-10-09 08:58:30', '2021-10-09 08:58:30'),
(513, 'File index', 'Visited File Index', 'Action', '2021-10-09 09:00:16', '2021-10-09 09:00:16'),
(514, 'File index', 'Visited File Index', 'Action', '2021-10-09 09:00:25', '2021-10-09 09:00:25'),
(515, 'File index', 'Visited File Index', 'Super', '2021-10-09 09:00:46', '2021-10-09 09:00:46'),
(516, 'File index', 'Visited File Index', 'Action', '2021-10-09 09:03:08', '2021-10-09 09:03:08'),
(517, 'File index', 'Visited File Index', 'Action', '2021-10-09 09:03:45', '2021-10-09 09:03:45'),
(518, 'File index', 'Visited File Index', 'Action', '2021-10-09 09:08:36', '2021-10-09 09:08:36'),
(519, 'File index', 'Visited File Index', 'Super', '2021-10-09 09:08:58', '2021-10-09 09:08:58'),
(520, 'File index', 'Visited File Index', 'Action', '2021-10-09 09:09:38', '2021-10-09 09:09:38'),
(521, 'File index', 'Visited File Index', 'Action', '2021-10-09 09:10:32', '2021-10-09 09:10:32'),
(522, 'File index', 'Visited File Index', 'Action', '2021-10-09 09:12:27', '2021-10-09 09:12:27'),
(523, 'File index', 'Visited File Index', 'Super', '2021-10-09 09:45:11', '2021-10-09 09:45:11'),
(524, 'File index', 'Visited File Index', 'Super', '2021-10-09 09:51:03', '2021-10-09 09:51:03'),
(525, 'File index', 'Visited File Index', 'Super', '2021-10-09 09:51:42', '2021-10-09 09:51:42'),
(526, 'File index', 'Visited File Index', 'Super', '2021-10-09 09:52:18', '2021-10-09 09:52:18'),
(527, 'File index', 'Visited File Index', 'Super', '2021-10-09 09:52:48', '2021-10-09 09:52:48'),
(528, 'File index', 'Visited File Index', 'Super', '2021-10-10 01:42:05', '2021-10-10 01:42:05'),
(529, 'File index', 'Visited File Index', 'Super', '2021-10-10 01:42:28', '2021-10-10 01:42:28'),
(530, 'File index', 'Visited File Index', 'Super', '2021-10-10 01:48:09', '2021-10-10 01:48:09'),
(531, 'Master index', 'Visited Master Index', 'Super', '2021-10-10 01:49:12', '2021-10-10 01:49:12'),
(532, 'Office index', 'Visited Office Index', 'Super', '2021-10-10 01:49:59', '2021-10-10 01:49:59'),
(533, 'Department index', 'Visited Department Index', 'Super', '2021-10-10 04:00:00', '2021-10-10 04:00:00'),
(534, 'Building index', 'Visited Building Index', 'Super', '2021-10-10 04:00:19', '2021-10-10 04:00:19'),
(535, 'Master index', 'Visited Master Index', 'Super', '2021-10-10 04:00:31', '2021-10-10 04:00:31'),
(536, 'Master Create', 'Visited Create Master Page', 'Super', '2021-10-10 04:00:49', '2021-10-10 04:00:49'),
(537, 'Category index', 'Visited Category Index', 'Super', '2021-10-10 04:01:18', '2021-10-10 04:01:18'),
(538, 'Classification index', 'Visited Classification Index', 'Super', '2021-10-10 04:01:34', '2021-10-10 04:01:34'),
(539, 'File index', 'Visited File Index', 'Super', '2021-10-10 04:01:51', '2021-10-10 04:01:51'),
(540, 'File Request', 'Visited File Requests', 'Super', '2021-10-10 04:02:05', '2021-10-10 04:02:05'),
(541, 'User Index', 'Visited User Index Page', 'Super', '2021-10-10 06:07:44', '2021-10-10 06:07:44'),
(542, 'User Index', 'Visited User Index Page', 'Super', '2021-10-10 06:08:14', '2021-10-10 06:08:14'),
(543, 'User Index', 'Visited User Index Page', 'Super', '2021-10-10 06:08:23', '2021-10-10 06:08:23'),
(544, 'File Create', 'Visited Create File Page', 'Super', '2021-10-11 04:29:00', '2021-10-11 04:29:00'),
(545, 'File index', 'Visited File Index', 'Super', '2021-10-11 04:29:11', '2021-10-11 04:29:11'),
(546, 'Classification index', 'Visited Classification Index', 'Super', '2021-10-11 04:29:31', '2021-10-11 04:29:31'),
(547, 'Category index', 'Visited Category Index', 'Super', '2021-10-11 04:29:46', '2021-10-11 04:29:46'),
(548, 'Master index', 'Visited Master Index', 'Super', '2021-10-11 04:30:05', '2021-10-11 04:30:05'),
(549, 'Office index', 'Visited Office Index', 'Super', '2021-10-11 04:30:34', '2021-10-11 04:30:34'),
(550, 'Category index', 'Visited Category Index', 'Super', '2021-10-11 04:34:10', '2021-10-11 04:34:10'),
(551, 'Category index', 'Visited Category Index', 'Super', '2021-10-11 05:12:13', '2021-10-11 05:12:13'),
(552, 'Classification index', 'Visited Classification Index', 'Super', '2021-10-11 05:12:58', '2021-10-11 05:12:58'),
(553, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:14:38', '2021-10-11 05:14:38'),
(554, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:14:51', '2021-10-11 05:14:51'),
(555, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:15:04', '2021-10-11 05:15:04'),
(556, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:15:28', '2021-10-11 05:15:28'),
(557, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:15:41', '2021-10-11 05:15:41'),
(558, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:15:48', '2021-10-11 05:15:48'),
(559, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:16:03', '2021-10-11 05:16:03'),
(560, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:16:26', '2021-10-11 05:16:26'),
(561, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:37:50', '2021-10-11 05:37:50'),
(562, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:44:53', '2021-10-11 05:44:53'),
(563, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:56:13', '2021-10-11 05:56:13'),
(564, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:56:24', '2021-10-11 05:56:24'),
(565, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:56:39', '2021-10-11 05:56:39'),
(566, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:57:06', '2021-10-11 05:57:06'),
(567, 'File index', 'Visited File Index', 'Action', '2021-10-11 05:57:17', '2021-10-11 05:57:17'),
(568, 'Department index', 'Visited Department Index', 'Super', '2021-10-11 05:58:30', '2021-10-11 05:58:30'),
(569, 'Section index', 'Visited Section Index', 'Super', '2021-10-11 05:58:37', '2021-10-11 05:58:37'),
(570, 'Classification index', 'Visited Classification Index', 'Super', '2021-10-11 05:58:49', '2021-10-11 05:58:49'),
(571, 'File index', 'Visited File Index', 'Super', '2021-10-11 05:58:57', '2021-10-11 05:58:57'),
(572, 'File Create', 'Visited Create File Page', 'Super', '2021-10-11 05:59:13', '2021-10-11 05:59:13'),
(573, 'File index', 'Visited File Index', 'Super', '2021-10-11 06:01:16', '2021-10-11 06:01:16'),
(574, 'File Request', 'Visited File Requests', 'Super', '2021-10-11 06:01:28', '2021-10-11 06:01:28'),
(575, 'File Request', 'Visited File Requests', 'Super', '2021-10-11 06:04:27', '2021-10-11 06:04:27'),
(576, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:05:36', '2021-10-11 06:05:36'),
(577, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:07:36', '2021-10-11 06:07:36'),
(578, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:07:40', '2021-10-11 06:07:40'),
(579, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:08:45', '2021-10-11 06:08:45'),
(580, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:09:07', '2021-10-11 06:09:07'),
(581, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:09:17', '2021-10-11 06:09:17'),
(582, 'File Create', 'Visited Create File Page', 'Super', '2021-10-11 06:10:08', '2021-10-11 06:10:08'),
(583, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:12:05', '2021-10-11 06:12:05'),
(584, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:12:12', '2021-10-11 06:12:12'),
(585, 'File Request', 'Visited File Requests', 'Super', '2021-10-11 06:14:26', '2021-10-11 06:14:26'),
(586, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:14:51', '2021-10-11 06:14:51'),
(587, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:14:58', '2021-10-11 06:14:58'),
(588, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:15:06', '2021-10-11 06:15:06'),
(589, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:15:11', '2021-10-11 06:15:11'),
(590, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:19:26', '2021-10-11 06:19:26'),
(591, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:19:34', '2021-10-11 06:19:34'),
(592, 'File Request', 'Visited File Requests', 'Super', '2021-10-11 06:20:08', '2021-10-11 06:20:08'),
(593, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:20:16', '2021-10-11 06:20:16'),
(594, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:20:38', '2021-10-11 06:20:38'),
(595, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:20:42', '2021-10-11 06:20:42'),
(596, 'File index', 'Visited File Index', 'Action', '2021-10-11 06:23:11', '2021-10-11 06:23:11'),
(597, 'Master index', 'Visited Master Index', 'Super', '2021-10-11 06:23:43', '2021-10-11 06:23:43'),
(598, 'File index', 'Visited File Index', 'Super', '2021-10-11 06:23:53', '2021-10-11 06:23:53'),
(599, 'File Request', 'Visited File Requests', 'Super', '2021-10-11 06:24:06', '2021-10-11 06:24:06'),
(600, 'Category index', 'Visited Category Index', 'Super', '2021-10-11 06:30:26', '2021-10-11 06:30:26'),
(601, 'File index', 'Visited File Index', 'Super', '2021-10-11 06:30:55', '2021-10-11 06:30:55'),
(602, 'Building index', 'Visited Building Index', 'Super', '2021-10-11 06:33:25', '2021-10-11 06:33:25'),
(603, 'Category index', 'Visited Category Index', 'Super', '2021-10-11 06:37:04', '2021-10-11 06:37:04'),
(604, 'Category index', 'Visited Category Index', 'Super', '2021-10-11 06:39:20', '2021-10-11 06:39:20'),
(605, 'Category index', 'Visited Category Index', 'Super', '2021-10-12 05:15:42', '2021-10-12 05:15:42'),
(606, 'Classification index', 'Visited Classification Index', 'Super', '2021-10-12 06:59:13', '2021-10-12 06:59:13'),
(607, 'Department index', 'Visited Department Index', 'Super', '2021-10-12 08:22:59', '2021-10-12 08:22:59'),
(608, 'Department Create', 'Visited Create Department Page', 'Super', '2021-10-12 08:23:06', '2021-10-12 08:23:06'),
(609, 'File index', 'Visited File Index', 'Super', '2021-10-12 08:23:38', '2021-10-12 08:23:38'),
(610, 'File Request', 'Visited File Requests', 'Super', '2021-10-12 08:24:32', '2021-10-12 08:24:32'),
(611, 'File index', 'Visited File Index', 'Action', '2021-10-12 08:28:08', '2021-10-12 08:28:08'),
(612, 'File index', 'Visited File Index', 'Action', '2021-10-12 08:28:24', '2021-10-12 08:28:24'),
(613, 'File index', 'Visited File Index', 'Super', '2021-10-12 08:28:37', '2021-10-12 08:28:37'),
(614, 'File Create', 'Visited Create File Page', 'Super', '2021-10-12 08:28:44', '2021-10-12 08:28:44'),
(615, 'File Created', 'Created new File', 'Super', '2021-10-12 08:29:19', '2021-10-12 08:29:19'),
(616, 'File index', 'Visited File Index', 'Super', '2021-10-12 08:29:20', '2021-10-12 08:29:20'),
(617, 'File index', 'Visited File Index', 'Action', '2021-10-12 08:29:26', '2021-10-12 08:29:26'),
(618, 'File', 'Trashed a File', 'Super', '2021-10-12 08:29:47', '2021-10-12 08:29:47'),
(619, 'File index', 'Visited File Index', 'Super', '2021-10-12 08:29:48', '2021-10-12 08:29:48'),
(620, 'File index', 'Visited File Index', 'Action', '2021-10-12 08:29:52', '2021-10-12 08:29:52'),
(621, 'File index', 'Visited File Index', 'Super', '2021-10-12 08:29:59', '2021-10-12 08:29:59'),
(622, 'File', 'Trashed a File', 'Super', '2021-10-12 08:30:14', '2021-10-12 08:30:14'),
(623, 'File index', 'Visited File Index', 'Super', '2021-10-12 08:30:15', '2021-10-12 08:30:15'),
(624, 'File index', 'Visited File Index', 'Action', '2021-10-12 08:30:23', '2021-10-12 08:30:23'),
(625, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:24:49', '2021-10-12 10:24:49'),
(626, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:25:28', '2021-10-12 10:25:28'),
(627, 'Classification index', 'Visited Classification Index', 'Super', '2021-10-12 10:27:37', '2021-10-12 10:27:37'),
(628, 'File Request', 'Visited File Requests', 'Super', '2021-10-12 10:27:59', '2021-10-12 10:27:59'),
(629, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:28:09', '2021-10-12 10:28:09'),
(630, 'File Request', 'Visited File Requests', 'Super', '2021-10-12 10:28:29', '2021-10-12 10:28:29'),
(631, 'File Request', 'Visited File Requests', 'Super', '2021-10-12 10:31:07', '2021-10-12 10:31:07'),
(632, 'File index', 'Visited File Index', 'Super', '2021-10-12 10:31:33', '2021-10-12 10:31:33'),
(633, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:31:56', '2021-10-12 10:31:56'),
(634, 'File Create', 'Visited Create File Page', 'Super', '2021-10-12 10:32:03', '2021-10-12 10:32:03'),
(635, 'File Created', 'Created new File', 'Super', '2021-10-12 10:32:19', '2021-10-12 10:32:19'),
(636, 'File index', 'Visited File Index', 'Super', '2021-10-12 10:32:19', '2021-10-12 10:32:19'),
(637, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:32:27', '2021-10-12 10:32:27'),
(638, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:32:34', '2021-10-12 10:32:34'),
(639, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:33:26', '2021-10-12 10:33:26'),
(640, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:33:34', '2021-10-12 10:33:34'),
(641, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:33:38', '2021-10-12 10:33:38'),
(642, 'File Request', 'Visited File Requests', 'Super', '2021-10-12 10:34:30', '2021-10-12 10:34:30'),
(643, 'File Request', 'Visited File Requests', 'Super', '2021-10-12 10:34:37', '2021-10-12 10:34:37'),
(644, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:34:45', '2021-10-12 10:34:45'),
(645, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:34:48', '2021-10-12 10:34:48'),
(646, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:34:58', '2021-10-12 10:34:58'),
(647, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:35:03', '2021-10-12 10:35:03'),
(648, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:36:52', '2021-10-12 10:36:52'),
(649, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:38:00', '2021-10-12 10:38:00'),
(650, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:40:55', '2021-10-12 10:40:55'),
(651, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:41:17', '2021-10-12 10:41:17'),
(652, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:42:48', '2021-10-12 10:42:48'),
(653, 'File index', 'Visited File Index', 'Action', '2021-10-12 10:44:45', '2021-10-12 10:44:45'),
(654, 'Classification index', 'Visited Classification Index', 'Super', '2021-10-16 11:16:05', '2021-10-16 11:16:05'),
(655, 'Category index', 'Visited Category Index', 'Super', '2021-10-16 11:16:26', '2021-10-16 11:16:26'),
(656, 'Master index', 'Visited Master Index', 'Super', '2021-10-16 11:16:35', '2021-10-16 11:16:35'),
(657, 'Category index', 'Visited Category Index', 'Super', '2021-10-16 11:16:59', '2021-10-16 11:16:59'),
(658, 'File index', 'Visited File Index', 'Super', '2021-10-16 11:17:16', '2021-10-16 11:17:16'),
(659, 'File Request', 'Visited File Requests', 'Super', '2021-10-16 11:17:53', '2021-10-16 11:17:53'),
(660, 'Department index', 'Visited Department Index', 'Super', '2021-10-18 06:43:04', '2021-10-18 06:43:04'),
(661, 'Department index', 'Visited Department Index', 'Super', '2021-10-21 11:34:27', '2021-10-21 11:34:27'),
(662, 'Building index', 'Visited Building Index', 'Super', '2021-10-21 11:35:51', '2021-10-21 11:35:51'),
(663, 'File Create', 'Visited Create File Page', 'Super', '2021-10-22 05:59:13', '2021-10-22 05:59:13'),
(664, 'File index', 'Visited File Index', 'Action', '2021-10-22 12:11:10', '2021-10-22 12:11:10'),
(665, 'File index', 'Visited File Index', 'Action', '2021-10-22 12:11:18', '2021-10-22 12:11:18'),
(666, 'File index', 'Visited File Index', 'Action', '2021-10-22 12:11:40', '2021-10-22 12:11:40'),
(667, 'File index', 'Visited File Index', 'Action', '2021-10-22 12:14:03', '2021-10-22 12:14:03'),
(668, 'File index', 'Visited File Index', 'Action', '2021-10-22 12:26:05', '2021-10-22 12:26:05'),
(669, 'File index', 'Visited File Index', 'Action', '2021-10-22 12:39:46', '2021-10-22 12:39:46'),
(670, 'File index', 'Visited File Index', 'Super', '2021-10-22 12:57:40', '2021-10-22 12:57:40'),
(671, 'File Request', 'Visited File Requests', 'Super', '2021-10-22 13:00:47', '2021-10-22 13:00:47'),
(672, 'File index', 'Visited File Index', 'Super', '2021-10-22 13:01:48', '2021-10-22 13:01:48'),
(673, 'File Request', 'Visited File Requests', 'Super', '2021-10-22 13:10:36', '2021-10-22 13:10:36'),
(674, 'File index', 'Visited File Index', 'Super', '2021-10-22 13:10:48', '2021-10-22 13:10:48'),
(675, 'Department index', 'Visited Department Index', 'Super', '2021-10-22 13:11:05', '2021-10-22 13:11:05'),
(676, 'User Index', 'Visited User Index Page', 'Super', '2021-10-22 13:11:32', '2021-10-22 13:11:32'),
(677, 'File index', 'Visited File Index', 'Super', '2021-10-22 13:12:47', '2021-10-22 13:12:47'),
(678, 'User Index', 'Visited User Index Page', 'Super', '2021-10-22 13:13:00', '2021-10-22 13:13:00'),
(679, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:14:09', '2021-10-22 13:14:09'),
(680, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:14:17', '2021-10-22 13:14:17'),
(681, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:14:24', '2021-10-22 13:14:24'),
(682, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:20:54', '2021-10-22 13:20:54'),
(683, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:21:01', '2021-10-22 13:21:01'),
(684, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:21:06', '2021-10-22 13:21:06'),
(685, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:21:13', '2021-10-22 13:21:13'),
(686, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:22:02', '2021-10-22 13:22:02'),
(687, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:22:10', '2021-10-22 13:22:10'),
(688, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:22:19', '2021-10-22 13:22:19'),
(689, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:32:35', '2021-10-22 13:32:35'),
(690, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:32:40', '2021-10-22 13:32:40'),
(691, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:32:46', '2021-10-22 13:32:46'),
(692, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:35:36', '2021-10-22 13:35:36'),
(693, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:35:45', '2021-10-22 13:35:45'),
(694, 'File index', 'Visited File Index', 'Action', '2021-10-22 13:35:51', '2021-10-22 13:35:51'),
(695, 'File Request', 'Visited File Requests', 'Super', '2021-10-22 13:36:40', '2021-10-22 13:36:40'),
(696, 'File index', 'Visited File Index', 'Super', '2021-10-22 13:36:50', '2021-10-22 13:36:50'),
(697, 'Department index', 'Visited Department Index', 'Super', '2021-10-25 07:16:17', '2021-10-25 07:16:17'),
(698, 'File Create', 'Visited Create File Page', 'Super', '2021-10-25 07:52:22', '2021-10-25 07:52:22'),
(699, 'File index', 'Visited File Index', 'Super', '2021-10-25 08:21:42', '2021-10-25 08:21:42'),
(700, 'File index', 'Visited File Index', 'Super', '2021-10-25 12:29:46', '2021-10-25 12:29:46'),
(701, 'File Create', 'Visited Create File Page', 'Super', '2021-10-25 12:32:01', '2021-10-25 12:32:01'),
(702, 'File Request', 'Visited File Requests', 'Super', '2021-10-25 12:33:01', '2021-10-25 12:33:01'),
(703, 'File index', 'Visited File Index', 'Super', '2021-10-25 12:33:50', '2021-10-25 12:33:50'),
(704, 'File index', 'Visited File Index', 'Super', '2021-10-26 04:47:52', '2021-10-26 04:47:52'),
(705, 'Classification index', 'Visited Classification Index', 'Super', '2021-10-26 04:49:36', '2021-10-26 04:49:36'),
(706, 'Master index', 'Visited Master Index', 'Super', '2021-10-26 04:49:49', '2021-10-26 04:49:49'),
(707, 'File index', 'Visited File Index', 'Super', '2021-10-26 04:50:16', '2021-10-26 04:50:16'),
(708, 'Building index', 'Visited Building Index', 'Super', '2021-10-26 05:09:38', '2021-10-26 05:09:38'),
(709, 'Section index', 'Visited Section Index', 'Super', '2021-10-26 05:09:49', '2021-10-26 05:09:49'),
(710, 'Department index', 'Visited Department Index', 'Super', '2021-10-26 05:10:01', '2021-10-26 05:10:01'),
(711, 'User Index', 'Visited User Index Page', 'Super', '2021-10-26 05:10:17', '2021-10-26 05:10:17'),
(712, 'Role index', 'Visited Role index Page', 'Super', '2021-10-26 05:10:34', '2021-10-26 05:10:34'),
(713, 'Role create', 'Visited Role Create Page', 'Super', '2021-10-26 05:10:47', '2021-10-26 05:10:47'),
(714, 'Master index', 'Visited Master Index', 'Super', '2021-10-26 05:10:59', '2021-10-26 05:10:59'),
(715, 'File index', 'Visited File Index', 'Super', '2021-10-26 05:17:18', '2021-10-26 05:17:18'),
(716, 'File Create', 'Visited Create File Page', 'Super', '2021-10-26 05:51:47', '2021-10-26 05:51:47'),
(717, 'File index', 'Visited File Index', 'Super', '2021-10-26 05:52:19', '2021-10-26 05:52:19'),
(718, 'Classification index', 'Visited Classification Index', 'Super', '2021-10-26 06:01:34', '2021-10-26 06:01:34'),
(719, 'File index', 'Visited File Index', 'Super', '2021-10-26 06:03:25', '2021-10-26 06:03:25'),
(720, 'File Upload', 'Visited File Upload Page', 'Super', '2021-10-26 07:18:12', '2021-10-26 07:18:12'),
(721, 'File index', 'Visited File Index', 'Super', '2021-10-26 07:50:16', '2021-10-26 07:50:16'),
(722, 'File index', 'Visited File Index', 'Super', '2021-10-26 12:11:56', '2021-10-26 12:11:56'),
(723, 'File Request', 'Visited File Requests', 'Super', '2021-10-26 12:12:03', '2021-10-26 12:12:03'),
(724, 'File Edit', 'Visited File Edit Page', 'Super', '2021-10-26 12:59:12', '2021-10-26 12:59:12'),
(725, 'File Edit', 'Visited File Edit Page', 'Super', '2021-10-26 12:59:36', '2021-10-26 12:59:36'),
(726, 'Master index', 'Visited Master Index', 'Super', '2021-10-26 13:11:00', '2021-10-26 13:11:00'),
(727, 'File index', 'Visited File Index', 'Super', '2021-10-26 13:11:12', '2021-10-26 13:11:12'),
(728, 'File Request', 'Visited File Requests', 'Super', '2021-10-27 11:09:03', '2021-10-27 11:09:03'),
(729, 'File index', 'Visited File Index', 'Super', '2021-10-28 04:03:12', '2021-10-28 04:03:12'),
(730, 'Category index', 'Visited Category Index', 'Super', '2021-10-28 04:07:31', '2021-10-28 04:07:31'),
(731, 'Category index', 'Visited Category Index', 'Super', '2021-10-28 04:19:39', '2021-10-28 04:19:39'),
(732, 'User Index', 'Visited User Index Page', 'Super', '2021-10-28 04:20:51', '2021-10-28 04:20:51'),
(733, 'User Create', 'Visited User Create Page', 'Super', '2021-10-28 04:21:12', '2021-10-28 04:21:12'),
(734, 'User Created', 'Created New User', 'Super', '2021-10-28 04:22:16', '2021-10-28 04:22:16'),
(735, 'User Index', 'Visited User Index Page', 'Super', '2021-10-28 04:22:17', '2021-10-28 04:22:17'),
(736, 'User Index', 'Visited User Index Page', 'Super', '2021-10-28 04:44:11', '2021-10-28 04:44:11'),
(737, 'File index', 'Visited File Index', 'Mpolokeng', '2021-10-28 04:52:30', '2021-10-28 04:52:30'),
(738, 'File index', 'Visited File Index', 'Mpolokeng', '2021-10-28 04:52:42', '2021-10-28 04:52:42'),
(739, 'File index', 'Visited File Index', 'Mpolokeng', '2021-10-28 04:52:49', '2021-10-28 04:52:49'),
(740, 'File index', 'Visited File Index', 'Action', '2021-10-28 04:54:25', '2021-10-28 04:54:25'),
(741, 'File index', 'Visited File Index', 'Action', '2021-10-28 04:56:01', '2021-10-28 04:56:01'),
(742, 'File index', 'Visited File Index', 'Action', '2021-10-28 05:04:45', '2021-10-28 05:04:45'),
(743, 'File Request', 'Visited File Requests', 'Super', '2021-10-28 05:06:34', '2021-10-28 05:06:34'),
(744, 'File index', 'Visited File Index', 'Super', '2021-10-28 05:06:50', '2021-10-28 05:06:50'),
(745, 'File Create', 'Visited Create File Page', 'Super', '2021-10-28 05:07:04', '2021-10-28 05:07:04'),
(746, 'File Created', 'Created new File', 'Super', '2021-10-28 05:07:43', '2021-10-28 05:07:43'),
(747, 'File index', 'Visited File Index', 'Super', '2021-10-28 05:07:52', '2021-10-28 05:07:52'),
(748, 'File index', 'Visited File Index', 'Mpolokeng', '2021-10-28 05:10:48', '2021-10-28 05:10:48'),
(749, 'File index', 'Visited File Index', 'Mpolokeng', '2021-10-28 05:11:40', '2021-10-28 05:11:40'),
(750, 'File index', 'Visited File Index', 'Super', '2021-10-28 05:12:47', '2021-10-28 05:12:47'),
(751, 'File index', 'Visited File Index', 'Super', '2021-10-28 05:57:23', '2021-10-28 05:57:23'),
(752, 'File index', 'Visited File Index', 'Action', '2021-10-28 07:51:35', '2021-10-28 07:51:35'),
(753, 'File index', 'Visited File Index', 'Action', '2021-10-28 07:51:56', '2021-10-28 07:51:56'),
(754, 'File index', 'Visited File Index', 'Action', '2021-10-29 11:44:53', '2021-10-29 11:44:53'),
(755, 'File index', 'Visited File Index', 'Action', '2021-10-29 11:45:23', '2021-10-29 11:45:23'),
(756, 'File index', 'Visited File Index', 'Action', '2021-10-29 11:49:51', '2021-10-29 11:49:51'),
(757, 'File index', 'Visited File Index', 'Action', '2021-10-29 11:50:17', '2021-10-29 11:50:17'),
(758, 'File index', 'Visited File Index', 'Action', '2021-10-29 11:52:50', '2021-10-29 11:52:50'),
(759, 'File index', 'Visited File Index', 'Action', '2021-10-29 11:53:18', '2021-10-29 11:53:18'),
(760, 'File index', 'Visited File Index', 'Action', '2021-10-29 11:59:47', '2021-10-29 11:59:47'),
(761, 'File Request', 'Visited File Requests', 'Super', '2021-10-29 12:40:54', '2021-10-29 12:40:54'),
(762, 'User Index', 'Visited User Index Page', 'Super', '2021-10-29 13:26:28', '2021-10-29 13:26:28'),
(763, 'File Request', 'Visited File Requests', 'Super', '2021-10-29 13:32:57', '2021-10-29 13:32:57'),
(764, 'User Index', 'Visited User Index Page', 'Super', '2021-10-29 15:11:29', '2021-10-29 15:11:29'),
(765, 'Category index', 'Visited Category Index', 'Super', '2021-11-01 05:52:01', '2021-11-01 05:52:01'),
(766, 'User Index', 'Visited User Index Page', 'Super', '2021-11-08 08:13:24', '2021-11-08 08:13:24'),
(767, 'Role index', 'Visited Role index Page', 'Super', '2021-11-08 08:13:47', '2021-11-08 08:13:47'),
(768, 'Department index', 'Visited Department Index', 'Super', '2021-11-08 08:13:59', '2021-11-08 08:13:59'),
(769, 'Office index', 'Visited Office Index', 'Super', '2021-11-08 08:14:05', '2021-11-08 08:14:05'),
(770, 'Master index', 'Visited Master Index', 'Super', '2021-11-08 08:14:17', '2021-11-08 08:14:17'),
(771, 'Category index', 'Visited Category Index', 'Super', '2021-11-08 08:14:28', '2021-11-08 08:14:28'),
(772, 'Classification index', 'Visited Classification Index', 'Super', '2021-11-08 08:14:37', '2021-11-08 08:14:37'),
(773, 'File index', 'Visited File Index', 'Super', '2021-11-08 08:15:00', '2021-11-08 08:15:00'),
(774, 'File Request', 'Visited File Requests', 'Super', '2021-11-08 08:15:30', '2021-11-08 08:15:30'),
(775, 'File index', 'Visited File Index', 'Super', '2021-11-08 08:15:37', '2021-11-08 08:15:37'),
(776, 'File Request', 'Visited File Requests', 'Super', '2021-11-08 08:17:09', '2021-11-08 08:17:09'),
(777, 'File index', 'Visited File Index', 'Super', '2021-11-08 08:17:39', '2021-11-08 08:17:39'),
(778, 'File Request', 'Visited File Requests', 'Super', '2021-11-08 08:17:44', '2021-11-08 08:17:44'),
(779, 'User Index', 'Visited User Index Page', 'Super', '2021-11-08 09:39:24', '2021-11-08 09:39:24'),
(780, 'Role index', 'Visited Role index Page', 'Super', '2021-11-08 10:46:37', '2021-11-08 10:46:37'),
(781, 'Department index', 'Visited Department Index', 'Super', '2021-11-08 10:47:16', '2021-11-08 10:47:16'),
(782, 'Building index', 'Visited Building Index', 'Super', '2021-11-08 10:47:54', '2021-11-08 10:47:54'),
(783, 'Section index', 'Visited Section Index', 'Super', '2021-11-08 10:48:02', '2021-11-08 10:48:02'),
(784, 'Office index', 'Visited Office Index', 'Super', '2021-11-08 10:48:15', '2021-11-08 10:48:15'),
(785, 'Master index', 'Visited Master Index', 'Super', '2021-11-08 10:48:57', '2021-11-08 10:48:57'),
(786, 'Category index', 'Visited Category Index', 'Super', '2021-11-08 10:49:44', '2021-11-08 10:49:44'),
(787, 'Classification index', 'Visited Classification Index', 'Super', '2021-11-08 10:50:37', '2021-11-08 10:50:37'),
(788, 'File index', 'Visited File Index', 'Action', '2021-11-08 10:55:32', '2021-11-08 10:55:32'),
(789, 'File index', 'Visited File Index', 'Action', '2021-11-08 10:55:47', '2021-11-08 10:55:47'),
(790, 'File index', 'Visited File Index', 'Action', '2021-11-08 10:56:11', '2021-11-08 10:56:11'),
(791, 'File index', 'Visited File Index', 'Super', '2021-11-08 11:00:09', '2021-11-08 11:00:09'),
(792, 'File Create', 'Visited Create File Page', 'Super', '2021-11-08 11:01:58', '2021-11-08 11:01:58'),
(793, 'File Created', 'Created new File', 'Super', '2021-11-08 11:02:23', '2021-11-08 11:02:23'),
(794, 'File index', 'Visited File Index', 'Super', '2021-11-08 11:02:24', '2021-11-08 11:02:24'),
(795, 'File index', 'Visited File Index', 'Action', '2021-11-08 11:03:55', '2021-11-08 11:03:55'),
(796, 'User Index', 'Visited User Index Page', 'Super', '2021-11-08 13:44:50', '2021-11-08 13:44:50'),
(797, 'User Index', 'Visited User Index Page', 'Super', '2021-11-08 13:46:38', '2021-11-08 13:46:38'),
(798, 'User Index', 'Visited User Index Page', 'Super', '2021-11-08 13:49:47', '2021-11-08 13:49:47'),
(799, 'User Index', 'Visited User Index Page', 'Super', '2021-11-08 14:40:13', '2021-11-08 14:40:13'),
(800, 'Department index', 'Visited Department Index', 'Super', '2021-11-20 13:52:23', '2021-11-20 13:52:23'),
(801, 'Building index', 'Visited Building Index', 'Super', '2021-11-20 13:52:38', '2021-11-20 13:52:38'),
(802, 'Master index', 'Visited Master Index', 'Super', '2021-11-20 13:52:51', '2021-11-20 13:52:51'),
(803, 'Master index', 'Visited Master Index', 'Super', '2021-11-20 13:55:51', '2021-11-20 13:55:51'),
(804, 'Master index', 'Visited Master Index', 'Super', '2021-11-20 13:56:27', '2021-11-20 13:56:27'),
(805, 'User Index', 'Visited User Index Page', 'Super', '2021-11-20 13:56:42', '2021-11-20 13:56:42'),
(806, 'Role index', 'Visited Role index Page', 'Super', '2021-11-20 13:56:55', '2021-11-20 13:56:55'),
(807, 'Role create', 'Visited Role Create Page', 'Super', '2021-11-20 13:57:02', '2021-11-20 13:57:02'),
(808, 'Master index', 'Visited Master Index', 'Super', '2021-11-20 13:57:28', '2021-11-20 13:57:28'),
(809, 'Category index', 'Visited Category Index', 'Super', '2021-11-20 13:57:38', '2021-11-20 13:57:38'),
(810, 'Master index', 'Visited Master Index', 'Super', '2021-11-20 13:58:13', '2021-11-20 13:58:13'),
(811, 'Classification index', 'Visited Classification Index', 'Super', '2021-11-20 13:58:25', '2021-11-20 13:58:25'),
(812, 'File index', 'Visited File Index', 'Super', '2021-11-20 14:09:15', '2021-11-20 14:09:15'),
(813, 'File Create', 'Visited Create File Page', 'Super', '2021-11-20 14:09:30', '2021-11-20 14:09:30'),
(814, 'File Request', 'Visited File Requests', 'Super', '2021-11-20 14:10:41', '2021-11-20 14:10:41'),
(815, 'File index', 'Visited File Index', 'Super', '2021-11-20 14:13:47', '2021-11-20 14:13:47'),
(816, 'File Create', 'Visited Create File Page', 'Super', '2021-11-20 14:13:54', '2021-11-20 14:13:54'),
(817, 'File Created', 'Created new File', 'Super', '2021-11-20 14:16:37', '2021-11-20 14:16:37'),
(818, 'File index', 'Visited File Index', 'Super', '2021-11-20 14:16:38', '2021-11-20 14:16:38'),
(819, 'File index', 'Visited File Index', 'Action', '2021-11-20 14:18:28', '2021-11-20 14:18:28'),
(820, 'File index', 'Visited File Index', 'Action', '2021-11-20 14:18:41', '2021-11-20 14:18:41'),
(821, 'File index', 'Visited File Index', 'Action', '2021-11-20 14:19:01', '2021-11-20 14:19:01'),
(822, 'File Request', 'Visited File Requests', 'Super', '2021-11-20 14:20:05', '2021-11-20 14:20:05'),
(823, 'File Request', 'Visited File Requests', 'Super', '2021-11-20 14:20:27', '2021-11-20 14:20:27'),
(824, 'File index', 'Visited File Index', 'Super', '2021-11-20 14:22:33', '2021-11-20 14:22:33'),
(825, 'Category index', 'Visited Category Index', 'Super', '2021-11-20 14:25:46', '2021-11-20 14:25:46'),
(826, 'Department index', 'Visited Department Index', 'Super', '2021-11-22 05:43:31', '2021-11-22 05:43:31'),
(827, 'Section index', 'Visited Section Index', 'Super', '2021-11-22 05:43:38', '2021-11-22 05:43:38'),
(828, 'Office index', 'Visited Office Index', 'Super', '2021-11-22 05:43:46', '2021-11-22 05:43:46'),
(829, 'Master index', 'Visited Master Index', 'Super', '2021-11-22 05:43:52', '2021-11-22 05:43:52'),
(830, 'Category index', 'Visited Category Index', 'Super', '2021-11-22 05:43:58', '2021-11-22 05:43:58'),
(831, 'Classification index', 'Visited Classification Index', 'Super', '2021-11-22 05:44:15', '2021-11-22 05:44:15'),
(832, 'File index', 'Visited File Index', 'Super', '2021-11-22 05:44:21', '2021-11-22 05:44:21'),
(833, 'File Request', 'Visited File Requests', 'Super', '2021-11-22 05:44:39', '2021-11-22 05:44:39'),
(834, 'File Create', 'Visited Create File Page', 'Super', '2021-11-22 05:45:05', '2021-11-22 05:45:05'),
(835, 'File Create', 'Visited Create File Page', 'Super', '2021-11-22 05:47:45', '2021-11-22 05:47:45'),
(836, 'File Request', 'Visited File Requests', 'Super', '2021-11-22 06:53:16', '2021-11-22 06:53:16'),
(837, 'File index', 'Visited File Index', 'Super', '2021-11-22 06:53:17', '2021-11-22 06:53:17'),
(838, 'Classification index', 'Visited Classification Index', 'Super', '2021-11-22 06:53:17', '2021-11-22 06:53:17'),
(839, 'Department index', 'Visited Department Index', 'Super', '2021-11-22 07:24:58', '2021-11-22 07:24:58'),
(840, 'File index', 'Visited File Index', 'Super', '2021-11-22 07:24:58', '2021-11-22 07:24:58'),
(841, 'File Request', 'Visited File Requests', 'Super', '2021-11-22 07:46:45', '2021-11-22 07:46:45'),
(842, 'Classification index', 'Visited Classification Index', 'Super', '2021-11-22 07:46:45', '2021-11-22 07:46:45'),
(843, 'User Index', 'Visited User Index Page', 'Super', '2021-11-24 12:49:10', '2021-11-24 12:49:10'),
(844, 'Role index', 'Visited Role index Page', 'Super', '2021-11-24 12:49:50', '2021-11-24 12:49:50'),
(845, 'Department index', 'Visited Department Index', 'Super', '2021-11-24 12:49:57', '2021-11-24 12:49:57'),
(846, 'Master index', 'Visited Master Index', 'Super', '2021-11-25 06:22:17', '2021-11-25 06:22:17'),
(847, 'File index', 'Visited File Index', 'Super', '2021-11-25 06:36:35', '2021-11-25 06:36:35'),
(848, 'User Index', 'Visited User Index Page', 'Super', '2021-11-27 12:17:49', '2021-11-27 12:17:49'),
(849, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:18:04', '2021-11-27 12:18:04'),
(850, 'File Request', 'Visited File Requests', 'Super', '2021-11-27 12:18:04', '2021-11-27 12:18:04'),
(851, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:18:44', '2021-11-27 12:18:44'),
(852, 'File Create', 'Visited Create File Page', 'Super', '2021-11-27 12:18:49', '2021-11-27 12:18:49'),
(853, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:18:59', '2021-11-27 12:18:59'),
(854, 'Master index', 'Visited Master Index', 'Super', '2021-11-27 12:19:20', '2021-11-27 12:19:20'),
(855, 'Classification index', 'Visited Classification Index', 'Super', '2021-11-27 12:19:27', '2021-11-27 12:19:27'),
(856, 'Category index', 'Visited Category Index', 'Super', '2021-11-27 12:19:35', '2021-11-27 12:19:35'),
(857, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:19:53', '2021-11-27 12:19:53'),
(858, 'File Upload', 'Visited File Upload Page', 'Super', '2021-11-27 12:22:38', '2021-11-27 12:22:38'),
(859, 'File Upload', 'Visited File Upload Page', 'Super', '2021-11-27 12:23:00', '2021-11-27 12:23:00'),
(860, 'File Upload', 'Visited File Upload Page', 'Super', '2021-11-27 12:23:43', '2021-11-27 12:23:43'),
(861, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:23:53', '2021-11-27 12:23:53'),
(862, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:27:48', '2021-11-27 12:27:48'),
(863, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:28:12', '2021-11-27 12:28:12'),
(864, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:28:59', '2021-11-27 12:28:59'),
(865, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:29:10', '2021-11-27 12:29:10'),
(866, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:30:34', '2021-11-27 12:30:34'),
(867, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:32:05', '2021-11-27 12:32:05'),
(868, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:35:07', '2021-11-27 12:35:07'),
(869, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:36:18', '2021-11-27 12:36:18'),
(870, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:37:53', '2021-11-27 12:37:53'),
(871, 'File index', 'Visited File Index', 'Super', '2021-11-27 12:44:47', '2021-11-27 12:44:47');

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
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`id`, `username`, `file_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'superuser', 'Test1', 1, '2021-10-09 09:52:18', '2021-10-09 09:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `building_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`id`, `building_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'TEST BUILDING', '2021-09-06 21:09:01', '2021-09-06 21:09:01', 'Super', NULL, NULL);

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
(3, '1', 'Application Document', 1, '2021-09-15 12:29:55', '2021-09-15 12:29:55', 'Admin', NULL, NULL),
(4, '2', 'Communication (Letters , Etc)', 1, '2021-09-15 12:30:19', '2021-09-15 12:31:15', 'Admin', 'Admin', NULL),
(5, '3', 'Reports', 1, '2021-09-15 12:31:57', '2021-09-15 12:31:57', 'Admin', NULL, NULL),
(6, '4', 'Other', 1, '2021-09-15 12:32:19', '2021-09-15 12:32:19', 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classifications`
--

CREATE TABLE `classifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classification_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classification_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classifications`
--

INSERT INTO `classifications` (`id`, `classification_code`, `classification_name`, `classification_status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'c1', 'Public', 1, '2021-09-24 02:35:46', '2021-09-24 02:35:46', 'Super', NULL, NULL),
(2, 'c2', 'Private', 1, '2021-09-24 02:36:04', '2021-09-24 02:36:04', 'Super', NULL, NULL),
(3, 'c3', 'Secret', 1, '2021-09-24 02:36:24', '2021-09-24 02:36:24', 'Super', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registered_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `section_name`, `building_name`, `office_name`, `registered_date`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'Department', 'test sections', 'TEST BUILDING', 'HEAD OFFICE', '2021-09-06', '2021-09-06 21:40:37', '2021-09-14 19:41:49', 'Super', 'Admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dts_docroutes`
--

CREATE TABLE `dts_docroutes` (
  `action_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `previous_route_id` int(11) NOT NULL,
  `route_fromuser_id` int(11) NOT NULL,
  `route_from` varchar(255) NOT NULL,
  `route_fromsection_id` int(11) NOT NULL,
  `route_fromsection` varchar(255) NOT NULL,
  `route_tosection_id` int(11) NOT NULL,
  `route_tosection` varchar(255) NOT NULL,
  `route_touser_id` int(11) NOT NULL,
  `route_purpose` longtext NOT NULL,
  `fwd_remarks` varchar(255) NOT NULL,
  `datetime_forwarded` datetime NOT NULL,
  `datetime_route_accepted` datetime NOT NULL,
  `receivedby_id` int(11) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `accepting_remarks` longtext NOT NULL,
  `actions_datetime` datetime NOT NULL,
  `actions_taken` longtext NOT NULL,
  `actedby_id` int(11) NOT NULL,
  `acted_by` varchar(255) NOT NULL,
  `doc_copy` int(11) NOT NULL DEFAULT 0,
  `out_released_to` varchar(255) NOT NULL,
  `logbook_page` varchar(150) NOT NULL,
  `route_accomplished` int(11) NOT NULL DEFAULT 0,
  `end_remarks` varchar(255) NOT NULL,
  `def_reason` varchar(255) NOT NULL,
  `def_datetime` datetime NOT NULL,
  `duplicate` int(11) NOT NULL DEFAULT 0,
  `del_reason` varchar(255) NOT NULL,
  `updatedby_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dts_docroutes`
--

INSERT INTO `dts_docroutes` (`action_id`, `document_id`, `previous_route_id`, `route_fromuser_id`, `route_from`, `route_fromsection_id`, `route_fromsection`, `route_tosection_id`, `route_tosection`, `route_touser_id`, `route_purpose`, `fwd_remarks`, `datetime_forwarded`, `datetime_route_accepted`, `receivedby_id`, `received_by`, `accepting_remarks`, `actions_datetime`, `actions_taken`, `actedby_id`, `acted_by`, `doc_copy`, `out_released_to`, `logbook_page`, `route_accomplished`, `end_remarks`, `def_reason`, `def_datetime`, `duplicate`, `del_reason`, `updatedby_id`, `active`) VALUES
(2668, 1136, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'APp', '', '2021-08-07 22:29:30', '2021-08-07 22:48:52', 144, 'Receiver', '', '2021-08-07 22:49:28', 'fhgfghh', 144, '', 1, 'Mpolokeng Mphee', '1', 3, 'Released to Mpolokeng Mphee. Refer to logbook page : 1', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2669, 1137, 0, 0, 'Khumo', 1, 'GUEST', 3, 'Receiving Office', 0, 'Approve', '', '2021-08-07 22:19:53', '2021-08-07 22:43:52', 144, 'Receiver', '', '2021-08-07 22:44:37', 'sssd', 144, '', 1, 'Mpolokeng Mphee', '1', 3, 'Released to Mpolokeng Mphee. Refer to logbook page : 1', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2670, 1138, 0, 0, 'Khumo M', 1, 'GUEST', 3, 'Receiving Office', 0, 'fdfdf', '', '2021-08-07 22:22:12', '2021-08-07 22:46:24', 144, 'Receiver', '', '2021-08-07 22:48:07', 'Sign', 144, '', 1, 'Khumo M Moilabi', '1', 3, 'Released to Khumo M Moilabi. Refer to logbook page : 1', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2671, 1139, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 04:50:17', '2021-09-14 18:00:26', 144, 'Receiver', 'atest', '2021-09-14 18:01:04', 'ddsa', 144, '', 1, 'sads', '1', 3, 'Released to sads. Refer to logbook page : 1', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2672, 1140, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:35:48', '2021-09-15 05:05:43', 144, 'Receiver', 'test', '2021-09-15 05:06:20', 'assfd', 144, 'Receiver', 0, '', '', 1, 'Forwarded to IT Unit', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2673, 1141, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', 'testte', '2021-09-16 04:04:10', '2021-09-16 04:23:32', 144, 'Receiver', 'test remarks', '2021-09-17 06:43:47', 'Deferred', 144, 'Receiver', 0, '', '', 4, 'Deferred ', 'defferred test.', '2021-09-17 06:43:47', 0, '', 0, 1),
(2674, 1142, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:37:00', '2021-09-17 07:34:36', 144, 'Receiver', 'this is test one.', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2675, 1143, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:37:27', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2676, 1144, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:37:41', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2677, 1145, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:38:26', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2678, 1146, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:38:34', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2679, 1147, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:39:08', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2680, 1148, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:40:30', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2681, 1149, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:43:01', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2682, 1150, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:43:40', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2683, 1151, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:44:12', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2684, 1152, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', 'test', '2021-09-14 17:58:04', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2685, 1153, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'test', '', '2021-09-13 06:46:25', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2686, 1154, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'kjkljkl', '', '2021-09-14 18:03:09', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2687, 1155, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'asdf', 'asdf', '2021-09-14 18:31:46', '2021-09-17 07:54:05', 144, 'Receiver', 'receiving remarks', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2688, 1140, 2672, 144, 'Receiver', 3, 'Receiving Office', 2, 'IT Unit', 1, 'test', 'fafds', '2021-09-15 05:06:20', '2021-09-15 05:12:24', 1, 'Administrator', 'kjk', '2021-09-15 05:12:47', 'jkk', 1, '', 0, 'jkjk', '1', 3, 'Released to jkjk. Refer to logbook page : 1', '', '0000-00-00 00:00:00', 0, '', 0, 1),
(2689, 1156, 0, 1, 'Administrator', 2, 'IT Unit', 3, 'Receiving Office', 0, 'purpose', 'iop', '2021-09-16 08:47:36', '0000-00-00 00:00:00', 0, '', '', '0000-00-00 00:00:00', '', 0, '', 0, '', '', 0, '', '', '0000-00-00 00:00:00', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dts_docs`
--

CREATE TABLE `dts_docs` (
  `doc_id` int(11) NOT NULL,
  `doc_tracking` varchar(20) NOT NULL,
  `track_issuedby_userid` int(11) NOT NULL,
  `doc_type_id` int(11) NOT NULL,
  `tempdocs_id` int(11) NOT NULL,
  `docs_description` longtext NOT NULL,
  `origin_fname` varchar(255) NOT NULL,
  `origin_userid` int(11) NOT NULL,
  `origin_school_id` int(11) NOT NULL,
  `origin_school` varchar(255) NOT NULL,
  `origin_section` int(11) NOT NULL,
  `receiving_section` int(11) NOT NULL,
  `actions_needed` varchar(255) NOT NULL,
  `datetime_posted` datetime NOT NULL,
  `datetime_accepted` datetime NOT NULL,
  `acceptedby_userid` int(11) NOT NULL,
  `acct_dvnum` varchar(100) NOT NULL,
  `acct_payee` varchar(150) NOT NULL,
  `acct_particulars` varchar(255) NOT NULL,
  `acct_amount` decimal(11,0) NOT NULL,
  `final_actions_made` longtext NOT NULL,
  `done` int(11) NOT NULL DEFAULT 0,
  `datetime_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedby_id` int(11) NOT NULL,
  `archive_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `deactivate_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dts_docs`
--

INSERT INTO `dts_docs` (`doc_id`, `doc_tracking`, `track_issuedby_userid`, `doc_type_id`, `tempdocs_id`, `docs_description`, `origin_fname`, `origin_userid`, `origin_school_id`, `origin_school`, `origin_section`, `receiving_section`, `actions_needed`, `datetime_posted`, `datetime_accepted`, `acceptedby_userid`, `acct_dvnum`, `acct_payee`, `acct_particulars`, `acct_amount`, `final_actions_made`, `done`, `datetime_updated`, `updatedby_id`, `archive_id`, `active`, `deactivate_reason`) VALUES
(1136, '21-1136', 1, 2, 0, 'APP DOC', 'Administrator', 1, 1, 'Main Office', 2, 3, 'APp', '2021-08-07 22:29:30', '2021-08-07 22:48:52', 144, '', '', '', 0, '', 0, '2021-08-07 20:48:52', 0, 0, 1, ''),
(1137, '21-1137', 144, 2, 933, 'Tender Doc', 'Khumo', 0, 0, 'IT', 1, 3, 'Approve', '2021-08-07 22:19:53', '2021-08-07 22:43:52', 144, '', '', '', 0, '', 0, '2021-08-07 20:43:52', 0, 0, 1, ''),
(1138, '21-1138', 144, 3, 934, 'fffd', 'Khumo M', 0, 0, 'it54', 1, 3, 'fdfdf', '2021-08-07 22:22:12', '2021-08-07 22:46:24', 144, '', '', '', 0, '', 0, '2021-08-07 20:46:24', 0, 0, 1, ''),
(1139, '21-1139', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 04:50:17', '2021-09-14 18:00:26', 144, '', '', '', 0, '', 0, '2021-09-14 16:00:26', 0, 0, 1, ''),
(1140, '21-1140', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:35:48', '2021-09-15 05:05:43', 144, '', '', '', 0, '', 0, '2021-09-15 03:05:43', 0, 0, 1, ''),
(1141, '21-1141', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:36:28', '2021-09-16 04:23:32', 144, '', '', '', 0, '', 0, '2021-09-16 02:23:32', 0, 0, 1, ''),
(1142, '21-1142', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:37:00', '2021-09-17 07:34:36', 144, '', '', '', 0, '', 0, '2021-09-17 05:34:36', 0, 0, 1, ''),
(1143, '21-1143', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:37:27', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-13 04:37:27', 0, 0, 1, ''),
(1144, '21-1144', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:37:41', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-13 04:37:41', 0, 0, 1, ''),
(1145, '21-1145', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:38:26', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-13 04:38:26', 0, 0, 1, ''),
(1146, '21-1146', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:38:34', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-13 04:38:34', 0, 0, 1, ''),
(1147, '21-1147', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:39:08', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-13 04:39:08', 0, 0, 1, ''),
(1148, '21-1148', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:40:30', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-13 04:40:30', 0, 0, 1, ''),
(1149, '21-1149', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:43:01', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-13 04:43:01', 0, 0, 1, ''),
(1150, '21-1150', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:43:40', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-13 04:43:40', 0, 0, 1, ''),
(1151, '21-1151', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:44:12', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-13 04:44:12', 0, 0, 1, ''),
(1152, '21-1152', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:44:29', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-13 04:44:29', 0, 0, 1, ''),
(1153, '21-1153', 1, 3, 0, 'testtest', 'Administrator', 1, 1, 'Main Office', 2, 3, 'test', '2021-09-13 06:46:25', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-13 04:46:25', 0, 0, 1, ''),
(1154, '21-1154', 1, 1, 0, 'mnm,n', 'Administrator', 1, 1, 'Main Office', 2, 3, 'kjkljkl', '2021-09-14 18:03:09', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-14 16:03:09', 0, 0, 1, ''),
(1155, '21-1155', 1, 2, 0, 'sfsdf', 'Administrator', 1, 1, 'Main Office', 2, 3, 'asdf', '2021-09-14 18:19:58', '2021-09-17 07:54:05', 144, '', '', '', 0, '', 0, '2021-09-17 05:54:05', 0, 0, 1, ''),
(1156, '21-1156', 1, 4, 0, 'details', 'Administrator', 1, 1, 'Main Office', 2, 3, 'purpose', '2021-09-16 08:16:08', '0000-00-00 00:00:00', 0, '', '', '', 0, '', 0, '2021-09-16 06:16:09', 0, 0, 1, '');

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
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route_purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `master_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personnel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_taken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keeped` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `keeping_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deferred` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deferred_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deferred_date` datetime NOT NULL DEFAULT current_timestamp(),
  `keep_copy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `accepted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `accepted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `released` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `release_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_b_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiving_remarks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fwd_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `cancel_reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requestedFile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `aprovedReq` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rqUser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `from`, `reference_no`, `office_name`, `category`, `classification`, `file_description`, `volume_no`, `route_purpose`, `master_name`, `personnel`, `action_taken`, `keeped`, `keeping_reason`, `deferred`, `deferred_reason`, `deferred_date`, `keep_copy`, `accepted`, `accepted_by`, `released`, `release_reason`, `release_to`, `log_b_no`, `receiving_remarks`, `fwd_reason`, `cancelled`, `cancel_reason`, `requestedFile`, `aprovedReq`, `rqUser`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(7, 'Test1', 'RMU', 'MFD-3', 'UK', 'Communication (Letters , Etc)', 'Private', 'this is test details', 'this is test purpose.', 'fwd to super test.', 'Administration MGT', 'RMU', NULL, '0', NULL, '0', NULL, '2021-09-20 02:08:40', '0', '1', 'RMU', '0', NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', '1', 'actionofficer', '2021-09-15 13:54:55', '2021-10-12 08:29:47', 'Admin', NULL, '2021-10-12 08:29:47'),
(8, 'Test2', 'Admin', 'MFD-4', 'UK', 'Communication (Letters , Etc)', 'Public', 'This is an other details.', 'This is an other purpose.', 'action purpose', 'Estate and Property MGT', 'RMU', NULL, '0', NULL, '0', NULL, '2021-09-20 02:08:40', '0', '1', 'RMU', '0', NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', '1', 'actionofficer', '2021-09-15 13:57:25', '2021-10-12 08:30:14', 'Admin', 'Admin', '2021-10-12 08:30:14'),
(10, 'Test4', 'Super', 'MFD-5', NULL, 'Reports', 'Public', 'this is test edit.', 'Vol11', NULL, 'Estate and Property MGT', NULL, NULL, '0', NULL, '0', NULL, '2021-09-24 12:55:20', '0', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', '1', NULL, '2021-09-24 02:55:20', '2021-10-11 06:20:07', 'Super', 'Super', NULL),
(11, 'HR- Applications', NULL, 'MFD-4', NULL, 'Application Document', 'Public', 'Applications File', '2', NULL, 'Administration MGT', NULL, NULL, '0', NULL, '0', NULL, '2021-10-12 12:29:19', '0', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', NULL, '1', '0', NULL, '2021-10-12 08:29:19', '2021-10-12 10:28:08', 'Super', NULL, NULL),
(12, 'Tenders', NULL, 'MFD-5', NULL, 'Communication (Letters , Etc)', 'Public', 'Tenders', '2', NULL, 'Administration MGT', NULL, NULL, '0', NULL, '0', NULL, '2021-10-12 14:32:19', '0', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', '1', NULL, '2021-10-12 10:32:19', '2021-10-12 10:34:37', 'Super', NULL, NULL),
(13, 'Tenders-file', NULL, 'MFD-6', NULL, 'Communication (Letters , Etc)', 'Public', 'Tenders-file', '2', NULL, 'Administration MGT', NULL, NULL, '0', NULL, '0', NULL, '2021-10-28 09:07:43', '0', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', NULL, '1', '0', NULL, '2021-10-28 05:07:43', '2021-10-29 11:49:50', 'Super', NULL, NULL),
(14, 'HR- Applications', NULL, 'MFD-7', NULL, 'Reports', 'Private', 'Applicants', '3', NULL, 'Administration MGT', NULL, NULL, '0', NULL, '0', NULL, '2021-11-08 13:02:23', '0', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', '0', NULL, '2021-11-08 11:02:23', '2021-11-08 11:02:23', 'Super', NULL, NULL),
(15, 'SSSB', NULL, 'MFD-8', NULL, 'Reports', 'Private', 'SSBB Flle', '3', NULL, 'Estate and Property MGT', NULL, NULL, '0', NULL, '0', NULL, '2021-11-20 16:16:37', '0', '0', NULL, '0', NULL, NULL, NULL, NULL, NULL, '0', NULL, '0', '1', NULL, '2021-11-20 14:16:37', '2021-11-20 14:20:26', 'Super', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gender_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `gender_code`, `gender_name`, `gender_status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'M', 'Male', 1, '2021-09-14 17:11:48', '2021-09-14 17:11:48', 'Admin', NULL, NULL),
(2, 'F', 'Female', 1, '2021-09-14 17:12:05', '2021-09-14 17:12:05', 'Admin', NULL, NULL),
(3, 'O', 'Other', 1, '2021-09-14 17:12:22', '2021-09-14 17:12:22', 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `login_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`id`, `master_code`, `master_name`, `master_status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'm1', 'Administration MGT', 1, '2021-09-24 02:22:02', '2021-09-24 02:22:02', 'Super', NULL, NULL),
(2, 'm2', 'Estate and Property MGT', 1, '2021-09-24 02:22:45', '2021-09-24 02:22:45', 'Super', NULL, NULL);

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
(6, '2021_02_08_001153_create_permission_tables', 1),
(12, '2021_03_28_225156_create_companies_table', 1),
(13, '2021_03_29_065057_create_services_table', 1),
(16, '2021_03_29_084909_create_titles_table', 1),
(17, '2021_03_30_184859_create_currencies_table', 1),
(22, '2021_04_03_144042_create_locations_table', 1),
(23, '2021_04_03_174510_create_instructions_table', 1),
(26, '2021_04_09_110918_create_accountserials_table', 1),
(30, '2014_10_11_000000_create_accounts_table', 2),
(32, '2014_10_12_000000_create_users_table', 3),
(45, '2021_03_28_225153_create_countries_table', 7),
(46, '2021_03_28_225154_create_states_table', 7),
(47, '2021_03_28_225155_create_cities_table', 7),
(51, '2020_09_26_133340_create_activities_table', 8),
(52, '2021_02_08_002238_create_activity_log_table', 8),
(53, '2021_09_03_024052_create_files_table', 9),
(54, '2021_09_03_040025_create_categories_table', 9),
(55, '2021_09_03_045959_create_classifications_table', 9),
(56, '2021_09_04_144827_create_departments_table', 10),
(57, '2021_09_04_144932_create_sections_table', 10),
(58, '2021_09_04_144942_create_buildings_table', 10),
(60, '2021_09_05_022858_create_logins_table', 10),
(61, '2021_09_14_023117_create_personnels_table', 11),
(62, '2021_09_14_023426_create_genders_table', 12),
(63, '2021_09_14_023357_create_offices_table', 13),
(64, '2021_09_23_131047_create_masters_table', 14);

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
(5, 'App\\User', 10),
(5, 'App\\User', 11),
(5, 'App\\User', 12),
(5, 'App\\User', 13),
(5, 'App\\User', 15),
(5, 'App\\User', 18),
(5, 'App\\User', 19),
(5, 'App\\User', 20),
(10, 'App\\User', 2),
(10, 'App\\User', 7),
(10, 'App\\User', 8),
(10, 'App\\User', 9),
(10, 'App\\User', 14),
(10, 'App\\User', 16),
(10, 'App\\User', 17),
(5, 'App\\User', 6),
(1, 'App\\User', 8),
(1, 'App\\User', 9),
(2, 'App\\User', 10),
(1, 'App\\User', 11),
(5, 'App\\User', 5),
(2, 'App\\User', 4),
(10, 'App\\User', 3),
(1, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE `offices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `office_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `office_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `office_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`id`, `office_code`, `office_name`, `building_name`, `office_status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'H1', 'HEAD OFFICE', 'TEST BUILDING', 1, '2021-09-14 13:30:43', '2021-09-14 13:30:43', 'Admin', NULL, NULL),
(2, 'of2', 'UK', 'TEST BUILDING', 1, '2021-09-15 12:15:55', '2021-09-15 12:15:55', 'Admin', NULL, NULL),
(3, 'Off222', 'Test Branch Office', 'TEST BUILDING', 1, '2021-10-07 07:44:54', '2021-10-07 08:05:27', 'Super', NULL, NULL);

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
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'web',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SuperUser-list', 'web', NULL, '2021-04-09 10:55:51', '2021-04-09 10:55:51'),
(2, 'SuperUser-create', 'web', NULL, '2021-04-09 10:55:51', '2021-04-09 10:55:51'),
(3, 'SuperUser-edit', 'web', NULL, '2021-04-09 10:55:52', '2021-04-09 10:55:52'),
(4, 'SuperUser-upload', 'web', NULL, '2021-04-09 10:55:52', '2021-04-09 10:55:52'),
(5, 'SuperUser-download', 'web', NULL, '2021-04-09 10:55:52', '2021-04-09 10:55:52'),
(6, 'SuperUser-export', 'web', NULL, '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(7, 'SuperUser-show-deleted', 'web', NULL, '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(8, 'SuperUser-restore', 'web', NULL, '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(9, 'SuperUser-delete', 'web', NULL, '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(10, 'SuperUser-perm-delete', 'web', NULL, '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(11, 'SuperAdmin-list', 'web', NULL, '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(12, 'SuperAdmin-create', 'web', NULL, '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(13, 'SuperAdmin-edit', 'web', NULL, '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(14, 'SuperAdmin-upload', 'web', NULL, '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(15, 'SuperAdmin-download', 'web', NULL, '2021-04-09 10:55:53', '2021-04-09 10:55:53'),
(16, 'SuperAdmin-export', 'web', NULL, '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(17, 'SuperAdmin-show-deleted', 'web', NULL, '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(18, 'SuperAdmin-restore', 'web', NULL, '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(19, 'SuperAdmin-delete', 'web', NULL, '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(20, 'SuperAdmin-perm-delete', 'web', NULL, '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(21, 'ActionOfficer-list', 'web', NULL, '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(22, 'ActionOfficer-create', 'web', NULL, '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(23, 'ActionOfficer-edit', 'web', NULL, '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(24, 'ActionOfficer-upload', 'web', NULL, '2021-04-09 10:55:54', '2021-04-09 10:55:54'),
(25, 'ActionOfficer-download', 'web', NULL, '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(26, 'ActionOfficer-export', 'web', NULL, '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(27, 'ActionOfficer-show-deleted', 'web', NULL, '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(28, 'ActionOfficer-restore', 'web', NULL, '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(29, 'ActionOfficer-delete', 'web', NULL, '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(30, 'ActionOfficer-perm-delete', 'web', NULL, '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(31, 'RMU-list', 'web', NULL, '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(32, 'RMU-create', 'web', NULL, '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(33, 'RMU-edit', 'web', NULL, '2021-04-09 10:55:55', '2021-04-09 10:55:55'),
(34, 'RMU-upload', 'web', NULL, '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(35, 'RMU-download', 'web', NULL, '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(36, 'RMU-export', 'web', NULL, '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(37, 'RMU-show-deleted', 'web', NULL, '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(38, 'RMU-restore', 'web', NULL, '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(39, 'RMU-delete', 'web', NULL, '2021-04-09 10:55:56', '2021-04-09 10:55:56'),
(40, 'RMU-perm-delete', 'web', NULL, '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(41, 'RMU-list', 'web', NULL, '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(42, 'RMU-create', 'web', NULL, '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(43, 'RMU-edit', 'web', NULL, '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(44, 'RMU-upload', 'web', NULL, '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(45, 'RMU-download', 'web', NULL, '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(46, 'RMU-export', 'web', NULL, '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(47, 'RMU-show-deleted', 'web', NULL, '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(48, 'RMU-restore', 'web', NULL, '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(49, 'RMU-delete', 'web', NULL, '2021-04-09 10:55:57', '2021-04-09 10:55:57'),
(50, 'RMU-perm-delete', 'web', NULL, '2021-04-09 10:55:58', '2021-04-09 10:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `personnels`
--

CREATE TABLE `personnels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personnel_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personnel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personnel_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'SuperUser', 'web', '2021-04-09 10:56:05', '2021-04-09 10:56:05'),
(2, 'SuperAdmin', 'web', '2021-04-09 10:56:08', '2021-04-09 10:56:08'),
(5, 'ActionOfficer', 'web', '2021-04-09 10:56:15', '2021-04-09 10:56:15'),
(10, 'RMU', 'web', '2021-04-09 10:56:25', '2021-04-09 10:56:25');

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
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
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
(31, 1),
(31, 5),
(31, 10),
(32, 10),
(33, 10),
(34, 10),
(35, 10),
(36, 10),
(37, 10),
(38, 10),
(39, 10),
(40, 10),
(41, 10),
(42, 10),
(43, 10),
(44, 10),
(45, 10),
(46, 10),
(47, 10),
(48, 10),
(49, 10),
(50, 10),
(105, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `deleted_at`) VALUES
(1, 'test sections', '2021-09-06 21:09:18', '2021-09-06 21:09:18', 'Super', NULL, NULL),
(2, 'Section2', '2021-09-15 12:17:37', '2021-09-15 12:17:37', 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'mem_avatar.jpg',
  `office_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `accounts_number`, `reference_no`, `email`, `username`, `fname`, `lname`, `gender`, `contact_no`, `designation`, `email_verified_at`, `password`, `profile_pic`, `office_name`, `section_name`, `user_status`, `accounts_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, '10001', NULL, 'superuser@abc.com', 'superuser', 'Super', 'User', 'Male', '03000000000', NULL, '2021-04-12 11:23:43', '$2y$10$KM/4Q53.TKAAiDngtvnNnu1MwnYOGKluWGqwf7myQslaQyQKWIU4C', 'mem_avatar.jpg', 'UK', 'test sections', 1, '1', 'Bceq8IKpygvM7KxmzXKkoSw5jKuYvjIuxhY5TmJUQ59GDH7HW1qXrZEqfxNt', '2021-04-12 06:23:00', '2021-09-15 12:21:07', NULL, NULL, 'Admin', NULL),
(3, '10001', NULL, 'rmu@abc.com', 'rmuuser', 'RMU', 'user', 'Male', '03000000000', NULL, '2021-09-10 15:41:15', '$2y$10$8QaGfwfoZ6L3OcbF0IYgiOG2RqMPfu69dmfNm/aYFfqootGhkgEtO', 'mem_avatar.jpg', 'HEAD OFFICE', 'Section2', 1, '1', 'FTFrcipaYdtrTpy1fpEJY1oE5OlQZSNbU5LFDqNRBP3w0FZqHFmfeY7oEYrn', '2021-09-03 22:35:54', '2021-09-15 12:20:34', NULL, 'Web Registration', 'Admin', NULL),
(4, '10001', NULL, 'admin@abc.com', 'adminuser', 'Admin', 'User', 'Male', '03000000000', NULL, NULL, '$2y$10$.5lBWaqQUdLXqk7rCMvbJeAAScMG8QBAJt1Ll1eR7VdwpTSukEg/y', 'mem_avatar.jpg', 'UK', 'Section2', 1, NULL, 'MVMzu68VuPGURFgws3jPs5Zc97P6KxwB15tUsXqhkRPyrqspHv4BPhQo84Hc', '2021-09-04 14:11:01', '2021-09-15 12:18:09', NULL, 'Super', 'Admin', NULL),
(5, '10001', NULL, 'actionofficer@abc.com', 'actionofficer', 'Action', 'Officer', 'Male', '03000000000', NULL, NULL, '$2y$10$FIJ0VbGkDju3l7JJXw/PAeJas65z660p5vrJ9tYWw3fwseTOc0yTW', 'mem_avatar.jpg', 'HEAD OFFICE', 'test sections', 1, NULL, 'qUJVZIOZQJ8paBz4r7wqLq6zuGpBKrQagTcapCoGsnG1PceDOFwEsb1hPCWZ', '2021-09-04 14:13:22', '2021-09-14 21:10:18', NULL, 'Super', 'Admin', NULL),
(12, NULL, NULL, 'mmphee@gov.bw', 'mmphee', 'Mpolokeng', 'Mphee', 'Male', '77089676', NULL, NULL, '$2y$10$9S3rL4iOpUwBR4mYCk6j9O8NEeBdFrVsFOTjpMaiV9jCB4I67.MCS', 'mem_avatar.jpg', 'HEAD OFFICE', 'test sections', 1, NULL, 'Gq8OG130ihBm2JZlX0HZgqGTjwwUqkTPWXSGNIeDIRp5ug0JgE3w4DFjZJQu', '2021-10-28 04:22:16', '2021-10-28 04:22:16', NULL, 'Super', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dts_docroutes`
--
ALTER TABLE `dts_docroutes`
  ADD PRIMARY KEY (`action_id`);

--
-- Indexes for table `dts_docs`
--
ALTER TABLE `dts_docs`
  ADD PRIMARY KEY (`doc_id`),
  ADD UNIQUE KEY `doc_tracking` (`doc_tracking`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=872;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dts_docroutes`
--
ALTER TABLE `dts_docroutes`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2690;

--
-- AUTO_INCREMENT for table `dts_docs`
--
ALTER TABLE `dts_docs`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1157;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masters`
--
ALTER TABLE `masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
