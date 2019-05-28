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
('test', '2019-05-26 22:01:02', 18, 6),
('test', '2019-05-26 22:10:35', 5, 2),
('test', '2019-05-26 22:10:35', 8, 2),
('test', '2019-05-26 22:10:35', 10, 2),
('test', '2019-05-26 22:10:53', 0, 0),
('test', '2019-05-26 22:10:53', 6, 0),
('test', '2019-05-26 22:11:06', 7, 5),
('test', '2019-05-26 22:11:06', 16, 5),
('test', '2019-05-26 22:11:26', 6, 2),
('test', '2019-05-26 22:13:34', 2, 3),
('test', '2019-05-26 22:13:34', 8, 3),
('test', '2019-05-26 22:13:49', 0, 0),
('test', '2019-05-26 22:13:49', 3, 0),
('test', '2019-05-26 22:13:49', 4, 0),
('test', '2019-05-26 22:13:55', 3, 3),
('test', '2019-05-26 22:13:55', 62, 3),
('test', '2019-05-26 22:13:55', 74, 3),
('test', '2019-05-26 22:15:25', 1, 0),
('test3', '2019-05-27 06:33:34', 7, 3),
('test4', '2019-05-27 08:23:23', 9, 5),
('test4', '2019-05-27 08:23:35', 6, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
