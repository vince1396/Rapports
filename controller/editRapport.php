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
                $pieces  = getTargetPieces($id_rapport)->fetchAll();
                // =====================================================================================================
                
                // =====================================================================================================
                // Formating date
                setlocale(LC_TIME, "fr_FR");
                strftime("%d %m %Y", strtotime($rapport["date_rapport"]));
                foreach ($dates as $k => $v)
                {
                    strftime("%d %m %Y", strtotime($dates[$k][0]));
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
                // Processing POST
                if(isset($post["submit"]))
                {
                    $errorSubmit = true;
                    $errorEmpty = true;
                    
                    if($post["submit"] == "ref_cri")
                    {
                        $errorSubmit = false;
    
                        if(empty($post["ref_cri"]))
                        {
                            $log = "Le champ est vide";
                        }
                        else
                        {
                            $errorEmpty = false;
                            updateRef($id_rapport, $post["ref_cri"]);
                        }
                    }
    
                    if($post["submit"] == "date_rapport")
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
    
                    if($post["submit"] == "nom_client")
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
    
                    if($post["submit"] == "contact")
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
    
                    if($post["submit"] == "adresse")
                    {
                        $errorSubmit = false;
                        $errorEmpty  = false;
                        updateAdresse($id_rapport, $post["adresse"]);
                    }
    
                    if($post["submit"] == "cp")
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
    
                    if($post["submit"] == "ville")
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
    
                    if($post["submit"] == "probleme")
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
    
                    if($post["submit"] == "details_presta")
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