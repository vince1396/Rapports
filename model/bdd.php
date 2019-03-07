<?php
  /* Connexion à une base MySQL avec l'invocation de pilote */
  $dbname = 'mysql:dbname=db775293923;host=db775293923.hosting-data.io; charset=UTF8';
  $user = 'dbo775293923';
  $mdp = 'B6311963a!';

  try
  {
      $bdd = new PDO($dbname, $user, $mdp);
  }
  catch (PDOException $e)
  {
      echo 'Connexion échouée : ' . $e->getMessage();
  }
