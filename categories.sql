-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 10:15 AM
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
  `category_price` varchar(255) NOT NULL,
  `category_created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `category_last_updated_at` datetime DEFAULT NULL,
  `category_pic` varchar(255) NOT NULL,
  `category_is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_price`, `category_created_at`, `category_last_updated_at`, `category_pic`, `category_is_deleted`) VALUES
(1, 'Standard', '1,999$ - 6,499$', '2023-01-02 00:15:36', NULL, '../images/categorypic/standard.png', 0),
(2, 'Sport', '2,199$ - 8,499$', '2023-01-02 00:19:38', '2023-01-01 22:24:00', '../images/categorypic/sport.png', 0),
(4, 'Cruiser', '6,499$ - 18,799$', '2023-01-02 00:29:47', '2023-01-01 22:31:16', '../images/categorypic/[removal.ai]_tmp-63b68dc69a910.png', 0),
(5, 'Dual-Sport', '3,399$ - 9,000$', '2023-01-02 00:35:15', NULL, '../images/categorypic/dual-sport-removebg-preview (1).png', 0),
(6, 'Scooter', '1,349$ - 7,499$', '2023-01-02 00:39:27', NULL, '../images/categorypic/scooterAdventure.png', 0),
(7, 'Electric', '2,399$ - 6,499$', '2023-01-02 00:39:58', NULL, '../images/categorypic/electric.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
