-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 02:30 AM
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
-- Table structure for table `tblaccesslevels`
--

CREATE TABLE `tblaccesslevels` (
  `accesslevelsId` int(11) NOT NULL,
  `accessLevels` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccesslevels`
--

INSERT INTO `tblaccesslevels` (`accesslevelsId`, `accessLevels`) VALUES
(1, 'Admin'),
(2, 'Agents'),
(3, 'Coach'),
(4, 'Clients');

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE `tblaccounts` (
  `accountId` int(11) NOT NULL,
  `accountEmail` varchar(255) NOT NULL,
  `accountPassword` varchar(255) NOT NULL,
  `accountStatus` int(11) NOT NULL,
  `accesslevelsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblaccounts`
--

INSERT INTO `tblaccounts` (`accountId`, `accountEmail`, `accountPassword`, `accountStatus`, `accesslevelsId`) VALUES
(1, 'mat@onlinetooffline.com.au', '$2y$10$5VqCu//VghEwMV8fgAZtV.y5mGeuFX/cvknaE83wms/NuEu4JDhGW', 1, 1),
(2, 'pallen@isearchpartners.net', '$2y$10$ZCaU.NMsAQN1o6VHC/OOr.G6OL49yrV6GpYHk.RCl9K8dgmP.ove.', 1, 4),
(3, 'joeladicker@aol.com', '$2y$10$xu3QkC9EYt3/H/QwTS5mq.5uv7NYp/RfdFsARcmuZGgmveCddh0Ri', 1, 1),
(4, 'leila@launchpadteam.com', '$2y$10$i0yQXPgAeaiAA.gkJdReduXwS8DGPJWehm4eVF/vJ60FJ6dfnhBrG', 1, 2),
(5, 'aweisman@focalpointcoaching.com', '$2y$10$KTzfeVUbQu9VZiU87/fWWe8pN1R5Lz3erxdoq4NJzJTTa5YVondiO', 1, 4),
(6, 'athompson@focalpointcoaching.com', '$2y$10$Oq/1Cty84xQXHW4/nrDCNu7KwsbPHitmgcmIxRt/LKy/SVAFDMKK6', 1, 4),
(7, 'eloiseo2oagent@gmail.com', '$2y$10$gH/WhXuAgySMQCcmBL4tfulNPBetrcsjwDrgdWFWMI/IoJI07vGQO', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblagents`
--

CREATE TABLE `tblagents` (
  `agentId` int(11) NOT NULL,
  `agentLastname` varchar(45) NOT NULL,
  `agentFirstname` varchar(45) NOT NULL,
  `agentMiddlename` varchar(45) NOT NULL,
  `agentEmailAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblagents`
--

INSERT INTO `tblagents` (`agentId`, `agentLastname`, `agentFirstname`, `agentMiddlename`, `agentEmailAddress`) VALUES
(1, 'Tinaco', 'Leila', 'J', 'leila@launchpadteam.com'),
(2, 'Chas', 'Eloise', 'Lingatong', 'eloiseo2oagent@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblassignclients`
--

CREATE TABLE `tblassignclients` (
  `assignclientId` int(11) NOT NULL,
  `agentId` int(11) NOT NULL,
  `clientsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblassignclients`
--

INSERT INTO `tblassignclients` (`assignclientId`, `agentId`, `clientsId`) VALUES
(1, 1, 5),
(2, 1, 4),
(3, 2, 1),
(4, 2, 4),
(5, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblassignleadgen`
--

CREATE TABLE `tblassignleadgen` (
  `leadgenId` int(11) NOT NULL,
  `agentId` int(11) NOT NULL,
  `clientId` int(11) NOT NULL,
  `taskId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblassignleadgen`
--

INSERT INTO `tblassignleadgen` (`leadgenId`, `agentId`, `clientId`, `taskId`) VALUES
(1, 2, 4, 1),
(2, 2, 4, 1),
(3, 2, 4, 1),
(4, 2, 4, 1),
(5, 2, 4, 1),
(6, 2, 4, 1),
(7, 2, 4, 1),
(8, 2, 4, 1),
(9, 2, 4, 1),
(10, 2, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblclients`
--

CREATE TABLE `tblclients` (
  `clientsId` int(11) NOT NULL,
  `clientsFirstname` varchar(255) NOT NULL,
  `clientsMiddlename` varchar(255) NOT NULL,
  `clientsLastname` varchar(255) NOT NULL,
  `clientsBussinessName` varchar(255) NOT NULL,
  `clientsCampaignGoals` varchar(255) NOT NULL,
  `clientsDateStarted` date NOT NULL,
  `clientsJointVenture` varchar(255) NOT NULL,
  `clientsEmailAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblclients`
--

INSERT INTO `tblclients` (`clientsId`, `clientsFirstname`, `clientsMiddlename`, `clientsLastname`, `clientsBussinessName`, `clientsCampaignGoals`, `clientsDateStarted`, `clientsJointVenture`, `clientsEmailAddress`) VALUES
(1, 'Mat', 'M. ', 'Boyle', 'Online to Offline', 'O2O', '2021-02-14', 'MyFitVA', 'mat@onlinetooffline.com.au'),
(2, 'James', 'Laurente', 'Prieto', 'MyFitVA', 'O2O', '2021-02-15', 'MyFitVA', 'pallen@isearchpartners.net'),
(3, 'Cristiano', 'baloon', 'Ronaldo', 'VA', 'Social Media', '2021-02-16', 'O2O', 'joeladicker@aol.com'),
(4, 'Adam', 'M', 'Weisman', 'Focal Point', 'O2O', '2021-02-16', 'O2O', 'aweisman@focalpointcoaching.com'),
(5, 'Adam', 'T', 'Thompson', 'Focal Point', 'O2O', '2021-02-16', 'O2O', 'athompson@focalpointcoaching.com');

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
-- Indexes for table `tblaccesslevels`
--
ALTER TABLE `tblaccesslevels`
  ADD PRIMARY KEY (`accesslevelsId`);

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `tblagents`
--
ALTER TABLE `tblagents`
  ADD PRIMARY KEY (`agentId`);

--
-- Indexes for table `tblassignclients`
--
ALTER TABLE `tblassignclients`
  ADD PRIMARY KEY (`assignclientId`);

--
-- Indexes for table `tblassignleadgen`
--
ALTER TABLE `tblassignleadgen`
  ADD PRIMARY KEY (`leadgenId`);

--
-- Indexes for table `tblclients`
--
ALTER TABLE `tblclients`
  ADD PRIMARY KEY (`clientsId`);

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
-- AUTO_INCREMENT for table `tblaccesslevels`
--
ALTER TABLE `tblaccesslevels`
  MODIFY `accesslevelsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblagents`
--
ALTER TABLE `tblagents`
  MODIFY `agentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblassignclients`
--
ALTER TABLE `tblassignclients`
  MODIFY `assignclientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblassignleadgen`
--
ALTER TABLE `tblassignleadgen`
  MODIFY `leadgenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblclients`
--
ALTER TABLE `tblclients`
  MODIFY `clientsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
