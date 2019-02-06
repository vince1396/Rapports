<?php

    class Rapport
    {
        private $_id;
        private $_date;
        private $_client;
        private $_titre;
        private $_contact;
        private $_adresse;
        private $_cp;
        private $_ville;
    
        public function __construct(array $donnees)
        {
            $this->$this->hydrate($donnees);
        }
        
        public function hydrate(array $donnees)
        {
            foreach ($donnees as $key => $value)
            {
                // On récupère le nom du setter correspondant à l'attribut.
                $method = 'set'.ucfirst($key);
                // Si le setter correspondant existe.
                if (method_exists($this, $method))
                {
                    // On appelle le setter.
                    $this->$method($value);
                }
            }
        }
        
        public function getId()          {return $this->_id;}
        public function getDate()      {return $this->_date;}
        public function getClient()  {return $this->_client;}
        public function getTitre()    {return $this->_titre;}
        public function getContact(){return $this->_contact;}
        public function getAdresse(){return $this->_adresse;}
        public function getCp()          {return $this->_cp;}
        public function getVille()    {return $this->_ville;}
 
        public function setId($id)
        {
            $this->_id = $id;
        }
        
        public function setDate($date)
        {
            $this->_date = $date;
        }
        
        public function setClient($client)
        {
            $this->_client = $client;
        }
    
        public function setTitre($titre)
        {
            $this->_titre = $titre;
        }
    
        public function setContact($contact)
        {
            $this->_contact = $contact;
        }
    
        public function setAdresse($adresse)
        {
            $this->_adresse = $adresse;
        }
    
        public function setCp($cp)
        {
            $this->_cp = $cp;
        }
    
        public function setVille($ville)
        {
            $this->_ville = $ville;
        }
    }