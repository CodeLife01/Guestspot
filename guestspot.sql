-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 07, 2019 at 08:45 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout_db`
--

CREATE TABLE `checkout_db` (
  `time_out` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout_db`
--

INSERT INTO `checkout_db` (`time_out`) VALUES
('2019-09-04 21:37:30'),
('2019-09-04 21:38:14'),
('2019-09-04 21:38:47'),
('2019-09-04 21:40:24'),
('2019-09-04 21:40:25'),
('2019-09-04 21:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `guest_info`
--

CREATE TABLE `guest_info` (
  `id` int(200) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `whomtosee` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `purpose` varchar(1000) NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_out` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_info`
--

INSERT INTO `guest_info` (`id`, `firstName`, `lastName`, `phoneNumber`, `whomtosee`, `address`, `purpose`, `time_in`, `time_out`) VALUES
(1, 'hauwa', 'Abubakar', '00000000', 'kano State', 'Manager', 'App issue', '2019-09-05 14:05:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `guest_record`
--

CREATE TABLE `guest_record` (
  `id` varchar(1000) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `phoneNumber` varchar(100) NOT NULL,
  `whomtosee` varchar(1000) NOT NULL,
  `address` varchar(200) NOT NULL,
  `purpose` varchar(2000) NOT NULL,
  `time_in` varchar(100) NOT NULL,
  `time_out` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest_record`
--

INSERT INTO `guest_record` (`id`, `firstName`, `lastName`, `phoneNumber`, `whomtosee`, `address`, `purpose`, `time_in`, `time_out`) VALUES
('1', 'Fatima', 'musa', '676565522', 'Abuja', 'Mr Keen', 'Load request', '2019-09-03 18:49:08', '2019-09-05 13:41:56'),
('14', 'Sadeeq', 'Muhammad', '8101749564', 'Manager', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'APP', '2019-09-05 14:18:38', '2019-09-05 13:41:56'),
('17', 'Sadeeq', 'Muhammad', '8101749564', 'V.Manager', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'JJJ', '2019-09-05 14:52:50', '2019-09-05 13:52:50'),
('18', 'Sadeeq', 'Muhammad', '8101749564', 'Manager', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'KKK', '2019-09-05 14:30:37', '2019-09-05 13:30:37'),
('2', 'Aisha', 'Muhammad', '9909000', 'Kano Sate', 'V.Manager', 'network issue', '2019-09-03 18:42:43', '2019-09-05 13:41:56'),
('20', 'Sadeeq', 'Muhammad', '8101749564', 'Mrs Hauwa', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'JJJ', '2019-09-05 14:54:02', '2019-09-05 13:54:02'),
('21', 'Sadeeq', 'Muhammad', '8101749564', 'V.Manager', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'KKK', '2019-09-05 14:58:39', '2019-09-05 13:58:39'),
('22', 'Sadeeq', 'Muhammad', '8101749564', 'V.Manager', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'JJ', '2019-09-05 15:04:24', '2019-09-05 14:04:24'),
('23', 'Sadeeq', 'Muhammad', '8101749564', 'Customer Care', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'KKDLDL', '2019-09-05 15:11:38', '2019-09-05 14:11:45'),
('24', 'Aisha', 'Ab', '999999999', 'Customer Care', 'Kano State', 'App Issue', '2019-09-06 22:26:04', '2019-09-06 21:26:27'),
('28', 'Sadeeq', 'Muhammad', '8101749564', 'V.Manager', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'App', '2019-09-07 14:00:24', '2019-09-07 13:04:31'),
('29', 'Sadeeq', 'Muhammad', '8101749564', 'V.Manager', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'App', '2019-09-07 14:07:54', '2019-09-07 13:08:01'),
('3', 'Fatima', 'Idris', '0908989878', 'ABU zaria', 'Mrs Hauwa', 'Transfer Issue', '2019-09-03 18:44:18', '2019-09-05 13:41:56'),
('30', 'Sadeeq', 'Muhammad', '8101749564', 'V.Manager', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'KK', '2019-09-07 19:40:03', '2019-09-07 18:41:57'),
('31', 'Sadeeq', 'Muhammad', '8101749564', 'V.Manager', 'Kwakwachi Kofar Arewa, Gwarzo LGA', 'KK', '2019-09-07 19:41:44', '2019-09-07 18:41:53'),
('6', 'Fatima', 'Isah', '999999999', 'V.Manager', 'Kano State', 'App', '2019-09-05 00:06:12', '2019-09-05 13:41:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guest_info`
--
ALTER TABLE `guest_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_record`
--
ALTER TABLE `guest_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guest_info`
--
ALTER TABLE `guest_info`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
