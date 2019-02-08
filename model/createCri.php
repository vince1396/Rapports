<?php

    function getTech()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT id_tech, nom, prenom FROM tech");
        $req->execute();

        return $req;
    }

    function getReseau()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT * FROM reseau");
        $req->execute();

        return $req;
    }

    function getActions()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT * FROM action");
        $req->execute();

        return $req;
    }

    function getEtatReseau()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT * FROM etat_reseau");
        $req->execute();

        return $req;
    }
    
    
