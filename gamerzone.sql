-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 12 Février 2016 à 18:31
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
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `isAdmin` tinyint(4) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `date_naissance` date NOT NULL,
  `login` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `idCompte`, `isAdmin`, `nom`, `prenom`, `mail`, `date_naissance`, `login`, `pwd`) VALUES
(1, 1, 0, 'Delamotte', 'Hector', 'hector.delamotte@mail.com', '1980-02-12', 'hector', 'azerty'),
(2, 2, 0, 'Gildas', 'Philippe', 'philippe.gilda@mail.fr', '1975-05-05', 'phil', '12345'),
(3, 2, 0, 'Vareille', 'Damien', 'daminoudu87@mail.com', '2000-06-04', 'daminou', 'dam');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `dateCommande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `contenu` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idClient` int(11) NOT NULL,
  `idRoom` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `message_prive`
--

CREATE TABLE IF NOT EXISTS `message_prive` (
  `id` int(11) NOT NULL,
  `idClient1` int(11) NOT NULL,
  `idClient2` int(11) NOT NULL
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `idCategorie` (`idCategorie`);

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
  ADD KEY `fk_tournoi_jeux` (`idJeux`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
  ADD CONSTRAINT `fk_categorieJeux` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_clientMessage` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `fk_message_room` FOREIGN KEY (`idRoom`) REFERENCES `room` (`id`);

--
-- Contraintes pour la table `message_prive`
--
ALTER TABLE `message_prive`
  ADD CONSTRAINT `fk_client2` FOREIGN KEY (`idClient2`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `fk_client1` FOREIGN KEY (`idClient1`) REFERENCES `client` (`idClient`);

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
  ADD CONSTRAINT `fk_tournoi_jeux` FOREIGN KEY (`idJeux`) REFERENCES `librairiejeux` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
