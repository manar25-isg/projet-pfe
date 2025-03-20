-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 12:04 AM
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
-- Table structure for table `comptes`
--

CREATE TABLE `comptes` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `statut` enum('en_verification','bloque','active','') NOT NULL,
  `type` enum('role_client','role_prestataire','role_admin','') NOT NULL,
  `profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comptes`
--

INSERT INTO `comptes` (`id`, `email`, `password`, `statut`, `type`, `profile_id`) VALUES
(1, 'admin@amevent.com', '$2y$10$i/3ceT5KOt1jiSPJ/2gumOSV4zJVuz9mLTaMg8vSZHeN9GBXT1BHK', 'active', 'role_admin', NULL),
(2, 'prestataire@amevent.com', '$2y$10$i/3ceT5KOt1jiSPJ/2gumOSV4zJVuz9mLTaMg8vSZHeN9GBXT1BHK', 'active', 'role_prestataire', NULL),
(3, 'client@amevent.com', '$2y$10$i/3ceT5KOt1jiSPJ/2gumOSV4zJVuz9mLTaMg8vSZHeN9GBXT1BHK', 'active', 'role_client', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evenements`
--

CREATE TABLE `evenements` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `budget` double DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `evenement_id` int(11) NOT NULL,
  `prestataire_id` int(11) NOT NULL,
  `service_prestataire_id` int(11) NOT NULL,
  `cree_en` datetime NOT NULL DEFAULT current_timestamp(),
  `total` double NOT NULL,
  `etat_payement` enum('en_cours','echec_de_paie','success_de_paie','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `id` int(11) NOT NULL,
  `id_services` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` date NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(4, 'Barbier Coiffeur', '', 'coiffur.jpg'),
(5, '\r\nCoiffeuses', '', 'coifeuse.jpg'),
(6, '\r\nCuisiniers', '', 'cuisinier.jpg'),
(7, '\r\nPhotographes', '', '/photpg.png'),
(8, '\r\nDécoration', '', 'decore.png'),
(9, '\r\nLes Salles', '', 'salle.png'),
(10, '\r\nPatisseries', '', 'patt.jpg'),
(11, '\r\nJus', '', 'jus.jpg'),
(12, '\r\nServeurs', '', 'serveur.png'),
(13, '\r\nFleuristes', '', 'fleuriste.jpg'),
(14, '\r\nSpa', '', 'spa.jpg'),
(15, '\r\nDJ/organiste', '', 'dj.png');

-- --------------------------------------------------------

--
-- Table structure for table `type_evenements`
--

CREATE TABLE `type_evenements` (
  `id` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `type_evenements`
--

INSERT INTO `type_evenements` (`id`, `libelle`, `description`) VALUES
(2, 'Fiancé', '');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `type_utilisateur` enum('role_admin','role_prestataire','role_client','') NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.png',
  `statut` enum('en_verification','bloquer','active','') NOT NULL DEFAULT 'en_verification'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `prenom`, `nom`, `email`, `type_utilisateur`, `mot_de_passe`, `telephone`, `adresse`, `avatar`, `statut`) VALUES
(1, 'admin', 'ben admin', 'admin@amevents.com', 'role_admin', '$argon2i$v=19$m=65536,t=4,p=1$VnM4dnNUTnh1UzkuV1h1aw$1Pbgykx9yy/jQ99aC17AIBWq4ZP/Hb2mt/cYbIqmqS0', 123131, 'sqdq', 'default.png', 'active'),
(2, 'ben foulena', 'foulen', 'foulen@gmail.com', 'role_client', '$argon2i$v=19$m=65536,t=4,p=1$VnM4dnNUTnh1UzkuV1h1aw$1Pbgykx9yy/jQ99aC17AIBWq4ZP/Hb2mt/cYbIqmqS0', 123345678, 'cite el manrar sqdqsd', 'woman.png', 'en_verification'),
(4, 'Manar', 'Sellami', 'manar@service.com', 'role_prestataire', '12345678', 44455221, 'adresse', 'default.png', 'en_verification'),
(5, 'amna', 'rejeb', 'amna@requester.com', 'role_client', '12345678', 66533211, 'adresse', 'default.png', 'bloquer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_evenements`
--
ALTER TABLE `type_evenements`
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
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `type_evenements`
--
ALTER TABLE `type_evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
