-- *********************************************
-- * Standard SQL generation
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2
-- * Generator date: Sep 14 2021
-- * Generation date: Tue Jan 23 11:50:19 2024
-- * LUN file: C:\Users\gali2\Desktop\Università\ProjectDB\PROJECT_DATABASE.lun
-- * Schema: Logico con homwbew e tratti/SQL
-- *********************************************


-- Database Section
-- ________________

drop database if exists dndatabase;
create database dndatabase;
use dndatabase;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________

create table ABILITA (
     Nome varchar(20) not null,
     Descrizione text not null,
     Creatore varchar(20) not null,
     Statistica varchar(20) not null,
     constraint ID_ABILITA_ID primary key (Nome));

create table ARMATURA (
     Id_oggetto int not null,
     Classe_armatura int not null,
     Forza_richiesta int not null DEFAULT '0',
     Svantaggio_furtivita bool not null DEFAULT '0',
     constraint ID_ARMAT_OGGET_ID primary key (Id_oggetto));

create table Attribuzione (
     IdAzione varchar(20) not null,
     IDTratto int not null,
     constraint ID_Attribuzione_ID primary key (IdAzione, IDTratto));

create table Aumento (
     IDTratto int not null,
     Statistica varchar(20) not null,
     Valore int not null,
     constraint ID_Aumento_ID primary key (Statistica, IDTratto));

create table AZIONE (
     IdAzione varchar(20) not null,
     Nome varchar(20) not null,
     Descrizione text not null,
     Gittata varchar(20) not null,
     Creatore varchar(20) not null,
     Tiro_per_colpire int,
     TS_DC int,
     Innesco text,
     Azione_Bonus bool not null,
     Incantesimo bool not null,
     constraint ID_AZIONE_ID primary key (IdAzione));

create table Beneficio (
     IDPersonaggio int not null,
     IDTratto int not null,
     constraint ID_Beneficio_ID primary key (IDPersonaggio, IDTratto));

create table Bottino (
     Id_oggetto int not null,
     Id_luogo_d_interesse int not null,
     constraint ID_Bottino_ID primary key (Id_luogo_d_interesse, Id_oggetto));

create table CAMPAGNA (
     Id_campagna int not null,
     Nome varchar(50) not null,
     Sinossi text not null,
     Immagine blob null,
     Creatore varchar(20) not null,
     Id_mondo int not null,
     constraint ID_CAMPAGNA_ID primary key (Id_campagna));

create table caratteristica (
     Proprieta varchar(20) not null,
     Id_oggetto int not null,
     constraint ID_caratteristica_ID primary key (Id_oggetto, Proprieta));

create table CLASSE (
     Nome varchar(20) not null,
     Descrizione text not null,
     Creatore varchar(20) not null,
     constraint ID_CLASSE_ID primary key (Nome));

create table Competenza_Abilita (
     IDTratto int not null,
     IDAbilita varchar(20) not null,
     Maestria bool not null DEFAULT '0',
     constraint ID_Competenza_Abilita_ID primary key (IDAbilita, IDTratto));

create table Competenza_Oggetto (
     Id_oggetto int not null,
     IDTratto int not null,
     Maestria bool not null DEFAULT '0',
     constraint ID_Competenza_Oggetto_ID primary key (Id_oggetto, IDTratto));

create table Dotazione (
     IDTratto int not null,
     Dote varchar(20) not null,
     Metri float,
     constraint ID_Dotazione_ID primary key (IDTratto, Dote));

create table DOTE (
     Nome varchar(20) not null,
     Tipologia enum("Velocità", "Sensi", "Lingua") not null,
     Descrizione text not null,
     Creatore varchar(20) not null,
     constraint ID_DOTE_ID primary key (Nome));

create table EFFETTO_MAGICO (
     Id_effetto_magico varchar(20) not null,
     Descrizione text not null,
     Creatore varchar(20) not null,
     constraint ID_EFFETTO_MAGICO_ID primary key (Id_effetto_magico));

create table Eroe (
     IDPersonaggio int not null,
     Id_campagna int not null,
     constraint ID_Eroe_ID primary key (IDPersonaggio, Id_campagna));

create table GIOCATORE (
     Nickname varchar(20) not null,
     Nome varchar(20) not null,
     Cognome varchar(20) not null,
     Data_nascita date not null,
     Password varchar(20) not null,
     Immagine blob null,
     constraint ID_GIOCATORE_ID primary key (Nickname));

