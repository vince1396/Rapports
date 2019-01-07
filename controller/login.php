<?php
  require 'model/login.php';

  if(isset($_SESSION['id']))
  {
    header("Refresh:0; url=rapportType");
  }

  if(isset($_POST['submit']))
  {
    $email = $_POST['email'];
    $mdp = sha1($_POST['mdp']);

    if(empty($email) OR empty($mdp))
    {
      $log = "Veuillez remplir tous les champs du formulaire.";
    }
    else
    {
      $req = login($email, $mdp);

      if($rep = $req->fetch())
      {
        $_SESSION['id'] = $rep['id_tech'];
        $_SESSION['nom'] = $rep['nom'];
        $_SESSION['prenom'] = $rep['prenom'];
        $_SESSION['email'] = $rep['email'];

        if(isset($_POST['remember']))
        {
          //COOKIE
        }

        header("Location: rapportType");
      }
      else
      {
        $log = "Mauvais identifiants !";
      }
    }
  }


  require 'view/login.php';