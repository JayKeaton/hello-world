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


INSERT INTO `services`(`nom`,`dateAjout`,`validation`, `adresse`, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`,`adresseImage`) VALUES ("Les Restos du Coeur","2014-04-15-15-30-52",1,"37 rue Hermel Paris","restauration","0625523251","0003@0003","https://www.restosducoeur.org/", "testtestestestestestestestestestestestestestestestest","isep.jpg");
INSERT INTO `services`(`nom`,`dateAjout`,`validation`, `adresse`, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES ("Amitié Villette ","2014-04-11-15-30-52",1,"3 place de Joinville Paris","restauration","0625523251","0004@0004","http://www.solipam.fr/Amitie-Villette-Epicerie-solidaire,118", "testtestestestestestestestestestestestestestestestest");
INSERT INTO `services`(`nom`,`dateAjout`,`validation`, `adresse`, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES ("Corot Entraide","2014-04-15-15-30-52",1,"4 rue Corot Paris","restauration","0625523251","0005@0005","http://www.corot-entraide.org/", "testtestestestestestestestestestestestestestestestest");
INSERT INTO `services`(`nom`,`dateAjout`,`validation`, `adresse`, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES ("La Courte Échelle ","2014-04-15-15-30-52",0,"8 rue Gaston Tessier Paris","restauration","0625523251","0006@0006","http://www.solipam.fr/La-Courte-Echelle,112", "testtestestestestestestestestestestestestestestestest");
INSERT INTO `services`(`nom`,`dateAjout`,`validation`, `adresse`, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES ("Magaliménil ","2014-04-15-15-30-52",1,"6 rue d'Eupatoria Paris","restauration","0625523251","0007@0007","http://www.notredamedelacroix.com/magalimenil/", "testtestestestestestestestestestestestestestestestest");
INSERT INTO `services`(`nom`,`dateAjout`,`validation`, `adresse`, `categorie`, `telephone`, `email`, `lien_site`,`noteDeMAJ`) VALUES ("Le Marché Solidaire","2014-04-15-15-30-52",1,"12 Rue de l'Eure Paris","restauration","0625523251","0008@0008","http://lemarchesolidaire.fr/", "testtestestestestestestestestestestestestestestestest");
INSERT INTO `services`(`validation`, `nom`, `adresse`, `categorie`, `telephone`, `email`, `lien_site`, `idUtilisateur`) VALUES ("1","Mûre","6 rue Saint-Marc Paris","restauration","0","exemple@gmail.com","http://www.mure-restaurant.com/","220");

INSERT INTO `utilisateurs`( `pseudo`, `email`, `mdp`, `avatar`, `nom`, `prenom`, `dateNaissance`, `verification`, `adresse`, `droits`, `telephone`) VALUES ("essai","essai@essai",sha1("essai"),"avatar1.jpg","essaiN","essaiP","1999-06-12",1,"essai","utilisateur","0600000000");
INSERT INTO `utilisateurs`( `pseudo`, `email`, `mdp`, `avatar`, `nom`, `prenom`, `dateNaissance`, `verification`, `adresse`, `droits`, `telephone`) VALUES ("t","t@t",sha1("t"),"avatar2.jpg","tN","tP","1998-06-12",1,"t","contributeur","0666666666");
INSERT INTO `utilisateurs`( `pseudo`, `email`, `mdp`, `avatar`, `nom`, `prenom`, `dateNaissance`, `verification`, `adresse`, `droits`, `telephone`) VALUES ("test","test@test",sha1("test"),"avatar3.jpg","testN","testP","1992-06-12",1,"test","admin","0645884521");


INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Les Restaurants du cœur – Les Relais du cœur, connus sous le nom de Les Restos du cœur, est une association de loi 1901 à but non lucratif et reconnue d'utilité publique créée en France, par Coluche en 1985","fr",1);
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Les épiceries sociales vendent des produits d’alimentation et d’hygiène. Les conditions d’accès sont différentes selon les structures, ces renseignements peuvent être obtenus auprès des services sociaux ou des structures elles-mêmes. Ouverte le vendredi de 14 h 30 à 17 h 30","fr",2);
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Depuis 1973, le Centre Corot Entraide d'Auteuil est engagé dans le soutien et l'aide aux personnes exclues : familles démunies et personnes isolées du quartier, personnes en grande précarité à Paris, jeunes de 18 à 25 ans sans domicile fixe à Paris.","fr",3);
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Les épiceries sociales vendent des produits d’alimentation et d’hygiène. Les conditions d’accès sont différentes selon les structures, ces renseignements peuvent être obtenus auprès des services sociaux ou des structures elles-mêmes.Ouverte du lundi au vendredi 9 h-12 h","fr",4);
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("L’épicerie sociale Magalimenil (20e) aide des familles en grande précarité en leur proposant une quarantaine de produits de base à un prix symbolique. Chaque année, 120 familles du quartier de Ménilmontant bénéficient de cette aide, adressées à l’épicerie par les travailleurs sociaux. En priorité pour les habitants du quartier de Ménilmontant sur orientation d’une assistante sociale. ","fr",5);
INSERT INTO `descriptions`(`texte`, `langue`,`idService`) VALUES ("Le Marché Solidaire, association loi 1901, gère et anime l’épicerie solidaire du 14ème arrondissement de Paris. L’association permet à des familles orientées par les services sociaux de venir faire des achats à moindre coût dans un espace libre-service. Les économies ainsi faites permettent à ces familles (du 14e arrondissement de Paris uniquement) de réaliser un projet social et familial élaboré avec l’aide d’un travailleur social. Elles sont accueillies dans un espace convivial et accompagnées dans leur parcours le temps de leur accès à l’épicerie.","fr",6);
INSERT INTO `categories`(`code`, `langue`, `traduction`) VALUES ("test","Français","testTest");
INSERT INTO `commentaires`( `note`, `texte`, `date`, `heure`, `censure`, `idUtilisateur`, `idService`, `idSeance`) VALUES (3.5,"Alice was beginning to get very tired of sitting by her sister on the bank, and of having nothing to do: once or twice she had peeped into the book her sister was reading, but it had no pictures or conversations in it, 'and what is the use of a book,' thought Alice 'without pictures or conversations?'","1865-11-18","16:16:16",0,1,1,1);
INSERT INTO `commentaires`( `note`, `texte`, `date`, `heure`, `censure`, `idUtilisateur`, `idService`, `idSeance`) VALUES (4.2,"Très satisfaisant","2017-04-16","12:12:12",0,2,1,1);
INSERT INTO `favoris`(`idService`, `idUtilisateur`) VALUES (1,1);
INSERT INTO `seances`(`nom`, `description`, `date`, `heure`, `capacite`, `idService`) VALUES ("test1","testTestTestTest","2017-09-02", "19:32:00", 30,1);
INSERT INTO `inscrits`(`idUtilisateur`, `idSeance`) VALUES(1,1);

INSERT INTO categories(code, langue, traduction) VALUES('sante', 'fr', 'Santé');
INSERT INTO categories(code, langue, traduction) VALUES('sante', 'en', 'Health');
INSERT INTO categories(code, langue, traduction) VALUES('logement', 'fr', 'Logement');
INSERT INTO categories(code, langue, traduction) VALUES('logement', 'en', 'Housing');
INSERT INTO categories(code, langue, traduction) VALUES('restauration', 'fr', 'Restauration');
INSERT INTO categories(code, langue, traduction) VALUES('restauration', 'en', 'Food');