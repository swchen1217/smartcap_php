-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 192.168.2.200:3306
-- 產生時間： 2019 年 05 月 27 日 22:58
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
('test', '2019-05-26 22:01:02', '2019-05-26 22:01:05', 243),
('test', '2019-05-26 22:01:02', '2019-05-26 22:01:08', 80),
('test', '2019-05-26 22:01:02', '2019-05-26 22:01:13', 4273),
('test', '2019-05-26 22:01:02', '2019-05-26 22:01:15', 441),
('test', '2019-05-26 22:01:02', '2019-05-26 22:01:17', 2041),
('test', '2019-05-26 22:01:02', '2019-05-26 22:01:18', 838),
('test', '2019-05-26 22:10:35', '2019-05-26 22:10:39', 1186),
('test', '2019-05-26 22:10:35', '2019-05-26 22:10:38', 149),
('test', '2019-05-26 22:11:06', '2019-05-26 22:11:07', 617),
('test', '2019-05-26 22:11:06', '2019-05-26 22:11:09', 991),
('test', '2019-05-26 22:11:06', '2019-05-26 22:11:11', 993),
('test', '2019-05-26 22:11:06', '2019-05-26 22:11:11', 604),
('test', '2019-05-26 22:11:06', '2019-05-26 22:11:12', 230),
('test', '2019-05-26 22:11:26', '2019-05-26 22:11:29', 977),
('test', '2019-05-26 22:11:26', '2019-05-26 22:11:31', 1839),
('test', '2019-05-26 22:13:34', '2019-05-26 22:13:35', 195),
('test', '2019-05-26 22:13:34', '2019-05-26 22:13:36', 846),
('test', '2019-05-26 22:13:34', '2019-05-26 22:13:36', 204),
('test', '2019-05-26 22:13:55', '2019-05-26 22:13:57', 778),
('test', '2019-05-26 22:13:55', '2019-05-26 22:13:58', 390),
('test', '2019-05-26 22:13:55', '2019-05-26 22:13:58', 185),
('ss', '2019-05-26 22:13:55', '2019-05-26 22:13:58', 185),
('ss', '2019-05-26 22:13:55', '2019-05-26 22:13:58', 185),
('ss', '2019-05-26 22:15:55', '2019-05-26 22:13:58', 185),
('ss', '2019-05-26 22:15:55', '2019-05-26 22:13:58', 185),
('ss', '2019-05-26 22:15:55', '2019-05-26 22:13:58', 185),
('ss', '2019-05-26 22:15:55', '2019-05-26 22:13:58', 185),
('ss', '2019-05-26 22:15:55', '2019-05-26 22:13:58', 185),
('ss', '2019-05-26 22:15:55', '2019-05-26 22:13:58', 185),
('ss', '0000-00-00 00:00:00', '2019-05-26 22:13:58', 185),
('ss', '0000-00-00 00:00:00', '2019-05-26 22:13:58', 185),
('ss', '0000-00-00 00:00:00', '2019-05-26 22:13:58', 185),
('ss', '2019-05-26 22:15:55', '2019-05-26 22:13:58', 185),
('ss', '2019-05-26 22:16:55', '2019-05-26 22:13:58', 185),
('ee', '2019-05-26 22:16:55', '2019-05-26 22:13:58', 185),
('ee', '2019-05-26 22:16:55', '2019-05-26 22:13:58', 1856),
('test3', '2019-05-27 06:33:34', '2019-05-27 06:33:37', 796),
('test3', '2019-05-27 06:33:34', '2019-05-27 06:33:38', 840),
('test3', '2019-05-27 06:33:34', '2019-05-27 06:33:40', 1015),
('test4', '2019-05-27 08:23:23', '2019-05-27 08:23:25', 605),
('test4', '2019-05-27 08:23:23', '2019-05-27 08:23:26', 1003),
('test4', '2019-05-27 08:23:23', '2019-05-27 08:23:27', 600),
('test4', '2019-05-27 08:23:23', '2019-05-27 08:23:28', 391),
('test4', '2019-05-27 08:23:23', '2019-05-27 08:23:31', 3007),
('test4', '2019-05-27 08:23:35', '2019-05-27 08:23:37', 815),
('test4', '2019-05-27 08:23:35', '2019-05-27 08:23:40', 2804);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;