create table INCANTESIMO (
     IdAzione varchar(20) not null,
     Livello int not null,
     TempoDiCasting varchar(20) not null,
     ScuolaDiMagia varchar(20) not null,
     Componenti set("V","S","M") not null,
     Durata varchar(20) not null,
     Concentrazione bool not null,
     constraint ID_INCAN_AZION_ID primary key (IdAzione));

create table Infligge (
     IdAzione varchar(20) not null,
     Tipo_di_danno varchar(20) not null,
     Danno varchar(10) not null,
     constraint ID_Infligge_ID primary key (IdAzione, Tipo_di_danno));

create table Inventario (
     Id_oggetto int not null,
     IDPersonaggio int not null,
     constraint ID_Inventario_ID primary key (IDPersonaggio, Id_oggetto));

create table LUOGO_D_INTERESSE (
     Id_luogo_d_interesse int not null,
     Nome varchar(20) not null,
     Tipologia varchar(20) not null,
     Descrizione text not null,
     Appartiene int,
     Mondo int not null,
     Stato varchar(20) not null,
     constraint ID_LUOGO_D_INTERESSE_ID primary key (Id_luogo_d_interesse));

create table Modifica_al_danno (
     Tipo_di_danno varchar(20) not null,
     IDTratto int not null,
     Tipologia enum("Immunità", "Resistenza", "debolezza") not null,
     constraint ID_Modifica_al_danno_ID primary key (Tipo_di_danno, IDTratto));

create table MONDO (
     Id_mondo int not null,
     Nome varchar(20) not null,
     Ambientazione varchar(20) not null,
     Descrizione text not null,
     Creatore varchar(20) not null,
     constraint ID_MONDO_ID primary key (Id_mondo));

create table MOSTRO (
     IDPersonaggio int not null,
     GS float not null,
     Creatore varchar(20) not null,
     constraint ID_MOSTR_PERSO_ID primary key (IDPersonaggio));

create table OGGETTO (
     Id_oggetto int not null,
     Nome varchar(20) not null,
     Costo int not null,
     Peso float not null,
     Descrizione text not null,
     Categoria varchar(50) not null,
     Rarita varchar(20) not null,
     Id_effetto_magico varchar(20),
     Creatore varchar(20) not null,
     constraint ID_OGGETTO_ID primary key (Id_oggetto));

create table PERSONAGGIO (
     IDPersonaggio int not null,
     Nome varchar(40) not null,
     Allineamento enum("LB", "NB", "CB", "LN", "NN", "CN", "LM", "NM", "CM") not null,
     Taglia enum("Minuscola", "Piccola", "Media", "Grande", "Enorme", "Mastodontica") not null,
     CA int not null,
     PercezionePassiva int not null,
     PB int not null,
     PF int not null,
     Descrizione text not null,
     Immagine blob null,
     constraint ID_PERSONAGGIO_ID primary key (IDPersonaggio));

create table PG (
     IDPersonaggio int not null,
     Livello int not null,
     Creatore varchar(20) not null,
     IdSpecie int not null,
     constraint ID_PG_PERSO_ID primary key (IDPersonaggio));

create table PNG (
     IdPNG int not null,
     Nome varchar(20) not null,
     Cognome varchar(20) not null,
     Eta int not null,
     Descrizione text not null,
     Id_luogo_d_interesse int not null,
     Scheda_Personaggio int,
     constraint ID_PNG_ID primary key (IdPNG));

create table Privilegio (
     IDTratto int not null,
     Classe varchar(20) not null,
     Livello int not null,
     constraint ID_Privilegio_ID primary key (Classe, IDTratto));

create table PROPRIETA__ARMI (
     Nome varchar(20) not null,
     Effetto text not null,
     constraint ID_PROPRIETA__ARMI_ID primary key (Nome));

create table SCENA (
     Id_campagna int not null,
     Data_Sessione date not null,
     Nome varchar(50) not null,
     Descrizione text not null,
     Id_luogo_d_interesse int not null,
     constraint ID_SCENA_ID primary key (Id_campagna, Data_Sessione, Nome));

create table SESSIONE (
     Id_campagna int not null,
     Data_Sessione date not null,
     Riassunto text,
     constraint ID_SESSIONE_ID primary key (Id_campagna, Data_Sessione));

