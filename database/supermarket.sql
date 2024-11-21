-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2021 at 09:36 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `first` varchar(60) NOT NULL,
  `last` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `previlege` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`first`, `last`, `gender`, `dob`, `username`, `password`, `email`, `previlege`) VALUES
('admin', 'startor', 'male', '1999-12-22', 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', 'admin'),
('amin', 'kedir', 'male', '2021-08-25', 'amin', '67a95c52d87dcfabe6878fe37c155e3e', 'amin@astu.student', 'employee'),
('getaw', 'tadesse', 'male', '2021-08-03', 'customer', '91ec1f9324753048c0096d036a694f86', 'customer@gmail.com', 'customer'),
('daniel', 'last', 'male', '2021-08-13', 'daniel', '202cb962ac59075b964b07152d234b70', 'dan@gamil.com', 'employee'),
('serk', 'cher', 'female', '2020-12-27', 'searcher', '92bed3066f81f8273380f827cbe2c5ef', 'searcher@gmail.com', 'employee'),
('teklu', 'abebe', 'male', '2021-08-20', 'tekluabebe', 'e56236e2d54c48dde746bade473fdd23', 'teklu@gmail.com', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `employee_username` varchar(60) NOT NULL,
  `customer_username` varchar(60) NOT NULL,
  `product` varchar(60) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `employee_username`, `customer_username`, `product`, `quantity`, `price`) VALUES
(82, 'tekluabebe', 'customer', 'potato', 500, 10000),
(83, 'tekluabebe', 'customer', 'sunchips', 120, 6480),
(84, 'daniel', 'customer', 'potato', 200, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_name` varchar(20) NOT NULL,
  `price` int(7) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_name`, `price`, `quantity`, `type`) VALUES
('burger', 200, 100, 'food'),
('jeans', 700, 1962, 'cloth'),
('potato', 20, 300, 'food'),
('sunchips', 54, -88, 'food'),
('tomato', 30, 1955, 'food');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
