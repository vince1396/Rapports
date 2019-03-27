<?php
    
    function updateRapport($id_rapport, $field, $val)
    {
        global $bdd;
        
        $req = $bdd->prepare("UPDATE rapport
                                       SET :field = :val
                                       WHERE id_rapport = :id_rapport
                                       ");
        $req->bindValue(":field", $field, PDO::PARAM_STR);
        $req->bindValue(":val", $val, PDO::PARAM_STR);
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        
        $req->execute();
    }