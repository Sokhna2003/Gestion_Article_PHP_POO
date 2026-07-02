--  Création de la base de données
CREATE DATABASE `ges_articles`;
USE `ges_articles`;

-- Création de la table des catégories
CREATE TABLE `categories` (
  `id_categorie` INT NOT NULL AUTO_INCREMENT ,
  `nom_categorie` VARCHAR(100) NOT NULL UNIQUE,
PRIMARY KEY (id_categorie)
) 

-- Création de la table des clients
CREATE TABLE `clients` (
  `id_client` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(100) NOT NULL,
  `prenom` VARCHAR(100) NOT NULL,
  `email` VARCHAR(150) NOT NULL UNIQUE,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (id_client)
) 

-- Création de la table des articles avec clé étrangère vers catégories
CREATE TABLE `articles` (
  `id_article` INT NOT NULL AUTO_INCREMENT ,
  `libelle` VARCHAR(255) NOT NULL,
  `id_categorie` INT NOT NULL,
  `contenu` TEXT NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (id_article),
  CONSTRAINT `fk_articles_categories` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`) ON DELETE RESTRICT ON UPDATE CASCADE
) 

-- Insertions des données de test pour les catégories
INSERT INTO `categories` (`nom_categorie`) VALUES 
('Informatique'), 
('Design'), 
('Bureautique'), 
('Marketing');

-- Insertions des données de test pour les clients
INSERT INTO `clients` (`nom`, `prenom`, `email`) VALUES 
('Diop', 'Moussa', 'moussa.diop@email.com'), 
('Ndiaye', 'Fatou', 'fatou.ndiaye@email.com');

--  Insertions des données de test pour les articles
INSERT INTO `articles` (`libelle`, `id_categorie`, `contenu`) VALUES
('Découverte de PHP POO', 1, 'L\'architecture POO avec Namespaces permet de structurer proprement une application.'),
('Les bases de Tailwind CSS', 2, 'Tailwind apporte un système de classes utilitaires redoutable pour intégrer rapidement.');
