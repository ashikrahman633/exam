-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2018 at 07:23 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', 'eb62f6b9306db575c2d596b1279627a4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(1, 1, 0, 'Collection of hardware components and computers'),
(2, 1, 0, 'Interconnected by communication channels'),
(3, 1, 0, 'Sharing of resources and information'),
(4, 1, 1, 'All of the Above'),
(5, 2, 0, 'The physical boundary of Network'),
(6, 2, 0, 'An operating System of Computer Network'),
(7, 2, 1, 'A system designed to prevent unauthorized access'),
(8, 2, 0, 'A web browsing Software'),
(9, 3, 0, '4'),
(10, 3, 0, '5'),
(11, 3, 0, '6'),
(12, 3, 1, '7'),
(13, 4, 0, 'Dynamic Host Control Protocol'),
(14, 4, 1, 'Dynamic Host Configuration Protocol'),
(15, 4, 0, 'Dynamic Hyper Control Protocol'),
(16, 4, 0, 'Dynamic Hyper Configuration Protocol'),
(29, 5, 0, '8 bit'),
(30, 5, 0, '16 bit'),
(31, 5, 1, '32 bit'),
(32, 5, 0, '64 bit'),
(33, 6, 0, 'Dynamic Name System'),
(34, 6, 0, 'Dynamic Network System'),
(35, 6, 1, 'Domain Name System'),
(36, 6, 0, 'Domain Network Service'),
(37, 7, 1, 'Transmission capacity of a communication channels'),
(38, 7, 0, 'Connected Computers in the Network'),
(39, 7, 0, 'Class of IP used in Network'),
(40, 7, 0, 'None of Above');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`) VALUES
(1, 1, 'Computer Network is'),
(2, 2, 'What is a Firewall in Computer Network?'),
(3, 3, 'How many layers does OSI Reference Model has?'),
(4, 4, 'DHCP is the abbreviation of'),
(8, 5, 'IPV4 Address is'),
(9, 6, 'DNS is the abbreviation of'),
(10, 7, 'What is the meaning of Bandwidth in Network?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `name`, `username`, `email`, `password`, `status`) VALUES
(1, 'Md. Ashik Rahman', 'Sky', 'ashikrahman633@gmail.com', 'eb62f6b9306db575c2d596b1279627a4', 0),
(2, 'Mozahidul Islam', 'Isty', 'md.mozahidulislamisty@gmail.com', 'eb62f6b9306db575c2d596b1279627a4', 0),
(3, 'Ashik Rahman', 'Ashik', 'ashikrahman37@yahoo.com', 'eb62f6b9306db575c2d596b1279627a4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
