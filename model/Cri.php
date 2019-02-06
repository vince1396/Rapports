<?php

    class Cri
    {
        private $_id;
        private $_ref;
        
        private $_detailsPresta;
        private $_newInter;
        private $_commentaire;
    
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
    
        public function getId()                       {return $this->_id;}
        public function getRef()                     {return $this->_ref;}
        public function getDateInter()         {return $this->_dateInter;}
        public function getIntervenants()   {return $this->_intervenants;}
        public function getReseau()               {return $this->_reseau;}
        public function getDetailsPresta() {return $this->_detailsPresta;}
        public function getProbleme()           {return $this->_probleme;}
        public function getActions()             {return $this->_actions;}
        public function getPieces()               {return $this->_pieces;}
        public function getEtatReseau()       {return $this->_etatReseau;}
        public function getNewInter()           {return $this->_newInter;}
        public function getCommentaire()     {return $this->_commentaire;}
    
        public function setId($id)
        {
            $this->_id = $id;
        }
        
        public function setRef($ref)
        {
            $this->_ref = $ref;
        }
    
        public function setDateInter($dateInter)
        {
            $this->_dateInter = $dateInter;
        }
    
        public function setIntervenants($intervenants)
        {
            $this->_intervenants = $intervenants;
        }
    
        public function setReseau($reseau)
        {
            $this->_reseau = $reseau;
        }
    
        public function setDetailsPresta($detailsPresta)
        {
            $this->_detailsPresta = $detailsPresta;
        }
    
        public function setProbleme($probleme)
        {
            $this->_probleme = $probleme;
        }
    
        public function setActions($actions)
        {
            $this->_actions = $actions;
        }
    
        public function setPieces($pieces)
        {
            $this->_pieces = $pieces;
        }
    
        public function setEtatReseau($etatReseau)
        {
            $this->_etatReseau = $etatReseau;
        }
    
        public function setNewInter($newInter)
        {
            $this->_newInter = $newInter;
        }
        
        public function setCommentaire($commentaire)
        {
            $this->_commentaire = $commentaire;
        }
    }