drop database selection;
create database selection;
\c selection;

CREATE SEQUENCE "public".carriere_idcarriere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".detailuser_iddetailuser_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".filiere_idfiliere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".forum_idforum_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".niveauetude_idniveauetude_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".specialite_idspecialite_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".user_iduser_seq START WITH 1 INCREMENT BY 1;

CREATE  TABLE "public".carriere ( 
	idcarriere           integer DEFAULT nextval('carriere_idcarriere_seq'::regclass) NOT NULL  ,
	valeur               varchar(20)    ,
	CONSTRAINT pk_carriere PRIMARY KEY ( idcarriere )
 );

CREATE  TABLE "public".filiere ( 
	idfiliere            integer DEFAULT nextval('filiere_idfiliere_seq'::regclass) NOT NULL  ,
	valeur               varchar(20)    ,
	CONSTRAINT pk_filiere PRIMARY KEY ( idfiliere )
 );

CREATE  TABLE "public".niveauetude ( 
	idniveauetude        integer DEFAULT nextval('niveauetude_idniveauetude_seq'::regclass) NOT NULL  ,
	valeur               varchar(20)    ,
	CONSTRAINT pk_niveauetude PRIMARY KEY ( idniveauetude )
 );

CREATE  TABLE "public".specialite ( 
	idspecialite         integer DEFAULT nextval('specialite_idspecialite_seq'::regclass) NOT NULL  ,
	valeur               varchar(20)    ,
	CONSTRAINT pk_specialite PRIMARY KEY ( idspecialite )
 );

CREATE  TABLE "public"."user" ( 
	iduser               integer DEFAULT nextval('user_iduser_seq'::regclass) NOT NULL  ,
	nom                  varchar(20)    ,
	prenom               varchar(20)    ,
	contact 			 varchar(30),
	email                varchar(20)    ,
	"password"           varchar(20)    ,
	CONSTRAINT pk_tbl PRIMARY KEY ( iduser )
 );

create table etablissement(
	id serial primary key,
	nom varchar(50)
);

CREATE  TABLE "public".detailuser ( 
	iddetailuser         integer DEFAULT nextval('detailuser_iddetailuser_seq'::regclass) NOT NULL  ,
	iduser               integer  NOT NULL  ,
	idfiliere            integer    ,
	idspecialite         integer    ,
	idniveauetude        integer    ,
	idcarriere           integer    ,
	idetablissement		 integer,
	specialite			 text,
	CONSTRAINT pk_detail_user PRIMARY KEY ( iddetailuser ),
	CONSTRAINT fk_detailuser_carriere FOREIGN KEY ( idcarriere ) REFERENCES "public".carriere( idcarriere )   ,
	CONSTRAINT fk_detailuser_filiere FOREIGN KEY ( idfiliere ) REFERENCES "public".filiere( idfiliere )   ,
	CONSTRAINT fk_detailuser_niveauetude FOREIGN KEY ( idniveauetude ) REFERENCES "public".niveauetude( idniveauetude )   ,
	CONSTRAINT fk_detailuser_specialite FOREIGN KEY ( idspecialite ) REFERENCES "public".specialite( idspecialite )   ,
	CONSTRAINT fk_detailuser_user FOREIGN KEY ( iduser ) REFERENCES "public"."user"( iduser ) ,
	foreign key(idetablissement) references etablissement(id)  
 );

INSERT INTO "public".carriere( idcarriere, valeur ) VALUES ( 1, 'Data scientist');
INSERT INTO "public".carriere( idcarriere, valeur ) VALUES ( 2, 'Medecine generaliste');
INSERT INTO "public".carriere( idcarriere, valeur ) VALUES ( 3, 'Data scientist');
INSERT INTO "public".carriere( idcarriere, valeur ) VALUES ( 4, 'Medecine generaliste');
INSERT INTO "public".filiere( idfiliere, valeur ) VALUES ( 1, 'Informatique');
INSERT INTO "public".filiere( idfiliere, valeur ) VALUES ( 2, 'Mathematique');
INSERT INTO "public".filiere( idfiliere, valeur ) VALUES ( 3, 'Medecine');
INSERT INTO "public".filiere( idfiliere, valeur ) VALUES ( 4, 'Physique');
INSERT INTO "public".filiere( idfiliere, valeur ) VALUES ( 5, 'Genie Civil');
INSERT INTO "public".filiere( idfiliere, valeur ) VALUES ( 6, 'Genie Mecanique');
INSERT INTO "public".niveauetude( idniveauetude, valeur ) VALUES ( 1, 'CEPE');
INSERT INTO "public".niveauetude( idniveauetude, valeur ) VALUES ( 2, 'BEPC');
INSERT INTO "public".niveauetude( idniveauetude, valeur ) VALUES ( 3, 'BACC');
INSERT INTO "public".niveauetude( idniveauetude, valeur ) VALUES ( 4, 'BACC+1');
INSERT INTO "public".niveauetude( idniveauetude, valeur ) VALUES ( 5, 'BACC+2');
INSERT INTO "public".niveauetude( idniveauetude, valeur ) VALUES ( 6, 'LICENCE');
INSERT INTO "public".niveauetude( idniveauetude, valeur ) VALUES ( 7, 'MASTER');
INSERT INTO "public".niveauetude( idniveauetude, valeur ) VALUES ( 8, 'DOCTORAT');
insert into etablissement(nom) values('IT University');
insert into etablissement(nom) values('DEGS Ankatso');
insert into etablissement(nom) values('ESPA Vontovorona');
INSERT INTO "public"."user"( iduser, nom, prenom, contact, email, "password" ) VALUES ( 1, 'Tiavina', 'Malalaniaina','0326470822', 'tiavina@gmail.com', 'tiavina');
INSERT INTO "public"."user"( iduser, nom, prenom, contact, email, "password" ) VALUES ( 2, 'Doda', 'Kely','0326470822', 'doda@gmail.com', 'doda');
INSERT INTO "public"."user"( iduser, nom, prenom, contact, email, "password" ) VALUES ( 3, 'To', 'Mamiarilaza','0326470822', 'to@gmail.com', 'to');
INSERT INTO "public"."user"( iduser, nom, prenom, contact, email, "password" ) VALUES ( 4, 'Johan', 'Anjaratiana','0326470822', 'johan@gmail.com', 'johan');
INSERT INTO "public"."user"( iduser, nom, prenom, contact, email, "password" ) VALUES ( 5, 'Domoina', 'Rakotodratsima','0326470822', 'domoina@gmail.com', 'domoina');

