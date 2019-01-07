<?php

    function getInfosTech()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT * FROM tech WHERE id_tech = :id");
        $req->bindValue(":id", $_SESSION['id'], PDO::PARAM_INT);
        $req->execute();

        return $req;
    }

    function updateMdp($mdp)
    {
        global $bdd;

        $req = $bdd->prepare("UPDATE tech SET mdp = :mdp WHERE id_tech = :id");
        $req->bindValue(":mdp", $mdp, PDO::PARAM_STR);
        $req->bindValue(":id", $_SESSION['id_tech'], PDO::PARAM_INT);
        $req->execute();
    }