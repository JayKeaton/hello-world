


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
  numero VARCHAR(255),
  adresse VARCHAR(255),
  ville VARCHAR(255),
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

INSERT INTO `services`(`validation`, `codePostal`, `ville`, `rue`, `numéro`, `categorie`, `telephone`, `mail`, `lien_site`) VALUES (0,75000,"Paris","rue de Rivoli",5,"accompagnement médical","0625523251","0001@0001","http://www.dofus.com/fr");
INSERT INTO `services`(`validation`, `codePostal`, `ville`, `rue`, `numéro`, `categorie`, `telephone`, `mail`, `lien_site`) VALUES (0,75000,"Paris","Rue Vieille du Temple",21,"logement","0658921542","0002@0002","http://euw.leagueoflegends.com/fr");
INSERT INTO `utilisateurs`( `pseudo`, `mail`, `mdp`, `avatar`, `nom`, `prenom`, `dateNaissance`, `verification`, `numero`,`adresse`,`ville`, `droits`, `telephone`) VALUES ("jean eude","jean.eude@kikoolol.fr","saphir","avatar-j-e.jpg","jean-eude","debeaujardin","1982-06-02",1,"22","rue Vieille du Temple","Paris","utilisateur","0645895121");
INSERT INTO `utilisateurs`( `pseudo`, `mail`, `mdp`, `avatar`, `nom`, `prenom`, `dateNaissance`, `verification`, `numero`,`adresse`,`ville`, `droits`, `telephone`) VALUES ("legyllith","dieu.de.la.bonte@divinité.ciel","gentil","avatar-legyllith.jpg","Aurélien","dreams","1992-06-12",1,"100","rue des archives","Paris","contributeur","0645884521");
INSERT INTO `descriptions`(`nom`, `texte`, `langue`) VALUES ("soin +","Nous serons heureux de vous soigné","francais");
INSERT INTO `descriptions`( `nom`, `texte`, `langue`) VALUES ("acceillir","Nous vous acciullerons avec plaisir","francais");
