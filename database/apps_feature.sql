-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2022 at 11:27 PM
-- Server version: 5.7.36-cll-lve
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
-- Database: `apps_feature`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_account`
--

CREATE TABLE `table_account` (
  `id` int(100) NOT NULL,
  `name` varchar(500) NOT NULL,
  `role` int(100) NOT NULL DEFAULT '0',
  `pkg_id` varchar(100) DEFAULT NULL,
  `user_id` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `active` int(100) NOT NULL DEFAULT '1',
  `validity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_account`
--

INSERT INTO `table_account` (`id`, `name`, `role`, `pkg_id`, `user_id`, `password`, `active`, `validity`) VALUES
(1, 'Admin', 1, 'p1', 'admin', '123', 1, '2024-01-31 19:15:44'),
(3, 'Amit Jain', 0, 'p2', 'amit', 'amit@123', 1, '2023-05-17 19:16:26'),
(4, 'Rajat Sukla', 0, 'p3', 'school', '123', 1, '2023-02-14 07:20:53'),
(5, 'Rajat Sukla', 0, 'p4', 'academy', '123', 1, '2023-02-14 07:20:53'),
(6, 'Abhijit Rao', 0, 'p5', 'abhi', '123', 1, '2024-01-01 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_app`
--

CREATE TABLE `table_app` (
  `app_id` int(100) NOT NULL,
  `pkg_id` varchar(500) NOT NULL,
  `pkg_name` varchar(100) DEFAULT NULL,
  `app_name` varchar(500) NOT NULL,
  `visibility` int(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_app`
--

INSERT INTO `table_app` (`app_id`, `pkg_id`, `pkg_name`, `app_name`, `visibility`) VALUES
(1, 'p1', 'com.appsfeature', 'Appsfeature', 1),
(2, 'p2', 'com.appsfeature.bizwiz', 'BizWiz', 1),
(3, 'p3', 'com.katyayanschool.katyayanschool', 'Katyayan School', 1),
(4, 'p4', 'com.katyayanacademy.katyayanacademy', 'Katyayan Academy', 1),
(5, 'p5', 'com.appsfeature.dynamicapps', 'DynamicApps', 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `pkg_id` varchar(100) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `item_type` int(100) DEFAULT '0',
  `image` varchar(1000) DEFAULT NULL,
  `ranking` int(100) NOT NULL DEFAULT '0',
  `visibility` int(100) NOT NULL DEFAULT '1',
  `json_data` varchar(5000) DEFAULT NULL,
  `other_property` text,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`pkg_id`, `cat_id`, `title`, `item_type`, `image`, `ranking`, `visibility`, `json_data`, `other_property`, `updated_at`, `created_at`) VALUES
('p1', 108, 'Dashboard', 0, NULL, 0, 1, '', '', NULL, '2022-02-03 17:12:07'),
('p1', 109, 'Mobile Shop', 1, NULL, 0, 1, '', '', NULL, '2022-02-03 17:15:17'),
('p1', 110, 'Cloth Shop', 1, NULL, 0, 1, '', '', NULL, '2022-02-03 17:15:33'),
('p1', 111, 'Electronics', 0, NULL, 0, 1, '', '', NULL, '2022-02-03 19:20:14'),
('p1', 112, 'Laptops', 0, '5bc19555e3a6ddae1a318f0f486cf092.png', 0, 1, '', '', NULL, '2022-02-03 19:20:57'),
('p1', 113, 'Qwerty', 0, NULL, 0, 1, '', '', NULL, '2022-02-05 18:07:16'),
('p2', 114, 'Home Slider', 5, NULL, 2, 1, '', '', NULL, '2022-02-05 18:41:48'),
('p3', 115, 'Dashboard', 0, NULL, 0, 1, '', '', NULL, '2022-02-14 06:46:16'),
('p3', 116, 'Home Menu', 3, NULL, 2, 1, '', '{\"random_icon_color\": true}', NULL, '2022-02-14 06:58:47'),
('p3', 121, 'Home Slider', 6, '5324853ebc38baa76df534044924f7a3.jpeg', 1, 1, '', '{\"hide_title\": true}', NULL, '2022-02-14 11:01:10'),
('p2', 124, 'Dashboard', 0, NULL, 0, 1, '', '', NULL, '2022-03-03 07:25:13'),
('p5', 125, 'Dashboard', 0, NULL, 0, 1, '', '', NULL, '2022-03-07 12:47:17'),
('p5', 126, 'Home Slider', 4, NULL, 0, 1, '', '', NULL, '2022-03-07 13:09:22'),
('p5', 127, 'Ahah', 0, NULL, 0, 1, '', '', NULL, '2022-03-08 06:18:03'),
('p5', 128, 'Kkkl', 0, NULL, 0, 1, '', '', NULL, '2022-03-08 06:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `table_category_master`
--

CREATE TABLE `table_category_master` (
  `pkg_id` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `cat_id` int(100) NOT NULL,
  `sub_cat_id` int(100) NOT NULL,
  `visibility` int(100) DEFAULT '1',
  `ranking` int(100) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_category_master`
--

INSERT INTO `table_category_master` (`pkg_id`, `id`, `cat_id`, `sub_cat_id`, `visibility`, `ranking`, `created_at`) VALUES
('p1', 1, 108, 0, 1, 0, '2022-02-03 17:12:07'),
('p1', 2, 109, 108, 1, 0, '2022-02-03 17:15:17'),
('p1', 3, 110, 108, 1, 0, '2022-02-03 17:15:33'),
('p1', 4, 111, 108, 1, 0, '2022-02-03 19:20:14'),
('p1', 5, 112, 111, 1, 0, '2022-02-03 19:20:57'),
('p1', 6, 113, 108, 1, 0, '2022-02-05 18:07:16'),
('p2', 7, 114, 124, 1, 0, '2022-02-05 18:41:48'),
('p3', 8, 115, 0, 1, 0, '2022-02-14 06:46:16'),
('p3', 9, 116, 115, 1, 0, '2022-02-14 06:58:47'),
('p3', 10, 121, 115, 1, 0, '2022-02-14 11:01:10'),
('p2', 12, 124, 0, 1, 0, '2022-03-03 07:59:58'),
('p5', 14, 125, 0, 1, 0, '2022-03-07 12:47:31'),
('p5', 15, 126, 125, 1, 0, '2022-03-07 13:09:22'),
('p5', 16, 127, 0, 1, 0, '2022-03-08 06:18:03'),
('p5', 17, 128, 125, 1, 0, '2022-03-08 06:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `table_content`
--

CREATE TABLE `table_content` (
  `pkg_id` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `item_type` int(100) DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `link` varchar(1000) DEFAULT NULL,
  `visibility` int(100) NOT NULL DEFAULT '1',
  `ranking` int(100) DEFAULT '0',
  `json_data` varchar(5000) DEFAULT NULL,
  `other_property` varchar(1000) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_content`
--

INSERT INTO `table_content` (`pkg_id`, `id`, `title`, `description`, `item_type`, `image`, `link`, `visibility`, `ranking`, `json_data`, `other_property`, `updated_at`, `created_at`) VALUES
('p1', 39, 'Android Phones', '', 0, NULL, '', 1, 0, '', '', NULL, '2022-02-03 18:21:14'),
('p1', 40, 'Apple Phones', '', 0, NULL, '', 1, 0, '', '', NULL, '2022-02-03 18:21:35'),
('p1', 41, 'Womens Cloth', '', 0, NULL, '', 1, 0, '', '', NULL, '2022-02-03 18:23:39'),
('p1', 42, 'Mens Cloth', '', 101, NULL, '', 1, 0, '', '', NULL, '2022-02-03 18:23:51'),
('p1', 43, 'Dell Laptop', '', 150, NULL, '', 1, 0, '', '', NULL, '2022-02-03 19:24:25'),
('p3', 45, 'Live  Classes ', '', 107, 'f88d3e71037eded195690054bdc3cda7.png', '', 1, 1, '', '', NULL, '2022-02-14 09:33:34'),
('p3', 46, 'Test Series', '', 102, '9e67fd16f5ad2e3f0fcea3bda0d2e0e4.png', 'https://www.katyayangroups.com/erp/index.php/Stu_app_exam/test/', 1, 4, '', '', NULL, '2022-02-14 09:33:59'),
('p3', 47, 'My Profile', '', 108, 'd60b2444fe7e286fd2b8b35c18214cfe.png', '', 1, 3, '', '', NULL, '2022-02-14 09:37:13'),
('p3', 48, '  Previous Classes', '', 109, '247f356e5f8c978a03d6388ba5e9fcdb.png', '', 1, 2, '', '', NULL, '2022-02-14 09:37:55'),
('p3', 49, 'Slider 1', '', 100, '48761fa034ac31f74d1acbb82e4190bb.jpg', '', 1, 0, '', '', NULL, '2022-02-14 11:02:33'),
('p3', 50, 'Slider 2', '', 100, '23a6030d8300d4150b711796265b6b5a.jpg', '', 1, 0, '', '', NULL, '2022-02-16 05:16:38'),
('p3', 51, 'dfg', '', 100, 'd4f2109d332a6a780b8f37d75a3028a8.jpeg', '', 1, 0, '', '', NULL, '2022-02-16 10:33:07'),
('p3', 52, 'Mathematics 1st', '', 101, NULL, '', 1, 0, '', '', NULL, '2022-02-16 11:56:04'),
('p3', 53, 'Mathematics 2nd', '', 101, NULL, '', 1, 0, '', '', NULL, '2022-02-16 11:56:16'),
('p3', 54, 'Chemistry 1', '', 101, NULL, '', 1, 0, '', '', NULL, '2022-02-16 14:29:53'),
('p3', 55, 'Chemistry 2', '', 101, NULL, '', 1, 0, '', '', NULL, '2022-02-16 14:30:15'),
('p2', 56, 'Slider 1', '', NULL, 'a7c821801eb46f6e19dbc509d729ad81.jpg', '', 1, 0, NULL, '2022-03-25T11:10', '2022-03-01T18:43', '2022-03-04 05:40:55'),
('p2', 57, 'Slider 2', '', NULL, '1282a5e5f3014493667aef13129b0103.jpg', '', 1, 0, NULL, '', '', '2022-03-04 05:41:11'),
('p5', 58, 'Slider 1', '', 102, '5dcc8c7617a81f51061fd8a6b7c2f8e8.jpg', '', 1, 0, '', '', NULL, '2022-03-07 13:09:45'),
('p5', 59, 'Slider 2', '', 100, 'b3ac8a7740044ea5144af6485cc0c3f5.jpg', '', 1, 0, '', '', NULL, '2022-03-07 13:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_content_master`
--

CREATE TABLE `table_content_master` (
  `pkg_id` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `content_id` int(100) NOT NULL,
  `sub_cat_id` int(100) NOT NULL,
  `visibility` int(100) DEFAULT '1',
  `ranking` int(100) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_content_master`
--

INSERT INTO `table_content_master` (`pkg_id`, `id`, `content_id`, `sub_cat_id`, `visibility`, `ranking`, `created_at`) VALUES
('p1', 1, 39, 109, 1, 0, '2022-02-03 18:21:14'),
('p1', 2, 40, 109, 1, 0, '2022-02-03 18:21:35'),
('p1', 3, 41, 110, 1, 0, '2022-02-03 18:23:39'),
('p1', 4, 42, 110, 1, 0, '2022-02-03 18:23:51'),
('p1', 5, 43, 112, 1, 0, '2022-02-03 19:24:25'),
('p3', 6, 45, 116, 1, 0, '2022-02-14 09:33:34'),
('p3', 7, 46, 116, 1, 0, '2022-02-14 09:33:59'),
('p3', 8, 47, 116, 1, 0, '2022-02-14 09:37:13'),
('p3', 9, 48, 116, 1, 0, '2022-02-14 09:37:55'),
('p3', 10, 49, 121, 1, 0, '2022-02-14 11:02:33'),
('p3', 11, 50, 121, 1, 0, '2022-02-16 05:16:38'),
('p3', 12, 51, 121, 1, 0, '2022-02-16 10:33:07'),
('p3', 13, 52, 122, 1, 0, '2022-02-16 11:56:04'),
('p3', 14, 53, 122, 1, 0, '2022-02-16 11:56:16'),
('p3', 15, 54, 122, 1, 0, '2022-02-16 14:29:53'),
('p3', 16, 55, 122, 1, 0, '2022-02-16 14:30:15'),
('p2', 18, 56, 114, 1, 0, '2022-03-04 05:40:55'),
('p2', 19, 57, 114, 1, 0, '2022-03-04 05:41:11'),
('p5', 20, 58, 126, 1, 0, '2022-03-07 13:09:45'),
('p5', 21, 59, 126, 1, 0, '2022-03-07 13:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_flavour`
--

CREATE TABLE `table_flavour` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `ranking` int(10) DEFAULT '0',
  `visibility` int(10) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_flavour`
--

INSERT INTO `table_flavour` (`id`, `title`, `ranking`, `visibility`) VALUES
(0, 'Category', 0, 1),
(1, 'Content', 0, 1),
(2, 'Json', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_item_type`
--

CREATE TABLE `table_item_type` (
  `pkg_id` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `flavour` int(100) DEFAULT '0',
  `item_type` int(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `ranking` int(10) DEFAULT '0',
  `visibility` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_item_type`
--

INSERT INTO `table_item_type` (`pkg_id`, `id`, `flavour`, `item_type`, `title`, `ranking`, `visibility`) VALUES
('common', 2, 0, 0, 'List', 0, 1),
('common', 3, 0, 1, 'Grid', 0, 1),
('common', 4, 0, 4, 'Horizontal Card Scroll', 0, 1),
('p2', 5, 1, 2, 'Slider', 0, 1),
('common', 7, 0, 5, 'ViewPager Auto Slider', 0, 1),
('common', 8, 0, 7, 'List Card', 0, 1),
('common', 9, 0, 8, 'Grid Card', 0, 1),
('common', 10, 1, 101, 'PDF', 0, 1),
('common', 11, 1, 102, 'Link', 0, 1),
('common', 12, 1, 103, 'Html View', 0, 1),
('common', 13, 1, 104, 'Test', 0, 1),
('common', 14, 1, 105, 'Quiz', 0, 1),
('common', 15, 1, 106, 'Videos', 0, 1),
('p1', 16, 1, 150, 'Browser', 0, 0),
('p3', 19, 1, 107, 'Live Classes', 0, 1),
('p3', 20, 1, 108, 'Profile', 0, 1),
('common', 21, 0, 3, 'Grid Horizontal', 0, 1),
('common', 22, 0, 6, 'ViewPager Auto Slider No Title', 0, 1),
('common', 23, 1, 100, 'No Action', 0, 1),
('common', 24, 0, 9, 'Title Only', 0, 1),
('common', 25, 0, 10, 'Title With Count', 0, 1),
('p3', 26, 1, 109, 'Previous Classes', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_json`
--

CREATE TABLE `table_json` (
  `pkg_id` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `cat_id` int(100) DEFAULT '0',
  `json_data` text NOT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_account`
--
ALTER TABLE `table_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_app`
--
ALTER TABLE `table_app`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_id` (`cat_id`);

--
-- Indexes for table `table_category_master`
--
ALTER TABLE `table_category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_content`
--
ALTER TABLE `table_content`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `table_content_master`
--
ALTER TABLE `table_content_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_flavour`
--
ALTER TABLE `table_flavour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_item_type`
--
ALTER TABLE `table_item_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_json`
--
ALTER TABLE `table_json`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_account`
--
ALTER TABLE `table_account`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_app`
--
ALTER TABLE `table_app`
  MODIFY `app_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `table_category_master`
--
ALTER TABLE `table_category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `table_content`
--
ALTER TABLE `table_content`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `table_content_master`
--
ALTER TABLE `table_content_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `table_flavour`
--
ALTER TABLE `table_flavour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_item_type`
--
ALTER TABLE `table_item_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `table_json`
--
ALTER TABLE `table_json`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