create table SOTTO_CLASSE (
     Nome varchar(50) not null,
     Classe varchar(20) not null,
     Descrizione text not null,
     Creatore varchar(20) not null,
     constraint ID_SOTTO_CLASSE_ID primary key (Nome, Classe));

create table Sotto_Privilegio (
     IDTratto int not null,
     Nome_SottoClasse varchar(20) not null,
     Classe varchar(20) not null,
     Livello int not null,
     constraint ID_Sotto_Privilegio_ID primary key (Nome_SottoClasse, Classe, IDTratto));

create table Specializza (
     Nome_SottoClasse varchar(50) not null,
     Classe varchar(20) not null,
     IDPersonaggio int not null,
     constraint ID_Specializza_ID primary key (Nome_SottoClasse, Classe, IDPersonaggio));

create table SPECIE (
     IdSpecie int not null,
     Nome varchar(20) not null,
     Descrizione text not null,
     Creatore varchar(20) not null,
     constraint ID_SPECIE_ID primary key (IdSpecie));

create table Stat (
     IDPersonaggio int not null,
     Statistica varchar(20) not null,
     Valore int not null,
     constraint ID_Stat_ID primary key (IDPersonaggio, Statistica));

create table STATISTICA (
     Nome varchar(20) not null,
     Descrizione text not null,
     Creatore varchar(20) not null,
     constraint ID_STATISTICA_ID primary key (Nome));

create table STATO (
     Id_mondo int not null,
     Nome varchar(20) not null,
     Governo varchar(20) not null,
     Ricchezza enum("Povero", "Medio", "Agiato", "Ricco") not null,
     Architettura text not null,
     constraint ID_STATO_ID primary key (Id_mondo, Nome));

create table TIPO_DI_DANNO (
     Nome varchar(20) not null,
     Descrizione text not null,
     constraint ID_TIPO_DI_DANNO_ID primary key (Nome));

create table Tipologia (
     Id_oggetto int not null,
     Tipo_di_danno varchar(20) not null,
     Danno varchar(10) not null,
     constraint ID_Tipologia_ID primary key (Id_oggetto, Tipo_di_danno));

create table TRATTI (
     IDTratto int not null,
     Nome varchar(50) not null,
     Descrizione text not null,
     Creatore varchar(20) not null,
     constraint ID_TRATTI_ID primary key (IDTratto));

create table Tratto (
     IDTratto int not null,
     IdSpecie int not null,
     constraint ID_Tratto_ID primary key (IdSpecie, IDTratto));

create table Ubicazione (
     IDPersonaggio int not null,
     Id_luogo_d_interesse int not null,
     constraint ID_Ubicazione_ID primary key (IDPersonaggio, Id_luogo_d_interesse));

create table Vocazione (
     IDPersonaggio int not null,
     Classe varchar(20) not null,
     Livello int not null,
     constraint ID_Vocazione_ID primary key (IDPersonaggio, Classe));


-- Constraints Section
-- ___________________

alter table ABILITA add constraint REF_ABILI_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table ABILITA add constraint REF_ABILI_STATI_FK
     foreign key (Statistica)
     references STATISTICA(Nome);

alter table ARMATURA add constraint ID_ARMAT_OGGET_FK
     foreign key (Id_oggetto)
     references OGGETTO(Id_oggetto);

alter table Attribuzione add constraint REF_Attri_TRATT
     foreign key (IDTratto)
     references TRATTI(IDTratto);

alter table Attribuzione add constraint REF_Attri_AZION_FK
     foreign key (IdAzione)
     references AZIONE(IdAzione);

alter table Aumento add constraint REF_Aumen_STATI
     foreign key (Statistica)
     references STATISTICA(Nome);

alter table Aumento add constraint REF_Aumen_TRATT_FK
     foreign key (IDTratto)
     references TRATTI(IDTratto);

alter table AZIONE add constraint REF_AZION_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table Beneficio add constraint REF_Benef_TRATT_FK
     foreign key (IDTratto)
     references TRATTI(IDTratto);

alter table Beneficio add constraint REF_Benef_MOSTR
     foreign key (IDPersonaggio)
     references MOSTRO(IDPersonaggio);

alter table Bottino add constraint REF_Botti_LUOGO
     foreign key (Id_luogo_d_interesse)
     references LUOGO_D_INTERESSE(Id_luogo_d_interesse);

