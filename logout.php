<?php

include_once("./functions/utils.php");

// if not login
notLogin404();

if(isset($_GET['r'])) {
    session_destroy();
    header("Location: ./login");
}