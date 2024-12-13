-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 02:55 PM
-- Server version: 8.0.36
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bike_tbl`
--

CREATE TABLE `bike_tbl` (
  `col_bikeid` int NOT NULL,
  `col_ownerid` int NOT NULL,
  `col_serialnumber` int NOT NULL,
  `col_maker` varchar(100) NOT NULL,
  `col_model` varchar(100) NOT NULL,
  `col_color` varchar(100) NOT NULL,
  `col_bikestatus` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `bike_tbl`
--

INSERT INTO `bike_tbl` (`col_bikeid`, `col_ownerid`, `col_serialnumber`, `col_maker`, `col_model`, `col_color`, `col_bikestatus`) VALUES
(1, 1, 20240001, 'Nissan ', 'GTR', ' Red', 1),
(2, 1, 20240002, 'Audi ', 'R8', ' Black', 1),
(3, 1, 20240003, 'Mitsubishi ', 'Mirage', ' Silver', 1),
(4, 1, 20240004, 'Tesla ', 'Model X', ' White', 1),
(5, 1, 20240005, 'Ford ', 'Mustang', ' Orange', 1),
(6, 18, 20240006, 'Toyota ', 'Vios', ' Gold', 3),
(7, 5, 20240007, 'Chevrolet ', 'Camaro', ' Yellow', 1),
(8, 7, 202400010, 'Ford ', 'Raptor', ' Blue', 1),
(9, 5, 20240008, 'Honda ', 'Civic', ' White', 4),
(10, 4, 20240009, 'iPhone ', '16', ' Purple', 1),
(11, 6, 20240010, 'Honda ', 'City', ' Dark Green', 1),
(12, 16, 20240011, 'Porcshe ', 'Carera', ' Silver', 1),
(13, 6, 20240012, 'Suzuki ', 'SPresso', ' Black', 1),
(14, 1, 20250001, 'Ford ', 'Raptor', ' Blue', 1),
(15, 1, 20250002, 'Suzuki ', 'Jimny', ' Beige', 1),
(16, 1, 20260001, 'Toyota ', 'Camry', ' White', 1);

-- --------------------------------------------------------

--
-- Table structure for table `privilege_tbl`
--

CREATE TABLE `privilege_tbl` (
  `col_privilegeid` int NOT NULL,
  `col_privilegetype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `privilege_tbl`
--

INSERT INTO `privilege_tbl` (`col_privilegeid`, `col_privilegetype`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `registration_tbl`
--

CREATE TABLE `registration_tbl` (
  `col_regid` int NOT NULL,
  `col_bikeid` int NOT NULL,
  `col_userid` int NOT NULL,
  `col_statusid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `status_tbl`
--

CREATE TABLE `status_tbl` (
  `col_statusid` int NOT NULL,
  `col_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `status_tbl`
--

INSERT INTO `status_tbl` (`col_statusid`, `col_status`) VALUES
(1, 'OK'),
(2, 'Disposed'),
(3, 'Lost'),
(4, 'Stolen');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `col_userid` int NOT NULL,
  `col_username` varchar(100) NOT NULL,
  `col_password` varchar(100) NOT NULL,
  `col_name` varchar(100) DEFAULT NULL,
  `col_contact` bigint DEFAULT NULL,
  `col_address` varchar(100) DEFAULT NULL,
  `col_privilege` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`col_userid`, `col_username`, `col_password`, `col_name`, `col_contact`, `col_address`, `col_privilege`) VALUES
(1, 'Ynno', '1234', 'Ynno Ravinn Polestico', 977, 'Quezon City', 1),
(2, 'admin', 'admin', NULL, NULL, NULL, 2),
(3, 'sadmin', 'sadmin', NULL, NULL, NULL, 3),
(4, 'Karl', '147', 'Karl Christian Randolph Vargas', 988, 'Bulacan', 1),
(5, 'Ivan', '258', 'Ivan Norvy De Guzman', 999, 'Marikina City', 1),
(6, 'Rapp', '369', 'Rapp Mico', 977, 'Batangas', 1),
(7, 'Ian', '456', 'Ian Christopher Masbang', 933, 'Muntinlupa City', 1),
(8, 'SirLuis', 'SirLuis', '', 0, '', 2),
(9, 'SirBoc', 'SirBoc', '', 0, '', 2),
(10, 'Aly', '234', 'Aly Limpidia', 922, 'Manila', 1),
(11, 'Deanna', '345', 'Deanna', 912, 'Taguig', 1),
(12, 'Jasper', '456', 'Jasper Garcia', 913, 'Bulacan', 1),
(13, 'Kevin', '567', 'Kevin Iliaga', 914, 'Taytay', 1),
(14, 'Yvette', '678', 'Yvette', 915, 'Makati', 1),
(15, 'Airish', '789', 'Airish Villena', 916, 'Baguio', 1),
(16, 'Akira', '890', 'Akira Matsuura', 917, 'Pasig', 1),
(17, 'Maria', '159', 'Maria Magdalena', 918, 'Pasig', 2),
(18, 'Danjo', '0123', 'Danjo Liu', 0, '0932', 1),
(19, 'Ikeda', '135', 'Yoshinori Ikeda', 0, '0984', 2),
(20, 'Jake', 'Dog', '1234', 1234, '1234', 1),
(21, 'Fin', 'Human', 'Fin the Human', 1234, 'Adventure Land', 1),
(22, 'Hannah', 'Montana', 'Hannah', 12314, 'California', 1),
(23, 'Arthur', 'Nery', 'Arthur Nery', 1231, 'Taguig City', 1),
(24, 'Ely', 'Buendia', 'Ely Buendia', 123, 'Makati City', 1),
(25, 'Rizza', 'Sensei', 'Rizza-sensei', 12371, 'ABC Nihongo St', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bike_tbl`
--
ALTER TABLE `bike_tbl`
  ADD PRIMARY KEY (`col_bikeid`),
  ADD KEY `foreign key status` (`col_bikestatus`);

--
-- Indexes for table `privilege_tbl`
--
ALTER TABLE `privilege_tbl`
  ADD PRIMARY KEY (`col_privilegeid`);

--
-- Indexes for table `registration_tbl`
--
ALTER TABLE `registration_tbl`
  ADD PRIMARY KEY (`col_regid`),
  ADD UNIQUE KEY `statusid` (`col_statusid`),
  ADD UNIQUE KEY `userid` (`col_userid`),
  ADD UNIQUE KEY `bikeid` (`col_bikeid`);

--
-- Indexes for table `status_tbl`
--
ALTER TABLE `status_tbl`
  ADD PRIMARY KEY (`col_statusid`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`col_userid`),
  ADD KEY `fk_privilege` (`col_privilege`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bike_tbl`
--
ALTER TABLE `bike_tbl`
  MODIFY `col_bikeid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `privilege_tbl`
--
ALTER TABLE `privilege_tbl`
  MODIFY `col_privilegeid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration_tbl`
--
ALTER TABLE `registration_tbl`
  MODIFY `col_regid` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_tbl`
--
ALTER TABLE `status_tbl`
  MODIFY `col_statusid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `col_userid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