alter table Bottino add constraint REF_Botti_OGGET_FK
     foreign key (Id_oggetto)
     references OGGETTO(Id_oggetto);

alter table CAMPAGNA add constraint REF_CAMPA_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table CAMPAGNA add constraint REF_CAMPA_MONDO_FK
     foreign key (Id_mondo)
     references MONDO(Id_mondo);

alter table caratteristica add constraint REF_carat_OGGET
     foreign key (Id_oggetto)
     references OGGETTO(Id_oggetto);

alter table caratteristica add constraint REF_carat_PROPR_FK
     foreign key (Proprieta)
     references PROPRIETA__ARMI(Nome);

alter table CLASSE add constraint REF_CLASS_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table Competenza_Abilita add constraint REF_Compe_ABILI
     foreign key (IDAbilita)
     references ABILITA(Nome);

alter table Competenza_Abilita add constraint REF_Compe_TRATT_1_FK
     foreign key (IDTratto)
     references TRATTI(IDTratto);

alter table Competenza_Oggetto add constraint REF_Compe_TRATT_FK
     foreign key (IDTratto)
     references TRATTI(IDTratto);

alter table Competenza_Oggetto add constraint REF_Compe_OGGET
     foreign key (Id_oggetto)
     references OGGETTO(Id_oggetto);

alter table Dotazione add constraint REF_Dotaz_DOTE_FK
     foreign key (Dote)
     references DOTE(Nome);

alter table Dotazione add constraint REF_Dotaz_TRATT
     foreign key (IDTratto)
     references TRATTI(IDTratto);

alter table DOTE add constraint REF_DOTE_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table EFFETTO_MAGICO add constraint REF_EFFET_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table Eroe add constraint REF_Eroe_CAMPA_FK
     foreign key (Id_campagna)
     references CAMPAGNA(Id_campagna);

alter table Eroe add constraint REF_Eroe_PG
     foreign key (IDPersonaggio)
     references PG(IDPersonaggio);

alter table INCANTESIMO add constraint ID_INCAN_AZION_FK
     foreign key (IdAzione)
     references AZIONE(IdAzione);

alter table Infligge add constraint REF_Infli_TIPO__FK
     foreign key (Tipo_di_danno)
     references TIPO_DI_DANNO(Nome);

alter table Infligge add constraint REF_Infli_AZION
     foreign key (IdAzione)
     references AZIONE(IdAzione);

alter table Inventario add constraint REF_Inven_PG
     foreign key (IDPersonaggio)
     references PG(IDPersonaggio);

alter table Inventario add constraint REF_Inven_OGGET_FK
     foreign key (Id_oggetto)
     references OGGETTO(Id_oggetto);

alter table LUOGO_D_INTERESSE add constraint REF_LUOGO_LUOGO_FK
     foreign key (Appartiene)
     references LUOGO_D_INTERESSE(Id_luogo_d_interesse);

alter table LUOGO_D_INTERESSE add constraint REF_LUOGO_STATO_FK
     foreign key (Mondo, Stato)
     references STATO(Id_mondo, Nome);

alter table Modifica_al_danno add constraint REF_Modif_TRATT_FK
     foreign key (IDTratto)
     references TRATTI(IDTratto);

alter table Modifica_al_danno add constraint REF_Modif_TIPO_
     foreign key (Tipo_di_danno)
     references TIPO_DI_DANNO(Nome);

alter table MONDO add constraint REF_MONDO_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table MOSTRO add constraint ID_MOSTR_PERSO_FK
     foreign key (IDPersonaggio)
     references PERSONAGGIO(IDPersonaggio);

alter table MOSTRO add constraint REF_MOSTR_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table OGGETTO add constraint REF_OGGET_EFFET_FK
     foreign key (Id_effetto_magico)
     references EFFETTO_MAGICO(Id_effetto_magico);

alter table OGGETTO add constraint REF_OGGET_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table PG add constraint ID_PG_PERSO_FK
     foreign key (IDPersonaggio)
     references PERSONAGGIO(IDPersonaggio);

alter table PG add constraint REF_PG_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table PG add constraint REF_PG_SPECI_FK
     foreign key (IdSpecie)
     references SPECIE(IdSpecie);

