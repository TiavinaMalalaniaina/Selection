CREATE  TABLE "public".projet ( 
	idprojet             serial  NOT NULL  ,
	iduser               integer  NOT NULL  ,
	nom                  varchar(50)    ,
	deadline             timestamp    ,
	CONSTRAINT pk_projet PRIMARY KEY ( idprojet )
 );

CREATE  TABLE "public".tache_projet ( 
	idprojet             integer  NOT NULL  ,
	idtache              integer  NOT NULL  ,
	nom                  varchar(50)    ,
	temptotal            integer DEFAULT 0   
 );

CREATE  TABLE "public".tache_status ( 
	idprojet             integer  NOT NULL  ,
	idtache              integer  NOT NULL  ,
	temppasser           integer DEFAULT 0   
 );


INSERT INTO "public".projet VALUES ( 1, 1,'Algo Mr Tsinjo','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 2, 1,'Raisonnement Mr Robinson','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 3, 1,'Equation differencielle','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 4, 1,'Optimisation','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 5, 1,'Programmation Mr Tahiana','2023-03-08 07:00:00'::timestamp);

INSERT INTO "public".projet VALUES ( 6, 2,'SIG','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 7, 2,'Algo Mr Tsinjo','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 8, 2,'Programmation Mr Tahian','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 9, 2,'Raisonnement Mr Robinson','2023-03-08 07:00:00'::timestamp);

INSERT INTO "public".projet VALUES ( 10, 3,'Programmation Mr Tahian','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 11, 3,'Web-srvlet Mr Naina','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 12, 3,'Algo Mr Tsinjo','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 13, 3,'Project Mme Baovola','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 14, 3,'IHM Mr Rojo','2023-03-08 07:00:00'::timestamp);
INSERT INTO "public".projet VALUES ( 15, 3,'Raisonnement Mr Robinson','2023-03-08 07:00:00'::timestamp);