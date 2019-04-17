<?php
  require 'model/profil.php';

    if(isset($_SESSION['id_tech']))
    {
        if(isset($_POST['submit']))
        {
            $log = "";
            $post = getPost();

            if(isEmpty($post))
            {
                $log = "Veuillez remplir tous les champs du formulaire";
            }
            else
            {
                $post = makeTabSha1($post);
                $req = getInfosTech();
                $rep = $req->fetch();

                if($post['oldmdp'] !== $rep['mdp'])
                {
                    $log = "L'ancien mot de passe est incorrect";
                }
                else
                {
                    if($post['newmdp'] !== $post['confirm'])
                    {
                        $log = "Les mots de passe ne correspondent pas";
                    }
                    else
                    {
                        updateMdp($post['newmdp']);
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
