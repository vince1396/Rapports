<?php
  require 'model/myrapports.php';

    // If connected
    if(isset($_SESSION['id_tech']))
    {
        $hasRapport = false;
        $error = true;
    
        // =============================================================================================================
        // If user is a tech
        if($session["lvl"] == 0)
        {
            $rapportsToDisplay = getRapports();
            
            if($rep = $rapportsToDisplay->fetch())
            {
                $hasRapport = true;
                $rapportsToDisplay = $rapportsToDisplay->fetchAll();
            }
            
            $error = false;
        }
        // =============================================================================================================
        // If user is an admin
        if($session["lvl"] == 1)
        {
            $rapportsToDisplay = getAllRapports();
            
            if ($rep = $rapportsToDisplay->fetch())
            {
                $hasRapport = true;
                $rapportsToDisplay = $rapportsToDisplay->fetchAll();
            }
            
            $error = false;
        }
        // =============================================================================================================
        // If user has an unknown level
        if($error)
        {
            echo "Error";
        }
        // =============================================================================================================
        
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