<?php

    if(isset($_COOKIE['email']) OR isset($_COOKIE['mdp']))
    {
        setcookie(
            'email',
            '',
            time() -3600,
            null,
            null,
            false,
            true);

        setcookie(
            'mdp',
            '',
            time() - 3600,
            null,
            null,
            false,
            true);
    }
    session_start();
    session_destroy();

    header("Location:login");