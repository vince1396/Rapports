<?php

    class Piece
    {
        private $_id;
        private $_ref;
        private $_details;

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
    
        public function getId() {return $this->_id;}
        public function getRef(){return $this->_ref;}
        public function getDetails(){return $this->_details;}
    
        public function setId($id)
        {
            $this->_id = $id;
        }
        
        public function setRef($ref)
        {
            $this->_ref = $ref;
        }
        
        public function setDetails($details)
        {
            $this->_details = $details;
        }
    }