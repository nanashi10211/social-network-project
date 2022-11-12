<?php

// start session
function startSession() {
    include_once("/config/session.php");
}

// verify session and redirect
function indexRedirect() {
    if(!$_SESSION['is_login']) {
        return header("Location: ./login");
    }
}