alter table PNG add constraint REF_PNG_LUOGO_FK
     foreign key (Id_luogo_d_interesse)
     references LUOGO_D_INTERESSE(Id_luogo_d_interesse);

alter table PNG add constraint REF_PNG_MOSTR_FK
     foreign key (Scheda_Personaggio)
     references MOSTRO(IDPersonaggio);

alter table Privilegio add constraint REF_Privi_CLASS
     foreign key (Classe)
     references CLASSE(Nome);

alter table Privilegio add constraint REF_Privi_TRATT_FK
     foreign key (IDTratto)
     references TRATTI(IDTratto);

alter table SCENA add constraint REF_SCENA_SESSI
     foreign key (Id_campagna, Data_Sessione)
     references SESSIONE(Id_campagna, Data_Sessione);

alter table SCENA add constraint REF_SCENA_LUOGO_FK
     foreign key (Id_luogo_d_interesse)
     references LUOGO_D_INTERESSE(Id_luogo_d_interesse);

alter table SESSIONE add constraint REF_SESSI_CAMPA
     foreign key (Id_campagna)
     references CAMPAGNA(Id_campagna);

alter table SOTTO_CLASSE add constraint REF_SOTTO_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table SOTTO_CLASSE add constraint REF_SOTTO_CLASS
     foreign key (Classe)
     references CLASSE(Nome);

alter table Sotto_Privilegio add constraint REF_Sotto_SOTTO
     foreign key (Nome_SottoClasse, Classe)
     references SOTTO_CLASSE(Nome, Classe);

alter table Sotto_Privilegio add constraint REF_Sotto_TRATT_FK
     foreign key (IDTratto)
     references TRATTI(IDTratto);

alter table Specializza add constraint EQU_Speci_PG_FK
     foreign key (IDPersonaggio)
     references PG(IDPersonaggio);

alter table Specializza add constraint REF_Speci_SOTTO
     foreign key (Nome_SottoClasse, Classe)
     references SOTTO_CLASSE(Nome, Classe);

alter table SPECIE add constraint REF_SPECI_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table Stat add constraint REF_Stat_STATI_FK
     foreign key (Statistica)
     references STATISTICA(Nome);

alter table Stat add constraint REF_Stat_PERSO
     foreign key (IDPersonaggio)
     references PERSONAGGIO(IDPersonaggio);

alter table STATISTICA add constraint REF_STATI_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table STATO add constraint REF_STATO_MONDO
     foreign key (Id_mondo)
     references MONDO(Id_mondo);

alter table Tipologia add constraint REF_Tipol_TIPO__FK
     foreign key (Tipo_di_danno)
     references TIPO_DI_DANNO(Nome);

alter table Tipologia add constraint REF_Tipol_OGGET
     foreign key (Id_oggetto)
     references OGGETTO(Id_oggetto);

alter table TRATTI add constraint REF_TRATT_GIOCA_FK
     foreign key (Creatore)
     references GIOCATORE(Nickname);

alter table Tratto add constraint REF_Tratt_SPECI
     foreign key (IdSpecie)
     references SPECIE(IdSpecie);

alter table Tratto add constraint REF_Tratt_TRATT_FK
     foreign key (IDTratto)
     references TRATTI(IDTratto);

alter table Ubicazione add constraint REF_Ubica_LUOGO_FK
     foreign key (Id_luogo_d_interesse)
     references LUOGO_D_INTERESSE(Id_luogo_d_interesse);

alter table Ubicazione add constraint REF_Ubica_MOSTR
     foreign key (IDPersonaggio)
     references MOSTRO(IDPersonaggio);

alter table Vocazione add constraint REF_Vocaz_CLASS
     foreign key (Classe)
     references CLASSE(Nome);

alter table Vocazione add constraint EQU_Vocaz_PG_FK
     foreign key (IDPersonaggio)
     references PG(IDPersonaggio);


-- Index Section
-- _____________

create unique index ID_ABILITA__IND
     on ABILITA (Nome);

create index REF_ABILI_GIOCA_IND
     on ABILITA (Creatore);

create index REF_ABILI_STATI_IND
     on ABILITA (Statistica);

create unique index ID_ARMAT_OGGET_IND
     on ARMATURA (Id_oggetto);

create unique index ID_Attribuzione_IND
     on Attribuzione (IDTratto, IdAzione);

create index REF_Attri_AZION_IND
     on Attribuzione (IdAzione);

