-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2020 at 03:41 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `private_message`
--

-- --------------------------------------------------------
Create database Private_Message; 
--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(33) NOT NULL,
  `reciver_name` varchar(33) NOT NULL,
  `message_text` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_name`, `reciver_name`, `message_text`, `date_time`) VALUES
(1, 'admin', 'admin', '', '2020-01-09 05:22:41'),
(7, 'ISHANC7', 'admin', 'My car got broken in expressway, near the pitipana exit.', '2020-01-09 07:36:55'),
(8, 'admin', 'admin', '', '2020-01-09 07:37:20'),
(9, 'admin', 'ISHANC7', 'we have noticed the insurance company .. they are on their way', '2020-01-09 07:38:31'),
(10, 'admin', 'ishanc7', 'can u explain the situation for me?\r\nAre there any Traffic congestion due to you break down?', '2020-01-09 07:42:33'),
(11, 'admin', 'admin', 'Suddenly my car engine turned off.\r\nNo. we manage to push the car to the side of the road.', '2020-01-09 07:44:31'),
(12, 'admin', 'ISHANC7', 'Suddenly my car engine turned off. No. we manage to push the car to the side of the road.', '2020-01-09 07:44:44'),
(13, 'admin', 'ishanc7', 'Thank you for your feed back.\r\nHelp will be arrive with in 15mins. \r\nTHANK YOU FOR USING RDA Chat', '2020-01-09 07:48:29'),
(14, 'admin', 'ISHANC7', 'dsfsdfsdfdfds', '2020-01-09 12:47:56'),
(15, 'ISHANC7', 'admin', 'sadasdsad', '2020-01-09 12:49:17'),
(16, 'ISHANC7', 'admin', 'Suddenly my car engine turned off. No. we manage to push the car to the side of the road.\r\n', '2020-01-09 12:49:56'),
(17, 'admin', '', 'fdsfdsf', '2020-01-09 04:02:03'),
(18, 'admin', '', 'dfdsf', '2020-01-09 04:02:40'),
(19, 'admin', 'ISHANC7', 'gfgfg', '2020-01-09 04:03:30'),
(20, 'admin', 'ISHANC7', 'sadsad', '2020-01-09 04:05:26'),
(21, 'admin', 'ISHANC7', 'asdsada', '2020-01-09 04:05:29'),
(22, 'admin', 'ISHANC7', 'dsa\n', '2020-01-09 04:05:33'),
(23, 'admin', 'ISHANC7', 'sdasdsa', '2020-01-09 04:05:37'),
(24, 'admin', 'ISHANC7', 'sdfsdfsd', '2020-01-09 04:05:44'),
(25, 'admin', 'ISHANC7', 'hjhjhjh', '2020-01-09 11:09:18'),
(26, 'admin', 'ISHANC7', '4d454f65d46fsd', '2020-01-09 11:21:02'),
(27, 'admin', 'lahiru', '', '2020-01-09 11:22:11'),
(28, 'admin', 'lahiru', 'sdfdfdsf', '2020-01-09 11:22:25'),
(29, 'admin', 'ishanc7', 'gfdgfdgd', '2020-01-09 11:29:11'),
(30, 'admin', 'admin', 'hjkghjhg\'\r\n\r\n\r\n', '2020-01-09 11:36:34'),
(31, 'admin', 'admin', 'hjkghjhg\'\r\n\r\n\r\n', '2020-01-09 11:36:34'),
(32, 'ishanc7', 'admin', 'hghjj', '2020-01-09 11:50:11'),
(33, 'ishanc7', 'lahiru', 'tuty', '2020-01-09 11:50:32'),
(34, 'ishanc7', 'admin', 'hgjgjhhj', '2020-01-09 11:50:46'),
(35, 'hii', 'ISHANC7', 'Helloo', '2020-01-09 11:58:18'),
(36, 'hii', 'ISHANC7', 'bhhjbj', '2020-01-10 03:36:52'),
(37, 'hii', 'admin', 'kooolll', '2020-01-10 03:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(1, 'admin', '123'),
(2, 'ISHANC7', '1234'),
(3, 'Nidula', '1234'),
(4, 'lahiru', '1234'),
(5, 'john', '1234'),
(6, 'hii', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
