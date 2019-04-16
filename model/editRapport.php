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
    
    function deleteDateCri($id_date)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM date_cri
                              WHERE id_date_inter = :id_date");
        $req->bindValue(":id_date", $id_date, PDO::PARAM_INT);
        
        $req->execute();
    }
    
    function insertDateCri($value)
    {
        global $bdd;
        
        $req = $bdd->prepare("INSERT INTO date_cri
                              VALUES (NULL, :val)");
        $req->bindValue(":val", $value, PDO::PARAM_STR);
        
        $req->execute();
    }
    
    function insertEffectuer($id_rapport, $id_tech)
    {
        global $bdd;
        $lastId = $bdd->lastInsertId();
        
        $req = $bdd->prepare("INSERT INTO effectuer
                       VALUES(:id_rapport, :lastId, :id_tech)");
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->bindValue(":lastId",     $lastId,     PDO::PARAM_INT);
        $req->bindValue(":id_tech",    $id_tech,    PDO::PARAM_INT);
        
        $req->execute();
    }
    
    function getUnselectedActions($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT * FROM action a
                                       WHERE a.id_action NOT IN (
                                            SELECT a.id_action FROM realiser r, action a
                                            WHERE r.id_rapport = :id_rapport
                                            AND r.id_action = a.id_action)
                                       ");
        
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function insertRealiser($id_rapport, $id_action)
    {
        global $bdd;
        
        $req = $bdd->prepare("INSERT INTO realiser
                                       VALUES(:id_action, :id_rapport)");
        $req->bindValue(":id_action",  $id_action,  PDO::PARAM_INT);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        
        $req->execute();
    }
    
    function deleteRealiser($id_rapport, $id_action)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM realiser
                                       WHERE id_action = :id_action
                                       AND id_rapport = :id_rapport");
        $req->bindValue(":id_action",  $id_action,  PDO::PARAM_INT);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        
        $req->execute();
    }