create unique index ID_Aumento_IND
     on Aumento (Statistica, IDTratto);

create index REF_Aumen_TRATT_IND
     on Aumento (IDTratto);

create unique index ID_AZIONE_IND
     on AZIONE (IdAzione);

create index REF_AZION_GIOCA_IND
     on AZIONE (Creatore);

create unique index ID_Beneficio_IND
     on Beneficio (IDPersonaggio, IDTratto);

create index REF_Benef_TRATT_IND
     on Beneficio (IDTratto);

create unique index ID_Bottino_IND
     on Bottino (Id_luogo_d_interesse, Id_oggetto);

create index REF_Botti_OGGET_IND
     on Bottino (Id_oggetto);

create unique index ID_CAMPAGNA_IND
     on CAMPAGNA (Id_campagna);

create index REF_CAMPA_GIOCA_IND
     on CAMPAGNA (Creatore);

create index REF_CAMPA_MONDO_IND
     on CAMPAGNA (Id_mondo);

create unique index ID_caratteristica_IND
     on caratteristica (Id_oggetto, Proprieta);

create index REF_carat_PROPR_IND
     on caratteristica (Proprieta);

create unique index ID_CLASSE_IND
     on CLASSE (Nome);

create index REF_CLASS_GIOCA_IND
     on CLASSE (Creatore);

create unique index ID_Competenza_Abilita_IND
     on Competenza_Abilita (IDAbilita, IDTratto);

create index REF_Compe_TRATT_1_IND
     on Competenza_Abilita (IDAbilita);

create unique index ID_Competenza_Oggetto_IND
     on Competenza_Oggetto (Id_oggetto, IDTratto);

create index REF_Compe_TRATT_IND
     on Competenza_Oggetto (IDTratto);

create unique index ID_Dotazione_IND
     on Dotazione (IDTratto, Dote);

create index REF_Dotaz_DOTE_IND
     on Dotazione (Dote);

create unique index ID_DOTE_IND
     on DOTE (Nome);

create index REF_DOTE_GIOCA_IND
     on DOTE (Creatore);

create unique index ID_EFFETTO_MAGICO_IND
     on EFFETTO_MAGICO (Id_effetto_magico);

create index REF_EFFET_GIOCA_IND
     on EFFETTO_MAGICO (Creatore);

create unique index ID_Eroe_IND
     on Eroe (IDPersonaggio, Id_campagna);

create index REF_Eroe_CAMPA_IND
     on Eroe (Id_campagna);

create unique index ID_GIOCATORE_IND
     on GIOCATORE (Nickname);

create unique index ID_INCAN_AZION_IND
     on INCANTESIMO (IdAzione);

create unique index ID_Infligge_IND
     on Infligge (IdAzione, Tipo_di_danno);

create index REF_Infli_TIPO__IND
     on Infligge (Tipo_di_danno);

create unique index ID_Inventario_IND
     on Inventario (IDPersonaggio, Id_oggetto);

create index REF_Inven_OGGET_IND
     on Inventario (Id_oggetto);

create unique index ID_LUOGO_D_INTERESSE_IND
     on LUOGO_D_INTERESSE (Id_luogo_d_interesse);

create index REF_LUOGO_LUOGO_IND
     on LUOGO_D_INTERESSE (Appartiene);

create index REF_LUOGO_STATO_IND
     on LUOGO_D_INTERESSE (Mondo, Stato);

create unique index ID_Modifica_al_danno_IND
     on Modifica_al_danno (Tipo_di_danno, IDTratto);

create index REF_Modif_TRATT_IND
     on Modifica_al_danno (IDTratto);

create unique index ID_MONDO_IND
     on MONDO (Id_mondo);

create index REF_MONDO_GIOCA_IND
     on MONDO (Creatore);

create unique index ID_MOSTR_PERSO_IND
     on MOSTRO (IDPersonaggio);

create index REF_MOSTR_GIOCA_IND
     on MOSTRO (Creatore);

create unique index ID_OGGETTO_IND
     on OGGETTO (Id_oggetto);

create index REF_OGGET_EFFET_IND
     on OGGETTO (Id_effetto_magico);

create index REF_OGGET_GIOCA_IND
     on OGGETTO (Creatore);

create unique index ID_PERSONAGGIO_IND
     on PERSONAGGIO (IDPersonaggio);

