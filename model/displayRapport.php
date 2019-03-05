<?php
    
    function getTargetRapport($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT date_rapport, nom_client, contact, adresse, cp, ville FROM rapport
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function getTargetCri($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT ref_cri, probleme, details_presta, new_inter, commentaire FROM cri
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function getTargetDates($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT date_inter FROM effectuer e, date_cri d
                                       WHERE e.id_rapport = :id_rapport
                                       AND e.id_date_inter = d.id_date_inter");
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function getTargetActions($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT libelle, desc_action FROM realiser r, action a
                                       WHERE r.id_rapport = :id_rapport
                                       AND r.id_action = a.id_action");
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function getTargetReseau($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT nom_reseau FROM cri c, reseau r
                                       WHERE c.id_rapport = :id_rapport
                                       AND c.id_reseau = r.id_reseau");
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function getTargetEtat($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT desc_etat FROM cri c, etat_reseau e
                                       WHERE c.id_rapport = :id_rapport
                                       AND c.id_etat = e.id_etat");
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function getTargetIntervenants($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT nom, prenom FROM effectuer e, tech t
                                       WHERE e.id_rapport = :id_rapport
                                       AND e.id_tech = t.id_tech");
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }
    
    function getTargetPieces($id_rapport)
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT ref_piece, details_piece, qte FROM piece
                                       WHERE id_rapport = :id_rapport");
        $req->bindValue(":id_rapport", $id_rapport, PDO::PARAM_INT);
        $req->execute();
        
        return $req;
    }