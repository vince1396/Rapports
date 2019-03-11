<?php
    
    function getTechs()
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM tech
                                       WHERE lvl < 1");
        $req->execute();
        
        return $req;
    }
    
    function deleteTech($id_tech)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM tech
                                       WHERE id_tech = :id_tech");
        $req->bindValue(":id_tech", $id_tech, PDO::PARAM_INT);
        $req->execute();
    }
    
    function addTech($post)
    {
        global $bdd;
        
        $req = $bdd->prepare("INSERT INTO tech
                                       VALUES (NULL, :nom, :prenom, :email, :mdp, 0)");
        $req->bindValue(":nom",    $post["nom"],   PDO::PARAM_STR);
        $req->bindValue(":prenom", $post["prenom"],PDO::PARAM_STR);
        $req->bindValue(":email",  $post["email"], PDO::PARAM_STR);
        $req->bindValue(":mdp",    $post["mdp"],   PDO::PARAM_STR);
        
        $req->execute();
    }