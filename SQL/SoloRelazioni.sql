#si possono eliminare le copie in modo safe
#non si puo' eliminare un libro se prima non si sono eliminate tutte le sue copie
#non si puo' eliminare un autore/editore se prima non si sono eliminati tutti i libri loro che si hanno
#non si puo' eliminare un dipartimento/biblioteca se prima non si sono eliminati tutte le copie contenute
#se si elimina uno studente si perdono tutti i suoi prestiti

create schema BIBLIOTECA_UNIVERSITA;

create table EDITORE(
CodiceEditore varchar(10),
Nome varchar(20) not null,
Via varchar(50) not null, 
Citta varchar(50) not null, 
CAP char(5) not null,
Email varchar(30) not null,
Telefono varchar(20) not null,

primary key(CodiceEditore)
);

create table LIBRO(
ISBN char(13),
Titolo varchar(100) not null,
Sottotitolo varchar(200) not null,
AnnoPubblicazione char(4) not null,
Categoria varchar(50) not null, 
CodiceE varchar(10),

primary key(ISBN),
foreign key(CodiceE) references EDITORE(CodiceEditore)
on delete restrict on update cascade
);

create table AUTORE(
CodiceAutore varchar(10),
Nome varchar(20) not null,
Cognome varchar(20) not null,
DataNascita date not null, 
LuogoNascita varchar(50) not null,

primary key(CodiceAutore)
);

create table DIPARTIMENTO(
Nome varchar(50),
Direttore varchar(100) not null,
Via varchar(50),

primary key(Nome)
);

create table BIBLIOTECA(
CodiceBiblioteca varchar(10),
Via varchar(50) not null, 
NomeDipartimento varchar(50),

primary key(CodiceBiblioteca),
foreign key(NomeDipartimento) references DIPARTIMENTO(Nome)
on delete cascade on update cascade
);

create table COPIA(
Numero int,
Lingua varchar(20) not null,
Scaffale varchar(20) not null, 
ISBN char(13),
CodiceB varchar(10),

primary key(Numero, ISBN),
foreign key(ISBN) references LIBRO(ISBN)
on delete restrict on update cascade,
foreign key(CodiceB) references BIBLIOTECA(CodiceBiblioteca)
on delete restrict on update cascade
);

create table STUDENTE(
Matricola varchar(10),
Nome varchar(20) not null,
Cognome varchar(20) not null,
CdS varchar(20) not null,
Via varchar(50) not null,
Citta varchar(50) not null,
CAP char(5) not null,
Email varchar(30) not null,
Telefono varchar(20) not null,

primary key(Matricola)
);

create table PRESTITO(
ID int,
DataPrestito date not null,
ContProroghe int not null,
NumeroCopia int,
ISBN char(13),
Matricola varchar(10),
CodiceB varchar(10),
Disponibile bool not null,

primary key(ID),
foreign key(NumeroCopia) references COPIA(Numero)
on delete cascade on update cascade,
foreign key(ISBN) references LIBRO(ISBN)
on delete cascade on update cascade,
foreign key(Matricola) references STUDENTE(Matricola)
on delete cascade on update cascade,
foreign key(CodiceB) references BIBLIOTECA(CodiceBiblioteca)
on delete cascade on update cascade
);

create table SCRIVE(
ISBN char(13),
CodiceA varchar(10),

primary key(ISBN, CodiceA),
foreign key(ISBN) references LIBRO(ISBN)
on delete cascade on update cascade,
foreign key(CodiceA) references AUTORE(CodiceAutore)
on delete restrict on update cascade
);