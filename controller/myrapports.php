<?php
  require 'model/myrapports.php';

    // If connected
    if(isset($_SESSION['id_tech']))
    {
        $hasRapport = false;
    
        // If admin has at least 1 rapport to see
        if ($_SESSION["lvl"] == 1)
        {
            $checkHasRapport = adminHasRapport();
        }
        // Else if user has at least 1 rapport to see
        else
        {
            $checkHasRapport = techHasRapport($_SESSION["id_tech"]);
        }
        
        
        if($rep1 = $checkHasRapport->fetch())
            $hasRapport = true;
    
        // Display all rapports if admin
        if ($_SESSION["lvl"] == 1)
        {
            $rapports = getAllRapports()->fetchAll();
        }
        // Else only user's rapports
        else
        {
            $rapports = getRapports()->fetchAll();
        }
        
        if(isset($_GET["opt"]) AND isset($_GET["id"]))
        {
            $opt = $_GET["opt"];
            $id_rapport = $_GET["id"];
            
            if($opt == "delete")
            {
                $req = checkPieces($id_rapport);
                if($rep = $req->fetchAll())
                {
                    deletePiece($id_rapport);
                }
                
                deleteRealiser($id_rapport);
                deleteEffectuer($id_rapport);
                
                $req = selectDateToDelete($id_rapport)->fetchAll();
                print_r($req);
                foreach ($req as $kD1)
                {
                    deleteDate($kD1[0]);
                }
                
                deleteCri($id_rapport);
                deleteRapport($id_rapport);
    
                header("Location: myrapports");
            }
            elseif ($opt == "update")
            {
                echo "Disponible bientôt";
            }
            elseif ($opt == "display")
            {
                sendMail("REF001");
            }
            else
            {
                $error = "Erreur sur _GET['opt']. Veuillez contacter l'administrateur Web";
                echo $error;
            }
        }
    }
    else
    {
        header("Location: login");
    }

  require 'view/myrapports.php';