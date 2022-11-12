<?php

include_once("/config/session.php");


// verify session and redirect 
function indexRedirect() {
    if(!$_SESSION['is_login']) {
        return header("Location: ./login");
    }
}

// verify session and redirect from login and register page
function loginRegisterRedirect() {
    if($_SESSION['is_login']) {
        return header("Location: ./");
    }
}

// if not login show 404 page
function notLogin404() {
    if(!$_SESSION['is_login']) {
        include_once("404.php");
        die();
    }
}

