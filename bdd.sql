




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
  nom VARCHAR(255),
  codePostal INTEGER,
  adresse VARCHAR(255),
  categorie VARCHAR(255),
  telephone VARCHAR(20),
  email VARCHAR(255),
  lien_site VARCHAR(255),
  idUtilisateur INTEGER
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
  texte TEXT,
  langue VARCHAR(255),
  idService INTEGER
    REFERENCES services(idService) ON DELETE CASCADE
);




CREATE TABLE utilisateurs (
  idUtilisateur INTEGER PRIMARY KEY AUTO_INCREMENT,
  pseudo VARCHAR(50) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  mdp VARCHAR(255) NOT NULL,
  avatar VARCHAR(255),
  prenom VARCHAR(100),
  nom VARCHAR(100),
  sexe VARCHAR(10),
  dateNaissance DATE,
  verification BOOLEAN DEFAULT false,
  cle VARCHAR(255),
  codePostal INTEGER,
  adresse VARCHAR(255),
  geolocalisation BOOLEAN,
  telephone VARCHAR(20),
  droits VARCHAR(20)
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
  note FLOAT check(note >= 0 AND note <= 5),
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



CREATE TABLE inscrits (
  idInscrit INTEGER PRIMARY KEY AUTO_INCREMENT,
  idUtilisateur INTEGER
    REFERENCES utilisateurs(idUtilisateur) ON DELETE SET NULL,
  idSeance INTEGER
    REFERENCES seances(idSeance) ON DELETE SET NULL
);

INSERT INTO `services`(`nom`,`validation`, `adresse`, `categorie`, `telephone`, `email`, `lien_site`) VALUES ("SoinPourTous",0,"5 rue de Rivoli Paris","accompagnement médical","0625523251","0001@0001","http://www.dofus.com/fr");
INSERT INTO `services`(`nom`,`validation`,`adresse`, `categorie`, `telephone`, `email`, `lien_site`) VALUES ("NourriturePourTous",0,"21 Rue Vieille du Temple Paris","logement","0658921542","0002@0002","http://euw.leagueoflegends.com/fr");
INSERT INTO `utilisateurs`( `pseudo`, `email`, `mdp`, `avatar`, `nom`, `prenom`, `dateNaissance`, `verification`, adresse, `droits`, `telephone`) VALUES ("jean eude","jean.eude@kikoolol.fr","saphir","avatar-j-e.jpg","jean-eude","debeaujardin","1982-06-02",1,"22 rue Vieille du Temple Paris","utilisateur","0645895121");
INSERT INTO `utilisateurs`( `pseudo`, `email`, `mdp`, `avatar`, `nom`, `prenom`, `dateNaissance`, `verification`, `adresse`, `droits`, `telephone`) VALUES ("legyllith","dieu.de.la.bonte@divinité.ciel","gentil","avatar-legyllith.jpg","Aurélien","dreams","1992-06-12",1,"100 rue des archives Paris","contributeur","0645884521");
INSERT INTO `descriptions`(`texte`, `langue`) VALUES ("Nous serons heureux de vous soigné","Jérémy");
INSERT INTO `descriptions`(`texte`, `langue`) VALUES ("Nous vous acciullerons avec plaisir","Jérémy");
INSERT INTO `categories`(`code`, `langue`, `traduction`) VALUES ("test","Français","testTest");
INSERT INTO `commentaires`( `note`, `texte`, `date`, `heure`, `censure`, `idUtilisateur`, `idService`, `idSeance`) VALUES (3.5,"Alice was beginning to get very tired of sitting by her sister on the bank, and of having nothing to do: once or twice she had peeped into the book her sister was reading, but it had no pictures or conversations in it, ‘and what is the use of a book,’ thought Alice ‘without pictures or conversations?","1865-11-18","16:16:16",0,1,1,1);
INSERT INTO `commentaires`( `note`, `texte`, `date`, `heure`, `censure`, `idUtilisateur`, `idService`, `idSeance`) VALUES (4.2,"Très satisfaisant","2017-04-16","12:12:12",0,2,1,1);
INSERT INTO `favoris`(`idService`, `idUtilisateur`) VALUES (1,1);
INSERT INTO `seances`(`date`, `idService`) VALUES ("2017-09-02",1);
INSERT INTO `inscrits`(`idUtilisateur`, `idSeance`) VALUES(1,1);
