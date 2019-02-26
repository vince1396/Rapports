#------------------------------------------------------------
# Inserting Tech
#------------------------------------------------------------

INSERT INTO tech
  (id_tech, nom, prenom, email, mdp)
VALUES
  (NULL, "Cotini", "Vincent", "vcotini@decimale.net", sha1("cvincent")),
  (NULL, "Stenne", "Mathieu", "mstenne@decimale.net",sha1("smathieu")),
  (NULL, "Odouard", "Valentin", "vodouard@decimale.net",sha1("ovalentin")),
  (NULL, "Delabarre", "Dylan", "ddelabarre@decimale.net", sha1("ddylan")),
  (NULL, "Jaudeau", "Mathias", "mjaudeau@decimale.net", sha1("jmathias")),
  (NULL, "Salada", "Constantino", "csalada@decimale.net", sha1("sconstantino"));

#------------------------------------------------------------
# Inserting Actions
#------------------------------------------------------------

INSERT INTO action
  (id_action, libelle, desc_action)
VALUES
  (NULL, "SS0", "Vérification de l’alimentation du système / Réparation"),
  (NULL, "SS1", "Mesures de couverture 2G/3G/4G sur site"),
  (NULL, "SS2", "Mesures des niveaux sous chaque antenne / Capture d’écran des configurations"),
  (NULL, "SS3", "Contrôle des niveaux entrée/sortie des répéteurs sur interface"),
  (NULL, "SS4", "Mesures des puissances en sortie des répéteurs"),
  (NULL, "SS5", "Vérification des interconnexions FO + Ajustement"),
  (NULL, "SS6", "Nettoyage Fibre Optique"),
  (NULL, "SS7", "Réglage UL/DL"),
  (NULL, "SS8", "Réglage ou changement de l’antenne donneuse ou POI"),
  (NULL, "SS9", "Réparation complexe hors process (cartes optiques, contrôleur, autre, …)");

#------------------------------------------------------------
# Inserting EtatReseau
#------------------------------------------------------------

INSERT INTO etat_reseau
  (id_etat, desc_etat)
VALUES
  (NULL, "Fonctionnel"),
  (NULL, "Partiellement fonctionnel"),
  (NULL, "Non fonctionnel");

#------------------------------------------------------------
# Inserting Reseau
#------------------------------------------------------------

INSERT INTO reseau
  (id_reseau, nom_reseau)
VALUES
  (NULL, "MOBILE INDOOR"),
  (NULL, "WIFI INDOOR"),
  (NULL, "INPT/DMR");