<?php

include_once("./helpers/model-utilitis/Model.php");
include_once("./helpers/database/database.php");

class User extends Model {

}

$user = new User($conn);

$user->create("Users", [
    "id" => "int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY",
    "firstname" => "varchar(255) NOT NULL",
    "lastname" => "varchar(255) NOT NULL",
    "friends" => "text",
    "avatar" => "varchar(255)",
]);