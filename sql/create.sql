DROP TABLE Client_Formation;
DROP TABLE Formation;
DROP TABLE Client;
DROP TABLE Organisme; 
DROP TABLE Utilisateur;


CREATE TABLE Client(
	id INT PRIMARY KEY AUTO_INCREMENT,
	pseudo VARCHAR(256),
	prenom VARCHAR (256),
	nom VARCHAR(256),
	date_de_naissance DATE,
	email VARCHAR(256),
	ville VARCHAR(256),
	adresse VARCHAR(256),
	code_postal INT,
	telephone VARCHAR(256),
	profession VARCHAR(256),	
	mot_de_passe VARCHAR(256),
	profil VARCHAR(256)
);


CREATE TABLE Organisme(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(256),
	email VARCHAR(256),
	ville VARCHAR(256),
	adresse VARCHAR(256),
	code_postal INT,
	telephone VARCHAR(256),
	date_de_creation DATE,
	estValide INT,
	mot_de_passe VARCHAR(256),
	description VARCHAR(256),
	profil VARCHAR(256)
);

CREATE TABLE Utilisateur(
	id INT PRIMARY KEY AUTO_INCREMENT,
	nom VARCHAR(256),
	prenom VARCHAR(256),
	email VARCHAR(256),
	telephone VARCHAR(256),
	type VARCHAR(256),
	mot_de_passe VARCHAR(10)
);

CREATE TABLE Formation(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_organisme INT,
	nom VARCHAR(256),
	cout INT,
	duree VARCHAR(256),
	adresse VARCHAR(256),
	domaine VARCHAR(256),
	diplome VARCHAR(256),
	pre_requis VARCHAR(256),
	perspectives VARCHAR(256),
	description VARCHAR(256),
	estValide INT,
	FOREIGN KEY fk_organisme(id_organisme)REFERENCES Organisme(id)
);

CREATE TABLE Client_Formation(
	id INT PRIMARY KEY AUTO_INCREMENT,
	id_formation INT,
	id_client INT,
	FOREIGN KEY fk_formation(id_formation)REFERENCES Formation(id),
	FOREIGN KEY fk_client(id_client)REFERENCES Client(id)
);






