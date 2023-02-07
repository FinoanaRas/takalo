CREATE database takalo;

use takalo;

CREATE TABLE user(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL,
    mdp VARCHAR(20) NOT NULL,
    estAdmin VARCHAR(5) NOT NULL
);

INSERT INTO user VALUES(1, 'SMITH', '0000', 'oui');
INSERT INTO user VALUES(2, 'JONES', '1111', 'oui');
INSERT INTO user VALUES(3, 'BROWN', '2222', 'non');
INSERT INTO user VALUES(4, 'JOHNSON', '3333', 'non');

CREATE TABLE categories(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(20) NOT NULL
);

INSERT INTO categories VALUES(1, 'VETEMENT');
INSERT INTO categories VALUES(2, 'VOITURE');
INSERT INTO categories VALUES(3, 'MAISON');

CREATE TABLE objets(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titre VARCHAR(20) NOT NULL,
    description VARCHAR(50) NOT NULL,
    prix decimal(9,2) NOT NULL,
    idUser INT NOT NULL,
    idCategorie INT NOT NULL,
    foreign key (idUser) references user(id),
    foreign key (idCategorie) references categories(id)
);

INSERT INTO objets VALUES(1, 'T-SHIRT', 'Bon etat', 50, 3, 1);
INSERT INTO objets VALUES(2, 'PNEU', 'Bon occasion', 150, 3, 2);
INSERT INTO objets VALUES(3, 'SHORT', 'Bon etat', 40, 4, 1);
INSERT INTO objets VALUES(4, 'SALON', 'Nouvelle', 100, 4, 3);

CREATE TABLE photo(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idObjet INT NOT NULL,
    nom VARCHAR(20) NOT NULL,
    foreign key (idObjet) references objets(id)
);

INSERT INTO photo VALUES(1, 1, 't-shirt.jpg');
INSERT INTO photo VALUES(2, 2, 'short.jpg');
INSERT INTO photo VALUES(3, 3, 'pneu.jpg');
INSERT INTO photo VALUES(4, 4, 'salon.jpg');

CREATE TABLE proposition(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    idObjet1 INT NOT NULL,
    idObjet2 INT NOT NULL,
    status INT NOT NULL,
    foreign key (idObjet1) references objets(id),
    foreign key (idObjet2) references objets(id)
);

INSERT INTO proposition VALUES(1, 1, 3, 5);
INSERT INTO proposition VALUES(2, 2, 4, 10);
INSERT INTO proposition VALUES(3, 1, 4, 0);