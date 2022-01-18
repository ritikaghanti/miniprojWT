-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 11:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `name` varchar(20) NOT NULL,
  `class` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`name`, `class`, `email`, `year`) VALUES
('hu', '2', 'rit@gmail.com', '1'),
('', '', '', ''),
('feubu', 'fe', '3', '1'),
('ref', 'comp', 'eef@gmail.com', '2');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

DROP TABLE IF EXISTS `fileupload`;
CREATE TABLE `fileupload` (
  `FileName` varchar(50) NOT NULL,
  `description` varchar(30) NOT NULL,
  `year` varchar(10) NOT NULL,
  `file` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`FileName`, `description`, `year`, `file`) VALUES
('test1', 'testing', '2', 0x373430362d),
('Book1', 'Summary of book1', '1', 0x313431352d),
('dwdw', 'fefe', '1', 0x393131332d),
('dwdw', 'fefe', '1', 0x393832302d);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `name` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` text DEFAULT NULL,
  `department` text DEFAULT NULL,
  `year` text DEFAULT NULL,
  `sem` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`name`, `username`, `password`, `email`, `department`, `year`, `sem`) VALUES
('user1', 'user1', '123', 'user1@gmail.com', 'COMP', '3', '5'),
('user2', 'user2', 'user2', 'user2@gmail.com', 'comp', '3', '3'),
('user3', 'user3', '123', 'user3@gmail.com', 'comp', '4', '7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
