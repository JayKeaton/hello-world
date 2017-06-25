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
  geolocalisation VARCHAR(255),
  categorie VARCHAR(255),
  telephone VARCHAR(20),
  email VARCHAR(255),
  lien_site VARCHAR(255),
  noteDeMAJ VARCHAR(255),
  censure BOOLEAN,
  adresseImage VARCHAR(255),
  note FLOAT check(note >= 0 AND note <= 5),
  idUtilisateur INTEGER
    REFERENCES utilisateurs(idUtilisateur) ON DELETE SET NULL
);


CREATE TABLE seances(
  idSeance INTEGER PRIMARY KEY AUTO_INCREMENT,
  nom TEXT,
  description TEXT,
  date DATE,
  heure TIME,
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




-- Utilisateurs --
INSERT INTO utilisateurs( `pseudo`, `email`, `mdp`, `avatar`, `nom`, `prenom`, `dateNaissance`, `verification`, `adresse`, `droits`, `telephone`) VALUES ("Camille","camille.durand@essai.com",sha1("essai"),"avatar1.jpg","Durand","Camille","1980-06-12",1,"aucune","utilisateur","0600000000");
INSERT INTO utilisateurs( `pseudo`, `email`, `mdp`, `avatar`, `nom`, `prenom`, `dateNaissance`, `verification`, `adresse`, `droits`, `telephone`) VALUES ("Yasmine","yasmine.abdi@essai.com",sha1("t"),"avatar2.jpg","Abdi","Yasmine","1985-03-11",1,"1 rue Vincent Scotto Paris","contributeur","0611111111");
INSERT INTO utilisateurs( `pseudo`, `email`, `mdp`, `avatar`, `nom`, `prenom`, `dateNaissance`, `verification`, `adresse`, `droits`, `telephone`) VALUES ("test","test@test",sha1("test"),"avatar3.jpg","testN","testP","1992-06-12",1,"test","admin","0645884521");


-- Categories
INSERT INTO categories(code, langue, traduction) VALUES('sante', 'fr', 'Santé');
INSERT INTO categories(code, langue, traduction) VALUES('logement', 'fr', 'Logement');
INSERT INTO categories(code, langue, traduction) VALUES('restauration', 'fr', 'Restauration');




-- Ajout des services :

-- Les Restos du Coeur
INSERT INTO `services`(idUtilisateur, `nom`,`dateAjout`,`validation`, `adresse`, geolocalisation, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`,`adresseImage`) VALUES (2, "Les Restos du Coeur","2014-04-15-15-30-52",1,"37 rue Hermel Paris", '48.8938175,2.3455129',"restauration","0625523251","0003@0003","https://www.restosducoeur.org/", "Message du contributeur pour l'admin en cas de mise à jour de son service","isep.jpg");
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Les Restaurants du cœur – Les Relais du cœur, connus sous le nom de Les Restos du cœur, est une association de loi 1901 à but non lucratif et reconnue d'utilité publique créée en France, par Coluche en 1985","fr",1);
INSERT INTO `favoris`(`idService`, `idUtilisateur`) VALUES (1,1);


-- Amitié Villette
INSERT INTO `services`(idUtilisateur, `nom`,`dateAjout`,`validation`, `adresse`, geolocalisation, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES (2, "Amitié Villette","2014-04-11-15-30-52",1,"3 place de Joinville Paris", '48.8893835,2.3803440', "restauration","0625523251","0004@0004","http://www.solipam.fr/Amitie-Villette-Epicerie-solidaire,118", "Message du contributeur pour l'admin en cas de mise à jour de son service");
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Les épiceries sociales vendent des produits d’alimentation et d’hygiène. Les conditions d’accès sont différentes selon les structures, ces renseignements peuvent être obtenus auprès des services sociaux ou des structures elles-mêmes. Ouverte le vendredi de 14 h 30 à 17 h 30","fr",2);


-- Corot Entraide
INSERT INTO `services`(idUtilisateur, `nom`,`dateAjout`,`validation`, `adresse`, geolocalisation, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES (2, "Corot Entraide","2014-04-15-15-30-52",1,"4 rue Corot Paris", '48.8470476,2.2700980', "restauration","0625523251","0005@0005","http://www.corot-entraide.org/", "Message du contributeur pour l'admin en cas de mise à jour de son service");
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Depuis 1973, le Centre Corot Entraide d'Auteuil est engagé dans le soutien et l'aide aux personnes exclues : familles démunies et personnes isolées du quartier, personnes en grande précarité à Paris, jeunes de 18 à 25 ans sans domicile fixe à Paris.","fr",3);


-- La Courte Échelle
INSERT INTO `services`(idUtilisateur, `nom`,`dateAjout`,`validation`, `adresse`, geolocalisation, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES (2, "La Courte Échelle","2014-04-15-15-30-52",0,"8 rue Gaston Tessier Paris", '48.8957343,2.3733928', "restauration","0625523251","0006@0006","http://www.solipam.fr/La-Courte-Echelle,112", "Message du contributeur pour l'admin en cas de mise à jour de son service");
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Les épiceries sociales vendent des produits d’alimentation et d’hygiène. Les conditions d’accès sont différentes selon les structures, ces renseignements peuvent être obtenus auprès des services sociaux ou des structures elles-mêmes.Ouverte du lundi au vendredi 9 h-12 h","fr",4);


-- Magaliménil
INSERT INTO `services`(idUtilisateur, `nom`,`dateAjout`,`validation`, `adresse`, geolocalisation, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES (2, "Magaliménil","2014-04-15-15-30-52",1,"6 rue d'Eupatoria Paris", '48.8685633,2.3872638', "restauration","0625523251","0007@0007","http://www.notredamedelacroix.com/magalimenil/", "Message du contributeur pour l'admin en cas de mise à jour de son service");
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("L’épicerie sociale Magalimenil (20e) aide des familles en grande précarité en leur proposant une quarantaine de produits de base à un prix symbolique. Chaque année, 120 familles du quartier de Ménilmontant bénéficient de cette aide, adressées à l’épicerie par les travailleurs sociaux. En priorité pour les habitants du quartier de Ménilmontant sur orientation d’une assistante sociale. ","fr",5);


-- Le Marché Solidaire
INSERT INTO `services`(idUtilisateur, `nom`,`dateAjout`,`validation`, `adresse`, geolocalisation, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES (2, "Le Marché Solidaire","2014-04-15-15-30-52",1,"12 Rue de l'Eure Paris", '48.8326698,2.3218056',"restauration","0625523251","0008@0008","http://lemarchesolidaire.fr/", "Message du contributeur pour l'admin en cas de mise à jour de son service");
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Le Marché Solidaire, association loi 1901, gère et anime l’épicerie solidaire du 14ème arrondissement de Paris. L’association permet à des familles orientées par les services sociaux de venir faire des achats à moindre coût dans un espace libre-service. Les économies ainsi faites permettent à ces familles (du 14e arrondissement de Paris uniquement) de réaliser un projet social et familial élaboré avec l’aide d’un travailleur social. Elles sont accueillies dans un espace convivial et accompagnées dans leur parcours le temps de leur accès à l’épicerie.","fr",6);


-- Médecins Sans Frontières
INSERT INTO `services`(idUtilisateur, `nom`,`dateAjout`,`validation`, `adresse`, geolocalisation, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES (2, "Médecins Sans Frontières","2014-04-15-15-30-52",1,"8 Rue Saint-Sabin, 75011 Paris", '48.8550333,2.3722008',"sante","0625523251","0001@0001","http://www.msf.fr/", "Message du contributeur pour l'admin en cas de mise à jour de son service");
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Médecins sans frontières est une organisation caritative privée à but humanitaire d'origine française et dont le Bureau international siège à Genève.","fr",7);
INSERT INTO `commentaires`( `note`, `texte`, `date`, `heure`, `censure`, `idUtilisateur`, `idService`, `idSeance`) VALUES (3.5,"Merci de m'avoir aidé","2017-02-15","16:16:16",0,1,7,7);
INSERT INTO `commentaires`( `note`, `texte`, `date`, `heure`, `censure`, `idUtilisateur`, `idService`, `idSeance`) VALUES (4.5,"Très satisfaisant","2017-04-16","12:12:12",0,2,7,7);
INSERT INTO `seances`(`nom`, `description`, `date`, `heure`, `capacite`, `idService`) VALUES ("Dr. Nills","Consultation avec le Dr. Nills de 10h à 13h","2017-09-02", "10:30:00", 6,7);
INSERT INTO `inscrits`(`idUtilisateur`, `idSeance`) VALUES(1,1);
INSERT INTO `seances`(`nom`, `description`, `date`, `heure`, `capacite`, `idService`) VALUES ("Dr. Tars","Consultation avec le Dr. Tars de 14h à 18h","2017-05-02", "14:00:00", 8,7);



