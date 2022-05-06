-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2022 at 06:05 AM
-- Server version: 5.7.37-cll-lve
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
(6, 'Abhijit Rao', 0, 'p5', 'dynamicapps', '123', 1, '2024-01-01 12:00:00'),
(7, 'Shopping App', 0, 'p6', 'shoppingapp', '123', 1, '2024-01-01 12:00:00');

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
(5, 'p5', 'com.appsfeature.dynamicapps', 'DynamicApps', 1),
(6, 'p6', 'com.appsfeature.shoppingapp', 'ShoppingApp', 1);

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
('p5', 126, 'Home Slider', 6, NULL, 1, 1, '', '', NULL, '2022-03-07 13:09:22'),
('p5', 127, 'Menu', 1, NULL, 2, 1, '', '', NULL, '2022-03-11 05:29:14'),
('p6', 133, 'Dashboard', 0, NULL, 0, 1, '', '', NULL, '2022-03-13 09:12:03'),
('p6', 134, 'Slider', 6, NULL, 0, 1, '', '', NULL, '2022-03-13 09:17:49'),
('p6', 135, 'Menu', 1, NULL, 0, 1, '', '', NULL, '2022-03-15 17:33:32'),
('p5', 139, 'Social', 10, '650ac42a05acf1ac4ba6b56b43abd8a1.png', 0, 1, '', '', NULL, '2022-03-16 17:45:32'),
('p5', 140, 'Social Media1', 10, NULL, 0, 1, '', '', NULL, '2022-03-16 17:45:53'),
('p6', 147, 'Education', 1, 'a8dd1b4f54be15e7f3b694b07afaafec.png', 0, 1, '', '', NULL, '2022-05-04 07:56:15'),
('p6', 148, 'Medical', 1, 'bb59a6ba4907247bed1cadd156404134.png', 0, 1, '', '', NULL, '2022-05-04 07:56:35'),
('p5', 149, 'PlayList', 11, '8cca4e7436441079ccd5e4e33a440160.png', 0, 1, '', '{\"isPlayerStyleMinimal\":true}', NULL, '2022-05-04 12:51:12'),
('p6', 150, 'Youtube', 11, '32c4908171aedae749fe188aa98b9b75.png', 0, 1, '', '', NULL, '2022-05-04 14:34:56'),
('p5', 151, 'Books', 4, NULL, 10, 1, '', '{\"is_portrait\":true,\"height\":200}', NULL, '2022-05-05 06:21:30');

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
('p5', 16, 127, 125, 1, 0, '2022-03-11 05:29:14'),
('p6', 22, 133, 0, 1, 0, '2022-03-13 09:12:03'),
('p6', 23, 134, 133, 1, 0, '2022-03-13 09:17:49'),
('p6', 24, 135, 133, 1, 0, '2022-03-15 17:33:32'),
('p5', 28, 139, 127, 1, 0, '2022-03-16 17:45:32'),
('p5', 29, 140, 139, 1, 0, '2022-03-16 17:45:53'),
('p6', 36, 147, 135, 1, 0, '2022-05-04 07:56:15'),
('p6', 37, 148, 135, 1, 0, '2022-05-04 07:56:35'),
('p5', 38, 149, 127, 1, 0, '2022-05-04 12:51:12'),
('p6', 39, 150, 147, 1, 0, '2022-05-04 14:34:56'),
('p5', 40, 151, 125, 1, 0, '2022-05-05 06:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `table_content`
--

CREATE TABLE `table_content` (
  `pkg_id` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` text,
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
('p2', 56, 'Slider 1', '', 0, 'a7c821801eb46f6e19dbc509d729ad81.jpg', '', 1, 0, NULL, '2022-03-25T11:10', '2022-03-01T18:43', '2022-03-04 05:40:55'),
('p2', 57, 'Slider 2', '', NULL, '1282a5e5f3014493667aef13129b0103.jpg', '', 1, 0, NULL, '', '', '2022-03-04 05:41:11'),
('p5', 58, 'Slider 1', '                               <h3>Make work faster and easier</h3>  <p><strong>Find and retrieve data quickly in Excel</strong>—We heard your feedback about the <a href=\"https://support.office.com/en-us/article/VLOOKUP-function-0BBC8083-26FE-4963-8AB8-93A18AD188A1\" target=\"_blank\" rel=\"noopener noreferrer\">VLOOKUP</a> formula for working with data in Excel—that it requires sorted data, fails to discover results on left-hand columns, and takes wildcards by default. So this month, <a href=\"https://techcommunity.microsoft.com/t5/Excel-Blog/Announcing-XLOOKUP/ba-p/811376\" target=\"_blank\" rel=\"noopener noreferrer\">we introduced XLOOKUP</a>, our successor to the VLOOKUP, and <a href=\"https://support.office.com/en-us/article/HLOOKUP-function-A3034EEC-B719-4BA3-BB65-E1AD662ED95F\" target=\"_blank\" rel=\"noopener noreferrer\">HLOOKUP</a> formulas. XLOOKUP addresses our most common user feedback and takes advantage of recent backend changes to improve calculation time. It‘s available today to <a href=\"https://insider.office.com/en-us/\" target=\"_blank\" rel=\"noopener noreferrer\">Office Insiders</a>, with general availability coming later this year1.</p>                             ', 103, '5dcc8c7617a81f51061fd8a6b7c2f8e8.jpg', 'https://play.google.com/store1', 1, 0, '', '', NULL, '2022-03-07 13:09:45'),
('p5', 59, 'Slider 2', '', 102, 'b3ac8a7740044ea5144af6485cc0c3f5.jpg', 'https://play.google.com/store', 1, 0, '', '', NULL, '2022-03-07 13:10:00'),
('p5', 60, 'Google', '', 102, '16df3878e4964397a949a40c7d7d633a.png', 'https://www.google.com/', 1, 0, '', '', NULL, '2022-03-11 05:38:41'),
('p5', 61, 'Meta', '', 102, 'dfec0d8d678f75dd6e1f396737742f33.png', 'https://about.facebook.com/meta/', 1, 0, '', '', NULL, '2022-03-11 05:39:08'),
('p5', 62, 'Youtube', '', 106, '85e56fd7d770b51ea957570c837d5c0c.png', 'G0Hx6uN2AJE', 1, 0, '', '', NULL, '2022-03-11 05:40:05'),
('p5', 63, 'Twitter', '', 101, '30d9c34ac309f46a0fc96afd7fab5530.png', 'https://www.ets.org/Media/Tests/GRE/pdf/gre_research_validity_data.pdf', 1, 0, '', '', NULL, '2022-03-11 05:40:21'),
('p6', 68, 'Slider1', '', 102, '96470a541a522ce81914367cb1c0e6d1.jpg', 'https://m.dailyhunt.in/news/india/english/money+control+english-epaper-mconten/bitcoin+falls+74+to+40632-newsid-n360295962?s=a&uu=0x3fe296264bbbfce7&ss=wsp', 1, 0, '', '', NULL, '2022-03-13 09:22:36'),
('p6', 69, 'Geocery ', '', 103, NULL, '', 1, 1, '', '', NULL, '2022-03-14 04:56:15'),
('p5', 73, 'WhatsApp', '', 102, '17f6b9fe8846e1dcf9aac3a2c49a8a02.png', 'https://web.whatsapp.com/', 1, 0, '', '', NULL, '2022-05-04 07:02:41'),
('p6', 74, 'image', '', 100, '241f81f8a7e19c9d13385b4126337757.jpg', '', 1, 0, '', '', NULL, '2022-05-04 07:04:51'),
('p6', 75, 'Schools', '', 102, '51844b4b8d64dfa184676a6da75b05b6.png', 'http://katyayanacademy.com/cp', 1, 0, '', '', NULL, '2022-05-04 07:57:06'),
('p6', 76, 'Colleges', '', 102, '54f4df29cd67b3bdf91f8477cf1e2f45.png', 'http://katyayanacademy.com/cp/', 1, 0, '', '', NULL, '2022-05-04 09:37:50'),
('p6', 77, 'Institutes', '', 102, 'df8f898dc89f303d15604fb6c58ea8d1.png', '', 1, 0, '', '', NULL, '2022-05-04 09:41:28'),
('p6', 78, 'Coaching  Classes', '', 101, 'cda9f8d80f36604d834a273388e115b4.png', 'http://www.africau.edu/images/default/sample.pdf', 1, 0, '', '', NULL, '2022-05-04 09:43:00'),
('p6', 79, 'Hospitals', '', 102, '6d7825db2ca5d4cfeb064a2480092acb.png', '', 1, 0, '', '', NULL, '2022-05-04 09:44:16'),
('p6', 80, 'Medical Clinic', '', 102, 'd21412a3502eb55b7fee12c600aa4468.png', '', 1, 0, '', '', NULL, '2022-05-04 09:45:30'),
('p6', 81, 'Medical Stores', '', 102, '9fea8f7a41f9762207b3ab9bade6b3e7.png', '', 1, 0, '', '', NULL, '2022-05-04 09:46:09'),
('p5', 82, 'Learn Ethical Hacking Full Course in 10 Hours', '', 106, NULL, 'Rgvzt0D8bR4', 1, 0, '', '', NULL, '2022-05-04 12:52:24'),
('p5', 83, 'Make Money From Money - Sandeep Maheshwari', 'Sandeep Maheshwari is a name among millions who struggled, failed and surged ahead in search of success, happiness and contentment. Just like any middle class guy, he too had a bunch of unclear dreams and a blurred vision of his goals in life. All he had was an undying learning attitude to hold on to. Rowing through ups and downs, it was time that taught him the true meaning of his life.', 106, NULL, 'LknADkbbekc', 1, 0, '', '', NULL, '2022-05-04 12:53:06'),
('p6', 84, '   Namo Namo - Lyrical | Kedarnath | Sushant Rajput | Sara Ali Khan | Amit Trivedi | Amitabh B', '    0:36 / 5:28   Namo Namo - Lyrical | Kedarnath | Sushant Rajput | Sara Ali Khan | Amit Trivedi | Amitabh B', 106, NULL, 'dx4Teh-nv3A', 1, 0, '', '', NULL, '2022-05-04 14:36:57'),
('p5', 85, 'Book 1', '', 101, '70996a8e35ef83475410b671bff0387b.jpg', 'http://appsfeature.com/pdf/sample_pdf_1.pdf', 1, 0, '', '', NULL, '2022-05-05 06:55:56'),
('p5', 86, 'Book 2', '', 101, 'f1b49ef507c1b38b81e769ef7f1f182c.jpg', 'http://appsfeature.com/pdf/sample_pdf_2.pdf', 1, 0, '', '', NULL, '2022-05-05 06:56:15'),
('p5', 87, 'Book 3', '', 101, 'adf6e9e68ca84770c2dc922638134bca.jpg', 'http://appsfeature.com/pdf/sample_pdf_3.pdf', 1, 0, '', '', NULL, '2022-05-05 06:56:34'),
('p5', 88, 'Book 4', '', 101, '05365ae55a3087a372ac658b103ad651.jpg', 'http://appsfeature.com/pdf/sample_pdf_4.pdf', 1, 0, '', '', NULL, '2022-05-05 06:56:55'),
('p5', 89, 'Book 5', '', 101, '71534e38ffa6b2edf2cfbf8eb2722bb8.jpg', 'http://appsfeature.com/pdf/sample_pdf_5.pdf', 1, 0, '', '', NULL, '2022-05-05 06:57:09'),
('p5', 90, 'Book 6', '', 101, 'f4ad8eefa9d9de3f50084e1bcbef2434.jpg', 'http://appsfeature.com/pdf/sample_pdf_1.pdf', 1, 0, '', '', NULL, '2022-05-05 07:35:49'),
('p5', 91, 'asdasd', '', 101, NULL, '', 1, 0, '', '', NULL, '2022-05-06 13:01:17');

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
('p5', 21, 59, 126, 1, 0, '2022-03-07 13:10:00'),
('p5', 22, 60, 127, 1, 0, '2022-03-11 05:38:41'),
('p5', 23, 61, 127, 1, 0, '2022-03-11 05:39:08'),
('p5', 24, 62, 127, 1, 0, '2022-03-11 05:40:05'),
('p5', 25, 63, 127, 1, 0, '2022-03-11 05:40:21'),
('p6', 31, 68, 134, 1, 0, '2022-03-13 09:22:36'),
('p6', 32, 69, 133, 1, 1, '2022-03-14 04:56:15'),
('p5', 36, 73, 139, 1, 0, '2022-05-04 07:02:41'),
('p6', 37, 74, 134, 1, 0, '2022-05-04 07:04:51'),
('p6', 38, 75, 147, 1, 0, '2022-05-04 07:57:06'),
('p6', 39, 76, 147, 1, 0, '2022-05-04 09:37:50'),
('p6', 40, 77, 147, 1, 0, '2022-05-04 09:41:28'),
('p6', 41, 78, 147, 1, 0, '2022-05-04 09:43:00'),
('p6', 42, 79, 148, 1, 0, '2022-05-04 09:44:16'),
('p6', 43, 80, 148, 1, 0, '2022-05-04 09:45:30'),
('p6', 44, 81, 148, 1, 0, '2022-05-04 09:46:09'),
('p5', 45, 82, 149, 1, 0, '2022-05-04 12:52:24'),
('p5', 46, 83, 149, 1, 0, '2022-05-04 12:53:06'),
('p6', 47, 84, 150, 1, 0, '2022-05-04 14:36:57'),
('p5', 48, 85, 151, 1, 0, '2022-05-05 06:55:56'),
('p5', 49, 86, 151, 1, 0, '2022-05-05 06:56:15'),
('p5', 50, 87, 151, 1, 0, '2022-05-05 06:56:34'),
('p5', 51, 88, 151, 1, 0, '2022-05-05 06:56:55'),
('p5', 52, 89, 151, 1, 0, '2022-05-05 06:57:09'),
('p5', 53, 90, 151, 1, 0, '2022-05-05 07:35:49'),
('p5', 54, 91, 151, 1, 0, '2022-05-06 13:01:17');

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
('p3', 26, 1, 109, 'Previous Classes', 0, 1),
('common', 27, 0, 11, 'Youtube Video PlayList', 0, 1);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `table_app`
--
ALTER TABLE `table_app`
  MODIFY `app_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `table_category_master`
--
ALTER TABLE `table_category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `table_content`
--
ALTER TABLE `table_content`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `table_content_master`
--
ALTER TABLE `table_content_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `table_flavour`
--
ALTER TABLE `table_flavour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_item_type`
--
ALTER TABLE `table_item_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `table_json`
--
ALTER TABLE `table_json`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
