-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 02 Mai 2016 à 14:36
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `samacarnet`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(245) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conseils`
--

CREATE TABLE `conseils` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `titre` varchar(245) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `id` int(11) NOT NULL,
  `femme_id` int(11) DEFAULT NULL,
  `taille` double DEFAULT NULL,
  `poids` double DEFAULT NULL,
  `albumine` double DEFAULT NULL,
  `sucre` double DEFAULT NULL,
  `pressionArterielle` double DEFAULT NULL,
  `hauteurUterine` double DEFAULT NULL,
  `tauxHemoglobine` double DEFAULT NULL,
  `observations` longtext COLLATE utf8_unicode_ci,
  `rendezvous` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `examen`
--

INSERT INTO `examen` (`id`, `femme_id`, `taille`, `poids`, `albumine`, `sucre`, `pressionArterielle`, `hauteurUterine`, `tauxHemoglobine`, `observations`, `rendezvous`) VALUES
(1, 3, 1, 1, 1, 1, 1, 1, 1, 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem', '2016-04-05 09:17:16'),
(2, 2, 2, 2, 2, 2, 2, 2, 2, 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem', '2011-01-20 11:25:00'),
(5, 4, 1, 1, 1, 1, 1, 1, 1, 'lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem lorem', '2016-04-11 08:30:00');

-- --------------------------------------------------------

--
-- Structure de la table `femme`
--

CREATE TABLE `femme` (
  `id` int(11) NOT NULL,
  `prenom` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nom` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(245) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ville` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Pays` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `nombreEnfants` int(11) DEFAULT NULL,
  `etatGrossesse` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `telephone_mari` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `femme`
--

INSERT INTO `femme` (`id`, `prenom`, `nom`, `email`, `adresse`, `ville`, `Pays`, `telephone`, `age`, `nombreEnfants`, `etatGrossesse`, `status`, `user_id`, `telephone_mari`) VALUES
(2, 'Dalanda', 'Sow', 'dalanda@dalanda.com', 'Sénégal Thiès Cayar Océan Bleu', 'Thies', 'Senegal', 773343432, 23, 1, 1, 1, 1, NULL),
(3, 'Ndeye Aida', 'Gueye', 'dada@gmail.com', 'Toubab Dialao', 'Thiès', 'Sénégal', 775468549, 23, 0, 1, 1, 2, 775648525),
(4, 'Dalanda', 'Sow', 'dalanda@dalanda.com', 'Nord Foire', 'Dakar', 'Sénégal', 779056773, 24, 0, 2, 1, 2, 778954682),
(5, 'Ndeye Penda', 'Ndiaye', 'ndeyependa@gmail.com', 'Grand Standing', 'Thiès', 'Sénégal', 773343432, 21, 0, 37, 0, 2, 773343432),
(6, 'Fatim', 'Cissé', 'fatim@gmail.com', 'Thies grand thies villa n°37', 'Thiès', 'Sénégal', 774219916, 25, 1, 3, 1, 2, 774219916);

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL,
  `structure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fonction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `firstname`, `lastname`, `address`, `telephone`, `structure`, `fonction`, `website`) VALUES
(1, 'seny', 'seny', 'senyr9@gmail.com', 'senyr9@gmail.com', 1, 'nxrbfpd41k0k8ws088wgks8g8css8k8', '$2y$13$nxrbfpd41k0k8ws088wgkeTg7YqkCsiXkV6xkk5xYLz87oaQ36eWO', '2016-04-24 03:13:02', 0, 0, NULL, NULL, NULL, 'a:2:{i:0;s:16:"ROLE_SUPER_ADMIN";i:1;s:10:"ROLE_ADMIN";}', 0, NULL, '', '', '', 0, '', '', ''),
(2, 'admin', 'admin', 'admin@admin.com', 'admin@admin.com', 1, 'fssy7tx8t20co8sk0og48ko4gc4840s', '$2y$13$fssy7tx8t20co8sk0og48eCNrlkvapT9LK.yB0Oh0jdsSq6fIa.P.', '2016-04-24 16:51:43', 0, 0, NULL, NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 0, NULL, 'Karim', 'Ba', 'Keur Massar', 772232425, 'Hopital Fann', 'Gynécologue', 'www.hopital-fann.com');

-- --------------------------------------------------------

--
-- Structure de la table `sos`
--

CREATE TABLE `sos` (
  `id` int(11) NOT NULL,
  `structure` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conseils`
--
ALTER TABLE `conseils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_818E43BBA21214B7` (`categories_id`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_514C8FECEA18A17C` (`femme_id`);

--
-- Index pour la table `femme`
--
ALTER TABLE `femme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_712CAA8FA76ED395` (`user_id`);

--
-- Index pour la table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`);

--
-- Index pour la table `sos`
--
ALTER TABLE `sos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `conseils`
--
ALTER TABLE `conseils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `femme`
--
ALTER TABLE `femme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `sos`
--
ALTER TABLE `sos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `conseils`
--
ALTER TABLE `conseils`
  ADD CONSTRAINT `FK_818E43BBA21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `FK_514C8FECEA18A17C` FOREIGN KEY (`femme_id`) REFERENCES `femme` (`id`);

--
-- Contraintes pour la table `femme`
--
ALTER TABLE `femme`
  ADD CONSTRAINT `FK_712CAA8FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
