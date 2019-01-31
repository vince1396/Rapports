<?php
  require 'model/myrapports.php';

    if(isset($_SESSION['id_tech']))
    {

    }
    else
    {
        header("Location: login");
    }

  require 'view/myrapports.php';
