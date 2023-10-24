-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 24 oct. 2023 à 14:51
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `SecureLog`
--

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `identifiant` varchar(40) NOT NULL,
  `mdp` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id`, `nom`, `prenom`, `identifiant`, `mdp`) VALUES
(1, 'CHABOT', 'Patrice', 'patrice@gmail.com', '0cc61c87918ff35580cf5fc816c338b1de104dc0072bf009d932500700f07cb4'),
(2, 'OUKACI', 'Cantin', 'cantin@gmail.com', '88e586bab89ddff842b77b06da49bc1b7b9adb1f05034a19a91834d93b1a129d'),
(3, 'POUCHARD', 'Emile', 'Emille@gmail.com', '0f3bd67dd4bfd1613505d34776ff79ea8334e073ad021e59dae366679375b395'),
(4, 'GERARD', 'Gabriel', 'gerard@gmail.com', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9'),
(12, 'Test', 'TesT', 'Test@gmail.com', '532eaabd9574880dbf76b9b8cc00832c20a6ec113d682299550d7a6e0f345e25');

--
-- Déclencheurs `Users`
--
DELIMITER $$
CREATE TRIGGER `verif_identifiant` BEFORE INSERT ON `Users` FOR EACH ROW BEGIN
    DECLARE
        exist INT DEFAULT 0;
    SELECT
        COUNT(*)
    INTO exist
FROM
    Users
WHERE
    identifiant = NEW.identifiant; IF exist > 0 THEN SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT
    = 'Cet identifiant existe déjà';
END IF;
END
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
