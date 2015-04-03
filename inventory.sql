-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2015 at 07:03 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
`id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Pants'),
(2, 'Shirts'),
(3, 'Socks'),
(4, 'shirts');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `title` varchar(40) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `total_quantity` int(10) NOT NULL,
  `remaining_quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `title`, `created`, `modified`, `total_quantity`, `remaining_quantity`, `price`) VALUES
(4, 1, 'Levis', '2015-02-21 19:03:56', '2015-03-18 06:00:59', 10, 10, 1200),
(5, 2, 'john players', '2015-02-21 19:18:21', '2015-02-21 19:18:21', 200, 0, 1223),
(6, 2, 'spring wood2', '2015-02-21 19:18:32', '2015-02-21 19:18:32', 12223, 0, 234),
(7, 1, 'zaara', '2015-02-21 19:18:46', '2015-02-21 19:18:46', 1232, 0, 123223),
(8, 2, 'gents park', '2015-02-21 19:25:26', '2015-02-21 19:25:26', 233, 0, 2333),
(12, 3, 'adidas', '2015-03-04 05:55:47', '2015-03-04 05:56:12', 1233, 0, 13);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) NOT NULL,
  `item_id` int(10) unsigned NOT NULL,
  `sold_price` int(10) NOT NULL,
  `total_price` int(9) NOT NULL,
  `date` datetime NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `item_id`, `sold_price`, `total_price`, `date`, `quantity`) VALUES
(7, 3, 0, 435, 0, '2015-03-22 10:52:00', 4),
(8, 3, 0, 645, 0, '2015-03-22 10:54:00', 54),
(9, 3, 4, 123, 0, '2015-03-22 11:41:00', 1),
(10, 4, 7, 1233, 0, '2015-03-22 17:34:00', 2),
(11, 4, 4, 123, 0, '2015-03-26 04:47:00', 23),
(12, 4, 7, 1200, 0, '2015-03-26 04:49:00', 12),
(13, 4, 5, 1233, 0, '2015-04-03 04:53:00', 12),
(14, 4, 4, 1233, 0, '2015-04-03 05:55:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(5) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`) VALUES
(3, 'bipinpaudel', 'd8394d9df68f1a3b3ecc32086c329bd7491382e6', 'sfdg', '2015-03-17 18:06:05'),
(4, 'subigyanepal', '0c187241492d5e11b441003c4b6f89d5cfa8b0a2', 'admin', '2015-03-17 18:13:54'),
(5, 'bhishanbhandari', '0c187241492d5e11b441003c4b6f89d5cfa8b0a2', 'admin', '2015-03-17 18:14:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
