-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 29 avr. 2024 à 21:07
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blogg`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `author`, `createdAt`) VALUES
(1, 'Voici mon premier article', 'Mon super blog est en construction.', 'Lia', '2019-03-15 08:10:24'),
(2, 'Un deuxième article', 'Je continue à ajouter du contenu sur mon blog.', 'Lia', '2019-03-16 13:27:38'),
(3, 'Mon troisième article', 'Mon blog est génial !!!', 'Lia', '2019-03-16 14:45:57');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `article_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `pseudo`, `content`, `createdAt`, `article_id`) VALUES
(1, 'Jean', 'Génial, hâte de voir ce que ça donne !', '2022-03-16 21:02:24', 1),
(2, 'Nina', 'Trop cool ! depuis le temps', '2023-03-17 17:34:35', 1),
(3, 'Rodrigo', 'Great ! ', '2022-03-17 17:42:04', 1),
(4, 'Hélène', 'je suis heureuse de découvrir un super site ! Continuez comme ça ', '2022-03-18 12:08:37', 2),
(5, 'Moussa', 'Un peu déçu par le contenu pour le moment...', '2023-03-18 03:09:02', 2),
(6, 'Barbara', 'pressée de voir la suite', '2023-03-18 10:05:58', 2),
(7, 'Guillaume', 'Je viens ici pour troller !', '2022-03-19 21:08:44', 3),
(8, 'Aurore', 'Enfin un blog tranquille, où on ne nous casse pas les pieds !', '2022-03-19 21:09:27', 3),
(9, 'Jordane', 'Je suis vendéen ! Amateur de mojettes !', '2022-03-20 10:10:11', 3),
(11, 'Titou', 'Super !! Trop hâte !    ', '2024-03-26 14:18:43', 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_article_id` (`article_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1321;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
