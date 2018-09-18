-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2018 at 12:22 PM
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
-- Database: `ndtt`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `description`, `image_url`, `userId`, `type`, `content`, `status`, `created_at`, `updated_at`) VALUES
(2, 'sdas', 'ádasd', 'C:\\xampp\\tmp\\php1197.tmp', 18, '1', '<p>&aacute;dasd</p>', 1, '2018-09-15 07:34:02', '2018-09-15 07:34:02'),
(3, 'nguyen phuoc loi', 'hihi', 'C:\\xampp\\tmp\\php170C.tmp', 18, '1', '<p>sadasd</p>', 1, '2018-09-15 07:43:53', '2018-09-15 07:43:53'),
(4, 'nguyen phuoc loi', 'ádf', 'C:\\xampp\\tmp\\phpFBA7.tmp', 18, '1', '<p>dfgsdf</p>', 1, '2018-09-15 07:50:20', '2018-09-15 07:50:20'),
(5, 'nguyen phuoc loi', 'sdasdasd', 'C:\\xampp\\tmp\\php31BF.tmp', 18, '1', '<p>&aacute;dasdas</p>', 1, '2018-09-15 08:00:23', '2018-09-15 08:00:23'),
(6, 'nguyen phuoc loi', 'dsfsdfsd', 'C:\\xampp\\tmp\\php39E2.tmp', 18, '1', '<p>dsfdfsd</p>', 1, '2018-09-15 08:03:42', '2018-09-15 08:03:42'),
(7, 'dfsd', 'df', 'C:\\xampp\\tmp\\phpE98F.tmp', 18, '1', '<p>dfsdf</p>', 1, '2018-09-15 08:07:44', '2018-09-15 08:07:44'),
(8, 'nguyen phuoc loi', 'sdas', 'C:\\xampp\\tmp\\phpC8A2.tmp', 18, '2', '<p>sdas</p>', 1, '2018-09-15 08:09:46', '2018-09-15 08:09:46'),
(9, 'đá', 'ádas', 'C:\\xampp\\tmp\\phpC823.tmp', 18, '1', '<p>&aacute;dasd</p>', 1, '2018-09-15 08:10:52', '2018-09-15 08:10:52'),
(10, 'sdas', 'ádas', 'C:\\xampp\\tmp\\php5716.tmp', 18, '1', '<p>&aacute;dasd</p>', 1, '2018-09-15 08:11:28', '2018-09-15 08:11:28'),
(12, 'nguyen phuoc loi', 'sads ádasd', 'C:\\xampp\\tmp\\phpF732.tmp', 18, '1', '<p>&aacute;dasdasdas</p>', 1, '2018-09-15 08:19:48', '2018-09-15 08:19:48'),
(13, 'nguyen phuoc loi', 'sad ádas', 'C:\\xampp\\tmp\\php4B2C.tmp', 18, '1', '<p>&aacute;dasdas</p>', 1, '2018-09-15 08:21:15', '2018-09-15 08:21:15'),
(14, 'dfsdf', 'sdfsdf', '1537005687Model.png', 18, '1', '<p>dfsdfs</p>', 1, '2018-09-15 10:01:27', '2018-09-15 10:01:27'),
(15, 'dassss', 'ádas', '1537005738Model.png', 18, '1', '<p>đ&acirc;sasas</p>', 1, '2018-09-15 10:02:18', '2018-09-15 10:02:18'),
(16, 'nguyen phuoc loi', 'Demo', '1537061516Model.png', 18, '1', '<p>sssssss</p>', 1, '2018-09-16 01:31:56', '2018-09-16 01:31:56'),
(17, 'nguyen phuoc loi', 'Trinh dan', '1537061643BG.jpg', 18, '1', '<p>ddd</p>', 1, '2018-09-16 01:34:03', '2018-09-16 01:34:03'),
(18, 'nguyen phuoc loi', 'dđ', '1537062446page3-profile.png', 18, '1', '<p>ddd</p>', 1, '2018-09-16 01:47:26', '2018-09-16 01:47:26'),
(19, 'Tiêu đề bài viết', 'Trích dẫn bài viết', '1537063224bg-page-phanthiet.jpg', 18, '1', '<p>Nộ dung</p>', 1, '2018-09-16 02:00:24', '2018-09-16 02:00:24'),
(22, 'sdasd', 'áda', '1537066919page3-profile.png', 18, '1', '<p>&aacute;dasd</p>', 1, '2018-09-16 03:01:59', '2018-09-16 03:01:59'),
(23, 'sdasd', 'áda', '1537068274page3-profile.png', 18, '1', '<p>&aacute;dasd</p>', 1, '2018-09-16 03:24:34', '2018-09-16 03:24:34'),
(24, 'Demo', 'Trich dẫn', '1537069203Model.png', 18, '1', '<p>demo</p>', 1, '2018-09-16 03:40:03', '2018-09-16 03:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `album_image`
--

CREATE TABLE `album_image` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `album_image`
--

INSERT INTO `album_image` (`id`, `post_id`, `image_url`, `status`, `created_at`, `updated_at`, `title`) VALUES
(2, 19, '15370632251537063225.page3-profile.png', 1, '2018-09-16 02:00:25', '2018-09-16 02:00:25', 'Hình ảnh số 2'),
(3, 19, '15370632251537063225.Model.png', 1, '2018-09-16 02:00:25', '2018-09-16 02:00:25', 'Hình ảnh số 4'),
(10, 22, '1537066919Model.png', 1, '2018-09-16 03:02:00', '2018-09-16 03:02:00', 'áda'),
(11, 22, '1537066920page3-profile.png', 1, '2018-09-16 03:02:00', '2018-09-16 03:02:00', 'ádas'),
(12, 23, '1537068275Model.png', 1, '2018-09-16 03:24:35', '2018-09-16 03:24:35', 'áda'),
(13, 23, '1537068275page3-profile.png', 1, '2018-09-16 03:24:35', '2018-09-16 03:24:35', 'ádas');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(10) UNSIGNED ZEROFILL NOT NULL DEFAULT '0000000001',
  `phone` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `address`, `created_at`, `updated_at`, `status`, `phone`, `note`, `alias`) VALUES
