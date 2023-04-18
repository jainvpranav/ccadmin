-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 05:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpoolcrew`
--

-- --------------------------------------------------------

--
-- Table structure for table `drvinfo`
--

CREATE TABLE `drvinfo` (
  `drvid` int(11) NOT NULL,
  `drvname` varchar(100) NOT NULL,
  `drvemail` varchar(100) NOT NULL,
  `drvlicense` varchar(15) NOT NULL,
  `drvphone` varchar(10) NOT NULL,
  `drvaadhar` varchar(12) NOT NULL,
  `cartype` varchar(100) NOT NULL,
  `pricekm` int(10) NOT NULL,
  `vacancy` int(1) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drvinfo`
--

INSERT INTO `drvinfo` (`drvid`, `drvname`, `drvemail`, `drvlicense`, `drvphone`, `drvaadhar`, `cartype`, `pricekm`, `vacancy`, `password`) VALUES
(1, 'pranav', 'pranav@gmail.com', 'KA2020213456789', '8618994561', '123456789101', 'sedan', 12, 3, '912ec803b2ce49e4a541068d495ab570'),
(2, 'ads', 'adasda@gmail.com', 'KA2020213456123', '9877896578', '123456782334', 'suv', 15, 4, '202cb962ac59075b964b07152d234b70'),
(8, 'asdfghjk', 'pranavv@gmail.com', 'KA17 2022000276', '9754444678', '123456782367', 'mini', 14, 5, '202cb962ac59075b964b07152d234b70'),
(9, 'vanamali', 'vana@gmail.com', 'KA17 2022000276', '9876787654', '123456789202', 'mini', 20, 5, '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `nid` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `drv_id` int(11) NOT NULL,
  `pass_id` int(11) NOT NULL,
  `drvad` int(1) NOT NULL DEFAULT 0,
  `passad` int(1) NOT NULL DEFAULT 0,
  `endtour` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`nid`, `trip_id`, `drv_id`, `pass_id`, `drvad`, `passad`, `endtour`) VALUES
(20, 1, 9, 5, 1, 1, 1),
(21, 1, 9, 1, 1, 1, 1),
(22, 6, 1, 6, 1, 1, 1),
(23, 159, 2, 5, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`place_id`, `place_name`) VALUES
(3, 'a'),
(4, 'b'),
(5, 'c'),
(6, 'blr'),
(7, 'goa'),
(8, 'delhi'),
(9, 'dfgdf'),
(10, 'cwe'),
(11, 'mumbai'),
(12, 'chennai'),
(164, 'dvg'),
(165, 'hubli'),
(182, 'd'),
(183, 'bb'),
(184, 'cc'),
(185, 'france'),
(186, 'paris'),
(187, 'abu dabi'),
(188, 'london'),
(189, 'dsafs'),
(190, 'sdfadsf');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `drv_id` int(11) NOT NULL,
  `pass_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `trip_id` int(11) NOT NULL,
  `src_id` int(11) NOT NULL,
  `dest_id` int(11) NOT NULL,
  `km` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`trip_id`, `src_id`, `dest_id`, `km`) VALUES
(1, 3, 3, 999),
(2, 5, 3, 999),
(3, 6, 7, 999),
(4, 6, 4, 999),
(5, 5, 4, 999),
(6, 6, 3, 999),
(7, 8, 7, 999),
(8, 3, 5, 999),
(9, 5, 7, 999),
(10, 3, 4, 999),
(149, 3, 182, 999),
(150, 183, 184, 999),
(151, 185, 188, 999),
(152, 185, 187, 999),
(153, 185, 186, 999),
(154, 186, 188, 999),
(155, 186, 187, 999),
(156, 187, 188, 999),
(158, 189, 190, 999),
(159, 3, 6, 999);

-- --------------------------------------------------------

--
-- Table structure for table `usrinfo`
--

CREATE TABLE `usrinfo` (
  `usrid` int(11) NOT NULL,
  `usrname` varchar(100) NOT NULL,
  `usremail` varchar(100) NOT NULL,
  `usrphone` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usrinfo`
--

INSERT INTO `usrinfo` (`usrid`, `usrname`, `usremail`, `usrphone`, `password`) VALUES
(1, 'jainvpranav', 'asd@gmail.com', '9867676543', '202cb962ac59075b964b07152d234b70'),
(5, 'asd', 'asdadasd@yahoo.com', '7012121212', '202cb962ac59075b964b07152d234b70'),
(6, 'qwerty', 'qwerty@gmail.com', '9867676542', '202cb962ac59075b964b07152d234b70'),
(7, 'mamtha', 'mamtha@gmail.com', '7019304457', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `drv_id` int(11) NOT NULL,
  `vacancy` int(11) NOT NULL,
  `avail` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`drv_id`, `vacancy`, `avail`) VALUES
(1, 3, 3),
(2, 4, 4),
(8, 5, 5),
(9, 5, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drvinfo`
--
ALTER TABLE `drvinfo`
  ADD PRIMARY KEY (`drvid`),
  ADD UNIQUE KEY `drvaadhar` (`drvaadhar`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `trip_id` (`trip_id`),
  ADD KEY `drv_id` (`drv_id`),
  ADD KEY `pass_id` (`pass_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`),
  ADD KEY `trip_id` (`trip_id`),
  ADD KEY `drv_id` (`drv_id`),
  ADD KEY `pass_id` (`pass_id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `src_id` (`src_id`),
  ADD KEY `dest_id` (`dest_id`);

--
-- Indexes for table `usrinfo`
--
ALTER TABLE `usrinfo`
  ADD PRIMARY KEY (`usrid`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`drv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drvinfo`
--
ALTER TABLE `drvinfo`
  MODIFY `drvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `usrinfo`
--
ALTER TABLE `usrinfo`
  MODIFY `usrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`),
  ADD CONSTRAINT `notifications_ibfk_3` FOREIGN KEY (`drv_id`) REFERENCES `drvinfo` (`drvid`),
  ADD CONSTRAINT `notifications_ibfk_4` FOREIGN KEY (`drv_id`) REFERENCES `drvinfo` (`drvid`),
  ADD CONSTRAINT `notifications_ibfk_5` FOREIGN KEY (`pass_id`) REFERENCES `usrinfo` (`usrid`),
  ADD CONSTRAINT `notifications_ibfk_6` FOREIGN KEY (`pass_id`) REFERENCES `usrinfo` (`usrid`);

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`),
  ADD CONSTRAINT `route_ibfk_2` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`),
  ADD CONSTRAINT `route_ibfk_3` FOREIGN KEY (`drv_id`) REFERENCES `drvinfo` (`drvid`),
  ADD CONSTRAINT `route_ibfk_4` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`trip_id`),
  ADD CONSTRAINT `route_ibfk_5` FOREIGN KEY (`drv_id`) REFERENCES `drvinfo` (`drvid`),
  ADD CONSTRAINT `route_ibfk_6` FOREIGN KEY (`pass_id`) REFERENCES `usrinfo` (`usrid`);

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`src_id`) REFERENCES `places` (`place_id`),
  ADD CONSTRAINT `trip_ibfk_2` FOREIGN KEY (`dest_id`) REFERENCES `places` (`place_id`);

--
-- Constraints for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `vacancy_ibfk_1` FOREIGN KEY (`drv_id`) REFERENCES `drvinfo` (`drvid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
