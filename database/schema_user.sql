CREATE  TABLE "public".carriere ( 
	idcarriere           serial  NOT NULL  ,
	valeur               varchar(20)    ,
	CONSTRAINT pk_carriere PRIMARY KEY ( idcarriere )
 );

CREATE  TABLE "public".filiere ( 
	idfiliere            serial  NOT NULL  ,
	valeur               varchar(20)    ,
	CONSTRAINT pk_filiere PRIMARY KEY ( idfiliere )
 );

CREATE  TABLE "public".niveauetude ( 
	idniveauetude        serial  NOT NULL  ,
	valeur               varchar(20)    ,
	CONSTRAINT pk_niveauetude PRIMARY KEY ( idniveauetude )
 );

CREATE  TABLE "public".specialite ( 
	idspecialite         serial  NOT NULL  ,
	valeur               varchar(20)    ,
	CONSTRAINT pk_specialite PRIMARY KEY ( idspecialite )
 );

CREATE  TABLE "public"."user" ( 
	iduser               serial  NOT NULL  ,
	nom                  varchar(20)    ,
	prenom               varchar(20)    ,
	email                varchar(20)    ,
	"password"           varchar(20)    ,
	CONSTRAINT pk_tbl PRIMARY KEY ( iduser )
 );

CREATE  TABLE "public".detailuser ( 
	iddetailuser         serial  NOT NULL  ,
	iduser               integer  NOT NULL  ,
	idfiliere            integer    ,
	idspecialite         integer    ,
	idniveauetude        integer    ,
	idcarriere           integer    ,
	CONSTRAINT pk_detail_user PRIMARY KEY ( iddetailuser ),
	CONSTRAINT fk_detailuser_user FOREIGN KEY ( iduser ) REFERENCES "public"."user"( iduser )   ,
	CONSTRAINT fk_detailuser_carriere FOREIGN KEY ( idcarriere ) REFERENCES "public".carriere( idcarriere )   ,
	CONSTRAINT fk_detailuser_niveauetude FOREIGN KEY ( idniveauetude ) REFERENCES "public".niveauetude( idniveauetude )   ,
	CONSTRAINT fk_detailuser_filiere FOREIGN KEY ( idfiliere ) REFERENCES "public".filiere( idfiliere )   ,
	CONSTRAINT fk_detailuser_specialite FOREIGN KEY ( idspecialite ) REFERENCES "public".specialite( idspecialite )   
 );

