


--
-- Base de données: `APP-MVC`
--
CREATE DATABASE `error404` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `error404`;


-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--



CREATE TABLE Services (
  idService INTEGER PRIMARY KEY AUTO_INCREMENT,
  validation BOOLEAN DEFAULT false,
  localisation VARCHAR(255),
  categorie VARCHAR(255),
  telephone INTEGER(20),
  mail VARCHAR(255),
  lien_site VARCHAR(255),
  idContributeur INTEGER
    REFERENCES Utilisateurs(idUtilisateur) ON DELETE SET NULL
);




CREATE TABLE Descriptions(
  idDescription INTEGER PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255),
  texte TEXT,
  langue VARCHAR(255),
  idService INTEGER
    REFERENCES Services(idService) ON DELETE CASCADE
);




CREATE TABLE Utilisateurs (
  idUtilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
  identifiant VARCHAR(50) NOT NULL UNIQUE,
  mdp VARCHAR(255) NOT NULL,
  nom VARCHAR(100),
  prenom VARCHAR(100),
  mail VARCHAR(255),
  verification BOOLEAN DEFAULT false,
  droits VARCHAR(20),
  telephone VARCHAR(20)
);




CREATE TABLE Favoris(
  idFavoris INTEGER PRIMARY KEY AUTO_INCREMENT,
  idService INTEGER NOT NULL
    REFERENCES Services(idService) ON DELETE CASCADE,
  idUtilisateur INTEGER NOT NULL
    REFERENCES Utilisateurs(idUtilisateur) ON DELETE CASCADE
);




CREATE TABLE Commentaires(
  idCommentaire INTEGER PRIMARY KEY AUTO_INCREMENT,
  note INTEGER check(note >= 0 AND note <= 20),
  texte TEXT,
  date DATE,
  heure TIME,
  censure BOOLEAN DEFAULT false,
  idUtilisateur INTEGER
    REFERENCES Utilisateurs(idUtilisateur) ON DELETE CASCADE,
  idService INTEGER NOT NULL
    REFERENCES Services(idService) ON DELETE CASCADE
);
