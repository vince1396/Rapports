<?php

    function getTech()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT id_tech, nom, prenom FROM tech");
        $req->execute();

        return $req;
    }

    function getReseau()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT * FROM reseau");
        $req->execute();

        return $req;
    }

    function getActions()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT * FROM action");
        $req->execute();

        return $req;
    }

    function getEtatReseau()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT * FROM etat_reseau");
        $req->execute();

        return $req;
    }
    
    function insertRapport($post)
    {
        global $bdd;
        
        $req = $bdd->prepare("INSERT INTO rapport
                                       VALUES (NULL, :date_rapport, :nom_client, :contact, :adresse, :cp, :ville, :id_tech)");
        
        $req->bindValue(":date_rapport", $post["date_rapport"], PDO::PARAM_STR);
        $req->bindValue(":nom_client",   $post["nom_client"],   PDO::PARAM_STR);
        $req->bindValue(":contact",      $post["contact"],      PDO::PARAM_STR);
        $req->bindValue(":adresse",      $post["adresse"],      PDO::PARAM_STR);
        $req->bindValue(":cp",           $post["cp"],           PDO::PARAM_STR);
        $req->bindValue(":ville",        $post["ville"],        PDO::PARAM_STR);
        $req->bindValue(":id_tech",      $_SESSION["id_tech"],  PDO::PARAM_INT);
        
        $req->execute();
    }
    
    function insertCri($post, $lastRapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("INSERT INTO cri
                                       VALUES (:id_rapport, :ref_cri, :probleme, :details_presta, :new_inter, :id_reseau, :id_etat, :id_tech)");
        
        $req->bindValue(":id_rapport",     $lastRapport,           PDO::PARAM_INT);
        $req->bindValue(":ref_cri",        $post["ref"],           PDO::PARAM_STR);
        $req->bindValue(":probleme",       $post["probleme"],      PDO::PARAM_STR);
        $req->bindValue(":details_presta", $post["detailPresta"],  PDO::PARAM_STR);
        $req->bindValue(":new_inter",      $post["needInter"],     PDO::PARAM_STR);
        $req->bindValue(":id_reseau",      $post["reseau"],        PDO::PARAM_INT);
        $req->bindValue(":id_etat",        $post["etatReseau"],    PDO::PARAM_INT);
        $req->bindValue(":id_tech",        $_SESSION["id_tech"],   PDO::PARAM_INT);
        
        $req->execute();
    }
    
    function insertEffectuer($date, $tech, $lastRapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("INSERT INTO effectuer
                                       VALUES (:id_rapport, :id_date_inter, :id_tech)");
        
        $req->bindValue(":id_rapport",    $lastRapport, PDO::PARAM_INT);
        $req->bindValue(":id_date_inter", $date,        PDO::PARAM_INT);
        $req->bindValue(":id_tech",       $tech,        PDO::PARAM_INT);
        
        $req->execute();
    }
    
    function insertDatesInter($date_inter)
    {
        global $bdd;
        
        $req = $bdd->prepare("INSERT INTO date_cri
                                       VALUES (NULL, :date_inter)");
        
        $req->bindValue(":date_inter", $date_inter, PDO::PARAM_STR);
        
        $req->execute();
    }
    
    function insertRealiser($action, $lastRapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("INSERT INTO realiser
                                       VALUES (:id_action, :id_rapport)");
    
        $req->bindValue(":id_action",  $action,      PDO::PARAM_INT);
        $req->bindValue(":id_rapport", $lastRapport, PDO::PARAM_INT);
        
        $req->execute();
    }
    
    function insertPiece($ref_piece, $details_piece, $qte, $lastRapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("INSERT INTO piece
                                       VALUES (NULL, :ref_piece, :details_piece, :qte, :id_rapport)");
        
        $req->bindValue(":ref_piece",      $ref_piece,     PDO::PARAM_STR);
        $req->bindValue(":details_piece",  $details_piece, PDO::PARAM_STR);
        $req->bindValue(":qte",            $qte,           PDO::PARAM_INT);
        $req->bindValue(":id_rapport",     $lastRapport,   PDO::PARAM_INT);
        
        $req->execute();
    }
    
    function getLastId()
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT LAST_INSERT_ID()");
        $req->execute();
        
        return $req->fetch();
    }