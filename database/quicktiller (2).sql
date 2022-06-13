-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 06:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quicktiller`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_checked_out` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cartitems`
--

CREATE TABLE `cartitems` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `shop_id`, `category_name`) VALUES
(1, 3, 'hardware and tools'),
(2, 1, 'Snacks'),
(3, 4, 'Fruits and vegetables'),
(4, 4, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `isbn`
--

CREATE TABLE `isbn` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `isbn`
--

INSERT INTO `isbn` (`id`, `product_id`, `isbn`, `status`, `date`) VALUES
(1, 0, '1653963575', '', 'Tuesday 31st of May 2022 05:19:35 AM'),
(2, 0, '1654250207', '', 'Friday 3rd of June 2022 12:56:47 PM'),
(3, 0, '1654253308', '', 'Friday 3rd of June 2022 01:48:28 PM'),
(4, 2, '1654265335', '', 'Friday 3rd of June 2022 05:08:55 PM'),
(5, 7, '1654345962', '', 'Saturday 4th of June 2022 03:32:42 PM'),
(6, 8, '1654346311', '', 'Saturday 4th of June 2022 03:38:31 PM'),
(7, 9, '1654346643', '', 'Saturday 4th of June 2022 03:44:03 PM');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(40) NOT NULL,
  `shop_id` int(40) NOT NULL,
  `shop_qr_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `otherQualities` varchar(1000) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `shop_id`, `shop_qr_code`, `product_name`, `category`, `brand`, `quantity`, `price`, `otherQualities`, `product_image`, `date`) VALUES
(2, 4, '1654265118', 'Coke', 'Beverages', 'enjoy coca-cola', '300ml', 40, 'can cased ', '1654265335_15.png', 'Friday 3rd of June 2022 05:08:55 PM'),
(7, 4, 'https://qrstud.io/qrmnky', 'Sprite', 'Beverages', 'Cocacola', '1.5litre', 150, 'Refreshes your sense', '1654345962_16.png', 'Saturday 4th of June 2022 03:32:42 PM'),
(8, 4, 'https://qrstud.io/qrmnky', 'Vin cooking oil', 'Beverages', 'Vin', '1.5litre', 450, 'Cooks life', '1654346311_17.png', 'Saturday 4th of June 2022 03:38:31 PM'),
(9, 4, 'https://qrstud.io/qrmnky', 'Kales', 'Fruits and vegetables', 'MECARD:N:Leslie Meredith;TEL:8016610257;URL:http://lesliemeredith.com;EMAIL:asklesliemeredith@gmail.com;NOTE:Visit AskLeslie on Facebook for tech advice.;;', '3bunch', 40, 'Green enrgizing veges', '1654346643_12.png', 'Saturday 4th of June 2022 03:44:03 PM');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `logo` varchar(1000) NOT NULL,
  `qr_code` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `location`, `logo`, `qr_code`, `status`, `email`, `password`) VALUES
(1, 'Baraka Groceries', 'Koja,Nairobi', '1652253662_images-removebg-preview.png', '', 'pending', 'barakagroceries@gmail.com', '$2y$10$.tqo6v7nLw0V/Ieyt5PeceHZN4nv3zYQvjMdNUJPlvRepMQUP1bSu'),
(2, 'gracious boutique', 'Plaza house 1st floor ,Koja , Nairobi', '1652255236_images-removebg-preview.png', '', 'pending', 'graciousboutique@gmail.com', '$2y$10$UyhsGsZY4ijZKKfaKIoLnOeb25Idj9aegGr3XRClW1qxlQID2qCiK'),
(3, '21 Forever', 'Star Mall, Kimathi Street', '1653956862_21.png', '1653956862', 'pending', '21forever@gmail.com', '$2y$10$k/GUNZcMKZA5XropwEkrn.HnSPhaHMOdl76Ts9l4m2qV4nE8bSSeC'),
(4, 'Budget', 'Nakuru', '1654265117_budget-logo.png', 'https://qrstud.io/qrmnky', 'pending', 'budget@gmail.com', '$2y$10$/3l2Y8CSkiCoI9sRYPVfdeTSxA1yXX8xhc/9u0dkvYVTyUrdvEfs2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `user_image` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `full_name`, `user_image`, `status`, `email`, `phone`, `address`, `password`, `date`) VALUES
(1, 'marshall', 'kendall', '1654258156_brown.jpg', ' ', 'sheilasharon10@gmail.com', '', 'new york', '$2y$10$2Hu39qSSNHz/QWGHwnYNhOyVdMlXZ6DBmX8mNiwbGNs1db4PNi/B6', 'June 3, 2022, 2:09 pm'),
(2, 'jenner', 'kendall', '1654258462_brown.jpg', ' ', 'sheilasharon12@gmail.com', '0775431105', 'new york', '$2y$10$QgX.1RPRv8QP1nbLv1OeoOY3hfv2.AKBfllBVkxIdnBZ3hRvg5nJ6', 'June 3, 2022, 2:14 pm'),
(4, 'Kcaro', 'Caroline Mutheu Wamb', '1654423020_14.jpg', ' ', 'caro@gmail.com', '0799207515', 'Mombasa,Old town', '$2y$10$ZzieXieeO.qaWYG/R4U69Ou7xYS6FEnAgUZzDHKpwzQiC5S8XM87y', 'June 5, 2022, 11:56 am'),
(5, 'Asta', 'Derrick Wambua', '1654438223_tyler-clemmensen-Zs_L-plsZzg-unsplash.jpg', ' ', 'madech@gmail.com', '0799217510', 'Nairobi,lakisama', '$2y$10$IP6RwjOmLqciMEA8RDBLc.pe9CJD.KGTUnrzgsQDtOIDrHOrcXhj6', 'June 5, 2022, 4:10 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cartitems`
--
ALTER TABLE `cartitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isbn`
--
ALTER TABLE `isbn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cartitems`
--
ALTER TABLE `cartitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `isbn`
--
ALTER TABLE `isbn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
