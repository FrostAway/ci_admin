-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2015 at 10:11 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lar_customize`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_data` enum('Text','Number','Date') COLLATE utf8_unicode_ci NOT NULL,
  `default` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `attr_group_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `slug`, `type_data`, `default`, `attr_group_id`, `created_at`, `updated_at`) VALUES
(1, 'image', 'image', 'Text', 'http://localhost/ci_admin/asset/images/default-product.jpg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Hãng sản xuất', 'Hang-san-xuat', 'Text', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Bộ xử lý', 'Bo-xu-ly', 'Text', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Dung lượng ổ cứng', 'Dung-luong-o-cung', 'Text', '250 GB', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Năm sản xuất', 'Nam-san-xuat', 'Date', '30-12-2014', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Thương hiệu', 'Thuong-hieu', 'Text', '', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Card đồ họa', 'Card-do-hoa', 'Text', 'Không có', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Bộ nhớ RAM', 'Bo-nho-RAM', 'Number', '1G', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attr_group`
--

CREATE TABLE IF NOT EXISTS `attr_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `attr_group`
--

INSERT INTO `attr_group` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Máy tính để bàn', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Bàn ghế', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `attr_relationship`
--

CREATE TABLE IF NOT EXISTS `attr_relationship` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attr_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT '0',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `attr_relationship`
--

INSERT INTO `attr_relationship` (`id`, `attr_id`, `product_id`, `value`, `created_at`, `updated_at`) VALUES
(34, 9, 6, 'May tinh Dell', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 10, 6, 'Không có', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 1, 6, 'http://localhost/ci_admin/asset/images/upload/24723_0_vostro_54703.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 1, 5, 'http://localhost/ci_admin/asset/images/upload/computer21.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 1, 5, 'http://localhost/ci_admin/asset/images/upload/computer1.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 1, 5, 'http://localhost/ci_admin/asset/images/upload/computer31.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 1, 4, 'http://localhost/ci_admin/asset/images/upload/computer3.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 1, 4, 'http://localhost/ci_admin/asset/images/upload/computer1.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 1, 3, 'http://localhost/ci_admin/asset/images/upload/24723_0_vostro_54704.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 1, 2, 'http://localhost/ci_admin/asset/images/upload/computer4.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 1, 1, 'http://localhost/ci_admin/asset/images/upload/24723_0_vostro_5470.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 1, 1, 'http://localhost/ci_admin/asset/images/upload/computer32.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 1, 8, 'http://localhost/ci_admin/asset/images/upload/computer33.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '100',
  `show_in_menu` int(11) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `tag_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `tag_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent`, `sort_order`, `show_in_menu`, `description`, `tag_title`, `tag_desc`, `tag_keywords`, `created_at`, `updated_at`) VALUES
(1, 'Máy tính', 'May-tinh', 0, 10, 1, 'Máy tính laptop, desktop, notebook, tablet', 'laptop, desktop', 'laptop, desktop', 'laptop, desktop', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Điện thoại', 'Dien-thoai', 0, 2, 1, 'Điện thoại', 'Điện thoại', 'Điện thoại', 'Điện thoại', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Nội thất', 'Noi-that', 0, 6, 0, 'Nội thất', 'Nội thất', 'Nội thất', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Thời trang', 'Thoi-trang', 0, 7, 1, 'Thời trang', 'Thời trang', 'Thời trang', 'Thời trang', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_12_31_012339_tbl_temp', 1),
('2014_12_27_010927_create_tbl_users', 2),
('2014_12_29_011935_create_tbl_products', 2),
('2014_12_29_033347_create_attr_group_table', 2),
('2014_12_29_033752_create_attributes_table', 2),
('2014_12_29_034655_create_attr_relationship_table', 2),
('2014_12_30_102609_create_category_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `attr_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `discount`, `description`, `attr_group`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Dell Vostro 5470B P41G002-TI54502', 'Dell-Vostro-5470B-P41G002-TI54502', '14899000.00', '13899000.00', 'Bộ vi xử lý Intel Core™ i5 4210U (2*1.7Ghz / 3MB Cache)\r\nChipset Intel HM86\r\nBộ nhớ trong 4GB 1600MHz DDR3\r\nVGA Nvidia Geforce GT740M 2G DDR3\r\nỔ cứng 500B SATA 5400rpm\r\nBảo mật, công nghệ Finger Print\r\nMàn hình 14” HD LED', '1', 40, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Máy tính thương hiệu SunPower SUNL007', 'Máy-tính-thuong-hieu-SunPower-SUNL007', '5149000.00', '0.00', 'Bộ vi xử lý CPU Intel Celeron DC G1630 2.8G/2M/SK1155 Box (Ivy Bridge)\r\nChipset Intel® H71M\r\nBộ nhớ trong 2 GB DDR3 Bus 1333\r\nVGA Onboard\r\nỔ cứng 250GB SATA\r\nỔ quang DVD-ROM\r\nCông suất nguồn Hunkey 350 W', '1', 30, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'newproduct1', 'newproduct1', '27599000.00', '13899000.00', '111111111111', '1', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'some product', 'some-product', '27599000.00', '45.00', 'ghjkhjgjh', '1', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'PC Dell Vostro', 'PC-Dell-Vostro', '5149000.00', '13899000.00', 'pc dell vostro', '1', 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'sp xoas', 'sp-xoas', '99999999.99', '13899000.00', 'sfwearsaf', '1', 445, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'new product', 'new-product', '23000000.00', '2000000.00', 'mo ta san pham moi', '1', 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bird` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `value` enum('number 1','number 2','number 3','number 4') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
