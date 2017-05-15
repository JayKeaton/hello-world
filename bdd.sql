


--
-- Base de données: `error404`
--
CREATE DATABASE `error404` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `error404`;




CREATE TABLE categories(
  idCategorie INTEGER PRIMARY KEY AUTO_INCREMENT,
  code VARCHAR(255),
  langue VARCHAR(255),
  traduction VARCHAR(255)
);



CREATE TABLE services (
  idService INTEGER PRIMARY KEY AUTO_INCREMENT,
  validation BOOLEAN DEFAULT false,
  codePostal INTEGER,
  ville VARCHAR(255),
  rue VARCHAR(255),
  numéro INTEGER,
  categorie VARCHAR(255),
  telephone VARCHAR(20),
  mail VARCHAR(255),
  lien_site VARCHAR(255),
  idContributeur INTEGER
    REFERENCES utilisateurs(idUtilisateur) ON DELETE SET NULL
);

CREATE TABLE seances(
  idSeance INTEGER PRIMARY KEY AUTO_INCREMENT,
  date DATE,
  idService INTEGER
    REFERENCES services(idService)
);




CREATE TABLE descriptions(
  idDescription INTEGER PRIMARY KEY AUTO_INCREMENT,
  nom VARCHAR(255),
  texte TEXT,
  langue VARCHAR(255),
  idService INTEGER
    REFERENCES services(idService) ON DELETE CASCADE
);




CREATE TABLE utilisateurs (
  idUtilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
  pseudo VARCHAR(50) NOT NULL UNIQUE,
  mail VARCHAR(255),
  mdp VARCHAR(255) NOT NULL,
  avatar VARCHAR(255),
  nom VARCHAR(100),
  prenom VARCHAR(100),
  dateNaissance DATE,
  verification BOOLEAN DEFAULT false,
  cle VARCHAR(255),
  adresse VARCHAR(255),
  droits VARCHAR(20),
  telephone VARCHAR(20)
);




CREATE TABLE favoris(
  idFavoris INTEGER PRIMARY KEY AUTO_INCREMENT,
  idService INTEGER NOT NULL
    REFERENCES services(idService) ON DELETE CASCADE,
  idUtilisateur INTEGER NOT NULL
    REFERENCES utilisateurs(idUtilisateur) ON DELETE CASCADE
);




CREATE TABLE commentaires(
  idCommentaire INTEGER PRIMARY KEY AUTO_INCREMENT,
  note INTEGER check(note >= 0 AND note <= 20),
  texte TEXT,
  date DATE,
  heure TIME,
  censure BOOLEAN DEFAULT false,
  idUtilisateur INTEGER
    REFERENCES utilisateurs(idUtilisateur) ON DELETE CASCADE,
  idService INTEGER NOT NULL
    REFERENCES services(idService) ON DELETE CASCADE,
  idSeance INTEGER NOT NULL
    REFERENCES seances(idSeance) ON DELETE CASCADE
);
