-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 10:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progess_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerdetail`
--

CREATE TABLE `customerdetail` (
  `id` int(50) NOT NULL,
  `CustomerID` varchar(100) NOT NULL,
  `User` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Joined` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Purchased` varchar(100) NOT NULL,
  `UserDomain` varchar(100) DEFAULT NULL,
  `Project` varchar(100) DEFAULT NULL,
  `Project_Sub` varchar(255) DEFAULT NULL,
  `Progess` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customerdetail`
--

INSERT INTO `customerdetail` (`id`, `CustomerID`, `User`, `Image`, `Email`, `Joined`, `Status`, `Purchased`, `UserDomain`, `Project`, `Project_Sub`, `Progess`) VALUES
(1, '#101', 'Anusha', 'userimage.jpg\r\n', 'anu@gmail.com', '09/04/2021', 'Paid', 'Monthly Subscription', 'Developer', 'Ecommerce Website', 'New development', '65%'),
(2, '#102', 'Arun', 'userimage.jpg\r\n', 'arun@gmail.com', '28/02/2002', 'Not Paid', 'Monthly Subscription', 'Tester', 'Spotify', 'Existing Development', '75%'),
(3, '#103', 'Bala', 'userimage.jpg\r\n', 'bala@gmail.com', '11/01/2021', 'Paid', 'Monthly Subscription', 'Developer', 'Clone Project', 'Existing Development', '85%'),
(4, '#104', 'Monika', 'userimage.jpg', 'moni@gmail.com', '22/03/23', 'Paid', 'Monthly Subscription', 'Developer', 'Full Stack', 'New Development', '90%'),
(5, '#105', 'David', 'userimage.jpg', 'david@gmail.com', '22/03/23', 'Paid', '	Monthly Subscription', 'Testing', 'Web Development', 'New Development', '70%'),
(6, '#106', 'Jeni', 'userimage.jpg', 'jeni@gmail.com', '12/03/24', 'Paid', 'Monthly Subscription', 'Testing', 'Spotify', 'Existing Development', '75%');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerdetail`
--
ALTER TABLE `customerdetail`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
