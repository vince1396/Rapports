<?php
    
    require "model/displayRapport.php";
    require "model/editRapport.php";
    
    if(isset($_SESSION['id_tech']))
    {
        if(isset($_GET["opt"]) AND isset($_GET["id"]))
        {
            if($_GET["opt"] == "edit")
            {
                print_r($post);
                
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
                    "ref_cri"      => "Référence",
                    "date_rapport" => "Date du rapport",
                    "nom_client"   => "Nom du client",
                    "adresse"      => "Adresse client",
                    "cp"           => "Code postal",
                    "contact"      => "Nom du contact sur site",
                    "ville"        => "Ville"
                );
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