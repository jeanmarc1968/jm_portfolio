-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 26 oct. 2018 à 12:47
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

-- --------------------------------------------------------

--
-- Structure de la table `t_competences`
--

CREATE TABLE `t_competences` (
  `id_competence` int(3) NOT NULL,
  `competence` varchar(150) NOT NULL,
  `niveau` int(3) NOT NULL,
  `categorie` enum('Développement','Gestion de projet','Intégration') NOT NULL,
  `id_utilisateur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_competences`
--

INSERT INTO `t_competences` (`id_competence`, `competence`, `niveau`, `categorie`, `id_utilisateur`) VALUES
(1, 'html', 70, 'Développement', 1),
(3, 'CSS3', 60, 'Intégration', 1),
(5, 'js', 30, 'Développement', 1),
(6, 'mysql', 15, 'Développement', 1),
(7, 'Boostrap', 30, 'Développement', 1),
(10, 'gost', 30, 'Développement', 1),
(11, 'angulars', 60, 'Gestion de projet', 2),
(12, 'boostrap', 50, 'Intégration', 2),
(13, 'word', 70, 'Gestion de projet', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_experiences`
--

CREATE TABLE `t_experiences` (
  `id_experience` int(3) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `stitre` varchar(200) NOT NULL,
  `dates` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `id_utilisateur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_experiences`
--

INSERT INTO `t_experiences` (`id_experience`, `titre`, `stitre`, `dates`, `description`, `id_utilisateur`) VALUES
(1, 'vendeurs', 'multimedias', 'juin 1989 - juil 1990', '<p>vendeur itin&eacute;rantssss</p>\r\n', 1),
(4, 'defonceur de portes ouvertes', 'en bois ', 'aout - juin 2015', 'metier passionnant', 1),
(5, 'sex machine', 'get down', 'juin 2011 - sept 2013', 'salut', 1),
(6, 'nettoyage', 'inspecteur ', 'mai 1990 - aout 1991', 'encadrement équipe de nettoyage', 1),
(8, 'colmax', 'acteur', 'janv 1996 mars 1999', 'le cahoutchouc c\'est super mou', 1),
(11, 'demenageur', 'voltigeur - attrapeur', 'mai 2005 - juin 2007', '<p>boulot tr&egrave;s tr&egrave;s dur, mais pas insurmontable</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_formations`
--

CREATE TABLE `t_formations` (
  `id_formation` int(3) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `sous_titre` varchar(200) NOT NULL,
  `dates` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `id_utilisateur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_formations`
--

INSERT INTO `t_formations` (`id_formation`, `titre`, `sous_titre`, `dates`, `description`, `id_utilisateur`) VALUES
(1, 'cuisinier', 'couscous', 'fevr 2000 - mars 2005', 'marabou', 1),
(2, 'police nationale', 'crs', 'juin 1989 - juil 1990', 'service national', 1),
(3, 'bafa', 'animateur ', 'juin 2010 - sept 2010', 'azerty', 1),
(4, 'azzaro', 'parfum', 'mars 2000 - avril 2002', 'testeur', 1),
(6, 'BAC S', 'scientifique ', 'sept 1985', 'optention', 1),
(7, 'kirikou', 'ngolo', 'juil 2018 - sept 2018', '<p>parfum de victoire</p>\r\n', 1),
(8, 'MUC', 'management ', 'mai 2018 - juin 2018', '<p>jhefehfhe hrjehr dhhej e&quot;hb&nbsp; rj&quot;hr ezhej edhr&quot; zuyu&eacute;b eheh e&quot;he&quot;ueh&quot; he</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_loisirs`
--

CREATE TABLE `t_loisirs` (
  `id_loisir` int(3) NOT NULL,
  `loisir` varchar(200) NOT NULL,
  `id_utilisateur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_loisirs`
--

INSERT INTO `t_loisirs` (`id_loisir`, `loisir`, `id_utilisateur`) VALUES
(7, 'velo', 1),
(8, 'balades', 1),
(9, 'cinéma', 1),
(10, 'tai-chi chuen ', 1),
(11, 'kite surf', 1),
(12, 'kung fu fu', 1),
(13, 'thé dansant', 1),
(14, 'football', 2),
(16, 'equitation', 2),
(17, 'boxes', 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_messages`
--

CREATE TABLE `t_messages` (
  `id_message` int(3) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sujet` varchar(150) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_realisations`
--

CREATE TABLE `t_realisations` (
  `id_realisation` int(3) NOT NULL,
  `titre_real` varchar(150) NOT NULL,
  `stitre_real` varchar(150) NOT NULL,
  `dates_real` varchar(150) NOT NULL,
  `description_real` text NOT NULL,
  `id_utilisateur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_reseaux`
--

CREATE TABLE `t_reseaux` (
  `id_reseau` int(3) NOT NULL,
  `url` varchar(120) NOT NULL,
  `id_utilisareur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_titres`
--

CREATE TABLE `t_titres` (
  `id_titre` int(3) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `accroche` tinytext NOT NULL,
  `id_utilisateur` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_users`
--

CREATE TABLE `t_users` (
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
-- Déchargement des données de la table `t_users`
--

INSERT INTO `t_users` (`id_users`, `firstname`, `lastname`, `email`, `phone1`, `phone2`, `psw`, `pseudo`, `age`, `birthdate`, `gender`, `civilstatus`, `address`, `zip`, `city`, `country`, `comments`) VALUES
(1, 'robert', 'turpin', 'robert.turpin@gmail.com', '0652487595', '0123569874', 'robert', 'roberto', 50, '1968-08-25', 'homme', 'monsieur', '23 rue de la pompe', '75016', 'paris', 'france', 'va bientot changer le pseudo'),
(2, 'ludovic', 'van poors', 'van.poors@neuf.fr', '0695872365', '0123659874', 'poors', 'vanhors', 35, '1983-06-05', 'homme', 'monsieur', '160 avenue jean lolive', '93500', 'pantin', 'france', 'no comment');

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateurs`
--

CREATE TABLE `t_utilisateurs` (
  `id_utilisateur` int(3) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `portable` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `age` varchar(20) NOT NULL,
  `anniversaire` date NOT NULL,
  `genre` enum('homme','femme') NOT NULL,
  `civilite` enum('monsieur','madame') NOT NULL,
  `adresse` text NOT NULL,
  `code_postal` varchar(5) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_utilisateurs`
--

INSERT INTO `t_utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `email`, `portable`, `mdp`, `pseudo`, `age`, `anniversaire`, `genre`, `civilite`, `adresse`, `code_postal`, `ville`, `pays`, `commentaire`) VALUES
(1, 'Jean-Marc', 'Bon', 'bon.jean-marc@neuf.fr', '0682296444', 'morgane', 'jm', '50', '1968-07-19', 'homme', 'monsieur', '23 rue Auger', '93500', 'Pantin', 'france', 'va bientot changer le pseudo'),
(2, 'ludovic', 'van poors', 'van.poors@neuf.fr', '0695872365', '0123', 'poors', 'vanhors', '1983-06-05', 'homme', 'monsieur', '160 avenue jean lolive', '93500', 'pantin', 'france', 'no comment');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_competences`
--
ALTER TABLE `t_competences`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  ADD PRIMARY KEY (`id_experience`);

--
-- Index pour la table `t_formations`
--
ALTER TABLE `t_formations`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  ADD PRIMARY KEY (`id_loisir`);

--
-- Index pour la table `t_messages`
--
ALTER TABLE `t_messages`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  ADD PRIMARY KEY (`id_realisation`);

--
-- Index pour la table `t_reseaux`
--
ALTER TABLE `t_reseaux`
  ADD PRIMARY KEY (`id_reseau`);

--
-- Index pour la table `t_titres`
--
ALTER TABLE `t_titres`
  ADD PRIMARY KEY (`id_titre`);

--
-- Index pour la table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Index pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_competences`
--
ALTER TABLE `t_competences`
  MODIFY `id_competence` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `t_experiences`
--
ALTER TABLE `t_experiences`
  MODIFY `id_experience` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `t_formations`
--
ALTER TABLE `t_formations`
  MODIFY `id_formation` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `t_loisirs`
--
ALTER TABLE `t_loisirs`
  MODIFY `id_loisir` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `t_messages`
--
ALTER TABLE `t_messages`
  MODIFY `id_message` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_realisations`
--
ALTER TABLE `t_realisations`
  MODIFY `id_realisation` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_reseaux`
--
ALTER TABLE `t_reseaux`
  MODIFY `id_reseau` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_titres`
--
ALTER TABLE `t_titres`
  MODIFY `id_titre` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id_users` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_utilisateurs`
--
ALTER TABLE `t_utilisateurs`
  MODIFY `id_utilisateur` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
