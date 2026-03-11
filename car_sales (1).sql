-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 12:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lunas_garage`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_sales`
--

CREATE TABLE `car_sales` (
  `Car_id` int(30) NOT NULL,
  `Make` varchar(30) NOT NULL,
  `Model` varchar(30) NOT NULL,
  `Year` int(11) NOT NULL,
  `Price` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_sales`
--

INSERT INTO `car_sales` (`Car_id`, `Make`, `Model`, `Year`, `Price`) VALUES
(9, 'BMW', '135i', 2010, ''),
(10, 'Ford', 'Mustang', 2000, ''),
(11, 'Hyundai', 'Sonata N Line', 2025, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_sales`
--
ALTER TABLE `car_sales`
  ADD PRIMARY KEY (`Car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_sales`
--
ALTER TABLE `car_sales`
  MODIFY `Car_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
