<?php
  require 'model/myrapports.php';

    if(isset($_SESSION['id_tech']))
    {
        if(isset($_GET["opt"]) AND isset($_GET["id"]))
        {
            $opt = $_GET["opt"];
            $id_rapport = $_GET["id"];
            echo $opt;
            echo "<br />";
            echo $id_rapport;
            
            if($opt == "delete")
            {
                $req = checkPieces($id_rapport);
                if($rep = $req->fetchAll())
                {
                    deletePiece($id_rapport);
                }
                
                deleteRealiser($id_rapport);
                
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
                echo "Disponible bientôt";
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