DROP TABLE projet;
DROP TABLE tache_projet CASCADE;
DROP TABLE tache_status CASCADE;

CREATE  TABLE "public".projet ( 
	idprojet             serial  NOT NULL  ,
	iduser               integer  NOT NULL  ,
	nom                  varchar(50)    ,
	deadline             timestamp  NOT NULL,
	CONSTRAINT pk_projet PRIMARY KEY ( idprojet )
 );

CREATE  TABLE "public".tache_projet ( 
	idprojet             integer  NOT NULL  ,
	idtache              serial  NOT NULL  ,
	nom                  varchar(50)    ,
	temptotal            integer DEFAULT 0,
	CONSTRAINT fk_tache_projet FOREIGN KEY ( idprojet ) REFERENCES projet ( idprojet )  
 );

CREATE  TABLE "public".tache_status ( 
	idprojet             integer  NOT NULL  ,
	idtache              integer  NOT NULL  ,
	temppasser           integer DEFAULT 0  ,
	CONSTRAINT fk_tache_status FOREIGN KEY ( idprojet ) REFERENCES projet ( idprojet ) 
 );


CREATE VIEW temppasser_tache AS (   
    SELECT idprojet,idtache,SUM(temppasser) AS temppasser FROM tache_status GROUP BY idprojet,idtache
);
CREATE VIEW temppasser_projet AS (   
    SELECT idprojet,SUM(temppasser) AS temppasser FROM tache_status GROUP BY idprojet
);
CREATE OR REPLACE VIEW temptotal_projet AS (   
    SELECT idprojet,SUM(temptotal) AS temptotal FROM tache_projet GROUP BY idprojet
);
CREATE VIEW temprestant_projet AS (
    SELECT TT.idprojet,(SUM(TP.temptotal)-SUM(TT.temppasser)) AS temprestant  FROM temppasser_tache TT
        JOIN temptotal_projet TP ON TP.idprojet = TT.idtache
        GROUP BY TT.idprojet,TT.idtache
);

INSERT INTO "public".projet VALUES ( DEFAULT, 1,'Algo Mr Tsinjo','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 1,'Raisonnement Mr Robinson','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 1,'Equation differencielle','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 1,'Optimisation','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 1,'Programmation Mr Tahiana','2023-03-10 07:00:00'::timestamp);

INSERT INTO "public".projet VALUES ( DEFAULT, 2,'SIG','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 2,'Algo Mr Tsinjo','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 2,'Programmation Mr Tahian','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 2,'Raisonnement Mr Robinson','2023-03-10 07:00:00'::timestamp);

INSERT INTO "public".projet VALUES ( DEFAULT, 3,'Programmation Mr Tahian','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 3,'Web-srvlet Mr Naina','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 3,'Algo Mr Tsinjo','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 3,'Project Mme Baovola','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 3,'IHM Mr Rojo','2023-03-10 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( DEFAULT, 3,'Raisonnement Mr Robinson','2023-03-10 07:00:00'::timestamp);