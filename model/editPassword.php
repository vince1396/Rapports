<?php
    
    function getTargetTech($id_tech)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM tech
                                       WHERE id_tech = :id_tech");
        $req->bindValue(":id_tech", $id_tech, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function updatePassword($id_tech, $mdp)
    {
        global $bdd;
        
        $req = $bdd->prepare("UPDATE tech
                                       SET mdp = :mdp
                                       WHERE id_tech= :id_tech");
        
        $req->bindValue(":mdp",     $mdp,     PDO::PARAM_STR);
        $req->bindValue(":id_tech", $id_tech, PDO::PARAM_INT);
        
        $req->execute();
    }