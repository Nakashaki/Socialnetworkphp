-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : Dim 22 mai 2022 à 20:21
-- Version du serveur :  5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetphp`
--

-- --------------------------------------------------------

--
-- Structure de la table `authentification`
--

CREATE TABLE `authentification` (
  `id_authent` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `publicationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `publicationId`) VALUES
(1, 'okay bg', 1),
(2, 'Je suis un commentaire', 3),
(3, 'Je suis un deuxieme commentaire', 3);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `likes` int(11) NOT NULL,
  `replies` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `grouppage`
--

CREATE TABLE `grouppage` (
  `id` int(11) NOT NULL,
  `nomdelapage` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `banniere` blob NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `grouppage`
--

INSERT INTO `grouppage` (`id`, `nomdelapage`, `description`, `banniere`, `user_id`) VALUES
(12, 'test', 'test', '', NULL),
(13, 'test', 'test', '', NULL),
(14, 'test', 'test', '', NULL),
(15, 'test', 'test', '', NULL),
(16, 'test', 'test', '', NULL),
(17, 'test', 'test', '', NULL),
(18, 'tst', 'test', '', NULL),
(19, 'f', 'f', '', NULL),
(20, 'f', 'f', '', NULL),
(21, 'l', 'l', '', NULL),
(22, 'f', 'f', '', NULL),
(23, 'g', 'g', '', NULL),
(24, 'o', 'o', '', NULL),
(25, 'd', 'd', '', NULL),
(26, 'test', 'test', '', NULL),
(27, 'salmalabest', 'deeznuts', '', NULL),
(28, 'test', 'test', '', NULL),
(29, 'test', 'test', '', NULL),
(30, 'test', 'test', '', NULL),
(31, 'test', 'test', '', NULL),
(32, 'testdutitre', 'test', '', NULL),
(33, 'je fait un test ', 'ceci est une description', '', NULL),
(34, 'nom', 'description', '', NULL),
(35, 'test', 'test', '', NULL),
(36, 'nom', 'description', '', NULL),
(37, 'nom', 'desc', '', NULL),
(38, 't', 'e', '', NULL),
(39, 't', 'e', '', NULL),
(40, 'test', 're', '', NULL),
(41, 'test', 'test', '', NULL),
(42, 'je suis le nom de la page', 'je suis la description de la page', '', NULL),
(43, 'les voitures', 'ceci parle de voiture', '', NULL),
(44, 'pouette', 'description', '', NULL),
(45, 'nom', 'desc', '', NULL),
(46, 'name', 'desc', '', NULL),
(47, 'name', 'desc', '', NULL),
(48, 'name', 'desc', '', NULL),
(49, 'name', 'desc', '', NULL),
(50, 'new name', 'newdesc', '', NULL),
(51, 'test', 'test', '', NULL),
(52, 'Idris wallah', 'tema la taille du rat', '', NULL),
(53, '', 'ici c\'est paris', '', NULL),
(54, '', 'modify', '', NULL),
(55, '', 'test2', '', NULL),
(56, 'testa', '', '', NULL),
(57, 'tet', 'http', '', NULL),
(58, 'test', 'test', '', NULL),
(59, 'test', 'test', '', NULL),
(60, 'test', 'test', '', 18),
(61, 'test', 'test', '', 18),
(62, 'te', '', '', 20),
(63, 'test', 'test', '', 20),
(64, 'test', 'test', '', 20),
(65, 'test', 'test', '', 20),
(66, 'testt', 'est', '', NULL),
(67, 'etst', 'test', '', 20),
(68, 'test', 'test', '', 19),
(69, 'test', 'test', '', 19),
(70, 'azer', 'azerazerzaer', '', NULL),
(71, 'azera', 'azerazer', '', 21),
(72, 'azer', 'azerazer', '', 21),
(73, 'Chute', 'Chute', '', 21),
(74, 'Yolo', 'Yolo2', '', 21),
(75, 'l', 'azerazerazerreararar', '', 21),
(76, 'test', 'testplus', '', 21),
(77, 'azer', 'azerazerraz', '', 21),
(78, 'azer', 'azerazerraz', '', 21),
(79, 'azer', 'azerazerraz', '', 21),
(80, 'Chute', 'Chute', '', NULL),
(81, 'azer', 'aezrazerazer', '', NULL),
(82, 'azer', 'razerazerazer', '', 21),
(84, 'True', '', '', 23);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `message` varchar(500) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `pseudo`, `message`, `from_id`, `to_id`) VALUES
(1, 'azeaze', 'azreazerazer', NULL, NULL),
(2, 'aezrazer', 'azerazerazer', NULL, NULL),
(3, 'azeaze', 'aerazer', NULL, NULL),
(4, 'aezrazer', 'azerazerazer', NULL, NULL),
(5, 'azeaze', 'aezrazer', NULL, NULL),
(6, 'aezr', 'azerazer', NULL, NULL),
(7, 'Zalerys', 'NanenfaiteJesuismoche', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `profile_settings`
--

CREATE TABLE `profile_settings` (
  `id_profile` int(11) NOT NULL,
  `inscription_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `lastname` text NOT NULL,
  `phone_number` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil_on`
--

CREATE TABLE `profil_on` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `prenom` text,
  `nom` text,
  `password` varchar(256) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil_on`
--

INSERT INTO `profil_on` (`user_id`, `user_name`, `prenom`, `nom`, `password`, `adresse`, `email`) VALUES
(7, 'Zalerys', 'Gustave', 'Constantinople', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', '175 rue de javel', 'gustaveconstans@gmail.com'),
(8, 'Plus', NULL, NULL, NULL, NULL, 'plusplus@gmail.com'),
(9, 'JeSuisLePlusBeau', 'Gustave', 'Constans', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', NULL, 'zalerys@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `text_img`
--

CREATE TABLE `text_img` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_time_posts` datetime NOT NULL,
  `img_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `text_img`
--

INSERT INTO `text_img` (`id`, `content`, `date_time_posts`, `img_path`) VALUES
(1, 'azerazer', '2022-05-20 13:45:12', './picture/Icone casque.png.png'),
(2, 'MSQL c\'est cool', '2022-05-20 15:48:04', ''),
(3, 'Autre MEssage', '2022-05-20 15:48:24', './picture/IconeDegats.png.png'),
(4, 'qdsfsqdf', '2022-05-22 20:34:09', '');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `user_name`, `password`) VALUES
(18, 'testtest@hotmail.fr', 'raph', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(19, 'testest@hotmail.fr', 'Raphael', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(20, 'test@hotmail.fr', 'Idris', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(21, 'gustaveconstans@gmail.com', 'Zalerys', '64d5f011d06422fa0f9a665f4537752ec7e3735597d62a0b6e97ce9f538d28b7'),
(23, 'zalerys@gmail.com', 'Beau', '64d5f011d06422fa0f9a665f4537752ec7e3735597d62a0b6e97ce9f538d28b7');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `authentification`
--
ALTER TABLE `authentification`
  ADD PRIMARY KEY (`id_authent`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`);

--
-- Index pour la table `grouppage`
--
ALTER TABLE `grouppage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_id` (`from_id`),
  ADD KEY `to_id` (`to_id`);

--
-- Index pour la table `profile_settings`
--
ALTER TABLE `profile_settings`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `Rel Profil-Id` (`inscription_id`);

--
-- Index pour la table `profil_on`
--
ALTER TABLE `profil_on`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `pseudo` (`user_name`);

--
-- Index pour la table `text_img`
--
ALTER TABLE `text_img`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `authentification`
--
ALTER TABLE `authentification`
  MODIFY `id_authent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `grouppage`
--
ALTER TABLE `grouppage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `profile_settings`
--
ALTER TABLE `profile_settings`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profil_on`
--
ALTER TABLE `profil_on`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `text_img`
--
ALTER TABLE `text_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `grouppage`
--
ALTER TABLE `grouppage`
  ADD CONSTRAINT `grouppage_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`from_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`to_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `profile_settings`
--
ALTER TABLE `profile_settings`
  ADD CONSTRAINT `Rel Profil-Id` FOREIGN KEY (`inscription_id`) REFERENCES `inscription` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
