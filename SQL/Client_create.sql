CREATE DATABASE Client_TP;

DROP TABLE IF EXISTS CLIENT; 

Create table CLIENT(ID              int not null AUTO_INCREMENT,
					NCLI			char(4) not null,
                    NOM				char(50) not null,
                    ADRESSE         char(100) null,
                    LOCALITE        char(50) null,
                    CATEGORIE       char(50) null,
					COMPTE			int not null,
                constraint CLIENTPK primary key (ID));