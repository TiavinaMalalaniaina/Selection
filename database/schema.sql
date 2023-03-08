CREATE SEQUENCE "public".carriere_idcarriere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".detailuser_iddetailuser_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".filiere_idfiliere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".forum_idforum_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".forum_signal_problem_idforum_signal_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".forum_vote_idforum_vote_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".forumresponse_idforum_response_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".niveauetude_idniveauetude_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".projet_idprojet_seq START WITH 1 INCREMENT BY 1;

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

CREATE  TABLE "public".projet ( 
	idprojet             integer DEFAULT nextval('projet_idprojet_seq'::regclass) NOT NULL  ,
	iduser               integer  NOT NULL  ,
	nom                  varchar(50)    ,
	deadline             timestamp    ,
	CONSTRAINT pk_projet PRIMARY KEY ( idprojet )
 );

CREATE  TABLE "public".signal_advertissement ( 
	nbr                  integer    
 );

CREATE  TABLE "public".specialite ( 
	idspecialite         integer DEFAULT nextval('specialite_idspecialite_seq'::regclass) NOT NULL  ,
	valeur               varchar(20)    ,
	CONSTRAINT pk_specialite PRIMARY KEY ( idspecialite )
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

CREATE  TABLE "public"."user" ( 
	iduser               integer DEFAULT nextval('user_iduser_seq'::regclass) NOT NULL  ,
	nom                  varchar(20)    ,
	prenom               varchar(20)    ,
	email                varchar(20)    ,
	"password"           varchar(20)    ,
	CONSTRAINT pk_tbl PRIMARY KEY ( iduser )
 );

CREATE  TABLE "public".detailuser ( 
	iddetailuser         integer DEFAULT nextval('detailuser_iddetailuser_seq'::regclass) NOT NULL  ,
	iduser               integer  NOT NULL  ,
	idfiliere            integer    ,
	idspecialite         integer    ,
	idniveauetude        integer    ,
	idcarriere           integer    ,
	CONSTRAINT pk_detail_user PRIMARY KEY ( iddetailuser ),
	CONSTRAINT fk_detailuser_carriere FOREIGN KEY ( idcarriere ) REFERENCES "public".carriere( idcarriere )   ,
	CONSTRAINT fk_detailuser_filiere FOREIGN KEY ( idfiliere ) REFERENCES "public".filiere( idfiliere )   ,
	CONSTRAINT fk_detailuser_niveauetude FOREIGN KEY ( idniveauetude ) REFERENCES "public".niveauetude( idniveauetude )   ,
	CONSTRAINT fk_detailuser_specialite FOREIGN KEY ( idspecialite ) REFERENCES "public".specialite( idspecialite )   ,
	CONSTRAINT fk_detailuser_user FOREIGN KEY ( iduser ) REFERENCES "public"."user"( iduser )   
 );

CREATE  TABLE "public".forum_problem ( 
	idforum_problem      integer DEFAULT nextval('forum_idforum_seq'::regclass) NOT NULL  ,
	proprietaire         integer  NOT NULL  ,
	idfiliere            integer    ,
	etat                 integer DEFAULT 0   ,
	problem              text  NOT NULL  ,
	date_problem         timestamp DEFAULT CURRENT_TIMESTAMP   ,
	description          text    ,
	CONSTRAINT pk_forum PRIMARY KEY ( idforum_problem ),
	CONSTRAINT fk_forum_user FOREIGN KEY ( proprietaire ) REFERENCES "public"."user"( iduser )   
 );

CREATE  TABLE "public".forum_response ( 
	idforum_response     integer DEFAULT nextval('forumresponse_idforum_response_seq'::regclass) NOT NULL  ,
	repondeur            integer  NOT NULL  ,
	response             text  NOT NULL  ,
	etat                 integer DEFAULT 0   ,
	idforum_problem      integer    ,
	date_response        timestamp DEFAULT CURRENT_TIMESTAMP   ,
	CONSTRAINT pk_forumresponse PRIMARY KEY ( idforum_response ),
	CONSTRAINT fk_forumresponse_forum_problem FOREIGN KEY ( idforum_problem ) REFERENCES "public".forum_problem( idforum_problem )   ,
	CONSTRAINT fk_forumresponse_user FOREIGN KEY ( repondeur ) REFERENCES "public"."user"( iduser )   
 );

CREATE  TABLE "public".forum_signal ( 
	idforum_signal       integer DEFAULT nextval('forum_signal_problem_idforum_signal_seq'::regclass) NOT NULL  ,
	idforum_problem      integer  NOT NULL  ,
	iduser               integer  NOT NULL  ,
	CONSTRAINT pk_forum_signal PRIMARY KEY ( idforum_signal ),
	CONSTRAINT fk_forum_signal_problem FOREIGN KEY ( idforum_problem ) REFERENCES "public".forum_problem( idforum_problem )   ,
	CONSTRAINT fk_forum_signal_problem_user FOREIGN KEY ( iduser ) REFERENCES "public"."user"( iduser )   
 );

CREATE  TABLE "public".forum_vote ( 
	idforum_vote         integer DEFAULT nextval('forum_vote_idforum_vote_seq'::regclass) NOT NULL  ,
	idforum_response     integer  NOT NULL  ,
	iduser               integer  NOT NULL  ,
	vote                 integer    ,
	CONSTRAINT pk_forum_vote PRIMARY KEY ( idforum_vote ),
	CONSTRAINT fk_forum_vote_forum_response FOREIGN KEY ( idforum_response ) REFERENCES "public".forum_response( idforum_response )   ,
	CONSTRAINT fk_forum_vote_user FOREIGN KEY ( iduser ) REFERENCES "public"."user"( iduser )   
 );

CREATE OR REPLACE VIEW "public".forum_problem_detailled AS
SELECT fp.*, u.nom, u.prenom, u.email  
FROM forum_problem fp
JOIN "user" u ON fp.proprietaire=u.iduser
JOIN filiere f ON fp.idfiliere=f.idfiliere;

CREATE VIEW "public".forum_problem_retired AS  SELECT forum_problem_signaled.idforum_problem,
    forum_problem_signaled.proprietaire,
    forum_problem_signaled.idfiliere,
    forum_problem_signaled.etat,
    forum_problem_signaled.problem,
    forum_problem_signaled.date_problem,
    forum_problem_signaled.signal
   FROM forum_problem_signaled
  WHERE ((forum_problem_signaled.signal >= ( SELECT signal_advertissement.nbr
           FROM signal_advertissement)) AND (forum_problem_signaled.etat <> '-1'::integer));

CREATE VIEW "public".forum_problem_signaled AS  SELECT fp.idforum_problem,
    fp.proprietaire,
    fp.idfiliere,
    fp.etat,
    fp.problem,
    fp.date_problem,
    COALESCE(fs.signal, (0)::bigint) AS signal
   FROM (forum_problem fp
     LEFT JOIN ( SELECT forum_signal.idforum_problem,
            count(DISTINCT forum_signal.iduser) AS signal
           FROM forum_signal
          GROUP BY forum_signal.idforum_problem) fs ON ((fp.idforum_problem = fs.idforum_problem)));

CREATE VIEW "public".forum_response_vote AS  SELECT fr.idforum_response,
    fr.repondeur,
    fr.response,
    fr.etat,
    fr.idforum_problem,
    fr.date_response,
    fv.nbvote
   FROM (forum_response fr
     JOIN ( SELECT forum_vote.idforum_response,
            count(*) AS nbvote
           FROM forum_vote
          GROUP BY forum_vote.idforum_response) fv ON ((fr.idforum_response = fv.idforum_response)));

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
INSERT INTO "public".signal_advertissement( nbr ) VALUES ( 1);
INSERT INTO "public"."user"( iduser, nom, prenom, email, "password" ) VALUES ( 1, 'Tiavina', 'Malalaniaina', 'tiavina@gmail.com', 'tiavina');
INSERT INTO "public"."user"( iduser, nom, prenom, email, "password" ) VALUES ( 2, 'Doda', 'Kely', 'doda@gmail.com', 'doda');
INSERT INTO "public"."user"( iduser, nom, prenom, email, "password" ) VALUES ( 3, 'To', 'Mamiarilaza', 'to@gmail.com', 'to');
INSERT INTO "public"."user"( iduser, nom, prenom, email, "password" ) VALUES ( 4, 'Johan', 'Anjaratiana', 'johan@gmail.com', 'johan');
INSERT INTO "public"."user"( iduser, nom, prenom, email, "password" ) VALUES ( 5, 'Domoina', 'Rakotodratsima', 'domoina@gmail.com', 'domoina');
INSERT INTO "public".detailuser( iddetailuser, iduser, idfiliere, idspecialite, idniveauetude, idcarriere ) VALUES ( 1, 1, 1, null, 1, 1 );
INSERT INTO "public".detailuser( iddetailuser, iduser, idfiliere, idspecialite, idniveauetude, idcarriere ) VALUES ( 2, 2, 2, null, 2, 2 );
INSERT INTO "public".detailuser( iddetailuser, iduser, idfiliere, idspecialite, idniveauetude, idcarriere ) VALUES ( 3, 3, 3, null, 3, 3 );
INSERT INTO "public".detailuser( iddetailuser, iduser, idfiliere, idspecialite, idniveauetude, idcarriere ) VALUES ( 4, 4, 4, null, 4, 4 );
INSERT INTO "public".detailuser( iddetailuser, iduser, idfiliere, idspecialite, idniveauetude, idcarriere ) VALUES ( 5, 5, 5, null, 5, 5 );
INSERT INTO "public".forum_problem( idforum_problem, proprietaire, idfiliere, etat, problem, date_problem, description ) VALUES ( 2, 1, 3, 0, 'Comment faire une dissection ...', '2023-03-05', null);
INSERT INTO "public".forum_problem( idforum_problem, proprietaire, idfiliere, etat, problem, date_problem, description ) VALUES ( 3, 1, 2, 0, 'Andry Rajoelina', '2023-03-05', null);
INSERT INTO "public".forum_problem( idforum_problem, proprietaire, idfiliere, etat, problem, date_problem, description ) VALUES ( 1, 1, 3, 0, 'Comment faire une dissection ...', '2023-03-05', null);
INSERT INTO "public".forum_response( idforum_response, repondeur, response, etat, idforum_problem, date_response ) VALUES ( 1, 2, 'Je te recommande de commencer par une anestesie', 0, 1, '2023-03-05');
INSERT INTO "public".forum_response( idforum_response, repondeur, response, etat, idforum_problem, date_response ) VALUES ( 2, 3, 'Ce serai mieux ...', 0, 1, '2023-03-05');
INSERT INTO "public".forum_signal( idforum_signal, idforum_problem, iduser ) VALUES ( 1, 2, 3);
INSERT INTO "public".forum_vote( idforum_vote, idforum_response, iduser, vote ) VALUES ( 2, 1, 3, null);
INSERT INTO "public".forum_vote( idforum_vote, idforum_response, iduser, vote ) VALUES ( 3, 1, 4, null);
INSERT INTO "public".forum_vote( idforum_vote, idforum_response, iduser, vote ) VALUES ( 4, 1, 5, null);
INSERT INTO "public".forum_vote( idforum_vote, idforum_response, iduser, vote ) VALUES ( 5, 2, 1, null);
INSERT INTO "public".forum_vote( idforum_vote, idforum_response, iduser, vote ) VALUES ( 6, 1, 2, null);

