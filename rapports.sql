-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 29 Janvier 2019 à 16:03
-- Version du serveur :  5.7.25-0ubuntu0.18.04.2
-- Version de PHP :  7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rapports`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `desc_action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `action`
--

INSERT INTO `action` (`id_action`, `libelle`, `desc_action`) VALUES
(1, 'SS0', 'Vérification de l’alimentation du système / Réparation'),
(2, 'SS1', 'Mesures de couverture 2G/3G/4G sur site'),
(3, 'SS2', 'Mesures des niveaux sous chaque antenne / Capture d’écran des configurations'),
(4, 'SS3', 'Contrôle des niveaux entrée/sortie des répéteurs sur interface'),
(5, 'SS4', 'Mesures des puissances en sortie des répéteurs'),
(6, 'SS5', 'Vérification des interconnexions FO + Ajustement'),
(7, 'SS6', 'Nettoyage Fibre Optique'),
(8, 'SS7', 'Réglage UL/DL'),
(9, 'SS8', 'Réglage ou changement de l’antenne donneuse ou POI'),
(10, 'SS9', 'Réparation complexe hors process (cartes optiques, contrôleur, autre, …)');

-- --------------------------------------------------------

--
-- Structure de la table `cri`
--

CREATE TABLE `cri` (
  `id_rapport` int(11) NOT NULL,
  `ref_cri` varchar(255) NOT NULL,
  `probleme` text,
  `details_presta` text,
  `changer_piece` tinyint(1) DEFAULT NULL,
  `new_inter` tinyint(1) NOT NULL,
  `date_rapport` date NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `id_reseau` int(11) NOT NULL,
  `id_etat` int(11) NOT NULL,
  `id_tech` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `date_cri`
--

CREATE TABLE `date_cri` (
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `effectuer`
--

CREATE TABLE `effectuer` (
  `id_rapport` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_tech` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat_reseau`
--

CREATE TABLE `etat_reseau` (
  `id_etat` int(11) NOT NULL,
  `desc_etat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etat_reseau`
--

INSERT INTO `etat_reseau` (`id_etat`, `desc_etat`) VALUES
(1, 'Fonctionnel'),
(2, 'Partiellement fonctionnel'),
(3, 'Non fonctionnel');

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `ref_piece` varchar(255) NOT NULL,
  `details_piece` varchar(255) NOT NULL,
  `qte` int(11) NOT NULL,
  `id_rapport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `id_rapport` int(11) NOT NULL,
  `date_rapport` date NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `cp` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `id_tech` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `realiser`
--

CREATE TABLE `realiser` (
  `id_action` int(11) NOT NULL,
  `id_rapport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reseau`
--

CREATE TABLE `reseau` (
  `id_reseau` int(11) NOT NULL,
  `nom_reseau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `reseau`
--

INSERT INTO `reseau` (`id_reseau`, `nom_reseau`) VALUES
(1, 'MOBILE INDOOR'),
(2, 'WIFI INDOOR'),
(3, 'INPT/DMR');

-- --------------------------------------------------------

--
-- Structure de la table `tech`
--

CREATE TABLE `tech` (
  `id_tech` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tech`
--

INSERT INTO `tech` (`id_tech`, `nom`, `prenom`, `email`, `mdp`) VALUES
(1, 'Cotini', 'Vincent', 'vincent.cotini96@gmail.com', '87e1f221a672a14a323e57bb65eaea19d3ed3804');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`);

--
-- Index pour la table `cri`
--
ALTER TABLE `cri`
  ADD PRIMARY KEY (`id_rapport`),
  ADD KEY `cri_reseau0_FK` (`id_reseau`),
  ADD KEY `cri_etat_reseau1_FK` (`id_etat`),
  ADD KEY `cri_tech2_FK` (`id_tech`);

--
-- Index pour la table `date_cri`
--
ALTER TABLE `date_cri`
  ADD PRIMARY KEY (`date`);

--
-- Index pour la table `effectuer`
--
ALTER TABLE `effectuer`
  ADD PRIMARY KEY (`id_rapport`,`date`,`id_tech`),
  ADD KEY `effectuer_date_cri0_FK` (`date`),
  ADD KEY `effectuer_tech1_FK` (`id_tech`);

--
-- Index pour la table `etat_reseau`
--
ALTER TABLE `etat_reseau`
  ADD PRIMARY KEY (`id_etat`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`ref_piece`),
  ADD KEY `piece_cri_FK` (`id_rapport`);

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`id_rapport`),
  ADD KEY `rapport_tech_FK` (`id_tech`);

--
-- Index pour la table `realiser`
--
ALTER TABLE `realiser`
  ADD PRIMARY KEY (`id_action`,`id_rapport`),
  ADD KEY `realiser_cri0_FK` (`id_rapport`);

--
-- Index pour la table `reseau`
--
ALTER TABLE `reseau`
  ADD PRIMARY KEY (`id_reseau`);

--
-- Index pour la table `tech`
--
ALTER TABLE `tech`
  ADD PRIMARY KEY (`id_tech`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `etat_reseau`
--
ALTER TABLE `etat_reseau`
  MODIFY `id_etat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `id_rapport` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reseau`
--
ALTER TABLE `reseau`
  MODIFY `id_reseau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `tech`
--
ALTER TABLE `tech`
  MODIFY `id_tech` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cri`
--
ALTER TABLE `cri`
  ADD CONSTRAINT `cri_etat_reseau1_FK` FOREIGN KEY (`id_etat`) REFERENCES `etat_reseau` (`id_etat`),
  ADD CONSTRAINT `cri_rapport_FK` FOREIGN KEY (`id_rapport`) REFERENCES `rapport` (`id_rapport`),
  ADD CONSTRAINT `cri_reseau0_FK` FOREIGN KEY (`id_reseau`) REFERENCES `reseau` (`id_reseau`),
  ADD CONSTRAINT `cri_tech2_FK` FOREIGN KEY (`id_tech`) REFERENCES `tech` (`id_tech`);

--
-- Contraintes pour la table `effectuer`
--
ALTER TABLE `effectuer`
  ADD CONSTRAINT `effectuer_cri_FK` FOREIGN KEY (`id_rapport`) REFERENCES `cri` (`id_rapport`),
  ADD CONSTRAINT `effectuer_date_cri0_FK` FOREIGN KEY (`date`) REFERENCES `date_cri` (`date`),
  ADD CONSTRAINT `effectuer_tech1_FK` FOREIGN KEY (`id_tech`) REFERENCES `tech` (`id_tech`);

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_cri_FK` FOREIGN KEY (`id_rapport`) REFERENCES `cri` (`id_rapport`);

--
-- Contraintes pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD CONSTRAINT `rapport_tech_FK` FOREIGN KEY (`id_tech`) REFERENCES `tech` (`id_tech`);

--
-- Contraintes pour la table `realiser`
--
ALTER TABLE `realiser`
  ADD CONSTRAINT `realiser_action_FK` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`),
  ADD CONSTRAINT `realiser_cri0_FK` FOREIGN KEY (`id_rapport`) REFERENCES `cri` (`id_rapport`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
