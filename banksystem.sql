-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 01:14 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(11) NOT NULL,
  `customername` varchar(128) NOT NULL,
  `customeremail` varchar(128) NOT NULL,
  `customerbalance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `customername`, `customeremail`, `customerbalance`) VALUES
(1, 'Sarvesh Mantri', 'sarveshmantri200@gmail.com', 39200),
(2, 'Binod Tharu', 'binod@gmail.com', 31000),
(3, 'Darren Pascall', 'darren@gmail.com', 50000),
(4, 'Fern Bell', 'FernBell@gmail.com', 60000),
(5, 'Madison Nguyen', 'MadisonNguyen@gmail.com', 70000),
(6, 'Shaun Neel', 'ShaunNeel@gmail.com', 80000),
(7, 'Aileen Barrett', 'AileenBarrett@gmail.com', 9000),
(8, 'Abbi Rojas', 'AbbiRojas@gmail.com', 1000),
(9, 'Anum Vu', 'AnumVu@gmail.com', 2000),
(10, 'Len Payne', 'LenPayne@gmail.com', 3000),
(11, 'Aiden Person', 'Aiden@gmail.com', 39800);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `transferid` int(255) NOT NULL,
  `sender_id` int(225) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `receiver_id` int(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `transfered_amount` int(255) NOT NULL,
  `transfer_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`transferid`, `sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `transfered_amount`, `transfer_date`) VALUES
(1, 1, 'Sarvesh Mantri', 2, 'Binod Tharu', 1000, '2021-03-21 11:52:07'),
(2, 11, 'Aiden Person', 1, 'Sarvesh Mantri', 200, '2021-03-21 11:58:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`transferid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `transferid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