create unique index ID_PG_PERSO_IND
     on PG (IDPersonaggio);

create index REF_PG_GIOCA_IND
     on PG (Creatore);

create index REF_PG_SPECI_IND
     on PG (IdSpecie);

create unique index ID_PNG_IND
     on PNG (IdPNG);

create index REF_PNG_LUOGO_IND
     on PNG (Id_luogo_d_interesse);

create index REF_PNG_MOSTR_IND
     on PNG (Scheda_Personaggio);

create unique index ID_Privilegio_IND
     on Privilegio (Classe, IDTratto);

create index REF_Privi_TRATT_IND
     on Privilegio (IDTratto);

create unique index ID_PROPRIETA__ARMI_IND
     on PROPRIETA__ARMI (Nome);

create unique index ID_SCENA_IND
     on SCENA (Id_campagna, Data_Sessione, Nome);

create index REF_SCENA_LUOGO_IND
     on SCENA (Id_luogo_d_interesse);

create unique index ID_SESSIONE_IND
     on SESSIONE (Id_campagna, Data_Sessione);

create unique index ID_SOTTO_CLASSE_IND
     on SOTTO_CLASSE (Nome, Classe);

create index REF_SOTTO_GIOCA_IND
     on SOTTO_CLASSE (Creatore);

create unique index ID_Sotto_Privilegio_IND
     on Sotto_Privilegio (Nome_SottoClasse, Classe, IDTratto);

create index REF_Sotto_TRATT_IND
     on Sotto_Privilegio (IDTratto);

create unique index ID_Specializza_IND
     on Specializza (Nome_SottoClasse, Classe, IDPersonaggio);

create index EQU_Speci_PG_IND
     on Specializza (IDPersonaggio);

create unique index ID_SPECIE_IND
     on SPECIE (IdSpecie);

create index REF_SPECI_GIOCA_IND
     on SPECIE (Creatore);

create unique index ID_Stat_IND
     on Stat (IDPersonaggio, Statistica);

create index REF_Stat_STATI_IND
     on Stat (Statistica);

create unique index ID_STATISTICA_IND
     on STATISTICA (Nome);

create index REF_STATI_GIOCA_IND
     on STATISTICA (Creatore);

create unique index ID_STATO_IND
     on STATO (Id_mondo, Nome);

create unique index ID_TIPO_DI_DANNO_IND
     on TIPO_DI_DANNO (Nome);

create unique index ID_Tipologia_IND
     on Tipologia (Id_oggetto, Tipo_di_danno);

create index REF_Tipol_TIPO__IND
     on Tipologia (Tipo_di_danno);

create unique index ID_TRATTI_IND
     on TRATTI (IDTratto);

create index REF_TRATT_GIOCA_IND
     on TRATTI (Creatore);

create unique index ID_Tratto_IND
     on Tratto (IdSpecie, IDTratto);

create index REF_Tratt_TRATT_IND
     on Tratto (IDTratto);

create unique index ID_Ubicazione_IND
     on Ubicazione (IDPersonaggio, Id_luogo_d_interesse);

create index REF_Ubica_LUOGO_IND
     on Ubicazione (Id_luogo_d_interesse);

create unique index ID_Vocazione_IND
     on Vocazione (Classe, IDPersonaggio);

create index EQU_Vocaz_PG_IND
     on Vocazione (IDPersonaggio);

ALTER TABLE CAMPAGNA
MODIFY Id_campagna int NOT NULL AUTO_INCREMENT;

ALTER TABLE Mondo
MODIFY Id_mondo int NOT NULL AUTO_INCREMENT;

ALTER TABLE LUOGO_D_INTERESSE
MODIFY Id_luogo_d_interesse int NOT NULL AUTO_INCREMENT;

ALTER TABLE SPECIE
MODIFY IdSpecie int NOT NULL AUTO_INCREMENT;

ALTER TABLE PERSONAGGIO
MODIFY IDPersonaggio int NOT NULL AUTO_INCREMENT;

ALTER TABLE OGGETTO
MODIFY Id_oggetto int NOT NULL AUTO_INCREMENT;

ALTER TABLE PNG
MODIFY IdPNG int NOT NULL AUTO_INCREMENT;

ALTER TABLE TRATTI
MODIFY IDTratto int NOT NULL AUTO_INCREMENT;

