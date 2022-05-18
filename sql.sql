/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  06/05/2021 20:53:15                      */
/*==============================================================*/


drop table if exists COMPTE;

drop table if exists CONTIENT;

drop table if exists ETUDIANT;

drop table if exists GERER;

drop table if exists REGLER;

drop table if exists REPAS;

drop table if exists RESPONSABLE;

drop table if exists TICKET;

/*==============================================================*/
/* Table : COMPTE                                               */
/*==============================================================*/
create table COMPTE
(
   ID_COMPTE            int not null AUTO_INCREMENT,
   CNE                  char(30) not null,
   DATE_DE_CREATION_DU_COMPTE date,
   MOT_DE_PASSE         text,
   ACTIVE               bool,
   HASHCOMPTE           char(100),
   primary key (ID_COMPTE)
);

/*==============================================================*/
/* Table : CONTIENT                                             */
/*==============================================================*/
create table CONTIENT
(
   ID_TICKET            int not null,
   ID_REPAS             int not null,
   primary key (ID_TICKET, ID_REPAS)
);

/*==============================================================*/
/* Table : ETUDIANT                                             */
/*==============================================================*/
create table ETUDIANT
(
   CNE                  char(30) not null,
   ID_COMPTE            int,
   CIN_ETUDIANT         text,
   NOM_ETUDIANT         char(30),
   PRENOM_ETUDIANT      char(30),
   ECOLE                char(100),
   EMAIL_ETUDIANT       text,
   SEXE_ETUDIANT        char(10),
   primary key (CNE)
);

/*==============================================================*/
/* Table : GERER                                                */
/*==============================================================*/
create table GERER
(
   CIN_RESPONSABLE      char(20) not null,
   ID_COMPTE            int not null,
   primary key (CIN_RESPONSABLE, ID_COMPTE)
);

/*==============================================================*/
/* Table : REGLER                                               */
/*==============================================================*/
create table REGLER
(
   CIN_RESPONSABLE      char(20) not null,
   ID_REPAS             int not null,
   DATE_DE_REGLEMENT    date,
   MONTANT_DE_REGLEMENT numeric(3,2),
   primary key (CIN_RESPONSABLE, ID_REPAS)
);

/*==============================================================*/
/* Table : REPAS                                                */
/*==============================================================*/
create table REPAS
(
   ID_REPAS             int not null AUTO_INCREMENT,
   TYPE_REPAS           char(20),
   DATE_RESERVATION     date,
   TARIF                decimal(3,2),
   primary key (ID_REPAS)
);

/*==============================================================*/
/* Table : RESPONSABLE                                          */
/*==============================================================*/
create table RESPONSABLE
(
   CIN_RESPONSABLE      char(20) not null,
   NOM_RESPONSABLE      char(20),
   PRENOM_RESPONSABLE   char(20),
   EMAIL_RESPONSABLE    text,
   MOT_DE_PASSE         text,
   SEXE_RESPONSABLE     char(10),
   HASHRESPONSABLE      char(100),
   primary key (CIN_RESPONSABLE)
);

/*==============================================================*/
/* Table : TICKET                                               */
/*==============================================================*/
create table TICKET
(
   ID_TICKET            int not null AUTO_INCREMENT,
   CNE                  char(30) not null,
   DATE_DE_RESEVATION   date,
   PRIX_A_PAYE          decimal(4,3),
   STATUT_PAIMENT       bool,
   primary key (ID_TICKET)
);

alter table COMPTE add constraint FK_CREER foreign key (CNE)
      references ETUDIANT (CNE) on delete restrict on update restrict;

alter table CONTIENT add constraint FK_CONTIENT foreign key (ID_TICKET)
      references TICKET (ID_TICKET) on delete restrict on update restrict;

alter table CONTIENT add constraint FK_CONTIENT2 foreign key (ID_REPAS)
      references REPAS (ID_REPAS) on delete restrict on update restrict;

alter table ETUDIANT add constraint FK_CREER2 foreign key (ID_COMPTE)
      references COMPTE (ID_COMPTE) on delete restrict on update restrict;

alter table GERER add constraint FK_GERER foreign key (CIN_RESPONSABLE)
      references RESPONSABLE (CIN_RESPONSABLE) on delete restrict on update restrict;

alter table GERER add constraint FK_GERER2 foreign key (ID_COMPTE)
      references COMPTE (ID_COMPTE) on delete restrict on update restrict;

alter table REGLER add constraint FK_REGLER foreign key (CIN_RESPONSABLE)
      references RESPONSABLE (CIN_RESPONSABLE) on delete restrict on update restrict;

alter table REGLER add constraint FK_REGLER2 foreign key (ID_REPAS)
      references REPAS (ID_REPAS) on delete restrict on update restrict;

alter table TICKET add constraint FK_RESERVE foreign key (CNE)
      references ETUDIANT (CNE) on delete restrict on update restrict;

