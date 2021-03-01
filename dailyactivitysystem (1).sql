-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 08:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dailyactivitysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblleadgen`
--

CREATE TABLE `tblleadgen` (
  `leadGenId` int(11) NOT NULL,
  `agentId` int(11) NOT NULL,
  `clientsId` int(11) NOT NULL,
  `taskId` int(11) NOT NULL,
  `date` date NOT NULL,
  `connectionRequestSent` int(100) NOT NULL,
  `totalLinkedInConnections` int(100) NOT NULL,
  `clicks` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblleadgen`
--

INSERT INTO `tblleadgen` (`leadGenId`, `agentId`, `clientsId`, `taskId`, `date`, `connectionRequestSent`, `totalLinkedInConnections`, `clicks`) VALUES
(1, 2, 4, 1, '2020-11-30', 80, 2343, 1),
(2, 2, 4, 1, '2020-12-01', 80, 2358, 3),
(3, 2, 4, 1, '2020-12-02', 80, 2393, 2),
(4, 2, 4, 1, '2020-12-03', 80, 2422, 1),
(5, 2, 4, 1, '2020-12-04', 80, 2444, 1),
(6, 2, 4, 1, '2020-12-07', 80, 2470, 2),
(7, 2, 4, 1, '2020-12-08', 80, 2494, 0),
(8, 2, 4, 1, '2020-12-09', 80, 2513, 2),
(9, 2, 4, 1, '2020-12-10', 80, 2534, 3),
(10, 2, 4, 1, '2020-12-11', 80, 2583, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbltasks`
--

CREATE TABLE `tbltasks` (
  `taskId` int(11) NOT NULL,
  `tasks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltasks`
--

INSERT INTO `tbltasks` (`taskId`, `tasks`) VALUES
(1, 'Lead Generator Daily Activity'),
(2, 'LinkedIn /Replies Survey Responses'),
(3, 'Update Contacts In Ontraport'),
(4, 'LinkedIn Weekly Cleanup'),
(5, 'Issues');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblleadgen`
--
ALTER TABLE `tblleadgen`
  ADD PRIMARY KEY (`leadGenId`);

--
-- Indexes for table `tbltasks`
--
ALTER TABLE `tbltasks`
  ADD PRIMARY KEY (`taskId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblleadgen`
--
ALTER TABLE `tblleadgen`
  MODIFY `leadGenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbltasks`
--
ALTER TABLE `tbltasks`
  MODIFY `taskId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
