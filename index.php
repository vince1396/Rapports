<?php
    session_start();
    
    //TODO : Logo PDF
    //TODO : Footer PDF
    
    // =================================================================================================================
    require('pdfshift/init.php'); // Call PDFShift library
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
    
    // =================================================================================================================
    // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
    spl_autoload_register('chargerClasse');
    // =================================================================================================================
    
    // Remake session if cookies exist
    if(!isset($_SESSION["id_tech"]) AND isset($_COOKIE["email"]) AND isset($_COOKIE["mdp"]))
    {
        refreshSession($_COOKIE["id_tech"],
                       $_COOKIE["email"],
                       $_COOKIE["mdp"],
                       $_COOKIE["prenom"],
                       $_COOKIE["nom"],
                       $_COOKIE["lvl"]);
    }
    
    $page = routing(); // Defines which page to call
    
    ob_start(); // Suspend HTML display
        require "controller/" . $page . ".php"; // Call requested page
        $content = ob_get_contents(); // Load HTML in $content
    ob_end_clean(); // Resume HTML display

    require "template.php"; // Call template