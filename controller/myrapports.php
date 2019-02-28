<?php
  require 'model/myrapports.php';

    if(isset($_SESSION['id_tech']))
    {
        if(isset($_GET["opt"]))
        {
            $opt = $_GET["opt"];
            echo $opt;
            
            if($opt == "delete")
            {
            
            }
            elseif ($opt == "update")
            {
            
            }
            elseif ($opt == "display")
            {
            
            }
            else
            {
                $error = "Erreur sur _GET['opt']. Veuillez contacter l'administrateur Web";
            }
        }
    }
    else
    {
        header("Location: login");
    }

  require 'view/myrapports.php';
