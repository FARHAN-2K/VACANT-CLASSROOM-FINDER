-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2025 at 08:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `email`, `password`, `created_at`) VALUES
(2, 'Super Admin', 'admin@example.com', '$2y$10$ox24WI7BK75b/RM4AZyVY.V/6CSDplRorzGdEuWCfLVh6j123MyjC', '2025-11-25 18:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `id` int(11) NOT NULL,
  `day` varchar(20) DEFAULT NULL,
  `time_slot` varchar(20) DEFAULT NULL,
  `room_101` tinyint(1) DEFAULT NULL,
  `room_102` tinyint(1) DEFAULT NULL,
  `room_201` tinyint(1) DEFAULT NULL,
  `room_202` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`id`, `day`, `time_slot`, `room_101`, `room_102`, `room_201`, `room_202`) VALUES
(1, 'Monday', '07:00 - 09:00', 0, 1, 0, 1),
(2, 'Monday', '09:00 - 11:00', 1, 1, 0, 0),
(3, 'Monday', '11:00 - 13:00', 0, 0, 1, 0),
(4, 'Monday', '14:00 - 16:00', 1, 0, 1, 1),
(5, 'Monday', '17:00 - 19:00', 0, 0, 0, 1),
(6, 'Tuesday', '07:00 - 09:00', 0, 1, 0, 1),
(7, 'Tuesday', '09:00 - 11:00', 1, 1, 0, 0),
(8, 'Tuesday', '11:00 - 13:00', 0, 0, 1, 0),
(9, 'Tuesday', '14:00 - 16:00', 1, 0, 1, 1),
(10, 'Tuesday', '17:00 - 19:00', 0, 0, 0, 1),
(11, 'Wednesday', '07:00 - 09:00', 0, 1, 0, 0),
(12, 'Wednesday', '09:00 - 11:00', 1, 1, 0, 0),
(13, 'Wednesday', '11:00 - 13:00', 0, 0, 1, 0),
(14, 'Wednesday', '14:00 - 16:00', 1, 0, 1, 1),
(15, 'Wednesday', '17:00 - 19:00', 0, 0, 0, 1),
(16, 'Thursday', '07:00 - 09:00', 0, 1, 0, 1),
(17, 'Thursday', '09:00 - 11:00', 1, 1, 0, 0),
(18, 'Thursday', '11:00 - 13:00', 0, 0, 1, 0),
(19, 'Thursday', '14:00 - 16:00', 1, 0, 1, 1),
(20, 'Thursday', '17:00 - 19:00', 0, 0, 0, 1),
(21, 'Friday', '07:00 - 09:00', 0, 1, 0, 1),
(22, 'Friday', '09:00 - 11:00', 1, 1, 0, 0),
(23, 'Friday', '11:00 - 13:00', 0, 0, 1, 0),
(24, 'Friday', '14:00 - 16:00', 1, 0, 1, 1),
(25, 'Friday', '17:00 - 19:00', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `created_at`) VALUES
(1, 'farhan noor', 'noorfarrhan5@gmail.com', '$2y$10$roycdi7embHcOuKR1YIbcOBGDY7uNHCUEFkr88krmhJMEB..BjI.G', '2025-11-25 16:50:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
