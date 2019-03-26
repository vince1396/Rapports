<?php
  require 'model/login.php';

    // =================================================================================================================
    // If user is already connected -> Send him to main menu
    if(!empty($session['id_tech']))
    {
        header("Location: rapportType");
    }
    // =================================================================================================================
    
    //Setting sanitizing options
    $options = array(
        'email' => FILTER_VALIDATE_EMAIL,
        'mdp'   => FILTER_SANITIZE_STRING,
    );
    
    $post = filter_input_array(INPUT_POST, $options); //Sanitize POST values
    
    if($post != null) // If form has been sent
    {
        $errorMsg = array(
          'email' => 'Adresse email invalide'
        );
        
        $nbErrors = 0;
        
        foreach($options as $k => $v)
        {
            if(empty($post[$k])) // If a field is empty
            {
                $log = "Veuillez remplir le champ ".$k;
                $nbErrors++;
            }
            elseif($post[$k] === false) // If email adress format is wrong
            {
                $log = $errorMsg[$k];
                $nbErrors++;
            }
        }
        
        if($nbErrors == 0) // If no error
        {
            $post["mdp"] = sha1($post["mdp"]);
            $req = login($post);
    
            if($rep = $req->fetch())
            {
                makeSession($rep);
        
                if(filter_has_var(INPUT_POST, 'remember'))
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