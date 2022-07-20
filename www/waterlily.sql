-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : database
-- Généré le : mar. 19 juil. 2022 à 17:12
-- Version du serveur : 5.7.35
-- Version de PHP : 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `waterlilyy`
--

-- --------------------------------------------------------

--
-- Structure de la table `waterlily_article`
--

CREATE TABLE `waterlily_article` (
  `idArticle` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `urlImage` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `idCategory` varchar(45) NOT NULL,
  `idPage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `waterlily_article`
--

INSERT INTO `waterlily_article` (`idArticle`, `title`, `content`, `urlImage`, `createdAt`, `updatedAt`, `idCategory`, `idPage`) VALUES
(1, 'test', 'test', 'Capture dâ€™eÌcran 2022-07-17 aÌ€ 12.34.27.png', '2022-07-19 16:27:53', NULL, 'Etude', 1);

-- --------------------------------------------------------

--
-- Structure de la table `waterlily_comment`
--

CREATE TABLE `waterlily_comment` (
  `idComment` int(11) NOT NULL,
  `content` text NOT NULL,
  `id` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `waterlily_page`
--

CREATE TABLE `waterlily_page` (
  `idPage` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `waterlily_page`
--

INSERT INTO `waterlily_page` (`idPage`, `name`) VALUES
(2, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `waterlily_permissions`
--

CREATE TABLE `waterlily_permissions` (
  `perm_id` int(11) NOT NULL,
  `perm_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `waterlily_permissions`
--

INSERT INTO `waterlily_permissions` (`perm_id`, `perm_desc`) VALUES
(1, 'Gerer utilisateurs'),
(2, 'Consulter utlisateurs'),
(3, 'Accéder au back office'),
(4, 'Gerer articles'),
(5, 'Gerer pages'),
(8, 'Creation articles'),
(9, 'Gerer dashboard'),
(11, 'Creation articles'),
(12, 'Modif reglage'),
(13, 'Creation Page'),
(14, 'Ajout media'),
(15, 'Consulter media'),
(16, 'Gerer ticket assistance');

-- --------------------------------------------------------

--
-- Structure de la table `waterlily_roles`
--

CREATE TABLE `waterlily_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `waterlily_roles`
--

INSERT INTO `waterlily_roles` (`role_id`, `role_name`) VALUES
(3, 'Abonné'),
(1, 'Administrateur'),
(2, 'Editeur'),
(4, 'Email non vérifié');

-- --------------------------------------------------------

--
-- Structure de la table `waterlily_roles_permissions`
--

CREATE TABLE `waterlily_roles_permissions` (
  `role_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `waterlily_roles_permissions`
--

INSERT INTO `waterlily_roles_permissions` (`role_id`, `perm_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `waterlily_tplsettings`
--

CREATE TABLE `waterlily_tplsettings` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `bgcolor` varchar(45) NOT NULL DEFAULT '#503E9D',
  `fontcolor` varchar(45) NOT NULL,
  `font` varchar(45) NOT NULL,
  `logo-url` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `waterlily_tplsettings`
--

INSERT INTO `waterlily_tplsettings` (`id`, `name`, `bgcolor`, `fontcolor`, `font`, `logo-url`) VALUES
(1, 'one piece', '#723636', '#ffdd00', 'helvetica', '');

-- --------------------------------------------------------

--
-- Structure de la table `waterlily_user`
--

CREATE TABLE `waterlily_user` (
  `id` int(11) NOT NULL,
  `email` varchar(320) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `contry` varchar(45) DEFAULT NULL,
  `role_id` int(11) DEFAULT '4',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `token` char(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `waterlily_user`
--

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `waterlily_article`
--
ALTER TABLE `waterlily_article`
  ADD PRIMARY KEY (`idArticle`);

--
-- Index pour la table `waterlily_comment`
--
ALTER TABLE `waterlily_comment`
  ADD PRIMARY KEY (`idComment`);

--
-- Index pour la table `waterlily_page`
--
ALTER TABLE `waterlily_page`
  ADD PRIMARY KEY (`idPage`);

--
-- Index pour la table `waterlily_permissions`
--
ALTER TABLE `waterlily_permissions`
  ADD PRIMARY KEY (`perm_id`);

--
-- Index pour la table `waterlily_roles`
--
ALTER TABLE `waterlily_roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Index pour la table `waterlily_roles_permissions`
--
ALTER TABLE `waterlily_roles_permissions`
  ADD PRIMARY KEY (`role_id`,`perm_id`);

--
-- Index pour la table `waterlily_tplsettings`
--
ALTER TABLE `waterlily_tplsettings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `waterlily_user`
--
ALTER TABLE `waterlily_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `waterlily_article`
--
ALTER TABLE `waterlily_article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `waterlily_comment`
--
ALTER TABLE `waterlily_comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `waterlily_page`
--
ALTER TABLE `waterlily_page`
  MODIFY `idPage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `waterlily_permissions`
--
ALTER TABLE `waterlily_permissions`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `waterlily_roles`
--
ALTER TABLE `waterlily_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `waterlily_tplsettings`
--
ALTER TABLE `waterlily_tplsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `waterlily_user`
--
ALTER TABLE `waterlily_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
