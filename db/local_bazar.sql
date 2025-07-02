-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 26, 2025 at 02:44 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `local_bazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `pid`, `qty`) VALUES
(9, '2', '1', '2'),
(11, '6', '5', '1'),
(12, '7', '5', '1'),
(15, '2', '2', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(30) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `total` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(11) NOT NULL,
  `order_tb_id` varchar(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(60) NOT NULL,
  `sku` varchar(10) NOT NULL,
  `sell_price` varchar(5) NOT NULL,
  `fake_price` varchar(5) NOT NULL,
  `cost_price` varchar(5) NOT NULL,
  `qty` varchar(5) NOT NULL,
  `status` varchar(2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `sku`, `sell_price`, `fake_price`, `cost_price`, `qty`, `status`, `date`) VALUES
(1, 'pen', 'pen.jpg', '1234', '20', '25', '6', '100', '1', '2025-06-12 17:04:52'),
(2, 'pencil', 'pencil.jpg', '4567', '5', '6', '4', '100', '1', '2025-06-12 17:07:15'),
(3, 'bag', 'bag.jpg', '6666', '600', '700', '0', '0', '1', '2025-06-12 17:09:43'),
(4, 'book', 'book.jpg', '8888', '150', '160', '0', '0', '1', '2025-06-12 17:28:46'),
(5, 'bottel', 'bottel.jpg', '9999', '670', '700', '0', '0', '1', '2025-06-12 17:29:55'),
(6, 'laptop', 'laptop.jpg', '5566', '12000', '13000', '0', '0', '1', '2025-06-12 17:36:21'),
(7, 'mobile', 'mobile.jpg', '2233', '10000', '11000', '0', '0', '1', '2025-06-12 17:36:51'),
(11, 'd', 'd', 'd', 'd', 'd', '0', '0', '0', '2025-06-13 17:09:51'),
(12, 'apple', 'LB20250613020635.jpg', '456789', '2345', '345', '0', '0', '1', '2025-06-13 17:56:35'),
(13, '', '', '', '', '', '0', '0', '0', '2025-06-17 16:58:40'),
(14, '', '', '', '', '', '0', '0', '0', '2025-06-17 16:59:12'),
(15, '', '', '', '', '', '0', '0', '0', '2025-06-17 17:02:04'),
(16, 'q', 'q', 'q', 'q', 'q', '0', '0', '0', '2025-06-17 17:02:16'),
(17, 'charger', 'LB20250617020618.jpg', '678908', '120', '130', '0', '0', '1', '2025-06-17 17:53:18'),
(18, 'a', '', 'a', 'a', 'a', '0', '0', '0', '2025-06-20 16:57:27'),
(19, 'a', '', 'a', 'a', 'a', '0', '0', '0', '2025-06-20 16:59:04'),
(20, 'b', '', 'b', 'b', 'b', '0', '0', '0', '2025-06-20 17:00:07'),
(21, 'desk', 'LB20250621020633.jpg', '456654', '1500', '1600', '0', '0', '1', '2025-06-21 18:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `invno` varchar(10) NOT NULL,
  `vid` varchar(4) NOT NULL,
  `pid` varchar(4) NOT NULL,
  `qty` varchar(5) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `invno`, `vid`, `pid`, `qty`, `cp`, `date`) VALUES
(1, '6786', '1', '1', '5', '10', '2025-06-20 18:08:56'),
(2, '45678', '1', '1', '6', '80', '2025-06-20 18:09:11'),
(3, '678866', '2', '2', '4', '100', '2025-06-20 18:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `type` varchar(2) NOT NULL COMMENT '1 -user , 2 - admin',
  `status` varchar(2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mobile`, `password`, `name`, `email`, `address`, `type`, `status`, `date`) VALUES
(1, 'admin', '1234', 'admin', '', '', '2', '1', '2025-06-11 17:18:01'),
(2, '7890', '7890', 'amit', 'amit@gmail.com', 'ranchi', '1', '1', '2025-06-24 17:40:31'),
(3, '1111', '1234', 'ravi', '1111', 'tata', '1', '1', '2025-06-25 16:08:43'),
(4, '6655', '1234', 'raja', '6655', 'bokaro', '1', '1', '2025-06-25 16:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(20) NOT NULL,
  `owner_name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `gst` varchar(10) NOT NULL,
  `status` varchar(2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `shop_name`, `owner_name`, `address`, `mobile`, `email`, `gst`, `status`, `date`) VALUES
(1, 'abcd', 'abhi', 'ranchi', '1234', 'abc@123.com', '4567', '1', '2025-06-17 17:47:55'),
(2, 'kalam', 'abhi', 'ranchi', '5678', 'kalam@kalam.com', '678', '1', '2025-06-17 17:49:45'),
(3, 'jai shop', 'jai kumar', 'tata', '34678', 'jai@abc.com', '345678', '1', '2025-06-18 17:46:46'),
(4, 'xyz shop', 'xyz', 'ranchi', '678', '...', '3456', '1', '2025-06-18 17:48:29'),
(5, 'b', 'b', 'b', 'b', 'b', 'b', '0', '2025-06-20 17:02:28'),
(6, 'abcd', 'abcd12', 'tata', '445566', 'abcd@abc.com', '3456', '1', '2025-06-21 17:44:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
