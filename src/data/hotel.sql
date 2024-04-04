-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 avr. 2024 à 13:59
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotel`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int NOT NULL AUTO_INCREMENT,
  `rue` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ville` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cp` smallint NOT NULL,
  `numero` int NOT NULL,
  PRIMARY KEY (`id_adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `rue`, `ville`, `cp`, `numero`) VALUES
(1, 'Batcave Street', 'Gotham', 12345, 1),
(2, 'Rue des Cathédrales', 'Paris', 32767, 10),
(3, 'Big Kids Avenue', 'Toyland', 32767, 20),
(4, 'Treehouse Lane', 'Greenwood', 32767, 30),
(5, 'Abyss Street', 'Atlantis', 32767, 40),
(6, 'Cliffside Drive', 'Vertigo', 13579, 50),
(7, 'Space Boulevard', 'Galaxy', 24680, 60),
(8, 'Volcano Road', 'Magma', 32767, 70),
(9, 'Iceberg Avenue', 'Glacier', 32767, 80),
(10, 'Cloud Street', 'Skytopia', 12346, 90);

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `id_chambre` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_chambre`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`id_chambre`, `nom`, `description`, `photo`, `prix`) VALUES
(1, 'Chambre de la Batcave', 'Chambre inspirée par la Batcave de Batman', 'assets/img/chambres/b2.jpg', 150.00),
(2, 'Chambre de la Cathédrale', 'Chambre offrant une vue imprenable sur les toits de Paris', 'assets/img/chambres/c2.jpg', 200.00),
(3, 'Chambre Big Kids', 'Une chambre spacieuse remplie de jouets pour les enfants', NULL, 100.00),
(4, 'Chambre dans un arbre', 'Chambre perchée dans les branches d\'un arbre géant', 'assets/img/chambres/a1.jpg', 180.00),
(5, 'Chambre sous-marine', 'Chambre avec vue sur les merveilles de l\'océan', 'assets/img/chambres/o1.jpg', 250.00),
(6, 'Chambre Cliffside', 'Chambre offrant des panoramas spectaculaires sur la falaise', 'assets/img/chambres/f1.jpg', 220.00),
(7, 'Chambre spatiale', 'Chambre futuriste flottant dans l\'espace', 'assets/img/chambres/e1.jpg', 300.00),
(8, 'Chambre volcanique', 'Chambre avec vue sur le paysage volcanique', 'assets/img/chambres/l1.jpg', 190.00),
(9, 'Chambre de glace', 'Chambre offrant une expérience glacée dans un iceberg', 'assets/img/chambres/i1.jpg', 170.00),
(10, 'Chambre céleste', 'Chambre magique perchée sur un nuage', 'assets/img/chambres/n1.jpg', 230.00),
(11, 'Chambre de la Batcave Deluxe', 'Chambre luxueuse avec équipements high-tech inspirés par Batman', 'assets/img/chambres/b1.jpg', 180.00),
(12, 'Chambre Renaissance', 'Chambre décorée dans un style Renaissance avec des touches artistiques', 'assets/img/chambres/c1.jpg', 220.00),
(13, 'Chambre Jungle', 'Chambre avec une décoration inspirée de la jungle luxuriante', NULL, 120.00),
(14, 'Chambre Nautique', 'Chambre avec un thème nautique et une vue sur l\'océan', 'assets/img/chambres/a2.jpg', 200.00),
(15, 'Chambre Panoramique', 'Chambre offrant une vue panoramique sur la ville', 'assets/img/chambres/o2.jpg', 250.00),
(16, 'Chambre Extraterrestre', 'Chambre avec un design extraterrestre et des lumières fluorescentes', 'assets/img/chambres/f2.jpg', 280.00),
(17, 'Chambre Lave', 'Chambre avec un décor ressemblant à de la lave en fusion', 'assets/img/chambres/e2.jpg', 190.00),
(18, 'Chambre de Cristal', 'Chambre avec des éléments de cristal et une ambiance étincelante', 'assets/img/chambres/l2.jpg', 210.00),
(19, 'Chambre Igloo', 'Chambre confortable avec un design intérieur semblable à un igloo', 'assets/img/chambres/i2.jpg', 150.00),
(20, 'Chambre Arc-en-ciel', 'Chambre colorée avec un thème arc-en-ciel', 'assets/img/chambres/n2.jpg', 180.00);

-- --------------------------------------------------------

--
-- Structure de la table `chambre_hotel`
--

DROP TABLE IF EXISTS `chambre_hotel`;
CREATE TABLE IF NOT EXISTS `chambre_hotel` (
  `id_hotel` int NOT NULL,
  `id_chambre` int NOT NULL,
  PRIMARY KEY (`id_hotel`,`id_chambre`),
  KEY `id_chambre` (`id_chambre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `chambre_hotel`
