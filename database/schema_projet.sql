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

