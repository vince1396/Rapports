<?php
  function login($email, $mdp)
  {
    global $bdd;

    $req = $bdd->prepare("SELECT * FROM user WHERE :email = email AND :mdp = mdp");
    $req->bindValue(":email", $email, PDO::PARAM_STR);
    $req->bindValue(":mdp", $mdp, PDO::PARAM_STR);
    $req->execute();

    return $req;
  }
