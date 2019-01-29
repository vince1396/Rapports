<?php
require 'model/createCri.php';

    $techs = getTech()->fetchAll();
    $reseau = getReseau()->fetchAll();
    $actions = getActions()->fetchAll();
    $etat = getEtatReseau()->fetchAll();

    if(isset($_POST['submit']))
    {
        $post = getPost();

        if(isEmpty($post))
        {
            $log = "Veuillez remplir tous les champs";
        }
        else
        {
            //TODO : Traitement
        }
    }

require 'view/createCri.php';