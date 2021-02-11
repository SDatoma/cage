-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 11 fév. 2021 à 18:54
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
-- Base de données :  `cage_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id_adresse` int(11) NOT NULL,
  `ville_adresse` varchar(100) DEFAULT NULL,
  `pays_adresse` varchar(100) DEFAULT NULL,
  `description_adresse` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `etat_adresse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `ville_adresse`, `pays_adresse`, `description_adresse`, `id_user`, `etat_adresse`) VALUES
(1, 'Lome', 'TOGO', 'dfdsfgdg', 5, 1),
(2, 'Sokode', 'TOGO', 'Lycee koulounde', 3, 1),
(3, 'Sokode', 'TOGO', 'Lycee koulounde', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `affecter_roles`
--

CREATE TABLE `affecter_roles` (
  `id_affecter_roles` int(10) UNSIGNED NOT NULL,
  `id_role` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `affecter_roles`
--

INSERT INTO `affecter_roles` (`id_affecter_roles`, `id_role`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 4, 9, '2021-02-10 14:12:30', '2021-02-10 14:12:30'),
(3, 4, 10, '2021-02-10 20:30:55', '2021-02-10 20:30:55'),
(4, 4, 11, '2021-02-11 09:27:21', '2021-02-11 09:27:21'),
(6, 6, 11, '2021-02-11 09:27:44', '2021-02-11 09:27:44'),
(7, 7, 11, '2021-02-11 09:27:58', '2021-02-11 09:27:58'),
(8, 8, 11, '2021-02-11 09:28:11', '2021-02-11 09:28:11'),
(11, 9, 11, '2021-02-11 09:52:27', '2021-02-11 09:52:27'),
(14, 11, 11, '2021-02-11 10:47:27', '2021-02-11 10:47:27'),
(15, 28, 11, '2021-02-11 12:53:33', '2021-02-11 12:53:33');

-- --------------------------------------------------------

--
-- Structure de la table `boutique`
--

CREATE TABLE `boutique` (
  `id_boutique` int(11) NOT NULL,
  `nom_boutique` varchar(100) DEFAULT NULL,
  `description_boutique` text,
  `photos_boutique` varchar(255) DEFAULT NULL,
  `ville_boutique` varchar(100) DEFAULT NULL,
  `rue_boutique` varchar(255) DEFAULT NULL,
  `quartier_boutique` varchar(222) DEFAULT NULL,
  `batiment_boutique` varchar(222) DEFAULT NULL,
  `pays_boutique` varchar(11) DEFAULT NULL,
  `nif_boutique` varchar(100) DEFAULT NULL,
  `contact_1_boutique` int(20) DEFAULT NULL,
  `contact_2_boutique` int(20) DEFAULT NULL,
  `email_boutique` varchar(100) DEFAULT NULL,
  `slogan_boutique` varchar(100) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `password_boutique` varchar(255) DEFAULT NULL,
  `etat_boutique` int(11) DEFAULT NULL,
  `nom_responsable` varchar(255) DEFAULT NULL,
  `contact_responsable` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`id_boutique`, `nom_boutique`, `description_boutique`, `photos_boutique`, `ville_boutique`, `rue_boutique`, `quartier_boutique`, `batiment_boutique`, `pays_boutique`, `nif_boutique`, `contact_1_boutique`, `contact_2_boutique`, `email_boutique`, `slogan_boutique`, `id_role`, `password_boutique`, `etat_boutique`, `nom_responsable`, `contact_responsable`) VALUES
(1, 'SEBI Incorporation', '<p>&nbsp;<u><b>Informatique pour tous</b></u><br></p>', 'files_upload/boutique/SEBI Incorporation.jpg', 'Lome', 'hghj', 'bnbm', 'tytuyu', 'Togo', 'null', 90655456, 70654330, 'sebiinc@dmail.com', 'SEBI Inc', NULL, NULL, 1, 'fofana', '54656765867'),
(2, 'NTIC', 'gdfhgjghjhk', 'files_upload/boutique/NTIC.jpg', 'Lome', '456', 'Agoe', NULL, 'Togo', 'null', 90876543, NULL, 'ntic@gmail.com', 'DGFHGH', NULL, NULL, 1, 'Abalo', '65676423');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `libelle_categorie` varchar(100) DEFAULT NULL,
  `image_categorie` varchar(50) DEFAULT NULL,
  `etat_categorie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `libelle_categorie`, `image_categorie`, `etat_categorie`) VALUES
