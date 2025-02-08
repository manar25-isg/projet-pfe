-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2025 at 04:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_events`
--

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `libelle`, `description`, `image`) VALUES
(1, 'Coiffeur - Coiffeusee', 'c\'est une description pour coiffeur / coiffeuse', '');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `type_utilisateur` enum('role_service_provider','role_service_requester','role_admin','') NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `first_name`, `last_name`, `email`, `type_utilisateur`, `user_name`, `password`, `phone`, `adresse`, `avatar`) VALUES
(1, 'admin', 'ben admin', 'admin@amevents.com', 'role_admin', 'adminevents', '$argon2i$v=19$m=65536,t=4,p=1$VnM4dnNUTnh1UzkuV1h1aw$1Pbgykx9yy/jQ99aC17AIBWq4ZP/Hb2mt/cYbIqmqS0', 123131, 'sqdq', 'default.png'),
(2, 'ben foulena', 'foulen', 'foulen@gmail.com', 'role_service_provider', 'foulen24', '$argon2i$v=19$m=65536,t=4,p=1$VnM4dnNUTnh1UzkuV1h1aw$1Pbgykx9yy/jQ99aC17AIBWq4ZP/Hb2mt/cYbIqmqS0', 123345678, 'cite el manrar sqdqsd', 'woman.png'),
(4, 'Manar', 'Sellami', 'manar@service.com', 'role_service_provider', 'manar25', '12345678', 44455221, 'adresse', 'default.png'),
(5, 'amna', 'rejeb', 'amna@requester.com', 'role_service_requester', 'amna25', '12345678', 66533211, 'adresse', 'default.png'),
(6, 'test', 'test', 'test@student.com', 'role_service_requester', 'test', '$argon2i$v=19$m=65536,t=4,p=1$VnM4dnNUTnh1UzkuV1h1aw$1Pbgykx9yy/jQ99aC17AIBWq4ZP/Hb2mt/cYbIqmqS0', 123546, 'adresse', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
