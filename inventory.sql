-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2014 at 10:25 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE IF NOT EXISTS `sells` (
  `id` varchar(15) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `id` varchar(3) NOT NULL,
  `email` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(65) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `credential` varchar(7) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `remember_token`, `credential`, `created_at`, `updated_at`) VALUES
('1', 'dpdavidpratama@gmail.com', 'admin', '$2y$10$XGPXK85Yi0O5hPUT0XxIi.0GfbK35tPcKqksHwXwF8y3M5s36BWfm', 'Y5ehQvtr72GPfs8ORHG5hP1ZhuhlEltxGVkNOHKUxQJSz5P1aPe0aHXjMdPf', 'admin', '0000-00-00 00:00:00', '2014-04-29 10:25:25');

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
