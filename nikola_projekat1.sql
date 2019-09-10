-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2019 at 07:34 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nikola_projekat1`
--

-- --------------------------------------------------------

--
-- Table structure for table `additions`
--

DROP TABLE IF EXISTS `additions`;
CREATE TABLE IF NOT EXISTS `additions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `additions`
--

INSERT INTO `additions` (`id`, `name`, `type`) VALUES
(10, 'Kecap', 'slano'),
(11, 'bbq', 'slano'),
(12, 'pavlaka', 'slano'),
(13, 'masline', 'slano'),
(14, 'majonez', 'slano'),
(15, 'kackavalj', 'slano');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `additions` text,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `order_id`, `text`, `rating`) VALUES
(2, 59, 6, 'Volim Vas', 5),
(3, 60, 7, 'fsdfsdfsdfsdfsdf sfff', 3),
(4, 61, 8, 'hvala', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `cart_info` text NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_info` varchar(250) NOT NULL,
  `last_time_to_arrive` varchar(50) NOT NULL,
  `info` text NOT NULL,
  `accepted` int(11) DEFAULT '0',
  `finished` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `address`, `phone`, `cart_info`, `total_price`, `payment_info`, `last_time_to_arrive`, `info`, `accepted`, `finished`) VALUES
(6, 59, 'Ljubise Miodragovica 20', '+381643411041', '[{\"table\":\"carts\",\"id\":\"2\",\"user_id\":\"59\",\"product_id\":\"38\",\"qty\":\"5\",\"price\":\"2500\",\"additions\":\"null\"}]', 2500, 'Credit Card', '13.09.2019', '<3', 1, 1),
(7, 60, 'asdasda aaa 123', '064119', '[{\"table\":\"carts\",\"id\":\"3\",\"user_id\":\"60\",\"product_id\":\"38\",\"qty\":\"1\",\"price\":\"500\",\"additions\":\"null\"}]', 500, 'Net Banking', '11.09.2019', 'sa kepacom', 1, 1),
(8, 61, 'asdasd asdasd', '12313', '[{\"table\":\"carts\",\"id\":\"4\",\"user_id\":\"61\",\"product_id\":\"39\",\"qty\":\"1\",\"price\":\"222\",\"additions\":\"null\"}]', 222, 'Debit Cart', '19.09.2019', 'ddddddddddddddddddddddddd', 1, 1),
(13, 61, 'asdasd asdasd', '12313', '[{\"table\":\"carts\",\"id\":\"5\",\"user_id\":\"61\",\"product_id\":\"40\",\"qty\":\"6\",\"price\":\"7200\",\"additions\":\"[\\\"pavlaka\\\",\\\"kackavalj\\\"]\"}]', 7200, 'Debit Cart', '12.09.2019', 'dfddb', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `declaration` text NOT NULL,
  `price` int(11) NOT NULL,
  `taste` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cover_photo` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `declaration`, `price`, `taste`, `user_id`, `cover_photo`) VALUES
(38, 'Kiflice', 8, 'Kiflice sa kecapom i susamom', 500, 'slano', 56, 'public/images/products/1568054732_2.jpg'),
(39, 'Kecap', 10, 'dsaddsaddasdasdddddddddddddddddddd', 222, 'slatko', 56, 'public/images/products/1568062466_4.jpg'),
(40, 'Zdrav obrok', 11, 'Vas zdrav obrok po zelji', 1200, 'slano', 59, 'public/images/products/1568139197_111.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_additions`
--

DROP TABLE IF EXISTS `product_additions`;
CREATE TABLE IF NOT EXISTS `product_additions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `addition_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `addition_id` (`addition_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_additions`
--

INSERT INTO `product_additions` (`id`, `product_id`, `addition_id`) VALUES
(51, 39, 10),
(52, 40, 12),
(53, 40, 15);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(1000) DEFAULT 'https://uwosh.edu/facilities/wp-content/uploads/sites/105/2018/09/no-photo.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `image`) VALUES
(8, 'Pecivo', 'https://uwosh.edu/facilities/wp-content/uploads/sites/105/2018/09/no-photo.png'),
(9, 'Rostilj', 'https://uwosh.edu/facilities/wp-content/uploads/sites/105/2018/09/no-photo.png'),
(10, 'Kecap', 'https://uwosh.edu/facilities/wp-content/uploads/sites/105/2018/09/no-photo.png'),
(11, 'Zdrava hrana', 'https://uwosh.edu/facilities/wp-content/uploads/sites/105/2018/09/no-photo.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` text NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `link`, `product_id`) VALUES
(57, 'public/images/products/1568054732_7.jpg', 38),
(58, 'public/images/products/1568054733_2.jpg', 38),
(59, 'public/images/products/1568054733_3.jpg', 38),
(60, 'public/images/products/1568054733_4.jpg', 38),
(61, 'public/images/products/1568054733_5.jpg', 38),
(62, 'public/images/products/1568054733_6.jpg', 38),
(63, 'public/images/products/1568139197_111.jpg', 40),
(64, 'public/images/products/1568139197_222.jpg', 40),
(65, 'public/images/products/1568139197_333.jpg', 40),
(66, 'public/images/products/1568139197_444.jpg', 40),
(67, 'public/images/products/1568139197_555.jpg', 40),
(68, 'public/images/products/1568139197_666.jpg', 40),
(69, 'public/images/products/1568139197_777.jpg', 40);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `role`, `address`, `phone`, `created_at`) VALUES
(56, 'Vukasin', 'Petrovic', 'vukasin123@gmail.com', 'shqdMQA4GOhTI', 0, 'Milunke Savic, 46', '+381653001551', '2019-07-31 19:17:21'),
(58, 'Vukasin', 'Petrovic', 'vukasin123@gmail.com', 'shqdMQA4GOhTI', 0, 'Milunke Savic, 46', '+381653001551', '2019-09-09 18:27:14'),
(59, 'Nikola', 'Vicentijevic', 'vicentijevicnikola@gmail.com', 'sh9xyXUlH.0.c', 1, 'Ljubise Miodragovica 20', '+381643411041', '2019-09-09 18:30:15'),
(60, 'milos', 'lalkovic', 'ss@ss.ss', 'shJs/R61T607k', 0, 'asdasda aaa 123', '064119', '2019-09-09 20:35:03'),
(61, 'milos', 'lalkovic', 'aa@ss.ss', 'shJs/R61T607k', 0, 'asdasd asdasd', '12313', '2019-09-09 20:56:35');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `pr_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uc_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `ord_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_idd` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `use_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `u_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_additions`
--
ALTER TABLE `product_additions`
  ADD CONSTRAINT `a_id` FOREIGN KEY (`addition_id`) REFERENCES `additions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
