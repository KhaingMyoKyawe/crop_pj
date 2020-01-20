-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 08:40 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(7, 'rice', '2019-06-21 03:01:35', '2019-06-21 03:28:16'),
(10, 'wheat', '2019-06-21 03:05:55', '2019-06-21 03:05:55'),
(11, 'cotton', '2019-06-21 03:06:12', '2019-06-21 03:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sellerid` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `sellerid`, `userid`, `body`, `created_at`, `updated_at`) VALUES
(10, 11, 17, 'hey hey hey hey', '2019-06-21 03:52:20', '2019-06-21 03:52:20'),
(11, 11, 17, 'hey hey hey hey', '2019-06-21 03:52:21', '2019-06-21 03:52:21'),
(12, 1, 18, 'This is me me', '2019-06-21 04:04:14', '2019-06-21 04:04:14'),
(13, 1, 16, 'sdfghjkl;\'dfghjkl', '2019-06-21 04:12:31', '2019-06-21 04:12:31'),
(14, 1, 17, 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', '2019-06-22 03:18:30', '2019-06-22 03:18:30'),
(15, 1, 17, 'hjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2019-06-22 03:19:04', '2019-06-22 03:19:04'),
(16, 1, 17, 'helloooooooooooooooooooooooooooooooo', '2019-06-22 03:21:44', '2019-06-22 03:21:44'),
(17, 1, 17, '\';kjhgdfghjkl;lkjhg', '2019-06-22 03:22:34', '2019-06-22 03:22:34'),
(18, 1, 17, '\';lkjhgfdkjhgffhjkl', '2019-06-22 03:23:11', '2019-06-22 03:23:11'),
(19, 1, 17, 'what the hell', '2019-06-22 03:30:23', '2019-06-22 03:30:23'),
(20, 1, 17, 'gg par kwar', '2019-06-22 03:30:54', '2019-06-22 03:30:54'),
(21, 1, 17, 'a b c d e f g h kiwi', '2019-06-22 03:35:40', '2019-06-22 03:35:40'),
(22, 1, 17, 'hi show me error', '2019-06-22 03:39:07', '2019-06-22 03:39:07'),
(23, 1, 17, 'thank you for your error', '2019-06-22 03:42:22', '2019-06-22 03:42:22'),
(24, 1, 17, 'i try your error', '2019-06-22 03:44:26', '2019-06-22 03:44:26'),
(25, 1, 17, 'ok i change your message', '2019-06-22 03:45:51', '2019-06-22 03:45:51'),
(26, 1, 17, '\';kjhgdfghjnmjnjjh', '2019-06-22 03:46:30', '2019-06-22 03:46:30'),
(27, 1, 17, 'asggjhgjhoiuuyjf7i', '2019-06-22 03:54:05', '2019-06-22 03:54:05'),
(28, 1, 17, 'dfgfgfhgfghfjhhgfh', '2019-06-22 03:58:31', '2019-06-22 03:58:31'),
(29, 1, 17, 'Hu Hu gsdfasd;ddsfaskljsfl', '2019-06-22 04:01:37', '2019-06-22 04:01:37'),
(30, 1, 17, 'jhhgfdfhghjhhkhkjhhj', '2019-06-22 04:08:24', '2019-06-22 04:08:24'),
(31, 1, 17, 'dsfsfdgfgfghhghg', '2019-06-22 04:12:16', '2019-06-22 04:12:16'),
(32, 12, 17, 'hhhiiiihhhiihi', '2019-06-22 04:17:25', '2019-06-22 04:17:25'),
(33, 12, 17, 'llllllllllllllllllllllllllllllllhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '2019-06-22 04:21:29', '2019-06-22 04:21:29'),
(34, 12, 17, 'ad', '2019-06-22 04:25:24', '2019-06-22 04:25:24'),
(35, 12, 17, 'ab', '2019-06-22 04:25:37', '2019-06-22 04:25:37'),
(36, 12, 17, 'a', '2019-06-22 04:32:40', '2019-06-22 04:32:40'),
(37, 12, 17, 'b', '2019-06-22 04:35:52', '2019-06-22 04:35:52'),
(38, 1, 17, 'h', '2019-06-22 04:36:48', '2019-06-22 04:36:48'),
(39, 1, 18, 'gg', '2019-06-22 04:36:59', '2019-06-22 05:06:15'),
(42, 14, 16, 'nn', '2019-06-22 10:21:53', '2019-06-22 10:21:53'),
(43, 2, 18, 'u than', '2019-06-22 10:22:54', '2019-06-22 10:22:54'),
(44, 2, 18, 'jj', '2019-06-22 10:26:21', '2019-06-22 10:26:21'),
(45, 2, 18, 'vdfgfhcgnhv', '2019-06-22 10:45:36', '2019-06-22 10:45:36'),
(46, 17, 18, 'kkk', '2019-06-22 10:50:24', '2019-06-22 10:50:24'),
(47, 17, 18, 'ma ma aye lwin soe', '2019-06-22 11:08:06', '2019-06-22 11:08:06'),
(48, 17, 18, 'nice to meet you', '2019-06-22 11:17:18', '2019-06-22 11:17:18'),
(49, 17, 18, 'hi good evening', '2019-06-22 11:17:56', '2019-06-22 11:17:56'),
(50, 17, 18, 'aung kyaw soe', '2019-06-22 11:18:27', '2019-06-22 11:18:27'),
(51, 17, 18, 'u than akp and wws', '2019-06-22 11:23:47', '2019-06-22 11:23:47'),
(52, 17, 18, 'sorry for my error', '2019-06-22 11:35:21', '2019-06-22 11:35:21'),
(53, 17, 18, 'sry', '2019-06-22 11:36:14', '2019-06-22 11:36:14'),
(54, 17, 18, 'akp', '2019-06-22 11:42:29', '2019-06-22 11:42:29'),
(55, 17, 18, 'abc', '2019-06-22 12:04:47', '2019-06-22 12:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategoryid` bigint(20) UNSIGNED NOT NULL,
  `categoryid` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minamount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minprice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxamount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxprice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `subcategoryid`, `categoryid`, `userid`, `title`, `minamount`, `minprice`, `maxamount`, `maxprice`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 4, 7, 18, 'AKP and WWS', '100', '500000', '500', '2500000', '/image/စိမ္ူလန္းေသာ မိသားစုမ်ား.jpg', 'arwarhawihara', '2019-06-22 05:57:19', '2019-06-22 05:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_06_15_112513_create_categories_table', 1),
(4, '2019_06_17_043430_create_comments_table', 1),
(5, '2019_06_17_145827_create_sellers_table', 1),
(6, '2019_06_17_145853_create_companies_table', 1),
(7, '2019_06_17_145924_create_subcategories_table', 1),
(8, '2019_06_18_150721_create_profiles_table', 2),
(9, '2019_06_18_152028_create_userinfos_table', 2),
(10, '2019_06_18_182230_create_sellers_table', 3),
(11, '2019_06_18_183019_create_comments_table', 4),
(12, '2019_06_19_184616_create_lists_table', 5),
(13, '2019_06_19_184946_create_recordlists_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recordlists`
--

CREATE TABLE `recordlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `phno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timelength` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recordlists`
--

INSERT INTO `recordlists` (`id`, `userid`, `phno`, `address`, `timelength`, `created_at`, `updated_at`) VALUES
(10, 16, '09-3456789', 'Monywa', '1 year', '2019-06-21 02:17:28', '2019-06-21 02:17:28'),
(11, 17, '09-23456789', 'Monywa', '1 year', '2019-06-22 02:47:47', '2019-06-22 02:47:47'),
(12, 18, '09-3456788', 'Monywa', '1 year', '2019-06-22 02:47:57', '2019-06-22 02:47:57'),
(13, 19, '09-23456789', 'Monywa', '1 month(free)', '2019-06-22 02:48:02', '2019-06-22 02:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategoryid` bigint(20) UNSIGNED NOT NULL,
  `categoryid` bigint(20) UNSIGNED NOT NULL,
  `userid` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `subcategoryid`, `categoryid`, `userid`, `title`, `price`, `quantity`, `image`, `description`, `created_at`, `updated_at`) VALUES
(14, 7, 11, 17, 'Evening', '40000', '1', '/image/ငွက္ကေလးေတိရဲ့ ေကာင္းကင္.jpg', 'This is a catton', '2019-06-22 02:57:54', '2019-06-22 02:57:54'),
(16, 4, 7, 17, 'Morning', '50000', '2', '/image/စကားႀကီး ဆယ္ပ်ိုး.jpg', 'This is a flexible rice', '2019-06-22 03:01:18', '2019-06-22 03:01:18'),
(17, 5, 10, 17, 'Night', '20000', '1', '/image/စိမ္ူလန္းေသာ မိသားစုမ်ား.jpg', 'This is a wheat', '2019-06-22 03:03:41', '2019-06-22 03:03:41'),
(19, 8, 10, 17, 'Good Morning', '20000', '1', '/image/မျငိမ္းသာရဲ့ ေရႊနန္းေတာ္.jpg', 'This is a good wheat', '2019-06-22 03:05:37', '2019-06-22 03:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryid` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `categoryid`, `created_at`, `updated_at`) VALUES
(3, 'manawthuka', 7, '2019-06-21 03:06:39', '2019-06-21 03:06:39'),
(4, 'pawsanhmwe', 7, '2019-06-21 03:07:29', '2019-06-21 03:07:29'),
(5, 'red wheat', 10, '2019-06-21 03:08:05', '2019-06-21 03:08:05'),
(7, 'shwe taung -8', 11, '2019-06-21 03:09:03', '2019-06-21 03:09:03'),
(8, 'white wheat', 10, '2019-06-21 03:27:45', '2019-06-21 03:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `userinfos`
--

CREATE TABLE `userinfos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timelength` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userinfos`
--

INSERT INTO `userinfos` (`id`, `user_id`, `image`, `phno`, `address`, `timelength`, `status`, `created_at`, `updated_at`) VALUES
(12, 16, '/image/default.jpg', '09-3456789', 'Monywa', '1 year', 1, '2019-06-21 02:15:57', '2019-06-21 02:17:28'),
(13, 17, '/image/download.jpg', '09-23456789', 'Monywa', '1 year', 1, '2019-06-21 02:59:46', '2019-06-22 02:47:47'),
(14, 18, '/image/l1.jpg', '09-3456788', 'Monywa', '1 year', 1, '2019-06-21 03:55:07', '2019-06-22 02:47:57'),
(15, 19, '/image/ပင္လယ္ရဲ့ အနားသတ္မိဥ္း.jpg', '09-23456789', 'Monywa', '1 month(free)', 1, '2019-06-21 05:37:09', '2019-06-22 02:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'seller',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(16, 'Admin', 'admin@gmail.com', NULL, '$2y$10$OxTM.ZuhJCj8/zwLECUw5OWoPQZsrNjsIoVpmFgXuH/uJskHWUFmW', NULL, 'admin', '2019-06-21 02:15:14', '2019-06-21 02:15:14'),
(17, 'Aung Kyaw Soe', 'aks@gmail.com', NULL, '$2y$10$FDGW/4Uxzm/SR6YVroyUTul37gghbNWK1bZMXxGiadL6q5gW1fxaW', NULL, 'seller', '2019-06-21 02:58:39', '2019-06-21 02:58:39'),
(18, 'Than Zaw Htet', 'tzh@gmail.com', NULL, '$2y$10$zLN5RcoWRHjgLU9rYIfO/OlrF0VmSTXflR2/CHYbcRkwo.B.isnFu', NULL, 'company', '2019-06-21 03:54:18', '2019-06-21 03:54:18'),
(19, 'Seller', 'seller@gmail.com', NULL, '$2y$10$drap/7.MSTSjKrU.iPqalOSYS3Ets8bCbUpYUIscIsLX2lJ9auTBS', NULL, 'seller', '2019-06-21 05:36:55', '2019-06-21 05:36:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `recordlists`
--
ALTER TABLE `recordlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfos`
--
ALTER TABLE `userinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `recordlists`
--
ALTER TABLE `recordlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userinfos`
--
ALTER TABLE `userinfos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
