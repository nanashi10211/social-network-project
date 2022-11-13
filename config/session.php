<?php
/*
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
                                    session configure
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
*/
// start session
session_start(); 

// error debug code
ini_set('display_errors', '1');
error_reporting(E_ALL);

// model
include_once("./models/User.php");
include_once("./models/Message.php");
include_once("./models/Session.php");
include_once("./models/Post.php");



/*,,,,,,,,,,,,,, set all session variable ,,,,,,,,,,,,,,*/

// // for verify user session
// $_SESSION['is_login'] = "no login";


// // login user credentials
// $_SESSION['name'] = '';
// $_SESSION['username'] = '';
// $_SESSION['email'] = '';
// $_SESSION['avatar'] = '';


