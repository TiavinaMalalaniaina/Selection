
insert into "public"."user" (nom,prenom,email,"password") values('Rakoto','Koto','rk@mail.com','rk');
create table matiere(
	id serial primary key,
	nom varchar(50),
	iduser integer,
	foreign key (iduser) references "public"."user"(iduser)
);
insert into matiere(nom,iduser) values('SVT',1); 
insert into matiere(nom,iduser) values('Malagasy',1); 
insert into matiere(nom,iduser) values('Mathematiques',1); 
insert into matiere(nom,iduser) values('Physique Chimie',1); 
insert into matiere(nom,iduser) values('Francais',1); 
insert into matiere(nom,iduser) values('Anglais',1); 
insert into matiere(nom,iduser) values('EPS',1); 
insert into matiere(nom,iduser) values('Histo-Geo',1); 


create table timetable(
	id serial primary key,
	iduser integer,
	foreign key (iduser) references "public"."user"(iduser)
);
insert into timetable(iduser) values(1);

create table tableday(
	id serial primary key,
	nom varchar(20)
);
insert into tableday(nom) values('Lundi');
insert into tableday(nom) values('Mardi');
insert into tableday(nom) values('Mercredi');
insert into tableday(nom) values('Jeudi');
insert into tableday(nom) values('Vendredi');
insert into tableday(nom) values('Samedi');
insert into tableday(nom) values('Dimanche');

create table timetabledetail(
	id serial primary key, 
	idtimetable integer,
	idtableday integer,
	idmatiere integer,
	timestart time,
	timeend time,
	foreign key (idtimetable) references timetable(id),	
	foreign key (idtableday) references tableday(id),
	foreign key (idmatiere) references matiere(id)
);
insert into timetabledetail(idtimetable,idtableday,idmatiere,timestart,timeend) values(1,1,1,'08:00','09:00');

insert into timetabledetail(idtimetable,idtableday,idmatiere,timestart,timeend) values(1,1,2,'09:00','11:00');

insert into timetabledetail(idtimetable,idtableday,idmatiere,timestart,timeend) values(1,1,3,'14:00','14:30');


drop table notebook;
create table notebook(
	id serial primary key,
	iduser integer,
	title VARCHAR(20),
	val text,
	notedate DATE NOT NULL DEFAULT CURRENT_DATE,
	foreign key (iduser) references  "public"."user"(iduser)
);