(2, 'nguyen phuoc loi', 'ádas', '2018-09-11 02:07:57', '2018-09-12 00:17:28', 0000000001, '954514545154', NULL, NULL),
(3, 'Chi nhánh phan thiết', '72 trần hưng đạo', '2018-09-11 21:19:58', '2018-09-11 21:19:58', 0000000001, '09271778312', NULL, NULL),
(4, 'nguyen phuoc loi333', NULL, '2018-09-11 21:23:03', '2018-09-12 18:33:08', 0000000001, '0955555555', 'dfsdf', NULL),
(5, 'http://127.0.0.1:8000/users/create', 'sdas', '2018-09-12 01:03:55', '2018-09-12 01:03:55', 0000000001, '333333333333', 'sdasd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_key` varchar(255) DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `secret_key` varchar(255) DEFAULT NULL,
  `source_id` int(10) DEFAULT NULL,
  `status` int(10) UNSIGNED ZEROFILL NOT NULL DEFAULT '0000000001',
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified` tinyint(10) DEFAULT NULL,
  `email_verify_sent_at` timestamp NULL DEFAULT NULL,
  `group` varchar(100) DEFAULT NULL,
  `levelid` int(10) DEFAULT NULL,
  `room` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(3, 'nguyenphuocloi24@gmail.com', '$2y$10$oFhaJwjM1q.AbVp6uc..Qe0nMvdCU6qVlBQbhZ1mwZz6kvYYcqTKy', '2018-09-07 21:18:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `branchid` int(10) NOT NULL,
  `status` int(10) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `note`, `branchid`, `status`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'SEO', 'kinh doanh', 3, 1, '2018-09-12 00:59:37', '2018-09-12 00:59:37', '0927178754'),
(2, 'nguyen phuoc loi', 'sdasd', 4, 1, '2018-09-12 01:03:07', '2018-09-12 01:03:07', '0955555555'),
(3, 'nguyen phuoc loi433', 'ádasda', 4, 1, '2018-09-12 01:05:07', '2018-09-12 01:05:07', '0955555555');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider_user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `token`) VALUES
(18, 'nguyen phuoc loi', 'nguyenphuocloi24@gmail.com', NULL, '$2y$10$3IkUQtImNJeXt5diwJFriecITax4QTUhsmqBdvKQ8okV.ZqsYTQL2', 'jWxapnlb5KW3NeHbcgIUFiy5F6hCPwYSdjmR9uEeMVvcP4zPWh34HX3UX1tQ', '2018-09-07 21:06:18', '2018-09-07 21:06:18', NULL),
(19, 'nguyen phuoc loi', 'nguyenphuocloi24333@gmail.com', NULL, '$2y$10$yGkextcujufed8muLJXUAOXRf5gctm1ATOO80ZrmWsrUVaqCHU5bG', 'qfjLHGPWE2fwzZYXQVyZSSPZmAWkEKh1G94CyX2Hf1wtFAJYZeRf01HLD0Oe', '2018-09-08 01:53:24', '2018-09-08 01:53:24', NULL),
(20, 'ssssssssssssssss', 'nguyenphuocloi224@gmail.com', NULL, '$2y$10$dGo1QgbTlisXME5pKhAPV.SGYDJcfD4k51ubULoQYIIddh9GbHVmu', 'OWoQt7eq90oJs2l3JbUtJ39rq5mKEqrYaLMFy3pqjCdPSAHjHWIDr3jDqzFt', '2018-09-08 01:53:46', '2018-09-08 01:53:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(10) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `content` text,
  `url_video` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `description`, `status`, `created_at`, `updated_at`, `type`, `userId`, `content`, `url_video`, `img_url`) VALUES
(2, 'asdasdas', 'sad a', 1, '2018-09-16 04:16:16', '2018-09-16 04:16:16', 3, 18, '<p>asd asd&nbsp;</p>', '1537071375Model.png', NULL),
(3, 'asdasdas', 'sad a', 1, '2018-09-16 04:16:54', '2018-09-16 04:16:54', 3, 18, '<p>asd asd&nbsp;</p>', '1537071414Model.png', NULL),
(4, 'asdasdas', 'sad a', 1, '2018-09-16 04:18:55', '2018-09-16 04:18:55', 3, 18, '<p>asd asd&nbsp;</p>', '1537071535Model.png', NULL),
(5, 'asdasdas loi', 'sad a loi', 1, '2018-09-16 08:08:56', '2018-09-16 08:08:56', 2, 18, '<p>asd asd&nbsp; sadasd loi</p>', 'sdasdasd loi', '1537084340Model.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `album_image`
--
ALTER TABLE `album_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `album_image`
--
ALTER TABLE `album_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
