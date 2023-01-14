-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2023 at 09:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectphp5`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `category_last_updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `category_pic` varchar(255) NOT NULL,
  `category_is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_price`, `category_pic`, `category_created_at`, `category_last_updated_at`, `category_is_deleted`) VALUES
(1, 'Standard', '1,999$ - 6,499$', './img/categories/Standard-YamahaFZ-07.png', '2023-01-02 00:15:36', NULL, 0),
(2, 'Sport', '2,199$ - 8,499$', './img/categories/Sport_kawasaki-ninja-zx.png', '2023-01-02 00:19:38', '2023-01-01 22:24:00', 1),
(4, 'Cruiser', '6,499$ - 18,799$', './img/categories/Cruiser_Indian-Chief.png', '2023-01-02 00:29:47', '2023-01-01 22:31:16', 0),
(5, 'Dual-Sport', '3,399$ - 9,000$', './img/categories/Dual-Sport_ktm-1090-adventure-r.jpg', '2023-01-02 00:35:15', NULL, 0),
(6, 'Scooter', '1,349$ - 7,499$', './img/categories/Scooter_vespa.jpg', '2023-01-02 00:39:27', NULL, 0),
(7, 'Electric', '2,399$ - 6,499$', './img/categories/Electric_K-Choper-2.jpg', '2023-01-02 00:39:58', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `ordered_at` datetime NOT NULL DEFAULT current_timestamp(),
  `order_total` int(10) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `order_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `model_year` year(4) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `pic_main` varchar(255) NOT NULL,
  `pic_sub` varchar(255) NOT NULL,
  `rate` int(1) NOT NULL DEFAULT 5,
  `in_stock` int(10) NOT NULL,
  `is_discount` tinyint(1) NOT NULL DEFAULT 0,
  `discount` int(2) NOT NULL,
  `product_create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `product_last_update` datetime DEFAULT NULL,
  `product_is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `description`, `model_year`, `brand`, `color`, `price`, `pic_main`, `pic_sub`, `rate`, `in_stock`, `is_discount`, `discount`, `product_create_at`, `product_last_update`, `product_is_deleted`) VALUES
(38, 'Aprilia', 1, '300cc', 2022, '', '', 2500, 'Aprilia-SXR-160-.png', '', 5, 25, 0, 10, '2023-01-02 21:03:27', NULL, 0),
(39, 'suzuki gexer150', 2, '125cc', 2022, '', '', 2200, 'suzuki-gixxer.png', '', 5, 30, 0, 10, '2023-01-02 21:06:39', NULL, 0),
(40, 'KTM 390', 2, '400cc', 2022, '', '', 4000, 'dual-sport-removebg-preview (1).png', '', 5, 25, 0, 10, '2023-01-02 21:07:45', NULL, 0),
(41, 'cruiser', 2, '750cc', 2018, '', '', 8500, 'cruiser1.png', '', 5, 20, 0, 0, '2023-01-02 21:08:57', NULL, 0),
(42, 'electric', 4, '30w', 2020, '', '', 3000, 'electric.png', '', 5, 25, 0, 0, '2023-01-02 21:11:30', NULL, 0),
(43, 'cruiser 900cc', 2, '900cc', 2021, '', '', 8500, 'cruiser.png', '', 5, 25, 0, 0, '2023-01-02 21:13:17', NULL, 0),
(44, 'standard_motorcycle', 5, '250cc', 2019, '', '', 2800, 'standard.png', '', 5, 25, 0, 10, '2023-01-02 21:14:43', NULL, 0),
(45, 'sport_motorcycle', 5, '300cc', 2019, '', '', 5400, 'sport.png', '', 5, 30, 0, 10, '2023-01-02 21:16:02', NULL, 0),
(50, 'kawasaki500', 1, '500cc', 2021, '', '', 5400, 'kawasaki500.png', '', 5, 25, 0, 10, '2023-01-02 21:55:00', NULL, 0),
(51, 'scooterAdventure', 2, '300cc', 2022, '', '', 3000, 'scooterAdventure.png', '', 5, 25, 0, 10, '2023-01-02 21:56:31', NULL, 0),
(52, 'hunda250', 2, '250cc', 2021, '', '', 2450, 'hunda250.png', '', 5, 25, 0, 0, '2023-01-02 21:57:40', NULL, 0),
(53, 'kawasaki_Adventure599', 6, '599cc', 2022, '', '', 6000, 'kawasakiAdventure599.png', '', 5, 25, 0, 5, '2023-01-02 22:01:20', NULL, 0),
(54, 'kawasaki499', 7, '499cc', 2020, '', '', 4500, 'kawasaki499.png', '', 5, 20, 0, 15, '2023-01-02 22:05:24', NULL, 0),
(55, 'KLX', 7, '400cc', 2019, '', '', 4200, 'KLX.png', '', 5, 30, 0, 0, '2023-01-02 22:08:13', NULL, 0),
(56, 'kawasaki550', 7, '550cc', 2020, '', '', 7400, 'kawasaki550.png', '', 5, 35, 0, 10, '2023-01-02 22:10:56', NULL, 0),
(57, 'suzuki150', 1, '150cc', 2022, '', '', 1800, 'suzuki150.png', '', 5, 40, 0, 15, '2023-01-02 22:13:07', NULL, 0),
(58, 'agusta', 6, '850cc', 2020, '', '', 7900, 'agusta.png', '', 5, 15, 0, 0, '2023-01-02 22:23:38', NULL, 0),
(59, 'dWkty', 7, '700cc', 2016, '', '', 6900, 'dwkty.png', '', 5, 18, 0, 0, '2023-01-02 22:26:19', NULL, 0),
(60, 'turbo', 7, '1000cc', 2015, '', '', 8600, 'turbo.png', '', 5, 13, 0, 0, '2023-01-02 22:29:08', NULL, 0),
(61, 'ZXR', 4, '1000cc', 2014, '', '', 8900, 'ZXR.png', '', 5, 15, 0, 0, '2023-01-02 22:33:21', NULL, 0),
(62, 'R6', 1, '750cc', 2018, '', '', 8000, 'R6.png', '', 5, 20, 0, 0, '2023-01-02 22:36:14', NULL, 0),
(63, 'GT', 7, '1000cc', 2017, '', '', 8800, 'GT.png', '', 5, 20, 0, 0, '2023-01-02 22:43:58', NULL, 0),
(64, 'ZLM', 2, '800cc', 2014, '', '', 7000, 'ZLM.png', '', 5, 20, 0, 0, '2023-01-02 23:17:16', NULL, 0),
(65, 'Aprilia', 4, '450cc', 2021, '', '', 5000, 'aprilia.png', '', 5, 20, 0, 0, '2023-01-02 23:21:51', NULL, 0),
(66, 'SuzukiDR', 5, '350cc', 2021, '', '', 3900, 'SuzukiDR.png', '', 5, 28, 0, 10, '2023-01-02 23:24:58', NULL, 0),
(67, 'Ninga', 7, '600cc', 2018, '', '', 6300, 'Ninga.png', '', 5, 20, 0, 0, '2023-01-02 23:27:58', NULL, 0),
(68, 'CBR', 4, '750cc', 2013, '', '', 6300, 'CBR.png', '', 5, 15, 0, 0, '2023-01-02 23:36:10', NULL, 0),
(69, 'Ducati', 6, '500cc', 2020, '', '', 450, 'Ducati.png', '', 5, 14, 0, 0, '2023-01-02 23:41:08', NULL, 0),
(70, 'yamaha_R3', 7, '599cc', 2021, '', '', 5400, 'yamaha_r3.png', '', 5, 20, 0, 0, '2023-01-02 23:45:27', NULL, 0),
(71, '420R', 5, '850cc', 2019, '', '', 6700, '420R.png', '', 5, 18, 0, 0, '2023-01-02 23:50:08', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `review_text` varchar(255) NOT NULL,
  `rate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `create_at` date NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `is_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `produc ts`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
