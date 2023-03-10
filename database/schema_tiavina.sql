CREATE SEQUENCE "public".carriere_idcarriere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".detailuser_iddetailuser_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".etablissement_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".filiere_idfiliere_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".forum_idforum_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".forum_response_idforum_response_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".forum_signal_problem_idforum_signal_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".forum_vote_idforum_vote_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".forumresponse_idforum_response_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".matiere_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".niveauetude_idniveauetude_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".notebook_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".projet_idprojet_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".specialite_idspecialite_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".tableday_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".timetable_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".timetabledetail_id_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".todo_idtodo_seq START WITH 1 INCREMENT BY 1;

CREATE SEQUENCE "public".user_iduser_seq START WITH 1 INCREMENT BY 1;

CREATE  TABLE "public".carriere ( 
	idcarriere           integer DEFAULT nextval('carriere_idcarriere_seq'::regclass) NOT NULL  ,
	valeur               varchar(20)    ,
	CONSTRAINT pk_carriere PRIMARY KEY ( idcarriere )
 );

CREATE  TABLE "public".etablissement ( 
	id                   integer DEFAULT nextval('etablissement_id_seq'::regclass) NOT NULL  ,
	nom                  varchar(50)    ,
	CONSTRAINT etablissement_pkey PRIMARY KEY ( id )
 );

CREATE  TABLE "public".filiere ( 
	idfiliere            integer DEFAULT nextval('filiere_idfiliere_seq'::regclass) NOT NULL  ,
	valeur               varchar(20)    ,
	CONSTRAINT pk_filiere PRIMARY KEY ( idfiliere )
 );

CREATE  TABLE "public".forum_problem ( 
	idforum_problem      integer DEFAULT nextval('forum_idforum_seq'::regclass) NOT NULL  ,
	proprietaire         integer  NOT NULL  ,
	idfiliere            integer    ,
	etat                 integer DEFAULT 0   ,
	problem              text  NOT NULL  ,
	date_problem         date DEFAULT CURRENT_DATE   ,
	description          text    ,
	CONSTRAINT pk_forum PRIMARY KEY ( idforum_problem )
 );

