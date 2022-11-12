<?php
/*
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
                                    session configure
,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,
*/
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


