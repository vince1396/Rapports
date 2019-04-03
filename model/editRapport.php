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
    
    function updateRefPiece($id_piece, $value)
    {
        global $bdd;
        
        $req = $bdd->prepare("UPDATE piece
                                       SET ref_piece = :val
                                       WHERE id_piece = :id_piece");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        $req->bindValue(":id_piece", $id_piece, PDO::PARAM_INT);
        
        $req->execute();
    }
    
    function updateDetailsPiece($id_piece, $value)
    {
        global $bdd;
    
        $req = $bdd->prepare("UPDATE piece
                                       SET details_piece = :val
                                       WHERE id_piece = :id_piece");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        $req->bindValue(":id_piece", $id_piece, PDO::PARAM_INT);
    
        $req->execute();
    }
    
    function updateQtePiece($id_piece, $value)
    {
        global $bdd;
    
        $req = $bdd->prepare("UPDATE piece
                                       SET qte = :val
                                       WHERE id_piece = :id_piece");
        $req->bindValue(":val", $value, PDO::PARAM_INT);
        $req->bindValue(":id_piece", $id_piece, PDO::PARAM_INT);
    
        $req->execute();
    }
    
    function insertNewPiece($id_rapport, $post)
    {
        global $bdd;
        
        $req = $bdd->prepare("INSERT INTO piece
                                       VALUES (NULL, :ref, :details, :qte, :id_rapport)");
        $req->bindValue(":ref",            $post["ref"],     PDO::PARAM_STR);
        $req->bindValue(":details",        $post["details"], PDO::PARAM_STR);
        $req->bindValue(":qte",            $post["qte"],     PDO::PARAM_INT);
        $req->bindValue(":id_rapport",     $id_rapport,      PDO::PARAM_INT);
        
        $req->execute();
    }
    
    function deletePiece($id_piece)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM piece
                                       WHERE id_piece = :id_piece");
        $req->bindValue(":id_piece", $id_piece, PDO::PARAM_INT);
        
        $req->execute();
    }