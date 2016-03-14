-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 14 Mars 2016 à 11:08
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gamerzone`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`idArticle`, `nom`, `idCategorie`) VALUES
(1, 'Mario', 1),
(2, 'Quatre Fromage', 2),
(3, 'Pepsi', 3),
(4, 'Chorizo', 2),
(5, 'Street Fighter V', 1),
(6, 'Orangina', 3);

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE IF NOT EXISTS `boisson` (
  `idBoisson` int(11) NOT NULL,
  `nomBoisson` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL,
  `nomCategorie` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `nomCategorie`) VALUES
(1, 'jeux'),
(2, 'pizza'),
(3, 'boisson');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL,
  `idCompte` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `login` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `connected` tinyint(4) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `idCompte`, `nom`, `prenom`, `mail`, `date_naissance`, `login`, `pwd`, `connected`, `admin`) VALUES
(1, 1, 'Delamotte', 'Hector', 'hector.delamotte@mail.com', '1980-02-12', 'hector', 'azerty', 0, 0),
(2, 2, 'Gildas', 'Philippe', 'philippe.gilda@mail.fr', '1975-05-05', 'phil', '12345', 1, 0),
(3, 2, 'Vareille', 'Damien', 'daminoudu87@mail.com', '2000-06-04', 'daminou', 'dam', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `dateCommande` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `idClient`, `dateCommande`) VALUES
(1, 1, '2016-03-07');

-- --------------------------------------------------------

--
-- Structure de la table `compose`
--

CREATE TABLE IF NOT EXISTS `compose` (
  `idCommande` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `commentaire` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compose`
--

INSERT INTO `compose` (`idCommande`, `idArticle`, `quantite`, `prix`, `commentaire`) VALUES
(1, 2, 1, 10, '10 € pour l''article 2 en 2 fois'),
(1, 2, 20, 20, '');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `idCompte` int(11) NOT NULL,
  `solde` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`idCompte`, `solde`) VALUES
