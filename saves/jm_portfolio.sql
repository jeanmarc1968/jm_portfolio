-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 07 sep. 2018 à 14:34
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jm_portfolio`
--
CREATE DATABASE IF NOT EXISTS `jm_portfolio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jm_portfolio`;

-- --------------------------------------------------------

--
-- Structure de la table `t-users`
--

CREATE TABLE `t-users` (
  `id_users` int(3) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `age` smallint(5) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('homme','femme') NOT NULL,
  `civilstatus` enum('monsieur','madame') NOT NULL,
  `address` text NOT NULL,
  `zip` varchar(5) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t-users`
--

INSERT INTO `t-users` (`id_users`, `firstname`, `lastname`, `email`, `phone1`, `phone2`, `psw`, `pseudo`, `age`, `birthdate`, `gender`, `civilstatus`, `address`, `zip`, `city`, `country`, `comments`) VALUES
(1, 'robert', 'turpin', 'robert.turpin@gmail.com', '0652487595', '0123569874', 'robert', 'roberto', 50, '1968-08-25', 'homme', 'monsieur', '23 rue de la pompe', '75016', 'paris', 'france', 'va bientot changer le pseudo'),
(2, 'ludovic', 'van poors', 'van.poors@neuf.fr', '0695872365', '0123659874', 'poors', 'vanhors', 35, '1983-06-05', 'homme', 'monsieur', '160 avenue jean lolive', '93500', 'pantin', 'france', 'no comment');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t-users`
--
ALTER TABLE `t-users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t-users`
--
ALTER TABLE `t-users`
  MODIFY `id_users` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
