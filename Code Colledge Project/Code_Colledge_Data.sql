-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2017 at 06:09 PM
-- Server version: 5.7.17-0ubuntu0.16.10.1
-- PHP Version: 7.0.13-0ubuntu0.16.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Code_Colledge_Data`
--

-- --------------------------------------------------------

--
-- Table structure for table `info_user`
--

CREATE TABLE `info_user` (
  `info_userid` int(11) NOT NULL,
  `info_user_firstname` varchar(50) NOT NULL,
  `info_user_surname` varchar(50) NOT NULL,
  `info_user_email` varchar(60) NOT NULL,
  `info_user_subscrbe` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_user`
--

INSERT INTO `info_user` (`info_userid`, `info_user_firstname`, `info_user_surname`, `info_user_email`, `info_user_subscrbe`) VALUES
(1, 'Neil', 'Lemmer', 'lemmer.neil@gmail.com', 'Y'),
(2, 'Neil', 'Lemmer', 'neil.lemmer@babcock.co.za', 'N'),
(7, 'Karli', 'Bauermeister', 'karlibauermeister@gmail.com', 'Y'),
(8, 'Neil', 'Lemmer', 'lemmer.neil@gmail.com', 'Y'),
(9, 'Samantha', 'Mcgarrie', 'samantha.mcgarrie@babcock.co.za', 'Y'),
(10, 'Karli', 'Bauermeister', 'karlibauermeister@gmail.com', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `email_subject` varchar(30) DEFAULT NULL,
  `email_content` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`email_subject`, `email_content`) VALUES
('Testing my data', 'Hello World'),
('Testing', 'hello world'),
('hello world', 'test'),
('Hello Karli', 'Hello liefie'),
('Test', 'hello'),
('Hello Karli', 'ss'),
('Test Sammie', 'Hello Sammie'),
('Hello Karli', 'Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info_user`
--
ALTER TABLE `info_user`
  ADD PRIMARY KEY (`info_userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info_user`
--
ALTER TABLE `info_user`
  MODIFY `info_userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
