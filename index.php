<?php
  session_start();

  require "core/functions.php";
  require "model/bdd.php";

  require_once 'dompdf/lib/html5lib/Parser.php';
  require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
  require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
  require_once 'dompdf/src/Autoloader.php';
  Dompdf\Autoloader::register();

  echo "post : ";
  print_r($_POST); echo "<br />";
  echo "session : ";
  print_r($_SESSION); echo "<br />";
  echo "cookie : ";
  print_r($_COOKIE); echo "<br />";
  echo "persoPost : ";
  print_r($post); echo "<br />";

  if (!isset($_GET['p']) || $_GET['p'] == "")
  {
      $page = "login";
  }
  else
  {
      if (!file_exists("controller/" . $_GET['p'] . ".php"))
      {
        $page = "404";
      }
      else
      {
        $page = $_GET['p'];
      }
  }


  ob_start();
    require "controller/" . $page . ".php";
    $content = ob_get_contents();
  ob_end_clean();

  require "template.php";