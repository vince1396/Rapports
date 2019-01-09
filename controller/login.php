<?php
  require 'model/login.php';

    if(isset($_SESSION['id_tech']))
    {
        header("Location: rapportType");
    }

    if(isset($_COOKIE['email']) AND isset($_COOKIE['mdp']))
    {
        $cookies["email"] = $_COOKIE['email'];
        $cookies["mdp"] = $_COOKIE['mdp'];

        $req = login($cookies);

        if($rep = $req->fetch())
        {
            makeSession($rep);
            header("Refresh:0; url=rapportType");
        }
        else
        {
            destroyCookie("email");
            destroyCookie("mdp");

            header("Refresh:0; url=login");
        }
    }
// ====================================================================================
    if(isset($_POST['submit']))
    {
        $log = "";
        $_POST['mdp'] = sha1($_POST['mdp']);
        $post = getPost();
        print_r($post);

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
                    makeCookie("email", $rep['email']);
                    makeCookie("mdp",   $post['mdp']);
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