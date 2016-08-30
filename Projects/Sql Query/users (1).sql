-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2016 at 08:33 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `uname` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `tim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`uname`, `day`, `tim`) VALUES
('suveccha', '2016/08/29', '06:46:51pm'),
('shubho', '2016/08/30', '07:11:28pm');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `privilege` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`username`, `password`, `privilege`, `status`) VALUES
('Admin', '1234', 'admin', 'offline'),
('shubho', '1234', '', 'offline'),
('suveccha', '1234', 'employee', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `ID` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `imgUrl` varchar(200) NOT NULL,
  `imgLocation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`ID`, `Name`, `imgUrl`, `imgLocation`) VALUES
('1234', 'Abcd', 'http://localhost', 'loading.gif'),
('3214', 'Dipto', 'http://localhost/webtech/', 'lg.png');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `eType` varchar(15) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice`, `username`, `eType`, `date`) VALUES
('abcd', 'abc', 'all', '0000-00-00 00:00:00'),
('ds', 'All', 'All', '2016-08-17 21:03:23'),
('Hello', 'shubho', 'All', '2016-08-23 18:51:26'),
('hello', 'shubho', 'All', '2016-08-25 11:38:27'),
('hello fgdug', 'antu', 'All', '2016-08-25 12:52:23'),
('asjkdfhsfnlrketj', 'shubho', 'All', '2016-08-28 13:11:40'),
('hello you are assigned here', 'shubho', 'All', '2016-08-29 19:53:42'),
('hello hi how are you', 'admin', 'All', '2016-08-30 15:36:08');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `uname` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `assigned_to` varchar(20) NOT NULL,
  `assigned_from` varchar(20) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `status` varchar(20) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `completed_at` varchar(20) NOT NULL,
  `task_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`assigned_to`, `assigned_from`, `description`, `status`, `start_date`, `end_date`, `completed_at`, `task_id`) VALUES
('shubho', 'admin', 'Hello hi how are you', 'complete', '2016-08-17', '2016-08-18', '2016-08-30', 1),
('shubho', 'admin', 'this is a test task', 'complete', '2016-08-31', '2016-09-09', '2016-08-30', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `task_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `details` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
