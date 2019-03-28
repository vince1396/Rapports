<?php
    use \PDFShift\PDFShift;
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    
    // =================================================================================================================
    /**
     * Call used class
     *
     * @param $classe
     */
    function chargerClasse($classe)
    {
        $fileName = "model/".$classe.".php";
        require $fileName; // On inclut la classe correspondante au paramètre passé.
    }
    
    // =================================================================================================================
    /**
     * Compare $mdp1 with $mdp2
     * and returns true if they correspond else returns false
     * @param $mdp1
     * @param $mdp2
     * @return bool
     */
    function confirmPsw($mdp1, $mdp2)
    {
        if($mdp1 == $mdp2)
            $confirm = true;
        else
            $confirm = false;
        
        return $confirm;
    }
    
    // =================================================================================================================
    /**
     * Convert a rapport into ad PDF File with the PDFShift API
     * An API Key is required in $api_key
     * PDF files are stored into "pdf" directory
     *
     * @param $rapport
     * @param $cri
     * @param $dates
     * @param $actions
     * @param $reseau
     * @param $etat
     * @param $inter
     * @param $pieces
     */
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
    
    // =================================================================================================================
    /**
     * Destroys cookie with name "$name"
     *
     * @param $name
     */
    function destroyCookie($name)
    {
        setcookie($name, '', time());
    }
    
    // =================================================================================================================
    /**
     * Displays superglobals to help devs during development
     */
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
    
    // =================================================================================================================
    /**
     * Sanitize all $_POST variables with htmlentities and store them into $post as an array
     * Doesn't work with more than 3D arrays
     *
     * @return array
     */
    function getPost()
    {
        $arrayToReturn = array();
        
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
                    else {
                        $arrayToReturn[$keyD1][$keyD2] = htmlentities($valueD2);
                    }
                }
            }
            else {
                $arrayToReturn[$keyD1] = htmlentities($valueD1);
            }
        }
        // Possibly add elements to the array
    
        return $arrayToReturn;
    }
    
    // =================================================================================================================
    /**
     * Loop over an array and return true if a field is empty
     * Only 1D array
     *
     * @param $array
     * @return bool
     */
    function isEmpty($array)
    {
        $empty = false;
    
        foreach ($array as $k => $v)
        {
            if(empty($v))
            {
                $empty = true;
                break;
            }
        }
    
        return $empty;
    }
    // =================================================================================================================
    
    /**
     * Log in with "email" and "mdp"
     * Email must be $post[0] and mdp must be $post[1]
     *
     * @param $post
     * @return bool|PDOStatement
     */
    function login($post)
    {
        global $bdd;
        $req = $bdd->prepare("SELECT * FROM tech WHERE :email = email AND :mdp = mdp");
        $req->bindValue(":email", $post["email"], PDO::PARAM_STR);
        $req->bindValue(":mdp",   $post["mdp"], PDO::PARAM_STR);
        
        $req->execute();
        
        return $req;
    }
    // =================================================================================================================
    
    /**
     * Create a cookie with preconfigured options
     *
     * @param $name
     * @param $val
     */
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
    // =================================================================================================================
    //Create session's var from a post tab
    /**
     * Create SESSION variables from the keys and values of an array
     *
     * @param $array
     */
    function makeSession($array)
    {
        foreach ($array as $k => $v)
        {
            $_SESSION[$k] = $v;
        }
    }
    // =================================================================================================================
    //Crypt in sha1 all datas in a tab
    /**
     * Hash all values in an array
     *
     * @param $array
     * @return mixed
     */
    function makeTabSha1($array)
    {
        foreach ($array as $k => $v)
        {
            $array[$k] = sha1($v);
        }
    
        return $array;
    }
    // =================================================================================================================
    /**
     * Recreate SESSION from COOKIES values
     *
     * @param $cookies
     */
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
    // =================================================================================================================
    /**
     * Send user to the right page
     *
     * @return string
     */
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
    // =================================================================================================================
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
    // =================================================================================================================
    function sanitizeGet()
    {
        $opt = array(
            'p' => FILTER_SANITIZE_STRING
        );
        
        $page = filter_input_array(INPUT_GET, $opt);
        
        return $page;
    }
    // =================================================================================================================
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
    
    function sendMail($refCri)
    {
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
    
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
            $mail->isSMTP();                                            // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'vincent.cotini96@gmail.com';           // SMTP username
            $mail->Password   = 'lcfgtizoxvkaeljf';                     // SMTP password
            $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
        
            //Recipients
            $mail->setFrom('vcotini@decimale.net', 'Rapports Decimale');
            $mail->addAddress('vincent.cotini96@gmail.com', 'Vincent');     // Add a recipient
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
        
            // Attachments
            $mail->addAttachment('pdf/CRI_'.$refCri.'.pdf');               // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
            // Content
            $mail->isHTML(true);                                       // Set email format to HTML
            $mail->Subject = 'CRI';
            $mail->Body    = 'Voici votre rapport en PDF (HTML)';
            $mail->AltBody = 'Voici votre rapport en PDF (Plain text)';
        
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }