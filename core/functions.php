<?php
    use \PDFShift\PDFShift;
    
    function chargerClasse($classe)
    {
        $fileName = "model/".$classe.".php";
        require $fileName; // On inclut la classe correspondante au paramètre passé.
    }
    
    function destroyCookie($name)
    {
        setcookie($name, '', time());
    }
    
    function displaySuperglobals()
    {
        echo "POST : ";
        print_r($_POST); echo "<br />";
        echo "SESSION : ";
        print_r($_SESSION); echo "<br />";
        echo "COOKIE : ";
        print_r($_COOKIE); echo "<br />";
        echo "GET : ";
        print_r($_GET); echo "<br />";
    }
    
    // Get All Post Datas
    function getPost()
    {
        $arrayToReturn = array();
    
        if(isset($_POST['submit']))
        {
            foreach($_POST as $keyD1 => $valueD1)
            {
                if(is_array($_POST[$keyD1]))
                {
                    foreach($_POST[$keyD1] as $keyD2 => $valueD2)
                    {
                        if(is_array($_POST[$keyD1][$keyD2]))
                        {
                            foreach($_POST[$keyD1][$keyD2] as $keyD3 => $valueD3)
                            {
                                $arrayToReturn[$keyD1][$keyD2][$keyD3] = htmlentities($valueD3);
                            }
                        }
                        else
                        {
                            $arrayToReturn[$keyD1][$keyD2] = htmlentities($valueD2);
                        }
                    }
                }
                else
                {
                    $arrayToReturn[$keyD1] = htmlentities($valueD1);
                }
            }
        }
        // Possibly add elements to the array
    
        return $arrayToReturn;
    }
    
    //Check if a form has an empty field
    function isEmpty($post)
    {
        $empty = false;
    
        foreach ($post as $k => $v)
        {
            if(empty($v))
            {
                $empty = true;
                break;
            }
        }
    
        return $empty;
    }
    
    function login($post)
    {
        //Email must be $post[0] and mdp must be $post[1]
        
        global $bdd;
        $req = $bdd->prepare("SELECT * FROM tech WHERE :email = email AND :mdp = mdp");
        $req->bindValue(":email", $post["email"], PDO::PARAM_STR);
        $req->bindValue(":mdp",   $post["mdp"], PDO::PARAM_STR);
        
        $req->execute();
        
        return $req;
    }
    
    function makeCookie($name, $val)
    {
        setcookie(
            $name,
            $val,
            time() + 365*24*3600,
            null,
            null,
            false,
            true);
    }
    
    //Create session's var from a post tab
    function makeSession($rep)
    {
        foreach ($rep as $k => $v)
        {
            $_SESSION[$k] = $v;
        }
    }
    
    //Crypt in sha1 all datas in a tab
    function makeTabSha1($post)
    {
        foreach ($post as $k => $v)
        {
            $post[$k] = sha1($v);
        }
    
        return $post;
    }
    
    function refreshSession($cookies)
    {
        $login = [];
        $login["email"] = $cookies["email"];
        $login["mdp"] = $cookies["mdp"];
    
        $req = login($login);
    
        if ($rep = $req->fetch())
        {
            makeSession($cookies);
            $_GET['p'] = "rapportType";
        }
        else
        {
            destroyCookie("id_tech");
            destroyCookie("email");
            destroyCookie("mdp");
            destroyCookie("prenom");
            destroyCookie("nom");
            destroyCookie("lvl");
        
            header("Refresh:0; url=login");
        }
    }
    
    function routing()
    {
        $sPage = sanitizeGet();
        
        if (empty($sPage['p']) || empty($sPage['p'])) //Si l'utilisateur vient d'arriver sur le site
        {
            $page = "login"; //On le dirige vers la page de connexion
        }
        else //Si l'utilisateur est déja sur le site et se déplace avec les liens
        {
            if (!file_exists("controller/" . $sPage['p'] . ".php")) //On vérifie que la page demandée existe
            {
                $page = "404"; //Si non : On dirige vers 404
            }
            else
            {
                $page = $sPage['p'];
            }
        }
        
        return $page;
    }
    
    function createPDF($rapport, $cri, $dates, $actions, $reseau, $etat, $inter, $pieces)
    {
        //Return $pdfView
        require "view/pdfView.php";
        
        $api_key = 'd6c8017c793848c58b75362a060830b2:';
        //$options = array("sandbox" => true);
        
        PDFShift::setApiKey($api_key);
        $pdfshift = new PDFShift();
        $pdfshift->convert($pdfView);
        $pdfshift->save('pdf/CRI_'.$cri["ref_cri"].'.pdf');
        
        header('Location: pdf/CRI_'.$cri["ref_cri"].'.pdf');
    }
    
    function confirmPsw($mdp1, $mdp2)
    {
        if($mdp1 == $mdp2)
            $confirm = true;
        else
            $confirm = false;
        
        return $confirm;
    }
    
    function sanitizeCookies()
    {
        $opt = array(
            'id_tech' => FILTER_VALIDATE_INT,
            'email'   => FILTER_SANITIZE_EMAIL,
            'mdp'     => FILTER_SANITIZE_STRING,
            'prenom'  => FILTER_SANITIZE_STRING,
            'nom'     => FILTER_SANITIZE_STRING,
            'lvl'     => FILTER_VALIDATE_INT
        );
    
        $cookies = filter_input_array(INPUT_COOKIE, $opt);
        
        return $cookies;
    }
    
    function sanitizeGet()
    {
        $opt = array(
            'p' => FILTER_SANITIZE_STRING
        );
        
        $page = filter_input_array(INPUT_GET, $opt);
        
        return $page;
    }
    
    function sanitizeSession()
    {
        $opt = array(
            'id_tech' => FILTER_VALIDATE_INT,
            'email'   => FILTER_SANITIZE_EMAIL,
            'mdp'     => FILTER_SANITIZE_STRING,
            'prenom'  => FILTER_SANITIZE_STRING,
            'nom'     => FILTER_SANITIZE_STRING,
            'lvl'     => FILTER_VALIDATE_INT
        );
        
        $session = filter_input_array(INPUT_SESSION, $opt);
        
        return $session;
    }
    
    /*function sendMail()
    {
        // ***** SEND MAIL *****
    
        // This require return $mailTemplate var
        //require("./view/template/mailView.php");
    
        $mail = new PHPMailer(true);
        
        try{
            //Recipients
            $mail->setFrom('vcotini@decimale.net', 'Vincent Cotini', 0);
            $mail->addAddress('vincent.cotini96@gmail.com');
            $mail->addReplyTo('vcotini@decimale.net', 'Vincent Cotini');
    
            //Attachment
            $mail->addAttachment('pdf/CRI_REF001.pdf');
    
            //Content
            $mail->isHTML(true);
            $mail->Subject = 'CRI';
            $mail->Body    = '<p>Votre Compte rendu d\'intervention</p>'; // HTML content
            $mail->AltBody = 'Altbody'; // Plain text
    
            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }*/
