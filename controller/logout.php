<?php

    if(isset($cookies['email']) OR isset($cookies['mdp']))
    {
        foreach ($cookies as $k => $v)
        {
            destroyCookie($k);
            echo $_COOKIE[$k];
        }
    }
    //session_start();
    session_destroy();

    header("Location:login");