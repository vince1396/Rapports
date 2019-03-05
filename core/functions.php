<?php
    
    use Dompdf\Dompdf;
    
    function chargerClasse($classe)
    {
        require 'model/'.$classe.'.php'; // On inclut la classe correspondante au paramètre passé.
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
    
    function refreshSession()
    {
        $cookies = [];
        $cookies["email"] = $_COOKIE["email"];
        $cookies["mdp"] = $_COOKIE["mdp"];
    
        $req = login($cookies);
    
        if ($rep = $req->fetch())
        {
            $cookies["id_tech"] = $rep["id_tech"];
            makeSession($cookies);
            $_GET['p'] = "rapportType";
        }
        else
        {
            destroyCookie("email");
            destroyCookie("mdp");
        
            header("Refresh:0; url=login");
        }
    }
    
    function routing()
    {
        if (!isset($_GET['p']) || $_GET['p'] == "") //Si l'utilisateur vient d'arriver sur le site
        {
            $page = "login"; //On le dirige vers la page de connexion
        }
        else //Si l'utilisateur est déja sur le site et se déplace avec les liens
        {
            if (!file_exists("controller/" . $_GET['p'] . ".php")) //On vérifie que la page demandée existe
            {
                $page = "404"; //Si non : On dirige vers 404
            }
            else //Si oui
            {
                $page = $_GET['p']; //On récupère le nom de la page demandée
            }
        }
        
        return $page;
    
    }
    
    function createPDF($rapport, $cri, $dates, $actions, $reseau, $etat, $inter, $pieces)
    {
        //Return $pdfView
        require "view/pdfView.php";
        
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($pdfView);
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        $fileName = "CRI_" . $cri["ref_cri"] . ".pdf";
        
        // Render the HTML as PDF
        $dompdf->render();
        file_put_contents("pdf/". $fileName, $dompdf->output());
        $dompdf->stream($fileName);
    
    }
    
    function sendMail()
    {
        // ***** SEND MAIL *****
    
        // This require return $mailTemplate var
        require("./view/template/mailView.php");
    
        $mail = new PHPMailer();
    
        //Recipients
        $mail->setFrom('demandeachat@decimale.net', 'Decimale');
        $mail->addAddress(TO_EMAIL_1);
        $mail->addAddress(TO_EMAIL_2);
        $mail->addReplyTo('demandeachat@decimale.net', 'Decimale');
    
        //Attachment
        $mail->addAttachment('./public/orders/' . $fileName, 'demandeAchat.pdf');
        $mail->addAttachment($extraFile, $extraFileName);
    
        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Demande d\'achat';
        $mail->Body    = $mailTemplate; // HTML content
        $mail->AltBody = 'Bonjour,Une nouvelle demande d\'achat a été faite. Vous la trouverez en pièce jointe.'; // Plain text
    
        $mail->send();
    }