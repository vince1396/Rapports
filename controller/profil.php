<?php
  require 'model/profil.php';

    if(isset($_SESSION['id']))
    {
        if(isset($_POST['submit']))
        {
            if(empty($_POST['oldmdp']) OR empty($_POST['newmdp']) OR empty($_POST['confirm']))
            {
                $log = "Veuillez remplir tous les champs du formulaire";
            }
            else
            {
                $oldmdp = $_POST['oldmdp'];
                $newmdp = $_POST['newmdp'];
                $confirm = $_POST['confirm'];

                $req = getInfosTech();
                $rep = $req->fetch();

                if($oldmdp !== $rep['mdp'])
                {
                    $log = "L'ancien mot de passe est incorrect";
                }
                else
                {
                    if($newmdp !== $confirm)
                    {
                        $log = "Les mots de passe ne correspondent pas";
                    }
                    else
                    {
                        updateMdp($newmdp);
                        $log = "Le mot de passe a bien été modifié";
                    }
                }
            }
        }
    }
    else
    {
        header("Location: login");
    }

  require 'view/profil.php';
