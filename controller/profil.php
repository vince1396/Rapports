<?php
  require 'model/profil.php';

    if(isset($_SESSION['id_tech']))
    {
        if(isset($_POST['submit']))
        {

            //TODO Probleme isEmpty
            $log = "";
            $post = getPost();
            $post = crypt($post);
            print_r($post);

            if(isEmpty($post))
            {
                $log = "Veuillez remplir tous les champs du formulaire";
            }
            else
            {

                $req = getInfosTech();
                $rep = $req->fetch();

                if($post['oldmdp'] !== $rep['mdp'])
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
