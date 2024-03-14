-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 03:20 PM
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
-- Database: `web_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `id` int(10) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`id`, `firstName`, `lastName`, `username`, `email`, `password`) VALUES
(1, 'Hmd', 'Shumeri', 'adminAmy', 'amy@gmail.com', '123'),
(2, 'UOC', 'UOC', 'UOC', 'U@gmail.com', 'ucsc');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `articleID` int(10) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleID`, `heading`, `description`) VALUES
(1, 'Computer Getting Stuck', 'Computer freezes due to overload of RAM.'),
(3, 'System Crash', 'Can Happen due Harware Failures,Software ugs,Overheating.'),
(4, 'Slow Performance', 'This issue can be caused by several factors, including insufficient RAM, too many background processes, or a fragmented hard drive. To address slow performance, try closing unnecessary programs, clearing temporary files, and running a disk cleanup utility'),
(5, ' Internet Connectivity Problems', 'Poor internet connectivity can hamper productivity and disrupt online activities. If you\'re experiencing internet issues, start by checking your router and modem for any hardware problems. Restarting the router or resetting it to factory settings can ofte'),
(6, 'Computer Overheating', 'fans getting blocked'),
(7, 'How to Resolve Computer Boot Failure', 'Discover potential causes behind boot failures, including corrupted BIOS settings, faulty hardware components, and software conflicts.'),
(8, 'Fixing Noisy Hard Drives', 'This article outlines the possible reasons behind noisy hard drives, such as mechanical failure or improper ventilation.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `feedback` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `feedback`) VALUES
(1, 'mark', 'mark@gmail.com', 'Very Helpful'),
(3, 'uoc', 'uoc@gmail.com', 'Real time replies given');

-- --------------------------------------------------------

--
-- Table structure for table `reply_ticket`
--

CREATE TABLE `reply_ticket` (
  `ticket_replyID` int(10) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `reply` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply_ticket`
--

INSERT INTO `reply_ticket` (`ticket_replyID`, `subject`, `message`, `category`, `priority`, `username`, `reply`) VALUES
(4, 'RAM', 'How to select a good RAM', 'Hardware', 'Medium', 'userMark', 'j'),
(5, 'Not Charging', 'The device is not charging cor', 'Hardware', 'Low', 'userMark', 'Check the battery'),
(6, 'Data Structures and Algo', 'Explain the difference between', 'Technical', 'Low', 'userMark', 'Arrays store elements in contiguous memory locations with fixed size, whereas linked lists store elements non-contiguously with dynamic size.');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_ID` int(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL,
  `priority` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_ID`, `subject`, `message`, `category`, `priority`, `username`) VALUES
(4, 'RAM', 'How to select a good RAM', 'Hardware', 'Medium', 'userMark'),
(6, 'Data Structures and Algo', 'Explain the difference between an array and a linked list', 'Technical', 'Low', 'userMark');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `userID` int(10) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`userID`, `firstName`, `lastName`, `username`, `email`, `password`) VALUES
(1, 'Mark ', 'HenryyYYY', 'userMark', 'mark@gmail.com', '123'),
(3, 'uoc', 'uoc', 'uoc', 'uoc@gmail.com', 'ucsc'),
(4, 'Nathan', 'Shumer', 'userNathan', 'nathan@gmail.com', '123'),
(5, 'Henry', 'Cavil', 'userCavil', 'cavil@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply_ticket`
--
ALTER TABLE `reply_ticket`
  ADD PRIMARY KEY (`ticket_replyID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_ID`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
