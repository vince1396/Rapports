<?php
require 'model/createCri.php';

    if(isset($_SESSION['id_tech']))
    {
        $techs = getTech()->fetchAll();
        $reseau = getReseau()->fetchAll();
        $actions = getActions()->fetchAll();
        $etat = getEtatReseau()->fetchAll();

        if (isset($_POST['submit']))
        {
            $post = getPost();
            print_r($post);

            if (isEmpty($post)) {
                $log = "Veuillez remplir tous les champs";
            } else {
                //TODO : Traitement
            }
        }
    }
    else
    {
        header("Location: login");
    }

require 'view/createCri.php';