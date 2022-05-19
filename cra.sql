-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 05:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cra`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_master`
--

CREATE TABLE `car_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agency_id` varchar(11) NOT NULL,
  `vehicle_model` varchar(50) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `seating-capacity` int(11) NOT NULL,
  `rent_per_day` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'not booked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_master`
--

INSERT INTO `car_master` (`id`, `agency_id`, `vehicle_model`, `vehicle_number`, `seating-capacity`, `rent_per_day`, `status`) VALUES
(1, 'A-1', 'Honda City', 'UP78DC8713', 5, 250, 'booked'),
(2, 'A-1', 'Indigo CS', 'UP 78 BB 8907', 5, 200, 'not booked');

-- --------------------------------------------------------

--
-- Table structure for table `rent_car_details`
--

CREATE TABLE `rent_car_details` (
  `rent_id` bigint(20) UNSIGNED NOT NULL,
  `agency_id` varchar(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `customer_id` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `startDate` date NOT NULL,
  `total_days` int(11) NOT NULL,
  `totalCost` int(11) NOT NULL,
  `vehicle_model` varchar(30) NOT NULL,
  `vehicle_number` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent_car_details`
--

INSERT INTO `rent_car_details` (`rent_id`, `agency_id`, `car_id`, `customer_id`, `username`, `startDate`, `total_days`, `totalCost`, `vehicle_model`, `vehicle_number`) VALUES
(1, 'A-1', 1, 'C-1', 'Urvashi', '2022-05-18', 6, 1500, 'Honda City', 'UP78DC8713');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `user_type` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_id`, `user_type`, `username`, `user_email`, `password`) VALUES
(1, 'C-1', 'Customer', 'Urvashi', 'urvi@u', 'a'),
(2, 'A-1', 'Car_Agency', 'car_agency1', 'caragency1@c', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_master`
--
ALTER TABLE `car_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rent_car_details`
--
ALTER TABLE `rent_car_details`
  ADD PRIMARY KEY (`rent_id`),
  ADD UNIQUE KEY `rent_id` (`rent_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_master`
--
ALTER TABLE `car_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rent_car_details`
--
ALTER TABLE `rent_car_details`
  MODIFY `rent_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
