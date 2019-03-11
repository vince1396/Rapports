<?php
  require 'model/login.php';

    if(isset($_SESSION['id_tech']))
    {
        header("Location: rapportType");
    }
    else
    {
        if(isset($_COOKIE['email']) AND isset($_COOKIE['mdp']))
        {
            refreshSession($_COOKIE["email"], $_COOKIE['mdp']);
        }
    }
// ====================================================================================
    if(isset($_POST['submit']))
    {
        $log = "";
        $mdp = $_POST["mdp"];
        $_POST['mdp'] = sha1($mdp);
        $post = getPost();

        if(isEmpty($post))
        {
            $log = "Veuillez remplir tous les champs du formulaire.";
        }
        else
        {
            $req = login($post);

            if($rep = $req->fetch())
            {
                makeSession($rep);

                if(isset($_POST['remember']))
                {
                    makeCookie("id_tech", $rep['id_tech']);
                    makeCookie("email",   $rep['email']);
                    makeCookie("mdp",     $rep['mdp']);
                    makeCookie("prenom",  $rep['prenom']);
                    makeCookie("nom",     $rep['nom']);
                    makeCookie("lvl",     $rep['lvl']);
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