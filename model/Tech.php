<?php

    class Tech
    {
        private $_id;
        private $_nom;
        private $_prenom;
        private $_email;
        private $_mdp;
        
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
    
        public function getNom()      {return $this->_nom;}
        public function getPrenom(){return $this->_prenom;}
        public function getEmail()  {return $this->_email;}
        public function getMdp()      {return $this->_mdp;}
        public function getId()        {return $this->_id;}
    
        public function setId($id)
        {
            $this->_id = $id;
        }
    
        public function setNom($nom)
        {
            if(is_string($nom))
            {
                $this->_nom = $nom;
            }
            else
            {
                echo "Tech -> $ nom is not a string";
            }
        }
    
        public function setPrenom($prenom)
        {
            if(is_string($prenom))
            {
                $this->_prenom = $prenom;
            }
            else
            {
                echo "Tech -> $ prenom is not a string";
            }
        }

        public function setEmail($email)
        {
            if(is_string($email))
            {
                $this->_email = $email;
            }
            else
            {
                echo "Tech -> $ email is not a string";
            }
        }

        public function setMdp($mdp)
        {
            if(is_string($mdp))
            {
                $this->_mdp = $mdp;
            }
            else
            {
                echo "Tech -> $ mdp is not a string";
            }
        }
    }