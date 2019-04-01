<?php
    session_start();
    
    // TODO : Changer MDP
    // TODO : Mot de passe oublié
    // TODO : Recoder logout
    
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
    
    $session = $_SESSION;
    $cookies = sanitizeCookies();
    
    if(!isset($session['id_tech']) AND !empty($cookies["email"]) AND !empty($cookies["mdp"]))
    {
        refreshSession($cookies);
    }
    
    $page = routing(); // Defines which page to call
    
    ob_start(); // Suspend HTML display
        require "controller/" . $page . ".php"; // Call requested page
        $content = ob_get_contents(); // Load HTML in $content
    ob_end_clean(); // Resume HTML display

    require "template.php"; // Call template