(1, 'Quincaillerie', 'files_upload/categorie/Quincaillerie.jpg', 1),
(2, 'Electricite', 'files_upload/categorie/Electricite.jpg', 1),
(3, 'Portable', 'files_upload/categorie/Portable.jpg', 1),
(5, 'Sol', 'files_upload/categorie/Sol.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `date_commande` datetime DEFAULT NULL,
  `etat_commande` int(1) DEFAULT NULL,
  `reference_commande` varchar(100) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  `frais_livraison` int(11) DEFAULT NULL,
  `numero_facture` varchar(40) DEFAULT NULL,
  `date_livraison` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `date_commande`, `etat_commande`, `reference_commande`, `id_user`, `id_produit`, `id_adresse`, `frais_livraison`, `numero_facture`, `date_livraison`) VALUES
(1, '2021-01-29 00:00:00', 0, 'fzdkb', 2, NULL, 3, 1000, '1', NULL),
(2, '2021-01-29 00:00:00', 0, 'njrb3', 2, NULL, 3, 0, '2', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `commentaire_parent` int(11) DEFAULT NULL,
  `resume_commentaire` text CHARACTER SET utf8,
  `date_commentaire` date DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `nom_commentaire` varchar(50) DEFAULT NULL,
  `email_commentaire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `commentaire_parent`, `resume_commentaire`, `date_commentaire`, `id_produit`, `nom_commentaire`, `email_commentaire`) VALUES
(1, 0, 'fgfdghghghg', '2021-01-30', 13, 'Bilali', 'fof@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `emailing`
--

CREATE TABLE `emailing` (
  `id_email` int(11) NOT NULL,
  `titre_email` text,
  `description_email` text,
  `id_ville` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emailing`
--

INSERT INTO `emailing` (`id_email`, `titre_email`, `description_email`, `id_ville`) VALUES
(1, 'Promotion', '<p>C\'est la bonne des belle vacane<br></p>', 1),
(3, 'SALUT', '<p>OK cest bon<br></p>', 2),
(5, 'Campagne de promotion', '<p><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Le mot français «&nbsp;amour&nbsp;», comme le verbe «&nbsp;aimer&nbsp;» qui lui est relatif, recouvre une large variété de<span>&nbsp;</span></span><b><a href=\"https://fr.wikipedia.org/wiki/Sens_(linguistique)\" title=\"Sens (linguistique)\" style=\"text-decoration: none; color: rgb(6, 69, 173); background: rgb(255, 255, 255) none repeat scroll 0% 0%; font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">significations</a></b><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>distinctes, quoique liées. Ainsi, le<b><span>&nbsp;</span></b></span><b><a href=\"https://fr.wikipedia.org/wiki/Fran%C3%A7ais\" title=\"Français\" style=\"text-decoration: none; color: rgb(6, 69, 173); background: rgb(255, 255, 255) none repeat scroll 0% 0%; font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">français</a></b><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>utilise le même<span>&nbsp;</span></span><b><a href=\"https://fr.wikipedia.org/wiki/Verbe\" title=\"Verbe\" style=\"text-decoration: none; color: rgb(6, 69, 173); background: rgb(255, 255, 255) none repeat scroll 0% 0%; font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">verbe</a></b><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>pour exprimer ce que d\'autres langues expriment par des verbes différents&nbsp;: «&nbsp;j’</span><i style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">aime</i><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>ma femme&nbsp;» et «&nbsp;j’</span><i style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">aime</i><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>les sucreries&nbsp;» par exemple (alors qu\'en<span>&nbsp;</span></span><b><a href=\"https://fr.wikipedia.org/wiki/Anglais\" title=\"Anglais\" style=\"text-decoration: none; color: rgb(6, 69, 173); background: rgb(255, 255, 255) none repeat scroll 0% 0%; font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">anglais</a></b><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">, on dira respectivement «&nbsp;</span><i style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">to love</i><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;» et «&nbsp;</span><i style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">to like</i><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;» et, en<span>&nbsp;</span></span><b><a href=\"https://fr.wikipedia.org/wiki/Espagnol\" title=\"Espagnol\" style=\"text-decoration: none; color: rgb(6, 69, 173); background: rgb(255, 255, 255) none repeat scroll 0% 0%; font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">espagnol</a></b><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">, «&nbsp;</span><i style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">querer</i><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;» ou «&nbsp;</span><i style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">amar</i><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;» et «&nbsp;</span><i style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">gustar</i><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">&nbsp;»). On constate aussi une telle variété pour le mot «&nbsp;amour&nbsp;», par exemple dans la pluralité des<span>&nbsp;</span></span><a href=\"https://fr.wikipedia.org/w/index.php?title=Mots_grecs_pour_dire_amour&amp;action=edit&amp;redlink=1\" class=\"new\" title=\"Mots grecs pour dire amour (page inexistante)\" style=\"text-decoration: none; color: rgb(186, 0, 0); background: none rgb(255, 255, 255); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\"><b>mots grecs désignant</b> l’«&nbsp;<b>amour</b>&nbsp;»</a><span style=\"color: rgb(32, 33, 34); font-family: sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">. Les différences culturelles dans la conception de l\'amour redoublent donc la difficulté d\'en donner une définition universelle.</span><br></p>', 1);

-- --------------------------------------------------------

--
-- Structure de la table `envoi_mail`
--

CREATE TABLE `envoi_mail` (
  `id_envoi_mail` int(11) NOT NULL,
  `titre_mail` varchar(222) DEFAULT NULL,
  `description_mail` text,
  `etat_mail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `info_contact`
--

CREATE TABLE `info_contact` (
  `id_contact` int(11) NOT NULL,
  `nom_contact` varchar(11) DEFAULT NULL,
  `email_contact` varchar(100) DEFAULT NULL,
  `objet_contact` varchar(100) DEFAULT NULL,
  `message_contact` text,
  `date_contact` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id_ligne_commande` int(11) NOT NULL,
  `quantite_commande` int(11) DEFAULT NULL,
  `prix_commande` int(100) DEFAULT NULL,
  `id_commande` int(11) DEFAULT NULL,
  `reference_commande` varchar(255) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL,
  `montant_tva` varchar(100) DEFAULT NULL,
  `prix_ht` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id_ligne_commande`, `quantite_commande`, `prix_commande`, `id_commande`, `reference_commande`, `id_produit`, `montant_tva`, `prix_ht`) VALUES
(1, 1, 3900, 1, 'fzdkb', 2, NULL, NULL),
(2, 1, 85500, 2, 'njrb3', 4, NULL, NULL),
(3, 1, 12400, 2, 'njrb3', 12, NULL, NULL),
(4, 1, 4300, 2, 'njrb3', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id_newsletter` int(11) NOT NULL,
  `email_newsletter` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(11) NOT NULL,
  `id_transaction` varchar(50) DEFAULT NULL,
  `reference_commande` varchar(60) DEFAULT NULL,
  `mode_payement` varchar(50) DEFAULT NULL,
  `montant_payer` double DEFAULT NULL,
  `etat_paiement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo_produit`
--

CREATE TABLE `photo_produit` (
  `id_photo_produit` int(11) NOT NULL,
  `photo_produit` varchar(100) DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo_produit`
--

INSERT INTO `photo_produit` (`id_photo_produit`, `photo_produit`, `id_produit`) VALUES
(1, 'files_upload/produit_image/AS1782-zoom.jpg', 1),
(2, 'files_upload/produit_image/Item802286.jpeg', 1),
(3, 'files_upload/produit_image/téléchargement (1).jpg', 2),
(4, 'files_upload/produit_image/téléchargement.jpg', 2),
(5, 'files_upload/produit_image/telephone-portable-apple-iphone-6-plus-64-go-gold.jpg', 3),
(6, 'files_upload/produit_image/apple-iphone-11-pro_001.jpg', 3),
(7, 'files_upload/produit_image/telephone-portable-samsung-galaxy-a20s-rouge-sim-orange-offerte-60-go.jpg', 4),
(8, 'files_upload/produit_image/c3.jpg', 5),
(9, 'files_upload/produit_image/b3.jpg', 6),
(10, 'files_upload/produit_image/117386268_2351220655003158_7363619508379051574_o.jpg', 7),
(11, 'files_upload/produit_image/ca2.jpg', 8),
(12, 'files_upload/produit_image/i1.jpg', 9),
(13, 'files_upload/produit_image/i3.jpg', 9),
(14, 'files_upload/produit_image/117039275_2315465875245303_3552014753127450217_o.jpg', 10),
(15, 'files_upload/produit_image/117390481_2351218141670076_4633275444831874476_o.jpg', 11),
(16, 'files_upload/produit_image/117445394_2351219085003315_7313510420217429495_o.jpg', 11),
(17, 'files_upload/produit_image/117390481_2351218141670076_4633275444831874476_o.jpg', 11),
(18, 'files_upload/produit_image/enora-recharge-b6.jpg', 13),
(19, 'files_upload/produit_image/3knhj.jpg', 13),
(20, 'files_upload/produit_image/g2.jpg', 14),
(21, 'files_upload/produit_image/g3.jpg', 14),
(22, 'files_upload/produit_image/79772607_1835951716530057_2832006026578886656_o.jpg', 15),
(23, 'files_upload/produit_image/unnamed (1).jpg', 16);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(100) DEFAULT NULL,
  `description_produit` text,
  `prix_ht_produit` int(11) DEFAULT NULL,
  `tva_applicable` varchar(11) DEFAULT NULL,
  `taux_tva` int(11) DEFAULT NULL,
  `prix_ttc` int(11) DEFAULT NULL,
  `quantite_produit` int(11) DEFAULT NULL,
  `stock_produit` varchar(50) DEFAULT NULL,
  `nouveau_produit` varchar(50) DEFAULT NULL,
  `etat_produit` int(1) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_sous_categorie` int(11) DEFAULT NULL,
  `id_boutique` int(11) DEFAULT NULL,
  `caracteristique_produit` text,
  `image_produit` varchar(255) DEFAULT NULL,
  `montant_tva` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `description_produit`, `prix_ht_produit`, `tva_applicable`, `taux_tva`, `prix_ttc`, `quantite_produit`, `stock_produit`, `nouveau_produit`, `etat_produit`, `id_categorie`, `id_sous_categorie`, `id_boutique`, `caracteristique_produit`, `image_produit`, `montant_tva`) VALUES
(1, 'Ampoule 12 volt', '<p>rtytruytuyuy tuyi hjhk<br></p>', 1200, 'oui', 3, 1164, 20, NULL, 'Existant', 1, 2, 3, 1, '<p>tryytuyiu gjhk hkhjk<br></p>', 'files_upload/produit/Ampoule 12 volt.jpg', NULL),
(2, 'Peinture au sol 80kp', '<p>gfh gjhjhk jkjl<br></p>', 3900, 'non', 0, 3900, 12, NULL, 'Existant', 1, 1, 2, 1, '<p>ytu gjhhjhk yiuoi yiuoio<br></p>', 'files_upload/produit/Peinture au sol 80kp.jpg', NULL),
(3, 'Iphone 11', '<p>fgfdhgfh<br></p>', 110000, 'oui', 2, 107800, 23, NULL, 'Nouveau', 1, 3, 6, 1, '<p>gfhgjhgk<br></p>', 'files_upload/produit/Iphone 11.jpg', NULL),
(4, 'Tecno spark 4', '<p>fhghgj<br></p>', 90000, 'oui', 5, 85500, 11, NULL, 'Existant', 1, 3, 5, 1, '<p>ghhgkjklj<br></p>', 'files_upload/produit/Tecno spark 4.jpg', NULL),
(5, 'Carreaux 3 m cube', '<p>rettrytu yiui hjkhk<br></p>', 3500, 'oui', 1, 3465, 27, NULL, 'Existant', 1, 5, 7, 1, '<p>ytru yiyuouj hkjkl<br></p>', 'files_upload/produit/Carreaux 3 m cube.jpg', NULL),
(6, 'Pot wc 20mm', '<p>tytryuyt yiuiui<br></p>', 4300, 'non', 0, 4300, 5, NULL, 'Existant', 1, 5, 9, 1, '<p>tyutyiyu hkjkljl<br></p>', 'files_upload/produit/Pot wc 20mm.jpg', NULL),
(7, 'Lait caille', '<p>gfhgjhjh hjhkh<br></p>', 1630, 'non', 0, 1630, 12, NULL, 'Existant', 1, 1, 2, 1, '<p>yuyiuoipo hjhkj<br></p>', 'files_upload/produit/7.jpg', NULL),
(8, 'Cahier 200 p', '<p>gfhgfjhj<br></p>', 200, 'oui', 3, 194, 18, NULL, 'Existant', 1, 2, 4, 1, '<p>tytuyuiyu<br></p>', 'files_upload/produit/Cahier 200 p.jpg', NULL),
(9, 'Infinix hot 10', '<p>fghfgjhkh<br></p>', 95000, 'oui', 1, 94050, 9, NULL, 'Existant', 1, 3, 5, 1, '<p>tyuyuyuiuy<br></p>', 'files_upload/produit/Infinix hot 10.jpg', NULL),
(10, 'Ademe', '<p>fdgfh<br></p>', 150, 'non', 0, 150, 11, NULL, 'Existant', 1, 1, 1, 1, '<p>ghgjhkj<br></p>', 'files_upload/produit/10.jpg', NULL),
(11, 'Carrote', '<p>fgfhghj<br></p>', 430, 'oui', 2, 421, 5, NULL, 'Existant', 1, 2, 4, 1, '<p>ghjhjk<br></p>', 'files_upload/produit/11.jpg', NULL),
(12, 'Sodigaz 6kg', '<p>gfhgfhg<br></p>', 12400, 'non', 0, 12400, 50, NULL, 'Existant', 1, 1, 1, 1, '<p>gjhjhk<br></p>', 'files_upload/produit/Sodigaz 6kg.jpg', NULL),
(13, 'Enora gaz 6kg', '<p>Enora <br></p>', 12900, 'oui', 4, 12384, 6, NULL, 'Nouveau', 1, 1, 1, 1, '<p>fgfdhgfh<br></p>', 'files_upload/produit/Enora gaz 6kg.jpg', NULL),
(14, 'Grillage metallique 1x2m', '<p>fgfhgfhjgjg</p>', 2900, 'non', 0, 2900, 40, NULL, 'Existant', 1, 1, 1, 1, '<p>ghgfjghj</p>', 'files_upload/produit/g1.jpg.jpg', NULL),
(15, 'Pot de Wc', '<p>ghhgjhkj</p>', 567, 'oui', 5, 539, 4, NULL, 'Nouveau', 1, 1, 2, 1, '<p>hjhkhjkj</p>', 'files_upload/produit/PotdeWc.jpg', NULL),
(16, 'Biscuit', '<p>reytrytu<br></p>', 1600, 'oui', 4, 1536, 30, NULL, 'Existant', 1, 5, 8, 2, '<p>yuyiuiuo<br></p>', 'files_upload/produit/Biscuit.jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id_promotion` int(11) NOT NULL,
  `pourcentage_promotion` int(5) DEFAULT NULL,
  `code_promotion` varchar(100) DEFAULT NULL,
  `date_debut_promotion` date DEFAULT NULL,
  `date_fin_promotion` date DEFAULT NULL,
  `id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id_promotion`, `pourcentage_promotion`, `code_promotion`, `date_debut_promotion`, `date_fin_promotion`, `id_produit`) VALUES
(2, 5, 'mjf80', '2021-01-26', '2021-01-30', 4);

-- --------------------------------------------------------

--
-- Structure de la table `remise`
--

CREATE TABLE `remise` (
  `id_remise` int(11) NOT NULL,
  `reference_commande` varchar(222) DEFAULT NULL,
  `id_commande` int(11) DEFAULT NULL,
  `etat_remise` int(11) DEFAULT NULL,
  `pourcentage_remise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `remise`
--

INSERT INTO `remise` (`id_remise`, `reference_commande`, `id_commande`, `etat_remise`, `pourcentage_remise`) VALUES
(2, '27otp', 1, 1, 5),
(3, 'a8vd3', 3, 1, 4),
(5, 'rrf3x', 2, 1, 4),
(6, 'ymj7a', 2, 1, 2),
(7, 'fzdkb', 1, 1, 3),
(8, 'njrb3', 2, 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `libelle_role` varchar(100) DEFAULT NULL,
  `code_role` varchar(11) DEFAULT NULL,
  `route_role` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `libelle_role`, `code_role`, `route_role`, `created_at`, `updated_at`) VALUES
(2, 'Commerciaux', NULL, NULL, '2021-02-10 14:05:50', '2021-02-10 14:06:00'),
(3, 'Gestionnaire de Stocks', NULL, NULL, '2021-02-10 14:05:50', '2021-02-10 14:06:00'),
(4, 'Les paramètres', 'PARAM', '/list/ville', '2021-02-10 14:05:50', '2021-02-10 14:06:00'),
(6, 'Gestion des utilisateurs', 'UTIL', NULL, '2021-02-10 17:44:47', '2021-02-10 17:44:47'),
(7, 'Gestion boutique', 'BOUT', NULL, '2021-02-10 17:44:47', '2021-02-10 17:44:47'),
(8, 'Gestion Catégorie', 'CAT', NULL, '2021-02-10 17:46:00', '2021-02-10 17:46:00'),
(9, 'Gestion produit', 'PROD', NULL, '2021-02-10 17:46:00', '2021-02-10 17:46:00'),
(11, 'Gestion des commandes', 'COMM', NULL, '2021-02-11 09:52:08', '2021-02-11 09:52:08'),
(28, 'Commandes rejetées', 'COMM-REJ', NULL, '2021-02-11 10:09:12', '2021-02-11 10:09:12');

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `image_slider` varchar(222) DEFAULT NULL,
  `text_slider` text,
  `etat_slider` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

CREATE TABLE `sous_categorie` (
  `id_sous_categorie` int(11) NOT NULL,
  `libelle_sous_categorie` varchar(100) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `image_sous_categorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id_sous_categorie`, `libelle_sous_categorie`, `id_categorie`, `image_sous_categorie`) VALUES
(1, 'Fer', 1, 'files_upload/categorie/1.jpg'),
(2, 'Chaux', 1, 'files_upload/categorie/Chaux.jpg'),
(3, 'Ampoule', 2, 'files_upload/categorie/Ampoule.jpg'),
(4, 'Torche', 2, 'files_upload/categorie/Torche.jpg'),
(5, 'Tecno', 3, 'files_upload/categorie/Tecno.jpg'),
(6, 'Iphone', 3, 'files_upload/categorie/Iphone.jpg'),
(7, 'Carreaux', 5, 'files_upload/categorie/Carreaux.jpg'),
(8, 'Baingnoire', 5, 'files_upload/categorie/Baingnoire.jpg'),
(9, 'Pot wc', 5, 'files_upload/categorie/Pot wc.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(100) DEFAULT NULL,
  `prenom_user` varchar(100) DEFAULT NULL,
  `email_user` varchar(100) DEFAULT NULL,
  `password_user` varchar(100) DEFAULT NULL,
  `password_visible` varchar(255) DEFAULT NULL,
  `sexe_user` varchar(20) DEFAULT NULL,
  `telephone_user` int(20) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `ok_newsletter` int(11) DEFAULT NULL,
  `type_user` int(11) DEFAULT NULL,
  `id_ville` varchar(50) DEFAULT NULL,
  `quartier_user` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `email_user`, `password_user`, `password_visible`, `sexe_user`, `telephone_user`, `id_role`, `ok_newsletter`, `type_user`, `id_ville`, `quartier_user`) VALUES
(2, 'Fofana', 'bilali', 'fofb@gmail.com', '$2y$10$HgOlep1JuS3LxMMrUgPX0uaFhB1lOmzbuwxmQm5Qul1vejHpBYkCW', NULL, 'M', 89789098, NULL, 1, 2, '1', 'Agbalepedo'),
(3, 'ALASSANI', 'bilali', 'alassani@gmail.com', '$2y$10$cpOqdGSnp8p39Bv08hqvIOylNt7jSAQ4cL6W4xiUV7hqSxyItB/sS', NULL, 'M', 89789098, NULL, 1, 2, '1', NULL),
(4, 'fgfhghgh', 'hghjhgjhj', 'mamadou@gmail.com', '$2y$10$83Sxi7QCw92zhO5Q8a8/cOon/6o5S.b8WqmrTtXSaSfgH1BlNmaB.', NULL, 'F', 89789098, NULL, 1, 2, '2', NULL),
(8, 'FOFB', 'Bilali', 'fofbil@gmail.com', '$2y$10$QlRDmNkRQ2lTUEOPntZn0evsiBtbv5D913ZmEyQNv5XTqh/c2ab2i', '1234', NULL, NULL, 3, NULL, 1, NULL, NULL),
(9, 'Datoma', 'serge', 'sergedjiwa@gmail.com', '$2y$10$Y7vR2S4zRSHIrVVXkjZbwOUjX1zABiO.PKLqciE2YDFmEw1uON9I6', NULL, 'M', 93129462, NULL, 1, 1, '1', 'Lama'),
(10, 'Datoma', 'serge', 'solim@gmail.com', '$2y$10$/wjHdbyhBnR3Z3eHY4cHyeKYQv/4t3cIJgbJJt7ZRMmcg9ZcU84xe', 'bakhita99', NULL, NULL, 0, NULL, 1, NULL, NULL),
(11, 'Cage', 'Bâtiment', 'admin@cagebatiment.com', '$2y$10$Z9h3LlQKFD7dmHm7zBd51OxM5KX1dpuzA/w9xFQSHUVW5eEYkT62C', '@@CageBat1', NULL, NULL, NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `libelle_ville` varchar(222) DEFAULT NULL,
  `etat_ville` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `libelle_ville`, `etat_ville`) VALUES
(1, 'Sokode', 1),
(2, 'Lome', 1),
(3, 'Tchamba', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `affecter_roles`
--
ALTER TABLE `affecter_roles`
  ADD PRIMARY KEY (`id_affecter_roles`),
  ADD KEY `affecter_roles_role_id_index` (`id_role`),
  ADD KEY `affecter_roles_user_id_index` (`id_user`);

--
-- Index pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD PRIMARY KEY (`id_boutique`),
  ADD KEY `id_role` (`id_role`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `emailing`
--
ALTER TABLE `emailing`
  ADD PRIMARY KEY (`id_email`);

--
-- Index pour la table `envoi_mail`
--
ALTER TABLE `envoi_mail`
  ADD PRIMARY KEY (`id_envoi_mail`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id_ligne_commande`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id_newsletter`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`);

--
-- Index pour la table `photo_produit`
--
ALTER TABLE `photo_produit`
  ADD PRIMARY KEY (`id_photo_produit`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_sous_categorie` (`id_sous_categorie`),
  ADD KEY `id_boutique` (`id_boutique`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promotion`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `remise`
--
ALTER TABLE `remise`
  ADD PRIMARY KEY (`id_remise`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Index pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD PRIMARY KEY (`id_sous_categorie`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `affecter_roles`
--
ALTER TABLE `affecter_roles`
  MODIFY `id_affecter_roles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `id_boutique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `emailing`
--
ALTER TABLE `emailing`
  MODIFY `id_email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `envoi_mail`
--
ALTER TABLE `envoi_mail`
  MODIFY `id_envoi_mail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id_ligne_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id_newsletter` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `photo_produit`
--
ALTER TABLE `photo_produit`
  MODIFY `id_photo_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `remise`
--
ALTER TABLE `remise`
  MODIFY `id_remise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  MODIFY `id_sous_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD CONSTRAINT `boutique_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
