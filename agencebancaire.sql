-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 25 Juin 2019 à 18:01
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agencebancaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(10) UNSIGNED NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cin` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `prenom`, `cin`, `adresse`, `tel`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(21, 'ouder', 'samir', 'AA48661', '57 av mokhtar jazoulite apt 6  rabat ocean', '0619454828', 'ouder.samir@gmail.com', '2019-06-17 13:52:18', '2019-06-17 13:52:18', NULL),
(22, 'oubrahim', 'hamza', 'AA46548', '9 Holland Gardens Waterford Place', '6632385404', 'hamza.oubrahim@gmail.com', '2019-06-17 14:17:17', '2019-06-17 14:17:17', NULL),
(23, 'eloufir', 'chakib', '1212121212', '57 av mokhtar jazoulite apt 6  rabat ocean', '0619454565', 'chakibEloufir@gmail.com', '2019-06-17 15:55:35', '2019-06-17 15:55:35', NULL),
(24, 'ouder', 'ahmed', 'AA39661', '57 av mokhtar jazoulite apt 6  rabat ocean', '0619454020', 'ouder.samir@gmail.com', '2019-06-20 13:46:57', '2019-06-20 13:46:57', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comptes`
--

CREATE TABLE `comptes` (
  `id_comptes` int(10) UNSIGNED NOT NULL,
  `client_id_client` int(10) UNSIGNED NOT NULL,
  `num_comptes` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ouverture` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `comptes`
--

INSERT INTO `comptes` (`id_comptes`, `client_id_client`, `num_comptes`, `date_ouverture`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, 21, '170619155218', '2019-06-17 15:52:18', '2019-06-17 13:52:18', '2019-06-17 13:52:18', NULL),
(17, 22, '170619161717', '2019-06-17 16:17:17', '2019-06-17 14:17:17', '2019-06-17 14:17:17', NULL),
(18, 23, '170619175535', '2019-06-17 17:55:35', '2019-06-17 15:55:35', '2019-06-17 15:55:35', NULL),
(19, 24, '200619154657', '2019-06-20 15:46:57', '2019-06-20 13:46:57', '2019-06-20 13:46:57', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `compte_courants`
--

CREATE TABLE `compte_courants` (
  `id_compte_courant` int(10) UNSIGNED NOT NULL,
  `compte_id_comptes` int(10) UNSIGNED NOT NULL,
  `date_creation` datetime NOT NULL,
  `solde` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `debit_max` double(15,8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `compte_courants`
--

INSERT INTO `compte_courants` (`id_compte_courant`, `compte_id_comptes`, `date_creation`, `solde`, `created_at`, `updated_at`, `deleted_at`, `debit_max`) VALUES
(15, 16, '2019-06-17 16:37:41', 99000.00, '2019-06-17 14:37:41', '2019-06-23 08:08:47', NULL, 50.00000000),
(16, 17, '2019-06-17 17:47:07', 10000.00, '2019-06-17 15:47:07', '2019-06-20 12:56:31', NULL, 10.00000000),
(17, 18, '2019-06-17 17:55:59', 100000.00, '2019-06-17 15:55:59', '2019-06-21 12:32:37', NULL, 100.00000000),
(18, 19, '2019-06-20 15:54:36', 36200.00, '2019-06-20 13:54:36', '2019-06-23 08:05:02', NULL, 20.00000000);

-- --------------------------------------------------------

--
-- Structure de la table `compte_epargnes`
--

CREATE TABLE `compte_epargnes` (
  `id_compte_epargnes` int(10) UNSIGNED NOT NULL,
  `compte_id_comptes` int(10) UNSIGNED NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solde` double(8,2) NOT NULL,
  `taux_interet` double(8,2) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `compte_epargnes`
--

INSERT INTO `compte_epargnes` (`id_compte_epargnes`, `compte_id_comptes`, `prenom`, `solde`, `taux_interet`, `deleted_at`, `created_at`, `updated_at`) VALUES
(16, 16, 'samir', 3000.00, 10.00, NULL, '2019-06-17 15:25:06', '2019-06-21 08:48:12'),
(17, 17, 'rania', 100.00, 1.50, NULL, '2019-06-17 15:49:11', '2019-06-17 15:49:11'),
(18, 16, 'hassan', 20000.00, 1.50, NULL, '2019-06-17 15:56:37', '2019-06-23 08:08:47'),
(19, 16, 'asmae', 3000.00, 1.30, NULL, '2019-06-17 15:58:10', '2019-06-17 15:58:10'),
(20, 18, 'hicham', 18900.00, 1.50, NULL, '2019-06-17 15:58:47', '2019-06-21 12:32:37'),
(21, 18, 'nezha', 39000.00, 1.50, NULL, '2019-06-17 15:59:15', '2019-06-21 12:24:23'),
(22, 19, 'ahmed', 400.00, 1.10, NULL, '2019-06-20 13:56:31', '2019-06-20 13:56:31');

-- --------------------------------------------------------

--
-- Structure de la table `encaissements`
--

CREATE TABLE `encaissements` (
  `id_encaissement` int(10) UNSIGNED NOT NULL,
  `date_encaissement` datetime NOT NULL,
  `mise_encaissement_id_mise_encaissement` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `e_retraits`
--

CREATE TABLE `e_retraits` (
  `id_retrait` int(10) UNSIGNED NOT NULL,
  `montant` double(8,2) DEFAULT NULL,
  `date_retrait` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `compte_epargne_id_compte_epargne` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `e_retraits`
--

INSERT INTO `e_retraits` (`id_retrait`, `montant`, `date_retrait`, `created_at`, `updated_at`, `compte_epargne_id_compte_epargne`) VALUES
(1, 50.00, '2019-06-21 14:20:32', '2019-06-21 12:20:32', '2019-06-21 12:20:32', 20),
(2, 100.00, '2019-06-21 14:20:52', '2019-06-21 12:20:52', '2019-06-21 12:20:52', 21);

-- --------------------------------------------------------

--
-- Structure de la table `e_versements`
--

CREATE TABLE `e_versements` (
  `id_versement` int(10) UNSIGNED NOT NULL,
  `montant` double(8,2) DEFAULT NULL,
  `date_versement` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `compte_epargne_id_compte_epargne` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `e_versements`
--

INSERT INTO `e_versements` (`id_versement`, `montant`, `date_versement`, `created_at`, `updated_at`, `compte_epargne_id_compte_epargne`) VALUES
(1, 55.00, '2019-06-21 12:10:42', '2019-06-21 10:10:42', '2019-06-21 10:10:42', 21),
(2, 150.00, '2019-06-21 14:12:24', '2019-06-21 12:12:24', '2019-06-21 12:12:24', 20),
(3, 45.00, '2019-06-21 14:13:42', '2019-06-21 12:13:42', '2019-06-21 12:13:42', 21);

-- --------------------------------------------------------

--
-- Structure de la table `e_virements`
--

CREATE TABLE `e_virements` (
  `id_virement` int(10) UNSIGNED NOT NULL,
  `id_operation` int(11) NOT NULL,
  `montant` double(8,2) DEFAULT NULL,
  `type` enum('credit','debit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_virement` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `compte_epargne_id_compte_epargneBenificiaire` int(10) UNSIGNED NOT NULL,
  `compte_epargne_id_compte_epargneClient` int(10) UNSIGNED NOT NULL,
  `idCourantBenificiare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `e_virements`
--

INSERT INTO `e_virements` (`id_virement`, `id_operation`, `montant`, `type`, `date_virement`, `created_at`, `updated_at`, `compte_epargne_id_compte_epargneBenificiaire`, `compte_epargne_id_compte_epargneClient`, `idCourantBenificiare`) VALUES
(90, 2, 8900.00, 'credit', '2019-06-18 00:18:52', '2019-06-17 22:18:52', '2019-06-17 22:18:52', 20, 20, 17),
(91, 91, 1000.00, 'credit', '2019-06-21 10:48:12', '2019-06-21 08:48:12', '2019-06-21 08:48:12', 16, 18, 0),
(92, 91, 1000.00, 'debit', '2019-06-21 10:48:12', '2019-06-21 08:48:12', '2019-06-21 08:48:12', 18, 16, 0),
(93, 93, 9000.00, 'credit', '2019-06-21 14:24:23', '2019-06-21 12:24:23', '2019-06-21 12:24:23', 21, 20, 0),
(94, 93, 9000.00, 'debit', '2019-06-21 14:24:23', '2019-06-21 12:24:23', '2019-06-21 12:24:23', 20, 21, 0),
(95, 94, 8900.00, 'credit', '2019-06-21 14:32:37', '2019-06-21 12:32:37', '2019-06-21 12:32:37', 20, 20, 17),
(96, 95, 1000.00, 'credit', '2019-06-23 10:08:47', '2019-06-23 08:08:47', '2019-06-23 08:08:47', 18, 18, 15);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_03_16_202148_create_agencebancaire_table', 1),
(16, '2019_03_17_201538_add_column_deletedAt_clients', 1),
(17, '2019_03_22_171711_create_compteszez_table', 1),
(18, '2019_03_22_171818_create_comptes_table', 2),
(19, '2019_03_22_173144_add_column_client_id_client', 3),
(26, '2019_03_28_152758_add_column_deletedAt_comptes', 9),
(27, '2019_03_28_155712_add_column_deletedAt_compte_courants', 10),
(28, '2019_03_28_155743_add_column_deletedAt_compte_epargnes', 10),
(29, '2019_03_24_200138_create_compte_courants_table', 11),
(30, '2019_03_24_201624_add_column_id_comptesAt_compte_courants', 11),
(31, '2019_03_24_210223_update_compte_courants_table', 11),
(32, '2019_03_24_213051_create_compte_epargnes_table', 11),
(33, '2019_03_24_213755_update_compte_epargnes_table', 11),
(34, '2019_03_28_163334_add_column_deletedAAt_compte_courants', 11),
(35, '2019_03_28_163439_add_column_deletedAAt_compte_epargnes', 11),
(36, '2019_03_28_190819_update_compte_epargnes1_table', 12),
(37, '2019_04_14_133515_update_table_comptes_change_type_tostring', 13),
(38, '2019_04_14_143457_delete_num_compte_courant_compteCourant', 14),
(41, '2019_04_14_144114_add_column_debit_maxto_compte_courants', 15),
(42, '2019_04_14_145240_create_tieres_table', 16),
(43, '2019_04_14_144714_create_versements_table', 17),
(44, '2019_04_14_153042_change_in_versmenets', 18),
(45, '2019_04_14_151158_add_columns_versements', 19),
(47, '2019_04_14_153827_create_retraits_table', 20),
(48, '2019_04_14_154705_create_virements_table', 21),
(50, '2019_04_20_110636_delete_column_At_N_cheque', 22),
(51, '2019_04_20_111232_create_mise_encaisements_table', 23),
(52, '2019_04_20_113133_add_foreignkey_miseEncaissement', 24),
(53, '2019_04_20_113738_create_encaissements_table', 25),
(54, '2019_04_20_171120_rename_table', 26),
(55, '2019_04_20_184511_rename_column_date_versement_to_date_retrait', 27),
(56, '2019_04_21_111619_create_e_retraits_table', 28),
(57, '2019_04_24_080921_fk_table_comptes', 28),
(58, '2019_04_27_091014_addColumn_FK_retraits', 29),
(59, '2019_04_27_091337_create_table_e_versements', 30),
(60, '2019_04_27_091533_addColumn_Fk_e_versements', 31),
(61, '2019_04_27_092419_create_table_e_virements', 32),
(62, '2019_04_27_092603_addColumn_FK_e_virements', 33),
(63, '2019_05_03_121339_chage_comlumnType_e_Virement_montant', 34),
(64, '2019_05_03_133453_chage_comlumnType_Virement_montant', 35),
(65, '2019_05_03_133602_chage_comlumnType_Viresements_montant', 36),
(66, '2019_05_03_133722_chage_comlumnType_retraits_montant', 37),
(67, '2019_05_03_133840_chage_comlumnType_e_retraits_montant', 38),
(68, '2019_05_03_134107_chage_comlumnType_e_Versements_montant', 39),
(69, '2019_06_04_024351_addColumn_IdEpargneBenificiaire', 40),
(70, '2019_06_12_223706_add_Column_idCourantBenificiaire', 41),
(71, '2019_06_16_155330_create_table_tracesoldes', 42),
(72, '2019_06_16_162643_change_column_type_trecesoldes_solde', 43);

-- --------------------------------------------------------

--
-- Structure de la table `mise_encaissements`
--

CREATE TABLE `mise_encaissements` (
  `id_mise_encaissement` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `n_cheque` int(11) NOT NULL,
  `tire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_compte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant` double(15,8) NOT NULL,
  `compte_courant_id_compte_courant` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `retraits`
--

CREATE TABLE `retraits` (
  `id_retrait` int(10) UNSIGNED NOT NULL,
  `montant` double(8,2) DEFAULT NULL,
  `date_retrait` datetime NOT NULL,
  `compte_courant_id_compte_courant` int(10) UNSIGNED NOT NULL,
  `tiere_id_tiere` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `retraits`
--

INSERT INTO `retraits` (`id_retrait`, `montant`, `date_retrait`, `compte_courant_id_compte_courant`, `tiere_id_tiere`, `created_at`, `updated_at`) VALUES
(30, 100.00, '2019-06-17 23:33:18', 15, 1, '2019-06-17 21:33:18', '2019-06-17 21:33:18');

-- --------------------------------------------------------

--
-- Structure de la table `tieres`
--

CREATE TABLE `tieres` (
  `id_tiere` int(10) UNSIGNED NOT NULL,
  `num_compte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `tieres`
--

INSERT INTO `tieres` (`id_tiere`, `num_compte`, `nom`, `prenom`, `adresse`, `created_at`, `updated_at`) VALUES
(1, '123123', 'tiere1', 'prenom', 'nom', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tracesoldes`
--

CREATE TABLE `tracesoldes` (
  `id` int(10) UNSIGNED NOT NULL,
  `idOperation` int(11) NOT NULL,
  `solde` double(8,2) DEFAULT NULL,
  `date_operation` datetime NOT NULL,
  `type_operation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opeartion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `tracesoldes`
--

INSERT INTO `tracesoldes` (`id`, `idOperation`, `solde`, `date_operation`, `type_operation`, `opeartion`, `created_at`, `updated_at`) VALUES
(26, 32, 109000.00, '2019-06-17 18:21:42', 'credit', 'viresement', '2019-06-17 16:21:42', '2019-06-17 16:21:42'),
(27, 30, 108900.00, '2019-06-17 23:33:18', 'debit', 'retrait', '2019-06-17 21:33:18', '2019-06-17 21:33:18'),
(28, 116, 100000.00, '2019-06-18 00:09:58', 'debit', 'virement', '2019-06-17 22:09:59', '2019-06-17 22:09:59'),
(29, 117, 108900.00, '2019-06-18 00:09:58', 'credit', 'virement', '2019-06-17 22:09:59', '2019-06-17 22:09:59'),
(30, 118, 100000.00, '2019-06-18 00:18:52', 'debit', 'virement', '2019-06-17 22:18:52', '2019-06-17 22:18:52'),
(31, 90, 18900.00, '2019-06-18 00:18:52', 'credit', 'e_virement', '2019-06-17 22:18:52', '2019-06-17 22:18:52'),
(32, 119, 95000.00, '2019-06-20 14:56:31', 'debit', 'virement', '2019-06-20 12:56:31', '2019-06-20 12:56:31'),
(33, 120, 10000.00, '2019-06-20 14:56:31', 'credit', 'virement', '2019-06-20 12:56:31', '2019-06-20 12:56:31'),
(34, 91, 3000.00, '2019-06-21 10:48:12', 'credit', 'e_virement', '2019-06-21 08:48:12', '2019-06-21 08:48:12'),
(35, 92, 19000.00, '2019-06-21 10:48:12', 'debit', 'e_virement', '2019-06-21 08:48:12', '2019-06-21 08:48:12'),
(36, 121, 41100.00, '2019-06-21 11:37:35', 'debit', 'virement', '2019-06-21 09:37:35', '2019-06-21 09:37:35'),
(37, 122, 108900.00, '2019-06-21 11:37:35', 'credit', 'virement', '2019-06-21 09:37:35', '2019-06-21 09:37:35'),
(38, 123, 36100.00, '2019-06-21 11:38:17', 'debit', 'virement', '2019-06-21 09:38:17', '2019-06-21 09:38:17'),
(39, 124, 100000.00, '2019-06-21 11:38:17', 'credit', 'virement', '2019-06-21 09:38:17', '2019-06-21 09:38:17'),
(40, 125, 100000.00, '2019-06-21 11:43:15', 'debit', 'virement', '2019-06-21 09:43:15', '2019-06-21 09:43:15'),
(41, 126, 108900.00, '2019-06-21 11:43:15', 'credit', 'virement', '2019-06-21 09:43:15', '2019-06-21 09:43:15'),
(42, 1, 30055.00, '2019-06-21 12:10:42', 'credit', 'e_versement', '2019-06-21 10:10:42', '2019-06-21 10:10:42'),
(43, 2, 19050.00, '2019-06-21 14:12:24', 'credit', 'e_versement', '2019-06-21 12:12:24', '2019-06-21 12:12:24'),
(44, 3, 30100.00, '2019-06-21 14:13:42', 'credit', 'e_versement', '2019-06-21 12:13:42', '2019-06-21 12:13:42'),
(45, 1, 19000.00, '2019-06-21 14:20:32', 'debit', 'e_retrait', '2019-06-21 12:20:32', '2019-06-21 12:20:32'),
(46, 2, 30000.00, '2019-06-21 14:20:52', 'debit', 'e_retrait', '2019-06-21 12:20:52', '2019-06-21 12:20:52'),
(47, 93, 39000.00, '2019-06-21 14:24:23', 'credit', 'e_virement', '2019-06-21 12:24:23', '2019-06-21 12:24:23'),
(48, 94, 10000.00, '2019-06-21 14:24:23', 'debit', 'e_virement', '2019-06-21 12:24:23', '2019-06-21 12:24:23'),
(49, 127, 100000.00, '2019-06-21 14:32:37', 'debit', 'virement', '2019-06-21 12:32:37', '2019-06-21 12:32:37'),
(50, 95, 18900.00, '2019-06-21 14:32:37', 'credit', 'e_virement', '2019-06-21 12:32:37', '2019-06-21 12:32:37'),
(51, 33, 36200.00, '2019-06-23 10:05:02', 'credit', 'viresement', '2019-06-23 08:05:03', '2019-06-23 08:05:03'),
(52, 128, 99000.00, '2019-06-23 10:08:47', 'debit', 'virement', '2019-06-23 08:08:47', '2019-06-23 08:08:47'),
(53, 96, 20000.00, '2019-06-23 10:08:47', 'credit', 'e_virement', '2019-06-23 08:08:47', '2019-06-23 08:08:47');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ouder', 'ouder.ouder@gmail.com', '$2y$10$FJxsMVm3yxURf.sp7azGG.oiqFJIOQXFOjYVnZt4to42CG0Exy5ba', 'dHfTEfwmaCsReGHut09qhzGyFDfRhcjXrM5E0jevc9BOhNCH3tTqjXlweq6b', '2019-03-22 17:43:21', '2019-03-22 17:43:21');

-- --------------------------------------------------------

--
-- Structure de la table `virements`
--

CREATE TABLE `virements` (
  `id_virement` int(10) UNSIGNED NOT NULL,
  `id_operation` int(11) NOT NULL,
  `montant` double(8,2) DEFAULT NULL,
  `type_virement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_virement` datetime NOT NULL,
  `compte_courant_id_compte_courant` int(10) UNSIGNED NOT NULL,
  `compte_courant_id_compte_beneficiaire` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idEpargneBenificiare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `virements`
--

INSERT INTO `virements` (`id_virement`, `id_operation`, `montant`, `type_virement`, `date_virement`, `compte_courant_id_compte_courant`, `compte_courant_id_compte_beneficiaire`, `created_at`, `updated_at`, `idEpargneBenificiare`) VALUES
(116, 1, 8900.00, 'debit', '2019-06-18 00:09:58', 15, 17, '2019-06-17 22:09:58', '2019-06-17 22:09:58', 0),
(117, 1, 8900.00, 'credit', '2019-06-18 00:09:58', 17, 15, '2019-06-17 22:09:58', '2019-06-17 22:09:58', 0),
(118, 2, 8900.00, 'debit', '2019-06-18 00:18:52', 17, 17, '2019-06-17 22:18:52', '2019-06-17 22:18:52', 20),
(119, 3, 5000.00, 'debit', '2019-06-20 14:56:31', 17, 16, '2019-06-20 12:56:31', '2019-06-20 12:56:31', 0),
(120, 3, 5000.00, 'credit', '2019-06-20 14:56:31', 16, 17, '2019-06-20 12:56:31', '2019-06-20 12:56:31', 0),
(121, 4, 8900.00, 'debit', '2019-06-21 11:37:35', 18, 15, '2019-06-21 09:37:35', '2019-06-21 09:37:35', 0),
(122, 4, 8900.00, 'credit', '2019-06-21 11:37:35', 15, 18, '2019-06-21 09:37:35', '2019-06-21 09:37:35', 0),
(123, 5, 5000.00, 'debit', '2019-06-21 11:38:17', 18, 17, '2019-06-21 09:38:17', '2019-06-21 09:38:17', 0),
(124, 5, 5000.00, 'credit', '2019-06-21 11:38:17', 17, 18, '2019-06-21 09:38:17', '2019-06-21 09:38:17', 0),
(125, 6, 8900.00, 'debit', '2019-06-21 11:43:15', 15, 17, '2019-06-21 09:43:15', '2019-06-21 09:43:15', 0),
(126, 6, 8900.00, 'credit', '2019-06-21 11:43:15', 17, 15, '2019-06-21 09:43:15', '2019-06-21 09:43:15', 0),
(127, 94, 8900.00, 'debit', '2019-06-21 14:32:37', 17, 17, '2019-06-21 12:32:37', '2019-06-21 12:32:37', 20),
(128, 95, 1000.00, 'debit', '2019-06-23 10:08:47', 15, 15, '2019-06-23 08:08:47', '2019-06-23 08:08:47', 18);

-- --------------------------------------------------------

--
-- Structure de la table `viresements`
--

CREATE TABLE `viresements` (
  `id_versement` int(10) UNSIGNED NOT NULL,
  `montant` double(8,2) DEFAULT NULL,
  `date_versement` datetime NOT NULL,
  `compte_courant_id_compte_courant` int(10) UNSIGNED NOT NULL,
  `tiere_id_tiere` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `viresements`
--

INSERT INTO `viresements` (`id_versement`, `montant`, `date_versement`, `compte_courant_id_compte_courant`, `tiere_id_tiere`, `created_at`, `updated_at`) VALUES
(32, 9000.00, '2019-06-17 18:21:42', 15, 1, '2019-06-17 16:21:42', '2019-06-17 16:21:42'),
(33, 100.00, '2019-06-23 10:05:02', 18, 1, '2019-06-23 08:05:02', '2019-06-23 08:05:02');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD PRIMARY KEY (`id_comptes`),
  ADD KEY `comptes_client_id_client_foreign` (`client_id_client`);

--
-- Index pour la table `compte_courants`
--
ALTER TABLE `compte_courants`
  ADD PRIMARY KEY (`id_compte_courant`),
  ADD KEY `compte_courants_compte_courants_id_comptes_foreign` (`compte_id_comptes`);

--
-- Index pour la table `compte_epargnes`
--
ALTER TABLE `compte_epargnes`
  ADD PRIMARY KEY (`id_compte_epargnes`),
  ADD KEY `compte_epargnes_compte_id_comptes_foreign` (`compte_id_comptes`);

--
-- Index pour la table `encaissements`
--
ALTER TABLE `encaissements`
  ADD PRIMARY KEY (`id_encaissement`),
  ADD KEY `encaissements_mise_encaissement_id_mise_encaissement_foreign` (`mise_encaissement_id_mise_encaissement`);

--
-- Index pour la table `e_retraits`
--
ALTER TABLE `e_retraits`
  ADD PRIMARY KEY (`id_retrait`),
  ADD KEY `e_retraits_compte_epargne_id_compte_epargne_foreign` (`compte_epargne_id_compte_epargne`);

--
-- Index pour la table `e_versements`
--
ALTER TABLE `e_versements`
  ADD PRIMARY KEY (`id_versement`),
  ADD KEY `e_versements_compte_epargne_id_compte_epargne_foreign` (`compte_epargne_id_compte_epargne`);

--
-- Index pour la table `e_virements`
--
ALTER TABLE `e_virements`
  ADD PRIMARY KEY (`id_virement`),
  ADD KEY `e_virements_compte_epargne_id_compte_epargnebenificiaire_foreign` (`compte_epargne_id_compte_epargneBenificiaire`),
  ADD KEY `e_virements_compte_epargne_id_compte_epargneclient_foreign` (`compte_epargne_id_compte_epargneClient`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mise_encaissements`
--
ALTER TABLE `mise_encaissements`
  ADD PRIMARY KEY (`id_mise_encaissement`),
  ADD KEY `mise_encaissements_compte_courant_id_compte_courant_foreign` (`compte_courant_id_compte_courant`);

--
-- Index pour la table `retraits`
--
ALTER TABLE `retraits`
  ADD PRIMARY KEY (`id_retrait`),
  ADD KEY `retraits_compte_courant_id_compte_courant_foreign` (`compte_courant_id_compte_courant`),
  ADD KEY `retraits_tiere_id_tiere_foreign` (`tiere_id_tiere`);

--
-- Index pour la table `tieres`
--
ALTER TABLE `tieres`
  ADD PRIMARY KEY (`id_tiere`);

--
-- Index pour la table `tracesoldes`
--
ALTER TABLE `tracesoldes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `virements`
--
ALTER TABLE `virements`
  ADD PRIMARY KEY (`id_virement`),
  ADD KEY `virements_compte_courant_id_compte_courant_foreign` (`compte_courant_id_compte_courant`),
  ADD KEY `virements_compte_courant_id_compte_beneficiaire_foreign` (`compte_courant_id_compte_beneficiaire`);

--
-- Index pour la table `viresements`
--
ALTER TABLE `viresements`
  ADD PRIMARY KEY (`id_versement`),
  ADD KEY `versements_compte_courant_id_compte_courant_foreign` (`compte_courant_id_compte_courant`),
  ADD KEY `versements_tiere_id_tiere_foreign` (`tiere_id_tiere`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `comptes`
--
ALTER TABLE `comptes`
  MODIFY `id_comptes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `compte_courants`
--
ALTER TABLE `compte_courants`
  MODIFY `id_compte_courant` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `compte_epargnes`
--
ALTER TABLE `compte_epargnes`
  MODIFY `id_compte_epargnes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `encaissements`
--
ALTER TABLE `encaissements`
  MODIFY `id_encaissement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `e_retraits`
--
ALTER TABLE `e_retraits`
  MODIFY `id_retrait` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `e_versements`
--
ALTER TABLE `e_versements`
  MODIFY `id_versement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `e_virements`
--
ALTER TABLE `e_virements`
  MODIFY `id_virement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT pour la table `mise_encaissements`
--
ALTER TABLE `mise_encaissements`
  MODIFY `id_mise_encaissement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `retraits`
--
ALTER TABLE `retraits`
  MODIFY `id_retrait` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `tieres`
--
ALTER TABLE `tieres`
  MODIFY `id_tiere` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `tracesoldes`
--
ALTER TABLE `tracesoldes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `virements`
--
ALTER TABLE `virements`
  MODIFY `id_virement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT pour la table `viresements`
--
ALTER TABLE `viresements`
  MODIFY `id_versement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comptes`
--
ALTER TABLE `comptes`
  ADD CONSTRAINT `comptes_client_id_client_foreign` FOREIGN KEY (`client_id_client`) REFERENCES `clients` (`id_client`);

--
-- Contraintes pour la table `compte_courants`
--
ALTER TABLE `compte_courants`
  ADD CONSTRAINT `compte_courants_compte_courants_id_comptes_foreign` FOREIGN KEY (`compte_id_comptes`) REFERENCES `comptes` (`id_comptes`) ON DELETE CASCADE;

--
-- Contraintes pour la table `compte_epargnes`
--
ALTER TABLE `compte_epargnes`
  ADD CONSTRAINT `compte_epargnes_compte_id_comptes_foreign` FOREIGN KEY (`compte_id_comptes`) REFERENCES `comptes` (`id_comptes`) ON DELETE CASCADE;

--
-- Contraintes pour la table `encaissements`
--
ALTER TABLE `encaissements`
  ADD CONSTRAINT `encaissements_mise_encaissement_id_mise_encaissement_foreign` FOREIGN KEY (`mise_encaissement_id_mise_encaissement`) REFERENCES `mise_encaissements` (`id_mise_encaissement`);

--
-- Contraintes pour la table `e_retraits`
--
ALTER TABLE `e_retraits`
  ADD CONSTRAINT `e_retraits_compte_epargne_id_compte_epargne_foreign` FOREIGN KEY (`compte_epargne_id_compte_epargne`) REFERENCES `compte_epargnes` (`id_compte_epargnes`);

--
-- Contraintes pour la table `e_versements`
--
ALTER TABLE `e_versements`
  ADD CONSTRAINT `e_versements_compte_epargne_id_compte_epargne_foreign` FOREIGN KEY (`compte_epargne_id_compte_epargne`) REFERENCES `compte_epargnes` (`id_compte_epargnes`);

--
-- Contraintes pour la table `e_virements`
--
ALTER TABLE `e_virements`
  ADD CONSTRAINT `e_virements_compte_epargne_id_compte_epargnebenificiaire_foreign` FOREIGN KEY (`compte_epargne_id_compte_epargneBenificiaire`) REFERENCES `compte_epargnes` (`id_compte_epargnes`),
  ADD CONSTRAINT `e_virements_compte_epargne_id_compte_epargneclient_foreign` FOREIGN KEY (`compte_epargne_id_compte_epargneClient`) REFERENCES `compte_epargnes` (`id_compte_epargnes`);

--
-- Contraintes pour la table `mise_encaissements`
--
ALTER TABLE `mise_encaissements`
  ADD CONSTRAINT `mise_encaissements_compte_courant_id_compte_courant_foreign` FOREIGN KEY (`compte_courant_id_compte_courant`) REFERENCES `compte_courants` (`id_compte_courant`);

--
-- Contraintes pour la table `retraits`
--
ALTER TABLE `retraits`
  ADD CONSTRAINT `retraits_compte_courant_id_compte_courant_foreign` FOREIGN KEY (`compte_courant_id_compte_courant`) REFERENCES `compte_courants` (`id_compte_courant`),
  ADD CONSTRAINT `retraits_tiere_id_tiere_foreign` FOREIGN KEY (`tiere_id_tiere`) REFERENCES `tieres` (`id_tiere`);

--
-- Contraintes pour la table `virements`
--
ALTER TABLE `virements`
  ADD CONSTRAINT `virements_compte_courant_id_compte_beneficiaire_foreign` FOREIGN KEY (`compte_courant_id_compte_beneficiaire`) REFERENCES `compte_courants` (`id_compte_courant`),
  ADD CONSTRAINT `virements_compte_courant_id_compte_courant_foreign` FOREIGN KEY (`compte_courant_id_compte_courant`) REFERENCES `compte_courants` (`id_compte_courant`);

--
-- Contraintes pour la table `viresements`
--
ALTER TABLE `viresements`
  ADD CONSTRAINT `versements_compte_courant_id_compte_courant_foreign` FOREIGN KEY (`compte_courant_id_compte_courant`) REFERENCES `compte_courants` (`id_compte_courant`),
  ADD CONSTRAINT `versements_tiere_id_tiere_foreign` FOREIGN KEY (`tiere_id_tiere`) REFERENCES `tieres` (`id_tiere`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
