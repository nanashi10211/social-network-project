<?php

include_once("./config/configuration.php");
include_once("./config/session.php");

// key
$key = $config['secret_key'];

// verify session and redirect 
function indexRedirect() {
    if(!$_SESSION['is_login']) {
        return header("Location: ./login");
    }
}

// verify session and redirect from login and register page
function loginRegisterRedirect() {
    if(isset($_SESSION['is_login']) && $_SESSION['is_login']) {
        return header("Location: ./");
    }
}

// if not login show 404 page
function notLogin404() {
    if(!isset($_SESSION['is_login']) ) {
        include_once("404.php");
        die();
    }
}

// get verify input
function getVerifyInput() {
    include_once('./helpers/verify-input/validate-input.php');
}

// password hashed
function hashed_password($pwd) {
    $secret_key = $GLOBALS['key'];
    $pwd_peppered = hash_hmac("sha256", $pwd, $secret_key);
    $pwd_hashed = password_hash($pwd_peppered, PASSWORD_BCRYPT);
    return $pwd_hashed;
}

// verify hashed password
function verify_password($pwd, $hash_pwd) {
    $secret_key = $GLOBALS['key'];
    $pwd_peppered = hash_hmac("sha256", $pwd, $secret_key);
    return password_verify($pwd_peppered, $hash_pwd);
}

// verify presidency email
function verify_email($email) {
    $pattern = "/student.presidency.edu.bd/i";
    if(preg_match_all($pattern, $email) > 0) {
        return true;
    } else {
        return false;
    }
}
