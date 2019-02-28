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
            if(isEmpty($post['ref']))
            {
                $log .= " / Référence manquante";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['date_rapport']))
            {
                $log .= " / Date Rapport manquante";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['nom_client']))
            {
                $log .= " / Nom client manquant";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['contact']))
            {
                $log .= " / Nom contact manquant";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['adresse']))
            {
                $log .= " / Adresse manquante";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['cp']))
            {
                $log .= " / Code postal manquant";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['ville']))
            {
                $log .= " / Ville manquante";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['detailPresta']))
            {
                $log .= " / Détails de prestation manquants";
                $error = true;
            }
            // =========================================================================================================
            if(isset($post['dateInter']))
            {
                $nbError = 0;
                foreach($post['dateInter'] as $idDate => $date)
                {
                    if(isEmpty($post['dateInter'][$idDate]))
                    {
                        $nbError++;
                        $log .= "/ ".$nbError." date(s) d'intervention non renseignée(s)";
                        $error = true;
                    }
                }
            }
            // =========================================================================================================
            if(!isset($post['tech'][0]) OR isEmpty($post['tech'][0]))
            {
                $log .= " / Aucun intervenant séléctionné";
                $error = true;
            }
            // =========================================================================================================
            if(!isset($post['reseau']) OR isEmpty($post['reseau']))
            {
                $log .= " / Aucun réseau séléctionné";
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
                    //TODO : Fix insert pieces
                    
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