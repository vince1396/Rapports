<?php
    
    class RapportManager
    {
        private $_db; // Instance de PDO.
        
        public function __construct($db)
        {
            $this->setDb($db);
        }
        
        public function add(Rapport $rapport)
        {
            $req = $this->_db->prepare("INSERT INTO rapport VALUES(NULL, :dateRapport, :nomClient, :titre, :contact, :adresse, :cp, :ville)");
            $req->bindValue(":dateRapport", $rapport->getDate(),    PDO::PARAM_STR);
            $req->bindValue(":nomClient",   $rapport->getClient(),  PDO::PARAM_STR);
            $req->bindValue(":titre",       $rapport->getTitre(),   PDO::PARAM_STR);
            $req->bindValue(":contact",     $rapport->getContact(), PDO::PARAM_STR);
            $req->bindValue(":adresse",     $rapport->getAdresse(), PDO::PARAM_STR);
            $req->bindValue(":cp",          $rapport->getCp(),      PDO::PARAM_STR);
            $req->bindValue(":ville",       $rapport->getVille(),   PDO::PARAM_STR);
            $req->execute();
        }
        
        public function delete(Rapport $rapport)
        {
            $req = $this->_db->prepare("DELETE FROM rapport WHERE id_rapport = :id");
            $req->bindValue(":id", $rapport->getId(), PDO::PARAM_INT);
            $req->execute();
        }
        
        public function get($id)
        {
            $req = $this->_db->prepare("SELECT * FROM rapport WHERE id_rapport = :id");
            $req->bindValue(":id", $id, PDO::PARAM_INT);
            $req->execute();
        }
        
        public function getList()
        {
            $rapports = [];
            $req = $this->_db->prepare("SELECT * FROM rapport ORDER BY date_rapport");
            $req->execute();
            
            while($donnees = $req->fetch(PDO::FETCH_ASSOC))
            {
                $rapports[] = new Rapport($donnees);
            }
            return $rapports;
        }
        
        public function update(Rapport $rapport)
        {
            $req = $this->_db->prepare("UPDATE rapport SET
                                        date_rapport = :dateRapport,
                                        nom_client = :nomClient,
                                        titre = :titre,
                                        contact = :contact,
                                        adresse = :adresse,
                                        cp = :cp,
                                        ville = :ville
                                        WHERE id_tech = :id");
            
            $req->bindValue(':dateRapport', $rapport->getDate(), PDO::PARAM_STR);
            $req->bindValue(':nomClient', $rapport->getClient(), PDO::PARAM_STR);
            $req->bindValue(':titre', $rapport->getTitre(), PDO::PARAM_STR);
            $req->bindValue(':contact', $rapport->getContact(), PDO::PARAM_STR);
            $req->bindValue(':adresse', $rapport->getAdresse(), PDO::PARAM_STR);
            $req->bindValue(':cp', $rapport->getCp(), PDO::PARAM_STR);
            $req->bindValue(':ville', $rapport->getVille(), PDO::PARAM_STR);
            $req->execute();
        }
        
        public function setDb(PDO $db)
        {
            $this->_db = $db;
        }
    }