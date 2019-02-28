<?php

    function getRapports()
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT DISTINCT r.id_rapport, c.ref_cri, r.nom_client, r.date_rapport
                                       FROM cri c, rapport r
                                       WHERE r.id_tech = :id_tech
                                       AND c.id_rapport = r.id_rapport");
        
        $req->bindValue(":id_tech", $_SESSION["id_tech"], PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function deletePiece($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM piece
                                       WHERE piece.id_rapport = :id_rapport");
        
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
    }
    
    function deleteRealiser()
    {
    
    }
    
    function deleteEffectuer()
    {
    
    }
    
    function deleteDate()
    {
    
    }
    
    function deleteCri()
    {
    
    }
    
    function deleteRapport()
    {
    
    }
    
    /* DELETION
    
        1 - Pièce
        2 - Réaliser
        3 - Effectuer
        4 - Dates
        5 - Cri
        6 - Rapport
    */