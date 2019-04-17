<?php
    
    require "model/editPassword.php";
    
        if(isset($_SESSION["id_tech"]))
        {
            if($_SESSION["lvl"] != 1)
            {
                header("Location: rapportType");
            }
            else
            {
                if(isset($_GET["id"]))
                {
                    $tech = getTargetTech($_GET["id"])->fetch();
                    
                    if(isset($post["submit"]))
                    {
                        if(isEmpty($post))
                        {
                            $error = "Veuillez remplir tous les champs du formulaire";
                        }
                        else
                        {
                            if($post["mdp"] == $post["confirm"])
                            {
                                $mdp = sha1($post["mdp"]);
                                
                                updatePassword($_GET["id"], $mdp);
                                header("Location: admin");
                            }
                            else
                            {
                                $error = "Les mots de passe ne correspondent pas";
                            }
                        }
                    }
                }
                else
                {
                    $error = "Error id tech";
                }
            }
        }
        else
        {
            header("Location: login");
        }
    
    require "view/editPassword.php";