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

INSERT INTO `waterlily_user` (`id`, `email`, `password`, `firstname`, `lastname`, `contry`, `role_id`, `status`, `token`, `createdAt`, `updatedAt`) VALUES
(2, 'sebastien@waterlily.fr', '$2y$10$ukAHjEiLaBS43vVqaDmIMeShJIDtx7k2yGm5uwNgA3uG/yMEIxd6C', 'Sebastien', 'YALICHEFF', 'France', 1, 0, '9faa3c09a24a512a43c77289247209c4b6fe3926d84f416aa91370c22d6b3b7548fad75c989059a2ae1571df87e20ee2ed966a8a93cabe877e055ceeaefb6addf3d4d60e054ddd34b3e988cb9f2b930571763ed7b0fa3bdb25db2480039e646f4265850d6d853dffdc6be251417e1ec3813a30a7923b223286f84f30b8fb1b6', '2022-04-06 21:46:58', '2022-07-13 10:45:24'),
(11, 'test@gmail.com', '$2y$10$9Rl.17fDMoOe53npoBLNIebhQiiBB/ISBXZ9kt4AL4WH1SjIBZ2ea', 'Bob', 'Huiee', 'France', 4, 0, 'a1c8bc91c80828ccf9a46055dfab900e457756ec5cf266709565694eae0e8a9b3f1ab61aadd2dc4d52814c53b6cf1948a4009edddcae3365f89bff87014003ea71b9f7f709f0d18d9119d1daede6ec93450ce5e2b41712f974adfcbd1b268371251535e631e96f00359b290b192c115e7c26a0a79987eb23c03770a94fc2312', '2022-02-13 01:09:48', '2022-07-13 13:54:56'),
(12, 'test1@gmail.com', '$2y$10$9Rl.17fDMoOe53npoBLNIebhQiiBB/ISBXZ9kt4AL4WH1SjIBZ2ea', 'Hiffddk', 'dfsgsg', 'France', 4, 0, 'a1c8bc91c80828ccf9a46055dfab900e457756ec5cf266709565694eae0e8a9b3f1ab61aadd2dc4d52814c53b6cf1948a4009edddcae3365f89bff87014003ea71b9f7f709f0d18d9119d1daede6ec93450ce5e2b41712f974adfcbd1b268371251535e631e96f00359b290b192c115e7c26a0a79987eb23c03770a94fc2312', '2022-05-13 01:09:48', '2022-07-13 10:45:09'),
(13, 'test2@gmail.com', '$2y$10$9Rl.17fDMoOe53npoBLNIebhQiiBB/ISBXZ9kt4AL4WH1SjIBZ2ea', 'vre', 'ev', 'France', 4, 0, 'a1c8bc91c80828ccf9a46055dfab900e457756ec5cf266709565694eae0e8a9b3f1ab61aadd2dc4d52814c53b6cf1948a4009edddcae3365f89bff87014003ea71b9f7f709f0d18d9119d1daede6ec93450ce5e2b41712f974adfcbd1b268371251535e631e96f00359b290b192c115e7c26a0a79987eb23c03770a94fc2312', '2022-07-13 01:09:48', '2022-07-13 01:30:58'),
(14, 'test3@gmail.com', '$2y$10$9Rl.17fDMoOe53npoBLNIebhQiiBB/ISBXZ9kt4AL4WH1SjIBZ2ea', 'SÃ©bastien', 'YALICHEFF', 'France', 4, 0, 'a1c8bc91c80828ccf9a46055dfab900e457756ec5cf266709565694eae0e8a9b3f1ab61aadd2dc4d52814c53b6cf1948a4009edddcae3365f89bff87014003ea71b9f7f709f0d18d9119d1daede6ec93450ce5e2b41712f974adfcbd1b268371251535e631e96f00359b290b192c115e7c26a0a79987eb23c03770a94fc2312', '2022-03-13 01:09:48', '2022-07-13 13:55:04'),
(15, 'test4@gmail.com', '$2y$10$9Rl.17fDMoOe53npoBLNIebhQiiBB/ISBXZ9kt4AL4WH1SjIBZ2ea', 'Sebastien', 'YALICHEFF', 'Belgique', 1, 0, 'a1c8bc91c80828ccf9a46055dfab900e457756ec5cf266709565694eae0e8a9b3f1ab61aadd2dc4d52814c53b6cf1948a4009edddcae3365f89bff87014003ea71b9f7f709f0d18d9119d1daede6ec93450ce5e2b41712f974adfcbd1b268371251535e631e96f00359b290b192c115e7c26a0a79987eb23c03770a94fc2312', '2022-06-13 01:09:48', '2022-07-16 15:58:07'),
(16, 'test5@gmail.com', '$2y$10$9Rl.17fDMoOe53npoBLNIebhQiiBB/ISBXZ9kt4AL4WH1SjIBZ2ea', 'SÃ©bastien', 'YALICHEFF', 'Belgique', 4, 0, 'a1c8bc91c80828ccf9a46055dfab900e457756ec5cf266709565694eae0e8a9b3f1ab61aadd2dc4d52814c53b6cf1948a4009edddcae3365f89bff87014003ea71b9f7f709f0d18d9119d1daede6ec93450ce5e2b41712f974adfcbd1b268371251535e631e96f00359b290b192c115e7c26a0a79987eb23c03770a94fc2312', '2022-04-13 01:09:48', '2022-07-13 13:55:13'),
(17, 'te@gmail.com', '$2y$10$9Rl.17fDMoOe53npoBLNIebhQiiBB/ISBXZ9kt4AL4WH1SjIBZ2ea', 'SÃ©bastien', 'YALICHEFF', 'Belgique', 4, 0, 'a1c8bc91c80828ccf9a46055dfab900e457756ec5cf266709565694eae0e8a9b3f1ab61aadd2dc4d52814c53b6cf1948a4009edddcae3365f89bff87014003ea71b9f7f709f0d18d9119d1daede6ec93450ce5e2b41712f974adfcbd1b268371251535e631e96f00359b290b192c115e7c26a0a79987eb23c03770a94fc2312', '2022-07-13 01:09:48', NULL),
(18, 'tsfse@gmail.com', '$2y$10$9Rl.17fDMoOe53npoBLNIebhQiiBB/ISBXZ9kt4AL4WH1SjIBZ2ea', 'SÃ©bastien', 'YALICHEFF', 'Espagne', 4, 0, 'a1c8bc91c80828ccf9a46055dfab900e457756ec5cf266709565694eae0e8a9b3f1ab61aadd2dc4d52814c53b6cf1948a4009edddcae3365f89bff87014003ea71b9f7f709f0d18d9119d1daede6ec93450ce5e2b41712f974adfcbd1b268371251535e631e96f00359b290b192c115e7c26a0a79987eb23c03770a94fc2312', '2022-06-13 01:09:48', '2022-07-13 10:45:00'),
(19, 'tsfseff@gmail.com', '$2y$10$9Rl.17fDMoOe53npoBLNIebhQiiBB/ISBXZ9kt4AL4WH1SjIBZ2ea', 'SÃ©bastien', 'YALICHEFF', 'Canada', 4, 0, 'a1c8bc91c80828ccf9a46055dfab900e457756ec5cf266709565694eae0e8a9b3f1ab61aadd2dc4d52814c53b6cf1948a4009edddcae3365f89bff87014003ea71b9f7f709f0d18d9119d1daede6ec93450ce5e2b41712f974adfcbd1b268371251535e631e96f00359b290b192c115e7c26a0a79987eb23c03770a94fc2312', '2022-07-13 01:09:48', '2022-07-13 01:29:00'),
(20, 'dfqbdfb@gmail.com', '$2y$10$9Rl.17fDMoOe53npoBLNIebhQiiBB/ISBXZ9kt4AL4WH1SjIBZ2ea', 'SÃ©bastien', 'YALICHEFF', 'Canada', 4, 0, 'a1c8bc91c80828ccf9a46055dfab900e457756ec5cf266709565694eae0e8a9b3f1ab61aadd2dc4d52814c53b6cf1948a4009edddcae3365f89bff87014003ea71b9f7f709f0d18d9119d1daede6ec93450ce5e2b41712f974adfcbd1b268371251535e631e96f00359b290b192c115e7c26a0a79987eb23c03770a94fc2312', '2022-07-13 01:09:48', NULL),
(21, 'zergzergzerg@gmail.com', '$2y$10$9Rl.17fDMoOe53npoBLNIebhQiiBB/ISBXZ9kt4AL4WH1SjIBZ2ea', 'SÃ©bastien', 'YALICHEFF', 'Luxembourg', 4, 0, 'a1c8bc91c80828ccf9a46055dfab900e457756ec5cf266709565694eae0e8a9b3f1ab61aadd2dc4d52814c53b6cf1948a4009edddcae3365f89bff87014003ea71b9f7f709f0d18d9119d1daede6ec93450ce5e2b41712f974adfcbd1b268371251535e631e96f00359b290b192c115e7c26a0a79987eb23c03770a94fc2312', '2022-06-13 01:09:48', '2022-07-13 10:44:54'),
(26, 'yalicheff.sebastien@gmail.com', '$2y$10$HyhP1JhatYBCwfwOyFJj/uA3DoMoYKy37iY1ESoAbx3ayFRqiyXPO', 'SÃ©bastien', 'YALICHEFF', 'France', 3, 0, '81b4308e0d134b36c637285b96d6c7f62dbffb845cefcbd4a05d28f614841519fe559ea492ee6d5bd74ca3a71c124adf8ad59cf07f95e24cae08a25c00f741a47616a5db402abe7165b58adb341cd155c67efddfba51191e9ca294fd86188ccd7e39ed70e7a5cdfc9ff1e9f578646f7c42d15e823ab6fdcd0f03dc38e9d6219', '2022-07-13 22:30:17', '2022-07-13 22:30:30'),
(27, 'sebastien77@waterlily.fr', '$2y$10$J5ZYWmS4ICknhGPz60veJuv3jI6vPOCHC5p.Ftq1kEfvFslBqm596', 'Seb', 'YALICHEFF', 'France', 4, 0, '36049d9d6cab1ba7468ba4961e233b5e03b54f1eaf7cf1e3a27679fbdfcd8f6ee007a7e5329b851c91daeee5cdae9b1a12b8d58e5a598180c43e61456f185987c73e2c23a473397cca0bb33f20ee57146016a8d2d202df7636edf8570e319123dc11777c4f51c23cc017e7e57e43d7422a00854375f3ad7fc175e1e93641484', '2022-07-13 23:30:44', NULL);

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
