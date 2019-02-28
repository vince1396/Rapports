<?php
  require 'model/rapportType.php';

    if(isset($_SESSION['id_tech']))
    {
    
    }
    else
    {
        header("Location: login");
    }

  require 'view/rapportType.php';