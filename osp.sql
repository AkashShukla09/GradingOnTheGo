-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 03:44 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osp`
--

-- --------------------------------------------------------

--
-- Table structure for table `campus`
--

CREATE TABLE `campus` (
  `campus` varchar(10) DEFAULT NULL,
  `exam` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `reg` varchar(9) DEFAULT NULL,
  `ccode` varchar(7) DEFAULT NULL,
  `cname` varchar(25) DEFAULT NULL,
  `faculty` varchar(25) DEFAULT NULL,
  `slot` varchar(10) DEFAULT NULL,
  `exam` varchar(10) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`reg`, `ccode`, `cname`, `faculty`, `slot`, `exam`, `marks`) VALUES
('19BIT0165', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 25),
('19BIT0163', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 24),
('19BIT0163', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A2', 'cat2', 24),
('19BIT0193', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat2', 28),
('19BIT0193', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 28),
('19BIT0199', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 15),
('19BIT0194', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 24),
('19BIT0218', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 5),
('19BIT0164', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 11),
('19BIT0168', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 11),
('19BIT0169', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 11),
('19BIT0161', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 11),
('19BIT0160', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 11),
('19BIT0198', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 11),
('19BIT0197', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 11),
('19BIT0196', 'ITE1007', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 30),
('19BIT0196', 'ITE1008', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 30),
('19BIT0197', 'ITE1008', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 30),
('19BIT0199', 'ITE1008', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 28),
('19BIT0192', 'ITE1008', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 28),
('19BIT0190', 'ITE1008', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat1', 28),
('19BIT0190', 'ITE1008', 'OPEN SOURCE PROGRAMMING', 'JAYAKUMAR S.', 'A1', 'cat2', 28);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `campus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `email`, `campus`) VALUES
('Akshat Vidyarthi', 'akshat.vidyarthi@gmail.com', 'vellore'),
('Akshat Vidyarthi', 'akshat.vidyarthi@gmail.com', 'vellore');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `reg` varchar(9) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`reg`, `email`, `password`) VALUES
('19BIT0165', 'akshat.vidyarthi@gmail.com', 'akshatvid');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
