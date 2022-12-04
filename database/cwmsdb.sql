-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 08:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cwmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'zuber', 'zuber12', '2020-12-10 11:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`) VALUES
(1, 'Exterior Washing'),
(2, 'Interior Washing'),
(3, 'Vacuum Cleaning'),
(4, 'Seats Washing'),
(5, 'Window Wiping'),
(6, 'Wet Cleaning'),
(7, 'Oil Changing'),
(8, 'Break Repairing');

-- --------------------------------------------------------

--
-- Table structure for table `tblcarwashbooking`
--

CREATE TABLE `tblcarwashbooking` (
  `id` int(11) NOT NULL,
  `bookingId` bigint(10) DEFAULT NULL,
  `packageType` varchar(120) DEFAULT NULL,
  `carWashPoint` int(11) DEFAULT NULL,
  `fullName` varchar(150) DEFAULT NULL,
  `mobileNumber` bigint(12) DEFAULT NULL,
  `washDate` date DEFAULT NULL,
  `washTime` time DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `adminRemark` mediumtext DEFAULT NULL,
  `paymentMode` varchar(120) DEFAULT NULL,
  `txnNumber` varchar(120) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcarwashbooking`
--

INSERT INTO `tblcarwashbooking` (`id`, `bookingId`, `packageType`, `carWashPoint`, `fullName`, `mobileNumber`, `washDate`, `washTime`, `message`, `status`, `adminRemark`, `paymentMode`, `txnNumber`, `postingDate`, `lastUpdationDate`) VALUES
(1, 316460298, '1', 1, 'Rohit', 1234567890, '2022-11-15', '11:45:00', 'NA', 'Completed', 'Washing completed', 'e-Wallet', '345345345', '2022-11-14 05:14:22', '2022-11-26 04:11:12'),
(2, 647869499, '3', 2, 'Raj kumar', 1234567890, '2022-11-15', '15:47:00', 'na', 'New', NULL, NULL, NULL, '2022-11-14 05:18:47', '2022-11-26 04:11:36'),
(3, 215755984, '2', 3, 'Rakshit', 9874563210, '2022-11-15', '15:05:00', 'NA', 'Completed', 'done', 'Debit/Credit Card', '45768976', '2022-11-14 05:18:59', '2022-11-26 04:19:38'),
(4, 440337019, '1', 2, 'pankaj', 6987412360, '2022-11-15', '19:37:00', 'NA', 'New', NULL, NULL, NULL, '2022-11-14 06:01:55', '2022-11-26 04:12:38'),
(5, 783971257, '2', 2, 'Popat', 1234567890, '2022-11-16', '13:31:00', 'NA', 'New', NULL, NULL, NULL, '2022-11-15 06:00:44', '2022-11-26 04:12:56'),
(6, 328979472, '3 ', 3, 'Zuber', 1234567890, '2022-11-16', '10:15:00', 'NA', 'New', NULL, NULL, NULL, '2022-11-15 04:12:37', '2022-11-26 04:13:14'),
(7, 151983398, '1', 2, 'Javed', 1234569870, '2022-11-16', '19:50:00', 'Car wash', 'Completed', 'Car Wash Completed', 'Debit/Credit Card', 'DSGFS72342834', '2022-11-15 09:15:28', '2022-11-26 04:13:27'),
(8, 144631909, '2', 1, 'ghgh', 9879778778, '2022-11-17', '19:36:00', 'vv', 'Completed', 'm  ', 'Cash', '', '2022-11-15 14:03:11', '2022-11-26 04:13:39'),
(9, 923702153, '2', 2, 'gcghc', 9879778778, '2022-11-24', '20:39:00', 'ooeoe', 'Completed', 'ugg', 'UPI', '444648989', '2022-11-16 15:07:15', '2022-11-26 04:14:02'),
(11, 635510317, '2', 3, 'ghgh', 9879778778, '2022-11-30', '10:19:00', 'kukg\r\n\r\n', 'New', NULL, NULL, NULL, '2022-11-24 08:49:24', NULL),
(12, 958457561, '1', 3, 'zuber ali', 8556881003, '2022-12-01', '11:11:00', 'Jaldi Kr Dai', 'Completed', 'done', 'Cash', '7676', '2022-11-25 03:38:53', '2022-11-25 04:15:17'),
(13, 878423872, '1', 7, 'Chinky ', 4512451245, '2022-11-30', '01:47:00', 'krbfukerj', 'Completed', 'done', 'UPI', '45768976', '2022-11-26 04:17:32', '2022-11-26 04:19:58'),
(14, 926156032, '1', 3, 'pinky', 9854763254, '2022-12-04', '15:12:00', 'urgent', 'New', NULL, NULL, NULL, '2022-11-26 04:42:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblenquiry`
--

CREATE TABLE `tblenquiry` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Subject` varchar(100) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblenquiry`
--

INSERT INTO `tblenquiry` (`id`, `FullName`, `EmailId`, `Subject`, `Description`, `PostingDate`, `Status`) VALUES
(4, 'Rohit', 'rohit@gmail.com', 'General Enquiry', 'I want to know the price of car wash', '2022-11-12 06:27:53', 1),
(5, 'Rakshit', 'raks@gmail.com', 'Test', 'Test', '2022-11-12 07:05:24', 1),
(6, 'Poojal', 'p@gmail.com', 'car wash', 'hhdjh', '2022-11-12 15:08:28', 1),
(7, 'Popat', 'pop@gmail.com', 'car wash', 'enm fenm f', '2022-11-24 08:58:01', NULL),
(8, 'Javed', 'pm@gmail.com', 'car wash', 'Dhoo Deee Hun', '2022-11-25 03:40:25', NULL),
(9, 'hjdukhef', 'pm@gmail.com', 'wefrf', 'rgjkbefj\r\n', '2022-11-26 04:16:49', NULL),
(10, 'ihbkj', 'bhloiuh@gmail.com', 'wefrf', 'hjvgchgcgcghgc', '2022-11-26 04:34:56', NULL),
(11, 'zak', 'hknjm@gmail.com', 'dfg', 'ddtg', '2022-11-26 05:30:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpages`
--

CREATE TABLE `tblpages` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT '',
  `detail` longtext DEFAULT NULL,
  `openignHrs` varchar(255) DEFAULT NULL,
  `phoneNumber` bigint(20) DEFAULT NULL,
  `emailId` varchar(120) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpages`
--

INSERT INTO `tblpages` (`id`, `type`, `detail`, `openignHrs`, `phoneNumber`, `emailId`) VALUES
(3, 'aboutus', '<span style=\"color: rgb(255, 255, 255); \">Car Wash Management System is a brand which is literally going to change the way people think about car cleaning. It is a unique mechanized car cleaning concept where cars are getting pampered by the latest equipments including high pressure cleaning machines, spray injection and extraction machines, high powered vacuum cleaners, steam cleaners and so on.\r\nAll the operations to clean the car successfully is done by the highly expert and experienced workers. It brings Cleaning, Wash & Color, Changing Tire, Engine Repairing service at your doorsteps and also saves your energy. \r\n</span>					   ', NULL, NULL, NULL),
(11, 'contact', '123 Street, Sherpur, Ludhiana', 'Mon - Fri, 9:00 AM - 9:00 PM', 9878945246, 'zak@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblwashingpoints`
--

CREATE TABLE `tblwashingpoints` (
  `id` int(11) NOT NULL,
  `washingPointName` varchar(255) DEFAULT NULL,
  `washingPointAddress` varchar(255) DEFAULT NULL,
  `contactNumber` bigint(20) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwashingpoints`
--

INSERT INTO `tblwashingpoints` (`id`, `washingPointName`, `washingPointAddress`, `contactNumber`, `creationDate`, `email`) VALUES
(1, 'XYZ Car Washing Point', 'ABC Street, Sherpur', 9856741230, '2022-11-10 09:21:20', 'xyz@gmail.com'),
(2, 'ABC Car Washing Point', 'A3263 Sector 1, Ludhiana', 9876541025, '2022-11-10 09:30:32', 'abc@gmail.com'),
(3, 'ZAK Car Washing Point', '#911, Model Town', 8574203610, '2022-11-10 09:33:28', 'p@gmail.com'),
(7, 'zubii', '#1400, Street No. 30\r\nJanta Nagar  ', 7347657337, '2022-11-22 14:49:47', 'poojalmehta12@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcarwashbooking`
--
ALTER TABLE `tblcarwashbooking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carWashPoint` (`carWashPoint`);

--
-- Indexes for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpages`
--
ALTER TABLE `tblpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblwashingpoints`
--
ALTER TABLE `tblwashingpoints`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcarwashbooking`
--
ALTER TABLE `tblcarwashbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblenquiry`
--
ALTER TABLE `tblenquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblpages`
--
ALTER TABLE `tblpages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblwashingpoints`
--
ALTER TABLE `tblwashingpoints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcarwashbooking`
--
ALTER TABLE `tblcarwashbooking`
  ADD CONSTRAINT `washingpointid` FOREIGN KEY (`carWashPoint`) REFERENCES `tblwashingpoints` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
