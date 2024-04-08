-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 09:41 PM
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
-- Database: `ecommerce_training`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `email`, `mot_de_passe`) VALUES
(1, 'admin', 'admin@ecommerce.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `valeur` text NOT NULL,
  `visiteur` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `createur`, `date_creation`, `date_modification`) VALUES
(1, 'categorie 1', 'description categorie 1', 0, '0000-00-00', '0000-00-00'),
(2, 'categorie 2', 'description categorie 2', 0, '0000-00-00', '0000-00-00'),
(3, 'categorie 3', 'description categorie 3', 0, '0000-00-00', '0000-00-00'),
(4, 'categorie 4', 'description categorie 4', 0, '0000-00-00', '0000-00-00'),
(13, 'test categorie', 'desc test lol\r\n', 1, '2023-04-20', '2023-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `panier` int(11) NOT NULL,
  `total` float NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `produit`, `quantite`, `panier`, `total`, `date_creation`, `date_modification`) VALUES
(1, 1, 7, 0, 8400, '2023-04-21', '2023-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `visiteur` int(11) NOT NULL,
  `total` float NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `categorie` int(11) NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `image`, `categorie`, `createur`, `date_creation`, `date_modification`) VALUES
(1, 'produit 1', 'description produit 1', 1200, '1.jpg', 1, 0, '0000-00-00', '0000-00-00'),
(2, 'produit 2', 'description produit 2', 1500, '2.jpg', 2, 0, '0000-00-00', '0000-00-00'),
(3, 'produit 3', 'description produit 3', 2400, '3.jpg', 3, 0, '0000-00-00', '0000-00-00'),
(4, 'produit 4', 'description produit 4', 5000, '4.jpg', 1, 0, '0000-00-00', '0000-00-00'),
(7, 'produit ydpowfpo', 'description produit y04', 1200, 'istockphoto-910794240-612x612.jpg', 13, 1, '2023-04-20', '2023-04-21'),
(10, 'prod test stock', 'ejkrnlr kocm ', 1884, 'istockphoto-1458300133-612x612.jpg', 13, 1, '2023-04-21', '0000-00-00'),
(11, 'oijdo', 'ofnoiwfe', 1389, 'istockphoto-1445012734-612x612.jpg', 13, 1, '2023-04-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `createur` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `produit`, `quantite`, `createur`, `date_creation`, `date_modification`) VALUES
(1, 10, 17, 1, '2023-04-21', '0000-00-00'),
(2, 11, 98, 1, '2023-04-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `visiteur`
--

CREATE TABLE `visiteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 0,
  `date_creation` date NOT NULL,
  `date_modification` date NOT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `prenom`, `email`, `mot_de_passe`, `etat`, `date_creation`, `date_modification`, `telephone`) VALUES
(30, 'andrieu', 'mickel', 'mickael.andrieu@exemple.com', '25f9e794323b453885f5181f1b624d0b', 1, '0000-00-00', '0000-00-00', '00001111'),
(31, 'TKT', 'Soukaina', 'soukaina@gmail.com', '830d1ab1b2aeeb959613c80ff2c95d9a', 0, '0000-00-00', '0000-00-00', '01230123'),
(32, 'Exemple', 'Exe', 'user@exemple.com', 'ceaf21b7ea3e3c44d3970bee9ca5a812', 0, '0000-00-00', '0000-00-00', '0987'),
(33, 'exemple', 'exemple', 'exemple@exemple.com', '771f5924706521c73464341fc48afb05', 0, '0000-00-00', '0000-00-00', '0987'),
(34, 'Bibi', 'Ayoub', 'ayoub@gmail.com', '25ae1b3ee9c85bbfa4da149f286b20f2', 0, '0000-00-00', '0000-00-00', '039746230'),
(36, 'Hiba', 'Biba', 'hiba@gmail.com', '05c30a524c57ef2c2d841ce7d8058c32', 1, '0000-00-00', '0000-00-00', '0281638');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `nom_2` (`nom`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visiteur`
--
ALTER TABLE `visiteur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visiteur`
--
ALTER TABLE `visiteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


ALTER TABLE `panier` ADD `etat` INT NOT NULL AFTER `total`;
ALTER TABLE `panier` CHANGE `etat` `etat` VARCHAR(50) NOT NULL DEFAULT 'en cours';