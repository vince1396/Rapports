-- we don't know how to generate root <with-no-name> (class Root) :(
create table action
(
	id_action int auto_increment
		primary key,
	libelle varchar(255) not null,
	desc_action text not null
);

create table date_cri
(
	id_date_inter int auto_increment
		primary key,
	date_inter date not null
);

create table etat_reseau
(
	id_etat int auto_increment
		primary key,
	desc_etat varchar(255) not null
);

create table reseau
(
	id_reseau int auto_increment
		primary key,
	nom_reseau varchar(255) not null
);

create table tech
(
	id_tech int auto_increment
		primary key,
	nom varchar(255) not null,
	prenom varchar(255) not null,
	email varchar(255) not null,
	mdp varchar(255) not null
);

create table rapport
(
	id_rapport int auto_increment
		primary key,
	date_rapport date not null,
	nom_client varchar(50) not null,
	contact varchar(255) not null,
	adresse varchar(255) not null,
	cp varchar(50) not null,
	ville varchar(50) not null,
	id_tech int not null,
	constraint rapport_tech_FK
		foreign key (id_tech) references tech (id_tech)
);

create table cri
(
	id_rapport int not null
		primary key,
	ref_cri varchar(255) not null,
	probleme text null,
	details_presta text null,
	new_inter varchar(50) not null,
	commentaire text not null,
	id_reseau int not null,
	id_etat int not null,
	id_tech int not null,
	constraint cri_etat_reseau1_FK
		foreign key (id_etat) references etat_reseau (id_etat),
	constraint cri_rapport_FK
		foreign key (id_rapport) references rapport (id_rapport),
	constraint cri_reseau0_FK
		foreign key (id_reseau) references reseau (id_reseau),
	constraint cri_tech2_FK
		foreign key (id_tech) references tech (id_tech)
);

create table effectuer
(
	id_rapport int not null,
	id_date_inter int not null,
	id_tech int not null,
	primary key (id_rapport, id_date_inter, id_tech),
	constraint effectuer_cri_FK
		foreign key (id_rapport) references cri (id_rapport),
	constraint effectuer_date_cri0_FK
		foreign key (id_date_inter) references date_cri (id_date_inter),
	constraint effectuer_tech1_FK
		foreign key (id_tech) references tech (id_tech)
);

create table piece
(
	id_piece int auto_increment
		primary key,
	ref_piece varchar(255) not null,
	details_piece varchar(255) not null,
	qte int not null,
	id_rapport int not null,
	constraint piece_cri_FK
		foreign key (id_rapport) references cri (id_rapport)
);

create table realiser
(
	id_action int not null,
	id_rapport int not null,
	primary key (id_action, id_rapport),
	constraint realiser_action_FK
		foreign key (id_action) references action (id_action),
	constraint realiser_cri0_FK
		foreign key (id_rapport) references cri (id_rapport)
);

