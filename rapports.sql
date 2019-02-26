#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: tech
#------------------------------------------------------------

CREATE TABLE tech(
        id_tech Int  Auto_increment  NOT NULL ,
        nom     Varchar (255) NOT NULL ,
        prenom  Varchar (255) NOT NULL ,
        email   Varchar (255) NOT NULL ,
        mdp     Varchar (255) NOT NULL
	,CONSTRAINT tech_PK PRIMARY KEY (id_tech)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: rapport
#------------------------------------------------------------

CREATE TABLE rapport(
        id_rapport   Int  Auto_increment  NOT NULL ,
        date_rapport Date NOT NULL ,
        nom_client   Varchar (50) NOT NULL ,
        titre        Varchar (255) NOT NULL ,
        contact      Varchar (255) NOT NULL ,
        adresse      Varchar (255) NOT NULL ,
        cp           Varchar (50) NOT NULL ,
        ville        Varchar (50) NOT NULL ,
        id_tech      Int NOT NULL
	,CONSTRAINT rapport_PK PRIMARY KEY (id_rapport)

	,CONSTRAINT rapport_tech_FK FOREIGN KEY (id_tech) REFERENCES tech(id_tech)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: date_cri
#------------------------------------------------------------

CREATE TABLE date_cri(
        id_date_inter Int  Auto_increment  NOT NULL ,
        date_inter    Date NOT NULL
	,CONSTRAINT date_cri_PK PRIMARY KEY (id_date_inter)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reseau
#------------------------------------------------------------

CREATE TABLE reseau(
        id_reseau  Int  Auto_increment  NOT NULL ,
        nom_reseau Varchar (255) NOT NULL
	,CONSTRAINT reseau_PK PRIMARY KEY (id_reseau)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: action
#------------------------------------------------------------

CREATE TABLE action(
        id_action   Int  Auto_increment  NOT NULL ,
        libelle     Varchar (255) NOT NULL ,
        desc_action Text NOT NULL
	,CONSTRAINT action_PK PRIMARY KEY (id_action)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: etat_reseau
#------------------------------------------------------------

CREATE TABLE etat_reseau(
        id_etat   Int  Auto_increment  NOT NULL ,
        desc_etat Varchar (255) NOT NULL
	,CONSTRAINT etat_reseau_PK PRIMARY KEY (id_etat)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: cri
#------------------------------------------------------------

CREATE TABLE cri(
        id_rapport     Int NOT NULL ,
        ref_cri        Varchar (255) NOT NULL ,
        probleme       Text ,
        details_presta Text ,
        new_inter      Bool NOT NULL ,
        commentaire    Text NOT NULL ,
        date_rapport   Date NOT NULL ,
        nom_client     Varchar (50) NOT NULL ,
        titre          Varchar (255) NOT NULL ,
        contact        Varchar (255) NOT NULL ,
        adresse        Varchar (255) NOT NULL ,
        cp             Varchar (50) NOT NULL ,
        ville          Varchar (50) NOT NULL ,
        id_reseau      Int NOT NULL ,
        id_etat        Int NOT NULL ,
        id_tech        Int NOT NULL
	,CONSTRAINT cri_PK PRIMARY KEY (id_rapport)

	,CONSTRAINT cri_rapport_FK FOREIGN KEY (id_rapport) REFERENCES rapport(id_rapport)
	,CONSTRAINT cri_reseau0_FK FOREIGN KEY (id_reseau) REFERENCES reseau(id_reseau)
	,CONSTRAINT cri_etat_reseau1_FK FOREIGN KEY (id_etat) REFERENCES etat_reseau(id_etat)
	,CONSTRAINT cri_tech2_FK FOREIGN KEY (id_tech) REFERENCES tech(id_tech)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: piece
#------------------------------------------------------------

CREATE TABLE piece(
        id_piece      Int  Auto_increment  NOT NULL ,
        ref_piece     Varchar (255) NOT NULL ,
        details_piece Varchar (255) NOT NULL ,
        qte           Int NOT NULL ,
        id_rapport    Int NOT NULL
	,CONSTRAINT piece_PK PRIMARY KEY (id_piece)

	,CONSTRAINT piece_cri_FK FOREIGN KEY (id_rapport) REFERENCES cri(id_rapport)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: effectuer
#------------------------------------------------------------

CREATE TABLE effectuer(
        id_rapport    Int NOT NULL ,
        id_date_inter Int NOT NULL ,
        id_tech       Int NOT NULL
	,CONSTRAINT effectuer_PK PRIMARY KEY (id_rapport,id_date_inter,id_tech)

	,CONSTRAINT effectuer_cri_FK FOREIGN KEY (id_rapport) REFERENCES cri(id_rapport)
	,CONSTRAINT effectuer_date_cri0_FK FOREIGN KEY (id_date_inter) REFERENCES date_cri(id_date_inter)
	,CONSTRAINT effectuer_tech1_FK FOREIGN KEY (id_tech) REFERENCES tech(id_tech)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: realiser
#------------------------------------------------------------

CREATE TABLE realiser(
        id_action  Int NOT NULL ,
        id_rapport Int NOT NULL
	,CONSTRAINT realiser_PK PRIMARY KEY (id_action,id_rapport)

	,CONSTRAINT realiser_action_FK FOREIGN KEY (id_action) REFERENCES action(id_action)
	,CONSTRAINT realiser_cri0_FK FOREIGN KEY (id_rapport) REFERENCES cri(id_rapport)
)ENGINE=InnoDB;

