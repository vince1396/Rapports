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
                
                $rapport = getTargetRapport($id_rapport)->fetch();
                $cri     = getTargetCri($id_rapport)->fetch();
                $dates   = getTargetDates($id_rapport)->fetchAll();
                $actions = getTargetActions($id_rapport)->fetchAll();
                $reseau  = getTargetReseau($id_rapport)->fetch();
                $etat    = getTargetEtat($id_rapport)->fetch();
                $inter   = getTargetIntervenants($id_rapport)->fetchAll();
                $pieces  = getTargetPieces($id_rapport)->fetchAll();
                
                setlocale(LC_TIME, "fr_FR");
                foreach ($dates as $k => $v)
                {
                    strftime("%d %m %Y", strtotime($dates[$k][0]));
                }
                // =====================================================================================================
                $textInput = array(
                    "ref_cri"    => $cri["ref_cri"],
                    "nom_client" => $rapport["nom_client"],
                    "contact"    => $rapport["contact"],
                    "adresse"    => $rapport["adresse"],
                    "cp"         => $rapport["cp"],
                    "ville"      => $rapport["ville"]
                );
    
                $textLabel = array(
                    "ref_cri"    => "Référence",
                    "nom_client" => "Nom du client",
                    "contact"    => "Nom du contact sur site",
                    "adresse"    => "Adresse client",
                    "cp"         => "Code postal",
                    "ville"      => "Ville"
                );
                // =====================================================================================================
                if(isset($_POST["submitRapport"]))
                {
                    $post = getPost();
                    print_r($post);
                    $field = key($post);
                    $val = $post[key($post)];
                    
                    echo "<br />";
                    echo $field;
                    echo "<br />";
                    echo $val;
                    echo "<br />";
                    
                    updateRapport($id_rapport, $field, $val);
                    
                    //header("Location: editRapport-edit-".$id_rapport);
                }
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