-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 03, 2018 at 03:59 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vetoBoutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `dateCommande` datetime NOT NULL,
  `dateLivraison` date NOT NULL,
  `panier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `nom_employe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_employe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail_employe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_employe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cp_employe` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ville_employe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaiss_employe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numSecu` int(15) NOT NULL,
  `fonction` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Employé',
  `salaire` double NOT NULL DEFAULT '1300',
  `superieur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` int(11) NOT NULL,
  `nom_fournisseur` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_fournisseur` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mail_fournisseur` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_fournisseur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cp_fournisseur` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ville_fournisseur` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dateNaiss_fournisseur` date DEFAULT NULL,
  `codeComptable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom_fournisseur`, `prenom_fournisseur`, `mail_fournisseur`, `adresse_fournisseur`, `cp_fournisseur`, `ville_fournisseur`, `dateNaiss_fournisseur`, `codeComptable`) VALUES
(2, 'Merial', NULL, 'merial@gmail.com', '29 avenue Tony Garnier', '69007', 'Lyon', NULL, 4093),
(3, 'Animalis', NULL, 'animalis@gmail.com', '1890 chemin des Terriers', '06600', 'Antibes', NULL, 4094),
(4, 'Morin France', NULL, 'morin@gmail.com', '9 route de Marcoussis', '91310', 'Montlhéry', NULL, 4095),
(5, 'Vétoquinol', NULL, 'vetoquinol@gmail.com', 'BP 5', '70200', 'Magny-Vernois', NULL, 4096),
(6, 'Ceva', NULL, 'ceva@gmail.com', '10 avenue de la Ballastière', '33500', 'Libourne', NULL, 4097);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom_produit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categorie` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descr_produit` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom_produit`, `categorie`, `descr_produit`, `image`, `prix`, `stock`) VALUES
(1, 'Frontline-combo', 'médicament', 'antiparasitaire', 'medoc1.jpg', 15, 10),
(2, 'Zylkène', 'médicament', 'tranquillisant', 'medoc2.jpg', 7, 10),
(3, 'Adaptil', 'médicament', 'tranquillisant', 'medoc3.jpg', 8, 10),
(4, 'Croquettes adulte 1-6 paquet 2.5 kg', 'alimentation', 'croquettes chat', 'alim1.jpg', 25, 10),
(5, 'Croquettes sensitive stomach and skin 1+ paquet 2.5 kg', 'alimentation', 'croquettes chien', 'alim2.jpg', 29, 10),
(6, 'Croquettes adulte 1-6 paquet 10 kg', 'alimentation', 'croquettes chien', 'alim3.jpg', 45, 10),
(7, 'Crocodile caoutchouc', 'jouet', 'jouet pour chien', 'jouet1.jpg', 6, 10),
(8, 'Cochons en corde', 'jouet', 'jouet pour chat', 'jouet2.jpeg', 5, 10),
(9, 'Singe en tissu', 'jouet', 'jouet pour chien', 'jouet3.jpeg', 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `produits_fournisseurs`
--

CREATE TABLE `produits_fournisseurs` (
  `id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `produits_fournisseurs`
--

INSERT INTO `produits_fournisseurs` (`id`, `produit_id`, `fournisseur_id`, `quantite`) VALUES
(1, 1, 2, 10),
(2, 2, 5, 10),
(3, 3, 6, 10),
(4, 4, 3, 10),
(5, 5, 3, 10),
(6, 6, 3, 10),
(7, 7, 4, 10),
(8, 8, 4, 10),
(9, 9, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_last` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_first` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_pc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_createDate` datetime NOT NULL,
  `user_pwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_last`, `user_first`, `user_email`, `user_address`, `user_pc`, `user_city`, `user_createDate`, `user_pwd`) VALUES
(1, 'Baron', 'Valérie', 'valerie.baron67@gmail.com', '312 boulevard des écureuils', '06210', 'Mandelieu', '2018-08-01 00:00:00', 'gribouille'),
(8, 'Delcros', 'Alexis', 'ale.delcros1142@gmail.com', '312 Boulevard des écureuils', '06210', 'Mandelieu la Napoule', '2018-08-02 14:06:55', '$2y$10$f7enu9Dr0wzTewgMDqofhewfuPrNviLiGB7lktRArZpnWa3HR1aJq'),
(9, 'Delcros', 'Alexis', 'ale.delcros1142@gmail.com', '312 Boulevard des écureuils', '06210', 'Mandelieu la Napoule', '2018-08-02 14:09:18', '$2y$10$BZ3ev8Qj8tPdmdcQQh0DL.8Wef3vC6U096pIB3JmjaEuiYh.Ra4/C'),
(10, 'Delcros', 'Alexis', 'ale.delcros1142@gmail.com', '312 Boulevard des écureuils', '06210', 'Mandelieu la Napoule', '2018-08-02 14:10:08', '$2y$10$Eywx7hDNlGHBkjFMqkdLQOLu.gLGDkc.7.nNvEgQA3Zla/Lgds6ia');

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE `users_session` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `hash` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `panier_id` (`panier_id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `produit_id` (`produit_id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produits_fournisseurs`
--
ALTER TABLE `produits_fournisseurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produit_id` (`produit_id`),
  ADD KEY `fournisseur_id` (`fournisseur_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produits_fournisseurs`
--
ALTER TABLE `produits_fournisseurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`panier_id`) REFERENCES `panier` (`id`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `panier_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Constraints for table `produits_fournisseurs`
--
ALTER TABLE `produits_fournisseurs`
  ADD CONSTRAINT `produits_fournisseurs_ibfk_1` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `produits_fournisseurs_ibfk_2` FOREIGN KEY (`fournisseur_id`) REFERENCES `fournisseur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
