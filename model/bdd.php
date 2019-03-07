<?php
  /* Connexion à une base MySQL avec l'invocation de pilote */
  $dbname = 'mysql:dbname=rapports;host=127.0.0.1; charset=UTF8';
  $user = 'root';
  $mdp = '6283';

  try
  {
      $bdd = new PDO($dbname, $user, $mdp);
  }
  catch (PDOException $e)
  {
      echo 'Connexion échouée : ' . $e->getMessage();
  }