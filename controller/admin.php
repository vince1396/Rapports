<?php
    
    require "model/admin.php";
    
        if(isset($_SESSION["id_tech"]))
        {
            if($_SESSION["lvl"] != 1)
            {
                header("Location: rapportType");
            }
            else
            {
                $techs = getTechs()->fetchAll();
                
                if(isset($_GET["opt"]) AND isset($_GET["id"]))
                {
                    
                    if($_GET["opt"] == "delete")
                    {
                        $id_tech = $_GET["id"];
                        deleteTech($id_tech);
                        
                        header("Location: admin");
                    }
                    else
                    {
                        echo "Wrong OPT : Contactez admin Web";
                    }
                }
                
                if(isset($_POST["submit"]))
                {
                    $post = getPost();
                    $post["mdp"] = sha1($post["mdp"]);
                    $post["confrim"] = sha1($post["confirm"]);
                    echo "<br />";
                    
                    if(!isEmpty($post))
                    {
                        if(confirmPsw($post["mdp"], $post["confrim"]))
                        {
                            addTech($post);
                            header("Location: admin");
                        }
                        else
                        {
                            $log = "Les mots de passe ne correspondent pas";
                        }
                    }
                    else
                    {
                        $log = "Veuillez remplir tous les champs du formulaire";
                    }
                }
            }
        }
        else
        {
            header("Location: login");
        }
    
    require "view/admin.php";