-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2017 at 06:20 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(4) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(14) NOT NULL,
  `institute` varchar(500) NOT NULL,
  `department` varchar(500) NOT NULL,
  `position` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `folder` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `roll`, `email`, `contact`, `institute`, `department`, `position`, `password`, `pwd`, `folder`) VALUES
(1, 'AB', 'AB', '4454545', 'abc@gmail.com', '445444', 'gghj', 'hkjk', 'kjhj', 'aaaa', '74b87337454200d4d33f80c4663dc5e5', 'AB_abc@gmail.com'),
(2, 'aa', 'aa', '435', 'aa@gmail.com', '5434343', 'ghghgj', 'hjytfd', 'hghgfhg', 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa_aa@gmail.com'),
(3, 'tt', 'tt', '435435', 'abca@gmail.com', '434345445', 'ghgfggf', 'ghfhg', 'hgfdgf', 'gg', '73c18c59a39b18382081ec00bb456d43', 'tt_abca@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
