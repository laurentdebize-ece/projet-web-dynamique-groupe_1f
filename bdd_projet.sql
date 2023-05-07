DROP DATABASE IF EXISTS BDMYSKILLS;
CREATE DATABASE BDMYSKILLS;
USE BDMYSKILLS;
DROP TABLE IF EXISTS Administrateur;
DROP TABLE IF EXISTS Professeur;
DROP TABLE IF EXISTS Etudiant;

CREATE TABLE Administrateur(
    Nom VARCHAR(100) NOT NULL;
    Prenom VARCHAR(100) NOT NULL;
    Email VARCHAR(100) NOT NULL UNIQUE;
    MotDePasse VARCHAR(100) NOT NULL;
    Poste VARCHAR(100) NOT NULL;
);

CREATE TABLE Professeur(
    Nom VARCHAR(100) NOT NULL;
    Prenom VARCHAR(100) NOT NULL;
    Email VARCHAR(100) NOT NULL UNIQUE;
    MotDePasse VARCHAR(100) NOT NULL;
    Classes VARCHAR(200) NOT NULL;
);

CREATE TABLE Etudiant(
    Nom VARCHAR(100) NOT NULL;
    Prenom VARCHAR(100) NOT NULL;
    Email VARCHAR(100) NOT NULL UNIQUE;
    MotDePasse VARCHAR(100) NOT NULL;
    Groupe int(10) NOT NULL;
    Promo VARCHAR (10) NOT NULL;
);