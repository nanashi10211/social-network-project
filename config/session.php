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
include_once("./models/Comment.php");

