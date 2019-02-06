<?php
    session_start();

    require "core/functions.php"; //Appel fichier des fonctions générales
    require "model/bdd.php"; //Connexion à la base de données

    // ===================================================================
    // ============== Appel de la bibliothèque DOMPDF ====================
    require_once 'dompdf/lib/html5lib/Parser.php';
    require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
    require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
    require_once 'dompdf/src/Autoloader.php';
    Dompdf\Autoloader::register();
    // ===================================================================


    // ===================================================================
    //      Affichages des superglobales (A supprimer en production)
    /*echo "post : ";
    print_r($_POST); echo "<br />";
    echo "session : ";
    print_r($_SESSION); echo "<br />";
    echo "cookie : ";
    print_r($_COOKIE); echo "<br />";*/
    // ===================================================================
    
    // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
    spl_autoload_register('chargerClasse');

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

    ob_start(); //On suspend l'affichage html
        require "controller/" . $page . ".php"; //Appel de la page demandée
        $content = ob_get_contents(); //HTML chargé dans la varibale $content
    ob_end_clean(); //Reprise de l'affichage HTML

    require "template.php"; //Appel du template du site