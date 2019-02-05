<?php

  function login($post)
  {
      //Email must be $post[0] and mdp must be $post[1]

      global $bdd;
      $req = $bdd->prepare("SELECT id_tech, nom, prenom, email FROM tech WHERE :email = email AND :mdp = mdp");
      $req->bindValue(":email", $post["email"], PDO::PARAM_STR);
      $req->bindValue(":mdp",   $post["mdp"], PDO::PARAM_STR);
      $req->execute();

      return $req;
  }