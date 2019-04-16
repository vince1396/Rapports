<?php
    
    require "model/displayRapport.php";
    require "model/editRapport.php";
    
    if(isset($_SESSION['id_tech']))
    {
        if(isset($_GET["opt"]) AND isset($_GET["id"]))
        {
            if($_GET["opt"] == "edit")
            {
                $id_rapport = $_GET["id"];
                
                // =====================================================================================================
                // Get all rapport's data
                $rapport = getTargetRapport($id_rapport)->fetch();
                $cri     = getTargetCri($id_rapport)->fetch();
                $dates   = getTargetDates($id_rapport)->fetchAll();
                $actions = getTargetActions($id_rapport)->fetchAll();
                $reseau  = getTargetReseau($id_rapport)->fetch();
                $etat    = getTargetEtat($id_rapport)->fetch();
                $inter   = getTargetIntervenants($id_rapport)->fetchAll();
                $pieces  = getTargetPieces($id_rapport);
                $unselActions = getUnselectedActions($id_rapport)->fetchAll();
                // =====================================================================================================
                
                // =====================================================================================================
                // Formating date
                setlocale(LC_TIME, "fr_FR");
                strftime("%d %m %Y", strtotime($rapport["date_rapport"]));
                foreach ($dates as $k => $v)
                {
                    strftime("%d %m %Y", strtotime($dates[$k]["date_inter"]));
                }
                // =====================================================================================================

                // =====================================================================================================
                // Sort data in an array
                $fields = array(
                    "ref_cri"        => array(
                                            "value" => $cri["ref_cri"],
                                            "type"  => "text"
                                        ),
                    "date_rapport"   => array(
                                            "value" => $rapport["date_rapport"],
                                            "type"  => "date"
                                        ),
                    "nom_client"     => array(
                                            "value" =>$rapport["nom_client"],
                                            "type"  => "text"
                                        ),
                    "contact"        => array(
                                            "value" => $rapport["contact"],
                                            "type"  =>"text"
                                        ),
                    "adresse"        => array(
                                            "value" =>$rapport["adresse"],
                                            "type"  => "text"
                                        ),
                    "cp"             => array(
                                            "value" =>$rapport["cp"],
                                            "type"  => "text"
                                        ),
                    "ville"          => array(
                                            "value" => $rapport["ville"],
                                            "type"  => "text"
                                        ),
                    "probleme"       => array(
                                            "value" => $cri["probleme"],
                                            "type"  => "area"
                                        ),
                    "details_presta" => array(
                                            "value" => $cri["details_presta"],
                                            "type"  => "area"
                    )
                );
                // =====================================================================================================
                // Fields label
                $fieldsLabel = array(
                    "ref_cri"        => "Référence",
                    "date_rapport"   => "Date du rapport",
                    "nom_client"     => "Nom du client",
                    "adresse"        => "Adresse client",
                    "cp"             => "Code postal",
                    "contact"        => "Nom du contact sur site",
                    "ville"          => "Ville",
                    "probleme"       => "Rappel du contexte",
                    "details_presta" => "Détails maintenance"
                );
                // =====================================================================================================
                
                // =====================================================================================================
                // Processing general POST
                if(isset($post["submitGeneral"]))
                {
                    $errorSubmit = true;
                    $errorEmpty = true;
                    
                    if($post["submitGeneral"] == "ref_cri")
                    {
                        $errorSubmit = false;
                        $errorRegex = false;
                        $errorEmpty = false;
    
                        if(empty($post["ref_cri"]))
                        {
                            $errorEmpty = true;
                        }
                        
                        if(!preg_match("#^MA\d{5}(-0\d)?#", $post["ref"]))
                        {
                            $errorRegex = true;
                            $log = "Référence invalide";
                        }
                        
                        if(!$errorEmpty AND !$errorRegex)
                        {
                            updateRef($id_rapport, $post["ref_cri"]);
                        }
                        
                    }
    
                    if($post["submitGeneral"] == "date_rapport")
                    {
                        $errorSubmit = false;
    
                        if(empty($post["date_rapport"]))
                        {
                            $log = "Le champ est vide";
                        }
                        else
                        {
                            $errorEmpty = false;
                            updateDateRapport($id_rapport, $post["date_rapport"]);
                        }
                    }
    
                    if($post["submitGeneral"] == "nom_client")
                    {
                        $errorSubmit = false;
    
                        if(empty($post["nom_client"]))
                        {
                            $log = "Le champ est vide";
                        }
                        else
                        {
                            $errorEmpty = false;
                            updateNomClient($id_rapport, $post["nom_client"]);
                        }
                    }
    
                    if($post["submitGeneral"] == "contact")
                    {
                        $errorSubmit = false;
                        
                        if(empty($post["contact"]))
                        {
                            $log = "Le champ est vide";
                        }
                        else
                        {
                            $errorEmpty = false;
                            updateContact($id_rapport, $post["contact"]);
                        }
                    }
    
                    if($post["submitGeneral"] == "adresse")
                    {
                        $errorSubmit = false;
                        $errorEmpty  = false;
                        updateAdresse($id_rapport, $post["adresse"]);
                    }
    
                    if($post["submitGeneral"] == "cp")
                    {
                        $errorSubmit = false;
    
                        if(empty($post["cp"]))
                        {
                            $log = "Le champ est vide";
                        }
                        else
                        {
                            $errorEmpty = false;
                            updateCp($id_rapport, $post["cp"]);
                        }
                    }
    
                    if($post["submitGeneral"] == "ville")
                    {
                        $errorSubmit = false;
    
                        if(empty($post["ville"]))
                        {
                            $log = "Le champ est vide";
                        }
                        else
                        {
                            $errorEmpty = false;
                            updateVille($id_rapport, $post["ville"]);
                        }
                    }
    
                    if($post["submitGeneral"] == "probleme")
                    {
                        $errorSubmit = false;
    
                        if(empty($post["probleme"]))
                        {
                            $log = "Le champ est vide";
                        }
                        else
                        {
                            $errorEmpty = false;
                            updateProbleme($id_rapport, $post["probleme"]);
                        }
                    }
    
                    if($post["submitGeneral"] == "details_presta")
                    {
                        $errorSubmit = false;
                        $errorEmpty  = false;
                        updateDetailsPresta($id_rapport, $post["details_presta"]);
                    }
                    
                    if($errorSubmit)
                    {
                        $log = "Probleme value submit";
                    }
                    
                    if($errorEmpty)
                    {
                        $log = "Le champ est vide";
                    }
                    
                    if(!$errorEmpty AND !$errorSubmit)
                    {
                        header("Location: editRapport-edit-".$id_rapport);
                    }
    
                }
                // =====================================================================================================
                
                // =====================================================================================================
                // Processing Piece POST
                if(isset($post["submitPiece"]))
                {
                    $errorSubmit = true;
                    $errorEmpty  = false;
                    
                    if($post["submitPiece"] == "ref")
                    {
                        $errorSubmit = false;
                        
                        if(empty($post["ref"]))
                        {
                            $log = "Le champ est vide";
                            $errorEmpty = true;
                        }
                        
                        if(!$errorEmpty)
                        {
                            updateRefPiece($post["id"], $post["ref"]);
                        }
                    }
                    
                    if($post["submitPiece"] == "details")
                    {
                        $errorSubmit = false;
    
                        if(empty($post["details"]))
                        {
                            $log = "Le champ est vide";
                            $errorEmpty = true;
                        }
    
                        if(!$errorEmpty)
                        {
                            updateDetailsPiece($post["id"], $post["details"]);
                        }
                    }
                    
                    if($post["submitPiece"] == "qte")
                    {
                        $errorSubmit = false;
    
                        if(empty($post["qte"]))
                        {
                            $log = "Le champ est vide";
                            $errorEmpty = true;
                        }
    
                        if(!$errorEmpty)
                        {
                            $qte = (int) $post["qte"];
                            updateQtePiece($post["id"], $qte);
                        }
                    }
    
                    if(!$errorEmpty AND !$errorSubmit)
                    {
                        header("Location: editRapport-edit-".$id_rapport);
                    }
                }
                // =====================================================================================================
    
                // =====================================================================================================
                // Processing Add Piece POST
                if(isset($post["submitAddPiece"]))
                {
                    $errorEmpty  = false;
                    
                    if(isEmpty($post))
                    {
                        $errorEmpty = true;
                        $log = "Veuillez remplir tous les champs du formulaire";
                    }
                    
                    if(!$errorEmpty)
                    {
                        insertNewPiece($id_rapport, $post);
    
                        header("Location: editRapport-edit-".$id_rapport);
                    }
                }
                // =====================================================================================================
    
                // =====================================================================================================
                // Processing delete piece
                if(isset($post["deletePiece"]))
                {
                    deletePiece($post["deletePiece"]);
                    header("Location: editRapport-edit-".$id_rapport);
                }
                // =====================================================================================================
    
                // =====================================================================================================
                // Processing delete date POST
                if(isset($post["submitDeleteDate"]))
                {
                    $error = true;
                    
                    if(isset($post["id_date_inter"]))
                    {
                       $error = false;
                    }
                    
                    if(!$error)
                    {
                        $id_date = $post["id_date_inter"];
                        deleteDateCri($id_date);
                        header("Location: editRapport-edit-".$id_rapport);
                    }
                    
                    if ($error)
                    {
                        $log = "Erreur supression";
                    }
                    
                }
                // =====================================================================================================
    
                // =====================================================================================================
                // Processing add piece
                if(isset($post["submitAddDate"]))
                {
                    $error = true;
                    $errorEmpty = false;
                    
                    if(isset($post["date"]))
                    {
                        $error = false;
                    }
                    
                    if(empty($post["date"]))
                    {
                        $errorEmpty = true;
                        $log = "Le champ est vide";
                    }
                    
                    if ($error)
                    {
                        $log ="Erreur ajout date";
                    }
                    
                    if(!$error AND !$errorEmpty)
                    {
                        insertDateCri($post["date"]);
                        insertEffectuer($id_rapport, $_SESSION["id_tech"]);
                        header("Location: editRapport-edit-".$id_rapport);
                    }
                    
                    
                }
                // =====================================================================================================
                
                // =====================================================================================================
                // Processing delete action
                if(isset($post["submitDeleteAction"]))
                {
                    $error = true;
                    $errorEmpty = false;
    
                    if(isset($post["id_action"]))
                    {
                        $error = false;
                        
                        if(empty($post["id_action"]))
                        {
                            $errorEmpty = true;
                            $log = "Error ID action to delete";
                        }
                    }
                    
                    if($error)
                    {
                        $log = "Erreur valeur inexistante";
                    }
                    
                    if(!$error AND !$errorEmpty)
                    {
                        deleteRealiser($id_rapport, $post["id_action"]);
                        header("Location: editRapport-edit-".$id_rapport);
                    }
                }
                // =====================================================================================================
    
                // =====================================================================================================
                // Processing add action
                if(isset($post["submitAddAction"]))
                {
                    $error = true;
                    $errorEmpty = false;
                    
                    if(isset($post["actions"]))
                    {
                        $error = false;
                        
                        if(empty($post["actions"]))
                        {
                            $errorEmpty = true;
                            $log = "Aucune action sélectionnée";
                        }
                    }
                    
                    if($error)
                    {
                        $log = "Error unexisting Action";
                    }
                    
                    if(!$error AND !$errorEmpty)
                    {
                        insertRealiser($id_rapport, $post["actions"]);
                        header("Location: editRapport-edit-".$id_rapport);
                    }
                }
                // =====================================================================================================
                
                
            }
            else
            {
                echo "Problème URL : Wrong OPT";
            }
        }
        else
        {
            echo "Problème URL : Paramètre manquant";
        }
    }
    else
    {
        header("Location: login");
    }
    
    require "view/editRapport.php";