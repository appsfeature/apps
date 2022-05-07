-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2022 at 12:55 AM
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
(1, 'Admin', 1, 'p1', 'admin', 'asxcv@123', 1, '2024-01-31 19:15:44'),
(3, 'Amit Jain', 0, 'p2', 'amit', 'amit@123', 1, '2023-05-17 19:16:26'),
(4, 'Rajat Sukla', 0, 'p3', 'school', '123', 1, '2023-02-14 07:20:53'),
(5, 'Rajat Sukla', 0, 'p4', 'academy', '123', 1, '2023-02-14 07:20:53'),
(6, 'Abhijit Rao', 0, 'p5', 'dynamicapps', '123', 1, '2024-01-01 12:00:00'),
(7, 'Shopping App', 0, 'p6', 'shoppingapp', '123', 1, '2024-01-01 12:00:00'),
(8, 'Ashutosh Rana', 0, 'p7', 'babusona', 'sona@123', 1, '2024-01-01 12:00:00'),
(9, 'Hari Ram', 0, 'p8', 'result4u', 'hari@123', 1, '2024-01-01 12:00:00');

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
(6, 'p6', 'com.appsfeature.shoppingapp', 'ShoppingApp', 1),
(7, 'p7', 'com.appsfeature.babusona', 'BabuSona', 1),
(8, 'p8', 'com.appsfeature.result4u', 'Result4U', 1);

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
('p6', 133, 'Dashboard', 0, NULL, 0, 1, '', '', NULL, '2022-03-13 09:12:03'),
('p6', 134, 'Slider', 6, NULL, 0, 1, '', '', NULL, '2022-03-13 09:17:49'),
('p6', 135, 'Menu', 1, NULL, 0, 1, '', '', NULL, '2022-03-15 17:33:32'),
('p7', 152, 'Dashboard', 0, NULL, 0, 1, '', '', NULL, '2022-05-07 05:55:37'),
('p8', 153, 'Dashboard', 0, NULL, 0, 1, '', '', NULL, '2022-05-07 06:00:48'),
('p8', 154, 'Menu', 1, NULL, 0, 1, '', '', NULL, '2022-05-07 06:09:39'),
('p8', 155, 'Board Result', 10, 'f0d278b701eb31ee6a29b3f9b6a20457.png', 0, 1, '', '', NULL, '2022-05-07 06:10:37');

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
('p6', 22, 133, 0, 1, 0, '2022-03-13 09:12:03'),
('p6', 23, 134, 133, 1, 0, '2022-03-13 09:17:49'),
('p6', 24, 135, 133, 1, 0, '2022-03-15 17:33:32'),
('p6', 36, 147, 135, 1, 0, '2022-05-04 07:56:15'),
('p6', 37, 148, 135, 1, 0, '2022-05-04 07:56:35'),
('p6', 39, 150, 147, 1, 0, '2022-05-04 14:34:56'),
('p7', 41, 152, 0, 1, 0, '2022-05-07 05:55:37'),
('p8', 42, 153, 0, 1, 0, '2022-05-07 06:00:48'),
('p8', 43, 154, 153, 1, 0, '2022-05-07 06:09:39'),
('p8', 44, 155, 154, 1, 0, '2022-05-07 06:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `table_content`
--

CREATE TABLE `table_content` (
  `pkg_id` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` longtext,
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
('p6', 68, 'Slider1', '', 102, '96470a541a522ce81914367cb1c0e6d1.jpg', 'https://m.dailyhunt.in/news/india/english/money+control+english-epaper-mconten/bitcoin+falls+74+to+40632-newsid-n360295962?s=a&uu=0x3fe296264bbbfce7&ss=wsp', 1, 0, '', '', NULL, '2022-03-13 09:22:36'),
('p6', 69, 'Geocery ', '', 103, NULL, '', 1, 1, '', '', NULL, '2022-03-14 04:56:15'),
('p6', 74, 'image', '', 100, '241f81f8a7e19c9d13385b4126337757.jpg', '', 1, 0, '', '', NULL, '2022-05-04 07:04:51'),
('p6', 75, 'Schools', '', 102, '51844b4b8d64dfa184676a6da75b05b6.png', 'http://katyayanacademy.com/cp', 1, 0, '', '', NULL, '2022-05-04 07:57:06'),
('p6', 76, 'Colleges', '', 102, '54f4df29cd67b3bdf91f8477cf1e2f45.png', 'http://katyayanacademy.com/cp/', 1, 0, '', '', NULL, '2022-05-04 09:37:50'),
('p6', 77, 'Institutes', '', 102, 'df8f898dc89f303d15604fb6c58ea8d1.png', '', 1, 0, '', '', NULL, '2022-05-04 09:41:28'),
('p6', 78, 'Coaching  Classes', '', 101, 'cda9f8d80f36604d834a273388e115b4.png', 'http://www.africau.edu/images/default/sample.pdf', 1, 0, '', '', NULL, '2022-05-04 09:43:00'),
('p6', 79, 'Hospitals', '', 102, '6d7825db2ca5d4cfeb064a2480092acb.png', '', 1, 0, '', '', NULL, '2022-05-04 09:44:16'),
('p6', 80, 'Medical Clinic', '', 102, 'd21412a3502eb55b7fee12c600aa4468.png', '', 1, 0, '', '', NULL, '2022-05-04 09:45:30'),
('p6', 81, 'Medical Stores', '', 102, '9fea8f7a41f9762207b3ab9bade6b3e7.png', '', 1, 0, '', '', NULL, '2022-05-04 09:46:09'),
('p6', 84, '   Namo Namo - Lyrical | Kedarnath | Sushant Rajput | Sara Ali Khan | Amit Trivedi | Amitabh B', '    0:36 / 5:28   Namo Namo - Lyrical | Kedarnath | Sushant Rajput | Sara Ali Khan | Amit Trivedi | Amitabh B', 106, NULL, 'dx4Teh-nv3A', 1, 0, '', '', NULL, '2022-05-04 14:36:57'),
('p8', 92, 'MP Board 10th Result 2022 Latest Updates: MPBSE Results 29th April at 1 PM – mpbse.nic.in', '<header class=\"entry-header\" style=\"overflow-wrap: break-word; color: rgb(58, 58, 58); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px;\"><h1 class=\"entry-title\" itemprop=\"headline\" style=\"border: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Monda, sans-serif; font-size: 40px; font-style: inherit; line-height: 1.2em;\">MP Board 10th Result 2022 Latest Updates: MPBSE Results 29th April at 1 PM – mpbse.nic.in</h1><div class=\"entry-meta\" style=\"border: 0px; margin: 0.5em 0px 0px; padding: 0px; font-size: 14.45px; line-height: 1.5; color: rgb(89, 89, 89);\"><span class=\"posted-on\" style=\"border: 0px; margin: 0px; padding: 0px;\"><a href=\"https://result4u.in/mp-board-10th-result/\" title=\"10:43 am\" rel=\"bookmark\" style=\"color: rgb(89, 89, 89); cursor: pointer; border: 0px; margin: 0px; padding: 0px; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s;\">April 28, 2022</a></span>&nbsp;<span class=\"byline\" style=\"border: 0px; margin: 0px; padding: 0px; display: inline;\">by&nbsp;<span class=\"author vcard\" itemprop=\"author\" itemtype=\"https://schema.org/Person\" itemscope=\"\" style=\"border: 0px; margin: 0px; padding: 0px;\"><a class=\"url fn n\" href=\"https://result4u.in/author/admin/\" title=\"View all posts by admin\" rel=\"author\" itemprop=\"url\" style=\"color: rgb(89, 89, 89); cursor: pointer; border: 0px; margin: 0px; padding: 0px; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s;\"><span class=\"author-name\" itemprop=\"name\" style=\"border: 0px; margin: 0px; padding: 0px;\">admin</span></a></span></span></div></header><div class=\"entry-content\" itemprop=\"text\" style=\"border: 0px; margin: 2em 0px 0px; padding: 0px; color: rgb(58, 58, 58); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px;\"><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MP Board Class 10th result 2022 Latest Updates:</span> <span style=\"border: 0px; margin: 0px; padding: 0px; color: rgb(128, 0, 0);\">Madhya Pradesh Board will be Declared the MP Board class 10th result on 29 April 2022 at 1 PM</span>, mpbse.nic.in, mpresults.nic.in. The results can also be checked on Result4u&nbsp; portal at result4u.in. Check direct link,</p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MP Board MPBSE 10th result 2022 Updates:</span> <span style=\"border: 0px; margin: 0px; padding: 0px; color: rgb(0, 0, 255);\">Madhya Pradesh Board will announce the class 10th results on 29 April 2022 at 1 PM. The merit list will also be announced online 29 April 2022</span>. This year over 11.5 lakh students have taken the MP Board 10<span style=\"border: 0px; margin: 0px; padding: 0px; font-size: 12.75px; height: 0px; line-height: 0; position: relative; vertical-align: baseline; bottom: 1ex;\">th</span>&nbsp;Class examinations. The results can be checked online at &nbsp;mbpse.mponline.gov.in, mpbse.nic.in, jagranjosh.com, fastresult.in, livehindustan.com, mp10.abplive.com, and hindi.news18.com. The MP Board 10th result can also be checked on our  Result4u portal at result4u.in. The results can also be checked on several mobile apps including MPBSE Mobile app, MP Mobile app, and Fastresults app available on Google Play Store or MP Mobile App on Window App store. Here in the blog we will provide you the latest information on result, direct link, steps to check result online, pass percentage, topper list and other details.&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Check Now:</span><span id=\"more-1405\" style=\"border: 0px; margin: 0px; padding: 0px;\"></span></p><h2 style=\"border: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 30px; font-style: inherit; line-height: 1.2em;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-size: 14pt;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Many Website given here you can check result</span></span></h2><ul style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 3em; padding: 0px; list-style-position: initial; list-style-image: initial;\"><li style=\"border: 0px; margin: 0px; padding: 0px;\"><a title=\"\" href=\"http://mpbse.nic.in/\" style=\"color: rgb(30, 115, 190); cursor: pointer; border: 0px; margin: 0px; padding: 0px; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s;\">mpbse.nic.in</a></li><li style=\"border: 0px; margin: 0px; padding: 0px;\"><a title=\"\" href=\"http://mpresults.nic.in/\" style=\"color: rgb(30, 115, 190); cursor: pointer; border: 0px; margin: 0px; padding: 0px; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s;\">mpresults.nic.in</a></li><li style=\"border: 0px; margin: 0px; padding: 0px;\">hindi.news18.com</li><li style=\"border: 0px; margin: 0px; padding: 0px;\">livehindustan.com</li><li style=\"border: 0px; margin: 0px; padding: 0px;\">fastresult.in</li></ul></div>                                <!-- Place <em>some</em> <u>text</u> <strong>here</strong> -->\r\n                            ', 103, NULL, '', 1, 0, '', '', NULL, '2022-05-07 06:18:34'),
('p8', 93, 'MP Board 12th Result 2022 ( 29 April), MPBSE 12th Result @mpresults.nic.in', '<header class=\"entry-header\" style=\"overflow-wrap: break-word; color: rgb(58, 58, 58); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px;\"><h1 class=\"entry-title\" itemprop=\"headline\" style=\"border: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-family: Monda, sans-serif; font-size: 40px; font-style: inherit; line-height: 1.2em;\">MP Board 12th Result 2022 ( 29 April), MPBSE 12th Result @mpresults.nic.in</h1><div class=\"entry-meta\" style=\"border: 0px; margin: 0.5em 0px 0px; padding: 0px; font-size: 14.45px; line-height: 1.5; color: rgb(89, 89, 89);\"><span class=\"posted-on\" style=\"border: 0px; margin: 0px; padding: 0px;\"><a href=\"https://result4u.in/mp-board-12th-result/\" title=\"9:30 am\" rel=\"bookmark\" style=\"color: rgb(89, 89, 89); cursor: pointer; border: 0px; margin: 0px; padding: 0px; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s;\">April 27, 2022</a></span>&nbsp;<span class=\"byline\" style=\"border: 0px; margin: 0px; padding: 0px; display: inline;\">by&nbsp;<span class=\"author vcard\" itemprop=\"author\" itemtype=\"https://schema.org/Person\" itemscope=\"\" style=\"border: 0px; margin: 0px; padding: 0px;\"><a class=\"url fn n\" href=\"https://result4u.in/author/admin/\" title=\"View all posts by admin\" rel=\"author\" itemprop=\"url\" style=\"color: rgb(89, 89, 89); cursor: pointer; border: 0px; margin: 0px; padding: 0px; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s;\"><span class=\"author-name\" itemprop=\"name\" style=\"border: 0px; margin: 0px; padding: 0px;\">admin</span></a></span></span></div></header><div class=\"entry-content\" itemprop=\"text\" style=\"border: 0px; margin: 2em 0px 0px; padding: 0px; color: rgb(58, 58, 58); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 17px;\"><h2 style=\"border: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 30px; font-style: inherit; line-height: 1.2em;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-size: 12pt;\">MP Board Class 12 Result will be Declared on 29- April 2022 at 1 PM&nbsp;</span></span></h2><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MP Board Class 12 Result 2022</span>&nbsp;will be declared at 29th April 2022 at 1 PM. According to the official resources,&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; color: rgb(128, 0, 0);\">it is declared official notice for the&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">12th MP Board 2022 Result</span>&nbsp;in the 29th April 2022 at 1 PM.</span>&nbsp;Around 7.8 lakh students who have given the 12th class examination are eagerly waiting for&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MP Board Class 12 Result 2022</span>&nbsp;release date. However, due to the postponement of examination of last year 2021, this no exam of in the release of the result 2021. Last year, MP Board Result was released on July, 2021, and around 5.42 candidates out of 7.5 lakh qualified the exams successfully.</p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\">The notification was shared by the Madhya Pradesh Education Minister, Inder Singh Parmar. Taking to his official twitter account, Parmar has been announced that both the Class 10 and Class 12 results would be announced on April 29.<span id=\"more-1309\" style=\"border: 0px; margin: 0px; padding: 0px;\"></span></p><h2 style=\"border: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 30px; font-style: inherit; line-height: 1.2em;\">MP Board Class 12th Date &amp; Time</h2><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\">The MP Board 2022 result of class 12<span style=\"border: 0px; margin: 0px; padding: 0px; font-size: 12.75px; height: 0px; line-height: 0; position: relative; vertical-align: baseline; bottom: 1ex;\">th</span>&nbsp;will be released on the official website i.e.&nbsp;<a title=\"MP 12th Result 2020\" href=\"http://mpresults.nic.in/\" style=\"color: rgb(30, 115, 190); cursor: pointer; border: 0px; margin: 0px; padding: 0px; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">mpresults.nic.in</span></a>. and Result Date</p><table border=\"1px solid black\" width=\"100%\" cellspacing=\"2\" cellpadding=\"2\" style=\"border-width: 1px 0px 0px 1px; border-style: solid; border-color: rgba(0, 0, 0, 0.1); border-image: initial; margin: 0px 0px 1.5em; padding: 0px; border-collapse: separate; border-spacing: 0px; width: 725px;\"><tbody style=\"border: 0px; margin: 0px; padding: 0px;\"><tr align=\"center\" bgcolor=\"#FBA919\" style=\"border: 0px; margin: 0px; padding: 0px;\"><td colspan=\"4\" style=\"border-width: 0px 1px 1px 0px; border-style: solid; border-color: rgba(0, 0, 0, 0.1); border-image: initial; margin: 0px; padding: 8px; text-align: left;\"><center><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MP Board 12th Class exams&nbsp; and Result Date 2022</span></center></td></tr><tr align=\"center\" bgcolor=\"#CCC9F1\" style=\"border: 0px; margin: 0px; padding: 0px;\"><td style=\"border-width: 0px 1px 1px 0px; border-style: solid; border-color: rgba(0, 0, 0, 0.1); border-image: initial; margin: 0px; padding: 8px; text-align: left;\"><center><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">State Board</span></center></td><td style=\"border-width: 0px 1px 1px 0px; border-style: solid; border-color: rgba(0, 0, 0, 0.1); border-image: initial; margin: 0px; padding: 8px; text-align: left;\"><center><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Exam Name</span></center></td><td style=\"border-width: 0px 1px 1px 0px; border-style: solid; border-color: rgba(0, 0, 0, 0.1); border-image: initial; margin: 0px; padding: 8px; text-align: left;\"><center><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Exam Dates</span></center></td><td style=\"border-width: 0px 1px 1px 0px; border-style: solid; border-color: rgba(0, 0, 0, 0.1); border-image: initial; margin: 0px; padding: 8px; text-align: left;\"><center><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MPBSE Result Date</span></center></td></tr><tr align=\"center\" style=\"border: 0px; margin: 0px; padding: 0px;\"><td style=\"border-width: 0px 1px 1px 0px; border-style: solid; border-color: rgba(0, 0, 0, 0.1); border-image: initial; margin: 0px; padding: 8px; text-align: left;\"><center>MP Board</center></td><td style=\"border-width: 0px 1px 1px 0px; border-style: solid; border-color: rgba(0, 0, 0, 0.1); border-image: initial; margin: 0px; padding: 8px; text-align: left;\">12th</td><td style=\"border-width: 0px 1px 1px 0px; border-style: solid; border-color: rgba(0, 0, 0, 0.1); border-image: initial; margin: 0px; padding: 8px; text-align: left;\">17-Feb-To-12- March- 2022</td><td style=\"border-width: 0px 1px 1px 0px; border-style: solid; border-color: rgba(0, 0, 0, 0.1); border-image: initial; margin: 0px; padding: 8px; text-align: left;\">29th Aril 2022 at 1 PM</td></tr></tbody></table><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;\">&nbsp;</p><h2 style=\"border: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 30px; font-style: inherit; line-height: 1.2em; text-align: justify;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">How to Check MP Board 2022 Result for 12th Class?</span></h2><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\">The process of checking&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MP Board Class 12 Result 2022&nbsp;</span>for 12th is very easy. What they need to do is to follow these simple steps carefully. Below is a procedure mentioned that you need to go through:</p><ul style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 3em; padding: 0px; list-style-position: initial; list-style-image: initial; text-align: justify;\"><li style=\"border: 0px; margin: 0px; padding: 0px;\">To check<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">&nbsp;MP Board Class 12th Result 2022&nbsp;</span>online, you should mpresults.nic.in.</li><li style=\"border: 0px; margin: 0px; padding: 0px;\">In the next step, you come across a login window that you get after clicking on the MP board HSSC result 2022.</li><li style=\"border: 0px; margin: 0px; padding: 0px;\">Now, you need to enter your roll number in the respective field and make sure there are no errors and typos.</li><li style=\"border: 0px; margin: 0px; padding: 0px;\">Click on the ‘submit’ button and your computer screen will show you the&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Class 12th Result.</span></li></ul><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Note:</span></p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\">It is a suggestion to all the students to verify the details mentioned in the mark sheet. After the complete verification, you should download and take a print of&nbsp;<a title=\"MP Board Class 12th Result 2022\" href=\"https://result4u.in/mp-board-12th-result/\" target=\"_blank\" rel=\"noopener noreferrer\" style=\"color: rgb(30, 115, 190); cursor: pointer; border: 0px; margin: 0px; padding: 0px; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MP Board Class 12th result 2022</span></a>. In case, you find anything wrong or mistake in your mark sheet, you should contact the MP board for assistance.<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">&nbsp;</span></p><h2 style=\"border: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 30px; font-style: inherit; line-height: 1.2em; text-align: justify;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MP Board 12th Result 2022: Supplementary Exams</span></h2><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\">MP Board puts forward an opportunity to all the students who are unfortunately failed to clear any particular subject. To prove themselves, these candidates will have to apply and then appear for the supplementary examination that the MP Board will conduct in the month of August 2022. After the release of&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MP Board 12th Result 2022</span>&nbsp;in the month of July 2022 (highly expected), the supplementary examination will be conducted to take place. The students can visit the official website of the MP Board to check out the notification in regards to&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Class 12th Result.</span></p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\">On the other hand, students are suggested to bookmark&nbsp;<a href=\"https://result4u.in/\" style=\"color: rgb(30, 115, 190); cursor: pointer; border: 0px; margin: 0px; padding: 0px; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s;\">www.result4u.in</a>&nbsp;for any update regarding&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MPBSE 10th, 12th Result 2022</span>. Apart from that, if any kind of problem regarding the same takes place, you can get in touch with us at anytime from anywhere. We are here 24 hours a day to fetch the exact details from the officials and provide you with the right information in regards to the&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">MPBSE 12th Result 2022</span>.</p><h3 style=\"border: 0px; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 20px; font-style: inherit; line-height: 1.2em;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-size: 12pt;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Regarding FAQ Page For MP Board 12th Result 2022.</span></span></h3><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Que: What is a Official Website for MP Board Class 12th Result?</span></p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Ans:&nbsp;</span>mpresults.nic.in is a MP Board Official Website.</p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Que.</span>&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">When will the result for MP Board 12th will be declared?</span></p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Ans.</span>&nbsp;Madhya Pradesh Board has been declared MP Board 12th result in the 29 April 2022 at 1 PM.</p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Que.</span>&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">What is the passing marks to the MP Board class 12th exam?</span></p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Ans.</span>&nbsp;To Pass MP Board class 12th you will need 27th Mark instead of 33 Marks.</p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 1.5em; margin-left: 0px; padding: 0px; text-align: justify;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Que.</span>&nbsp;<span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">When will MP Board 12th supplementary exams be conducted date?</span></p><p style=\"border: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; text-align: justify;\"><span style=\"border: 0px; margin: 0px; padding: 0px; font-weight: 700;\">Ans.</span>&nbsp;MP Board will be conducting supplementary exams in the month of August 2022.</p></div>                                <!-- Place <em>some</em> <u>text</u> <strong>here</strong> -->\r\n                            ', 103, NULL, '', 1, 0, '', '', NULL, '2022-05-07 06:19:27');

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
('p6', 31, 68, 134, 1, 0, '2022-03-13 09:22:36'),
('p6', 32, 69, 133, 1, 1, '2022-03-14 04:56:15'),
('p6', 37, 74, 134, 1, 0, '2022-05-04 07:04:51'),
('p6', 38, 75, 147, 1, 0, '2022-05-04 07:57:06'),
('p6', 39, 76, 147, 1, 0, '2022-05-04 09:37:50'),
('p6', 40, 77, 147, 1, 0, '2022-05-04 09:41:28'),
('p6', 41, 78, 147, 1, 0, '2022-05-04 09:43:00'),
('p6', 42, 79, 148, 1, 0, '2022-05-04 09:44:16'),
('p6', 43, 80, 148, 1, 0, '2022-05-04 09:45:30'),
('p6', 44, 81, 148, 1, 0, '2022-05-04 09:46:09'),
('p6', 47, 84, 150, 1, 0, '2022-05-04 14:36:57'),
('p8', 55, 92, 155, 1, 0, '2022-05-07 06:18:34'),
('p8', 56, 93, 155, 1, 0, '2022-05-07 06:19:27');

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
('common', 27, 0, 11, 'Youtube Video PlayList', 0, 1),
('p8', 28, 0, 1121, 'NCERT Solutions For Class 12 Maths', 1, 1);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_app`
--
ALTER TABLE `table_app`
  MODIFY `app_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `table_category_master`
--
ALTER TABLE `table_category_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `table_content`
--
ALTER TABLE `table_content`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `table_content_master`
--
ALTER TABLE `table_content_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `table_flavour`
--
ALTER TABLE `table_flavour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_item_type`
--
ALTER TABLE `table_item_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `table_json`
--
ALTER TABLE `table_json`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
