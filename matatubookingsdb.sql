-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 05:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matatubookingsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `book_id` int(11) NOT NULL,
  `schedule_book_id` int(11) DEFAULT NULL,
  `user_passenger` int(11) DEFAULT NULL,
  `seat_number` varchar(255) NOT NULL,
  `book_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`book_id`, `schedule_book_id`, `user_passenger`, `seat_number`, `book_date`) VALUES
(13, 1, 33, '6', '2023-01-31 05:17:36'),
(14, 3, 33, '6', '2023-01-31 07:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `matatus`
--

CREATE TABLE `matatus` (
  `matatu_id` int(11) NOT NULL,
  `matatu_plate` varchar(200) NOT NULL,
  `mat_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matatus`
--

INSERT INTO `matatus` (`matatu_id`, `matatu_plate`, `mat_date_created`) VALUES
(1, 'KDB 123D', '2023-01-15 18:24:16'),
(2, 'KDG 345S', '2023-01-15 18:24:16'),
(4, 'KCD 342R', '2023-01-30 00:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `route_id` int(11) NOT NULL,
  `route_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`route_id`, `route_name`) VALUES
(2, 'Mombasa'),
(3, 'Kisumu'),
(4, 'Nakuru');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `schedule_id` int(11) NOT NULL,
  `mat_id` int(11) DEFAULT NULL,
  `travel_from` int(11) NOT NULL,
  `travel_to` int(11) NOT NULL,
  `travel_date` date NOT NULL,
  `travel_time` time NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`schedule_id`, `mat_id`, `travel_from`, `travel_to`, `travel_date`, `travel_time`, `price`) VALUES
(1, 1, 3, 2, '2023-01-31', '12:30:00', 2400),
(3, 1, 2, 3, '2023-01-31', '09:00:00', 3000),
(4, 2, 4, 2, '2023-02-02', '12:00:00', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `fullname`, `username`, `email`, `mobile`, `password`, `created_at`) VALUES
(1, 1, 'Administrator', 'admin', 'admin@gmail.com', '0766554433', '$2y$10$XKxgFPLeai8RkVaojgGpMOwkfXVMjaRTsK//Bm3jxcf/NcBJqLqmm', '2023-03-22 16:29:30'),
(2, 0, 'User', 'user', 'user@gmail.com', '0766554422', '$2y$10$Dy4TMLCYp8YTnKIZ5WIBxufjjBZ5sxDNOF.DlaoPuqt84/DgvRwNm', '2023-03-22 16:30:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `matatus`
--
ALTER TABLE `matatus`
  ADD PRIMARY KEY (`matatu_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`schedule_id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `matatus`
--
ALTER TABLE `matatus`
  MODIFY `matatu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
