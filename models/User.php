<?php

include_once("./helpers/model-utilitis/Model.php");
include_once("./helpers/database/database.php");

class User extends Model {

}

$user = new User($conn);

$user->create("Users", [
    "id" => "int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY",
    "name" => "varchar(255) NOT NULL",
    "username" => "varchar(255) NOT NULL",
    "password" => "varchar(255) NOT NULL",
    "email" => "varchar(255) NOT NULL",
    "friends" => "JSON",
    "avatar" => "varchar(255)",
]);