--

INSERT INTO `chambre_hotel` (`id_hotel`, `id_chambre`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(1, 11),
(2, 12),
(3, 13),
(4, 14),
(5, 15),
(6, 16),
(7, 17),
(8, 18),
(9, 19),
(10, 20);

-- --------------------------------------------------------

--
-- Structure de la table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id_hotel` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description_full` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `id_adresse` int NOT NULL,
  PRIMARY KEY (`id_hotel`),
  UNIQUE KEY `id_adresse` (`id_adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nom`, `photo`, `description`, `description_full`, `id_adresse`) VALUES
(1, 'Hôtel Batcave', 'assets/img/h10.jfif', 'Hôtel inspiré de la Batcave de Batman', 'Un hôtel secret niché dans les profondeurs de Gotham City, inspiré de la Batcave légendaire de Batman.', 1),
(2, 'Hôtel Cathédrale', 'assets/img/h9.jfif', 'Hôtel majestueux à Paris', 'Un hôtel majestueux situé au cœur de Paris, rappelant la grandeur et la beauté des cathédrales gothiques.', 2),
(3, 'Hôtel Big Kids', 'assets/img/h8.jfif', 'Hôtel pour les enfants', 'Un paradis pour les enfants avec des chambres immenses remplies de jouets et de merveilles.', 3),
(4, 'Hôtel Treehouse', 'assets/img/h7.jfif', 'Hôtel perché dans les arbres', 'Un refuge paisible perché dans les branches d\'un arbre géant, offrant une expérience unique en pleine nature.', 4),
(5, 'Hôtel Subaquatique', 'assets/img/h2.jfif', 'Hôtel sous-marin de luxe', 'Un hôtel luxueux immergé dans les profondeurs de l\'océan, offrant une vue spectaculaire sur la vie marine.', 5),
(6, 'Hôtel Cliffside', 'assets/img/h1.jfif', 'Hôtel sur une falaise', 'Un hôtel perché au sommet d\'une falaise vertigineuse, offrant des panoramas à couper le souffle sur l\'horizon.', 6),
(7, 'Hôtel Spatiale', 'assets/img/h3.jfif', 'Hôtel futuriste dans l\'espace', 'Un hôtel futuriste flottant dans l\'espace, offrant une expérience interstellaire inoubliable.', 7),
(8, 'Hôtel Volcanique', 'assets/img/h4.jfif', 'Hôtel au cœur d\'un volcan', 'Un hôtel audacieux construit au cœur d\'un volcan actif, offrant des vues à couper le souffle sur le paysage volcanique.', 8),
(9, 'Hôtel Iceberg', 'assets/img/h5.jfif', 'Hôtel isolé dans un iceberg', 'Un hôtel isolé niché au cœur d\'un iceberg, offrant une retraite glacée dans un paysage polaire spectaculaire.', 9),
(10, 'Hôtel Céleste', 'assets/img/h6.jfif', 'Hôtel sur un nuage', 'Un hôtel enchanté perché sur un nuage moelleux, offrant des vues célestes et une atmosphère magique.', 10);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `date_de_demande` date NOT NULL,
  `prix_total` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  `id_chambre` int NOT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_chambre` (`id_chambre`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `date_start`, `date_end`, `date_de_demande`, `prix_total`, `id_utilisateur`, `id_chambre`) VALUES
(17, '2024-04-04', '2024-04-07', '2024-04-04', 540, 1, 11),
(21, '2024-04-10', '2024-04-12', '2024-04-04', 360, 1, 11);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `Nom`, `prenom`, `mail`, `password`) VALUES
(1, 'Thomé', 'Maxime', 'thomemaximepro@gmail.com', '$2y$10$/rSxSaeuszMz6LOjSlqgQOOdne4mmZl1CvV0u3d4dFZMcYa7lch76'),
(2, 'Thomé', 'Maxime', 'zaazd@zefzef.fr', '$2y$10$g9HBPchY2ZQ77tjQW714bevOkM/ESnVXWmp02sPI9TgQIwm5XgJxO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
