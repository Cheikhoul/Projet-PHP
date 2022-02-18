-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 18 Février 2022 à 20:12
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp_mathias_khadim_gaspard`
--

-- --------------------------------------------------------

--
-- Structure de la table `url_origine`
--

CREATE TABLE `url_origine` (
  `id_url_origine` int(11) NOT NULL,
  `url_origine` varchar(64) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `url_origine`
--

INSERT INTO `url_origine` (`id_url_origine`, `url_origine`, `id_utilisateur`) VALUES
(1, 'https://aunt.example.org/bomb?anger=belief\r\n', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `url_raccourcie`
--

CREATE TABLE `url_raccourcie` (
  `id_url_raccourcie` int(11) NOT NULL,
  `id_url_origine` int(11) DEFAULT NULL,
  `url_raccourcie` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `url_raccourcie`
--

INSERT INTO `url_raccourcie` (`id_url_raccourcie`, `id_url_origine`, `url_raccourcie`) VALUES
(1, NULL, 'https://aunt.example.org/bomb?anger=belief\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(64) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `mail` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `password`, `mail`) VALUES
(1, 'test', 'test', 'test@gmail.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `url_origine`
--
ALTER TABLE `url_origine`
  ADD PRIMARY KEY (`id_url_origine`),
  ADD KEY `id_url_origine_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `url_raccourcie`
--
ALTER TABLE `url_raccourcie`
  ADD PRIMARY KEY (`id_url_raccourcie`),
  ADD KEY `id_url_raccourcie_origine` (`id_url_origine`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `url_origine`
--
ALTER TABLE `url_origine`
  MODIFY `id_url_origine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `url_raccourcie`
--
ALTER TABLE `url_raccourcie`
  MODIFY `id_url_raccourcie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `url_origine`
--
ALTER TABLE `url_origine`
  ADD CONSTRAINT `id_url_origine_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `url_raccourcie`
--
ALTER TABLE `url_raccourcie`
  ADD CONSTRAINT `id_url_raccourcie_origine` FOREIGN KEY (`id_url_origine`) REFERENCES `url_origine` (`id_url_origine`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
