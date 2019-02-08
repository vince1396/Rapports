<?php
    
    function chargerClasse($classe)
    {
        require 'model/'.$classe.'.php'; // On inclut la classe correspondante au paramètre passé.
    }
    
    // Get All Post Datas
    function getPost()
    {
        $arrayToReturn = array();
    
        if(isset($_POST['submit']))
        {
            foreach($_POST as $keyD1 => $valueD1)
            {
                if(is_array($_POST[$keyD1]))
                {
                    foreach($_POST[$keyD1] as $keyD2 => $valueD2)
                    {
                        if(is_array($_POST[$keyD1][$keyD2]))
                        {
                            foreach($_POST[$keyD1][$keyD2] as $keyD3 => $valueD3)
                            {
                                $arrayToReturn[$keyD1][$keyD2][$keyD3] = htmlentities($valueD3);
                            }
                        }
                        else
                        {
                            $arrayToReturn[$keyD1][$keyD2] = htmlentities($valueD2);
                        }
                    }
                }
                else
                {
                    $arrayToReturn[$keyD1] = htmlentities($valueD1);
                }
            }
        }
        // Possibly add elements to the array
    
        return $arrayToReturn;
    }
    
    //Check if a form has an empty field
    function isEmpty($post)
    {
        $empty = false;
    
        foreach ($post as $k => $v)
        {
            if(empty($v))
            {
                $empty = true;
                break;
            }
        }
    
        return $empty;
    }
    
    //Create session's var from a post tab
    function makeSession($rep)
    {
        foreach ($rep as $k => $v)
        {
            $_SESSION[$k] = $v;
        }
    }
    
    function makeCookie($name, $val)
    {
        setcookie(
            $name,
            $val,
            time() + 365*24*3600,
            null,
            null,
            false,
            true);
    }
    
    function destroyCookie($name)
    {
        setcookie($name, '', time());
    }
    
    //Crypt in sha1 all datas in a tab
    function makeTabSha1($post)
    {
        foreach ($post as $k => $v)
        {
            $post[$k] = sha1($v);
        }
    
        return $post;
    }