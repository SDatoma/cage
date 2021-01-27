-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 27 jan. 2021 à 11:04
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.4.13

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
  `pays_boutique` varchar(11) DEFAULT NULL,
  `nif_boutique` varchar(100) DEFAULT NULL,
  `contact_1_boutique` int(20) DEFAULT NULL,
  `contact_2_boutique` int(20) DEFAULT NULL,
  `email_boutique` varchar(100) DEFAULT NULL,
  `slogan_boutique` varchar(100) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `password_boutique` varchar(255) DEFAULT NULL,
  `etat_boutique` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `boutique`
--

INSERT INTO `boutique` (`id_boutique`, `nom_boutique`, `description_boutique`, `photos_boutique`, `ville_boutique`, `pays_boutique`, `nif_boutique`, `contact_1_boutique`, `contact_2_boutique`, `email_boutique`, `slogan_boutique`, `id_role`, `password_boutique`, `etat_boutique`) VALUES
(1, 'SEBI Incorporation', '<p>&nbsp;<u><b>Informatique pour tous</b></u><br></p>', 'files_upload/boutique/SEBI Incorporation.jpg', 'Lome', 'Togo', 'null', 90655456, 70654330, 'sebiinc@dmail.com', 'SEBI Inc', NULL, NULL, 1);

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
  `numero_facture` varchar(40) DEFAULT NULL,
  `date_livraison` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_produit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, 'files_upload/produit_image/enora-recharge-b6.jpg', 13);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(100) DEFAULT NULL,
  `description_produit` text,
  `prix_ht_produit` int(11) DEFAULT NULL,
  `quantite_produit` int(11) DEFAULT NULL,
  `stock_produit` varchar(50) DEFAULT NULL,
  `nouveau_produit` varchar(50) DEFAULT NULL,
  `etat_produit` int(1) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_sous_categorie` int(11) DEFAULT NULL,
  `id_boutique` int(11) DEFAULT NULL,
  `caracteristique_produit` text,
  `image_produit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `description_produit`, `prix_ht_produit`, `quantite_produit`, `stock_produit`, `nouveau_produit`, `etat_produit`, `id_categorie`, `id_sous_categorie`, `id_boutique`, `caracteristique_produit`, `image_produit`) VALUES
(1, 'Ampoule 12 volt', '<p>rtytruytuyuy tuyi hjhk<br></p>', 1200, 20, NULL, 'Existant', 1, 2, 3, 1, '<p>tryytuyiu gjhk hkhjk<br></p>', 'files_upload/produit/Ampoule 12 volt.jpg'),
(2, 'Peinture au sol 80kp', '<p>gfh gjhjhk jkjl<br></p>', 3900, 12, NULL, 'Existant', 1, 1, 2, 1, '<p>ytu gjhhjhk yiuoi yiuoio<br></p>', 'files_upload/produit/Peinture au sol 80kp.jpg'),
(3, 'Iphone 11', '<p>fgfdhgfh<br></p>', 110000, 23, NULL, 'Nouveau', 1, 3, 6, 1, '<p>gfhgjhgk<br></p>', 'files_upload/produit/Iphone 11.jpg'),
(4, 'Tecno spark 4', '<p>fhghgj<br></p>', 90000, 11, NULL, 'Existant', 1, 3, 5, 1, '<p>ghhgkjklj<br></p>', 'files_upload/produit/Tecno spark 4.jpg'),
(5, 'Carreaux 3 m cube', '<p>rettrytu yiui hjkhk<br></p>', 3500, 27, NULL, 'Existant', 1, 5, 7, 1, '<p>ytru yiyuouj hkjkl<br></p>', 'files_upload/produit/Carreaux 3 m cube.jpg'),
(6, 'Pot wc 20mm', '<p>tytryuyt yiuiui<br></p>', 4300, 6, NULL, 'Existant', 1, 5, 9, 1, '<p>tyutyiyu hkjkljl<br></p>', 'files_upload/produit/Pot wc 20mm.jpg'),
(7, 'Lait caille', '<p>gfhgjhjh hjhkh<br></p>', 1630, 12, NULL, 'Existant', 1, 1, 2, 1, '<p>yuyiuoipo hjhkj<br></p>', 'files_upload/produit/7.jpg'),
(8, 'Cahier 200 p', '<p>gfhgfjhj<br></p>', 200, 18, NULL, 'Existant', 1, 2, 4, 1, '<p>tytuyuiyu<br></p>', 'files_upload/produit/Cahier 200 p.jpg'),
(9, 'Infinix hot 10', '<p>fghfgjhkh<br></p>', 95000, 9, NULL, 'Existant', 1, 3, 5, 1, '<p>tyuyuyuiuy<br></p>', 'files_upload/produit/Infinix hot 10.jpg'),
(10, 'Ademe', '<p>fdgfh<br></p>', 150, 11, NULL, 'Existant', 1, 1, 1, 1, '<p>ghgjhkj<br></p>', 'files_upload/produit/10.jpg'),
(11, 'Carrote', '<p>fgfhghj<br></p>', 430, 5, NULL, 'Existant', 1, 2, 4, 1, '<p>ghjhjk<br></p>', 'files_upload/produit/11.jpg'),
(12, 'Sodigaz 6kg', '<p>gfhgfhg<br></p>', 12400, 50, NULL, 'Existant', 1, 1, 1, 1, '<p>gjhjhk<br></p>', 'files_upload/produit/Sodigaz 6kg.jpg'),
(13, 'Enora gaz 6kg', '<p>Enora <br></p>', 12900, 6, NULL, 'Nouveau', 1, 1, 1, 1, '<p>fgfdhgfh<br></p>', 'files_upload/produit/Enora gaz 6kg.jpg');

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
(3, 'a8vd3', 3, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `libelle_role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `sexe_user` varchar(20) DEFAULT NULL,
  `telephone_user` int(20) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `ok_newsletter` int(11) DEFAULT NULL,
  `type_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `email_user`, `password_user`, `sexe_user`, `telephone_user`, `id_role`, `ok_newsletter`, `type_user`) VALUES
(3, 'Mamadou', 'Sambalaye', 'mamadou@gmail.com', 'mamadou12345678', 'M', 90867866, NULL, 1, 2),
(5, 'KPEKPASSI', 'Bilali', 'bilali@gmail.com', 'fofb12345678', 'M', 90867866, NULL, 1, 2);

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `boutique`
--
ALTER TABLE `boutique`
  MODIFY `id_boutique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `envoi_mail`
--
ALTER TABLE `envoi_mail`
  MODIFY `id_envoi_mail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id_ligne_commande` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_photo_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `remise`
--
ALTER TABLE `remise`
  MODIFY `id_remise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `boutique`
--
ALTER TABLE `boutique`
  ADD CONSTRAINT `boutique_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD CONSTRAINT `ligne_commande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `photo_produit`
--
ALTER TABLE `photo_produit`
  ADD CONSTRAINT `photo_produit_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_sous_categorie`) REFERENCES `sous_categorie` (`id_sous_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_boutique`) REFERENCES `boutique` (`id_boutique`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_3` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sous_categorie`
--
ALTER TABLE `sous_categorie`
  ADD CONSTRAINT `sous_categorie_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
