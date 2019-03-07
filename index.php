<?php
    session_start();
    
    //TODO : Logo PDF
    //TODO : Conversion dates pdf
    //TODO : Footer PDF
    
    // ========================== Call DOMPDF library ==================================================================
    require_once 'dompdf/lib/html5lib/Parser.php';
    require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
    require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
    require_once 'dompdf/src/Autoloader.php';
    Dompdf\Autoloader::register();
    // =================================================================================================================
    
    // =================================================================================================================
    require('pdfshift/init.php');
    
    // =================================================================================================================
    require "core/functions.php"; // Call general functions
    require "model/bdd.php"; // DB connection
    // =================================================================================================================
    
    // ========================= Call Mobile Detect library ============================================================
    require_once "mobileDetect/Mobile_Detect.php";
    
    // =================================================================================================================
    // Affichages des superglobales (A supprimer en production)
    // displaySuperglobals();
    // =================================================================================================================
    
    // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
    spl_autoload_register('chargerClasse');
    // Remake session if cookies exist
    if(!isset($_SESSION["id_tech"]) AND isset($_COOKIE["email"]) AND isset($_COOKIE["mdp"]))
    {
        refreshSession();
    }
    
    $page = routing();
    
    ob_start(); // Suspend HTML display
        require "controller/" . $page . ".php"; // Call requested page
        $content = ob_get_contents(); // Load HTML in $content
    ob_end_clean(); // Resume HTML display

    require "template.php"; // Call template