(1, 0),
(2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `idIngredient` int(11) NOT NULL,
  `nomIngredient` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `librairiejeux`
--

CREATE TABLE IF NOT EXISTS `librairiejeux` (
  `id` int(11) NOT NULL,
  `nom` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_bin,
  `prix` float DEFAULT NULL,
  `url_mono` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `url_multi` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `idArticle` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `librairiejeux`
--

INSERT INTO `librairiejeux` (`id`, `nom`, `description`, `image`, `prix`, `url_mono`, `url_multi`, `idCategorie`, `idArticle`) VALUES
(1, 'Monoply', 'jhecvhjbkj', 'vcdi ZEO7RVCC3', 2, 'QEBO8TGAV O7EZ', 'serh_vtzneo', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `contenu` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idClient` int(11) NOT NULL,
  `idRoom` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `contenu`, `idClient`, `idRoom`, `date`) VALUES
(2, 'aze', 1, 1, '2016-02-14 21:14:13'),
(7, 'aze', 1, 1, '2016-02-14 21:18:34'),
(8, 'aze', 1, 1, '2016-02-14 21:19:05'),
(9, 'kamoulox', 1, 1, '2016-02-14 22:03:15'),
(10, 'salut', 1, 1, '2016-02-14 22:16:16'),
(11, 'test', 1, 1, '2016-02-26 15:24:24'),
(12, 'test', 1, 1, '2016-02-26 15:24:48'),
(13, 'test', 1, 1, '2016-02-26 15:24:48'),
(14, 'test', 1, 1, '2016-02-26 15:24:48'),
(15, 'test', 1, 1, '2016-02-26 15:24:48'),
(16, 'test', 1, 1, '2016-02-26 15:24:48'),
(17, 'test', 1, 1, '2016-02-26 15:24:48'),
(18, 'test', 1, 1, '2016-02-26 15:24:49'),
(19, 'test', 1, 1, '2016-02-26 15:24:49'),
(20, 'test', 1, 1, '2016-02-26 15:24:49'),
(21, 'test', 1, 1, '2016-02-26 15:24:49'),
(22, 'test', 1, 1, '2016-02-26 15:24:49'),
(23, 'test', 1, 1, '2016-02-26 15:24:49'),
(24, 'test', 1, 1, '2016-02-26 15:24:50'),
(25, 'test', 1, 1, '2016-02-26 15:24:50'),
(26, 'bonjour', 1, 1, '2016-02-26 15:25:32'),
(27, 'bonjour', 1, 1, '2016-02-26 15:25:33'),
(28, 'comment ça va ?', 1, 1, '2016-02-26 15:27:00'),
(29, 'salut', 1, 1, '2016-02-26 15:27:07'),
(30, 'salut', 1, 1, '2016-02-26 17:29:35'),
(31, 'bonjour', 3, 1, '2016-02-28 15:21:40'),
(32, 'bonjour', 3, 1, '2016-02-28 15:21:45'),
(33, 'bonjour', 3, 2, '2016-02-28 15:21:51'),
(34, 'Bonjour !', 2, 1, '2016-02-28 20:09:31'),
(35, 'hello', 3, 1, '2016-02-28 20:09:36'),
(36, 'ça va ?', 3, 1, '2016-02-28 20:09:42'),
(37, 'yop', 2, 1, '2016-02-28 20:10:27'),
(38, 'aze', 3, 1, '2016-02-28 20:10:35'),
(39, 'test', 2, 1, '2016-02-28 20:10:40'),
(40, 'yop', 3, 1, '2016-02-28 20:11:10'),
(41, 'test', 2, 1, '2016-02-28 20:11:15'),
(42, 'test', 2, 1, '2016-02-28 20:11:16'),
(43, 'test', 2, 1, '2016-02-28 20:11:18'),
(44, 'test', 2, 1, '2016-02-28 20:11:18'),
(45, 'test', 2, 1, '2016-02-28 20:11:18'),
(46, 'test', 2, 1, '2016-02-28 20:11:19'),
(47, 'test', 2, 1, '2016-02-28 20:11:19'),
(48, 'test', 2, 1, '2016-02-28 20:11:19'),
(49, 'test', 2, 1, '2016-02-28 20:11:19'),
(50, 'bonjour', 3, 1, '2016-02-28 20:12:44'),
(51, 'comment va ?', 2, 1, '2016-02-28 20:12:48'),
(52, 'salut', 3, 1, '2016-02-28 20:45:30'),
(53, 'test', 3, 1, '2016-02-28 20:45:47'),
(54, 'test', 3, 1, '2016-02-28 20:45:51'),
(55, 'marche', 3, 1, '2016-02-28 20:46:11'),
(56, 'salut', 3, 1, '2016-03-01 11:00:16'),
(57, 'Bonjour', 3, 1, '2016-03-01 14:45:27'),
(58, 'aze', 3, 1, '2016-03-01 14:45:35'),
(59, 'canard poilu', 3, 1, '2016-03-01 14:45:47'),
(60, 'marche normalement', 3, 1, '2016-03-01 14:49:58'),
(61, 'test', 3, 2, '2016-03-01 14:50:16'),
(62, 'jjdgf', 3, 1, '2016-03-01 14:51:56'),
(63, 'jfng', 3, 1, '2016-03-01 14:52:08'),
(64, 'la ca marche c''est obligé que ça marche !', 3, 1, '2016-03-01 14:54:14'),
(65, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras convallis, ante in convallis convallis, sapien tortor fermentum justo, nec consequat lorem justo eu nulla. Integer varius consequat sem, eu accumsan mauris sollicitudin a. Duis commodo ipsum nunc. Nam sed justo nec augue ullamcorper viverra sit amet in libero. Pellentesque bibendum velit nulla, non iaculis elit tristique sed. Phasellus enim purus, fermentum id mi ac, faucibus iaculis urna. Sed non tempus est. Maecenas luctus felis a nunc pharetra, sit amet tristique metus porttitor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi varius feugiat euismod. In facilisis risus eget eros faucibus pharetra. Quisque porta nibh id metus finibus tempus ac et arcu. Maecenas porttitor felis non nisi ultrices, a imperdiet urna vestibulum. Duis pharetra est non nisl viverra pulvinar.  Vivamus nunc leo, hendrerit sit amet tortor vestibulum, pulvinar hendrerit tellus. Quisque facilisis libero nec nisl aliquet fermentum. Vestibulum venenatis ut tellus eget tempor. Quisque eget elit ante. Nunc sed pulvinar augue, a euismod odio. Aliquam ac nisl sit amet ipsum porta ultrices eu dapibus lectus. Aliquam porta, metus ac viverra pellentesque, sapien ante fermentum metus, quis tempor mauris dolor at tortor. Aliquam justo massa, feugiat volutpat risus ac, fermentum dapibus diam. Phasellus condimentum odio sed massa mollis, eget venenatis nulla vulputate. Aenean sit amet euismod magna. Nullam maximus tellus quis consequat bibendum.  Ut quis faucibus sem. Integer iaculis leo et velit vehicula, at volutpat mi elementum. Fusce quis dictum eros. Donec semper congue magna ut fermentum. Fusce eu orci posuere elit vulputate lacinia. Fusce ut nisl nec odio ultricies consectetur at at magna. Pellentesque ut est turpis.  Phasellus vitae vehicula nisi. Morbi ultricies scelerisque elit a porta. Nunc rutrum aliquam dolor sed efficitur. Pellentesque sed ex turpis. Maecenas ornare urna a porta varius. Nulla nec risus ornare, fringilla arcu sed, pretium leo. Duis nec velit non nisl varius mattis. Aliquam venenatis nibh elit, id imperdiet nunc blandit in. Mauris enim elit, mollis a enim vel, vulputate mollis dui. Aliquam vitae placerat diam. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus mattis velit sed vestibulum ornare. Nunc sollicitudin metus leo, in ullamcorper neque posuere vitae. Aliquam euismod nisl in urna tincidunt, quis viverra lacus gravida. Cras ultricies, justo id tincidunt blandit, massa velit condimentum metus, eget consequat est risus eu dui.  Phasellus sit amet nunc tristique, suscipit quam non, vulputate dui. Nulla blandit enim arcu, dapibus tristique libero mollis nec. Donec accumsan quis arcu in ultrices. Suspendisse varius, tortor nec aliquam aliquam, elit leo auctor dui, in imperdiet justo est id urna. Nullam tincidunt laoreet lorem vel facilisis. Etiam feugiat tincidunt mi, ac dignissim eros auctor nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse gravida viverra eros, vitae rhoncus ipsum efficitur vitae. Sed eu placerat lectus, lobortis lacinia lectus. Curabitur in nisi gravida, sagittis arcu eu, lacinia lorem. Donec vel felis ac magna pharetra accumsan. Curabitur euismod libero a ante tristique, et ultrices enim venenatis. Mauris euismod velit elementum dignissim elementum. Fusce vel ultrices ipsum. Ut molestie hendrerit luctus.', 3, 1, '2016-03-01 14:55:02'),
(66, 'saut', 3, 1, '2016-03-02 13:56:52'),
(67, 'wut ?', 3, 2, '2016-03-02 14:28:15');

-- --------------------------------------------------------

--
-- Structure de la table `message_prive`
--

CREATE TABLE IF NOT EXISTS `message_prive` (
  `id` int(11) NOT NULL,
  `idClient1` int(11) NOT NULL,
  `idClient2` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ordinateur`
--

CREATE TABLE IF NOT EXISTS `ordinateur` (
  `idOrdi` int(11) NOT NULL,
  `nomOrdi` varchar(50) NOT NULL,
  `idSalle` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE IF NOT EXISTS `participe` (
  `idTournoi` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE IF NOT EXISTS `partie` (
  `idClient` int(11) NOT NULL,
  `idJeu` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '1',
  `dateUtilise` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `partie`
--

INSERT INTO `partie` (`idClient`, `idJeu`, `valide`, `dateUtilise`) VALUES
(1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
  `idPizza` int(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `nomPizza` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `tempsdeCuisson` int(11) NOT NULL COMMENT 'minutes',
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `idPizza` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

CREATE TABLE IF NOT EXISTS `resultat` (
  `idTournoi` int(11) NOT NULL,
  `idJoueur` int(11) NOT NULL,
  `dateTournoi` date NOT NULL,
  `point` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL,
  `nom` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `room`
--

INSERT INTO `room` (`id`, `nom`) VALUES
(1, 'Général'),
(2, 'Pizza');

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE IF NOT EXISTS `salle` (
  `idSalle` int(11) NOT NULL,
  `nomSalle` varchar(50) NOT NULL,
  `emplacement` varchar(100) NOT NULL,
  `capacite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tournoi`
--

CREATE TABLE IF NOT EXISTS `tournoi` (
  `idTournoi` int(11) NOT NULL,
  `nom` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `heure` time DEFAULT NULL,
  `idJeux` int(11) NOT NULL,
  `max` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`idBoisson`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`),
  ADD KEY `idCompte` (`idCompte`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `compose`
--
ALTER TABLE `compose`
  ADD KEY `idCommande` (`idCommande`),
  ADD KEY `idArticle` (`idArticle`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`idCompte`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`idIngredient`);

--
-- Index pour la table `librairiejeux`
--
ALTER TABLE `librairiejeux`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_message_room` (`idRoom`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `message_prive`
--
ALTER TABLE `message_prive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClient1` (`idClient1`),
  ADD KEY `idClient2` (`idClient2`);

--
-- Index pour la table `ordinateur`
--
ALTER TABLE `ordinateur`
  ADD PRIMARY KEY (`idOrdi`),
  ADD KEY `idSalle` (`idSalle`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD KEY `fk_participe_tournoi` (`idTournoi`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`idClient`,`idJeu`),
  ADD KEY `fk_jeu` (`idJeu`);

--
-- Index pour la table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`idPizza`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD KEY `idPizza` (`idPizza`),
  ADD KEY `idIngredient` (`idIngredient`);

--
-- Index pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD PRIMARY KEY (`idTournoi`),
  ADD KEY `idJoueur` (`idJoueur`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`idSalle`);

--
-- Index pour la table `tournoi`
--
ALTER TABLE `tournoi`
  ADD PRIMARY KEY (`idTournoi`),
  ADD UNIQUE KEY `idTournoi` (`idJeux`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `idBoisson` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `idCompte` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `librairiejeux`
--
ALTER TABLE `librairiejeux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT pour la table `message_prive`
--
ALTER TABLE `message_prive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ordinateur`
--
ALTER TABLE `ordinateur`
  MODIFY `idOrdi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `idPizza` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `idSalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_idCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD CONSTRAINT `fk_boissonCategorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_idCompte` FOREIGN KEY (`idCompte`) REFERENCES `compte` (`idCompte`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_clientCommande` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `compose`
--
ALTER TABLE `compose`
  ADD CONSTRAINT `fk_idArticle` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `fk_idCommande` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`idCommande`);

--
-- Contraintes pour la table `librairiejeux`
--
ALTER TABLE `librairiejeux`
  ADD CONSTRAINT `fk_categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_clientMessage` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `fk_room` FOREIGN KEY (`idRoom`) REFERENCES `room` (`id`);

--
-- Contraintes pour la table `message_prive`
--
ALTER TABLE `message_prive`
  ADD CONSTRAINT `fk_client1` FOREIGN KEY (`idClient1`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `fk_client2` FOREIGN KEY (`idClient2`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `ordinateur`
--
ALTER TABLE `ordinateur`
  ADD CONSTRAINT `FK_idSalle` FOREIGN KEY (`idSalle`) REFERENCES `salle` (`idSalle`);

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `fk_clientTournoi` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `fk_participe_tournoi` FOREIGN KEY (`idTournoi`) REFERENCES `tournoi` (`idTournoi`);

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `fk_jeu` FOREIGN KEY (`idJeu`) REFERENCES `librairiejeux` (`id`);

--
-- Contraintes pour la table `pizza`
--
ALTER TABLE `pizza`
  ADD CONSTRAINT `fk_categoriePizza` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `fk_ingredientRecette` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`),
  ADD CONSTRAINT `fk_pizzaRecette` FOREIGN KEY (`idPizza`) REFERENCES `pizza` (`idPizza`);

--
-- Contraintes pour la table `resultat`
--
ALTER TABLE `resultat`
  ADD CONSTRAINT `fk_clientResultat` FOREIGN KEY (`idJoueur`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `fk_resultat_tournoi` FOREIGN KEY (`idTournoi`) REFERENCES `tournoi` (`idTournoi`);

--
-- Contraintes pour la table `tournoi`
--
ALTER TABLE `tournoi`
  ADD CONSTRAINT `fk_jeux` FOREIGN KEY (`idJeux`) REFERENCES `librairiejeux` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