CREATE  TABLE "public".forum_response ( 
	idforum_response     integer DEFAULT nextval('forum_response_idforum_response_seq'::regclass) NOT NULL  ,
	repondeur            integer  NOT NULL  ,
	response             text  NOT NULL  ,
	etat                 integer DEFAULT 0   ,
	idforum_problem      integer    ,
	date_response        date DEFAULT CURRENT_DATE   ,
	CONSTRAINT pk_forumresponse PRIMARY KEY ( idforum_response ),
	CONSTRAINT fk_forumresponse_forum_problem FOREIGN KEY ( idforum_problem ) REFERENCES "public".forum_problem( idforum_problem )   
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

CREATE  TABLE "public".tableday ( 
	id                   integer DEFAULT nextval('tableday_id_seq'::regclass) NOT NULL  ,
	nom                  varchar(20)    ,
	CONSTRAINT tableday_pkey PRIMARY KEY ( id )
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
	contact              varchar(30)    ,
	email                varchar(20)    ,
	"password"           varchar(20)    ,
	datename             date    ,
	img                  varchar(100)    ,
	CONSTRAINT pk_tbl PRIMARY KEY ( iduser )
 );

CREATE  TABLE "public".detailuser ( 
	iddetailuser         integer DEFAULT nextval('detailuser_iddetailuser_seq'::regclass) NOT NULL  ,
	iduser               integer  NOT NULL  ,
	idfiliere            integer    ,
	idspecialite         integer    ,
	idniveauetude        integer    ,
	idcarriere           integer    ,
	idetablissement      integer    ,
	specialite           text    ,
	CONSTRAINT pk_detail_user PRIMARY KEY ( iddetailuser ),
	CONSTRAINT fk_detailuser_carriere FOREIGN KEY ( idcarriere ) REFERENCES "public".carriere( idcarriere )   ,
	CONSTRAINT detailuser_idetablissement_fkey FOREIGN KEY ( idetablissement ) REFERENCES "public".etablissement( id )   ,
	CONSTRAINT fk_detailuser_filiere FOREIGN KEY ( idfiliere ) REFERENCES "public".filiere( idfiliere )   ,
	CONSTRAINT fk_detailuser_niveauetude FOREIGN KEY ( idniveauetude ) REFERENCES "public".niveauetude( idniveauetude )   ,
	CONSTRAINT fk_detailuser_specialite FOREIGN KEY ( idspecialite ) REFERENCES "public".specialite( idspecialite )   ,
	CONSTRAINT fk_detailuser_user FOREIGN KEY ( iduser ) REFERENCES "public"."user"( iduser )   
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

CREATE  TABLE "public".matiere ( 
	id                   integer DEFAULT nextval('matiere_id_seq'::regclass) NOT NULL  ,
	nom                  varchar(50)    ,
	iduser               integer    ,
	CONSTRAINT matiere_pkey PRIMARY KEY ( id ),
	CONSTRAINT matiere_iduser_fkey FOREIGN KEY ( iduser ) REFERENCES "public"."user"( iduser )   
 );

CREATE  TABLE "public".motivation ( 
	id                   serial  NOT NULL  ,
	img                  varchar(100)    ,
	citation             text    ,
	iduser               integer    ,
	CONSTRAINT pk_motivation PRIMARY KEY ( id ),
	CONSTRAINT fk_motivation_user FOREIGN KEY ( iduser ) REFERENCES "public"."user"( iduser )   
 );

CREATE  TABLE "public".notebook ( 
	id                   integer DEFAULT nextval('notebook_id_seq'::regclass) NOT NULL  ,
	iduser               integer    ,
	title                varchar(20)    ,
	val                  text    ,
	notedate             date DEFAULT CURRENT_DATE NOT NULL  ,
	CONSTRAINT notebook_pkey PRIMARY KEY ( id ),
	CONSTRAINT notebook_iduser_fkey FOREIGN KEY ( iduser ) REFERENCES "public"."user"( iduser )   
 );

CREATE  TABLE "public".timetable ( 
	id                   integer DEFAULT nextval('timetable_id_seq'::regclass) NOT NULL  ,
	iduser               integer    ,
	CONSTRAINT timetable_pkey PRIMARY KEY ( id ),
	CONSTRAINT timetable_iduser_fkey FOREIGN KEY ( iduser ) REFERENCES "public"."user"( iduser )   
 );

CREATE  TABLE "public".timetabledetail ( 
	id                   integer DEFAULT nextval('timetabledetail_id_seq'::regclass) NOT NULL  ,
	idtimetable          integer    ,
	idtableday           integer    ,
	idmatiere            integer    ,
	timestart            time    ,
	timeend              time    ,
	CONSTRAINT timetabledetail_pkey PRIMARY KEY ( id ),
	CONSTRAINT timetabledetail_idmatiere_fkey FOREIGN KEY ( idmatiere ) REFERENCES "public".matiere( id )   ,
	CONSTRAINT timetabledetail_idtableday_fkey FOREIGN KEY ( idtableday ) REFERENCES "public".tableday( id )   ,
	CONSTRAINT timetabledetail_idtimetable_fkey FOREIGN KEY ( idtimetable ) REFERENCES "public".timetable( id )   
 );

CREATE  TABLE "public".todo ( 
	idtodo               integer DEFAULT nextval('todo_idtodo_seq'::regclass) NOT NULL  ,
	iduser               integer  NOT NULL  ,
	tache                varchar(100)  NOT NULL  ,
	date_tache           timestamp DEFAULT CURRENT_TIMESTAMP   ,
	etat                 integer DEFAULT 0   ,
	CONSTRAINT pk_todo PRIMARY KEY ( idtodo ),
	CONSTRAINT fk_todo_user FOREIGN KEY ( iduser ) REFERENCES "public"."user"( iduser )   
 );

CREATE VIEW "public".forum_problem_detailled AS  SELECT fp.idforum_problem,
    fp.proprietaire,
    fp.idfiliere,
    fp.etat,
    fp.problem,
    fp.date_problem,
    fp.description,
    u.nom,
    u.prenom,
    u.email,
    u.img,
    COALESCE(r.nbresponse, (0)::bigint) AS nbresponse
   FROM (((forum_problem fp
     JOIN user_detailled u ON ((fp.proprietaire = u.iduser)))
     JOIN filiere f ON ((fp.idfiliere = f.idfiliere)))
     LEFT JOIN ( SELECT forum_response.idforum_problem,
            count(*) AS nbresponse
           FROM forum_response
          GROUP BY forum_response.idforum_problem) r ON ((fp.idforum_problem = r.idforum_problem)));

CREATE VIEW "public".forum_problem_signaled AS  SELECT fp.idforum_problem,
    fp.proprietaire,
    u.nom,
    u.prenom,
    u.email,
    u.img,
    fp.idfiliere,
    fp.etat,
    fp.problem,
    fp.date_problem,
    COALESCE(fs.signal, (0)::bigint) AS signal
   FROM ((forum_problem fp
     LEFT JOIN ( SELECT forum_signal.idforum_problem,
            count(DISTINCT forum_signal.iduser) AS signal
           FROM forum_signal
          GROUP BY forum_signal.idforum_problem) fs ON ((fp.idforum_problem = fs.idforum_problem)))
     JOIN "user" u ON ((fp.proprietaire = u.iduser)));

CREATE VIEW "public".forum_response_detailled AS  SELECT fr.idforum_response,
    fr.repondeur,
    fr.response,
    fr.etat,
    fr.idforum_problem,
    fr.date_response,
    fr.nbvote,
    ud.nom,
    ud.prenom,
    ud.email,
    ud.img
   FROM (forum_response_vote fr
     JOIN user_detailled ud ON ((fr.repondeur = ud.iduser)));

CREATE VIEW "public".forum_response_vote AS  SELECT fr.idforum_response,
    fr.repondeur,
    fr.response,
    fr.etat,
    fr.idforum_problem,
    fr.date_response,
    COALESCE(fv.nbvote, (0)::bigint) AS nbvote
   FROM (forum_response fr
     LEFT JOIN ( SELECT forum_vote.idforum_response,
            count(*) AS nbvote
           FROM forum_vote
          GROUP BY forum_vote.idforum_response) fv ON ((fr.idforum_response = fv.idforum_response)));

CREATE VIEW "public".user_detailled AS  SELECT du.iddetailuser,
    du.iduser,
    du.idfiliere,
    du.idspecialite,
    du.idniveauetude,
    du.idcarriere,
    u.nom,
    u.prenom,
    u.email,
    u.contact,
    u.img,
    m.citation,
    m.img AS im_citation,
    f.valeur AS filiere,
    sp.valeur AS specialite,
    ne.valeur AS niveauetude,
    c.valeur AS carriere,
    e.nom AS etablissement
   FROM (((((((detailuser du
     JOIN "user" u ON ((du.iduser = u.iduser)))
     JOIN filiere f ON ((du.idfiliere = f.idfiliere)))
     JOIN specialite sp ON ((du.idspecialite = sp.idspecialite)))
     JOIN niveauetude ne ON ((du.idniveauetude = ne.idniveauetude)))
     JOIN carriere c ON ((du.idcarriere = c.idcarriere)))
     JOIN etablissement e ON ((du.idetablissement = e.id)))
     JOIN motivation m ON ((u.iduser = m.iduser)));

