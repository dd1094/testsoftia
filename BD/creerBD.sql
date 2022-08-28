drop database if exists testsoftia;
create database testsoftia ;

use testsoftia;

CREATE TABLE Attestation
(
  id_attes   INT  NOT NULL AUTO_INCREMENT,
  mess_attes TEXT NULL    ,
  id_etud    INT  NOT NULL,
  id_conv    INT  NOT NULL,
  PRIMARY KEY (id_attes, id_etud, id_conv)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Convention
(
  id_conv     INT          NOT NULL AUTO_INCREMENT,
  nom_conv    VARCHAR(300) NULL    ,
  nbHeur_conv INT          NULL    ,
  PRIMARY KEY (id_conv)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Etudiant
(
  id_etud     INT          NOT NULL AUTO_INCREMENT,
  nom_etud    VARCHAR(300) NULL    ,
  prenon_etud VARCHAR(300) NULL    ,
  id_conv     INT          NOT NULL,
  PRIMARY KEY (id_etud)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE Etudiant
  ADD CONSTRAINT FK_Convention_TO_Etudiant
    FOREIGN KEY (id_conv)
    REFERENCES Convention (id_conv);

ALTER TABLE Attestation
  ADD CONSTRAINT FK_Etudiant_TO_Attestation
    FOREIGN KEY (id_etud)
    REFERENCES Etudiant (id_etud);

ALTER TABLE Attestation
  ADD CONSTRAINT FK_Convention_TO_Attestation
    FOREIGN KEY (id_conv)
    REFERENCES Convention (id_conv);

        
INSERT INTO `convention` (`nom_conv`, `nbHeur_conv`) VALUES ('PHP', '1');
INSERT INTO `convention` (`nom_conv`, `nbHeur_conv`) VALUES ('HTML', '2');
INSERT INTO `convention` (`nom_conv`, `nbHeur_conv`) VALUES ('Python', '3');
INSERT INTO `convention` (`nom_conv`, `nbHeur_conv`) VALUES ('SQL', '4');
INSERT INTO `convention` (`nom_conv`, `nbHeur_conv`) VALUES ('Java', '5');  

INSERT INTO `etudiant` (`nom_etud`, `prenon_etud`, `id_conv`) VALUES ('Des Anges', 'Lukombo', '1');
INSERT INTO `etudiant` (`nom_etud`, `prenon_etud`, `id_conv`) VALUES ('Fabrice', 'Pora', '1');
INSERT INTO `etudiant` (`nom_etud`, `prenon_etud`, `id_conv`) VALUES ('Antony', 'Olivier', '2');
INSERT INTO `etudiant` (`nom_etud`, `prenon_etud`, `id_conv`) VALUES ('Rayan', 'Merlu', '2');
INSERT INTO `etudiant` (`nom_etud`, `prenon_etud`, `id_conv`) VALUES ('Calvin', 'Carji', '3');
INSERT INTO `etudiant` (`nom_etud`, `prenon_etud`, `id_conv`) VALUES ('Jonas', 'Rolves', '3');
