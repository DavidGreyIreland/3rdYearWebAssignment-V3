-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 02, 2016 at 11:03 AM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3rdyearassignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `class` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `time`, `class`) VALUES
(1, '2016-04-12 15:47:11', 'afternoon');

-- --------------------------------------------------------

--
-- Table structure for table `classtables`
--

CREATE TABLE `classtables` (
  `id` int(11) NOT NULL,
  `day` varchar(30) NOT NULL,
  `activity` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `grade` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classtables`
--

INSERT INTO `classtables` (`id`, `day`, `activity`, `time`, `grade`) VALUES
(1, 'Monday', 'sparring', '19:00-20:00', 'white belt & blue belt'),
(2, 'Monday', 'sparring', '19:00-20:00', 'white belt & blue belt'),
(3, 'Monday', 'kicks', '20:00-21:00', 'blue belt & above'),
(4, 'Monday', 'kicks', '20:00-21:00', 'blue belt & above'),
(5, 'Wednesday', 'technical patterns', '19:00-20:00', 'age up to 13'),
(6, 'Wednesday', 'technical patterns', '19:00-20:00', 'age up to 13'),
(7, 'Wednesday', 'stretching', '20:00-21:00', 'over 13'),
(8, 'Wednesday', 'stretching', '20:00-21:00', 'over 13'),
(9, 'Friday', 'techniques', '19:00-20:00', 'white belt & above'),
(10, 'Friday', 'pad work', '20:00-21:00', 'blue belt & above'),
(11, 'Friday', 'techniques', '19:00-20:00', 'white belt & above'),
(12, 'Friday', 'pad work', '20:00-21:00', 'blue belt & above');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstName` text NOT NULL,
  `surname` text NOT NULL,
  `currentBeltGrade` text NOT NULL,
  `currentStatus` text NOT NULL,
  `nextGrading` text NOT NULL,
  `nextBeltGradingSyllabus` text NOT NULL,
  `requiredStatus` text NOT NULL,
  `role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstName`, `surname`, `currentBeltGrade`, `currentStatus`, `nextGrading`, `nextBeltGradingSyllabus`, `requiredStatus`, `role`) VALUES
(1, 'david', 'Grey', 'rainbow', 'active', 'ok', 'sure', 'i guess', 1),
(2, 'john', 'Grey', 'rainbow', 'active', 'ok', 'sure', 'i guess', 0),
(3, 'david', 'Grey', 'rainbow', 'active', 'ok', 'sure', 'i guess', 1),
(4, 'john', 'Grey', 'rainbow', 'active', 'ok', 'sure', 'i guess', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(5, 'david', '$2y$10$BcgjPK47jzcUMpku/9jxZOPpKJlCv4B0.qG9Gc9X..XA/C7Jhz1aS', 1),
(6, 'john', '$2y$10$7EXG3X9qM990kbowPdYZGO3eIRxkB7sYgVSfFJdz5Wv62x86J/KLa', 0),
(7, 'admin', '$2y$10$v9fJxAQku8gB41ISZbbmUuK/6Sn6MUqr3YUAk9WdcrWAFLbXB5evS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classtables`
--
ALTER TABLE `classtables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classtables`
--
ALTER TABLE `classtables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
