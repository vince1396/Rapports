<?php
require 'model/createCri.php';

    if(isset($_SESSION['id_tech']) OR isset($_COOKIE['email']))
    {
        $techs = getTech()->fetchAll();
        $reseau = getReseau()->fetchAll();
        $actions = getActions()->fetchAll();
        $etat = getEtatReseau()->fetchAll();
        // =============================================================================================================
        // Form is sent
        if (isset($_POST['submit']))
        {
            $post = getPost();
            $log = "";
            $error = false;
            
            // =========================================================================================================
            if(!isset($post["ref"]) OR empty($post['ref']))
            {
                $log .= " / Référence manquante";
                $error = true;
            }
            // =========================================================================================================
            if(!isset($post["date_rapport"]) OR empty($post['date_rapport']))
            {
                $log .= " / Date Rapport manquante";
                $error = true;
            }
            // =========================================================================================================
            if(!isset($post["nom_client"]) OR empty($post['nom_client']))
            {
                $log .= " / Nom client manquant";
                $error = true;
            }
            // =========================================================================================================
            if(!isset($post["contact"]) OR empty($post['contact']))
            {
                $log .= " / Nom contact manquant";
                $error = true;
            }
            // =========================================================================================================
            if(!isset($post["cp"]) OR empty($post['cp']))
            {
                $log .= " / Code postal manquant";
                $error = true;
            }
            // =========================================================================================================
            if(!isset($post["ville"]) OR empty($post['ville']))
            {
                $log .= " / Ville manquante";
                $error = true;
            }
            // =========================================================================================================
            if(isset($post["detailPresta"]))
            {
                if(isEmpty($post['detailPresta']))
                {
                    $log .= " / Détails de prestation manquants";
                    $error = true;
                }
            }
            // =========================================================================================================
            if(isset($post['dateInter']))
            {
                $nbError = 0;
                foreach($post['dateInter'] as $idDate => $date)
                {
                    if(empty($post['dateInter'][$idDate]))
                    {
                        $nbError++;
                        $log .= "/ ".$nbError." date(s) d'intervention non renseignée(s)";
                        $error = true;
                    }
                }
            }
            else
            {
                $log = "Aucune date d'intervention renseignée";
                $error = true;
            }
            // =========================================================================================================
            if(!isset($post['tech'][0]) OR empty($post['tech'][0]))
            {
                $log .= " / Aucun intervenant séléctionné";
                $error = true;
            }
            // =========================================================================================================
            if(!isset($post['reseau']) OR empty($post['reseau']))
            {
                $log .= " / Aucun réseau séléctionné";
                $error = true;
            }
            // =========================================================================================================
            if(!isset($_POST["actions"][0]) OR empty($_POST["actions"][0]))
            {
                $log .= " / Aucune action séléctionné";
                $error = true;
            }
            // =========================================================================================================
            if(isset($post['pieceAChanger']) AND isset($post['piece']))
            {
                $nbError = 0;
                foreach($post['piece'] as $kD1 => $vD1)
                {
                    foreach($post['piece'][$kD1] as $kD2 => $vD2)
                    {
                        if(isEmpty($vD2))
                        {
                            $nbError++;
                            $error = true;
                        }
                    }
                }
                $log .= "/ ".$nbError." champ(s) de pièce(s) vide(s)";
            }
            // =========================================================================================================
            if(!isset($post['etatReseau']) OR isEmpty($post['etatReseau']))
            {
                $log .= "Etat Réseau non séléctionné";
                $error = true;
            }
            // =========================================================================================================
            if(!isset($post['needInter']) OR isEmpty($post['needInter']))
            {
                $log .= "Besoin nouvelle intervention non séléctionné";
                $error = true;
            }
            // =========================================================================================================
            if(!$error)
            {
                insertRapport($post);
                $lastRapport = getLastId();
                insertCri($post, $lastRapport[0]);
                
                foreach($post["dateInter"] as $idDate => $date)
                {
                    insertDatesInter($date);
                    $lastIdDate = getLastId();
    
                    foreach($post["tech"] as $idTech => $tech)
                    {
                        insertEffectuer($lastIdDate[0], $tech, $lastRapport[0]);
                    }
                }
                
                foreach($post["actions"] as $idAction => $action)
                {
                    insertRealiser($action, $lastRapport[0]);
                }
                
                foreach($post["piece"] as $kD1 => $vD1)
                {
                    insertPiece($post["piece"][$kD1]["refPiece"], $post["piece"][$kD1]["detailPiece"], $post["piece"][$kD1]["qtePiece"], $lastRapport[0]);
                }
            }
            // =========================================================================================================
        }
        // =============================================================================================================
    }
    else
    {
        header("Location: login");
    }

require 'view/createCri.php';