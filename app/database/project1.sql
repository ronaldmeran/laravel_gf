-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2014 at 10:01 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project1_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_assign_modules`
--

CREATE TABLE IF NOT EXISTS `app_assign_modules` (
`id` int(10) unsigned NOT NULL,
  `module_id` int(11) NOT NULL,
  `role_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `app_assign_modules`
--

INSERT INTO `app_assign_modules` (`id`, `module_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'a:2:{i:0;s:1:"1";i:1;s:1:"4";}', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'a:2:{i:0;s:1:"1";i:1;s:1:"3";}', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 4, 'a:2:{i:0;s:1:"1";i:1;s:1:"3";}', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 5, 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 3, 'a:2:{i:0;s:1:"1";i:1;s:1:"4";}', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `app_modules`
--

CREATE TABLE IF NOT EXISTS `app_modules` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `module_order` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `model_file` text COLLATE utf8_unicode_ci NOT NULL,
  `view_file` text COLLATE utf8_unicode_ci NOT NULL,
  `controller_file` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `app_modules`
--

INSERT INTO `app_modules` (`id`, `name`, `url`, `parent_id`, `module_order`, `is_active`, `model_file`, `view_file`, `controller_file`, `created_at`, `updated_at`) VALUES
(1, 'Setup', '', 0, 2, 1, '', '', '', '2014-10-28 18:42:58', '2014-10-28 18:42:58'),
(2, 'Manage User', 'admin/manage_user', 1, 1, 1, 'User.php', 'admin\\manage_user\\index.blade.php', 'UserController.php', '2014-10-28 18:42:58', '2014-10-28 18:42:58'),
(3, 'Manage Roles', 'admin/manage_roles', 1, 5, 1, 'Roles.php', 'admin\\manage_roles\\index.blade.php', 'app\\controllers\\RolesController.php', '2014-10-28 18:42:58', '2014-10-28 18:42:58'),
(4, 'Manage Modules', 'admin/manage_modules', 1, 3, 1, 'Modules.php', 'admin\\manage_modules\\index.blade.php', 'ModulesController.php', '2014-10-28 18:42:58', '2014-10-28 18:42:58'),
(5, 'Generate Reports', 'admin/generate_report', 1, 4, 1, 'GenerateReport.php', 'admin\\generate_report\\index.blade.php', 'GenerateReportController.php', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Add Reports', '/admin/generate/create', 5, 3, 1, 'GenerateReport.php', 'admin\\generate_report\\create_report.blade.php', 'GenerateReportController.php', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'View Reports', '/admin/generate/edit', 5, 1, 1, 'GenerateReport.php', 'admin\\generate_report\\view_reports.blade.php', 'GenerateReportController.php', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Edit Reports', '/admin/generate/view', 5, 2, 1, 'GenerateReport.php', 'admin\\generate_report\\edit_reports.blade.php', 'GenerateReportController.php', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'test', '/admin/generate/test', 0, 0, 0, 'GenerateReport.php', 'admin\\generate_report\\test.blade.php', 'GenerateReportController.php', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `app_roles`
--

CREATE TABLE IF NOT EXISTS `app_roles` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `app_roles`
--

INSERT INTO `app_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', '2014-10-28 18:42:58', '2014-10-29 01:07:44'),
(2, 'admin', '2014-10-28 18:42:58', '2014-10-28 18:42:58'),
(3, 'user', '2014-10-29 00:47:25', '2014-10-30 22:01:54'),
(4, 'sales', '2014-10-29 01:05:36', '2014-10-29 01:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE IF NOT EXISTS `app_users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'dreamon@yondu.com', '$2y$10$MD2GtLbQ0crMz00Cb32eluxh24LMysRio4H8.OI97P7p7kbK4JV6W', 'System', 'Administrator', 1, 'wgNSF6Rx4TiVumvuqVxQUkxm5KXfhhhkji7S553ITJKKjZiv2DL04dJxqcSH', '2014-11-02 16:29:58', '2014-11-03 17:17:58'),
(2, 'apogi', 'apogi@yondu.com', '$2y$10$TkxPkTtkBlbkDjU3Ha7oSeTr8gDjYL7PV0TjqOaE60yZCtOb6SyYq', 'allan', 'pogi', 0, 'iMDx6s2E2niNJj3ztIjqbepCK0iK9RTkLkCeuawcrAHvJjVEIxu2gRU1PuCv', '0000-00-00 00:00:00', '2014-11-03 18:51:14'),
(3, 'dreamon', 'dreamon@yondu.com', '$2y$10$OOP1w5Bjr2DWb.pkc4WThOPG.4H.J7kZdw3GM5UQNODkJyDNauwj2', 'philip', 'reamon', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'test', 'test@yondu.com', '$2y$10$RNrfJ9Q57kXKlEHcMxELb.caC7/Bg20B/QsqIP7d.aNcc1tcRraye', 'test', 'test', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'test1', 'test1@yondu.com', '$2y$10$/dgoBGYLLDt.qqWwSd8LiO7Ojby8jEJvrZjZjvJtz1t4EwYfgmGjK', 'adria', 'adra', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'rage', 'rag@yondu.com', '$2y$10$AHrVbaCLPZI6i4LkRpolhevRFiGvKLJtLblBrm9M9SXOgE/xkGCya', 'rag', 'rag', 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `app_user_roles`
--

CREATE TABLE IF NOT EXISTS `app_user_roles` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `app_user_roles`
--

INSERT INTO `app_user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 6, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_23_021552_create_app_menus', 1),
('2014_10_23_021603_create_app_modules', 1),
('2014_10_23_021618_create_app_roles', 1),
('2014_10_23_070844_create_app_user_roles', 1),
('2014_10_29_055855_create_app_assign_modules', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_assign_modules`
--
ALTER TABLE `app_assign_modules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_modules`
--
ALTER TABLE `app_modules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_roles`
--
ALTER TABLE `app_roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_user_roles`
--
ALTER TABLE `app_user_roles`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_assign_modules`
--
ALTER TABLE `app_assign_modules`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `app_modules`
--
ALTER TABLE `app_modules`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `app_roles`
--
ALTER TABLE `app_roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `app_user_roles`
--
ALTER TABLE `app_user_roles`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;