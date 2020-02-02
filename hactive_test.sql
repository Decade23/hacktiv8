-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2020 at 10:19 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hactive_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `Movie`
--

CREATE TABLE `Movie` (
  `id` int(11) NOT NULL,
  `movie` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `productionHouseId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ProductionHouse`
--

CREATE TABLE `ProductionHouse` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Movie`
--
ALTER TABLE `Movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productionHouseId` (`productionHouseId`);

--
-- Indexes for table `ProductionHouse`
--
ALTER TABLE `ProductionHouse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Movie`
--
ALTER TABLE `Movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ProductionHouse`
--
ALTER TABLE `ProductionHouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Movie`
--
ALTER TABLE `Movie`
  ADD CONSTRAINT `productionHouseId` FOREIGN KEY (`productionHouseId`) REFERENCES `ProductionHouse` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
