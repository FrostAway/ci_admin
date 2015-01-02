-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2015 at 12:56 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ci_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `data_type` varchar(20) NOT NULL,
  `attr_group_id` int(11) NOT NULL,
  `default` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `data_type`, `attr_group_id`, `default`) VALUES
(1, 'Bộ nhớ RAM', 'number', 3, '0'),
(2, 'Dung lượng ổ cứng', 'text', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `attr_group`
--

CREATE TABLE IF NOT EXISTS `attr_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `attr_group`
--

INSERT INTO `attr_group` (`id`, `name`) VALUES
(1, 'Laptop'),
(2, 'Bàn ghế'),
(3, 'Máy tính để bàn');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `show_in_menu` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `tag_title` varchar(255) NOT NULL,
  `tag_description` text NOT NULL,
  `tag_keywords` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `show_in_menu`, `sort_order`, `parent_id`, `tag_title`, `tag_description`, `tag_keywords`, `status`) VALUES
(1, 'Máy tính', 'May-tinh', 0, 1, 0, 'may tinh', 'may tinh', 'may tinh', 1),
(2, 'Thời trang', 'Thoi-trang', 1, 2, 0, 'thoi trang', 'thoi trang', 'thoi trang', 1),
(3, 'Nội thất', 'Noi-that', 1, 3, 0, 'Nội thất', 'Nội thất', 'Nội thất', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bill_code` varchar(70) NOT NULL,
  `order_time` datetime NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `order_info` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `model` int(11) NOT NULL,
  `price` decimal(15,4) unsigned NOT NULL,
  `discount` decimal(15,4) NOT NULL,
  `discount_type` tinyint(1) NOT NULL DEFAULT '1',
  `thumbnail` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT '1',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `tag_title` varchar(255) NOT NULL,
  `tag_description` text NOT NULL,
  `tag_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_attr_image`
--

CREATE TABLE IF NOT EXISTS `product_attr_image` (
  `product_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_attr_number`
--

CREATE TABLE IF NOT EXISTS `product_attr_number` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_attr_text`
--

CREATE TABLE IF NOT EXISTS `product_attr_text` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_attr_time`
--

CREATE TABLE IF NOT EXISTS `product_attr_time` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_attr_varchar`
--

CREATE TABLE IF NOT EXISTS `product_attr_varchar` (
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE IF NOT EXISTS `product_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` decimal(15,4) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(15,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
