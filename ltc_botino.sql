-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 30 jan. 2018 à 11:43
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ltc_botino`
--

-- --------------------------------------------------------

--
-- Structure de la table `adress`
--

CREATE TABLE `adress` (
  `id` int(8) NOT NULL,
  `adress1` varchar(30) NOT NULL,
  `adress2` varchar(30) NOT NULL,
  `lieu_dit` varchar(30) NOT NULL,
  `cp` int(5) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `cellphone1` varchar(15) NOT NULL,
  `cellphone2` varchar(15) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `site_web` varchar(50) NOT NULL,
  `artisan_adress_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `appel_telephonique`
--

CREATE TABLE `appel_telephonique` (
  `id` int(8) NOT NULL,
  `date` date NOT NULL,
  `motif` varchar(50) NOT NULL,
  `code_confirmation` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `artisan`
--

CREATE TABLE `artisan` (
  `id` int(5) NOT NULL,
  `denomination` varchar(30) NOT NULL,
  `nom_gerant` varchar(30) NOT NULL,
  `prenom_gerant` varchar(30) NOT NULL,
  `artisan_adress_id` int(5) NOT NULL,
  `statut` varchar(30) NOT NULL,
  `siren` int(15) NOT NULL,
  `code_activite` int(7) NOT NULL,
  `libelle_activite` varchar(50) NOT NULL,
  `forme_juridique` varchar(30) NOT NULL,
  `date_immatriculation` date NOT NULL,
  `date_derniere_rcs` date NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `montant_actif_passif` decimal(9,0) NOT NULL,
  `chiffres_affaires` decimal(9,0) NOT NULL,
  `tranche_effectif` int(5) NOT NULL,
  `pres_bilan` tinyint(4) NOT NULL,
  `pres_ca` tinyint(4) NOT NULL,
  `pres_attestation_immat` tinyint(4) NOT NULL,
  `pres_kbis` tinyint(4) NOT NULL,
  `pres_services_fiscaux` tinyint(4) NOT NULL,
  `pers_attestation_clandestin` tinyint(4) NOT NULL,
  `pres_attestation_decl_social` tinyint(4) NOT NULL,
  `pres_attestation_assurance` tinyint(4) NOT NULL,
  `pres_rib` tinyint(4) NOT NULL,
  `artisan_appel_telephone_artisan_id` int(8) DEFAULT NULL,
  `artisan_appel_telephone_appel-tel_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `artisan_adress`
--

CREATE TABLE `artisan_adress` (
  `id` int(5) NOT NULL,
  `adress_id` int(5) NOT NULL,
  `artisan_id` int(5) NOT NULL,
  `artisan_id1` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `artisan_appel_telephone`
--

CREATE TABLE `artisan_appel_telephone` (
  `artisan_id` int(8) NOT NULL,
  `appel-tel_id` int(8) NOT NULL,
  `appel_telephonique_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

CREATE TABLE `assurance` (
  `id` int(8) NOT NULL,
  `type_assurance_id` int(3) NOT NULL,
  `prestataire_id` int(8) NOT NULL,
  `type_travaux_id` int(3) NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  `scan_assurance` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `compose-devis`
--

CREATE TABLE `compose-devis` (
  `devis_id` int(11) NOT NULL,
  `demande_id` int(11) NOT NULL,
  `devis_id1` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id` int(8) NOT NULL,
  `owner_id` int(5) NOT NULL,
  `housing_id` int(5) NOT NULL,
  `num_dossier_arrivee` int(8) NOT NULL,
  `date_arrivee` date NOT NULL,
  `montant_aide_dept` decimal(7,0) NOT NULL,
  `montant_devis` decimal(7,0) NOT NULL,
  `num_dossier_valide` int(8) NOT NULL,
  `owners_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `detail_devis_valide`
--

CREATE TABLE `detail_devis_valide` (
  `id` int(8) NOT NULL,
  `devis_id` int(8) NOT NULL,
  `ligne_detail_devis_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `detail_tournee`
--

CREATE TABLE `detail_tournee` (
  `id` int(8) NOT NULL,
  `owner_id` int(8) NOT NULL,
  `adress_id` int(8) NOT NULL,
  `present` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `id` int(7) NOT NULL,
  `prestataire_id` int(5) NOT NULL,
  `demande_id` int(8) NOT NULL,
  `montant` int(11) NOT NULL,
  `type_travaux_id` int(11) NOT NULL,
  `date_devis` date NOT NULL,
  `devis_valide` tinyint(4) NOT NULL,
  `type_travaux_id1` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `iddroit` int(11) NOT NULL,
  `menu` varchar(32) NOT NULL,
  `voir` int(11) NOT NULL DEFAULT '0',
  `creer` int(11) NOT NULL DEFAULT '0',
  `modifier` int(11) NOT NULL DEFAULT '0',
  `supprimer` int(11) NOT NULL DEFAULT '0',
  `idgroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `echanges`
--

CREATE TABLE `echanges` (
  `id` int(8) NOT NULL,
  `type_echange_id` int(2) NOT NULL,
  `date` date NOT NULL,
  `motif` varchar(50) NOT NULL,
  `code_confirmation` int(5) NOT NULL,
  `owner_echanges_owner_id` int(7) DEFAULT NULL,
  `owner_echanges_echange_id` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `echeancier`
--

CREATE TABLE `echeancier` (
  `id` int(8) NOT NULL,
  `nom_echeancier` varchar(75) NOT NULL,
  `pourcent` int(2) NOT NULL,
  `paiement_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `entity`
--

CREATE TABLE `entity` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `rights_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

CREATE TABLE `group` (
  `idgrp` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `user_has_group_user_id` int(5) DEFAULT NULL,
  `user_has_group_group_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `group`
--

INSERT INTO `group` (`idgrp`, `name`, `user_has_group_user_id`, `user_has_group_group_id`) VALUES
(4, 'Administateur', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `housing`
--

CREATE TABLE `housing` (
  `id` int(7) NOT NULL,
  `type_housing` int(3) NOT NULL,
  `owner_id` int(5) NOT NULL,
  `log_proprietaire` tinyint(1) NOT NULL,
  `log_locataire` tinyint(1) NOT NULL,
  `log_occupant_gratuit` tinyint(1) NOT NULL,
  `foncier_proprietaire` tinyint(1) NOT NULL,
  `foncier_locataire` tinyint(1) NOT NULL,
  `foncier_indivision` tinyint(1) NOT NULL,
  `foncier_occupant_gratuit` tinyint(1) NOT NULL,
  `area` decimal(7,0) NOT NULL,
  `numberpieces` int(2) NOT NULL,
  `numberpersons` int(2) NOT NULL,
  `buildDate` date NOT NULL,
  `beton` tinyint(1) NOT NULL,
  `bois_dulcifie` tinyint(1) NOT NULL,
  `bois` tinyint(1) NOT NULL,
  `tole` tinyint(1) NOT NULL,
  `autres_mat` tinyint(1) NOT NULL,
  `cuisine` tinyint(1) NOT NULL,
  `salle_eau` tinyint(1) NOT NULL,
  `wc` tinyint(1) NOT NULL,
  `eau_potable` tinyint(1) NOT NULL,
  `tout_a_egout` tinyint(1) NOT NULL,
  `fosse_septique` tinyint(1) NOT NULL,
  `placecalledsec` varchar(30) NOT NULL,
  `adress1_sec` varchar(50) NOT NULL,
  `adress2_sec` varchar(30) NOT NULL,
  `postalcode_sec` int(5) NOT NULL,
  `town_sec` varchar(30) NOT NULL,
  `type_housing_id` int(3) DEFAULT NULL,
  `demande_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_detail_devis`
--

CREATE TABLE `ligne_detail_devis` (
  `id` int(10) NOT NULL,
  `dtail_devis_valide_id` int(8) NOT NULL,
  `montant` decimal(12,0) NOT NULL,
  `libelle_ligne` varchar(150) NOT NULL,
  `devis_id` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `link_parents`
--

CREATE TABLE `link_parents` (
  `id` int(5) NOT NULL,
  `name` varchar(15) NOT NULL,
  `parents_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `owner-adress`
--

CREATE TABLE `owner-adress` (
  `id` int(8) NOT NULL,
  `adress-id` int(5) NOT NULL,
  `owner_id` int(5) NOT NULL,
  `owners_id` int(5) DEFAULT NULL,
  `adress_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `owners`
--

CREATE TABLE `owners` (
  `id` int(5) NOT NULL,
  `title` varchar(10) NOT NULL,
  `marriedname` varchar(30) NOT NULL,
  `firstname1` varchar(30) NOT NULL,
  `firstname2` varchar(30) NOT NULL,
  `firstname3` varchar(30) NOT NULL,
  `birthname` varchar(30) NOT NULL,
  `othernameuse` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `familysituation` varchar(3) NOT NULL,
  `owner_adress1_id` int(5) NOT NULL,
  `owner_adress2_id` int(5) NOT NULL,
  `aide_organisme` tinyint(1) NOT NULL,
  `nom_organisme` varchar(25) NOT NULL,
  `montant_aide` decimal(7,0) NOT NULL,
  `type_travaux_finan` varchar(5) NOT NULL,
  `parents_id` int(5) DEFAULT NULL,
  `owner_resources_id` int(7) DEFAULT NULL,
  `owner_appel_telephone_owner_id` int(7) DEFAULT NULL,
  `owner_appel_telephone_appel-tel_id` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `owner_appel_telephone`
--

CREATE TABLE `owner_appel_telephone` (
  `owner_id` int(7) NOT NULL,
  `appel-tel_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `owner_echanges`
--

CREATE TABLE `owner_echanges` (
  `owner_id` int(7) NOT NULL,
  `echange_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `owner_resources`
--

CREATE TABLE `owner_resources` (
  `id` int(7) NOT NULL,
  `owner_id` int(5) NOT NULL,
  `type_resources_id` int(5) NOT NULL,
  `montant` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id` int(8) NOT NULL,
  `echeancier_id` int(8) NOT NULL,
  `travaux_realises_id` int(8) NOT NULL,
  `prestataire_id` int(8) NOT NULL,
  `montant_paiement` decimal(8,0) NOT NULL,
  `date_paiement` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parents`
--

CREATE TABLE `parents` (
  `id` int(5) NOT NULL,
  `owner_id` int(5) NOT NULL,
  `link_parent_id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

CREATE TABLE `prestataire` (
  `id` int(5) NOT NULL,
  `type_prestataire_id` int(5) NOT NULL,
  `denomination` varchar(30) NOT NULL,
  `nom_gerant` varchar(30) NOT NULL,
  `prenom_gerant` varchar(30) NOT NULL,
  `prestataire_adress_id` int(5) NOT NULL,
  `statut` varchar(30) NOT NULL,
  `siren` int(15) NOT NULL,
  `code_activite` int(7) NOT NULL,
  `libelle_activite` varchar(50) NOT NULL,
  `forme_juridique` varchar(30) NOT NULL,
  `date_immatriculation` date NOT NULL,
  `date_derniere_rcs` date NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `montant_actif_passif` decimal(9,0) NOT NULL,
  `chiffres_affaires` decimal(9,0) NOT NULL,
  `tranche_effectif` int(5) NOT NULL,
  `pres_bilan` tinyint(4) NOT NULL,
  `pres_ca` tinyint(4) NOT NULL,
  `pres_attestation_immat` tinyint(4) NOT NULL,
  `pres_kbis` tinyint(4) NOT NULL,
  `pres_services_fiscaux` tinyint(4) NOT NULL,
  `pers_attestation_clandestin` tinyint(4) NOT NULL,
  `pres_attestation_decl_social` tinyint(4) NOT NULL,
  `pres_attestation_assurance` tinyint(4) NOT NULL,
  `pres_rib` tinyint(4) NOT NULL,
  `type_prestataire_id1` int(3) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `resources`
--

CREATE TABLE `resources` (
  `id` int(7) NOT NULL,
  `owner_id` int(5) NOT NULL,
  `parent_id` int(5) NOT NULL,
  `type_resource_id` int(5) NOT NULL,
  `montant` decimal(7,0) NOT NULL,
  `owner_resources_id` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rights`
--

CREATE TABLE `rights` (
  `id` int(5) NOT NULL,
  `group_id` int(3) NOT NULL,
  `entity_id` int(3) NOT NULL,
  `rights_level_id` int(3) NOT NULL,
  `group_id1` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `rights_level`
--

CREATE TABLE `rights_level` (
  `id` int(3) NOT NULL,
  `level` int(2) NOT NULL,
  `rights_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tournee`
--

CREATE TABLE `tournee` (
  `id` int(8) NOT NULL,
  `nom_tournee` varchar(100) NOT NULL,
  `date_tournee` date NOT NULL,
  `detail_tournee_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `travaux`
--

CREATE TABLE `travaux` (
  `id` int(8) NOT NULL,
  `type_travaux_id` int(3) NOT NULL,
  `housing_id` int(7) NOT NULL,
  `housing_id1` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `travaux_realises`
--

CREATE TABLE `travaux_realises` (
  `id` int(8) NOT NULL,
  `travaux_id` int(7) NOT NULL,
  `owner_id` int(5) NOT NULL,
  `artisan_id` int(5) NOT NULL,
  `montant` decimal(7,0) NOT NULL,
  `demande_id` int(5) NOT NULL,
  `date_deb` date NOT NULL,
  `date_fin` date NOT NULL,
  `artisan_id1` int(5) DEFAULT NULL,
  `owners_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_assurance`
--

CREATE TABLE `type_assurance` (
  `id` int(3) NOT NULL,
  `nom` varchar(75) NOT NULL,
  `assurance_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_housing`
--

CREATE TABLE `type_housing` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_prestataire`
--

CREATE TABLE `type_prestataire` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_prestataire_copy2`
--

CREATE TABLE `type_prestataire_copy2` (
  `id` int(11) NOT NULL,
  `nom` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_resources`
--

CREATE TABLE `type_resources` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `resources_id` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_travaux`
--

CREATE TABLE `type_travaux` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `travaux_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idusr` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idusr`, `name`, `firstname`, `password`) VALUES
(2, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `user_has_group`
--

CREATE TABLE `user_has_group` (
  `user_id` int(5) NOT NULL,
  `group_id` int(3) NOT NULL,
  `user_id1` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_has_group`
--

INSERT INTO `user_has_group` (`user_id`, `group_id`, `user_id1`) VALUES
(2, 4, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adress`
--
ALTER TABLE `adress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_adress_artisan_adress1_idx` (`artisan_adress_id`);

--
-- Index pour la table `appel_telephonique`
--
ALTER TABLE `appel_telephonique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `artisan`
--
ALTER TABLE `artisan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_artisan_artisan_appel_telephone1_idx` (`artisan_appel_telephone_artisan_id`,`artisan_appel_telephone_appel-tel_id`);

--
-- Index pour la table `artisan_adress`
--
ALTER TABLE `artisan_adress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_artisan_adress_artisan1_idx` (`artisan_id1`);

--
-- Index pour la table `artisan_appel_telephone`
--
ALTER TABLE `artisan_appel_telephone`
  ADD PRIMARY KEY (`artisan_id`,`appel-tel_id`),
  ADD KEY `fk_artisan_appel_telephone_appel_telephonique1_idx` (`appel_telephonique_id`);

--
-- Index pour la table `assurance`
--
ALTER TABLE `assurance`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compose-devis`
--
ALTER TABLE `compose-devis`
  ADD PRIMARY KEY (`devis_id`,`demande_id`),
  ADD KEY `fk_compose-devis_devis1_idx` (`devis_id1`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_demande_owners1_idx` (`owners_id`);

--
-- Index pour la table `detail_devis_valide`
--
ALTER TABLE `detail_devis_valide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_devis_valide_ligne_detail_devis1_idx` (`ligne_detail_devis_id`);

--
-- Index pour la table `detail_tournee`
--
ALTER TABLE `detail_tournee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `devis`
--
ALTER TABLE `devis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_devis_type_travaux1_idx` (`type_travaux_id1`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD KEY `idgroup` (`idgroup`);

--
-- Index pour la table `echanges`
--
ALTER TABLE `echanges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_echanges_owner_echanges1_idx` (`owner_echanges_owner_id`,`owner_echanges_echange_id`);

--
-- Index pour la table `echeancier`
--
ALTER TABLE `echeancier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_echeancier_paiement1_idx` (`paiement_id`);

--
-- Index pour la table `entity`
--
ALTER TABLE `entity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_entity_rights1_idx` (`rights_id`);

--
-- Index pour la table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`idgrp`),
  ADD KEY `fk_group_user_has_group1_idx` (`user_has_group_user_id`,`user_has_group_group_id`);

--
-- Index pour la table `housing`
--
ALTER TABLE `housing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_housing_type_housing1_idx` (`type_housing_id`),
  ADD KEY `fk_housing_demande1_idx` (`demande_id`);

--
-- Index pour la table `ligne_detail_devis`
--
ALTER TABLE `ligne_detail_devis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ligne_detail_devis_devis1_idx` (`devis_id`);

--
-- Index pour la table `link_parents`
--
ALTER TABLE `link_parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_link_parents_parents1_idx` (`parents_id`);

--
-- Index pour la table `owner-adress`
--
ALTER TABLE `owner-adress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_owner-adress_owners1_idx` (`owners_id`),
  ADD KEY `fk_owner-adress_adress1_idx` (`adress_id`);

--
-- Index pour la table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `fk_owners_parents_idx` (`parents_id`),
  ADD KEY `fk_owners_owner_resources1_idx` (`owner_resources_id`),
  ADD KEY `fk_owners_owner_appel_telephone1_idx` (`owner_appel_telephone_owner_id`,`owner_appel_telephone_appel-tel_id`);

--
-- Index pour la table `owner_appel_telephone`
--
ALTER TABLE `owner_appel_telephone`
  ADD PRIMARY KEY (`owner_id`,`appel-tel_id`);

--
-- Index pour la table `owner_echanges`
--
ALTER TABLE `owner_echanges`
  ADD PRIMARY KEY (`owner_id`,`echange_id`);

--
-- Index pour la table `owner_resources`
--
ALTER TABLE `owner_resources`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prestataire_type_prestataire_idx` (`type_prestataire_id1`),
  ADD KEY `fk_prestataire_user1_idx` (`user_id`);

--
-- Index pour la table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resources_owner_resources1_idx` (`owner_resources_id`);

--
-- Index pour la table `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rights_group1_idx` (`group_id1`);

--
-- Index pour la table `rights_level`
--
ALTER TABLE `rights_level`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rights_level_rights1_idx` (`rights_id`);

--
-- Index pour la table `tournee`
--
ALTER TABLE `tournee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tournee_detail_tournee1_idx` (`detail_tournee_id`);

--
-- Index pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_travaux_housing1_idx` (`housing_id1`);

--
-- Index pour la table `travaux_realises`
--
ALTER TABLE `travaux_realises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_travaux_realises_artisan1_idx` (`artisan_id1`),
  ADD KEY `fk_travaux_realises_owners1_idx` (`owners_id`);

--
-- Index pour la table `type_assurance`
--
ALTER TABLE `type_assurance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type_assurance_assurance1_idx` (`assurance_id`);

--
-- Index pour la table `type_housing`
--
ALTER TABLE `type_housing`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_prestataire`
--
ALTER TABLE `type_prestataire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_prestataire_copy2`
--
ALTER TABLE `type_prestataire_copy2`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_resources`
--
ALTER TABLE `type_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type_resources_resources1_idx` (`resources_id`);

--
-- Index pour la table `type_travaux`
--
ALTER TABLE `type_travaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type_travaux_travaux1_idx` (`travaux_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idusr`);

--
-- Index pour la table `user_has_group`
--
ALTER TABLE `user_has_group`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `fk_user_has_group_user1_idx` (`user_id1`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adress`
--
ALTER TABLE `adress`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `appel_telephonique`
--
ALTER TABLE `appel_telephonique`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `artisan`
--
ALTER TABLE `artisan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `artisan_adress`
--
ALTER TABLE `artisan_adress`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `assurance`
--
ALTER TABLE `assurance`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `detail_devis_valide`
--
ALTER TABLE `detail_devis_valide`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `detail_tournee`
--
ALTER TABLE `detail_tournee`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devis`
--
ALTER TABLE `devis`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `echanges`
--
ALTER TABLE `echanges`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `echeancier`
--
ALTER TABLE `echeancier`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entity`
--
ALTER TABLE `entity`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `group`
--
ALTER TABLE `group`
  MODIFY `idgrp` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `housing`
--
ALTER TABLE `housing`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligne_detail_devis`
--
ALTER TABLE `ligne_detail_devis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `owner-adress`
--
ALTER TABLE `owner-adress`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `owner_resources`
--
ALTER TABLE `owner_resources`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prestataire`
--
ALTER TABLE `prestataire`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rights`
--
ALTER TABLE `rights`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rights_level`
--
ALTER TABLE `rights_level`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `tournee`
--
ALTER TABLE `tournee`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `travaux`
--
ALTER TABLE `travaux`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `travaux_realises`
--
ALTER TABLE `travaux_realises`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_assurance`
--
ALTER TABLE `type_assurance`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_housing`
--
ALTER TABLE `type_housing`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_prestataire`
--
ALTER TABLE `type_prestataire`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_prestataire_copy2`
--
ALTER TABLE `type_prestataire_copy2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_resources`
--
ALTER TABLE `type_resources`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_travaux`
--
ALTER TABLE `type_travaux`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idusr` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adress`
--
ALTER TABLE `adress`
  ADD CONSTRAINT `fk_adress_artisan_adress1` FOREIGN KEY (`artisan_adress_id`) REFERENCES `artisan_adress` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `artisan`
--
ALTER TABLE `artisan`
  ADD CONSTRAINT `fk_artisan_artisan_appel_telephone1` FOREIGN KEY (`artisan_appel_telephone_artisan_id`,`artisan_appel_telephone_appel-tel_id`) REFERENCES `artisan_appel_telephone` (`artisan_id`, `appel-tel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `artisan_adress`
--
ALTER TABLE `artisan_adress`
  ADD CONSTRAINT `fk_artisan_adress_artisan1` FOREIGN KEY (`artisan_id1`) REFERENCES `artisan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `artisan_appel_telephone`
--
ALTER TABLE `artisan_appel_telephone`
  ADD CONSTRAINT `fk_artisan_appel_telephone_appel_telephonique1` FOREIGN KEY (`appel_telephonique_id`) REFERENCES `appel_telephonique` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `compose-devis`
--
ALTER TABLE `compose-devis`
  ADD CONSTRAINT `fk_compose-devis_devis1` FOREIGN KEY (`devis_id1`) REFERENCES `devis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `fk_demande_owners1` FOREIGN KEY (`owners_id`) REFERENCES `owners` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `detail_devis_valide`
--
ALTER TABLE `detail_devis_valide`
  ADD CONSTRAINT `fk_detail_devis_valide_ligne_detail_devis1` FOREIGN KEY (`ligne_detail_devis_id`) REFERENCES `ligne_detail_devis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `devis`
--
ALTER TABLE `devis`
  ADD CONSTRAINT `fk_devis_type_travaux1` FOREIGN KEY (`type_travaux_id1`) REFERENCES `type_travaux` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `droits`
--
ALTER TABLE `droits`
  ADD CONSTRAINT `droits_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `group` (`idgrp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `echanges`
--
ALTER TABLE `echanges`
  ADD CONSTRAINT `fk_echanges_owner_echanges1` FOREIGN KEY (`owner_echanges_owner_id`,`owner_echanges_echange_id`) REFERENCES `owner_echanges` (`owner_id`, `echange_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `echeancier`
--
ALTER TABLE `echeancier`
  ADD CONSTRAINT `fk_echeancier_paiement1` FOREIGN KEY (`paiement_id`) REFERENCES `paiement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `entity`
--
ALTER TABLE `entity`
  ADD CONSTRAINT `fk_entity_rights1` FOREIGN KEY (`rights_id`) REFERENCES `rights` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `fk_group_user_has_group1` FOREIGN KEY (`user_has_group_user_id`,`user_has_group_group_id`) REFERENCES `user_has_group` (`user_id`, `group_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `housing`
--
ALTER TABLE `housing`
  ADD CONSTRAINT `fk_housing_demande1` FOREIGN KEY (`demande_id`) REFERENCES `demande` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_housing_type_housing1` FOREIGN KEY (`type_housing_id`) REFERENCES `type_housing` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `ligne_detail_devis`
--
ALTER TABLE `ligne_detail_devis`
  ADD CONSTRAINT `fk_ligne_detail_devis_devis1` FOREIGN KEY (`devis_id`) REFERENCES `devis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `link_parents`
--
ALTER TABLE `link_parents`
  ADD CONSTRAINT `fk_link_parents_parents1` FOREIGN KEY (`parents_id`) REFERENCES `parents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `owner-adress`
--
ALTER TABLE `owner-adress`
  ADD CONSTRAINT `fk_owner-adress_adress1` FOREIGN KEY (`adress_id`) REFERENCES `adress` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_owner-adress_owners1` FOREIGN KEY (`owners_id`) REFERENCES `owners` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `owners`
--
ALTER TABLE `owners`
  ADD CONSTRAINT `fk_owners_owner_appel_telephone1` FOREIGN KEY (`owner_appel_telephone_owner_id`,`owner_appel_telephone_appel-tel_id`) REFERENCES `owner_appel_telephone` (`owner_id`, `appel-tel_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_owners_owner_resources1` FOREIGN KEY (`owner_resources_id`) REFERENCES `owner_resources` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_owners_parents` FOREIGN KEY (`parents_id`) REFERENCES `parents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD CONSTRAINT `fk_prestataire_type_prestataire` FOREIGN KEY (`type_prestataire_id1`) REFERENCES `type_prestataire` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestataire_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`idusr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `fk_resources_owner_resources1` FOREIGN KEY (`owner_resources_id`) REFERENCES `owner_resources` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `rights`
--
ALTER TABLE `rights`
  ADD CONSTRAINT `fk_rights_group1` FOREIGN KEY (`group_id1`) REFERENCES `group` (`idgrp`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `rights_level`
--
ALTER TABLE `rights_level`
  ADD CONSTRAINT `fk_rights_level_rights1` FOREIGN KEY (`rights_id`) REFERENCES `rights` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tournee`
--
ALTER TABLE `tournee`
  ADD CONSTRAINT `fk_tournee_detail_tournee1` FOREIGN KEY (`detail_tournee_id`) REFERENCES `detail_tournee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `travaux`
--
ALTER TABLE `travaux`
  ADD CONSTRAINT `fk_travaux_housing1` FOREIGN KEY (`housing_id1`) REFERENCES `housing` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `travaux_realises`
--
ALTER TABLE `travaux_realises`
  ADD CONSTRAINT `fk_travaux_realises_artisan1` FOREIGN KEY (`artisan_id1`) REFERENCES `artisan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_travaux_realises_owners1` FOREIGN KEY (`owners_id`) REFERENCES `owners` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `type_assurance`
--
ALTER TABLE `type_assurance`
  ADD CONSTRAINT `fk_type_assurance_assurance1` FOREIGN KEY (`assurance_id`) REFERENCES `assurance` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `type_resources`
--
ALTER TABLE `type_resources`
  ADD CONSTRAINT `fk_type_resources_resources1` FOREIGN KEY (`resources_id`) REFERENCES `resources` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `type_travaux`
--
ALTER TABLE `type_travaux`
  ADD CONSTRAINT `fk_type_travaux_travaux1` FOREIGN KEY (`travaux_id`) REFERENCES `travaux` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user_has_group`
--
ALTER TABLE `user_has_group`
  ADD CONSTRAINT `fk_user_has_group_user1` FOREIGN KEY (`user_id1`) REFERENCES `user` (`idusr`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
