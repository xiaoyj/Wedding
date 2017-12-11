-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015-02-07 02:03:57
-- 服务器版本: 5.5.38
-- PHP 版本: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wall1`
--

-- --------------------------------------------------------

--
-- 表的结构 `weixin_weibo_config`
--

CREATE TABLE IF NOT EXISTS `weixin_weibo_config` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `folllow` tinyint(1) NOT NULL DEFAULT '1',
  `mention` tinyint(1) NOT NULL DEFAULT '0',
  `letter` tinyint(1) NOT NULL DEFAULT '1',
  `erweima` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `weixin_weibo_config`
--

INSERT INTO `weixin_weibo_config` (`id`, `nickname`, `access_token`, `folllow`, `mention`, `letter`, `erweima`) VALUES
(1, 'dianplu', 'dianplu', 1, 0, 1, 'http://dianplu.sinaapp.com/wall/images/ma.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
