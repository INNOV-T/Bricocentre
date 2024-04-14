-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 14 avr. 2024 à 21:34
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bricocentre`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(255) NOT NULL,
  `NomComplet` varchar(100) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `typeCompte` varchar(50) NOT NULL,
  `NIF` int(100) DEFAULT NULL,
  `STAT` int(100) DEFAULT NULL,
  `CIF` varchar(100) DEFAULT NULL,
  `RCS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `NomComplet`, `adresse`, `phone`, `typeCompte`, `NIF`, `STAT`, `CIF`, `RCS`) VALUES
(1, 'Mario Randrianarison', 'andrainjato', '+261 34 56 731 ', 'Entreprise', 2147483647, 2147483647, '0210212021HUI', '032132313B002'),
(2, 'FITAHIANJANAHARY Christina', 'Talatamaty Lot 2345/0B', '+261345673148', 'Client simple', NULL, NULL, NULL, NULL),
(3, 'judicael', 'Sahambavy lot 2237B/A1', '034 29 331 68', 'Client simple', NULL, NULL, NULL, NULL),
(4, 'Randrianarison', 'Behenjy lot 2267B/11', '034 78 259 33', 'Client simple', NULL, NULL, NULL, NULL),
(5, 'ANDRY NIRINA', 'andrainjato', '034 29 331 68', 'Entreprise', 2147483647, 2147483647, '0210212021HUI', '032132313B002');

-- --------------------------------------------------------

--
-- Structure de la table `commande_courant`
--

CREATE TABLE `commande_courant` (
  `idCom_courant` int(100) NOT NULL,
  `id` int(100) NOT NULL,
  `idClient` int(100) NOT NULL,
  `quantite` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `idFournisseur` int(100) NOT NULL,
  `NomFournisseur` varchar(100) NOT NULL,
  `NIF` varchar(50) DEFAULT NULL,
  `STAT` varchar(50) DEFAULT NULL,
  `Adresse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`idFournisseur`, `NomFournisseur`, `NIF`, `STAT`, `Adresse`) VALUES
(3, 'BRICOMA', '2102154812412', '1221154124561215454', 'Ankadivato Antananarivo'),
(5, 'SANIFER', '4111541451541584', '145115154515', 'Behenjy lot 2267B/11'),
(6, 'TAMATAVE BUINESS', '11213211212312', '111212111', 'Antanambao Sud Lot 12221T');

-- --------------------------------------------------------

--
-- Structure de la table `pannier`
--

CREATE TABLE `pannier` (
  `idPa` int(100) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(255) NOT NULL,
  `NomProduit` varchar(100) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `PrixU` float NOT NULL,
  `references` varchar(100) NOT NULL,
  `idFournisseur` int(100) DEFAULT NULL,
  `stock_initiale` int(100) NOT NULL,
  `prixVente` float NOT NULL,
  `prixGros` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `NomProduit`, `Designation`, `PrixU`, `references`, `idFournisseur`, `stock_initiale`, `prixVente`, `prixGros`) VALUES
(9, 'Cement Mafonja', 'Mafonja 0015', 20000, '0210012012', 5, 50, 40000, 30000),
(10, 'Carreaux', 'Careaux Whit', 50000, '023120234014', 3, 200, 60000, 55000),
(11, 'Fer6', 'Fer', 5000, '45455454544', 5, 12, 12000, 10000),
(12, 'CADENAS', 'CAD', 1000, '554242242', 6, 200, 1500, 1200);

-- --------------------------------------------------------

--
-- Structure de la table `tout_commande`
--

CREATE TABLE `tout_commande` (
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user_demande`
--

CREATE TABLE `user_demande` (
  `id` int(100) NOT NULL,
  `NomComplet` varchar(100) NOT NULL,
  `typeCompte` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_demande`
--

INSERT INTO `user_demande` (`id`, `NomComplet`, `typeCompte`, `email`, `pwd`) VALUES
(10, 'Marius RANDRIANARISON', 'Mangasinier', 'marius@gmail.com', 'passroot'),
(11, 'RANDRIANARISON', 'Mangasinier', 'test@gmail', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `user_valide`
--

CREATE TABLE `user_valide` (
  `id` int(11) NOT NULL,
  `NomComplet` varchar(100) NOT NULL,
  `typeCompte` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `commande_courant`
--
ALTER TABLE `commande_courant`
  ADD PRIMARY KEY (`idCom_courant`),
  ADD KEY `id` (`id`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`idFournisseur`);

--
-- Index pour la table `pannier`
--
ALTER TABLE `pannier`
  ADD PRIMARY KEY (`idPa`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFournisseur` (`idFournisseur`);

--
-- Index pour la table `tout_commande`
--
ALTER TABLE `tout_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_demande`
--
ALTER TABLE `user_demande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_valide`
--
ALTER TABLE `user_valide`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande_courant`
--
ALTER TABLE `commande_courant`
  MODIFY `idCom_courant` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `idFournisseur` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `pannier`
--
ALTER TABLE `pannier`
  MODIFY `idPa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `tout_commande`
--
ALTER TABLE `tout_commande`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user_demande`
--
ALTER TABLE `user_demande`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user_valide`
--
ALTER TABLE `user_valide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande_courant`
--
ALTER TABLE `commande_courant`
  ADD CONSTRAINT `commande_courant_ibfk_1` FOREIGN KEY (`id`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `commande_courant_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `pannier`
--
ALTER TABLE `pannier`
  ADD CONSTRAINT `pannier_ibfk_1` FOREIGN KEY (`id`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idFournisseur`) REFERENCES `fournisseur` (`idFournisseur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
