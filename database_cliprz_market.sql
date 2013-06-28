-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 28, 2013 at 11:04 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cliprz_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `market_citys`
--

CREATE TABLE IF NOT EXISTS `market_citys` (
  `cityid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cityid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `market_citys`
--

INSERT INTO `market_citys` (`cityid`, `name_city`) VALUES
(1, 'KSA'),
(2, 'USE'),
(3, 'RU'),
(4, 'FR'),
(5, 'BR');

-- --------------------------------------------------------

--
-- Table structure for table `market_products`
--

CREATE TABLE IF NOT EXISTS `market_products` (
  `prodcutid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(8) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fixed` tinyint(1) unsigned NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `id_section` int(11) unsigned NOT NULL,
  `id_user` int(11) unsigned NOT NULL,
  `id_city` int(11) unsigned NOT NULL,
  PRIMARY KEY (`prodcutid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `market_products`
--


-- --------------------------------------------------------

--
-- Table structure for table `market_sections`
--

CREATE TABLE IF NOT EXISTS `market_sections` (
  `sectionid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) unsigned NOT NULL,
  `visit` int(11) unsigned NOT NULL,
  PRIMARY KEY (`sectionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `market_sections`
--

INSERT INTO `market_sections` (`sectionid`, `title`, `active`, `visit`) VALUES
(1, 'Cars', 1, 0),
(2, 'Computer', 1, 0),
(3, 'Mobile', 1, 0),
(4, 'Tools', 1, 0),
(5, 'Programs', 1, 0),
(6, 'Sites', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `market_settings`
--

CREATE TABLE IF NOT EXISTS `market_settings` (
  `status_site` tinyint(1) unsigned NOT NULL,
  `name_site` int(11) NOT NULL,
  `status_register_user` tinyint(1) unsigned NOT NULL,
  `msg_close_register_user` text COLLATE utf8_unicode_ci NOT NULL,
  `msg_close_site` text COLLATE utf8_unicode_ci NOT NULL,
  `msg_close_add_product` text COLLATE utf8_unicode_ci NOT NULL,
  `visit_site` int(11) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `market_settings`
--

INSERT INTO `market_settings` (`status_site`, `name_site`, `status_register_user`, `msg_close_register_user`, `msg_close_site`, `msg_close_add_product`, `visit_site`) VALUES
(1, 0, 0, 'Sorry Register Close now .', 'Sorry Site Close .\r\n', 'Sorry Add Close Now .', 400);

-- --------------------------------------------------------

--
-- Table structure for table `market_usergroup`
--

CREATE TABLE IF NOT EXISTS `market_usergroup` (
  `groupid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_group` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) unsigned NOT NULL,
  `can_login` tinyint(1) unsigned NOT NULL,
  `add_product` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `market_usergroup`
--

INSERT INTO `market_usergroup` (`groupid`, `name_group`, `is_admin`, `can_login`, `add_product`) VALUES
(1, 'Administers', 1, 1, 1),
(2, 'VIP', 0, 1, 1),
(3, 'Users', 0, 1, 1),
(4, 'Guests', 0, 1, 0),
(5, 'Not Active', 0, 0, 0),
(6, 'Blocking', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `market_users`
--

CREATE TABLE IF NOT EXISTS `market_users` (
  `userid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(3) unsigned NOT NULL,
  `id_group` int(11) unsigned NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `market_users`
--

INSERT INTO `market_users` (`userid`, `username`, `email`, `password`, `salt`, `active`, `id_group`) VALUES
(1, 'Admin', 'admin@cliprz-market.com', '66de5487deab7b95cabc624d341a9c4a', 'W2jIT!&u#YfTX32', 1, 1),
(2, 'User', 'user@cliprz-market.com', 'f6a463954d9f25e68f5a044f091c05f8', 'swmP3*FLRnGcG#@', 1, 3),
(3, 'Block', 'block@cliprz-market.com', '94f3e96f566371bf05e12eca65506697', 'aPcSlAmq4ZJXkzs', 1, 6);
