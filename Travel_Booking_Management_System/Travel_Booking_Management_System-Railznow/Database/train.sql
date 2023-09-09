-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 08:55 AM
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
-- Database: `train`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindatabase`
--

CREATE TABLE `admindatabase` (
  `UserID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `DoB` date NOT NULL,
  `Joined_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admindatabase`
--

INSERT INTO `admindatabase` (`UserID`, `Name`, `Email`, `Gender`, `password`, `DoB`, `Joined_on`) VALUES
(1, 'Dhanya', 'dhanya@gmail.com', 'F', '1234', '2000-02-13', '2023-08-02 06:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `bustransactions`
--

CREATE TABLE `bustransactions` (
  `T_No.` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `source` varchar(50) NOT NULL,
  `dest` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Bus_No` int(11) NOT NULL,
  `NoOfpass` int(11) NOT NULL,
  `card_no` int(25) NOT NULL,
  `expmonth` int(2) NOT NULL,
  `expyear` int(2) NOT NULL,
  `cvv` int(3) NOT NULL,
  `pin` int(4) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bustransactions`
--

INSERT INTO `bustransactions` (`T_No.`, `email`, `source`, `dest`, `Name`, `Bus_No`, `NoOfpass`, `card_no`, `expmonth`, `expyear`, `cvv`, `pin`, `Date`, `Amt`) VALUES
(1, 'pratham@gmail.com', 'Mumbai', 'Delhi', 'Pratham', 502, 2, 0, 0, 0, 0, 0, '2020-03-06 13:30:10', 1000),
(2, 'akshay@gmail.com', 'Mumbai', 'Bangalore', 'Akshay', 502, 2, 0, 0, 0, 0, 0, '2020-03-06 14:16:16', 1000),
(3, 'akshay@gmail.com', 'Mumbai', 'Hyderabad', 'Akshay', 502, 2, 0, 0, 0, 0, 0, '2020-03-06 16:17:45', 1000),
(4, 'meera@gmail.com', 'Mumbai', 'Chennai', 'Meera', 502, 4, 0, 0, 0, 0, 0, '2020-04-07 21:17:46', 1000),
(5, 'meera@gmail.com', 'Mumbai', 'Kolkata', 'Meera', 502, 3, 0, 0, 0, 0, 0, '2022-05-07 13:00:02', 1000),
(7, 'meera@gmail.com', 'Mumbai', 'Kolkata', 'Meera', 502, 5, 0, 0, 0, 0, 0, '2021-07-21 11:59:21', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

-- --------------------------------------------------------

--
-- Table structure for table `pricebus`
--

CREATE TABLE `pricebus` (
  `No.` int(15) NOT NULL,
  `Bus_No.` int(50) NOT NULL,
  `source` varchar(50) NOT NULL,
  `dest` varchar(50) NOT NULL,
  `Price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricebus`
--

INSERT INTO `pricebus` (`No.`, `Bus_No.`, `source`, `dest`, `Price`) VALUES

(15, 502, 'Mumbai', 'Hyderabad', 1000),
(16, 502, 'Mumbai', 'Bangalore', 1000),
(17, 502, 'Mumbai', 'Chennai', 1000),
(18, 502, 'Mumbai', 'Kolkata', 1000),
(19, 502, 'Mumbai', 'Delhi', 1000),

(34, 502, 'Delhi', 'Hyderabad', 500),
(35, 502, 'Delhi', 'Bangalore', 1500),
(36, 502, 'Delhi', 'Chennai', 1600),
(37, 502, 'Delhi', 'Kolkata', 1600),
(38, 502, 'Delhi', 'Mumbai', 1505),

(53, 502, 'Kolkata', 'Hyderabad', 1295),
(54, 502, 'Kolkata', 'Bangalore', 1235),
(55, 502, 'Kolkata', 'Chennai', 1235),
(56, 502, 'Kolkata', 'Delhi', 1235),
(57, 502, 'Kolkata', 'Mumbai', 1235),

(72, 502, 'Chennai', 'Hyderabad', 1345),
(73, 502, 'Chennai', 'Bangalore', 1235),
(74, 502, 'Chennai', 'Kolkata', 1245),
(75, 502, 'Chennai', 'Delhi', 1675),
(76, 502, 'Chennai', 'Mumbai', 1785),

(91, 502, 'Bangalore', 'Hyderabad', 1675),
(92, 502, 'Bangalore', 'Chennai', 1675),
(93, 502, 'Bangalore', 'Kolkata', 1675),
(94, 502, 'Bangalore', 'Delhi', 1295),
(95, 502, 'Bangalore', 'Mumbai', 1245);

-- --------------------------------------------------------

--
-- Table structure for table `trains_info`
--

CREATE TABLE `trains_info` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `trainName` VARCHAR(255) NOT NULL,
    `arrivalTime` TIME NOT NULL,
    `departureTime` TIME NOT NULL,
    `bookingDate` DATE NOT NULL
);


-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `T_No.` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `trainName` varchar(50) NOT NULL,
  `arrivalTime` time NOT NULL,
  `departureTime` time NOT NULL,
  `card_no` int(25) NOT NULL,
  `expmonth` int(2) NOT NULL,
  `expyear` int(2) NOT NULL,
  `cvv` int(3) NOT NULL,
  `pin` int(4) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `Amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`T_No.`, `email`, `Name`, `trainName`, `arrivalTime`, `departureTime`, `card_no`, `expmonth`, `expyear`, `cvv`, `pin`, `Date`, `Amt`) VALUES
(1, 'naina@gmail.com', 'Naina', 'Mysuru Shatabdi Express', '15:30:00', '18:00:00', 123, 10, 25, 23, 1223, '2023-09-04 15:30:00', 1223);

-- --------------------------------------------------------

--
-- Table structure for table `userdatabase`
--

CREATE TABLE `userdatabase` (
  `UserID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `DoB` date NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Joined_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdatabase`
--

INSERT INTO `userdatabase` (`UserID`, `Name`, `Email`, `Gender`, `password`, `DoB`, `Phone`, `Joined_on`) VALUES
(20, 'Naina', 'naina@gmail.com', 'F', '123', '2003-11-11', '0', '2023-02-28 02:51:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bustransactions`
--
ALTER TABLE `bustransactions`
  ADD PRIMARY KEY (`T_No.`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`T_No.`);

--
-- Indexes for table `userdatabase`
--
ALTER TABLE `userdatabase`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bustransactions`
--
ALTER TABLE `bustransactions`
  MODIFY `T_No.` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `T_No.` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `userdatabase`
--
ALTER TABLE `userdatabase`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
