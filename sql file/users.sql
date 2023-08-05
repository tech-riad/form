-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 12:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` tinyint(4) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `porvider_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `phone`, `email`, `password`, `user_type`, `role`, `image`, `email_verified_at`, `remember_token`, `last_login_at`, `last_login_ip`, `is_active`, `porvider_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'Super', 'Admin', '+123456789', 'a@e.co', '$2y$10$tYUd.2WMDUzCHWOrsy7B1ujqzPmo6VHvblcb7IKxSeKvMu9QdFDfy', 1, 1, 'images/admin/bnfS9qELEc.png', NULL, 'bkbH8vapNCosJodX7DJ5v2TUXasP055Iky5J6BQyYmyK7nJVsO6UDVd7cei0', NULL, NULL, 1, NULL, '2020-12-13 14:35:51', '2023-05-14 22:20:59', NULL),
(60, 'testb1', NULL, NULL, NULL, 'b1@e.co', '$2y$10$2KCG1r5mPwvQTB3wEptfgu1VRPRZudC0ziCp1P7tamBtwwvJ0Me.W', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-13 16:53:10', '2023-05-14 06:38:43', '2023-05-14 06:38:43'),
(61, 'pnhbd', 'PnH', 'BD', '01873003333', 'it@pnhbd.com', '$2y$10$2aVM.jr5AgQEbtTN1W1k6Ow56uzhItuCdGigpll73DfEuZYeuaV96', 1, 1, 'images/admin/DtLPLnIer0.png', NULL, NULL, NULL, NULL, 1, NULL, '2023-05-14 06:11:08', '2023-05-14 13:31:15', NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
