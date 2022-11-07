<?php

include_once("./helpers/model-utilitis/Model.php");
include_once("./helpers/database/database.php");

class Session extends Model {

}

$session = new Session($conn);

// create model
$session->create("Sessions", [
    "id" => "int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY",
    "session" => "text",
]);