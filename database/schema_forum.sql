CREATE SEQUENCE "public".carriere_idcarriere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".detailuser_iddetailuser_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".filiere_idfiliere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".forum_idforum_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".niveauetude_idniveauetude_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".specialite_idspecialite_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".user_iduser_seq START WITH 1 INCREMENT BY 1;

CREATE  TABLE "public".forum_problem ( 
	idforum_problem      integer DEFAULT nextval('forum_idforum_seq'::regclass) NOT NULL  ,
	proprietaire         integer  NOT NULL  ,
	idfiliere            integer    ,
	etat                 integer DEFAULT 0   ,
	problem              text  NOT NULL  ,
	date_problem         date DEFAULT CURRENT_DATE   ,
	CONSTRAINT pk_forum PRIMARY KEY ( idforum_problem )
 );

CREATE  TABLE "public".forum_response ( 
	idforum_response     serial  NOT NULL  ,
	repondeur            integer  NOT NULL  ,
	response             text  NOT NULL  ,
	etat                 integer DEFAULT 0   ,
	idforum_problem      integer    ,
	date_response        date DEFAULT CURRENT_DATE   ,
	CONSTRAINT pk_forumresponse PRIMARY KEY ( idforum_response ),
	CONSTRAINT fk_forumresponse_forum_problem FOREIGN KEY ( idforum_problem ) REFERENCES "public".forum_problem( idforum_problem )   
 );

INSERT INTO "public".forum_problem( idforum_problem, proprietaire, idfiliere, etat, problem, date_problem ) VALUES ( 1, 1, 3, 0, 'Comment faire une dissection ...', '2023-03-05');
INSERT INTO "public".forum_problem( idforum_problem, proprietaire, idfiliere, etat, problem, date_problem ) VALUES ( 2, 1, 3, 0, 'Comment faire une dissection ...', '2023-03-05');
INSERT INTO "public".forum_problem( idforum_problem, proprietaire, idfiliere, etat, problem, date_problem ) VALUES ( 3, 1, 2, 0, 'Andry Rajoelina', '2023-03-05');
INSERT INTO "public".forum_response( idforum_response, repondeur, response, etat, idforum_problem, date_response ) VALUES ( 1, 2, 'Je te recommande de commencer par une anestesie', 0, 1, '2023-03-05');
INSERT INTO "public".forum_response( idforum_response, repondeur, response, etat, idforum_problem, date_response ) VALUES ( 2, 3, 'Ce serai mieux ...', 0, 1, '2023-03-05');
