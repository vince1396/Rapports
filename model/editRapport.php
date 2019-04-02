<?php
    
    function updateRef($id_rapport, $value)
    {
        global $bdd;
        
        $req = $bdd->prepare("UPDATE cri
                                       SET ref_cri = :val
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        
        $req->execute();
    }
    
    function updateDateRapport($id_rapport, $value)
    {
        global $bdd;
    
        $req = $bdd->prepare("UPDATE rapport
                                       SET date_rapport = :val
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
    
        $req->execute();
    }
    
    function updateNomClient($id_rapport, $value)
    {
        global $bdd;
    
        $req = $bdd->prepare("UPDATE rapport
                                       SET nom_client = :val
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
    
        $req->execute();
    }
    
    function updateContact($id_rapport, $value)
    {
        global $bdd;
    
        $req = $bdd->prepare("UPDATE rapport
                                       SET contact = :val
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
    
        $req->execute();
    }
    
    function updateAdresse($id_rapport, $value)
    {
        global $bdd;
    
        $req = $bdd->prepare("UPDATE rapport
                                       SET adresse = :val
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
    
        $req->execute();
    }
    
    function updateCp($id_rapport, $value)
    {
        global $bdd;
    
        $req = $bdd->prepare("UPDATE rapport
                                       SET cp = :val
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
    
        $req->execute();
    }
    
    function updateVille($id_rapport, $value)
    {
        global $bdd;
    
        $req = $bdd->prepare("UPDATE rapport
                                       SET ville = :val
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
    
        $req->execute();
    }
    
    function updateProbleme($id_rapport, $value)
    {
        global $bdd;
    
        $req = $bdd->prepare("UPDATE cri
                                       SET probleme = :val
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
    
        $req->execute();
    }
    
    function updateDetailsPresta($id_rapport, $value)
    {
        global $bdd;
    
        $req = $bdd->prepare("UPDATE cri
                                       SET details_presta = :val
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
    
        $req->execute();
    }