<?php

// Get All Post Datas
function getPost()
{
    $arrayToReturn = array();
    if(isset($_POST['submit']))
    {
        foreach($_POST as $key => $value)
        {
            $arrayToReturn[$key] = htmlentities($value);
        }
    }
    // Possibly add elements to the array

    return $arrayToReturn;
}

//Check if a form has an empty field
function isEmpty($post)
{
    //No field can be null even submit
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
        $post[$k] = sha1($post[$k]);
    }
}