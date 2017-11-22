-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 11:16 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `craftee_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `placementTime` datetime NOT NULL,
  `address` varchar(500) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `userId`, `placementTime`, `address`, `status`) VALUES
(23, 2, '2016-12-26 00:00:00', '', 1),
(24, 2, '2016-12-26 00:00:00', '', 1),
(25, 2, '2016-12-27 00:00:00', '', 1),
(26, 10, '2016-12-27 00:00:00', 'Toronto, Japan', 1),
(27, 9, '2016-12-27 00:00:00', 'H-3, R-123, Dhaka', 1),
(28, 9, '2016-12-28 00:00:00', 'Dhaka, Bangladesh', 1),
(29, 10, '2016-12-29 00:00:00', 'Toronto, Japan', 1),
(30, 9, '2016-12-29 00:00:00', 'Dhaka, Bangladesh', 1),
(31, 2, '2017-04-26 00:00:00', 'Dhaka, Bangladesh', 1),
(32, 5, '2017-04-26 00:00:00', '', 1),
(33, 2, '2017-04-26 00:00:00', 'Dhaka, Bangladesh', 1),
(34, 11, '2017-04-26 00:00:00', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderedproduct`
--

CREATE TABLE `tbl_orderedproduct` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `price` double NOT NULL,
  `unit` int(11) NOT NULL,
  `orderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orderedproduct`
--

INSERT INTO `tbl_orderedproduct` (`id`, `productId`, `price`, `unit`, `orderId`) VALUES
(8, 8, 500, 2, 21),
(9, 1, 200, 1, 21),
(10, 9, 1000, 1, 21),
(11, 8, 500, 4, 22),
(12, 9, 1000, 2, 22),
(13, 1, 200, 2, 23),
(14, 8, 500, 1, 23),
(15, 8, 500, 3, 24),
(16, 9, 1000, 1, 24),
(17, 1, 200, 3, 25),
(18, 8, 500, 2, 25),
(19, 10, 750, 4, 26),
(20, 8, 500, 3, 27),
(21, 8, 500, 3, 28),
(22, 1, 200, 1, 28),
(23, 9, 1000, 1, 28),
(24, 9, 1000, 2, 29),
(25, 8, 500, 1, 29),
(26, 1, 200, 1, 29),
(27, 10, 750, 3, 29),
(28, 9, 1000, 1, 30),
(29, 9, 1000, 1, 30),
(30, 8, 500, 1, 30),
(31, 9, 1000, 2, 30),
(32, 9, 1000, 1, 31),
(33, 9, 1000, 1, 32),
(34, 12, 200, 3, 33),
(35, 12, 200, 9, 34),
(36, 8, 500, 1, 34);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `unitAvailable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `description`, `price`, `unitAvailable`) VALUES
(8, 'Badge', 'Captain America bardge', 500, 200),
(9, 'Parrot', 'Colorful Parrot Set', 1000, 50),
(10, 'Bag', 'Handmade colorful bag', 750, 50),
(11, 'Doll-Toy', 'Handmade Cloth Toy', 200, 50),
(12, 'Cart Box', 'The Best cart-box.', 200, 500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userCatId` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `userCatId`, `contact`, `address`) VALUES
(2, 'Riad', 'riad@mail.com', '123', 0, '09876', 'Dhaka, Bangladesh'),
(5, 'Admin', 'admin@mail.com', '123', 1, '123', '123'),
(11, 'zakir', 'zakir@mail.com', '123', 0, '12', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orderedproduct`
--
ALTER TABLE `tbl_orderedproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_orderedproduct`
--
ALTER TABLE `tbl_orderedproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
