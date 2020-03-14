-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 مارس 2020 الساعة 19:28
-- إصدار الخادم: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arabic_news`
--

-- --------------------------------------------------------

--
-- بنية الجدول `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `ad_content` text CHARACTER SET utf8 NOT NULL,
  `ad_start_date` date NOT NULL,
  `ad_state` tinyint(1) NOT NULL,
  `ad_end_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `ad_link` text CHARACTER SET utf8 NOT NULL,
  `ad_customer_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- إرجاع أو استيراد بيانات الجدول `ads`
--

INSERT INTO `ads` (`ad_id`, `ad_content`, `ad_start_date`, `ad_state`, `ad_end_date`, `user_id`, `ad_link`, `ad_customer_id`, `pos_id`) VALUES
(1, '../img/default.png', '2020-02-01', 0, '2020-01-04', 10, 'https://www.youtube.com/watch?v=s69X9m19UZg', 1, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `ad_customer`
--

CREATE TABLE `ad_customer` (
  `ad_customer_id` int(11) NOT NULL,
  `ad_customer_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ad_customer_phone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ad_customer_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ad_customer_state` tinyint(1) NOT NULL,
  `ad_customer_company` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- إرجاع أو استيراد بيانات الجدول `ad_customer`
--

INSERT INTO `ad_customer` (`ad_customer_id`, `ad_customer_name`, `ad_customer_phone`, `ad_customer_email`, `ad_customer_state`, `ad_customer_company`) VALUES
(1, 'طاهر السماوي', '7700221536', 'm@gmail.com', 1, 'سماوي للدعاية والاعلان'),
(2, 'عزمان', '7700221536', 'm@hyh.com', 1, 'حضور');

-- --------------------------------------------------------

--
-- بنية الجدول `artical`
--

CREATE TABLE `artical` (
  `art_id` int(11) NOT NULL,
  `art_title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `art_content` text CHARACTER SET utf8 NOT NULL,
  `art_date` date NOT NULL,
  `art_user` int(1) NOT NULL,
  `art_cat` text CHARACTER SET utf8 NOT NULL,
  `art_state` int(1) NOT NULL,
  `art_img` text CHARACTER SET utf8 NOT NULL,
  `art_publish_date` datetime NOT NULL,
  `art_updates` text CHARACTER SET utf8 NOT NULL,
  `art_intro` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- إرجاع أو استيراد بيانات الجدول `artical`
--

INSERT INTO `artical` (`art_id`, `art_title`, `art_content`, `art_date`, `art_user`, `art_cat`, `art_state`, `art_img`, `art_publish_date`, `art_updates`, `art_intro`) VALUES
(41, 'مقال1', '<p>&nbsp;نص المقال الاول&nbsp; نص المقال الاول&nbsp; نص المقال الاول&nbsp; نص المقال الاول&nbsp; نص المقال الاول&nbsp; نص المقال الاول&nbsp; نص المقال الاول&nbsp; نص المقال الاول&nbsp; نص المقال الاول&nbsp; نص المقال الاول&nbsp; نص المقال الاول&nbsp; نص المقال الاول&nbsp;</p>', '2019-12-24', 10, '1', 0, '../img/1577184954.jpg', '2019-12-25 02:02:00', '', 'الاول الاول الاول الاول الاول الاول الاول الاول الاول الاول '),
(42, 'المقال 2', '<p>نص المقال الثاني نص المقال الثاني نص المقال الثاني نص المقال الثاني نص المقال الثاني نص المقال الثاني نص المقال الثاني&nbsp;</p>', '2019-12-24', 10, '2', 1, '../img/1577185059.jpg', '2019-12-27 09:00:00', '', 'الثاني الثاني الثاني الثاني الثاني الثاني الثاني الثاني الثاني الثاني الثاني الثاني ');

-- --------------------------------------------------------

--
-- بنية الجدول `breakingnews`
--

CREATE TABLE `breakingnews` (
  `break_id` int(11) NOT NULL,
  `break_content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `break_date` date NOT NULL,
  `break_state` tinyint(1) NOT NULL,
  `break_duration_min` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- إرجاع أو استيراد بيانات الجدول `breakingnews`
--

INSERT INTO `breakingnews` (`break_id`, `break_content`, `break_date`, `break_state`, `break_duration_min`, `user_id`) VALUES
(1, '<p>يا ليالي يا ليالي قالوا القات غالي</p>', '0000-00-00', 0, 10, 3),
(2, '<p>يا ليالي يا ليالي قالوا القات غالي</p>', '2019-12-30', 1, 10, 1),
(3, '<p>يا ضبي يا نافر عنا ويا هاجر</p>', '2019-12-30', 1, 10, 13),
(4, '<p>وزمنبينمسية</p>', '2019-12-30', 0, 10, 1),
(5, '<p>منبتمنشس</p>', '2019-12-30', 1, 1, 10);

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `cat_major` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `cat_add_date` datetime NOT NULL,
  `cat_state` int(11) NOT NULL,
  `cat_updates` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_major`, `user_id`, `cat_add_date`, `cat_state`, `cat_updates`) VALUES
(1, 'رياضة', 0, 10, '0000-00-00 00:00:00', 1, ''),
(2, 'اقتصاد', 0, 10, '0000-00-00 00:00:00', 0, ''),
(3, 'سياسة', 0, 1, '0000-00-00 00:00:00', 1, ''),
(4, 'مصر', 3, 10, '0000-00-00 00:00:00', 0, ''),
(5, 'اليمن', 3, 1, '0000-00-00 00:00:00', 1, ''),
(7, 'السعودية', 3, 10, '2019-12-24 15:04:53', 1, ''),
(8, 'فلسطين', 3, 10, '2019-12-25 15:17:27', 1, ''),
(9, 'كأس العالم', 1, 10, '2019-12-25 15:20:57', 1, ''),
(10, 'الاولمبياد', 1, 10, '2019-12-25 15:21:26', 1, ''),
(11, 'العراق', 3, 10, '2019-12-27 12:03:15', 1, ''),
(12, 'تنس الطاولة', 1, 10, '2019-12-27 12:04:50', 1, ''),
(13, 'سباحة', 1, 10, '2019-12-27 12:05:41', 1, ''),
(14, 'داعش', 3, 10, '2019-12-27 16:45:57', 1, ''),
(15, 'البرامج', 0, 10, '2019-12-27 16:47:15', 1, ''),
(16, 'صحة', 0, 10, '2019-12-27 16:53:39', 1, ''),
(17, 'ثقافة', 0, 10, '2019-12-27 16:54:22', 1, ''),
(18, 'الطب البديل', 16, 10, '2019-12-27 16:55:25', 1, ''),
(19, 'مصارعة', 1, 10, '2019-12-27 17:30:40', 1, ''),
(20, 'كرة طائرة', 1, 10, '2019-12-27 17:32:40', 1, ''),
(21, 'مصارعة رومانية', 1, 10, '2019-12-27 17:37:22', 1, ''),
(22, 'رياضة نسائية', 1, 10, '2019-12-27 18:03:55', 1, ''),
(23, 'تكنولوجيا', 0, 10, '2019-12-27 18:06:15', 1, ''),
(24, 'كرة سلة', 1, 10, '2020-01-09 15:28:57', 1, ''),
(25, 'كرة سلة', 1, 10, '2020-01-09 15:29:00', 1, ''),
(26, 'كرة سلة', 1, 10, '2020-01-09 15:29:02', 1, ''),
(27, 'كرة سلة', 1, 10, '2020-01-09 15:29:03', 1, ''),
(28, 'كرة سلة', 1, 10, '2020-01-09 15:29:03', 1, ''),
(29, 'كرة سلة', 1, 10, '2020-01-09 15:29:06', 1, ''),
(30, 'كرة سلة', 1, 10, '2020-01-09 15:29:06', 1, ''),
(31, 'كرة سلة', 1, 10, '2020-01-09 15:29:06', 1, ''),
(32, 'كرة سلة', 1, 10, '2020-01-09 15:29:07', 1, ''),
(33, 'كرة سلة', 1, 10, '2020-01-09 15:29:07', 1, ''),
(34, 'كرة سلة', 1, 10, '2020-01-09 15:29:07', 1, ''),
(35, 'كرة سلة', 1, 10, '2020-01-09 15:29:07', 1, ''),
(36, 'كرة سلة', 1, 10, '2020-01-09 15:29:07', 1, ''),
(37, 'كرة سلة', 1, 10, '2020-01-09 15:29:07', 1, ''),
(38, 'كرة سلة', 1, 10, '2020-01-09 15:29:22', 1, ''),
(39, 'كرة سلة', 1, 10, '2020-01-09 15:29:23', 1, ''),
(40, 'كرة سلة', 1, 10, '2020-01-09 15:29:23', 1, ''),
(41, 'كرة سلة', 1, 10, '2020-01-09 15:29:23', 1, ''),
(42, 'كرة سلة', 1, 10, '2020-01-09 15:29:23', 1, '');

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

CREATE TABLE `comments` (
  `comm_id` int(11) NOT NULL,
  `comm_content` text CHARACTER SET utf8 NOT NULL,
  `comm_date` date NOT NULL,
  `comm_user` int(1) NOT NULL,
  `comm_art` int(1) NOT NULL,
  `comm_state` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- إرجاع أو استيراد بيانات الجدول `comments`
--

INSERT INTO `comments` (`comm_id`, `comm_content`, `comm_date`, `comm_user`, `comm_art`, `comm_state`) VALUES
(1, '\0\0E\0\0G\0\0*\0\0*\0\0G\0\0F\0\0\0 ', '2019-12-14', 1, 1, 1),
(2, '\0\0E\0\0G\0\0*\0\0*\0\0G\0\0F\0\0\0 ', '2019-12-14', 1, 1, 1),
(3, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0`\0\0\0?\0\0`', '2019-12-15', 2, 0, 0),
(4, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0`\0\0\0?\0\0`', '2019-12-15', 2, 0, 0),
(5, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0`\0\0\0?\0\0`', '2019-12-15', 2, 0, 0),
(6, '\0\0\0?\0\0 !\0\0\0?\0\0 \0\0\0?\0\0\0?', '2019-12-15', 2, 0, 0),
(7, '\0\0\0?\0\0 !\0\0\0?\0\0 \0\0\0?\0\0\0?', '2019-12-15', 2, 0, 0),
(8, '\0\0\0?\0\0 !\0\0\0?\0\0 \0\0\0?\0\0\0?', '2019-12-15', 2, 1, 0),
(9, '\0\0\0?\0\0 !\0\0\0?\0\0 \0\0\0?\0\0\0?', '2019-12-15', 2, 1, 0),
(10, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0`\0\0\0?\0\0`', '2019-12-15', 2, 1, 0),
(11, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0`\0\0\0?\0\0`', '2019-12-15', 2, 1, 0),
(12, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0`\0\0\0?\0\0`', '2019-12-15', 2, 1, 0),
(13, '\0\0\0?\0\0 !\0\0\0?\0\0 \0\0\0?\0\0\0?', '2019-12-15', 2, 1, 0),
(14, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0`\0\0\0?\0\0`', '2019-12-15', 2, 1, 0),
(15, '\0\0\0f', '2019-12-15', 2, 1, 0),
(16, '\0\0\0f', '2019-12-15', 2, 1, 0),
(17, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?', '2019-12-15', 1, 1, 0),
(18, '\0\0\0?\0\0 !\0\0\0?\0\0 \0\0\0?\0\0\0?', '2019-12-15', 1, 1, 0),
(19, 'dddd', '2020-01-08', 10, 42, 1),
(20, 'ss', '2020-01-08', 10, 42, 1),
(21, 'se', '2020-01-08', 10, 42, 1),
(22, 'ddffff', '2020-01-09', 10, 42, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `group`
--

CREATE TABLE `group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `privillage_ids` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- بنية الجدول `privillage`
--

CREATE TABLE `privillage` (
  `priv_id` int(11) NOT NULL,
  `priv_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `priv_state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `user_pass` text CHARACTER SET utf8 NOT NULL,
  `user_email` text CHARACTER SET utf8 NOT NULL,
  `user_sex` int(1) NOT NULL,
  `user_group_id` int(1) NOT NULL,
  `user_img` text CHARACTER SET utf8 NOT NULL,
  `user_state` int(1) NOT NULL,
  `user_reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_sex`, `user_group_id`, `user_img`, `user_state`, `user_reg_date`) VALUES
(1, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0 \0\0\0?\0\0\0?\0\0\0?\0\0', '\0\0\02\0\0\00\0\0\02\0\0\0c\0\0\0b\0\0\09\0\0\06\0\0\02\0\0\0a\0\0\0c\0\0\05\0\0\09\0\0\00\0\0\07\0\0\05\0\0\0b\0\0\09\0\0\06\0\0\04\0\0\0b\0\0\00\0\0\07\0\0\01\0\0\05\0\0\02\0\0\0d\0\0\02\0\0\03\0\0\04\0\0\0b\0\0\07\0\0\00', '\0\0\0m\0\0\0o\0\0\0h\0\0\0a\0\0\0m\0\0\0m\0\0\0e\0\0\0d\0\0\0h\0\0\0o\0\0\0m\0\0\0i\0\0\0d\0\0\0y\0\0\0@\0\0\0g\0\0\0m\0\0\0a\0\0\0i\0\0\0l\0\0\0.\0\0\0c\0\0\0o\0\0\0m', 0, 1, '\0\0\0i\0\0\0m\0\0\0g\0\0\0/\0\0\0d\0\0\0e\0\0\0f\0\0\0a\0\0\0u\0\0\0l\0\0\0t\0\0\0.\0\0\0p\0\0\0n\0\0\0g', 1, '0000-00-00'),
(2, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0 \0\0\0?\0\0\0?\0\0\0?\0\0', '\0\0\0d\0\0\04\0\0\01\0\0\0d\0\0\08\0\0\0c\0\0\0d\0\0\09\0\0\08\0\0\0f\0\0\00\0\0\00\0\0\0b\0\0\02\0\0\00\0\0\04\0\0\0e\0\0\09\0\0\08\0\0\00\0\0\00\0\0\09\0\0\09\0\0\08\0\0\0e\0\0\0c\0\0\0f\0\0\08\0\0\04\0\0\02\0\0\07\0\0\0e', '\0\0\0m\0\0\0o\0\0\0h\0\0\0a\0\0\0m\0\0\0m\0\0\0e\0\0\0d\0\0\0h\0\0\0o\0\0\0m\0\0\0i\0\0\0d\0\0\0y\0\0\0@\0\0\0g\0\0\0m\0\0\0a\0\0\0i\0\0\0l\0\0\0.\0\0\0c\0\0\0o\0\0\0m', 0, 1, '\0\0\0i\0\0\0m\0\0\0g\0\0\0/\0\0\0d\0\0\0e\0\0\0f\0\0\0a\0\0\0u\0\0\0l\0\0\0t\0\0\0.\0\0\0p\0\0\0n\0\0\0g', 1, '0000-00-00'),
(3, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0 \0\0\0?\0\0\0?\0\0\0?\0\0', '\0\0\02\0\0\00\0\0\02\0\0\0c\0\0\0b\0\0\09\0\0\06\0\0\02\0\0\0a\0\0\0c\0\0\05\0\0\09\0\0\00\0\0\07\0\0\05\0\0\0b\0\0\09\0\0\06\0\0\04\0\0\0b\0\0\00\0\0\07\0\0\01\0\0\05\0\0\02\0\0\0d\0\0\02\0\0\03\0\0\04\0\0\0b\0\0\07\0\0\00', '\0\0\0m\0\0\0o\0\0\0h\0\0\0a\0\0\0m\0\0\0m\0\0\0e\0\0\0d\0\0\0h\0\0\0o\0\0\0m\0\0\0i\0\0\0d\0\0\0y\0\0\0@\0\0\0g\0\0\0m\0\0\0a\0\0\0i\0\0\0l\0\0\0.\0\0\0c\0\0\0o\0\0\0m', 0, 1, '\0\0\0i\0\0\0m\0\0\0g\0\0\0/\0\0\0d\0\0\0e\0\0\0f\0\0\0a\0\0\0u\0\0\0l\0\0\0t\0\0\0.\0\0\0p\0\0\0n\0\0\0g', 0, '0000-00-00'),
(4, '\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?', '\0\0\02\0\0\00\0\0\02\0\0\0c\0\0\0b\0\0\09\0\0\06\0\0\02\0\0\0a\0\0\0c\0\0\05\0\0\09\0\0\00\0\0\07\0\0\05\0\0\0b\0\0\09\0\0\06\0\0\04\0\0\0b\0\0\00\0\0\07\0\0\01\0\0\05\0\0\02\0\0\0d\0\0\02\0\0\03\0\0\04\0\0\0b\0\0\07\0\0\00', '\0\0\0n\0\0\0@\0\0\0k\0\0\0k\0\0\0.\0\0\0c\0\0\0o\0\0\0m', 0, 1, '\0\0\0i\0\0\0m\0\0\0g\0\0\0/\0\0\01\0\0\05\0\0\07\0\0\06\0\0\03\0\0\09\0\0\02\0\0\06\0\0\04\0\0\01\0\0\0.\0\0\0j\0\0\0p\0\0\0g', 1, '0000-00-00'),
(5, '\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0\0?\0\0 &\0\0\0?\0\0\0?\0\0\0?\0\0  ', '\0\0\02\0\0\00\0\0\02\0\0\0c\0\0\0b\0\0\09\0\0\06\0\0\02\0\0\0a\0\0\0c\0\0\05\0\0\09\0\0\00\0\0\07\0\0\05\0\0\0b\0\0\09\0\0\06\0\0\04\0\0\0b\0\0\00\0\0\07\0\0\01\0\0\05\0\0\02\0\0\0d\0\0\02\0\0\03\0\0\04\0\0\0b\0\0\07\0\0\00', '\0\0\0a\0\0\0z\0\0\0@\0\0\0g\0\0\0m\0\0\0a\0\0\0i\0\0\0l\0\0\0.\0\0\0c\0\0\0o\0\0\0m', 0, 2, '\0\0\0i\0\0\0m\0\0\0g\0\0\0/\0\0\01\0\0\05\0\0\07\0\0\06\0\0\04\0\0\00\0\0\05\0\0\09\0\0\05\0\0\02\0\0\0.\0\0\0j\0\0\0p\0\0\0g', 0, '0000-00-00'),
(6, 'joe', '123', 'm@m.com', 1, 1, 'ssss.jpg', 1, '1996-02-02'),
(9, 'hamood', '123', 'h@h.com', 1, 1, 'dsdsd.jpg', 0, '2019-12-21'),
(10, 'abo7midi', '202cb962ac59075b964b07152d234b70', 'm@m.m', 1, 1, 'img/default.png', 1, '2019-12-23'),
(11, 'سعد علوش', '123', 's@s.s', 1, 1, 'img/1578553255.jpg', 0, '2020-01-09'),
(14, 'احمد سعد', '202cb962ac59075b964b07152d234b70', 'a@a.a', 1, 2, 'img/1578554989.jpg', 0, '2020-01-09');

-- --------------------------------------------------------

--
-- بنية الجدول `websitpositions`
--

CREATE TABLE `websitpositions` (
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pos_state` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pos_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- إرجاع أو استيراد بيانات الجدول `websitpositions`
--

INSERT INTO `websitpositions` (`pos_id`, `pos_name`, `pos_state`, `user_id`, `pos_date`) VALUES
(1, 'header', 1, 10, '2020-01-06'),
(2, 'footer', 1, 10, '2020-01-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `ad_customer`
--
ALTER TABLE `ad_customer`
  ADD PRIMARY KEY (`ad_customer_id`);

--
-- Indexes for table `artical`
--
ALTER TABLE `artical`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `breakingnews`
--
ALTER TABLE `breakingnews`
  ADD PRIMARY KEY (`break_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `privillage`
--
ALTER TABLE `privillage`
  ADD PRIMARY KEY (`priv_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `websitpositions`
--
ALTER TABLE `websitpositions`
  ADD PRIMARY KEY (`pos_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ad_customer`
--
ALTER TABLE `ad_customer`
  MODIFY `ad_customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artical`
--
ALTER TABLE `artical`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `breakingnews`
--
ALTER TABLE `breakingnews`
  MODIFY `break_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privillage`
--
ALTER TABLE `privillage`
  MODIFY `priv_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `websitpositions`
--
ALTER TABLE `websitpositions`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
