-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 14 Décembre 2016 à 18:14
-- Version du serveur :  5.5.16
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetimmobilier`
--
CREATE DATABASE projetimmobilier;
USE projetimmobilier;

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id_a` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` bigint(20) NOT NULL DEFAULT '1',
  `type` varchar(255) NOT NULL DEFAULT 'Maison',
  `surface` int(11) NOT NULL DEFAULT '1',
  `piece` int(11) NOT NULL DEFAULT '1',
  `chambre` int(11) NOT NULL DEFAULT '1',
  `sdb` int(11) NOT NULL DEFAULT '1',
  `parking` varchar(255) NOT NULL DEFAULT 'inconnu',
  `internet` varchar(255) NOT NULL DEFAULT 'inconnu',
  `lieu` varchar(255) NOT NULL DEFAULT 'Inconnu',
  `vendeur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id_a`, `nom`, `prix`, `type`, `surface`, `piece`, `chambre`, `sdb`, `parking`, `internet`, `lieu`, `vendeur`) VALUES
(1, 'Superbe maison avec vu sur la mer a Marseille prés du port', 300000, 'Maison', 2000, 234, 14, 12, 'Parking privé', 'Fibre Optique', 'Paris, 75015', 'Mamadou'),
(2, 'Location Appartement Paris 6ème', 1721, 'Appartement', 51, 1, 2, 3, 'Garage privé 1 place', 'VDSL2+', 'Paris, 75016', 'Morin'),
(3, 'Location Loft/Atelier/Surface Quartier Porte Saint Denis-Paradis ', 2220, 'Loft / Studio', 86, 2, 0, 1, 'Parking public', 'ADSL2', 'Paris, 75010', 'BASTIMO '),
(4, 'Cagibi', 10, 'Autre', 3, 4, 0, 0, 'Pas de garage', 'Pas internet', 'Le trou du cul du monde, 42424', 'Hollande'),
(5, 'Superbe maison avec vu sur la mer a Marseille prés du port', 2500, 'Maison', 2000, 3, 14, 12, 'Parking privé', 'Fibre Optique', 'Marseille, 13000', 'Mamadou'),
(6, ' Location Appartement Paris 17ème - Quartier La Fourche-Guy Môquet ', 2390, 'Appartement', 90, 2, 2, 3, 'Garage privé 1 place', 'VDSL2+', 'Paris, 75017', 'Morin'),
(7, ' Location Loft/Atelier/Surface', 1600, 'Loft / Studio', 56, 4, 0, 1, 'Parking public', 'ADSL2', 'Paris, 75006', 'BASTIMO '),
(8, 'Cagibi', 11, 'Autre', 3, 3, 0, 0, 'Pas de garage', 'Pas internet', 'Le trou du cul du monde, 42424', 'Hollande'),
(9, 'Superbe maison avec vu sur la mer a Marseille prés du port', 5400, 'Maison', 155, 4, 3, 12, 'Parking privé', 'Fibre Optique', 'Paris, 75017', 'Mamadou'),
(10, 'Location Appartement Paris 11ème', 2450, 'Appartement', 90, 4, 2, 3, 'Garage privé 1 place', 'VDSL2+', 'Paris, 75011', 'Morin'),
(11, 'Quartier Vallée de Fécamp ', 1500, 'Loft / Studio', 50, 5, 0, 1, 'Parking public', 'ADSL2', 'Paris, 75012', 'BASTIMO '),
(12, 'Cagibi', 12, 'Autre', 3, 1, 0, 0, 'Pas de garage', 'Pas internet', 'Le trou du cul du monde, 42424', 'Hollande'),
(13, 'Location Maison- Quartier Léon-Blum Folie-Regnault ', 5500, 'Maison', 2000, 4, 14, 12, 'Parking privé', 'Fibre Optique', 'Paris, 75011', 'Mamadou'),
(14, 'Location Appartement  Paris 8ème ', 9000, 'Appartement', 120, 4, 2, 3, 'Garage privé 1 place', 'VDSL2+', 'La Réunion, 97400', 'Morin'),
(15, 'Location Loft/Atelier/Surface  Quartier Ecole Militaire ', 2800, 'Loft / Studio', 60, 3, 0, 1, 'Parking public', 'ADSL2', 'Paris, 75007', 'BASTIMO '),
(16, 'Cagibi', 13, 'Autre', 3, 9, 0, 0, 'Pas de garage', 'Pas internet', 'Le trou du cul du monde, 42424', 'Hollande'),
(17, 'Petit voyageur ', 1212, 'Autre', 12, 2, 12, 12, 'Parking Privé', 'ADSL', '1111', '1'),
(18, 'Grand appartement plein Paris', 3333, 'Appartement', 200, 5, 3, 1, 'Garage Privé 1 place', 'ADSL2', 'La Réunion, 97477', '1'),
(19, 'La maison de Théo', 50000000, 'Autre', 11179, 35, 15, 5, 'Parking Privé', 'Fibre Optique', 'Paris, 75008', '3');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_u` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_u`, `pseudo`, `email`, `mdp`, `level`) VALUES
(1, 'Maha AMAR', 'amarmaha2707@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 2),
(2, 'maha maha', 'maha@gmail.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 1),
(3, 'eight8', 'theo.huchard@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id_a`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
