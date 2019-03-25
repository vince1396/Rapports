<?php

    function getRapports()
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT DISTINCT r.id_rapport, c.ref_cri, r.nom_client, r.date_rapport, t.nom, t.prenom
                                       FROM cri c, rapport r, tech t
                                       WHERE r.id_tech = :id_tech
                                       AND c.id_rapport = r.id_rapport
                                       AND r.id_tech = t.id_tech");
        
        $req->bindValue(":id_tech", $_SESSION["id_tech"], PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function deletePiece($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM piece
                                       WHERE id_rapport = :id_rapport");
        
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
    }
    
    function deleteRealiser($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM realiser
                                       WHERE id_rapport = :id_rapport");
        
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
    }
    
    function deleteEffectuer($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM effectuer
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
    }
    
    function deleteDate($id_date)
    {
        global $bdd;
    
        $req = $bdd->prepare("DELETE FROM date_cri
                                       WHERE id_date_inter = :id_date");
    
        $req->bindValue(":id_date", $id_date, PDO::PARAM_INT);
        $req->execute();
    }
    
    function deleteCri($id_rapport)
    {
        global $bdd;
    
        $req = $bdd->prepare("DELETE FROM cri
                                       WHERE id_rapport = :id_rapport");
    
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
    }
    
    function deleteRapport($id_rapport)
    {
        global $bdd;
    
        $req = $bdd->prepare("DELETE FROM rapport
                                       WHERE id_rapport = :id_rapport");
    
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
    }
    
    function selectDateToDelete($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT DISTINCT d.id_date_inter FROM date_cri d, effectuer e
                                       WHERE e.id_rapport = :id_rapport
                                       AND e.id_date_inter = d.id_date_inter");
        
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function checkPieces($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM piece
                                       WHERE id_rapport = :id_rapport");
        
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function techHasRapport($id_tech)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM rapport
                                       WHERE id_tech = :id_tech");
        $req->bindValue(":id_tech", $id_tech, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function adminHasRapport()
    {
        global $bdd;
        
        $req = $bdd-> prepare("SELECT * FROM rapport");
        $req->execute();
        
        return $req;
    }
    
    function getAllRapports()
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT DISTINCT * FROM rapport r, tech t,  cri c
                                       WHERE r.id_tech = t.id_tech
                                       AND r.id_rapport = c.id_rapport");
        $req->execute();
        
        return $req;
    }