<?php

    if(isset($cookies['email']) OR isset($cookies['mdp']))
    {
        foreach ($cookies as $k)
        {
            destroyCookie($k);
        }
    }
    session_start();
    session_destroy();

    header("Location:login");