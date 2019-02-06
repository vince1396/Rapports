<?php
    
    class TechManager
    {
        private $_db; // Instance de PDO.
        
        public function __construct($db)
        {
            $this->setDb($db);
        }
        
        public function add(Tech $tech)
        {
            $req = $this->_db->prepare("INSERT INTO tech VALUES(NULL, :nom, :prenom, :email, :mdp)");
            $req->bindValue(":nom",   $tech->getNom(), PDO::PARAM_STR);
            $req->bindValue(":prenom",$tech->getPrenom(), PDO::PARAM_STR);
            $req->bindValue(":email", $tech->getEmail(), PDO::PARAM_STR);
            $req->bindValue(":mdp",   $tech->getMdp(), PDO::PARAM_STR);
            $req->execute();
        }
        
        public function delete(Tech $tech)
        {
            $req = $this->_db->prepare("DELETE FROM tech WHERE id_tech = :id");
            $req->bindValue(":id", $tech->getId(), PDO::PARAM_INT);
            $req->execute();
        }
        
        public function get($id)
        {
            $req = $this->_db->prepare("SELECT * FROM tech WHERE id_tech = :id");
            $req->bindValue(":id", $id, PDO::PARAM_INT);
            $req->execute();
        }
        
        public function getList()
        {
            $techs = [];
            $req = $this->_db->prepare("SELECT * FROM tech ORDER BY nom");
            $req->execute();
            
            while($donnees = $req->fetch(PDO::FETCH_ASSOC))
            {
                $techs[] = new Tech($donnees);
            }
            return $techs;
        }
        
        public function update(Tech $tech)
        {
            $req = $this->_db->prepare("UPDATE tech SET nom = :nom, prenom = :prenom, email = :email, mdp = :mdp WHERE id_tech = :id");
    
            $req->bindValue(':nom', $tech->getNom(), PDO::PARAM_STR);
            $req->bindValue(':prenom', $tech->getPrenom(), PDO::PARAM_STR);
            $req->bindValue(':email', $tech->getEmail(), PDO::PARAM_STR);
            $req->bindValue(':mdp', $tech->getMdp(), PDO::PARAM_STR);
            $req->bindValue(':id', $tech->getId(), PDO::PARAM_STR);
    
            $req->execute();
        }
        
        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }