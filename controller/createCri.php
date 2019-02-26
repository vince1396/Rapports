<?php
require 'model/createCri.php';

    if(isset($_SESSION['id_tech']) OR isset($_COOKIE['id_tech']))
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
            $log = [];
            $error = false;
            
            print_r($post);
            echo "<br />";
            
            // =========================================================================================================
            if(isEmpty($post['ref']))
            {
                $log[] = "Référence manquante";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['date_rapport']))
            {
                $log[] = "Date Rapport manquante";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['nom_client']))
            {
                $log[] = "Nom client manquant";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['contact']))
            {
                $log[] = "Nom contact manquant";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['adresse']))
            {
                $log[] = "Adresse manquante";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['cp']))
            {
                $log[] = "Code postal manquant";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['ville']))
            {
                $log[] = "Ville manquante";
                $error = true;
            }
            // =========================================================================================================
            if(isEmpty($post['detailPresta']))
            {
                $log[] = "Détails de prestation manquants";
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
                insertRapport();
                insertCri();
                
                foreach($post["dateInter"] as $idDate => $date)
                {
                    insertDatesInter($date);
    
                    foreach($post["tech"] as $idTech => $tech)
                    {
                        insertEffectuer(lastDate(), $tech);
                    }
                }
                
                foreach($post["actions"] as $idAction => $action)
                {
                    insertRealiser($action);
                }
                
                foreach($post["piece"] as $kD1 => $vD1)
                {
                    if(isset($tabPiece))
                        unset($tabPiece);
                    
                    $i = 0;
                    $tabPiece = [];
                    foreach($post["piece"][$kd1] as $kD2 => $vD2)
                    {
                        $tabPiece[$i] = $vD2;
                        $i++;
                    }
                    insertPiece($tabPiece[0], $tabPiece[1], $tabPiece[2]);
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