-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2014 at 09:17 PM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Barang Elektronik');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`) VALUES
(1, 'Rak 1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `sku` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(3) NOT NULL,
  `location_id` int(3) NOT NULL,
  `unit_id` int(3) NOT NULL,
  `minimum_stock` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`sku`, `name`, `category_id`, `location_id`, `unit_id`, `minimum_stock`, `created_at`, `updated_at`) VALUES
('SKU-PROD-1', 'Produk Gak Jelas', 1, 1, 1, 0, '2014-05-01 20:33:25', '2014-05-01 20:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchase`
--

CREATE TABLE IF NOT EXISTS `product_purchase` (
  `purchase_id` varchar(15) NOT NULL,
  `sku` varchar(15) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  KEY `purchase_id` (`purchase_id`),
  KEY `sku` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_purchase`
--

INSERT INTO `product_purchase` (`purchase_id`, `sku`, `qty`, `price`, `total`) VALUES
('PURCHASE-1', 'SKU-PROD-1', 100, 0, 0);

--
-- Triggers `product_purchase`
--
DROP TRIGGER IF EXISTS `increase_stock`;
DELIMITER //
CREATE TRIGGER `increase_stock` AFTER INSERT ON `product_purchase`
 FOR EACH ROW UPDATE stock SET stock = stock + NEW.qty WHERE sku = NEW.sku
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_sell`
--

CREATE TABLE IF NOT EXISTS `product_sell` (
  `sell_id` varchar(15) NOT NULL,
  `sku` varchar(15) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  KEY `sell_id` (`sell_id`),
  KEY `sku` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sell`
--

INSERT INTO `product_sell` (`sell_id`, `sku`, `qty`, `price`, `total`) VALUES
('SELL-1', 'SKU-PROD-1', 10, 0, 0),
('SELL-2', 'SKU-PROD-1', 11, 0, 0),
('SELL-3', 'SKU-PROD-1', 10, 0, 0);

--
-- Triggers `product_sell`
--
DROP TRIGGER IF EXISTS `reduce_stock`;
DELIMITER //
CREATE TRIGGER `reduce_stock` AFTER INSERT ON `product_sell`
 FOR EACH ROW UPDATE stock SET stock = stock - NEW.qty WHERE sku = NEW.sku
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` varchar(15) NOT NULL,
  `supplier_id` int(3) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `date`) VALUES
('PURCHASE-1', 0, '2014-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE IF NOT EXISTS `sells` (
  `id` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `date`) VALUES
('SELL-1', '2014-05-01'),
('SELL-2', '2014-04-01'),
('SELL-3', '2014-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `name` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name`, `value`) VALUES
('organization_logo', 'public/img/organization_logo.jpg'),
('organization_name', 'Toko Jaya Abadi');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `sku` varchar(15) NOT NULL,
  `stock` int(11) NOT NULL,
  `buy_price` int(9) NOT NULL,
  `sell_price` int(9) NOT NULL,
  `date` date NOT NULL,
  KEY `sku` (`sku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`sku`, `stock`, `buy_price`, `sell_price`, `date`) VALUES
('SKU-PROD-1', 69, 0, 0, '2014-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`) VALUES
(1, 'KG');

-- --------------------------------------------------------

--
-- Table structure for table `unit_prices`
--

CREATE TABLE IF NOT EXISTS `unit_prices` (
  `sku` varchar(15) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `email` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `credential` varchar(7) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `remember_token`, `credential`, `created_at`, `updated_at`) VALUES
(4, 'dpdavidpratama@gmail.com', 'admin', '$2y$10$CDaMLcZUAQnO1ypvAtZccuX1hd4L2zRz4WWniRcs7KNkfP65pb23W', '', '', '2014-05-01 19:17:27', '2014-05-01 19:17:27');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_purchase`
--
ALTER TABLE `product_purchase`
  ADD CONSTRAINT `product_purchase_ibfk_1` FOREIGN KEY (`sku`) REFERENCES `products` (`sku`) ON UPDATE CASCADE;

--
-- Constraints for table `product_sell`
--
ALTER TABLE `product_sell`
  ADD CONSTRAINT `product_sell_ibfk_1` FOREIGN KEY (`sku`) REFERENCES `products` (`sku`) ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`sku`) REFERENCES `products` (`sku`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
