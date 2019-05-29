-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 192.168.2.200:3306
-- 產生時間： 2019 年 05 月 29 日 20:13
-- 伺服器版本: 10.3.13-MariaDB
-- PHP 版本： 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `swchenli_smartcap`
--

-- --------------------------------------------------------

--
-- 資料表結構 `mainlogtb`
--

CREATE TABLE `mainlogtb` (
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `starttime` datetime NOT NULL,
  `usetime` int(10) NOT NULL,
  `ngtimes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `mainlogtb`
--

INSERT INTO `mainlogtb` (`user`, `starttime`, `usetime`, `ngtimes`) VALUES
('user02', '2019-05-29 16:00:12', 150, 7),
('user01', '2019-05-29 16:16:51', 150, 18),
('user03', '2019-05-29 16:27:14', 150, 11),
('user04', '2019-05-29 16:33:14', 150, 3),
('user05', '2019-05-29 16:37:18', 151, 0),
('user06', '2019-05-29 16:46:56', 150, 10),
('user07', '2019-05-29 16:51:34', 151, 13),
('user08', '2019-05-29 16:59:15', 151, 4),
('user09', '2019-05-29 17:09:30', 150, 7);

-- --------------------------------------------------------

--
-- 資料表結構 `slogtb`
--

CREATE TABLE `slogtb` (
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `starttime` datetime NOT NULL,
  `ngtime` datetime NOT NULL,
  `ngsecond` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `slogtb`
--

INSERT INTO `slogtb` (`user`, `starttime`, `ngtime`, `ngsecond`) VALUES
('user02', '2019-05-29 16:00:12', '2019-05-29 16:00:23', 202),
('user02', '2019-05-29 16:00:12', '2019-05-29 16:00:23', 274),
('user02', '2019-05-29 16:00:12', '2019-05-29 16:00:25', 1004),
('user02', '2019-05-29 16:00:12', '2019-05-29 16:00:37', 607),
('user02', '2019-05-29 16:00:12', '2019-05-29 16:00:45', 266),
('user02', '2019-05-29 16:00:12', '2019-05-29 16:01:05', 266),
('user02', '2019-05-29 16:00:12', '2019-05-29 16:01:06', 603),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:16:59', 300),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:17:00', 803),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:17:01', 792),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:17:04', 2215),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:17:08', 4427),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:17:23', 274),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:17:26', 3425),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:17:27', 201),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:17:29', 1613),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:17:43', 1210),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:17:46', 395),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:17:49', 2618),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:18:14', 6034),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:18:36', 14464),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:18:52', 9445),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:19:04', 9040),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:19:13', 6229),
('user01', '2019-05-29 16:16:51', '2019-05-29 16:19:20', 2212),
('user03', '2019-05-29 16:27:14', '2019-05-29 16:27:26', 6027),
('user03', '2019-05-29 16:27:14', '2019-05-29 16:27:37', 4822),
('user03', '2019-05-29 16:27:14', '2019-05-29 16:27:44', 267),
('user03', '2019-05-29 16:27:14', '2019-05-29 16:27:49', 4026),
('user03', '2019-05-29 16:27:14', '2019-05-29 16:28:06', 3619),
('user03', '2019-05-29 16:27:14', '2019-05-29 16:28:19', 4629),
('user03', '2019-05-29 16:27:14', '2019-05-29 16:28:23', 271),
('user03', '2019-05-29 16:27:14', '2019-05-29 16:28:41', 3822),
('user03', '2019-05-29 16:27:14', '2019-05-29 16:28:52', 2617),
('user03', '2019-05-29 16:27:14', '2019-05-29 16:29:07', 4219),
('user03', '2019-05-29 16:27:14', '2019-05-29 16:29:19', 3822),
('user04', '2019-05-29 16:33:14', '2019-05-29 16:34:09', 4416),
('user04', '2019-05-29 16:33:14', '2019-05-29 16:34:39', 3420),
('user04', '2019-05-29 16:33:14', '2019-05-29 16:35:18', 1206),
('user06', '2019-05-29 16:46:56', '2019-05-29 16:46:57', 273),
('user06', '2019-05-29 16:46:56', '2019-05-29 16:47:14', 2415),
('user06', '2019-05-29 16:46:56', '2019-05-29 16:47:23', 1408),
('user06', '2019-05-29 16:46:56', '2019-05-29 16:47:26', 2615),
('user06', '2019-05-29 16:46:56', '2019-05-29 16:47:42', 3421),
('user06', '2019-05-29 16:46:56', '2019-05-29 16:48:15', 200),
('user06', '2019-05-29 16:46:56', '2019-05-29 16:48:14', 3416),
('user06', '2019-05-29 16:46:56', '2019-05-29 16:48:34', 4222),
('user06', '2019-05-29 16:46:56', '2019-05-29 16:48:37', 396),
('user06', '2019-05-29 16:46:56', '2019-05-29 16:48:59', 2812),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:52:05', 1605),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:52:22', 4024),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:52:48', 2414),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:52:49', 200),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:53:06', 5228),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:53:08', 193),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:53:23', 1811),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:53:31', 1609),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:53:40', 1614),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:53:44', 265),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:53:45', 190),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:53:46', 1004),
('user07', '2019-05-29 16:51:34', '2019-05-29 16:53:53', 806),
('user08', '2019-05-29 16:59:15', '2019-05-29 16:59:28', 264),
('user08', '2019-05-29 16:59:15', '2019-05-29 16:59:40', 269),
('user08', '2019-05-29 16:59:15', '2019-05-29 16:59:43', 188),
('user08', '2019-05-29 16:59:15', '2019-05-29 17:01:04', 402),
('user09', '2019-05-29 17:09:30', '2019-05-29 17:09:30', 276),
('user09', '2019-05-29 17:09:30', '2019-05-29 17:10:16', 203),
('user09', '2019-05-29 17:09:30', '2019-05-29 17:10:16', 11054),
('user09', '2019-05-29 17:09:30', '2019-05-29 17:10:17', 200),
('user09', '2019-05-29 17:09:30', '2019-05-29 17:10:59', 7036),
('user09', '2019-05-29 17:09:30', '2019-05-29 17:11:01', 200),
('user09', '2019-05-29 17:09:30', '2019-05-29 17:11:43', 2813);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
