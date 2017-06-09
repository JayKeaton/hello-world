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

CREATE TABLE emailsAdmin(
  idEmail INTEGER PRIMARY KEY AUTO_INCREMENT,
  cle VARCHAR(255),
  email VARCHAR(255)
);

CREATE TABLE services (
  idService INTEGER PRIMARY KEY AUTO_INCREMENT,
  validation BOOLEAN DEFAULT false,
  nom VARCHAR(255),
  dateAjout TIMESTAMP,
  codePostal INTEGER,
  adresse VARCHAR(255),
  categorie VARCHAR(255),
  telephone VARCHAR(20),
  email VARCHAR(255),
  lien_site VARCHAR(255),
  noteDeMAJ VARCHAR(255),
  censure BOOLEAN,
  adresseImage VARCHAR(255),
  idUtilisateur INTEGER
    REFERENCES utilisateurs(idUtilisateur) ON DELETE SET NULL
);

CREATE TABLE seances(
  idSeance INTEGER PRIMARY KEY AUTO_INCREMENT,
  date DATE,
  capacite INTEGER,
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


INSERT INTO `services`(`nom`,`dateAjout`,`validation`, `adresse`, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES ("SoinPourTous","2014-04-15-15-30-52",0,"5 rue de Rivoli Paris","soin","0625523251","0001@0001","http://www.dofus.com/fr", "testtestestestestestestestestestestestestestestestest");
INSERT INTO `services`(`nom`,`dateAjout`,`validation`,`adresse`, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES ("NourriturePourTous","2014-05-15-15-30-52",0,"21 Rue Vieille du Temple Paris","logement","0658921542","0002@0002","http://euw.leagueoflegends.com/fr",'jqzofjoqjfoiqjfoisjgoijojreoijeijsoigjsgoisjgoijseoigjs');
INSERT INTO `services`(`idService`, `validation`, `nom`, `adresse`, `categorie`, `telephone`, `email`, `lien_site`, `idUtilisateur`) VALUES ("6","1","Mûre","6, rue Saint-Marc 75002","nourriture","0","exemple@gmail.com","http://www.mure-restaurant.com/","220");
INSERT INTO `utilisateurs`( `pseudo`, `email`, `mdp`, `avatar`, `nom`, `prenom`, `dateNaissance`, `verification`, `adresse`, `droits`, `telephone`) VALUES ("test","test@test",sha1("test"),"avatar3.jpg","testN","testP","1992-06-12",1,"test","contributeur","0645884521");
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Nous serons heureux de vous soigner","fr",1);
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Nous vous accueillerons avec plaisir","fr",2);
INSERT INTO `categories`(`code`, `langue`, `traduction`) VALUES ("test","Français","testTest");
INSERT INTO `commentaires`( `note`, `texte`, `date`, `heure`, `censure`, `idUtilisateur`, `idService`, `idSeance`) VALUES (3.5,"Alice was beginning to get very tired of sitting by her sister on the bank, and of having nothing to do: once or twice she had peeped into the book her sister was reading, but it had no pictures or conversations in it, 'and what is the use of a book,' thought Alice 'without pictures or conversations?'","1865-11-18","16:16:16",0,1,1,1);
INSERT INTO `commentaires`( `note`, `texte`, `date`, `heure`, `censure`, `idUtilisateur`, `idService`, `idSeance`) VALUES (4.2,"Très satisfaisant","2017-04-16","12:12:12",0,2,1,1);
INSERT INTO `favoris`(`idService`, `idUtilisateur`) VALUES (1,1);
INSERT INTO `seances`(`date`, `idService`) VALUES ("2017-09-02",1);
INSERT INTO `inscrits`(`idUtilisateur`, `idSeance`) VALUES(1,1);

INSERT INTO categories(code, langue, traduction) VALUES('sante', 'fr', 'Santé');
INSERT INTO categories(code, langue, traduction) VALUES('sante', 'en', 'Health');
INSERT INTO categories(code, langue, traduction) VALUES('logement', 'fr', 'Logement');
INSERT INTO categories(code, langue, traduction) VALUES('logement', 'en', 'Housing');
INSERT INTO categories(code, langue, traduction) VALUES('restauration', 'fr', 'Restauration');
INSERT INTO categories(code, langue, traduction) VALUES('restauration', 'en', 'Food');


