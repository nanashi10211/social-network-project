<?php
/*
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
                                    session configure
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
*/

// error debug code
ini_set('display_errors', '1');
error_reporting(E_ALL);

// model
include_once("./models/User.php");
include_once("./models/Message.php");
include_once("./models/Session.php");
include_once("./models/Post.php");

// start session
session_start(); 

/*,,,,,,,,,,,,,, set all session variable ,,,,,,,,,,,,,,*/

// for verify user session
$_SESSION['is_login'] = false;


// login user credentials
$_SESSION['name'] = '';
$_SESSION['username'] = '';
$_SESSION['email'] = '';
$_SESSION['avatar'] = '';


