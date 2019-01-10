<?php
require 'model/createCri.php';

    $techs = getTech()->fetchAll();
    $reseau = getReseau()->fetchAll();
    $actions = getActions()->fetchAll();
    $etat = getEtatReseau()->fetchAll();

require 'view/createCri.php';