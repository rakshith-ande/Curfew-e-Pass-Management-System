-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 21, 2020 at 03:01 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `CategoryName`, `CreationDate`) VALUES
(1, 'Logistic Deliveries', '2020-04-14 07:27:32'),
(2, 'Cleaning', '2020-04-14 07:49:09'),
(3, 'Essential Services', '2020-04-14 07:49:22'),
(4, 'Ecomerce delivery boys', '2020-04-14 07:49:47'),
(5, 'Medical Supply', '2020-04-14 07:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `ID` int(10) NOT NULL,
  `Passnumber` varchar(200) DEFAULT NULL,
  `Fullname` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `AadharCardno` varchar(200) DEFAULT NULL,
  `Category` varchar(100) DEFAULT NULL,
  `FromDate` varchar(200) DEFAULT NULL,
  `ToDate` varchar(200) DEFAULT NULL,
  `PasscreationDate` timestamp NULL DEFAULT current_timestamp(),
  `type` int(1) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pass`
--

INSERT INTO `pass` (`ID`, `Passnumber`, `Fullname`, `Phone`, `Email`, `AadharCardno`, `Category`, `FromDate`, `ToDate`, `PasscreationDate`, `type`, `userid`) VALUES
(1, '286529906', 'useruser', 243566432, 'useruser@gmail.com', '12345', 'Logistic Deliveries', '2020-07-16', '2020-07-17', '2020-04-14 11:47:03', 1, 1),
(2, '915773340', 'Suresh Khanna', 9879878978, 'suresh@gmail.com', 'KTI-896567', 'Essential Services', '2020-04-14', '2020-07-31', '2020-04-13 11:50:15', 1, 1),
(3, '884595667', 'Anuj kumar', 1234567890, 'phpgurukulofficial@Gmail.com', '5235252', 'Essential Services', '2020-04-16', '2020-04-19', '2020-04-16 02:38:27', 1, 1),
(4, '135236078', 'rgukt', 123456789, 'rgukt@gmail.com', '123456', 'Logistic Deliveries', '2020-07-09', '2020-07-10', '2020-07-07 09:28:30', 1, 1),
(5, '180476815', 'ukg', 243566432, 'klasdf@gmail.com', '6564321', 'Cleaning', '2020-07-10', '2020-07-16', '2020-07-08 09:52:26', -1, 4),
(6, '895503809', 'rgv', 9876123443, 'rgv@gmail.com', '1234565', 'Medical Supply', '2020-07-15', '2020-07-16', '2020-07-14 11:45:07', 1, 3),
(7, '428768364', 'useruser', 243566432, 'user@gmail.com', '12345', 'Logistic Deliveries', '2020-07-16', '2020-07-17', '2020-07-15 16:48:56', 1, 1),
(8, '304940635', 'user', 1234567890, 'user@gmail.com', '12345', 'Logistic Deliveries', '2020-07-16', '2020-07-17', '2020-07-15 16:50:59', 0, 3),
(9, '276620809', 'user', 765432, 'user@gmail.com', '2345', 'Cleaning', '2020-07-18', '2020-07-18', '2020-07-18 11:43:01', 0, 3),
(10, '961588908', 'user', 876543, 'user@gmail.com', '6543', 'Ecomerce delivery boys', '2020-07-18', '2020-07-18', '2020-07-18 11:43:18', -1, 3),
(11, '650235492', 'user1', 65432, 'user1@gmail.com', '45432', 'Essential Services', '2020-07-19', '2020-07-20', '2020-07-18 11:43:50', 0, 4),
(12, '207373445', 'user1', 5324, 'user1@gmail.com', '34543', 'Medical Supply', '2020-07-19', '2020-07-20', '2020-07-18 11:44:06', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(10) NOT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserName`, `MobileNumber`, `Email`, `Password`, `type`, `AdminRegdate`) VALUES
(1, 'Admin', 1234567890, 'adminuser@gmail.com', 'admin123', 'admin', '2020-04-14 06:44:27'),
(3, 'user', 243566432, 'user@gmail.com', 'rgukt123', 'normal user', '2020-07-14 11:20:39'),
(4, 'user1', 123456789, 'user1@gmail.com', 'rgukt', 'normal user', '2020-07-14 11:23:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pass`
--
ALTER TABLE `pass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pass`
--
ALTER TABLE `pass`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
