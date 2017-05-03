


--
-- Base de données: `APP-MVC`
--
CREATE DATABASE `APP-MVC` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `APP-MVC`;


-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

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
)