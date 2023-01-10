-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 01, 2022 at 05:34 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `domain`
--

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `register_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `owner` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`id`, `name`, `register_date`, `expire_date`, `owner`, `created_on`) VALUES
(1, 'www.fb.com', '2022-01-01', '2022-02-02', 'FB', '2022-11-29 07:12:47'),
(2, 'www.insta.com', '2022-02-02', '2022-03-03', 'FB', '2022-11-29 07:13:12'),
(3, 'www.google.com', '2022-03-03', '2022-04-04', 'Google', '2022-11-29 07:13:33'),
(4, 'www.brainvire.com', '2023-04-04', '2023-05-05', 'Brainvire', '2022-11-29 09:20:21'),
(5, 'www.yaahoo.com', '2023-05-05', '2023-06-06', 'Yaahoo', '2022-11-29 12:33:00'),
(6, 'www.safwan.com', '2022-02-02', '2022-03-03', 'Safwan', '2022-12-01 07:10:12'),
(7, 'www.aman.com', '2022-02-02', '2022-03-03', 'Aman', '2022-12-01 09:39:56'),
(8, 'www.gmail.com', '2018-10-10', '2018-11-11', 'Google', '2022-12-01 10:18:52'),
(9, 'www.drive.com', '2018-10-10', '2018-11-11', 'Google', '2022-12-01 10:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `gender`, `phone`, `email`, `password`) VALUES
(1, 'Aman', 'male', '9898987823', 'aman@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
