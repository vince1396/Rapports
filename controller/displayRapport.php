<?php
    
    require 'model/displayRapport.php';
    
    if(isset($_SESSION['id_tech']))
    {
        if(isset($_GET["opt"]) AND isset($_GET["id"]))
        {
            if($_GET["opt"] == "display")
            {
                $id_rapport = $_GET["id"];
                
                $rapport = getTargetRapport($id_rapport)->fetch();
                $cri = getTargetCri($id_rapport)->fetch();
                $dates = getTargetDates($id_rapport)->fetchAll();
                $actions = getTargetActions($id_rapport)->fetchAll();
                $reseau = getTargetReseau($id_rapport)->fetch();
                $etat = getTargetEtat($id_rapport)->fetch();
                $inter = getTargetIntervenants($id_rapport)->fetchAll();
                $pieces = getTargetPieces($id_rapport)->fetchAll();
    
                setlocale(LC_TIME, "fr_FR");
                foreach ($dates as $k)
                {
                    strftime("%d %m %Y", $dates[$k]["date_inter"]);
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
    
    require 'view/displayRapport.php';
