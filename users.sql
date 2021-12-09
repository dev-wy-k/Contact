-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 11:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `photo`, `created_at`) VALUES
(1, 'Maung Maung', 'mm@gmai.com', '09-121212121211', 'store/61b1d6d6e30da_avatar3.jpg', '2021-12-09 10:13:42'),
(2, 'Aung Aung', 'aa@gmail.com', '09-212121212122', 'store/61b1d700da95d_avatar4.jpg', '2021-12-09 10:14:24'),
(3, 'Hla Hla', 'hh@gmail.com', '09-3434343444', 'store/61b1d72f9ab79_avatar1.jpg', '2021-12-09 10:15:11'),
(4, 'Mya Mya', 'mam@gmail.com', '09-96969696969', 'store/61b1d75a819d2_avatar2.jpg', '2021-12-09 10:15:54'),
(5, 'Kyaw Gyi', 'kg@gamil.com', '09-456789123', 'store/61b1d7855cc94_avatar5.jpg', '2021-12-09 10:16:37'),
(6, 'Aye Mya', 'am@gmail.com', '09-8989899898', 'store/61b1d7bd5d4e8_avatar6.jpg', '2021-12-09 10:17:33'),
(7, 'Tommy', 'tom@gamil.com', '09-123456789', 'store/61b1d8007ee7c_avatar7.jpg', '2021-12-09 10:18:40'),
(8, 'Alan Smitt', 'smitt@gmail.com', '09-87654321', 'store/61b1d8676767d_avatar8.jpg', '2021-12-09 10:20:23'),
(9, 'Leo', 'leo@gmail.com', '09-678912345', 'store/61b1d8964f0fe_avatar9.jpg', '2021-12-09 10:21:10'),
(10, 'Jisa', 'jisa@gmail.com', '09-12349876', 'store/61b1d8d2a7c14_avatar10.jpg', '2021-12-09 10:22:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
